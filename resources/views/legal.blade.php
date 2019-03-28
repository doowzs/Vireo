@extends('layouts.home')
@section('title', 'Legal Notice')
@section('content')
    <h1>法律声明 / Legal Notice</h1>
    <hr />
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">隐私声明 / Privacy</h2>
            <p>此处由你自由发挥。请修改<code>/resources/views/legal.blade.php</code>。</p>
        </div>
    </div>
    <hr />
    <div class="card">
        <div class="card-body">
            <h2 class="card-title"><i class="fas fa-dove mr-1"></i>Project Vireo</h2>
            <p>Project Vireo is a open-source blog system based on Lumen (Laravel) 5.8.</p>
            <p>It is designed to replace Hexo as a slim yet highly extendable and customizable dynamic blog system.</p>
            <p>Visit the public repository for details and guides: <a href="https://github.com/doowzs/vireo">GitHub Repo</a></p>
            <p>Credits to libraries used by Vireo:</p>
            <ul>
                <li>Bootstrap</li>
                <li>CookieBanner</li>
                <li>Fancybox</li>
                <li>FontAwesome5</li>
                <li>JQuery</li>
                <li>MathJax</li>
                <li>MDBootstrap</li>
            </ul>
        </div>
    </div>
@stop