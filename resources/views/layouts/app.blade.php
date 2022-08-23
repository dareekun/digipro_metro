<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/metro.css') }}" rel="stylesheet">
</head>

<body>
    <div data-role="appbar" data-expand-point="md">
        <header class="bg-darkCyan fg-white d-flex flex-justify-between app-bar">
            <div class="container">
                <ul class="app-bar-menu">
                    <div class="app-bar-container float-none">
                        <a class="app-bar-item bg-darkCyan" href="/">{{ config('app.name', 'Laravel') }}</a>
                    </div>
                    @guest
                    @else
                    @if ( Auth::user()->department == 999)
                    <li>
                        <a href="#" class="dropdown-toggle">Production</a>
                        <ul class="d-menu" data-role="dropdown">
                            <li><a href="{{route('status_job')}}">Status Lot Card</a></li>
                            <li><a href="{{route('job_scanned')}}">Lot Card Scanned</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle">Quality</a>
                        <ul class="d-menu" data-role="dropdown">
                            <li><a href="{{route('in_progress')}}">In Progress</a></li>
                            <li><a href="{{route('finish_production')}}">Finish Job</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle">Warehouse</a>
                        <ul class="d-menu" data-role="dropdown">
                            <li><a href="{{route('moveable_product')}}">Moveable Product</a></li>
                            <li><a href="{{route('history_transact')}}">History Transaction</a></li>
                        </ul>
                    </li>
                    @elseif ( Auth::user()->department == 1)
                    <li><a href="{{route('status_job')}}">Status Lot Card</a></li>
                    <li><a href="{{route('job_scanned')}}">Lot Card Scanned</a></li>
                    @elseif ( Auth::user()->department == 2)
                    <li><a href="{{route('in_progress')}}">In Progress</a></li>
                    <li><a href="{{route('finish_production')}}">Finish Job</a></li>
                    @elseif ( Auth::user()->department == 3)
                    <li><a href="{{route('moveable_product')}}">Moveable Product</a></li>
                    <li><a href="{{route('history_transact')}}">History Transaction</a></li>
                    @else
                    @endif
                </ul>
                <div class="app-bar-container float-right">
                    <a href="#" class="dropdown-toggle">{{ Auth::user()->name }}</a>
                    <ul class="d-menu place-right" data-role="dropdown">
                        @can('isAdmin')
                        <li><a href="{{route('routing_control')}}">Routing Control</a></li>
                        <li><a href="{{route('product_control')}}">Product Control</a></li>
                        <li><a href="{{route('user_control')}}">User Control</a></li>
                        @endcan
                        @can('isDeveloper')
                        <li><a href="{{route('log_record')}}">Log Record</a></li>
                        @endcan
                        <li><a href="{{route('change_password')}}">Change Password</a></li>
                        <li class="divider bg-lightGray"></li>
                        <li>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
                @endguest
            </div>
        </header>
    </div>
    <main class="container pt-20">
        @yield('content')
    </main>
    <script type="text/javascript" src="{{ asset('js/metro.js') }}"></script>
    @livewireScripts
    @stack('scripts')
    <script>
    window.addEventListener('toaster', event => {
        var options = {
            showTop: true,
            timeout: 2000,
            distance: 80,
            clsToast: event.detail.type
        };
        Metro.toast.create(event.detail.message, null, null, null, options);
    });
    </script>
</body>

</html>