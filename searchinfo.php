<?php
// header("Content-Type:text/plain");
error_reporting(E_ALL);
ini_set('display_errors','On');

include("configPDO.php");

$bookname = $_GET['bname'];
$firstname = $_GET['fname'];
$lastname = $_GET['lname'];
$pubyear = $_GET['pyear'];

// build where clause
$back = " where ";

if (!empty($bookname)) {
	$back .= " bookname = '$bookname' and";
}

if (!empty($firstname)) {
	$back .= " author_fname = '$firstname' and";
}

if (!empty($lastname)) {
	$back .= " author_lname = '$lastname' and";
}

if (!empty($pubyear)) {
	$back .= " pub_year = $pubyear and";
}

// get rid of extra and
$modify = substr_replace($back,"",-3);
// in case for null search
if (strlen($back) < 9) {
	$modify = "";
}

$search = "select idbook, bookname, concat(author_fname, ' ',author_lname) as author, pub_year, rating from book $modify order by rating DESC limit 10";

$data = $db->query($search);

header("Content-Type:application/json");
echo json_encode($data->fetchAll(PDO::FETCH_ASSOC));

?>