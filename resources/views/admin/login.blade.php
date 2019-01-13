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
<div class="row mt-5 mb-5" style="min-height: 500px;">
<div class="col-sm-4 offset-sm-4 mb-5 mt-5">
	<div class="content-title">Se connecter</div>
		@if(isset($error) == true)<span class="text-warning">{{$error}}</span>@endif
	<form action="{{route('admin-post-login')}}" method="post" accept-charset="utf-8">
		@csrf
		<input type="email" name="username" placeholder="Entrer votre nom d'utilisateur" class="form-control form-control-lg mt-3" required>
		<input type="password" name="password" placeholder="Entrer votre password" class="form-control form-control-lg mt-3" required>
		<button class="btn btn-success mt-4 offset-8">Se connecter</button>
	</form>
</div>
</div>
@include('admin.layouts.footer')
</body>
</html>