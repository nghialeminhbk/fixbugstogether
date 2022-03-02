@extends("admin.layouts.admin_layout")
@section('title', "dashboard")
@section('dashboard-active', 'active')
@section('content-title', 'Dashboard')
@section('main-content')
<div class="container-fluid">
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
        <h3>{{ $total['user'] }}</h3>

        <p>Users</p>
        </div>
        <div class="icon">
        <i class="nav-icon fas fa-users"></i>
        </div>
        <a href="{{ route('admin.users-manager') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
        <div class="inner">
        <h3>{{ $total['post'] }}</h3>

        <p>Posts</p>
        </div>
        <div class="icon">
        <i class="nav-icon far fa-file-word"></i>
        </div>
        <a href="{{ route('admin.posts-manager') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
        <div class="inner">
        <h3>{{ $total['tag'] }}</h3>

        <p>Tags</p>
        </div>
        <div class="icon">
        <i class="nav-icon fas fa-tags"></i>
        </div>
        <a href="{{ route('admin.tags-manager') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
        <div class="inner">
        <h3>{{ $total['report'] }}</h3>

        <p>Reports</p>
        </div>
        <div class="icon">
        <i class="nav-icon fas fa-flag-checkered"></i>
        </div>
        <a href="{{ route('admin.reports-manager') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <!-- /.Left col -->
    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    <!-- right col -->
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
@endsection