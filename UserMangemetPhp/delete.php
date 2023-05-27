<?php
session_start();
include 'connection.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete']; 
    $sql = "DELETE FROM user_form WHERE id='$id'";
    
    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Record has been deleted!";
        $_SESSION['msg_type'] = "danger";
    } else {
        $_SESSION['message'] = "Error deleting record: " . mysqli_error($conn);
        $_SESSION['msg_type'] = "danger";
    }

    header("location: delete.php");
}
?>

