@extends('layouts.index')

@section('content')
<div class="container">
		<div id="content">
			
			<form action="{{route('post-login')}}" method="post" class="beta-form-checkout">
				@csrf
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">

						<h4>Se connecter</h4>
						
						@if(isset($error) == true)
						<div class='text-center text-danger'>{{$error}}</div>;
						@endif
						
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="email">Adresse mail*</label>
							<input class="form-control" type="email" name="email" placeholder="Entrer votre adresse mail" required>
						</div>
						<div class="form-block">
							<label for="password">Mot de passe*</label>
							<input class="form-control" type="password" name="password" placeholder="Entrer votre mot de passe" required>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Se connecter</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div>
@endsection