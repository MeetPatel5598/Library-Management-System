<?php
  include('includes/db_connection.php');
  include('includes/functions.php');
?>
<?php
$output = '';
if(isset($_POST["query"])){
  $search = mysqli_real_escape_string($connect, $_POST["query"]);
  $query = "
  SELECT * FROM student
  WHERE s_id LIKE '%".$search."%' 
  OR name LIKE '%".$search."%' 
  OR email LIKE '%".$search."%' 
  ";
} else {
 $query = "SELECT * FROM student ORDER BY s_id
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0){
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
                                  <th>Student ID</th>
                                  <th>Name</th>
                                  <th>Email ID</th>
                                  <th>Mobile</th>
                                  <th>Address</th>
                                  <th>Semester</th>                                  
                                  <th>Action</th>
                              </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["s_id"].'</td>
    <td>'.$row["name"].'</td>
    <td>'.$row["email"].'</td>
    <td>'.$row["mobile"].'</td>
    <td>'.$row["address"].'</td>
    <td>'.$row["semester"].'</td>
   
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>