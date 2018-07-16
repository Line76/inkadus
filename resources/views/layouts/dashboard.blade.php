<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Dashboard</title>

    <!-- Styles -->
    <link href="{{ asset('css/dashboard/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-dark sticky-top bg-purple flex-md-nowrap p-0">
        <a href="{{ route('home') }}" class="navbar-brand col-sm-3 col-md-2 mr-0 my-0">
            {{ config('app.name', 'Dashboard') }}
        </a>

        <ul class="navbar-nav px-3">
            <a class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="{{--{{ route('dashboard') }}--}}" class="nav-link btn disabled text-left">
                                <font-awesome-icon icon="home"></font-awesome-icon>
                                Home
                                <br>
                                <span class="badge badge-pill badge-secondary">Prochainement</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.profile') }}" class="nav-link active">
                                <font-awesome-icon icon="user"></font-awesome-icon>
                                Mon compte
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{--{{ route('enterprise.create') }}--}}" class="nav-link btn disabled text-left">
                                <font-awesome-icon icon="save"></font-awesome-icon>
                                Enregistrer ma pharmacie
                                <br>
                                <span class="badge badge-pill badge-secondary">Prochainement</span>
                            </a>
                        </li>
                    </ul>

                    @if(isset($enterprises) || !empty($enterprises))
                        <h6 class="sidebar-heading">
                            <span>@if($enterprises->count() == 1) Ma pharmacie @else Mes pharmacies @endif</span>
                        </h6>
                        <ul class="nav flex-column">
                            @foreach($enterprises as $enterprise)
                                <li class="nav-item">
                                    <a href="{{ route('enterprise.show', $enterprise) }}"
                                       class="nav-link">{{ $enterprise->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <main class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                @yield('content')
            </main>
        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>