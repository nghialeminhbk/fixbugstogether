@extends("admin.layouts.admin_layout")
@section('title', "post manager")
@section('postM-active', 'active')
@section('content-title', 'Posts manager')
@section('main-content')
<div class="row">
    <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
        <h3>{{ $total['post'] }}</h3>

        <p>Posts</p>
        </div>
        <div class="icon">
        <i class="nav-ion far fa-clipboard"></i>
        </div>
    </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
        <div class="inner">
        <h3 class="question">{{ $total['question'] }}</h3>

        <p>Questions</p>
        </div>
        <div class="icon">
        <i class="nav-ion fas fa-question"></i>
        </div>
    </div>
    </div>
    <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
        <div class="inner">
        <h3 class="answer">{{ $total['post'] - $total['question'] }}</h3>

        <p>Answers</p>
        </div>
        <div class="icon">
        <i class="nav-ion fas fa-voicemail"></i>
        </div>
    </div>
    </div>
    <!-- ./col -->
</div>
<hr class="mb-5">
<div class="mb-5 d-flex justify-content-center">
    <canvas id="pieChart" style="max-width: 500px; max-height: 500px"></canvas>
</div>
<hr class="mb-3">
<div class="mb-5">
    <h5 class="mb-3">Top <span class="fw-bold fs-3 text-primary">10</span> users has the most posts (both questions and answers)</h5>
    <div class="row ">
        @foreach($mostPost as $user)
            <div class="col-1 d-flex justify-content-center">
                <div class="bg-info p-2 rounded shadow d-flex flex-column align-items-center w-100">
                    <span class="tag-name">{{ $user->name }}</span> 
                    <div class="bg-warning p-1 w-100 text-center rounded tag-count">{{ $user->post_count }}</div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<hr class="mb-3">
<div class="mb-5">
    <h5 class="mb-3">Top <span class="fw-bold text-primary fs-3">10</span> best supporter (only answers)</h5>
    <div class="row">
        @foreach($bestSupport as $user)
            <div class="col-1 d-flex justify-content-center">
                <div class="bg-info p-2 rounded shadow d-flex flex-column align-items-center w-100">
                    <span class="tag-name">{{ $user->name }}</span> 
                    <div class="bg-warning p-1 w-100 text-center rounded tag-count">{{ $user->answerCount }}</div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<hr class="mb-3">
<div class="d-flex justify-content-between align-items-center  px-2">
    <h4>List questions</h4>
    {{ $questions->links() }}
</div>
<div class="bg-light">
    <table class="table px-3 shadow">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th></th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Created at</th>
                <th scope="col">Author</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($questions as $index => $question)
            <tr>
                <th scope="row">{{ $index + 1 }}</th>
                <td><button value="{{ $question['id'] }}"  type="button" class="btn-view btn-success rounded" style="width: 20px; height: 20px"></button></td>
                <td>{{ $question['title'] }}</td>
                <td>{{ $question['body'] }}</td>
                <td>{{ $question['createdAt'] }}</td>
                <td><span class="text-primary">{{ $question['author'] }}</span></td>
                <td><button value="{{ $question['id'] }}" type="button" class="btn-del bg-danger text-white rounded" width="50" height="50" >Del</button></td>
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

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
<script>
    var ctxP = document.getElementById("pieChart").getContext('2d');
    var question = document.getElementsByClassName('question')[0].textContent;
    var answer = document.getElementsByClassName('answer')[0].textContent;
    var myPieChart = new Chart(ctxP, {
      type: 'pie',
      data: {
        labels: ["Questions", "Answers"],
        datasets: [{
          data: [question, answer],
          backgroundColor: ["#46BFBD", "#FDB45C"],
          hoverBackgroundColor: ["#5AD3D1", "#FFC870"]
        }]
      },
      options: {
        responsive: true
      }
    });

    $('.btn-view').click(function(e){
        const id = $(this).attr("value");
        console.log(id);
        const url = "http://127.0.0.1:8000/questions/detail/" + id;
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
        const url = "http://127.0.0.1:8000/questions/delete/" + id;
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