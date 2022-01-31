<table class="table">
    <tbody>
        <tr>
            <td class="fw-bold" scope="col-6">Avata</td>
            <td scope="col-6"><img src="{{ asset($data['image']) }}" alt="#photo" width="100" height="150" ></td>
        </tr>
        <tr>
            <td class="fw-bold">Display name</td>
            <td>{{ $data['display_name'] }}</td>
        </tr>
        <tr>
            <td class="fw-bold">Location</td>
            <td>{{ $data['location'] }}</td>
        </tr>
        <tr>
            <td class="fw-bold">Title</td>
            <td>{{ $data['title'] }}</td>
        </tr>
        <tr>
            <td class="fw-bold">Website</td>
            <td>{{ $data['website_link'] }}</td>
        </tr>
        <tr>
            <td class="fw-bold">Github</td>
            <td>{{ $data['github_link'] }}</td>
        </tr>
    </tbody>
</table>