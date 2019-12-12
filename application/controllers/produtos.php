<?php
class Produtos extends CI_Controller
{
	public function index()
	{
		$dados = "";
		$this->load->template("produtos/cadastro", $dados);
	}

	public function novo()
	{
		$this->load->model("produtos_model");
		$nome = $this->input->post("nome");
		$peso = $this->input->post("peso");

		$resp = array();

		if(!empty($nome) && is_numeric($peso) )
		{
			//Organiza o array para insert (garantindo os valores do BD)
			$prod = array();
			$prod["nome"] = $nome;
			$prod["peso"] = $peso;

			$cad = $this->produtos_model->salva($prod);

			if($cad)
			{
				$resp["msg"] = "Os dados foram cadastrados com sucesso";
			}
			else
			{
				$resp["msg"] = "Erro ao cadastrar";
			}
		}
		else
		{
			$resp["msg"] = "Os dados enviados não foram preenchidos corretamente.";
		}

		echo json_encode($resp);
		
		
	}


}