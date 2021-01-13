{{---
class="{{request()->is('/ruta')?'active':''}}"
---}}

<nav class="pcoded-navbar menu-light ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div ">
            <div class="">
                <div class="main-menu-header">
                    @if(\Illuminate\Support\Facades\Auth::user()->url_image==='#')
                        <img class="img-radius" src="{{asset('img/user.jpg')}}"
                             alt="User-Profile-Image">
                    @else
                        <img class="img-radius" src="{{\Illuminate\Support\Facades\Auth::user()->url_image}}"
                             alt="User-Profile-Image">
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
                <li class="nav-item pcoded-menu-caption">
                    <a href="" class="nav-link ">
                        <label>Panel de control</label>
                    </a>

                </li>



                <li class="nav-item pcoded-hasmenu">
                    <a href="javascript: void(0);" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-home"></i>
                        </span>
                        <span class="pcoded-mtext">Accesos</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{route('roles')}}">Roles & Permisos</a></li>
                        <li><a href="">Crear rol</a></li>
                    </ul>
                </li>

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
                <li class="nav-item pcoded-hasmenu">
                    <a href="javascript: void(0);" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-layout"></i>
                        </span>
                        <span class="pcoded-mtext">Empleados</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{route('employes')}}">Empleados</a></li>
                    </ul>
                </li>
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
                <li class="nav-item pcoded-hasmenu">
                    <a href="javascript: return void();" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-layout"></i>
                        </span>
                        <span class="pcoded-mtext">Emfermedades</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{route('diseases')}}">Lista de emfermedades</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="javascript: return void();" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-layout"></i>
                        </span>
                        <span class="pcoded-mtext">Veterinarios</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{route('veterinaries')}}">Lista de veterinarios</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="javascript: return void();" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-layout"></i>
                        </span>
                        <span class="pcoded-mtext">Animales</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{route('animals')}}">Lista de Animales</a></li>
                        <li><a href="{{route('animalprodcution')}}">Animales de producción</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="javascript: return void();" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-layout"></i>
                        </span>
                        <span class="pcoded-mtext">Mastitis</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{route('mastitis')}}">Lista de Mastitis</a></li>
                    </ul>
                </li>

                 <li class="nav-item pcoded-hasmenu">
                    <a href="javascript: return void();" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-layout"></i>
                        </span>
                        <span class="pcoded-mtext">Configuraciones</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{route('estates')}}">Haciendas</a></li>
                        <li><a href="{{route('companies')}}">Companias</a></li>
                        <li><a href="{{route('deliveries')}}">Entregas de leche</a></li>

                    </ul>
                </li>

                <!--code-->
                <li class="nav-item pcoded-hasmenu">
                    <a href="javascript: return void(0);" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-shopping-cart"></i>
                        </span>
                        <span class="pcoded-mtext">Compras</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{route('purchase')}}">Nueva Compra</a></li>
                        <li><a href="{{route('purchases.list')}}">Lista de Compras</a></li>
                    </ul>
                </li>

                <li class="nav-item pcoded-hasmenu">
                    <a href="javascript: return void(0);" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-shopping-cart"></i>
                        </span>
                        <span class="pcoded-mtext">Ventas</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{route('sales')}}">Nueva Venta</a></li>
                        <li><a href="{{route('sales.list')}}">Lista de Ventas</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>
