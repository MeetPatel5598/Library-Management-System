<?php
  session_start();
  if (isset($_SESSION['username'])) {
      include('header.html');
      include('faculty_side.html');
      include('includes/db_connection.php');
      include('includes/functions.php');
?>
<?php
    $username  = $_SESSION['username'];
    $query = "SELECT * FROM faculty WHERE email = '$username'";
    $result = mysqli_query($connection,$query);
    if (mysqli_num_rows($result)) {
      while ($row = mysqli_fetch_assoc($result)) {
        $name = $row['name'];
      }
    }
  ?>

          <section id="main-content">
              <section class="wrapper site-min-height">
              	<h3><i class="fa fa-angle-right"></i>Welcome ,<?php echo $name; ?></h3>
              	<div class="row mt">
              		<div class="col-lg-12">
              		
              		</div>
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
          //custom select box

        $(function(){
              $('select.styled').customSelect();
          });
      </script>
<?php }else{
  header('Location: index.php');
}?>    