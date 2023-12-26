<tr>
    <td>{{ $data->title }}</td>
    <td>{{ $data->description }}</td>
    <td>{{ $data->published ? "Yes" : "No" }}</td>
    @foreach($categories as $category)
        @if($data->category_id == $category->id)
            <td>{{ category->cat_name }}</td>
        @endif
    @endforeach
    <td><a href="editCar/{{ $data->id }}">Edit</a></td>
    <td><a href="showCar/{{ $data->id }}">Show</a></td>
    <td><a onclick="return confirm('Are you sure?')" href="deleteCar/{{ $data->id }}">Delete</a></td>
</tr>