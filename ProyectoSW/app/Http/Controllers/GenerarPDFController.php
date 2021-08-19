<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\contrato;
use App\Models\contenido_clausula;
use App\Models\clausula;
use App\Models\contenido_anexo;
use App\Models\anexo;
use DB;
use PDF;

class GenerarPDFController extends Controller
{
    public function index(request $request)
    {
        $contratos = contrato::all();
        return view('pdf.generarpdf', compact('contratos'));
    }

    public function generar(Request $request)
    {
        //echo $request->get('id_contrato');
        $DatosContrato = Contrato::find( $request->get('id_contrato') );
        $AnexosdeContrato = Anexo::where('id_contrato','=',$request->get('id_contrato') )->get();

        //Datos de las Clausulas asociadas al Contrato
        $contenido_clausula =  DB::table('contenido_clausulas')
            ->leftJoin("clausulas","contenido_clausulas.id_clausula", "=", "clausulas.id_clausula")
            ->select('contenido_clausulas.id_clausula','contenido_clausulas.id_contrato','clausulas.n_clausula','clausulas.titulo','contenido_clausulas.datos')
            ->where('contenido_clausulas.id_contrato', '=', $request->get('id_contrato') )
            ->groupBy('contenido_clausulas.id_clausula','contenido_clausulas.id_contrato','clausulas.n_clausula','clausulas.titulo','contenido_clausulas.datos')
            ->get();

        //Datos de los Anexos asociados al Contrato
        $count = 0;
        $contenido_anexo = array();
        Arr::set($contenido_anexo, 'count', $count);
        foreach ($AnexosdeContrato as $value) {
            Arr::set($contenido_anexo,'anexo'.$count, $value);
            Arr::set($contenido_anexo, $count, DB::table('contenido_anexos')
            ->leftJoin("clausulas","contenido_anexos.id_clausula", "=", "clausulas.id_clausula")
            ->select('contenido_anexos.id_clausula','contenido_anexos.id_anexo','clausulas.n_clausula as n_clausula','clausulas.titulo as titulo','contenido_anexos.datos as datos' )
            ->where('contenido_anexos.id_anexo', '=',$value->id_anexo)
            ->groupBy('contenido_anexos.id_clausula','contenido_anexos.id_anexo','clausulas.n_clausula','clausulas.titulo','contenido_anexos.datos')
            ->get());
            $count ++;
            Arr::set($contenido_anexo, 'count', $count);
        }
        // $contenido_anexo =  DB::table('contenido_anexos')
        //     ->leftJoin("clausulas","contenido_anexos.id_clausula", "=", "clausulas.id_clausula")
        //     ->select('contenido_anexos.id_clausula','contenido_anexos.id_anexo','clausulas.n_clausula','clausulas.titulo','contenido_anexos.datos')
        //     ->where('contenido_anexos.id_anexo', '=',$AnexosdeContrato->id_anexo)
        //     ->groupBy('contenido_anexos.id_clausula','contenido_anexos.id_anexo','clausulas.n_clausula','clausulas.titulo','contenido_anexos.datos')
        //     ->get();

        //echo $contenido_clausula;
        //echo $contenido_anexo;

        $InfoProveedoryempresa =  DB::table('contratos')
            ->leftJoin("proveedors","contratos.id_proveedor", "=", "proveedors.id_proveedor")
            ->leftJoin("empresas","proveedors.id_empresa", "=", "empresas.id_empresa")
            ->select('proveedors.Rut as rutP','proveedors.nombre as nombreP','empresas.Rut as rutE','empresas.nombre as nombreE')
            ->where('contratos.id_contrato', '=', $request->get('id_contrato') )
            ->first();


        $datDatosgeneralesa = [
            "nombre" => $request->session()->get('nombre'),
            "apellido" => $request->session()->get('apellido'),
            "rut" => $request->session()->get('rut'),
            "reparticion" => $request->session()->get('reparticion'),
            "cargo" => $request->session()->get('cargo'),
            "sede" => $request->session()->get('sede'),
            
            "nombreP" => $InfoProveedoryempresa->nombreP,
            "rutP" => $InfoProveedoryempresa->rutP,

            "nombreE" => $InfoProveedoryempresa->nombreE,
            "rutE" => $InfoProveedoryempresa->rutE,
        ];




        $Compact = compact('contenido_clausula','contenido_anexo', 'DatosContrato','datDatosgeneralesa');
        $pdf = PDF::loadView('pdf.plantilla', $Compact);
        return $pdf->stream('Lista de contratos.pdf');

    }
}
