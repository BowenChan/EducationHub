<?php
	if(isset($_SESSION['userid'])
	{

		include('home.html');
	}
	else
	{
		echo "<p> Welcome to our site </p>"
	}
}