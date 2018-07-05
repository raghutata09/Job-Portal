<?php
session_start();
require_once("db.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>JOB PORTAL</title>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">JOB PORTAL</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <?php
    if (isset($_SESSION['id_user']) && empty($_SESSION['companyLogged'])) {
      ?>
      <li><a href="user/dashboard.php">Dashboard</a></li>
      <li><a href="logout.php">Logout</a></li>
      <?php
    } else if (isset($_SESSION['id_user']) && isset($_SESSION['companyLogged'])) {
      ?>
        <li><a href="company/dashboard.php">Dashboard</a></li>
        <li><a href="logout.php">Logout</a></li>
    <?php } else {
      ?>
    <li><a href="company.php">Company</a></li>
    <li><a href="register.php">Register</a></li>
    <li class="active"><a href="login.php">Login</a></li>

    <?php }?>
  </div>
</nav>
    </header>


    <section>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="jumbotron text-center">
              <h1 class="display-4">Job Portal</h1>
              <hr class="my-4">
              <p>Find your Dream job</p>
             <!-- <a class="btn btn-primary btn-lg" href="register.php" role="button">Register</a> -->
             <a class="btn btn-primary btn-lg" href="search.php" role="button">Search Job</a>
            </div>
                        
          </div>
          
        </div>
      </div>
      
    </section>











    <section>
       <div class="container-fluid">
        <div class="row">
          <h2>Latest Job Posts</h2>
            <?php
            $sql = "SELECT * FROM job_post ORDER BY Rand() Limit 2";
              $result = $conn->query($sql);
              if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) 
                {
                  ?>
                  <div class="col-mod-6 fixheight" style="border: 2px solid #000;">
                    <h3><?php echo $row['jobtitle']; ?></h3>
                    <p><?php echo $row['jobdescription']; ?></p>
                    <button class="btn btn-default">View</button>
                  </div>
                  <?php
                }
              }
            ?>
        </div>
      </div>
    </section>














    <section>
      <div class="container">
        <div class="row">
          <h2>Companies List</h2>
            
            <div class="col-xs-6 col-md-3">
              <a href="#" class="thumbnail">
              <img src="..." alt="...">
              </a>
            </div>
            <div class="col-xs-6 col-md-3">
              <a href="#" class="thumbnail">
              <img src="..." alt="...">
              </a>
            </div>
            <div class="col-xs-6 col-md-3">
              <a href="#" class="thumbnail">
              <img src="..." alt="...">
              </a>
            </div>
            <div class="col-xs-6 col-md-3">
              <a href="#" class="thumbnail">
              <img src="..." alt="...">
              </a>
            </div>

        </div>
      </div>
    </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <script type="text/javascript">
      $(function(){
          var maxHeight =0;

          $(".fixheight").each(function(){
              maxHeight= ($(this).height() > maxHeight ? $(this).height() : maxHeight);
          });
          $(".fixheight").height(maxHeight);
      });
    </script>
  </body>
</html>