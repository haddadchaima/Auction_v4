<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);


$servername = "localhost";
$username = "root";
$password = "sqlpassauction";
$dbname = "hotsoumek_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["username"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>