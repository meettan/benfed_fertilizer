<?php
	class Drcrnote extends MX_Controller{
		protected $sysdate;
		protected $fin_year;
		public function __construct(){
		parent::__construct();	
		$this->db2 = $this->load->database('findb', TRUE);
		$this->load->model('DrcrnoteModel');
		$this->load->model('PurchaseModel');
		$this->load->model('AdvanceModel');
		$this->load->model('Society_paymentModel');
		$this->load->model('ReportModel');
		$this->load->helper('paddyrate_helper');

		    if(!isset($this->session->userdata['loggedin']['user_id'])){
            
            redirect('User_Login/login');

            }
		}



/**************************************************************** */
public function f_branch_crnoteupd(){

	if($_SERVER['REQUEST_METHOD'] == "POST") {
		// echo 'hi';
		// die();
		
		$tot_amt = $this->input->post('comp_adjflag');
		// echo $tot_amt;
		// die();
		// print_r($_POST);
		// die();
						
					  for($i = 0; $i < count($comp_adjflag); $i++){

		$data    = array(

					

					'comp_adjflag'       => $this->input->post('comp_adjflag')

					);

		$where3  =   array(

			'comp_adjflag'     => 'N',
          'ro'                 => $this->input->post('ro')
	   );
		

		$this->DrcrnoteModel->f_edit('tdf_dr_cr_note', $data, $where);

		// echo $this->db->last_query();
		// die();

	}
		$this->session->set_flashdata('msg', 'Successfully Updated');

		redirect('drcrnote/branch_crnote');
		
		
	}
	// else {


	// 	$where3 = array(

	// 		  "trans_dt" => $this->input->get('trans_dt'),
				
	// 		"trans_no" => $this->input->get('trans_no')
	// 	);


	// 	$where1 = array(
	// 		"soc_id"=> $this->input->get('soc_id'),
	// );
	// 	$select        = array("soc_id soc_id","soc_name soc_name");

	// 	$select1       = array("COMP_ID comp_id","COMP_NAME comp_name");

	// 	$select3       =array("a.trans_dt",
	// 							"a.trans_no",
	// 							"a.soc_id",
	// 							"a.comp_id",
	// 							"a.invoice_no",
	// 							"a.ro",
	// 							"a.catg",
	// 							"a.tot_amt",
	// 							"a.trans_flag",
	// 							"a.note_type",
	// 							 "a.remarks",
	// 							"b.cat_desc");
								

								
	// 							$where =array("a.catg=b.sl_no"=>NULL 	,
	// 							"invoice_no" => $this->input->get('invoice_no'));

	// 							$where_cr =array(
	// 							"invoice_no" => $this->input->get('invoice_no'));
		 
	// 	$product['socdtls']    = $this->DrcrnoteModel->f_select('mm_ferti_soc',$select,NULL,0);
		
	// 	$product['compdtls']   = $this->DrcrnoteModel->f_select('mm_company_dtls',$select1,NULL,0);

	// 	$product['catdtls']   = $this->DrcrnoteModel->f_select('mm_cr_note_category',NULL,NULL,0);
	 
	// 	$product['dr_dtls']     = $this->DrcrnoteModel->f_get_particulars("tdf_dr_cr_note", NULL, $where_cr,0);
			
	// 	$this->load->view('post_login/fertilizer_main');

	// 	$this->load->view("dr_note/edit",$product);

	// 	$this->load->view('post_login/footer');
	// }

}



/*************************************************************** */

public function branch_crnote(){

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        $from_dt    = $_POST['from_date'];

        $to_dt      = $_POST['to_date'];
       
        $comp_id    = $this->input->post('company');

		$catg       = $this->input->post('category');
        
        $comp_name  = $this->ReportModel->get_comp_name($comp_id);

        // $branch     = $this->session->userdata['loggedin']['branch_id'];

		$branch     = $this->input->post('branch');

        $mth        =  date('n',strtotime($from_dt));

        $yr         =  date('Y',strtotime($from_dt));
        // $all_data   =  array($from_dt,$to_dt,$branch,$soc_id );
        if($mth > 3){

            $year = $yr;

        }else{

            $year = $yr - 1;
        }

        $opndt               =  date($year.'-04-01');

        $prevdt              =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));

        $_SESSION['date']    =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));
            
        $data['branch']      =   $this->DrcrnoteModel->f_select("md_district", NULL, NULL,0);
	
        $data['sales']=$this->ReportModel->f_br_crnote($from_dt,$to_dt,$branch ,$comp_id ,$catg  );
		// echo $this->db->last_query();
		// die();
    
        $select             = array("COMP_ID","COMP_NAME");
        
        $where_dist         = array("district"  =>  $this->session->userdata['loggedin']['branch_id']);

        $data['compdtls']   = $this->DrcrnoteModel->f_select('mm_company_dtls',$select,NUll,0);

		$data['category']   = $this->DrcrnoteModel->f_select("mm_cr_note_category", NULL, NULL,0);
		
		$data['frm_dt'] 	= $from_dt;
		
		$data['to_dt'] 		= $to_dt;
		
		$data['comp_id'] 	= $comp_id;
		
		$data['catg'] 		= $catg;
		
		$data['branch_id'] 	= $branch;

        $this->load->view('post_login/fertilizer_main');
    
        $this->load->view('soc_crnote/input',$data);

        $this->load->view('post_login/footer');

    }else{

        $select                 = array("COMP_ID","COMP_NAME");
        
        $where                  = array("district"  =>  $this->session->userdata['loggedin']['branch_id']);

        $company['compdtls']    = $this->DrcrnoteModel->f_select('mm_company_dtls',$select,NUll,0);

		$company['branch']      = $this->DrcrnoteModel->f_select("md_district", NULL, NULL,0);

		$company['category']    = $this->DrcrnoteModel->f_select("mm_cr_note_category", NULL, NULL,0);
		
		$company['frm_dt'] 		= date('Y-m-d');
		
		$company['to_dt'] 		= date('Y-m-d');
		
		$company['comp_id'] 	= '';
		
		$company['catg'] 		= '';
		
		$company['branch_id'] 		= '';

        $this->load->view('post_login/fertilizer_main');
        $this->load->view('soc_crnote/input',$company);
        $this->load->view('post_login/footer');
    }

}
		
function update_dr_cr_note(){
	$dt = 0;
	$data = $this->input->post('data');
	$table_name = 'tdf_dr_cr_note';
	foreach($data as $v){
		$ext_dt = explode(",",$v);
		$ro = $ext_dt[0];
		$br_id = $ext_dt[1];
		$cat_id = $ext_dt[2];
		$data_array = array(
			'comp_adjflag' => 'Y'
		);
		$where = array(
			'ro' => $ro,
			'branch_id' => $br_id,
			'catg' => $cat_id
		);
		if($this->DrcrnoteModel->f_edit($table_name, $data_array, $where)){
			$dt = 1;
		}else{
			$dt = 0;
		}
		//echo $this->db->last_query();
		//var_dump($ext_dt);
	}
	echo 1;
	//var_dump($data);
	//exit;
}
/******yearly dr note receipt**** */
public function drnote_brRep()
    {
        $id = $this->input->get('id');
        $dr['data']    = $this->DrcrnoteModel->f_get_drnotebrrep($id);
        // echo $this->db->last_query();
		// exit();
        $dr['id'] = $id;
        
        $this->load->view("post_login/fertilizer_main");
    
        $this->load->view('report/drnotebr_receipt', $dr);
    
        $this->load->view('post_login/footer');
        
    }
    

/******************************************Debit Note For Customer ********************************************/		

public function drnoteReport()
{
	$receipt_no = $this->input->get('invoice_no');
	$finYr          = $this->session->userdata['loggedin']['fin_id'];
	$cr['data']    = $this->DrcrnoteModel->f_get_receiptReport_dtls($receipt_no,$finYr);
	// $cr['data']    = $this->DrcrnoteModel->f_get_receiptReport_dtls($receipt_no,$finYr);
	// echo $this->db->last_query();
	// die();
	$cr['receipt_no'] = $receipt_no;
 
	$this->load->view("post_login/fertilizer_main");

	$this->load->view('report/cr_note_report', $cr);

	$this->load->view('post_login/footer');
	
}


