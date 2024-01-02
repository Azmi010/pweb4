<?php

$conn = new mysqli('localhost', 'root', '', 'skpi');

function updateValidationStatus($id_item_skpi){
    global $conn;
    $sql = "UPDATE item_skpi SET verifikasi = 0 WHERE id_item_skpi = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_item_skpi);
    
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

if (isset($_POST['id'])) {
    $id_item_skpi = $_POST['id'];
    $result = updateValidationStatus($id_item_skpi);
    
    if ($result) {
        echo "Success";
    } else {
        echo "Error : " . $stmt->error;
    }
}
