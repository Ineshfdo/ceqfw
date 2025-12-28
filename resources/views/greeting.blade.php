@extends('layouts.app')

@section('title', 'Greeting')

@section('content')
  <h1>Welcome {{ $name }} to my website!</h1>
  <h2>You are {{ $age }} years old!</h2>
@endsection
