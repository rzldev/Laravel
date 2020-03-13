@extends('layouts.admin');

@section('content')

  <h1>Edit Post</h1>

  <div class="row">
    <div class="col-lg-3 col-sm-3">
      <img class="img-responsive img-rounded" src="{{$post->photo ? $post->photo->path : '/images/default-photo.jpg'}}" alt="" height="400">
    </div>

    <div class="col-lg-9 col-sm-9">

      {!! Form::model($post, ['method'=>'PATCH', 'action'=>['PostController@update', $post->id], 'files'=>true]) !!}

        {{ csrf_field() }}

        <div class="form-group">
          {!! Form::label('title', 'Title') !!}
          {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('content', 'Content') !!}
          {!! Form::textarea('content', null, ['class'=>'form-control', 'rows'=>3]) !!}
        </div>

        <div class="form-group">
          {!! Form::label('category_id', 'Category') !!}
          {!! Form::select('category_id', [''=>'Choose category'] + $categories, null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('photo', 'Photo') !!}
          {!! Form::file('photo', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::submit('Edit Post', ['class'=>'btn btn-primary col-sm-6']) !!}
        </div>

      {!! Form::close() !!}

      {!! Form::open(['method'=>'DELETE', 'action'=>['PostController@destroy', $post->id]]) !!}
        <div class="form-group">
          {!! Form::submit('Delete Post', ['class'=>'btn btn-danger col-sm-6']) !!}
        </div>
      {!! Form::close() !!}

    </div>
  </div>

  <div class="row">

    @include('includes.form_error')

  </div>

@endsection
