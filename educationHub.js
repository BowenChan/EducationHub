
			/*
			//console.log("Angular object",angular);
			var educationHub = angular.module('myApp', ["ui-router"])
			
			//config function
			educationHub.config('$stateProvider', '$urlRouterProvider', function ($stateProvider, $urlRouterProvider){

				$urlRouterProvider.otherwise("/about")

				$stateProvider
					.state('index', {
						url: "/about",
						templateURL: "index.html"
					})

					.state('about', {
						url: "/about",
						templateURL:"about.html"
					})

					.state('contact', {
						url: "/contact",
						templateURL:"contact.html"
							
						}
					)
			})
			*/

			var educationHub = angular.module('educationHub', ["ui.router"])
		    educationHub.config(function($stateProvider, $urlRouterProvider){
		     

		      // For any unmatched url, send to /route1
		      	$urlRouterProvider.otherwise("/home")
		      	
		      	/*
		     	$urlRouteProvider.when('/logout/', {
						controller: "refresh",
						templateUrl:'/Home'
				});
				*/

		      	$stateProvider

			      	.state('index',{
			      		url: "/home",

			      		views:{
				      		'body' : {
				      			//templateUrl: "welcome.html",
				      		},
				      		'header' :{
				      			template:" <h1>Welcome to our site</h1>",
				      		},
				      		'@' :{
				      			templateUrl: "welcome.html"
				      		}
			      		},

			      		controller: "ref"
			      	})

			        .state('about', {
			            url: "/about",
			            
			            views:{
				        	'body' : {
				        		templateUrl: "about/aboutbody.html",
				        	
				        	},
					        '@' :{
					        	
				        		templateUrl: "about/about.html"
					        }
					    },
			            controller: "show"
			        })
			          
			        .state('forum', {
			        	url: "/forum",
			        	templateUrl: "forumview.php"
			        })

			        .state('forum1', {
			        	url: "/forum",
			        	templateUrl: "createthread.php"
			        })

			        .state('forum2', {
			        	url: "/forum",
			        	templateUrl: "discussion.php"
			        })

			        .state('forum3', {
			        	url: "/forum",
			        	templateUrl: "discussionsubmit.php"
			        })

			        .state('forum4', {
			        	url: "/forum",
			        	templateUrl: "threadcreationattempt.php"
			        })


			        .state('upvote', {
			        	url: "/upvote",
			        	templateUrl: "upvote-table.php"
			        })
			        .state('contact', {
			            url: "/contact",
			            templateUrl: "contact.html"
			            
			        })

			        .state('logout',{
			        	url: "/logout",
			        	templateUrl: "logout.php",
			        	controller: "refreshLogout"
			        })

			        .state('profile',{
			        	url: "/profile",
			        	views:{
				      		'body' : {
				      			templateUrl: "profile.html",
				      		},
				      		'header' :{
				      			template:" <h1>Profile</h1>",
				      		},
				      		'@' :{
				      			templateUrl: "profile.php"
				      		}
			      		},
			        })
			        .state('content',{
			        	url: "/TheHoTheory",
				        views:{
				        	'search' : {
				        		templateUrl :"content/content.html",
				        	},	
					        '@' :{
					        	
				        		templateUrl: "content.php"
					        }
					    
					    },
					    controller: "show"
			        })
			        .state('category',{
			        	url: "/category",
			        	views :{
			        		'header' :{
			        			templateUrl: "category/header.html",
			        		},
			        		'@' :{
			        			templateUrl: "category.html"
			        		}
			        	}
			        })
			        .state('physics',{
			        	url: "/category/none",
			        	templateUrl: "none.html"
			        })
			        .state('login',{
			        	url: "/login",
			        	templateUrl: "login.php",
			        
			        })
			        .state('register',{
			        	url: "/register",
			        	templateUrl: "signup.php"
			        })

		    		.state('grade',{
		    			url: "/profile",
		    			templateUrl: "about/aboutbody.html"
		    		})
		    })
			
			educationHub.controller('refreshLogout', ['$scope', '$window', function($scope, $window){
				$scope.reloadRoute = function() {
 				 
 				  $window.location.reload();
 				  $window.location.href = "/cs160/sec1group1/#";
				}
			}])

		    educationHub.controller('h', ['$scope', function($scope){
		   		$scope.menu = "Headllo";
		   	}])

		    educationHub.controller('start', ['$scope', function($scope){
		    	$scope.result = "";
		    }])

		   	educationHub.controller('show', ['$scope' ,'$state', function($scope, $state){
		   		$scope.$state = $state;
		   	}])

		   	educationHub.controller('ref', ['$scope', '$route', function($scope, $route){
		   		$route.reload();
		   	}]);
		   	educationHub.controller('pagination',['$scope', '$log', '$http', function($scope, $log, $http) {
		   		
		   		
				$http.get('videos.json')
				.then(function(response) {
					
					$scope.numPages = Math.round(response.data.Video.length/10);
					$scope.items = response.data;
				})
				.catch(function(response) {
					console.error('Gists error', response.status, response.data);
				})
				.finally(function() {
					console.log("finally finished gists");
				});


				$http.get('results.json')
				.then(function(response) {
					
					$scope.subj = response.data;

				})
				.catch(function(response) {
					console.error('Gists error', response.status, response.data);
				})
				.finally(function() {
					console.log("finally finished gists");
				});


		    }]);
				
