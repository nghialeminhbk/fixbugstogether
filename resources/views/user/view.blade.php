@extends('layouts.home-navbar')
@section('title', 'Users -')
@section('users', 'bg-light')
@section('sub_content')
<div class="container_">
    <div class="avt d-flex">
        <img src="https://i.stack.imgur.com/QgEPq.png?s=256&g=1" class="avt rounded img-fluid img-thumbnail" alt="" style="height: 100px; width: 100px">
        <div class="info d-flex flex-column">
            <h2 class="name">Nghia Titan</h2>
            <span class="active text-muted"><i class="far fa-clock"></i> 10 days</span>
            <span class="location text-muted"><i class="fas fa-map-marker-alt"></i> Viet Nam</span>
        </div>
        <div class="flex-grow-1">
            <a class="btn btn-outline-secondary float-end" href="{{ route('users.edit', 2) }}"><i class="fas fa-pencil-alt"></i> Edit profile</a>
        </div>
    </div>
    <div class="profile">
        <div class="">
            <h3>Profile</h3>
        </div>
        <div class="row">
            <div class="col-4">
                <h5>Stats</h5>
                <div class="border rounded">
                    <div class="row">
                        <div class="col-6">
                            <div class="">5</div>
                            <span>posts</span>
                        </div>
                        <div class="col-6">
                            <div class="">3</div>
                            <span>questions</span>
                        </div>
                        <div class="col-6">
                            <div class="">2</div>
                            <span>answers</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <h5>About me</h5>
                <p class="about--me">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid eligendi reprehenderit natus officia, alias quibusdam quam aspernatur temporibus magni voluptatibus.
                </p>
            </div>
        </div>
        <div class="mb-3 fw-bold">
            Link github: <span>nghiatan.github</span>
        </div>
        <div class="mb-3 fw-bold">
            Link website: <span>nghiatan.facebook</span>
        </div>
    </div>
</div>
@endsection