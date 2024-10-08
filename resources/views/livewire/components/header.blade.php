        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="{{ url('/') }}" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restoran</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="{{ route('home') }}" class="nav-item nav-link ">Home</a>
                        <a href="{{ route('about') }}" class="nav-item nav-link ">About</a>
                        <a href="{{ route('service') }}" class="nav-item nav-link">Service</a>
                        <a href="{{ route('menu') }}" class="nav-item nav-link">Menu</a>
                        <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
                        <ul class="navbar-nav ms-auto">
                            @guest
                                @if (Route::has('login'))
                                    <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
                                @endif
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="nav-item nav-link">Register</a>
                                @endif
                            @else
                                <a href="{{ route('cart') }}" class="nav-item nav-link">
                                    Cart <span class="badge bg-primary" style="position: relative; top: -5px; right: -5px;">
                                        {{ $cartCount }}
                                    </span>
                                </a>

                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                        <a class="dropdown-item" href="{{ route('user.booking') }}">
                                            My Bookings
                                        </a>

                                        <a class="dropdown-item" href="{{ route('user.order') }}">
                                            My Orders
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>

                </div>
            </nav>
        </div>
