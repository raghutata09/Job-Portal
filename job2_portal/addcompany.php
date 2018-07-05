<?php
//To Handle Session Variables on This Page
session_start();
//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");
//If user clicked register button
if(isset($_POST)) {
	//Escape Special Characters In String First
	$companyname = mysqli_real_escape_string($conn, $_POST['companyname']);
	$contactnumber = mysqli_real_escape_string($conn, $_POST['contactnumber']);
	$website = mysqli_real_escape_string($conn, $_POST['website']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$companytype = mysqli_real_escape_string($conn, $_POST['companytype']);
	$headofficecity = mysqli_real_escape_string($conn, $_POST['headofficecity']);
	//Encrypt Password
	$password = base64_encode(strrev(md5($password)));
	//sql query to check if email already exists or not
	$sql = "SELECT email FROM company WHERE email='$email'";
	$result = $conn->query($sql);
	//if email not found then we can insert new data
	if($result->num_rows == 0) {
			
		$sql = "INSERT INTO company(companyname,headofficecity,contactnumber,website,companytype,email,password) VALUES ('$companyname','$headofficecity', '$contactnumber', '$website','$companytype', '$email', '$password')";
		if($conn->query($sql)===TRUE) {
			$_SESSION['registerCompleted'] = true;
			header("Location: company-login.php");
			exit();
		} else {
			echo "Error " . $sql . "<br>" . $conn->error;
		}
	} else {
		$_SESSION['registerError'] = true;
		header("Location: company-register.php");
		exit();
	}
	$conn->close();
} else {
	header("Location: company-register.php");
	exit();
}