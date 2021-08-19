@extends('layout')

@section('content')

<div class="card-header">
    <h3 class="card-title">Proveedor</h3>
    <table class="table table-striped">

        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Contacto</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($proveedor as $proveedor)
            <tr>
                <td>{{ $proveedor->nombre }}</td>
                <td>{{ $proveedor->email }}</td>
                <td>{{ $proveedor->contacto }}</td>
                <td>
                    <a href="{{ url('/proveedor/'.$proveedor->id_proveedor.'/edit') }}">
                    <button type="submit" class="btn btn-warning" ">Editar</button>
                    </a>
                </td>
                <td>
                    <form action=" {{ url('/proveedor/'.$proveedor->id_proveedor) }}" method="post">
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
    <h5> Si desea agregar un proveedor</h5>
    <br>
    <a href="/proveedor/create">
        <button type="button" class="btn btn-success"> <i class="fas fa-file-upload"></i> Agregar proveedor </button>
    </a>

</div>

@endsection
