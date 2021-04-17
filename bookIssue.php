<?php
  session_start();
  error_reporting(0);
  if (isset($_SESSION['username'])) {
      include('header.html');
      include('adminside.html');
      include('includes/db_connection.php');

      if(isset($_POST['issue'])){
        $userid = $_POST['userid'];
        $bookid = $_POST['bookid'];

        $query = "SELECT count FROM bookissue WHERE userid = '$userid'";
        $result = mysqli_query($connection,$query);
        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            $count = $row['count'];
          }
        }

        $query = "SELECT bookid FROM bookissue WHERE bookid = '$bookid' AND returnStatus = 0";
        $result = mysqli_query($connection,$query);
        if (mysqli_num_rows($result) == 0) {
          
          if (preg_match('/^[1-9]{2}IT[0-9]{3}/',$userid)) {
            if ($count == 0) {
              $sql = "INSERT INTO  bookissue (userid,bookid) VALUES ('$userid','$bookid')";
              if (mysqli_query($connection, $sql)) {
                $count = $count + 1;
                $query = "UPDATE bookissue SET count = '$count', returnDate = NULL WHERE userid = '$userid'";
                if (mysqli_query($connection,$query)) {
                  echo "<script>alert('Book issued successfully')</script>";
                }
              }	
            } else {
              echo "<script>alert('Sorry! failed to issue this book')</script>";
            }	
          }

          if (preg_match('/^T[0-9]{3}/',$userid)) {
            $query = "SELECT count FROM bookissue WHERE userid = '$userid'";
            $result = mysqli_query($connection,$query);
            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                $count = $row['count'];
              }
            }
            $sql = "INSERT INTO  bookissue (userid,bookid) VALUES ('$userid','$bookid')";
            if (mysqli_query($connection,$sql)) {
              $count = $count + 1;
              $query = "UPDATE bookissue SET count = '$count', returnDate = NULL WHERE userid = '$userid'";
              if (mysqli_query($connection,$query)) {
                echo "<script>alert('Book issued successfully')</script>";
              }
            } else {
              echo "<script>alert('Sorry! failed to issue book')</script>";
            }
          }	
        } else {
          echo "<script>alert('This book is already issued')</script>";
        }
      }
?>
<script>
	function getuserdata() {
		$("#loaderIcon").show();
		jQuery.ajax({
			url: "get_user.php",
			data:'userid='+$("#userid").val(),
			type: "POST",
			success:function(data){
				$("#get_user_name").html(data);
				$("#loaderIcon").hide();
			},
			error:function (){}
		});
	}

	function getbook() {
		$("#loaderIcon").show();
		jQuery.ajax({
			url: "get_book.php",
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
        <h3><i class="fa fa-angle-right"></i> Issue Books</h3>
         <div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel" style="margin:200px; margin-top:10px;">
                  	  <h1 class="mb"><center> Issue Books</center></h1>
                      <form class="form-horizontal style-form" method="post" action="bookIssue.php">
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Student/Faculty ID </label>
                            <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="text" autocomplete="off" name="userid" id="userid" required="required" onBlur="getuserdata()" class="form-control">
                                  <br>
                                  <span id="get_user_name" style="font-size:16px;"></span>
                            </div>
                            <br>
							<label class="col-sm-2 col-sm-2 control-label">Book ID </label>
                            <div class="col-sm-10" style="margin-bottom: 10px;">
                                  <input type="text" autocomplete="on" name="bookid" id="bookid" required="required" onBlur="getbook()" class="form-control">
                                  <br>
                                  <select  class="form-control" name="bookdetails" id="get_book_name" readonly></select>
                            </div>
                            <button type="submit" name="issue" id="submit" style="margin-bottom:10px; width: 96%; margin-left:15px;" class="btn btn-success btn-lg btn-block">Add</button></td>
                        </div>
                    </form>
                </div>
              </div>
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
<?php 
}else{
  header('Location: index.php');
}
?>