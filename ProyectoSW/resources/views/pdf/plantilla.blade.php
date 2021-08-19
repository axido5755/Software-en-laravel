<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contrato</title>
</head>
<body>
    

    <h2>CONTRATO DE SUMINISTRO DE ARRIENDO DE COMPUTADORES DESKTOPS PARA LA UNIVERSIDAD DEL SUR CON LA EMPRESA OPCIONES S.A. SISTEMA DE INFORMACION</h2>

    <p>
        {{$DatosContrato->Descripcion}}
    </p>

    <h2>Clausulas:</h2>
    @foreach ($contenido_clausula as $contenido_clausula)
        <h3>{{ $contenido_clausula->n_clausula }} {{ $contenido_clausula->titulo }}</h3>
        <p>{{ $contenido_clausula->datos }}</p>         
    @endforeach

    @if ($contenido_anexo['count'] != null)
    <h2>Anexos:</h2>
        
    @for ($i = 0; $i < $contenido_anexo['count']; $i++)
    <h3>{{$contenido_anexo['anexo'.$i]->n_anexo}} {{$contenido_anexo['anexo'.$i]->titulo}}</h3>
    <p>{{$contenido_anexo['anexo'.$i]->contenido}}</p>
    
    <h3>Clausulas del anexo: {{$contenido_anexo['anexo'.$i]->n_anexo}} {{$contenido_anexo['anexo'.$i]->titulo}}</h3>
    @foreach ($contenido_anexo[$i] as $item)
    <h3>{{$item->n_clausula}} {{$item->titulo}}</h3>
    <p>{{$item->datos}}</p>  
    @endforeach

    @endfor

    @endif

</body>
</html>