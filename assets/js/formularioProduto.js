function iniciar(){
	$(document).ready(function(){
		  $('#add_button').click(function(){
		  $('#user_form')[0].reset();
		  $('.modal-title').text("Formulário de Produto");
		  $('#action').val("Adicionar");
		  $('#operation').val("Add");
		  $('#user_uploaded_image').html('');
	 });
 
	 //recebe dados da tabela
	 var dataTable = $('#user_data').DataTable({
		  "processing": true,
		  "serverSide": true,
		  "order": [],
		  "ajax":{
			url:"fetch.php",
			type:"POST"
		  },
		  "columnDefs":[
			{
				"targets":[0, 6, 7],
				"orderable":false,
			},
		  ],

	 });
	
	 //enviar dados 
	 $(document).on('submit', '#user_form', function(event){
		  event.preventDefault();
		  var produtoNome   = $('#nomeProduto').val();
		  var valorPago     = $('#valorPago').val();
		  var valorVenda    = $('#valorVenda').val();
		  var quantidade    = $('#quantidade').val();
		  var unidadeMedida = $('#unidadeMedida').val();
		  var extension     = $('#user_image').val().split('.').pop().toLowerCase();
		  if(extension != '')
		  {
			   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
			   {
					alert("Verificar extensão da imagem");
					$('#user_image').val('');
					return false;
			   }
		  } 
		  if( produtoNome != '' && valorPago != '' && valorVenda != '' && quantidade != '' && unidadeMedida != '')
		  {
			   $.ajax({
					url:"insert.php",
					method:'POST',
					data: new FormData(this),
					contentType: false,
					processData: false,
					success: function(data)
					{
						//alert(data);
						$('#user_form')[0].reset();
						$('#userModal').modal('hide');
						dataTable.ajax.reload();// recarregar tabela 
					}
			   });
		  }else{
			alert("Ambos os campos são obrigatórios");
		}
	 });
 
	 $(document).on('click', '.update', function(){
		  var user_id = $(this).attr("id");
		  $.ajax({
				url: "fetch_single.php",
				method: "POST",
				data: {user_id:user_id},
				dataType: "json",
				success:function(data)
				{
					//preenche dados da tabela
					$('#userModal').modal('show');//chama modal
					$('#nomeProduto').val(data.nomeProduto);
					$('#valorPago').val(data.valorPago);
					$('#valorVenda').val(data.valorVenda);
					$('#quantidade').val(data.quantidade);
					$('#unidadeMedida').val(data.unidadeMedida);
					$('.modal-title').text("Editar Usuário");
					$('#user_id').val(user_id);
					$('#user_uploaded_image').html(data.user_image);
					$('#action').val("Atualizar");
					$('#operation').val("Edit");
			    }
			})
	 });
 
	 $(document).on('click', '.delete', function(){
		  var user_id = $(this).attr("id");
		  if(confirm("Você têm certeza que deseja excluir?"))
		  {
			   $.ajax({
				url:"delete.php",
				method:"POST",
				data:{user_id:user_id},
				success:function(data)
					{
						alert("Item excluido com sucesso");
						dataTable.ajax.reload();
					}
				});
		  } else {
			return false; 
		}
	  });
	});
}
window.onload = iniciar;