<div ng-controller="profile">
<div class="title-page">Mes informations</div>
<br>
<div class="text-center text-success" ng-if="update_response == 'true'">vous avez bien mis à jour votre informations</div>

<form name="myProfile">
	<div class="row">
		<div class="col-sm-6">
			<label>Nom *</label>
			<input type="text" ng-model="user.name" name="name" placeholder="Entrer votre nom" class="form-control" required>
		</div>
		<div class="col-sm-6">
			<label>Prénom *</label>
			<input type="text" ng-model="user.subname" placeholder="Entrer votre prénom" class="form-control" required>
		</div>
	</div>
	<label>Adresse *</label>
	<input type="text" ng-model="user.address" placeholder="Entrer votre adresse" class="form-control" required>

	<label>Numéro de téléphone *</label>
	<input type="text" ng-model="user.phone" placeholder="Entrer votre numéro de téléphone" class="form-control" required>

	<label>Adresse email *</label>
	<input type="email" ng-model="user.email" placeholder="Entrer votre adresse email" class="form-control" required>

	<label>Mot de passe</label>
	<input type="password" ng-model="user.password" placeholder="Entrer votre mot de passe" class="form-control">
	<br>
	<div class="row">
		<div class="col-sm-4 offset-sm-4">
			<button class="form-control btn btn-success" ng-click="update()">Mettre à jour</button>
		</div>
	</div> 
</form>
</div>
