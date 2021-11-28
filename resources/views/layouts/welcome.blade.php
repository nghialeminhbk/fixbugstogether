@extends('layouts.app')
@section('header')
<header class="p-3 bg-light text-dark border border-bottom">
<div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none px-4" >
        <img style="witdh: 50px; height: 50px" class="img-fluid" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQu4tqt2qQ1y96sL15RZyCt-CkMNU3yNf9B82_JitqIkAC0e44YNhHeecFuRtuGO9Qj7gA&usqp=CAU" alt="" >
        <p class="m-0 fs-5 fw-bold">FixBugsTogether</p>
    </a>

    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 fs-6">
        <li><a href="#" class="nav-link px-4 fw-bold text-dark">About</a></li>
        <li><a href="#" class="nav-link px-4 fw-bold text-dark">Contact</a></li>
        <li><a href="#" class="nav-link px-4 fw-bold text-dark">FAQs</a></li>
        <li><a href="#" class="nav-link px-4 fw-bold text-dark">News</a></li>
    </ul>

    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" method="GET" action="/dsadsa">
        <input type="search" class="form-control form-control-dark border border-success" name="search" placeholder="Search..." aria-label="Search">
    </form>

    <div class="text-end">
        <a href={{ route('login') }} type="button" class="btn btn-outline-secondary me-2">Login</a>
        <a href={{ route('register-user') }} type="button" class="btn btn-primary">Sign-up</a>
    </div>
    </div>
</div>
</header>
@endsection