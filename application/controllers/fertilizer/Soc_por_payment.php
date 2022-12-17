<?php
	class Soc_por_payment extends MX_Controller{

		protected $sysdate;

		protected $fin_year;

		public function __construct(){

			parent::__construct();	
			$this->load->model('Soc_por_paymodel');
			$this->load->model('AdvanceModel');
			$this->load->model('ApiVoucher');
			$this->load->helper('paddyrate_helper');
			$this->session->userdata('fin_yr');
			if(!isset($this->session->userdata['loggedin']['user_id'])){
            
            redirect('User_Login/login');

            }
		}


		public function paylist()
		{
			$pwehere = array('approve_status'=>'U');
			$data['paylist']  = $this->Soc_por_paymodel->f_pselect('td_payment',NULL,$pwehere,0);
			$this->load->view("post_login/fertilizer_main");
			$this->load->view("soceity_pay_portal/dashboard",$data);
			$this->load->view('search/search');
			$this->load->view('post_login/footer');
			
		}
		public function paydetail(Type $var = null)
		{

			$pwehere = array('order_id'=>$this->input->get('order_id'));
			$data['payment']  = $this->Soc_por_paymodel->f_pselect('td_payment',NULL,$pwehere,1);
			$this->load->view("post_login/fertilizer_main");
			$this->load->view("soceity_pay_portal/detailpage",$data);
			$this->load->view('post_login/footer');

		}
		public function approve_pay(Type $var = null)
		{
			    $order_id    = $this->input->get('order_id');
				$pay_data    = $this->Soc_por_paymodel->f_pselect('td_payment',NULL,array('order_id'=>$order_id), 1);
				$branch      = $pay_data->brn_id;
				$soc_id      = $pay_data->soc_id;
				$bank_id     = 34;
				$finYr       = $this->session->userdata['loggedin']['fin_id'];
				$fin_year    = $this->session->userdata['loggedin']['fin_yr'];
				
				
				$select         = array( "dist_sort_code" );
				$where          = array( "district_code"     =>  $branch );
				$brn            = $this->AdvanceModel->f_select("md_district",$select,$where,1);  
				$transCd 	    = $this->AdvanceModel->get_advance_code($branch,$finYr);
				$receipt        = 'Adv/'.$brn->dist_sort_code.'/'.$fin_year.'/'.$transCd->sl_no;
				
				//if($this->input->post('cshbank') == 1){

					$select_bnkacc         = array("acc_code"
					);
					$where_bnkacc          = array(
						"sl_no"     => $bank_id
					);
				   $bnk_acc = $this->AdvanceModel->f_select("mm_feri_bank",$select_bnkacc,$where_bnkacc,1);
				//}
				
				$select_adv         = array( "adv_acc");

				$where_adv  = array(
					        "district" =>  $branch,
					        "soc_id"   => $soc_id
				        );

				$adv_acc= $this->AdvanceModel->f_select("mm_ferti_soc",$select_adv,$where_adv,1);
			
				$bbranch  =  $bank_id;
				if(empty($bbranch)){
				$branchid=0;
				}else{
					$branchid=$bbranch;
					
				}
					$data_array = array (

							"trans_dt" 			=> date('Y-m-d'),

							"sl_no" 			=> $transCd->sl_no,
							
							"receipt_no"        => $receipt,

							"fin_yr"            => $finYr,

							"branch_id"  		=> $branch,

							"soc_id"            => $soc_id,

						    "cshbnk_flag"        => '1',

							"trans_type"   		=> 'I',

							"adv_amt"			=> $pay_data->amount,

							"bank"              => $branchid,

							"remarks" 			=> $pay_data->status,

							"referenceNo"		=> NULL,

							"created_by"    	=> $this->session->userdata['loggedin']['user_name'],    

							"created_dt"    	=>  date('Y-m-d h:i:s')
						);
						
						$data_array_fin=$data_array;
						$data_array_fin['acc_code'] = $bnk_acc->acc_code; 
						$data_array_fin['adv_acc'] = $adv_acc->adv_acc; 

						$select_soc         = array("soc_name");
						$where_soc           = array("soc_id"     => $soc_id);
						$soc_name = $this->AdvanceModel->f_select("mm_ferti_soc",$select_soc,$where_soc,1);
						
						$data_array_fin['rem'] ="Advance Received From ".$soc_name->soc_name.','.$this->input->post('remarks');
						$select_br    = array("dist_sort_code");
						$where_br     = array("district_code"=> $branch );
										
						$data_array_fin['fin_fulyr']=$fin_year;
						$data_array_fin['br_nm']= $brn->dist_sort_code;
						
						$this->AdvanceModel->f_insert('tdf_advance', $data_array);
			if($this->ApiVoucher->f_advjnl( $data_array_fin) == 1){
				$order_id = $this->input->get('order_id');
			    $data_array = array('approve_status'=>'A',
		                        'approved_by' => $this->session->userdata['loggedin']['user_id'],
								'approve_at' =>date("Y-m-d h:i:s"));
			    $where      = array('order_id'=>$order_id);
			    $data = $this->Soc_por_paymodel->f_pedit('td_payment',$data_array, $where);
				
				$this->session->set_flashdata('msg', 'Successfully Added');
			}else{
				$this->session->set_flashdata('msg', 'Error in accounting!!');
			}
			redirect('fert/sppay/paylist');
		}
		


}
?>