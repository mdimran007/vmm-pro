<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
        <h1>Vendor Dashboard</h1>
         <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
</body>
</html>