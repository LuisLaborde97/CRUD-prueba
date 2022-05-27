@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card" style="width: 60em">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Compañias</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Empleados</button>
                        </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <button class="btn btn-outline-primary mt-3" type="button" data-bs-toggle="modal" data-bs-target="#modal_compania">Agregar Compañia</button>

                            <div class="modal fade" id="modal_compania" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title text-center" id="staticBackdropLabel">Nueva Compañia</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{route('store.compania')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" placeholder="Nombre" name="nombre">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" placeholder="Correo" name="correo">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" placeholder="Pagina Web" name="pagina_web">
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
                                      <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-outline-success">Agregar</button>
                                    </div>
                                  </div>
                                </form>
                                </div>
                              </div>
                            <table class="table mt-3 align-middle">
                                <thead class="table">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Logo</th>
                                        <th scope="col">Pagina web</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($compania as $i)    
                                  <tr>
                                      <th scope="row">{{$i->id}}</th>
                                      <td>{{$i->nombre}}</td>
                                      <td>{{$i->correo}}</td>
                                      <td><img src="{{asset($i->logo)}}" alt="" width="100px" height="100px"></td>
                                      <td>{{$i->pagina_web}}</td>
                                      <td><a href="{{route('show.compania', $i->id)}}" class="btn btn-outline-success">Ver</a> <a class="btn btn-outline-warning" href="{{route('edit.compania', $i->id)}}">Editar</a> <a class="btn btn-outline-danger" href="{{route('destroy.compania', $i->id)}}">Eliminar</a></td>
                                  </tr>
                                @endforeach
                                </tbody>
                              </table>
                        </div>

                        <!-- Empleados -->

                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <button class="btn btn-outline-primary mt-3" type="button" data-bs-toggle="modal" data-bs-target="#modal_empleado">Agregar Empleado</button>

                            <div class="modal fade" id="modal_empleado" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title text-center" id="staticBackdropLabel">Nuevo empleado</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{route('store.empleado')}}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" placeholder="Primer nombre" name="nombre">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" placeholder="Apellido" name="apellido">
                                                    </div>
                                                </div>
                                            </div>

                                               <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <select name="compania" class="form-select">
                                                                <option value="0" selected>Compañia</option>
                                                                @foreach ($compania as $i)
                                                                    <option value="{{$i->id}}">{{$i->nombre}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" name="correo" placeholder="Correo">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" name="telefono" placeholder="Telefono">
                                                        </div>
                                                    </div>
                                               </div>
                                            
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-outline-success">Agregar</button>
                                    </div>
                                  </div>
                                </form>
                                </div>
                              </div>
                            <table class="table mt-3 align-middle">
                                <thead class="table">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Compañia</th>
                                        <th>Correo</th>
                                        <th>telefono</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($empleado as $i)    
                                  <tr>
                                      <th scope="row">{{$i->id}}</th>
                                      <td>{{$i->primer_nombre}}</td>
                                      <td>{{$i->apellido}}</td>
                                      <td>{{$i->compania}}</td>
                                      <td>{{$i->correo}}</td>
                                      <td>{{$i->telefono}}</td>
                                      <td><a href="{{route('show.empleado', $i->id)}}" class="btn btn-outline-success">Ver</a></td>
                                      <td><a class="btn btn-outline-warning" href="{{route('edit.empleado', $i->id)}}">Editar</a></td>
                                      <td><a class="btn btn-outline-danger" href="{{route('destroy.empleado', $i->id)}}">Eliminar</a></td>
                                  </tr>
                                @endforeach
                                </tbody>
                              </table>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
