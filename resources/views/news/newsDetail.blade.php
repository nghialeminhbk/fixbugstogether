@extends('layouts.home-navbar')
@section('title', $data['new']['title'].' -')
@section($data['type'], 'bg-light fw-bold text-decoration-underline')
@section('sub_content')
<div class="p-3">
   <h3 class="">
       {{ $data['new']['title'] }}
   </h3>
   <div class="">
       Created: {{ $data['new']['created_at'] }}
   </div>
   <div class="mt-4">
       {!! $data['new']['content'] !!}
   </div>
</div>
@endsection