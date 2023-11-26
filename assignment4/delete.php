<?php
include 'connect.php';
if (isset($_GET['ID'])) {
    $ID = $_GET['ID'];
    $sql = "DELETE FROM `student` WHERE `ID` = $ID";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: display.php");
    } else {
        die(mysqli_error($conn));
    }
} else {
    die("ID is not set");
}
?>