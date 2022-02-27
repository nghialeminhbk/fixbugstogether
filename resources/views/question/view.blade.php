@extends('layouts.home-navbar')
@section('title', 'Questions - ')
@section('questions', 'bg-light fw-bold')
@section('sub_content')
<div class="border-bottom pb-3">
    <div class="d-flex">
        <h3 class="flex-grow-1">{{ $question['title'] }}</h3>
        <a href="{{ route('questions.ask') }}" class="btn btn-primary">Ask Question</a>
    </div>
    <div class="d-flex">
        <div class="d-flex me-3">
            <span class="text-mute">Asked</span>
            <div class="ms-1">
                {{ $question['timeAsked'] }}
            </div>
        </div>
        <div class="d-flex">
            <span class="text-mute">Active</span>
            <div class="ms-1">
                today
            </div>
        </div>
    </div>
</div>
<div class="row p-3">
    <div class="col-9">
        <div class="d-flex border-bottom">
            <div class="d-flex flex-column align-items-center pe-2 fs-3">
            @if($question['checkVote']==0)
                <div class=""><i class="btn-up-vote fas fa-sort-up"></i></div>
                <div class="d-none"><i class="btn-remove-vote fas fa-sort-up text-orange"></i></div>
                <div class="d-none"><i class="btn-none-vote fas fa-sort-up text-secondary"></i></div>
                <div class="value-vote" value="{{ $question['id'] }}" >{{ $question['totalVote'] }}</div>
                <div class=""><i class="btn-down-vote fas fa-sort-down mb-3"></i></div>
                <div class="d-none"><i class="btn-remove-vote fas fa-sort-down text-orange mb-3"></i></div>
                <div class="d-none"><i class="btn-none-vote fas fa-sort-down text-secondary mb-3"></i></div>
            @elseif($question['checkVote']==1)
                <div class="d-none"><i class="btn-up-vote fas fa-sort-up"></i></div>
                <div class=""><i class="btn-remove-vote fas fa-sort-up text-orange"></i></div>
                <div class="d-none"><i class="btn-none-vote fas fa-sort-up text-secondary"></i></div>
                <div class="value-vote" value="{{ $question['id'] }}" >{{ $question['totalVote'] }}</div>
                <div class="d-none"><i class="btn-down-vote fas fa-sort-down mb-3" ></i></div>
                <div class="d-none"><i class="btn-remove-vote fas fa-sort-down text-orange mb-3"></i></div>
                <div class=""><i class="btn-none-vote fas fa-sort-down text-secondary mb-3"></i></div>
            @else
                <div class="d-none"><i class="btn-up-vote fas fa-sort-up"></i></div>
                <div class="d-none"><i class="btn-remove-vote fas fa-sort-up text-orange"></i></div>
                <div class=""><i class="btn-none-vote fas fa-sort-up text-secondary"></i></div>
                <div class="value-vote" value="{{ $question['id'] }}" >{{ $question['totalVote'] }}</div>
                <div class="d-none"><i class="btn-down-vote fas fa-sort-down mb-3"></i></div>
                <div class=""><i class="btn-remove-vote fas fa-sort-down text-orange mb-3"></i></div>
                <div class="d-none"><i class="btn-none-vote fas fa-sort-down text-secondary mb-3"></i></div>
            @endif
            @if($question['checkSavedList'])
                <div class="d-none" id="addSavedList"><i class="far fa-bookmark mb-3"></i></div>
                <div class="" id="removeSavedList"><i class="fas fa-bookmark text-secondary mb-3"></i></div>
            @else
                <div class="" id="addSavedList"><i class="far fa-bookmark mb-3"></i></div>
                <div class="d-none" id="removeSavedList"><i class="fas fa-bookmark text-secondary mb-3"></i></div>
            @endif
            @if($question['checkRp'])
                <div class="d-none"><i class="btn-up-report far fa-flag"></i></div>
                <div class=""><i class="btn-remove-report text-secondary fas fa-flag"></i></div>
            @else
                <div class=""><i class="btn-up-report far fa-flag"></i></div>
                <div class="d-none"><i class="btn-remove-report text-secondary fas fa-flag"></i></div>
            @endif
            </div>
            <div class="content-question flex-grow-1 d-flex flex-column px-2">
                <div class="mb-3">
                    {!! $question['body'] !!}
                </div>
                <div class="d-flex mb-5">
                    @foreach($question['tags'] as $tag)
                    <a class="py-1 px-2 me-3 tag-color rounded">{{ $tag->tag_name }}</a>
                    @endforeach
                </div>
                <div class="d-flex pb-3">
                    <div class="flex-grow-1">
                        <a href="" class="me-2">Share</a>
                        <a href="" class="me-2">Follow</a>
                    </div>
                    <div class="border shadow-sm rounded" style="width: 250px">
                        <div class="bg-blue p-2">
                            <div class="">
                                asked <span>{{ $user['timeAsked'] }}</span>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <img src="{{ asset($user['image']) }}" alt="" style="width:35px; height:35px" class="me-2">
                                <div class="">
                                    <a href="">{{ $user['name'] }}</a>
                                    <div class="count-ques">{{ $user['location'] }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-primary p-2 text-white">
                            <i class="fas fa-hand-sparkles"></i> New contributor
                        </div>
                    </div>
                </div>
                <div class="ps-3">
                @foreach($question['comments'] as $comment)
                <div class="d-flex align-items-center border-top py-2">
                    <img src="{{ asset($comment->user()->first()->customer()->image) }}" alt="" style="width:45px; height:45px" class="me-2 border border-2 border-white rounded-circle">
                    <div class="">
                        <div class="d-flex">
                            <a href="{{ route('users.view', $comment->customer_id) }}" class="me-2">{{ $comment->user()->first()->name }}</a>
                            <span class="text-muted fs-6">{{ $comment->created_at }}</span>
                        </div>
                        <div class="">{{ $comment->comment }}</div>
                    </div>
                </div>
                @endforeach
                </div>
                <div class="border-top py-3 ps-3">
                    <form action="{{ Route('comments.post', $question['id']) }}" method="POST">
                        @csrf
                        <input type="text" name="idCustomer" value="{{ Auth::id() }}" class="d-none">
                        <input type="text" class="form-control mb-2" name="comment" placeholder="Comment in here ...">
                        <button type="submit" class="text-primary float-end" >Add a comment</button>
                    </form>
                </div>
            </div>
        </div>  
        <div class="mt-3">
            <h3>Answers</h3>
        </div>
        @foreach($answers as $answer)
        <div class="d-flex border-bottom mt-3">
            <div class="d-flex flex-column align-items-center pe-2 fs-3">
            @if($answer['checkVote']==0)
                <div class=""><i class="btn-up-vote fas fa-sort-up"></i></div>
                <div class="d-none"><i class="btn-remove-vote fas fa-sort-up text-orange"></i></div>
                <div class="d-none"><i class="btn-none-vote fas fa-sort-up text-secondary"></i></div>
                <div class="value-vote" value="{{ $answer['id'] }}" >{{ $answer['totalVote'] }}</div>
                <div class=""><i class="btn-down-vote fas fa-sort-down mb-3"></i></div>
                <div class="d-none"><i class="btn-remove-vote fas fa-sort-down text-orange mb-3"></i></div>
                <div class="d-none"><i class="btn-none-vote fas fa-sort-down text-secondary mb-3"></i></div>
            @elseif($answer['checkVote']==1)
                <div class="d-none"><i class="btn-up-vote fas fa-sort-up"></i></div>
                <div class=""><i class="btn-remove-vote fas fa-sort-up text-orange"></i></div>
                <div class="d-none"><i class="btn-none-vote fas fa-sort-up text-secondary"></i></div>
                <div class="value-vote" value="{{ $answer['id'] }}" >{{ $answer['totalVote'] }}</div>
                <div class="d-none"><i class="btn-down-vote fas fa-sort-down mb-3"></i></div>
                <div class="d-none"><i class="btn-remove-vote fas fa-sort-down text-orange mb-3"></i></div>
                <div class=""><i class="btn-none-vote fas fa-sort-down text-secondary mb-3"></i></div>
            @else
                <div class="d-none"><i class="btn-up-vote fas fa-sort-up"></i></div>
                <div class="d-none"><i class="btn-remove-vote fas fa-sort-up text-orange"></i></div>
                <div class=""><i class="btn-none-vote fas fa-sort-up text-secondary"></i></div>
                <div class="value-vote" value="{{ $answer['id'] }}" >{{ $answer['totalVote'] }}</div>
                <div class="d-none"><i class="btn-down-vote fas fa-sort-down mb-3"></i></div>
                <div class=""><i class="btn-remove-vote fas fa-sort-down text-orange mb-3"></i></div>
                <div class="d-none"><i class="btn-none-vote fas fa-sort-down text-secondary mb-3"></i></div>
            @endif
            @if($answer['checkRp'])
                <div class="d-none"><i class="btn-up-report far fa-flag mb-3"></i></div>
                <div class=""><i class="btn-remove-report text-secondary fas fa-flag mb-3"></i></div>
            @else
                <div class=""><i class="btn-up-report far fa-flag"></i></div>
                <div class="d-none"><i class="btn-remove-report text-secondary fas fa-flag"></i></div>
            @endif
            </div>
            <div class="content-question flex-grow-1 d-flex flex-column px-2">
                <div class="mb-3">
                    {!! $answer['content'] !!}
                </div>
                <div class="d-flex pb-3">
                    <div class="flex-grow-1">
                        <a href="" class="me-2">Share</a>
                        <a href="" class="me-2">Follow</a>
                    </div>
                    <div class="border shadow-sm rounded" style="width: 250px">
                        <div class="bg-blue p-2">
                            <div class="">
                                answered <span>{{ $answer['timeAnswered'] }}</span>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <img src="{{ asset($answer['image']) }}" alt="" style="width:35px; height:35px" class="me-2">
                                <div class="">
                                    <a href="{{ route('users.view', $answer['userId']) }}">{{ $answer['answerUser'] }}</a>
                                    <div class="count-ques">{{ $answer['location'] }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-primary p-2 text-white">
                            <i class="fas fa-hand-sparkles"></i> New contributor
                        </div>
                    </div>
                </div>
                <div class="ps-3">
                @foreach($answer['comments'] as $comment)
                <div class="d-flex align-items-center border-top py-2">
                    <img src="{{ asset($comment->user()->first()->customer()->image) }}" alt="" style="width:45px; height:45px" class="me-2 border border-2 border-white rounded-circle">
                    <div class="">
                        <div class="d-flex">
                            <a href="{{ route('users.view', $comment->customer_id) }}" class="me-2">{{ $comment->user()->first()->name }}</a>
                            <span class="text-muted fs-6">{{ $comment->created_at }}</span>
                        </div>
                        <div class="">{{ $comment->comment }}</div>
                    </div>
                </div>
                @endforeach
                </div>
                <div class="border-top py-3 ps-3">
                    <form action="{{ Route('comments.post', $answer['id']) }}" method="POST">
                        @csrf
                        <input type="text" name="idCustomer" value="{{ Auth::id() }}" class="d-none">
                        <input type="text" class="form-control mb-2" name="comment" placeholder="Comment in here ...">
                        <button type="submit" class="text-primary float-end" >Add a comment</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach             
        <div class="py-3">
            <form action="{{ route('answers.post', $question['id']) }}" method="POST">
            @csrf    
            <div class="mb-3">
                    <label for="" class="form-label fs-4">Your Answer
                    </label>
                    <textarea class="@error('content') is-invalid @enderror" id="editor" name="content" row="60" col="80">
                    </textarea>
                    @error('content')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                <button type="submit" class="btn btn-primary mt-3" id="post-answer">Post your question</button>
            </form>
        </div>
    </div>
    </div>
    <div class="col-3">
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
                    <li>Scroll to the bottom of the page to enter your answer</li>
                </ul>
            </div>
    </div>
</div>

<!-- modal -->

<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="text-dark fas fa-flag"></i> Report Content</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input id="report-content" type="text" class="form-control">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="btn-send-report" class="btn btn-primary">Send report</button>
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

    $("#addSavedList").on('click', function(){
        $(this).addClass('d-none');
        $("#removeSavedList").removeClass('d-none');

        $.ajax({
            type: "POST",
            url: "{{ route('savedList.add') }}",
            data: {
                "_token": "{{ csrf_token() }}", 
                "questionId": "{{ $question['id'] }}", 
                "customerId": "{{ Auth::id() }}"
            },
            dataType: "json",
            success: function (response) {
                toastr.success(response['message']);
            }
        });
    })

    $("#removeSavedList").on('click', function(){
        $(this).addClass('d-none');
        $("#addSavedList").removeClass('d-none');
        $.ajax({
            type: "GET",
            url: "{{ route('savedList.delete') }}",
            data: {
                "_token": "{{ csrf_token() }}", 
                "questionId": "{{ $question['id'] }}", 
                "customerId": "{{ Auth::id() }}" 
            },
            dataType: "json",
            success: function (response) {
                toastr.success(response['message']);
            }
        });
    })

    $(".btn-up-vote").on('click', function(){
        $(this).parent().addClass('d-none');
        var index = $(".btn-up-vote").index(this);
        $(".btn-remove-vote.fa-sort-up").eq(index).parent().removeClass('d-none');
        $(".btn-down-vote").eq(index).parent().addClass('d-none');
        $(".btn-none-vote.fa-sort-down").eq(index).parent().removeClass('d-none');
        var value = Number($(".value-vote").eq(index).text());
        $(".value-vote").eq(index).html(value + 1);
        var postId = $(".value-vote").eq(index).attr("value");
        $.ajax({
            type: "POST",
            url: "{{ route('votes.add') }}",
            data: {
                "_token": "{{ csrf_token() }}", 
                "postId": postId, 
                "customerId": "{{ Auth::id() }}",
                "value"     : 1
            },
            dataType: "json",
            success: function (response) {
                toastr.success(response['message']);
            }
        });
    })

    $(".btn-remove-vote").on('click', function(){
        $(this).parent().addClass('d-none');
        $(this).parent().prev().removeClass('d-none');
        var indexUp = $(".btn-remove-vote.fa-sort-up").index(this);
        var indexDown = $(".btn-remove-vote.fa-sort-down").index(this);
        var index = indexUp>indexDown?indexUp:indexDown;
        console.log(index);
        var value = Number($(".value-vote").eq(index).text());
        if($(this).hasClass("fa-sort-up")){
            $(".btn-none-vote.fa-sort-down").eq(indexUp).parent().addClass('d-none');
            $(".btn-down-vote").eq(indexUp).parent().removeClass('d-none');
            $(".value-vote").eq(index).html(value - 1);
        }else{
            $(".btn-none-vote.fa-sort-up").eq(indexDown).parent().addClass('d-none');
            $(".btn-up-vote").eq(indexDown).parent().removeClass('d-none');
            $(".value-vote").eq(index).html(value + 1);
        }
        var postId = $(".value-vote").eq(index).attr("value");
        $.ajax({
            type: "GET",
            url: "{{ route('votes.delete') }}",
            data: {
                "_token": "{{ csrf_token() }}", 
                "postId": postId, 
                "customerId": "{{ Auth::id() }}",
            },
            dataType: "json",
            success: function (response) {
                toastr.success(response['message']);
            }
        });
    })

    $(".btn-down-vote").on('click', function(){
        $(this).parent().addClass('d-none');
        var index = $(".btn-down-vote").index(this);
        console.log(index);
        $(".btn-remove-vote.fa-sort-down").eq(index).parent().removeClass('d-none');
        $(".btn-up-vote").eq(index).parent().addClass('d-none');
        $(".btn-none-vote.fa-sort-up").eq(index).parent().removeClass('d-none');
        var value = Number($(".value-vote").eq(index).text());
        $(".value-vote").eq(index).html(value - 1);
        var postId = $(".value-vote").eq(index).attr("value");
        $.ajax({
            type: "POST",
            url: "{{ route('votes.add') }}",
            data: {
                "_token": "{{ csrf_token() }}", 
                "postId": postId, 
                "customerId": "{{ Auth::id() }}",
                "value"     : -1
            },
            dataType: "json",
            success: function (response) {
                toastr.success(response['message']);
            }
        });
    })


    $(".btn-up-report").on('click', function(){
        $('#myModal').modal('show');
        var index = $(".btn-up-report").index(this);
        $('#btn-send-report').val(index);
        console.log($('#btn-send-report').val());
    })

    $(".btn-remove-report").on('click', function(){
        $(this).parent().addClass('d-none');
        $(this).parent().prev().removeClass('d-none');
        var index = $('#btn-send-report').val();
        var postId = $(".value-vote").eq(index).attr("value");
        $.ajax({
            type: "GET",
            url: "{{ route('report.remove') }}",
            data: {
                "_token": "{{ csrf_token() }}", 
                "postId": postId, 
                "customerId": "{{ Auth::id() }}",
            },
            dataType: "json",
            success: function (response) {
                toastr.success(response['message']);
            }
        });
    })

    $("#btn-send-report").on('click', function(){
        var content = $('#report-content').val();
        var index = $('#btn-send-report').val();
        $('.btn-up-report').eq(index).parent().addClass('d-none');
        $('.btn-remove-report').eq(index).parent().removeClass('d-none');
        $('#myModal').modal('hide');
        var postId = $(".value-vote").eq(index).attr("value");
        $.ajax({
            type: "POST",
            url: "{{ route('report') }}",
            data: {
                "_token": "{{ csrf_token() }}", 
                "postId": postId, 
                "customerId": "{{ Auth::id() }}",
                "content" : content 
            },
            dataType: "json",
            success: function (response) {
                toastr.success(response['message']);
            }
        });
    })
   
   $("#post-answer").click(function(){
       $.ajax({
           type: "POST",
           url: "{{ route('notifications.create') }}",
           data: {
            "_token": "{{ csrf_token() }}", 
            "content": "đã trả lời bài đăng",
            "customerId": {{ $user['id'] }},
            "senderId": {{ auth()->user()->id }},
            "questionId": {{ $question['id'] }}
           },
           dataType: "json",
           success: function (response) {
               console.log("create notification!");
           }
       });
   })
</script>
@endsection