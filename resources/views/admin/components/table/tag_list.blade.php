@foreach($tags as $index => $tag)
    <tr>
        <th scope="row">{{ $index + 1 }}</th>
        <td><button value="{{ $tag['id'] }}"  type="button" class="btn-view btn-success rounded" style="width: 20px; height: 20px"></button></td>
        <td>{{ $tag['tag_name'] }}</td>
        <td>{{ $tag['description']??"No description!" }}</td>
        <td><button value="{{ $tag['id'] }}" type="button" class="btn-del bg-danger text-white rounded" width="50" height="50" >Del</button></td>
    </tr>
@endforeach

<script>
    $('.btn-view').click(function(e){
        const id = $(this).attr("value");
        console.log(id);
        const url = "http://127.0.0.1:8000/tags/detail/" + id;
        console.log(url);
        $('#modal-title').html('View detail');
        $('#modal-content').html("loading...");
        $('#modal').modal('show');
        $('#btn-save').removeClass('d-none');
        $('#btn-save').attr('value', id);
        $.ajax({
            type: "GET",
            url: url,
            dataType: "html",
            success: function (response) {
                console.log("success");
                $('#modal-content').html(response);
                $('#btn-save').attr('disabled', "");
            }
        });
    });

    $('.btn-del').click(function(e){
        const id = $(this).attr("value");
        $('#modal').modal('show');
        $('#modal-title').html('Delete user');
        $('#btn-confirm').removeClass('d-none');
        $('#modal-content').html("<span class='text-danger'>Are u sure with this action!</span>");
        $('#btn-confirm').attr('value', id);
    })
</script>