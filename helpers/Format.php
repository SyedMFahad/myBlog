<?php

	class Format{

		public function formatDate($date){
			return date('F j, Y, g:i A', strtotime($date));
		} 

		public function shortText($text, $limit=400){
			$text = substr($text, 0, $limit);
			$text = $text." .....";

			return $text;
		}

		public function validate($data){
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			//$data = mysqli_real_escape_string($data);

			return $data; 
		}

		public function title(){
			return basename($_SERVER['SCRIPT_NAME'],'.php');
		}

	}








?>