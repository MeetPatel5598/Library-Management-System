<html>
  
   <head></head>
   <body>
      <?php
// include('/includes/db_connection.php');
      include('includes/db_connection.php');
         $to=$_POST['email'];
         



         $query="SELECT password FROM login WHERE username='$to' ";
         if($result = mysqli_query($connection, $query)){
            if(mysqli_num_rows($result) > 0){
               while($row = mysqli_fetch_array($result)){
                  $password = $row['password'];
               }
               mysqli_free_result($result);

         $generator="ABCDEFGHIJKLMNOPQRSTUVWxyz1234567890@#$%^&*";

         $passcode=substr(str_shuffle($generator),0,7);

         

         $sql="UPDATE login SET password='$passcode' WHERE username='$to'";

         if (mysqli_query($connection,$sql)) {
            echo "<script>alert('Password reset ...')</script>";
            header('Location: index.php');
         }
         else{
            echo "<script>alert('Something went wrong!')</script>";
         }
         
         
         $subject = "Forgot password";
         
         $message = "<h1>your password is {$passcode} </h1>";
         
         $header = "From:bvmitlibraryportal@gmail.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "<script>alert('Message sent successfully...')</script>";
            header('Location: index.php');            
         }else {
            echo "<script>alert('Message could not be sent...')</script>";
            header('Location: index.php');
         }
            } else{
               echo "<script>alert('No records found')</script>";
               header('Location: index.php');
            }
         } else{
            header('Location: index.php');  
         }
      ?>
   </body>
</html>