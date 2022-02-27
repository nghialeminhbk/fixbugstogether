@extends("admin.layouts.admin_layout")
@section('title', "report manager")
@section('reportM-active', 'active')
@section('content-title', 'Reports manager')
@section('main-content')
<div class="row">
    <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger shadow">
        <div class="inner">
        <h3>{{ $total }}</h3>

        <p>Reports</p>
        </div>
        <div class="icon">
        <i class="nav-icon text-white fas fa-flag"></i>
        </div>
    </div>
    </div>
</div>
<div class="d-flex justify-content-between align-items-center  px-2">
    <h4>List reports</h4>
    {{ $reports->links() }}
</div>
<div class="bg-light">
    <table class="table px-3 shadow">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Content</th>
                <th scope="col">Post</th>
                <th scope="col">Send By</th>
                <th scope="col">Created at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $index => $report)
            <tr>
                <th scope="row">{{ $index + 1 }}</th>
                <td>{{ $report->content }}</td>
                <td><button value="{{ $report['post_id'] }}" questionId="{{ $report['questionId'] }}" customerId="{{ $report['customerId'] }}" type="button" class="btn-view btn-success rounded" style="width: 20px; height: 20px"></button></td>
                <td>{{ $report['sendBy'] }}</td>
                <td>2020-12-10 20:30</td>
                <td><button value="{{ $report['id'] }}" type="button" class="btn-skip bg-warning text-white rounded" width="50" height="50" >Skip <i class="fas fa-step-forward"></i></button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- modal view detail -->

<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title"></h5>
        <button type="button" class="btn btn-close"  aria-label="Close">X</button>
      </div>
      <div class="modal-body" id="modal-content">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn-close btn btn-secondary">Close</button>
        <button type="button" class="d-none btn btn-primary" id="btn-confirm">Yes</button>
        <button type="button" class="d-none btn btn-danger" id="btn-del">Del</button>
      </div>
    </div>
  </div>
</div>

<script>
    $('.btn-view').click(function(e){
        const id = $(this).attr("value");
        const questionId = $(this).attr("questionId");
        const customerId = $(this).attr("customerId");
        console.log(id);
        const url = "http://127.0.0.1:8000/posts/detail/" + id;
        console.log(url);
        $('#modal-title').html('View detail');
        $('#modal-content').html("loading...");
        $('#modal').modal('show');
        $.ajax({
            type: "GET",
            url: url,
            dataType: "html",
            success: function (response) {
                console.log("success");
                $('#modal-content').html(response);
                $('#btn-del').removeClass('d-none');
                $('#btn-del').attr('value', id);
                $('#btn-del').attr('questionId', questionId);
                $('#btn-del').attr('customerId', customerId);
            }
        });
    });

    $('.btn-close').click(function(e){
        $('#modal').modal('hide');
        $('#btn-confirm').addClass('d-none');
        $('#btn-del').addClass('d-none');
    });

    $('.btn-skip').click(function(e){
        const id = $(this).attr("value");
        $('#modal').modal('show');
        $('#btn-confirm').removeClass('d-none');
        $('#modal-title').html('Skip this report!');
        $('#modal-content').html("<span class='text-danger'>Are u sure with this action!</span>");
        $('#btn-confirm').attr('value', id);
    })

    $('#btn-confirm').click(function(e){
        const id = $(this).attr("value");
        console.log(id);
        const url = "http://127.0.0.1:8000/report/delete/" + id;
        $("#modal").modal('hide');
        $.ajax({
            type: "GET",
            url: url,
            dataType: "json",
            success: function (response) {
                toastr.success(response['message']);
            }
        });
    })

    $('#btn-del').click(function(){
        const id = $(this).attr("value");
        const questionId = $(this).attr("questionId");
        const customerId = $(this).attr("customerId");
        $('#btn-del').addClass('d-none');
        $("#modal").modal('hide');
        $.ajax({
            type: "GET",
            url: "http://127.0.0.1:8000/posts/delete/" + id,
            dataType: "json",
            success: function (response) {
                toastr.success(response['message']);
            }
        });

        $.ajax({
            type: "GET",
            url: "http://127.0.0.1:8000/report/delete/" + id,
            dataType: "json",
            success: function (response) {
                toastr.success(response['message']);
            }
        });

        $.ajax({
           type: "POST",
           url: "{{ route('notifications.create') }}",
           data: {
            "_token": "{{ csrf_token() }}", 
            "content": "đã xóa bài viết của bạn trong chủ đề",
            "customerId": customerId,
            "senderId": {{ auth()->user()->id }},
            "questionId": questionId
           },
           dataType: "json",
           success: function (response) {
               console.log("create notification!");
           }
       });
    })
</script>
@endsection