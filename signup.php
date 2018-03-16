<?php
session_start();
if (isset($_SESSION['logged_in'])) {
	header("location:home.php");
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
</head>

<body>
	<?php include 'inc/functions.inc';
	$pdo = (include 'inc/dbconnect.php');
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$my_username = $_POST['username'];
		$my_email = $_POST['email'];
		$my_dob = $_POST['dob'];
		$my_postcode = $_POST['postcode'];
		$my_password = $_POST['password'];
		//CHECK FOR INCOMPATIBLE CHARACTERS
		validateUsername($errorsArray, $numberDict, $my_username);
		validateEmail($errorsArray, $my_email);
		validateDob($errorsArray, $numberDict);
		validatePostcode($errorsArray, $numberDict);
		validatePassword($errorsArray, $numberDict);
		validatePasswordVerify($errorsArray);
		validateTC($errorsArray);
		if(!$errorsArray){
			include 'inc/signup_db.php';
			exit();
		}
	}
	?>
	<?php include 'inc/start_layout.inc' ?>
        <main>
            <div class="middle flex">
                <div class="signup">
                    <div class="left inline-block">
                        <div class="title">
                            <h1>Sign-up</h1>
                        </div>
                        <form id="submit" name="signup_form" action="signup.php" onsubmit="return submitVerify()" method="post" novalidate>
                            <?php
							standard_input('text', 'username', 'username*', 'John123', 'usernameVerify()', $errorsArray);
							standard_input('text', 'email', 'email*', 'example@example.com', 'emailVerify()', $errorsArray);
							standard_input('date', 'dob', 'date of birth*', 'DD/MM/YYYY', 'dobVerify()', $errorsArray, 'onchange');
							standard_input('text', 'postcode', 'postcode', '4000', 'postcodeVerify()', $errorsArray);
							standard_input('password', 'password', 'password*', '', 'passVerify()', $errorsArray);
							standard_input('password', 'passwordVerify', 'retype password*', '', 'passVerifyVerify()', $errorsArray);
							checkbox_input('tc', 'Do you accept the terms and conditions?*', 'tcVerify()', $errorsArray);
							?>
                            <div class="button-parent">
                                <button type="submit" onclick="" class="button f-right">Sign-up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
	<?php include 'inc/end_layout.inc' ?>
    <script src="javascript/script.js"></script>
    <script src="javascript/validate.js"></script>
</body>


</html>
