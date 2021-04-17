<?php 
	function new_user_added_mail($email){
		$to = $email;
        $subject = "Welcome to BVM IT Library portal";
         
        $message = "<p>Your college email ID id your username and password</p>";
         
         $header = "From:bvmitlibraryportal@gmail.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
         	$flag = 1;
            echo "<script>alert('Mail sent to the user') </script>";
         }else {
         	$flag = 0;
            echo "<script>alert('Fail to send mail, so give valid E-mail ID') </script>";
         }
	}

	function sendMail($id,$booktitle,$dayleft){
		$query = "SELECT email FROM student WHERE s_id = '$id'";
		$result = mysqli_query($connection,$query);
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$email = $row['email'];
			}
		}

		$to = $email;
        $subject = "Reminder for returning of book";
         
        $message = "<p>Dear {$id},</p>";
        $message .= "<p>	To your kind notice please return your book {$booktitle} within two days otherwise fine may be charged against you.</p>";
        $message .= "<p>Regards,</p><br><p>BVM IT Dept. Library</p>";
         
        $header = "From:bvmitlibraryportal@gmail.com \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";
         
        $retval = mail ($to,$subject,$message,$header);
         
        if( $retval == true ) {
           echo "<script>alert('Mail sent ot the user') </script>";
        }else {
           echo "<script>alert('Fail to send mail') </script>";
        }	
	}
/*
	function check_pages()
{
	$filename=basename($_SERVER['PHP_SELF']);
	if($filename=="index.php" || $filename=="logout.php")
	{
		if(isset($_SESSION['adminid']) || isset($_SESSION['studentid']) || isset($_SESSION['facultyid']))
		{
			session_destroy();
			header("location:$filename");
		}
	}
	$adminpages = ['addBook.php','addBookFile.php','addFaculty.php','addStudent.php','bookIssue.php','deleteFaculty.php','deleteRecord.php','deleteStudent.php','lock_screen.php','manageBook.php','renew.php','sendmailfunction.php','adminside.html','footer.html','header.html','upload.php'];
	if(isset($_SESSION['adminid']))
	{
		if(in_array($filename, $adminpages))
		{

		}
		else{
			session_destroy();
			header("location: index.php");
		}
	}

	$studentpages = ['book_requirement.php','edit_profile.php','footer.html','lock_screen.php','header.html','error_page.php','student.php','student_book_request.php','student_feedback.php','student_side.html','student_table.php']
	if(isset($_SESSION['studentid']))
	{
		if(in_array($filename, $studentpages))
		{

		}
		else{
			session_destroy();
			header("location: index.php");
		}
	}
	$facultypages = ['faculty.php','faculty_book_request.php','faculty_edit_profile.php','faculty_feedback.php','faculty_side.html','faculty_table.php','footer.html','header.html','lock_screen.php']
	if(isset($_SESSION['facultyid']))
	{
		if(in_array($filename, $facultypages))
		{

		}
		else{
			session_destroy();
			header("location: index.php");
		}
	}
}
*/

?>