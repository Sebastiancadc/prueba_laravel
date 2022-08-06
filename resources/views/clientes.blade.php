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
                  <a type="submit" class="btn btn-default" href="{{ url('trm') }}">trm</a>

                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalaaa">Crear</button>

                    <br>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Cedula</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                            $i=1;
                          @endphp
                            @foreach ($clientes as $cliente)
                            <tr>
                              <th scope="row">{{$i++}}</th>
                              <td>{{$cliente->nombre}}</td>
                              <td>{{$cliente->cedula}}</td>
                              <td>{{$cliente->telefono}}</td>
                              <td>
                                <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#editar{{$cliente->id}}">editar</a>
                              
                  
                                <div class="modal fade" id="editar{{$cliente->id}}"  >
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar cliente</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <form method="POST" action="{{ route('update_cliente',$cliente->id) }}">
                                          @csrf
                                          <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Nombre:</label>
                                            <input type="text" class="form-control" name="nombre" value="{{$cliente->nombre}}">
                                          </div>
                                          <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Cedula:</label>
                                            <input type="text" class="form-control" name="cedula" value="{{$cliente->cedula}}">
                                          </div>
                                          <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Telefono:</label>
                                            <input type="text" class="form-control" name="telefono" value="{{$cliente->telefono}}">
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
                              <h5 class="modal-title" id="exampleModalLabela">Crear cliente</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="POST" action="{{ route('crear_cliente') }}">
                                @csrf
                                <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Nombre:</label>
                                  <input type="text" class="form-control" name="nombre">
                                </div>
                                <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Cedula:</label>
                                  <input type="text" class="form-control" name="cedula">
                                </div>
                                <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Telefono:</label>
                                  <input type="text" class="form-control" name="telefono">
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

