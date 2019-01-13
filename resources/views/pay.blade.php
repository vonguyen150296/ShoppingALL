@extends('layouts.index')

@section('content')
<div class="container" style="min-height: 500px;"><br><br><br>
@if(!Auth::check())
<div class="row">
	<div class="col-sm-4"></div>
	<div class="col-sm-4" style="font-size: 20px;" id="compte">
		Est-ce que vous avez une compte?
	</div>
</div><br>
<div class="row" id="compte-res">
	<div class="col-sm-5"></div>
	<div class="col-sm-1 ">
		<button class="btn btn-info form-control" ><a href="{{route('login')}}">oui</a></button>
	</div>
	<div class="col-sm-1">
		<button class="btn btn-info form-control" ><a href="{{route('signup')}}">non</a></button>
	</div>
</div>
@else
<hr><br><br>
<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-4">
	<label style="font-size: 20px">Code Promo</label> <span class="text-warning" id="notification"></span>
	<br><br>
	<input type="text" name="coupon_code" class="form-control" id="coupon_code" value="" placeholder="Code Promo" required><br>
	<button  class="beta-btn primary right" id="apply_coupon">Vérifier le code <i class="fa fa-chevron-right"></i></button>
	</div>
	<div class="col-sm-2"></div>
	<div class="col-sm-3">
		<div style="font-size: 20px"><b>Prix: &nbsp;&nbsp; {{$totalPrice}}€</b></div><br>
		<div style="font-size: 20px; margin-left: 60px;"><b id="promo">- 0€</b></div>
		<hr>
		<div style="font-size: 20px"><b>Totale:</b><b id="total"> {{$totalPrice}}€</b></div>
	</div>
	<div class="col-sm-2"><br><br><br><br><br>
		<form action="{{route('post_payment')}}" method="POST">
			@csrf
		    <script
		            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
		            data-key="{{ env('STRIPE_PUB_KEY') }}"
		            data-amount="{{$totalPrice}}00"
		            data-name="Stripe Demo"
		            data-description="Online course about integrating Stripe"
		            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
		            data-locale="auto"
		            data-currency="eur">
		    </script>
		</form>
	</div>
</div><br><br>

@endif

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
				dataType: "json",
				data: {
					_token : '{{csrf_token()}}',
					coupon : $('#coupon_code').val()
				},
				success: function(result){
					$('#notification').html(result['noti']);
					$('#promo').html("- "+result['value']+"€");
					var price = "{{$totalPrice}}";
					$('#total').html( price - result['value']+"€");
				}
			});
		}
	});

});
</script>

@endsection