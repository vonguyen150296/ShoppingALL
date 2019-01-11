<div class="vertical-menu">
  	<a href="{{route('list-customer')}}" id="customer">Liste des clients</a>
	<a href="{{route('list-user')}}" id="user">Liste des utilisateurs</a>
	<a href="{{route('list-diapo')}}" id="slide">Liste des diapos</a>
	<a href="{{route('post-diapo')}}" id="new-slide">Nouveau diapo</a>
</div>
<script type="text/javascript">

	var a = document.getElementsByTagName('a');
	for (var i = a.length - 1; i >= 0; i--) {
		a[i].classList.remove('active'); 
	}
	var url = window.location.pathname;
	if(url == '/ShoppingALL/public/admin/post-diapo'){
		var active = document.getElementById('new-slide');
		active.classList.add('active');
	}
	if(url == '/ShoppingALL/public/admin/list-users'){
		var active = document.getElementById('user');
		active.classList.add('active');
	}
	if(url == '/ShoppingALL/public/admin/list-customers'){
		var active = document.getElementById('customer');
		active.classList.add('active');
	}
	if(url == '/ShoppingALL/public/admin/list-diapo'){
		var active = document.getElementById('slide');
		active.classList.add('active');
	}
</script>