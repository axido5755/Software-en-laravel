

@extends('layout')

@section('content')

<div class="card-header text-center">
   
    <h3 class="card-title">Crear o Subir un Contrato</h3>
    <br>
    <h5>Si desea crear un contrato desde una plantilla:</h5>
    <br>
    <a href="/subir">
        <button type="button" class="btn btn-success"> <i class="fas fa-file-signature"></i> Crear Contrato </button>        
    </a>
    <br>
    <br>
    <h5> Si desea guardar un contrato previamente creado:</h5>
    <br>
    <a href="/contrato/create">
        <button type="button" class="btn btn-success"> <i class="fas fa-file-upload"></i> Subir Contrato </button>
    </a>

</div>

@endsection
