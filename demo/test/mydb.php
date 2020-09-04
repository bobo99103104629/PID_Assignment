<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE mydb;";

if ($conn->query($sql) === TRUE) {
  $_SESSION['AlertMsg'] = array('danger','<i class="material-icons">block</i> 新增失敗！',false);
} else {
  $_SESSION['AlertMsg'] = array('danger','<i class="material-icons">block</i> 新增失敗！',false);

}


?>



