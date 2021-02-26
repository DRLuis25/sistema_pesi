





<li class="nav-item">
    <a href="{{ route('usuarios.index') }}"
       class="nav-link {{ Request::is('usuarios*') ? 'active' : '' }}">
        <p>@lang('models/usuarios.plural')</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('registroParaderos.index') }}"
       class="nav-link {{ Request::is('registroParaderos*') ? 'active' : '' }}">
        <p>@lang('models/registroParaderos.plural')</p>
    </a>
</li><li class="nav-item">
    <a href="{{ route('fichaConductors.index') }}"
       class="nav-link {{ Request::is('fichaConductors*') ? 'active' : '' }}">
        <p>@lang('models/fichaConductors.plural')</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('conductors.index') }}"
       class="nav-link {{ Request::is('conductors*') ? 'active' : '' }}">
        <p>@lang('models/conductors.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('propietarios.index') }}"
       class="nav-link {{ Request::is('propietarios*') ? 'active' : '' }}">
        <p>@lang('models/propietarios.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('inscripcions.index') }}"
       class="nav-link {{ Request::is('inscripcions*') ? 'active' : '' }}">
        <p>@lang('models/inscripcions.plural')</p>
    </a>
</li>




<li class="nav-item">
    <a href="{{ route('vehiculos.index') }}"
       class="nav-link {{ Request::is('vehiculos*') ? 'active' : '' }}">
        <p>@lang('models/vehiculos.plural')</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('personals.index') }}"
       class="nav-link {{ Request::is('personals*') ? 'active' : '' }}">
        <p>@lang('models/personals.plural')</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('contratoPersonals.index') }}"
       class="nav-link {{ Request::is('contratoPersonals*') ? 'active' : '' }}">
        <p>@lang('models/contratoPersonals.plural')</p>
    </a>
</li>
