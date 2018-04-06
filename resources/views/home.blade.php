@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="screen-y" id="header">
            <div class="container center center-horizontal">
                <h1 class="mb-4">Le premier site de mutualisation de compétences entre professionnels de santé.</h1>
                <blockquote class="blockquote">
                    <p>Gagnez du temps pour vos patients</p>
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
                <h2 class="h1 mb-3">Qu'est ce que cela vous apporte ?</h2>
                <h3 class="h4 mb-5"></h3>
                <div class="row">
                    <div class="col-12 col-sm p-3 mx-sm-2 mx-0 my-3 my-sm-0 border rounded">
                        <div class="d-flex flex-column align-items-center justify-content-center mb-4">
                            <div class="img-title">
                                <img src="{{ asset('img/flexibilite.png') }}" alt="Flexibilité">
                            </div>
                            <p class="h4 mb-0">Flexibilité</p>
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
                    <div class="col-12 col-sm p-3 mx-sm-2 mx-0 my-3 my-sm-0 border rounded">
                        <div class="d-flex flex-column align-items-center justify-content-center mb-4">
                            <div class="img-title">
                                <img src="{{ asset('img/pertinence.png') }}" alt="Pertinence">
                            </div>
                            <p class="h4 mb-0">Pertinence</p>
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
                    <div class="col-12 col-sm p-3 mx-sm-2 mx-0 my-3 my-sm-0 border rounded">
                        <div class="d-flex flex-column align-items-center justify-content-center mb-4">
                            <div class="img-title">
                                <img src="{{ asset('img/confraternite.png') }}" alt="Confraternité">
                            </div>
                            <p class="h4 mb-0">Expérience</p>
                        </div>
                        <p class="mb-4">Motivez vos équipes et faites les monter en compétences</p>
                        <ul class="list-group list-group-flush text-justify">
                            <li class="list-group-item bg-transparent">
                                Tout en leur garantissant la sécurité de leur contrat de travail habituel.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="screen-y text-center center center-horizontal" id="how">
            <h2 class="h1 mb-4">Comment ça marche ?</h2>
            <img src="{{ asset('img/how_works.png') }}" alt="Comment ça marche ?" style="width: 90%; margin: 0 auto;">
        </div>
    </div>
</div>

<div class="navbar navbar-dark navbar-inkadus justify-content-center">
    <a href="https://services.ordre.pharmacien.fr/extranet/Vos-demarches-et-formulaires/Remplacement/Remplacement-A-D-et-E"
       class="navbar-text mx-5">Modalités de remplacement</a>
    <a href="http://www.ordre.pharmacien.fr/index.php/Nos-missions/L-examen-de-la-capacite-a-exercer-la-pharmacie/L-inscription-au-tableau/Officine-Inscription-en-metropole"
       class="navbar-text mx-5">Modalités d’inscription à l’Ordre</a>
    <a href="https://www.service-public.fr/professionnels-entreprises/vosdroits/F22542"
       class="navbar-text mx-5">Info: mise à disposition de main d'oeuvre</a>
</div>
@endsection
