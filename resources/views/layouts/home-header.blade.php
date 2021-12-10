@extends('layouts.app')
@section('header')
<header class="p-3 sticky-top border-bottom bg-light">
<div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
        <img style="witdh: 50px; height: 50px" class="img-fluid" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQu4tqt2qQ1y96sL15RZyCt-CkMNU3yNf9B82_JitqIkAC0e44YNhHeecFuRtuGO9Qj7gA&usqp=CAU" alt="" >
        <p class="m-0 fs-5 fw-bold">FixBugsTogether</p>
    </a>

    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="#" class="nav-link px-2 link-secondary">Overview</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">Inventory</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">Customers</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">Products</a></li>
    </ul>

    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
        <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
    </form>

    <div class="dropdown text-end">
        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img @if(auth()->user()->customer()) src="{{ asset(auth()->user()->customer()->image) }}" @else src="{{ asset('css\577351.png') }}" @endif alt="mdo" width="32" height="32" class="rounded-circle">
        </a>
        <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
        <li><a class="dropdown-item" href="#">New project...</a></li>
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
@endsection