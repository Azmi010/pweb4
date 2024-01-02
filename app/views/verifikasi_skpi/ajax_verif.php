<?php

$conn = new mysqli('localhost', 'root', '', 'skpi');

function updateVerificationStatus($id_item_skpi, $verifikasi){
    global $conn;
    $sql = "UPDATE item_skpi SET verifikasi = ? WHERE id_item_skpi = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $verifikasi, $id_item_skpi);
    
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function revertVerificationStatus($id_item_skpi, $verifikasi)
{
    global $conn;
    $sql = "UPDATE item_skpi SET verifikasi = ? WHERE id_item_skpi = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $verifikasi, $id_item_skpi);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

if (isset($_POST['id'])) {
    $id_item_skpi = $_POST['id'];
    $revert = isset($_POST['revert']) ? $_POST['revert'] : false;

    if ($revert) {
        $result = revertVerificationStatus($id_item_skpi, 0);
        if ($result) {
            echo "Reverted";
        } else {
            echo "Error : " . $stmt->error;
        }
    } else {
        $result = updateVerificationStatus($id_item_skpi, 1);
        if ($result) {
            echo "Success";
        } else {
            echo "Error : " . $stmt->error;
        }
    }
}