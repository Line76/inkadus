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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
@if(session()->has('success'))
    <div class="alert alert-success" role="alert" style="position: absolute; top: 50px; left: 50%; transform: translateX(-50%);">
        {{ session()->get('success') }}
    </div>
@endif

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark navbar-inkadus">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/logo.jpg') }}" alt="Logo inKadus" width="31" height="30" class="d-inline-block align-top">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Liens utiles
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a href="http://www.ordre.pharmacien.fr/Communications/Les-actualites/Remplacements-quelles-sont-les-regles-en-vigueur-a-l-hopital-et-a-l-officine"
                                   class="dropdown-item" target="_blank">Modalités de remplacement</a>
                                <a href="http://www.ordre.pharmacien.fr/index.php/Nos-missions/L-examen-de-la-capacite-a-exercer-la-pharmacie/L-inscription-au-tableau/Officine-Inscription-en-metropole"
                                   class="dropdown-item" target="_blank">Modalités d’inscription à l’Ordre</a>
                                <a href="https://www.service-public.fr/professionnels-entreprises/vosdroits/F22542"
                                   class="dropdown-item" target="_blank">Info: mise à disposition de main d'oeuvre</a>
                            </div>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->fullName }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a href="{{ route('dashboard') }}" class="dropdown-item">Mon compte</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @prod()
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116872751-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-116872751-1');
    </script>
    @endprod
</body>
</html>
