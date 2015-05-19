<!DOCTYPE html>
<html>
	<!-- The Head and including Angular -->
	<head>
		<meta charset="utf-8">
		<title> Education Hub</title>
		<?php session_start()?>

		
		<!--
		<link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
		
		<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/css/bootstrap-theme.min.css" rel="stylesheet">
		
		<!--
		<link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/css/bootstrap.min.css" rel="stylesheet">
		-->
		<link rel="stylesheet" type="text/css" href="css/style.css">
		
		<script src = "js/jquery-1.11.2.js"> </script>
		<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
		 <script src="//angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.12.1.js"></script>
		<script src="js/angular-route.min.js"></script>
		<script src ="js/angular-ui-router.min.js"></script>
		<script src ="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"> </script>
		<script src = "http://code.jquery.com/jquery-2.1.3.min.js"> </script>
		<script src ="js/educationHub.js"></script>
		<script src ="js/ng-infinite-scroll.min.js"></script>

		<!--<script src ="js/angular.min.js"></script>-->
	</head>

	<!-- Layout is based on a twitter-->
	<body class = "container" style = "margin: 0px" ng-app ="educationHub"> 
		<nav class = "navbar" role = "navigation" ng-controller ="refreshLogout">
			<div class="navbar navbar-inverse">
			    <div class="container-fluid" >
			    	<div class = "navbar-header">			
			    		<!--
			    		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				    		<span class="sr-only">Toggle navigation</span>
					    	<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						-->
			      		<a class="navbar-brand" ui-sref="index"> <img src = "images/EHLogo3.png" style ="max-width:10%; float:left;"/></a>
			      		
			      	</div>
			      	<div class = "collapse navbar-collapse" id="navbar">

				      	<ul class="nav" >
					      	<li><a ui-sref= "index"> Home </a></li>

					      	
					        <li><a ui-sref="category" class="dropdown-toggle" data-toggle="dropdown"> Categories </a>
					        	<ul class="dropdown-menu">
					        		<li ng-repeat = "data in subj.Categories"><a ui-sref = 'category1({id:{{data.Id}}, ex: {{data.Category}} })' >  {{data.Category}}</a> </li>

					        	</ul>
					        </li>
					        <!--
					        <li><a ui-sref="content">Content </a></li>
					       

					        
					        <li><a ui-sref="tutor">Tutoring</a>
					        	<ul>
					        		<li><a ui-sref="find"> Find a Tutor </a></li>
					        		<li><a ui-sref="connect"> Connect a Tutor </a></li>
					        	</ul>
					        </li>
							-->
					        <li><a ui-sref="forum">Forum</a>
					        	
					        </li>
					        
					        

					        

							<?php
								if(isset($_SESSION['userid'])){

									?>

									<li><a ui-sref="upvote">Upvote Resources</a></li>
									
									<li><a ui-sref="profile">Profile</a>
							        </li>

							        <li><a ui-sref ="logout">Logout</a></li>
							<?php
					    		}
					    		else{
					    			?>
					    			<li><a ui-sref="login">Login</a>
						        	</li>

						        	<li><a ui-sref="register">Register</a></li>
						        	<?php
					    		};
					    	?>
					    	<li><a ui-sref ="us"> Us </a>
						      	<ul>
							        <li><a class ="active" ui-sref="about">About Us</a></li>
							        <li><a ui-sref="contact">Contact Us</a></li>
							    </ul>
							</li>
							
				        	
				      	</ul>
				    </div>
				</div>
			</div>
		</nav>
		<div class="row">
		    <div class="span12" ng-controller = "show">
			    	<div class ="well search" ui-view = "search" ng-style ="{'clear': 'both'}"  ng-show = "$state.includes('content')"> </div>

			    	<div class="well" ui-view  ng-show="$state.includes('content')" ng-style = "{'width': '84%', 'float':'right'}"></div>        
			    	
			    	<div class ="well" ui-view = "header" ng-show = "!$state.includes('content')" ng-show = " !$state.includes('login')" ng-show =" !$state.includes('logout')"></div>

			    	<div class ="well" ui-view ng-show = "!$state.includes('content')"> </div>
			    	
			    	<div class ="well" ui-view = "body" ng-show = "!$state.includes('content')"></div>

			    	<div class = "well" ui-view = "left" ng-style = "{'width':'10%', 'float':'left', 'position':'fixed', 'margin-left':'.5%'}" ng-show = "$state.includes('content')"> </div>

			    	<div class ="well footer" ui-view = "footer" ng-style ="{'clear': 'both'}"  ng-show = "$state.includes('content')"> </div>
			</div>	
		</div>                
	  
	</body>


</html>
