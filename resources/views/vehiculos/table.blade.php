<div class="table-responsive">
    <table class="table" id="vehiculos-table">
        <thead>
            <tr>
                <th>@lang('models/vehiculos.fields.placa')</th>
        <th>@lang('models/vehiculos.fields.color')</th>
        <th>@lang('models/vehiculos.fields.marca')</th>
        <th>@lang('models/vehiculos.fields.modelo')</th>
        <th>@lang('models/vehiculos.fields.inscripcion_id')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($vehiculos as $vehiculo)
            <tr>
                <td>{{ $vehiculo->placa }}</td>
            <td>{{ $vehiculo->color }}</td>
            <td>{{ $vehiculo->marca }}</td>
            <td>{{ $vehiculo->modelo }}</td>
            <td>{{ $vehiculo->inscripcion_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['vehiculos.destroy', $vehiculo->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('vehiculos.show', [$vehiculo->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('vehiculos.edit', [$vehiculo->id]) }}" class='btn btn-default btn-xs'>
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
