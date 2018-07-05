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

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB">



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
              <h1 class="display-4">Search Job</h1>
              <hr class="my-4">
              <p>Find your Dream job</p>
            </div>
                        
          </div>
          
        </div>
      </div>
      
    </section>











    <section>
       <div class="container">
        <div class="row">
          <div class="col-md-12">
          <form id="myForm" class="form-inline">
            <div class="form-group">
              <label>Experience</label>
              <select id="experiencerequired" class="form-control">
                <option value="" selected="">Select Experience</option>
                <option value="1 Year">1 Year</option>
                <option value="2 Years">2 Years</option>
                <option value="3 Years">3 Years</option>
                <option value="4 Years">4 Years</option>
                <option value="5 Years">5 Years</option>
              </select>              
            </div>
            <div class="form-group">
              <label>Qualification</label>
              <select id="qualificationrequired" class="form-control">
                <option value="" selected="">Select Qualification</option>
                <?php
                  $sql = "SELECT DISTINCT(qualificationrequired) FROM job_post WHERE qualificationrequired IS NOT NULL";
                  $result = $conn->query($sql);
                  if($result->num_rows > 0) 
                  {
                      while($row = $result->fetch_assoc()){
                        echo "<option value'".$row['qualificationrequired']."'>".$row['qualificationrequired']."</option>";
                  }
                }
                ?>
              </select>              
            </div>
          <button class="btn btn-success">Search</button>
          </form>
          </div>
        </div>
        <div class="row" style="margin-top: 5%;">
         <div class="table-responsive">
          <table id="myTable" class="table">
            <thead>
              <th>Job Name</th>
              <th>Job Description</th>
              <th>Minimum Salary</th>
              <th>Maximum Salary</th>
              <th>Experience</th>
              <th>Qualification</th>
              <th>Action</th>
            </thead>
            <tbody>
              
            </tbody>
            </table>
        </div>
      </div>
    </div>
    </section>









    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
      $(function() {

        var oTable = $('#myTable').DataTable({
          "autoWidth":false,
          "ajax" : {
            "url" : "refresh_job_search.php",
            "dataSrc" : "",
            "data" : function(d) {
              d.experiencerequired = $("#experiencerequired").val();
              d.qualificationrequired = $("#qualificationrequired").val();
            }
          }
        });
        $("myForm").on("submit", function(e){
          e.preventDefault();
          oTable.ajax.reload(null, false);
        })
      });
    </script>
    
  </body>
</html>