<!-- Fecha Contrato Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_contrato', __('models/conductors.fields.fecha_contrato').':') !!}
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

<!-- Observaciones Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observaciones', __('models/conductors.fields.observaciones').':') !!}
    {!! Form::text('observaciones', null, ['class' => 'form-control']) !!}
</div>

<!-- Ficha Conductor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ficha_conductor_id', __('models/conductors.fields.ficha_conductor_id').':') !!}
    {!! Form::number('ficha_conductor_id', null, ['class' => 'form-control']) !!}
</div>
