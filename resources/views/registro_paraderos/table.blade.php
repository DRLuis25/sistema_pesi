<div class="table-responsive">
    <table class="table" id="registroParaderos-table">
        <thead>
            <tr>
                <th>@lang('models/registroParaderos.fields.descripcion')</th>
        <th>@lang('models/registroParaderos.fields.direccion')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($registroParaderos as $registroParadero)
            <tr>
                <td>{{ $registroParadero->descripcion }}</td>
            <td>{{ $registroParadero->direccion }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['registroParaderos.destroy', $registroParadero->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('registroParaderos.show', [$registroParadero->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('registroParaderos.edit', [$registroParadero->id]) }}" class='btn btn-default btn-xs'>
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
