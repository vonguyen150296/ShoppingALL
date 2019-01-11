@extends('admin.layouts.index')

@section('content')
<div class="content-title">Liste des clients</div>
<table class="table table-striped">
	<thead>
		<tr>
			<th scope="col">Nom</th>
			<th scope="col">Prénom</th>
			<th scope="col">Adresse mail</th>
			<th scope="col">Détail</th>
			<th scope="col">Supprimer</th>
		</tr>
	</thead>
	<tbody>
		@foreach($customers as $c)
		<tr>
			<td scope="row">{{$c->name}}</td>
			<td>{{$c->subname}}</td>
			<td>{{$c->email}}</td>
			<td><a href="{{route('infos-customer',$c->id)}}">voir</a></td>
			<td><a href="{{route('delete-customer',$c->id)}}"><i class="far fa-trash-alt"></i></a></td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection