<?php
	class Produtos_model extends CI_Model 
	{
		public function salva($produto)
		{
			return $this->db->insert("produtos", $produto);
 		}


		
	}