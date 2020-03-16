@extends('layouts.admin');

@section('content')

  <h1>Posts</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Owner</th>
          <th scope="col">Category</th>
          <th scope="col">Photo</th>
          <th scope="col">Title</th>
          <th scope="col">Content</th>
          <th scope="col">Comments</th>
          <th scope="col">Created at</th>
          <th scope="col">Updated at</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($posts as $post)

          <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->user->name }}</td>
            <td>{{ $post->category->name }}</td>
            <td><img src="{{$post->photo ? $post->photo->path : '/images/default-photo.jpg'}}" alt="" height="70"></td>
            <td><a href="{{ route('posts.edit', $post->id) }}">{{ $post->title }}</a></td>
            <td>{{ $post->content }}</td>
            <td><a href="{{ route('posts.show', $post->id) }}">View Comments</a></td>
            <td>{{ $post->created_at }}</td>
            <td>{{ $post->updated_at }}</td>
          </tr>

        @endforeach

      </tbody>
    </table>

@endsection
