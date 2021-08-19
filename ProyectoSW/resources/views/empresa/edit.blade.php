@extends('layout') 
@section('content')


<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Editar empresa {{$empresa->nombre}}</h3>
            <br>
            <table class="table table-striped">

            <form action="{{ url('/empresa/'.$empresa->id_empresa) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

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
                <label for="nombre"> Ingresa el nuevo nombre de la empresa : </label>
                <input type="text" name="nombre" id='nombre' class="form-control" value="{{ $empresa->nombre }}">
                {!! $errors->first('nombre','<div class="invalid-feedback"> :message</div>') !!}
                </div>
                <br>

                <div>
                <label for="Rut"> Ingresa el Rut de la empresa : </label>
                <input type="text" name="Rut" id='Rut' class="form-control" value="{{ $empresa->Rut }}">
                {!! $errors->first('Rut','<div class="invalid-feedback"> :message</div>') !!}
                </div>
                <br>

                <div>
                <label for="email"> Ingresa nuevo email de la empresa : </label>
                <input type="text" name="email" id='email' class="form-control" value="{{ $empresa->email }}">
                {!! $errors->first('email','<div class="invalid-feedback"> :message</div>') !!}
                </div>
                <br>

                <div>
                <label for="contacto"> Ingresa el nuevo contacto de la empresa : </label>
                <input type="text" name="contacto" id='contacto' class="form-control" value="{{ $empresa->contacto }}">
                {!! $errors->first('contacto','<div class="invalid-feedback"> :message</div>') !!}
                </div>
                <br>

                <div class="row">
                    <div class="col-8">
                        <input type="submit" value="Enviar" id="enviar" class="btn btn-success float-right">
                        <a href="{{url('/empresa')}}" class="btn btn-secondary">Volver</a>
                    </div>
                </div>

            </p>
            </form>
            </table>
        </div>
    </div>
</div>
@endsection