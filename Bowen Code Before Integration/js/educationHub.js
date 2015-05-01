
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

			      		views:{
				      		'body' : {
				      			//templateUrl: "bottom.php",
				      		},
				      		'@' :{
				      			templateUrl: "welcome.html"
				      		}
			      		},
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
			        	templateUrl: "signup.php"
			        })

		    	
		    })
		    educationHub.controller('h', ['$scope', function($scope){
		   		$scope.menu = "Headllo";
		   	}])

		   	educationHub.controller('show', ['$scope' ,'$state', function($scope, $state){
		   		$scope.$state = $state;
		   	}])

		   	 
		   	educationHub.controller('pagination',['$scope', '$log', '$http', function($scope, $log, $http) {
		   		
		   		$scope.items;	
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



			    $scope.totalItems = 998;
			    

			    $scope.setPage = function (pageNo) {
			    	$scope.currentPage = pageNo;
			    };

			    $scope.pageChanged = function() {
			        $log.log('Page changed to: ' + $scope.currentPage);
			    };

			    $scope.filteredTodos = [];
  				$scope.currentPage = 1;
  				$scope.numPerPage = 10;
				$scope.maxSize = 5;
  

			    $scope.$watch('currentPage + numPerPage', function() {
				    var begin = (($scope.currentPage - 1) * $scope.numPerPage)
				    , end = begin + $scope.numPerPage;
				    
				    $scope.filteredTodos = $scope.items.slice(begin, end);
				});
		    }]);
	