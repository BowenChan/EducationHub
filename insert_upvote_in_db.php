<!DOCTYPE html>
<?php

error_reporting(0);
session_start();
?>

<?php
    include('include/connect.php');
    $sql = "SELECT * FROM education";
    $result = mysqli_query($conn,$sql);

    $username = $_POST['user'];
    $title = $_POST['lesson'];
    $singleQuote = "'";
    $insert = "insert into upvotes values(".$singleQuote.$username.$singleQuote.", ".$singleQuote.$title.$singleQuote.")";
    $result = mysqli_query($conn, $insert);
?>