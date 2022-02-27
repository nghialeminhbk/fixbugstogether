@extends('layouts.home-navbar')
@section('title', 'Tagss -')
@section('tags', 'bg-light fw-bold')
@section('sub_content')
<h3>List tags (<span class="text-primary fs-3">{{ $data['totalTags'] }}</span> tags)</h3>
<div class="view--tags">
    <div class="row">
        @foreach($data['tags'] as $tag)
        <div class="col-2 p-3">
            <div class="shadow-sm border rounded" data-bs-toggle="collapse" href="#collapse-{{ $tag['id'] }}" role="button" aria-expanded="false">
                <div class="bg-light p-3">
                    <div class="w-100 d-flex flex-row align-items-center justify-content-center">
                        <span class="text-primary fw-bold me-3">{{  $tag['tag_name'] }}</span>
                        <div class="text-center text-white px-2 bg-success rounded">
                            {{ $tag['question_tag_count'] }}
                        </div>
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
@endsection