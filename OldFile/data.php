<!DOCTYPE html>
<html>
<head>
  <title>Page Title</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "educationhub";

// Create connection
$link = mysqli_connect($servername, $username,$password ,$dbname);
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully<br>\n";

$sql = "SELECT * FROM `education`";
$result = mysqli_query($conn,$sql);
?>

<table cellspacing = "30">
	<!-- <col width="1000"> -->
  <!--<col width="2000">-->
  <tr>
    <td>Title</td>
    <td>Description</td> 
    <td>Lesson Link</td>
    <td>Lesson Image</td>
    <td>Category</td>
    <td>Grade level</td>
    <td>Author</td>
    <td>Content Type</td>
    <td>Time Scraped</td>
  </tr>
<?php
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            echo "<tr>";
            echo "<td>";
            echo $row['title'];
            echo "</td>";

            echo "<td>";
            echo $row["description"];
            echo "</td>";

            echo "<td>"; 
            ?>
               <a href ="<?php echo $row['lesson_link']; ?>" >Link</a>
            <?php
            echo "</td>";

            echo "<td>";?>
                <img src="<?php echo $row['lesson_image']; ?>" />
            <?php
            //echo $row["lesson_image"];
            //echo $data;
            echo "</td>";

            echo "<td>";
            echo $row["category"];
            echo "</td>";

            echo "<td>";
            echo $row["student_grades"];
            echo "</td>";

            echo "<td>";
            echo $row["author"];
            echo "</td>";

            echo "<td>";
            echo $row["content_type"];
            echo "</td>";

            echo "<td>";
            echo $row["time_scraped"];
            echo "</td>";
            echo "</tr>";
        }


    $conn->close();
?>

</table>
</body>

</html>
