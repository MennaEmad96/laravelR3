<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Car</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    @include('includes.nav');
    <div class="container">
        <h2>Update car data</h2>
        <form action="{{route ('updateCar', $car->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{ $car->title }}">
            @error('title')
                {{ $message }}
            @enderror
            </div>
            <div class="form-group">
                <label for="description">description:</label>
                <textarea class="form-control" name="description" id="" cols="60" rows="3">{{ $car->description }}</textarea>
            @error('description')
                {{ $message }}
            @enderror
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" id="image" name="image">
                <br>
                <img src="{{ asset('assets/images/' . $car->image) }}" alt="image" style="height:200px"/>
                <input type="hidden" name="oldImageName" value="{{ $car->image }}">
            @error('image')
                {{ $message }}
            @enderror
            </div>
            <!-- try -->
            <div class="form-group">
            <label for="category">Category:</label>
            <div class="form-group">
                <select name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $car->category_id ? "selected":"" }}>{{ $category->cat_name }}</option>
                    @endforeach
                </select>
            </div>
            @error('category')
                {{ $message }}
            @enderror
            </div>
            <!-- endtry -->
            <div class="checkbox">
                <label><input type="checkbox" name="published" @checked($car->published)> Published me</label>
            </div>
            <button type="submit" class="btn btn-default">Update</button>
        </form>
    </div>

</body>
</html>