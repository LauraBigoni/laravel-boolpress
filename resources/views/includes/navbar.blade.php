<div id="app">

    <div class="container-fluid header-logo py-4">
        <div class="row text-center">
            <div class="col-12">
                @guest
                @else
                    <img src="{{ asset('images/boolpresslogo.png') }}" alt="boolpress logo">
                @endguest
            </div>
        </div>
    </div>

    <nav class="sidebar">
        <header>
            <div class="image-text">
                <span class="image">
                    @guest
                        <img src="{{ asset('images/anonavatar.gif') }}" alt="guest logo">
                    @else
                        <img src="{{ asset('images/avatar.jpg') }}" alt="admin logo">
                    @endguest
                </span>

                <div class="text logo-text">
                    @guest
                        <span class="profession">Non sei registrato</span>
                    @else
                        <span class="name">Admin {{ Auth::user()->name }}</span>
                        <span class="profession">Gestisci il sito</span>
                    @endguest
                </div>
            </div>

        </header>

        <div class="menu-bar">
            <div class="menu">
                @guest
                    <li class="nav-link">
                        <a class="nav-link" href="{{ route('login') }}"><span
                                class="text nav-text">{{ __('Login') }}</span></a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-link">
                            <a class="nav-link" href="{{ route('register') }}"><span
                                    class="text nav-text">{{ __('Registrati') }}</span></a>
                        </li>
                    @endif
                @endguest
                @auth
                    <li class="search-box">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" placeholder="Search...">
                    </li>

                    <li class="nav-link">
                        <a href="{{ url('/') }}" class="nav-link {{ Request::is('admin/posts*') ? 'active' : '' }}">
                            <i class="fa-solid fa-house"></i>
                            <span class="text nav-text">Home</span>
                        </a>
                    </li>

                    <ul class="menu-links">
                        <li class="nav-link">
                            <a href="{{ route('admin.home') }}"
                                class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
                                <i class="fa-solid fa-lock"></i>
                                <span class="text nav-text">Admin</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="{{ route('admin.posts.index') }}"
                                class="nav-link {{ Request::is('admin/posts*') ? 'active' : '' }}">
                                <i class="fa-solid fa-note-sticky"></i>
                                <span class="text nav-text">Posts</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="{{ route('admin.categories.index') }}"
                                class="nav-link {{ Request::is('admin/posts*') ? 'active' : '' }}">
                                <i class="fa-regular fa-rectangle-list"></i>
                                <span class="text nav-text">Categories</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="{{ route('admin.tags.index') }}" class="nav-link">
                                <i class="fa-solid fa-tags"></i>
                                <span class="text nav-text">Tags</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="bottom-content">
                    <li class="nav-link dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" v-pre>
                            <span class="text nav-text">{{ Auth::user()->name }}</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"><i
                                    class="fa-solid fa-right-from-bracket"></i>
                                <span class="text nav-text">{{ __('Logout') }}</span>

                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none text nav-text">
                                @csrf
                            </form>
                        </div>
                    </li>
                </div>
            @endauth
        </div>
    </nav>
</div>
