<div class="table-responsive">
    <table class="table" id="inscripcions-table">
        <thead>
            <tr>
                <th>@lang('models/inscripcions.fields.propietario_id')</th>
                <th>@lang('models/inscripcions.fields.tarjeta_propiedad')</th>
                <th>@lang('models/inscripcions.fields.estado')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($inscripcions as $inscripcion)
            <tr>
                <td>
                    <a href="{{ route('propietarios.show', [$inscripcion->propietario->id]) }}" style=" color: inherit;text-decoration: none">{{ $inscripcion->propietario->fullName }}</a>
                </td>
                <td>
                    @if ($inscripcion->tarjeta_propiedad!=null)
                        <a href="{{ $inscripcion->tarjeta_propiedad }}" style=" color: inherit;text-decoration: none">ver tarjeta propiedad</a>
                    @else
                        <p>sin tarjeta propiedad</p>
                    @endif
                </td>
                <td>@if ($inscripcion->estado==1)
                    Aprobado
                @else
                    No Aprobado
                @endif</td>
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
