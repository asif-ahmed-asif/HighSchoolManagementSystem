<?php  
 $message = '';  
 $check = 1;  


 $nameErr = $emailErr = $dobErr = $genderErr = $unameErr = $passErr = $cpassErr = "";
 $name = $email = $uname = $dd = $mm = $yyyy = $gender = $password = $cpassword = "";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    $check = 0;
  } else {
    $name = $_POST["name"];
    $count = str_word_count("$name");
    if ((!preg_match("/^[a-zA-Z-' ]*$/",$name)) || $count < 2 ){
      $nameErr = "Only letters and white space allowed and contains at least two words";
      $check = 0;
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $check = 0;
  } else {
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $check = 0;
    }
  }

  if (empty($_POST["dd"])) {
    $dobErr = "Empty Field";
    $check = 0;
  }else{
    $dd = $_POST["dd"];
    if ($dd<0 || $dd>31){
      $dobErr = "Invalid date ";
      $check = 0;
    }
  }

  if (empty($_POST["mm"])) {
    $dobErr = "Empty Field";
    $check = 0;
  }else{
    $mm = $_POST["mm"];
    if ($mm<0 || $mm>12){
      $dobErr = "Invalid month ";
      $check = 0;
    }
  }
  if (empty($_POST["yyyy"])) {
    $dobErr = "Empty Field";
    $check = 0;
  }else{
    $yyyy = $_POST["yyyy"];
    if ($yyyy<1953 || $yyyy>1998){
      $dobErr = "Invalid year ";
      $check = 0;
    }
  }  

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
    $check = 0;
  } else {
    $gender = $_POST["gender"];
  }

  if (empty($_POST["uname"])) {
      $unameErr = "User Name is required";
      $check = 0;
    } else {
      $uname = $_POST["uname"];
      $count = strlen("$uname");
      if ((!preg_match("/^[a-zA-Z-_' ]*$/",$uname)) || $count < 2 ){
        $unameErr = "Only alpha numeric characters, period, dash, underscore allowed and contains at least two characters";
        $check = 0;
      }
    }

    if (empty($_POST["password"])) {
      $passErr = "Password is required";
      $check = 0;
    }else {
      $password = $_POST["password"];
      $count = strlen("$password");
      if ((!preg_match("([@#$%])",$password)) || $count < 8 ) {
        $passErr = "Password must not be less than eight characters and  must contain at least one of the special characters (@, #, $, %) ";
        $check = 0;
      }

    }

    if (empty($_POST["cpassword"])) {
      $cpassErr = "Confirm password field is empty";
      $check = 0;
    }else {
      $cpassword = $_POST["cpassword"];
      if(strcmp($password, $cpassword)) {
        $cpassErr = "Must match with password";
        $check = 0;
      }
    }

 }

 
 if(isset($_POST["submit"]))  
  {
    if ($check == 1) { 
        $data['name'] = $_POST['name'];  
        $data['email'] = $_POST["email"];  
        $data['uname'] = $_POST["uname"];
        $data['password'] = $_POST["password"];
        $data['gender'] = $_POST["gender"];
        $data['dd'] = $_POST["dd"];
        $data['mm'] = $_POST["mm"];
        $data['yyyy'] = $_POST["yyyy"];
        
        include 'Controller/DataSave.php';
        if(DataSave($data)) {
          $message = "Data has been saved.";
        }else {
          $message = "Data hasn't saved.";
        }

      }
    } 

?> 

 <!DOCTYPE html>
 <html>
 <head>
 <style>
.error {color: #FF0000;}
</style>
 </head>
 <body>
  <?php include('Header.php');?>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <fieldset>
      <legend><b>REGISTRATION</b></legend>
      <label>Name: </label>
      <input type="text" name="name">
      <span class="error"><?php echo $nameErr;?></span><hr>
      <label>Email: </label>
      <input type="text" name="email">
      <span class="error"><?php echo $emailErr;?></span><hr>
      <label>User Name: </label>
      <input type="text" name="uname">
      <span class="error"><?php echo $unameErr;?></span><hr>
      <label>Password: </label>
      <input type="password" name="password">
      <span class="error"><?php echo $passErr;?></span><hr>
      <label>Confirm Password: </label>
      <input type="password" name="cpassword">
      <span class="error"><?php echo $cpassErr;?></span><hr>
      <fieldset>
        <legend>Gender</legend>
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="Female">Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="Male">Male
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="Other">Other  
        <span class="error"><?php echo $genderErr;?></span>
      </fieldset><hr>
      <fieldset>
        <legend>Date of Birth</legend>
        <input type="text" name="dd" size="4"> /
        <input type="text" name="mm" size="4"> /
        <input type="text" name="yyyy" size="8">
        (dd /mm/ yyyy)
        <span class="error"><?php echo $dobErr;?></span>
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
 <?php include('Footer.php');?>
 </body>
 </html>