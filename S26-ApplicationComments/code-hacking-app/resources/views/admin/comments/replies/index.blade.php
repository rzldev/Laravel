@extends('layouts.admin')

@section('content')

  <h1>Replies</h1>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Author</th>
        <th scope="col">Email</th>
        <th scope="col">Body</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($replies as $reply)

        <tr>
          <td>{{ $reply->id }}</td>
          <td>{{ $reply->author }}</td>
          <td>{{ $reply->email }}</td>
          <td>{{ $reply->body }}</td>
          <td> <a href="{{ route('home.post', $reply->comment->post_id) }}">View Post</a> </td>
          <td>

            @if ($reply->is_active == 1)

              {!! Form::open(['method'=>'PATCH', 'action'=>['CommentReplyController@update', $reply->id]]) !!}

                <input type="hidden" name="is_active" value="0">

                <div class="form-group">
                  {!! Form::submit('Unapprove', ['class'=>'btn btn-success']) !!}
                </div>

              {!! Form::close() !!}

            @else

              {!! Form::open(['method'=>'PATCH', 'action'=>['CommentReplyController@update', $reply->id]]) !!}

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
