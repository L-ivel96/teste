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
		
		public function exclui_produto($id_prod)
		{
			$this->db->where('Id_produto', $id_prod);
			return $this->db->delete('produtos');
 		}

 		public function atualiza_produto($produto, $id_prod)
		{
			$this->db->where('Id_produto', $id_prod);
			return $this->db->update('produtos', $produto);
 		}
	}