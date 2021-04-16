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
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<fieldset>
    <legend><b>EDIT PROFILE</b></legend>
	<form method="post" action="Controller/UpdateData.php" enctype="multipart/form-data">
		<br/>
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td>User ID</td>
				<td>:</td>
				<td><input name="uid" type="text" value="<?php echo $rows["uid"];?>" required readonly></td>
				<td></td>
			</tr>
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Name</td>
				<td>:</td>
				<td>
					<input name="name" type="text" value="<?php echo $rows["name"];?>" required>
				</td>
				<td></td>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td>
					<input name="email" type="text" value="<?php echo $rows["email"];?>" required>
				</td>
				<td></td>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Address</td>
				<td>:</td>
				<td>
					<input name="address" type="text" size="80" value="<?php echo $rows["address"];?>" required>
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
				</td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td valign="top">Date of Birth</td>
				<td valign="top">:</td>
				<td>
					<input name="dob" type="Date" value="<?php echo $rows["dob"];?>">
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