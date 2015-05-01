<!DOCTYPE html>
<html ng-app ="educationHub">
	<!-- The Head and including Angular -->
	<head>
		<meta charset="utf-8">
		<title> Education Hub</title>
		<?php include("/include/connect.php"); ?>
	</head>

	<body class = "container" style = "margin: 0px"> 
	<table>

		<?php
			$posts = array();
			//$db2 = mysqli_select_db($link, $db);
			$q =  mysqli_query($conn,"SELECT * FROM `" . $table . "`");
			/*
			$contentArr = array();
			$idArr = array();
			$titleArr = array();
			$categoryArr = array();
			$descriptionArr = array();
			$linkArr = array();
			$imageArr = array();
			$gradeArr = array();
			$authorArr = array();
			$contentArr = array();
			$timeArr = array();
			$posts = array();
			*/
				while($row = mysqli_fetch_array($q, MYSQLI_ASSOC))
				{
					$id = $row['id'];
					$title = $row["title"];
					$category = $row['category'];
					$description = $row['description'];
					$link = $row["lesson_link"];
    				$image = $row['lesson_image'];
    				$grade = $row['student_grades'];
    				$author = $row['author'];
    				$content = $row['content_type'];
    				$time = $row['time_scraped'];
    				$posts[] = array("Id" => $id, "Title" => $title, "Category" => $category, "Description" => $description, "Link" =>$link, "Image" => $image, "Grade" => $grade, "Author" => $author, "Content" => $content, "TimeScraped" => $time);
    				/*
    				$idArr[] = array("Id" => $id);
    				$titleArr[] = array("Title" => $title);
    				$categoryArr[] = array("Category" => $category);
    				$descriptionArr[] = array("Description" => $description);
    				$linkArr[] = array("Link" => $link);
    				$imageArr[] = array("Image" => $image);
    				$gradeArr[] = array("Grade" => $grade);
    				$authorArr[] = array("Author" => $author);
    				$contentArr[] = array("Content" => $content);
    				$timeArr[] = array("Time Scraped" => $time);
					*/
				}
				$response['Video'] = $posts;
				
				$fp = fopen('videos.json', 'w') or die("can't open file");
				$data = json_encode($response, JSON_PRETTY_PRINT);
				echo json_last_error_msg();
				fwrite($fp, $data);
				fclose($fp);
			

		?>
	</body>


</html>
