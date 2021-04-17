<?php
  session_start();
  if (isset($_SESSION['username'])) {
      include('header.html');
      include('faculty_side.html');
      include('includes/db_connection.php');
      include('includes/functions.php');
      $username = $_SESSION['username'];

      $query = "SELECT * FROM faculty WHERE email = '$username'";
      $result = mysqli_query($connection,$query);
		
		if (mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)) {
				$id = $row['f_id'];
        $name = $row['name'];
				$email = $row['email'];
				$mobile = $row['mobile'];
			}
		}else{
			echo "<script>alert('Wrong user');</script>";
		}

		if (isset($_POST['submit'])) {

			$username = $_SESSION['username'];
			$name = $_POST['F_name'];
			$mobile = $_POST['mobile'];
			
			$query = "UPDATE faculty SET name = '$name',mobile = '$mobile' WHERE f_id = '$id'";
      		$result = mysqli_query($connection,$query);
		
			if ($result){
				echo "<script>alert('Data updated');</script>";
			}else{
				echo "<script>alert('Sorry! couldn't able to update');</script>";
			}
		}
?>
<section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Edit Profile</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel" style="margin:200px; margin-top:10px;">
                  	  <h1 class="mb"><center>Edit profile</center></h1>
                  	  			<!--	<h4>  -->

                      <form class="form-horizontal style-form" action="faculty_edit_profile.php" method="POST">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Faculty Id</label>
                              <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input class="form-control" id="disabledInput" autocomplete="off" value="<?php echo $id; ?>" type="text" disabled name="fid">
                              </div>
    
                              <label class="col-sm-2 col-sm-2 control-label">Name</label>
                              <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="text" class="form-control" autocomplete="off" name="F_name" value="<?php echo $name; ?>" required>
                              </div>

                              <label class="col-sm-2 col-sm-2 control-label">Email Id</label>
                              <div class="col-sm-10" style="margin-bottom: 10px;" >
                                  <input type="email" class="form-control" autocomplete="off" name="eid" value="<?php echo $email; ?>" disabled="disabled">
                              </div>

                              <label class="col-sm-2 col-sm-2 control-label">Mobile No</label>
                              <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="text" autocomplete="off" value="<?php echo $mobile; ?>" class="form-control" name="mobile" required pattern="[6789][0-9]{9}" title="First character should 6,7,8 or 9 and length is 10 digit">
                              </div>
                              
                              	<input type="submit"style="margin-bottom:10px; width: 96%; margin-left:15px;" class="btn btn-success btn-lg btn-block" name="submit">
		                   	
                            	
                      
                              <!-- /form-panel -->
          		</div><!-- /col-lg-12 -->
                      </form>
                    </div>
              </div>
                </div>
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
              
    </section>
    <?php }else{
  header('Location: index.php');
}?>