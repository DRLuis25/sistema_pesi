<!-- Personal Id Field -->
<div class="col-sm-12">
    {!! Form::label('personal_id', __('models/contratoPersonals.fields.personal_id').':') !!}
    <p>{{ $contratoPersonal->personal_id }}</p>
</div>

<!-- Fecha Contrato Field -->
<div class="col-sm-12">
    {!! Form::label('fecha_contrato', __('models/contratoPersonals.fields.fecha_contrato').':') !!}
    <p>{{ $contratoPersonal->fecha_contrato }}</p>
</div>

<!-- Tiempo Field -->
<div class="col-sm-12">
    {!! Form::label('tiempo', __('models/contratoPersonals.fields.tiempo').':') !!}
    <p>{{ $contratoPersonal->tiempo }}</p>
</div>

<!-- Sueldo Field -->
<div class="col-sm-12">
    {!! Form::label('sueldo', __('models/contratoPersonals.fields.sueldo').':') !!}
    <p>{{ $contratoPersonal->sueldo }}</p>
</div>

