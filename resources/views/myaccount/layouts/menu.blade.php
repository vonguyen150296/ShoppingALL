	<div class="menu">
		<div><b>{{$subname}} {{$name}}</b></div>
		<div class="text-justify">COMPTE N° : <span style="margin: 80px;">{{$user_id}}</span></div>
		<div class="text-justify">DATE DE CRÉATION : <span style="margin: 30px;">{{date_format($created_at,"Y/m/d")}}</span></div><br>
		<a style="margin-left: 150px;" href="{{route('logout')}}">Me déconnecter <i class="fas fa-sign-out-alt"></i></a>
		<br><br>
		<ul>
			<li><a href="{{route('home')}}"><i class="fas fa-home"></i> Page d'accueil</a></li>
			<li><a href="#!profile"><i class="fas fa-user"></i> Mon profil</a></li>
			<li><a href="#!purchases"><i class="fas fa-cart-plus"></i> Mes achats</a></li>
			<li><a href="#!payment"><i class="far fa-credit-card"></i> Mes cartes de paiement</a></li>
		</ul>
	</div>
	<script type="text/javascript">
		angular.module('myaccount', ["ngRoute"]).config(function($routeProvider){
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
	</script>