<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Mon compte: {{$fullname}}</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="{{asset('css/myaccount.css')}}">

	<!--angular.js-->
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.5/angular.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.5/angular-route.js"></script>
</head>
<body ng-app="myaccount">
	<div class="header">
		<div class="row logo">
			<div class="col-sm-2">
				<img src="{{asset('image/logo.png')}}" width="150px" alt="">
			</div>
			<div class="col-sm-5">
				<input type="" name="" placeholder="RECHERCHER UNE PRODUIT...">
				<span class="d-inline"><i class="fas fa-search"></i></span>
			</div>
		</div>
		<div class="row sub-header">
			@foreach($type_product as $t)
			<a href="{{ route('product_type',$t->id) }}">{{$t->name}}</a>
			@endforeach
		</div>
	</div>
	<div class="content">
		<div class="row">
			<div class="col-sm-4">
				@include('myaccount.layouts.menu')
			</div>
			<div class="col-sm-8">
				<div class="page">
					<div ng-view></div>
				</div>
			</div>
		</div>

	</div>
	<div id="footer">
		<div class="container text-center">
			&copy 2018, ShoppingALL, La confiance est clé <i class="fas fa-key" style="color:yellow;"></i>
		</div> <!-- .container -->
	</div>

	<!--Script-->
	<script type="text/javascript" src="{{asset('js/myaccount.js')}}"></script>
	
</body>
</html>