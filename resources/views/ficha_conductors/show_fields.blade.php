<!-- Certificado Pnp Field -->
<div class="col-sm-12">
    {!! Form::label('certificado_pnp', __('models/fichaConductors.fields.certificado_pnp').':') !!}
    <p>
        @if ($fichaConductor->certificado_pnp!=null)
            <a href="{{ $fichaConductor->certificado_pnp }}" style=" color: inherit;text-decoration: none">ver certificado</a>
        @else
            <p>sin certificado</p>
        @endif
    </p>
</div>

<!-- Brevete Nro Field -->
<div class="col-sm-12">
    {!! Form::label('brevete_nro', __('models/fichaConductors.fields.brevete_nro').':') !!}
    <p>
        {{ $fichaConductor->brevete_nro }}
    </p>
</div>

<!-- Brevete Field -->
<div class="col-sm-12">
    {!! Form::label('brevete', __('models/fichaConductors.fields.brevete').':') !!}
    <p>
        @if ($fichaConductor->brevete!=null)
            <a href="{{ $fichaConductor->brevete }}" style=" color: inherit;text-decoration: none">ver brevete</a>
        @else
            <p>sin brevete</p>
        @endif
    </p>
</div>

<!-- Fotocheck Field -->
<div class="col-sm-12">
    {!! Form::label('fotocheck', __('models/fichaConductors.fields.fotocheck').':') !!}
    <p>
        @if ($fichaConductor->fotocheck!=null)
            <a href="{{ $fichaConductor->fotocheck }}" style=" color: inherit;text-decoration: none">ver fotocheck</a>
        @else
            <p>sin fotocheck</p>
        @endif
    </p>
</div>

<!-- Dni Field -->
<div class="col-sm-12">
    {!! Form::label('dni', __('models/fichaConductors.fields.dni').':') !!}
    <p>{{ $fichaConductor->dni }}</p>
</div>

<!-- Recibo Field -->
<div class="col-sm-12">
    {!! Form::label('recibo', __('models/fichaConductors.fields.recibo').':') !!}
    <p>
        @if ($fichaConductor->recibo!=null)
            <a href="{{ $fichaConductor->recibo }}" style=" color: inherit;text-decoration: none">ver recibo</a>
        @else
            <p>sin recibo luz/agua</p>
        @endif
    </p>
</div>

<!-- Foto Field -->
<div class="col-sm-12">
    {!! Form::label('foto', __('models/fichaConductors.fields.foto').':') !!}
    <p>
        @if ($fichaConductor->foto!=null)
            <img src="{{ $fichaConductor->foto }}" alt="" width="100" height="100">
        @else
            <img src="https://fakeimg.pl/350x200/?text=no%20foto" alt="" width="100" height="100">
        @endif
    </p>
</div>

