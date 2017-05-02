<?php

session_start();

include("configPDO.php");


error_reporting(E_ALL);		
ini_set('display_errors','On');	

// Get username email and password
$userEmail = $_POST['inputEmail'];
$passWord = $_POST['inputPassword'];


// prepare sql query
$query = "select * from lb_user where user_email= :userEmail and upass = :passWord";
$statement = $db->prepare($query);

//bind parameters
$statement -> bindParam(':userEmail', $userEmail);
$statement -> bindParam(':passWord', $passWord);

$statement -> execute();
// count number of records match
$count = $statement->rowCount();

$row = $statement->fetch();

if ($count == 1) {
	// save information in session for future use
	$_SESSION['user_id'] = $row[0];
	$_SESSION['uname'] = $row[2];
	header("Location: dashboard.php");
} else {
	header("Location: login.html");
}

?>
