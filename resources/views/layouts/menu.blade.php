<li class="side-menus {{ Request::is('home') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('home') }}">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
    <a class="nav-link" href="{{ route('users.index') }}">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>
    <a class="nav-link" href="{{ route('roles.index') }}">
        <i class=" fas fa-user-lock"></i><span>Roles</span>
    </a>
    <a class="nav-link" href="{{ route('businesses.index') }}">
        <i class="fas fa-business-time"></i><span>Negocios</span>
    </a>
    <a class="nav-link" href="{{ route('category-items.index') }}">
        <i class="fas fa-folder-minus"></i><span>Categorías Item</span>
    </a>
    <a class="nav-link" href="{{ route('menu-items.index') }}">
        <i class="fas fa-bars"></i><span>Menú Negocios</span>
    </a>

</li>
