<?php

class Database
{

  private $host = "localhost";
  private $username = "username";
  private $password = "password";
  private $db = "db_name";

   function connect()
  {

    try {
        $conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db, $this->username, $this->password);
       
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected to DB Successfully. ";
        
    } catch (PDOException $e) {
        echo "Connection to DB failed: " . $e;
       
    }
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
