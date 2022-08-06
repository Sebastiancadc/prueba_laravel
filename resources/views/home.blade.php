@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <button type="submit" class="btn btn-danger">Abogados</button>
                    <button type="submit" class="btn btn-primary">Casos</button>
                    <button type="submit" class="btn btn-warning">Clientes</button>
                    <br>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Caso</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Abogado</th>
                            <th scope="col">Estado</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($datos as $dato)
                            <tr>
                              <th scope="row">1</th>
                              <td>{{$dato->nombre}}</td>
                              <td>Otto</td>
                              <td>{{$dato->estado}}</td>
                            </tr>
                                
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
