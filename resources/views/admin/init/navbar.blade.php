{{---
class="{{request()->is('/ruta')?'active':''}}"
---}}

<nav class="pcoded-navbar menu-light ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div ">
            <div class="">
                <div class="main-menu-header">
                    @if(\Illuminate\Support\Facades\Auth::user()->url_image==='#')
                        <img wire:ignore class="img-radius" src="{{asset('img/user.jpg')}}"
                             alt="User-Profile-Image" style="height: 50px; width: 50px">
                    @else
                        <img wire:ignore class="img-radius"
                             src="{{asset(\Illuminate\Support\Facades\Auth::user()->url_image)}}"
                             alt="User-Profile-Image" style="width: 50px; height: 50px">
                    @endif
                    <div class="user-details">
                        <div id="more-details">{{\Illuminate\Support\Facades\Auth::user()->name}} <i
                                class="fa fa-caret-down"></i></div>
                    </div>
                </div>
                <div class="collapse" id="nav-user-link">
                    <ul class="list-inline">
                        {{----
                        <li class="list-inline-item"><a href="user-profile.html" data-toggle="tooltip"
                                                        title="View Profile"><i class="feather icon-user"></i></a></li>
                        <li class="list-inline-item"><a href="email_inbox.html"><i class="feather icon-mail"
                                                                                   data-toggle="tooltip"
                                                                                   title="Messages"></i><small
                                    class="badge badge-pill badge-primary">5</small></a></li>
                                    ---}}
                        <li class="list-inline-item">
                            <a href="{{ route('logout') }}" data-toggle="tooltip"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               title="Cerrar sesión" class="text-danger">
                                <i class="feather icon-power"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>


                        </li>
                    </ul>
                </div>
            </div>

            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item ">
                    <a href="{{route('dashboard')}}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-home"></i>
                        </span>
                        <span class="pcoded-mtext">Panel de Control</span>
                    </a>
                </li>

                @canany(['create_animal','read_animal','update_animal','destroy_animal','create_milking','read_milking','update_milking','destroy_milking'])
                    <li class="nav-item pcoded-hasmenu">
                        <a href="javascript: return void(0);" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-layout"></i>
                        </span>
                            <span class="pcoded-mtext">Producción</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li><a href="{{route('animalprodcution')}}">Registrar Animal de Producción</a></li>
                            @canany(['create_animal','read_animal','update_animal','destroy_animal'])
                                <li><a href="{{route('production-animal')}}">Animales</a></li>
                            @endcanany
                            @canany(['create_milking','read_milking','update_milking','destroy_milking'])
                                <li><a href="{{route('milking-list')}}">Ordeños</a></li>
                            @endcanany
                        </ul>
                    </li>
                @endcanany

                @canany(['create_user','read_user','update_user','destroy_user'])
                    <li class="nav-item pcoded-hasmenu">
                        <a href="javascript: void(0);" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-layout"></i>
                        </span>
                            <span class="pcoded-mtext">Usuarios</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li><a href="{{route('users')}}">Usuarios</a></li>
                        </ul>
                    </li>
                @endcanany

                @canany(['create_employe','read_employe','update_employe','destroy_employe','create_task','read_task','update_task','destroy_task'])
                    <li class="nav-item pcoded-hasmenu">
                        <a href="javascript: void(0);" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-layout"></i>
                        </span>
                            <span class="pcoded-mtext">Empleados</span>
                        </a>
                        <ul class="pcoded-submenu">
                            @canany(['create_employe','read_employe','update_employe','destroy_employe'])
                                <li><a href="{{route('employes')}}">Empleados</a></li>
                            @endcanany
                            @canany(['create_task','read_task','update_task','destroy_task'])
                                <li><a href="{{route('tasks')}}">Tareas</a></li>
                            @endcanany
                        </ul>
                    </li>
                @endcanany
                @canany(['create_treatment','read_treatment','update_treatment','destroy_treatment'])
                    <li class="nav-item pcoded-hasmenu">
                        <a href="javascript: void(0);" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-layout"></i>
                        </span>
                            <span class="pcoded-mtext">Tratamientos</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li><a href="{{route('treatments')}}">Lista de tratamientos</a></li>
                        </ul>
                    </li>
                @endcanany
                @canany(['create_disease','read_disease','update_disease','destroy_disease'])
                    <li class="nav-item pcoded-hasmenu">
                        <a href="javascript: return void(0);" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-layout"></i>
                        </span>
                            <span class="pcoded-mtext">Enfermedades</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li><a href="{{route('diseases')}}">Lista de emfermedades</a></li>
                        </ul>
                    </li>
                @endcanany
                @canany(['create_vets','read_vets','update_vets','destroy_vets'])
                    <li class="nav-item pcoded-hasmenu">
                        <a href="javascript: return void(0);" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-layout"></i>
                        </span>
                            <span class="pcoded-mtext">Veterinarios</span>
                        </a>
                      
                        <ul class="pcoded-submenu">
                            <li><a href="{{route('veterinaries')}}">Lista de veterinarios</a></li>
                            @canany(['create_checkup','read_checkup','update_checkup','destroy_checkup'])
                            <li><a href="{{route('checkups')}}">Chequeos</a></li>
                        @endcanany
                        </ul>
                       
                    </li>
                @endcanany
                @canany(['create_animal','read_animal','update_animal','destroy_animal'])
                    <li class="nav-item pcoded-hasmenu">
                        <a href="javascript: return void(0);" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-layout"></i>
                        </span>
                            <span class="pcoded-mtext">Animales</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li><a href="{{route('animals')}}">Lista de Animales</a></li>

                        </ul>
                    </li>
                @endcanany
                @canany(['create_disease','read_disease','update_disease','destroy_disease'])
                    <li class="nav-item pcoded-hasmenu">
                        <a href="javascript: return void(0);" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-layout"></i>
                        </span>
                            <span class="pcoded-mtext">Mastitis</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li><a href="{{route('mastitis')}}">Lista de Mastitis</a></li>
                        </ul>
                    </li>
                   
                @endcanany
                @canany(['create_estate','read_estate','update_estate','destroy_estate','create_checkup','read_checkup','update_checkup','destroy_checkup','create_company','read_company','update_company','destroy_company','create_delivery','read_delivery','update_delivery','destroy_delivery'])
                    <li class="nav-item pcoded-hasmenu">
                        <a href="javascript: return void(0);" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-layout"></i>
                        </span>
                            <span class="pcoded-mtext">Configuraciones</span>
                        </a>
                        <ul class="pcoded-submenu">
                            @canany(['create_estate','read_estate','update_estate','destroy_estate'])
                                <li><a href="{{route('estates')}}">Haciendas</a></li>
                            @endcanany
                           
                            @canany(['create_company','read_company','update_company','destroy_company'])
                                <li><a href="{{route('companies')}}">Companias</a></li>
                            @endcanany
                            @canany(['create_delivery','read_delivery','update_delivery','destroy_delivery'])
                                <li><a href="{{route('deliveries')}}">Entregas de leche</a></li>
                            @endcanany

                        </ul>
                    </li>
                @endcanany

            <!--code-->
            @canany(['create_role','read_role','update_role','destroy_role'])
                <li class="nav-item pcoded-hasmenu">
                    <a href="javascript: void(0);" class="nav-link ">
                    <span class="pcoded-micon">
                        <i class="feather icon-layout"></i>
                    </span>
                        <span class="pcoded-mtext">Accesos</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{route('roles')}}">Roles & Permisos</a></li>
                    </ul>
                </li>
            @endcanany
                @canany(['create_purcharse','read_purcharse','update_purcharse','destroy_purcharse'])
                    <li class="nav-item pcoded-hasmenu">
                        <a href="javascript: return void(0);" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-shopping-cart"></i>
                        </span>
                            <span class="pcoded-mtext">Compras</span>
                        </a>
                        <ul class="pcoded-submenu">
                            @can('create_purcharse')
                                <li><a href="{{route('purchase')}}">Nueva Compra</a></li>
                            @endcan
                            @can('read_purcharse')
                                <li><a href="{{route('purchases.list')}}">Lista de Compras</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcanany

                @canany(['create_sales','read_sales','update_sales','destroy_sales'])
                    <li class="nav-item pcoded-hasmenu">
                        <a href="javascript: return void(0);" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-shopping-cart"></i>
                        </span>
                            <span class="pcoded-mtext">Ventas</span>
                        </a>
                        <ul class="pcoded-submenu">
                            @can('create_sales')
                                <li><a href="{{route('sales')}}">Nueva Venta</a></li>
                            @endcan
                            @can('read_sales')
                                <li><a href="{{route('sales.list')}}">Lista de Ventas</a></li>
                            @endcanany
                        </ul>
                    </li>
                @endcanany

              

            </ul>
        </div>
    </div>
</nav>
