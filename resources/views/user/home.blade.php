@extends('layouts.home-navbar')
@section('home', 'bg-light')
@section('sub_content')

<div class="row">
    <div class="col-9">
        <div class="border-bottom pb-3">
            <div class="d-flex flex-row">
                <h1 class="flex-grow-1">Top Questions </h1>
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
        @for($i=1; $i<10; $i++)
        <div class="d-flex flex-row border-bottom">
            <div class="text-center px-3 d-flex flex-column justify-content-center">
                <div class="">-1</div>
                <span>votes</span>
            </div>
            <div class="text-center px-3 d-flex flex-column justify-content-center">
                <div class="">0</div>
                <span>answers</span>
            </div>
            <div class="text-center px-3 d-flex flex-column justify-content-center">
                <div class="">11</div>
                <span>views</span>
            </div>
            <div class="flex-grow-1 p-3 d-flex flex-column justify-content-center">
                <h4><a href="{{ route('questions.view') }}" class="text-primary">Adding content using nth-child</a></h4>
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <a href="" class="bg-light p-2">html</a>
                        <a href="" class="bg-light p-2">java</a>
                    </div>
                    <div class="d-flex flex-row">
                        <div class="me-2">modified 56 secs ago</div> 
                        <div>nghiatitan</div>
                    </div>
                </div>
            </div>
        </div>
        @endfor
    </div>
    <div class="col-3">
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat blanditiis minima doloribus voluptatum numquam labore in, quaerat excepturi ab asperiores animi sint est magni modi cum rerum quidem reprehenderit nesciunt corrupti eius porro atque quos eos sit. Impedit soluta voluptates mollitia quaerat blanditiis molestias porro. In accusantium tempora quo ipsa ea fugiat ab suscipit sequi, quos debitis officia commodi atque repellendus non aut cumque labore harum est esse quibusdam quidem? Facere nemo magnam aspernatur nihil ea. Non, natus recusandae corporis et eaque consequuntur ipsum eum libero eligendi, aut fugiat beatae ratione quae aliquam temporibus amet! Eos adipisci doloribus perferendis qui!
    </div>
</div>
@endsection