//Dashboard
		public function dr_note(){
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$from_date=$this->input->post('from_date');
			$to_date=$this->input->post('to_date');
			$select	=	array("a.br_adj_flag","b.soc_name","a.recpt_no","(select  nwirn from td_sale_cancel where trans_do=a.invoice_no) as irn",
				"a.trans_dt","a.trans_no","a.soc_id","a.comp_id","sum(a.tot_amt)tot_amt","a.trans_flag","a.invoice_no","a.fwd_flag",
				"b.soc_name","c.COMP_NAME","(select count(paid_id) from tdf_payment_recv where sale_invoice_no=a.invoice_no and pay_type=6) as pay_cnt"
			
			);

			$where	=	array(

				"a.soc_id = b.soc_id"	=>	NULL,

				"a.comp_id = c.COMP_ID"	=>	NULL,

				"a.trans_flag"			=>	'R',

				"a.note_type"			=>	'D',
				
				"a.branch_id"			=>	$this->session->userdata['loggedin']['branch_id'],
				
				"a.trans_dt BETWEEN '".$from_date."' AND '".$to_date."' group by  a.invoice_no ORDER BY a.trans_dt"			=>	NULL
			);
			//a.fin_yr='".$this->session->userdata['loggedin']['fin_id']."'
		    
		   	$data['dr_notes']    = $this->DrcrnoteModel->f_select("tdf_dr_cr_note a,mm_ferti_soc b,mm_company_dtls c ",$select,$where,0);
		    //echo $this->db->last_query();
			//print_r($data['dr_notes']);
			//exit();
			$this->load->view("post_login/fertilizer_main");
	   
		    $this->load->view("dr_note/dashboard",$data);
	   
		    $this->load->view('search/search');
	   
		    $this->load->view('post_login/footer');
		}else{
			
			$select	=	array("a.br_adj_flag","b.soc_name","a.recpt_no","(select  nwirn from td_sale_cancel where trans_do=a.invoice_no) as irn",
				"a.trans_dt","a.trans_no","a.soc_id","a.comp_id","sum(a.tot_amt)tot_amt","a.trans_flag","a.invoice_no","a.fwd_flag",
				"b.soc_name","c.COMP_NAME","(select count(paid_id) from tdf_payment_recv where sale_invoice_no=a.invoice_no and pay_type=6) as pay_cnt"
			
			);

			$where	=	array(

				"a.soc_id = b.soc_id"	=>	NULL,

				"a.comp_id = c.COMP_ID"	=>	NULL,

				"a.trans_flag"			=>	'R',

				"a.note_type"			=>	'D',

				"a.branch_id"			=>	$this->session->userdata['loggedin']['branch_id'],
				"a.trans_dt BETWEEN '".date('Y-m-d')."' AND '".date('Y-m-d')."' group by  a.invoice_no ORDER BY a.trans_dt"			=>	NULL,
				
				
				

			);
		    
		   	$data['dr_notes']    = $this->DrcrnoteModel->f_select("tdf_dr_cr_note a,mm_ferti_soc b,mm_company_dtls c ",$select,$where,0);
		    // echo $this->db->last_query();
			// exit();
			$this->load->view("post_login/fertilizer_main");
	   
		    $this->load->view("dr_note/dashboard",$data);
	   
		    $this->load->view('search/search');
	   
		    $this->load->view('post_login/footer');
		}
	    }

		// public function dr_note_cron_job(){

			
			
		// 	$data    = array(
		// 		      'fwd_flag'       => "Y"
		// 			       );

	    //      $where  =   array(
        //               'trans_dt'     =>  date("Y-m-d")
		// 			);
	
        //     $this->DrcrnoteModel->f_edit('tdf_dr_cr_note', $data, $where);
		// }
 
		public function f_get_sale_inv_dr(){

			   
			$inv    = $this->DrcrnoteModel->get_sel_inv_dr($this->input->get("soc_id"),$this->input->get("comp_id"),$this->input->get("year"));
		
			echo json_encode($inv);
		
		}

		public function f_get_sale_inv(){

			   
			$inv    = $this->DrcrnoteModel->get_sel_inv($this->input->get("soc_id"),$this->input->get("comp_id"));
		
			echo json_encode($inv);
		
		}
		public function f_get_sale_refinv(){

			// $a=array("red","green");
			// array_push($a,"blue","yellow");
// 			$a1=array("red","green");
// $a2=array("blue","yellow");
// print_r(array_merge($a1,$a2));

// $a=array("trans_do");
// $ap=array_push($a,"others);
			$inv = $this->DrcrnoteModel->f_select('td_sale',array("trans_do","sale_ro"),array('soc_id' => $this->input->get("soc_id"),'comp_id'=>$this->input->get("comp_id"),'fin_yr'=>$this->input->get("year")),0);
			echo json_encode($inv);
		
		}
		public function f_get_sale_invro(){

			$select          = array("sale_ro");
			
		   $where=array(
			   "soc_id" =>$this->input->get("soc_id"),
			   "trans_do" =>$this->input->get("inv_no")) ;
		
			$ro    = $this->DrcrnoteModel->f_select(' td_sale',$select,$where,0);
		
			echo json_encode($ro);
		
		}

		public function f_get_cr_category()
		{
			
			$select = array("sl_no","cat_desc" );
					   
					// $where      =   array(
					// "comp_id"    =>  $this->input->get('comp_id'),
					// "district"   =>  $this->input->get('dist_id'),
					// "paid_amt=0" =>  NULL  );
					   
					$catid   = $this->DrcrnoteModel->f_select('mm_cr_note_category',$select,NULL,0);
					// echo $catid;
					echo json_encode($catid);
		
		}

//ADD
	     
//edit
    public function drnote_edit(){

		if($_SERVER['REQUEST_METHOD'] == "POST") {
			$tot_amt = $this->input->post('tot_amt');
							
						  for($i = 0; $i < count($tot_amt); $i++){
   
			$data    = array(

						

						// 'remarks'       => $this->input->post('remarks'),

						// 'soc_id'        => $this->input->post('soc_id'),

						// 'comp_id'       => $this->input->post('comp_id'),

						// 'invoice_no'    => $this->input->post('inv_no'),

						//  'ro'           => $this->input->post('ro_no'),
						 
						// 'catg'          => $this->input->post('cat_id'),
						'catg'          =>$_POST['cat_id'][$i],

						'tot_amt'       =>$_POST['tot_amt'][$i],

						'modified_by'   => $this->session->userdata['loggedin']['user_name'],

						'modified_dt'   =>  date('Y-m-d'),

						'modified_ip'   =>  $_SERVER['REMOTE_ADDR']

						);

			$where3  =   array(

				'invoice_no'     => $this->input->post('inv_no'),
				'trans_type'     =>'R'

		   );
			
            $this->DrcrnoteModel->f_edit('tdf_dr_cr_note', $data, $where3);
			// echo $this->db->last_query();
			// die();

		}
			$this->session->set_flashdata('msg', 'Successfully Updated');

			redirect('drcrnote/dr_note');
			
            
		}else {


            $where3 = array(

              	"trans_dt" => $this->input->get('trans_dt'),
                    
                "trans_no" => $this->input->get('trans_no')
            );


			$where1 = array(
				"soc_id"=> $this->input->get('soc_id'),
		);
			$select        = array("soc_id soc_id","soc_name soc_name");

			$select1       = array("COMP_ID comp_id","COMP_NAME comp_name");

			$select3       =array("a.trans_dt",
									"a.trans_no",
									"a.soc_id",
									"a.comp_id",
									"a.invoice_no",
									"a.ro",
									"a.catg",
									"a.tot_amt",
									"a.trans_flag",
									"a.note_type",
									 "a.remarks",
									"b.cat_desc",
								    "a.fwd_flag");
									

									  // $where =array("a.catg=b.sl_no"=>NULL 	,
									 // "trans_dt" => $this->input->get('trans_dt'),
                          			// "trans_no" => $this->input->get('trans_no'));

									
									$where =array("a.catg=b.sl_no"=>NULL 	,
									"invoice_no" => $this->input->get('invoice_no'));

									$where_cr =array(
									"invoice_no" => $this->input->get('invoice_no'),
									'trans_flag'=>'R');
			 
			$product['socdtls']    = $this->DrcrnoteModel->f_select('mm_ferti_soc',$select,NULL,0);
			
			$product['compdtls']   = $this->DrcrnoteModel->f_select('mm_company_dtls',$select1,NULL,0);

			$product['catdtls']   = $this->DrcrnoteModel->f_select('mm_cr_note_category',NULL,NULL,0);
		  // $product['dr_dtls']    = $this->DrcrnoteModel->f_select('tdf_dr_cr_note a,mm_cr_note_category b ',$select3,$where,0);
			$product['dr_dtls']     = $this->DrcrnoteModel->f_get_particulars("tdf_dr_cr_note", NULL, $where_cr,0);
				
			$select_cr = array(
				"count(ro)as cr_cnt"
			);	
			$where_cr = array(
				"invoice_no"	=> $this->input->get('invoice_no') ,
				"trans_flag"    =>'A'
		);
			$product['cr_cnt']= $this->DrcrnoteModel->f_select("tdf_dr_cr_note",$select_cr,$where_cr,0);
// echo $this->db->last_query();
// die();
	        $this->load->view('post_login/fertilizer_main');

	        $this->load->view("dr_note/edit",$product);

	        $this->load->view('post_login/footer');
        }

    }

