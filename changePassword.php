<?php
  session_start();
  if (isset($_SESSION['username'])) {
      include('header.html');
      include('student_side.html');
      include('includes/db_connection.php');
      include('includes/functions.php');
?>
<?php
  if(isset($_POST['submit'])){
    $username = $_SESSION['username'];
    $newpass = mysqli_real_escape_string($connection,$_POST['newpass']);
    $confpass = mysqli_real_escape_string($connection,$_POST['confpass']);
    if($newpass == $confpass ){
      if ($confpass != '') {
 
    $q1="UPDATE login SET password = '$confpass' WHERE username = '$username'";
    $result = mysqli_query($connection,$q1);
        if ($result){
          echo "<script>alert('Data Updated');</script>";
        }else{
          echo "<script>alert('Sorry! couldn't able to update');</script>";
        }
      }
      else {
      echo "<script>alert('Password Not Matched');</script>";
    }
    }
    else {
      echo "<script>alert('Password Not Matched');</script>";
    }
  }

?>
<section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Change Password</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel" style="margin:200px; margin-top:10px;">
                  	  <h1 class="mb"><center> Change Password</center></h1>
                  	  			<!--	<h4>  -->

                      <form class="form-horizontal style-form" method="post">
                          <div class="form-group">
                             <label class="col-sm-2 col-sm-2 control-label">New Password</label>
                              <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="password" autocomplete="off" class="form-control" name="newpass">
                              </div>

                              <label class="col-sm-2 col-sm-2 control-label">Confirm Password</label>
                              <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="password" autocomplete="off" class="form-control" name="confpass">
                              </div>

                            <button type="submit" name="submit" style="margin-bottom:10px; width: 96%; margin-left:15px;" class="btn btn-success btn-lg btn-block">Update</button></td>
            </div>  
                </div><!-- /form-panel -->
              </div><!-- /col-lg-12 -->
            </div>
            
    </section>
      </section>
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

<script>
 
        $(function(){
              $('select.styled').customSelect();
          });
      </script>
      <?php }else{
  header('Location: index.php');
}?>
    </body>
  </html>