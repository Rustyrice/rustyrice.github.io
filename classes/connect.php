<?php

class Database
{

  private $host = "localhost";
  private $username = "root";
  private $password = "Churchie0423";
  private $db = "mybook_db";

  //   private $host = "localhost";
  //   private $username = "id17528755_root";
  //   private $password = "1YK1u)%MD>zvn}qT";
  //   private $db = "id17528755_sociacube_db";

  function connect()
  {

    $connection = mysqli_connect($this->host, $this->username, $this->password, $this->db);
    return $connection;
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
