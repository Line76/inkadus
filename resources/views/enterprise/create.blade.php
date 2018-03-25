@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-md-4 mb-sm-3">Enregistrer ma pharmacie</h1>

        <div class="row">
            <div class="col-md-9 col-lg-6">
                {{ Form::open(['route' => 'enterprise.store']) }}
                <div class="form-group">
                    {{ Form::label('name', 'Nom de la pharmacie') }}
                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                </div>

                {{ Form::submit('Valider', ['class' => 'btn btn-primary float-sm-right']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection