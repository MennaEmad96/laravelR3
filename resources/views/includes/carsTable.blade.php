<tr>
    <td>{{ $data->title }}</td>
    <td>{{ $data->description }}</td>
    <td>{{ $data->published ? "Yes" : "No" }}</td>
    <td>{{ $data->category->cat_name }}</td>
    <td><a href="editCar/{{ $data->id }}">Edit</a></td>
    <td><a href="showCar/{{ $data->id }}">Show</a></td>
    <td><a onclick="return confirm('Are you sure?')" href="deleteCar/{{ $data->id }}">Delete</a></td>
</tr>