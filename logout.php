
<body ui-view ng-app = "educationHub" ng-controller = "refreshLogout">
<?php
session_start();
unset($_SESSION['userid']);
unset($_SESSION['username']);
session_destroy();
echo "<h1> Are you sure you want to logout </h1>";
echo "<a href = 'http://www.sjsu-cs.org/cs160/sec1group1/' ng-click = 'reloadRoute()'> <button type = 'Button'> logout </button></a>";
?>
<?php
	if(isset($_SESSION['userid'])){

?>
<form ng-submit ='login()' role = 'form' action='logout.php' method='post'>
	<table>
		<tr><input type='submit' ng-click ='reloadRoute()' name='loginbtn' value='Logout' /></tr>
	
	</table>
</form>
<?php
	}
?>
<!--<p> You have logged out </p>
<a ui-sref = 'index'> <button type = 'Button' ng-click = 'reloadRoute()'> Back </button></a>;-->
</body>