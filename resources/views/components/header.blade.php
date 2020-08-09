<header class="header-with-topbar">
    <!-- topbar -->
    <div class="top-header-area bg-black padding-10px-tb">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-uppercase alt-font d-flex align-items-center justify-content-center justify-content-md-start">
                    <a href="tel:3221396341" class="text-link-white-2 line-height-normal" title="">MX 322 139 63 41</a>
                    <div class="separator-line-verticle-extra-small bg-dark-gray display-inline-block margin-two-half-lr position-relative vertical-align-middle"></div>
                    <a href="mailto:contacto@sinsis.com.mx" class="text-link-white-2 line-height-normal" title=""> contacto@sinsis.com.mx</a>
                </div>             
            </div>
        </div>
    </div>
    <!-- end topbar -->
    <!-- start navigation -->
    <nav class="navbar navbar-default bootsnav navbar-top header-light-transparent background-transparent nav-box-width navbar-expand-lg">
        <div class="container nav-header-container">
            <!-- start logo -->
            <div class="col-auto pl-lg-0">
                <a href={{ route('home') }} title="SinSis" class="logo logo-main-index"><img src={{ asset('images/logos/logo-sinsis.png') }} class="logo-dark default" alt="SinSis"><img  alt="SinSis" class="logo-light"></a>
                <a href={{ route('home') }}title="SinSis" class="logo display-none logo-mini-index"><img src={{ asset('images/logos/logo-sinsis-mini.png') }} class="logo-dark default" alt="SinSis"><img  alt="SinSis" class="logo-light"></a>
            </div>
            <!-- end logo -->
            <div class="col accordion-menu pr-0 pr-md-3">
                <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbar-collapse-toggle-1">
                    <span class="sr-only">toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-collapse collapse justify-content-end" id="navbar-collapse-toggle-1">
                    <ul id="accordion" class="nav navbar-nav navbar-left no-margin alt-font text-normal" data-in="fadeIn" data-out="fadeOut">
                        <!-- start menu item -->
                        <li class="dropdown megamenu-fw">
                            <a href={{ route('home') }}>Inicio</a><i class="fas fa-angle-down dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>
                            <!-- start sub menu -->                                    
                        </li>
                        <!-- end menu item -->
                        <li class="dropdown simple-dropdown"><a href={{ route('nosotros') }}>Nosotros</a><i class="fas fa-angle-down dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>                                                                        
                        </li>
                        <li class="dropdown megamenu-fw">
                            <a href={{ route('contact') }}>Contacto</a><i class="fas fa-angle-down dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>                                                                        
                        </li>
                        @if (Auth::check() == true)
                        {{-- <li class="login p-2">                                    
                        </li> --}}
                        <li class="dropdown simple-dropdown login"><a> <div class="icons"><i class="far fa-user login" title="{{ Auth::user()->name }}"></i>
                            <i class="fas fa-angle-down dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i></div></a>
                            <!-- start sub menu -->
                            @if (Auth::user()->access_level == 1)
                            <ul class="dropdown-menu menu-login" role="menu">
                                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">Ver mis proyecto</a></li>
                                <li class="dropdown"><a href={{ route('logout') }}class="dropdown-toggle" data-toggle="dropdown">Cerrar Sesion</a></li>
                                </li>
                            </ul>
                            @else
                            <ul class="dropdown-menu menu-login" role="menu">
                                <li class="dropdown"><a href={{ route('admin') }} class="dropdown-toggle" data-toggle="dropdown">Panel de Administracion </a></li>
                                <li class="dropdown"><a href={{ route('logout') }} class="dropdown-toggle" data-toggle="dropdown">Cerrar Sesion</a></li>
                                </li>
                            </ul>
                            @endif
                        </li>
                        @else
                            <a class="dropdown megamenu-fw login-button" href={{ route('login') }}>login</a>
                        @endif                                
                    </ul>
                </div>
            </div>                    
        </div>
    </nav>
    <!-- end navigation --> 
    <!-- end navigation --> 
</header>