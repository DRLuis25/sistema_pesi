<div class="table-responsive">
    <table class="table" id="usuarios-table">
        <thead>
            <tr>
                <th>@lang('models/usuarios.fields.name')</th>
        <th>@lang('models/usuarios.fields.email')</th>
        <th>@lang('models/usuarios.fields.remember_token')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($usuarios as $usuarios)
            <tr>
                <td>{{ $usuarios->name }}</td>
            <td>{{ $usuarios->email }}</td>
            <td>{{ $usuarios->remember_token }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['usuarios.destroy', $usuarios->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('usuarios.show', [$usuarios->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('usuarios.edit', [$usuarios->id]) }}" class='btn btn-default btn-xs'>
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
