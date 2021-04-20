<?php
	session_start();
	if (isset($_SESSION['userid'])) 
	{

		include "LoginHeader.php";
		include "Sidebar.php";
	}
	else
	{
    echo '<script>alert("Login First!")</script>';
    echo '<script>location.href="Login.php"</script>';
	}

 
 $check = 1;

 $bidErr = $uidErr = $idErr = $rdateErr = "";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["bid"])) {
    $bidErr = "Book id is required";
    $check = 0;
  }

  if (empty($_POST["uid"])) {
    $uidErr = "User id is required";
    $check = 0;
  }

   if (empty($_POST["id"])) {
    $idErr = "Issue id is required";
    $check = 0;
  }

  if (empty($_POST["rdate"])) {
    $rdateErr = "Return date is required";
    $check = 0;
  }

 }

 if(isset($_POST["submit"]))  
  {
    if ($check == 1) { 
        $data['bid'] = $_POST["bid"];
        $data['uid'] = $_POST['uid'];
        $data['id'] = $_POST['id'];    
        $data['rdate'] = $_POST["rdate"];
        $data['status'] = "a";

        include '../Controller/Return.php';
        BookReturn($data);

      }
    }


?>

<!DOCTYPE html>
<html>
<head>
	<title>Return Book</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  	<style>
		.error {color: #FF0000;}
	</style>
</head>
<body>
	<form method="post" enctype="multipart/form-data">
		<fieldset>
			<legend><b>RETURN BOOKS</b></legend>
			<label>Book ID:</label>
      		<input type="text" name="bid">
      		<span class="error"><?php echo $bidErr;?></span><hr>
      		<label>User ID:</label>
      		<input type="text" name="uid">
      		<span class="error"><?php echo $uidErr;?></span><hr>
      		<label>Issue ID:</label>
      		<input type="text" name="id">
      		<span class="error"><?php echo $idErr;?></span><hr>
      		<label>Return Date:</label>
      		<input type="Date" name="rdate">
      		<span class="error"><?php echo $rdateErr;?></span><hr><br>
      		<input type="submit" name="submit" value="Submit">
      		<input type="reset" name="reset" value="Reset">

		</fieldset>
    </form>
</body>
</html>