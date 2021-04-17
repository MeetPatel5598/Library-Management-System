<?php
session_start();
$_SESSION['flagOne'] = 0;
require_once("includes/db_connection.php");
if(!empty($_POST["userid"])) {
	$userid = $_POST["userid"];
 	
 	if (preg_match('/^[1-9]{2}IT[0-9]{3}/',$userid)) {
 		$sql ="SELECT name FROM student WHERE s_id= '$userid'";
 		$results = mysqli_query($connection,$sql);
 		$cnt=1;
		if(mysqli_num_rows($results) > 0){
			while($row = mysqli_fetch_assoc($results)) {
				echo htmlentities($row['name']);
				echo "<script>$('#submit').prop('disabled',false);</script>";
			}
		} else {
			$_SESSION['flagOne'] = 1;
			echo "<span style='color:red'> </span>";
			echo "<script>$('#submit').prop('disabled',true);</script>";
		}
 	} else if(preg_match('/^T[0-9]{3}/',$userid)) {
 		$sql ="SELECT name FROM faculty WHERE f_id='$userid'";
 		$results = mysqli_query($connection,$sql);
 		$cnt=1;
		if(mysqli_num_rows($results) > 0){
			foreach ($results as $result) {
				echo htmlentities($result['name']);
				echo "<script>$('#submit').prop('disabled',false);</script>";
			}
		} else {
			$_SESSION['flagOne'] = 1;
			echo "<span style='color:red'> </span>";
			echo "<script>$('#submit').prop('disabled',true);</script>";
		}
 	} else {
 		echo "<span style='color:red'> Invaid Id .</span>";
		echo "<script>$('#submit').prop('disabled',true);</script>";
 	}
}
?>