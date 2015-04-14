<!DOCTYPE html>
<html>
<head>
  <title>Page Title</title>
</head>

<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "educationhub";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully<br>\n";

$sql = "SELECT id, title, description, lesson_link, lesson_image, category, student_grades, author, content_type, time_scraped FROM educationhub";
$result = $conn->query($sql);
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
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	echo "<tr>";
    	echo "<td>";
    	echo $row["title"];
    	echo "</td>";

    	echo "<td>";
    	echo $row["description"];
    	echo "</td>";

    	echo "<td>"; ?>
    	<a href ="<?php echo $row["lesson_link"]; ?>" />Link</a>
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
} else {
    echo "0 results";
}
$conn->close();
?>

</table>
</body>

</html>
