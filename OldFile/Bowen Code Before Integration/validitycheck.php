<?php

	session_start();

	include('include/connect.php');

    $sql = "SELECT * FROM usersTable";

    $result = mysqli_query($conn,$sql);

	$found = 0;



	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))

	{

		if( strcmp($row['email'], $_POST['email']) == 0)

		{

			$found = 1;

		}

	}    	

	if($found == 1)

	{

		$found = 0;

		$_SESSION['email_error'] = -1;

		header('Location:signup.php'); 

	}

	else

	{

		$sqll = "INSERT INTO usersTable (firstname,lastname,email,password,status,date) 

		VALUES (" . 

		"\"" . $_POST['fname'] . "\"" . "," .

		"\"" . $_POST['lname'] . "\"" . "," .

		"\"" . $_POST['email'] . "\"" . "," .

		"\"" . $_POST['password'] ."\"" . "," .

		"0" . "," . 

		"CURDATE()" . ");";

    	$result = mysqli_query($conn,$sqll);

		echo "Error: " . $sqll . "<br>" . mysqli_error($conn);

		echo "<html>";

		echo "<head>";

		echo "</head>";

		echo "<body>";

		echo "<p> t" . $sqll . "</p>";

		echo "<p> t" . $result . "</p>";

		echo "</body>";

		echo "</html>";

	}

	mysqli_close($conn);

	//go to userhomepage here



?>



