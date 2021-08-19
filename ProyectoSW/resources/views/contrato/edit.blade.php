{{-- Create de Contrato --}}
@extends('layout')

@section('content')

<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Editar Contrato</h3>
            <br>
            <table class="table table-striped">
                <form action="{{ url('/contrato/'.$contrato->id_contrato) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                    @if(count($errors)>0)
                    <div class="alert alert-danger" role="alert">

                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}} </li>
                        @endforeach
                    </ul>

                    </div>
                    @endif
                    <div>
                        <label for="Usuario"> Usuario: </label>
                        <input type="text" name="Usuario" id="Usuario" value="{{$contrato->Usuario}}" class="form-control" disabled>
                        <br>  
                    </div>
                    <br>

                    <div>
                        <label for="Proveedor" class="form-label"> Selecciona proveedor: </label>
                        <select name="id_proveedor" id="id_proveedor" class="form-control custom-select">
                            <option value="">-- Escoja el nombre del proveedor --</option>
                            @foreach ($datosProveedor as $datosProveedor)
                            @if ($datosProveedor['id_proveedor'] == $contrato->id_proveedor)
                            <option selected="true" value="{{$datosProveedor['id_proveedor']}}"> {{$datosProveedor['nombre']}} </option>
                            @else
                            <option value="{{$datosProveedor['id_proveedor']}}"> {{$datosProveedor['nombre']}} </option>
                            @endif
                            
                            @endforeach
                        </select>
                        {!! $errors->first('id_proveedor','<div class="invalid-feedback"> :message</div>') !!}
                    </div>
                    <br>      

                    <div class="mb-3">
                        <label for="TextArea" class="form-label"> Ingresa una Descripción</label>
                        <textarea name="Descripcion" id='Descripcion' class="form-control" rows="3">{{$contrato->Descripcion}}</textarea>
                        {!! $errors->first('Descripcion','<div class="invalid-feedback"> :message</div>') !!}
                    </div>
                    <br>

                    <div>
                        <label for="Estado"> Ingresa el Estado del Contrato : </label>
                        <select name="Estado" id="Estado" class="form-control custom-select">
                            <option value="Borrador">Borrador</option>
                            <option value="Vigente">Vigente</option>   
                        </select>
                        {!! $errors->first('Estado','<div class="invalid-feedback"> :message</div>') !!}
                    </div>
                    <br>

                    <div>
                        <label for="Ciudad"> Ciudad: </label>
                        <input type="text" name="Ciudad" id='Ciudad' class="form-control" value="{{$contrato->Ciudad}}">
                        {!! $errors->first('Ciudad','<div class="invalid-feedback"> :message</div>') !!}
                        <br>
                    </div>

                    <div>
                        <label for="Numero_ComputadoresP1"> Número de Computadores Perfil 1: </label>
                        <input type="text" name="Numero_ComputadoresP1" id='Numero_ComputadoresP1' class="form-control" value="{{$contrato->Numero_ComputadoresP1}}">
                        {!! $errors->first('Numero_ComputadoresP1','<div class="invalid-feedback"> :message</div>') !!}
                        <br>
                    </div>

                    <div>
                        <label for="Numero_ComputadoresP2"> Número de Computadores Perfil 2: </label>
                        <input type="text" name="Numero_ComputadoresP2" id='Numero_ComputadoresP2' class="form-control" value="{{$contrato->Numero_ComputadoresP2}}"> 
                        {!! $errors->first('Numero_ComputadoresP2','<div class="invalid-feedback"> :message</div>') !!}
                        <br>
                    </div>

                    <div>
                        <label for="Duracion_garantia"> Duración de la garantia: </label>
                        <input type="text" name="Duracion_garantia" id='Duracion_garantia' class="form-control" value="{{$contrato->Duracion_garantia}}">
                        {!! $errors->first('Duracion_garantia','<div class="invalid-feedback"> :message</div>') !!}
                        <br>
                    </div>                   

                    <div>
                        <label for="Duracion_Contrato"> Duración del Contrato: </label>
                        <input type="text" name="Duracion_Contrato" id='Duracion_Contrato' class="form-control" value="{{$contrato->Duracion_Contrato}}"> 
                        {!! $errors->first('Duracion_Contrato','<div class="invalid-feedback"> :message</div>') !!}
                        <br>
                    </div>

                    <div>
                        <label for="Fecha_Creacion"> Selecciona la Fecha de Creación: </label>
                        <input type="date" name="Fecha_Creacion" id="Fecha_Creacion" class="form-control" value="{{$contrato->Fecha_Creacion}}">
                        {!! $errors->first('Fecha_Creacion','<div class="invalid-feedback"> :message</div>') !!}
                        <br>
                    </div>
                 

                    <div class="row">
                        <div class="col-8">
                            <input type="submit" value="Enviar" id="enviar" class="btn btn-success float-right">
                            <a href="{{url('/contrato')}}" class="btn btn-secondary">Volver</a>
                        </div>
                    </div>

                </form>
            </table>

        </div>
    </div>
</div>

@endsection

 