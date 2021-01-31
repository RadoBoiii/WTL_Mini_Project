<?php
 $servername='localhost';
 $username='root';
 $password='';
 $dbname = "ott";
 $conn=mysqli_connect($servername,$username,$password,"$dbname");
   if(!$conn){
     die('Could not Connect MySql Server:' .mysql_error());
   }
session_start();
if(isset($_POST['emailid']))
{
    $emailid = stripslashes($_REQUEST['emailid']);
    $password = stripslashes($_REQUEST['password']);
    $option = $_REQUEST['options'];
    $query = "SELECT * FROM customer WHERE email_id='$emailid'
              AND password='$password'";
   $result = mysqli_query($conn, $query) or die(mysql_error());
   $rows = mysqli_num_rows($result);

   $query2 = "SELECT * FROM freeze_account WHERE email_id = '$emailid'";
   $result2 = mysqli_query($conn, $query2) or die(mysql_error());
   $rows2 = mysqli_num_rows($result2);

   if ($rows == 1) {
     $_SESSION['emailid'] = $emailid;
     // Redirect to user student page
     if($option == 'netflix')
     {
       header("Location: indexnetflix.html");
     }
     if($option == 'Spotify')
     {
       header("Location: indexspotify.php");
     }
   }
   elseif ($rows2 = 1) {

     header("Location: freeze.html");
     // code...
   }
   else {
     echo " <script>
       alert('Username or Password Invalid .!');
       location = 'login.html';
       </script>";
   }
}
 ?>
