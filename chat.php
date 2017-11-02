<!DOCTYPE html>
<html ng-app="myApp">
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<style type="text/css">
	.messages{
    border: 1px solid #ccc;
    width: 250px;
    height: 100px;
    padding: 20px;
    overflow-y:scroll;

}
</style>
</head>
<body>
	<h1>Angular Js sample chat(dynamic) application</h1>
	<div ng-controller="testController">

		<div class="messages">
		<p ng-repeat="msg in messages track by $index">{{msg}}</p>
		</div>
		<br>
		<form ng-submit="send_msg()" autocomplete="off">
			<input type="text" name="msg" ng-model="message.txt">
			<input type="submit" name="send">
		</form>
	</div>
	
</body>

<script type="text/javascript">
	$(".messages").animate({ scrollTop: $(this).height() }, "slow");
	
	var app = angular.module("myApp", []);

	app.controller("testController", function($scope, $http){

		//Method to get all comments
		$http.get("getmessages.php")
		.then(function(response){
			$scope.messages = response.data;
		});

		$scope.message = {};

		//Method to submit a comment
		$scope.send_msg = function(){

			$http({
				method : 'POST',
				url : 'sendmessage.php',
				data : $scope.message,
			})
			.then(function(response){
	                  if(response.data == "success"){
	                    $http.get("getmessages.php")
	                      .then(function(response){
	                        $scope.messages = response.data;
	                        $scope.message.txt = "";
	                      });
	                  }
	        });
		}
	});
</script>
</html>