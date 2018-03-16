<?php 
session_start();
if (isset($_SESSION['logged_in'])) {
	header("location:home.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	include 'inc/login_db.php';
	$email_error = (!isset($_POST['email']) || empty($_POST['email'])) ? ' - you did not enter an email' : '';
	$password_error = (!isset($_POST['password']) || empty($_POST['password'])) ? ' - you did not enter a password' : '';
	$failed_login = (!$email_error && !$password_error) ? ' - invalid credentials' : '';
	}
else {
	$my_email_value ='';
	$my_password_value = '';
	$failed_login = '';
	$email_error = '';
	$password_error = '';
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
    <?php include 'inc/start_layout.inc' ?>
	<?php include 'inc/functions.inc' ?>
        <main>
            <div class="middle flex">
                <div class="logon">
                    <div class="left">
                        <div class="title">
						<?php echo "<h1>Log-in<span class='error'>{$failed_login}</span></h1>";?>
                        </div>
                        <form action="login.php" method="POST" novalidate>
                            <div class="field">
                                <?php echo "<label class='description'>Username or E-mail Address<span class='error'>{$email_error}</span></label>"?>
								<?php echo "<input type='text' name='email' value='$my_email_value'>"?>
                            </div>
                            <div class="field">
                                <?php echo "<label class='description'>Password<span class='error'>{$password_error}</span></label>"?>
                                <input type="password" name="password"">
                            </div>
                            <div class="button-parent">
                                <button class="button f-right">Log-in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
	<?php include 'inc/end_layout.inc' ?>
    <script src="javascript/script.js"></script>
</body>

</html>