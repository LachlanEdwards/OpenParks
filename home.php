<?php
session_start();

//DB --> better username and password
//signup --> security --> special characters -->
//star rating --> average rating for parks
//item --> write review
//geographic microdata


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
</head>

<body>
	<?php include 'inc/start_layout.inc' ?>
        <main>
            <div class="middle flex flex-center flex-column">
                <div class="search">
                    <div class="large-search">
                        <form id="parksearch1" action="results.php" method="post">
							<input type="hidden" name="search-category" value="name">
                            <ul class="option none-list-style">
                                <li onclick="input.option('name');document.forms['parksearch1'].elements['search-category'].value='name';" class="option-item name active">Name</li>
                                <li onclick="input.option('location');document.forms['parksearch1'].elements['search-category'].value='location';" class="option-item location">Location</li>
                                <li onclick="input.option('suburb');document.forms['parksearch1'].elements['search-category'].value='suburb';" class="option-item suburb">Suburb</li>
                                <li onclick="input.option('rating');document.forms['parksearch1'].elements['search-category'].value='rating';" class="option-item rating">Rating</li>
                            </ul>
                            <div class="large-input-wrapper">
                                <input type="text" name="search" placeholder="Search by Name" onkeyup="input.large();" class="search-input large-search-input border-box">
                            </div>
                        </form>
                    </div>
                    <div class="accessible f-right">
                        <p class="caption info right-text">Press return to search</p>
                        <p class="caption error right-text"></p>
                    </div>
                </div>
            </div>
        </main>
    <?php include 'inc/end_layout.inc' ?>
    <script src="javascript/script.js"></script>
</body>

</html>
