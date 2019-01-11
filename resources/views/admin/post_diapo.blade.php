@extends('admin.layouts.index')

@section('content')
<div class="content-title mb-5">Nouveau diapo</div>

<form action="{{route('upload-diapo')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	@csrf
	<div class="row">
		<div class="col-sm-4">
			<input type="text" name="name" placeholder="Entrer le nom de diapo"  class="mb-3 form-control" required><br>
			<input type="file" id="image" name="image" class="mb-3" required onchange="verify()"><br>
			<button id="button" class="btn btn-success">Enregister</button>
		</div>
		<div class="col-sm-4">
			<br>
			<div class="text-warning mt-5" id="error">Il faut choisir une image</div>
		</div>
	</div>
</form>
<script type="text/javascript">
	document.getElementById('error').style.display = 'none';

	var fileInput = document.getElementById('image');
	function verify(){
		if(fileInput.files[0].type == 'image/jpg' || fileInput.files[0].type == 'image/jpeg' || fileInput.files[0].type == 'image/png'){
			document.getElementById('error').style.display = 'none';
			document.getElementById('button').disabled = '';
		}else{
			document.getElementById('error').style.display = 'block';
			document.getElementById('button').disabled = 'disabled';
		}
	}
</script>
@endsection