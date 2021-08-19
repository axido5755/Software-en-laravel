@extends('layout')

@section('content')


    <div class="card card-primary">
        <div class="card-header">
            <table class="table table-striped">
                <h1>Clausulas por defecto</h1>
                <form action="{{ url('ContratoClausula/'.$DatosContrato->id_contrato.'/AñadirClausulaDefecto') }}" method="post" enctype="multipart/form-data">
                    @csrf
            <div class="mb-2">
                <label for="exampleFormControlTextarea1" class="form-label">INFORMACION: </label>
                    <textarea name="Descripcion" id='Descripcion' class="form-control" rows="8" >
                    En {{$DatosContrato->Ciudad}}, a {{$DatosContrato->Fecha_Creacion}} comparecen, por una parte, la UNIVERSIDAD DEL SUR, Institución de Educación Superior, R.U.T. Nº 99.999.999-9 representada por su Vicerrector de Asuntos Económicos, don  {{$datDatosgeneralesa['nombre']}} {{$datDatosgeneralesa['apellido']}}, cédula de identidad número {{$datDatosgeneralesa['rut']}}, de acuerdo a personería que se indicará al final, ambos con domicilio en Concepción , en adelante, "La Universidad", y por la otra parte la empresa {{$datDatosgeneralesa['nombreE']}}, {{$datDatosgeneralesa['rutE']}}, representada según se acreditará al final por su representante legal don {{$datDatosgeneralesa['nombreP']}} cédula de identidad {{$datDatosgeneralesa['rutP']}}, Concepción, en adelante "La empresa {{$datDatosgeneralesa['nombreE']}}", quienes acuerdan lo siguiente:
                    </textarea>
            </div>

            <div class="mb-2">
                <label for="exampleFormControlTextarea1" class="form-label">PRIMERO: </label>
                    <textarea name="c1" id='c1' class="form-control" rows="3" >
                        La empresa Opciones S.A. Sistema de Información, se adjudicó la Licitación Pública para la contratación del suministro denominado "Arriendo de Computadores Desktops para la Universidad del Sur", según da cuenta el Decreto Universitario exento Nº 1749 de fecha 09 de marzo de 2015.
                    </textarea>
            </div>

            <div class="mb-2">
                <label for="exampleFormControlTextarea1" class="form-label">SEGUNDO: </label>
                    <textarea name="c2" id='c2' class="form-control" rows="6" >
                        Por este acto e instrumento la empresa, da en arriendo a la Universidad del Sur, quien lo acepta para sí, {{$DatosContrato->Numero_ComputadoresP1}} unidades de computadores Desktops, según perfil  1, y {{$DatosContrato->Numero_ComputadoresP2}} unidades de computadores Desktops, según perfil  2 para la contratación del suministro denominado "Arriendo de Computadores Desktops para la Universidad del Sur", llevado a efecto través del Sistema de Información a cargo de la Dirección de Compras y Contratación Pública bajo el Nº de Adquisición 2888-2-LP15 en los términos señalados en el presente contrato.
                    </textarea>
            </div>

            <div class="mb-2">
                <label for="exampleFormControlTextarea1" class="form-label">TERCERO: </label>
                    <textarea name="c3" id='c3' class="form-control" rows="7" >
                        La empresa se obliga a entregar a la Universidad del Sur, {{$DatosContrato->Numero_ComputadoresP1}} unidades de computadores Desktops perfil 1, y {{$DatosContrato->Numero_ComputadoresP2}} unidades de computadores Desktops perfil 2, dentro del plazo de 20 días hábiles, contados desde la total tramitación del acto administrativo que aprueba el presente contrato.

                        Dicho plazo no será susceptible de prórroga, salvo caso fortuito o fuerza mayor, hecho valer por la empresa antes del vencimiento del plazo original y que haya sido debidamente ponderado y aceptado por la Universidad.
                    </textarea>
            </div>

            <div class="mb-2">
                <label for="exampleFormControlTextarea1" class="form-label">CUARTO: </label>
                    <textarea name="c4" id='c4' class="form-control" rows="38" >
                        La empresa se obliga a entregar los equipos que se arriendan, con la siguiente descripción técnica:

                        Características Perfil 1
                        
                        •	Marca LENOVO
                        •	Nombre del modelo ThinkCentre M93 Mini Torre
                        •	Procesador lntel® Core i5-4690 ( 3,9 Ghz, 6 MB cache)
                        •	TARJETA DE VIDEO 1024MB GTX 750 se
                        •	Memoria RAM 8 GB 1600 MHz DDR3
                        •	Dispositivo de Puntero Mouse y Teclado USB
                        •	Disco Rígido 1 TB GB 7200 RPM S-ATA HDD
                        •	Unidad Optica DVD+/-RW
                        •	Formato Mini Torre
                        •	6 puertos USB, 1 puerto de red RJ45, 2 Display port conector DVI
                        •	Fuente de Poder de 280 Watts autosensing
                        •	Sistema Operativo Windows 8 SL
                        •	Monitor LEO 23 pulg DVI Wide
                        •	Pad mouse
                        •	Candado para monitor
                        
                        Características Perfil 2
                        
                        •	Marca LENOVO
                        •	Nombre del modelo ThinkCentre M93 Mini Torre
                        •	Procesador lntel® Core i?-4790 ( 3,6 Ghz, 8 MB cache)
                        •	TARJETA DE VIDEO 1024MB GTX 750 se
                        •	Memoria RAM 8 GB 1600 MHz DDR3
                        •	Dispositivo de Puntero Mouse y Teclado USB
                        •	Disco Rígido 1 TB GB 7200 RPM S-ATA HDD
                        •	Unidad Optica DVD+/-RW
                        •	Formato Mini Torre
                        •	6 puertos USB, 1 puerto de red RJ45, 2 Display port conector DVI
                        •	Fuente de Poder de 280 Watts autosensing
                        •	Sistema Operativo Windows 8 SL
                        •	Monitor LEO 23 pulg DVI Wide
                        •	Pad mouse
                        •	Candado para monitor
                    </textarea>
            </div>

            <div class="mb-2">
                <label for="exampleFormControlTextarea1" class="form-label">QUINTO: </label>
                    <textarea name="c5" id='c5' class="form-control" rows="8" >
                        La empresa se obliga a entregar {{$DatosContrato->Numero_ComputadoresP1}} unidades de computadores desktops perfil 1 y {{$DatosContrato->Numero_ComputadoresP2}} unidades de computadores desktops perfil 2, en la Sede Concepción en el Departamento de Servicios Computacionales, Dirección de Informática, Avenida CHILE 9999, Concepción, a doña AAAAA AAAA y {{$DatosContrato->Numero_ComputadoresP1}} unidades de computadores desktops perfil 1, en la Sede Valdivia en el Departamento de Servicios, Dirección de Informática, Avenida Andrés Bello sin, Valdivia, a don Miguel Lagos.

                        Dicha entrega deberá ser acreditada con un documento de recepción conforme entregado por el Departamento de Servicios Computacionales,para la Sede Concepción y por el Departamento de Servicios, para la Sede Valdivia, al que según lo indicado corresponda la entrega y recepción de los equipos.
                    </textarea>
            </div>

            <div class="mb-2">
                <label for="exampleFormControlTextarea1" class="form-label">QUINTO: </label>
                    <textarea name="c5" id='c5' class="form-control" rows="8" >
                        La empresa se obliga a entregar {{$DatosContrato->Numero_ComputadoresP1}} unidades de computadores desktops perfil 1 y {{$DatosContrato->Numero_ComputadoresP2}} unidades de computadores desktops perfil 2, en la Sede Concepción en el Departamento de Servicios Computacionales, Dirección de Informática, Avenida CHILE 9999, Concepción, a doña AAAAA AAAA y {{$DatosContrato->Numero_ComputadoresP1}} unidades de computadores desktops perfil 1, en la Sede Valdivia en el Departamento de Servicios, Dirección de Informática, Avenida Andrés Bello sin, Valdivia, a don Miguel Lagos.

                        Dicha entrega deberá ser acreditada con un documento de recepción conforme entregado por el Departamento de Servicios Computacionales,para la Sede Concepción y por el Departamento de Servicios, para la Sede Valdivia, al que según lo indicado corresponda la entrega y recepción de los equipos.
                    </textarea>
            </div>

            <div class="mb-2">
                <label for="exampleFormControlTextarea1" class="form-label">SEXTA: </label>
                    <textarea name="c6" id='c6' class="form-control" rows="15" >
                        La empresa deberá presentar al momento de la entrega de los equipos que se arrienden, garantía del correcto funcionamiento de los equipos y de los que en definitiva se incorporen al contrato, ya sea por reemplazo y/o aumento, temporal o definitivo, por todo el periodo de duración del contrato. Dicha garantía deberá tener las siguientes coberturas:

                        1.- Una cobertura de {{$DatosContrato->Duracion_Contrato}} meses de garantía en piezas, partes y componentes de los equipos.
                        2.- Una cobertura de {{$DatosContrato->Duracion_Contrato}} meses por mano de obra técnica, en caso de reparación o cambio de alguno de los elementos mencionados en el punto 4.
                        3.- Una cobertura de. {{$DatosContrato->Duracion_Contrato}} meses de atención de la garantía en las dependencias de la Universidad.
                        
                        La garantía técnica y de servicio empezará a regir a contar de la entrega de los equipos en la Universidad y la recepción conforme de ésta.Todo el equipamiento ofertado deberá estar asegurado con las siguientes coberturas; SISMOS, INUNDACIÓN, INCENDIO, ROBOS Y ACTOS VANDÁLICOS. En la eventualidad de que sea necesario activar el seguro por algún incidente, la empresa deberá responder de acuerdo a las condiciones de servicio establecidas en la cláusula séptima del presente contrato, esto es, reemplazando o reparando el (o los) equipo(s) siniestrado(s) según corresponda. Será de exclusiva responsabilidad del contratista la relación con la empresa aseguradora.En caso de ocurrir un siniestro la Universidad deberá efectuar la denuncia respectiva ante la autoridad policial y remitir dicho parte a Opciones S.A. Sistema de Información, para su tramitación.
                    </textarea>
            </div>

            <div class="mb-2">
                <label for="exampleFormControlTextarea1" class="form-label">SEPTIMA: </label>
                    <textarea name="c7" id='c7' class="form-control" rows="3" >
                        La duración del contrato será de {{$DatosContrato->Duracion_garantia}} meses, contados desde la fecha de notificación de la total tramitación del acto administrativo que apruebe el contrato.
                    </textarea>
            </div>
            <Br>
            <div class="row">
                <div class="col-8">
                    <input type="submit" value="Agregar mas clausulas" id="enviar" class="btn btn-success float-right">
                    <a href="{{url('/contrato')}}" class="btn btn-secondary">No agregar clausulas</a>
                </div>
            </div>
        </form>
            </table>
        </div>
    </div>
@stop