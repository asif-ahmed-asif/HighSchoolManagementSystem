<?php  

  session_start();
  if (isset($_SESSION['userid'])) 
  {

    include "LoginHeader.php";
    include "Sidebar.php";
  }
  else
  {
    echo "<script>alert(Username or Password incorrect!)</script>";
    echo "<script>location.href='Login.php'</script>";
  }

  require_once '../controller/BookInfo.php';
  $book = FetchBook($_GET['bid']);

 $message = '';  
 $check = 1;  


 $bnameErr = $authorErr = $categoryErr = "";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["bname"])) {
    $bnameErr = "Book name is required";
    $check = 0;
  }

  if (empty($_POST["author"])) {
    $authorErr = "Author name is required";
    $check = 0;
  }

  if (empty($_POST["category"])) {
    $categoryErr = "Book category is required";
    $check = 0;
  }

 }

 if(isset($_POST["submit"]))  
  {
    if ($check == 1) { 
        $data['bid'] = $_POST["bid"];
        $data['bname'] = $_POST['bname'];    
        $data['author'] = $_POST["author"];
        $data['category'] = $_POST["category"];
        include '../Controller/BookUpdate.php';
        if(BookUpdate($data)) {
          $message = "Book has been updated.";
        }else {
          $message = "Book hasn't updated.";
        }

        header('location:FindBook.php');

      }
    }


?> 

 <!DOCTYPE html>
 <html>
 <head>
  <title>Edit Book</title>
 <style>
.error {color: #FF0000;}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 </head>
 <body>
  <form method="post" enctype="multipart/form-data">
    <fieldset>
      <legend><b>Edit Book</b></legend>
      <label>Book Id: </label>
      <input type="text" name="bid" value="<?php echo $book['bid'];?>" readonly>
      <label>Book Name: </label>
      <input type="text" name="bname" value="<?php echo $book['bname'];?>">
      <span class="error"><?php echo $bnameErr;?></span><hr>
      <label>Author Name: </label>
      <input type="text" name="author" value="<?php echo $book['author'];?>">
      <span class="error"><?php echo $authorErr;?></span><hr>
      <label>Category: </label>
      <select name = "category">
        <option ></option>  
        <option value="History" <?php if ($book["category"] == "History"){ echo "selected";}?>>History</option>
        <option value="Science" <?php if ($book["category"] == "Science"){ echo "selected";}?>>Science</option>  
        <option value="Technology" <?php if ($book["category"] == "Technology"){ echo "selected";}?>>Technology</option>
        <option value="Religious" <?php if ($book["category"] == "Religious"){ echo "selected";}?>>Religious</option>    
        <option value="Literature" <?php if ($book["category"] == "Literature"){ echo "selected";}?>>Literature</option>  
        <option value="Fantasy" <?php if ($book["category"] == "Fantasy"){ echo "selected";}?>>Fantasy</option>
        <option value="Biography" <?php if ($book["category"] == "Biography"){ echo "selected";}?>>Biography</option>  
        <option value="Poetry" <?php if ($book["category"] == "Poetry"){ echo "selected";}?>>Poetry</option>
      </select>
      <span class="error"><?php echo $categoryErr;?></span><hr>
      </fieldset><hr><br><br>
      <input type="submit" name="submit" value="Submit">
    </fieldset><br><br>

    <?php   
      if(isset($message))  
        {  
          echo $message;  
        }
    ?> 
  </form>
 </body>
 </html>