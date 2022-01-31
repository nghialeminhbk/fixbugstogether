@extends("admin.layouts.admin_layout")
@section('title', "news manager")
@section('newsM-active', 'active')
@section('content-title', 'News manager')
@section('main-content')
<div class="bg-light mb-3">
    <div class="row">
        <div class="col-8">
            <div class="border p-3 bg-white shadow-sm">
            <form action="{{ route('admin.news-manager.store', $new['id']) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Title
                        <div class="form-text fw-light text-dark">Be specific and imagine you’re asking a question to another person</div>
                    </label>
                    <input id="title" value="{{ $new['title'] }}" name="title" class="form-control @error('title') is-invalid @enderror" id="" aria-describedby="emailHelp" placeholder="e.g. Is there an R function for finding the index of an element in a vector?"">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Type
                        <div class="form-text fw-light text-dark">Select one of type post</div>
                    </label>
                    <select name="type" value="{{ $new['type'] }}" class="form-select form-control" aria-label="Default select example">
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
                        {!! $new['content'] !!}
                    </textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save news</button>
            </form>
            </div>
        </div>
        <div class="col-4">
            <div class="p-3 shadow-sm bg-white border">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur, quidem voluptates autem ducimus doloremque quasi corporis facilis voluptatem? Rerum illum omnis sed quidem cupiditate est quas blanditiis. Eos, facere asperiores! Rerum dolorum dolores fugiat? Vitae pariatur delectus vel rem veritatis, sunt minus unde. Ullam odit quisquam voluptatum minus modi tenetur maiores fugit alias. Possimus molestiae aliquam quos exercitationem. Modi aut, optio odio voluptates quo commodi corrupti ut asperiores repellat eum iure placeat laborum animi praesentium unde quibusdam illum odit voluptas dolorum minima vitae quidem nesciunt blanditiis! Ipsum animi accusamus libero? Provident enim voluptate facilis doloremque odit eveniet quam, vel ratione.
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