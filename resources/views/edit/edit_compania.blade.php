@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                   <p class="fw-bold">Editar Compañia</p> 
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('update.compania', $compania[0]->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Nombre" name="nombre" value="{{$compania[0]->nombre}}">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Correo" name="correo" value="{{$compania[0]->correo}}">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Pagina Web" name="pagina_web" value="{{$compania[0]->pagina_web}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <input type="file" class="form-control" id="exampleFormControlFile1" name="logo">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <a type="button" href="{{route('index.compania')}}" class="btn btn-outline-secondary">Atrás</a>
                    <button type="submit" class="btn btn-outline-success">Editar</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


