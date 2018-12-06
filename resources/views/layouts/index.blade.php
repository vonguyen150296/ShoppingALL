<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ShoppingALL</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" title="style" href="{{asset('css/style.css')}}">
	<link rel="stylesheet" href="{{asset('css/animate.css')}}">
</head>
<body>
	@include('layouts.header')
	<div>
		@yield('content')
	</div>

	@include('layouts.footer')
	<!--include javaScripts if nesccessary-->
	@yield('javascript')
</body>
</html>