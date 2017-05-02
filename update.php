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
    <style>
    	.form-signin {
    		max-width: 400px;
  			padding: 15px;
  		}
    </style>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/dashboard.css" rel="stylesheet">
    <!-- Custom styles for this template -->

    <script src="assets/js/ie-emulation-modes-warning.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="assets/js/update.js"></script>

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
    
<!-- All the tabs -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="dashboard.php">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="recent.php">Recently Published</a></li>
            <li><a href="recommend.php">NY Times Books</a></li>
            <li><a href="GoogleAPI.php">Google Books</a></li>
            <li><a href="add.php">Add Record</a></li>
            <li class="active"><a href="update.php">Update Record</a></li>
            <li><a href="librarymap.html">Library in Philly</a></li>
          </ul>

        </div>
   <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

<!-- Collect update information
 -->    <form class="form-signin"> 
        <div class="form-group row">     
        <label for="example-number-input" class="col-2 col-form-label">ID Number</label>
        <div class="col-10">
        	<input class="form-control" type="number" placeholder="ID Number" id="id_update" required>
        </div>
		</div>  
  		<div class="form-group row">     
  		<label for="example-text-input" class="col-2 col-form-label">Book Name</label>
  		<div class="col-10">
    		<input class="form-control" type="text" placeholder="Book Name" id="bname_update">
  		</div>
		</div>
		<div class="form-group row">
  		<label for="example-text-input" class="col-2 col-form-label">Author First Name</label>
  		<div class="col-10">
    		<input class="form-control" type="text" placeholder="First Name" id="fname_update">
  		</div>
		</div>
		<div class="form-group row">
  		<label for="example-text-input" class="col-2 col-form-label">Author Last Name</label>
  		<div class="col-10">
    		<input class="form-control" type="text"  placeholder="Last Name" id="lname_update">
 		</div>
		</div>

		<div class="form-group row">
  		<label for="example-number-input" class="col-2 col-form-label">Published Year</label>
  		<div class="col-10">
    		<input class="form-control" type="number" placeholder="Published Year" id="pubyear_update">
  		</div>
		</div>
		<div class="form-group row">
  		<label for="example-number-input" class="col-2 col-form-label">Rating</label>
  		<div class="col-10">
    		<input class="form-control" type="number" step="0.01" placeholder="Rating" id="rating_update">
  		</div>
		</div>
		<div class="row">
		<div class="col-xs-6">
			<button class="btn btn-lg btn-primary btn-block" id="upbtn" type="submit">Update Record</button>
		</div>
		<div class="col-xs-6">
			<button class="btn btn-lg btn-warning btn-block" id="delbtn" type="submit">Delete Record</button>
		</div>
		</div>
	</form>
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
