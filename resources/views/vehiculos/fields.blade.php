<!-- Placa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('placa', __('models/vehiculos.fields.placa').':') !!}
    {!! Form::text('placa', null, ['class' => 'form-control']) !!}
</div>

<!-- Color Field -->
<div class="form-group col-sm-6">
    {!! Form::label('color', __('models/vehiculos.fields.color').':') !!}
    {!! Form::text('color', null, ['class' => 'form-control']) !!}
</div>

<!-- Marca Field -->
<div class="form-group col-sm-6">
    {!! Form::label('marca', __('models/vehiculos.fields.marca').':') !!}
    {!! Form::text('marca', null, ['class' => 'form-control']) !!}
</div>

<!-- Modelo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('modelo', __('models/vehiculos.fields.modelo').':') !!}
    {!! Form::text('modelo', null, ['class' => 'form-control']) !!}
</div>

<!-- Inscripcion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('inscripcion_id', __('models/vehiculos.fields.inscripcion_id').':') !!}
    {!! Form::number('inscripcion_id', null, ['class' => 'form-control']) !!}
</div>
