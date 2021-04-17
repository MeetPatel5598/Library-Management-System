<?php
	session_start();
    if(isset($_SESSION['username'])){
    	unset($_SESSION['username']);
     }
    // if(isset($_SESSION['facultyid'])){
    // 	unset($_SESSION['facultyid']);
    // }
    // if(isset($_SESSION['studentid'])){
    // 	unset($_SESSION['studentid']);
    // }
    session_destroy();
    header('Location: index.php');
?>