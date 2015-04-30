<?php
	session_start();
	$var_value = $_SESSION['email_error'];
    echo "<html>";
	echo "<head>";
    echo "<title>Sign up</title>";
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/style.css\">";

	echo "</head>";
	echo "<body>";
	
	
	if($var_value == -1)
	{
		echo "<p>email exists!</p><br>";
	}
    echo "<form action=\"validitycheck.php\" method=\"POST\" id=\"form\">";
	echo "First name:<br>";
	echo "<input type=\"text\" name=\"fname\" pattern=\".{1,20}\" required ><br>";
  	echo "Last name:<br>";
	echo "<input type=\"text\" name=\"lname\" pattern=\".{1,20}\" required ><br>";
	echo "Email:<br>";
	echo "<input type=\"email\" name=\"email\" required><br>";
	echo "Password:<br>";
	echo "<input type=\"password\" name=\"password\" pattern=\".{4,20}\" required ><br>";
  	echo "<input type=\"submit\" value=\"Submit\">";
	echo "</form>";
	echo "</body>";
	echo "</html>";
?>
