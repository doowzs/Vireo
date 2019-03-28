@extends('layouts.blog')
@section('title', $post->title)
@section('content')
    <h1>{{ $post->title }}</h1>
    <p>
        <small>
            分类：{{ $post->category }}，
            发布于：{{ $post->published_at }}，
            更新于：{{ $post->updated_at }}
        </small>
    </p>
    <hr />
    <div class="alert alert-success">
        <i class="fas fa-copyright mr-1"></i>
        版权声明：请在<code>/resources/views/blog/view.blade.php</code>中修改。
    </div>
    <hr />

    {!! $post->content !!}
@stop