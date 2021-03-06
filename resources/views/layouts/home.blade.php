@extends('layouts.html_base.app')
@push('body')
    <header>
        @include('layouts.home.navbar')
    </header>
    <main>
        <div class="container my-4">
            @yield('content')
        </div>
    </main>
    @include('layouts.all_pages.footer')
@endpush