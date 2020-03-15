@extends('layouts.admin')

@section('content')

  @if (Session::has('deleted_user'))

    <p class="bg-danger">{{ session('deleted_user') }}</p>

  @endif

  <h1>Users</h1>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Photo</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Status</th>
        <th scope="col">Created</th>
        <th scope="col">Updated</th>
      </tr>
    </thead>
    <tbody>

      @foreach($users as $user)

        <tr>
          <th scope="row">{{ $user->id }}</th>
          <td><img src="{{$user->photo ? $user->photo->path : '/images/default-photo.jpg'}}" alt="" height="70"></td>
          <td><a href="{{ route('admin.edit', $user->id) }}">{{ $user->name }}</a></td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->role->name }}</td>
          <td>{{ $user->is_active == 1 ? 'Active' : 'Not Active' }}</td>
          <td>{{ $user->created_at->diffForHumans() }}</td>
          <td>{{ $user->updated_at->diffForHumans() }}</td>
        </tr>

      @endforeach

    </tbody>
  </table>

@endsection
