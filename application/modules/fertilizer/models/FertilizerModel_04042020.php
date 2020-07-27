<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class FertilizerModel extends CI_Model{					/*Insert Data in Tables*/
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
		
		public function js_get_stock_qty($ro)
		{

			$sql = $this->db->query("SELECT a.qty,a.prod_id ,b.gst_rt  FROM td_purchase a ,mm_product b WHERE a.prod_id=b.prod_id and  a.ro_no = '$ro'");
			// echo "pre";
			// var_dump($sql);die;
			return $sql->row();
		}
		public function f_get_ro_dtls($ro_no) // For Jquery
        {

            $sql = $this->db->query("SELECT a.invoice_no,a.invoice_dt,a.due_dt,a.qty,a.no_of_bags ,a.comp_id,a.prod_id,b.gst_no,c.hsn_code,b.comp_name,c.gst_rt,a.branch_id
			FROM td_purchase a ,mm_company_dtls b,mm_product c
			WHERE a.ro_no ='$ro_no'
			and a.comp_id=b.comp_id
			and a.prod_id=c.prod_id");
            return $sql->result();

        }
   // Code Written By lokesh Kumar jha on 02/04/2020  //
       public function f_get_particulars($table_name, $select=NULL, $where=NULL, $flag) {
        
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


/*Select Maximun soceity Code*/
		public function get_soceity_code(){

			$this->db->select_max('soc_id');
 
			// $this->db->where('acc_type', $acc_type);
			
			$result = $this->db->get('mm_ferti_soc')->row()->soc_id;  
 
			return ($result+1);
		 }
		/*Select Maximun product Code*/
		public function get_product_code(){

			$this->db->select_max('prod_id');
 
			// $this->db->where('acc_type', $acc_type);
			
			$result = $this->db->get('mm_product')->row()->prod_id;  
 
			return ($result+1);
		 }
		 
		 /*Select Maximun comapany Code*/
		 public function get_company_code(){

			$this->db->select_max('comp_id');
 
			// $this->db->where('acc_type', $acc_type);
			
			$result = $this->db->get('mm_company_dtls')->row()->comp_id;  
 
			return ($result+1);
		 }
//Generate new schedule code accoring to acc_type(Liability 1,Asset 2,Income 5,Expense 6,Purchase 3,Sale 4)
		public function get_sch_code($acc_type){

		   $this->db->select_max('schedule_code');

		   $this->db->where('acc_type', $acc_type);
		   
		   $result = $this->db->get('md_schedule_heads')->row()->schedule_code;  

           return ($result+1);
		}

		public function get_subsch_code($sch_code,$acc_type){

		   $this->db->select_max('subschedule_code');
		   $this->db->where('acc_type', $acc_type);
		   $this->db->where('schedule_code', $sch_code);
           $result = $this->db->get('md_subschedule_heads')->row()->subschedule_code;  

           return ($result+1);
		}

/*Delete From Table*/
		public function f_delete($table_name, $where) {			

			$this->db->delete($table_name, $where);
			// echo $this->db->last_query();
			//  die();
			 return;
		}

/*Select Maximun Account Code*/
		public function f_max_no($sub_sch){

			$this->db->select_max('acc_code');

			$this->db->where('sub_sch_code', $sub_sch);

			$result = $this->db->get('md_account_heads');

			if($result->num_rows() > 0){

				return $result->row();

			}else{

			       return 0;	   	
			}	    
		}

		public function f_select_parameter($value){		      /*Select parameter value from table */
			$this->db->select('param_value');

			$this->db->where('sl_no',$value);

			$data = $this->db->get('md_parameters');

			if($data->num_rows() > 0){
				return $data->row();
			}else{
				return 0;	
			}
		}

		public function f_get_voucher_id_all($start_dt,$end_dt){   /*Get All Voucher ID*/		

			$this->db->distinct();

			$this->db->select('voucher_id');

			$this->db->where('voucher_date>=',$start_dt);

			$this->db->where('voucher_date<=',$end_dt);

			$this->db->where('approval_status','A');

			$result=$this->db->get('td_vouchers');

             return $result->result();
                }


		public function f_get_voucher_id($sys_date){

			$this->db->select_max('voucher_id');

			$this->db->where('voucher_date',$sys_date);

			$this->db->where('approval_status','A');

			$result=$this->db->get('td_vouchers');

			if($result->num_rows() > 0 ){
				
				return $result->row();
			}	
				else{
					return 0;
				 }
		}

		public function f_get_vouchers($start_dt,$end_dt,$voucher_id){

			 $vouchers=$this->db->query("select voucher_date,voucher_id,
						            voucher_mode,acc_code,
						            amount dr_amt,0 
						            cr_amt,remarks,
						            ins_no,ins_dt
						     from   td_vouchers
						     where  dr_cr_flag = 'Dr'
						     and    approval_status ='A'
						     and    voucher_date Between '$start_dt' And '$end_dt'
						     and    voucher_id = $voucher_id 
						     UNION
						     select voucher_date,voucher_id,
							    voucher_mode,acc_code,
							    0 dr_amt,
							    amount cr_amt,remarks,
							    ins_no,ins_dt
						     from   td_vouchers
						     where dr_cr_flag = 'Cr'
						     and    approval_status = 'A'
						     and    voucher_date Between '$start_dt' And '$end_dt'
						     and    voucher_id = $voucher_id 
						     order by voucher_date,voucher_id"); 
			 return $vouchers->result();
		}

		public function f_get_ac_code($acc_code){
			$this->db->select('acc_head');
			$this->db->where('acc_code',$acc_code);
			$result = $this->db->get('md_account_heads'); 
			return $result->row();
		}


		public function f_gl_report($start_dt,$end_dt,$acc_code){
		  $data=$this->db->query("select voucher_date,voucher_id,voucher_mode,ins_no,
       						     ins_dt,remarks,amount cr_amt,0 dr_amt,acc_code
       				  from   td_vouchers
					  where  dr_cr_flag = 'Cr'
					  and    voucher_date Between '$start_dt' And '$end_dt'
					  and    acc_code = $acc_code
					  UNION
					  select voucher_date,voucher_id,voucher_mode,ins_no,
       					  ins_dt,remarks,0 cr_amt,amount dr_amt,acc_code
       					  from   td_vouchers
					  where dr_cr_flag = 'Dr'
					  and    voucher_date Between '$start_dt' And '$end_dt'
					  and    acc_code = $acc_code
					  order by voucher_date,voucher_id");

				return $data->result();
		}

		public function f_opening_bal($adt_dt,$acc_code){
			$data=$this->db->query("select f_getopening('$adt_dt',$acc_code)opn_bal from Dual");
			return $data->row();
		}	

		public function f_closing_bal($adt_dt,$acc_code){
			$data=$this->db->query("select f_getclosing('$adt_dt',$acc_code)cls_bal from Dual");
			return $data->row();
		}
	
		public function f_trial_balance($adt_dt){
			$data=$this->db->query("select a.balance_dt,a.acc_code acc_code,
	   					       b.sch_code sch_code,
       						       c.schedule_type schedule_type,
	   					       b.acc_head acc_head,
	   					       a.balance_amt cr_amt,
     						       0 dr_amt
						from   tm_account_balance a,
	   					       md_account_heads b,
       						       md_schedule_heads c
						where  a.acc_code = b.acc_code
						and    b.sch_code = c.schedule_code
						and    a.balance_dt = (select max(balance_dt)
                       						       from   tm_account_balance
                       						       where  balance_dt <= '$adt_dt')
						and    a.balance_amt < 0
						UNION
						select a.balance_dt,a.acc_code acc_code,
	   					       b.sch_code sch_code,
       						       c.schedule_type schedule_type,
	   					       b.acc_head acc_head,
	   					       0 cr_amt,a.balance_amt dr_amt
						from   tm_account_balance a,
	   					       md_account_heads b,
       						       md_schedule_heads c
						where  a.acc_code = b.acc_code
						and    b.sch_code = c.schedule_code
						and    a.balance_dt = (select max(balance_dt)
                     						       from   tm_account_balance
                     						       where  balance_dt <= '$adt_dt')
						and    a.balance_amt > 0
						order by sch_code,acc_code");
			return $data->result();	

		}

		public function f_cash_book($from_dt,$to_dt){
			$data = $this->db->query("Select a.acc_code acc_code,
	   						 b.acc_head acc_head,
       							 sum(a.dr_amt)dr_amt,
       							 sum(a.cr_amt)cr_amt
						  from(select acc_code,Sum(amount) dr_amt,0 cr_amt from td_vouchers
						       where  voucher_date = '$from_dt'
						       and    dr_cr_flag = 'Dr'
						       and    voucher_mode = 'C'
					   	       and    acc_code <> 21101
						       group by acc_code     
						       UNION
						       select acc_code,0 dr_amt,Sum(amount) cr_amt from td_vouchers
						       where  voucher_date = '$to_dt'
						       and    dr_cr_flag = 'Cr'
						       and    voucher_mode = 'C'
						       and    acc_code <> 21101
						       group by acc_code)a,
						       md_account_heads b
						 where a.acc_code = b.acc_code
					         group by acc_code
						 ORDER BY acc_code");
			return $data->result();	
		}
    //  Function For Stock Report Developed By Lokesh  01/04/2020//
		public function stockreport($start_dt){
		   $data=$this->db->query("Select a.PROD_ID PROD_ID,a.COMPANY COMPANY,
	   						 a.PROD_DESC PROD_DESC,
       							 sum(b.qty) qty   

       						from   mm_product a,
	   					    td_purchase b    							   							
					  where  a.PROD_ID = b.prod_id
					
					  group by PROD_DESC,qty,PROD_ID,COMPANY");

				return $data->result();
		}

	}
?>
