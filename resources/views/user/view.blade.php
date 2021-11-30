@extends('layouts.home-navbar')
@section('title', 'Users -')
@section('users', 'bg-light fw-bold')
@section('sub_content')
<div class="container_ px-3">
    <div class="avt d-flex mb-3">
        <img src="{{ asset($image) }}" class="avt rounded img-fluid img-thumbnail" alt="" style="height: 120px; width: 120px">
        <div class="info d-flex flex-column px-2">
            <h2 class="name">{{ $displayName }}</h2>
            <span class="active text-muted fs-5">{{ $title }}</span>
            <span class="active text-muted"><i class="far fa-clock"></i> {{ $timeJoined }}</span>
            <span class="location text-muted"><i class="fas fa-map-marker-alt"></i> {{ $location }}</span>
        </div>
        <div class="flex-grow-1">
            <a class="btn btn-outline-secondary float-end" href="{{ route('users.edit', $id) }}"><i class="fas fa-pencil-alt"></i> Edit profile</a>
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
            <div class="col-8 px-5">
                <h5>About me</h5>
                <div class="about--me">
                    {!! $aboutMe !!}
                </div>
            </div>
        </div>
        <div class="mb-3 d-flex">
            <h5>Link github:</h5> <a href="{{ $githubLink }}" class="text-primary ms-2">{{ $githubLink }}</a>
        </div>
        <div class="mb-3 d-flex">
            <h5>Link website:</h5> <a href="{{ $websiteLink }}"  class="text-primary ms-2">{{ $websiteLink }}</a>
        </div>
    </div>
</div>
@endsection