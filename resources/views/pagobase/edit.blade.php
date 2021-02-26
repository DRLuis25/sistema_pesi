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
      <h3 class="card-title">REGISTRAR PAGO DE SERVICIO BASE</h3>
    </div>
    <div class="alert  hidden" role="alert"></div>
    <form method="POST" action="{{ route('pagobase.update',$pagobase->id)}}" id="form">
        @csrf @method('put')
        <div class="card-body">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-3">
                    <h5>Monto de pago :</h5>
                    <input type="number" class="form-control @error('monto') is-invalid @enderror" name="monto" id="monto" value={{$pagobase->monto}} min="1" pattern="^[0-9]+" >
                    @error('monto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <h5>Descripcion :</h5>
                    <textarea class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" id="" cols="50" rows="3" >{{$pagobase->descripcion}}</textarea>
                    @error('descripcion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row" style="margin-top: 30px">
                <div class="col-md-2"></div>
                <div class="col-md-3">
                    <h5>Personal :</h5>
                    <select class="select @error('personal') is-invalid @enderror" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" id="personal" name="personal" data-live-search="true">
                        <option value="0" selected>- Seleccione Personal -</option>          
                            @foreach($personal as $item)
                                <option value="{{ $item->id }}" >{{ $item->nombres." ".$item->apellidoPaterno." ".$item->apellidoMaterno }}</option>                                 
                            @endforeach    
                    </select>
                    @error('personal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <h5>Conductor :</h5>
                    <select class="select @error('conductor') is-invalid @enderror" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" id="conductor" name="conductor" data-live-search="true">
                        <option value="0" selected>- Seleccione DNI del Conductor -</option>          
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
            </div>
            <div class="col-md-12 text-center" style="margin-top: 40px">
                <div class="form-group">
                    <button class="btn btn-primary" id="btnRegistrar" data-loading-text="<i class='fa a-spinner fa-spin'></i> Registrando">
                        <i class='fas fa-save'></i> Guardar</button>    
                    <a href="{{route('cancelarPagoBase')}}" class='btn btn-danger'><i class='fas fa-ban'></i> Cancelar</a>              
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