<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">

    <div class="container-fluid">

        <div class="navbar-wrapper">
            <a class="navbar-brand"
               href="{{ url('/admin') }}">{{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <button class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end"
             id="navbarSupportedContent">

            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto"></ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link"
                               href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown"
                           class="nav-link dropdown-toggle"
                           href="#"
                           role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false">
                            <i class="material-icons">person</i>
                            <p class="d-lg-none d-md-block">
                                Account
                            </p>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right"
                             aria-labelledby="navbarDropdown">
                            <a class="dropdown-item"
                               href="#">Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item logout"
                               onclick="logout()">
                                {{ __('Logout') }}
                            </a>
                        </div>
                    </li>
                @endguest
            </ul>

        </div>

    </div>

</nav>
