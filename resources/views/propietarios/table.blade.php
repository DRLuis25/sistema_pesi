<div class="table-responsive">
    <table class="table" id="propietarios-table">
        <thead>
            <tr>
                <th>@lang('models/propietarios.fields.dni')</th>
                <th>@lang('models/propietarios.fields.propietario')</th>
                <th>@lang('models/propietarios.fields.telefono_propietario')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($propietarios as $propietario)
            <tr>
                <td>{{ $propietario->dni }}</td>
            <td>{{ $propietario->FullName }}</td>
            <td>{{ $propietario->telefono_propietario }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['propietarios.destroy', $propietario->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('propietarios.show', [$propietario->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        @role('Administrador')
                        <a href="{{ route('propietarios.edit', [$propietario->id]) }}" class='btn btn-default btn-xs'>
                        <i class="far fa-edit"></i>
                        </a>
                        
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                        @endrole
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
