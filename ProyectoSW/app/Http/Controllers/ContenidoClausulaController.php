<?php

namespace App\Http\Controllers;

use App\Models\contenido_clausula;
use Illuminate\Support\Arr;
use App\Models\clausula;
use App\Models\contrato;
use Illuminate\Http\Request;
use DB;
use PDF;
class ContenidoClausulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $datos['contenido_clausula'] = contenido_clausula::paginate(5);

        // /*$datos['contenido_clausula']  = contenido_clausula::select("id_contrato")
        //                                             ->groupBy('id_contrato')
        //                                             ->get();*/


        // return view('ContratoClausula.index',$datos);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datosC = clausula::all();
        return view('ContratoClausula.create',compact('datosC'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function AñadirClausula(Request $request, $id_contrato)
    {

        $counted = count($request->Select_Clausulas);
          for ($i=0; $i < $counted; $i++) { 
            $date = new contenido_clausula();
            $date->id_contrato =  $id_contrato;
            $date->id_clausula = $request->Select_Clausulas[$i];
            $date->datos =  $request->item_sub_category[$i];
            $date->save();
         }

        if ($request['action'] == 'Agregar Anexo') {
     
        return view('anexo.create',compact('id_contrato'));
        } else if ($_POST['action'] == 'Guardar Contrato') {
       
        return redirect('contrato');
        }
    
    }

    public function AñadirClausulaDefecto(Request $request, $id_contrato)
    {
        DB::table('contratos')
              ->where('id_contrato', '=',$id_contrato)
              ->update(['Descripcion' => $request->Descripcion]);


        $date = new contenido_clausula();
        $date->id_contrato =  $id_contrato;
        $date->id_clausula = 1;
        $date->datos =  $request->c1;
        $date->save();
                
        $date = new contenido_clausula();
        $date->id_contrato =  $id_contrato;
        $date->id_clausula = 2;
        $date->datos =  $request->c2;
        $date->save();
                
        $date = new contenido_clausula();
        $date->id_contrato =  $id_contrato;
        $date->id_clausula = 3;
        $date->datos =  $request->c3;
        $date->save();
                
        $date = new contenido_clausula();
        $date->id_contrato =  $id_contrato;
        $date->id_clausula = 4;
        $date->datos =  $request->c4;
        $date->save();
                
        $date = new contenido_clausula();
        $date->id_contrato =  $id_contrato;
        $date->id_clausula = 5;
        $date->datos =  $request->c5;
        $date->save();

        $date = new contenido_clausula();
        $date->id_contrato =  $id_contrato;
        $date->id_clausula = 6;
        $date->datos =  $request->c6;
        $date->save();

        $date = new contenido_clausula();
        $date->id_contrato =  $id_contrato;
        $date->id_clausula = 7;
        $date->datos =  $request->c7;
        $date->save();

       
        
        $datoss = [
            "nombre" => $request->session()->get('nombre'),
            "apellido" => $request->session()->get('apellido'),
        ];
        $datosss = $datoss['nombre'].' '.$datoss['apellido'];
        
        $datoContrato = request()->except('_token');
        Arr::set($datoContrato, 'Usuario', $datosss);
        $datos = contrato::select('id_contrato')
                        ->orderBy('id_contrato', 'DESC')
                        ->first();
        $dato = $datos->id_contrato;
        $datosC = clausula::all()->skip(7);
        return view('ContratoClausula.create',compact('datosC', 'dato'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contenido_clausula  $contenido_clausula
     * @return \Illuminate\Http\Response
     */
    public function show(contenido_clausula $contenido_clausula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contenido_clausula  $contenido_clausula
     * @return \Illuminate\Http\Response
     */
    public function edit($id_contrato,$id_clausula)
    {
        $contenido_clausula =  DB::table('contenido_clausulas')
        ->leftJoin("clausulas","contenido_clausulas.id_clausula", "=", "clausulas.id_clausula")
        ->select('contenido_clausulas.id_clausula','contenido_clausulas.id_contrato','clausulas.n_clausula','clausulas.titulo','contenido_clausulas.datos')
        ->where('contenido_clausulas.id_contrato', '=',$id_contrato)
        ->where('contenido_clausulas.id_clausula', '=',$id_clausula)
        ->groupBy('contenido_clausulas.id_clausula','contenido_clausulas.id_contrato','clausulas.n_clausula','clausulas.titulo','contenido_clausulas.datos')
        ->get();
        return view('ContratoClausula.edit',compact('contenido_clausula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contenido_clausula  $contenido_clausula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_contrato)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contenido_clausula  $contenido_clausula
     * @return \Illuminate\Http\Response
     */
    public function destroy(contenido_clausula $contenido_clausula)
    {
        //
    }

    public function getData($id){
        $p=clausula::select('Contenido')->where('id_clausula',$id)->first();    
        return response()->json($p);
    }

    public function index2(request $request, $id_contrato)
    {
        
        if($request){
            $query = trim($request -> get(key:'search'));

            $contenido_clausula = DB::table('contenido_clausulas')
            ->leftJoin("clausulas","contenido_clausulas.id_clausula", "=", "clausulas.id_clausula")
            ->leftJoin("contratos","contenido_clausulas.id_contrato", "=", "contratos.id_contrato")
            ->select('contratos.Estado as Estado','contenido_clausulas.id_clausula','contenido_clausulas.id_contrato','clausulas.n_clausula','clausulas.titulo','contenido_clausulas.datos')
            ->where('contenido_clausulas.id_contrato', '=',$id_contrato)
            ->orwhere('contenido_clausulas.id_clausula','rlike','%'.$query.'%')
            ->orwhere('contenido_clausulas.datos','rlike','%'.$query.'%')
            ->orwhere('clausulas.titulo','rlike','%'.$query.'%')
            ->groupBy('contratos.Estado','contenido_clausulas.id_clausula','contenido_clausulas.id_contrato','clausulas.n_clausula','clausulas.titulo','contenido_clausulas.datos')            
            ->get();
        $Estado =  contrato::select('Estado')
                ->where('id_contrato','=',$id_contrato)
                ->first();
        $Estado = $Estado->Estado;
        
            return view('ContratoClausula.index', ['contenido_clausula' => $contenido_clausula ,'search' => $query,'Estado' =>$Estado,'id_contrato' => $id_contrato]);
        }

        
        return view('ContratoClausula.index',compact('contenido_clausula'));
    }

    public function destroy2($id_contrato,$id_clausula,$datos)
    {
        $date = DB::table('contenido_clausulas')
        ->select('*')
        ->where('contenido_clausulas.id_contrato', '=',$id_contrato)
        ->where('contenido_clausulas.id_clausula', '=',$id_clausula)
        ->where('contenido_clausulas.datos', '=',$datos)
        ->delete();
        return redirect('contrato');
    }

    public function update2(Request $request, $id_contrato, $id_clausula)
    {
        $dato = request()->except(['_token','_method']);
        contenido_clausula::where('id_contrato','=',$id_contrato)->where('id_clausula','=',$id_clausula)->update($dato);
        return redirect('contrato');
    }

    public function create2($id_contrato)
    {
    $datosC = clausula::all()->skip(7);
    $dato = $id_contrato;
    return view('ContratoClausula.create',compact('datosC', 'dato'));
}
}
