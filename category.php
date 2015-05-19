<!DOCTYPE HTML>
<!--
<html>
	<head>
		<title>EducationHub</title>

	</head>
	<body ng-controller = "cat">
		<h1> We have these categories</h1>

		<ul>
			
			<li ng-repeat = "data in thing.Categories"> {{data.Id}} </li>
			
		</ul>
	</body>
</html>
-->

<body ui-view >
   

    <?php
    if(isset($_GET['cat']))
    	
    	echo $_GET['cat'];
    else
    {
    ?>
    	<div ng-controller = "pagination" >
            <ul ng-style = "{'list-style-type': 'none'}" >>
                <li ng-repeat = "data in subj.Categories"> {{data.Category}} </li>
                 
            </ul>
            <hr />
 	    </div>
 	<?php
    }
    ?>
</body>