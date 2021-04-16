<?php 
	require_once 'model.php';
	function BookSave($data)
	{
		AddBook($data);

		return true;
	}

 ?>