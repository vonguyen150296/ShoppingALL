<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="utf-8">
</head>
<body>
    
@if(isset($content) && isset($email) && isset($name) && isset($subject))
	<h2>Nom de client: {{$name}}</h2>
	<div><b>Adresse mail:</b> {{$email}}</div>
	<div><b>Le sujet:</b> {{$subject}}</div>
	<div><b>Le contenu de la commande:</b></div>
	<div style="color: #b1b131;">{{$content}}</div>
@endif
</body>
</html>