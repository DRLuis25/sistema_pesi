
@extends('layouts.app')

@section('content')


    <!-- Default box -->
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">OCURRENCIAS</h3>
        </div>
        <div class="card-body">

            <a href="{{route('ocurrencia.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo Registro</a>

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
                <th scope="col">Descripcion</th>
                <th scope="col">Fecha</th>
                <th scope="col">Personal</th>
                <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ocurrencia as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td> {{$item->descripcion}} </td>
                        <td>{{$item->fecha}}</td>  
                        <td>{{$item->personal->nombres}}
                            {{$item->personal->apellidoPaterno}}
                            {{$item->personal->apellidoMaterno}}</td>             
                        <td>
                            <a href="{{route('ocurrencia.edit',$item->id)}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Editar</a>
                            <a href="{{route('confirmarOcurrencia',$item->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-edit"></i> Eliminar</a>
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