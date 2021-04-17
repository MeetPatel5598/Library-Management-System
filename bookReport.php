<?php
  session_start();
  if (isset($_SESSION['username'])) {
      include('header.html');
      include('adminside.html');
      include('includes/db_connection.php');
      include('includes/functions.php');
      
?>
<style type="text/css">
    @media print {
        .nav-collapse {
            display: none;
        }
        .header{
            display: none;  
        }
        .btn-success{
          display: none;
        }
    }
</style>
<section id="main-content">
          <section class="wrapper">
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                        <?php
                          $q1="SELECT bookissue.id,bookissue.userid,book.title,bookissue.issueDate,bookissue.returnDate,bookissue.fine FROM bookissue JOIN book ON book.id=bookissue.bookid ORDER BY bookissue.id desc";
                          $e1=$connection->query($q1);
                          ?>
                          <table class="table table-striped table-advance table-hover table-responsive">
                          		<button onClick="window.print()" class="btn btn-success" 
                              style="float:right; margin-right: 20px;">Print</button>
	                  	  	  <h4><i class="fa fa-angle-right"></i> Books Report</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>User ID</th>
                                  <th>Type</th>
                                  <th>User Name</th>
                                  <th>Book Name</th>
                                  <th>Issue Date</th>
                                  <th>Return Date</th>
                                  <th>Fine (in Rs.)</th>
                              </tr>
                              </thead>
                              <tbody>
                                <?php
                                  while($r=$e1->fetch_object()){
                                ?>
                              <tr>
                                  <td><?php echo $r->userid; ?></td>
                                  
                                  	<?php 
                                  	if (preg_match('/^[1-9]{2}IT[0-9]{3}/',$r->userid)){
                                     echo "<td>" ."Student". "</td>";
                                  		$query = "SELECT name FROM student WHERE s_id = '$r->userid'";
                                  		$result = mysqli_query($connection,$query);
                                  		if(mysqli_num_rows($result) > 0){
                                  			while($row = mysqli_fetch_assoc($result)) {
                                  				$name = $row['name'];
                                  			}
                                  		}
                                  	} else {
                                      echo "<td>" ."Faculty". "</td>";
                                  		$query = "SELECT name FROM faculty WHERE f_id = '$r->userid'";
                                  		$result = mysqli_query($connection,$query);
                                  		if(mysqli_num_rows($result) > 0){
                                  			while($row = mysqli_fetch_assoc($result)) {
                                  				$name = $row['name'];
                                  			}
                                  		}
                                  	}
                                  	echo "<td>" .$name. "</td>";
                                  	?>
                                  
                                  <td><?php echo $r->title; ?></td>
                                  <td><?php echo $r->issueDate; ?></td>
                                  <td><?php if($r->returnDate == "") { echo htmlentities("Not Return Yet"); } else { echo htmlentities($r->returnDate); } ?></td>
                                  <td><?php echo $r->fine; ?></td>
                              </tr>
                              <?php
                                  }
                                ?> 
                              </tbody>
                          </table>
                          </div><!-- /content-panel -->
                  </div>
                  <!-- /col-md-12 -->
              </div><!-- /row -->

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
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
<?php }else{
  header('Location: index.php');
}?>
