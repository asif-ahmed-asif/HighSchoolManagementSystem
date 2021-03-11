<?php  

  session_start();
  if (isset($_SESSION['uname'])) 
  {

    include "LoginHeader.php";
    include "Sidebar.php";
  }
  else
  {
    echo "<script>alert(Username or Password incorrect!)</script>";
    echo "<script>location.href='Login.php'</script>";
  }

 $message = '';  
 $check = 1;  


 $bnameErr = $bidErr = $authorErr = $categoryErr = "";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["bname"])) {
    $bnameErr = "Book name is required";
    $check = 0;
  }

  if (empty($_POST["bid"])) {
    $bidErr = "Book id is required";
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
        $data['bname'] = $_POST['bname'];  
        $data['bid'] = $_POST["bid"];  
        $data['author'] = $_POST["author"];
        $data['category'] = $_POST["category"];
        
        include 'Controller/BookSave.php';
        if(BookSave($data)) {
          $message = "Book has been saved.";
        }else {
          $message = "Book hasn't saved.";
        }

      }
    } 

?> 

 <!DOCTYPE html>
 <html>
 <head>
  <title>Add Book</title>
 <style>
.error {color: #FF0000;}
</style>
 </head>
 <body>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <fieldset>
      <legend><b>Add Book</b></legend>
      <label>Book Name: </label>
      <input type="text" name="bname">
      <span class="error"><?php echo $bnameErr;?></span><hr>
      <label>Book Id: </label>
      <input type="text" name="bid">
      <span class="error"><?php echo $bidErr;?></span><hr>
      <label>Author Name: </label>
      <input type="text" name="author">
      <span class="error"><?php echo $authorErr;?></span><hr>
      <label>Category: </label>
      <select name = "category">
        <option ></option>  
        <option value="History">History</option>
        <option value="Science">Science</option>  
        <option value="Technology">Technology</option>
        <option value="Religious">Religious</option>    
        <option value="Literature">Literature</option>  
        <option value="Fantasy">Fantasy</option>
        <option value="Biography">Biography</option>  
        <option value="Poetry">Poetry</option>
      </select>
      <span class="error"><?php echo $categoryErr;?></span><hr>
      </fieldset><hr><br><br>
      <input type="submit" name="submit" value="Submit">
      <input type="reset" name="reset" value="Reset">
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