@extends('layouts.home')
@section('content')
    <h1>Project Vireo</h1>
    <hr />
    <p>此处你可以放一些个人介绍，包括个人信息、简历、项目等。</p>
    <p>本页面的代码位于<code>/resources/views/home.blade.php</code>。</p>
    <div class="card">
        <div class="card-body">
            主要的自定义处：
            <ul>
                <li><code>/.env</code>文件可以自定义网站的名称、作者等。</li>
                <li><code>/recources/views/layouts/all_pages/social.blade.php</code>可以修改菜单栏的社交图标。</li>
                <li><code>/recources/posts</code>存储博客内容，使用指令<code>php artisan vireo:post</code>可以创建一篇博客。</li>
                <li><code>/recources/docs</code>存储文章内容，使用指令<code>php artisan vireo:document</code>可以创建一篇文档。</li>
            </ul>
        </div>
    </div>
@stop