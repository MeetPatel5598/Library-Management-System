<?php
  session_start();
  if (isset($_SESSION['username'])) {
      include('header.html');
      include('adminside.html');
      include('includes/db_connection.php');
      include('includes/functions.php');
      //check_pages();
?>      
<section id="main-content" style="margin-left:30%;">
        <section class="wrapper">
          <div class="row">
            <div class="col-lg-9 main-chart">
              <div class="row mt">
                <div class="col-md-4 col-sm-4 mb">
                  <div class="white-panel pn donut-chart">
                    <div class="white-header">
                      <h5>TOTAL BOOKS</h5>
                    </div>
                    <div class="row">
                      <div class="col-sm-6 col-xs-6 goleft">
                        <p><i class="fa fa-database"></i>
                          <?php 

                          $sql="SELECT * FROM book";
                          if ($result=mysqli_query($connection,$sql))
                            {
                            // Return the number of rows in result set
                            $rowcount=mysqli_num_rows($result);
                            printf(" %d ",$rowcount);
                            // Free result set
                            mysqli_free_result($result);
                            }
                            ?>
                      </p>
                      </div>
                    </div>
                    <div class="centered" >
                      <img src="assets/img/totalbook.jpg" width="160" >
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-sm-4 mb">
                  <div class="white-panel pn">
                    <div class="white-header">
                      <h5>ISSUED BOOKS</h5>
                    </div>
                    <div class="row">
                      <div class="col-sm-6 col-xs-6 goleft">
                        <p><i class="fa fa-database"></i>
                          <?php 

                          $sql="SELECT * FROM bookissue WHERE returnStatus='0'";
                          if ($result=mysqli_query($connection,$sql))
                            {
                            // Return the number of rows in result set
                            $rowcount=mysqli_num_rows($result);
                            printf(" %d ",$rowcount);
                            // Free result set
                            mysqli_free_result($result);
                            }
                            ?>
                        </p>
                      </div>
                      <div class="col-sm-6 col-xs-6"></div>
                    </div>
                    <div class="centered">
                      <img src="assets/img/issue.jpg"  width="180" height="140">
                    </div>
                  </div>
                </div>

                <div class="col-md-4 mb">
                  <div class="white-panel pn">
                    <div class="white-header">
                      <h5>REGISTERED USER</h5>
                    </div>
                    <div class="col" align="left">
                    <!--  <div class="col-sm-6 col-xs-6 goleft">-->
                        <p><i class="fa fa-database"> Total</i> 
                          <?php 

                          $query1="SELECT * FROM faculty";
                          $query2="SELECT * FROM student";

                          $result1 = mysqli_query($connection,$query1);
                          $result2 = mysqli_query($connection,$query2);

                          $facultyCount = mysqli_num_rows($result1);
                          $studentCount = mysqli_num_rows($result2);

                          $total = $facultyCount + $studentCount;
                          echo "{$total}";
                            ?>
                        </p>
                  <!--    </div> -->
<!--                      <div class="col-sm-6 col-xs-6 goleft">-->
                        <p><i class="fa fa-database"> Faculty</i> 
                          <?php 

                          $sql="SELECT * FROM faculty";
                          if ($result=mysqli_query($connection,$sql))
                            {
                            // Return the number of rows in result set
                            $rowcount=mysqli_num_rows($result);
                            printf(" %d ",$rowcount);
                            // Free result set
                            mysqli_free_result($result);
                            }
                            ?>
                        </p>
    <!--                  </div>-->
                   <!--   <div class="col-sm-6 col-xs-6 goleft"> -->
                        <p><i class="fa fa-database"> Student</i> 
                          <?php 

                          $sql="SELECT * FROM student";
                          if ($result=mysqli_query($connection,$sql))
                            {
                            // Return the number of rows in result set
                            $rowcount=mysqli_num_rows($result);
                            printf(" %d ",$rowcount);
                            // Free result set
                            mysqli_free_result($result);
                            }
                            ?>
                        </p>
                  <!--    </div> -->
                      <div class="col-sm-6 col-xs-6"></div>
                    </div>
                    <p><img src="assets/img/user.jpg" class="img-circle" width="90" style="margin-right:10%;"></p>
                    
                  </div>
                </div>

              </div>
              <div class="row">
                <div class="col-md-4 col-sm-4 mb">
                  <div class="white-panel pn">
                    <div class="white-header">
						  			<h5>PUBLISHER</h5>
                      			</div>
								<div class="row">
									<div class="col-sm-6 col-xs-6 goleft">
										<p><i class="fa fa-database"></i> 
                      <?php 

                          $sql="SELECT * FROM publisher";
                          if ($result=mysqli_query($connection,$sql))
                            {
                            // Return the number of rows in result set
                            $rowcount=mysqli_num_rows($result);
                            printf(" %d ",$rowcount);
                            // Free result set
                            mysqli_free_result($result);
                            }
                            ?>
                    </p>
									</div>
									<div class="col-sm-6 col-xs-6"></div>
	                      		</div>
	                      		<div class="centered">
										<img src="assets/img/publisher.jpg" width="120">
	                      		</div>
                      		</div>
                      	</div>
                      	
                      	<div class="col-md-4 col-sm-4 mb">
                      		<div class="white-panel pn">
                      			<div class="white-header">
						  			<h5>SUPPLIER</h5>
                      			</div>
								<div class="row">
									<div class="col-sm-6 col-xs-6 goleft">
										<p><i class="fa fa-database"></i> 
                      <?php 

                          $sql="SELECT * FROM supplier";
                          if ($result=mysqli_query($connection,$sql))
                            {
                            // Return the number of rows in result set
                            $rowcount=mysqli_num_rows($result);
                            printf(" %d ",$rowcount);
                            // Free result set
                            mysqli_free_result($result);
                            }
                            ?>
                    </p>
									</div>
									<div class="col-sm-6 col-xs-6"></div>
	                      		</div>
	                      		<div class="centered">
										<img src="assets/img/supplier.jpg" width="140">
	                      		</div>
                      		</div>
                      	</div>
                      	
                      	<div class="col-md-4 col-sm-4 mb">
                      		<div class="white-panel pn">
                      			<div class="white-header">
						  			         <h5>CATEGORIES</h5>
                      			</div>
            								<div class="row">
            									<div class="col-sm-6 col-xs-6 goleft">
            										<p><i class="fa fa-database"></i> 
                                  <?php 

                          $sql="SELECT * FROM category";
                          if ($result=mysqli_query($connection,$sql))
                            {
                            // Return the number of rows in result set
                            $rowcount=mysqli_num_rows($result);
                            printf(" %d ",$rowcount);
                            // Free result set
                            mysqli_free_result($result);
                            }
                            ?>
                                </p>
            									</div>
            									<div class="col-sm-6 col-xs-6"></div>
            	            		</div>
	                      		<div class="centered">
										        <img src="assets/img/category.jpg" width="120">
	                      		</div>
                      		</div>
                      	</div>
                      	
					</div><!-- /row -->
					
					
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
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