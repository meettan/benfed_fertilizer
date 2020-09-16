<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class ReportModel extends CI_Model{

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

        public function f_get_product_list(){
            $query  = $this->db->query("select a.PROD_ID,a.PROD_DESC,a.COMPANY,a.unit,b.COMP_ID,
                                     b.COMP_NAME,b.short_name
                              from   mm_product a,mm_company_dtls b
                              where  a.COMPANY = b.COMP_ID
                              order by a.COMPANY,a.PROD_ID");

            return $query->result();
        }

        public function f_get_product_count(){
            $query  = $this->db->query("select a.PROD_ID,a.PROD_DESC,a.COMPANY,a.unit,b.COMP_ID,
                                     b.COMP_NAME,b.short_name
                              from   mm_product a,mm_company_dtls b
                              where  a.COMPANY = b.COMP_ID
                              order by a.COMPANY,a.PROD_ID");

            return $query->result();
        }
    }
?>