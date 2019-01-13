<div ng-controller="purchases">
<div class="title-page">Mes achats</div>
<br>
<table class="table table-striped">
	<thead>
		<tr>
			<th scope="col">Produit</th>
			<th scope="col">Prix</th>
			<th scope="col">Quantité</th>
			<th scope="col">Supprimer</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in purchases.product_cart">
			<td scope="row"><img src="/ShoppingALL/public/image/product/{{x.item.image}}" width="50px"> {{x.item.name}}</td>
			<td>{{x.price}} €</td>
			<td><i class="fas fa-chevron-left" ng-click="deleteByOne(x.item.id)"></i>&nbsp;&nbsp; {{x.qty}} &nbsp;&nbsp;<i ng-click="add(x.item.id)" class="fas fa-chevron-right"></i></td>
			<td ng-click="delete(x.item.id)"><i class="far fa-trash-alt"></i></td>
		</tr>
	</tbody>
</table>
<div ng-if="purchases.product_cart == ''" class="text-center">Vous ne choisis pas encore le produit</div>
<div class="text-right" style="font-size: 20px;color: #a9a9a9;" ng-if="purchases.totalPrice != ''"><b>Totale: {{purchases.totalPrice}} €</b></div>
<br>
<div class="row" ng-if="purchases.product_cart != ''">
	<div class="col-sm-4"></div>
	<div class="col-sm-4">
		<button class="btn btn-info form-control" ng-click="payment()">Paiment</button>
	</div>
</div>
</div>
