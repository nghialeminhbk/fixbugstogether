@extends("admin.layouts.admin_layout")
@section('title', "news manager")
@section('newsM-active', 'active')
@section('content-title', 'News manager')
@section('main-content')
<div class="card">
    <div class="card-body">
        <h5>{{ $new['title'] }}</h5>
        <span class="text-muted">Date: {{ $new['created_at'] }}</span>
        <div class="card-text">
            {!! $new['content'] !!}
        </div>
        <div class="d-flex justify-content-end">
            <span class="text-muted px-2">Update: {{ $new['updated_at'] }}</span>
            <a href="{{ route('admin.news-manager.edit', 1) }}" class="px-2">Edit</a>
            <a href="#" class="text-danger px-2">Delete</a>
        </div>
    </div>
</div>
@endsection