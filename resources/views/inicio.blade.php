@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <a type="submit" class="btn btn-danger"  href="{{ url('abogados') }}">Abogados</a>
                    <a type="submit" class="btn btn-primary" href="{{ url('casos') }}">Casos</a>
                    <a type="submit" class="btn btn-warning" href="{{ url('clientes') }}">Clientes</a>
                    <a type="submit" class="btn btn-default" href="{{ url('trm') }}">trm</a>

                    <br>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Caso</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Abogado</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Fecha inicio</th>
                            <th scope="col">Fecha fin</th>

                          </tr>
                        </thead>
                        <tbody>
                          @php
                            $i=1;
                          @endphp
                            @foreach ($datos as $dato)
                            <tr>
                              <th scope="row">{{$i++}}</th>
                              <td>{{$dato->caso}}</td>
                              <td>{{$dato->cliente}}</td>
                              <td>{{$dato->abogado}}</td>
                              <td>{{$dato->estado}}</td>
                              <td>{{$dato->fecha_inicio}}</td>
                              <td>{{$dato->fecha_fin}}</td>
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
