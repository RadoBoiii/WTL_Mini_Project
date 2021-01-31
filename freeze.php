<?php
  $servername='localhost';
  $username='root';
  $password='';
  $dbname = "ott";
  $conn=mysqli_connect($servername,$username,$password,"$dbname");
    if(!$conn){
      die('Could not Connect MySql Server:' .mysql_error());
    }
if(isset($_POST['submit']))
{
     $emailid = stripslashes($_REQUEST['emailid']);
     $query = "SELECT * FROM freeze_account WHERE email_id='$emailid'";


    $result = mysqli_query($conn, $query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
    if ($rows == 1) {
    //   $_SESSION['emailid'] = $emailid;
      // Redirect to user student page
      header("Location: login.html");
    }
    else {
      echo " <script>
        alert('Username or Password Invalid .!');
        location = 'login.html';
        </script>";
    }
    mysqli_close($conn);
}
?>