//delete
	public function deletedr_note() {
		//print_r($this->input->get());
		
		$recpt_no=$this->input->get('recpt_no');
		$sale_invoice_no=$this->input->get('sale_invoice_no');
		$recivedPayCount=$this->DrcrnoteModel->checked_recived_payment($sale_invoice_no);
		//$recivedPaycrnodeCount=$this->DrcrnoteModel->checked_recived_payment_cradit_not($sale_invoice_no);
		//if($recivedPaycrnodeCount==0){
		if($recivedPayCount==0){
			$where  =   array(
						"trans_dt" => $this->input->get('trans_dt'),
						"trans_no" => $this->input->get('trans_no')
				);

				$data=$this->DrcrnoteModel->f_select('tdf_dr_cr_note',null,$where,0);
		foreach ($data as $keydata) {
			$keydata->delete_by = $this->session->userdata['loggedin']['user_name'];
			$keydata->delete_dt = date('Y-m-d H:m:s');
			$keydata->delete_ip = $_SERVER['REMOTE_ADDR'];
			
			$this->DrcrnoteModel->f_insert('tdf_dr_cr_note_delete',$keydata);

		}

		
			$this->DrcrnoteModel->f_delete('tdf_dr_cr_note', $where);
			$this->DrcrnoteModel->delete_td_vouchers($recpt_no);
			$this->session->set_flashdata('msg', 'Successfully Deleted!');
			redirect('drcrnote/dr_note');
		}else{
			$this->session->set_flashdata('msg', 'Advance alrady adjusted ! Delete not possible');
			redirect('drcrnote/dr_note');
		}
	// }else{
	// 	$this->session->set_flashdata('msg', 'Advance alrady adjusted ! Delete not possible');
	// 	redirect('drcrnote/dr_note');
	// }
		//exit();
		

	}	
//ADD
public function drnoteAdd(){

	$branch  = $this->session->userdata['loggedin']['branch_id'];
	$finYr          = $this->session->userdata['loggedin']['fin_id'];
	$fin_year       = $this->session->userdata['loggedin']['fin_yr'];
	$select         = array("dist_sort_code");
	$where          = array("district_code"     =>  $branch);
	$brn           = $this->DrcrnoteModel->f_select("md_district",$select,$where,1); 

 $transNo         = $this->DrcrnoteModel->get_trans_no($this->session->userdata['loggedin']['fin_id']);

 $receipt         = 'Crnote/'.$brn->dist_sort_code.'/'.$fin_year.'/'.$transNo->trans_no;
 
	
 if($_SERVER['REQUEST_METHOD'] == "POST") {

	$soc_id    = $this->input->post('soc_id');
	$tot_amt   = $this->input->post('tot_amt');
	$tot_cramt = 0.00;


	
 for($i = 0; $i < count($tot_amt); $i++){

	//  $tot_amt  = $_POST['tot_amt'][$i];
	//  $cat_id   = $_POST['cat_id'][$i];
	
	  $data  = array (
		'recpt_no' => $receipt ,
		  
		'soc_id'      => $this->input->post('soc_id'),

		'trans_dt'    =>  $this->input->post('trans_dt'),

		"trans_no"	  =>  $transNo->trans_no,

		"comp_id"	  => $this->input->post('comp_id'),	
		
		"invoice_no"  => $this->input->post('inv_no'),

		"year"        => $this->input->post('year'),
		
		'ref_invoice_no' => $this->input->post('ref_invoice_no'),

		"ro"           => $this->input->post('ro_no'),	
		
		'catg'         => $_POST['cat_id'][$i],

		'tot_amt'      => $_POST['tot_amt'][$i],

		'branch_id'   => $this->session->userdata['loggedin']['branch_id'],

		"remarks"     => $this->input->post('remarks'),

		"note_type"	  => 'D',

		"fin_yr"      => $this->session->userdata['loggedin']['fin_id'],
		
		'created_by'  => $this->session->userdata['loggedin']['user_name'],

		'created_dt'  =>  date('Y-m-d h:i:s'),

		"created_ip"   =>  $_SERVER['REMOTE_ADDR']

	);
	// print_r($data);
	
$tot_cramt += $_POST['tot_amt'][$i];

	$select_cracc         = array("acc_cd"
							   );
$where_cracc          = array(
	"sl_no"     => $_POST['cat_id'][$i]
);

$cr_acc = $this->DrcrnoteModel->f_select("mm_cr_note_category",$select_cracc,$where_cracc,1);

		$data_array_cr=$data;
		$data_array_cr['acc_cd'] = $cr_acc->acc_cd; 
		
		$select_soc         = array("soc_name","acc_cd");
		$where_soc           = array("soc_id"     => $soc_id);
		$soc_name = $this->DrcrnoteModel->f_select("mm_ferti_soc",$select_soc,$where_soc,1);
			$data_array_crt['soc_acc']= $soc_name->acc_cd;
		$data_array_cr['rem'] ="Credit Note raised for ".$soc_name->soc_name." aginst Invoice No. ". $this->input->post('inv_no').",".$this->input->post('remarks');

		$select_br    = array("dist_sort_code");
		$where_br     = array("district_code"=> $branch );
	

		$data_array_cr['fin_fulyr']=$fin_year;
		$data_array_cr['br_nm']= $brn->dist_sort_code;
		if($this->DrcrnoteModel->f_crnjnl($data_array_cr)!=0){
			$this->DrcrnoteModel->f_insert('tdf_dr_cr_note', $data);
		}else{
			echo "<script>alert('Credit Note has not yet been done.');</script>";
		}
		
}
$data_cr  = array (
'recpt_no' => $receipt ,
  
'soc_id'      => $this->input->post('soc_id'),

'trans_dt'    =>  $this->input->post('trans_dt'),

"trans_no"	  =>  $transNo->trans_no,

"comp_id"	  => $this->input->post('comp_id'),	

"invoice_no"  => $this->input->post('inv_no'),	

"ro"           => $this->input->post('ro_no'),	

// 'catg'         => $_POST['cat_id'][$i],

'tot_amt'      => $tot_cramt,

'branch_id'   => $this->session->userdata['loggedin']['branch_id'],

"remarks"     => $this->input->post('remarks'),

"note_type"	  => 'D',

"fin_yr"      => $this->session->userdata['loggedin']['fin_id'],

'created_by'  => $this->session->userdata['loggedin']['user_name'],

'created_dt'  =>  date('Y-m-d h:i:s'));

$data_array_crt       =$data_cr;

$select_soc           = array("acc_cd");
$where_soc            = array("soc_id"     => $soc_id);
$soc_acc_cd             = $this->DrcrnoteModel->f_select("mm_ferti_soc",$select_soc,$where_soc,1);

$data_array_crt['acc_cd'] = $soc_acc_cd->acc_cd;

unset($select_soc);   
unset($where_soc);      

$select_soc           = array("soc_name");
$where_soc            = array("soc_id"     => $soc_id);
$soc_name             = $this->DrcrnoteModel->f_select("mm_ferti_soc",$select_soc,$where_soc,1);

$data_array_crt['rem'] = "Credit Note raised for ".$soc_name->soc_name." aginst Invoice No. ". $this->input->post('inv_no').",".$this->input->post('remarks');

		$select_br    = array("dist_sort_code");
		$where_br     = array("district_code"=> $branch );
	

		$data_array_crt['fin_fulyr']=$fin_year;
		$data_array_crt['br_nm']= $brn->dist_sort_code;
		$this->DrcrnoteModel->f_totcrnjnl( $data_array_crt);
		
		$this->session->set_flashdata('msg', 'Successfully Added');

		redirect('drcrnote/dr_note');
	
	   
		
}else {

		$wheres = array(

		"district" => $this->session->userdata['loggedin']['branch_id']
			
		);

		$select1   = array("soc_id","soc_name","soc_add","gstin");

		$product['socdtls']   = $this->DrcrnoteModel->f_select('mm_ferti_soc',$select1,$wheres,0);

		$select = array("COMP_ID comp_id","COMP_NAME comp_name");

		$product['compdtls']   = $this->DrcrnoteModel->f_select('mm_company_dtls',$select,NULL,0);

		$select_cat = array("sl_no","cat_desc");
		$wherecatagory=array("acc_cd >"=>0);

		$product['catdtls']   = $this->DrcrnoteModel->f_select('mm_cr_note_category',$select_cat,$wherecatagory,0);

		$select = array("trans_do");
		$whereinv=array(
			"soc_id" =>$this->input->get("soc_id")
			) ;
		$product['saleinv']   = $this->DrcrnoteModel->f_select('td_sale',$select,$whereinv,0);
		$product['mntend']= $this->PurchaseModel->f_get_mnthend($branch );
		$product['years'] = $this->DrcrnoteModel->f_select('md_fin_year',array('sl_no','fin_yr'),NULL,0);

		$product['date']   = $this->PurchaseModel->get_monthendDate();

		$this->load->view('post_login/fertilizer_main');
	
		$this->load->view("dr_note/add",$product);
	
		$this->load->view('post_login/footer');
}

}
/*************************************Credit Note For Company*************************************************/


