<!-- Inscripcion Id Field -->
<div class="col-sm-12">
    {!! Form::label('inscripcion_id', __('models/vehiculos.fields.propietario').':') !!}
    <p>{{ $vehiculo->inscripcion->propietario->fullName }}</p>
</div>


<!-- Placa Field -->
<div class="col-sm-12">
    {!! Form::label('placa', __('models/vehiculos.fields.placa').':') !!}
    <p>{{ $vehiculo->placa }}</p>
</div>

<!-- Color Field -->
<div class="col-sm-12">
    {!! Form::label('color', __('models/vehiculos.fields.color').':') !!}
    <p>{{ $vehiculo->color }}</p>
</div>

<!-- Marca Field -->
<div class="col-sm-12">
    {!! Form::label('marca', __('models/vehiculos.fields.marca').':') !!}
    <p>{{ $vehiculo->marca }}</p>
</div>

<!-- Modelo Field -->
<div class="col-sm-12">
    {!! Form::label('modelo', __('models/vehiculos.fields.modelo').':') !!}
    <p>{{ $vehiculo->modelo }}</p>
</div>

