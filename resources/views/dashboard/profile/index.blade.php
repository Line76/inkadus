@extends('layouts.dashboard')

@section('content')
    <div class="border-bottom">
        <h1 class="h2">Mon compte - {{ Auth::user()->fullName }}</h1>
    </div>

    <div class="row mt-3 mb-4">
        <div class="col-md-3 col-sm-6 mb-3 mb-md-0 px-3 text-right">
            <div class="bg-green pt-2 pb-1 px-3">
                <p class="text-light h4">0</p>
                <span class="d-block border-top border-dark">Prochainement</span>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 px-3 mb-3 mb-md-0 text-right">
            <div class="bg-cyan pt-2 pb-1 px-3">
                <p class="text-light h4">0</p>
                <span class="d-block border-top border-dark">Prochainement</span>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 d-sm-block d-none px-3 text-right">
            <div class="bg-orange pt-2 pb-1 px-3">
                <p class="text-light h4">0</p>
                <span class="d-block border-top border-dark">Prochainement</span>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 d-sm-block d-none px-3 text-right">
            <div class="bg-red pt-2 pb-1 px-3">
                <p class="text-light h4">0</p>
                <span class="d-block border-top border-dark">Prochainement</span>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-12 col-md-6">
                <div class="d-flex align-items-center justify-content-between">
                    <h2 class="h3">Mes informations personnelles</h2>
                    <a href="" @click.prevent="$emit('toggleEdit')"><font-awesome-icon icon="edit" /></a>
                </div>

                <profile
                    :user="{{ Auth::user()->toJson() }}"
                    route="{{ route('dashboard.profile.update') }}"
                    form-token="{{ csrf_token() }}"></profile>
            </div>

            {{--<div class="col-12 col-md-6">--}}
                {{--<div class="d-flex align-items-center justify-content-between">--}}
                    {{--<h2 class="h3">Mon agenda</h2>--}}
                    {{--<a href=""><font-awesome-icon icon="edit" /></a>--}}
                {{--</div>--}}

                {{--<calendar></calendar>--}}
            {{--</div>--}}

            {{--<div class="col-12 col-md-6">--}}
                {{--<div class="d-flex align-items-center justify-content-between">--}}
                    {{--<h2 class="h3">Mes compétences</h2>--}}
                    {{--<a href=""><font-awesome-icon icon="plus" /></a>--}}
                {{--</div>--}}

                {{--@foreach(Auth::user()->skills as $skill)--}}
                    {{--<p>{{ $skill->label }}</p>--}}
                {{--@endforeach--}}
            {{--</div>--}}
        </div>
    </div>
@endsection