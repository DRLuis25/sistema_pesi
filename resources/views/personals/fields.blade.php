<!-- Nombres Field -->
<div class="form-group col-sm-3">
    {!! Form::label('nombres', __('models/personals.fields.nombres').':') !!}
    {!! Form::text('nombres', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellidopaterno Field -->
<div class="form-group col-sm-2">
    {!! Form::label('apellidoPaterno', __('models/personals.fields.apellidoPaterno').':') !!}
    {!! Form::text('apellidoPaterno', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellidomaterno Field -->
<div class="form-group col-sm-2">
    {!! Form::label('apellidoMaterno', __('models/personals.fields.apellidoMaterno').':') !!}
    {!! Form::text('apellidoMaterno', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-2">
    {!! Form::label('telefono', __('models/personals.fields.telefono').':') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-3">
    {!! Form::label('email', __('models/personals.fields.email').':') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-4">
    {!! Form::label('direccion', __('models/personals.fields.direccion').':') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Field -->
<div class="form-group col-sm-3">
    {!! Form::label('tipo', __('models/personals.fields.tipo').':') !!}
    <select name="tipo" id="tipo" class="form-control" required>
        <option value="">Seleccione una opción</option>
        <option value="2" {{ (Request::old("tipo") == "2" ? "selected":"") }}  @isset($personal) @if ($personal->tipo=="2")
            selected
        @endif @endisset >Gerente</option>
        <option value="3"{{ (Request::old("tipo") == "3" ? "selected":"") }} @isset($personal) @if ($personal->tipo=="3")
            selected
        @endif @endisset>Administrador</option>
        <option value="1"{{ (Request::old("tipo") == "1" ? "selected":"") }} @isset($personal) @if ($personal->tipo=="1")
            selected
        @endif @endisset>Operador</option>
    </select>
</div>

@if (!isset($personal))
<div class="col-sm-12">
    <h5>{{ Form::label('fecha_contrato', __('models/contratoPersonals.fields.contrato').':')}}</h5>
    <div class="row">
        <!-- Fecha Contrato Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('fecha_contrato', __('models/contratoPersonals.fields.fecha_contrato').':') !!}
            {!! Form::date('fecha_contrato', null, ['class' => 'form-control','id'=>'fecha_contrato']) !!}
        </div>
        <!-- Tiempo Field -->
        <div class="form-group col-sm-2">
        {!! Form::label('tiempo', __('models/contratoPersonals.fields.tiempo').' (Meses):') !!}
        <input type="number" min="1" max="48" placeholder="meses" name="tiempo" class="form-control">
        </div>
        <!-- Sueldo Field -->
        <div class="form-group col-sm-2">
            {!! Form::label('sueldo', __('models/contratoPersonals.fields.sueldo').':') !!}
            {!! Form::number('sueldo', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
@endif

