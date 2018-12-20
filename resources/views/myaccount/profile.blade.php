<div class="title-page">Mes informations</div>
<br>
<form action="" method="POST" accept-charset="utf-8">
	<div class="row">
		<div class="col-sm-6">
			<label>Nom *</label>
			<input type="text" ng-model="name" placeholder="Entrer votre nom" class="form-control">
		</div>
		<div class="col-sm-6">
			<label>Prénom *</label>
			<input type="text" ng-model="name" placeholder="Entrer votre prénom" class="form-control">
		</div>
	</div>
	<label>Adresse</label>
	<input type="text" ng-model="address" placeholder="Entrer votre adresse" class="form-control">

	<label>Numéro de téléphone</label>
	<input type="text" ng-model="phone" placeholder="Entrer votre numéro de téléphone" class="form-control">

	<label>Adresse email</label>
	<input type="emmail" ng-model="email" placeholder="Entrer votre adresse email" class="form-control">

	<label>Mot de passe</label>
	<input type="password" ng-model="password" placeholder="Entrer votre mot de passe" class="form-control">
	<br>
	<div class="row">
		<div class="col-sm-4 offset-sm-4">
			<button class="form-control btn btn-success">Mettre à jour</button>
		</div>
	</div> 
</form>