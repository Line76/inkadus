<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {{--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">--}}
    <link href="{{ asset('css/dashboard/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-dark sticky-top bg-purple flex-md-nowrap p-0">
        <a href="{{ route('home') }}" class="navbar-brand col-sm-3 col-md-2 mr-0 my-0">
            {{ config('app.name', 'Dashboard') }}
        </a>

        <ul class="navbar-nav px-3">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->fullName }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('dashboard.profile') }}">Mon profil</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link active">
                                {{--<font-awesome-icon icon="spinner"></font-awesome-icon>--}} Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.profile') }}" class="nav-link">
                                Mon compte
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('enterprise.create') }}" class="nav-link">Enregistrer ma pharmacie</a>
                        </li>
                    </ul>

                    @if(isset($enterprises) || !empty($enterprises))
                        <h6 class="sidebar-heading">
                            <span>@if($enterprises->count() == 1) Ma pharmacie @else Mes pharmacies @endif</span>
                        </h6>
                        <ul class="nav flex-column">
                            @foreach($enterprises as $enterprise)
                                <li class="nav-item">
                                    <a href="{{ route('enterprise.show', $enterprise) }}" class="nav-link">{{ $enterprise->name }}</a>
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