//Dashboard
	public function cr_note(){
			
		$select	=	array(
			"a.trans_dt","a.trans_no","a.soc_id","a.comp_id","a.tot_amt","a.trans_flag",
			"c.COMP_NAME"
		);

		$where	=	array(

			"a.comp_id = c.COMP_ID"	=>	NULL,

			"a.trans_flag"			=>	'R',

			"a.note_type"			=>	'C',

			"a.branch_id"			=>	$this->session->userdata['loggedin']['branch_id'],

			"a.fin_yr"				=>	$this->session->userdata['loggedin']['fin_id']

		);
		
		$data['cr_notes']    = $this->DrcrnoteModel->f_select("tdf_dr_cr_note a,mm_company_dtls c",$select,$where,0);
	
		$this->load->view("post_login/fertilizer_main");

		$this->load->view("cr_note/dashboard",$data);

		$this->load->view('search/search');

		$this->load->view('post_login/footer');
	}

//ADD
	public function crnoteAdd(){

		if($_SERVER['REQUEST_METHOD'] == "POST") {

			$transNo = $this->DrcrnoteModel->get_trans_no($this->session->userdata['loggedin']['fin_id']);
					
			$data  = array (
					'soc_id'      => 0,

					'trans_dt'    =>  $this->input->post('trans_dt'),

					"trans_no"	  =>  $transNo->trans_no,

					"catg"	  =>  $this->input->post('catg'),

					'tot_amt'     => $this->input->post('tot_amt'),

					"comp_id"	  => $this->input->post('comp_id'),		

					'branch_id'   => $this->session->userdata['loggedin']['branch_id'],

					"remarks"     => $this->input->post('remarks'),

					"note_type"	  => 'C',

					"fin_yr"      => $this->session->userdata['loggedin']['fin_id'],
					
					'created_by'  => $this->session->userdata['loggedin']['user_name'],

					'created_dt'  =>  date('Y-m-d h:i:s')

				);
							
					$this->DrcrnoteModel->f_insert('tdf_dr_cr_note', $data);
							
					$this->session->set_flashdata('msg', 'Successfully Added');

					redirect('drcrnote/cr_note');
					
		}else {

				$wheres = array(

				"district" => $this->session->userdata['loggedin']['branch_id']
					
				);

				$select1   				= array("soc_id","soc_name","soc_add","gstin");

				$product['socdtls']   	= $this->DrcrnoteModel->f_select('mm_ferti_soc',$select1,$wheres,0);

				$select 				= array("COMP_ID comp_id","COMP_NAME comp_name");

				$product['compdtls']    = $this->DrcrnoteModel->f_select('mm_company_dtls',$select,NULL,0);
				$product['catdtls']   = $this->DrcrnoteModel->f_select('mm_cr_note_category',NULL,NULL,0);
				$this->load->view('post_login/fertilizer_main');
			
				$this->load->view("cr_note/add",$product);
			
				$this->load->view('post_login/footer');
		}

	}

//edit
    public function crnote_edit(){

		if($_SERVER['REQUEST_METHOD'] == "POST") {

			$data    = array(

						'tot_amt'       => $this->input->post('tot_amt'),

						'remarks'       => $this->input->post('remarks'),

						'comp_id'       => $this->input->post('comp_id'),

						'catg'          => $this->input->post('catg'),

						'modified_by'   => $this->session->userdata['loggedin']['user_name'],

						'modified_dt'   =>  date('Y-m-d h:i:s'),

						);

		   	$where  =   array(

                 'trans_dt'     => $this->input->post('trans_dt'),

                 'trans_no'   	=> $this->input->post('trans_no'),

            );

            $this->DrcrnoteModel->f_edit('tdf_dr_cr_note', $data, $where);

			// echo $this->db->last_query();
			// die();			
			$this->session->set_flashdata('msg', 'Successfully Updated');

			redirect('drcrnote/cr_note');
			
            
		}else {


            $where = array(

              	"trans_dt" => $this->input->get('trans_dt'),
                    
                "trans_no" => $this->input->get('trans_no')
            );

			$select        = array("soc_id","soc_name","soc_add","gstin");

			$select1       = array("COMP_ID comp_id","COMP_NAME comp_name");
			 
			$product['socdtls']    = $this->DrcrnoteModel->f_select('mm_ferti_soc',$select,NULL,0);
			
			$product['compdtls']   = $this->DrcrnoteModel->f_select('mm_company_dtls',$select1,NULL,0);

			$product['catg']   = $this->DrcrnoteModel->f_select('mm_cr_note_category',NULL,NULL,0);
			$product['cr_dtls']    = $this->DrcrnoteModel->f_select('tdf_dr_cr_note',NULL,$where,1);

		
	        $this->load->view('post_login/fertilizer_main');

	        $this->load->view("cr_note/edit",$product);

	        $this->load->view('post_login/footer');
        }

    }
/********************************************************* */
public function crnote_editvu(){

	// $inv=$this->input->get('invoice_no');
	// echo $inv;
	// die();
	// if($_SERVER['REQUEST_METHOD'] == "POST") {

	// 	$data    = array(

	// 				'tot_amt'       => $this->input->post('tot_amt'),

	// 				'remarks'       => $this->input->post('remarks'),

	// 				'comp_id'       => $this->input->post('comp_id'),

	// 				'modified_by'   => $this->session->userdata['loggedin']['user_name'],

	// 				'modified_dt'   =>  date('Y-m-d h:i:s'),

	// 				);

	// 	   $where  =   array(

	// 		 'invoice_no'     => $this->input->get('invoice_no')
	// 	);

	// 	$this->DrcrnoteModel->f_edit('tdf_dr_cr_note', $data, $where);

	// 	// echo $this->db->last_query();
	// 	// die();			
	// 	$this->session->set_flashdata('msg', 'Successfully Updated');

	// 	redirect('drcrnote/cr_note');
		
		
	// }else {

	// 	
	$invoice=$this->input->get('trans_do');
	// echo($invoice);
	// die();
		
		$where = array(

			  "invoice_no" => $invoice
		);

		$select        = array("soc_id","soc_name","soc_add","gstin");

		$select1       = array("COMP_ID comp_id","COMP_NAME comp_name");
		 
		$product['socdtls']    = $this->DrcrnoteModel->f_select('mm_ferti_soc',$select,NULL,0);
		
		$product['compdtls']   = $this->DrcrnoteModel->f_select('mm_company_dtls',$select1,NULL,0);


		$product['cr_dtls']    = $this->DrcrnoteModel->f_select('tdf_dr_cr_note',NULL,$where,1);

	// echo $this->db->last_query();
	// die();
		$this->load->view('post_login/fertilizer_main');

		$this->load->view("cr_note/edit",$product);

		$this->load->view('post_login/footer');
	// }

}


/************************************************************ */

