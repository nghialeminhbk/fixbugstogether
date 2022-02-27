@extends('layouts.home-header')
@section('content')
<div class="container pt-3 pb-5">
<h3>Result of search (<span class="fw-bold text-primary fs-3">{{ $resultCount }}</span> results return!)</h3>
@if(!is_null($resultUser))
<div class="list-users">
    <div class="row">
        @foreach($resultUser as $customer)
        <div class="col-3 d-flex align-items-center">
            <img src="{{ asset($customer->image) }}" alt="" style="width: 90px; height: 90px" class="img-fluid img-thumbnail rounded-circle">
            <div class="d-flex flex-column flex-grow-1 p-2">
                <a href="{{ route('users.view', $customer->id) }}" class="fw-bold text-primary">{{ $customer->name }}</a>
                <span class="location text-muted">{{ $customer->location }}</span>
                <div>
                <span class="amout posts fw-bold">{{ $customer->post_count }}</span> posts
                </div>
                <span class="time"> {{ $customer->createdAt }} </span>
            </div>
        </div>
        @endforeach
    </div>
</div>
@elseif(!is_null($resultQuestion))
@foreach($resultQuestion as $question)
    <div class="items-savedList d-flex mb-3 border-bottom py-2">
        <div class="answer">
            <div class="d-flex flex-column align-items-center w-100 border p-2 rounded bg-success text-white">
                <div class="">{{ $question['answer_count'] }} </div>
                <span>answers</span>
            </div>
        </div>
        <div class="ms-3  flex-grow-1">
            <a href="{{ route('questions.view', $question['id']) }}"><h5>{{ $question['title'] }}</h5></a>
            <div class="text-muted fs-6">
                {!! $question['body'] !!}
            </div>
            <span class="float-end">asked {{ $question['createdAtPost'] }} by <a href="">{{ $question['user']['name'] }}</a></span>
        </div>
    </div>
@endforeach
@elseif(!is_null($resultTag))
<div class="view--tags">
    <div class="row">
        @foreach($resultTag as $tag)
        <div class="col-2 p-3">
            <div class="shadow-sm border rounded" data-bs-toggle="collapse" href="#collapse-{{ $tag['id'] }}" role="button" aria-expanded="false">
                <div class="bg-light p-3">
                    <div class="w-100 d-flex flex-row align-items-center justify-content-center">
                        <span class="text-primary fw-bold me-3">{{  $tag['tag_name'] }}</span>
                    </div>
                </div>
                <div class="collapse" id="collapse-{{ $tag['id'] }}">
                    <div class="card card-body">
                        {!! $tag['description'] !!}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@else
<h5>{{ $resultEmpty }}</h5>
@endif
</div>
@endsection