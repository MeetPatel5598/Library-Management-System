<?php
  session_start();
  if (isset($_SESSION['username'])) {
      include('header.html');
      include('adminside.html');
      include('includes/db_connection.php');
      include('includes/functions.php');
      
?>      
<section id="main-content">
          <section class="wrapper">
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                        <?php
                          include_once("/includes/db_connection.php");
                          $q1="SELECT bookissue.id,bookissue.userid,bookissue.returnStatus,book.title,bookissue.issueDate,bookissue.returnDate FROM bookissue JOIN book ON book.id=bookissue.bookid ORDER BY bookissue.id desc";
                          $e1=$connection->query($q1);
                          ?>
                          <table class="table table-striped table-advance table-hover table-responsive">
	                  	  	  <h4><i class="fa fa-angle-right"></i> Return Book</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>User ID</th>
                                  <th>Type</th>
                                  <th>User Name</th>
                                  <th>Book Name</th>
                                  <th>Issue Date</th>
                                  <th>Return Date</th>
                                  <th>Status</th>
                                  <th>Action</th>
                              </tr>
                              </thead>
                              <tbody>
                                <?php
                                  while($r=$e1->fetch_object()){
                                    if($r->returnStatus == 0){
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
                                  <td>
                                    <?php 
                                    if(preg_match('/^[1-9]{2}IT[0-9]{3}/',$r->userid)){
                                      $issuetime = $r->issueDate;
                                      $time = strtotime($issuetime . ' + 2 days');
                                      $currenttimestring = time();
                                      if ($time > $currenttimestring) {
                                        $datediff = $time - $currenttimestring;
                                        $dayleft = round($datediff / (60 * 60 * 24));
                                        if($dayleft == 1){ sendMail($r->userid,$r->title,$dayleft); }?>
                                        <span class="label label-success label-mini">
                                          <?php echo $dayleft; ?> Days to go
                                        </span>
                                      <?php } else { 
                                            $returntime = $time;
                                            $timenow = time();
                                            if ($returntime < $timenow) {
                                                $datediff2 = $timenow - $returntime;
                                                $lateday = round($datediff / (60 * 60 * 24));
                                            } else {
                                              $lateday = 0;
                                            }
                                      ?>
                                        <span class="label label-danger label-mini">Days late by <?php echo $lateday; ?></span>
                                      <?php }
                                    } else { ?>
                                      <span class="label label-warning label-mini">NA</span>
                                      <?php } ?>
                                  </td>
                                  <td>
                                      <?php if (preg_match('/^[1-9]{2}IT[0-9]{3}/',$r->userid)) { ?>
  <a href="renewBook.php?id=<?php echo $r->id; ?>">Renew</a> | 
    <a data-toggle="modal" href="#return<?php echo $r->id; ?>">Return</a>

    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="return<?php echo $r->id; ?>" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Charge fine</h4>
                          </div>
                          <form action="returnBook.php?id=<?php echo $r->id; ?>" method="post">
                          <div class="modal-body">
                              <p>Give value (If no fine then write 0)</p>
                              <input type="text" name="fine" placeholder="Enter a value" value="" autocomplete="off" class="form-control placeholder-no-fix">
                          </div>
                          <div class="modal-footer">
                            <center><input type="submit" name="submit"  value="SUBMIT" class="btn btn-theme"></center>
                          </div>
                      </form>
                      </div>
                  </div>
              </div>
<?php } else { ?>

    <a data-toggle="modal" href="#return<?php echo $r->id; ?>">Return</a>
    
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="return<?php echo $r->id; ?>" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Charge fine</h4>
                          </div>
                          <form action="returnBook.php?id=<?php echo $r->id; ?>" method="post">
                          <div class="modal-body">
                              <p>Give value (If no fine then write 0)</p>
                              <input type="text" name="fine" placeholder="Enter a value" autocomplete="off" class="form-control placeholder-no-fix">
                          </div>
                          <div class="modal-footer">
                            <center><input type="submit" name="submit"  value="SUBMIT" class="btn btn-theme"></center>
                          </div>
                      </form>
                      </div>
                  </div>
              </div>
<?php } ?>
                                  </td>
                              </tr>
                              <?php
                                  }}
                                ?> 

                              </tbody>
                          </table>
                        <!-- Modal -->
              
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
