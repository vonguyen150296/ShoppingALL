@extends('admin.layouts.index')

@section('content')
<div class="content-title">Les informations de {{$customer['subname']}} {{$customer['name']}}</div>
<div><i class="fas fa-envelope-open"></i> <b>Adresse mail:</b> {{ $customer['email'] }}</div>
<div><i class="fas fa-phone"></i> <b>Numéro de téléphone:</b> {{ $customer['phone'] }}</div>
<div><i class="fas fa-map-marker"></i> <b>Adresse:</b> {{ $customer['address'] }}</div>
<table class="table table-striped mt-3">
	<thead>
		<tr>
			<th scope="col">Le date de commande</th>
			<th scope="col">Totale</th>
			<th scope="col">Paiement</th>
			<th scope="col">Détail</th>
		</tr>
	</thead>
	<tbody>
		@foreach($infos as $i)
		<tr>
			<td scope="row">{{$i->date_order}}</td>
			<td>{{$i->total}} €</td>
			<td>{{$i->payment}}</td>
			<td>
				<button onclick="verify('{{$i->id}}')" type="button" class="check" name="{{$i->id}}" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
				 Voir
				</button>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

<!-- Button to Open the Modal -->


<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Les produits</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      		<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">Produit</th>
						<th scope="col">Quantité</th>
						<th scope="col">Prix unitaire</th>
						<th scope="col">Totale</th>
					</tr>
				</thead>
				<tbody>
					@foreach($detail as $d)
					<tr class="{{$d->id_bill}}" style="display: none">
						<td scope="row">
							{{$d->name}}
							<div>
								<img src="http://localhost/ShoppingALL/public/image/product/{{$d->image}}" width="40px" alt="">
							</div>
						</td>
						<td>{{$d->quantity}}</td>
						@if($d->promotion_price)
						<td>{{$d->promotion_price}} €</td>
						<td>
							{{($d->quantity)*($d->promotion_price)}} €
						</td>
						@else
						<td>{{$d->unit_price}} €</td>
						<td>
							{{($d->quantity)*($d->unit_price)}} €
						</td>
						@endif
					</tr>
					@endforeach
				</tbody>
			</table>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>

    </div>
  </div>
</div>
<script type="text/javascript">
	function verify(id){
		var orther_id = document.getElementsByClassName('check');
		for(var i=0; i<orther_id.length; i++){
			var orther_items = document.getElementsByClassName(orther_id[i].name);
			for(var j=0; j<orther_items.length; j++){
				orther_items[j].style.display = 'none';
			}
		}
		
		var items = document.getElementsByClassName(id);
		for(var k=0; k<items.length; k++){
			items[k].style.display = '';
		}
	}
</script>
@endsection