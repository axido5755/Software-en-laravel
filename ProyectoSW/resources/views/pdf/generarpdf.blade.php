{{-- Pagina de Creacion --}}
@extends('layout')

@section('content')

<div id="content" class="bg-grey w-100">

    <section class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8">
                    <h1 class="font-weight-bold mb-0">Generar Contrato en un PDF</h1>
                    <p class="lead text-muted">Seleccione el contrato que desea generar como PDF</p>
                </div>
                
            </div>
        </div>
    </section>

    <section class="bg-mix py-3">
    <div class="container">
        <div class="card rounded-0">
            <div class="card-body">
                <div class="row">

                   <form action="{{ url('/imprimir') }}" method="POST" enctype="multipart/form-data">
                    @csrf  
                        <div>
                            <label for="Descripcion" class="form-label"> Selecciona un Contrato: </label>
                            <select name="id_contrato" id="id_contrato" class="form-control custom-select">
                                @foreach ($contratos as $contratos)
                                <option value="{{$contratos['id_contrato']}}"> {{$contratos['id_contrato']}} </option>
                                @endforeach
                            </select>
                            <br>
                        </div>

                        <div class="row">
                            <div class="col-8">
                                <input type="submit" value="Enviar" id="enviar" class="btn btn-success float-right">
                                <a href="{{url('/contrato')}}" class="btn btn-secondary">Volver</a>
                            </div>
                        </div>
                        
                    </form>
                        
                </div>
            </div>
        </div>
    </div>
  </section>

  

</div>
@endsection
