<?php
//To Handle Session Variables on This Page
session_start();
//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");
//If user Actually clicked register button
if(isset($_POST)) {
	
	//Escape Special Characters In String First
	$firstname = mysqli_real_escape_string($conn, $_POST['fname']);
	$lastname = mysqli_real_escape_string($conn, $_POST['lname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	//Encrypt Password
	$password = base64_encode(strrev(md5($password)));

	$sql = "SELECT email FROM users WHERE email='$email'";
	$result = $conn->query($sql);
	if($result->num_rows == 0) {



			$sql = "INSERT INTO users(firstname,last_name,email,password) VALUES('$firstname','$lastname','$email','$password')";

			if($conn->query($sql)===TRUE){
				$_SESSION['registerCompleted']=TRUE;
				header("Location: login.php");
				exit();
			}else
			{
				echo "Error" . $sql ."<br>" . $conn->error;
			}
	}else {
		$_SESSION['registerError']=true;
		header("Location: register.php");
		exit();
		# code...
	}
	$conn->close();
	//sql query to check if email already exists or not
	}else {
		header("Location: register.php");
		exit();
		# code...
	}