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
                          $q1="SELECT bname,author,edition FROM news";
                          $e1=$connection->query($q1);
                          ?>
                          <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i>Manage News</h4>
                            <hr>
                              <thead>
                              <tr>
                                  <th>Title</th>
                                  <th>Date</th>
                                  <th>Description</th>
                              </tr>
                              </thead>
                              <tbody>
                                <?php
                                  while($r=$e1->fetch_object()){
                                ?>
                              <tr>
                                  <td><?php echo $r->bname; ?></td>
                                  <td><?php echo $r->author; ?></td>
                                  <td><?php echo $r->edition; ?></td>
                                 <td>
                                      <a href="delNews.php?id=<?php echo $r->bname; ?>">Delete</a>
                                  </td>
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
