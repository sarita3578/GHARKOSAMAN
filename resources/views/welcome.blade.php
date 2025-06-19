@extends('layouts.app')

@section('content')
    <h1>Welcome to GharKoSaman</h1>
    <p>This is a public home page visible to everyone.</p>

    <a href="{{ route('login') }}">Login</a> | 
    <a href="{{ route('register') }}">Register</a>
@endsection
