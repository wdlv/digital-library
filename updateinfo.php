<?php
error_reporting(E_ALL);
ini_set('display_errors','On');

include("configPDO.php");

$bookid = $_GET['id_update'];
$bookname = $_GET['bname_update'];
$authorfname = $_GET['fname_update'];
$authorlname = $_GET['lname_update'];
$pubyear = $_GET['pubyear_update'];
$rating = $_GET['rating_update'];

// build set clause
$back = " set ";

if (!empty($bookname)) {
	$back .= " bookname = $bookname,";
}

if (!empty($authorfname)) {
	$back .= " author_fname = $authorfname,";
}

if (!empty($authorlname)) {
	$back .= " author_lname = $authorlname,";
}

if (!empty($pubyear)) {
	$back .= " pub_year = $pubyear,";
}

if (!empty($rating)) {
	$back .= " rating = $rating,";
}

// get rid of extra ","
$modify = substr_replace($back,"",-1);
// in case for null search
if (strlen($back) < 6) {
	$modify = "";
}

$search = "update book $modify where idbook = $bookid";

echo $search;

$n = $db->exec($search);

header("Content-Type:text/plain");
echo $n;
?>