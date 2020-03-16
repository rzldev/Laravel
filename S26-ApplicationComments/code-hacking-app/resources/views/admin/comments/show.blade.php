@extends('layouts.admin')

@section('content')

  <h1>Comments</h1>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Author</th>
        <th scope="col">Email</th>
        <th scope="col">Body</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>

      @foreach ($comments as $comment)

        <tr>
          <td>{{ $comment->id }}</td>
          <td>{{ $comment->author }}</td>
          <td>{{ $comment->email }}</td>
          <td>{{ $comment->body }}</td>
          <td><a href="{{ route('comments.edit', $comment->id) }}">View post</a></td>
          <td>

            @if ($comment->is_active == 1)

              {!! Form::open(['method'=>'PATCH', 'action'=>['CommentController@update', $comment->id]]) !!}

                <input type="hidden" name="is_active" value="1">

                <div class="form-group">
                  {!! Form::submit('Unapprove', ['class'=>'btn btn-success']) !!}
                </div>

              {!! Form::close() !!}

            @else

              {!! Form::open(['method'=>'PATCH', 'action'=>['CommentController@update', $comment->id]]) !!}

                <input type="hidden" name="is_active" value="1">

                <div class="form-group">
                  {!! Form::submit('Approve', ['class'=>'btn btn-danger']) !!}
                </div>

              {!! Form::close() !!}

            @endif

          </td>
        </tr>

      @endforeach

    </tbody>
  </table>

@endsection
