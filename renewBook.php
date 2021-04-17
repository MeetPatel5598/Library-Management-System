<?php
  session_start();
  if (isset($_SESSION['username'])) {
      include('includes/db_connection.php');
?>      
<?php
  $id = $_GET['id'];
  $query = "SELECT issueDate FROM bookissue WHERE id='$id'";
  $result = mysqli_query($connection,$query);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $issueDate = $row['issueDate'];
    }
  }

  $newtime = strtotime($issuetime . ' + 10 days');
  $newReturnDate = date("Y-m-d H:i:s", $newtime);
  
  date_default_timezone_set('Asia/Kolkata');
  $newIssueDate = date("Y-m-d H:i:s");
  echo $newIssueDate;
  
  $query = "UPDATE bookissue SET issueDate = '$newIssueDate', returnDate = '$newReturnDate' WHERE id='$id'";
  if (mysqli_query($connection,$query)) {
    echo "<script>alert('Book renewed!');</script>";
  } else {
    echo "<script>alert('Oops! Try again');</script>";
  }
    
  header('Location: manageIssuedBook.php');
?>
<?php }else{
  header('Location: index.php');
}?>
