@extends('layouts.app')
@section('header')
<header class="p-3 sticky-top border-bottom bg-chamthan">
<div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
    <a href="/" class="d-flex align-items-center mb-2 me-2 mb-lg-0 text-white text-decoration-none">
        <img style="witdh: 50px; height: 50px" class="img-fluid me-2" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQu4tqt2qQ1y96sL15RZyCt-CkMNU3yNf9B82_JitqIkAC0e44YNhHeecFuRtuGO9Qj7gA&usqp=CAU" alt="" >
        <p class="m-0 fs-5 fw-bold">FixBugsTogether</p>
    </a>

    <ul class="nav col-6 col-lg-4 me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="#" class="nav-link px-2 text-white">Overview</a></li>
        <li><a href="#" class="nav-link px-2 text-white">Inventory</a></li>
        <li><a href="#" class="nav-link px-2 text-white">Customers</a></li>
        <li><a href="#" class="nav-link px-2 text-white">Products</a></li>
    </ul>

    <form class="col-6 col-lg-4 mb-3 mb-lg-0 me-lg-3" action="{{ route('search') }}" method="get" >
        <input name="search" type="search" class="form-control" placeholder="Enter the key search ..." aria-label="Search" data-bs-toggle="tooltip" data-bs-placement="top" title="user:[user name] to search user and tag:[tag name] to search tag">
    </form>

    <div class="dropdown text-white">
        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownNotify" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="position-relative btn btn-info" id="notifications">
                <i class="fs-4 fas fa-bell"></i>
                <span id="badge" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger fs-6">
                    0
                    <span class="visually-hidden">unread messages</span>
                </span>
            </div>
        </a>
        <ul class="dropdown-menu text-small" aria-labelledby="dropdownNotify" style="">
            <ul class="p-0" id="notification-content">
                <li class="dropdown-item">loading.............................................................................</li>
            </ul>
            <li class="dropdown-item d-flex justify-content-center align-items-center"><i class="text-warning fas fa-step-forward me-2"></i><a href="{{ route('notifications.list', auth()->user()->id) }}">View all notifications</a></li>
        </ul>
    </div>

    <div class="dropdown text-white">
        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img @if(auth()->user()->customer()) src="{{ asset(auth()->user()->customer()->image) }}" @else src="{{ asset('css\577351.png') }}" @endif alt="mdo" width="45" height="45" class="rounded-circle border border-2 border-secondary shadow-box">
        </a>
        <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
            <li><a class="dropdown-item" href="{{ route('savedList', auth()->user()->id) }}">Saved list</a></li>
            @auth
            <li><a class="dropdown-item" href="{{ route('users.view', auth()->user()->id) }}">Profile</a></li>
            @endauth
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('signout') }}" >Sign out</a></li>
        </ul>
    </div>
    </div>
</div>
</header>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))

    $(window).on('load', function(){
        const url = "http://127.0.0.1:8000/notifications/count-not-check/{{ auth()->user()->id }}";
        setInterval(() => {
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function (response) {
                    document.getElementById("badge").innerText = response['count'];
                }
            });
        }, 1500);
    });

    $("#notifications").click(function(){
        const url = "http://127.0.0.1:8000/notifications/dropdown/{{ auth()->user()->id }}";
        $.ajax({
            type: "GET",
            url: url,
            dataType: "html",
            success: function (response) {
                $("#notification-content").html(response);
            }
        });
    })
</script>
@endsection