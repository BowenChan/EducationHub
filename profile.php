<?php

error_reporting(0);
session_start();

?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>User Profile Page</title>
</head>
<body ui-view>
	<?php
	
	include('include/connect.php');
	
	$user = $_SESSION['username'];


	$query = mysqli_query($conn, "SELECT * FROM usersTable WHERE username='$user'");
	$numrows = mysqli_num_rows($query);
				if($numrows == 1){
					$row = mysqli_fetch_assoc($query);
					$dbfname = $row['firstname'];
					$dblname = $row['lastname'];
					$dateActivated = $row['date'];
				}

	$upvote_query = mysqli_query($conn, "SELECT * FROM upvotes WHERE username='$user'");
	$numrows2 = mysqli_num_rows($upvote_query);
				if($numrows2 > 1 ){
					
					while($row2 = mysqli_fetch_assoc($upvote_query)){

						$dbvoteLink[] = $row2['lesson_title'];
							}
				}
	?>

<table width = '600' border="0" align="center" cellpadding="0">
  	<tr>
    	<td height="100" colspan="2" ><h2>Your Profile Information</h2></td>
		<!--<td><div align="right"><a href="index.php">logout</a></div></td>-->
		<br>
  	</tr>
<tr><td><br/></td></tr>
  	<tr>
    	
    	<td valign="top" width = '300' ><div align="left">First Name:</div></td>
    	<td valign="top"><?php echo $dbfname ?></td>
  	</tr>

	<tr>
    	<td valign="top"><div align="left">Last Name:</div></td>
    	<td valign="top"><?php echo $dblname ?></td>
  	</tr>
 
 	<tr>
    	<td valign="top"><div align="left">Date Joined: </div></td>
    	<td valign="top"><?php echo $dateActivated ?></td>
  	</tr>
<tr><td><br/><br/></td></tr>


 	<tr>
    	<td valign="top"><div align="left">Lessons You have Upvoted: </div></td>
    	<td valign="top" >
    		<?php 
    			 foreach (array_unique($dbvoteLink) as $value){
    					echo "$value <br><br>";
    					} 

    		?></td>
  	</tr>

</body>
</html>
