@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Informacion de la empresa</div>

                <div class="card-body">
                        <div class="container">
                            <img src="{{asset($compania[0]->logo)}}" alt="" class="img-fluid mx-auto d-block">
                                <div class="row">

                                    <div class="mb-3">
                                        <div class="col-lg-4">
                                            <label for="" class="form-label"><p class="fw-bold">Nombre: {{$compania[0]->nombre}}</p> </label>
                                        </div>
                                    </div>

                                    <div class="mb-3 ">
                                        <div class="col-lg-4">
                                            <label for="" class="form-label"><p class="fw-bold">Apellido: {{$compania[0]->correo}}</p> </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="" class="form-label"><p class="fw-bold">Pagina web: {{$compania[0]->pagina_web}}</p> </label>
                                    </div>

                                </div>
                        </div>   
                </div>

                <div class="card-footer">
                    <a class="btn btn-outline-primary" href="{{route('index.compania')}}">Atrás</a>
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection