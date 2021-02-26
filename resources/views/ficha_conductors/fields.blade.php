<!-- Brevete Nro Field -->
<div class="form-group col-sm-6">
    {!! Form::label('brevete_nro', __('models/fichaConductors.fields.brevete_nro').':') !!}
    {!! Form::text('brevete_nro', null, ['class' => 'form-control']) !!}
</div>

<!-- Dni Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dni', __('models/fichaConductors.fields.dni').':') !!}
    {!! Form::text('dni', null, ['class' => 'form-control']) !!}
</div>
<!-- Dni Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombres', __('models/fichaConductors.fields.nombres').':') !!}
    {!! Form::text('nombres', null, ['class' => 'form-control']) !!}
</div>
<!-- Dni Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellidoPaterno', __('models/fichaConductors.fields.apellidoPaterno').':') !!}
    {!! Form::text('apellidoPaterno', null, ['class' => 'form-control']) !!}
</div>
<!-- Dni Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellidoMaterno', __('models/fichaConductors.fields.apellidoMaterno').':') !!}
    {!! Form::text('apellidoMaterno', null, ['class' => 'form-control']) !!}
</div>
<!-- Dni Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion', __('models/fichaConductors.fields.direccion').' (Opcional):') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div>
<!-- Certificado Pnp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('certificado_pnp', __('models/fichaConductors.fields.certificado_pnp').':') !!} <br>
    {!! Form::file('certificado_pnp', null, ['class' => 'form-control-file']) !!}
</div>


<!-- Brevete Field -->
<div class="form-group col-sm-6">
    {!! Form::label('brevete', __('models/fichaConductors.fields.brevete').':') !!} <br>
    {!! Form::file('brevete', null, ['class' => 'form-control-file']) !!}
</div>

<!-- Fotocheck Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fotocheck', __('models/fichaConductors.fields.fotocheck').':') !!} <br>
    {!! Form::file('fotocheck', null, ['class' => 'form-control-file']) !!}
</div>


<!-- Recibo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('recibo', __('models/fichaConductors.fields.recibo').':') !!} <br>
    {!! Form::file('recibo', null, ['class' => 'form-control-file']) !!}
</div>

<!-- Foto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('foto', __('models/fichaConductors.fields.foto').':') !!} <br>
    {!! Form::file('foto', null, ['class' => 'form-control-file']) !!}
</div>
<!-- Observaciones Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', __('models/conductors.fields.observaciones').':') !!}
    <select name="estado" id="estado" class="form-control">
        <option value="1" @isset($fichaConductor)
            @if ($fichaConductor->estado=="1")
                selected
            @endif
        @endisset >Aprobado</option>
        <option value="0"@isset($fichaConductor)
        @if ($fichaConductor->estado=="0")
            selected
        @endif
    @endisset >No Aprobado</option>
    </select>
</div>