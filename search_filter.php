<?php 

//index.php
include('header.html');
	include('adminside.html');

include('includes/db_connection.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    

    <script src="assets/js/jquery-1.10.2.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href = "assets/css/jquery-ui.css" rel = "stylesheet">
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body style="margin-top=100px">
    <!-- Page Content -->
    <div class="container" >
        <div class="row">
        	<br />
            <br/>
            <br/>
            <br/>
        	<h2 align="center">Issued Book Records</h2>
        	<br />
            <div class="col-md-3">                				

				<div class="list-group" style="margin-left:110px">
                    <div style="height: 240px; overflow-y: auto; overflow-x: hidden;">
					<h3>Author</h3>
                    <?php

                    $query1 = "
                    SELECT DISTINCT(author) FROM book 
                    ";
                    $result = mysqli_query($connection,$query1);
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" autocomplete="off" class="common_selector author" value="<?php echo $row['author']; ?>" > <?php echo $row['author']; ?> </label>
                    </div>
                    <?php    
                    }
                        
                    ?>
                    </div>
                </div>
				
				<div class="list-group" style="margin-left:110px">
                    <div style="height: 240px; overflow-y: auto; overflow-x: hidden;">
					<h3>Publisher</h3>
					<?php
                    $query2 = "
                    SELECT DISTINCT(publisher) FROM book
                    ";
                    $result = mysqli_query($connection,$query2);                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector publisher" value="<?php echo $row['publisher']; ?>"  > <?php echo $row['publisher']; ?> </label>
                    </div>
                    <?php
                    }
                    ?>
                    </div>
                </div>
            
        
                <div class="list-group" style="margin-left:110px">
                        <h3>Category</h3>
                        <?php

                        $query1 = "
                        SELECT DISTINCT(category) FROM book 
                        ";
                        $result = mysqli_query($connection,$query1);
                        foreach($result as $row)
                        {
                        ?>
                        <div class="list-group-item checkbox">
                            <label><input type="checkbox" class="common_selector category" value="<?php echo $row['category']; ?>" > <?php echo $row['category']; ?></label>
                        </div>
                        <?php    
                        }

                        ?>
                    </div>

                    <div class="list-group" style="margin-left:110px">
                        <h3>Book Type</h3>
                        <?php
                        $query2 = "
                        SELECT DISTINCT(booktype) FROM book
                        ";
                        $result = mysqli_query($connection,$query2);                    foreach($result as $row)
                        {
                        ?>
                        <div class="list-group-item checkbox">
                            <label><input type="checkbox" class="common_selector booktype" value="<?php echo $row['booktype']; ?>"  > <?php echo $row['booktype']; ?></label>
                        </div>
                        <?php
                        }
                        ?>	
                    </div>
            
            </div>
            <div class="col-md-9">
            	<br />
                <div class="row filter_data">

                </div>
            </div>
        </div>

    </div>
<style>
#loading
{
	text-align:center; 
	background: url('loader.gif') no-repeat center; 
	height: 150px;
}
</style>

<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var author = get_filter('author');
        var publisher = get_filter('publisher');
        var category = get_filter('category');
        var booktype = get_filter('booktype');
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action, author:author, publisher:publisher, category:category, booktype:booktype},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    
});
</script>

  <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
  <script src="assets/js/jquery.scrollTo.min.js"></script>
  
  <script src="assets/js/jquery.sparkline.js"></script>

  

      <script src="assets/js/common-scripts.js"></script>

  <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

</body>

</html>
