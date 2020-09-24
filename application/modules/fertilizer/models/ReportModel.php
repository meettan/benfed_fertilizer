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

        public function f_get_product_list($branch,$frmDt){
            /*$query  = $this->db->query("select a.PROD_ID,a.PROD_DESC,a.COMPANY,a.unit,b.COMP_ID,
                                     b.COMP_NAME,b.short_name
                              from   mm_product a,mm_company_dtls b
                              where  a.COMPANY = b.COMP_ID
                              order by a.COMPANY,a.PROD_ID");*/

            $query  = $this->db->query("select Distinct a.prod_id,b.PROD_DESC,a.comp_id,a.unit,
                                        c.COMP_NAME,c.short_name
                                from   td_purchase a,mm_product b,mm_company_dtls c
                                where  a.prod_id = b.PROD_ID
                                and    a.comp_id = c.COMP_ID
                                and    a.trans_dt >= '$frmDt'
                                and     a.br       = $branch
                                order by a.comp_id,a.prod_id");

            return $query->result();
        }

        public function f_get_balance($branch,$frmDt,$toDt){

            $data = $this->db->query("Select prod_id,ifnull(Sum((qty + tot_pur) - tot_sale),0) as opn_qty,0 tot_pur,0 tot_sale
									  from (
                                            select prod_id,ifnull(qty,0)qty,0 tot_pur,0 tot_sale
											from tdf_opening_stock
                                            where branch_id	    = $branch
                                            and   balance_dt    = '$frmDt'
											UNION
                                            select prod_id, 0 qty,ifnull(sum(qty),0)tot_pur,0 tot_sale
											from td_purchase
                                            where br	    = $branch
                                            and   trans_dt between '$frmDt' and '$toDt'
                                            and   trans_flag = 1
											group by prod_id
											UNION
											select prod_id,0 qty,0 tot_pur,ifnull(sum(qty),0) tot_sale
											from td_sale
                                            where br_cd	    = $branch
                                            and   do_dt between '$frmDt' and '$toDt'
											group by prod_id)a
                                        group by prod_id
                                        order by prod_id");

			if($data->num_rows() > 0 ){
				$row = $data->result();
			}else{
				$row = 0;
			}
			return $row;
        }
        
        public function f_get_purchase($branch,$frmDt,$toDt){
            $query  = $this->db->query("select prod_id, ifnull(sum(qty),0)tot_pur
                                        from td_purchase
                                        where br	    = $branch
                                        and   trans_dt between '$frmDt' and '$toDt'
                                        and   trans_flag = 1
                                        group by prod_id");

            return $query->result();
        }

        public function f_get_sale($branch,$frmDt,$toDt){
            $query  = $this->db->query("select prod_id, ifnull(sum(qty),0)tot_sale
                                        from td_sale
                                        where br_cd	    = $branch
                                        and   do_dt between '$frmDt' and '$toDt'
                                        group by prod_id");

            return $query->result();
        }
    }
?>