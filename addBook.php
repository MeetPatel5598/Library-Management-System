<?php
  session_start();
  if (isset($_SESSION['username'])) {
      include('header.html');
      include('adminside.html');
      require("includes/db_connection.php");
      include('includes/functions.php');
//      check_pages();
?>      
<?php
  if(isset($_POST['submit'])){
    $id = mysqli_real_escape_string($connection,$_POST['id']);
    $title = mysqli_real_escape_string($connection,$_POST['title']);
    $author = mysqli_real_escape_string($connection,$_POST['author']);
    $publisher = mysqli_real_escape_string($connection,$_POST['publisher']);
    $edition = mysqli_real_escape_string($connection,$_POST['edition']);
    $volume = mysqli_real_escape_string($connection,$_POST['volume']);
    $supplier = mysqli_real_escape_string($connection,$_POST['supplier']);
    $booktype = mysqli_real_escape_string($connection,$_POST['booktype']);
    $category = mysqli_real_escape_string($connection,$_POST['category']);
    $page = mysqli_real_escape_string($connection,$_POST['page']);
    $price = mysqli_real_escape_string($connection,$_POST['price']);
    
    $q1="INSERT INTO book (id,title,author,publisher,edition,volume,supplier,booktype,category,page,price) VALUES ('$id','$title','$author','$publisher','$edition','$volume','$supplier','$booktype','$category','$page','$price')";
    if (!mysqli_query($connection,$q1)) {
        echo "<script>alert('Book not Added') </script>";
    } else {
        echo "<script>alert('Book successfully added') </script>";
    }
  }
?>
<script>
function getbook() {
    $("#loaderIcon").show();
    jQuery.ajax({
      url: "get_book_add.php",
      data:'bookid='+$("#bookid").val(),
      type: "POST",
      success:function(data){
        $("#get_book_name").html(data);
        $("#loaderIcon").hide();
      },
      error:function (){}
    });
  }
</script>

      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Add Books by excel sheet </h3>
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel" style="margin:200px; margin-top:10px;">
                  	  <h1 class="mb"><center> Add Book</center></h1>
                  	  			<!--	<h4>  -->
		
<div>
	<form action="upload.php" enctype="multipart/form-data" method="post">
      <center><label for="files" class="btn">Select Excel sheet</label>
      <input id="files" style="visibility:hidden;" type="file" name="file"></center>
      <center><input type="submit" name="import" value="IMPORT" class="btn-success"></center>
      </form>
    </div>
						<h3 class="mb"><center>OR</center></h3>
                      <form class="form-horizontal style-form" method="get">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Book ID</label>
                              <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="text" class="form-control" name="bookid" id="bookid" required="required" onBlur="getbook()" >
                                  <br>
                                  <span id="get_book_name" style="font-size:16px;"></span>
                            </div>
                            <br>
    
                              <label class="col-sm-2 col-sm-2 control-label">Title</label>
                              <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="text" class="form-control" autocomplete="off" required="required">
                              </div>

                              <label class="col-sm-2 col-sm-2 control-label">Author</label>
                            <select class="form-control" name="author" style="margin-bottom:10px; width: 78.9%; margin-left:140px;">
                              <option>--NONE--</option>
                              <?php
                                include("/includes/db_connection.php");
                                $q1="select * from author";
                                $e1=$connection->query($q1);
                                while ($r=$e1->fetch_object()) {
                                  echo "<option value=".$r->id.">$r->name</option>";
                                }
                              ?>
                            </select>

                              <label class="col-sm-2 col-sm-2 control-label">Publisher</label>
                            <select class="form-control" name="publisher" style="margin-bottom:10px; width: 78.9%; margin-left:140px;">
                              <option>--NONE--</option>
                              <?php
                                include("/includes/db_connection.php");
                                $q1="select * from publisher";
                                $e1=$connection->query($q1);
                                while ($r=$e1->fetch_object()) {
                                  echo "<option value=".$r->id.">$r->name</option>";
                                }
                              ?>
                            </select>

                             <label class="col-sm-2 col-sm-2 control-label">Edition</label>
                              <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="text" name="edition" class="form-control" autocomplete="off" required="required">
                              </div>

                              <label class="col-sm-2 col-sm-2 control-label">Volume</label>
                            <select class="form-control" name="volume" style="margin-bottom:10px; width: 78.9%; margin-left:140px;">
                              <option>--NONE--</option>
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>


                              <label class="col-sm-2 col-sm-2 control-label">Supplier</label>
                            <select class="form-control" name="supplier" style="margin-bottom:10px; width: 78.9%; margin-left:140px;">
                              <option>--NONE--</option>
                              <?php
                                include("/includes/db_connection.php");
                                $q1="select * from supplier";
                                $e1=$connection->query($q1);
                                while ($r=$e1->fetch_object()) {
                                  echo "<option value=".$r->id.">$r->name</option>";
                                }
                              ?>
                            </select>


                              <label class="col-sm-2 col-sm-2 control-label">Book Type</label>
                            <select class="form-control" name="booktype" style="margin-bottom:10px; width: 78.9%; margin-left:140px;">
                              <option>--NONE--</option>
                              <?php
                                include("/includes/db_connection.php");
                                $q1="select * from booktype";
                                $e1=$connection->query($q1);
                                while ($r=$e1->fetch_object()) {
                                  echo "<option value=".$r->id.">$r->name</option>";
                                }
                              ?>
                            </select>

                            <label class="col-sm-2 col-sm-2 control-label">Category</label>
                            <select class="form-control" name="category" style="margin-bottom:10px; width: 78.9%; margin-left:140px;">
                              <option>--NONE--</option>
                              <?php
                                include("/includes/db_connection.php");
                                $q1="select * from category";
                                $e1=$connection->query($q1);
                                while ($r=$e1->fetch_object()) {
                                  echo "<option value=".$r->id.">$r->name</option>";
                                }
                              ?>
                            </select>

                              <label class="col-sm-2 col-sm-2 control-label">Pages</label>
                              <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="text" class="form-control" autocomplete="off" required="required">
                              </div>
                              <label class="col-sm-2 col-sm-2 control-label">Price</label>
                              <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="text" class="form-control" autocomplete="off" required="required">
                              </div>
                              <input type="submit" style="margin-bottom:10px; width: 96%; margin-left:15px;" class="btn btn-success btn-lg btn-block" name="Add">
		                   	
						</div>	
          			</div><!-- /form-panel -->
          		</div><!-- /col-lg-12 -->
          	</div>
          	
		</section>
      </section>
      </section><!-- /MAIN CONTENT -->

      
  </section>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" ></script>
    <script type="text/javascript">
        
        $(function(){
              $('select.styled').customSelect();
        });

      </script>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

      $("#files").change(function() {
  filename = this.files[0].name
  console.log(filename);
});

  </script>
<?php }else{
  header('Location: index.php');
}?>
  </body>
</html>
