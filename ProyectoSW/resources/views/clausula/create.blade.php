{{-- Crete de clausula --}}

@extends('layout')

@section('content')
   
<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Guardar una nueva Clausula</h3>
            <br>
            <table class="table table-striped">
                <form action="{{ url('/clausula') }}" method="post" enctype="multipart/form-data">
                    @csrf
            
                        <label for="n_clausula"> Ingresa el Numero : </label>
                        <input type="text" name="n_clausula" id='n_clausula' class="form-control">
                        <br>
                        <label for="titulo"> Ingresa el Titulo : </label>
                        <input type="text" name="titulo" id='titulo' class="form-control">
                        <br>
                        <label for="Contenido"> Contenido de la Clausula: </label>
                        <textarea name="Contenido" id='Contenido' class="form-control" rows="5" class="form-control"></textarea>
                        <br>

                        <input type="submit" value="Enviar" id="enviar" class="btn btn-success float-right">
            
                </form>
            </table>

        </div>
    </div>
</div>

@endsection
