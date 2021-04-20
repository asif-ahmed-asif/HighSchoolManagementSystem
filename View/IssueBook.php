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


	$message = '';  
 	$check = 1;  


 $bidErr = $uidErr = $idateErr = $ddateErr = "";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["bid"])) {
    $bidErr = "Book id is required";
    $check = 0;
  }

  if (empty($_POST["uid"])) {
    $uidErr = "User id is required";
    $check = 0;
  }

  if (empty($_POST["idate"])) {
    $idateErr = "Issue date is required";
    $check = 0;
  }

  if (empty($_POST["ddate"])) {
    $ddateErr = "Due date is required";
    $check = 0;
  }

 }

 
 if(isset($_POST["submit"]))  
  {
    if ($check == 1) {
        $data['id'] = $_POST["id"];
        $data['bid'] = $_POST["bid"];
        $data['uid'] = $_POST['uid'];    
        $data['idate'] = $_POST["idate"];
        $data['ddate'] = $_POST["ddate"];
        $data['status'] = "n/a";

        include '../Controller/Issue.php';
        if(BookIssue($data)) {
          $message = "Book has been issued.";
        }else {
          $message = "Book hasn't issued.";
        }

      }
    }

    include '../Controller/IssueID.php';
    $id = GetID();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Issue Book</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
     <style>
		.error {color: #FF0000;}
	</style>
</head>
<body>
	<form method="post" enctype="multipart/form-data">
		<fieldset>
			<legend><b>ISSUE BOOKS</b></legend>
          <label>Issue Id: </label>
          <input type="text" name="id" value="<?php echo $id;?>" readonly><hr>
			    <label>Book ID:</label>
      		<input type="text" name="bid">
      		<span class="error"><?php echo $bidErr;?></span><hr>
      		<label>User ID:</label>
      		<input type="text" name="uid">
      		<span class="error"><?php echo $uidErr;?></span><hr>
      		<label>Issue Date:</label>
      		<input type="Date" name="idate">
      		<span class="error"><?php echo $idateErr;?></span><hr>
      		<label>Due Date:</label>
      		<input type="Date" name="ddate">
      		<span class="error"><?php echo $ddateErr;?></span><hr><br>
      		<input type="submit" name="submit" value="Submit">
      		<input type="reset" name="reset" value="Reset">

		</fieldset>

		<?php   
      if(isset($message))  
        {  
          echo $message;  
        }
    ?> 
    </form>
</body>
</html>