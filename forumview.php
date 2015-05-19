
<?php

    session_start();





    echo "<!DOCTYPE html>";

    echo "<html>";

    echo "<body>";

    echo "<h2>Viewing Threads</h2>";

    echo "<button type = 'Button' ui-sref = 'forum1'> Create a Thread! </button>";

    include('include/connect.php');

    //echo "Connected successfully<br>\n";

    $sql = "SELECT * FROM `forum`";

    $result = mysqli_query($conn,$sql);

    //echo "My first PHP script!";

    echo "<table cellspacing = \"30\">";

    echo "<!-- <col width=\"1000\"> -->";

    echo "<!--<col width=\"2000\">-->";

    echo "<tr>";

    echo "<td>Title</td>";

    echo "<td>Discussion</td> ";

    echo "<td>Time Stamp</td>";

    echo "</tr>";


    $arr = array();

            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))

            {
    			$arr[$row['title']] = $row['id'];
                echo "<tr>";

                echo "<td>"; 

    	
    	       // echo "<a href=discussion.php?disc=". $arr[$row['title']] . ">" .$row['title'] . "</a>";

                echo "  <a ui-sref ='forum2({discNum:" . $arr[$row['title']] . "})'>" . $row['title'] . "</a>";

                echo "</td>";

                $partofdiscussion = $row["description"];

                $partofdiscussion = substr($partofdiscussion, 0, 100) . "...";

                echo "<td>"; 

                echo $partofdiscussion;

                echo "</td>";

                echo "<td>";

                echo $row["timestamps"];

                echo "</td>";

    			echo "</tr>";

            }

        $conn->close();

    echo "</table>";

    echo "</body>";

    echo "</html>";

?>