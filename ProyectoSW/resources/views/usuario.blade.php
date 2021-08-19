@extends('layout')

@section('content')

<body class="bg-light">
    <div class="container">
        <div class="card-header">
                <div class="card-body text-center">
                    
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <p class="profile-username text-center">{{$data['nombre']}} {{$data['apellido']}}</p>
                                <p class="text-muted text-center"> 12.345.678-9 </p>
                            </div>
                        </div>
                        <div class="box box-primary">
                            <div class="box-body">
                                <hr>
                                <p class="profile-username text-center">reparticion</p>
                                <p class="text-muted text-center"> {{$data['reparticion']}}</p>
                                <hr>
                                <p class="profile-username text-center">cargo</p>
                                <p class="text-muted text-center"> {{$data['cargo']}} </p>
                                <hr>
                                <p class="profile-username text-center">sede</p>
                                <p class="text-muted text-center"> {{$data['sede']}} </p>
                                <hr>
                                <div class="row">
                                    <div class="col-12"> 
                                    <a href="{{url('/')}}" class="btn btn-primary " >Volver</a>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</body>

@endsection