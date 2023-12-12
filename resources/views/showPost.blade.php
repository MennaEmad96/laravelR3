<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Post</title>
</head>
<body>
    <h1>Title:  {{ $post->title }}</h1>
    <h3>Author: {{ $post->author }}</h3>
    <h5>Created_at: {{ $post->created_at }}</h5>
    <h5>Updated_at: {{ $post->updated_at }}</h5>
    <p>Description: {{ $post->description }}</p>
    <p>{{ $post->published? "Published" : "Not Published" }}</p>
</body>
</html>