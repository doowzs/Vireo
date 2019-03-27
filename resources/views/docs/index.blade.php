@extends('layouts.docs')
@section('content')
    <p>此页面列举所有的文档。</p>
    @foreach($documents_grouped as $documents)
        @foreach($documents as $document)
            <a href="{{ route('docs.view', ['slug' => $document->slug]) }}">{{$document->title}}</a>
        @endforeach
    @endforeach
@stop