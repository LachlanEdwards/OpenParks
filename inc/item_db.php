<?php 
	$pdo = (include 'dbconnect.php');

	try {
		$stmt = $pdo -> prepare("SELECT * FROM parks WHERE BINARY parkcode = :park_code");
		$stmt->bindValue(':park_code', $my_park_code);
		$stmt -> execute();
		$row = $stmt -> fetch();
	}
	catch (PDOException $e) {
		echo $e->getMessage();}
?>