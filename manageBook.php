<?php
  session_start();
  if (isset($_SESSION['username'])) {
      include('header.html');
      include('adminside.html');
      include('includes/db_connection.php');
      include('includes/functions.php');
?>
<?php

    if(isset($_POST["submit_author"])){
    $name = mysqli_real_escape_string($connection,$_POST['name']);
    $q1="INSERT INTO author(name) VALUES('$name')";
      if (!mysqli_query($connection,$q1)) {
          echo "<script>alert('Oops! try again') </script>";
      } else {
           echo "<script>alert('Author record Is Added') </script>";
      }
    }
    if(isset($_POST["submit_publisher"])){
    $name = mysqli_real_escape_string($connection,$_POST['name']);
    $q1="INSERT INTO publisher(name) VALUES('$name')";

    if (!mysqli_query($connection,$q1)) {
        echo "<script>alert('Oops! try again') </script>";
    } else {
         echo "<script>alert('Publiser record Is Added') </script>";
    }
    }
    if(isset($_POST["submit_category"])){
    $name = mysqli_real_escape_string($connection,$_POST['name']);
    $q1="INSERT INTO category(name) VALUES('$name')";
      if (!mysqli_query($connection,$q1)) {
        echo "<script>alert('Oops! try again') </script>";
    } else {
         echo "<script>alert('Category record Is Added') </script>";
    }
    }
    if(isset($_POST["submit_supplier"])){
    $name = mysqli_real_escape_string($connection,$_POST['name']);
    $q1="INSERT INTO supplier(name) VALUES('$name')";
      if (!mysqli_query($connection,$q1)) {
        echo "<script>alert('Oops! try again') </script>";
    } else {
         echo "<script>alert('Supplier record Is Added') </script>";
    }
    }
    if(isset($_POST["submit_booktype"])){
    $name = mysqli_real_escape_string($connection,$_POST['name']);
    $q1="INSERT INTO booktype(name) VALUES('$name')";
      if (!mysqli_query($connection,$q1)) {
        echo "<script>alert('Oops! try again') </script>";
    } else {
         echo "<script>alert('Booktype record Is Added') </script>";
    }
}

?>


<section id="main-content">
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Manage Book</h3>
            <div class="row mt">
              <div class="col-lg-12">
               
                  <div class="form-panel" style="margin:200px; margin-top:1px; margin-bottom:6%;">
                      <h1 class="mb"><center> Add Author </center></h1>
                            <!--  <h4>  -->
                          
                      <form action="manageBook.php" class="form-horizontal style-form" method="POST">
                          <div class="form-group">
                           
                            <div class="col-sm-10" style="margin-bottom: 10px; width: 100%;">
                            <input type="text" name="name"  class="form-control" autocomplete="off" required="required">
                            </div>

                            <button type="submit" name="submit_author" style="margin-bottom:10px; width: 96%; margin-left:15px;" class="btn btn-success btn-lg btn-block">Add</button></td>
                      </form> 
            </div>  
            </div> 
            <div class="form-panel" style="margin:200px; margin-top:1px; margin-bottom:6%;">
                      <h1 class="mb"><center> Add Publisher </center></h1>
                            <!--  <h4>  -->
                          
                      <form class="form-horizontal style-form" method="POST">
                          <div class="form-group">
                           
                            <div class="col-sm-10" style="margin-bottom: 10px; width: 100%;">
                            <input type="text" name="name" class="form-control" autocomplete="off" required="required">
                            </div>

                            <button type="submit" name="submit_publisher" style="margin-bottom:10px; width: 96%; margin-left:15px;" class="btn btn-success btn-lg btn-block">Add</button></td>
                      </form> 
            </div> 
            </div>  
            <div class="form-panel" style="margin:200px; margin-top:1px; margin-bottom:6%;">
                      <h1 class="mb"><center> Add Supplier </center></h1>
                            <!--  <h4>  -->
                          
                      <form class="form-horizontal style-form" method="POST">
                          <div class="form-group">
                           
                            <div class="col-sm-10" style="margin-bottom: 10px; width: 100%;">
                            <input type="text" name="name" class="form-control" autocomplete="off" required="required">
                            </div>

                            <button type="submit" name="submit_supplier" style="margin-bottom:10px; width: 96%; margin-left:15px;" class="btn btn-success btn-lg btn-block">Add</button></td>
                      </form>   
            </div> 
            </div>  
            <div class="form-panel" style="margin:200px; margin-top:1px; margin-bottom:6%;">
                      <h1 class="mb"><center> Add Category </center></h1>
                            <!--  <h4>  -->
                          
                      <form class="form-horizontal style-form" method="POST">
                          <div class="form-group">
                           
                            <div class="col-sm-10" style="margin-bottom: 10px; width: 100%;">
                            <input type="text" name="name" class="form-control" autocomplete="off" required="required">
                            </div>

                            <button type="submit" name="submit_category" style="margin-bottom:10px; width: 96%; margin-left:15px;" class="btn btn-success btn-lg btn-block">Add</button></td>
                      </form>   
            </div>  
            </div> 
            <div class="form-panel" style="margin:200px; margin-top:1px; margin-bottom:6%;">
                      <h1 class="mb"><center> Add BookType </center></h1>
                            <!--  <h4>  -->
                          
                      <form class="form-horizontal style-form" method="POST" action="manageBook.php">
                          <div class="form-group">
                           
                            <div class="col-sm-10" style="margin-bottom: 10px; width: 100%;">
                            <input type="text" name="name" class="form-control" autocomplete="off" required="required">
                            </div>

                            <button type="submit" name="submit_booktype" style="margin-bottom:10px; width: 96%; margin-left:15px;" class="btn btn-success btn-lg btn-block">Add</button></td>
                      </form>   
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


  <!--common script for all pages-->
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