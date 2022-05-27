@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                   <p class="fw-bold">Editar Empleado</p> 
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('update.empleado', $empleado[0]->id)}}">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Primer nombre" value="{{$empleado[0]->primer_nombre}}" name="nombre">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Apellido" name="apellido" value="{{$empleado[0]->apellido}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <select name="compania" class="form-select">
                                        <option value="{{$empleado[0]->id_compania}}" selected>{{$empleado[0]->compania}}</option>
                                        @foreach ($compania as $i)
                                            <option value="{{$i->id}}">{{$i->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                           
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="correo" placeholder="Correo" value="{{$empleado[0]->correo}}">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="telefono" placeholder="Telefono" value="{{$empleado[0]->telefono}}">
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


