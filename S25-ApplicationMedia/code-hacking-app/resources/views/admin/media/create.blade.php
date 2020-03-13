@extends('layouts.admin')

@section('styles')

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/basic.css">

@endsection

@section('content')

  <h1>Uploading Media</h1>

  {!! Form::open(['method'=>'POST', 'action'=>'MediaController@store', 'class'=>'dropzone']) !!}

  {!! Form::close() !!}

@endsection

@section('scripts')

  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone-amd-module.js"></script>

@endsection
