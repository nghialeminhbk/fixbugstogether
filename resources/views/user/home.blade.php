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
        </div>
        @foreach($questions as $question)
        <div class="d-flex flex-row border-bottom py-3">
            <div class="text-center px-3 d-flex flex-column justify-content-center">
                <div class="">-1</div>
                <span>votes</span>
            </div>
            <div class="text-center px-3 d-flex flex-column justify-content-center border border-success rounded">
                <div class="">{{ $question['countAns'] }}</div>
                <span>answers</span>
            </div>
            <!-- <div class="text-center px-3 d-flex flex-column justify-content-center">
                <div class="">11</div>
                <span>views</span>
            </div> -->
            <div class="flex-grow-1 p-3 d-flex flex-column justify-content-center">
                <h4 class="mb-3"><a href="{{ route('questions.view', $question['id']) }}" class="text-primary">{{ $question['title'] }}</a></h4>
                <div class="d-flex">
                    <div class="flex-grow-1">
                        @foreach($question['tags'] as $tag)
                        <a href="" class="tag-color rounded px-2 me-2">{{ $tag['tag_name'] }}</a>
                        @endforeach
                    </div>
                    <div class="d-flex flex-row">
                        <div class="me-2">asked <span>{{ $question['timeAsked'] }}</span></div> 
                        <div class="text-primary"><a class="text-decoration-none" href="{{ route('users.view', $question['userAsked']['id']) }}">{{ $question['userAsked']['name'] }}</a></div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="col-3">
        <div class="rounded fs-5">
           <div class="card mb-3 shadow-box">
               <div class="card-header fw-bold text-center bg-info">
                Guideline
               </div>
               <div class="card-body bg-blue fs-6">
                    <ul>
                        <li>You can view the article by clicking on the corresponding article</li>
                        <li>You can create a new question</li>
                        <li>Latest announcements
                            <ol>
                                <li>Admin</li>
                                <li>Job</li>
                                <li>Technology</li>
                            </ol>
                        </li>
                    </ul>
               </div>
           </div>
           <div class="card shadow-box">
               <div class="card-header fw-bold text-center bg-info">
                New posts
               </div>
               <div class="card-body bg-blue fs-6">
                    <ol>
                        @for($i=0; $i<$top; $i++)
                        <a href="{{ route('questions.view', $question['id']) }}">
                            <li>
                                {{ $questions[$i]['title'] }}
                            </li>
                        </a>
                        @endfor
                    </ol>
               </div>
           </div>
        </div>
    </div>
</div>
@endsection