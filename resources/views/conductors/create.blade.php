@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>@lang('models/conductors.singular')</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'conductors.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('conductors.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('conductors.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
