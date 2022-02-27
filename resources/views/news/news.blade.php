@extends('layouts.home-navbar')
@section('title', 'news '.$data['type'].' -')
@section($data['type'], 'bg-light fw-bold text-decoration-underline')
@section('sub_content')
<div class="p-3">
    <h3>[{{ ucfirst($data['type']) }}]</h3>
    @foreach($data['news'] as $new)
    <div class="card mb-3 mt-3">
        <div class="card-header">
            <a href="{{ route('news.detail', ['type' => $data['type'], 'id' => $new['id']]) }}" class="fw-bold text-decoration-none">{{ $new['title'] }}</a>
        </div>
        <div class="card-body">
            {!! $new['content'] !!}
        </div>
        <div class="card-footer bg-body d-flex justify-content-end">
            created: {{ $new['created_at'] }}
        </div>
    </div>
    @endforeach
</div>
@endsection