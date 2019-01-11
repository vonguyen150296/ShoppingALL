@extends('layouts.index')

@section('content')
<div class="container">
		<div id="content">
			
			<div class="table-responsive">
				<!-- Shop Products Table -->
				<table class="shop_table beta-shopping-cart-table" cellspacing="0">
					<thead>
						<tr>
							<th class="product-name">Produit</th>
							<th class="product-price">Prix</th>
							<th class="product-quantity">Quantité</th>
							<th class="product-remove">Supprimer</th>
						</tr>
					</thead>
					<tbody>
						@foreach($product_cart as $p)
						<tr class="cart_item">
							<td class="product-name">
								<div class="media">
									<img class="pull-left" src="./image/product/{{$p['item']['image']}}" width="70px" height="70px" alt="">
									<div class="media-body">
										<br>
										<p class="font-large table-title">{{$p['item']['name']}}</p>
									</div>
								</div>
							</td>

							<td class="product-price">
								<span class="amount">
								@if($p['item']['promotion_price'] != 0)
								{{$p['item']['promotion_price']}}€
								@else
								{{$p['item']['unit_price']}}€
								@endif
								</span>
							</td>

							<td class="product-price">
								<p class="amount"><a href="{{route('add-to-cart',$p['item']['id'])}}"><i class="fas fa-plus"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;{{$p['qty']}}&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{route('delete-by-one',$p['item']['id'])}}"><i class="fas fa-minus"></i></a> </p>
							</td>

							<td class="product-remove">
								<a href="{{route('delete-item',$p['item']['id'])}}" class="remove" title="Remove this item"><i class="far fa-trash-alt"></i></a>
							</td>
						</tr>
						@endforeach
						<tr>
							<td></td>
							<td style="font-size: 20px; color: #aaa1f9; font-weight: bold;">Totale:  {{Session('cart')->totalPrice}}€</td>
						</tr>
					</tbody>

					<tfoot>
						<tr>
							<td colspan="6" class="actions">
								<div id="notification" class="text-success"></div>
								<button type="submit" class="beta-btn primary" name="proceed"><a href="{{route('payment')}}"> Paiement <i class="fa fa-chevron-right"></i></a></button>
							</td>
						</tr>
					</tfoot>
				</table>
				<!-- End of Shop Table Products -->
			</div>
			<!-- End of Cart Collaterals -->
			<div class="clearfix"></div>

		</div> <!-- #content -->
	</div>
@endsection
