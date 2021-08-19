@extends('layout')

@section('content')

<div class="card-header">
    <h3 class="card-title">Contenido contrato clausulas</h3>
    <table class="table table-striped">

        <thead>
            <tr>
                <th scope="col">Num.clausula</th>
                <th scope="col">Titulo</th>
                <th scope="col">Contenido</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($contenido_clausula as $contenido_clausula)
            <tr>
                <td>{{ $contenido_clausula->n_clausula }}</td>
                <td>{{ $contenido_clausula->titulo }}</td>
                <td>{{ $contenido_clausula->datos }}</td>
                @if ($Estado == 'Borrador')
                <td>
                    <a href="{{ url('/ContratoClausula/'.$id_contrato.'/'.$contenido_clausula->id_clausula.'/edit') }}">
                    <button type="submit" class="btn btn-warning">Editar</button>
                    </a> 
                </td>
                <td>
                    <a href="{{ url('/ContratoClausula/'.$id_contrato.'/'.$contenido_clausula->id_clausula.'/'.$contenido_clausula->datos.'/destroy2') }}">
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
    <h5> Si desea agregar un contrato de clausula</h5>
    <br>
        <a href="{{ url('/ContratoClausula/'.$id_contrato.'/create2') }}">
            <button type="submit" class="btn  btn-success" >Agregar contenido_clausulas</button>
        </a>
</div>
@endif

@endsection
