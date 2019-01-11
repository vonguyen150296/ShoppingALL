<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ShoppingALL-Administrateur</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="{{asset('css/admin.css')}}">
</head>
<body>
	@include('admin.layouts.head')
	<div class="body">
		<div class="row">
			<div class="col-sm-3">
				@include('admin.layouts.menu')
			</div>
			<div class="col-sm-9 content">
				@yield('content')
			</div>
		</div>
	</div>
	@include('admin.layouts.footer')
</body>
</html>