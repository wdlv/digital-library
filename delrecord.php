<?php

error_reporting(E_ALL);
ini_set("display_errors", "On");

include("configPDO.php");

$bookid = $_GET['id_update'];

$sql = "delete from book where idbook = $bookid";

// echo $sql;
$n = $db->exec($sql);

header("Content-Type:text/plain");
echo $n;

?>