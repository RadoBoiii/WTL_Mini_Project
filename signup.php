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
if(isset($_POST['submit']))
{
     $userid = $_POST['userid'];
     $name = $_POST['name'];
     $contactno = $_POST['contactno'];
     $emailid = $_POST['emailid'];
     $passw = $_POST['passw'];
     $user_type = $_POST['students'];

     if($user_type == 'yes')
     {
       $uniemailid = $_POST['uniemailid'];
       $uniname = $_POST['uniname'];
       $sql = "INSERT INTO user_reg(user_id,user_name,university_name, university_email,contact_no) VALUES('$userid','$name','$uniname','$uniemailid', '$contactno')";
     }
     else
     {
       $sql = "INSERT INTO user_reg(user_id,user_name,email_id,contact_no) VALUES('$userid','$name','$emailid', '$contactno')";
     }

      $sql1 = "INSERT INTO customer(user_id, email_id, password) VALUES('$userid','$emailid', '$passw')";
      $_SESSION['userid'] = $userid;
     if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql1)) {
         echo " <script>
        alert('Account Generated. Please LogIn.');
        </script>";
        if($user_type == 'yes')
        {
          header("Location: planstudent.html");
        }
        else
        {
          header("Location: planregular.html");
        }
        exit();
     }
     else
     {

        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
}
  ?>
