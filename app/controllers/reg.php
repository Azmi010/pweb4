<?php

$conn = new mysqli('localhost', 'root', '', 'skpi');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";



  if(isset($_POST['reg'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "INSERT INTO akun (username, password, role)
    VALUES ('$username', '$password', 'mahasiswa')";
    
    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }