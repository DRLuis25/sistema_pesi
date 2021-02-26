
@extends('layouts.app')

@section('content')


    <!-- Default box -->
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">DOCUMENTO DE INSCRIPCION</h3>
        </div>
        <div class="card-body">

            <a href="{{route('documentoinscripcion.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo Registro</a>

            @if(session('datos'))
                <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                    {{session('datos')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
            @endif

            <table class="table table-success table-striped" style="margin-top: 30px">
            <thead>
                <tr>
                <th scope="col">Codigo</th>
                <th scope="col">DNI-Conductor</th>
                <th scope="col">Propietario</th>
                <th scope="col">Vehiculo</th>
                <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($documento as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td> {{$item->conductor->dni}} </td>
                        <td>
                            {{$item->propietario->inscripcion->nombre_propietario}}
                            {{$item->propietario->inscripcion->apellidoPaterno_propietario}}
                            {{$item->propietario->inscripcion->apellidoMaterno_propietario}}
                        </td> 
                        <td>
                            {{$item->vehiculo->modelo}}
                        </td>            
                        <td>
                            <a href="{{route('documentoinscripcion.edit',$item->id)}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Editar</a>
                            <a href="{{route('confirmarDocumentoInscripcion',$item->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-edit"></i> Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

@endsection