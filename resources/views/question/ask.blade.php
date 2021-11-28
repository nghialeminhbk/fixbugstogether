@extends('layouts.home-header')

@section('title', 'Ask Question - ') 


@section('content')
<div class="container bg-light">
    <div class="py-4">
        <h1>Ask a public question</h1>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="border p-3 bg-white shadow-sm">
            <form>
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Title
                        <div class="form-text fw-light text-dark">Be specific and imagine you’re asking a question to another person</div>
                    </label>
                    <input class="form-control" id="" aria-describedby="emailHelp" placeholder="e.g. Is there an R function for finding the index of an element in a vector?"">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Body
                        <div class="form-text fw-light text-dark">Include all the information someone would need to answer your question</div>
                    </label>
                    <div id="editor"></div>

                    </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Tags
                        <div class="form-text fw-light text-dark">Add up to 5 tags to describe what your question is about</div>
                    </label>
                    <input class="form-control" id="" aria-describedby="emailHelp" placeholder="e.g. (typescript laravel jquery)">
                </div>
                <button type="submit" class="btn btn-primary">Post your question</button>
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