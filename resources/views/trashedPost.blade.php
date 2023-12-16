<!DOCTYPE html>
<html lang="en">
<head>
  <title>trashed</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    @include('includes.navPost')
    <div class="container">
        <h2>Trashed Posts List</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Description</th>
                    <th>Published</th>
                    <th>Edit</th>
                    <th>Show</th>
                    <th>Restore</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $data)
                    <tr>
                        <td>{{ $data->title }}</td>
                        <td>{{ $data->author }}</td>
                        <td>{{ $data->description }}</td>
                        <td>{{ $data->published ? "Yes" : "No" }}</td>
                        <td><a href="editPost/{{ $data->id }}">Edit</a></td>
                        <td><a href="showPost/{{ $data->id }}">Show</a></td>
                        <td><a href="restorePost/{{ $data->id }}">Restore</a></td>
                        <td><a onclick="return confirm('Are you sure to permanently delete this record?')" href="forceDeletePost/{{ $data->id }}">Force Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>