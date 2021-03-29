<?php 
	require_once '../model.php';
	if (isset($_POST['update'])){
		$data['uid'] = $_POST['uid'];
        $data['name'] = $_POST['name'];  
        $data['email'] = $_POST["email"];
        $data['address'] = $_POST["address"];
        $data['gender'] = $_POST["gender"];
        $data['dob'] = $_POST["dob"];

        if (DataUpdate($data)) {
  			header('Location: ../EditProfile.php');
  		}

	}
?>