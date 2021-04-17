<?php
  session_start();
  if (isset($_SESSION['username'])) {
      include('includes/db_connection.php');
?>      
<?php
  $s_id = $_GET['id'];
  $email = $_GET['email'];
  $q0="DELETE FROM login WHERE username ='$email'";
  if(mysqli_query($connection, $q0)) {
    $q1="DELETE FROM student WHERE s_id='$s_id'";
    if(mysqli_query($connection, $q1)) {
      echo "<script>alert('Delete successfully!');</script>";
      header('Location: deleteStudent.php');
    } else {
      echo "<script>alert('Oops! Try again');</script>";
    } 
  } else {
    echo "<script>alert('Oops! Try again');</script>";
  }
?>
<?php }else{
  header('Location: index.php');
}?>
