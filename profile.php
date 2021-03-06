<!DOCTYPE html>
<html>
<head>
  <title>Sign Up</title>
  <link rel="stylesheet" type="text/css" href="profilecss.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
</head>
<body>
  <div class="row">
  <img id="logoicon" src="assets/netfliximg.png">
  <img id="logoicon" src="assets/spotifyimg.png">
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-12 col-lg-5 mx-auto">
        <div class="card card-signup my-5"  id="container1">
          <div class="card-body">
            <h5 class="card-title text-center" style="color:rgb(255, 255, 255);font-weight: 600;">Profile</h5>
            <img class="center" src="assets/profile.png" alt=""/>
            <p class="center">PHP code to extract name from DB</p>
            <p class="center">PHP code to extract Plan from DB</p>
            <form class="form-signup" action="changePassword.php" method="POST">
            <div class="form-label-group">
                    <input type="text" id="oldPass" class="form-control" name="oldPass" placeholder="Old Password" required autofocus>
                    <label for="oldPass">Enter Old Password</label>
            </div>
            <div class="form-label-group">
                <input type="text" id="newPass" class="form-control" name="newPass" placeholder="New Password" required autofocus>
                <label for="newPass">Enter New Password</label>
            </div>
            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="change" style="background-color: rgb(0, 0, 0); border: black;">Change Password</button>
            </form>
		<?php
			if(isset($_POST['change']))
			{
	
				if($_POST['oldPass']==="")
				{
					echo "<span class=error>Please Enter Old Password</span>";
				}
				else
				{
					$oldPass= $_REQUEST['oldPass'];
					$sql2="SELECT * FROM DBName WHERE `password` = '$oldPass'";
					$result2=mysqli_query($conn, $sql2);
					if($result2)
					{
					$nr2=mysqli_num_rows($result2);
						if($nr2===0)
						{
							echo "<span class=error>Please enter an existing PASSWORD</span>";
						}
						else
						{
							$oldPass= $_REQUEST['oldPass'];
							if($_POST['newPass']!="")
							{
								$newPass= $_REQUEST['newPass'];
								$sql2="UPDATE DBName SET password='$newPass' WHERE password ='$oldPass'";
								mysqli_query($conn, $sql2);
							}
						echo "<span class=succ>Record changed Successfully!</span>";
					}
				 }
			}	 	
		}
		?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function myFunction1() {
      var student = document.getElementById("student").value;
      // var regular = document.getElementById("regular").value;
      var text = document.getElementById("university");
      if (student == "yes"){
        text.style.display = "block";
      } 
    }
    function myFunction2() {
      // var student = document.getElementById("student").value;
      var regular = document.getElementById("regular").value;
      var text = document.getElementById("university");
      if (regular == "no"){
        text.style.display = "none";
      } 
    }
    </script>

</body>
</html>