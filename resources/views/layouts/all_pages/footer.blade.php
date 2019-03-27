<footer class="page-footer font-small blue">
    <div class="footer-copyright text-center py-3 px-3">
        <span>
            <i class="fas fa-copyright mr-2"></i>
            {{ env('APP_AUTHOR') }}
            (2018 - {{ \Carbon\Carbon::today()->format('Y') }})
            All rights reserved.
        </span>
        <span class="mx-lg-3">
            <a href="https://github.com/doowzs/vireo">Project Vireo</a>
        </span>
        @if(env('APP_ICP_NO'))
            <span><a href="http://www.miitbeian.gov.cn">{{ env('APP_ICP_NO') }}</a></span>
        @endif
    </div>
</footer>