<?php
/*create connection to mysql
*/
    $servername = "localhost";

    $username = "youthcyb_160s1g1";

    $password = "Educationhub160!";

    $db = "youthcyb_160s1g1";

    $table = "education";
$link = mysqli_connect($servername, $username,$password ,$db);
$conn=new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
