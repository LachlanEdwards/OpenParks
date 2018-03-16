<?php
	$my_hashed_password = password_hash($my_password, PASSWORD_DEFAULT);
	
	try {
		$stmt = $pdo -> prepare("INSERT INTO users (username, email, dob, postcode, password) VALUES (:username, :email, :dob, :postcode, :password)");
		$stmt->bindValue(':username', $my_username);
		$stmt->bindValue(':email', $my_email);
		$stmt->bindValue(':dob', $my_dob);
		$stmt->bindValue(':postcode', $my_postcode);
		$stmt->bindValue(':password', $my_hashed_password);
		$stmt -> execute();
	}
	catch (PDOException $e) {
		echo $e->getMessage();
	}
	
	$_SESSION['logged_user'] = $my_username;
	$_SESSION['logged_in'] = 1;
	header("location:home.php");

?>
