<?php

class Database
{

  private $host = "localhost";
  private $username = "username";
  private $password = "password";
  private $db = "db_name;

  function connect()
{
	$conn = mysqli_connect($this->host, $this->username, $this->password, $this->db);
	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	return $conn;
}

  function read($query)
  {
    $conn = $this->connect();
    $result = mysqli_query($conn, $query);

    if (!$result) {
      return false;
    } else {
      $data = false;
      while ($row = mysqli_fetch_assoc($result)) {

        $data[] = $row;
      }

      return $data;
    }
  }

  function save($query)
  {
    $conn = $this->connect();
    $result = mysqli_query($conn, $query);

    if (!$result) {
      return false;
    } else {
      return true;
    }
  }
}
