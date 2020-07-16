@extends('layouts.app')
@section('title', $title ?? 'About')
@section('content')
    <p>This is the about page</p>
    @if(count($details) > 0)
        <ul class="list-group">
            @foreach($details as $detail)
                <li class="list-group-item">{{$detail}}</li>
            @endforeach
        </ul>
    @endif
@endsection
