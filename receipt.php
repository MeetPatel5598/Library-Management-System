<?php
  session_start();
  if (isset($_SESSION['username'])) {
      include('includes/db_connection.php');
      include('includes/functions.php');
      $userid = $_GET['id'];
?>
<?php
$q1="SELECT bookissue.id,bookissue.bookid,bookissue.userid,book.title,bookissue.issueDate,bookissue.returnDate,bookissue.fine FROM bookissue JOIN book ON book.id=bookissue.bookid WHERE bookissue.userid = '$userid'";
$e1=$connection->query($q1);
?>
<html>
<head>
    <title>Library - IT Department</title>
    <link rel="icon" type="image/gif/png" href="assets/img/BVM.png">
    <meta Http-Equiv="Cache-Control" Content="no-cache">
    <meta Http-Equiv="Pragma" Content="no-cache">
    <meta Http-Equiv="Expires" Content="0">
    </head>
<style type="text/css">
	@media print {
		.btn {
			display: none;
		}
	}
</style>
<body>
	<br><br>
	<button class="btn btn-success" onclick="window.print()" style="float: right; margin-right: 50px;">Print</button>
	<br><br><br>
	<center><img src="assets/img/BVM.png" width="100" height="100"></center>
	<center><h2>Birla Vishvakarma Mahavidyalaya</h1></center>
	<center><h3>Library - Department of Information Technology</h4></center>
	<center>
	<?php
		while($r=$e1->fetch_object()){
    ?>
	<table frame="box" style="border: 1px solid #000000; padding: 20px;">
		<tr>
			<td><b>Book Issue ID#:</b></td> <td><?php echo $r->id; ?></td>
			<td align="right"><b>Date:</b></td> <td><?php echo date('d-m-Y'); ?></td>
		</tr>
		<tr>
			<td colspan="2"><b>User ID:</b></td> <td colspan="2"><?php echo $r->userid; ?></td>
		</tr>
		<tr>
			<td colspan="2"><b>User Name:</b></td> <td colspan="2">
				<?php 
				if (preg_match('/^[1-9]{2}IT[0-9]{3}/',$r->userid)){
					$query = "SELECT name FROM student WHERE s_id = '$r->userid'";
                    $result = mysqli_query($connection,$query);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)) {
                            $name = $row['name'];
                        }
                    }
                } else {
                    $query = "SELECT name FROM faculty WHERE f_id = '$r->userid'";
                    $result = mysqli_query($connection,$query);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)) {
                            $name = $row['name'];
                        }
                    }
                }
                echo $name;
                ?>
			</td>
		</tr>
		<tr>
			<td colspan="2"><b>Book ID:</b></td> <td colspan="2"><?php echo $r->bookid; ?></td>
		</tr>
		<tr>
			<td colspan="2"><b>Book Name:</b></td> <td colspan="2"><?php echo $r->title; ?></td>
		</tr>
		<tr>
			<td colspan="2"><b>Issue Date:</b></td> <td colspan="2"><?php echo $r->issueDate; ?></td>
		</tr>
		<tr>
			<td colspan="2"><b>Retrun Date:</b></td> <td colspan="2"><?php echo $r->returnDate; ?></td>
		</tr>
		<tr>
			<td colspan="2"><b>Fine Amount(in Rs.):</b></td> <td colspan="2"><?php echo $r->fine; ?></td>
		</tr>
	</table>
<?php } ?>
</center><br><br><br><br>
	<p style="float: right; margin-right: 100px;">(Librarian Sign)</p><br><br><br>
</body>
<?php } ?>
</html>