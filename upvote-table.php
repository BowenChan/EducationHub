<!DOCTYPE html>
<?php

error_reporting(0);
session_start();
?>
<html ui-view>
<head>
    <title>Upvotes</title>
    <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" href="jquery.dynatable.css">
    <link rel="stylesheet" href="upvotes.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="jquery.dynatable.js"></script>

</head>

<body >
<?php
    include('include/connect.php');
    
    $sql = "SELECT * FROM education";
    $result = mysqli_query($conn,$sql);
    ?>
<div id="wrapper">
<table class = "pure-table" id = "my-table">
     <thead>
    <tr>
        <th>Title</th>
        <th>Upvote</td>
    </tr>
    </thead>
    <tbody>
<?php
        $button_id = 0;
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            echo "<tr>";

            $link = "\"".$row['lesson_link']."\"";
            $title = $row['title'];
            $user = $_SESSION['username'];
            $checkIfAlreadyUpvoted = "select count(*) as total from upvotes where username='".$user."' and lesson_title='".$title."'";
            $numResults = mysqli_query($conn, $checkIfAlreadyUpvoted);
            $data=mysqli_fetch_assoc($numResults);
            $number = $data['total'];
            // echo 1;
            $doubleQuote = "\"";
            $singleQuote = "'";
            $disabled = "";
            // echo $number;
            $button_id += 1;
            if(strval($number) == "0")
            {
                // echo $number;
                $functionCall = "onclick=".$doubleQuote."clicked(".$singleQuote.$user.$singleQuote.",".$singleQuote.$title.$singleQuote.",".$singleQuote.strval($button_id).$singleQuote.");".$doubleQuote;
                // echo "hello";
            } 
            else
            {
                // echo $number;
                $functionCall = "onclick=\"\"";
                $disabled = "disabled = \"true\"";
            } 
            
            
            // $functionCall = "onclick=".$doubleQuote."clicked(".$singleQuote.$user.$singleQuote.",".$singleQuote.$title.$singleQuote.",".$singleQuote.strval($button_id).$singleQuote.");".$doubleQuote;
            echo "<td>";
            echo "<a class=\"pure-button\" href= ".$link.">Link</a>";
            echo "&nbsp;";
            echo $title;
            echo "</td>";
            echo "<td>"; 
            echo "<a class=\"pure-button\" id=\"".$button_id."\" ".$functionCall." ".$disabled.">Upvote</a>";
            echo "</td>";

            

            ?>
            <?php 
            echo "</tr>";
        }


    $conn->close();
?>
</tbody>

</table>
</div>
    <script>
        $('#my-table').dynatable();
        // $('#upvote-button').click(
        //     function() {
        //         $.post("insert_upvote_in_db.php", { name: "test"} );
        //         alert("click");

        //     });

    function clicked(username, title, button_id)
    {
        // alert(username+title);
        $.post("insert_upvote_in_db.php", {user: username, lesson: title});
        // alert("#"+button_id);
        $("#"+button_id).attr('disabled','disabled');
        $("#"+button_id).removeAttr('onclick');
    }
    </script>
</body>

</html>


