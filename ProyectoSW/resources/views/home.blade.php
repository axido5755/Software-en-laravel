@extends('layout')   

@section('content')

    <div id="content" class="bg-grey w-100">

        <section class="bg-light py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-8">
                        <h1 class="font-weight-bold mb-0">Bienvenido {{$Nombre}}</h1>
                        <p class="lead text-muted">Revisa la última información</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-mix py-3">
        <div class="container">
            <div class="card rounded-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 d-flex stat my-3">
                            <div class="mx-auto">
                                <h6 class="text-muted">Contrato en estado Borrador</h6>
                                <h3 class="font-weight-bold">{{$Borrador}}</h3>
                                <h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle"></i></h6>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 d-flex stat my-3">
                            <div class="mx-auto">
                                <h6 class="text-muted">Contrato en estado Vigente</h6>
                                <h3 class="font-weight-bold">{{$Vigente}}</h3>
                                <h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle"></i></h6>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 d-flex stat my-3">
                            <div class="mx-auto">
                                <h6 class="text-muted">Contrato en estado Borrador de {{$Nombre}} </h6>
                                <h3 class="font-weight-bold">{{$BorradorUsuario}}</h3>
                                <h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle"></i></h6>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 d-flex stat my-3">
                            <div class="mx-auto">
                                <h6 class="text-muted">Contrato en estado Vigente de {{$Nombre}}</h6>
                                <h3 class="font-weight-bold">{{$VigenteUsuario}}</h3>
                                <h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle"></i></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>

      <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 my-3">
                    <div class="card rounded-0">
                        <div class="card-header bg-light">
                            <h5 class="font-weight-bold mb-0">Proveedores existentes</h5>
                          </div>
                          <div class="card-body">
                        <table class="table table-borderless">
                            <thead>
                              <tr>
                                <th scope="col">Proveedor</th>
                                <th scope="col">Empresa</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($Proveedores as $item)
                            <tr>
                                <td>{{$item->nombreproveedor}}</td>

                                <td>{{$item->nombreempresa}}</td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 my-3">
                  <div class="card rounded-0">
                      <div class="card-header bg-light">
                          <h6 class="font-weight-bold mb-0">Ultimo contrato creado</h6>
                      </div>
                      <div class="card-body pt-2">
                        <div class="d-flex border-bottom py-2">
                            <div class="d-flex mr-3">
                                <h2 class="align-self-center mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                                    <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/>
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                  </svg></h2>
                              </div>
                              @if($contratos != null)
                              <div class="align-self-center">
                                <h6 class="d-inline-block mb-0">{{$contratos->Usuario}}</h6>
                              </div>
                              @endif
                          </div>
                          <div class="d-flex border-bottom py-2">
                              <div class="d-flex mr-3">
                                <h2 class="align-self-center mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-calendar4-week" viewBox="0 0 16 16">
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1H2zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5z"/>
                                    <path d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-2 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                  </svg></h2>
                              </div>
                              @if($contratos != null)
                              <div class="align-self-center">
                                <h6 class="d-inline-block mb-0">{{$contratos->Fecha_Creacion}}</h6>
                              </div>
                              @endif
                          </div>
                          <div class="d-flex border-bottom py-2">
                            <div class="d-flex mr-3">
                                <h2 class="align-self-center mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-exclamation-diamond" viewBox="0 0 16 16">
                                    <path d="M6.95.435c.58-.58 1.52-.58 2.1 0l6.515 6.516c.58.58.58 1.519 0 2.098L9.05 15.565c-.58.58-1.519.58-2.098 0L.435 9.05a1.482 1.482 0 0 1 0-2.098L6.95.435zm1.4.7a.495.495 0 0 0-.7 0L1.134 7.65a.495.495 0 0 0 0 .7l6.516 6.516a.495.495 0 0 0 .7 0l6.516-6.516a.495.495 0 0 0 0-.7L8.35 1.134z"/>
                                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                                  </svg></h2>
                              </div>
                              @if($contratos != null)
                              <div class="align-self-center">
                                <h6 class="d-inline-block mb-0"> {{$contratos->Estado}}</h6>
                              </div>
                              @endif
                          </div>
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection