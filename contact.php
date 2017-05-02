<?php
// must have logged in
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

                <li class="active"><a href="contact.php">Contact Us</a></li>
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
                <li><a href="GoogleAPI.php">Google Books</a></li>
                <li><a href="add.php">Add Record</a></li>
                <li><a href="update.php">Update Record</a></li>
                <li><a href="librarymap.html">Library in Philly</a></li>
            </ul>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Contact Us</h1>
            <p>Drop us a message or give us a ring. We love to hear about your eLibrary experience and are happy to
                answer any questions.</p>

            <div class="container">
                <div class="col-md-5">
                    <div class="form-area">
                        <form role="form" name="myform" id="my_form" onsubmit="submitForm()">
                            <br style="clear:both">
                            <h3 style="margin-bottom: 25px; text-align: center;">Contact Form</h3>
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                       required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                                       required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="mobile" name="mobile"
                                       placeholder="Mobile Number" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="subject"
                                       placeholder="Subject" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" type="textarea" id="message" placeholder="Message"
                                          maxlength="140" rows="7"></textarea>
                                <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>
                            </div>

                            <input type="submit" id="mybtn" name="submit" value="Send"
                                   class="btn btn-primary pull-right"><span id="status"></span>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    function _(id) {
        return document.getElementById(id);
    }
    function submitForm() {
        _("mybtn").disabled = true;
        _("status").innerHTML = 'please wait ...';
        var formdata = new FormData();
        formdata.append("name", _("name").value);
        formdata.append("email", _("email").value);
        formdata.append("mobile", _("mobile").value);
        formdata.append("subject", _("subject").value);
        formdata.append("message", _("message").value);
        var ajax = new XMLHttpRequest();
        ajax.open("POST", "cinformation.php");
        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                if (ajax.responseText == "success") {
                    _("my_form").innerHTML = '<h2>Thanks ' + _("n").value + ', your message has been sent.</h2>';
                } else {
                    _("status").innerHTML = ajax.responseText;
                    _("mybtn").disabled = false;
                }
            }
        }
        ajax.send(formdata);
    }
</script>
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
