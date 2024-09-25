<header>
    <div class="container-fluid text-bg-dark d-flex justify-content-between">
        {{-- parte sx --}}
        <div class="navbar">
            <a href="{{ route('home') }}">Vai al sito</a>
        </div>
        {{-- parte dx --}}
        <div class="navbar">
            <ul>
                {{-- visualizzazione guest --}}
                @guest
                    <li class="nav-item mx-3">
                        <a href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}">Registrati</a>
                    </li>

                    {{-- visualizzazione admin --}}
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="true">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" data-bs-popper="static">
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.home') }}">
                                    Admin
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();
                                                                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</header>
