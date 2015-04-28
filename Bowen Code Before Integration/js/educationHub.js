
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
		      

		      $stateProvider

			      	.state('index',{
			      		url: "/home",
			      		templateURL: "index.html"
			      	})

			        .state('about', {
			            url: "/about",
			            
			            views:{
				        	'body' : {
				        		templateUrl :"about/aboutbody.html",
				        	
				        	},
					        '@' :{
					        	
				        		templateUrl: "about/about.html"
					        }
					    },
			            controller: "show"
			        })
			          
			        .state('contact', {
			            url: "/contact",
			            templateUrl: "contact.html"
			        })

			        .state('profile',{
			        	url: "/profile",
			        	templateUrl: "profile.html"
			        })
			        .state('content',{
			        	url: "/TheHoTheory",
				        views:{
				        	'search' : {
				        		templateUrl :"about.html",
				        	},	
					        '@' :{
					        	
				        		templateUrl: "content.php"
					        }
					    
					    },
					    controller: "show"
			        })
			        .state('category',{
			        	url: "/category",
			        	templateUrl: "category.html"
			        })
			        .state('physics',{
			        	url: "/category/none",
			        	templateUrl: "none.html"
			        })
			        .state('login',{
			        	url: "/login",
			        	templateUrl: "login.php"
			        })
			        .state('register',{
			        	url: "/register",
			        	templateUrl: "register.php"
			        })

		    	
		    })
		    educationHub.controller('h', ['$scope', function($scope){
		   		$scope.menu = "Headllo";
		   	}])

		   	educationHub.controller('show', ['$scope' ,'$state', function($scope, $state){
		   		$scope.$state = $state;
		   	}])
