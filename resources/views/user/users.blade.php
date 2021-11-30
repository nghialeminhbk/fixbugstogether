@extends('layouts.home-navbar')
@section('title', 'Users -')
@section('users', 'bg-light')
@section('sub_content')
<div class="title--users">
    <h2>List Users</h2>
</div>
<div class="list-users">
    <div class="row">
        @foreach($customers as $customer)
        <div class="col-3 d-flex align-items-center">
            <img src="{{ asset($customer->image) }}" alt="" style="width: 90px; height: 90px" class="img-fluid img-thumbnail rounded">
            <div class="d-flex flex-column flex-grow-1 p-2">
                <a href="{{ route('users.view', $customer->id) }}" class="fw-bold text-primary">{{ $customer->user()->name }}</a>
                <span class="location text-muted">{{ $customer->location }}</span>
                <span class="amout posts fw-bold">0</span>
                <span class="time">{{ $customer->createdAt }}</span>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection