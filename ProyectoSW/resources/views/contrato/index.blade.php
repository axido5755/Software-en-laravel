{{-- Index de contrato --}}

@extends('layout')

@section('content')

<div class="card-header">
    <h3 class="card-title">Lista de Contratos</h3>
    <table class="table table-striped table-borderless">

        <thead>
            <tr>
                <th scope="col">Creador</th>
                <th scope="col">Estado</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Garantia</th>
                <th scope="col">Duracion</th>
                <th scope="col">Nº perfil 1</th>
                <th scope="col">Nº perfil 2</th>
                <th scope="col">Fecha de creacion</th>
                <th scope="col">Descripcion</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($contrato as $contrato)
            <tr>
                <td>{{ $contrato->Usuario }}</td>

                @if ($contrato->Estado == 'Borrador')
                <td  style=" background-color: #f1a20f17;">{{ $contrato->Estado }}</td>
                @endif
                 
                @if ($contrato->Estado == 'Vigente')
                <td  style=" background-color: #39d67a21; ">{{ $contrato->Estado }}</td>
                @endif
                
                <td>{{ $contrato->Ciudad }}</td>
                <td>{{ $contrato->Duracion_Contrato}}</td>
                <td>{{ $contrato->Duracion_garantia}}</td>
                <td>{{ $contrato->Numero_ComputadoresP1}}</td>
                <td>{{ $contrato->Numero_ComputadoresP2}}</td>
                <td>{{ $contrato->Fecha_Creacion }}</td>
                <td>{{ $contrato->Descripcion }}</td>
                
                
                <td>
                    @if ($contrato->Estado == 'Borrador')
                    <a href="{{ url('/contrato/'.$contrato->id_contrato.'/edit') }}">
                    <button type="submit" class="btn btn-warning" >Editar</button>
                    </a>
                    @endif
                </td> 
                {{-- <td>
                    @if ($contrato->Estado == 'Borrador')
                    <a href="{{ url('/contrato/'.$contrato->id_contrato.'/download') }}">
                    <button type="submit" class="btn btn-success" >PDF</button>
                    </a>
                    @endif
                </td> --}}
                <td>
                    @if ($contrato->Estado == 'Borrador')
                    <form action=" {{ url('/contrato/'.$contrato->id_contrato) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres Borrar?');">Borrar</button>
                    </form>
                    @endif
                </td>
               
                <td>
                    <a href="{{ url('/ContratoClausula/'.$contrato->id_contrato.'/index2') }}">
                        <button type="submit" class="btn btn-primary" >Clausula</button>
                        </a>
                </td>
                <td>
                    <a href="{{ url('/anexos/'.$contrato->id_contrato.'/index2') }}">
                        <button type="submit" class="btn btn-secondary" >Anexo</button>
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
    <h5> Si desea crear un contrato</h5>
    <br>
    <a href="/contrato/create">
        <button type="button" class="btn btn-success"> <i class="fas fa-file-upload"></i> Crear contrato </button>
    </a>

</div>

@endsection