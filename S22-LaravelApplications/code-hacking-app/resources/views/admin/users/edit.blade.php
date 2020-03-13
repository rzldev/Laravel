@extends('layouts.admin')

@section('content')

  <h1>Edit User</h1>

  <div class="row">
    <div class="col-lg-3 col-sm-3">
      <img class="img-responsive img-rounded" src="{{$user->photo ? $user->photo->path : '/images/default-photo.jpg'}}" alt="">
    </div>

    <div class="col-lg-9 col-sm-9">

      {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminController@update', $user->id], 'files'=>true]) !!}

        {{ csrf_field() }}

        <div class="form-group">
          {!! Form::label('name', 'Username') !!}
          {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('email', 'Email') !!}
          {!! Form::text('email', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('role_id', 'Role') !!}
          {!! Form::select('role_id', [''=>'Choose role'] + $roles, null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('photo', 'Photo') !!}
          {!! Form::file('photo', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::submit('Edit User', ['class'=>'btn btn-primary col-sm-6']) !!}
        </div>

      {!! Form::close() !!}

      {!! Form::open(['method'=>'DELETE', 'action'=>['AdminController@destroy', $user->id]]) !!}
        <div class="form-group">
          {!! Form::submit('Delete User', ['class'=>'btn btn-danger col-sm-6']) !!}
        </div>
      {!! Form::close() !!}

    </div>
  </div>

  <div class="row">

    @include('includes.form_error')

  </div>

@endsection
