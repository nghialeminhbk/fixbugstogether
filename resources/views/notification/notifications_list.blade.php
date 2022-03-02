@extends('layouts.home-header')

@section('title', 'All Notifications - ') 
@section('content')
<div class="container py-3">
<div class="d-flex justify-content-between align-items-center">
    <h3 class="mb-3">List notifications</h3>
    <a href="" class="text-danger" class="btn-del">Delete all notifications!</a>
</div>
@if(count($notifications) == 0)
<h3 class="text-danger"><i class="far fa-times-circle"></i> No notifications...</h3>
@else
@foreach($notifications as $notification)
    <div class="card btn-notification mb-3" value="{{ $notification->id }}">
        <div class="card-body">
            <div class="card-text">
                <a href="{{ route('questions.view', $notification->question_id) }}">
                    <div class="">
                        <span class="fw-bold">{{ $notification->sender }}</span> {{ $notification->content }} <span class="text-primary fw-bold">{{ $notification->question }}</span>
                    </div>
                    <div class="d-flex justify-content-end text-muted">
                        {{ $notification->createdAt }}
                    </div>
                </a>
            </div>
        </div>
    </div>
@endforeach
@endif
</div>
<script>
    $(".btn-notification").click(function(){
        const id = $(this).attr("value");
        const url = "http://127.0.0.1:8000/notifications/read/" + id;
        $.ajax({
            type: "GET",
            url: url,
            dataType: "json",
            success: function (response) {
                console.log(response['message']);
            }
        });
    })
    $(".btn-del").click(function(){
        $.ajax({
            type: "GET",
            url: "/notifications/delete/{{ $userId }}",
            dataType: "json",
            success: function (response) {
                toastr.success(response['message']);
            }
        });
    })
</script>
@endsection