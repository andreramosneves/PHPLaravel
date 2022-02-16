
<!DOCTYPE HTML>
<html lang="pt-br">
<head>

	<title>Login</title>
	<!--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	-->
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
		    <li class="nav-item active">
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
	<!--   .col-sm-4  Line A -->
	<p style="color:blue"> Usuário : {{ session()->get("user") }} </p>
	

	<p>


		<section class="container">
			<section class="row">
			  @if(isset($listaProdutos)) 
				  @foreach($listaProdutos as $p1)
				<section class="col-sm-4">
					<form action="addItemKart" method="POST">
						@csrf 
								<span><b>{{$p1->nm_produto }} </b></span>
							<span> Preço: {{$p1->valor_produto}} reais.</span>
							<img src="media/produtos/{{$p1->photo}}" class="img-thumbnail" alt="No Photo" width="250px" height="200px">
							<p>
								<label>Quantidade:</label>
							<input type="number" name="quantidade" min="1" max="10" value="1" />
							<input type="hidden" name="product_id" value='{{$p1->id}}' />
							<input type="hidden" name="valor" value='{{$p1->id}}' />
							<input type="submit" class="btn btn-info" value="Add Kart" />
						    </p>
							</p>
					</form>
				</section>
				  @endforeach
			  @endif
			</section>
		</section>

	</p>

	

</body>


</html>