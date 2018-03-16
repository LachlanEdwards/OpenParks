<?php 

$errorsArray = array();
$numberDict = array(
	3 => 'three',
	4 => 'four',
	5 => 'five',
	6 => 'six',
	7 => 'seven',
	8 => 'eight',
);

function return_posted($field_name) {
	if(isset($_POST[$field_name])) {
		return htmlspecialchars($_POST[$field_name]);}
	else {
		return '';
	}
}

function returnLabelSpan($field_name, $field_description, $errorsArray) {
	$labelSpanEcho = "<label id='{$field_name}Label' class='description'>{$field_description}<span id='{$field_name}Span' class='error'>";
	if (isset($errorsArray[$field_name])) {
		$labelSpanEcho .= "{$errorsArray[$field_name]}";}
	$labelSpanEcho .= "</span></label>";
	return $labelSpanEcho;
}
function returnInput($fieldType, $field_name, $placeholder, $function, $eventType, $posted_value) {
	return "<input type='{$fieldType}' id='{$field_name}' name='{$field_name}' value='{$posted_value}' autocomplete='on' placeholder='{$placeholder}' $eventType='{$function}'>";
}

function standard_input($fieldType, $field_name, $field_description, $placeholder, $function, $errorsArray, $eventType = 'onKeyUp') {
	echo '<div class="field">';
	$labelSpan = returnLabelSpan($field_name, $field_description, $errorsArray);
	echo $labelSpan;
	$posted_value = return_posted($field_name);
	$input = returnInput($fieldType, $field_name, $placeholder, $function, $eventType, $posted_value);
	echo $input;
	echo '</div>';
}
function checkbox_input($field_name, $field_description, $function, $errorsArray) {
	echo '<div class="field">';
	$labelSpan = returnLabelSpan($field_name, $field_description, $errorsArray);
	echo $labelSpan;
	$is_checked = (return_posted($field_name)) ? 'checked' : '';
	$input = "<input type='checkbox' id='{$field_name}' class='inline width f-right' name='{$field_name}' onChange='{$function}' {$is_checked}>";
	echo $input;
	echo '</div>';
}

function isPresent(&$errorsArray, $field_name, $search) {
	try {
		$pdo = (include 'inc/dbconnect.php');
		$stmt = $pdo -> prepare("SELECT * FROM users WHERE username = :username OR email = :email");
		$stmt->bindValue(':username', $search);
		$stmt->bindValue(':email', $search);
		$stmt -> execute();
		$row_test = $stmt -> fetch();
	}
	catch (PDOException $e) {
		echo $e->getMessage();
	}
	if ($row_test) {
		$errorsArray[$field_name] = ' - is already in use';
		return true;
	}
	return false;
}
function missingField(&$errorsArray, $field_name) {
	if (!isset($_POST[$field_name]) || empty($_POST[$field_name])) {
		$errorsArray[$field_name] = ' - is required';
		return true;
	}
	return false;
}		
function minLengthField(&$errorsArray, $field_name, $len, $numberDict) {
	if (strlen($_POST[$field_name]) < $len) {
		$errorsArray[$field_name] = " - must be atleast {$numberDict[$len]} characters";
		return true;
	}
	return false;
}
function exactLengthField(&$errorsArray, $field_name, $len, $numberDict) {
	if (strlen($_POST[$field_name]) != $len) {
		$errorsArray[$field_name] = " - must have {$numberDict[$len]} digits";
		return true;
	}
	return false;
}
function normalChars(&$errorsArray, $field_name) {
	if (preg_match('/[^a-zA-Z0-9_]+/', $_POST[$field_name])) {
		$errorsArray[$field_name] = " - must only contain normal characters";
		return true;
	}
	return false;
}



function validateUsername(&$errorsArray, $numberDict, $search){
	$name = 'username';
	$minLength = 3;
	if (normalChars($errorsArray, $name)) {}
	else if (isPresent($errorsArray, $name, $search)) {}
	else if (missingField($errorsArray, $name)) {}
	else {
		minLengthField($errorsArray, $name, $minLength, $numberDict);
	}
}
function validateEmail(&$errorsArray, $search) {
	$name = 'email';
	if (isPresent($errorsArray, $name, $search)) {}
	else if (missingField($errorsArray, $name)) {}
	else if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/', $_POST[$name])) {
		$errorsArray[$name] = ' - is invalid';
	}
}
function validateDob(&$errorsArray, $numberDict){
	$name = 'dob';
	missingField($errorsArray, $name);
}
function validatePostcode(&$errorsArray, $numberDict){
	$name = 'postcode';
	$exactLength = 4;
	if (isset($_POST[$name]) & !empty($_POST[$name])) {
		if (preg_match('/([^0-9]+)/', $_POST[$name])) {
			$errorsArray[$name] = ' - must only contain digits';
		}
		else {
			exactLengthField($errorsArray, $name, $exactLength, $numberDict);
		}
	}
}
function validatePassword(&$errorsArray, $numberDict){
	$name = 'password';
	$minLength = 8;
	if (normalChars($errorsArray, $name)) {}
	else if (missingField($errorsArray, $name)) {}
	else if (minLengthField($errorsArray, $name, $minLength, $numberDict) || !preg_match('/([A-Z0-9]+)/', $_POST[$name])) {
		$errorsArray[$name] = " - must contain a capital, number and be atleast {$numberDict[$minLength]} characters long";
	}
}
function validatePasswordVerify(&$errorsArray){
	$name = 'passwordVerify';
	$name_check = 'password';
	if ($_POST[$name] != $_POST[$name_check]) {
		$errorsArray[$name] = ' - passwords must match';
	}
}
function validateTC(&$errorsArray) {
	$name = 'tc';
	if (!isset($_POST[$name])) {
		$errorsArray[$name] = ' - is required';
	}
}

function return_rating($my_parkcode) {
	$pdo = (include 'dbconnect.php');
	try {
		$stmt = $pdo -> prepare("SELECT AVG(rating) FROM reviews GROUP BY parkcode HAVING parkcode = :park_code");
		$stmt -> bindValue(':park_code', $my_parkcode);
		$stmt -> execute();
		$row = $stmt -> fetch();
	}
	catch (PDOException $e) {
		echo $e->getMessage();
	}
	return $row['AVG(rating)'];
}
?>