//delete
	public function deletecr_note() {

		$where  =   array(

					"trans_dt" => $this->input->get('trans_dt'),
					
					"trans_no" => $this->input->get('trans_no')
			);

		$this->DrcrnoteModel->f_delete('tdf_dr_cr_note', $where);

		$this->session->set_flashdata('msg', 'Successfully Deleted!');

		redirect('drcrnote/cr_note');

	}
	///******edit yearly cr note*/** * */
	public function yearlydrnote_edit(){

		if($_SERVER['REQUEST_METHOD'] == "POST") {
			$tot_amt = $this->input->post('tot_amt');
							
						  for($i = 0; $i < count($tot_amt); $i++){
   
			$data    = array(
						'catg'          =>$_POST['cat_id'][$i],

						'tot_amt'       =>$_POST['tot_amt'][$i],

						'modified_by'   => $this->session->userdata['loggedin']['user_name'],

						'modified_dt'   =>  date('Y-m-d'),

						'modified_ip'   =>  $_SERVER['REMOTE_ADDR']

						);

			$where3  =   array(

				'recpt_no'     => $this->input->post('recpt_no')

		   );
			
            $this->DrcrnoteModel->f_edit('tdf_dr_cr_note', $data, $where3);
			// echo $this->db->last_query();
			// die();

		}
			$this->session->set_flashdata('msg', 'Successfully Updated');

			redirect('drcrnote/dr_note');
			
            
		}else {


            $where3 = array(
                          
                "recpt_no" => $this->input->get('recpt_no')
            );


			$where1 = array(
				"soc_id"=> $this->input->get('soc_id'),
		);
			
		$select        = array("soc_id","soc_name","soc_add","gstin");

		$select1       = array("COMP_ID comp_id","COMP_NAME comp_name");
		 
		$product['socdtls']    = $this->DrcrnoteModel->f_select('mm_ferti_soc',$select,NULL,0);
		
		$product['compdtls']   = $this->DrcrnoteModel->f_select('mm_company_dtls',$select1,NULL,0);

		$product['catg']   = $this->DrcrnoteModel->f_select('mm_cr_note_category',NULL,NULL,0);
		$product['cr_dtls']    = $this->DrcrnoteModel->f_select('tdf_dr_cr_note',NULL,$where3,1);

		    // $product['dr_dtls']    = $this->DrcrnoteModel->f_select('tdf_dr_cr_note a,mm_cr_note_category b ',$select3,$where,0);
			// echo $this->db->last_query();
			// exit();
			$product['dr_dtls']     = $this->DrcrnoteModel->f_get_particulars("tdf_dr_cr_note", NULL, $where3,0);
			
				// echo $this->db->last_query();
				// exit();
			$select_cr = array(
				"count(ro)as cr_cnt"
			);	
			$where_cr = array(
				"invoice_no"	=> $this->input->get('invoice_no') ,
				"trans_flag"    =>'A'
		);
			$product['cr_cnt']= $this->DrcrnoteModel->f_select("tdf_dr_cr_note",$select_cr,$where_cr,0);
// echo $this->db->last_query();
// die();
	        $this->load->view('post_login/fertilizer_main');

	        $this->load->view("dr_note/edit_yearly",$product);

	        $this->load->view('post_login/footer');
        }

    }


	public function yearlydrnoteAdd(){

		$branch  = $this->session->userdata['loggedin']['branch_id'];
		$finYr          = $this->session->userdata['loggedin']['fin_id'];
		$fin_year       = $this->session->userdata['loggedin']['fin_yr'];
		$select         = array("dist_sort_code");
		$where          = array("district_code"     =>  $branch);
		$brn            = $this->DrcrnoteModel->f_select("md_district",$select,$where,1); 
		$transNo        = $this->DrcrnoteModel->get_trans_no($this->session->userdata['loggedin']['fin_id']);
		$receipt        = 'YRLY_Crnote/'.$brn->dist_sort_code.'/'.$fin_year.'/'.$transNo->trans_no;
	 
		
	 if($_SERVER['REQUEST_METHOD'] == "POST") {

		$soc_id    = $this->input->post('soc_id');
		$tot_amt   = $this->input->post('tot_amt');
		$tot_cramt = 0.00;

		for($i = 0; $i < count($tot_amt); $i++){
			
			$data  = array (
				'recpt_no' => $receipt ,
				
				'soc_id'      => $this->input->post('soc_id'),

				'trans_dt'    =>  $this->input->post('trans_dt'),

				"trans_no"	  =>  $transNo->trans_no,

				"comp_id"	  => $this->input->post('comp_id'),	
				
				"invoice_no"  => $this->input->post('ref_invoice_no'),

				"year"        => $this->input->post('year'),
				
				'ref_invoice_no' => $this->input->post('ref_invoice_no'),

				"ro"           => '',	
				
				'catg'         => $_POST['cat_id'][$i],

				'tot_amt'      => $_POST['tot_amt'][$i],

				'branch_id'   => $this->session->userdata['loggedin']['branch_id'],

				"remarks"     => $this->input->post('remarks'),

				"note_type"	  => 'D',

				"fin_yr"      => $this->session->userdata['loggedin']['fin_id'],
				
				'created_by'  => $this->session->userdata['loggedin']['user_name'],

				'created_dt'  =>  date('Y-m-d h:i:s'),

				'created_ip'  =>  $_SERVER['REMOTE_ADDR']

			);
		
	        $tot_cramt += $_POST['tot_amt'][$i];

		$select_cracc         = array("acc_cd");
		$where_cracc          = array(
			"sl_no"     => $_POST['cat_id'][$i]
		);

         $cr_acc = $this->DrcrnoteModel->f_select("mm_cr_note_category",$select_cracc,$where_cracc,1);

			$data_array_cr=$data;
			$data_array_cr['acc_cd'] = $cr_acc->acc_cd; 
			
			$select_soc         = array("soc_name","acc_cd");
			$where_soc           = array("soc_id"     => $soc_id);
			$soc_name = $this->DrcrnoteModel->f_select("mm_ferti_soc",$select_soc,$where_soc,1);
				$data_array_crt['soc_acc']= $soc_name->acc_cd;
			$data_array_cr['rem'] ="Credit Note raised for ".$soc_name->soc_name." aginst Invoice No. ". $this->input->post('ref_invoice_no').",".$this->input->post('remarks');

			$select_br    = array("dist_sort_code");
			$where_br     = array("district_code"=> $branch );
		

			$data_array_cr['fin_fulyr']=$fin_year;
			$data_array_cr['br_nm']= $brn->dist_sort_code;
			if($this->DrcrnoteModel->f_crnjnl($data_array_cr)!=0){
				$this->DrcrnoteModel->f_insert('tdf_dr_cr_note', $data);
			}else{
				echo "<script>alert('Credit Note has not yet been done.');</script>";
			}
			
        }
		$data_cr  = array (
		'recpt_no' => $receipt ,
		
		'soc_id'      => $this->input->post('soc_id'),

		'trans_dt'    =>  $this->input->post('trans_dt'),

		"trans_no"	  =>  $transNo->trans_no,

		"comp_id"	  => $this->input->post('comp_id'),	
		
		"invoice_no"  => $this->input->post('ref_invoice_no'),	

		"ro"           => '',	

		'tot_amt'      => $tot_cramt,

		'branch_id'   => $this->session->userdata['loggedin']['branch_id'],

		"remarks"     => $this->input->post('remarks'),

		"note_type"	  => 'D',

		"fin_yr"      => $this->session->userdata['loggedin']['fin_id'],
		
		'created_by'  => $this->session->userdata['loggedin']['user_name'],

		'created_dt'  =>  date('Y-m-d h:i:s'));

		$data_array_crt       =$data_cr;
		$select_soc           = array("acc_cd");
		$where_soc            = array("soc_id"     => $soc_id);
		$soc_acc_cd             = $this->DrcrnoteModel->f_select("mm_ferti_soc",$select_soc,$where_soc,1);

        $data_array_crt['acc_cd'] = $soc_acc_cd->acc_cd;

		unset($select_soc);   
		unset($where_soc);      

		$select_soc           = array("soc_name");
		$where_soc            = array("soc_id"     => $soc_id);
		$soc_name             = $this->DrcrnoteModel->f_select("mm_ferti_soc",$select_soc,$where_soc,1);

        $data_array_crt['rem'] = "YRLY Credit Note raised for ".$soc_name->soc_name." aginst Invoice No. ". $this->input->post('ref_invoice_no').",".$this->input->post('remarks');

			$select_br    = array("dist_sort_code");
			$where_br     = array("district_code"=> $branch );
		

			$data_array_crt['fin_fulyr']=$fin_year;
			$data_array_crt['br_nm']= $brn->dist_sort_code;
			$this->DrcrnoteModel->f_totcrnjnl( $data_array_crt);
			
			$this->session->set_flashdata('msg', 'Successfully Added');

			redirect('drcrnote/yearlydr_note');
		
		   
			
	    }else {

			$wheres = array(

			"district" => $this->session->userdata['loggedin']['branch_id']
				
			);

			$select1   = array("soc_id","soc_name","soc_add","gstin");

			$product['socdtls']   = $this->DrcrnoteModel->f_select('mm_ferti_soc',$select1,$wheres,0);

			$select = array("COMP_ID comp_id","COMP_NAME comp_name");

			$product['compdtls']   = $this->DrcrnoteModel->f_select('mm_company_dtls',$select,NULL,0);

			$select_cat = array("sl_no","cat_desc");
			$wherecatagory=array("acc_cd >"=>0);

			$product['catdtls']   = $this->DrcrnoteModel->f_select('mm_cr_note_category',$select_cat,$wherecatagory,0);

			$product['mntend']= $this->PurchaseModel->f_get_mnthend($branch );
			$product['years'] = $this->DrcrnoteModel->f_select('md_fin_year',array('sl_no','fin_yr'),NULL,0);

			$product['date']   = $this->PurchaseModel->get_monthendDate();

			$this->load->view('post_login/fertilizer_main');
		
			$this->load->view("dr_note/add_yearly",$product);
		
			$this->load->view('post_login/footer');
        }

     }
	public function yearlydr_note(){
		if($_SERVER['REQUEST_METHOD'] == "POST") {
			$from_date=$this->input->post('from_date');
			$to_date=$this->input->post('to_date');
			$select	=	array("a.br_adj_flag","b.soc_name","a.recpt_no","(select  nwirn from td_sale_cancel where trans_do=a.invoice_no) as irn",
				"a.trans_dt","a.trans_no","a.soc_id","a.comp_id","sum(a.tot_amt)tot_amt","a.trans_flag","a.invoice_no","a.fwd_flag",
				"b.soc_name","c.COMP_NAME","(select count(paid_id) from tdf_payment_recv where sale_invoice_no=a.invoice_no and pay_type=6) as pay_cnt"
			
			);

			$where	=	array(

				"a.soc_id = b.soc_id"	=>	NULL,

				"a.comp_id = c.COMP_ID"	=>	NULL,

				"a.trans_flag"			=>	'R',

				"a.note_type"			=>	'D',
				"a.recpt_no LIKE"       => "%YRLY_Crnote%",
				
				"a.branch_id"			=>	$this->session->userdata['loggedin']['branch_id'],
				
				"a.trans_dt BETWEEN '".$from_date."' AND '".$to_date."' group by  a.invoice_no,a.recpt_no ORDER BY a.trans_dt"			=>	NULL
			);
		//a.fin_yr='".$this->session->userdata['loggedin']['fin_id']."'
		
		   $data['dr_notes']    = $this->DrcrnoteModel->f_select("tdf_dr_cr_note a,mm_ferti_soc b,mm_company_dtls c ",$select,$where,0);
		
			$this->load->view("post_login/fertilizer_main");
	
			$this->load->view("dr_note/yearlydashboard",$data);
	
			$this->load->view('search/search');
	
			$this->load->view('post_login/footer');
	    }else{
		
			$select	=	array("a.br_adj_flag","b.soc_name","a.recpt_no","(select  nwirn from td_sale_cancel where trans_do=a.invoice_no) as irn",
				"a.trans_dt","a.trans_no","a.soc_id","a.comp_id","sum(a.tot_amt)tot_amt","a.trans_flag","a.invoice_no","a.fwd_flag",
				"b.soc_name","c.COMP_NAME","(select count(paid_id) from tdf_payment_recv where sale_invoice_no=a.invoice_no and pay_type=6) as pay_cnt"
			
			);

			$where	=	array(

				"a.soc_id = b.soc_id"	=>	NULL,
				"a.comp_id = c.COMP_ID"	=>	NULL,
				"a.trans_flag"			=>	'R',
				"a.note_type"			=>	'D',
				"a.recpt_no LIKE"       => "%YRLY_Crnote%",
				"a.branch_id"			=>	$this->session->userdata['loggedin']['branch_id'],
				"a.trans_dt BETWEEN '".date('Y-m-d')."' AND '".date('Y-m-d')."' group by  a.invoice_no ORDER BY a.trans_dt"			=>	NULL,

			);
		
		   $data['dr_notes']    = $this->DrcrnoteModel->f_select("tdf_dr_cr_note a,mm_ferti_soc b,mm_company_dtls c ",$select,$where,0);
		// echo $this->db->last_query();
		// exit();
			$this->load->view("post_login/fertilizer_main");
	
			$this->load->view("dr_note/yearlydashboard",$data);
	
			$this->load->view('search/search');
	
			$this->load->view('post_login/footer');
	    }
	}

	public function f_get_payro(){
		$br_cd      = $this->session->userdata['loggedin']['branch_id'];
		$soc_id = $this->input->POST('soc_id');
	
		$payro    = $this->Society_paymentModel->f_getdo_dtl($br_cd ,$soc_id);
		// $payro    = $this->Society_paymentModel->f_getdo_dtl(333 ,1227);
	

		echo json_encode($payro);
	
	}
	//*******DR note Edit for branch****** */

	public function drnote_editbr(){

		if($_SERVER['REQUEST_METHOD'] == "POST") {
			$tot_amt = $this->input->post('tot_amt');
							
						
			$data    = array(

						

						// 'remarks'       => $this->input->post('remarks'),

						// 'soc_id'        => $this->input->post('soc_id'),

						// 'comp_id'       => $this->input->post('comp_id'),

						// 'invoice_no'    => $this->input->post('inv_no'),

						//  'ro'           => $this->input->post('ro_no'),
						 
						// 'catg'          => $this->input->post('cat_id'),
						

						'modified_by'   => $this->session->userdata['loggedin']['user_name'],

						'modified_dt'   =>  date('Y-m-d'),

						'modified_ip'   =>  $_SERVER['REMOTE_ADDR']

						);

			$where3  =   array(

				'invoice_no'     => $this->input->post('inv_no'),
				'trans_type'     =>'R'

		   );
			
            $this->DrcrnoteModel->f_edit('drnote_br', $data, $where3);
			// echo $this->db->last_query();
			// die();

		$this->session->set_flashdata('msg', 'Successfully Updated');

			redirect('drcrnote/dr_note');
			
            
		}else {


			$where1 = array(
				"soc_id"=> $this->input->get('soc_id'),
		);
			$select        = array("soc_id soc_id","soc_name soc_name");

			$select1       = array("COMP_ID comp_id","COMP_NAME comp_name");

			$select3       =array("a.trans_dt",
									"a.trans_no",
									"a.comp_id",
									"a.invoice_no",
									"a.ro",
									"a.recpt_no",
									"a.soc_id",
									"a.frm_date",
									"a.to_date",
									"a.tot_amt",
									"a.remarks",
									"a.pay_flag");
									
									$where_cr =array(
									"id" => $this->input->get('id'));
			 
			$product['socdtls']    = $this->DrcrnoteModel->f_select('mm_ferti_soc',$select,NULL,0);
			
			$product['compdtls']   = $this->DrcrnoteModel->f_select('mm_company_dtls',$select1,NULL,0);

			$product['dr_dtls']     = $this->DrcrnoteModel->f_get_particulars("drnote_br", NULL, $where_cr,0);
				
			$select_cr = array(
				"count(ro)as cr_cnt"
			);	

			$where_cr = array(
				"id"	=> $this->input->get('id'));
			$product['cr_cnt']= $this->DrcrnoteModel->f_select("drnote_br",$select_cr,$where_cr,0);
// echo $this->db->last_query();
// die();
	        $this->load->view('post_login/fertilizer_main');

	        $this->load->view("dr_note_br/edit",$product);

	        $this->load->view('post_login/footer');
        }

    }

	//*********DR note for branch add *********/
	public function drnoteAdd_br(){
		$branch  = $this->session->userdata['loggedin']['branch_id'];
	$finYr          = $this->session->userdata['loggedin']['fin_id'];
	$fin_year       = $this->session->userdata['loggedin']['fin_yr'];
	$select         = array("dist_sort_code");
	$where          = array("district_code"     =>  $branch);
	$brn           = $this->DrcrnoteModel->f_select("md_district",$select,$where,1); 

 $transNo         = $this->DrcrnoteModel->get_trans_no_forbr($this->session->userdata['loggedin']['fin_id']);

 $receipt         = 'Drnote/'.$brn->dist_sort_code.'/'.$fin_year.'/'.$transNo->trans_no;
 
	
 if($_SERVER['REQUEST_METHOD'] == "POST") {

	$soc_id    = $this->input->post('soc_id');
	$tot_amt   = $this->input->post('tot_amt');
	$tot_cramt = 0.00;

	
	  $data  = array (
		'recpt_no' => $receipt ,
		  
		'soc_id'      => $this->input->post('soc_id'),

		'trans_dt'    =>  $this->input->post('trans_dt'),

		"trans_no"	  =>  $transNo->trans_no,

		"comp_id"	  => $this->input->post('comp_id'),	
		
		"ro"           => $this->input->post('ro_no'),	
		
		"tot_amt"      => $this->input->post('tot_amt'),

		'branch_id'   => $this->session->userdata['loggedin']['branch_id'],

		"remarks"     => $this->input->post('remarks'),

		"fin_yr"      => $this->session->userdata['loggedin']['fin_id'],
		
		'created_by'  => $this->session->userdata['loggedin']['user_name'],

		'created_dt'  =>  date('Y-m-d h:i:s'),

		"created_ip"   =>  $_SERVER['REMOTE_ADDR']

	);


		$data_array_cr=$data;
		// $data_array_cr['acc_cd'] = $cr_acc->acc_cd; 
		
		$select_soc         = array("soc_name","acc_cd");
		$where_soc           = array("soc_id"     => $soc_id);
		$soc_name = $this->DrcrnoteModel->f_select("mm_ferti_soc",$select_soc,$where_soc,1);
		// $data_array_crt['soc_acc']= $soc_name->acc_cd;
		$data_array_cr['rem'] ="Debit Note raised for ".$soc_name->soc_name." aginst Invoice No. ". $this->input->post('inv_no').",".$this->input->post('remarks');

		$select_br    = array("dist_sort_code");
		$where_br     = array("district_code"=> $branch );
	

		$data_array_cr['fin_fulyr']=$fin_year;
		$data_array_cr['br_nm']= $brn->dist_sort_code;
	
$data_cr  = array (
'recpt_no' => $receipt ,
  
'soc_id'      => $this->input->post('soc_id'),

'trans_dt'    =>  $this->input->post('trans_dt'),

"trans_no"	  =>  $transNo->trans_no,

"comp_id"	  => $this->input->post('comp_id'),	

"invoice_no"  => $this->input->post('inv_no'),	

"ro"           => $this->input->post('ro_no'),	

"tot_amt"     => $this->input->post('tot_amt'),

'branch_id'   => $this->session->userdata['loggedin']['branch_id'],

"remarks"     => $this->input->post('remarks'),

"fin_yr"      => $this->session->userdata['loggedin']['fin_id'],

'created_by'  => $this->session->userdata['loggedin']['user_name'],

'created_dt'  =>  date('Y-m-d h:i:s'));

$data_array_crt       =$data_cr;

// $select_soc           = array("acc_cd");
$where_soc            = array("soc_id"     => $soc_id);
// $soc_acc_cd             = $this->DrcrnoteModel->f_select("mm_ferti_soc",$select_soc,$where_soc,1);

// $data_array_crt['acc_cd'] = $soc_acc_cd->acc_cd;

// unset($select_soc);   
// unset($where_soc);      

$select_soc           = array("soc_name");
$where_soc            = array("soc_id"     => $soc_id);
$soc_name             = $this->DrcrnoteModel->f_select("mm_ferti_soc",$select_soc,$where_soc,1);

$data_array_crt['rem'] = "Credit Note raised for ".$soc_name->soc_name." aginst Invoice No. ". $this->input->post('inv_no').",".$this->input->post('remarks');

		$select_br    = array("dist_sort_code");
		$where_br     = array("district_code"=> $branch );
	

		$data_array_crt['fin_fulyr']=$fin_year;
		$data_array_crt['br_nm']= $brn->dist_sort_code;
		// $this->DrcrnoteModel->f_totcrnjnl( $data_array_crt);
		 $this->DrcrnoteModel->f_insert('drnote_br', $data_cr);
		// die();
		$this->session->set_flashdata('msg', 'Successfully Added');

		redirect('drcrnote/dr_note_br');
	
	   
		
}else {

		$wheres = array(

		"district" => $this->session->userdata['loggedin']['branch_id']
			
		);

		$select1   = array("soc_id","soc_name","soc_add","gstin");

		$product['socdtls']   = $this->DrcrnoteModel->f_select('mm_ferti_soc',$select1,$wheres,0);

		$select = array("COMP_ID comp_id","COMP_NAME comp_name");

		$product['compdtls']   = $this->DrcrnoteModel->f_select('mm_company_dtls',$select,NULL,0);

		// $select_cat = array("sl_no","cat_desc");
		// $wherecatagory=array("acc_cd >"=>0);

		// $product['catdtls']   = $this->DrcrnoteModel->f_select('mm_cr_note_category',$select_cat,$wherecatagory,0);

		$select = array("trans_do");
		$whereinv=array(
			"soc_id" =>$this->input->get("soc_id")
			) ;
		$product['saleinv']   = $this->DrcrnoteModel->f_select('td_sale',$select,$whereinv,0);
		$product['mntend']= $this->PurchaseModel->f_get_mnthend($branch );
		$product['years'] = $this->DrcrnoteModel->f_select('md_fin_year',array('sl_no','fin_yr'),NULL,0);

		$product['date']   = $this->PurchaseModel->get_monthendDate();

		$this->load->view('post_login/fertilizer_main');
	
		$this->load->view("dr_note_br/add",$product);
	
		$this->load->view('post_login/footer');
}

}
//********************view Dr note for branch ******* */
public function dr_note_br(){
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		$from_date=$this->input->post('from_date');
		$to_date=$this->input->post('to_date');
		$select	=	array('a.*',"b.soc_name");

		$where	=	array(

			"a.soc_id = b.soc_id"	=>	NULL,
			 "a.branch_id"			=>	$this->session->userdata['loggedin']['branch_id'],
			
			"a.trans_dt BETWEEN '".$from_date."' AND '".$to_date."'ORDER BY a.trans_dt"=>	NULL
		);
	
	
	   $data['dr_notes']    = $this->DrcrnoteModel->f_select("drnote_br a,mm_ferti_soc b ",$select,$where,0);

		$this->load->view("post_login/fertilizer_main");

		$this->load->view("dr_note_br/dashboard",$data);

		$this->load->view('search/search');

		$this->load->view('post_login/footer');
	}else{ 
	
	$select	=	array('a.*',"b.soc_name");

	$where	=	array(

		"a.soc_id = b.soc_id"	=>	NULL,
		"a.branch_id"			=>	$this->session->userdata['loggedin']['branch_id'],
		"a.trans_dt BETWEEN '".date('Y-m-d')."' AND '".date('Y-m-d')."' ORDER BY a.trans_dt"=>	NULL
		
	);
	
	$data['dr_notes']    = $this->DrcrnoteModel->f_select("drnote_br a,mm_ferti_soc b",$select,$where,0);

	$this->load->view("post_login/fertilizer_main");

	$this->load->view("dr_note_br/dashboard",$data);

	$this->load->view('search/search');

	$this->load->view('post_login/footer');

	}
}

