<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Fertilizer_Process extends CI_Model{

 
		public function f_get_fin_inf($sl_no){

			$this->db->select('*');

			$this->db->where('sl_no',$sl_no);

			$data = $this->db->get('md_fin_year');

			return $data->row();

	}


		public function f_get_fin_yr(){

			$this->db->select('*');

			$data = $this->db->get('md_fin_year');

			return $data->result();
		}

	}	
?>
