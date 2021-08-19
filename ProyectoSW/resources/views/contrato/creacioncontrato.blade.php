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


                    <div>
                    <label for="Estado"> Estado del Contrato : </label>
                    <input type="Estado" name="Estado" id='Estado' class="form-control" value="Borrador" disabled>
                    <br>
                    </div>

                    <div>
                        <label for="Proveedor" class="form-label"> Selecciona proveedor: </label>
                        <select name="id_proveedor" id="id_proveedor" class="form-control custom-select">
                            <option value="">-- Escoja el nombre del proveedor --</option>
                            @foreach ($datosProveedor as $datosProveedor)
                            <option value="{{$datosProveedor['id_proveedor']}}"> {{$datosProveedor['nombre']}} </option>
                            @endforeach
                        </select>
                        </div>
                        <br>

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label"> Ingresa una Descripción
                        </label>
                        <textarea name="Descripcion" id='Descripcion' class="form-control" rows="3"></textarea>
                    </div>
                    <br>

                    {{-- <label for="Estado"> Estado del Contrato : </label>
                    <input type="Estado" name="Estado" id='Estado' class="form-control" value="Borrador" disabled>
                    <br> --}}

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
