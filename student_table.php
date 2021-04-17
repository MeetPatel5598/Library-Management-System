<?php
  session_start();
  if (isset($_SESSION['username'])) {
      include('header.html');
      include('student_side.html');
      include('includes/db_connection.php');
      include('includes/functions.php');
?>
<section id="main-content">
          <section class="wrapper">
<div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                        <?php
                          //include_once("/includes/db_connection.php");
                          $username = $_SESSION['username'];
                          
                          $query = "SELECT s_id FROM student WHERE email = '$username'";

                          $result = mysqli_query($connection,$query);
                          if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                             $id = $row['s_id'];                             
                           }  
                          }
                           
                          $q1="SELECT * FROM bookissue WHERE userid ='$id' AND returnStatus = 0";
                          $result = mysqli_query($connection,$q1);
                          if (mysqli_num_rows($result) > 0) {
                              while ($row = mysqli_fetch_assoc($result)) {
                             $bookid = $row['bookid'];
                             $date = $row['issueDate'];
                             $q2="SELECT title FROM book WHERE id ='$bookid'";
                             $title = mysqli_query($connection,$q2);
                             if (mysqli_num_rows($result) > 0) {
                               while ($newrow = mysqli_fetch_assoc($title)) {
                                 $bookName = $newrow['title'];
                               }
                             }
                           }  
                          }else{
                              $bookid = '';
                              $bookName = 'No records found';
                              $date = '';
                          }
                          
                          ?>
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> Issued Book</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  
                                  <th>Book ID</th>
                                  <th>Book Name</th>
                                  <th>Issued Date</th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                   <td><?php echo $bookid; ?></td>
                                  <td><?php echo $bookName; ?></td>
                                  <td><?php echo $date; ?></td>
                              </tr>
                                                          
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
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