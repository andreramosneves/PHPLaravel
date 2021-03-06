
<!DOCTYPE HTML>
<html lang="pt-br">
<head>

	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/css/bootstrap.min.css" crossorigin="anonymous" /> 
	<link href="/css/app.css" rel="stylesheet">
	<link rel="stylesheet" href="/css/css_login.css" />
	<script src="/js/app.js"></script>
	<script src="/js/bootstrap.min.js"  crossorigin="anonymous"></script> 
	<script src="/js/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
</head>

<body>
	<section>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		  <ul class="navbar-nav">
		    <li class="nav-item">
		      <a class="nav-link" href="../home">Home</a>
		    </li>
		    @if(session()->get("user") == 'andrecaculinha@yahoo.com.br') 
			    <li class="nav-item">
			      <a class="nav-link" href="../products">Products</a>
			    </li>
		    @endif
		    <li class="nav-item">
		      <a class="nav-link" href=../kart>Kart</a>
		    </li>		    
		    <li class="nav-item">
		      <a class="nav-link" href=../order>Order</a>
		    </li>		    
		    <li class="nav-item">
		      <a class="nav-link" href="../login">Login</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="../logout">Logout</a>
		    </li>
		    
		  </ul>
		</nav>
	</section>

	<section class="head">
		<section class="politica">
		</section>

		<form name="form" method="POST" action="RegisterController" onsubmit="return validateForm()">
			@csrf
			<section class="form-group">
			  <label for="user">Email:</label>
			  <input type="email" class="form-control" id="user" name="user" required>
			</section>
			<section class="form-group">
			  <label for="pwd">Senha:</label>
			  <input type="password" class="form-control" id="pwd" name="pwd" required>
			  <label for="pwd">Repita a Senha:</label>
			  <input type="password" class="form-control" id="pwd2" name="pwd2" required>
			</section>
			<section class="form-check">
			</section>
			<input type="submit" class="btn btn-primary" value="Registrar"/>

		</form>
			@if(isset($user)) 
				<p style="color:red">Usu??rio criado com sucesso! <!--{{$user}} --></p>
		    @endif
		
		<script type="text/javascript">
			function validateForm() {
			    if ($('#pwd').get(0).value != $('#pwd2').get(0).value) {
			        alert("Senhas devem ser iguais! ");
			        return false;
			    }
			}			


		</script>
	</section>
	

</body>


</html>