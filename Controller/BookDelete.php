<?php 
require_once '../model.php';

if(isset($_POST['delete']))
{
	if (DeleteBooks($_GET['bid']))
	{
		header('Location: ../FindBook.php');
	}
}
?>