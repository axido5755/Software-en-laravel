{{-- Crete de anexo --}}

@extends('layout')

@section('content')
@if(count($errors)>0)
                <div class="alert alert-danger" role="alert">

                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}} </li>
                        @endforeach
                    </ul>

                </div>
                @endif
<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Guardar un nuevo Anexo</h3>
            <br>
            <form action="{{ url('anexos/'.$id_contrato.'/store2') }}" method="post" enctype="multipart/form-data">
                @csrf

                

        <label for="n_anexo"> Ingresa el Numero : </label>
        <input type="number" name="n_anexo" id='n_anexo' class="form-control">
        {!! $errors->first('n_anexo','<div class="invalid-feedback"> :message</div>') !!}
        <br>

        <label for="titulo"> Ingresa el Titulo : </label>
        <input type="text" name="titulo" id='titulo' class="form-control">
        {!! $errors->first('titulo','<div class="invalid-feedback"> :message</div>') !!}
        <br>
        
        <label for="Contenido"> Contenido del Anexo: </label>
        <textarea name="Contenido" id='Contenido' class="form-control" rows="20" class="form-control"></textarea>
        {!! $errors->first('Contenido','<div class="invalid-feedback"> :message</div>') !!}
        <br>

        <input type="submit" name="action" value="Agregar Clausulas" id="Enviar" class="btn btn-secondary float-right">
        <input type="submit" name="action" value="Guardar anexo" id="Enviar" class="btn btn-success float-right">

        </form>


    </div>
</div>
</div>

@endsection
