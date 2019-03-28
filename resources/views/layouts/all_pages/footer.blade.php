<footer class="page-footer font-small blue">
    <div class="footer-copyright text-center py-3 px-3">
        <span class="mr-1 mr-lg-3">
            <i class="fas fa-copyright mr-1"></i>
            {{ env('APP_AUTHOR') }}
            (2018 - {{ \Carbon\Carbon::today()->format('Y') }})
            All rights reserved.
        </span>
        <span class="mr-1 mr-lg-3">
            <a href="{{ route('legal') }}"><i class="fas fa-user-secret mr-1"></i>Legal Notice</a>
        </span>
        <span class="mr-1 mr-lg-3">
            <a href="https://github.com/doowzs/vireo"><i class="fas fa-dove mr-1"></i>Project Vireo</a>
        </span>
        @if(env('APP_ICP_NO'))
            <span><a href="http://www.miitbeian.gov.cn"><i class="fas fa-id-badge mr-1"></i>{{ env('APP_ICP_NO') }}</a></span>
        @endif
    </div>
</footer>