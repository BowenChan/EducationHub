<?php

	session_start();

 	include('include/connect.php');

    //echo "Connected successfully<br>\n";


	$sqll = "INSERT INTO discussion (ID,comment,Uname,comment_date) 

		VALUES (" . 

		"\"" . $_SESSION['DiscussionID'] . "\"" . "," .

		"\"" . $_POST['comment'] . "\"" . "," .

		"\"" . $_SESSION['username'] . "\"" . "," .

		"CURDATE()" . 

		");";


    	$result = mysqli_query($conn,$sqll);



	header('Location:http://www.sjsu-cs.org/cs160/sec1group1/#/forum');

	mysqli_close($conn);

?>

<button type = "Button' ui-sref = "forum"> Back </button>