<?php
session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>Job Portal</title>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">JOB PORTAL</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <li><a href="../company/profile.php">Profile</a></li>
    <li><a href="../logout.php">Logout</a></li>

    
  </div>
</nav>
    </header>


<div class="container">
  <?php if(isset($_SESSION['jobPostSuccess'])) { ?>
  <div class="row">
    <div class="alert alert-success">
      Job Post Created Successfully!
    </div>
  </div>  
    <?php unset($_SESSION['jobPostSuccess']); } ?>

      <?php if(isset($_SESSION['jobPostUpdateSuccess'])) { ?>
  <div class="row">
    <div class="alert alert-success">
      Job Post Updated Successfully!
    </div>
  </div>  
    <?php unset($_SESSION['jobPostUpdateSuccess']); } ?>

      <?php if(isset($_SESSION['jobPostDeleteSuccess'])) { ?>
  <div class="row">
    <div class="alert alert-success">
      Job Post Deleted Successfully!
    </div>
  </div>  
    <?php unset($_SESSION['jobPostDeleteSuccess']); } ?>


      <div class="row">
        <h2>Dashboard</h2>
        <div class="col-md-2">
          <a href="create-job-post.php" class="btn btn-success btn-block btn-lg">Create Job Post</a>
        </div>
        <div class="col-md-2">
          <a href="view-job-post.php" class="btn btn-success btn-block btn-lg">View Job Post</a>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>