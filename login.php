<?php

error_reporting(0);
session_start();
if($_POST['loginbtn']){
		$user = $_POST['user'];
		$pass = $_POST['password'];

		if($user){
			if($pass){
				//mysqli_select_db($conn);
				require("include/connect.php");


				$query = mysqli_query($conn,"SELECT * FROM usersTable WHERE username ='$user'");

				$numrows = mysqli_num_rows($query);

				if($numrows == 1 ){
					$row = mysqli_fetch_assoc($query);
					$dbid = $row['id'];
					$dbuser = $row['username'];
					$dbpass = $row['password'];
					$dbstatus = $row['status'];


					if($pass == $dbpass){

						if($dbstatus == 0){

							$_SESSION['userid'] = $dbid;
							$_SESSION['username'] = $dbuser;
							
							
							ob_start();
							

							$newURL = 'http://www.sjsu-cs.org/cs160/sec1group1/#/profile';
							header('location: '.$newURL);
							
							echo "<a href = 'http://www.sjsu-cs.org/cs160/sec1group1/#/profile' ng-click = 'reloadRoute()'> <button type = 'Button'> Back </button></a>";


							ob_flush();
							
						}
						else
							echo "Your Account is not active.  $form";
					}
					else
						echo " You did not enter the correct password.  $form";

				}
				else
					echo "Your user name was not found! $form";
				mysqli_close();
			}
			else
				echo "You must enter your password. $form";
		}
		else
			echo "You must enter your username. $form";
	}
	else
		

?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
	<title>Login</title>
</head>
<body ui-view ng-app = "educationHub" ng-controller = "refreshLogout">
	<h1> Login </h1>
	<form ng-submit ='login()' role = 'form' action='login.php' method='post'>
	<table>
	<tr>
		<td>Username:</td>
		<td><input type='text' name='user' ng-model='credentials.uname' /></td>
	</tr>
	<tr>
		<td>Password:</td>
		<td><input type='password' name='password' ng-model='crendentials.pname' /></td>
	</tr>
	<tr>
		<td></td>
		<td><input type='submit' ng-click ='reloadRoute()' name='loginbtn' value='Login' /></td>
	</tr>
	</table>
	</form>
	
	
</body>
</html>