<?php



	session_start();

	include('include/connect.php');


    //echo "Connected successfully<br>\n";


    $sql = "SELECT * FROM usersTable";

    $result = mysqli_query($conn,$sql);



	$found = 0;

	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))

	{

		if( strcmp($row['email'], $_POST['email']) == 0)

		{

			$found = 1;

		}

		if( strcmp($row['username'], $_POST['username']) == 0)

		{

			$found = 2;

		}

	}    	

	if($found == 1)

	{

		$found = 0;

		$_SESSION['email_error'] = -1;

		header('Location:/cs160/sec1group1/#/Register'); 

	}


	if($found == 2)

	{

		$found = 0;



		$_SESSION['username_error'] = -2;

		header('Location: /cs160/sec1group1/#/Register'); 

	}



	else



	{



		$sqll = "INSERT INTO usersTable (firstname,lastname,email,password,status,date,username) 



		VALUES (" . 



		"\"" . $_POST['fname'] . "\"" . "," .



		"\"" . $_POST['lname'] . "\"" . "," .



		"\"" . $_POST['email'] . "\"" . "," .



		"\"" . $_POST['password'] ."\"" . "," .



		"0" . "," . 



		"CURDATE()" . "," .

		

		"\"" . $_POST['username'] ."\"" .

			 ");";



    	$result = mysqli_query($conn,$sqll);



	header('Location:/cs160/sec1group1/');



	}



	mysqli_close($conn);



	//go to userhomepage here







?>







