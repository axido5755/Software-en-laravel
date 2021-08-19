@extends('layout')

@section('content')

<div class="card-header">
    <h3 class="card-title">Clausulas del anexo {{$id_anexo}} </h3>
    <table class="table table-striped">

        <thead>
            <tr>
                <th scope="col">n_clausula</th>
                <th scope="col">Titulo</th>
                <th scope="col">Datos</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($contenido_anexo as $contenido_anexo)
            <tr>
                <td>{{ $contenido_anexo->n_clausula }}</td>
                <td>{{ $contenido_anexo->titulo }}</td>
                <td>{{ $contenido_anexo->datos }}</td>
                
                @if ($Estado == 'Borrador')

                <td>
                    <a href="{{ url('/AnexoClausula/'.$contenido_anexo->id_anexo.'/'.$contenido_anexo->id_clausula.'/edit') }}">
                    <button type="submit" class="btn btn-warning">Editar</button>
                    </a>  
                </td>
                
                <td>
                    <a href="{{ url('/AnexoClausula/'.$contenido_anexo->id_anexo.'/'.$contenido_anexo->id_clausula.'/'.$contenido_anexo->datos.'/destroy2') }}">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres Borrar?');">Borrar</button>
                    </a> 
                    </form>
                </td> 
                @endif
            </tr>
            @endforeach
        </tbody>

    </table>
</div>

@if ($Estado == 'Borrador')
<br>
<div class="card-header text-center">
    <br>
    <br>
    <h5> Si desea agregar una contenido_anexo</h5>
    <br>
    
    <a href="{{ url('/AnexoClausula/'.$id_anexo.'/create2')}}">
        <button type="button" class="btn btn-success"> <i class="fas fa-file-upload"></i> Agregar Clausulas al anexo </button>
    </a>

</div>
@endif
@endsection
