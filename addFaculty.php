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
    $f_id = mysqli_real_escape_string($connection,$_POST['f_id']);
    $name = mysqli_real_escape_string($connection,$_POST['name']);
    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $mobile = mysqli_real_escape_string($connection,$_POST['mob']);

    $query = "SELECT * FROM login WHERE username = '$email'";
    $result = mysqli_query($connection,$query);
    if (mysqli_num_rows($result) == 1) {
        echo "<script>alert('Username already exist!') </script>";
    } else {
      new_user_added_mail($email);
      $q1="INSERT INTO faculty (f_id,name,email,mobile) VALUES ('$f_id','$name','$email','$mobile')";
      $q2="INSERT INTO login (username,password,utype) VALUES ('$email','$email','faculty')";
      if (mysqli_query($connection,$q1) && mysqli_query($connection,$q2)) {
        echo "<script>alert('Faculty added') </script>";  
      }
    }
  }
?>
<script>
  function getuserdata() {
    $("#loaderIcon").show();
    jQuery.ajax({
      url: "get_user_add.php",
      data:'userid='+$("#userid").val(),
      type: "POST",
      success:function(data){
        $("#get_user_name").html(data);
        $("#loaderIcon").hide();
      },
      error:function (){}
    });
  }
</script>
<section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Add Faculty</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel" style="margin:200px; margin-top:10px;">
                  	  <h1 class="mb"><center> Add Faculty</center></h1>
                  	  			<!--	<h4>  -->

                      <form class="form-horizontal style-form" method="post">
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Faculty ID</label>
                            <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="text" name="f_id" id="userid" autocomplete="off" required="required" onBlur="getuserdata()" class="form-control">
                                   <br>
                                  <span id="get_user_name" style="font-size:16px;"></span>
                            </div>
                          </br>

                            <label class="col-sm-2 col-sm-2 control-label">Name</label>
                            <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="text" name="name" autocomplete="off" required="required" class="form-control">
                            </div>


                             <label class="col-sm-2 col-sm-2 control-label">Email</label>
                             <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="email" name="email" autocomplete="off" required="required" class="form-control">
                              </div>

                             <label class="col-sm-2 col-sm-2 control-label">Mobile No</label>
                             <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="text" name="mob" autocomplete="off" required="required" pattern="[6-9]{1}[0-9]{9}" class="form-control">
                              </div>

                            <button type="submit" name="submit" style="margin-bottom:10px; width: 96%; margin-left:15px;" class="btn btn-success btn-lg btn-block">Add</button>
                        
            </div>  
                </div><!-- /form-panel -->
              </div><!-- /col-lg-12 -->
            </div>
            
    </section>
      </section>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" ></script>
    <script type="text/javascript">
        
        $(function(){
              $('select.styled').customSelect();
        });

      </script>
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