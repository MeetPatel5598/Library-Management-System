<?php

include('includes/db_connection.php');

if(isset($_POST["action"]))
{
	$query5 = 
		"SELECT book.id,book.title,book.publisher,book.author,book.category,book.booktype,bookissue.userid FROM book JOIN bookissue ON book.id=bookissue.bookid ";
	
	if(isset($_POST["author"]))
	{
		$author_filter = implode("','", $_POST["author"]);
		$query5 .= "
		 AND author IN('".$author_filter."')
		";
	}
	if(isset($_POST["publisher"]))
	{
		$publisher_filter = implode("','", $_POST["publisher"]);
		$query5 .= "
		 AND publisher IN('".$publisher_filter."')
		";
	}
	if(isset($_POST["category"]))
	{
		$category_filter = implode("','", $_POST["category"]);
		$query5 .= "
		 AND category IN('".$category_filter."')
		";
	}
    if(isset($_POST["booktype"]))
	{
		$booktype_filter = implode("','", $_POST["booktype"]);
		$query5 .= "
		 AND booktype IN('".$booktype_filter."')
		";
	}

	$result = mysqli_query($connection,$query5);
	$total_row = mysqli_num_rows($result);
	
	$output = '';
	if($total_row > 0)
	{
		foreach($result as $row)
		{
			
			
			$output .= '
			<div class="col-sm-2 col-lg-3 col-md-3">
				<div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:200px;">
					
					<p>
                    <b>Book ID:</b> '.$row['id'].'<br/>
                    <b>Publisher :</b> '. $row['publisher'].'<br />
					<b>Author :</b> '. $row['author'] .' <br />
					<b>Category :</b> '. $row['category'] .' <br />
					<b>Book Type :</b> '. $row['booktype'] .'  <br />
					<b>Issued To : </b>'.$row['userid'].'
					
					</p><br />
				</div>

			</div>
			';
		}
	}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
}
mysqli_close($connection);
?>