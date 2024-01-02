<?php

$conn = new mysqli('localhost', 'root', '', 'skpi');

function updateValidationStatus($id_item_skpi, $validasi)
{
    global $conn;
    $sql = "UPDATE item_skpi SET validasi = ? WHERE id_item_skpi = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $validasi, $id_item_skpi);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function revertValidationStatus($id_item_skpi, $validasi)
{
    global $conn;
    $sql = "UPDATE item_skpi SET validasi = ? WHERE id_item_skpi = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $validasi, $id_item_skpi);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function getPoinByIdItemSkpi($id_item_skpi)
{
    global $conn;
    $query = "SELECT pn.poin FROM poin pn
              JOIN item_skpi i ON pn.id_poin = i.id_poin
              WHERE i.id_item_skpi = ?";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id_item_skpi);
    $stmt->execute();
    $stmt->bind_result($poin);
    $stmt->fetch();
    $stmt->close();
    
    return $poin;
}

if (isset($_POST['id'])) {
    $id_item_skpi = $_POST['id'];
    $revert = isset($_POST['revert']) ? $_POST['revert'] : false;

    if ($revert) {
        $result = revertValidationStatus($id_item_skpi, 0);
        if ($result) {
            $poin = getPoinByIdItemSkpi($id_item_skpi);
            echo "Reverted|" . $poin;
        } else {
            echo "Error : " . $stmt->error;
        }
    } else {
        $result = updateValidationStatus($id_item_skpi, 1);

        if ($result) {
            $poin = getPoinByIdItemSkpi($id_item_skpi);
            echo "Success|" . $poin;
        } else {
            echo "Error : " . $stmt->error;
        }
    }
}
