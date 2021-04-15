<?php
	/**
	 * 
	 */
	class Format 
	{
		public function textShort($text,$limit){
			$text = $text." ";
			$text = substr($text, 0,$limit);
			return $text = substr($text, 0,strrpos($text, " "))."..."; 
		}
		public function validate($data){
			$data=trim($data);
			$data=stripslashes($data);
		    $data=htmlspecialchars($data);
			return $data;
		}
		public function formatDate($date)
		{
			return date("F j, Y g:i a",strtotime($date));
		}
	}

?>