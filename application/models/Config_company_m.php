<?php
class Config_company_m extends CI_Model
{
    
   	public function listing() {
		$this->db->select('*');
		$this->db->from('conf_company_data');
		$this->db->order_by('id_config','DESC');
		$query = $this->db->get();
		return $query->row();
	}
    
    
    	public function edit($data) {
		$this->db->where('id_config',$data['id_config']);
		$this->db->update('conf_company_data',$data);
	} 
    
    
}