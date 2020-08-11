<?php
	class Drcrnote extends MX_Controller{
		protected $sysdate;
		protected $fin_year;
		public function __construct(){
		parent::__construct();	
		$this->load->model('DrcrnoteModel');
		$this->load->helper('paddyrate_helper');
		}

/******************************************Debit Note For Customer ********************************************/		

//Dashboard
		public function dr_note(){
		 
			$select	=	array(
				"a.trans_dt","a.trans_no","a.soc_id","a.comp_id","a.tot_amt","a.trans_flag",
				"b.soc_name","c.COMP_NAME"
			);

			$where	=	array(

				"a.soc_id = b.soc_id"	=>	NULL,

				"a.comp_id = c.COMP_ID"	=>	NULL,

				"a.trans_flag"			=>	'R',

				"a.note_type"			=>	'D',

				"a.branch_id"			=>	$this->session->userdata['loggedin']['branch_id'],

				"a.fin_yr"				=>	$this->session->userdata['loggedin']['fin_id']

			);
		    
		   	$data['dr_notes']    = $this->DrcrnoteModel->f_select("tdf_dr_cr_note a,mm_ferti_soc b,mm_company_dtls c",$select,$where,0);
		   
			$this->load->view("post_login/fertilizer_main");
	   
		    $this->load->view("dr_note/dashboard",$data);
	   
		    $this->load->view('search/search');
	   
		    $this->load->view('post_login/footer');
	    }

 

//ADD
	public function drnoteAdd(){

			if($_SERVER['REQUEST_METHOD'] == "POST") {

			   $transNo = $this->DrcrnoteModel->get_trans_no($this->session->userdata['loggedin']['fin_id']);
					
	           $data  = array (
					'soc_id'      => $this->input->post('soc_id'),

					'trans_dt'    =>  $this->input->post('trans_dt'),

					"trans_no"	  =>  $transNo->trans_no,

					'tot_amt'     => $this->input->post('tot_amt'),

					"comp_id"	  => $this->input->post('comp_id'),		

					'branch_id'   => $this->session->userdata['loggedin']['branch_id'],

					"remarks"     => $this->input->post('remarks'),

					"note_type"	  => 'D',

					"fin_yr"      => $this->session->userdata['loggedin']['fin_id'],
					
					'created_by'  => $this->session->userdata['loggedin']['user_name'],

					'created_dt'  =>  date('Y-m-d h:i:s')

				);
							
					$this->DrcrnoteModel->f_insert('tdf_dr_cr_note', $data);
							
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
		
					$this->load->view('post_login/fertilizer_main');
				
					$this->load->view("dr_note/add",$product);
				
					$this->load->view('post_login/footer');
	   }
	
	}

//edit
    public function drnote_edit(){

		if($_SERVER['REQUEST_METHOD'] == "POST") {

			$data    = array(

						'tot_amt'       => $this->input->post('tot_amt'),

						'remarks'       => $this->input->post('remarks'),

						'soc_id'        => $this->input->post('soc_id'),

						'comp_id'       => $this->input->post('comp_id'),

						'modified_by'   => $this->session->userdata['loggedin']['user_name'],

						'modified_dt'   =>  date('Y-m-d'),

						);

		   	$where  =   array(

                 'trans_dt'     => $this->input->post('trans_dt'),

                 'trans_no'   	=> $this->input->post('trans_no'),

            );

            $this->DrcrnoteModel->f_edit('tdf_dr_cr_note', $data, $where);

							
			$this->session->set_flashdata('msg', 'Successfully Updated');

			redirect('drcrnote/dr_note');
			
            
		}else {


            $where = array(

              	"trans_dt" => $this->input->get('trans_dt'),
                    
                "trans_no" => $this->input->get('trans_no')
            );

			$select        = array("soc_id","soc_name","soc_add","gstin");

			$select1       = array("COMP_ID comp_id","COMP_NAME comp_name");
			 
			$product['socdtls']    = $this->DrcrnoteModel->f_select('mm_ferti_soc',$select,NULL,0);
			
			$product['compdtls']   = $this->DrcrnoteModel->f_select('mm_company_dtls',$select1,NULL,0);


			$product['dr_dtls']    = $this->DrcrnoteModel->f_select('tdf_dr_cr_note',NULL,$where,1);

		
	        $this->load->view('post_login/fertilizer_main');

	        $this->load->view("dr_note/edit",$product);

	        $this->load->view('post_login/footer');
        }

    }

//delete
	public function deletedr_note() {

		$where  =   array(

					"trans_dt" => $this->input->get('trans_dt'),
					
					"trans_no" => $this->input->get('trans_no')
			);

		$this->DrcrnoteModel->f_delete('tdf_dr_cr_note', $where);

		$this->session->set_flashdata('msg', 'Successfully Deleted!');

		redirect('drcrnote/dr_note');

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

						'modified_by'   => $this->session->userdata['loggedin']['user_name'],

						'modified_dt'   =>  date('Y-m-d h:i:s'),

						);

		   	$where  =   array(

                 'trans_dt'     => $this->input->post('trans_dt'),

                 'trans_no'   	=> $this->input->post('trans_no'),

            );

            $this->DrcrnoteModel->f_edit('tdf_dr_cr_note', $data, $where);

							
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


			$product['cr_dtls']    = $this->DrcrnoteModel->f_select('tdf_dr_cr_note',NULL,$where,1);

		
	        $this->load->view('post_login/fertilizer_main');

	        $this->load->view("cr_note/edit",$product);

	        $this->load->view('post_login/footer');
        }

    }


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

}
?>
