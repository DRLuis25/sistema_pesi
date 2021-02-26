<!-- Personal Id Field -->
<div class="col-sm-12">
    {!! Form::label('personal_id', __('models/contratoPersonals.fields.personal_id').':') !!}
    <p><a href="{{ route('personals.show', [$contratoPersonal->personal->id]) }}">
        {{ $contratoPersonal->personal->fullName }}
        </a>
    </p>
</div>

<!-- Fecha Contrato Field -->
<div class="col-sm-12">
    {!! Form::label('fecha_contrato', __('models/contratoPersonals.fields.fecha_contrato').':') !!}
    <p>{{ $contratoPersonal->fecha_contrato }}</p>
</div>

<!-- Tiempo Field -->
<div class="col-sm-12">
    {!! Form::label('tiempo', __('models/contratoPersonals.fields.tiempo').':') !!}
    <p>{{ $contratoPersonal->tiempo }} meses</p>
</div>

<!-- Sueldo Field -->
<div class="col-sm-12">
    {!! Form::label('sueldo', __('models/contratoPersonals.fields.sueldo').':') !!}
    <p>{{ number_format($contratoPersonal->sueldo, 2) }}</p>
</div>

