<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/usuarios.fields.name').':') !!}
    <p>{{ $usuarios->name }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', __('models/usuarios.fields.email').':') !!}
    <p>{{ $usuarios->email }}</p>
</div>

<!-- Email Verified At Field -->
<div class="col-sm-12">
    {!! Form::label('email_verified_at', __('models/usuarios.fields.email_verified_at').':') !!}
    <p>{{ $usuarios->email_verified_at }}</p>
</div>

<!-- Password Field -->
<div class="col-sm-12">
    {!! Form::label('password', __('models/usuarios.fields.password').':') !!}
    <p>{{ $usuarios->password }}</p>
</div>

<!-- Remember Token Field -->
<div class="col-sm-12">
    {!! Form::label('remember_token', __('models/usuarios.fields.remember_token').':') !!}
    <p>{{ $usuarios->remember_token }}</p>
</div>

