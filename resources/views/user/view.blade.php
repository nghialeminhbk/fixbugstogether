@extends('layouts.home-navbar')
@section('title', 'Users -')
@section('users', 'bg-light fw-bold')
@section('sub_content')
<div class="container_ px-3">
    <div class="avt d-flex mb-3">
        <img src="{{ asset($image) }}" class="avt rounded img-fluid img-thumbnail shadow-box" alt="" style="height: 140px; width: 140px">
        <div class="info d-flex flex-column px-2">
            <h2 class="name txt-shadow">{{ $displayName }}</h2>
            <span class="active fs-5">{{ $title }}</span>
            <span class="active"><i class="far fa-clock"></i> {{ $timeJoined }}</span>
            <span class="location"><i class="fas fa-map-marker-alt"></i> {{ $location }}</span>
        </div>
        @if(auth()->user()->id == $id)
        <div class="flex-grow-1">
            <a class="btn btn-outline-dark float-end" href="{{ route('users.edit', $id) }}"><i class="fas fa-pencil-alt"></i> Edit profile</a>
        </div>
        @endif
    </div>
    <div class="profile">
        <div class="fw-bold">
            <h3>Profile</h3>
        </div>
        <div class="row mb-3">
            <div class="col-3 px-3">
                <h5 class="fw-bold">Stats</h5>
                <div class="row p-2 border rounded border-dark">
                    <div class="col-6 py-2 text-center">
                        <div>{{ $postCount }}</div>
                        <div class="fw-bold">posts</div>
                    </div>
                    <div class="col-6 py-2 text-center">
                        <div class="">{{ $questionCount }}</div>
                        <div class="fw-bold">questions</div>
                    </div>
                    <div class="col-6 py-2 text-center">
                        <div class="">{{ $answerCount }}</div>
                        <div class="fw-bold">answers</div>
                    </div>
                </div>
            </div>
            <div class="col-8 px-5">
                <h5 class="fw-bold">About me</h5>
                <div class="about--me">
                    {!! $aboutMe !!}
                </div>
            </div>
        </div>
        <div class="mb-3 d-flex">
            <h5 class="fw-bold">Link github:</h5> <a href="{{ $githubLink }}" class="text-primary ms-2">{{ $githubLink }}</a>
        </div>
        <div class="mb-3 d-flex">
            <h5 class="fw-bold">Link website:</h5> <a href="{{ $websiteLink }}"  class="text-primary ms-2">{{ $websiteLink }}</a>
        </div>
    </div>
</div>

<script>
    function getId(url) {
        const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
        const match = url.match(regExp);

        return (match && match[2].length === 11)
        ? match[2]
        : null;
    }
        
    const videoId = getId('http://www.youtube.com/watch?v=zbYf5_S7oJo');
    const iframeMarkup = '<iframe width="560" height="315" src="//www.youtube.com/embed/' 
        + videoId + '" frameborder="0" allowfullscreen></iframe>';

    console.log('Video ID:', videoId);
</script>
@endsection