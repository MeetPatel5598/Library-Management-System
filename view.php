<?php
require("includes/db_connection.php"); 
$bookid = $_GET['product'];


    $que=mysqli_query($connection,"SELECT * FROM bookissue WHERE bookid = '$bookid'");

    $output='';

    $q=mysqli_query($connection,"SELECT * FROM book WHERE id = '$bookid'");
        while($row=mysqli_fetch_array($q)){
            $bookid=$row['id'];
            $booktitle=$row['title'];
            $author=$row['author'];
            $publisher=$row['publisher'];
            $output.=' '.'ID : '.$bookid.' -- '.$booktitle.' -- '.$author.' -- '.$publisher;
        }        
    $count=mysqli_num_rows($que);
    if($count == 0){
        $output.=' 👍 '."is available";
        
    }
    else
    {
        while($row=mysqli_fetch_array($que)){ 
            $returnstatus=$row['returnStatus'];
            if ($returnstatus ==  1) {
                $output.=' 👍 '."is available";
                break;  
            }
            else
            {
                $output.=' 👎 '."is NOT available";
                break;
            }            
        }
    
    }
    echo "<script>alert('$output')</script>";
    echo ("<script LANGUAGE='JavaScript'>
    window.location.href='http://localhost/lms/index.php';
    </script>");

?>
