@extends('layouts.app')

@section('content')
<a href="/posts" class="btn btn">Go back</a>
<h1>{{$post->title}}</h1>
<div class="row">
    <div class="col-md-12">
        <img src="/storage/cover_image/{{$post->cover_image}}" style="width:100%" alt="">
    </div>
</div>
<p>{{$post->body}}</p>
<hr>
<small>Written on {{$post->created_at}}</small>
<hr>

@if(!Auth::guest())
    @if(auth()->user()->id == $post->user_id)
        <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
        {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy',$post->id],'method' => 'DELETE','class' => 'pull-left']) !!}
        {!! Form::submit('Delete',['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    @endif
@endif

@endsection