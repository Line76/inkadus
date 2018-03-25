@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="container screen" id="header">
            <div class="center center-horizontal">
                <h1>Le premier site de prêt de personnel entre professionnels de santé.</h1>
                <a href="{{ route('register') }}" class="btn btn-lg btn-primary">Nous rejoindre</a>
            </div>
        </div>

        <div class="container screen screen-lg text-center">
            <h2 class="title">Blabla</h2>
            <div class="grid grid-col-3">
                <div>
                    <p>blabla</p>
                </div>
                <div>
                    <p>blabla</p>
                </div>
                <div>
                    <p>blabla</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
