require('./bootstrap');

$(document).ready(function(){

///dar formato de datatble a nuestra tabla

tablaFrutas =$('#tabla').DataTable({
        "responsive": true,
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        "ajax": {
            "url": "datos/datostabla.php",
            "method": 'POST', //usamos el metodo POST
            //"data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [

            { "data": "id" },
            { "data": "nombre" },
            { "data": "precio",
            "render": function (data, type, JsonResultRow, row) {
                return `$${data}.-`
            
            }
            },
            { "data": "estado",
            "render": function (data, type, JsonResultRow, row) {
                    if(data==1){
                    return 'Activo';
                    }
                    else{
                    return 'Inactivo';
                    }
                
                }
            },
            { "data": "estacion" },
            {
                "defaultContent":
                    " <div class='row justify-content-center'>" +
                    "<div class=' col align-items-center'>" +
                    "<div class='btn-group'>" +
                    "<button class='btn btn-success btn-sm btnModificar'>Modificar</button>" +
                    "<button class='btn btn-danger btn-sm btnBorrar'>Eliminar</button>" +
                    "</div>" +
                    "</div>" +
                    "</div>"
            }
        ], "columnDefs": [{

            "targets": [0], //Comma separated values
            "visible": false,
            "searchable": true
        },

        ],
        "oLanguage": {
            "sProcessing":     "Procesando...",
            "sLengthMenu": 'Mostrar <select>'+
            '<option value="5">5</option>'+
                '<option value="10">10</option>'+
                '<option value="25">20</option>'+
                '<option value="50">50</option>'+
                '<option value="-1">All</option>'+
                '</select> registros',    
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Filtrar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Por favor espere - cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
    }
    });//fin datatable
let dtTable = $("#tabla").DataTable();



    $("#botonnuevo").click(function(){
        nuevo();
    });

    $(document).on('click', '.btnBorrar', function () {

        const id=dtTable.row($(this).closest('tr')).data().id;
       eliminar(id);
        
    });


    function nuevo(){
        Swal.mixin({
        
        icon: "question",
        //puede ser text, number, email, password, textarea, select, radio
        confirmButtonText: 'Confirmar ',
        confirmButtonColor: "#80FF33",
        showCancelButton: true,
        progressSteps: [1,2,3,4,5],
        
        
    }).queue(
        [
    {
        input: 'text',
            title: 'Nombre de Fruta',
            //text: 'Todos los datos de su cuenta serán eliminados y por consecuencia no podrá recuperar su cuenta. Confirme que desea realizar esta acción.',
            text:'Ingrese Nombre',
            inputValidator: (value) => {
                if (!value) {
                return 'Debes ingrasar texto'
                }
                if (!validarNombre(value)) {
                return 'Deben ser solo letras'
                }
            }
    },
    {
        input: 'number',
            title: 'Precio',
            //text: 'Todos los datos de su cuenta serán eliminados y por consecuencia no podrá recuperar su cuenta. Confirme que desea realizar esta acción.',
            text:'Ingrese Precio',
            inputValidator: (value) => {
                if (!value) {
                return 'Debes ingrasar texto'
                }
                if (!esNumero(value)) {
                return 'Deben ser solo numeros  mayores a 0'
                }
                if (value<=0) {
                return 'Deben ser solo numeros mayores a 0'
                }
            }
    },
    {
        input: 'select',
            inputOptions: {
                '1': 'Activo',
                '2': 'Inactivo'
            },
            title: 'Estado',
            //text: 'Todos los datos de su cuenta serán eliminados y por consecuencia no podrá recuperar su cuenta. Confirme que desea realizar esta acción.',
            text:'Ingrese Estado',
            inputValidator: (value) => {
                if (!value) {s
                return 'Debes ingrasar texto'
                }
                
                
            }
    },
    {
        input: 'radio',
            inputOptions: {
                'invierno': 'invierno',
                'verano': 'verano',
                'otoño': 'otoño',
                'primavera': 'primavera'
            },
            title: 'Estación',
            //text: 'Todos los datos de su cuenta serán eliminados y por consecuencia no podrá recuperar su cuenta. Confirme que desea realizar esta acción.',
            text:'Ingrese Estación',
            inputValidator: (value) => {
                if (!value) {
                return 'Debes seleccionar una opción'
                }
                
            }
    },
    {
        icon: "warning",
        title: '¡Un momento!',
        text: 'Se agragara una nueva fruta',         
    },
    ]).then((result) => {
        
        const datos={
            n_clausula:result.value[0],
            titulo:result.value[1],
            Contenido:result.value[2]
        }

        console.log(datos);
        
        // subir informacion
        $.ajax({
            type:"POST",
            url:"formulario/nuevoformulario.php",
            data:datos,
        
        }).done((response)=>{
    
            response=JSON.parse(response);
                if (response.success) {
                    Swal.fire({
                    icon: 'success',
                    title: 'Exito',
                    text: `${response.message}`,
                    
                    });
                    dtTable.ajax.reload(null, false);
                } else {
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: `${response.message}`,
                    
                    });
                }
        });
        
    });
    }


    function eliminar(id){
        const dato={
            id
        }

        Swal.fire({
            title: 'Se eliminara Fruta, ¿desea continuar?',
            confirmButtonText: 'Confirmar ',
            confirmButtonColor: "#a00",
            showCancelButton: true,
        }).then((result) => {
            $.ajax({
                type:"POST",
                url:"formulario/eliminar.php",
                data:dato,
            
            }).done((response)=>{
        
                response=JSON.parse(response);
                    if (response.success) {
                        Swal.fire({
                        icon: 'success',
                        title: 'Exito',
                        text: `${response.message}`,
                        
                        });
                        dtTable.ajax.reload(null, false);
                    } else {
                        Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: `${response.message}`,
                        
                        });
                    }
            });
        });
    }
    function validarNombre(nombre){

        return /^[A-Z]+$/i.test(nombre);
    }
    function esNumero(numero) {
    //console.log(numero);
        return /^\d*$/.test(numero);
    }
    function validarSeleccion(select){
        valor=esNumero(select);
        return(!valor && (valor!=1 || valor!=2)) 
    }
});






