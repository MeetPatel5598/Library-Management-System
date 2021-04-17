<?php
  include('/vendor/php-excel-reader/excel_reader2.php');
      include('vendor/SpreadsheetReader.php');
      include('includes/db_connection.php');
?>
<?php
if (isset($_POST['import'])){ 
        $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
        if(in_array($_FILES['file']['type'],$allowedFileType)){
          $targetPath = 'uploads/'.$_FILES['file']['name'];
          move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        $Reader = new SpreadsheetReader($targetPath);
        $sheetCount = count($Reader->sheets());
        for($i=0;$i<$sheetCount;$i++){
            $Reader->ChangeSheet($i);
            foreach ($Reader as $Row){
              $bookid = "";
                if(isset($Row[0])) {
                    $bookid = mysqli_real_escape_string($connection,$Row[0]);
                }
                
              $title = "";
                if(isset($Row[1])) {
                    $title = mysqli_real_escape_string($connection,$Row[1]);
                }

              $author = "";
                if(isset($Row[2])) {
                    $author = mysqli_real_escape_string($connection,$Row[2]);
                }

              $publisher = "";
                if(isset($Row[3])) {
                    $publisher = mysqli_real_escape_string($connection,$Row[3]);
                }
                
              $edition = "";
                if(isset($Row[4])) {
                    $edition = mysqli_real_escape_string($connection,$Row[4]);
                }

              $volume = "";
                if(isset($Row[5])) {
                    $volume = mysqli_real_escape_string($connection,$Row[5]);
                }

              $supplier = "";
                if(isset($Row[6])) {
                    $supplier = mysqli_real_escape_string($connection,$Row[6]);
                }

              $booktype = "";
                if(isset($Row[7])) {
                    $booktype = mysqli_real_escape_string($connection,$Row[7]);
                }                

              $category = "";
                if(isset($Row[8])) {
                    $title = mysqli_real_escape_string($connection,$Row[8]);
                }

              $page = "";
                if(isset($Row[9])) {
                    $page = mysqli_real_escape_string($connection,$Row[9]);
                }

              $price = "";
                if(isset($Row[10])) {
                    $price = mysqli_real_escape_string($connection,$Row[10]);
                }

                if (!empty($bookid) || !empty($title) || !empty($author) || !empty($publisher) || !empty($edition) || !empty($volume) || !empty($supplier) || !empty($booktype) || !empty($category) || !empty($page) || !empty($price)) {
                    
                    $query = "INSERT INTO book(id,title,author,publisher,edition,volume,supplier,booktype,category,page,price) VALUES ('".$bookid."','".$title."','".$author."','".$publisher."','".$edition."','".$volume."','".$supplier."','".$booktype."','".$category."','".$page."','".$price."')";
                    
                    $result = mysqli_query($connection, $query);
                
                    if (! empty($result)) {
                        $type = "success";
                        $message = "Excel Data Imported into the Database";
                    } else {
                        $type = "error";
                        $message = "Problem in Importing Excel Data";
                    }
                }
             }
        
         }
  }
  else
  { 
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
  }
  echo "<script>alert('{$message}');</script>";
  header('Location: addBook.php');
  //echo $message;
}
?>