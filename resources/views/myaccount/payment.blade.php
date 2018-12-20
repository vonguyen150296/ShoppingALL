<div class="title-page">Mes cartes de paiment</div>

<br>
<table class="table table-striped">
	<thead>
		<tr>
			<th scope="col">Nom</th>
			<th scope="col">Numero</th>
			<th scope="col">Supprimer</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td scope="row">1</td>
			<td>1</td>
			<td>1</td>
		</tr>
		<tr>
			<td scope="row">1</td>
			<td>1</td>
			<td>1</td>
		</tr>
	</tbody>
</table>

<div>ajouter une carte</div>
<div class="row">
	<div class="col-sm-3">
		<label>nom</label>
		<input type="text" ng-model="fullname" placeholder="Entrer votre nom">
	</div>
	<div class="col-sm-4">
		<label>numero</label>
		<input type="text" name="numero" placeholder="Entrer votre numero">
	</div>
	<div class="col-sm-3">
		<label>date</label>
		<input type="text" name="date" placeholder="Entrer votre date">
	</div>
	<div class="col-sm-2">
		<label>sign</label>
		<input type="text" name="sign" placeholder="sd">
	</div>
</div>
<button class="btn btn-success">valide</button>