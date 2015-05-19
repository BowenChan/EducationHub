
<?php

	session_start();
	$_SESSION["DiscussionID"] = $_GET['disc'];
	


	if(!isset($_SESSION['DiscussionID']) && empty($_SESSION['DiscussionID'])) 

	{

   		header('Location:http://www.sjsu-cs.org/cs160/sec1group1/'); 

	}


	include('include/connect.php');

    $sql = "SELECT * FROM discussion WHERE discussion.ID = " . $_SESSION['DiscussionID'] . ";";


    $result = mysqli_query($conn,$sql);


    $sqll = "SELECT * FROM forum WHERE id = " . $_SESSION['DiscussionID'] . ";";

    $head = mysqli_query($conn,$sqll);

    $discussion_header = mysqli_fetch_array($head, MYSQLI_ASSOC);


    echo "<html ui-view>";

	echo "<head>";

    echo "<title>Discussion</title>";

    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/style.css\">";

	echo "</head>";

	echo "<body ui-view>";

	echo "<h1>" . $discussion_header['Dname'] . "</h1> ";

	echo "<table style=\"width:100%\">";

    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        echo "<tr>";

        echo "<td>";

        echo $row['Uname'] . "<br>" . $row['comment_date'] ;

        echo "</td>";

		echo "<td>";

        echo $row["comment"];

        echo "</td>";

        echo "</tr>";

    }

	echo"</table><br>";

    $conn->close();

	if(isset($_SESSION['username']) && !empty($_SESSION['username']))

	{

 		echo "<form action=\"discussionsubmit.php\" method=\"POST\" id=\"form\">";

  		echo "<p><font size=\"18\">Comment:</font></p><br>";

		echo "<textarea name=\"comment\" cols=\"50\" rows=\"4\" required></textarea>";

  		echo "<br><input type=\"submit\" value=\"Submit\">";

		echo "</form>";
		echo "<form action=\"http://www.sjsu-cs.org/cs160/sec1group1/#/forum\" method=\"POST\" id=\"form\">";
		echo "<br><input type=\"submit\" value=\"Back\">";
		echo "</form>";

	}
	else
	{
		echo "<p> Please <a href = 'http://www.sjsu-cs.org/cs160/sec1group1/#/login'> login </a> to comment </p>";
		echo "<a href = 'http://www.sjsu-cs.org/cs160/sec1group1/#/forum' ui-sref = 'forum'> <button type = 'Button'> Back </button></a>";
	}

	echo "</body>";
	echo "</html>";
?>
