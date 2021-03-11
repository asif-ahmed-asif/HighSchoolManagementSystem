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
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>

<fieldset>
    <legend><b>PROFILE</b></legend>
	<form>
		
		<br/>
		<table cellpadding="0" cellspacing="0">
			<tr>

				<td>Name</td>
				<td>:</td>
				<td><?php echo $row["name"];?></td>

				<td rowspan="10" align="center">
					<img width="157" height="173" src="image/icon2.png"/><br/>
					<input type="submit" name="submit" value="Change" style="width: 60px">
					<input name="image" type="file">
                    <br/>
				</td>
			</tr>

			<tr><td colspan="3"><hr/></td></tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><?php echo $row["email"];?></td>
			</tr>

			<tr><td colspan="3"><hr/></td></tr>
			<tr>
				<td>Gender</td>
				<td>:</td>
				<td><?php echo $row["gender"];?></td>
			</tr>

			<tr><td colspan="3"><hr/></td></tr>
			<tr>
				<td>Date of Birth</td>
				<td>:</td>
				<td><?php echo $row["dd"]."-".$row["mm"]."-".$row["yyyy"];?></td>
			</tr>
		</table>	
        <hr/>
        <a href="EditProfile.php">Edit Profile</a>	
	</form>
</fieldset>

</body>
</html>