@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    {{ Form::model($user, ['route' => 'dashboard.profile.update', 'method' => 'put']) }}
    {{ Form::label('first_name', 'Prénom') }}
    {{ Form::text('first_name', null, ['class' => 'form-control']) }}
    {{ Form::label('last_name', 'Nom') }}
    {{ Form::text('last_name', null, ['class' => 'form-control']) }}
    {{ Form::close() }}
</div>
@endsection