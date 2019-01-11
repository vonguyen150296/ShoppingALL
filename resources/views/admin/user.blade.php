@extends('admin.layouts.index')

@section('content')
<div class="content-title">Les informations de {{$user['subname']}} {{$user['name']}}</div>
<div class="mt-5"><i class="fas fa-envelope-open"></i> <b>Adresse mail:</b> {{$user['email']}}</div>
<div class="mt-3"><i class="fas fa-phone"></i> <b>Numéro de téléphone:</b> {{$user['phone']}}</div>
<div class="mt-3"><i class="fas fa-map-marker"></i> <b>Adresse:</b> {{$user['address']}}</div>
<div class="mt-3"><i class="fas fa-calendar-check"></i> <b>Date de création:</b> {{$user['created_at']}}</div>

@endsection