@extends('layouts.index')

@section('content')
<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							@if($product->promotion_price != 0)
							<div class="ribbon-wrapper" style="z-index:0;"><div class="ribbon sale">Sale</div></div>
							@endif
							<img src="../image/product/{{$product->image}}" alt="" width="270px" >
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title">{{$product->name}}</p>
								<p class="single-item-price">
									@if($product->promotion_price != 0)
									<span class="flash-del">${{$product->unit_price}}</span>
									<span class="flash-sale">${{$product->promotion_price}}</span>
									@else
									<span>{{$product->unit_price}}</span>
									@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo ms id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe.</p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Options:</p>
							<div class="single-item-options">
								<select class="wc-select" name="qty" id="qty">
									<option value="1">Qty</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<a class="add-to-cart" onclick="add_multi({{$product->id}})" ><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Description</a></li>
							<li><a href="#tab-reviews">Avis (0)</a></li>
						</ul>

						<div class="panel" id="tab-description">
							@if($product->description)
							<p>{{$product->description}}</p>
							@else
							<p>Il n'y a pas de description</p>
							@endif
						</div>
						<div class="panel" id="tab-reviews">
							<p>Il n'y a pas d'avis</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Produit connexe</h4>

						<div class="row">
							@foreach($related_product as $r)
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										@if($r->promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<a href="../product/{{$r->id}}"><img src="../image/product/{{$r->image}}" alt="" width="270px" height="280px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$r->name}}</p>
										<p class="single-item-price">
											@if($r->promotion_price != 0)
											<span class="flash-del">${{$r->unit_price}}</span>
											<span class="flash-sale">${{$r->promotion_price}}</span>
											@else
											<span>${{$r->unit_price}}</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('add-to-cart',$r->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="../product/{{$r->id}}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div class="row text-center">{{$related_product->links()}}</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					 <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">Les nouveaux produits</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($new as $n)
								<div class="media beta-sales-item">
									<a class="pull-left" href="../product/{{$n->id}}"><img src="../image/product/{{$n->image}}" width="100px" height="100px" alt=""></a>
									<div class="media-body">
										{{$n->name}}
										<p class="beta-sales-price">{{$n->unit_price}}€</p>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->

	<script type="text/javascript">
		function add_multi(id){
			var item = document.getElementById('qty');
			var quantity = item.value;
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
			      location.reload();
			    }
			};
			xhttp.open("GET", "../add-to-cart-multi/"+id+'/'+quantity, true);
			xhttp.send();
		}
	</script>
@endsection