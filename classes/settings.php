<?php

class Settings
{

	private $error = "";

	public function evaluate($data)
	{

		foreach ($data as $key => $value) {

			if (empty($value)) {
				$this->error = $this->error . $key . " is empty<br>";
			}

			// if ($key == "email") {
			// 	if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $value)) {

			// 		$this->error = $this->error . "Please enter a valid email<br>";
			// 	}
			// }

			if ($key == "first_name") {
				if (is_numeric($value)) {

					$this->error = $this->error . "Your first name can only contain letters<br>";
				}

				if (strstr($value, " ")) {

					$this->error = $this->error . "Your first name can't have spaces<br>";
				}

				if (strlen($value) > 15) {
					$this->error = $this->error . "Your first name is too long. Please choose a shorter name<br>";
				}
			}

			if ($key == "last_name") {
				if (is_numeric($value)) {

					$this->error = $this->error . "Your last name can only contain letters<br>";
				}

				if (strstr($value, " ")) {

					$this->error = $this->error . "Your last name can't have spaces<br>";
				}

				if (strlen($value) > 15) {
					$this->error = $this->error . "Your last name is too long. Please choose a shorter name<br>";
				}
			}

			if ($key == "password") {

				$password = $data['password'];
				$password2 = $data['password2'];
				if ($password != $password2) {

					$this->error = $this->error . "Your passwords do not match<br>";
				}

				if (strstr($value, " ")) {

					$this->error = $this->error . "Your password can't have spaces<br>";
				}

				if (strlen($value) < 8 && strlen($value) >= 1) {

					$this->error = $this->error . "Your password must be at least 8 characters long<br>";
				}

				if (empty($password) || empty($password2)) {
					unset($data['password']);
				}
			}
		}

		$DB = new Database();

		//check tag name
		$data['tag_name'] = strtolower($data['first_name'] . $data['last_name']);

		$sql = "select id from users where tag_name = '$data[tag_name]' limit 1";
		$check = $DB->read($sql);
		while (is_array($check)) {

			$data['tag_name'] = strtolower($data['first_name'] . $data['last_name']) . rand(0, 9999);
			$sql = "select id from users where tag_name = '$data[tag_name]' limit 1";
			$check = $DB->read($sql);
		}

		// //check email
		// // $sql = "select id from users where email = '$data[email]' limit 1";
		// // $check = $DB->read($sql);
		// // if (is_array($check)) {

		// // 	$this->error = $this->error . "Another user is already using that email<br>";
		// // }

		return $this->error;
	}

	public function evaluate_group_settings($data)
	{
		foreach ($data as $key => $value) {

			if ($key == "first_name") {

				if (strlen($value) > 25) {
					$this->error = $this->error . "Your group name is too long. Please choose a shorter name<br>";
				}

				if (empty($value)) {
					$this->error = $this->error . "Your group name is empty<br>";
				}
			}
		}
	}

	public function get_settings($id)
	{
		$DB = new Database();
		$sql = "select * from users where userid = '$id' limit 1";
		$row = $DB->read($sql);

		if (is_array($row)) {

			return $row[0];
		}
	}

	public function save_settings($data, $id)
	{

		$DB = new Database();

		$password = isset($data['password']) ? $data['password'] : "";

		if (strlen($password) < 30 && isset($data['password2'])) {

			if ($data['password'] == $data['password2']) {
				$data['password'] = hash("sha1", $password);
			} else {

				unset($data['password']);
			}
		}

		unset($data['password2']);

		$sql = "update users set ";
		foreach ($data as $key => $value) {
			# code...

			$sql .= $key . "='" . $value . "',";
		}

		$sql = trim($sql, ",");
		$sql .= " where userid = '$id' limit 1";
		$DB->save($sql);
	}
}
