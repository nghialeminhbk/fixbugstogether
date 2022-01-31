@if($data['type']=='question')
<h5>{{ $data['content']['title'] }}</h5>
<div class="d-flex align-items-center mb-3">
    <div class="border rounded px-2 me-3 bg-info">
        <i class="fas fa-user-check"></i> <span class="fw-bold">{{ $data['user'] }}</span>
    </div>
    <div class="">
        Date: <span>{{ $data['created_at'] }}</span>
    </div>
</div>
<div class="content">
    {!! $data['content']['body'] !!}
</div>
<a href="{{ route('questions.view', $data['id']) }}" class="">>> Wiew original post here!</a>
@else
<div class="d-flex align-items-center mb-3">
    <div class="border rounded px-2 me-3 bg-info">
        <i class="fas fa-user-check"></i> <span class="fw-bold">{{ $data['user'] }}</span>
    </div>
    <div class="">
        Date: <span>{{ $data['created_at'] }}</span>
    </div>
</div>
<div class="content">
    {!! $data['content']['content'] !!}
</div>
<a href="{{ route('questions.view', $data['content']['question_id']) }}" class="">>> Wiew original post here!</a>
@endif