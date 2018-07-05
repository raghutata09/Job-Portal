<?php
session_start();
if(empty($_SESSION['id_user'])){
  header("Location : ../index.php");
  exit();
}
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
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Generate Resume</div>
          <div class="panel-body">
            <form class="form-horizontal" method="post" action="generate-resume-data.php">
              <h3>Personal Details Section</h3>
              <div class="form-group">
                <label class="col-md-4 control-label">Name</label>
                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" required="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label">Address</label>
                <div class="col-md-6">
                  <input type="text" name="address" class="form-control" required="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label">Phone</label>
                <div class="col-md-6">
                  <input type="text" name="phone" class="form-control" required="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label">Email</label>
                <div class="col-md-6">
                  <input type="text" name="email" class="form-control" required="">
                </div>
              </div>

              <h3>Experience Section</h3>
                <div class="form-group">
                <label class="col-md-4 control-label">Number of company you want to add for experience:</label>
                <div class="col-md-6">
                  <select name="experienceNo" class="form-control" id="experienceNo" required="">
                    <option value="0">Select Value</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </div>
              </div>


              <div id="experienceSection"></div>   
              <div class="form-group">
              <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Generate</button>
                </div>
              </div>




            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    
    <script>
      $("#experienceNo").on("change", function () {
        var numInputs = $(this).val();
        $("#experienceSectioni").html('');
        for(var i=0;i < numInputs; i++){
          var j=i+1;
          $("#experienceSection").append('<div class=<div class="form-group"><label class="col-md-4 control-label">Company Name ' + j + '</label><div class="col-md-6"><input type="text" name="companyname[]" class="form-group" required=""></div></div><div class=<div class="form-group"><label class="col-md-4 control-label">Location ' + j + '</label><div class="col-md-6"><input type="text" name="location[]" class="form-group" required=""></div></div><div class=<div class="form-group"><label class="col-md-4 control-label">Time Period ' + j + '</label><div class="col-md-6"><input type="text" name="timeperiod[]" class="form-group" required=""></div></div><div class=<div class="form-group"><label class="col-md-4 control-label">Position ' + j + '</label><div class="col-md-6"><input type="text" name="position[]" class="form-group" required=""></div></div><div class=<div class="form-group"><label class="col-md-4 control-label">Experience ' + j + '</label><div class="col-md-6"><input type="text" name="experience[]" class="form-group" required=""></div></div><hr>')
        }
      });
    </script>
  </body>
</html>
