<li class="side-menus {{ Request::is('home') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('home') }}">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
    @can('user-list')
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class=" fas fa-users"></i><span>Usuarios</span>
        </a>
    @endcan

    @can('role-list')
        <a class="nav-link" href="{{ route('roles.index') }}">
            <i class=" fas fa-user-lock"></i><span>Roles</span>
        </a>
    @endcan

    @can('business-list')
        <a class="nav-link" href="{{ route('businesses.index') }}">
            <i class="fas fa-business-time"></i><span>Negocios</span>
        </a>
    @endcan

    @can('category-item-list')
        <a class="nav-link" href="{{ route('category-items.index') }}">
            <i class="fas fa-folder-minus"></i><span>Categorías Item</span>
        </a>
    @endcan

    @can('menu-item-list')
        <a class="nav-link" href="{{ route('menu-items.index') }}">
            <i class="fas fa-bars"></i><span>Menú Negocios</span>
        </a>
    @endcan
</li>
