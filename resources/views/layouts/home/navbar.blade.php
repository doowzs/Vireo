<nav class="navbar navbar-expand-lg navbar-dark teal">
    <a class="navbar-brand" href="#"><strong>{{ env('APP_NAME') }}</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('blog.index') }}">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('docs.index') }}">Docs</a>
            </li>
        </ul>
        <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
                <a class="nav-link"><i class="fab fa-facebook-f"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link"><i class="fab fa-twitter"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link"><i class="fab fa-instagram"></i></a>
            </li>
        </ul>
    </div>
</nav>