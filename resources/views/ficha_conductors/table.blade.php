<div class="table-responsive">
    <table class="table" id="fichaConductors-table">
        <thead>
            <tr>
                <th>@lang('models/fichaConductors.fields.brevete_nro')</th>
                <th>@lang('models/fichaConductors.fields.dni')</th>
                <th>@lang('models/fichaConductors.fields.fullname')</th>
                <th>@lang('models/fichaConductors.fields.foto')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($fichaConductors as $fichaConductor)
            <tr>
                <td>{{ $fichaConductor->brevete_nro }}</td>
                <td>{{ $fichaConductor->dni }}</td>
                <td>{{ $fichaConductor->fullName}}</td>
                <td>
                    @if ($fichaConductor->foto!=null)
                        <img src="{{ $fichaConductor->foto }}" alt="" width="40" height="40">
                    @else
                        <img src="https://fakeimg.pl/350x200/?text=no%20foto" alt="" width="40" height="40">
                    @endif
                </td>
                <td width="120">
                    {!! Form::open(['route' => ['fichaConductors.destroy', $fichaConductor->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('fichaConductors.show', [$fichaConductor->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('fichaConductors.edit', [$fichaConductor->id]) }}" class='btn btn-default btn-xs'>
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
