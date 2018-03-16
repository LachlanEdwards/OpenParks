<?php
$pdo = (include 'dbconnect.php');

try {
	$stmt = $pdo -> prepare("SELECT * FROM reviews WHERE parkcode = :parkcode");
	$stmt->bindValue(':parkcode', $my_park_code);
	$stmt -> execute();
	$rows = $stmt -> fetchall();
}
catch (PDOException $e) {
	echo $e->getMessage();
}


/*
1 - parkcode
2 - username
3 - comment
4 - rating
*/

foreach ($rows as $item) {	
	echo "<div class='item'>";
	echo "<div class='user flex'>";
			echo "<div class='image'><img src='images/profile.jpg' alt='Lachlan Edwards'></div>";
			echo "<div class='user-info flex flex-center flex-column'>";
				echo "<div class='title'>" . $item['username'] . "</div>";
			echo "</div>";
		echo "</div>";
		echo "<div class='body'>";
			echo "<div itemprop='reviewBody' class='description'>" . $item['comment'] . "</div>";
			echo "<div itemprop='reviewRating' class='rate'>" . $item['rating'] . "</div>";
		echo "</div>";
		
	echo "</div>";
}




?>