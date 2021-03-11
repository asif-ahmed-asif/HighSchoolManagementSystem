<?php 
	function DataSave($data)
	{ 
		if(file_exists('Controller/data.json'))  
	    {  
	      $current_data = file_get_contents('Controller/data.json');
	      $array_data = json_decode($current_data, true);  
	      $extra = array(  
	        'name'            =>     $data['name'],  
	        'email'          =>     $data["email"],  
	        'uname'     =>     $data["uname"],
	        'password'     =>     $data["password"],
	        'gender'     =>     $data["gender"],
	        'dd'     =>     $data["dd"],
	        'mm'     =>     $data["mm"],
	        'yyyy'     =>     $data["yyyy"],
	        );
	        $array_data[] = $extra;  
	        $final_data = json_encode($array_data); 
	        file_put_contents('Controller/data.json', $final_data); 
	         return true;
	    }  
	    else  
	    {  
	      $error = 'JSON File not exits'; 
	      return false; 
	    }


	}
	
       
  

 ?>