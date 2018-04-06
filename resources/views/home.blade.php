@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="container screen-y" id="header">
            <div class="center center-horizontal">
                <h1 class="mb-4">Le premier site de mutualisation de compétences entre professionnels de santé.</h1>
                <blockquote class="blockquote">
                    <p>inKadus we trust</p>
                </blockquote>
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-lg btn-primary">Mon Espace</a>
                @else
                    <a href="{{ route('register') }}" class="btn btn-lg btn-primary">Nous rejoindre</a>
                @endauth
            </div>
        </div>

        <div class="screen-y d-flex align-items-center justify-content-center bg-light">
            <div class="container text-center">
                <h2 class="h1 mb-3">Blabla</h2>
                <h3 class="h4 mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa dolorum obcaecati odit ratione sunt voluptas.</h3>
                <div class="row">
                    <div class="col p-3 m-2 border rounded">
                        <div class="d-flex align-items-center justify-content-center mb-4">
                            <div class="img-title">
                                <img src="{{ asset('img/flexibilite.png') }}" alt="Flexibilité">
                            </div>
                            <p class="h4 ml-3 mb-0">Flexibilité</p>
                        </div>
                        <p class="mb-4">Ajustez vos RH à votre activité, pour quelques heures ou quelques mois</p>
                        <ul class="list-group list-group-flush text-justify">
                            <li class="list-group-item bg-transparent border-bottom-0">
                                Allégez vos charges de personnel en période creuse, sans licenciement ou réduction du
                                temps de travail.
                            </li>
                            <li class="list-group-item bg-transparent border-0">
                                Augmentez votre attractivité en proposant un temps plein partagé entre deux entreprises
                                plutôt que deux temps partiels.
                            </li>
                        </ul>
                    </div>
                    <div class="col p-3 m-2 border rounded">
                        <div class="d-flex align-items-center justify-content-center mb-4">
                            <div class="img-title">
                                <img src="{{ asset('img/pertinence.png') }}" alt="Pertinence">
                            </div>
                            <p class="h4 ml-3 mb-0">Pertinence</p>
                        </div>
                        <p class="mb-4">Contactez rapidement le profil aux compétences recherchées</p>
                        <ul class="list-group list-group-flush text-justify">
                            <li class="list-group-item bg-transparent border-bottom-0">
                                Pourvoyez chaque remplacement en allant chercher les salariés là où ils sont : en poste.
                            </li>
                            <li class="list-group-item bg-transparent border-0">
                                InKadus vous propose uniquement du personnel disponible.
                            </li>
                        </ul>
                    </div>
                    <div class="col p-3 m-2 border rounded">
                        <div class="d-flex align-items-center justify-content-center mb-4">
                            <div class="img-title">
                                <img src="{{ asset('img/confraternite.png') }}" alt="Confraternité">
                            </div>
                            <p class="h4 ml-3 mb-0">Confraternité</p>
                        </div>
                        <p class="mb-4">Soyez volontaires, et venez en aide à un confrère qui a besoin de renforts</p>
                        <ul class="list-group list-group-flush text-justify">
                            <li class="list-group-item bg-transparent">
                                Intégrez des collaborateurs recommandés par vos confrères.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="screen-y text-center center center-horizontal" id="how">
            <h2 class="h1">Comment ça marche ?</h2>
        </div>
    </div>
</div>
@endsection
