<div ng-controller="payment">
	<div class="title-page">Mes cartes de paiment</div>

	<br>
	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col">Type</th>
				<th scope="col">Nom</th>
				<th scope="col">Numero</th>
				<th scope="col">Supprimer</th>
			</tr>
		</thead>
		<tbody>
			<tr ng-repeat="x in carte">
				<td scope="row" ng-if="x.type == 'Master'"><i class="icon fab fa-cc-mastercard"></i></td>
				<td scope="row" ng-if="x.type == 'Visa'"><i class="icon fab fa-cc-visa"></i></td>
				<td scope="row" ng-if="x.type == 'Paypal'"><i class="icon fab fa-cc-paypal"></i></td>
				<td >{{x.fullname}}</td>
				<td>{{x.numero}}</td>
				<td class="text-center" ng-click="remouve(x.id)"><i class="far fa-trash-alt"></i></td>
			</tr>
		</tbody>
	</table>
	<div ng-if="carte == ''" class="text-center">Vous n'enregiste pas encore le carte de bancaire</div>
	<br><br><hr>

	<div class="text-success text-center" style="font-size: 23px;"><b>Ajouter une carte</b></div><br><br>

	<div>
		<form name="add_carte_credit">
		<label><input type="radio" ng-model="add.type" value="Master"><i class="icon fab fa-cc-mastercard"></i></label>&nbsp;&nbsp;
		<label><input type="radio" ng-model="add.type" value="Visa"><i class="icon fab fa-cc-visa"></i></label>&nbsp;&nbsp;
		<label><input type="radio" ng-model="add.type" value="Paypal"><i class="icon fab fa-cc-paypal"></i></label>&nbsp;&nbsp;
		
			<div class="row">
				<div class="carte-credit col-sm-6">
					<label>Numéro de la carte *</label>
					<input type="text" ng-model="add.numero" name="numero" placeholder="1111 1111 1111 1111" class="form-control" required>
					<div class="row">
						<div class="col-sm-7">
							<label>Prénom Nom *</label>
							<input type="text" ng-model="add.fullname" placeholder="PRENOM NOM" name="fullname" class="form-control" required>
						</div>
						<div class="col-sm-5">
							<label>Expiré *</label>
							<input type="text" ng-model="add.expire" placeholder="09/19" name="expire" class="form-control" required>
						</div>
					</div>
				</div>
				<div class="carte-credit col-sm-5">
					<div class="row">
						<div class="col-sm-5 offset-sm-7">
							<label>Signé</label>
							<input type="text" ng-model="add.sign" placeholder="178" name="sign" class="form-control" required>
						</div>
					</div>
				</div>
			</div>
			<button class="btn btn-success" ng-click="ajoute()">valider</button><br><br>
		</form>
	</div>

</div>