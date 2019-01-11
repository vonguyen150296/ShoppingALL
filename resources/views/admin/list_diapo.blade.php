@extends('admin.layouts.index')

@section('content')
<div class="content-title">Liste des diapo</div>

<table class="table table-striped">
	<thead>
		<tr>
			<th scope="col">Id</th>
			<th scope="col">Nom</th>
			<th scope="col">Image</th>
			<th scope="col">Suprimer</th>
		</tr>
	</thead>
	<tbody>
		@foreach($slide as $s)
		<tr>
			<td scope="row">{{$s->id}}</td>
			<td>{{$s->name}}</td>
			<td><img src="../image/thumbs/{{$s->image}}" width="80px" alt=""></td>
			<td><a href="{{route('diapo',$s->id)}}"><i class="far fa-trash-alt"></i></a></td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection