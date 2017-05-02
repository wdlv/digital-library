<?php

$dsn = 'mysql:host=twilbury.cs.drexel.edu;dbname=hl542_info556_201602';

try {
	$db = new PDO($dsn, "hl542", "jyhbdayfsa");
} catch (PDOException $e) {
	$error_message = $e->getMessage();
	echo $error_message;
	exit();
}

?>