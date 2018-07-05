<?php
//To Handle Session Variables on This Page
session_start();
//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../db.php");
//If user Actually clicked register button
if(isset($_POST)) {
	
	
	$sql = "DELETE FROM job_post WHERE id_jobpost='$_GET[id]' AND company_id= '$_SESSION[id_user]'";

			if($conn->query($sql)===TRUE){
				$_SESSION['jobPostDeleteSuccess']=TRUE;
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