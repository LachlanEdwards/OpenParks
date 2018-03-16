<?php 
	$pdo = (include 'dbconnect.php');

	$my_email_value = $_POST['email'];
	$my_password_value = $_POST['password'];
	
	try {
		$stmt = $pdo -> prepare("SELECT * FROM users WHERE BINARY username = :email_value OR email = :email_value");
		$stmt->bindValue(':email_value', $my_email_value);
		$stmt -> execute();
		$row = $stmt -> fetch();
	}
	catch (PDOException $e) {
		echo $e->getMessage();
	}	
	 
	if ($row && password_verify($my_password_value, $row['password'])) {
		$_SESSION['logged_user'] = $row['username'];
		$_SESSION['logged_in'] = 1;
		header("location:home.php");
		exit();
	}
?>