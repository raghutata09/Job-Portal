<?php
//To Handle Session Variables on This Page
session_start();
//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../db.php");
//If user Actually clicked register button
if(isset($_POST)) {
	
	//Escape Special Characters In String First
	$jobtitle = mysqli_real_escape_string($conn, $_POST['jobtitle']);
	$jobdescription = mysqli_real_escape_string($conn, $_POST['jobdescription']);
	$minsalary = mysqli_real_escape_string($conn, $_POST['minsalary']);
	$maxsalary = mysqli_real_escape_string($conn, $_POST['maxsalary']);
	$experiencerequired = mysqli_real_escape_string($conn, $_POST['experiencerequired']);
	$qualificationrequired = mysqli_real_escape_string($conn, $_POST['qualificationrequired']);
	$sql = "INSERT INTO job_post(company_id,jobtitle,jobdescription,minsalary,maxsalary,experiencerequired,qualificationrequired) VALUES('$_SESSION[id_user]','$jobtitle','$jobdescription','$minsalary','$maxsalary','$experiencerequired','$qualificationrequired')";

			if($conn->query($sql)===TRUE){
				$_SESSION['jobPostSuccess']=TRUE;
				header("Location: dashboard.php");
				exit();
			}else
			{
				echo "Error" . $sql ."<br>" . $conn->error;
			}
	$conn->close();
	//sql query to check if email already exists or not
	}else {
		header("Location: dashboard.php");
		exit();
		# code...
	}