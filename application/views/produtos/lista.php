<script>
	$(document).ready(function(){

		url_busca = "<?= site_url("produtos/busca_produtos") ?>";

		$.ajax({
			url: url_busca,
			type: 'POST',
			dataType: 'json',
			data: {}
		})
		.done(function(dados) 
		{
			
			$.each(dados, function(chave, vetor) {
				
				console.log("Dados: \n"+vetor["Id_produto"]+" - "+vetor["nome"]+" - "+vetor["peso"]);

				var corpo_tab = $('#produtos tbody');

				//monta linha
				var linha = $("<tr></tr>");
				linha.attr({
					id: vetor["Id_produto"]
				});

				var cell_prod = $("<td></td>");
				cell_prod.text(vetor["nome"]);

				var cell_pe = $("<td></td>");
				cell_pe.text(vetor["peso"]);

				var cell_edit = $("<td></td>");
				var btn_editar = $("<span></span>");
				btn_editar.attr({
					class: 'glyphicon glyphicon-pencil',
					onclick: "editar_linha(this)"
				});
				cell_edit.append(btn_editar);

				var cell_exc = $("<td></td>");
				var btn_excluir = $("<span></span>");
				btn_excluir.attr({
					class: 'glyphicon glyphicon-trash',
					onclick: ''
				});
				cell_exc.append(btn_excluir);

				linha.append(cell_prod);
				linha.append(cell_pe);
				linha.append(cell_edit);
				linha.append(cell_exc);

				corpo_tab.append(linha);
			});

		})
		.fail(function() {
			console.log("error ajax lista produtos");
		})


	});
</script>
<div class="table-responsive">          
	<table id="produtos" class="table table-striped">
		<thead>
			<tr>
				<th>Nome</th>
				<th>Peso (KG)</th>
				<th>Editar</th>
				<th>excluir</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>
