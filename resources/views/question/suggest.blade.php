<div class="accordion mb-3">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Similar questions
        </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body overflow-auto" @if($questions->count()>0) style="height: 200px" @endif >
            @foreach($questions as $question)
            <div class="d-flex mb-3">
                <div class="answer">
                    <div class="d-flex flex-column align-items-center w-100 border p-2 rounded bg-success text-white">
                        <div class="">{{ $question->answer_count }}</div>
                        <span>answers</span>
                    </div>
                </div>
                <div class="ms-3">
                    <a href="{{ route('questions.view', $question->id) }}"><h5>{{ $question->title }}</h5></a>
                    <div class="text-muted fs-6">
                        {!! $question->body !!}
                    </div>
                    <span class="float-end">asked {{ $question->createdAt }} by <a href="{{ route('users.view', $question['user']['id']) }}">{{ $question['user']['name']}}</a></span>
                </div>
            </div>
            @endforeach
        </div>
        </div>
    </div>
</div>