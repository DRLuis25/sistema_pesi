<!-- Personal Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('personal_id', __('models/contratoPersonals.fields.nombres').':') !!}
    <p>{{$contratoPersonal->personal->fullName}}</p>
</div>

<!-- Fecha Contrato Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_contrato', __('models/conductors.fields.fecha_contrato').':') !!}
    <input type="date" name="fecha_contrato" id="fecha_contrato" class="form-control"  @isset($contratoPersonal) value="{{$contratoPersonal->fecha_contrato->toDateString()}}" disabled @endisset>
    @isset($contratoPersonal)
        {!! Form::hidden('fecha_contrato', $contratoPersonal->fecha_contrato) !!}
    @endisset
</div>
@push('scripts')
    <script type="text/javascript">
        $('#fecha_contrato').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Tiempo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tiempo', __('models/contratoPersonals.fields.tiempo').':') !!}
    {!! Form::number('tiempo', null, ['class' => 'form-control','id'=>'tiempo']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#tiempo').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Sueldo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sueldo', __('models/contratoPersonals.fields.sueldo').':') !!}
    {!! Form::number('sueldo', null, ['class' => 'form-control']) !!}
</div>
