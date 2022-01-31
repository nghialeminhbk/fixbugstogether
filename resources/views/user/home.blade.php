@extends('layouts.home-navbar')
@section('home', 'fw-bold bg-light')
@section('sub_content')

<div class="row">
    <div class="col-9">
        <div class="border-bottom pb-3">
            <div class="d-flex flex-row">
                <h2 class="flex-grow-1">Top Questions </h2>
                <div class="flex-grow-0"><a class="btn btn-primary" href={{ route('questions.ask') }} >Ask Question</a></div>
            </div>
            <div class="d-flex flex-row justify-content-end">
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <a class="btn btn-secondary">Interesting</a>
                    <a class="btn btn-outline-secondary">Bountied</a>
                    <a class="btn btn-outline-secondary">Hot</a>
                    <a class="btn btn-outline-secondary">Week</a>
                    <a class="btn btn-outline-secondary">Month</a>
                </div>
            </div>
        </div>
        @foreach($questions as $question)
        <div class="d-flex flex-row border-bottom py-3">
            <div class="text-center px-3 d-flex flex-column justify-content-center">
                <div class="">-1</div>
                <span>votes</span>
            </div>
            <div class="text-center px-3 d-flex flex-column justify-content-center border border-success rounded">
                <div class="">0</div>
                <span>answers</span>
            </div>
            <div class="text-center px-3 d-flex flex-column justify-content-center">
                <div class="">11</div>
                <span>views</span>
            </div>
            <div class="flex-grow-1 p-3 d-flex flex-column justify-content-center">
                <h4 class="mb-3"><a href="{{ route('questions.view', $question['id']) }}" class="text-primary">{{ $question['title'] }}</a></h4>
                <div class="d-flex">
                    <div class="flex-grow-1">
                        @foreach($question['tags'] as $tag)
                        <a href="" class="bg-warning rounded p-2 me-2">{{ $tag['tag_name'] }}</a>
                        @endforeach
                    </div>
                    <div class="d-flex flex-row">
                        <div class="me-2">asked <span>{{ $question['timeAsked'] }}</span></div> 
                        <div>{{ $question['userAsked'] }}</div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="col-3">
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat blanditiis minima doloribus voluptatum numquam labore in, quaerat excepturi ab asperiores animi sint est magni modi cum rerum quidem reprehenderit nesciunt corrupti eius porro atque quos eos sit. Impedit soluta voluptates mollitia quaerat blanditiis molestias porro. In accusantium tempora quo ipsa ea fugiat ab suscipit sequi, quos debitis officia commodi atque repellendus non aut cumque labore harum est esse quibusdam quidem? Facere nemo magnam aspernatur nihil ea. Non, natus recusandae corporis et eaque consequuntur ipsum eum libero eligendi, aut fugiat beatae ratione quae aliquam temporibus amet! Eos adipisci doloribus perferendis qui!
    </div>
</div>
@endsection