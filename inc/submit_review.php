<?php
	session_start();

	$my_parkcode = $_POST['park_code'];
	if (isset($_SESSION['logged_in'])) {
		$my_username = $_SESSION['logged_user'];
	}
	else {
		$my_username = 'Anonymous';
	}
	$my_comment = $_POST['review'];
	$my_rating = $_POST['rating'];
	
	$pdo = (include 'dbconnect.php');
	
	try {
		$stmt = $pdo -> prepare("INSERT INTO reviews (parkcode, username, comment, rating) VALUES (:parkcode, :username, :comment, :rating)");
		$stmt->bindValue(':parkcode', $my_parkcode);
		$stmt->bindValue(':username', $my_username);
		$stmt->bindValue(':comment', $my_comment);
		$stmt->bindValue(':rating', $my_rating);
		$stmt -> execute();
	}
	catch (PDOException $e) {
		echo $e->getMessage();
	}
	
	header("location: ../item.php?park={$my_parkcode}");

?>
