<div class="table-responsive">
    <table class="table" id="vehiculos-table">
        <thead>
            <tr>
                <th>@lang('models/vehiculos.fields.propietario')</th>
                <th>@lang('models/vehiculos.fields.placa')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($vehiculos as $vehiculo)
            <tr>
                <td>{{ $vehiculo->inscripcion->propietario->fullName }}</td>
                <td>{{ $vehiculo->placa }}</td>
            
                <td width="120">
                    {!! Form::open(['route' => ['vehiculos.destroy', $vehiculo->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('vehiculos.show', [$vehiculo->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        @role('Administrador')
                        <a href="{{ route('vehiculos.edit', [$vehiculo->id]) }}" class='btn btn-default btn-xs'>
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
