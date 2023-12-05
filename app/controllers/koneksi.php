<?php

$conn = new mysqli('localhost', 'root', '', 'skpi');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }