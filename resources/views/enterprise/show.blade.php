@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <h1>{{ $enterprise->name }}</h1>

        <hr>

        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#invitePeopleModal">
                    Inviter des collaborateurs
                </button>
                <h4>Collaborateurs</h4>

                <div class="table-responsive">
                    <table class="table table-sm table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($enterprise->users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="invitePeopleModal" tabindex="-1" role="dialog" aria-labelledby="invitePeople" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="invitePeople">Inviter des collaborateurs</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {{ Form::open(['route' => 'enterprise.invite']) }}
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                {{ Form::label('last_name', 'Nom') }}
                            </div>
                            <div class="col">
                                {{ Form::label('first_name', 'Prénom') }}
                            </div>
                            <div class="col-6">
                                {{ Form::label('email', 'Email') }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                {{ Form::text('last_name[]', null, ['class' => 'form-control']) }}
                            </div>
                            <div class="col-3">
                                {{ Form::text('first_name[]', null, ['class' => 'form-control']) }}
                            </div>
                            <div class="col-6">
                                {{ Form::email('email[]', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                {{ Form::text('last_name[]', null, ['class' => 'form-control']) }}
                            </div>
                            <div class="col-3">
                                {{ Form::text('first_name[]', null, ['class' => 'form-control']) }}
                            </div>
                            <div class="col-6">
                                {{ Form::email('email[]', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Inviter</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection