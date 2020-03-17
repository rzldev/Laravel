@extends('layouts.admin')

@section('content')

  {!! Form::model($category, ['method'=>'PATCH', 'action'=>['CategoryController@update', $category->id]]) !!}

    {{ csrf_field() }}

    <div class="form-group">
      {!! Form::label('name', 'Name') !!}
      {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::submit('Add Category', ['class'=>'btn btn-primary col-sm-2']) !!}
    </div>

  {!! Form::close() !!}

  {!! Form::open(['method'=>'DELETE', 'action'=>['CategoryController@destroy', $category->id]]) !!}

    <div class="form-group">
      {!! Form::submit('Delete Category', ['class'=>'btn btn-danger col-sm-2']) !!}
    </div>

  {!! Form::close() !!}

@endsection
