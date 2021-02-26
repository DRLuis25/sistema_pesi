
<!-- Ficha Conductor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ficha_conductor_id', __('models/conductors.fields.ficha_conductor_id').':') !!}
    <select name="ficha_conductor_id" id="ficha_conductor_id" class="form-control select2 selectpicker" data-live-search="true" @isset($conductor) disabled @endisset >
        @foreach ($fichaConductores as $item)
            <option value="{{$item->id}}" @isset($conductor) @if ($conductor->id==$item->id)
                selected
            @endif @endisset > {{$item->fullName}}</option>
        @endforeach 
    </select>
    @isset($conductor)
        {!! Form::hidden('ficha_conductor_id', $conductor->id) !!}
    @endisset
</div>

<!-- Fecha Contrato Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_contrato', __('models/conductors.fields.fecha_contrato').':') !!}
    <input type="date" name="fecha_contrato" id="fecha_contrato" class="form-control"  @isset($conductor) value="{{$conductor->fecha_contrato->toDateString()}}" disabled @endisset>
    @isset($conductor)
        {!! Form::hidden('fecha_contrato', $conductor->fecha_contrato) !!}
    @endisset
</div>

<!-- Observaciones Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observaciones', __('models/conductors.fields.observaciones').':') !!}
    {!! Form::text('observaciones', null, ['class' => 'form-control']) !!}
</div>
@isset($conductora)
    <!-- Observaciones Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('estado', __('models/conductors.fields.observaciones').':') !!}
        <select name="estado" id="estado" class="form-control">
            <option value="1" >Activo</option>
            <option value="0">Inactivo</option>
        </select>
    </div>
@endisset