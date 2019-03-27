@extends('layouts.blog')
@section('title', $post->title)
@section('content')
    <h1>{{ $post->title }}</h1>
    <p>
        <small>发布于：{{ $post->published_at }}</small>，
        <small>更新于：{{ $post->updated_at }}</small>
    </p>
    <hr />

    {!! $post->content !!}
@stop