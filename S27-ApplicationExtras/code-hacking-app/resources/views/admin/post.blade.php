@extends('layouts.blog-post')

@section('content')

<!-- Title -->
<h1>{{ $post->title }}</h1>

<!-- Author -->
<p class="lead">
    by <a href="#">{{ $post->user->name }}</a>
</p>

<hr>

<!-- Date/Time -->
<p><span class="glyphicon glyphicon-time"></span> Posted {{ $post->created_at->diffForHumans() }}</p>

<hr>

<!-- Preview Image -->
<img class="img-responsive" src="{{ $post->photo->path }}" alt="" width="80%">

<hr>

<!-- Post Content -->
<p>{{ $post->content }}</p>

<hr>

@if (Session::has('comment_message'))
  {{ session('comment_message') }}
@endif

<!-- Blog Comments -->

<!-- Comments Form -->
@if (Auth::check())

  <div class="well">
      <h4>Leave a Comment:</h4>

      {!! Form::open(['method'=>'POST', 'action'=>'CommentController@store', 'role'=>'form']) !!}

        <input type="hidden" name="post_id" value="{{ $post->id }}">

        <div class="form-group">
          {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>4]) !!}
        </div>

        <div class="form-group">
          {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
        </div>

      {!! Form::close() !!}
  </div>

@endif

<hr>

<!-- Posted Comments -->

<!-- Comment -->
<div class="media">

  @if (count($comments) > 0)

    @foreach ($comments as $comment)

      <a class="pull-left" href="#">
          <img class="media-object" src="{{ $comment->photo->path }}" alt="" height="48">
      </a>
      <div class="media-body">
          <h4 class="media-heading">{{ $comment->author }}
              <small>{{ $comment->created_at->diffForHumans() }}</small>
          </h4>
          {{ $comment->body }}

          @if (count($comment->replies) > 0)

            @foreach ($comment->replies as $reply)

              <!-- Nested Comment -->
              <div class="media">
                  <a class="pull-left" href="#">
                      <img class="media-object" src="{{ $reply->photo->path }}" alt="" height="48">
                  </a>
                  <div class="media-body">
                      <h4 class="media-heading">{{ $reply->author }}
                          <small>{{ $reply->created_at->diffForHumans() }}</small>
                      </h4>
                      {{ $reply->body }}
                  </div>
              </div>
              <!-- End Nested Comment -->

            @endforeach

          @endif

          @if (Auth::check())

            <div class="comment-reply-container">
              <button id="toggle-reply" class="btn btn-primary pull-right">Reply</button>

              <div id="comment-reply">

                {!! Form::open(['method'=>'POST', 'action'=>'CommentReplyController@store', 'role'=>'form']) !!}

                  <input type="hidden" name="comment_id" value="{{ $comment->id }}">

                  <div class="form-group">
                    {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>1]) !!}
                  </div>

                  <div class="form-group">
                    {!! Form::submit('Send Reply', ['class'=>'btn btn-primary']) !!}
                  </div>

                {!! Form::close() !!}

              </div>

            </div>

          @endif

      </div>

    @endforeach

  @else

  <p>No Comment</p>

  @endif

</div>

@endsection

@section('scripts')

  <script>

    $("#toggle-reply").click(function() {
      $("#comment-reply").show( "slow" );

      $(this).hide();
    });

  </script>

@endsection
