@if(count($tags) >0 )
@foreach($tags as $tag)
    <div class="suggestTag me-3 btn btn-outline-info py-2">
        <span class="tagName text-dark px-2 py-1 bg-warning fw-bold rounded">{{ $tag->tag_name }}</span>
        <span class="text-dark">{{ $tag->question_tag_count }}</span>
    </div>
@endforeach
@else
<div class="text-danger">Not suggestion</div>
@endif

<script> 
    document.querySelectorAll('.suggestTag').forEach(function(e){
        e.addEventListener('click', function(){
            var suggest = e.firstElementChild.textContent;
            let pos = document.getElementsByName('tags')[0].value.lastIndexOf(',') + 1;
            document.getElementsByName('tags')[0].value = document.getElementsByName('tags')[0].value.substring(0, pos) + " " + suggest;
        })
    });
</script>