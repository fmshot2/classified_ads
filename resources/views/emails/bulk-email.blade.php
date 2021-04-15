<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.css">

    <style>
        #ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        } 

        #li {
            float: left;
        }

        #li a {
            display: block;
            padding: 8px;
            background-color: #dddddd;
        }
    </style>

    <title>Hello, world!</title>
</head>

<body>
    <div style="padding: 20px; background-color: rgb(228, 228, 228); color: #4B2E83; text-align: center;">
        <h1 class="lead">Dear {{ $name }}</h1>
        <ul id="ul">
            <li id="li"><a href="https://efcontact.com">Home</a></li>
            <li id="li"><a href="about.html">About</a></li>
            <li id="li"><a href="more.html">Schools</a></li>
        </ul>
    </div>

    <div style="padding: 20px;">
        <h2>{!! $body !!}</h2>

        

    </div>


    <div class="container">
        <!-- Content here -->
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
</body>

</html>