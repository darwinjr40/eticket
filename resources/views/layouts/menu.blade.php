<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class=" fas fa-building"></i><span>Casita</span>
    </a>
    <a class="nav-link" href="/usuarios">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>
    <a class="nav-link" href="/roles">
        <i class=" fas fa-user-lock"></i><span>Roles</span>
    </a>
    <a class="nav-link" href="/permisos">
        <i class=" fas fa-user-lock"></i><span>Permisos</span>
    </a>
    <a class="nav-link" href="/categoriaEventos">
        <i class=" fas fa-bars"></i><span>Categoria Eventos</span>
    </a>
    <a class="nav-link" href="/contactos">
        <i class=" fas fa-bars"></i><span>Contactos</span>
    </a>
    <a class="nav-link" href="{{ route('imagens.index') }}">
        <i class=" fas fa-bars"></i><span>Imagenes</span>
    </a>
    <a class="nav-link" href="{{ route('ubicacions.index') }}">
        <i class=" fas fa-bars"></i><span>Ubicacion</span>
    </a>
    
</li>
