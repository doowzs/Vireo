@extends('layouts.docs')
@section('title', $document->title)
@section('content')
    <h1>{{ $document->title }}</h1>
    <p>
        <small>发布于：{{ $document->published_at }}</small>，
        <small>更新于：{{ $document->updated_at }}</small>
    </p>
    <hr />

    {!! $document->content !!}
@stop