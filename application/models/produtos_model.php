<?php
	class Produtos_model extends CI_Model 
	{
		public function salva($produto)
		{
			return $this->db->insert("produtos", $produto);
 		}

		public function listar_produtos()
		{
			return $this->db->get("produtos")->result_array();
 		} 		
		
	}