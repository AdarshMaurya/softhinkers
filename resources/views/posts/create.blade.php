@extends('layouts.app')
@section('title', $title ?? 'Create New Post')
@section('content')
    <h1>Create New Post</h1>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title', 'required'=>'', 'maxlength'=>'255'])}}
    </div>

    <div class="form-group">
        {{Form::label('slug', 'Slug')}}
        {{Form::text('slug', '', ['class' => 'form-control', 'placeholder' => 'Slug', 'required'=>'', 'minlength'=>'5', 'maxlength'=>'255'])}}
    </div>

    <div class="form-group">
        {{Form::label('category_id', 'Category')}}
        <select class="form-group" name="category_id">
            @foreach($categories as $category)
                <option value='{{ $category->id }}'>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        {{Form::label('tags', 'Tags')}}
        <select class="form-control select2-multi" name="tags[]" multiple="multiple">
            @foreach($tags as $tag)
                <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        {{Form::label('body', 'Body')}}
        {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
    </div>
    <div class="form-group">
        {{ Form::label('cover_image', 'Upload a cover image') }}
        {{Form::file('cover_image')}}
    </div>
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection

@section('scripts')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        function load_ckeditor() {
            CKEDITOR.replace('article-ckeditor');
        }
    </script>
@endsection
