<?php
/* File   : dbconnect.php
   Subject: CS160 demo
   Authors: Chris Tseng
   Version: 1.0
   Date   : April 6, 2015
   Description: create database connection to the selected database. Start by creating a database named
   cs160 and then import guestbook.mysql into it.
*/
//Create a database named cs160 and load guestbook.mysql into it before using this example

   $servername = "localhost";
    $username = "youthcyb_160s1g1";
	$password = "Educationhub160!";
	$dbname = "youthcyb_160s1g1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>