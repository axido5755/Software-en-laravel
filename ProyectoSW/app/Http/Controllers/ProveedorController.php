<?php

namespace App\Http\Controllers;

use App\Models\proveedor;
use App\Models\empresa;
use Illuminate\Http\Request;
use Malahierba\ChileRut\ChileRut;
use Malahierba\ChileRut\Rules\ValidChileanRut;

class ProveedorController extends Controller
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

            $proveedor = proveedor::where('nombre','LIKE','%'.$query.'%')
            ->orwhere('email','LIKE','%'.$query.'%')
            ->orwhere('contacto','LIKE','%'.$query.'%')
            ->orderBy('id_proveedor','asc')
            ->get();

            return view('proveedor.index', ['proveedor' => $proveedor ,'search' => $query]);
        }

        $datos['proveedor'] = proveedor::paginate(5);
        return view('proveedor.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datosEmpresas = empresa::all();
        return view('proveedor.create', compact('datosEmpresas'));
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
        $campos=[
            'nombre' => 'required|string',
            'email' => 'required|email',
            'contacto'  => 'required|digits:9',
            'id_empresa'  => 'required',
            'Rut' => ['required', 'string', new ValidChileanRut(new ChileRut)],
            
        ];
        $Mensaje=[
            "digits"=> 'Debe ser un numero de 9 digitos',
            "email" =>'El formato ingresado es incorrecto',
            "nombre.required"=>'El nombre de la empresa es obligatorio',
            "email.required"=>'El correo electronico es obligatorio',
            "contacto.required"=>'El contacto de la empresa es obligatorio',
            "id_empresa.required"=>'Seleccionar una empresa es obligatorio'

            
        ];
        $this->validate($request,$campos,$Mensaje);

        $datoproveedor = request()->except('_token');
        proveedor::insert($datoproveedor);
        return redirect('proveedor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit($id_proveedor)
    {
        //
        $proveedor= proveedor::findOrFail($id_proveedor);
        
        $datosEmpresas = empresa::all();
        return view('proveedor.edit', compact('datosEmpresas','proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_proveedor)
    {
        //

        $campos=[
            'nombre' => 'required|string',
            'email' => 'required|email',
            'contacto'  => 'required|digits:9',
            'id_empresa'  => 'required',
            'Rut' => ['required', 'string', new ValidChileanRut(new ChileRut)],
            
        ];
        $Mensaje=[
            "digits"=> 'Debe ser un numero de 9 digitos',
            "email" =>'El formato ingresado es incorrecto',
            "nombre.required"=>'El nombre de la empresa es obligatorio',
            "email.required"=>'El correo electronico es obligatorio',
            "contacto.required"=>'El contacto de la empresa es obligatorio',
            "id_empresa.required"=>'Seleccionar una empresa es obligatorio'
            
        ];
        $this->validate($request,$campos,$Mensaje);

        $dato = request()->except(['_token','_method']);
        proveedor::where('id_proveedor','=',$id_proveedor)->update($dato);
        return redirect('proveedor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_proveedor)
    {
        //
        proveedor::destroy($id_proveedor);
        return redirect('proveedor');
    }
}
