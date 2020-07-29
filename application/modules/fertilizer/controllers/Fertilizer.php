<?php
	class Fertilizer extends MX_Controller{

		protected $sysdate;

		protected $kms_year;

		public function __construct(){

			parent::__construct();	

			$this->load->model('FertilizerModel');
			
			$this->session->userdata('fin_yr');
		}
		

/****************************************************Society Master************************************ */

//Dashboard
public function soceity(){

	$select	=	array("soc_id","soc_name");

	$where  =	array("district" => $this->session->userdata['loggedin']['branch_id']);

	$bank['data']    = $this->FertilizerModel->f_select('mm_ferti_soc',$select,$where,0);

	$this->load->view("post_login/fertilizer_main");

	$this->load->view("soceity/dashboard",$bank);

	$this->load->view('search/search');

	$this->load->view('post_login/footer');
}

// Add Soceity
public function soceityAdd(){

	if($_SERVER['REQUEST_METHOD'] == "POST") {

			$soc_id 	 = $this->FertilizerModel->get_soceity_code();
			
			$stock_point = $this->input->post('stock_point_flag');

			$buffer		 = $this->input->post('buffer_flag');

			$data_array = array (

					"soc_id" 			=> $soc_id,
			
					"soc_name" 			=> $this->input->post('soc_name'),

					"soc_add"   		=> $this->input->post('soc_add'),

					"gstin"				=> $this->input->post('gstin'),

					"mfms" 				=> $this->input->post('mfms'),

					"district"  		=> $this->session->userdata['loggedin']['branch_id'],
					
					"ph_no"    			=> $this->input->post('ph_no'),

					"email" 			=> $this->input->post('email'),
				
					"stock_point_flag"  => $this->input->post('stock_point_flag'),

					"buffer_flag"    	=> $this->input->post('buffer_flag'),
		   
					"status"          	=> $this->input->post('status'),
					
					"created_by"    	=> $this->session->userdata['loggedin']['user_name'],    

					"created_dt"    	=>  date('Y-m-d h:i:s')
				);

				$this->FertilizerModel->f_insert('mm_ferti_soc', $data_array);
	
				$this->session->set_flashdata('msg', 'Successfully Added');

				redirect('customer');

			}else {

				$select          		= array("district_code","district_name");

				$district['distdtls']   = $this->FertilizerModel->f_select('md_district',$select,NULL,0);
					
				$this->load->view('post_login/fertilizer_main');

				$this->load->view("soceity/add",$district);

				$this->load->view('post_login/footer');
			}
}

//Edit Soceity
public function editsoceity(){

	if($_SERVER['REQUEST_METHOD'] == "POST") {

		$data_array = array(

				"soc_id"     			=>  $this->input->post('soc_id'),

				"soc_name"   			=>  $this->input->post('soc_name'),

				"soc_add"    			=>  $this->input->post('soc_add'),

				"gstin"					=> $this->input->post('gstin'),

				"mfms" 					=> $this->input->post('mfms'),
				
				"email"         		=>  $this->input->post('email'),

				"ph_no"        			=>  $this->input->post('ph_no'),
				 
				"stock_point_flag"      =>  $this->input->post('stock_point_flag'),
 
				"buffer_flag"      		=>  $this->input->post('buffer_flag'),

				"status"   				=>  $this->input->post('status'),

				"modified_by"  			=>  $this->session->userdata['loggedin']['user_name'],

				"modified_dt"  			=>  date('Y-m-d h:i:s')	
			);

		$where = array(
				"soc_id" => $this->input->post('soc_id')
		);
		 

		$this->FertilizerModel->f_edit('mm_ferti_soc', $data_array, $where);

		$this->session->set_flashdata('msg', 'Successfully Updated');

		redirect('customer');

	}else{
			$select = array(
						"soc_id",

						"soc_name",

						"soc_add",
					
						"gstin",
					
						"mfms",
					
						"district",
					
						"email",
					
						"ph_no",
					
						"stock_point_flag" ,
					
						"buffer_flag" ,
					
						"status"                                  
				);

			$where = array(

				"soc_id" => $this->input->get('soc_id')
				
				);

		$sch['schdtls'] = $this->FertilizerModel->f_select("mm_ferti_soc",$select,$where,1);
																															
		$this->load->view('post_login/fertilizer_main');

		$this->load->view("soceity/edit",$sch);

		$this->load->view("post_login/footer");
	}
}

//*********************************************Unit Master*********************************************************/

//Dashboard
public function unit(){
	$select         = array("id","unit_name");

	$bank['data']   = $this->FertilizerModel->f_select('mm_unit',$select,NULL,0);

	$this->load->view("post_login/fertilizer_main");

	$this->load->view("unit/dashboard",$bank);

	$this->load->view('search/search');

	$this->load->view('post_login/footer');
}

//Add Unit
public function unitAdd(){

	if($_SERVER['REQUEST_METHOD'] == "POST") {

		$data_array = array (

				"unit_name" 	=> $this->input->post('unit_name'),
			
				"created_by"    =>  $this->session->userdata['loggedin']['user_name'],

				"created_dt"    =>  date('Y-m-d h:i:s')
			);
			
			$this->FertilizerModel->f_insert('mm_unit', $data_array);
				
			$this->session->set_flashdata('msg', 'Successfully Added');

			redirect('measurement');
	}else 
	
		{
					
			$this->load->view('post_login/fertilizer_main');

			$this->load->view("unit/add");

			$this->load->view('post_login/footer');
	}
}
		
//Edit Unit		
public function editunit(){

	if($_SERVER['REQUEST_METHOD'] == "POST") {

		$data_array = array(

				"id"     		=>  $this->input->post('id'),

				"unit_name"    =>  $this->input->post('unit_name'),

				"modified_by"  =>  $this->session->userdata['loggedin']['user_name'],

				"modified_dt"  =>  date('Y-m-d h:i:s')
		);

		$where = array(
				"id" => $this->input->post('id')
		);
			

		$this->FertilizerModel->f_edit('mm_unit', $data_array, $where);

		$this->session->set_flashdata('msg', 'Successfully Updated');

		redirect('measurement');

	}else

	{
			$select = array(
					"id",

					"unit_name"                           
			);

			$where = array(

				"id" => $this->input->get('id')

				);

			$sch['schdtls'] = $this->FertilizerModel->f_select("mm_unit",$select,$where,1);
																															
			$this->load->view('post_login/fertilizer_main');

			$this->load->view("unit/edit",$sch);

			$this->load->view("post_login/footer");
	}
}
		
/***********************Company Master***************************************/

//Dashboard
public function company(){

	$select         = array("comp_id","comp_name","comp_add","gst_no");

	$bank['data']   = $this->FertilizerModel->f_select('mm_company_dtls',$select,NULL,0);

	$this->load->view("post_login/fertilizer_main");

	$this->load->view("company/dashboard",$bank);

	$this->load->view('search/search');

	$this->load->view('post_login/footer');
}

//Add New Company
public function companyAdd(){

	if($_SERVER['REQUEST_METHOD'] == "POST") {

		    $comp_id 	= $this->FertilizerModel->get_company_code();
			
			$data_array = array (

					"comp_id" 			=> $comp_id,
			
					"comp_name" 		=> $this->input->post('comp_name'),

					"short_name" 		=> $this->input->post('short_name'),
					
					"comp_add"   		=> $this->input->post('comp_add'),

					"comp_email_id" 	=> $this->input->post('comp_email_id'),

					"comp_pn_no"    	=> $this->input->post('comp_pn_no'),
					
					"pan_no"    		=> $this->input->post('pan_no'),

					"gst_no" 			=> $this->input->post('gst_no'),

					"mfms"				=> $this->input->post('mfms'),

					"cin"				=> $this->input->post('cin'),
				
					"created_by"    	=>  $this->session->userdata['loggedin']['user_name'],

					"created_dt"    	=>  date('Y-m-d h:i:s')
				);
			 
				$this->FertilizerModel->f_insert('mm_company_dtls', $data_array);
				 
				$this->session->set_flashdata('msg', 'Successfully Added');

				redirect('source');
	}else 
		{
					
			$this->load->view('post_login/fertilizer_main');

			$this->load->view("company/add");

			$this->load->view('post_login/footer');
	}
}

//Edit Company
public function editcompany(){

	if($_SERVER['REQUEST_METHOD'] == "POST") {

		$data_array = array(

				"comp_id"     		=>  $this->input->post('comp_id'),

				"comp_name"   		=>  $this->input->post('comp_name'),

				"short_name"  		=>  $this->input->post('short_name'),

				"comp_add"    		=>  $this->input->post('comp_add'),

				"comp_email_id" 	=>  $this->input->post('comp_email_id'),

				"comp_pn_no"  	 	=>  $this->input->post('comp_pn_no'),
				 
				"gst_no"      		=>  $this->input->post('gst_no'),

				"mfms" 				=>  $this->input->post('mfms'),

				"pan_no"    		=>  $this->input->post('pan_no'),

				"cin" 				=>  $this->input->post('cin'),

				"modified_by"  		=>  $this->session->userdata['loggedin']['user_name'],

				"modified_dt"  		=>  date('Y-m-d h:i:s')
		);

		$where = array(
				"comp_id" => $this->input->post('comp_id')
		);
		 

		$this->FertilizerModel->f_edit('mm_company_dtls', $data_array, $where);

		$this->session->set_flashdata('msg', 'Successfully Updated');

		redirect('source');

	}else{
			$select = array(
					"comp_id",

					"comp_name",

					"short_name",

					"comp_add",

					"comp_email_id",

					"comp_pn_no",

					"gst_no"  ,

					"mfms"  ,

					"pan_no",

					"cin"                                
				);

			$where = array(
				"comp_id" => $this->input->get('comp_id')
				);

		$sch['schdtls'] = $this->FertilizerModel->f_select("mm_company_dtls",$select,$where,1);
																															
		$this->load->view('post_login/fertilizer_main');

		$this->load->view("company/edit",$sch);

		$this->load->view("post_login/footer");
	}
}

/*************************************************Product Master*********************************************** */

//Dashboard
public function product(){
	$select 		= array("prod_id","prod_desc","prod_type","gst_rt","qty_per_bag");

	$bank['data']   = $this->FertilizerModel->f_select('mm_product',$select,NULL,0);

	$this->load->view("post_login/fertilizer_main");

	$this->load->view("product/dashboard",$bank);

	$this->load->view('search/search');

	$this->load->view('post_login/footer');
}

//Add New Product		
public function productAdd(){

		if($_SERVER['REQUEST_METHOD'] == "POST") {

				$prod_id   = $this->FertilizerModel->get_product_code();

				$data_array = array (

						"prod_id"    			=> $prod_id,
				
						"prod_desc"   			=> $this->input->post('prod_desc'),

						"prod_type"   			=> $this->input->post('prod_type'),

						'company'     			=> $this->input->post('comp_id'),

						"gst_rt"       			=> $this->input->post('gst_rt'),

						"hsn_code"     			=> $this->input->post('hsn_code'),

						"qty_per_bag"  			=> $this->input->post('bag'),

						"created_by"   	 		=>  $this->session->userdata['loggedin']['user_name'],

						"created_dt"    		=>  date('Y-m-d h:i:s')
					);
				 
				$this->FertilizerModel->f_insert('mm_product', $data_array);
				
				$this->session->set_flashdata('msg', 'Successfully Added');

				redirect('material');
		}else {

				$select          		= array("comp_id","comp_name");

				$product['compdtls']    = $this->FertilizerModel->f_select('mm_company_dtls',$select,NULL,0);
				
				$this->load->view('post_login/fertilizer_main');

				$this->load->view("product/add",$product);

				$this->load->view('post_login/footer');
		}
}

//Edit Product
public function editproduct(){

	if($_SERVER['REQUEST_METHOD'] == "POST") {

		$data_array = array(

				"prod_id"     =>  $this->input->post('prod_id'),

				"prod_desc"   =>  $this->input->post('prod_desc'),
				
				"prod_type"   =>  $this->input->post('prod_type'),

				"gst_rt"      =>  $this->input->post('gst_rt'),

				"hsn_code"    =>  $this->input->post('hsn_code'),

				"qty_per_bag"  =>  $this->input->post('bag'),
			   
				"modified_by"  =>  $this->session->userdata['loggedin']['user_name'],

				"modified_dt"  =>  date('Y-m-d h:i:s')
		);

		$where = array(
				"prod_id" => $this->input->post('prod_id')
		);
		 

		$this->FertilizerModel->f_edit('mm_product', $data_array, $where);

		$this->session->set_flashdata('msg', 'Successfully Updated');

		redirect('material');

	}else{
			$select = array(

					"a.prod_id",

					"a.prod_desc",
					
					"a.prod_type" ,
					
					"a.gst_rt",
					
					"a.hsn_code"  ,
					
					"a.qty_per_bag",
					
					"b.comp_name"  
				);

			$where = array(
				"a.prod_id" => $this->input->get('prod_id'),

				"a.company=b.comp_id"=>NULL

				);

			$sch['schdtls'] = $this->FertilizerModel->f_select("mm_product a,mm_company_dtls b",$select,$where,1);

		
			$this->load->view('post_login/fertilizer_main');

			$this->load->view("product/edit",$sch);

			$this->load->view("post_login/footer");
	}
}

/*
public function sale_rate(){
	$select = array("a.district","d.district_name","a.frm_dt","a.to_dt","a.rate","b.comp_name","a.comp_id","c.prod_desc","a.prod_id");

	$where      =   array(

		"a.comp_id = b.comp_id"  => NULL,
		"a.prod_id= c.prod_id"=>NULL,
	    "a.district=d.district_code"=>NULL	);
		   
		// $ro   = $this->FertilizerModel->f_select('td_purchase a,mm_company_dtls b',$select,$where,0);
	$bank['data']   = $this->FertilizerModel->f_select('mm_sale_rate a,mm_company_dtls b,mm_product c,md_district d',$select,$where,0);
//   echo $this->db->last_query();
// / die();
	$this->load->view("post_login/fertilizer_main");

	$this->load->view("sale_rate/dashboard",$bank);

	$this->load->view('search/search');

	$this->load->view('post_login/footer');
}
public function salerateAdd(){

	if($_SERVER['REQUEST_METHOD'] == "POST") {

		   $prod_id    = $this->input->post('prod_id');
		   $comp_id = $this->input->post('comp_id');
		   $district = $this->input->post('district');
		   $rate = $this->input->post('rate');
		   $frm_dt = $this->input->post('frm_dt');
		   $to_dt = $this->input->post('to_dt');
			// $prod_desc = $this->input->post('prod_desc');
			// $prod_type = $this->input->post('prod_type');
			// $gst_rt    = $this->input->post('gst_rt');
			// $hsn_code  = $this->input->post('hsn_code');
			// $unit      = $this->input->post('unit');
			$data_array = array (

					"prod_id" => $prod_id,
			
					"comp_id" => $comp_id,

					"district" => $district,
					
					"rate" =>  $rate,

					"frm_dt" =>  $frm_dt,

					"to_dt" =>  $to_dt,

					"created_by"    =>  $this->session->userdata['loggedin']['user_name'],

					"created_dt"    =>  date('Y-m-d h:i:s'));
			 
				$this->FertilizerModel->f_insert('mm_sale_rate', $data_array);
				// echo $this->db->last_query();
				// die();
				$this->session->set_flashdata('msg', 'Successfully Added');

					redirect('fertilizer/sale_rate');
			}else {
				$select1          = array("comp_id","comp_name");
				$product['compdtls']   = $this->FertilizerModel->f_select('mm_company_dtls',$select1,NULL,0);
				
				$select2          = array("prod_id","prod_desc");
				$product['proddtls']   = $this->FertilizerModel->f_select('mm_product',$select2,NULL,0);
				// echo $this->db->last_query();
				// die();
				$select3         = array("district_code","district_name");
				$product['distdtls']   = $this->FertilizerModel->f_select('md_district',$select3,NULL,0);
	$this->load->view('post_login/fertilizer_main');

	$this->load->view("sale_rate/add",$product);

	$this->load->view('post_login/footer');
}
}

public function editsalerate(){

	if($_SERVER['REQUEST_METHOD'] == "POST") {

		$data_array = array(

				"prod_id"     =>  $this->input->post('prod_id'),

				"comp_id"   =>  $this->input->post('comp_id'),
				
				"district"   =>$this->input->post('district'),

				"frm_dt"      =>  $this->input->post('frm_dt'),

				"to_dt"    =>  $this->input->post('to_dt'),

				"rate"     =>  $this->input->post('rate'),
			   
				// "modified_by"  =>  $this->session->userdata['loggedin']['user_name'],

				"modified_dt"  =>  date('Y-m-d h:i:s')
		);

		$where = array(
				"district" => $this->input->post('district'),
				"prod_id"     =>  $this->input->post('prod_id'),
				"comp_id"   =>  $this->input->post('comp_id'),
				"frm_dt"      =>  $this->input->post('frm_dt'),
				"to_dt"    =>  $this->input->post('to_dt')

				
		);
		 

		$this->FertilizerModel->f_edit('mm_sale_rate', $data_array, $where);
		  $this->db->last_query();
		  die();
		$this->session->set_flashdata('msg', 'Successfully Updated');

		redirect('fertilizer/sale_rate');

	}else{
			$select = array(
					"a.prod_id",
					"a.comp_id",
					"a.district" ,
					"a.frm_dt",
					"a.to_dt"  ,
					"a.rate",
					"b.prod_desc",
					"c.comp_name" ,
				"d.district_name" 
				);

			$where = array(
				"a.prod_id" => $this->input->get('prod_id'),
				"a.comp_id" =>  $this->input->get('comp_id'),
				"a.frm_dt" =>  $this->input->get('frm_dt'),
				"a.to_dt" =>  $this->input->get('to_dt'),
				"a.district" =>  $this->input->get('district'),
				"a.prod_id=b.prod_id"=>NULL,
				"a.comp_id=c.comp_id"=>NULL,
				"a.district=d.district_code" =>NULL
				);

				// $select1 = array("a.id","a.unit_name");
				// $where1 = array(
				// 	"a.id = b.unit"    => NULL,
				// 	"b.prod_id" => $this->input->get('prod_id'));
			
		// $sch['compdtls']   = $this->FertilizerModel->f_select('mm_company_dtls',$select1,NULL,0);	
		$sch['schdtls'] = $this->FertilizerModel->f_select("mm_sale_rate a,mm_product b,mm_company_dtls c,md_district d",$select,$where,1);
		// echo $this->db->last_query();
		// die();
		// $sch['unitdtls'] = $this->FertilizerModel->f_select("mm_unit a,mm_product b",$select1,$where1,1);		
		// echo $this->db->last_query();
		// die();

		$this->load->view('post_login/fertilizer_main');

		$this->load->view("sale_rate/edit",$sch);

		$this->load->view("post_login/footer");
	}
}*/

	
}
?>
