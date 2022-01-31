@extends("admin.layouts.admin_layout")
@section('title', "tag manager")
@section('tagM-active', 'active')
@section('content-title', 'Tags manager')
@section('main-content')
<div class="row">
    <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
        <div class="inner">
        <h3>{{ $totalTag }}</h3>

        <p>Tags</p>
        </div>
        <div class="icon">
        <i class="nav-ion fas fa-tags"></i>
        </div>
    </div>
    </div>
    <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
        <div class="inner">
        <h3>{{ $mostUsedTags[0]['name'] }}</h3>

        <p>Most used tag</p>
        </div>
        <div class="icon">
        <i class="nav-ion fas fa-tag"></i>
        </div>
    </div>
    </div>
</div>
<hr class="mb-3">
<div class="mb-5">
    <h5 class="mb-3">Top <span class="fw-bold text-primary fs-3">10</span> most used tags</h5>
    <div class="row overflow-auto">
        @foreach($mostUsedTags as $tag)
            <div class="col-1 d-flex justify-content-center">
                <div class="bg-info p-2 rounded shadow d-flex flex-column align-items-center w-100">
                    <span class="tag-name">{{ $tag['name'] }}</span> 
                    <div class="bg-warning p-1 w-100 text-center rounded tag-count">{{ $tag['total'] }}</div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<hr class="mb-5">
<div class="mb-5 d-flex justify-content-center">
    <canvas id="pieChart" style="max-width: 500px; max-height: 500px"></canvas>
</div>
<hr class="mb-3">
<div class="bg-light">
    <table class="table px-3 shadow">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col"></th>
                <th scope="col">Tag name</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="table-content" >
            <tr>
                <th>loading...</th>
            </tr>
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
        <button type="button" class="d-none btn btn-primary" id="btn-save">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
<script>

    const labels = [], data = []; 
    var tagName = document.getElementsByClassName('tag-name');
    for(var i=0; i<tagName.length; i++){
        labels.push(tagName[i].innerText);
    }
    var tagCount = document.getElementsByClassName('tag-count');
    for(var i=0; i<tagCount.length; i++){
        data.push(tagCount[i].innerText);
    }

    var ctxP = document.getElementById("pieChart").getContext('2d');
    var myPieChart = new Chart(ctxP, {
      type: 'pie',
      data: {
        labels: labels,
        datasets: [{
          data: data,
          backgroundColor: ["#46BFBD", "#FDB45C", "#ff6600", "#3333cc", "#669900"],
          hoverBackgroundColor: ["#5AD3D1", "#FFC870", "#ff9933", "#3366ff", "#99ff33"]
        }]
      },
      options: {
        responsive: true
      }
    });

    $('.btn-close').click(function(e){
        $('#modal').modal('hide');
        $('#btn-confirm').addClass('d-none');
        $('#btn-save').addClass('d-none');
    });

    $('#btn-confirm').click(function(e){
        const id = $(this).attr("value");
        console.log(id);
        const url = "http://127.0.0.1:8000/tags/delete/" + id;
        $('#btn-confirm').addClass('d-none');
        $("#modal").modal('hide');
        $.ajax({
            type: "GET",
            url: url,
            dataType: "json",
            success: function (response) {
                toastr.success(response['message']);
            }
        });

        $.ajax({
            type: "GET",
            url: "{{ route('tags.list') }}",
            dataType: "html",
            success: function (response) {
                $("#table-content").html(response);
            }
        });
    })

    $(window).on('load', function(){
        $.ajax({
            type: "GET",
            url: "{{ route('tags.list') }}",
            dataType: "html",
            success: function (response) {
                $("#table-content").html(response);
            }
        });
    });

    $('#btn-save').click(function(){
        const description = document.getElementById('description').value;
        const id = $(this).attr("value");
        console.log(id);
        const url = "http://127.0.0.1:8000/tags/update/" + id;
        $('#btn-save').addClass('d-none');
        $("#modal").modal('hide');
        $.ajax({
            type: "GET",
            url: url,
            data: {
                "description": description
            },
            dataType: "json",
            success: function (response) {
                toastr.success(response['message']);
            }
        });

        $.ajax({
            type: "GET",
            url: "{{ route('tags.list') }}",
            dataType: "html",
            success: function (response) {
                $("#table-content").html(response);
            }
        });
    })
</script>
@endsection

<!-- Java is a programming language and computing platform first released by Sun Microsystems in 1995. It has evolved from humble beginnings to power a large share of today’s digital world, by providing the reliable platform upon which many services and applications are built. New, innovative products and digital services designed for the future continue to rely on Java, as well. -->