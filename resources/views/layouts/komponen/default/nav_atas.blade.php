    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                   <i class="fa fa-shopping-bag" aria-hidden="true"></i>  {{ setup_variable('nama_aplikasi') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        {{-- <li><a href="{{ url('/login') }}">Login</a></li> --}}
                    @else
                    <ul class="nav navbar-nav navbar-right">
                        @include('layouts.komponen.backend.tombol_pilih_cabang')                        
                            <li class="dropdown @if(isset($backend_profile_home)) active @endif"     >
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->nama }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li role="separator" class="divider"></li>                            
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    @endif                
            </div>
        </div>
    </nav>