public function f_get_drnote_rcptdtl(){
	$trans_do=$this->input->get("trans_do");
	
	$comp    = $this->DrcrnoteModel->f_get_drnote_recpdtls($trans_do);
	
	 echo json_encode($comp);
 
 }

public function f_get_drnoterecpt(){
	$br_cd      = $this->session->userdata['loggedin']['branch_id'];
	$soc_id = $this->input->get('soc_id');

	$payro    = $this->DrcrnoteModel->f_getdrnotebr_dtl($br_cd ,$soc_id);

    echo json_encode($payro);

}
//***debit note adj add for branch */
public function dr_noteadj_bradd(){
	if($_SERVER['REQUEST_METHOD'] == "POST") {

		$data    = array(

					// 'tot_amt'       => $this->input->post('tot_amt'),
					'tot_amt'       =>$_POST['paid_amt'][0],

					'remarks'       => $this->input->post('remarks'),

					// 'comp_id'       => $this->input->post('comp_id'),

					'pay_flg'       =>'Y',

					'pay_type'       => $_POST['pay_type'][0],

					'adjusted_by'   => $this->session->userdata['loggedin']['user_name'],

					'adjusted_dt'   =>  date('Y-m-d h:i:s'),

					);

		   $where  =   array(

			 'recpt_no'     => $this->input->post('trans_do')

		);

		$this->DrcrnoteModel->f_edit('drnote_br', $data, $where);

		// echo $this->db->last_query();
		// die();			
		$this->session->set_flashdata('msg', 'Successfully Updated');

		redirect('drcrnote/dr_noteadj_br');
		
		
	}else {


		$where = array(

			'recpt_no'     => $this->input->post('trans_do')
		);

		$select        = array("soc_id","soc_name","soc_add","gstin");

		$select1       = array("COMP_ID comp_id","COMP_NAME comp_name");
		 
		$product['socdtls']    = $this->DrcrnoteModel->f_select('mm_ferti_soc',$select,NULL,0);
		
		$product['compdtls']   = $this->DrcrnoteModel->f_select('mm_company_dtls',$select1,NULL,0);

		
		$product['cr_dtls']    = $this->DrcrnoteModel->f_select('drnote_br',NULL,$where,1);

	$this->load->view('post_login/fertilizer_main');
		
			$this->load->view("dr_noteadj_br/add",$product);
		
			$this->load->view('post_login/footer');
	}

}



