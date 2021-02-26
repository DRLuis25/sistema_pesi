
<!-- Propietario Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('propietario_id', __('models/inscripcions.fields.propietario_id').':') !!}
    <select name="propietario_id" id="propietario_id" class="form-control select2 selectpicker" data-live-search="true" @isset($inscripcion) disabled @endisset>
        @foreach ($propietarios as $item)
            <option value="{{$item->id}}" @isset($inscripcion) @if ($inscripcion->propietario_id==$item->id)
                selected
            @endif @endisset {{ (Request::old("propietario_id") == $item->id ? "selected":"") }}> {{$item->fullName}}</option>
        @endforeach 
    </select>
    @isset($inscripcion)
        {!! Form::hidden('propietario_id', $inscripcion->propietario_id) !!}
    @endisset
</div>

<!-- Tarjeta Propiedad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tarjeta_propiedad', __('models/inscripcions.fields.tarjeta_propiedad').':') !!} <br>
    {!! Form::file('tarjeta_propiedad', null, ['class' => 'form-control']) !!}
</div>
{{-- 
<!-- Soat Afocat Numero Field -->
<div class="form-group col-sm-6">
    {!! Form::label('soat_afocat_numero', __('models/inscripcions.fields.soat_afocat_numero').':') !!}
    {!! Form::number('soat_afocat_numero', null, ['class' => 'form-control']) !!}
</div>
 --}}
<!-- Soat Afocat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('soat_afocat', __('models/inscripcions.fields.soat_afocat').':') !!} <br>
    {!! Form::file('soat_afocat', null, ['class' => 'form-control']) !!}
</div>

<!-- Certificado Gps Field -->
<div class="form-group col-sm-6">
    {!! Form::label('certificado_gps', __('models/inscripcions.fields.certificado_gps').':') !!} <br>
    {!! Form::file('certificado_gps', null, ['class' => 'form-control']) !!}
</div>

<!-- Certificado Gas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('certificado_gas', __('models/inscripcions.fields.certificado_gas').':') !!} <br>
    {!! Form::file('certificado_gas', null, ['class' => 'form-control']) !!}
</div>

<!-- Revision Tecnica Field -->
<div class="form-group col-sm-6">
    {!! Form::label('revision_tecnica', __('models/inscripcions.fields.revision_tecnica').':') !!} <br>
    {!! Form::file('revision_tecnica', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', __('models/inscripcions.fields.estado').':') !!}
    <select name="estado" id="estado" class="form-control" required >
        <option value="">Seleccione el estado</option>
        <option value="0" @isset($inscripcion) @if ($inscripcion->estado=="0")
            selected
        @endif @endisset {{ (Request::old("estado") == "0" ? "selected":"") }}>No aprobado</option>
        <option value="1"@isset($inscripcion) @if ($inscripcion->estado=="1")
            selected
        @endif @endisset {{ (Request::old("estado") == "1" ? "selected":"") }}>Aprobado</option>
    </select>
</div>
@if (!isset($inscripcion))
    <div class="col-sm-12">
        <h5>Vehículo</h5>
        <div class="row">
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
        </div>
    </div>
@endif