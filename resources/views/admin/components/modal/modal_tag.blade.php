<div class="mb-3">
    <span class="fw-bold text-primary"><i class="nav-icon fas fa-tags me-2"></i> Tag:</span> {{ $tag['tag_name'] }}
</div>
<div class="d-flex flex-column justify-content-center">
    <span class="fw-bold text-primary me-3">Description:</span>
    <div class="" id="description-content" >
        {{ $tag['description']??"No description!!" }} <i class="btn btn-edit fas fa-edit text-warning"></i>
    </div>
</div>
<script>
    $('.btn-edit').click(function(){
        $('#description-content').html('<textarea type="text" name="" id="description" class="form-control border" placeholder="...">{{ $tag['description']??"No description!!" }}</textarea>');
        $('#btn-save').removeAttr('disabled');
    })

</script>
