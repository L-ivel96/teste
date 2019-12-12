    
		<?php
			echo form_open("produtos/novo");

			echo form_label("Nome do Produto", "nome");
			echo form_input(array(
				"name" => "nome",
				"class" => "form-control",
				"id" => "nome",
				"maxlength" => "255",
				"placeholder" => "Nome do Produto"
			));

			echo form_label("Peso (em KG)", "peso");
			echo form_input(array(
				"name" => "peso",
				"class" => "form-control",
				"id" => "peso",
				"placeholder" => "Peso (em KG)",
				"type" => "number",
				"min" => "0"
			));

			echo form_button(array(
				"class" => "btn btn-primary",
				"content" => "Cadastrar",
				"type" => "button"
			));

			
			  
			echo form_close();

		?>
        