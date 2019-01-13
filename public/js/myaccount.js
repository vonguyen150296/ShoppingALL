var app = angular.module('myaccount', ["ngRoute"]); 

//menu
app.config(function($routeProvider){
	$routeProvider
	.when('/',{
		templateUrl : "../resources/views/myaccount/profile.blade.php"
	})
	.when('/profile',{
		templateUrl : "../resources/views/myaccount/profile.blade.php"
	})
	.when('/purchases',{
		templateUrl : "../resources/views/myaccount/purchases.blade.php"
	})
	.when('/payment',{
		templateUrl : "../resources/views/myaccount/payment.blade.php"
	});
});


var user_id = document.getElementById('user_id').innerHTML; //take id of user
//page profile
app.controller('profile', function($scope, $http){
	$scope.update_response = false;
	//show information of user
	$http.post('./myaccount/infos/'+user_id)
	.then(function(response){
		$scope.user = response.data;
	});

	//update information of user
	$scope.update = function(){
		if($scope.myProfile.$valid == true){
			$http.put('./myaccount/update/'+user_id, $scope.user)
			.then(function(response){
				$scope.update_response = response.data;
			});
		}else{
			$scope.update_response = false;
		}
	};
});

//page purchases
app.controller('purchases', function($scope, $http){
	$http.get('./myaccount/cart')
	.then(function(response){
		$scope.purchases = response.data;
	});

	//function delete item
	$scope.delete = function(id){
		$http.get('./myaccount/delete-item/'+id)
		.then(function(response){
			$scope.purchases = response.data;
		});
	};

	//function delete by one
	$scope.deleteByOne = function(id){
		$http.get('./myaccount/delete-by-one/'+id)
		.then(function(response){
			$scope.purchases = response.data;
		});
	};

	//function add by one
	$scope.add = function(id){
		$http.get('./myaccount/add-to-cart/'+id)
		.then(function(response){
			$scope.purchases = response.data;
		});
	};

	//function payment
	$scope.payment = function(){
		var host = window.location.origin;
		window.location.href = host + '/ShoppingALL/public/payment';
	}
});

//page payment
app.controller('payment', function($scope, $http){
	$http.post('./myaccount/carte-credit/'+user_id)
	.then(function(response){
		$scope.carte = response.data;
		$scope.add = {
			'type':'Master',
			'fullname':'',
			'numero':'',
			'expire':'',
			'sign':''
		};
	});
	
	//function add carte 
	$scope.ajoute = function(){
		$http.post('./myaccount/add-carte-credit/'+user_id, $scope.add)
		.then(function(response){
			$scope.carte = response.data;
			$scope.add = {
			'type':'Master',
			'fullname':'',
			'numero':'',
			'expire':'',
			'sign':''
		};
		});
	};

	//function remouve carte
	$scope.remouve = function(id){
		$http.get('./myaccount/delete-carte/'+id+'/'+user_id)
		.then(function(response){
			$scope.carte = response.data;
		});
	}
});


