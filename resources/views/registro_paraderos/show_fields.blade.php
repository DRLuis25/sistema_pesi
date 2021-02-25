<!-- Descripcion Field -->
<div class="col-sm-12">
    {!! Form::label('descripcion', __('models/registroParaderos.fields.descripcion').':') !!}
    <p>{{ $registroParadero->descripcion }}</p>
</div>

<!-- Direccion Field -->
<div class="col-sm-12">
    {!! Form::label('direccion', __('models/registroParaderos.fields.direccion').':') !!}
    <p>{{ $registroParadero->direccion }}</p>
</div>

