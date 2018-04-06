@extends('layouts.app')

@section('content')
    <div class="container mt-4 text-center">
        <h1 class="text-success">Votre compte a été créé avec succès.</h1>
        <h3>Rendez-vous dans votre boîte mail afin d'activer votre compte.</h3>
{{--        <a href="{{ route('register.notify') }}">Renvoyer le mail</a>--}}
    </div>
@endsection