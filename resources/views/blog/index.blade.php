@extends('layouts.blog')
@section('content')
    <p>总共有{{ $posts->total() }}篇文章。</p>
    @foreach($posts as $post)
        <p>
            <a href="{{ route('blog.view', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
            <small>发布于 {{ $post->published_at }}</small>
        </p>
    @endforeach
    {!! $posts->render() !!}
@stop