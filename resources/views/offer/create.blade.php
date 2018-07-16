@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        {{ Form::open(['route' => 'offer.store']) }}

        {{ Form::close() }}
    </div>
@endsection