<?php
  session_start();
  if (isset($_SESSION['username'])) {
      include('/includes/db_connection.php');
?>
<html>
   <head></head>
   <body>
      <?php
         $email=$_POST['email'];
         $to = $email;

         $query="SELECT password FROM login WHERE username='$email' ";
         if($result = mysqli_query($connection, $query)){
            if(mysqli_num_rows($result) > 0){
               while($row = mysqli_fetch_array($result)){
                  $password = $row['password'];
               }
               mysqli_free_result($result);
            } else{
               echo "<script>alert('No records found')</script>";
            }
         } else{
            echo "<script>alert('Incorrect email ID')</script>";
         }

         $subject = "Forgot password";
         
         $message = "<h1>your password is {$password} </h1>";
         
         $header = "From:bvmitlibraryportal@gmail.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            header('Location: index.php');
            #echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
      ?>
      <?php }else{
  header('Location: index.php');
}?>
   </body>
</html>