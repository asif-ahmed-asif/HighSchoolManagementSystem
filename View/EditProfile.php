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


 $nameErr = $emailErr = $dobErr = $genderErr = $imageErr = $addressErr = "";
 $name = $email = $dd = $mm = $yyyy = $gender = "";

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

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
    $check = 0;
  } else {
    $gender = $_POST["gender"];
  }

    if (empty($_POST["address"])) {
      $addressErr = "Address field is empty";
      $check = 0;
    }
      
    if (empty($_POST["dob"])) {
    $ddateErr = "Date of birth is required";
    $check = 0;
  }

 }

 
 if(isset($_POST["update"]))  
  {
    if ($check == 1) { 
        $data['uid'] = $_POST['uid'];
        $data['name'] = $_POST['name'];  
        $data['email'] = $_POST["email"];
        $data['address'] = $_POST["address"];
        $data['gender'] = $_POST["gender"];
        $data['dob'] = $_POST["dob"];
        
        include '../Controller/UpdateData.php';
        if(UpdateData($data)) {
          $message = "Data has been updated.";
        }else {
          $message = "Data hasn't updated";
        }

        header('Location:EditProfile.php');

      }
    } 

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
	<style>
	.error {color: #FF0000;}
	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<fieldset>
    <legend><b>EDIT PROFILE</b></legend>
	<form method="post" enctype="multipart/form-data">
		<br/>
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td>User ID</td>
				<td>:</td>
				<td><input name="uid" type="text" value="<?php echo $rows["uid"];?>" readonly></td>
				<td></td>
			</tr>
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Name</td>
				<td>:</td>
				<td>
					<input name="name" type="text" value="<?php echo $rows["name"];?>">
					<span class="error"><?php echo $nameErr;?></span>
				</td>
				<td></td>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td>
					<input name="email" type="text" value="<?php echo $rows["email"];?>">
					<span class="error"><?php echo $emailErr;?></span>
				</td>
				<td></td>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Address</td>
				<td>:</td>
				<td>
					<input name="address" type="text" size="80" value="<?php echo $rows["address"];?>">
					<span class="error"><?php echo $addressErr;?></span>
				</td>
				<td></td>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Gender</td>
				<td>:</td>
				<td>   
					<input name="gender" type="radio" <?php if ($rows["gender"] == "Male"){ echo "checked";}?> value="Male">Male
					<input name="gender" type="radio" <?php if ($rows["gender"] == "Female"){ echo "checked";}?> value="Female">Female
					<input name="gender" type="radio" <?php if ($rows["gender"] == "Other"){ echo "checked";}?> value="Other">Other
					<span class="error"><?php echo $genderErr;?></span>
				</td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td valign="top">Date of Birth</td>
				<td valign="top">:</td>
				<td>
					<input name="dob" type="Date" value="<?php echo $rows["dob"];?>">
					<span class="error"><?php echo $dobErr;?></span>
					<br/>
				</td>
				<td></td>
			</tr>
		</table>
		<hr/>
		<input type="submit" name="update" value="Update">		
	</form>
</fieldset>

</body>
</html>