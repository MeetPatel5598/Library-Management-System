<?php
  session_start();
  if (isset($_SESSION['username'])) {
      include('header.html');
      include('faculty_side.html');
      include('includes/db_connection.php');
      include('includes/functions.php');
?><?php
  if(isset($_POST['submit'])){

    $id = mysqli_real_escape_string($connection,$_POST['id']);
    $title = mysqli_real_escape_string($connection,$_POST['title']);
    $author = mysqli_real_escape_string($connection,$_POST['author']); 
    $publisher = mysqli_real_escape_string($connection,$_POST['publisher']);
    $edition = mysqli_real_escape_string($connection,$_POST['edition']);
    $volume = mysqli_real_escape_string($connection,$_POST['volume']);
    $price = mysqli_real_escape_string($connection,$_POST['price']);

    $query = "INSERT INTO book_request (id, title, author,publisher,edition,volume,price) VALUES ('$id', '$title', '$author','$publisher','$edition','$volume',$price)";

    if (mysqli_query($connection, $query)) {
        echo "<script>alert('Request sent successfully!');</script>";
    } else {
      echo "<script>alert('Oops! Try again');</script>";
    }

    mysqli_close($connection);
  }
?>


<section id="main-content">
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i>Add Books</h3>
            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel" style="margin:200px; margin-top:10px;">
                      <h1 class="mb"><center> Book Request</center></h1>
                            <!--  <h4>  -->

                      <form class="form-horizontal style-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Faculty ID</label>
                              <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="text" class="form-control" autocomplete="off" name="id" required>
                              </div>
    
                              <label class="col-sm-2 col-sm-2 control-label">Title</label>
                              <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="text" class="form-control" autocomplete="off" name="title" required>
                                  
                              </div>

                              <label class="col-sm-2 col-sm-2 control-label">Author</label>
                            <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="text" class="form-control" autocomplete="off" name="author" required>
                                    
                              </div>


                              <label class="col-sm-2 col-sm-2 control-label">Publisher</label>
                            <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="text" class="form-control" autocomplete="off" name="publisher" required>
                                    
                              </div>

              <label class="col-sm-2 col-sm-2 control-label">Edition</label>
                              <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="text" class="form-control" autocomplete="off" name="edition" required>
                        
                              </div>

                              <label class="col-sm-2 col-sm-2 control-label">Volume</label>
                            <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="text" class="form-control" autocomplete="off" name="volume" required>
                                    
                              </div>


                              <label class="col-sm-2 col-sm-2 control-label">Price</label>
                              <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="text" class="form-control" autocomplete="off" name="price" required>
                                  
                              </div>
                              
                                <input name="submit" type="submit"style="margin-bottom:10px; width: 96%; margin-left:15px;" class="btn btn-success btn-lg btn-block">
                        
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