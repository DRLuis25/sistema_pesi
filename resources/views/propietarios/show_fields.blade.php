<!-- Dni Field -->
<div class="col-sm-12">
    {!! Form::label('dni', __('models/propietarios.fields.dni').':') !!}
    <p>{{ $propietario->dni }}</p>
</div>

<!-- Nombre Propietario Field -->
<div class="col-sm-12">
    {!! Form::label('nombre_propietario', __('models/propietarios.fields.nombre_propietario').':') !!}
    <p>{{ $propietario->nombre_propietario }}</p>
</div>

<!-- Apellidopaterno Propietario Field -->
<div class="col-sm-12">
    {!! Form::label('apellidoPaterno_propietario', __('models/propietarios.fields.apellidoPaterno_propietario').':') !!}
    <p>{{ $propietario->apellidoPaterno_propietario }}</p>
</div>

<!-- Apellidomaterno Propietario Field -->
<div class="col-sm-12">
    {!! Form::label('apellidoMaterno_propietario', __('models/propietarios.fields.apellidoMaterno_propietario').':') !!}
    <p>{{ $propietario->apellidoMaterno_propietario }}</p>
</div>

<!-- Telefono Propietario Field -->
<div class="col-sm-12">
    {!! Form::label('telefono_propietario', __('models/propietarios.fields.telefono_propietario').':') !!}
    <p>{{ $propietario->telefono_propietario }}</p>
</div>

