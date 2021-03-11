<?php
	function ViewData()
		{
			$data = file_get_contents("Controller/data.json");
            $data = json_decode($data, true);
            foreach($data as $row){}
            	return $row;
		}
?>