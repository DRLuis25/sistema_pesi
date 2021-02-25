<!-- Personal Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('personal_id', __('models/contratoPersonals.fields.personal_id').':') !!}
    {!! Form::number('personal_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Contrato Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_contrato', __('models/contratoPersonals.fields.fecha_contrato').':') !!}
    {!! Form::date('fecha_contrato', null, ['class' => 'form-control','id'=>'fecha_contrato']) !!}
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
    {!! Form::date('tiempo', null, ['class' => 'form-control','id'=>'tiempo']) !!}
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
