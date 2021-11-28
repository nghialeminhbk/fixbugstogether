@extends('layouts.home-navbar')
@section('title', 'Users -')
@section('users', 'bg-light')
@section('sub_content')
<div class="title--users">
    <h2>List Users</h2>
</div>
<div class="list-users">
    <div class="row">
        @for($i=1; $i<=12; $i++)
        <div class="col-3 d-flex align-items-center">
            <img src="https://thuthuatnhanh.com/wp-content/uploads/2020/09/hinh-anh-avatar-de-thuong-chibi-ve-co-gai.jpg" alt="" style="width: 90px; height: 90px" class="img-fluid img-thumbnail rounded">
            <div class="d-flex flex-column flex-grow-1 p-2">
                <a href="{{ route('users.view', 2) }}" class="fw-bold text-primary">nghiatitan</a>
                <span class="location text-muted">Ha Noi, Viet Nam</span>
                <span class="amout posts fw-bold">1000</span>
                <span class="time">15-10-2020</span>
            </div>
        </div>
        @endfor
    </div>
</div>
@endsection