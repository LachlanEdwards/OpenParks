<?php
	$pdo = (include 'inc/dbconnect.php');
	
	try {
		//$stmt = $pdo -> prepare("SELECT parkcode, AVG(rating) FROM reviews GROUP BY parkcode HAVING AVG(rating) >= 0 ORDER BY AVG(rating) DESC");
		$stmt = $pdo -> prepare("SELECT parks.name FROM parks INNER JOIN reviews ON parks.parkcode=reviews.parkcode GROUP BY reviews.parkcode HAVING AVG(rating) >= 2 ORDER BY AVG(rating) DESC");
		$stmt -> execute();
		$parkResults = $stmt -> fetchall();
	}
	catch (PDOException $e) {
		echo $e->getMessage();
	}
	
	print_r($parkResults);
?>

