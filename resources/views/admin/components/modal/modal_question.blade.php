<h5>{{ $question['title'] }}</h5>
<div class="d-flex align-items-center mb-3">
    <div class="border rounded px-2 me-3 bg-info">
        <i class="fas fa-user-check"></i> <span class="fw-bold">{{ $question['user'] }}</span>
    </div>
    <div class="">
        Date: <span>{{ $question['createdAt'] }}</span>
    </div>
</div>
<div class="content">
    {!! $question['body'] !!}
</div>