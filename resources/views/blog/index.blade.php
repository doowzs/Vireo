@extends('layouts.blog')
@section('content')
    <p>总共有{{ $posts->total() }}篇文章。</p>
    @foreach($posts as $post)
        <a href="{{ route('blog.view', ['slug' => $post->slug]) }}">{{$post->title}}</a>
    @endforeach
    {!! $posts->render() !!}
@stop