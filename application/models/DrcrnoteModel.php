<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class DrcrnoteModel extends CI_Model{				
		public function __construct()
		{
			parent::__construct();
		   
			$this->db2 = $this->load->database('findb', TRUE);
			
		}
		/*Insert Data in Tables*/
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
		
		public function f_getdrnotebr_dtl($br_cd,$soc_id){
	
			$data = $this->db->query("select recpt_no trans_do
										from drnote_br 
									where branch_id = '$br_cd'
									and soc_id='$soc_id'
									and pay_flg='N' ");
								   
	   return $data->result();
		   
	   }

	   public function f_get_drnote_recpdtls($trans_do){
	
		$data = $this->db->query("select a.trans_dt do_dt,a.ro ro,a.tot_amt,a.comp_id
									from drnote_br a
								where a.recpt_no='$trans_do'
								");
							   
   return $data->result();
	   
   }
		public function f_get_drnotebrrep($id)
		{
	
		  $sql = $this->db->query("select  a.trans_dt,a.id,a.recpt_no,a.soc_id,b.soc_name,a.tot_amt,a.invoice_no,a.ro,a.remarks remarks
		  from drnote_br a ,mm_ferti_soc b
		  where a.soc_id=b.soc_id
		  and id= '$id'");			
		  return $sql->row();
	
		}
		

		public function get_sel_inv_dr($sosid,$cmpid,$year){
			$value=$this->db->query('SELECT trans_do,sale_ro FROM td_sale
			where soc_id = '.$sosid.'
			and comp_id = '.$cmpid.' 
			and fin_yr = '.$year.' 
			');
			return $value->result();
		}
		public function get_sel_inv($sosid,$cmpid){
			$value=$this->db->query('SELECT trans_do,sale_ro FROM td_sale
			where soc_id = '.$sosid.'
			and comp_id = '.$cmpid.' 
			and trans_do not in (select sale_invoice_no from tdf_payment_recv where comp_id = '.$cmpid.')');
			return $value->result();
		}
		
		public function f_get_particulars($table_name, $select=NULL, $where=NULL, $flag=NULL) {
        
			if(isset($select)) {
	
				$this->db->select($select);
	
			}
	
			if(isset($where)) {
	
				$this->db->where($where);
	
			}
	
			$result		=	$this->db->get($table_name);
	
			if($flag == 1) {
	
				return $result->row();
				
			}else {
	
				return $result->result();
	
			}
	
		   }
	function f_totcrnjnl($data){ 
	
	  $curl = curl_init();
	  curl_setopt_array($curl, array(
	  CURLOPT_URL => FIN_BASE_URL.'index.php/api_voucher/totcrn_voucher',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS =>'{
		"data": '.json_encode($data).'
	    }',
	
	  CURLOPT_HTTPHEADER => array(
		'Content-Type: application/json',
		'Cookie: ci_session=eieqmu6gupm05pkg5o78jqbq97jqb22g'
	  ),
	));
	
	$response = curl_exec($curl);
	curl_close($curl);
	echo $response;
}

/******************************************************** */
function f_crnjnl($data){
	// echo'<pre>';
	// print_r($data);
	  $curl = curl_init();
	  curl_setopt_array($curl, array(
	  CURLOPT_URL => FIN_BASE_URL.'index.php/api_voucher/crn_voucher',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS =>'{
		"data": '.json_encode($data).'
	}',
	
	  CURLOPT_HTTPHEADER => array(
		'Content-Type: application/json',
		'Cookie: ci_session=eieqmu6gupm05pkg5o78jqbq97jqb22g'
	  ),
	));
	
	$response = curl_exec($curl);
	
	curl_close($curl);
	return $response;
	
   }

	function f_drnote_tcs_crnjnl($data){

		$curl = curl_init();
		curl_setopt_array($curl, array(
		
		CURLOPT_URL => 'http://localhost/benfed/Benfed_finance/index.php/api_voucher/crn_voucher_tcs',
		//CURLOPT_URL => 'http://localhost/Benfed_finance/index.php/api_voucher/crn_voucher',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
			"data": '.json_encode($data).'
		}',
		
		CURLOPT_HTTPHEADER => array(
			'Content-Type: application/json',
			'Cookie: ci_session=eieqmu6gupm05pkg5o78jqbq97jqb22g'
		),
		));
		
		$response = curl_exec($curl);
		
		curl_close($curl);
		return $response;
		
	}

/******************************************************** */



/*Select Data from a table*/		
		public function f_select($table,$select=NULL,$where=NULL,$type=NULL){
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
		

		public function f_get_receiptReport_dtls($receipt_no,$finYr )
		{
	
   $sql = $this->db->query(" select a.trans_dt,a.recpt_no,a.trans_no,a.soc_id,b.soc_name,b.gstin,a.comp_id,a.invoice_no,a.ro,a.catg,sum(a.tot_amt) as tot_amt ,a.trans_flag,a.note_type,a.remarks,c.cat_desc
                                    from tdf_dr_cr_note a ,mm_ferti_soc b,mm_cr_note_category c
									 where a.soc_id=b.soc_id
									 and   a.catg = c.sl_no
									 and invoice_no ='$receipt_no' and fin_yr='$finYr'
									 group by c.cat_desc,a.trans_dt,a.recpt_no,a.trans_no,a.soc_id,b.soc_name,b.gstin,a.comp_id,a.invoice_no,a.ro,a.trans_flag,a.note_type,a.remarks");			
		  return $sql->result();
	
		}
		
		public function get_trans_no($fin_id){

			$sql="select ifnull(max(trans_no),0) + 1 trans_no
					 from tdf_dr_cr_note where fin_yr = '$fin_id'";

		  $result = $this->db->query($sql);     
	  
		  return $result->row();

		}
		public function get_trans_no_fortcs($fin_id){

			$sql="select ifnull(max(trans_no),0) + 1 trans_no
					 from drnote_tcs where fin_yr = '$fin_id'";

		  $result = $this->db->query($sql);     
	  
		  return $result->row();

		}

		public function f_getdo_dtl($br_cd,$soc_id){
	
			$data = $this->db->query("select distinct trans_do
										from td_sale 
									where br_cd = '$br_cd'
									and soc_id='$soc_id'
									and round_tot_amt-paid_amt>0
									union
									select  sale_invoice_no
									from  tdf_payment_recv
									where branch_id='$br_cd'
									and pay_type='O' and soc_id='$soc_id'
									 ");
								   
	   return $data->result();
		   
	   }
		public function get_trans_no_forbr($fin_id){

			$sql="select ifnull(max(trans_no),0) + 1 trans_no
					 from drnote_br where fin_yr = '$fin_id'";

		  $result = $this->db->query($sql);     
	  
		  return $result->row();

		}
		public function f_delete($table_name, $where) {			

			$this->db->delete($table_name, $where);
	 
			 return;
		}
		
		public function checked_recived_payment($sale_invoice_no){
			$this->db->where('sale_invoice_no',$sale_invoice_no)->where('pay_type',6);
			$q=$this->db->get('tdf_payment_recv')->num_rows();
			return $q;
		}
		public function checked_recived_payment_cradit_not($sale_invoice_no){
			$this->db->where('sale_invoice_no',$sale_invoice_no);
			$this->db->where('pay_type',6);
			$q=$this->db->get('tdf_payment_recv')->num_rows();
			return $q;
		}
		public function delete_td_vouchers($recpt_no){
			$db2 = $this->load->database('findb', TRUE);
				$data=$db2->select('')->where(array('voucher_id'=>$recpt_no))->get('td_vouchers')->result();
			foreach ($data as $keydata) {
				$keydata->delete_by = $this->session->userdata['loggedin']['user_name'];
				$keydata->delete_dt = date('Y-m-d H:m:s');
				// print_r($keydata);
				$db2->insert('td_vouchers_delete', $keydata);

			}

			$data= $db2->query("DELETE FROM td_vouchers WHERE voucher_id='$recpt_no'");
			return $data;
		}

		public function f_select_finance($table,$select=NULL,$where=NULL,$type=NULL){
			$db2 = $this->load->database('findb', TRUE);
			if(isset($select)){
				$db2->select($select);
			}
			if(isset($where)){
				$db2->where($where);
			}
			$value = $db2->get($table);
			if($type==1){
				return $value->row();
			}else{
				return $value->result();
			}
		}


	}
?>
