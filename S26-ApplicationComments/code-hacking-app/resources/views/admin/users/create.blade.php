@extends('layouts.admin')

@section('content')

  <h1>Create User</h1>

  {!! Form::open(['method'=>'POST', 'action'=>'AdminController@store', 'files'=>true]) !!}

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
      {!! Form::label('password', 'Password') !!}
      {!! Form::password('password', ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('photo', 'Photo') !!}
      {!! Form::file('photo', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
    </div>

  {!! Form::close() !!}

  @include('includes.form_error')

@endsection
