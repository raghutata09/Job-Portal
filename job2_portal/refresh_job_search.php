<?php
//To Handle Session Variables on This Page
session_start();

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");
//If user Actually clicked apply button

$sql = "SELECT * FROM job_post";
if(!empty($_GET['experiencerequired'])) {
	$sql = $sql . " WHERE experiencerequired='$_GET[experiencerequired]'";
}

if(!empty($_GET['qualificationrequired']) && !empty($_GET['experiencerequired'])){
	$sql = $sql . " AND qualificationrequired='$_GET[qualificationrequired]'";
}else if(!empty($_GET['qualificationrequired'])){
	$sql = $sql . " WHERE qualificationrequired='$_GET[qualificationrequired]'";
}
$result = $conn->query($sql);
if($result->num_rows > 0) 
{
   	while($row = $result->fetch_assoc()){
         if(isset($_SESSION['id_user'])){
            $sql1 = "SELECT * FROM apply_job_post WHERE id_user='$_SESSION[id_user]' AND id_jobpost='$row[id_jobpost]'";
            $result1 = $conn->query($sql1);
            if($result1->num_rows > 0) 
            {
               $apply = "<strong>Applied</strong>";
            }else {
               $apply = "<a href='apply-job-post.php?id=".$row['id_jobpost']."'>Apply</a>";
            }
         }else {
               $apply = "<a href='apply-job-post.php?id=".$row['id_jobpost']."'>Apply</a>";
            }


   		$json[]=array(
   			0 => $row['jobtitle'],
   			1 => $row['jobdescription'],
   			2 => $row['minsalary'],
   			3 => $row['maxsalary'],
   			4 => $row['experiencerequired'],
   			5 => $row['qualificationrequired'],
            6 => $apply,
   		 );
   	}
   	echo json_encode($json);
}