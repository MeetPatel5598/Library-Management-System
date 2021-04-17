<?php
 
      include('Newsheader.html');
      include('includes/db_connection.php');
      include('includes/functions.php');
      //check_pages();

?>    
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
      
    <link rel="icon" type="image/gif/png" href="assets/img/BVM.png">

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>



                          <?php
                          $sql="select * from news ";
                          $result=mysqli_query($connection,$sql);
                          $count = 1;
                          while ($rows =mysqli_fetch_array($result)) { ?>
                              <section id="main-content" style="margin-left:30%;">
                              <section class="wrapper">
                    

                          <div class="row">
                          <div class="col-lg-9 main-chart">
                            <div class="row mt">
                              <div class="col-lg-9 col-lg-9 mb">
                                <div class="white-panel pn donut-chart" >
                                  <div class="white-header" style="background-color: skyblue">
                                    <h5 style="font-style: bold; color: black" >NEWS</h5>
                                  </div>
                        
                                          <div class="row">
                                    <div class="col-lg-12 col-lg-12 goleft">
                                      <p><i class="fa fa-database "></i>
                                        <?php  echo $count,"<br>";
                                          echo $rows[1],"<br>";
                                          echo $rows[2],"<br>";
                                          echo $rows[3],"<br>";
                                          $link=$rows[4];
                                          //echo "<img height='140' width='450' src='News/".$rows[4]."'>";
                                          echo "<a target='_blank' href='http://localhost/lms/News//$rows[5]'>Download PDF FILE</a><br>";
                                          echo "<a target='_blank' href='$link'>Click Here</a>"; ?>
                                          </p>
                                    </div>
                                  </div>
                                          </div>
                              </div>
                                      
          </div><!-- /row -->
          
          
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
            </section>
      </section>
          
                        <?php  $count = $count + 1; }
                          ?>
                      
                  
  <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/background.jpg", {speed: 500});
    </script>
    
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

</body>
</html>
