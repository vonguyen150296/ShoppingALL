@extends('layouts.index')

@section('content')
<div class="container">
		<div id="content">
			
			<form action="{{route('post-signup')}}" method="post" class="beta-form-checkout">
				@csrf
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Enregistrer</h4>
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
							<label for="email">Adresse mail*
							@if(count($errors)>0)
	                            <span class="text-left text-warning"> : 
	                                @foreach($errors->all() as $err)
	                                    {{ $err }}
	                                @endforeach
	                            </span>
	                        @endif
	                        </label>
							<input type="email" name="email" required>
						</div>

						<div class="form-block">
							<label for="password">Mot de passe*</label>
							<input type="password" name="password" required>
						</div>

						<div class="form-block">
							<button type="submit" class="btn btn-primary">Enregistrer</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection