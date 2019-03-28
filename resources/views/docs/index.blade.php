@extends('layouts.docs')
@section('content')
    <h1>文档</h1>
    <p>本页的介绍，可以在<code>/resources/views/docs/index.blade.php</code>修改。</p>
    <hr />
    @foreach($documents_grouped as $documents)
        <h2>{{ $documents[0]->category }}</h2>
        <hr align="left" width="70%" />
        <ul>
            @foreach($documents as $document)
                <li>
                    <a href="{{ route('docs.view', ['slug' => $document->slug]) }}">{{$document->title}}</a>
                    <small>&nbsp; {{ $document->published_at }}</small>
                </li>
            @endforeach
        </ul>
    @endforeach
@stop