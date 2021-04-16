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

 $message = '';  
 $check = 1;  


 $nameErr = $idErr = $classErr = "";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Student name is required";
    $check = 0;
  }

  if (empty($_POST["id"])) {
    $idErr = "Student id is required";
    $check = 0;
  }

  if (empty($_POST["class"])) {
    $classErr = "Student class is required";
    $check = 0;
  }

 }

 
 if(isset($_POST["submit"]))  
  {
    if ($check == 1) { 
        $data['id'] = $_POST["id"];
        $data['name'] = $_POST['name'];    
        $data['class'] = $_POST["class"];
    
        include 'Controller/CardSave.php';
        if(CardSave($data)) {
          $message = "Card has been issued.";
        }else {
          $message = "Card has't issued.";
        }

      }
    }
?> 

 <!DOCTYPE html>
 <html>
 <head>
  <title>Issue Card</title>
 <style>
.error {color: #FF0000;}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 </head>
 <body>
  <form method="post" enctype="multipart/form-data">
    <fieldset>
      <legend><b>Issue Card</b></legend>
      <label>Student ID: </label>
      <input type="text" name="id">
      <span class="error"><?php echo $idErr;?></span><hr>
      <label>Student Name: </label>
      <input type="text" name="name">
      <span class="error"><?php echo $nameErr;?></span><hr>
      <label>Class: </label>
      <input type="text" name="class">
      <span class="error"><?php echo $classErr;?></span><hr>
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