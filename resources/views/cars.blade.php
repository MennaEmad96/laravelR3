<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    @include('includes.nav')
    <div class="container">
        <h2>Cars List</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Published</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Show</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            @each('includes.carsTable', $cars, 'data')
                {{--@foreach($cars as $data)
                    <tr>
                        <td>{{ $data->title }}</td>
                        <td>{{ $data->description }}</td>
                        <td>{{ $data->published ? "Yes" : "No" }}</td>
                        {{--@foreach($categories as $category)
                            @if($data->category_id == $category->id)
                                <td>{{ $category->cat_name }}</td>
                            @endif
                        @endforeach
                        <!-- use one to many relation -->
                        <td>{{ $data->category->cat_name }}</td>
                        <td><img src="{{ asset('assets/images/'.$data->image) }}" alt="" style="height:50px"></td>
                        <td><a href="editCar/{{ $data->id }}">Edit</a></td>
                        <td><a href="showCar/{{ $data->id }}">Show</a></td>
                        <td><a onclick="return confirm('Are you sure?')" href="deleteCar/{{ $data->id }}">Delete</a></td>
                    </tr>
                @endforeach--}}
            </tbody>
        </table>
    </div>

</body>
</html>