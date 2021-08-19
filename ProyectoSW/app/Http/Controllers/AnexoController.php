<?php

namespace App\Http\Controllers;

use App\Models\anexo;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Arr;
use App\Models\clausula;
use App\Models\contrato;

class AnexoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['anexo'] = anexo::paginate(5);
        return view('anexo.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('anexo.create');
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
     * @param  \App\Models\anexo  $anexo
     * @return \Illuminate\Http\Response
     */
    public function show(anexo $anexo)
    {
        $datos['anexo'] = anexo::findOrFail($id_anexo);
        return view('anexo.show', $datos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\anexo  $anexo
     * @return \Illuminate\Http\Response
     */
    public function edit($id_anexo)
    {
       
        $dato['anexo'] = anexo::select('*')->where('id_anexo','=',$id_anexo)->first();
        echo $id_anexo;
        //= anexo::findOrFail($id_anexo);
        
        return view('anexo.edit', $dato);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\anexo  $anexo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_anexo)
    {
        $dato = request()->except(['_token','_method']);
        anexo::where('id_anexo','=',$id_anexo)->update($dato);
        $anexo = anexo::where('id_anexo','=',$id_anexo)->first();
        return $this->index2($anexo->id_contrato);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\anexo  $anexo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_anexo)
    {
        $anexo = anexo::where('id_anexo','=',$id_anexo)->first();
        anexo::destroy($id_anexo);
       
        return $this->index2($anexo->id_contrato);
    }

    public function index2($id_contrato)
    {
        $anexo =  DB::table('anexos')
            ->leftJoin("contratos","anexos.id_contrato", "=", "contratos.id_contrato")
            ->select('*')
            ->where('anexos.id_contrato','=',$id_contrato)
            ->get();

        $Estado =  contrato::select('Estado')
            ->where('id_contrato','=',$id_contrato)
            ->first();

        $Estado =  $Estado->Estado;
        return view('anexo.index',compact('anexo','id_contrato','Estado'));
    }

    public function create2($id_contrato)
    {
        return view('anexo.create',compact('id_contrato'));
    }

    public function store2(Request $request,$id_contrato)
    {
        if (  $request->n_anexo == null || $request->titulo == null || $request->Contenido == null) {
            return view('anexo.create',compact('id_contrato'));
        }

        if ($request['action'] == 'Agregar Clausulas') {
            $dato = ['id_contrato' => $id_contrato,
             'n_anexo' => $request->n_anexo,
             'titulo' => $request->titulo,
             'contenido' => $request->Contenido
        ];


        $campos=[
            'n_anexo' => 'required',
            'titulo' => 'required|string',
            'Contenido'  => 'required|string',

        ];
        $Mensaje=[
            "n_anexo.required"=>'El número de anexo es obligatorio',
            "titulo.required"=>'El titulo es obligatorio',
            "Contenido.required"=>'El contenido es obligatorio',       
        ];
        $this->validate($request,$campos,$Mensaje);
        anexo::insert($dato);

        $dato = anexo::select('id_anexo')
                        ->orderBy('id_anexo', 'DESC')
                        ->first();
        
        $datosC = clausula::all()->skip(7);

        return view('AnexoClausula.create',compact('datosC', 'dato'));

        } else if ($_POST['action'] == 'Guardar anexo') {
            
            $dato = ['id_contrato' => $id_contrato,
            'n_anexo' => $request->n_anexo,
            'titulo' => $request->titulo,
            'contenido' => $request->Contenido
       ];


       $campos=[
        'n_anexo' => 'required',
        'titulo' => 'required|string',
        'Contenido'  => 'required|string',

    ];
    $Mensaje=[
        "n_anexo.required"=>'El número de anexo es obligatorio',
        "titulo.required"=>'El titulo es obligatorio',
        "Contenido.required"=>'El contenido es obligatorio',       
    ];
    $this->validate($request,$campos,$Mensaje);
    
       anexo::insert($dato);
       return redirect('contrato');

        } 
         
    }

}
