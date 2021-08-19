@extends('layout') 
@section('content')

<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Ingresar nuevo proveedor</h3>
            <br>
            <table class="table table-striped">

            <form action="{{ url('/proveedor') }}" method="post" enctype="multipart/form-data">
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
            <p>
                <div>
                <label for="nombre"> Ingresa el nombre del proveedor : </label>
                <input type="text" name="nombre" id='nombre' class="form-control">
                {!! $errors->first('nombre','<div class="invalid-feedback"> :message</div>') !!}
                </div>
                <br>

                <div>
                <label for="Rut"> Ingresa el Rut del proveedor : </label>
                <input type="text" name="Rut" id='Rut' class="form-control">
                {!! $errors->first('Rut','<div class="invalid-feedback"> :message</div>') !!}
                </div>
                <br>

                <div>
                <label for="email"> Ingresa email del proveedor : </label>
                <input type="text" name="email" id='email' class="form-control">
                {!! $errors->first('email','<div class="invalid-feedback"> :message</div>') !!}
                </div>
                <br>

                <div>
                <label for="contacto"> Ingresa el contacto : </label>
                <input type="text" name="contacto" id='contacto' class="form-control">
                {!! $errors->first('contacto','<div class="invalid-feedback"> :message</div>') !!}
                </div>
                <br>

                <div>
                <label for="Descripcion" class="form-label"> Seleccione empresa a la que provee: </label>
                    <select name="id_empresa" id="id_empresa" class="form-control custom-select">
                        <option value="">-- Escoja el nombre de la empresa --</option>
                        @foreach ($datosEmpresas as $datosEmpresas)
                        <option value="{{$datosEmpresas['id_empresa']}}"> {{$datosEmpresas['nombre']}} </option>
                        @endforeach
                    </select>
                    {!! $errors->first('id_empresa','<div class="invalid-feedback"> :message</div>') !!}
                </div>
                <br>

                <div class="row">
                    <div class="col-8">
                        <input type="submit" value="Enviar" id="enviar" class="btn btn-success float-right">
                        <a href="{{url('/proveedor')}}" class="btn btn-secondary">Volver</a>
                    </div>
                </div>

            </p>
            </form>
            </table>
        </div>
    </div>
</div>
@endsection