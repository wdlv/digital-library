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
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#btnsub").click(function(){
            inputage = $("#inputAge").val();
            //alert("Data: " + inputage);
            $.get("nyt_api.php", {inputAge: inputage},
                function(data,status){
                    $("#form_list").empty();
                    // alert("Data: " +  data["num_results"] + "\nStatus: " + status);
                    obj = data["results"];
                $.each(obj, function(index, record) {
                    $("#form_list").append(
                "<tr>"
                + "<td>" + record["title"] + "</td>"
                + "<td>" + record['author'] + "</td>"
                + "<td>" + record['publisher'] + "</td>" 
                + "<td>" + record['age_group'] + "</td>"
                + "<td>" + record['price'] + "</td>"
                + "</tr>");

            }
        );
        // Empty the input section
        $("#inputAge").val("");
    });
        });
    });
        
    </script>


</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
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
                <li class="active"><a href="recommend.php">NY Times Books</a></li>
                <li><a href="GoogleAPI.php">Google Books</a></li>
                <li><a href="add.php">Add Record</a></li>
                <li><a href="update.php">Update Record</a></li>
                <li><a href="librarymap.html">Library in Philly</a></li>
            </ul>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
 <!-- Set pictures -->
            <p align="center"><img src="images/nytimes-logo.jpg" alt="img" style="width:610px;height:117px;"></p>

            <div class="row">

                    <div class="col-xs-2">
                        <input type="number" id="inputAge" class="form-control" placeholder="Your Age Try 3-16" required>
                    </div>
                    <div class="col-xs-2">
                        <button class="btn btn-lg btn-primary btn-block" id="btnsub" type="submit">Submit</button>
                    </div>
            </div>

            <h2 class="sub-header">NY Times' Recommendation</h2>
            <div class="table-responsive">


            <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Book Name</th>
                        <th>Author</th>
                        <th>Publisher</th>
                        <th>Age Group</th>
                        <th>Price</th>
                        </tr>
                    </thead>
                    <tbody id="form_list">
                            
                    </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
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
