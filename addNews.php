<?php
  session_start();
  if (isset($_SESSION['username'])) {
      include('header.html');
      include('adminside.html');
      include('includes/db_connection.php');
      include('includes/functions.php');
?>
<?php
  if(isset($_POST['submit'])){

  	$target="News/".basename($_FILES['image']['name']);
    $bname = mysqli_real_escape_string($connection,$_POST['bname']);
    $author = mysqli_real_escape_string($connection,$_POST['author']);
    $edition = mysqli_real_escape_string($connection,$_POST['edition']);
    $publisher = mysqli_real_escape_string($connection,$_POST['publisher']);
    //$link = mysqli_real_escape_string($connection,$_POST['link']);
    
    $image=$_FILES['image']['name'];

    
    
    $q1="INSERT INTO news (bname,author,edition,publisher,link) VALUES ('$bname','$author','$edition','$publisher','$image')";
    if (!mysqli_query($connection,$q1)) {
       echo "<script>alert('News not Added') </script>";
    }else{
    	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
    		# code...
    		echo "<script>alert('News added') </script>";
    	}
        else{
        	echo "<script>alert('News added But image  is not uploaded') </script>";
        }
    }
  }
?>
<section id="main-content">
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i>News</h3>
            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel" style="margin:200px; margin-top:10px;">
                      <h1 class="mb"><center> Add News</center></h1>
                            <!--  <h4>  -->

                      <form class="form-horizontal style-form" method="post" enctype="multipart/form-data">
                      	
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Title</label>
                            <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="text" name="bname" autocomplete="off" required="required" class="form-control">
                            </div>

                            <label class="col-sm-2 col-sm-2 control-label">Date</label>
                            <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="Date" name="author" autocomplete="off" required="required" class="form-control">
                            </div>


                             <label class="col-sm-2 col-sm-2 control-label">Description</label>
                             <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="text" name="edition" autocomplete="off" required="required" class="form-control">
                              </div>

                             <label class="col-sm-2 col-sm-2 control-label">Link (Optional)</label>
                             <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="text" name="publisher" autocomplete="off"  class="form-control">
                              </div>

                              <label class="col-sm-2 col-sm-2 control-label">Add PDF (Optional)</label>
                             <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="file" name="image"  class="form-control">
                              </div>                              

                            <button type="submit" name="submit" style="margin-bottom:10px; width: 96%; margin-left:15px;" class="btn btn-success btn-lg btn-block">Add</button>
                        
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
      <?php } else{
  header('Location: index.php');
}?>
    </body>
  </html>