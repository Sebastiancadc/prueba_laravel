@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @if (session('crear'))
          <div class="alert alert-success border-2 d-flex align-items-center" role="alert">
            <div class="bg-success me-3 icon-item"><span class="fas fa-exclamation-circle text-white fs-3"></span></div>
            <p class="mb-0 flex-1">{{(session('crear'))}}</p>
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif 

          @if (session('editar'))
          <div class="alert alert-warning border-2 d-flex align-items-center" role="alert">
            <div class="bg-warning me-3 icon-item"><span class="fas fa-exclamation-circle text-white fs-3"></span></div>
            <p class="mb-0 flex-1">{{(session('editar'))}}</p>
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif 
            <div class="card">

                <div class="card-body">
                  <a type="submit" class="btn btn-danger"  href="{{ url('abogados') }}">Abogados</a>
                  <a type="submit" class="btn btn-primary" href="{{ url('casos') }}">Casos</a>
                  <a type="submit" class="btn btn-warning" href="{{ url('clientes') }}">Clientes</a>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalaaa">Crear</button>

                    <br>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Fecha inicio</th>
                            <th scope="col">Fecha fin</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                            $i=1;
                          @endphp
                            @foreach ($casos as $caso)
                            <tr>
                              <th scope="row">{{$i++}}</th>
                              <td>{{$caso->nombre}}</td>
                              <td>{{$caso->fecha_inicio}}</td>
                              <td>{{$caso->fecha_fin}}</td>
                              <td>{{$caso->estado}}</td>
                              <td>{{$caso->nombre_cli}}</td>
                              <td>
                                <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#editar{{$caso->id}}">editar</a>
                              
                  
                                <div class="modal fade" id="editar{{$caso->id}}"  >
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar caso</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <form method="POST" action="{{ route('update_caso',$caso->id) }}">
                                          @csrf
                                          <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Nombre:</label>
                                            <input type="text" class="form-control" name="nombre" value="{{$caso->nombre}}">
                                          </div>
                                          <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Fecha inicio:</label>
                                            <input type="date" class="form-control" name="fecha_inicio" value="{{$caso->fecha_inicio}}">
                                          </div>
                                          <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Fecha_fin:</label>
                                            <input type="date" class="form-control" name="fecha_fin" value="{{$caso->fecha_fin}}">
                                          </div>
                                          <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Estado:</label>
                                            <select class="custom-select" name="estado">
                                              <option >{{$caso->estado}}</option>
                                              <option >Entramite</option>
                                              <option >Archivado</option>
                                              <option >Finalizado</option>  
                                            </select>
                                          </div>
                                          <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Cliente:</label>
                                            <select class="custom-select" name="cliente_id">
                                              <option value="{{$caso->cliente_id}}">{{$caso->nombre_cli}}</option>
                                              @foreach ($cliente as $clientes)
                                              <option value="{{$clientes->id}}">{{$clientes->nombre}}</option>                
                                              @endforeach
                                            </select>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary" >Editar</button>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              
                              </td>
                            
                            </tr>    
                               
                            @endforeach
                            
                        </tbody>
                      </table>

                      <div class="modal fade" id="exampleModalaaa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabela" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabela">Crear caso</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="POST" action="{{ route('crear_caso') }}">
                                @csrf
                                <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Nombre:</label>
                                  <input type="text" class="form-control" name="nombre">
                                </div>
                                <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Fecha inicio:</label>
                                  <input type="date" class="form-control" name="fecha_inicio">
                                </div>
                                <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Fecha fin:</label>
                                  <input type="date" class="form-control" name="fecha_fin">
                                </div>
                                <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Estado:</label>
                                  <select class="custom-select" name="estado">
                                    <option selected></option>
                                    <option >En tramite</option>
                                    <option >Archivado</option>
                                    <option >Finalizado</option>  
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Cliente:</label>
                                  <select class="custom-select" name="cliente_id">
                                    <option selected></option>
                                    @foreach ($cliente as $clientes)
                                    <option value="{{$clientes->id}}">{{$clientes->nombre}}</option>                
                                    @endforeach
                                  </select>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                  <button type="submit" class="btn btn-primary" >Crear</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

