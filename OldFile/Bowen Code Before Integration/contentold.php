<body ui-view = "right" ng-app>


    <?php 
        include('include/connect.php');
        ?>
    <table ng-style = "{'width':'100%','float':'right'}">
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
        $q =  mysqli_query($link,"SELECT * FROM `" . $table . "`");
            $i  = 0;
        while($row = mysqli_fetch_array($q, MYSQLI_ASSOC))
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
               <a href ='
               <?php echo $row['lesson_link']; 
               ?>' >Link</a>
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

    

?>

</table>
</span>
</body>