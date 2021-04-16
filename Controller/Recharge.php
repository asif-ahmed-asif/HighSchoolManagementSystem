<?php 
	require_once 'model.php';
	
	function Recharge($data)
	{
		$student = GetBalance($data['uid']);
		$balance = $student["balance"];
		$balance = $balance + $data['amount'];

		Balance($data['uid'], $balance);

		return true;
	}
 ?>