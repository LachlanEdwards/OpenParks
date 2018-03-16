<?php
session_start();

if (isset($_GET['park'])) {
	$my_park_code = $_GET['park'];
	include 'inc/item_db.php';
	if (!$row) {
		header("location: home.php");
	}
}
else{
	header("location: home.php");
}
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
        <main>
            <div class="middle flex">
                <div itemscope itemtype="http://schema.org/Place" class="item-document">
                    <h1 itemprop="itemReviewed name" class="title">
					<?php 
						echo ucwords(strtolower($row['name']));
					?>
					</h1>
                    <div class="info">Main park information:</div>
                    <div class="main-item-information flex">
                        <div class="left">
                            <table class="item-info">
								<!--
                                <tr>
                                    <td class="park-code object">Park Code:</td>
									<td class='park-code-param param'>
									<?php 
										echo ucwords(strtolower($row['name']));
									?>
									</td>
                                </tr>
								-->
                                <tr>
                                    <td class="park-code object">Park Code:</td>
                                    <td itemprop="branchCode" class="park-code-param param">
									<?php 
										echo $row['parkcode'];
									?>
									</td>
                                </tr>
                                <tr>
                                    <td class="street object">Street:</td>
                                    <td itemprop="address" class="street-param param">
									<?php 
										echo ucwords(strtolower($row['street']));
									?>
									</td>
                                </tr>
                                <tr>
                                    <td class="suburb object">Suburb:</td>
                                    <td class="suburb-param param">
									<?php 
										echo ucwords(strtolower($row['suburb']));
									?>
									</td>
                                </tr>
                                <tr>
                                    <td class="rating object">Rating:</td>
                                    
									<?php
										$my_rating = return_rating($row['parkcode']);
										if ($my_rating != 0) {
											echo "<td class='rate rating-param param'>";
											echo $my_rating;
										}
										else {
											echo "<td class='suburb-param param'>";
											echo 'No ratings';
										}
									?>
									</td>
                                </tr>
                                <tr>
                                    <td class="suburb object">Cartesian Co-ordinates:</td>
                                    <td class="suburb-param param">
									<?php 
										echo "{$row['easting']}, {$row['northing']}";
									?>
									</td>
                                </tr>
                                <tr>
                                    <td class="suburb object">Geographic Co-ordinates:</td>
                                    <td itemprop="geo" class="suburb-param param">
									<?php 
										echo "{$row['latitude']}, {$row['longitude']}";
									?>
									</td>
                                </tr>
                            </table>
                        </div>
                        <div class="right">
                            <div itemprop="hasMap" class="map" id="mapid"></div>
                        </div>
                    </div>
                    <div class="block">
                        <div class="reviews">
                            <div class="info">Reviews:</div>
                            <div class="write block">
                                <form id="submit-review" action="inc/submit_review.php" method="post">
									<input type="hidden" name="park_code" value="<?php echo $my_park_code ?>">
                                    <div class="field flex">
                                        <input class="input" type="text" name="review" placeholder="Write a review">
                                        <div class="submit-rating">
                                            <div class="center flex flex-center script_anchor">
                                                <div id="0" class="material-icons" onclick="input.select_rating(0);document.forms['submit-review'].elements['rating'].value=1;">star_border</div>
                                                <div id="1" class="material-icons" onclick="input.select_rating(1);document.forms['submit-review'].elements['rating'].value=2;">star_border</div>
                                                <div id="2" class="material-icons" onclick="input.select_rating(2);document.forms['submit-review'].elements['rating'].value=3;">star_border</div>
                                                <div id="3" class="material-icons" onclick="input.select_rating(3);document.forms['submit-review'].elements['rating'].value=4;">star_border</div>
                                                <div id="4" class="material-icons" onclick="input.select_rating(4);document.forms['submit-review'].elements['rating'].value=5;">star_border</div>
                                            </div>
                                        </div>
                                        <input type="hidden" class="hiddensubmit_rating" type="number" name="rating" value="0" min="1" max="5">
                                    </div>
                                    <div class="button-parent">
                                        <button class="button f-right">Submit</button>
                                    </div>
                                </form>
                            </div>
							<?php include 'inc/review_generate.php'; ?>
                            <div class="item">
                                <div class="body">
									<?php
									if (!isset($rows) || empty($rows)) {
										echo "<div itemprop='reviewBody' class='description'>Be the first to leave a review for this park!</div>";
									}
									?>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="flex">
            <div class="left">
                <ul class="map none-list-style">
                    <li class="map-item"><a href="login.html">Log-in</a></li>
                    <li class="map-item"><a href="signup.html">Sign-up</a></li>
                    <li class="map-item"><a href="https://www.openstreetmap.org">OpenStreetMap</a></li>
                    <li class="map-item"><a href="https://www.data.brisbane.qld.gov.au/">Open Data</a></li>
                </ul>
            </div>
            <div class="right">
                <ul class="legal none-list-style">
                    <li class="legal-item">OpenStreetMap® is open data, licensed under the Open Data Commons Open Database License (ODbL) by the OpenStreetMap Foundation (OSMF).</li>
                    <li class="legal-item">Park facilities and assets is open data, licensed under the Creative Commons Attribution 4.0 by the Brisbane City Council.</li>
                </ul>
            </div>
        </footer>
    </div>
    <script>

	<?php
		$park_stripped_name = str_replace("'", "", $row['name']);
		echo "drawMap([[{$row['latitude']}, {$row['longitude']}, '$park_stripped_name']])";
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
