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
		    <li class="nav-item active">
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
	<p style="color:blue"> Usuário : {{ session()->get("user") }}</p>
	<p style="color:red">@if(isset($message)){{ $message }}@endif</p>

	<section class="section_product">
		<section class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<td>Código</td>
						<td>Nome do Produto</td>
						<td>Quantidade</td>
						<td>Valor do Produto</td>
					</tr>

				</thead>
				<tbody>
			  @if(isset($list_kart)) 
				  @foreach($list_kart as $k1)					
					<tr>
						<td>
							{{ $k1->product->id }}
						</td>
						<td>
							{{ $k1->product->nm_produto }}
						</td>
						<td>
							{{ $k1->quantidade }}
						</td>
						<td>
							{{ $k1->valor_produto }}
						</td>
					</tr>
				  @endforeach
			  @endif	
				</tbody>		
				<tfoot>
					<tr>
						<td>
							Total:
						</td>
						<td>
							
						</td>
						<td>
						  @if(isset($soma)) 
							 {{ $soma }}
						  @endif	

						</td>
					</tr>
					
				</tfoot>
			</table>
		</section>
		<form action="finalizarPedido" method="POST">
			@csrf
			<input type="submit" value="Finalizar Pedido" />
			
		</form>
	</section>


	
</body>


</html>