<?php

namespace App\Http\Controllers;

use App\Models\empresa;
use Illuminate\Http\Request;
use Malahierba\ChileRut\ChileRut;
use Malahierba\ChileRut\Rules\ValidChileanRut;

class EmpresaController extends Controller
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

            $empresa = empresa::where('nombre','LIKE','%'.$query.'%')
            ->orwhere('email','LIKE','%'.$query.'%')
            ->orwhere('contacto','LIKE','%'.$query.'%')
            ->get();

            return view('empresa.index', ['empresa' => $empresa ,'search' => $query]);
        }

        $datos['empresa'] = empresa::paginate(5);
        return view('empresa.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    public function store(Request $request)
    {
        $campos=[
            'nombre' => 'required|string',
            'email' => 'required|email|string',
            'contacto'  => 'required|digits:9',
            'Rut' => ['required', 'string', new ValidChileanRut(new ChileRut)],

        ];
        $Mensaje=[
            "digits"=> 'Debe ser un numero de 9 digitos',
            "nombre.required"=>'El nombre de la empresa es obligatorio',
            "email.required"=>'El correo electronico es obligatorio',
            "contacto.required"=>'El contacto de la empresa es obligatorio',
            "email" =>'El formato ingresado es incorrecto',
            "Rut.required" =>'El Rut es obligatorio',          
        ];
        $this->validate($request,$campos,$Mensaje);


        $datoEmpresa = request()->except('_token');
        empresa::insert($datoEmpresa);
        return redirect('empresa');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(empresa $empresa)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit($id_empresa)
    {
        $dato['empresa'] = empresa::findOrFail($id_empresa);
        return view('empresa.edit', $dato);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_empresa)
    {
        $campos=[
            'nombre' => 'required|string',
            'email' => 'required|email|string',
            'contacto'  => 'required|digits:9',
            'Rut' => ['required', 'string', new ValidChileanRut(new ChileRut)],

        ];
        $Mensaje=[
            "digits"=> 'Debe ser un numero de 9 digitos',
            "nombre.required"=>'El nombre de la empresa es obligatorio',
            "email.required"=>'El correo electronico es obligatorio',
            "contacto.required"=>'El contacto de la empresa es obligatorio',
            "email" =>'El formato ingresado es incorrecto',
            "Rut.required" =>'El Rut es obligatorio',
            
            
        ];
        $this->validate($request,$campos,$Mensaje);

        $dato = request()->except(['_token','_method']);
        Empresa::where('id_empresa','=',$id_empresa)->update($dato);
        return redirect('empresa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_empresa)
    {
        //
        Empresa::destroy($id_empresa);
        return redirect('empresa');
    }
}