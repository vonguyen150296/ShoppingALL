<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> 15 Avenue du Maréchal Foch, Blois</a></li>
						<li><a href=""><i class="fa fa-phone"></i> 07 67 17 94 26</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						<li><a href="{{route('myaccount')}}"><i class="fa fa-user"></i>Mon compte</a></li>
						<li><a href="{{route('signup')}}">S'inscire</a></li>
						<li><a href="{{route('login')}}">Se connecter</a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="" id="logo"><img src="{{ asset('/image/logo.png') }}" width="300px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="/">
					        <input type="text" value="" name="s" id="s" placeholder="Entrez le mot clé..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						<div class="cart">
							
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Mon panier (@if(Session::has('cart')){{Session('cart')->totalQty}} @else vide @endif) <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
								@if(Session::has('cart'))
								@foreach($product_cart as $product)
								<div class="cart-item">
									<div class="media">
										<a class="pull-left" href="#"><img src="/ShoppingALL/public/image/product/{{$product['item']['image']}}" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">{{$product['item']['name']}}</span>
											<span class="cart-item-amount">{{$product['qty']}}*<span>
											@if($product['item']['promotion_price'] !=0)
											{{$product['item']['promotion_price']}}€
											@else
											{{$product['item']['unit_price']}}€
											@endif
										</span></span>
										</div>
									</div>
								</div>
								@endforeach

								<div class="cart-caption">
									<div class="cart-total text-right">Totale: <span class="cart-total-value">{{Session('cart')->totalPrice}}€</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{asset('/cart')}}" class="beta-btn primary text-center">Gestion du panier et paiement<i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
								@endif
							</div>
							
						</div> <!-- .cart -->
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu" >
					<ul class="l-inline ov">
						<li><a href="{{asset('/')}}">Page d'accueil</a></li>
						<li><a href="{{asset('/product_type/1')}}">Produit</a>
							<ul class="sub-menu">
								@foreach($type as $t)
								<li><a href="{{ route('product_type',$t->id) }}">{{$t->name}}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="{{ asset('/intro') }}">Introduction</a></li>
						<li><a href="{{ asset('/contact') }}">Contact</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->