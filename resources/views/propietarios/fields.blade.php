<!-- Dni Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dni', __('models/propietarios.fields.dni').':') !!}
    {!! Form::number('dni', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Propietario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_propietario', __('models/propietarios.fields.nombre_propietario').':') !!}
    {!! Form::text('nombre_propietario', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellidopaterno Propietario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellidoPaterno_propietario', __('models/propietarios.fields.apellidoPaterno_propietario').':') !!}
    {!! Form::text('apellidoPaterno_propietario', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellidomaterno Propietario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellidoMaterno_propietario', __('models/propietarios.fields.apellidoMaterno_propietario').':') !!}
    {!! Form::text('apellidoMaterno_propietario', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Propietario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono_propietario', __('models/propietarios.fields.telefono_propietario').':') !!}
    {!! Form::text('telefono_propietario', null, ['class' => 'form-control']) !!}
</div>
