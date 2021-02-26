@extends('layouts.app')

@section('content')

<style>
    .select {
     background: transparent;
     border: none;
     font-size: 14px;
     height: 30px;
     padding: 5px;
     width: 250px;
  }
</style>

 <!-- Default box -->
 <div class="card">
    <div class="card-header">
      <h3 class="card-title">REGISTRAR DOCUMENTO DE INSCRIPCION</h3>
    </div>
    <div class="alert  hidden" role="alert"></div>
    <form method="POST" action="{{ route('documentoinscripcion.store')}}" id="form">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-3">
                    <h5>Conductor :</h5>
                    <select class="select @error('conductor') is-invalid @enderror" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" id="conductor" name="conductor" data-live-search="true">
                        <option value="0" selected>- Seleccione Conductor -</option>          
                            @foreach($conductor as $item)
                                <option value="{{ $item->id }}" >{{ $item->dni }}</option>                                 
                            @endforeach    
                    </select>
                    @error('conductor')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-3">
                    <h5>Propietario :</h5>
                    <select class="select @error('propietario') is-invalid @enderror" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" id="propietario" name="propietario" data-live-search="true">
                        <option value="0" selected>- Seleccione Propietario -</option>          
                            @foreach($propietario as $item)
                                <option value="{{ $item->id }}" >{{ $item->inscripcion->nombre_propietario." ".$item->inscripcion->apellidoPaterno_propietario." ".$item->inscripcion->apellidoMaterno_propietario }}</option>                                 
                            @endforeach    
                    </select>
                    @error('propietario')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row" style="margin-top: 30px">
                <div class="col-md-4"></div>
                <div class="col-md-3">
                    <h5>Vehiculo :</h5>
                    <select class="select @error('vehiculo') is-invalid @enderror" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" id="vehiculo" name="vehiculo" data-live-search="true">
                        <option value="0" selected>- Seleccione Personal -</option>          
                            @foreach($vehiculo as $item)
                                <option value="{{ $item->id }}" >{{ $item->modelo }}</option>                                 
                            @endforeach  
                    </select>
                    @error('vehiculo')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                        </span>
                    @enderror  
                </div>
            </div>
            <div class="col-md-12 text-center" style="margin-top: 40px">
                <div class="form-group">
                    <button class="btn btn-primary" id="btnRegistrar" data-loading-text="<i class='fa a-spinner fa-spin'></i> Registrando">
                        <i class='fas fa-save'></i> Guardar</button>    
                    <a href="{{route('cancelarDocumentoInscripcion')}}" class='btn btn-danger'><i class='fas fa-ban'></i> Cancelar</a>              
                </div> 
            </div>
        </div>
    </form>
    <!-- /.card-body -->
    <div class="card-footer">
    </div>
    <!-- /.card-footer-->
  </div>
  <!-- /.card -->

@endsection