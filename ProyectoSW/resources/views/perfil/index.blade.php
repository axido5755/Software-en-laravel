{{-- Index de Perfil --}}

@extends('layout')

@section('content')

<div class="card-header">
    <h3 class="card-title">Perfil de Computadores</h3>
    <table class="table table-striped">

        <thead>
            <tr>
                <th scope="col">Procesador</th>
                <th scope="col">Ram</th>
                <th scope="col">Dvd</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($perfil as $perfil)
            <tr>
                <td>{{ $perfil->procesador }}</td>
                <td>{{ $perfil->ram }}</td>
                <td>{{ $perfil->dvd }}</td>
                <td>
                    <a href="{{ url('/perfil/'.$perfil->id_perfil.'/edit') }}">
                    <button type="submit" class="btn btn-warning" ">Editar</button>
                    </a>
                </td>
                <td>
                    <form action=" {{ url('/perfil/'.$perfil->id_perfil) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres Borrar?');">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>

<br>
<div class="card-header text-center">
    <br>
    <br>
    <h5> Si desea añadir un perfil</h5>
    <br>
    <a href="/perfil/create">
        <button type="button" class="btn btn-success"> <i class="fas fa-file-upload"></i> Añadir perfil </button>
        
    </a>

</div>

@endsection
