@extends('layouts.app')

@section('content')
    <div class="container mt-4 text-center">
        <h1 class="text-success">Votre compte a bien été créé</h1>
        <h3>Il ne vous reste plus qu'à confirmer votre compte en cliquant sur le lien dans le mail !</h3>
{{--        <a href="{{ route('register.notify') }}">Renvoyer le mail</a>--}}
    </div>
@endsection