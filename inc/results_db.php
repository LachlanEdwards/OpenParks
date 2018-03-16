<?php
	$pdo = (include 'dbconnect.php');
	
	$my_search_category = $_POST['search-category'];
	$my_search_input = $_POST['search'];
	
	//name 
	//rating --> reviews table
	//suburb
	//location --> latitude, longitude
	 
	if ($my_search_category == 'name' || $my_search_category == 'suburb') {
		try {
			$stmt = $pdo -> prepare("SELECT * FROM parks WHERE BINARY (name = :search_input OR suburb = :search_input)");
			$stmt->bindValue(':search_input', $my_search_input);
			$stmt -> execute();
			$parkResults = $stmt -> fetchall();
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		}	
	}
	else if ($my_search_category == 'location') {
		$x_search = 0;
		$y_search = 0;
		if(preg_match_all("/[\- 0-9]+\.[0-9]+/", $my_search_input, $matches_out)){		
			$x_search = $matches_out[0][0];
			$y_search = $matches_out[0][1];
		}
		
		try {
			$stmt = $pdo -> prepare("SELECT * FROM parks WHERE (latitude <= :latitude_1 AND latitude >= :latitude_2) AND (longitude <= :longitude_1 AND longitude >= :longitude_2)");
			$stmt->bindValue(':latitude_1', $x_search+0.01);
			$stmt->bindValue(':latitude_2', $x_search-0.01);
			$stmt->bindValue(':longitude_1', $y_search+0.01);
			$stmt->bindValue(':longitude_2', $y_search-0.01);			
			$stmt -> execute();
			$parkResults = $stmt -> fetchall();
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		}	
	}
	else if ($my_search_category == 'rating') {
		try {
			$stmt = $pdo -> prepare("SELECT parks.name, parks.parkcode, parks.street, parks.suburb, parks.latitude, parks.longitude, AVG(reviews.rating) FROM parks INNER JOIN reviews ON parks.parkcode=reviews.parkcode GROUP BY reviews.parkcode HAVING AVG(rating) >= :search_input ORDER BY AVG(rating) DESC");
			$stmt->bindValue(':search_input', $my_search_input);
			$stmt -> execute();
			$parkResults = $stmt -> fetchall();
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		}	
	}
?>
