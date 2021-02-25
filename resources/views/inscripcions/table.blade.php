<div class="table-responsive">
    <table class="table" id="inscripcions-table">
        <thead>
            <tr>
                <th>@lang('models/inscripcions.fields.tarjeta_propiedad')</th>
        <th>@lang('models/inscripcions.fields.soat_afocat')</th>
        <th>@lang('models/inscripcions.fields.certificado_gps')</th>
        <th>@lang('models/inscripcions.fields.certificado_gas')</th>
        <th>@lang('models/inscripcions.fields.revision_tecnica')</th>
        <th>@lang('models/inscripcions.fields.dni')</th>
        <th>@lang('models/inscripcions.fields.nombre_propietario')</th>
        <th>@lang('models/inscripcions.fields.apellidoPaterno_propietario')</th>
        <th>@lang('models/inscripcions.fields.apellidoMaterno_propietario')</th>
        <th>@lang('models/inscripcions.fields.telefono_propietario')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($inscripcions as $inscripcion)
            <tr>
                <td>{{ $inscripcion->tarjeta_propiedad }}</td>
            <td>{{ $inscripcion->soat_afocat }}</td>
            <td>{{ $inscripcion->certificado_gps }}</td>
            <td>{{ $inscripcion->certificado_gas }}</td>
            <td>{{ $inscripcion->revision_tecnica }}</td>
            <td>{{ $inscripcion->dni }}</td>
            <td>{{ $inscripcion->nombre_propietario }}</td>
            <td>{{ $inscripcion->apellidoPaterno_propietario }}</td>
            <td>{{ $inscripcion->apellidoMaterno_propietario }}</td>
            <td>{{ $inscripcion->telefono_propietario }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['inscripcions.destroy', $inscripcion->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('inscripcions.show', [$inscripcion->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('inscripcions.edit', [$inscripcion->id]) }}" class='btn btn-default btn-xs'>
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
