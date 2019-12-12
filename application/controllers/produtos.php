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

		
	}


}