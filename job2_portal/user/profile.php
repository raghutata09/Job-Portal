  <?php
session_start();
if (empty($_SESSION['id_user'])) {
    header("Location: ../index.php");
    exit();
  # code...
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

    <title>Hello, world!</title>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">JOB PORTAL</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <li><a href="../profile.php">Profile</a></li>
    <li><a href="../logout.php">Logout</a></li>

    
  </div>
</nav>
    </header>


<section>
	<div class="container">
		<div class="row">
			<div class="col-mod-6 col-md-offset-4 well">
				 <h2 class="text-center">PROFILE</h2>
					<form method="post" action="updateprofile.php">
            <?php
              $sql= "SELECT * FROM users WHERE id_user='$_SESSION[id_user]'";
              $result = $conn->query($sql);
              if($result->num_rows > 0)
              {
                while ($row = $result->fetch_assoc()) {

            ?>


            <div class="form-group">
                <label for="name">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $row['firstname']; ?> " placeholder="First Name" >
              </div>
              <div class="form-group">
                <label for="name">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $row['last_name']; ?> "  placeholder="Last Name" >
              </div>
						  <div class="form-group">
						    <label for="email">Email address</label>
						    <input type="email" class="form-control" id="email" name="email"  value="<?php echo $row['email']; ?> " placeholder="Email" >
						  </div>
              <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address" placeholder="Address" rows="5" > <?php echo $row['address']; ?> " </textarea> 
              </div>
              <div class="form-group">
                <label for="city">City</label>
                <input type="text"  class="form-control" id="city" name="city" value="<?php echo $row['city']; ?> "  placeholder="City" >
              </div>
              <div class="form-group">
                <label for="state">State</label>
                <input type="text"  class="form-control" id="state" name="state"  value="<?php echo $row['state']; ?> " placeholder="state">
              </div>
              <div class="form-group">
                <label for="contactno">Contact number</label>
                <input type="text"  class="form-control" id="contactno" name="contactno" value="<?php echo $row['contactno']; ?> "  placeholder="contactno" >
              </div>              
              <div class="form-group">
                <label for="qualification">Highest Qualification</label>
                <input type="text"  class="form-control" id="qualification" name="qualification" value="<?php echo $row['qualification']; ?> "  placeholder="qualification" >
              </div>              
              <div class="form-group">
                <label for="stream">Stream</label>
                <input type="text"  class="form-control" id="stream" name="stream" value="<?php echo $row['stream']; ?> "  placeholder="stream" >
              </div>

              <div class="form-group">
                <label for="passingyear">Passing Year</label>
                <input type="date"  class="form-control" id="passingyear" name="passingyear" value="<?php echo $row['passingyear']; ?> "  placeholder="passingyear">
              </div>              
              <div class="form-group">
                <label for="dob">Date Of Birth</label>
                <input type="date"  class="form-control" id="dob" name="dob" value="<?php echo $row['dob']; ?> "  placeholder="DATE OF BIRTH" required="">
              </div>

              <div class="form-group">
                <label for="age">Age</label>
                <input type="text"  class="form-control" id="age" name="age" value="<?php echo $row['age']; ?> "  placeholder="age">
              </div>              
              <div class="form-group">
                <label for="designation">Designation</label>
                <input type="text"  class="form-control" id="designation" name="designation" value="<?php echo $row['designation']; ?> "  placeholder="Designation">
              </div>


						  <button type="submit" class="btn btn-success">UPDATE</button>
              <?php
            }
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