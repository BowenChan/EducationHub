<?php

error_reporting(0);
session_start();
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
	<title>Login</title>
</head>
<body>
	<?php
	
	$form = "<form action='./log-in.php' method='post'>
	<table>
	<tr>
		<td>Username:</td>
		<td><input type='text' name='user' /></td>
	</tr>
	<tr>
		<td>Password:</td>
		<td><input type='password' name='password' /></td>
	</tr>
	<tr>
		<td></td>
		<td><input type='submit' name='loginbtn' value='Login' /></td>
	</tr>
	</table>
	</form>";
	
	if($_POST['loginbtn']){
		$user = $_POST['user'];
		$password = $_POST['password'];

		if($user){
			if($password){

				require("connect/connect.php");

				//$password = md5(md5("jfkd".$password."Fjsr6h"));
				//echo $password;

				$query = mysql_query("SELECT * FROM userstable WHERE username='$user'");

				$numrows = mysql_num_rows($query);

				if($numrows == 1 ){
					$row = mysql_fetch_assoc($query);
					$dbid = $row['id'];
					$dbuser = $row['username'];
					$dbpass = $row['password'];
					$dbstatus = $row['status'];

					if($password == $dbpass){

						if($dbstatus == 1){

							$_SESSION['userid'] = $dbid;
							$_SESSION['username'] = $dbuser;
							
							echo "You have been logged in as <b>$dbuser</b>.";
							//Next page will load right after this point.

						}
						else
							echo "Your Account is not active.  $form";
					}
					else
						echo " You did not enter the correct password.  $form";

				}
				else
					echo "Your user name was not found! $form";
				mysql_close();
			}
			else
				echo "You must enter your password. $form";
		}
		else
			echo "You must enter your username. $form";
	}
	else
		echo $form;
	?>
</body>
</html>