<?php

Class Settings
{

	public function get_settings($id)
	{
		$DB = new Database();
		$sql = "select * from users where userid = '$id' limit 1";
		$row = $DB->read($sql);

		if(is_array($row)){

			return $row[0];
		}
	}

	// public function save_settings($data,$id){
	//
	// 	$DB = new Database();
	//
	// 	$password = isset($data['password']) ? $data['password'] : "";
	//
	// 	if(!empty($password)){
	// 		if(strlen($password) < 30 && isset($data['password2'])){
	//
	// 			if($data['password'] == $data['password2']){
	// 				$data['password'] = hash("sha1", $password);
	// 				//echo "success";
	// 			}else
	// 			if($data['password'] == ""){
	//
	// 				unset($data['password']);
	// 				//echo "failed";
	// 			}
	// 		}
	// 	}
	//
	// 		unset($data['password2']);

	private $error = "";

	public function save_settings($data,$id)
	{

		foreach ($data as $key => $value) {

			if(empty($value))
			{
				$this->error = $this->error . $key . " is empty<br>";
			}

			if($key == "email")
			{
				if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$value)) {

 					$this->error = $this->error . "Please enter a valid email<br>";
    		}
			}

			if($key == "first_name")
			{
				if(is_numeric($value)) {

 					$this->error = $this->error . "First name can't be a number<br>";
    		}

    		if(strstr($value, " ")) {

 					$this->error = $this->error . "First name can't have spaces<br>";
    		}

			}

			if($key == "last_name")
			{
				if(is_numeric($value)) {

 					$this->error = $this->error . "Last name can't be a number<br>";
    		}

    		if(strstr($value, " ")) {

 					$this->error = $this->error . "Last name can't have spaces<br>";
    		}

			}

			if($key == "password")
			{

				$password = $data['password'];
				$password2 = $data['password2'];
				if($password != $password2) {

					$this->error = $this->error . "Passwords do not match<br>";
				}

				if(strstr($value, " ")) {

					$this->error = $this->error . "Password can't have spaces<br>";
				}

				if(strlen($value) < 8) {

					$this->error = $this->error . "Password must be at least 8 characters long<br>";
				}

			}

		}


		$sql = "update users set ";
		foreach ($data as $key => $value) {
			# code...

			$sql .= $key . '="' . $value . '",';
		}
		
		$DB = new Database();
		$sql = trim($sql,",");
		$sql .= " where userid = '$id' limit 1";
		$DB->save($sql);
	}
}