// /////////////////////////////////////////////////////////////////


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frutería</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
        <div class="row-12">
            <div class="col justify-content-center">
                    <?php
                    /// abrimos etiqueta php 
                    if (isset($_GET['error'])) {
                        if (!empty($_GET["error"])) {
                            ?>
                            <?php
                            if ($_GET["error"]=='errorformulario') {
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    Error en Formulario
                                </div>
                                <?php
                            }
                            ?>
                            <?php
                            if ($_GET["error"]=='errorformularioprecio') {
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    Revise precio- debe ser mayor a 0
                                </div>
                                <?php
                            }
                            ?>
                            <?php
                            if ($_GET["error"]=='frutaexiste') {
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    Fruta ingresada ya existe
                                </div>
                                <?php
                            }
                            ?>
                            <?php
                            if ($_GET["error"]=='errorenvio') {
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    Error inesperado, consulte con su proveedor de servicio
                                </div>
                                <?php
                            }
                            ?>
                            
                            <?php
                        }
                    }
                    if (isset($_GET['mensaje'])) {
                        if (!empty($_GET["mensaje"])) {
                            
                            if ($_GET["mensaje"]=='ingresado') {
                                ?>
                                <div class="alert alert-success" role="alert">
                                    Fruta agregada con éxito
                                </div>
                                <?php
                            }
                    
                        }
                    }
                    
                    ?>
                <h1>Fruteria  <i>"DON LALO"</i></h1>
                
                <hr>
                <!-- parrafos  -->
                <div class="row">
                    <div class="col">
                        <h3>primer encabezado parrafos</h3>
                
                            <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non culpa est cum labore ad! Culpa expedita quaerat eaque in consequatur.</p>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Inventore iusto in at perspiciatis placeat recusandae necessitatibus veniam ullam minima cupiditate odit, consectetur nostrum ad esse nam. Possimus rem, libero recusandae, itaque ea voluptas rerum magni odit doloremque qui, vel eveniet! Culpa, architecto delectus molestiae perspiciatis modi laborum praesentium velit sed est, cumque, fugit molestias tempora voluptatum blanditiis ea nihil. At, dignissimos assumenda cupiditate pariatur sint, molestiae itaque, sit culpa molestias incidunt delectus accusamus labore explicabo nostrum quae deserunt mollitia similique velit fugit architecto? Ratione, praesentium placeat exercitationem velit nobis consectetur unde. Tenetur repellat suscipit possimus a, itaque nostrum numquam praesentium.</p>
                            <!-- line break -->           
                    </div>
                </div>
                    
                    <hr>
                 
                <br>
                <hr>
                <h3>Cuarto encabezado Ofertas <i>Imagenes</i></h3>
                <!-- ofertas -->
                <div class="row">
                <?php
                include 'datos/datos.php';
                $resultado=cargarFrutas();
                while($datos=mysqli_fetch_array($resultado)){
                    $nombre = $datos['nombre'];
                    $precio = $datos['precio'];
                    $estado= $datos['estado'];
                    $estacion= $datos['estacion'];

                    ?>
                     <div class="col-12 col-sm-6 col-md-4  col-lg-3 p-3">
                        <div class="card" >
                            <div class="card-body">
                                
                                <h6 class="card-subtitle mb-2 text-muted">Kilo de <?php echo$nombre ?> $<?php echo$precio ?>.-</h6>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo$nombre ?> de <?php echo$estacion ?>.-</h6>
                                <h6 
                                class="card-subtitle mb-2 
                                <?php if ($estado==1) {
                                    ?>
                                    text-success
                                    <?php
                                }else {
                                    ?>
                                    text-danger
                                    <?php
                                
                                }
                                ?>
                                
                                
                                ">
                                <?php if ($estado==1) {
                                    ?>
                                    Disponible
                                    <?php
                                }else {
                                    ?>
                                    No Disponible
                                    <?php
                                
                                }
                                ?>
                                .-</h6>
                                <img 
                                src="http://1.bp.blogspot.com/-0V5xiGGwhBc/VK0My5TjBTI/AAAAAAAADxY/cQjkOOq9uqM/s1600/manzana-roja.png" 
                                alt="manzana-roja"
                                width="150"
                                height="150"
                                title="manzanita"
                                >
                                
                            </div>
                        </div>
                    </div>


                    
                    <?php }
               ?>
                
                    <!-- oferta manzana -->
                    
                   
                </div>
                
                <hr>
                <h3>quinto encabezado <i>Formulario</i></h3>
                <!-- formularios -->
                <div class="row justify-content-center">
                    <div class="col-12  col-md-8  col-lg-6 p-3">
                        <form action="formulario/formulario.php" method="post"  class="form-group">
                        
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <!-- input -->
                                            <div class="row p-2">
                                                <!-- nombre y contraseña -->
                                                <div class="col-6">
                                                    <!-- nombre -->
                                                    <label for="nombre:">Nombre Fruta</label>
                                                    <input class="form-control" 
                                                    type="text"
                                                    name="nombre" 
                                                    id="nombre"
                                                    placeholder="Nombre"
                                                    >
                                                </div>
                                                <div class="col-6">
                                                    <!-- contraseña -->
                                                    <label for="precio">Precio</label>
                                                    <input class="form-control" 
                                                    type="text" 
                                                    name="precio" 
                                                    id="precio">
                                                </div>
                                            </div>
                                            <div class="row p-2">
                                                <!-- select y radios -->
                                                <div class="col-6">
                                                    <!-- select -->
                                                    <label for="estacion">Estación del año</label>
                                                    <select name="estacion" id="estacion" class="form-control">
                                                        <option value="null">Seleccione estación</option>
                                                        <option value="otoño">Otoño</option>
                                                        <option value="primavera">primavera</option>
                                                        <option value="verano">verano</option>
                                                        <option value="invierno">invierno</option>
                                            
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <!-- radio -->
                                                    <label for="estado">Estado</label><br>
                                                    <input type="radio"  name="estado" value= 1 checked> Activo
                                                    <input type="radio"  name="estado" value= 2 > Inactivo
                                                
                                                </div>
        
                                            </div>
                                            <div class="row p-3 justify-content-center">
                                                <button type="submit" class="btn btn-outline-primary">Enviar</button>
        
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>