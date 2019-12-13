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

var edit = false;
var prod = null;
var peso = null;

var btn_editar = $("<span></span>");
btn_editar.attr({
	class: 'glyphicon glyphicon-pencil',
	onclick: "onclick='editar_linha(this)'"
});

var btn_cancelar = $("<span></span>");
btn_cancelar.attr({
	class: 'glyphicon glyphicon-remove',
	onclick: ''
});

var btn_salvar = $("<span></span>");
btn_salvar.attr({
	class: 'glyphicon glyphicon-floppy-disk',
	onclick: ''
});

var btn_excluir = $("<span></span>");
btn_excluir.attr({
	class: 'glyphicon glyphicon-trash',
	onclick: ''
});

function editar_linha(btn)
{
	if(edit == false)
	{
		edit = true;
		var linha = $(btn).parent().parent();

		console.log(linha.html());

		var campo_pr = $("<input />");
		var val_pr = linha.children('td:nth-child(1)').text();
		campo_pr.attr({
			id: 'nome',
			name: 'nome',
			value: val_pr,
			class: 'form-control',
			type: 'text',
			maxlength: '200'
		});
		linha.children('td:nth-child(1)').html("");
		linha.children('td:nth-child(1)').append(campo_pr);
		prod = val_pr;

		console.log(campo_pr);

		var campo_pe = $("<input />");
		var val_pe = linha.children('td:nth-child(2)').text();
		campo_pe.attr({
			id: 'peso',
			name: 'peso',
			value: val_pe,
			class: 'form-control',
			type: 'number'
		});
		linha.children('td:nth-child(2)').html("");
		linha.children('td:nth-child(2)').append(campo_pe);
		peso = val_pe;

		console.log(campo_pe);

		linha.children('td:nth-child(3)').html("");
		linha.children('td:nth-child(3)').append(btn_salvar);

		linha.children('td:nth-child(4)').html("");
		linha.children('td:nth-child(4)').append(btn_cancelar);
	}
	else
	{
		alert("Já existe uma linha em edição.");
	}
}

function cancelar(btn)
{
	var linha = $(btn).parent().parent();
}



function excluir_linha()
{
	var conf = confirm("Deseja realmente deletar este registro?");
	if (conf == true) 
	{
		//faz req ajax

		var par = $(this).parent().parent(); //tr
		par.remove();	
	} 

};


