  <?php
session_start();
if (isset($_SESSION['id_user'])) {
    header("Location: user/dashboard.php");
    exit();
  # code...
}
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
    if (isset($_SESSION['id_user'])) {
      ?>
      <li><a href="user/dashboard.php">Dashboard</a></li>
      <li><a href="logout.php">Logout</a></li>
      <?php
    }else{ ?>
    <li><a href="company.php">Company</a></li>
    <li><a href="register.php">Register</a></li>
    <li class="active"><a href="login.php">Login</a></li>

    <?php }?>
    
  </div>
</nav>
    </header>


<section>
	<div class="container">
		<div class="row">
			<div class="col-mod-4 col-md-offset-4 well">
				 <h2 class="text-center">Company REGISTER</h2>
					<form method="post" action="addcompany.php">
            <div class="form-group">
                <label for="companyname">Company Name</label>
                <input type="text" class="form-control" id="companyname" name="companyname" placeholder="Company Name" required="">
              </div>
              <div class="form-group">
                <label for="headofficecity">Head Office City</label>
                <input type="text" class="form-control" id="headofficecity" name="headofficecity" placeholder="Head Office City" required="">
              </div>
			<div class="form-group">
                <label for="contactnumber">Contact Number</label>
                <input type="text" class="form-control" id="contactnumber" name="contactnumber" placeholder="Contact Number" required="">
              </div>
              <div class="form-group">
                <label for="website">Website</label>
                <input type="text" class="form-control" id="website" name="website" placeholder="website">
              </div>
              <div class="form-group">
                <label for="companytype">Company Type</label>
                <input type="text" class="form-control" id="companytype" name="companytype" placeholder="Company type">
              </div>
              <div class="form-group">
			<label for="email">Company Email address</label>
			<input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">
			 </div>
			<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="Password" required="">
			</div>
			 <button type="submit" class="btn btn-success">Submit</button>
              <?php
              if (isset($_SESSION['registerError'])) {
                 ?>
              <div>
                <p class="text-center">Email Already exists!!! Please choose different account!!</p>
              </div>
              <?php
                unset($_SESSION['registerError']);
              }            
              ?>
					</form>
			</div>
			
		</div>
	</div>

</section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>