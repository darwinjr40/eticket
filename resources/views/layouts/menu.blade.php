<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class=" fas fa-building"></i><span>Casita</span>
    </a>

    <a class="nav-link" href="{{route('usuarios.index')}}">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>
    <a class="nav-link" href="{{route('roles.index')}}">
        <i class=" fas fa-user-lock"></i><span>Roles</span>
    </a>
    <a class="nav-link" href="{{route('permisos.index')}}">
        <i class=" fas fa-user-lock"></i><span>Permisos</span>
    </a>
    <a class="nav-link" href="{{route('categoriaEventos.index')}}">
        <i class=" fas fa-bars"></i><span>Categoria Eventos</span>
    </a>
    <a class="nav-link" href="/sectors">
        <i class=" fas fa-bars"></i><span>Sectores del Eventos</span>
    </a>
    <a class="nav-link" href="/contactos">
        <i class=" fas fa-bars"></i><span>Contactos</span>
    <a class="nav-link" href="{{route('contactos.index')}}">
        <i class=" fas fa-address-book"></i><span>Contactos</span>
    </a>
    <a class="nav-link" href="{{route('eventos.index')}}">
        <i class="fa fa-calendar"></i><span>Eventos</span>
    </a>

    <a class="nav-link" href="{{ route('imagens.index') }}">
        <i class="fa fa-clone"></i><span>Imagenes</span>
    </a>
     <a class="nav-link" href="{{ route('ubicacions.index') }}">
        <i class=" fas fa-map-marker"></i><span>Ubicacion</span>
    </a>

</li>
