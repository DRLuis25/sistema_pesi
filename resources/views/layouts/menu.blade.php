





<li class="nav-item">
    <a href="{{ route('usuarios.index') }}"
       class="nav-link {{ Request::is('usuarios*') ? 'active' : '' }}">
        <p>@lang('models/usuarios.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('ocurrencia.index') }}"
       class="nav-link {{ Request::is('ocurrencias*') ? 'active' : '' }}">
        <p>Ocurrencias</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('pagobase.index') }}"
       class="nav-link {{ Request::is('pagobase*') ? 'active' : '' }}">
        <p>Pago de Servicio Base</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('reclamo.index') }}"
       class="nav-link {{ Request::is('reclamo*') ? 'active' : '' }}">
        <p>Reclamos</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('serviciotaxi.index') }}"
       class="nav-link {{ Request::is('serviciotaxi*') ? 'active' : '' }}">
        <p>Servicio de Taxi</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('justificacionfalta.index') }}"
       class="nav-link {{ Request::is('justificacionfalta*') ? 'active' : '' }}">
        <p>Justificacion de Faltas</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('documentoinscripcion.index') }}"
       class="nav-link {{ Request::is('documentoinscripcion*') ? 'active' : '' }}">
        <p>Documentos de Inscripción</p>
    </a>
</li>
