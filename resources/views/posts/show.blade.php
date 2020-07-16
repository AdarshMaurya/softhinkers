@extends('layouts.app')
@section('title', $post->title)
@section('content')
    <div class="row">
        <div class="col-md-8">
            <a href="/posts" class="btn btn-default">Go Back</a>
            <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
            <h1>{{$post->title}}</h1>
            <p class="lead">{!! $post->body !!}</p>
            <hr>
            <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
            <div class="tags">
                @foreach ($post->tags as $tag)
                    <span class="label label-default">{{ $tag->name }}</span>
                @endforeach
            </div>
            <div id="backend-comments" style="margin-top: 50px;">
                <h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>

                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th width="70px"></th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($post->comments as $comment)
                        <tr>
                            <td>{{ $comment->name }}</td>
                            <td>{{ $comment->email }}</td>
                            <td>{{ $comment->comment }}</td>
                            <td>
                                <a href="{{ route('comments.edit', $comment->id) }}"
                                   class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="{{ route('comments.delete', $comment->id) }}"
                                   class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <label>Url:</label>
                    <p><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></p>
                </dl>

                <dl class="dl-horizontal">
                    <label>Category:</label>
                    <p>{{ $post->category->name }}</p>
                </dl>

                <dl class="dl-horizontal">
                    <label>Created At:</label>
                    <p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
                </dl>

                <dl class="dl-horizontal">
                    <label>Last Updated:</label>
                    <p>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</p>
                </dl>
                <hr>
                @if(!Auth::guest())
                    @if(Auth::user()->id == $post->user_id)
                        <div class="row">
                            <div class="col-sm-6">
                                {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

                                {!! Form::close() !!}
                            </div>
                        </div>
                    @endif
                @endif
                <div class="row">
                    <div class="col-md-12">
                        {{ Html::linkRoute('posts.index', '<< See All Posts', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
                    </div>
                </div>

            </div>
        </div>
    </div>

{{--    @if(!Auth::guest())--}}
{{--        @if(Auth::user()->id == $post->user_id)--}}
{{--            <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>--}}

{{--            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}--}}
{{--            {{Form::hidden('_method', 'DELETE')}}--}}
{{--            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}--}}
{{--            {!!Form::close()!!}--}}
{{--        @endif--}}
{{--    @endif--}}
@endsection
