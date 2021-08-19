@extends('layout')

@section('content')

<div class="card-header">
    <h3 class="card-title">Empresas</h3>
    <table class="table table-striped">

        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Contacto</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($empresa as $empresa)
            <tr>
                <td>{{ $empresa->nombre }}</td>
                <td>{{ $empresa->email }}</td>
                <td>{{ $empresa->contacto }}</td>
                <td>
                    <a href="{{ url('/empresa/'.$empresa->id_empresa.'/edit') }}">
                    <button type="submit" class="btn btn-warning" ">Editar</button>
                    </a>
                </td>
                <td>
                    <form action=" {{ url('/empresa/'.$empresa->id_empresa) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres Borrar?');">Borrar</button>
                    </form>
                </td>
                <td>
                    <a href="{{ url('/proveedor/') }}">
                    <button type="submit" class="btn btn-primary" ">Proveedores</button>
                    </a>
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
    <h5> Si desea agregar una empresa o proveedor</h5>
    <br>
    <a href="/empresa/create">
        <button type="button" class="btn btn-success"> <i class="fas fa-file-upload"></i> Agregar empresas </button>
    </a>
    <a href="/proveedor/create">
        <button type="button" class="btn btn-success"> <i class="fas fa-file-upload"></i> Agregar proveedor </button>
    </a>

</div>

@endsection
