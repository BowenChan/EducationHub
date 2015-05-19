
		
			var educationHub = angular.module('educationHub', ["ui.router" , 'ngRoute', 'infinite-scroll'])
		    educationHub.config(function($stateProvider, $urlRouterProvider){
		     

		      	// For any unmatched url, send to /route1
		      	$urlRouterProvider.otherwise("/home")
		      	
		      	//set up all the url routing
		      	$stateProvider

		      		//index state
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
				      			templateUrl: "welcome/welcome.html"
				      		}
			      		},

			      		controller: "ref"
			      	})

			      	//us states
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

			        //forum states
			        .state('forum', {
			        	url: "/forum",
			        	views:{
				      		'body' : {
				      			//templateUrl: "welcome.html",
				      		},
				      		'header' :{
				      			template:" <h1>Forum</h1>",
				      		},
				      		'@' :{
				      			templateUrl: "forumview.php"
				      		}
			      		},
			        	
			        })

			        .state('forum1', {
			        	url: "/forum",
			        	views:{
				      		'body' : {
				      			//templateUrl: "welcome.html",
				      		},
				      		'header' :{
				      			template:" <h1>Forum</h1>",
				      		},
				      		'@' :{
				      			templateUrl: "createthread.php"
				      		}
			      		},
			        	
			        })

			        .state('forum2', {
			        	url: "/forum/discussion/:discNum",
			        	views:{
				      		'body' : {
				      			//templateUrl: "welcome.html",
				      		},
				      		'header' :{
				      			template:" <h1>Forum</h1>",
				      		},
				      		'@' :{
				      			templateUrl: function($stateParams)
				      			{
				      				return "discussion.php?disc=" + $stateParams.discNum; 
				      			}
				      		}
			      		},

			      		controller: function($scope, $stateParams) {
			      			console.log($stateParams.discNum);
					        $scope.discNum = $stateParams.discNum;
					        //console.log($scope.discNum);
						},
			        	
			        	
			        })

			        .state('forum3', {
			        	url: "/forum",
			        	views:{
				      		'body' : {
				      			//templateUrl: "welcome.html",
				      		},
				      		'header' :{
				      			template:" <h1>Forum</h1>",
				      		},
				      		'@' :{
				      			templateUrl: "discussionsubmit.php"
				      		}
			      		},
			        	
			        })


			        .state('forum4', {
			        	url: "/forum",
			        	views:{
				      		'body' : {
				      			//templateUrl: "welcome.html",
				      		},
				      		'header' :{
				      			template:" <h1>Forum</h1>",
				      		},
				      		'@' :{
				      			templateUrl: "threadcreationattempt.php"

				      		}
			      		},			    
			        })


			        //upvote state
			        .state('upvote', {
			        	url: "/upvote",
			        	templateUrl: "upvote-table.php"
			        })
			       
			       	.state('category1', {
			       		url:"/category/{ex}",
			       		templateUrl:function($stateParams, $location)
			       		{
			       				//console.log($location.absUrl());
			       			return "category.php?cat=" + $stateParams.ex;
			       		},
			       		controller: function($scope, $stateParams) {
					        $scope.ex = $stateParams.ex;
					        console.log($scope.cat);
						},
						
			       	})

			        //logout state
			        .state('logout',{
			        	url: "/logout",
			       		templateUrl: "logout.php",
			        
			        	
			        	controller: "refreshLogout"
			        })

			        //profile state
			        .state('profile',{
			        	url: "/profile",
			        	views:{
				      		'body' : {
				      			//templateUrl: "profile.php",
				      		},
				      		'header' : {
				      			template:" <h1>Profile</h1>",
				      		},
				      		'@' :{
				      			templateUrl: "profile.php"
				      		}
			      		},
			        })

			        //category state
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

			        //login state
			        .state('login',{
			        	url: "/login",
			        	templateUrl: "login.php",
			        })

			        //register state
			        .state('register',{
			        	url: "/register",
			        	templateUrl: "signup.php"
			        })
		    })
			/*
			//works on the verification of the header
			educationHub.controller("header", ['$scope', '$rootScope', '$http', '$location', function($scope , $rootScope, $http, $location){
				var authenticate = function(credentials, callback){

					var headers = credentials ? {authorization : "Basic " + btoa(credentials.uname + ":" + credentials.pname)
				} : {};

				$http.cget('login.php', {headers : headers}).success(function(data){
					if(data.name){
						$rootScope.authenticated = true;
					} else {
						$rootScope.authenticated = false;
					}

					callback && callback();

				}).error(function(){
					$rootScope.authenticated = false;
					callback && callback;
				});
				}
				
				authenticate();
				$scope.credential = {};
				$scope.login = function(){
					authenticate($scope.credential, function(){
						if($rootScope.authenticated){
							$location.path("/cs160/sec1group1/");
							$scope.error = false;
						} else {
								$location.path("/cs160/sec1group1/#/login");
								$scope.error = true;
						}
					});
				};
				$scope.logout = function() {
					$http.post('logout', {}).success(function() {
				    	$rootScope.authenticated = false;
				    	$location.path("/cs160/sec1group1/");
					}).error(function(data) {
						$rootScope.authenticated = false;
				});
}
			}])
			*/
			//reloads the page
			educationHub.controller('refreshLogout', ['$scope', '$window', function($scope, $window){
				$scope.reloadRoute = function() {
 				 
 				  $window.location.reload(true);
 				  //$window.location.href = "/cs160/sec1group1/#";
				}
			}])


		    //search string
		    educationHub.controller('start', ['$scope', function($scope){
		    	$scope.result = "";
		    }])

		    //checks for the state
		   	educationHub.controller('show', ['$scope' ,'$state', function($scope, $state){
		   		$scope.$state = $state;
		   	}])

		   	educationHub.controller('cat', ['$scope', '$state', '$location', function($scope, $state, $location){

		   	}])
		   	educationHub.controller('ref', ['$scope', '$route', function($scope, $route){
		   		$route.reload();
		   	}]);



		   	//loads all the files
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
					
				});


				$http.get('results.json')
				.then(function(response) {
					
					$scope.subj = response.data;

				})
				.catch(function(response) {
					console.error('Gists error', response.status, response.data);
				})
				.finally(function() {
					
				});


		    }]);
		   	/*
		    var getVideo = function($scope, $log, $http)
		    {
		    	$scope.item = [];
		    	var data = $http.get('videos.json')	
				.then(function(response) {
					$scope.item = response.data;

				return $scope.item;
		    }

		   	var numbersController = function($scope){
   				$scope.vid = [];
   				$scope.counter = 0;
   				$scope.item = getVideo();
			    $scope.loadMore = function () {
			        for (var i = 0; i < 10; i++) {
			            $scope.vid.push($scope.item.Video[i]);
			        };
			    }
			    $scope.loadMore();
			};

		   	educationHub.controller('numbersController', numbersController);
		   	*/