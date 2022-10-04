<nav class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
    <div class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
        <button class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" type="button" onclick="toggleNavbar('example-collapse-sidebar')">
            <i class="fa-solid fa-bars"></i>
        </button>
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="/assets/img/logo.png" alt="" width="60" height="48" class="d-inline-block align-text-top">
        </a>
        <div class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden" id="example-collapse-sidebar">
            <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-300">
                <div class="flex flex-wrap">
                    <div class="w-6/12 flex justify-start">
                        <button type="button" class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" onclick="toggleNavbar('example-collapse-sidebar')">
                            <i class="fa-solid fa-circle-xmark"></i>
                        </button>
                    </div>
                    <div class="w-6/12">
                        <a class="md:block md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-lg font-bold p-4 px-0" href="{{ route('home') }}">
                            {{ trans('panel.site_title') }}
                        </a>
                    </div>
                </div>
            </div>

            <h6 class="md:min-w-full text-blueGray-700 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                Menú de navegación
            </h6>

            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                <li class="items-center">
                    <a href="{{ route('home') }}" class="{{ request()->is('/') ? 'sidebar-nav-active' : 'sidebar-nav' }}">
                        <i class="fa-solid fa-file-lines"></i>
                        Evaluaciones
                    </a>
                </li>

                <li class="items-center">
                    <a href="{{ route('leaderboard') }}" class="{{ request()->is('leaderboard') ? 'sidebar-nav-active' : 'sidebar-nav' }}">
                        <i class="fa-solid fa-clipboard"></i>
                        Tabla de notas
                    </a>
                </li>
            </ul>

            <hr class="my-4 md:min-w-full">

            <h6 class="md:min-w-full text-blueGray-700 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                @guest Menú de usuario @else Menú de usuario @endguest
            </h6>

            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                @guest
                <li class="items-center">
                    <a href="{{ route("login") }}" class="sidebar-nav">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        Iniciar sesión
                    </a>
                </li>
                @else
                <li class="items-center">
                    <a href="{{ route('results.index') }}" class="{{ request()->is('results') ? 'sidebar-nav-active' : 'sidebar-nav' }}">
                        <i class="fa-solid fa-square-poll-vertical"></i>
                        Resultados
                    </a>
                </li>

                @if(file_exists(app_path('Http/Controllers/Auth/UserProfileController.php')))
                @can('editar_perfiles')
                <li class="items-center">
                    <a href="{{ route('profile.show') }}" class="{{ request()->is('profile') ? 'sidebar-nav-active' : 'sidebar-nav' }}">
                        <i class="fa-fw c-sidebar-nav-icon fas fa-user-circle"></i>
                        Perfil
                    </a>
                </li>
                @endcan
                @endif

                <li class="items-center">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" class="sidebar-nav">
                        <i class="fa-fw fas fa-sign-out-alt"></i>
                        Cerrar sesión
                    </a>
                </li>
                @endguest
            </ul>

            @auth
            @if(auth()->user()->is_admin)
            <hr class="my-4 md:min-w-full">

            <h6 class="md:min-w-full text-blueGray-700 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                Menú de administración
            </h6>
            @endif

            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                @can('acceso_editar_usuario')
                <li class="items-center">
                    <a class="has-sub {{ request()->is("permissions*")||request()->is("roles*")||request()->is("users*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                        <i class="fa-fw fas c-sidebar-nav-icon fa-users"></i>
                        Administrar usuarios
                    </a>
                    <ul class="ml-4 subnav hidden">
                        @can('acceso_permiso')
                        <li class="items-center">
                            <a class="{{ request()->is("permissions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("permissions.index") }}">
                                <i class="fa-solid fa-user-check"></i>
                                </i>
                                Permisos
                            </a>
                        </li>
                        @endcan
                        @can('acceso_rol')
                        <li class="items-center">
                            <a class="{{ request()->is("roles*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("roles.index") }}">
                                <i class="fa-solid fa-user-shield"></i>
                                </i>
                                Roles de usuarios
                            </a>
                        </li>
                        @endcan
                        @can('acceso_usuario')
                        <li class="items-center">
                            <a class="{{ request()->is("users*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("users.index") }}">
                                <i class="fa-solid fa-user-plus"></i>
                                </i>
                                Usuarios
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan
                @can('acceso_tema')
                <li class="items-center">
                    <a class="{{ request()->is("topics*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("topics.index") }}">
                        <i class="fa-solid fa-atom"></i>
                        </i>
                        Materias
                    </a>
                </li>
                @endcan
                @can('acceso_pregunta')
                <li class="items-center">
                    <a class="{{ request()->is("questions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("questions.index") }}">
                        <i class="fa-solid fa-circle-question"></i>
                        </i>
                        Preguntas
                    </a>
                </li>
                @endcan
                @can('acceso_evaluacion')
                <li class="items-center">
                    <a class="{{ request()->is("quizzes*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("quizzes.index") }}">
                        <i class="fa-solid fa-cube"></i>
                        </i>
                        Evaluaciones
                    </a>
                </li>
                @endcan
                @can('acceso_examen')
                <li class="items-center">
                    <a class="{{ request()->is("tests*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("tests.index") }}">
                        <i class="fa-solid fa-list-check"></i>
                        </i>
                        Notas
                    </a>
                </li>
                @endcan
                @can('acceso_comentarios')
                <li class="items-center">
                    <a class="{{ request()->is("comments*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("comments.index") }}">
                        <i class="fa-solid fa-comment"></i>
                        </i>
                        Comentarios
                    </a>
                </li>
                @endcan

            </ul>
            @endauth
        </div>
    </div>
</nav>
