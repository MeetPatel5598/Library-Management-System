<?php 
session_start();
$_SESSION['flagTwo'] = 0;
require_once("includes/db_connection.php");
if(!empty($_POST["bookid"])) {
	$bookid=$_POST["bookid"];
	$sql ="SELECT title,id FROM book WHERE id = '$bookid'";
	$results = mysqli_query($connection,$sql);
	$cnt=1;
	if(mysqli_num_rows($results) > 0){
		foreach ($results as $result) {?>
			<option value="<?php echo htmlentities($result['id']);?>"><?php echo htmlentities($result['title']);?></option>
			<?php  
			
			echo "<script>$('#submit').prop('disabled',false);</script>";
		}
	} else {?>
		<option class="others"></option>
		<?php
		$_SESSION['flagTwo'] = 1;
		echo "<script>$('#submit').prop('disabled',true);</script>";
	}
}
?>
