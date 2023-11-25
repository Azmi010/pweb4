<?php

include 'koneksi.php';
//   echo "Connected successfully";

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT username, password FROM akun";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        header("Location: ../views/home/index.php");
        // echo'ok';
    }
    } else {
    echo "gagal";
    }
  }