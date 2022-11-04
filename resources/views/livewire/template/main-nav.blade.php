<div>
    <nav id="sidebar" aria-label="Main Navigation">
        <!-- Side Header -->
        <div class="bg-header-dark">
            <div class="content-header bg-white-5">
                <!-- Logo -->
                <a class="fw-semibold text-white tracking-wide" href="/">
                <span class="smini-visible">
                    <span class="opacity-75"><img class="img-fluid" src="{{asset('storage/images/settings/app_logo.png')}}" alt="" width="30"></span>
                </span>
                <span class="smini-hidden">
                    {{$app_name}}<span class="opacity-75"></span>
                </span>
                </a>
                <!-- END Logo -->

                <!-- Options -->
                <div>
                <!-- Toggle Sidebar Style -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <!-- Class Toggle, functionality initialized in Helpers.dmToggleClass() -->
                <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle" data-target="#sidebar-style-toggler" data-class="fa-toggle-off fa-toggle-on" onclick="Dashmix.layout('sidebar_style_toggle');Dashmix.layout('header_style_toggle');">
                    <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
                </button>
                <!-- END Toggle Sidebar Style -->

                <!-- Dark Mode -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle" data-target="#dark-mode-toggler" data-class="far fa" onclick="Dashmix.layout('dark_mode_toggle');">
                    <i class="far fa-moon" id="dark-mode-toggler"></i>
                </button>
                <!-- END Dark Mode -->

                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout" data-action="sidebar_close">
                    <i class="fa fa-times-circle"></i>
                </button>
                <!-- END Close Sidebar -->
                </div>
                <!-- END Options -->
            </div>
        </div>
        <!-- END Side Header -->

        <!-- Sidebar Scrolling -->
        <div class="js-sidebar-scroll">
            <!-- Side Navigation -->
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    <li class="nav-main-heading">Various</li>
                    <li class="nav-main-item{{ request()->is('pages/*') ? ' open' : '' }}">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                        <i class="nav-main-link-icon fa fa-lightbulb"></i>
                        <span class="nav-main-link-name">Examples</span>
                        </a>
                        <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('pages/datatables') ? ' active' : '' }}" href="/pages/datatables">
                            <span class="nav-main-link-name">DataTables</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('pages/slick') ? ' active' : '' }}" href="/pages/slick">
                            <span class="nav-main-link-name">Slick Slider</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('pages/blank') ? ' active' : '' }}" href="/pages/blank">
                            <span class="nav-main-link-name">Blank</span>
                            </a>
                        </li>
                        </ul>
                    </li>
                    @can('administrador.read')
                    <li class="nav-main-heading">Configuración</li>
                    <li class="nav-main-item{{ request()->is(['users','users.edit','roles','suppliers']) ? ' open' : '' }}">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                            <i class="nav-main-link-icon fa fa-users"></i>
                            <span class="nav-main-link-name">Usuarios</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link{{ request()->is(['users','users.edit']) ? ' active' : '' }}" href="{{ route('users') }}">
                                <span class="nav-main-link-name">Lista</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link{{ request()->is('roles') ? ' active' : '' }}" href="{{ route('roles') }}">
                                <span class="nav-main-link-name">Roles</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is(['settings']) ? ' active' : '' }}" href="{{ route('settings',1) }}">
                            <i class="nav-main-link-icon si si-settings"></i>
                            <span class="nav-main-link-name">Configuración</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is(['suppliers']) ? ' active' : '' }}" href="{{ route('suppliers',1) }}">
                            <i class="nav-main-link-icon si si-settings"></i>
                            <span class="nav-main-link-name">Proveedores</span>
                        </a>
                    </li>
                    <li class="nav-main-item{{ request()->is(['clients','clients.edit','roles']) ? ' open' : '' }}">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                            <i class="nav-main-link-icon fa fa-users-rectangle"></i>
                            <span class="nav-main-link-name">Clientes</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link{{ request()->is(['clients','clients.edit']) ? ' active' : '' }}" href="{{ route('clients') }}">
                                <span class="nav-main-link-name">Lista de Clientes</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-main-item{{ request()->is(['projects','projects.edit','roles']) ? ' open' : '' }}">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                            <i class="nav-main-link-icon fa fa-clipboard-list"></i>
                            <span class="nav-main-link-name">Proyectos</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link{{ request()->is(['projects','projects.edit']) ? ' active' : '' }}" href="{{ route('projects',1) }}">
                                <span class="nav-main-link-name">Proyectos Nuevos</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link{{ request()->is(['projects','projects.edit']) ? ' active' : '' }}" href="{{ route('projects',2) }}">
                                <span class="nav-main-link-name">Mantenimientos</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link{{ request()->is(['projects','projects.edit']) ? ' active' : '' }}" href="{{ route('projects',3) }}">
                                <span class="nav-main-link-name">Listar Todos</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endcan
                </ul>
            </div>
            <!-- END Side Navigation -->
        </div>
        <!-- END Sidebar Scrolling -->
    </nav>
</div>
