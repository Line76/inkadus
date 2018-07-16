@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="screen-y" id="header">
            <div class="container center center-horizontal">
                <h1 class="mb-4">
                    Mutualisez vos ressources humaines !
                </h1>
                <blockquote class="blockquote">
                    <p>La mutualisation des ressources humaines facilite les recrutements ponctuels ou en urgence.</p>
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
                <h2 class="h1 mb-5">Qu'est ce que cela vous apporte ?</h2>
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

        <div class="screen-y text-center center center-horizontal bg-light" id="how">
            <h2 class="h1 mb-4">Que vous soyez pharmacien, préparateur, étudiant, BP…</h2>

            <h3 class="h2">Vous êtes salarié ?</h3>

            <p>Prêtez main forte à une équipe dans leur pharmacie !</p>

            <ul class="text-left" style="list-style: none; font-size: 1.3em;">
                <li>- Améliorez votre expérience en découvrant une autre entreprise</li>
                <li>- Gagnez en employabilité</li>
                <li>- Valorisez vos compétences</li>
                <li>- Développez votre réseau professionnel</li>
            </ul>

            <p class="h4">Vous conservez la sécurité de votre contrat de travail et votre feuille de paie habituels.</p>
        </div>
    </div>
</div>
@endsection
