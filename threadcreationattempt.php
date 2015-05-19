<?php include("include/connect.php"); 

//recover the form variable values.

date_default_timezone_set("America/Los_Angeles");

$title= $_POST['title'];

$description= $_POST['discussion'];

//$time = date("h:i:sa");



        $query = "INSERT INTO forum"

                ." (title,description,timestamps) VALUES "

                ."('$title', '$description', CURDATE())"

        ;

        mysqli_query($conn,$query);

header('Location:http://www.sjsu-cs.org/cs160/sec1group1/#/forum');

?>
<body ui-view>
<h2>Your thread was successfully created.</h2>

<h2><a href="/cs160/sec1group1/#/forum">Back to thread</a></h2>

</body>
