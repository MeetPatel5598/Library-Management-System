<?php
  session_start();
  if (isset($_SESSION['username'])) {
      include('includes/db_connection.php');
?>      
<?php
  $id = $_GET['id'];
  $q1="DELETE FROM news WHERE bname='$id'";
  if(mysqli_query($connection, $q1)) {
    echo "<script>alert('Delete successfully!');</script>";
    header('Location: deleteNews.php');
  } else {
    echo "<script>alert('Oops! Try again');</script>";
  }
?>
<?php }else{
  header('Location: index.php');
}?>
