<div class="table-responsive">
    <table class="table" id="contratoPersonals-table">
        <thead>
            <tr>
                <th>@lang('models/contratoPersonals.fields.personal_id')</th>
        <th>@lang('models/contratoPersonals.fields.fecha_contrato')</th>
        <th>@lang('models/contratoPersonals.fields.tiempo')</th>
        <th>@lang('models/contratoPersonals.fields.sueldo')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contratoPersonals as $contratoPersonal)
            <tr>
                <td>{{ $contratoPersonal->personal_id }}</td>
            <td>{{ $contratoPersonal->fecha_contrato }}</td>
            <td>{{ $contratoPersonal->tiempo }}</td>
            <td>{{ $contratoPersonal->sueldo }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['contratoPersonals.destroy', $contratoPersonal->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('contratoPersonals.show', [$contratoPersonal->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('contratoPersonals.edit', [$contratoPersonal->id]) }}" class='btn btn-default btn-xs'>
                        <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
