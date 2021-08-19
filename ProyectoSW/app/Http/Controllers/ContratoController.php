<?php

namespace App\Http\Controllers;

use App\Models\contrato;
use App\Models\clausula;
use App\Models\proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use PDF;
use DB;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        if($request){
            $query = trim($request -> get(key:'search'));
            $contrato = contrato::where('Usuario','LIKE','%'.$query.'%')
            ->orwhere('Estado','LIKE','%'.$query.'%')
            ->orwhere('Ciudad','LIKE','%'.$query.'%')
            ->orwhere('Duracion_Contrato','LIKE','%'.$query.'%')
            ->orwhere('Duracion_garantia','LIKE','%'.$query.'%')
            ->orwhere('Numero_ComputadoresP1','LIKE','%'.$query.'%')
            ->orwhere('Numero_ComputadoresP2','LIKE','%'.$query.'%')
            ->orwhere('Fecha_Creacion','LIKE','%'.$query.'%')
            ->orwhere('Descripcion','LIKE','%'.$query.'%')
            ->orderBy('Fecha_Creacion','desc')
            ->get();

            return view('contrato.index', ['contrato' => $contrato ,'search' => $query]);
        }

        $datos['contrato'] = contrato::paginate(10);
        return view('contrato.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $datosProveedor = proveedor::all();
        $datosUsuarios = [
            "nombre" => $request->session()->get('nombre'),
            "apellido" => $request->session()->get('apellido'),
            "reparticion" => $request->session()->get('reparticion'),
            "cargo" => $request->session()->get('cargo'),
            "sede" => $request->session()->get('sede'),
        ];
        //$datosUsuarios = usuario::all();
        return view('contrato.create', compact('datosUsuarios','datosProveedor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $campos=[
        //     'Descripcion'  => 'required|string',
        //     'Estado'  => 'required',
        //     'Fecha_Entrega'  => 'required',
        //     'Fecha_Aceptacion'  => 'required',
        //     'Fecha_Vencimiento'  => 'required'
            
        // ];
        // $Mensaje=[
        //     "Descripcion.required"=>'La descripcion del contrato es obligatorio',
        //     "Estado.required"=>'Seleccionnar un estado de contrato es obligatorio',
        //     "Fecha_Entrega.required"=>'Seleccionnar una fecha de entrega es obligatorio',
        //     "Fecha_Aceptacion.required"=>'Seleccionnar una fecha de aceptacion es obligatorio',
        //     "Fecha_Vencimiento.required"=>'Seleccionnar una fecha fecha de vencimiento es obligatorio'
            
        // ];
        // $this->validate($request,$campos,$Mensaje);

        $datoContrato = request()->except('_token');

        if($request->hasFile('PDF_Contrato')){
            $datoContrato['PDF_Contrato']=$request->file('PDF_Contrato')->store('uploads' , 'public');
        }

        contrato::insert($datoContrato);
        return redirect('contrato');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function show(contrato $contrato)
    {
        $datos['contrato'] = contrato::findOrFail($id_contrato);
        return view('contrato.show', $datos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function edit($id_contrato)
    {
        $datosProveedor = proveedor::all();
        $contrato = contrato::findOrFail($id_contrato);
        return view('contrato.edit', compact('contrato','datosProveedor'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_contrato)
    {

        $campos=[
            'id_proveedor' => 'required',
            'Estado'  => 'required|string',
            'Ciudad'  => 'required|string',
            'Numero_ComputadoresP1'  => 'required|numeric',
            'Numero_ComputadoresP2'  => 'required|numeric',
            'Duracion_garantia'  => 'required|string',
            'Duracion_Contrato'  => 'required|string',
            'Fecha_Creacion'  => 'required|string'
        ];
        $Mensaje=[
            "id_proveedor.required"=>'Seleccionar un proveedor es obligatorio',
            "Estado.required"=>'El estado del contrato es obligatorio',
            "Ciudad.required"=>'La ciudad asociada al contrato es obligatoria',
            "Numero_ComputadoresP1.required"=>'Los números de computadores para el perfil 1 son obligatorios',
            "Numero_ComputadoresP2.required"=>'Los números de computadores para el perfil 2 son obligatorios',
            "Duracion_garantia.required"=>'La duracion de la garantia del contrato es obligatorio',
            "Duracion_Contrato.required"=>'La duracion del contrato es obligatorio',
            "Fecha_Creacion.required"=>'La Fecha del contrato es obligatorio',
            "Numero_ComputadoresP1.numeric"=>'Ingresa solo numeros en la cantidad de computadores',
            "Numero_ComputadoresP2.numeric"=>'Ingresa solo numeros en la cantidad de computadores',

        ];
         $this->validate($request,$campos,$Mensaje);


        $datoContrato = request()->except(['_token','_method']);


        if($request->hasFile('PDF_Contrato')){
            $contrato = Contrato::findOrfail($id_contrato);
            Storage::delete('public/'.$contrato->PDF_Contrato);
            $datoContrato['PDF_Contrato']=$request->file('PDF_Contrato')->store('uploads' , 'public');
        }

        Contrato::where('id_contrato','=',$id_contrato)->update($datoContrato);
        return redirect('contrato');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_contrato)
    {
        $contrato = Contrato::findOrfail($id_contrato);

        if(Storage::delete('public/'.$contrato->PDF_Contrato)){
            Contrato::destroy($id_contrato);
        }
        if($contrato->PDF_Contrato==''){
            Contrato::destroy($id_contrato);
        }
        return redirect('contrato');
    }

    public function download($id_contrato)
    {
        $datos = Contrato::find($id_contrato);
        $path = '../storage/app/public/'.$datos->PDF_Contrato;
        return response()->download($path);
    }

    public function create2(Request $request)
    {
        $datosProveedor = proveedor::all();
        $datosUsuarios = [
            "nombre" => $request->session()->get('nombre'),
            "apellido" => $request->session()->get('apellido'),
            "reparticion" => $request->session()->get('reparticion'),
            "cargo" => $request->session()->get('cargo'),
            "sede" => $request->session()->get('sede'),
        ];
         //$datosUsuarios = usuario::all();
         return view('contrato/creacioncontrato', compact('datosUsuarios','datosProveedor'));
    }

    public function store2(Request $request)
    {
        $campos=[
            'id_proveedor' => 'required',
            'Estado'  => 'required|string',
            'Ciudad'  => 'required|string',
            'Numero_ComputadoresP1'  => 'required|numeric',
            'Numero_ComputadoresP2'  => 'required|numeric',
            'Duracion_garantia'  => 'required|string',
            'Duracion_Contrato'  => 'required|string',
            'Fecha_Creacion'  => 'required|string'
        ];
        $Mensaje=[
            "id_proveedor.required"=>'Seleccionar un proveedor es obligatorio',
            "Estado.required"=>'El estado del contrato es obligatorio',
            "Ciudad.required"=>'La ciudad asociada al contrato es obligatoria',
            "Numero_ComputadoresP1.required"=>'Los números de computadores para el perfil 1 son obligatorios',
            "Numero_ComputadoresP2.required"=>'Los números de computadores para el perfil 2 son obligatorios',
            "Duracion_garantia.required"=>'La duracion de la garantia del contrato es obligatorio',
            "Duracion_Contrato.required"=>'La duracion del contrato es obligatorio',
            "Fecha_Creacion.required"=>'La Fecha del contrato es obligatorio',
            "Numero_ComputadoresP1.numeric"=>'Ingresa solo numeros en la cantidad de computadores',
            "Numero_ComputadoresP2.numeric"=>'Ingresa solo numeros en la cantidad de computadores',

        ];
        $this->validate($request,$campos,$Mensaje);

        $datoss = [
            "nombre" => $request->session()->get('nombre'),
            "apellido" => $request->session()->get('apellido'),
        ];
        $datosss = $datoss['nombre'].' '.$datoss['apellido'];
        
        $datoContrato = request()->except('_token');
        Arr::set($datoContrato, 'Usuario', $datosss);
        contrato::insert($datoContrato);
        $datos = contrato::select('id_contrato')
                        ->orderBy('id_contrato', 'DESC')
                        ->first();
        $dato = $datos->id_contrato;
        $datosC = clausula::all();

        return view('ContratoClausula.create',compact('datosC', 'dato'));
    }

    
    public function store3(Request $request)
    {
        $campos=[
            'id_proveedor' => 'required',
            'Estado'  => 'required|string',
            'Ciudad'  => 'required|string',
            'Numero_ComputadoresP1'  => 'required|numeric',
            'Numero_ComputadoresP2'  => 'required|numeric',
            'Duracion_garantia'  => 'required|string',
            'Duracion_Contrato'  => 'required|string',
            'Fecha_Creacion'  => 'required|string'
        ];
        $Mensaje=[
            "id_proveedor.required"=>'Seleccionar un proveedor es obligatorio',
            "Estado.required"=>'El estado del contrato es obligatorio',
            "Ciudad.required"=>'La ciudad asociada al contrato es obligatoria',
            "Numero_ComputadoresP1.required"=>'Los números de computadores para el perfil 1 son obligatorios',
            "Numero_ComputadoresP2.required"=>'Los números de computadores para el perfil 2 son obligatorios',
            "Duracion_garantia.required"=>'La duracion de la garantia del contrato es obligatorio',
            "Duracion_Contrato.required"=>'La duracion del contrato es obligatorio',
            "Fecha_Creacion.required"=>'La Fecha del contrato es obligatorio',
            "Numero_ComputadoresP1.numeric"=>'Ingresa solo numeros en la cantidad de computadores',
            "Numero_ComputadoresP2.numeric"=>'Ingresa solo numeros en la cantidad de computadores',

        ];
        $this->validate($request,$campos,$Mensaje);

        $datoss = [
            "nombre" => $request->session()->get('nombre'),
            "apellido" => $request->session()->get('apellido'),
        ];
        $datosss = $datoss['nombre'].' '.$datoss['apellido'];
        
        $datoContrato = request()->except('_token');
        Arr::set($datoContrato, 'Usuario', $datosss);
        contrato::insert($datoContrato);



    $DatosContrato = contrato::all()->last();

        $InfoProveedoryempresa =  DB::table('contratos')
        ->leftJoin("proveedors","contratos.id_proveedor", "=", "proveedors.id_proveedor")
        ->leftJoin("empresas","proveedors.id_empresa", "=", "empresas.id_empresa")
        ->select('proveedors.Rut as rutP','proveedors.nombre as nombreP','empresas.Rut as rutE','empresas.nombre as nombreE')
        ->where('contratos.id_contrato', '=', $DatosContrato->id_contrato)
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

        return view('contrato.ClausulasPorDefecto',compact('DatosContrato','datDatosgeneralesa'));
    }


   


}
