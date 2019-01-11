@extends('layouts.index')

@section('content')
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($type as $t)
							<li><a href="./{{$t->id}}">{{$t->name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Les nouveaux produits</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($new_product)}} produits trouvés</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($new_product as $p)
								<div class="col-sm-4" style="margin-bottom: 20px">
									<div class="single-item">
										<div class="single-item-header">
											<a href="../product/{{$p->id}}"><img src="../image/product/{{$p->image}}" width="270px" height="300px" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$p->name}}</p>
											<p class="single-item-price">
												<span>{{$p->unit_price}}€</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('add-to-cart',$p->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="../product/{{$p->id}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Les autres produits</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($product)}} produits trouvés</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($product as $p)
								<div class="col-sm-4">
									<div class="single-item">
										@if($p->promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="../product/{{$p->id}}"><img src="../image/product/{{$p->image}}" width="270px" height="300px" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$p->name}}</p>
											<p class="single-item-price">
												@if($p->promotion_price != 0)
												<span class="flash-del">{{$p->unit_price}}€</span>
												<span class="flash-sale">{{$p->promotion_price}}€</span>
												@else
												<span>{{$p->unit_price}}€</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('add-to-cart',$p->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="../product/{{$p->id}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="space40">&nbsp;</div>
							<div class="row text-center">{{$product->links()}}</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection