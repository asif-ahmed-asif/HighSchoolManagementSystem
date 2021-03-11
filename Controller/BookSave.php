<?php 
	function BookSave($data)
	{ 
		if(file_exists('Controller/book.json'))  
	    {  
	      $current_data = file_get_contents('Controller/book.json');
	      $array_data = json_decode($current_data, true);  
	      $extra = array(  
	        'bname'            =>     $data['bname'],  
	        'bid'          =>     $data['bid'],  
	        'author'     =>     $data['author'],
	        'category'     =>     $data['category'],
	        );
	        $array_data[] = $extra;  
	        $final_data = json_encode($array_data); 
	        file_put_contents('Controller/book.json', $final_data); 
	         return true;
	    }  
	    else  
	    {  
	      $error = 'JSON File not exits'; 
	      return false; 
	    }


	}
	
       
  

 ?>