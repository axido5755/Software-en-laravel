<?php

namespace App\Http\Controllers;

use App\Models\contenido_anexo;
use App\Models\contenido_clausula;
use Illuminate\Http\Request;
use App\Models\contrato;
use App\Models\anexo;
use DB;
use PDF;
use App\Models\clausula;

class ContenidoAnexoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contenido_anexo  $contenido_anexo
     * @return \Illuminate\Http\Response
     */
    public function show(contenido_anexo $contenido_anexo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contenido_anexo  $contenido_anexo
     * @return \Illuminate\Http\Response
     */
    public function edit($id_anexo,$id_clausula)
    {
        $contenido_anexo =  DB::table('contenido_anexos')
        ->leftJoin("clausulas","contenido_anexos.id_clausula", "=", "clausulas.id_clausula")
        ->select('contenido_anexos.id_clausula','contenido_anexos.id_anexo','clausulas.n_clausula','clausulas.titulo','contenido_anexos.datos')
        ->where('contenido_anexos.id_anexo', '=',$id_anexo)
        ->where('contenido_anexos.id_clausula', '=',$id_clausula)
        ->groupBy('contenido_anexos.id_clausula','contenido_anexos.id_anexo','clausulas.n_clausula','clausulas.titulo','contenido_anexos.datos')
        ->get();
        return view('AnexoClausula.edit',compact('contenido_anexo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contenido_anexo  $contenido_anexo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contenido_anexo $contenido_anexo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contenido_anexo  $contenido_anexo
     * @return \Illuminate\Http\Response
     */
    public function destroy(contenido_anexo $contenido_anexo)
    {
        //
    }

    public function AñadirClausula(Request $request, $id_anexo)
    {
        $counted = count($request->Select_Clausulas);
          for ($i=0; $i < $counted; $i++) { 
            $date = new contenido_anexo();
            $date->id_anexo =  $id_anexo;
            $date->id_clausula = $request->Select_Clausulas[$i];
            $date->datos =  $request->item_sub_category[$i];
            $date->save();
         }
        $dato = request()->except('_token');

        
        return redirect('contrato');


        // $id_contrato = Anexo::select('id_contrato')
        //     ->where('id_anexo','=',$id_anexo)
        //     ->first();
        

        // $contenido_clausula =  DB::table('contenido_clausulas')
        //       ->leftJoin("clausulas","contenido_clausulas.id_clausula", "=", "clausulas.id_clausula")
        //       ->select('contenido_clausulas.id_clausula','contenido_clausulas.id_contrato','clausulas.n_clausula','clausulas.titulo','contenido_clausulas.datos')
        //       ->where('contenido_clausulas.id_contrato', '=',$id_contrato)
        //       ->groupBy('contenido_clausulas.id_clausula','contenido_clausulas.id_contrato','clausulas.n_clausula','clausulas.titulo','contenido_clausulas.datos')
        //       ->get();
       
        //$dato = Anexo::findOrFail($id_anexo);
        //echo $dato->id_contrato;
        //$datocc = contenido_clausula::select('*')->where('id_contrato', '=' , $dato->id_contrato)
         //   ->where('id_clausula', '=' , $dato->id_clausula); 
        //echo $datocc;
        
        //$datoclausula = clausula::find($dato2->id_clausula);
        //echo $datoclausula;

        //$data = compact('datocc');
        //$pdf = PDF::loadView('pdf.plantilla', $data);
        //return $pdf->stream('Lista de contratos.pdf');
    }

    
    public function index2($id_anexo)
    {

        $contenido_anexo =  DB::table('contenido_anexos')
            ->leftJoin("clausulas","contenido_anexos.id_clausula", "=", "clausulas.id_clausula")
            ->leftJoin("anexos","contenido_anexos.id_anexo", "=", "anexos.id_anexo")
            ->leftJoin("contratos","anexos.id_contrato", "=", "contratos.id_contrato")
            ->select('contratos.Estado as Estado','contenido_anexos.id_clausula','contenido_anexos.id_anexo','clausulas.n_clausula','clausulas.titulo','contenido_anexos.datos')
            ->where('contenido_anexos.id_anexo', '=',$id_anexo)
            ->groupBy('contratos.Estado','contenido_anexos.id_clausula','contenido_anexos.id_anexo','clausulas.n_clausula','clausulas.titulo','contenido_anexos.datos')
            ->get();


        $id_contrato =  anexo::select('id_contrato')
            ->where('id_anexo','=',$id_anexo)
            ->first();
        $id_contrato =  $id_contrato->id_contrato;    
         
        $Estado =  contrato::select('Estado')
            ->where('id_contrato','=',$id_contrato)
            ->first();

        $Estado =  $Estado->Estado;    

    return view('AnexoClausula.index',compact('contenido_anexo','id_anexo','Estado'));
    }

    public function destroy2($id_anexo,$id_clausula,$datos)
    {
        $date = DB::table('contenido_anexos')
        ->select('*')
        ->where('contenido_anexos.id_anexo', '=',$id_anexo)
        ->where('contenido_anexos.id_clausula', '=',$id_clausula)
        ->where('contenido_anexos.datos', '=',$datos)
        ->delete();
        return redirect()->back();
    }

    public function update2(Request $request, $id_anexo, $id_clausula)
    {
        $dato = request()->except(['_token','_method']);
        contenido_anexo::where('id_anexo','=',$id_anexo)->where('id_clausula','=',$id_clausula)->update($dato);

        $contenido_anexo =  DB::table('contenido_anexos')
            ->leftJoin("clausulas","contenido_anexos.id_clausula", "=", "clausulas.id_clausula")
            ->select('contenido_anexos.id_clausula','contenido_anexos.id_anexo','clausulas.n_clausula','clausulas.titulo','contenido_anexos.datos')
            ->where('contenido_anexos.id_anexo', '=',$id_anexo)
            ->groupBy('contenido_anexos.id_clausula','contenido_anexos.id_anexo','clausulas.n_clausula','clausulas.titulo','contenido_anexos.datos')
            ->get();
        return view('AnexoClausula.index',compact('contenido_anexo','id_anexo'));

    }
    public function create2($id_anexo){
        $dato = anexo::select('id_anexo')
        ->where('id_anexo','=',$id_anexo)
                        ->orderBy('id_anexo', 'DESC')
                        ->first();
        
        $datosC = clausula::all()->skip(7);

        return view('AnexoClausula.create',compact('datosC', 'dato'));
    }

    
}
