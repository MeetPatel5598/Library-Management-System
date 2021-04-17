<?php
  session_start();
  if (isset($_SESSION['username'])) {
      include('header.html');
      include('faculty_side.html');
      include('includes/db_connection.php');
      include('includes/functions.php');
?>
<?php

  if(isset($_POST["submit"])){
    $id = mysqli_real_escape_string($connection,$_POST['id']);
    $title = mysqli_real_escape_string($connection,$_POST['title']);
    $suggestion = mysqli_real_escape_string($connection,$_POST['suggestion']);

    $query = "INSERT INTO feedback_form (id,title, suggestion) VALUES ('$id', '$title', '$suggestion')";

    if (mysqli_query($connection, $query)) {
      echo "<script>alert('Feedback sent successfully!');</script>";
    } else {
      echo "<script>alert('Oops! try again');</script>";
    }

    mysqli_close($connection);
}
?>

<section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Feedback</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel" style="margin:200px; margin-top:10px;">
                  	  <h1 class="mb"><center>Feedback Form</center></h1>
                  	  			<!--	<h4>  -->

                      <form class="form-horizontal style-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                          <div class="form-group">
                            
                              <label class="col-sm-2 col-sm-2 control-label">Faculty ID</label>
                              <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="text" class="form-control" autocomplete="off"  name="id" required>
                              </div>

                              <label class="col-sm-2 col-sm-2 control-label">Book title</label>
                              <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="text" class="form-control" autocomplete="off" name="title" required>
                              </div>

                              <label class="col-sm-2 col-sm-2 control-label">Suggestion</label>
                              <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="textarea" class="form-control" autocomplete="off" name="suggestion" required>
                              </div>

                              <input type="submit" name="submit" style="margin-bottom:10px; width: 96%; margin-left:15px;" class="btn btn-success btn-lg btn-block">
              		                   	
						</div>	
                      </form><!-- /form-panel -->
          		</div><!-- /col-lg-12 -->
          	</div>
          	
              </div>
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
</section>
<?php }else{
  header('Location: index.php');
}?>