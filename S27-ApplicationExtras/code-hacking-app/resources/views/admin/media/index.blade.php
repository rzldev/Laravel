@extends('layouts.admin')

@section('content')

  <h1>Media</h1>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Photo</th>
        <th scope="col">Created at</th>
        <th scope="col">Updated at</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($photos as $photo)

        <tr>
          <td>{{ $photo->id }}</td>
          <td>
            <a href="{{ route('categories.edit', $photo->id) }}">
              <img src="{{ $photo->path }}" alt="photo" height="70">
            </a>
          </td>
          <td>{{ $photo->created_at }}</td>
          <td>{{ $photo->updated_at }}</td>
          <td>

            {!! Form::open(['method'=>'DELETE', 'action'=>['MediaController@destroy', $photo->id], 'files'=>true]) !!}

              <div class="form-group">
                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
              </div>

            {!! Form::close() !!}

          </td>
        </tr>

      @endforeach

    </tbody>
  </table>

@endsection()
