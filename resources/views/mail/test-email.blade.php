<!DOCTYPE html>
<html lang="en">
<head>
    <title>Email Task</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */ 
        .navbar {
        margin-bottom: 0;
        border-radius: 0;
        }
        /* Add a gray background color and some padding to the footer */
        footer {
        background-color: #f2f2f2;
        padding: 25px;
        }
        table.center {
        margin-left: auto; 
        margin-right: auto;
        }
        table {
        border-collapse: collapse;
        width: 100%;
        }
        td {
        text-align: center;
        }
    </style>
</head>
<body>
    <div class="jumbotron">
        <div class="container text-center">
            <h1>Hi, {{$data['name']}}</h1>
            <table class="center">
                <tr>
                    <td><p>{{$data['email']}}</p></td>
                    <td><p>{{$data['phone']}}</p></td>
                </tr>
            </table>    
        </div>
    </div>
    <div class="container-fluid bg-3 text-center">    
        <h3>{{$data['subject']}}</h3><br>
        <p>{{$data['message']}}</p>
    </div><br>
    <footer class="container-fluid text-center">
        <p>{{$data['news']?"Wish to receive additional news.":""}}</p>
    </footer>
</body>
</html>
