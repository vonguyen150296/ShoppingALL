@extends('layouts.index')

@section('content')
@include('layouts.slide')
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Les nouveaux produits</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($new_product)}} produits trouvés</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($new_product as $n)
								<div class="col-sm-3" style="margin-bottom: 20px">
									<div class="single-item">
										@if($n->promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="./product/{{$n->id}}"><img src="./image/product/{{$n->image}}" alt="" width="270px" height="300px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$n->name}}</p>
											<p class="single-item-price">
												@if($n->promotion_price != 0)
												<span class="flash-del">{{$n->unit_price}}€</span>
												<span class="flash-sale">{{$n->promotion_price}}€</span>
												@else
												<span>{{$n->unit_price}}€</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('add-to-cart',$n->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="./product/{{$n->id}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->

						<div class="beta-products-list">
							<h4>Les promotions</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($promo)}} produits trouvés</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($promo as $p)
								<div class="col-sm-3" style="margin-bottom: 20px">
									<div class="single-item">
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>

										<div class="single-item-header">
											<a href="./product/{{$p->id}}"><img src="./image/product/{{$p->image}}" alt="" width="270px" height="300px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$p->name}}</p>
											<p class="single-item-price">
												<span class="flash-del">{{$p->unit_price}}€</span>
												<span class="flash-sale">{{$p->promotion_price}}€</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('add-to-cart',$p->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="./product/{{$p->id}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->
						<div class="row text-center">{{$promo->links()}}</div>
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div><!-- .container -->
@endsection

@section('javascript')
<script>
	$(document).ready(function($) {    
		$(window).scroll(function(){
			if($(this).scrollTop()>150){
			$(".header-bottom").addClass('fixNav')
			}else{
				$(".header-bottom").removeClass('fixNav')
			}}
		)
	})
</script>
@endsection