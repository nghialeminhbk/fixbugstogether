@extends('layouts.home-navbar')
@section('title', 'Users -')
@section('users', 'bg-light fw-bold')
@section('sub_content')
<div class="title--users">
    <h2>List Users (<span class="text-primary fs-2">{{ $totalUsers }}</span> users)</h2>
</div>
<div class="list-users">
    <div class="row">
        @foreach($customers as $customer)
        <div class="col-3 d-flex align-items-center">
            <img src="{{ asset($customer->image) }}" alt="" style="width: 90px; height: 90px" class="img-fluid img-thumbnail rounded shadow-box">
            <div class="d-flex flex-column flex-grow-1 p-2">
                <a href="{{ route('users.view', $customer->id) }}" class="fw-bold text-primary">{{ $customer->user()->name }}</a>
                <span class="location text-muted">{{ $customer->location }}</span>
                <div>
                <span class="amout posts fw-bold">{{ $customer->post_count }}</span> posts
                </div>
                <span class="time"> {{ $customer->created_at }} </span>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection