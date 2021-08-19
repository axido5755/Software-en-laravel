{{-- Index de clausula --}}

@extends('layout')

@section('content')

<form action="{{ url('/ContratoClausula/'.$dato.'/store2') }}" method="post" enctype="multipart/form-data">
{{-- <form action="{{ route('ContratoClausula.store') }}" method="POST" id="insert_form"> --}}
    @csrf

        <div class="card">
            <div class="card-header">
                Contrato
                {{$dato}}
            </div>

            <div class="card-body">
                <table class="table clausula_table" id="clausula_table">
                    <thead>
                    <tr>
                        <th class = "col-md-2">Tipo</th>
                        <th >Clausula</th>
                        <th></th>
                    </tr>
                    </thead>
                        <tbody></tbody>
                </table>
                <div class="row ">
                    <div class="col-md-12 center12313123" >
                        <input class= "btn btn-sm btn-secondary add " type ="button" name ="add" id="add" value = "Añadir otra fila de clausula" >
               
                        <input class= "btn btn-sm btn-primary addclausula " type ="button" name ="addclausula" id="addclausula" value = "Agregar clausula al formulario" >
                    </div>
                </div>

            
                <input type="submit" name="action" value="Agregar Anexo" id="Enviar" class="btn btn-secondary float-right">
                <input type="submit" name="action" value="Guardar Contrato" id="Enviar" class="btn btn-success float-right">
            </div>
        </div>
    </form>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">                                             //****-SCRIPT PARA AL SELECCIONAR UN SELECT SE RELLENE EL TEXTAREA -****
	$(document).ready(function(){
		$(document).on('change','.Select_Clausulas',function () {
			var prod_id=$(this).val();
            var sub_category_id = $(this).data('sub_category_id');
			$.ajax({
				type:'get',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				url:'{!!URL::to('findcontenido')!!}',
				data:{'id_clausula':prod_id},
				dataType:'json',
				success:function(data){                                
                    $("#item_sub_category" +sub_category_id ).val(data.Contenido); // AGREGO CONTENIDO SLECCIONADO AL TEXTAREA
				},
				error:function(){
                    alert("fail");
				}
			});


		});

	});
</script>

<script>                                            //****-SCRIPT PARA AGREGAR FILAS A LA TABLA -****
$(document).ready(function(){
    var count = 0;
    addclausula();                                  // AGREGA UNA PRIPERA COLUMNA CON LA FUNCION ADDCLAUSULA

    $(document).on('click','.add', function(){      // CLICK EN BOTON (BOTONUEVO) LLAMA A FUNCION NUEVO (AGREGA UN HTML QUE ES TODA UNA FILA)
        addclausula(); 
        ActualizarSelectClausula();                 // ACTUALIZA EL SELECT DE LA CLAUSULA SI EXISTE O NO UNA NUEVA CLAUSULA LLAMA A FUNCION ACTUALZIASELECTCLAUSULA
    });

    $(document).on('click', '.remove', function(){  // CLICK EN BOTON (BTNBORRAR) CIERRA UN TR DE LA TABLA (TR FILAS DE TABLAS)
        $(this).closest('tr').remove();
    });

    function addclausula(){                         // FUNCION ADDCLAUSULA. AGREGA UN HTML DE TR A LA BODY DE LA TABLA 
        count++;
        var html = '';

html += '<tr>';

html +=                '<td>'+
                           '<select name = "Select_Clausulas[]" class="form-select Select_Clausulas" aria-label="Default select example"'+
                           'required ="" data-sub_category_id="'+count+'">'+
                                   '<option value="" >-- Tipo de clausula --</option>'+
                               '@foreach($datosC as $clausula)'+
                                   '<option  value="{{ $clausula ->id_clausula}}">'+
                                       '{{ ucfirst($clausula->titulo) }}</option>'+
                               '@endforeach'+
                           '</select>'+
                      '</td>';

html +=                '<td>'+
                           '<textarea name="item_sub_category[]" class="form-control item_sub_category "  rows="15" required ="" id="item_sub_category'+count+'"></textarea>'+
                       '</td>';

html +=                 ' <td>' +
                           '<input class= "btn btn-sm btn-secondary remove" type ="button" name ="remove" id="remove" value = "ELIMINAR" >'
                       '</td>';
$('tbody').append(html);
    };
});

</script>

<script>

    $(document).on('click','.addclausula', function(){     //CLICK EN AGREGAR CLAUSULA LLAMA A FUNCION NUEVO()(LLAMA A VENTANAS PARA AGREGAR CLAUSULA)
            nuevo();
    });

    function nuevo(){
        Swal.mixin({

        icon: "question",
        //puede ser text, number, email, password, textarea, select, radio
        confirmButtonText: 'Confirmar ',
        confirmButtonColor: "#80FF33",
        showCancelButton: true,
        progressSteps: [1,2,3],


    }).queue(
        [
    {
        input: 'number',                 //INGRESA NUMERO DE CLAUSULA
            title: 'N° clausula',
            text:'Ingrese n° clausula',
            inputValidator: (value) => {
                if (!value) {
                return 'Debes ingrasar texto'
                }
                // if (!esNumero(value)) {
                // return 'Deben ser solo numeros  mayores a 0'
                // }
                if (validarnumeracionclausula(value)) {
                return 'Deben ser solo numeros  mayores a 0'
                }

                if (value<=0) {
                return 'Deben ser solo numeros mayores a 0'
                }
            }
    },
    {
        input: 'text',                 //INGRESA TITULO DE CLAUSULA
            title: 'Titulo de clausula',
            text:'Ingrese Tituto',
            inputValidator: (value) => {
                if (!value) {
                return 'Debes ingrasar texto'
                }
            }
    },
    {
        input: 'textarea',                 //INGRESA CONTENIDO DE CLAUSULA
            title: 'Contenido clausula',
            text:'Ingresar contenido:',
            inputValidator: (value) => {
                if (!value) {s
                return 'Debes ingrasar texto'
                }
            }
    },
    {
        icon: "warning",
        title: '¡Un momento!',
        text: 'Se agragara una nueva clausula',
    },
    ]).then((result) => {

        const datos={                                // ENTREGA RESULTADOS DEL LO QUE SE INGRESA
            n_clausula:result.value[0],
            titulo:result.value[1],
            Contenido:result.value[2]
        }
        console.log(datos);
        // subir informacion
        $.ajax({                                    //SE AGREGA LA CLAUSULA LLAMANDO A LA FUNCION GUARDARCLAUSULA EN EL CONTROLLER
            type:"POST",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			url:'{!!URL::to('guardarclusula')!!}',
            data:datos,
            success:function(data){
                AgregarDatoAlSelect();         //LLAMO A LA FUNCION AGREGARDATOALSELECT QUE AGREGA LOS DATOS NUEVOS AL SELECT
				},
				error:function(){
                    alert("fail");
				}
        });
    });
    }

    const Datosnuevos = [];
    var ConstDatosnuevos = 0;
    function AgregarDatoAlSelect(){          //AGREGO LA CLAUSULA NUEVA A LOS SELECT YA CREADOS
        $(document).ready(function(){
			$.ajax({
				type:'get',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				url:'{!!URL::to('findultimaclausula')!!}',
				dataType:'json',
				success:function(data){
                    Datosnuevos[ConstDatosnuevos] = data;
                    ConstDatosnuevos++;
                    $('.Select_Clausulas').append($('<option>').val(data.id_clausula).text(data.titulo)); // AÑADE ELEMENTO AL SELECT
				},
				error:function(){
                    alert("fail");
				}
			});
        console.log(Datosnuevos[0]);
		
	});
    }

    function ActualizarSelectClausula(){          //AGREGO LA CLAUSULA NUEVA A LOS SELECT QUE SE VAN AÑADIENDO EN EL TDR
    for (let indexx = 0; indexx < Datosnuevos.length; indexx++) {      //BUSCO EL ARREGLO DE LAS CLAUSULAS QUE SE CREARON
    $( "select" ).each(function(index, element) {                      // RECORRO TODOS LOS SELECT QUE EXISTEN EN ESTE PHP
        let aux = false;
        var count = 1;
        let option_text;
        let option_value ;
        Array.from(element).forEach(function(option_element) {         // RECORRO TODAS LAS OPCIONES DE ESTE SELECT
             option_text = option_element.text;
             option_value = option_element.value;
            if (Datosnuevos[indexx].id_clausula == option_value) {    // COMPARO LA CLAUSULA NUEVA(DATONUEVO) CON EL VALUE Y EL TEXT DE LAS OPCIONES DEL SELECT
                if(Datosnuevos[indexx].titulo == option_text){
                    aux = true;
                }
            }
                if(aux == false && count == element.length){          // SI NO SE COMPARO CON NADIE QUIERE DECIR QUE ESA CLAUSULA NO EXISTE ENTONCES LA AÑADE
                    $(element).append($('<option>').val(Datosnuevos[indexx].id_clausula).text(Datosnuevos[indexx].titulo)); // AÑADE ELEMENTO AL SELECT
                }
                count++;
        });
    });
    }
}

    // function validarNombre(nombre){ // validacion solo letras

    //     return /^[A-Z]+$/i.test(nombre);
    // }
    function esNumero(numero) {
    //console.log(numero);
        return /^\d*$/.test(numero);
    }
    function validarSeleccion(select){
        valor=esNumero(select);
        return(!valor && (valor!=1 || valor!=2))
    }
    function validarnumeracionclausula(numero){
            console.log("$datosC");

    return false;
    }



</script>

<style>
.center12313123 {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100px;
}
</style>

