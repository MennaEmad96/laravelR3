<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{ __('trashed.title') }}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    @include('includes.nav')
    <div class="container">
        <h2>{{ __('trashed.table') }}</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Published</th>
                    <th>Edit</th>
                    <!--<th>Show</th>-->
                    <th>Restore</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cars as $data)
                    <tr>
                        <td>{{ $data->title }}</td>
                        <td>{{ $data->description }}</td>
                        <td>{{ $data->published ? "Yes" : "No" }}</td>
                        <td><a href="editCar/{{ $data->id }}">Edit</a></td>
                        <!--<td><a href="showCar/{{ $data->id }}">Show</a></td>-->
                        <td><a href="restoreCar/{{ $data->id }}">Restore</a></td>
                        <td><a onclick="return confirm('Are you sure to permanently delete this record?')" href="forceDelete/{{ $data->id }}">Force Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>