///*******//////// */


//****debit note adjustment for branch ***** */

public function dr_noteadj_br(){
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		$from_date=$this->input->post('from_date');
		$to_date=$this->input->post('to_date');
		$select	=	array('a.*',"b.soc_name");

		$where	=	array(

			"a.soc_id = b.soc_id"	=>	NULL,
			"a.pay_flg" => 'Y',
			 "a.branch_id"			=>	$this->session->userdata['loggedin']['branch_id'],
			
			"a.adjusted_dt BETWEEN '".$from_date."' AND '".$to_date."'ORDER BY a.trans_dt"=>	NULL
		);
	
	
	   $data['dr_notes']    = $this->DrcrnoteModel->f_select("drnote_br a,mm_ferti_soc b ",$select,$where,0);

		$this->load->view("post_login/fertilizer_main");

		$this->load->view("dr_noteadj_br/dashboard",$data);

		$this->load->view('search/search');

		$this->load->view('post_login/footer');
	}else{ 
	
	$select	=	array('a.*',"b.soc_name");

	$where	=	array(

		"a.soc_id = b.soc_id"	=>	NULL,
		"a.pay_flg" => 'Y',
		"a.branch_id"			=>	$this->session->userdata['loggedin']['branch_id'],
		"a.adjusted_dt BETWEEN '".date('Y-m-d')."' AND '".date('Y-m-d')."' ORDER BY a.adjusted_dt"=>	NULL
		
	);
	
	$data['dr_notes']    = $this->DrcrnoteModel->f_select("drnote_br a,mm_ferti_soc b",$select,$where,0);

	// echo $this->db->last_query();
	// exit();
	$this->load->view("post_login/fertilizer_main");

	$this->load->view("dr_noteadj_br/dashboard",$data);

	$this->load->view('search/search');

	$this->load->view('post_login/footer');

	}
}


