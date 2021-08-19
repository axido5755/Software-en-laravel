{{-- Index de anexo --}}

@extends('layout')

@section('content')

<div class="card-header">
    <h3 class="card-title">Anexos de Computadores</h3>
    <table class="table table-striped">

        <thead>
            <tr>
                <th scope="col">N° anexos</th>
                <th scope="col">Título</th>
                <th scope="col">Contenido</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($anexo as $anexos)
            <tr>
                <td>{{ $anexos->n_anexo }}</td>
                <td>{{ $anexos->titulo }}</td>
                <td>{{ $anexos->contenido }}</td>
                
                @if ($Estado == 'Borrador')
                    
                
                <td>
                    <a href="{{ url('/anexo/'.$anexos->id_anexo.'/edit') }}">
                    <button type="submit" class="btn btn-warning" ">Editar</button>
                    </a>
                </td>
                <td>
                    <form action=" {{ url('/anexo/'.$anexos->id_anexo) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres Borrar?');">Borrar</button>
                    </form>
                </td>
                @endif
                <td>
                    <a href="{{ url('/AnexoClausula/'.$anexos->id_anexo.'/index2') }}">
                    <button type="submit" class="btn btn-primary" ">Clausula</button>
                    </a>
                </td>
                
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
    <h5> Si desea añadir un anexo</h5>
    <br>
   
    <a href="{{ url('anexos/'.$id_contrato.'/create2') }}">
      <button type="button" class="btn btn-success" >Agregar anexo</button>
  </a>
</div>
@endif
@endsection