@extends('layouts.home-header')
@section('content')
<div class="container pt-3 pb-5">
<h3>Result of search</h3>
@if(!is_null($resultUser))
<div class="list-users">
    <div class="row">
        @foreach($resultUser as $customer)
        <div class="col-3 d-flex align-items-center">
            <img src="{{ asset($customer->image) }}" alt="" style="width: 90px; height: 90px" class="img-fluid img-thumbnail rounded">
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
@else
<h5>{{ $resultEmpty }}</h5>
@endif
</div>
@endsection