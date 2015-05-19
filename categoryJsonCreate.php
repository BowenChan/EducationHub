<!DOCTYPE html>
<html ng-app ="educationHub">
	<!-- The Head and including Angular -->
	<head>
		<meta charset="utf-8">
		<title> Education Hub</title>
		<?php include("include/connect.php"); ?>
	</head>

	<body class = "container" style = "margin: 0px"> 
	<table>

		<?php
			$categories = array();
			//$db2 = mysqli_select_db($link, $db);
			$q =  mysqli_query($conn,"SELECT * FROM `" . $table . "`");
			$row = mysqli_fetch_array($q);
			$posts = array();
			$i  = 0;
				while($row = mysqli_fetch_array($q, MYSQLI_ASSOC))
				{
					$text = $row['category'];
					$delimText = explode(',', $text);
					

					foreach($delimText as $word)
					{
						$word= trim($word);
						if(!in_array($word, $categories))
						{
							if($word != "")
							{
								$i++;
								$posts[] = array("Id" => $i,"Category" => $word);
							}
							
							echo "<tr>";
							echo "<td>" . $word . "</td>";
							echo "</tr>";
							array_push($categories,$word);
								
						}
						
					}
					
				}
				$response['Categories'] = $posts;

				$fp = fopen('results.json', 'w');
				fwrite($fp, json_encode($response));
				fclose($fp);
			

		?>
	</body>


</html>
