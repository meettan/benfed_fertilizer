<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class FertilizerModel extends CI_Model{										/*Insert Data in Tables*/
		public function f_insert($table_name, $data_array) {

			$this->db->insert($table_name, $data_array);

			return;

		}
																				/*Update table data*/
		public function f_edit($table_name, $data_array, $where) {

			$this->db->where($where);

			$this->db->update($table_name, $data_array);

			return;

		}
																				/*Select Data from a table*/				
		public function f_select($table,$select=NULL,$where=NULL,$type){

			if(isset($select)){
				$this->db->select($select);
			}

			if(isset($where)){
				$this->db->where($where);
			}

			$value = $this->db->get($table);

			if($type==1){
				return $value->row();
			}else{
				return $value->result();
			}
		}


		public function f_select_distinct($table,$select=NULL,$where=NULL,$type){	/**Select distinct data */

			$this->db->distinct();

			if(isset($select)){
				$this->db->select($select);
			}

			if(isset($where)){
				$this->db->where($where);
			}

			$value = $this->db->get($table);

			if($type==1){
				return $value->row();
			}else{
				return $value->result();
			}
		}
																			/*Select Maximun soceity Code*/					
		public function get_soceity_code(){

			$this->db->select_max('soc_id');
 	
			$result = $this->db->get('mm_ferti_soc')->row()->soc_id;  
 
			return ($result+1);
		 }
																			/*Select Maximun product Code*/			
		public function get_product_code(){

			$this->db->select_max('prod_id');
			
			$result = $this->db->get('mm_product')->row()->prod_id;  
 
			return ($result+1);
		 }
		 																	/*Select Maximun comapany Code*/				 
		 public function get_company_code(){

			$this->db->select_max('comp_id');
 
			$result = $this->db->get('mm_company_dtls')->row()->comp_id;  
 
			return ($result+1);
		 }
 
																			/*Delete From Table*/
		public function f_delete($table_name, $where) {			

			$this->db->delete($table_name, $where);
		 
			 return;
		}
 
	}
?>