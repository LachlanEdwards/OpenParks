<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	header("location:home.php");
}

include 'inc/results_db.php';
$result_count = count($parkResults);
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>OpenParks: Regional Government Parks and Recreation Program</title>
    <link href="stylesheet/normalize.css" rel="stylesheet">
    <link href="stylesheet/main.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <meta charset="utf-8">

    <!-- &copy; 2017 Vladimir Agafonkin. Maps &copy; OpenStreetMap contributors. -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
    <script src="javascript/maps.js"></script>
    <script src="javascript/script.js"></script>
</head>

<body>
    <?php 
	include 'inc/start_layout.inc';
	include 'inc/functions.inc';
	?>
        <main>
            <div class="middle flex">
                <div class="result">
                    <div class="user">
						<?php
                        echo "<h1 class='title'>Information for \"" . ucwords(strtolower($my_search_input)) . "\":</h1>";
                        echo "<p class='info'>{$result_count} results, sorted by {$my_search_category}.</p>";
						?>
                    </div>
                    <div class="flex return">
                        <div class="left exclusive">
                            <?php
							include 'inc/results_generate.inc'
							?>
                        </div>
                        <div class="right exclusive">
                            <div id="mapid"></div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    <?php include 'inc/end_layout.inc' ?>
	
	
	<script language="javascript">

		coord_array = [];
		<?php
		foreach ($parkResults as $park) {
			$park_stripped_name = str_replace("'", "", $park['name']);
			echo "coord_array.push([{$park['latitude']}, {$park['longitude']}, '$park_stripped_name']);";
		}
		if ($result_count > 0) {
		echo "drawMap(coord_array)";
		}
		?>
		

        //RatingJS - Converts numeric ratings to iconographic ratings. Used to allow Schema validation.
        elementList = document.querySelectorAll('.rate');
        for (i = 0; i < elementList.length; i++) {
            el = elementList[i].innerHTML;
            rating = parseFloat(el);
            elementList[i].innerHTML = "";
            for (star = 0; star < rating-(rating%1); star++) {
                elementList[i].innerHTML += '<div class="material-icons">star</div>';
            }
			if (rating - star >= 0.5) {
				elementList[i].innerHTML += '<div class="material-icons">star_half</div>';
			}
        }
    </script>
</body>

</html>
