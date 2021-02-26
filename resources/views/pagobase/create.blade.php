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
    <form method="POST" action="{{ route('pagobase.store')}}" id="form">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-3">
                    <h5>Monto de pago :</h5>
                    <input type="number" class="form-control" name="monto" id="monto" value=1 min="1" pattern="^[0-9]+" >
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <h5>Descripcion :</h5>
                    <textarea name="descripcion" id="" cols="50" rows="3" placeholder="Ingrese Descripcion ..."></textarea>
                </div>
            </div>
            <div class="row" style="margin-top: 30px">
                <div class="col-md-2"></div>
                <div class="col-md-3">
                    <h5>Personal :</h5>
                    <select class="select" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" id="personal" name="personal" data-live-search="true">
                        <option value="0" selected>- Seleccione Personal -</option>          
                            @foreach($personal as $item)
                                <option value="{{ $item->id }}" >{{ $item->nombres." ".$item->apellidoPaterno." ".$item->apellidoMaterno }}</option>                                 
                            @endforeach    
                    </select>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <h5>Conductor :</h5>
                    <select class="select" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" id="conductor" name="conductor" data-live-search="true">
                        <option value="0" selected>- Seleccione DNI del Conductor -</option>          
                            @foreach($conductor as $item)
                                <option value="{{ $item->id }}" >{{ $item->dni }}</option>                                 
                            @endforeach    
                    </select>
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