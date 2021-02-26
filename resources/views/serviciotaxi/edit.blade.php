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
      <h3 class="card-title">EDITAR SERVICIO DE TAXI</h3>
    </div>
    <div class="alert  hidden" role="alert"></div>
    <form method="POST" action="{{ route('serviciotaxi.update',$taxi->id)}}" id="form">
        @csrf @method('put')
        <div class="card-body">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-3">
                    <h5>Cliente :</h5>
                    <select class="select @error('cliente') is-invalid @enderror" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" id="cliente" name="cliente" data-live-search="true">
                        <option value="0" selected>- Seleccione Cliente -</option>          
                            @foreach($cliente as $item)
                                <option value="{{ $item->id }}" >{{ $item->nombres." ".$item->apellidoPaterno." ".$item->apellidoMaterno }}</option>                                 
                            @endforeach    
                    </select>
                    @error('cliente')
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
                    <a href="{{route('cancelarServicioTaxi')}}" class='btn btn-danger'><i class='fas fa-ban'></i> Cancelar</a>              
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