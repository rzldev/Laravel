@extends('layouts.admin')

@section('content')

  <h1>Categories</h1>

  <div class="col-lg-6 col-md-6">

    {!! Form::open(['method'=>'POST', 'action'=>'CategoryController@store']) !!}

      {{ csrf_field() }}

      <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
      </div>

      <div class="form-group">
        {!! Form::submit('Add Category', ['class'=>'btn btn-primary']) !!}
      </div>

    {!! Form::close() !!}

  </div>

  <div class="col-lg-6 col-md-6">

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col">Created at</th>
          <th scope="col">Updated at</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($categories as $category)

          <tr>
            <td>{{ $category->id }}</td>
            <td><a href="{{ route('categories.edit', $category->id) }}">{{ $category->name }}</a></td>
            <td>{{ $category->created_at }}</td>
            <td>{{ $category->updated_at }}</td>
          </tr>

        @endforeach

      </tbody>
    </table>

  </div>

@endsection
