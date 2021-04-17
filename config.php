<?php
$db_host='localhost';
$db_user='root';
$db_pwd='';
$database='library';
$connection = mysqli_connect("localhost", "root", "", "databse_name");
if(!mysqli_connect($db_host,$db_user,$db_pwd)){
    die("can't Connect to Database");
}
    

$db_select = mysqli_select_db($connection, $database);
if (!$db_select) {
    error_log("Database selection failed: " . mysqli_error($connection));
    die('Internal server error');
}
    
?>