 <?php
session_start();
require_once("../db.php");
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
    <li><a href="../user/profile.php">Profile</a></li>
    <li><a href="../logout.php">Logout</a></li>

    
  </div>
</nav>
    </header>




   <div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="table-responsive">
        <h2 class="text-center">Applied Jobs</h2>
        <table class="table table-striped">
          <thead>
            <th>Job Name</th>
            <th>Job Description</th>
            <th>Minimum Salary</th>
            <th>Maximum Salary</th>
            <th>Experience</th>
            <th>Qualification</th>
            <th>Created At</th>
            <th>Action</th>
          </thead>
          <tbody>
            <?php
              $sql = "SELECT * FROM job_post INNER JOIN apply_job_post ON job_post.id_jobpost=apply_job_post.id_jobpost WHERE apply_job_post.id_user='$_SESSION[id_user]'";
              $result = $conn -> query($sql);
              if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) 
                {
                  
                  ?>
                    <tr>
                      <td><?php echo $row['jobtitle']; ?></td>
                      <td><?php echo $row['jobdescription']; ?></td>
                      <td><?php echo $row['minsalary']; ?></td>
                      <td><?php echo $row['maxsalary']; ?></td>
                      <td><?php echo $row['experiencerequired']; ?></td>
                      <td><?php echo $row['qualificationrequired']; ?></td>
                      <td><?php echo date("d-M-Y",strtotime($row['createdat'])); ?></td>
                    </tr>
                    <?php
                  }
                }
              $conn->close();

            ?>
          </tbody>
          </table>
      </div>
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