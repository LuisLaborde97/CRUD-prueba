@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Informacion del empleado</div>

                <div class="card-body">
                    <div class="container">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="4">Nombre:</td>
                                    <td class="text-end">{{$empleado[0]->primer_nombre}}</td>
                                </tr>

                                <tr>
                                    <td colspan="4">Apellido:</td>
                                    <td class="text-end">{{$empleado[0]->apellido}}</td>
                                </tr>

                                <tr>
                                    <td colspan="4">Compañia:</td>
                                    <td class="text-end">{{$empleado[0]->compania}}</td>
                                </tr>

                                <tr>
                                    <td colspan="4">Correo:</td>
                                    <td class="text-end">{{$empleado[0]->correo}}</td>
                                </tr>

                                <tr>
                                    <td colspan="4">Telefono:</td>
                                    <td class="text-end">{{$empleado[0]->telefono}}</td>
                                </tr>
                            </tbody>
                        </table>           

                                
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