<?php
// must have already logged in
session_start();
if (!isset($_SESSION['user_id'])) {
   header("location:login.html");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/book.ico">

    <title>The Library</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]>
    <script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
    <!--     <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">The Library</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- <li><a href="#">Dashboard</a></li> -->

                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <!-- <input type="text" class="form-control" placeholder="Search..."> -->
            </form>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href="dashboard.php">Overview <span class="sr-only">(current)</span></a></li>
                <li><a href="recent.php">Recently Published</a></li>
                <li><a href="recommend.php">NY Times Books</a></li>
                <li class="active"><a href="GoogleAPI.php">Google Books</a></li>
                <li><a href="add.php">Add Record</a></li>
                <li><a href="update.php">Update Record</a></li>
                <li><a href="librarymap.html">Library in Philly</a></li>

            </ul>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <p align="center"><img src="images/google-books.png" alt="img" style="width:788px;height:240px;"></p>

            <div class="row">

                <div class="col-xs-2">
                    <input type="text" id="search" class="form-control" placeholder="Title or Author" required>
                </div>
                <div class="col-xs-2">
                    <button class="btn btn-lg btn-primary btn-block" id="button" type="submit">Submit</button>
                </div>
            </div>

            <h2 class="sub-header">Google Books Search</h2>
            <div class="table-responsive">
            <div id="results"></div>

            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script>
    function booksearch() {
        var search =  document.getElementById('search').value
        document.getElementById('results').innerHTML=""
        console.log(search)

        $.ajax({
            url:"https://www.googleapis.com/books/v1/volumes?q=" + search,
            dataType:"json",


            success: function (data) {
                //console.log(data)
                for( i = 0;i<data.items.length; i++){
                    results.innerHTML += "<h3>" + data.items[i].volumeInfo.title + "<br>"+"Authors:"+data.items[i].volumeInfo.authors+"<br>"+"Description:" +data.items[i].volumeInfo.description+"</h3>"
                }
            },
            type:'GET'
        });
    }

    document.getElementById('button').addEventListener('click',booksearch,false)
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../dist/js/bootstrap.min.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="../../assets/js/vendor/holder.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>


</body>
</html>
