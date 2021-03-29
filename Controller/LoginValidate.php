<?php 
require_once 'model.php';
function LoginValidation($userid, $pass)
{
	return Logins($userid, $pass);
}
 ?>