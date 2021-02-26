<!-- Nombres Field -->
<div class="col-sm-12">
    {!! Form::label('nombres', __('models/personals.fields.nombres').':') !!}
    <p>{{ $personal->nombres }}</p>
</div>

<!-- Apellidopaterno Field -->
<div class="col-sm-12">
    {!! Form::label('apellidoPaterno', __('models/personals.fields.apellidoPaterno').':') !!}
    <p>{{ $personal->apellidoPaterno }}</p>
</div>

<!-- Apellidomaterno Field -->
<div class="col-sm-12">
    {!! Form::label('apellidoMaterno', __('models/personals.fields.apellidoMaterno').':') !!}
    <p>{{ $personal->apellidoMaterno }}</p>
</div>

<!-- Telefono Field -->
<div class="col-sm-12">
    {!! Form::label('telefono', __('models/personals.fields.telefono').':') !!}
    <p>{{ $personal->telefono }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', __('models/personals.fields.email').':') !!}
    <p>{{ $personal->email }}</p>
</div>

<!-- Direccion Field -->
<div class="col-sm-12">
    {!! Form::label('direccion', __('models/personals.fields.direccion').':') !!}
    <p>{{ $personal->direccion }}</p>
</div>

<!-- Tipo Field -->
<div class="col-sm-12">
    {!! Form::label('tipo', __('models/personals.fields.tipo').':') !!}
    <p>
        @if ($personal->tipo=="1")
            Operadora
        @elseif($personal->tipo=="2")
            Gerente
        @elseif($personal->tipo=="3")
            Administrador
        @else
            No definido
        @endif
    </p>
</div>