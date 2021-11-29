@extends('layouts.home-navbar')
@section('title', 'Edit Profile -')
@section('users', 'bg-light')
@section('sub_content')
<div class="container bg-light">
    <div class="py-2">
        <h3>Edit your profile</h3>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="border p-3 bg-white shadow-sm">
            <form action="{{ route('users.update', 2) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Profile image
                        <div class="form-text fw-light text-dark">Change your image</div>
                    </label>
                    <div class="mb-2">
                        <img src="https://i.stack.imgur.com/QgEPq.png?s=328&g=1" width="164" height="164" alt="avata">
                    </div>
                    <input name="avt" class="form-control" type="file" id="formFile">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Dipsplay name
                    </label>
                    <input name="displayName" class="form-control" id="" aria-describedby="emailHelp" placeholder="">
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Location
                    </label>
                    <input name="location" class="form-control" id="" aria-describedby="emailHelp" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Title
                    </label>
                    <input name="title" class="form-control" id="" aria-describedby="emailHelp" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">About me
                    </label>
                    <textarea id="editor" name="aboutMe" row="10" col="80">
                        about me ...
                    </textarea>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Link github
                    </label>
                    <input name="githubLink" class="form-control" id="" aria-describedby="emailHelp" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Link website
                    </label>
                    <input name="websiteLink" class="form-control" id="" aria-describedby="emailHelp" placeholder="">
                </div>
                <button type="submit" class="btn btn-primary">Save profile</button>
            </form>
            </div>
        </div>
        <div class="col-4">
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