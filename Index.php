<html>
 <head>
	  <title>Cadastro de Produto</title>
	  <!--inicio arquivos css-->
	  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	  	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
	    <link rel="stylesheet" href="assets/css/formularioProduto.css">
	  <!--final arquivos css-->		  
 </head>
 <body>
  <div class="container box">
   <h1 align="center">Cadastrar de Produto</h1>
   <br/>
	<div class="table-responsive">
		<br/>
		<div align="right">
			<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Incluir</button>
		</div>
		<br/>
		<br/>
		<table id="user_data" class="table table-bordered table-striped">
			 <thead>
				  <tr>
					<th>Image</th>
					<th>Nome Produto</th>
					<th>Valor Pago</th>
					<th>Valor Venda</th>
					<th>Quantidade</th>
					<th>Unidade Medida</th>
					<th>Editar</th>
					<th>Deletar</th>
				  </tr>
			 </thead>
    	</table>
   </div>
  </div>
  	<!-- inicio arquivos js -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="assets/js/formularioProduto.js"></script>
	<!-- final arquivos js -->
 </body>
</html>
<div id="userModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="user_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Formulário Produto</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="nomeProduto">Nome Produto</label>
						<input type="text" name="nomeProduto" id="nomeProduto" class="form-control" placeholder="Digite nome do produto" requerid/>
					</div>
					<div class="form-group">
						<label for="valorPago">Valor Pago</label>
						<input type="number" name="valorPago" id="valorPago" class="form-control" placeholder="Digite o valor pago" requerid/>
					</div>
					<div class="form-group">
						<label for="valorVenda">Valor Venda</label>
						<input type="number" name="valorVenda" id="valorVenda" class="form-control" placeholder="Digite o valor da venda" requerid/>
					</div>
					<div class="form-group">
						<label for="quantidade">Quantidade</label>
						<input type="number" name="quantidade" id="quantidade" class="form-control" placeholder="Digite a quantidade" requerid/>
					</div>
					<div>
						<label for="unidadeMedida">Unidade Medida</label>
						<input type="text" name="unidadeMedida" id="unidadeMedida" class="form-control" placeholder="Digite a unidade de medida" requerid/>
					</div>
					<div class="form-group">
						<label>Selecione uma imagem</label>
						<input type="file" name="user_image" id="user_image"/>
						<span id="user_uploaded_image"></span>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="user_id" id="user_id"/>
					<input type="hidden" name="operation" id="operation"/>
					<input type="submit" name="action" id="action" class="btn btn-success" value="Add"/>
					<button type="button" class="btn btn-primary" data-dismiss="modal">Voltar</button>
				</div>
			</div>
		</form>
	</div>
</div>


