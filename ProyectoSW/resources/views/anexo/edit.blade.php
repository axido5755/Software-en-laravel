{{-- Edite de ANEXO --}}

@extends('layout')

@section('content')
   
<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Editar el anexo {{ $anexo->titulo }}</h3>
            <br>
            <table class="table table-striped">
                <form action="{{ url('/anexo/'.$anexo->id_anexo) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
            
                        <label for="n_anexo"> Ingresa el Numero : </label>
                        <input type="text" name="n_anexo" id='n_anexo' class="form-control" value="{{ $anexo->n_anexo }}"> 
                        <br>
                        <label for="titulo"> Ingresa el Titulo : </label>
                        <input type="text" name="titulo" id='titulo' class="form-control" value="{{ $anexo->titulo }}">
                        <br>
                        <label for="contenido"> Contenido del Anexo: </label>
                        <textarea name="contenido" id='contenido' class="form-control" rows="5" class="form-control" value="">{{ $anexo->contenido }}</textarea>
                        <br>

                        <input type="submit" value="Guardar" id="enviar" class="btn btn-success float-right">
            
                </form>
            </table>

        </div>
    </div>
</div>

@endsection