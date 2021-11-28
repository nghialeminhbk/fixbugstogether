@extends('layouts.home-header')
@section('content')
<div class="row px-5 bg-white">
    <div class="col-2 border-end flex p-0">
    <div id="fixed-navbar" class="flex-grow-1 flex-shrink-0 py-3 bg-white float-end" >
        <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none">
            <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-5 fw-semibold">Collapsible</span>
        </a>
        <ul class="list-unstyled ps-0">
            <li class="mb-1 @yield('home')">
                <a class="btn btn-toggle align-items-center rounded" href="{{ route('home') }}"  aria-expanded="false"><i class="fas fa-home"></i> 
                    Home
                </a>
            </li>
            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false"><i class="fas fa-globe-americas"></i>
                Pubic
                </button>
                <div class="collapse ps-5 show" id="dashboard-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li class="p-2 @yield('questions')"><a href="#" class="link-dark rounded">Questions</a></li>
                        <li class="p-2 @yield('tags')"><a href="#" class="link-dark rounded">Tags</a></li>
                        <li class="p-2 @yield('users')"><a href="{{ route('users.list') }}" class="link-dark rounded">Users</a></li>
                    </ul>
                </div>
            </li>
            <li class="mb-1">
            <button class="btn btn-toggle align-items-center rounded" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false"><i class="fas fa-newspaper"></i>
                News
            </button>
            <div class="collapse ps-5 show" id="orders-collapse" style="">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li class="p-2"><a href="#" class="link-dark rounded">New</a></li>
                    <li class="p-2"><a href="#" class="link-dark rounded">Processed</a></li>
                </ul>
            </div>
            </li>
            <li class="border-top my-3"></li>
        </ul>
    </div>
    </div>
    <div class="col-10 p-3">
        @yield('sub_content')
    </div>
</div>
<!-- <script>
    function sticky_relocate() {
        var window_top = $(window).scrollTop();
        var footer_top = $("#footer").offset().top;
        var div_top = $('#fixed-navbar').offset().top;
        var div_height = $("#fixed-navbar").height();

        if (window_top + div_height > footer_top)
            $('#fixed-navbar').removeClass('fixed');    
        else if (window_top > div_top) {
            $('#fixed-navbar').addClass('fixed');
        } else {
            $('#fixed-navbar').removeClass('fixed');
        }
    }
    $(function () {
        $(window).scroll(sticky_relocate);
        sticky_relocate();
    });
</script> -->
@endsection