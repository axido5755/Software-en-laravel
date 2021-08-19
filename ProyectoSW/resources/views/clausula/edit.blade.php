{{-- Edite de clausula --}}

@extends('layout')

@section('content')
   
<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Editar la clausula {{ $clausula->titulo }}</h3>
            <br>
            <table class="table table-striped">
                <form action="{{ url('/clausula/'.$clausula->id_clausula) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
            
                        <label for="n_clausula"> Ingresa el Numero : </label>
                        <input type="text" name="n_clausula" id='n_clausula' class="form-control" value="{{ $clausula->n_clausula }}"> 
                        <br>
                        <label for="titulo"> Ingresa el Titulo : </label>
                        <input type="text" name="titulo" id='titulo' class="form-control" value="{{ $clausula->titulo }}">
                        <br>
                        <label for="Contenido"> Contenido de la Clausula: </label>
                        <textarea name="Contenido" id='Contenido' class="form-control" rows="5" class="form-control" value="{{ $clausula->Contenido }}"></textarea>
                        <br>

                        <input type="submit" value="Guardar" id="enviar" class="btn btn-success float-right">
            
                </form>
            </table>

        </div>
    </div>
</div>

@endsection