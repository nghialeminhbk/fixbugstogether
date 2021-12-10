@extends('layouts.home-navbar')
@section('title', 'Saved List -')
@section('questions', 'bg-light fw-bold')
@section('sub_content')
<div class="">
    <h3>Saved List</h3>
</div>
@if($savedList->count()>0)
@foreach($savedList as $question)
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
        <div class="ms-3"><i class="btn-remove text-danger fs-3 far fa-trash-alt" value="{{ $question['id'] }}"></i></div>
    </div>
@endforeach
@else
<h5 class="text-muted"> List is empty !</h3>
@endif
<script>
    $('.btn-remove').click(function(e){
        var questionId = $(this).attr("value");
        var index = $('.btn-remove').index(this);
        $('.items-savedList')[index].remove();
        $.ajax({
            type: "GET",
            url: "{{ route('savedList.delete') }}",
            data: {
                "_token": "{{ csrf_token() }}", 
                "questionId": questionId, 
                "customerId": "{{ Auth::id() }}" 
            },
            dataType: "json",
            success: function (response) {
                toastr.success(response['message']);
            }
        });
    })
</script>
@endsection