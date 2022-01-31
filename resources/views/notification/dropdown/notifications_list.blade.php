@if(count($notifications) == 0)
<li class="dropdown-item">No new notifications....................................................................</li>
@else
@foreach($notifications as $notification)
    <li class="dropdown-item btn-notification" value="{{ $notification->id }}">
        <a href="{{ route('questions.view', $notification->question_id) }}">
            <div class="">
                <span class="fw-bold">{{ $notification->sender }}</span> {{ $notification->content }} <span class="text-primary fw-bold">{{ $notification->question }}</span>
            </div>
            <div class="d-flex justify-content-end text-muted">
                {{ $notification->createdAt }}
            </div>
        </a>
    <li>
@endforeach
@endif
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
</script>