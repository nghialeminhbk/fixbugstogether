@extends('layouts.home-header')

@section('title', 'Ask Question - ') 


@section('content')
<div class="container bg-light mb-3">
    <div class="py-4">
        <h1>Ask a public question</h1>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="border p-3 bg-white shadow-sm">
            <form action="{{ route('questions.post') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Title
                        <div class="form-text fw-light text-dark">Be specific and imagine you’re asking a question to another person</div>
                    </label>
                    <input id="title" value="{{ old('title') }}" name="title" class="form-control @error('title') is-invalid @enderror" id="" aria-describedby="emailHelp" placeholder="e.g. Is there an R function for finding the index of an element in a vector?"">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div id="similarQuestions">

                </div>
                <div class="my-3">
                    <label for="" class="form-label fw-bold">Body
                        <div class="form-text fw-light text-dark">Include all the information someone would need to answer your question</div>
                    </label>
                    <textarea class="@error('body') is-invalid @enderror" id="editor" name="body" rows="10" cols="50">
                        {!! old('body') !!}
                    </textarea>
                    @error('body')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Tags
                        <div class="form-text fw-light text-dark">Add up to 5 tags to describe what your question is about</div>
                    </label>
                    <input id="tags" value="{{ old('tags') }}" name="tags" class="form-control @error('tags') is-invalid @enderror" id="" aria-describedby="emailHelp" placeholder="e.g. (typescript laravel jquery)">
                    @error('tags')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="d-flex mt-2" id="suggestTag">
                        
                    </div>
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
        .create( document.querySelector( '#editor' ))
        .catch( error => {
            console.error( error );
        } );

    $('#title').keyup(function (e) { 
        var string = e.target.value;
        console.log(string);
        var url = "{{ route('questions.suggest') }}";
        setTimeout(() => {
            $.ajax({
                type: "GET",
                url: url,
                data: {string: string},
                dataType: "html",
                success: function (response) {
                    if(string != ""){
                        $('#similarQuestions').html(response);
                    }else{
                        $('#similarQuestions').html("");
                    }
            }
        });
        }, 100);
    });

    $('#tags').keyup(function (e) { 
        var string = e.target.value;
        var url = "{{ route('tags.suggest') }}";
        setTimeout(() => {
            $.ajax({
                type: "GET",
                url: url,
                data: {string: string},
                dataType: "html",
                success: function (response) {
                    if(string != ""){
                        $('#suggestTag').html(response);
                    }else{
                        $('#suggestTag').html("");
                    }
            }
        });
        }, 100);
    });
    
</script>
@endsection