<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a class="btn btn-outline-info" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    {{ __('Log Out') }}
                </a>
            </form>

        </li>
    </ul>
</nav>
