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
    <legend><b>EDIT PROFILE</b></legend>
	<form method="" action="">
		<br/>
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td>Name</td>
				<td>:</td>
				<td><input name="name" type="text" value="<?php echo $row["name"];?>" required></td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td>
					<input name="email" type="text" value="<?php echo $row["email"];?>" required>
				</td>
				<td></td>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Gender</td>
				<td>:</td>
				<td>   
					<input name="gender" type="radio" checked="checked">Male
					<input name="gender" type="radio" >Female
					<input name="gender" type="radio" >Other
				</td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td valign="top">Date of Birth</td>
				<td valign="top">:</td>
				<td>
					<input name="dob" type="text" value="<?php echo $row["dd"]."-".$row["mm"]."-".$row["yyyy"];?>">
					<br/>
					<font size="2"><i>(dd/mm/yyyy)</i></font>
				</td>
				<td></td>
			</tr>
		</table>
		<hr/>
		<input type="submit" value="Submit">		
	</form>
</fieldset>

</body>
</html>