@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <div class="card">
        <div class="card-header">
            <h4><strong>Mantenedor Documento de Inscripcion</strong></h4>
        </div>
        <div class="card-body">
            <h5 class="card-title"><u>.::Eliminar Documento de Inscripcion</u></h5>
            <p class="card-text">
                <p class="card-text">
                    <strong>Propietario: </strong> {{$documento->conductor->dni}} <br>
                    <strong>Conductor: </strong> {{$documento->propietario->inscripcion->nombre_propietario." ".
                        $documento->propietario->inscripcion->apellidoPaterno_propietario." ".$documento->propietario->inscripcion->apellidoMaterno_propietario}} <br>
                    <strong>Vehiculo: </strong> {{$documento->vehiculo->modelo}}
                </p>
                <h5 class="card-title">¿Desea eliminar?</h5><br>
                <form action="{{route('documentoinscripcion.destroy', $documento->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="mx-auto">
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fas fa-check-square"></i>
                            Si
                        </button>
                        <a href="{{route('cancelarDocumentoInscripcion')}}" class="btn btn-sm btn-primary">
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
