<?php

include("configPDO.php");
// order by pub year DESC limit 10
$dsearch = "select idbook, bookname, concat(author_fname, ' ',author_lname) as author, pub_year, rating from book order by pub_year DESC limit 10";

$data = $db->query($dsearch);

header("Content-Type:application/json");
echo json_encode($data->fetchAll(PDO::FETCH_ASSOC));
?>