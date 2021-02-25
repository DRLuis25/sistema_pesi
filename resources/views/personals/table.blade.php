<div class="table-responsive">
    <table class="table" id="personals-table">
        <thead>
            <tr>
                <th>@lang('models/personals.fields.nombres')</th>
        <th>@lang('models/personals.fields.apellidoPaterno')</th>
        <th>@lang('models/personals.fields.apellidoMaterno')</th>
        <th>@lang('models/personals.fields.telefono')</th>
        <th>@lang('models/personals.fields.email')</th>
        <th>@lang('models/personals.fields.direccion')</th>
        <th>@lang('models/personals.fields.tipo')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($personals as $personal)
            <tr>
                <td>{{ $personal->nombres }}</td>
            <td>{{ $personal->apellidoPaterno }}</td>
            <td>{{ $personal->apellidoMaterno }}</td>
            <td>{{ $personal->telefono }}</td>
            <td>{{ $personal->email }}</td>
            <td>{{ $personal->direccion }}</td>
            <td>{{ $personal->tipo }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['personals.destroy', $personal->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('personals.show', [$personal->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('personals.edit', [$personal->id]) }}" class='btn btn-default btn-xs'>
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
