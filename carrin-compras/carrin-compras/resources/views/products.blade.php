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
    @if(session()->get("user") == 'andrecaculinha@yahoo.com.br') 

	<section>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		  <ul class="navbar-nav">
		    <li class="nav-item">
		      <a class="nav-link" href="../home">Home</a>
		    </li>
		    <li class="nav-item active">
		      <a class="nav-link" href="../products">Products</a>
		    </li>
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

	<section class="section_product">
		<p style="color:blue"> Usuário : {{ session()->get("user") }} </p>
		<form method="POST" action="ProductController" enctype="multipart/form-data">
			@csrf
			<section class="form-group">
				
				<label>Nome do produto: 
					<input type="text" name = "n_product" class="form-control" value="@if(isset($produto)){{trim($produto->nm_produto)}}@endif" />
				</label>	
			</section>
			<section class="form-group">
				<label>Valor do produto: 
				    <input type="number" name = "v_product" class="form-control" pattern="[0-9]*"  value="@if(isset($produto)){{trim($produto->valor_produto)}}@endif"
				data-politespace data-grouplength="3" data-delimiter="," data-reverse  />
				</label>
			</section>


			<section class="form-group">
				<label>Imagem do produto(Envie imagens com tamanhos parecidos): 
					<input type="file" name = "i_product" class="form-control" />
				</label>
			<section class="form-group">
				<input type="submit" value="Add Product" />
			</section>
			<p style="color:red">
				@if(isset($message)) 
					{{ $message }}
				@endif
			</p>

		</form>
	</section>
	<!-- permission -->
	<section  class="section_production">
		<p>
			<ul class="list-group">
			  @if(isset($listaProdutos)) 
				  @foreach($listaProdutos as $p1)
				  <li class="list-group-item"> 
				  	<input type="button" class="btn btn-info" value="Finalizar produto" onclick="location.href='../finalizaProduto/products?id={{$p1->id}}' ;"> &nbsp &nbsp <a href='../getProduto/products?id={{$p1->id}}'>{{$p1->nm_produto }} </a> &nbsp  Price: {{$p1->valor_produto}}  &nbsp 
				  </li>
				  @endforeach
			  @endif
			</ul>
		</p>
	</section>
	@else
		<p style="color:red"> Você não tem permissão para acessar essa página </p>

    @endif


</body>


</html>