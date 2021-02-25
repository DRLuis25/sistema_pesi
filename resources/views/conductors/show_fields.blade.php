<!-- Fecha Contrato Field -->
<div class="col-sm-12">
    {!! Form::label('fecha_contrato', __('models/conductors.fields.fecha_contrato').':') !!}
    <p>{{ $conductor->fecha_contrato }}</p>
</div>

<!-- Observaciones Field -->
<div class="col-sm-12">
    {!! Form::label('observaciones', __('models/conductors.fields.observaciones').':') !!}
    <p>{{ $conductor->observaciones }}</p>
</div>

<!-- Ficha Conductor Id Field -->
<div class="col-sm-12">
    {!! Form::label('ficha_conductor_id', __('models/conductors.fields.ficha_conductor_id').':') !!}
    <p>{{ $conductor->ficha_conductor_id }}</p>
</div>

