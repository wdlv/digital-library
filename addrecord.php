<?php

error_reporting(E_ALL);
ini_set("display_errors", "On");

include("configPDO.php");


$bookname = $_GET['bname_input'];
$authorfname = $_GET['fname_input'];
$authorlname = $_GET['lname_input'];
$pubyear = $_GET['pubyear_input'];
$rating = $_GET['rating_input'];

$sql = "insert into book (bookname, author_fname, author_lname, pub_year, rating) values ('$bookname', '$authorfname', '$authorlname', $pubyear, $rating)";

$n = $db->exec($sql);

header("Content-Type:text/plain");
echo $n;

?>