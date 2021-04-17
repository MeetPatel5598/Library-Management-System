<?php
  session_start();
  if (isset($_SESSION['username'])) {
      include('header.html');
      include('student_side.html');
      include('includes/db_connection.php');
      include('includes/functions.php');
      $username = $_SESSION['username'];

      $query = "SELECT * FROM student WHERE email = '$username'";
      $result = mysqli_query($connection,$query);
		
		if (mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)) {
				$id = $row['s_id'];
        $name = $row['name'];
				$email = $row['email'];
				$mobile = $row['mobile'];
				$address = $row['address'];
				$semester = $row['semester'];
			}
		}else{
			echo "<script>alert('Wrong user');</script>";
		}

		if (isset($_POST['submit'])) {

			$username = $_SESSION['username'];
			$name = $_POST['S_name'];
			$mobile = $_POST['mobile'];
			$address = $_POST['address'];
			$semester = $_POST['semester'];

			$query = "UPDATE student SET name = '$name',mobile = '$mobile', address = '$address', semester = '$semester' WHERE S_id = '$id'";
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
                  	  <h1 class="mb"><center>Form Edit</center></h1>
                  	  			<!--	<h4>  -->

                      <form class="form-horizontal style-form" action="edit_profile.php" method="POST">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Student Id</label>
                              <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input class="form-control" id="disabledInput" autocomplete="off" type="text" value="<?php echo $id; ?>" disabled name="sid">
                              </div>
    
                              <label class="col-sm-2 col-sm-2 control-label">Name</label>
                              <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="text" class="form-control" autocomplete="off" value="<?php echo $name; ?>" name="S_name" required>
                              </div>

                              <label class="col-sm-2 col-sm-2 control-label">Email Id</label>
                              <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="email" class="form-control" value="<?php echo $email; ?>" name="eid" disabled="disabled">
                              </div>

                              <label class="col-sm-2 col-sm-2 control-label">Mobile No</label>
                              <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="text" class="form-control" autocomplete="off" value="<?php echo $mobile; ?>" name="mobile" required pattern="[6789][0-9]{9}" title="First character should 6,7,8 or 9 and length is 10 digit">
                              </div>

                              <label class="col-sm-2 col-sm-2 control-label">Address</label>
                              <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="text" class="form-control" autocomplete="off" value="<?php echo $address; ?>" name="address" required>
                              </div>

                              <label class="col-sm-2 col-sm-2 control-label">Semester</label>
		                        <select class="form-control" value="<?php echo $semester; ?>" style="margin-bottom:10px; width: 78.9%; margin-left:140px;" name="semester">
			<option value="1" <?php if($semester==1){ echo "selected='selected'";} ?>>1</option>
      <option value="2" <?php if($semester==2){ echo "selected='selected'";} ?>>2</option>
      <option value="3" <?php if($semester==3){ echo "selected='selected'";} ?>>3</option>
      <option value="4" <?php if($semester==4){ echo "selected='selected'";} ?>>4</option>
      <option value="5" <?php if($semester==5){ echo "selected='selected'";} ?>>5</option>
      <option value="6" <?php if($semester==6){ echo "selected='selected'";} ?>>6</option>
      <option value="7" <?php if($semester==7){ echo "selected='selected'";} ?>>7</option>
      <option value="8" <?php if($semester==8){ echo "selected='selected'";} ?>>8</option>
      </select>
                              
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