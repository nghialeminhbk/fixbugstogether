@extends("admin.layouts.admin_layout")
@section('title', "user manager")
@section('userM-active', 'active')
@section('content-title', 'Users manager')
@section('main-content')
<div class="row">
    <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
        <h3>{{ $total }}</h3>

        <p>Total users</p>
        </div>
        <div class="icon">
        <i class="nav-icon fas fa-users"></i>
        </div>
    </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
        <div class="inner">
        <h3>{{ $newest['name'] }}</h3>

        <p>Last registered user</p>
        </div>
        <div class="icon">
        <i class="ion ion-person-add"></i>
        </div>
    </div>
    </div>
    <!-- ./col -->
</div>

<div class="d-flex justify-content-between align-items-center  px-2">
    <h4>List users</h4>
    {{ $users->links() }}
</div>
<div class="bg-light">
    <table class="table px-3 shadow">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th></th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $index => $user)
            <tr>
                <th scope="row">{{ $index + 1 }}</th>
                <td><button value="{{ $user['id'] }}"  type="button" class="btn-view btn-success rounded" style="width: 20px; height: 20px"></button></td>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['email'] }}</td>
                <td>{{ $user['created_at'] }}</td>
                <td><button value="{{ $user['id'] }}" type="button" class="btn-del bg-danger text-white rounded" width="50" height="50" >Del</button></td>

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
        <button type="button" class="btn btn-primary" id="btn-confirm">Yes</button>
      </div>
    </div>
  </div>
</div>

<script>
    $('.btn-view').click(function(e){
        const id = $(this).attr("value");
        console.log(id);
        const url = "http://127.0.0.1:8000/users/detail/" + id;
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
            }
        });
    });

    $('.btn-close').click(function(e){
        $('#modal').modal('hide');
    });

    $('.btn-del').click(function(e){
        const id = $(this).attr("value");
        $('#modal').modal('show');
        $('#modal-title').html('Delete user');
        $('#modal-content').html("<span class='text-danger'>Are u sure with this action!</span>");
        $('#btn-confirm').attr('value', id);
    })

    $('#btn-confirm').click(function(e){
        const id = $(this).attr("value");
        console.log(id);
        const url = "http://127.0.0.1:8000/users/delete/" + id;
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

</script>
@endsection