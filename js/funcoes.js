function cadastra()
{
	var caminho = $('#form_cad').attr('action') + "/novo";
	var dados = $('#form_cad').serializeArray();

	$.ajax({
		url: caminho,
		type: 'POST',
		dataType: 'json',
        data: dados
	})
	.done(function(resp) 
	{
		alert(resp.msg);
	})
	.fail(function(XMLHttpRequest, textStatus, errorThrown)
	{
		alert("Erro ao realizar o envio, tente novamente mais tarde");
	});
	
}


