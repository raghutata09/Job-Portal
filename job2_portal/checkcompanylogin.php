<?php
//To Handle Session Variables on This Page
session_start();
//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");

if(isset($_POST)) {
	//Escape Special Characters in String
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	//Encrypt Password
	$password = base64_encode(strrev(md5($password)));
	//sql query to check user login
	$sql = "SELECT company_id, companyname, email FROM company WHERE email='$email' AND password='$password'";
	$result = $conn->query($sql);
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$_SESSION['name'] = $row['companyname'];
			$_SESSION['email'] =  $row['email'];
			$_SESSION['id_user'] = $row['company_id'];
			$_SESSION['companyLogged'] = true;
			header("Location: company/dashboard.php");
			exit();
		}
	}
	else{
		$_SESSION['loginError'] = true;
		header("Location: company-login.php");
			exit();
	}
	$conn->close();
	}else
	{
		header("Location: company-login.php");
		exit();
	}