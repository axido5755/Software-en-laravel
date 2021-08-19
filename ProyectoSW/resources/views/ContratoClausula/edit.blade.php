@extends('layout') 
@section('content')

<div class="card-header">
    <h3 class="card-title">Clausulas</h3>
    <table class="table table-striped">

        <label for="titulo"> titulo : </label>
        <input type="text" name="titulo" id='titulo' class="form-control" value="{{ $contenido_clausula[0]->titulo }}" disabled>
        <br>

        <label for="n_clausula"> Nº Clausula : </label>
        <input type="text" name="n_clausula" id='n_clausula' class="form-control" value="{{ $contenido_clausula[0]->n_clausula }}" disabled>
        <br>

    <form action="{{ url('/ContratoClausula/'.$contenido_clausula[0]->id_contrato.'/'.$contenido_clausula[0]->id_clausula.'/update2') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <label for="datos"> Datos : </label>
        <textarea name="datos" id="datos" cols="30" rows="10" class="form-control">{{ $contenido_clausula[0]->datos }}</textarea>
        {{-- <input type="text" name="datos" id='datos' class="form-control" value="{{ $contenido_clausula[0]->datos }}"> --}}
        <br>

        <input type="submit" value="Guardar" id="enviar" class="btn btn-success float-right">
    </form>

    </table>
</div>
@endsection