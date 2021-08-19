{{-- Create de Contrato --}}

@extends('layout')

@section('content')

<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Guardar un nuevo Contrato</h3>
            <br>
            <table class="table table-striped">

                <form action="{{ url('contrato/ClausulasPorDefecto') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @if(count($errors)>0)
                    <div class="alert alert-danger" role="alert">

                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}} </li>
                        @endforeach
                    </ul>

                    </div>
                    @endif
                    <div>
                        <label for="Usuario"> Usuario: </label>
                        <input type="text" name="Usuario" id="Usuario" value="{{$datosUsuarios['nombre']}} {{$datosUsuarios['apellido']}}" class="form-control" disabled>
                        <br>  
                    </div>
                    <br>

                   

                    <div>
                        <label for="Proveedor" class="form-label"> Selecciona proveedor: </label>
                        <select name="id_proveedor" id="id_proveedor" class="form-control custom-select">
                            <option value="">-- Escoja el nombre del proveedor --</option>
                            @foreach ($datosProveedor as $datosProveedor)
                            <option value="{{$datosProveedor['id_proveedor']}}"> {{$datosProveedor['nombre']}} </option>
                            @endforeach
                        </select>
                        {!! $errors->first('id_proveedor','<div class="invalid-feedback"> :message</div>') !!}
                    </div>
                    <br>      

                    <div>
                        <label for="Estado"> Ingresa el Estado del Contrato : </label>
                        <select name="Estado" id="Estado" class="form-control custom-select">
                            <option value="Borrador">Borrador</option>
                            <option value="Vigente">Vigente</option>   
                        </select>
                        {!! $errors->first('Estado','<div class="invalid-feedback"> :message</div>') !!}
                    </div>
                    <br>

                    <div>
                        <label for="Ciudad"> Ciudad: </label>
                        <input type="text" name="Ciudad" id='Ciudad' class="form-control">
                        {!! $errors->first('Ciudad','<div class="invalid-feedback"> :message</div>') !!}
                        <br>
                    </div>

                    <div>
                        <label for="Numero_ComputadoresP1"> Número de Computadores Perfil 1: </label>
                        <input type="text" name="Numero_ComputadoresP1" id='Numero_ComputadoresP1' class="form-control">
                        {!! $errors->first('Numero_ComputadoresP1','<div class="invalid-feedback"> :message</div>') !!}
                        <br>
                    </div>

                    <div>
                        <label for="Numero_ComputadoresP2"> Número de Computadores Perfil 2: </label>
                        <input type="text" name="Numero_ComputadoresP2" id='Numero_ComputadoresP2' class="form-control">
                        {!! $errors->first('Numero_ComputadoresP2','<div class="invalid-feedback"> :message</div>') !!}
                        <br>
                    </div>

                    <div>
                        <label for="Duracion_garantia"> Duración de la garantia: </label>
                        <input type="text" name="Duracion_garantia" id='Duracion_garantia' class="form-control">
                        {!! $errors->first('Duracion_garantia','<div class="invalid-feedback"> :message</div>') !!}
                        <br>
                    </div>                   

                    <div>
                        <label for="Duracion_Contrato"> Duración del Contrato: </label>
                        <input type="text" name="Duracion_Contrato" id='Duracion_Contrato' class="form-control">
                        {!! $errors->first('Duracion_Contrato','<div class="invalid-feedback"> :message</div>') !!}
                        <br>
                    </div>

                    <div>
                        <label for="Fecha_Creacion"> Selecciona la Fecha de Creación: </label>
                        <input type="date" name="Fecha_Creacion" id="Fecha_Creacion" class="form-control">
                        {!! $errors->first('Fecha_Creacion','<div class="invalid-feedback"> :message</div>') !!}
                        <br>
                    </div>
                 

                    <div class="row">
                        <div class="col-8">
                            <input type="submit" value="Enviar" id="enviar" class="btn btn-success float-right">
                            <a href="{{url('/contrato')}}" class="btn btn-secondary">Volver</a>
                        </div>
                    </div>

                </form>
            </table>

        </div>
    </div>
</div>


@stop
