<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Sao_Paulo');

class MY_Loader extends CI_Loader
{
	
    public function template($nome, $dados = array())
	{
		$this->view("cabecalho.php", $dados);
        $this->view($nome, $dados);
        $this->view("rodape.php", $dados);
	}
	
}