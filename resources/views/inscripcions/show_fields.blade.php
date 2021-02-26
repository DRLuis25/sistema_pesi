
<!-- Propietario Id Field -->
<div class="col-sm-12">
    {!! Form::label('propietario_id', __('models/inscripcions.fields.propietario_id').':') !!}
    <p>
        <a href="{{ route('propietarios.show', [$inscripcion->propietario->id]) }}" style=" color: inherit;text-decoration: none">{{ $inscripcion->propietario->fullName }}</a>
    </p>
</div>

<!-- Tarjeta Propiedad Field -->
<div class="col-sm-12">
    {!! Form::label('tarjeta_propiedad', __('models/inscripcions.fields.tarjeta_propiedad').':') !!}
    <p>@if ($inscripcion->tarjeta_propiedad!=null)
        <a href="{{ $inscripcion->tarjeta_propiedad }}" style=" color: inherit;text-decoration: none">ver tarjeta propiedad</a>
    @else
        <p>sin tarjeta propiedad</p>
    @endif</p>
</div>
<!-- Soat Afocat Field -->
<div class="col-sm-12">
    {!! Form::label('soat_afocat', __('models/inscripcions.fields.soat_afocat').':') !!}
    <p>@if ($inscripcion->soat_afocat!=null)
        <a href="{{ $inscripcion->soat_afocat }}" style=" color: inherit;text-decoration: none">ver SOAT / AFOCAT</a>
    @else
        <p>sin SOAT / AFOCAT</p>
    @endif</p>
</div>

<!-- Certificado Gps Field -->
<div class="col-sm-12">
    {!! Form::label('certificado_gps', __('models/inscripcions.fields.certificado_gps').':') !!}
    <p>@if ($inscripcion->certificado_gps!=null)
        <a href="{{ $inscripcion->certificado_gps }}" style=" color: inherit;text-decoration: none">ver Certificado GPS</a>
    @else
        <p>sin Certificado GPS</p>
    @endif</p>
</div>

<!-- Certificado Gas Field -->
<div class="col-sm-12">
    {!! Form::label('certificado_gas', __('models/inscripcions.fields.certificado_gas').':') !!}
    <p>@if ($inscripcion->certificado_gas!=null)
        <a href="{{ $inscripcion->certificado_gas }}" style=" color: inherit;text-decoration: none">ver Certificado Gas</a>
    @else
        <p>sin Certificado Gas</p>
    @endif</p>
</div>

<!-- Revision Tecnica Field -->
<div class="col-sm-12">
    {!! Form::label('revision_tecnica', __('models/inscripcions.fields.revision_tecnica').':') !!}
    <p>@if ($inscripcion->revision_tecnica!=null)
        <a href="{{ $inscripcion->revision_tecnica }}" style=" color: inherit;text-decoration: none">ver revisión técnica</a>
    @else
        <p>sin revisión técnica</p>
    @endif</p>
</div>

<!-- Estado Field -->
<div class="col-sm-12">
    {!! Form::label('estado', __('models/inscripcions.fields.estado').':') !!}
    <p>
        @if ($inscripcion->estado==1)
            Aprobado
        @else
            No Aprobado
        @endif
    </p>
</div>

