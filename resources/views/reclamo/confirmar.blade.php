@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <div class="card">
        <div class="card-header">
            <h4><strong>Mantenedor Reclamos</strong></h4>
        </div>
        <div class="card-body">
            <h5 class="card-title"><u>.::Eliminar Reclamo</u></h5>
            <p class="card-text">
                <p class="card-text">
                    <strong>Codigo: </strong> {{$reclamo->id}} <br>
                    <strong>Descripcion: </strong> {{$reclamo->descripcion}}
                </p>
                <h5 class="card-title">¿Desea eliminar?</h5><br>
                <form action="{{route('reclamo.destroy', $reclamo->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="mx-auto">
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fas fa-check-square"></i>
                            Si
                        </button>
                        <a href="{{route('cancelarReclamo')}}" class="btn btn-sm btn-primary">
                            <i class="fas fa-times-circle"></i>
                            NO
                        </a>
                    </div>
                </form>
            </p>
        </div>
    </div>
</div>
@endsection