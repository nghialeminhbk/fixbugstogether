@extends('layouts.home-navbar')
@section('title', 'Users -')
@section('users', 'bg-light fw-bold')
@section('sub_content')
<div class="container_ px-3">
    <div class="avt d-flex mb-3">
        <img src="https://i.stack.imgur.com/QgEPq.png?s=256&g=1" class="avt rounded img-fluid img-thumbnail" alt="" style="height: 100px; width: 100px">
        <div class="info d-flex flex-column px-2">
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
        <div class="row mb-3">
            <div class="col-3 px-3">
                <h5>Stats</h5>
                <div class="row p-2 border rounded">
                    <div class="col-6 py-2 text-center">
                        <div>5</div>
                        <div>posts</div>
                    </div>
                    <div class="col-6 py-2 text-center">
                        <div class="">3</div>
                        <div>questions</div>
                    </div>
                    <div class="col-6 py-2 text-center">
                        <div class="">2</div>
                        <div>answers</div>
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
        <div class="mb-3 d-flex">
            <h5>Link github:</h5> <a href="#" class="text-primary ms-2">nghia.github</a>
        </div>
        <div class="mb-3 d-flex">
            <h5>Link website:</h5> <a href="#"  class="text-primary ms-2">nghia.fb</a>
        </div>
    </div>
</div>
@endsection