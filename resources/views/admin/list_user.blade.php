@extends('admin.layouts.index')

@section('content')
<div class="content-title">Liste des utilisateurs</div>
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
		@foreach($users as $user)
		<tr>
			<td scope="row">{{$user->name}}</td>
			<td>{{$user->subname}}</td>
			<td>{{$user->email}}</td>
			<td><a href="{{route('infos-user',$user->user_id)}}">voir</a></td>
			<td><a href="{{route('delete-user',$user->user_id)}}"><i class="far fa-trash-alt"></i></a></td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection