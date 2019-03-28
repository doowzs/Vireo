@extends('layouts.blog')
@section('content')
    <h1>博客</h1>
    <p>本页的介绍，可以在<code>/resources/views/blog/index.blade.php</code>修改。</p>
    <p>总共有{{ $posts->total() }}篇文章。</p>
    <hr />

    <ul>
        @foreach($posts as $post)
            <li>
                {{ $post->category }} -
                <a href="{{ route('blog.view', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                <small>&nbsp; {{ $post->published_at }}</small>
            </li>
        @endforeach
    </ul>
    {!! $posts->render() !!}
@stop