<div class="table-responsive">
    <table class="table" id="personals-table">
        <thead>
            <tr>
                <th>@lang('models/personals.fields.nombres')</th>
                <th>@lang('models/personals.fields.telefono')</th>
                <th>@lang('models/personals.fields.email')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($personals as $personal)
            <tr>
                <td>{{ $personal->fullName }}</td>
                <td>{{ $personal->telefono }}</td>
                <td>{{ $personal->email }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['personals.destroy', $personal->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('personals.show', [$personal->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('personals.edit', [$personal->id]) }}" class='btn btn-default btn-xs'>
                        <i class="far fa-edit"></i>
                        </a>
                        
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
