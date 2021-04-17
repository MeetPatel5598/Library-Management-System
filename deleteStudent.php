<?php
  session_start();
  if (isset($_SESSION['username'])) {
      include('header.html');
      include('adminside.html');
      include('includes/db_connection.php');
      include('includes/functions.php');
?> 
<?php
if(isset($_POST['submit']))
{
    $s_id = $_POST['name'];
    $query = "SELECT * FROM student WHERE  CONCAT(`s_id`, `name`,`semester`) LIKE '%".$s_id."%'";    
    $filter_Result = mysqli_query($connection, $query);
    $search_result = $filter_Result;
}
 else {
    $query = "SELECT s_id,name,email,mobile,address,semester FROM student";
    $filter_Result = mysqli_query($connection, $query);
    $search_result = $filter_Result;
}

?>     
<section id="main-content">
          <section class="wrapper">
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                       <div class="row" style="float: right;">
                          <form action="deleteStudent.php" method="post">  
                          <div class="col-md-4" style="width: 200px;">
                          <input type="text" class="form-control" name="name" id="search_text" autocomplete="off" placehoder="Search..." ></div>
                          <div class="col-md-2" style="width: 200px;">
                          <input type="submit" name="submit" value="Search" style="width: 50%;" class="btn btn-success ">
                          </div>
                       </form>
                     </div>
                     <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i>Manage Student</h4>
                             <hr> 
                             <thead>
                              <tr>
                                  <th>Student ID</th>
                                  <th>Name</th>
                                  <th>Email ID</th>
                                  <th>Mobile</th>
                                  <th>Address</th>
                                  <th>Semester</th>                                  
                                  <th>Action</th>
                              </tr>
                              </thead>
                              <tbody>
                                 <?php
                                  while($row = mysqli_fetch_array($search_result)){
                                ?>
                              <tr>
                                  <td><?php echo $row['s_id']; ?></td>
                                  <td><?php echo $row['name']; ?></td>
                                  <td><?php echo $row['email']; ?></td>
                                  <td><?php echo $row['mobile']; ?></td>
                                  <td><?php echo $row['address']; ?></td>
                                  <td><?php echo $row['semester']; ?></td>
                                 <td>
                                      <a href="delStudent.php?id=<?php echo $row['s_id']; ?>&email=<?php echo $row['email']; ?>">Delete</a>
                                  </td>
                                  </tr>                             
                              <?php
                                  }
                                  ?>
                              </tbody>
                          </table>

                      </div><!-- /content-panel -->
                  </div>
                  <!-- /col-md-12 -->
              </div><!-- /row -->

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
<script src="assets/js/jquery.js"></script>
  <script src="assets/js/jquery-1.8.3.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
  <script src="assets/js/jquery.scrollTo.min.js"></script>
  <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="assets/js/jquery.sparkline.js"></script>

      <script src="assets/js/common-scripts.js"></script>

  <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="assets/js/gritter-conf.js"></script>
<?php }else{
  header('Location: index.php');
}?>
