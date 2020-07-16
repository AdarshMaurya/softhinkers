@extends('layouts.app')
@section('title', $title ?? '')
@section('content')
    <div class="jumbotron text-center">
        <h1>Welcome to Softhinkers</h1>
        <p>Thank you so much for visiting. Please register & login to write your favourite blogs!</p>
        <p>
            <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
            <a class="btn btn-success btn-lg" href="/register" role="button">Register</a>
        </p>
    </div>
@endsection
