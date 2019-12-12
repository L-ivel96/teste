    
		<?php
		
		$url = site_url("produtos");
		$conf_form = array('class' => 'form-horizontal', 'id'=>'form_cad');
			echo form_open($url, $conf_form);
		?>

		<div class="form-group">
		<?php

			echo form_label("Nome do Produto", "nome");
			echo form_input(array(
				"name" => "nome",
				"class" => "form-control",
				"id" => "nome",
				"maxlength" => "200",
				"placeholder" => "Nome do Produto",
				"required" => "required"
			));
		?>
		</div>

		<div class="form-group">
		<?php
			echo form_label("Peso (em KG)", "peso");
			echo form_input(array(
				"name" => "peso",
				"class" => "form-control",
				"id" => "peso",
				"placeholder" => "Peso (em KG)",
				"type" => "number",
				"min" => "0",
				"required" => "required"
			));
		?>
		</div>

		<div class="form-group">
		<?php
			echo form_button(array(
				"class" => "btn btn-primary",
				"content" => "Cadastrar",
				"type" => "button",
				"onclick" => "cadastra()"
			));
		?>
		</div>
			
		<?	echo form_close();	?>
        