@extends('layouts.docs')
@section('title', $document->title)
@section('content')
    <h1>{{ $document->title }}</h1>
    <p>
        <small>
            分类：{{ $document->category }}，
            发布于：{{ $document->published_at }}，
            更新于：{{ $document->updated_at }}
        </small>
    </p>
    <hr />
    <div class="alert alert-success">
        <i class="fas fa-copyright mr-1"></i>
        版权声明：请在<code>/resources/views/docs/view.blade.php</code>中修改。
    </div>
    <hr />
    {!! $document->content !!}
@stop