///**************************** */
    // *************  Dashboard    DR NOTE TCS   DEVELOPED ON 16/05/2023   BY LOKESH KUMAR JHA     ********** //
	public function dr_note_tcs(){
		if($_SERVER['REQUEST_METHOD'] == "POST") {
			$from_date=$this->input->post('from_date');
			$to_date=$this->input->post('to_date');
			$select	=	array('a.*',"b.soc_name");

			$where	=	array(

				"a.soc_id = b.soc_id"	=>	NULL,
			     "a.branch_id"			=>	$this->session->userdata['loggedin']['branch_id'],
				
				"a.trans_dt BETWEEN '".$from_date."' AND '".$to_date."'ORDER BY a.trans_dt"=>	NULL
			);
		
		
		   $data['dr_notes']    = $this->DrcrnoteModel->f_select("drnote_tcs a,mm_ferti_soc b ",$select,$where,0);
	
			$this->load->view("post_login/fertilizer_main");
	
			$this->load->view("dr_note_tcs/dashboard",$data);
	
			$this->load->view('search/search');
	
			$this->load->view('post_login/footer');
		}else{
		
		$select	=	array('a.*',"b.soc_name");

		$where	=	array(

			"a.soc_id = b.soc_id"	=>	NULL,
			"a.branch_id"			=>	$this->session->userdata['loggedin']['branch_id'],
			"a.trans_dt BETWEEN '".date('Y-m-d')."' AND '".date('Y-m-d')."' ORDER BY a.trans_dt"=>	NULL
			
		);
		
		$data['dr_notes']    = $this->DrcrnoteModel->f_select("drnote_tcs a,mm_ferti_soc b",$select,$where,0);
	
		$this->load->view("post_login/fertilizer_main");
   
		$this->load->view("dr_note_tcs/dashboard",$data);
   
		$this->load->view('search/search');
   
		$this->load->view('post_login/footer');

	    }
	}

	// *************  add DR NOTE TCS   DEVELOPED ON 16/05/2023   BY LOKESH KUMAR JHA     ********** //
	public function drnoteAdd_tcs(){

		$branch  = $this->session->userdata['loggedin']['branch_id'];
		$finYr          = $this->session->userdata['loggedin']['fin_id'];
		$fin_year       = $this->session->userdata['loggedin']['fin_yr'];
		$select         = array("dist_sort_code");
		$where          = array("district_code"     =>  $branch);
		$brn           = $this->DrcrnoteModel->f_select("md_district",$select,$where,1); 
	    $transNo         = $this->DrcrnoteModel->get_trans_no_fortcs($this->session->userdata['loggedin']['fin_id']);
	    $receipt         = 'TCS/'.$brn->dist_sort_code.'/'.$fin_year.'/'.$transNo->trans_no;
	 
		
	    if($_SERVER['REQUEST_METHOD'] == "POST") {

			$soc_id    = $this->input->post('soc_id');
			$tot_amt   = $this->input->post('tot_amt');
			$tot_cramt = 0.00;
			if($this->session->userdata['loggedin']['fin_id'] > 4){
				$transdate  = date('Y-m-d');
			}else{
				$transdate  = '2024-03-31';
			}
			 
			$data  = array (
				
				'trans_dt'    =>  $transdate,
				'trans_no'    => $transNo->trans_no,
				'recpt_no'    => $receipt,
				'soc_id'      => $this->input->post('soc_id'),
				'frm_date'      => $this->input->post('frm_date'),
				'to_date'      => $this->input->post('to_date'),
				'tot_amt'      => $this->input->post('tot_amt'),

				'branch_id'   => $this->session->userdata['loggedin']['branch_id'],

				"remarks"     => $this->input->post('remarks'),

				"fin_yr"      => $this->session->userdata['loggedin']['fin_id'],
				
				'created_by'  => $this->session->userdata['loggedin']['user_name'],

				'created_dt'  =>  date('Y-m-d h:i:s'),

				"created_ip"   =>  $_SERVER['REMOTE_ADDR']

			);
			$tot_cramt = $this->input->post('tot_amt');

			$select_cracc         = array("acc_cd");
		
			   $cr_acc = $this->DrcrnoteModel->f_select_finance("md_achead",array("sl_no"),
			   array("mngr_id"=>3,'subgr_id'=>292,'br_id'=>$this->session->userdata['loggedin']['branch_id']),1);

				$data_array_cr=$data;
				$data_array_cr['acc_cd'] = $cr_acc->sl_no; 
				
				$select_soc         = array("soc_name","acc_cd");
				$where_soc           = array("soc_id"     => $soc_id);
				$soc_name = $this->DrcrnoteModel->f_select("mm_ferti_soc",$select_soc,$where_soc,1);
				$data_array_crt['soc_acc']= $soc_name->acc_cd;
				$data_array_cr['dr_acc_cd'] =$soc_name->acc_cd;
				$data_array_cr['rem'] ="TCS of ".$soc_name->soc_name." aginst ".$this->input->post('remarks');
				
				$select_br    = array("dist_sort_code");
				$where_br     = array("district_code"=> $branch);

				$data_array_cr['fin_fulyr']=$fin_year;
				$data_array_cr['br_nm']= $brn->dist_sort_code;
				
				if($this->DrcrnoteModel->f_drnote_tcs_crnjnl($data_array_cr)!=0){
					$this->DrcrnoteModel->f_insert('drnote_tcs', $data);
				}else{
					echo "<script>alert('Debit Note TCS has not yet been done.');</script>";
				}
			
			$this->session->set_flashdata('msg', 'Successfully Added');
			redirect('drcrnote/dr_note_tcs');
			
		}else {

				$wheres = array("district" => $this->session->userdata['loggedin']['branch_id']);
				$select1   = array("soc_id","soc_name","soc_add","gstin");

				$product['socdtls']   = $this->DrcrnoteModel->f_select('mm_ferti_soc',$select1,$wheres,0);
				$select = array("COMP_ID comp_id","COMP_NAME comp_name");
				$product['compdtls']   = $this->DrcrnoteModel->f_select('mm_company_dtls',$select,NULL,0);

				$select_cat = array("sl_no","cat_desc");
				$wherecatagory=array("acc_cd >"=>0);

				$product['catdtls']   = $this->DrcrnoteModel->f_select('mm_cr_note_category',$select_cat,$wherecatagory,0);

				$select = array("trans_do");
				$whereinv=array("soc_id" => $this->input->get("soc_id"));

				$product['saleinv'] = $this->DrcrnoteModel->f_select('td_sale',$select,$whereinv,0);
				$product['mntend']  = $this->PurchaseModel->f_get_mnthend($branch);
				$product['years']   = $this->DrcrnoteModel->f_select('md_fin_year',array('sl_no','fin_yr'),NULL,0);
				$product['date']    = $this->PurchaseModel->get_monthendDate();

				$this->load->view('post_login/fertilizer_main');
				$this->load->view("dr_note_tcs/add",$product);
				$this->load->view('post_login/footer');
		}

	}
	public function drnotetcs_edit(){

			$data['tcs']  = $this->DrcrnoteModel->f_select('drnote_tcs',NULL,array("id" => $this->input->get('id')),1);
			$wheres = array("district" => $this->session->userdata['loggedin']['branch_id']);
			$select1   = array("soc_id","soc_name","soc_add","gstin");
			$data['socdtls']   = $this->DrcrnoteModel->f_select('mm_ferti_soc',$select1,$wheres,0);

	        $this->load->view('post_login/fertilizer_main');
	        $this->load->view("dr_note_tcs/edit",$data);
	        $this->load->view('post_login/footer');


    }
	public function drnotetcs_recipt(){

		$data['tcs']  = $this->DrcrnoteModel->f_select('drnote_tcs',NULL,array("id" => $this->input->get('id')),1);
		$wheres = array("district" => $this->session->userdata['loggedin']['branch_id']);
		$select1   = array("soc_id","soc_name","soc_add","gstin");
		$data['socdtls']   = $this->DrcrnoteModel->f_select('mm_ferti_soc',$select1,$wheres,0);

		$this->load->view('post_login/fertilizer_main');
		$this->load->view("dr_note_tcs/receipt",$data);
		$this->load->view('post_login/footer');


}


}
