<?php
	/*
	1 - parkcode
	2 - name
	3 - street
	4 - suburb
	5 - easting
	6 - northing
	7 - latitude
	8 - longitude
	*/
	foreach ($parkResults as $item) {	
		echo "<div class='item'>";
			echo "<div style='background-image: url('https://open.mapquestapi.com/staticmap/v4/getmap?key=oVKF5UwJv3UCuEII3CC2j3LiD0XTwdFF&size=1024%2C216&zoom=15&center=-27.38006149%2C153.0387005')' class='image-wrapper'>";
				echo "<div class='gradient'>";
					echo "<div class='margin'>";
						echo "<div class='left'>";
							echo "<div class='title'>";
								echo "<a href='item.php?park={$item['parkcode']}'>" . ucwords(strtolower($item['name'])) . "</a>";
							echo "</div>";
							echo "<div class='street'>";
								echo ucwords(strtolower($item['street'])) . ", " . ucwords(strtolower($item['suburb']));
							echo "</div>";
							echo "<div class='rating'>";
							
								$my_rating = return_rating($item['parkcode']);
								if ($my_rating != 0) {
									echo "<div itemprop='reviewRating' class='rate'>$my_rating</div>";
								}
								else {
									echo "<div class='suburb-param param'>No ratings</div>";
								}
							echo "</div>";
						echo "</div>";
						echo "<div class='right'>";
							echo "<div class='park-code right-text'>";
								echo "{$item['parkcode']}";
							echo "</div>";
						echo "</div>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
	}
?>