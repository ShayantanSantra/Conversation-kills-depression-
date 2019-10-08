<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'social_site');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['pass']);
  $password_2 = mysqli_real_escape_string($db, $_POST['conpass']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM signup WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
  	$query = "INSERT INTO signup (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}
// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['pass']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM signup WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: http://localhost/social-website-for-help/forum.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}
if (isset($_POST['submitadmin'])) {
	$username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['adminpsw']);
	if ($username=='admin' && $password=='Admin123'){
		$_SESSION['username']=$username;
		header( 'Location: http://localhost/social-website-for-help/admin.php' );
	}
	else{
		header( 'Location: http://localhost/social-website-for-help/admin_login.php' );
	}
}
if (isset($_POST['deletepost'])) {
  $id=$_POST['quantity'];
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "social_site";
  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  
  // sql to delete a record
  $sql = "DELETE FROM `post` WHERE `topic_id`='$id'";
  
  if ($conn->query($sql) === TRUE) {
    header( 'Location: http://localhost/social-website-for-help/admin.php' );
  } else {
    header( 'Location: http://localhost/social-website-for-help/admin.php' );
  }
  
  $conn->close();
}
if (isset($_POST['acceptpost'])) {
  $id=$_POST['quantity'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "social_site";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE `post` SET `flag`=0 WHERE `topic_id`='$id'";

if ($conn->query($sql) === TRUE) {
  header( 'Location: http://localhost/social-website-for-help/admin.php' );
} else {
  header( 'Location: http://localhost/social-website-for-help/admin.php' );
}

$conn->close();
}
?>