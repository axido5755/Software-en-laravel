<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contrato;
use App\Models\proveedor;
use Illuminate\Support\Facades\Http;
use DB;
class session extends Controller
{
    function sessionput(Request $request){
        $data = http::get()->json();
        foreach ($data as $item) {
            if($item == 'true'){
                return redirect()->back()->withInput();
            }
        }
        
        $request->session()->put('nombre', $data['nombre']);
        $request->session()->put('apellido', $data['apellidos']);
        $request->session()->put('reparticion', $data['reparticion']);
        $request->session()->put('cargo', $data['cargo']);
        $request->session()->put('sede', $data['sede']);
        $request->session()->put('rut', $request->rut);
        
        $Proveedores = DB::table('proveedors')
        ->join('empresas', 'proveedors.id_empresa', '=', 'empresas.id_empresa')
        ->select('proveedors.nombre as nombreproveedor', 'empresas.nombre as nombreempresa')
        ->get();

        $contratos = contrato::orderBy('Fecha_Creacion','desc')->first();
        $Nombre = $request->session()->get('nombre').' '.$request->session()->get('apellido');
        $Borrador = contrato::select('COUNT(id_contrato)')->where('Estado','=','Borrador')->count();
        $Vigente = contrato::select('COUNT(id_contrato)')->where('Estado','=','Vigente')->count();
        $BorradorUsuario = contrato::select('COUNT(id_contrato)')->where('Estado','=','Borrador')->where('Usuario','=',$Nombre)->count();
        $VigenteUsuario = contrato::select('COUNT(id_contrato)')->where('Estado','=','Vigente')->where('Usuario','=',$Nombre)->count();


        return view('home',compact('Borrador','Vigente','Nombre','BorradorUsuario','VigenteUsuario','Proveedores','contratos'));
    }

    function sessionget(Request $request){
        $data = [
            "nombre" => $request->session()->get('nombre'),
            "apellido" => $request->session()->get('apellido'),
            "reparticion" => $request->session()->get('reparticion'),
            "cargo" => $request->session()->get('cargo'),
            "sede" => $request->session()->get('sede'),
        ];
        return view('usuario',compact('data'));
    }

    function Gethome(Request $request){
        
        $Proveedores = DB::table('proveedors')
        ->join('empresas', 'proveedors.id_empresa', '=', 'empresas.id_empresa')
        ->select('proveedors.nombre as nombreproveedor', 'empresas.nombre as nombreempresa')
        ->get();


        
        $contratos = contrato::orderBy('Fecha_Creacion','desc')->first();
        $Nombre = $request->session()->get('nombre').' '.$request->session()->get('apellido');
        $Borrador = contrato::select('COUNT(id_contrato)')->where('Estado','=','Borrador')->count();
        $Vigente = contrato::select('COUNT(id_contrato)')->where('Estado','=','Vigente')->count();
        $BorradorUsuario = contrato::select('COUNT(id_contrato)')->where('Estado','=','Borrador')->where('Usuario','=',$Nombre)->count();
        $VigenteUsuario = contrato::select('COUNT(id_contrato)')->where('Estado','=','Vigente')->where('Usuario','=',$Nombre)->count();


        return view('home',compact('Borrador','Vigente','Nombre','BorradorUsuario','VigenteUsuario','Proveedores','contratos'));
    }
}
