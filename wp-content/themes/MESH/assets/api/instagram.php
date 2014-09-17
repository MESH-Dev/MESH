<?php
	function getInstagram(){
		$json = file_get_contents('https://api.instagram.com/v1/users/1167443738/media/recent?access_token=1167443738.5b9e1e6.5cb9e88dbfa5493e9c2648e489ece7da');
		$obj = json_decode($json);
		return $obj->data;
	}
?>


