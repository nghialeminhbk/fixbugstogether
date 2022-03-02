@extends("admin.layouts.admin_layout")
@section('title', "news manager")
@section('newsM-active', 'active')
@section('content-title', 'News manager')
@section('main-content')
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item d-flex align-items-center" role="presentation">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="nav-ion fas fa-toolbox"></i> Admin</a>
  </li>
  <li class="nav-item d-flex align-items-center" role="presentation">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="nav-ion fas fa-user-md"></i> Job</a>
  </li>
  <li class="nav-item d-flex align-items-center" role="presentation">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><i class="nav-ion fas fa-microchip"></i> Technology</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#post-new" role="tab" aria-controls="contact" aria-selected="false">
        <div class="bg-info p-2 rounded shadow">
            <i class="fas fa-paper-plane"></i> Post news
        </div>
    </a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    @foreach($admin as $new)
    <div class="card ">
        <div class="card-body">
            <div class="card-title">
                {{ $new['title'] }}
            </div>
            <div class="card-text">
                {!! $new['content'] !!}        
            </div>
            <div class="d-flex justify-content-end">
                <span class="text-muted px-2">Update: {{ $new['updated_at'] }}</span>
                <a href="{{ route('admin.news-manager.view', $new['id']) }}" class="px-2">View</a>
                <a href="{{ route('admin.news-manager.edit', $new['id']) }}" class="px-2">Edit</a>
                <a href="{{ route('admin.news-manager.delete', $new['id']) }}" class="text-danger px-2">Delete</a>
            </div>
        </div>
    </div>
    @endforeach
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    @foreach($job as $new)
        <div class="card ">
            <div class="card-body">
                <div class="card-title">
                    {{ $new['title'] }}
                </div>
                <div class="card-text">
                    {!! $new['content'] !!}        
                </div>
                <div class="d-flex justify-content-end">
                    <span class="text-muted px-2">Update: {{ $new['updated_at'] }}</span>
                    <a href="{{ route('admin.news-manager.view', $new['id']) }}" class="px-2">View</a>
                    <a href="{{ route('admin.news-manager.edit', $new['id']) }}" class="px-2">Edit</a>
                    <a href="{{ route('admin.news-manager.delete', $new['id']) }}" class="text-danger px-2">Delete</a>
                </div>
            </div>
        </div>
    @endforeach
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    @foreach($technology as $new)
        <div class="card ">
            <div class="card-body">
                <div class="card-title">
                    {{ $new['title'] }}
                </div>
                <div class="card-text">
                    {!! $new['content'] !!}        
                </div>
                <div class="d-flex justify-content-end">
                    <span class="text-muted px-2">Update: {{ $new['updated_at'] }}</span>
                    <a href="{{ route('admin.news-manager.view', $new['id']) }}" class="px-2">View</a>
                    <a href="{{ route('admin.news-manager.edit', $new['id']) }}" class="px-2">Edit</a>
                    <a href="{{ route('admin.news-manager.delete', $new['id']) }}" class="text-danger px-2">Delete</a>
                </div>
            </div>
        </div>
    @endforeach
  </div>
  <div class="tab-pane fade" id="post-new" role="tabpanel" aria-labelledby="contact-tab">
    <div class="bg-light mb-3">
        <div class="row">
            <div class="col-8">
                <div class="border p-3 bg-white shadow-sm">
                <form actions="{{ route('admin.news-manager.post') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Title
                            <div class="form-text fw-light text-dark">Be specific and imagine you’re asking a question to another person</div>
                        </label>
                        <input id="title" name="title" class="form-control @error('title') is-invalid @enderror" aria-describedby="emailHelp" placeholder="e.g. Is there an R function for finding the index of an element in a vector?"">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Type
                            <div class="form-text fw-light text-dark">Select one of type post</div>
                        </label>
                        <select name="type" class="form-select form-control" aria-label="Default select example">
                            <option value="admin">Admin</option>
                            <option value="job">Job</option>
                            <option value="technology">Technology</option>
                        </select>
                    </div>
                    <div class="my-3">
                        <label for="" class="form-label">Body
                            <div class="form-text fw-light text-dark">Include all the information someone would need to answer your question</div>
                        </label>
                        <textarea name="content" class="@error('body') is-invalid @enderror" id="editor" name="body" rows="10" cols="50">
                            
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Post news</button>
                </form>
                </div>
            </div>
            <div class="col-4">
                <div class="p-3 shadow-sm bg-white border">
                Follow these rules for a quality news
                    <ul>
                        <li>Fill in the fields completely</li>
                        <li>Avoid posting duplicate news</li>
                        <li>Choose the exact type to post</li>
                        <li>The content of the new should not be less than 50 words</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection