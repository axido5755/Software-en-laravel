{{-- Create de Perfiles de computadores, este no lo deberiamos ocupar, actualmente estamos con un seeder para los datos de aca --}}

@extends('layout')

@section('content')

<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Guardar un nuevo Contrato</h3>
            <br>
            <table class="table table-striped">

    <form action="{{ url('/perfil') }}" method="post" enctype="multipart/form-data">
        @csrf
        <p>
            <label for="procesador"> Ingresa el procesador : </label>
            <input type="text" name="procesador" id='procesador' class="form-control">
            <br>
            <label for="ram"> Ingresa el ram : </label>
            <input type="text" name="ram" id='ram' class="form-control">
            <br>
            <label for="hdd"> Ingresa el hdd : </label>
            <input type="text" name="hdd" id='hdd' class="form-control">
            <br>
            <label for="dvd"> Ingresa el dvd : </label>
            <input type="text" name="dvd" id='dvd' class="form-control">
            <br>
            <label for="tarjeta_sonido"> Ingresa el tarjeta_sonido : </label>
            <input type="text" name="tarjeta_sonido" id='tarjeta_sonido' class="form-control">
            <br>
            <label for="tarjeta_grafica"> Ingresa el tarjeta_grafica : </label>
            <input type="text" name="tarjeta_grafica" id='tarjeta_grafica' class="form-control">
            <br>
            <label for="tarjeta_red"> Ingresa el tarjeta_red : </label>
            <input type="text" name="tarjeta_red" id='tarjeta_red' class="form-control">
            <br>
            <label for="teclado"> Ingresa el teclado : </label>
            <input type="text" name="teclado" id='teclado' class="form-control">
            <br>
            <label for="monitor"> Ingresa el monitor : </label>
            <input type="text" name="monitor" id='monitor' class="form-control">
            <br>
            <label for="gabinete"> Ingresa el gabinete : </label>
            <input type="text" name="gabinete" id='gabinete' class="form-control">
            <br>
            <label for="mouse"> Ingresa el mouse : </label>
            <input type="text" name="mouse" id='mouse' class="form-control">
            <br>
            <label for="fuente_poder"> Ingresa el fuente_poder : </label>
            <input type="text" name="fuente_poder" id='fuente_poder' class="form-control">
            <br>
            <label for="velocidad_hd"> Ingresa el velocidad_hd : </label>
            <input type="text" name="velocidad_hd" id='velocidad_hd' class="form-control">
            <br>
            <label for="bajo_impacto_acustico"> Ingresa el bajo_impacto_acustico 1 o 0! : </label>
            <input type="text" name="bajo_impacto_acustico" id='bajo_impacto_acustico' class="form-control">
            <br>
    
            <div class="row">
                <div class="col-8">
                    <input type="submit" value="Enviar" id="enviar" class="btn btn-success float-right">
                    <a href="{{url('/perfil')}}" class="btn btn-secondary">Volver</a>
                </div>
            </div>

        </p>

    </form>
            </table>

        </div>
    </div>
</div>
@endsection
