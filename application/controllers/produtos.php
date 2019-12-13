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

	public function lista_produtos()
	{
		$dados = "";
		$this->load->template("produtos/lista", $dados);
	}

	public function busca_produtos()
	{
		$this->load->model("produtos_model");

		$resp = $this->produtos_model->listar_produtos();

		echo json_encode($resp);
	}

	public function exclui_produto()
	{
		$this->load->model("produtos_model");
		$id_prod = $this->input->post("id_prod");
		$resp = array();
		$resp["id_prod"] = $id_prod;
		$resp["post"] = $_POST;

		if($id_prod)
		{
			$resp["op"] = $this->produtos_model->exclui_produto($id_prod);
			echo json_encode($resp);
		}
		else
		{
			$resp["op"] = false;
			echo json_encode($resp);
		}
	}

	public function atualiza_produto()
	{
		$this->load->model("produtos_model");
		$id_prod = $this->input->post("id_prod");
		$nome = $this->input->post("nome");
		$peso = $this->input->post("peso");

		$resp = array();

		if(!empty($nome) && is_numeric($peso) )
		{
			//Organiza o array para insert (garantindo os valores do BD)
			$prod = array();
			$prod["nome"] = $nome;
			$prod["peso"] = $peso;

			$resp["cad"] = $this->produtos_model->atualiza_produto($prod, $id_prod);
			 
			if($resp["cad"])
			{
				$resp["msg"] = "Os dados foram atualizados com sucesso";
			}
			else
			{
				$resp["msg"] = "Erro ao atualizar os dados";
			}
		}
		else
		{
			$resp["msg"] = "Os dados enviados não foram preenchidos corretamente.";
		}

		echo json_encode($resp);


	}

}