<div class="table-responsive">
    <table class="table" id="conductors-table">
        <thead>
            <tr>
                <th>@lang('models/conductors.fields.fecha_contrato')</th>
        <th>@lang('models/conductors.fields.observaciones')</th>
        <th>@lang('models/conductors.fields.ficha_conductor_id')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($conductors as $conductor)
            <tr>
                <td>{{ $conductor->fecha_contrato }}</td>
            <td>{{ $conductor->observaciones }}</td>
            <td>{{ $conductor->ficha_conductor_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['conductors.destroy', $conductor->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('conductors.show', [$conductor->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('conductors.edit', [$conductor->id]) }}" class='btn btn-default btn-xs'>
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
