@extends('layouts.index')

@section('content')
<div class="container" style="min-height: 500px;"><br><br><br>
@if(!Auth::check())
<div class="row">
	<div class="col-sm-4"></div>
	<div class="col-sm-4" style="font-size: 20px;" id="compte">
		Est-ce que vous avez une compte?
	</div>
	<div class="col-sm-4" style="font-size: 20px; display: none;" id="new">
		Est-ce que vous voulez créer une compte?
	</div>
</div><br>
<div class="row" id="compte-res">
	<div class="col-sm-5"></div>
	<div class="col-sm-1 ">
		<button class="btn btn-info form-control" ><a href="{{route('login')}}">oui</a></button>
	</div>
	<div class="col-sm-1">
		<button class="btn btn-info form-control" ><a id="non_compte">non</a></button>
	</div>
</div>
<div class="row" style="display: none;" id="new_res">
	<div class="col-sm-5"></div>
	<div class="col-sm-1 ">
		<button class="btn btn-info form-control" ><a href="{{route('signup')}}">oui</a></button>
	</div>
	<div class="col-sm-1">
		<button class="btn btn-info form-control" ><a id="non_new">non</a></button>
	</div>
</div>


<form action="{{route('post-signup')}}" method="post" class="beta-form-checkout" style="display: none;" id="contact">
	@csrf
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<h4>Contact :</h4>
			<div class="space20">&nbsp;</div>

			<div class="form-block">
				<label for="your_last_name">Nom*</label>
				<input type="text" name="name" required>
			</div>

			<div class="form-block">
				<label for="your_last_name">Prénom*</label>
				<input type="text" name="subname" required>
			</div>

			<div class="form-block">
				<label for="adress">Adresse*</label>
				<input type="text" name="address" value="15 Avenue du Maréchal Foch" required>
			</div>


			<div class="form-block">
				<label for="phone">Phone*</label>
				<input type="text" name="phone" required>
			</div>

			<div class="form-block">
				<label for="email">Adresse mail*</label>
				<input type="email" name="email" required>
			</div>

			<div class="form-block">
				<button type="submit" class="btn btn-primary">Enregistrer</button>
			</div>
		</div>
		<div class="col-sm-3"></div>
	</div>
</form>
@endif
<br><br><hr><br><br>
<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-4">
	<label style="font-size: 20px">Code Promo</label><br><br>
	<input type="text" name="coupon_code" class="form-control" id="coupon_code" value="" placeholder="Code Promo" required><br>
	<button  class="beta-btn primary right" id="apply_coupon">Vérifier le code <i class="fa fa-chevron-right"></i></button>
	</div>
	<div class="col-sm-3"></div>
	<div class="col-sm-3">
		<div style="font-size: 20px"><b>Prix: &nbsp;&nbsp;&nbsp; 17 €</b></div><br>
		<div style="font-size: 20px; margin-left: 60px;"><b>- 17 €</b></div>
		<hr>
		<div style="font-size: 20px"><b>Totale: 17 €</b>
			<button class="btn btn-success" style="margin-left: 40px;">Paiement</button>
		</div>
	</div>
</div><br><br>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
$(document).ready(function(){
	$('#apply_coupon').click(function(){
		if($('#coupon_code').val() == ''){
			$('#notification').html("Entrer le code, s'il vous plaît");
		}else{
			$.ajax({
				url: "./code-promo",
				type: "POST",
				dataType: "text",
				data: {
					_token : '{{csrf_token()}}',
					coupon : $('#coupon_code').val()
				},
				success: function(result){
					$('#notification').html(result);
				}
			});
		}
	});
});

//fade in question
$(document).ready(function(){
	$("#non_compte").click(function(){
		$("#compte").fadeOut();
		$("#compte-res").fadeOut();
		$("#new").fadeIn(2000);
		$("#new_res").fadeIn(2000);
	});
	$("#non_new").click(function(){
		$("#new").fadeOut();
		$("#new_res").fadeOut();
		$("#contact").fadeIn(3000);
	});
});
</script>
@endsection