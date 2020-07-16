@extends('layouts.app')

@section('title', $title ?? 'Blog')

@section('content')
    @if(count($posts) > 0)
        <div class="row">
            @foreach($posts as $post)
                <div class="well">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <h3><a href="{{ route('blog.single', $post->slug) }}">{{$post->title}}</a></h3>
                            <p>{{ substr(strip_tags($post->body), 0, 250) }}{{ strlen(strip_tags($post->body)) > 250 ? '...' : "" }}</p>
                            <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                        </div>
                    </div>
                </div>
            @endforeach
            {{$posts->links()}}
            @else
                <p>No posts found</p>
            @endif
        </div>
@endsection
