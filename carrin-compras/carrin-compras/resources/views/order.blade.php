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
		    <li class="nav-item active">
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
	<p style="color:blue"> Usuário : {{ session()->get("user") }}</p>
	<p style="color:red">@if(isset($message)){{ $message }}@endif</p>

	<section class="section_product">
		<section class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<td>Numero do Pedido</td>
						<td>Total</td>
					</tr>
				</thead>
				<tbody>
			  @if(isset($list_order)) 
				  @foreach($list_order as $l)					
					<tr>
						<td>
							<a href="visualizar_pedido?id={{$l->id}}">2022-{{$l->id}} </a>
						</td>
						<td>
							 {{$l->total}}
						</td>
					</tr>
				  @endforeach
			  @endif	
					
				</tbody>		
			</table>
		</section>
	</section>

	

</body>


</html>