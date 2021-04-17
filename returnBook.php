<?php
  session_start();
  if (isset($_SESSION['username'])) {
      include('includes/db_connection.php');
?>      
<?php
  $id = $_GET['id'];
  $time = date("Y-m-d H:i:s");
  $fine = $_POST['fine'];
  echo "{$fine}";
  $query = "UPDATE bookissue SET returnDate = '$time', returnStatus = 1, fine = '$fine', count = count - 1 WHERE id = '$id' and count >= 0";
  if(mysqli_query($connection, $query)) {
    echo "<script>alert('returned successfully!');</script>";
  } else {
    echo "<script>alert('Oops! Try again');</script>";
  }
  header('Location: manageIssuedBook.php');
?>
<?php }else{
  header('Location: index.php');
}?>
