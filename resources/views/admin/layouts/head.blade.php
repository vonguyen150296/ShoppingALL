<div class="head">
	<div class="row">
		<div class="col-sm-3 offset-sm-1 head-text">
			<a href="" id="logo"><img src="{{ asset('/image/logo.png') }}" width="100px" alt=""></a>
			@if(Auth::check())
			<i class="fas fa-user"></i>
				{{Auth::user()->subname}} {{Auth::user()->name}}
			@endif
		</div>
		<div class="col-sm-3 offset-sm-5 head-text">
			@if(Auth::check())
			<a href="{{route('admin-logout')}}">ME DECONNECTER <i class="fas fa-sign-out-alt"></i></a>
			@endif
		</div>
	</div>
</div>