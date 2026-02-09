<?php
class Purchase extends MX_Controller
{
	protected $sysdate;
	protected $kms_year;
	public function __construct()
	{
		parent::__construct();
		$this->db2 = $this->load->database('findb', TRUE);
		$this->load->model('PurchaseModel');
		$this->load->model('ApiVoucher');
		// $this->load->helper('paddyrate_helper');

		$this->session->userdata('kms_yr');

		if (!isset($this->session->userdata['loggedin']['user_id'])) {

			redirect('User_Login/login');
		}
	}
	// public function hello()
    // {
    //     echo "Hello method working";
    // }
	public function dr_note()
	{
		$this->sysdate  = $_SESSION['sys_date'];
		$data['dr_notes']    = $this->FertilizerModel->f_get_drnote_dtls();
		$this->load->view("post_login/fertilizer_main");

		$this->load->view("dr_note/dashboard", $data);

		$this->load->view('search/search');

		$this->load->view('post_login/footer');
	}
	//     Add DR note code written by Lokesh kumar jha 09/04/2020"
	public function drnoteAdd()
	{

		if ($_SERVER['REQUEST_METHOD'] == "POST") {


			$soc_amt = $this->input->post('soc_amt');

			for ($i = 0; $i < count($soc_amt); $i++) {

				$data     = array(

					'ro_no'        => $this->input->post('ro_no'),

					'ro_dt'      => $this->input->post('ro_dt'),

					'invoice_no' => $this->input->post('invoice_no'),

					'invoice_dt' => $this->input->post('invoice_dt'),

					'trans_dt'   =>  date('Y-m-d'),

					'tot_amt'    => $this->input->post('tot_amt'),

					'comp_id'    => $this->input->post('comp_id'),

					'soc_id'     => $_POST['soc_id'][$i],

					'soc_amt'    => $_POST['soc_amt'][$i],

					"created_by"  =>  $this->session->userdata['loggedin']['user_name'],

					"created_dt"  =>  date('Y-m-d'),

					'branch_id'   => $this->session->userdata['loggedin']['branch_id']


				);

				$this->FertilizerModel->f_insert('td_dr_note', $data);
			}

			$this->session->set_flashdata('msg', 'Successfully Added');

			redirect('fertilizer/dr_note');
		} else {

			$select4        = array("id", "branch_name");
			$product['brdtls']   = $this->FertilizerModel->f_select('md_branch', $select4, NULL, 0);

			$select3         = array("comp_id", "comp_name");
			$product['compdtls']   = $this->FertilizerModel->f_select('mm_company_dtls', $select3, NULL, 0);


			$select1          = array("soc_id", "soc_name", "soc_add", "gstin");
			$product['socdtls']   = $this->FertilizerModel->f_select('mm_ferti_soc', $select1, NULL, 0);

			$branch_id  = $this->session->userdata['loggedin']['branch_id'];
			$product['ro_dtls']   = $this->FertilizerModel->f_getdo_dtl($branch_id);

			$this->load->view('post_login/fertilizer_main');

			$this->load->view("dr_note/add", $product);

			$this->load->view('post_login/footer');
		}
	}

	//     edit DR note code written by Lokesh kumar jha 09/04/2020"
	public function drnote_edit()
	{


		if ($_SERVER['REQUEST_METHOD'] == "POST") {


			$soc_amt = $this->input->post('soc_amt');



			for ($i = 0; $i < count($soc_amt); $i++) {

				$data     = array(

					'comp_id'     => $this->input->post('comp_id'),

					'ro_no'      => $this->input->post('ro_no'),

					'ro_dt'        => $this->input->post('ro_dt'),

					'invoice_no'   => $this->input->post('invoice_no'),

					'invoice_dt'   => $this->input->post('invoice_dt'),

					'tot_amt'  => $this->input->post('tot_amt'),


					'soc_id'   => $_POST['soc_id'][$i],

					'soc_amt'    => $_POST['soc_amt'][$i]

				);

				$where  =   array(

					'soc_id'   => $_POST['soc_id'][$i],

					'comp_id'     => $this->input->post('comp_id'),

					'ro_no'      => $this->input->post('ro_no'),

				);

				$this->FertilizerModel->f_edit('td_dr_note', $data, $where);
			}

			$this->session->set_flashdata('msg', 'Successfully Updated');

			redirect('fertilizer/dr_note');
		} else {


			$where = array(

				"comp_id" => explode("/", $this->input->get('trans_do'))["0"],

				"ro_no" => explode("/", $this->input->get('trans_do'))["1"]
			);

			$select          = array("soc_id", "soc_name", "soc_add", "gstin");
			$product['socdtls']   = $this->FertilizerModel->f_select('mm_ferti_soc', $select, NULL, 0);

			$select1  = array("comp_id", "comp_name");
			$product['compdtls']   = $this->FertilizerModel->f_select('mm_company_dtls', $select1, NULL, 0);

			$product['cr_detals']   = $this->FertilizerModel->f_select('td_dr_note', NULL, $where, 0);
			$branch_id  = $this->session->userdata['loggedin']['branch_id'];
			$product['ro_dtls']   = $this->FertilizerModel->f_getdo_dtl($branch_id);

			$this->load->view('post_login/fertilizer_main');

			$this->load->view("dr_note/edit", $product);

			$this->load->view('post_login/footer');
		}
	}

	//     edit DR note code written by Lokesh kumar jha 11/04/2020"
	public function do_detail()
	{

		$select = array("a.do_dt", "a.invoice_no", "a.comp_id", "a.invoice_dt", "a.tot_cr_amt", "b.COMP_NAME", "b.GST_NO");

		$where      =   array(

			"a.comp_id = b.COMP_ID"  => NULL,

			"a.do_no" => $this->input->get("do_no")

		);

		$comp   = $this->FertilizerModel->f_select('td_cr_note a,mm_company_dtls b', $select, $where, 1);

		echo json_encode($comp);
	}


	public function cr_note()
	{


		$data['credit_notes']   = $this->FertilizerModel->credit_amt();
		$this->load->view("post_login/fertilizer_main");

		$this->load->view("cr_note/dashboard", $data);

		$this->load->view('search/search');

		$this->load->view('post_login/footer');
	}
	//     Add cr note code written by Lokesh kumar jha 08/04/2020"
	public function crnoteAdd()
	{

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$comp_id = $this->input->post('comp_id');

			$do_no = $this->input->post('do_no');

			$do_dt = $this->input->post('do_dt');

			$invoice_no = $this->input->post('invoice_no');

			$invoice_dt = $this->input->post('invoice_dt');


			$br_amt = $this->input->post('br_amt');

			$tot_cr_amt = $this->input->post('tot_cr_amt');

			for ($i = 0; $i < count($br_amt); $i++) {

				$data     = array(
					'comp_id'     => $this->input->post('comp_id'),

					'do_no'        => $this->input->post('do_no'),

					'do_dt'        => $this->input->post('do_dt'),

					'invoice_no'   => $this->input->post('invoice_no'),

					'invoice_dt'   => $this->input->post('invoice_dt'),

					'tot_cr_amt'  => $this->input->post('tot_cr_amt'),

					'branch_id'   => $_POST['branch_id'][$i],

					'br_amt'      => $_POST['br_amt'][$i],

					"created_by"  =>  $this->session->userdata['loggedin']['user_name'],

					"created_dt"  =>  date('Y-m-d h:i:s')

				);

				$this->FertilizerModel->f_insert('td_cr_note', $data);
			}

			$this->session->set_flashdata('msg', 'Successfully Added');

			redirect('fertilizer/cr_note');
		} else {

			$select4        = array("id", "branch_name");
			$product['brdtls']   = $this->FertilizerModel->f_select('md_branch', $select4, NULL, 0);

			$select3         = array("comp_id", "comp_name");
			$product['compdtls']   = $this->FertilizerModel->f_select('mm_company_dtls', $select3, NULL, 0);


			$select1          = array("soc_id", "soc_name", "soc_add", "gstin");
			$product['socdtls']   = $this->FertilizerModel->f_select('mm_ferti_soc', $select1, NULL, 0);

			$select          = array("prod_id", "prod_desc", "gst_rt");
			$product['proddtls']   = $this->FertilizerModel->f_select('mm_product', $select, NULL, 0);

			$this->load->view('post_login/fertilizer_main');

			$this->load->view("cr_note/add", $product);

			$this->load->view('post_login/footer');
		}
	}

	//     edit cr note code written by Lokesh kumar jha 08/04/2020"
	public function crnote_edit()
	{


		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$br_amt = $this->input->post('br_amt');

			for ($i = 0; $i < count($br_amt); $i++) {

				$data     = array(
					'comp_id'     => $this->input->post('comp_id'),

					'do_no'        => $this->input->post('do_no'),

					'do_dt'        => $this->input->post('do_dt'),

					'invoice_no'   => $this->input->post('invoice_no'),

					'invoice_dt'   => $this->input->post('invoice_dt'),

					'tot_cr_amt'  => $this->input->post('tot_cr_amt'),

					'branch_id'   => $_POST['branch_id'][$i],

					'br_amt'      => $_POST['br_amt'][$i]

					//             "modified_by"  =>  $this->session->userdata['loggedin']['user_name'],

					// "modified_dt"    =>  date('Y-m-d h:i:s'),

				);

				$where  =   array(

					'branch_id'   => $_POST['branch_id'][$i],

					'comp_id'     => $this->input->post('comp_id'),

					'do_no'      => $this->input->post('do_no'),

				);

				$this->FertilizerModel->f_edit('td_cr_note', $data, $where);
			}

			$this->session->set_flashdata('msg', 'Successfully Updated');

			redirect('fertilizer/cr_note');
		} else {


			$where = array(

				"comp_id" => explode("/", $this->input->get('trans_do'))["0"],

				"do_no" => explode("/", $this->input->get('trans_do'))["1"]
			);

			$select  = array("id", "branch_name");
			$product['brdtls']   = $this->FertilizerModel->f_select('md_branch', $select, NULL, 0);

			$select1  = array("comp_id", "comp_name");
			$product['compdtls']   = $this->FertilizerModel->f_select('mm_company_dtls', $select1, NULL, 0);

			$product['cr_detals']   = $this->FertilizerModel->f_select('td_cr_note', NULL, $where, 0);


			$this->load->view('post_login/fertilizer_main');

			$this->load->view("cr_note/edit", $product);

			$this->load->view('post_login/footer');
		}
	}
	//     delete cr note code written by Lokesh kumar jha 08/04/2020"
	public function deletecr_note()
	{

		$where  =   array(

			"comp_id" => explode("/", $this->input->get('trans_do'))["0"],

			"do_no" => explode("/", $this->input->get('trans_do'))["1"]

		);



		$this->FertilizerModel->f_delete('td_cr_note', $where);

		$this->session->set_flashdata('msg', 'Successfully Deleted!');

		redirect('fertilizer/cr_note');
	}


	public function js_get_stock_qty()
	{

		$ro = $this->input->get('ro');
		// var_dump($ro);die;
		$result = $this->FertilizerModel->js_get_stock_qty($ro);

		echo json_encode($result);
	}

	public function sale()
	{
		$br_cd      = $this->session->userdata['loggedin']['branch_id'];
		$fin_id = $this->session->userdata['loggedin']['fin_id'];

		$bank['data']    = $this->FertilizerModel->f_get_sales_dtls($br_cd, $fin_id);
		// 		echo $this->db->last_query();
		// die();
		$this->load->view("post_login/fertilizer_main");

		$this->load->view("sale/dashboard", $bank);

		$this->load->view('search/search');

		$this->load->view('post_login/footer');
	}
	//***************************************f_select*

	// addsale code written by Lokesh kumar jha 31/03/2020"
	public function saleAdd()
	{

		$br_cd      = $this->session->userdata['loggedin']['branch_id'];
		$dist_sort_code    = $this->session->userdata['loggedin']['dist_sort_code'];
		$fin_year_sort_code = substr($this->session->userdata['loggedin']['fin_yr'], 2);
		$fin_id = $this->session->userdata['loggedin']['fin_id'];
		$trans_no = $this->FertilizerModel->get_trans_no($fin_id, $br_cd);

		// echo $fin_year_sort_code;
		// die();
		// echo $this->db->last_query();
		// die();
		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$prod_id = $this->input->post('prod_id');

			$qty = $this->input->post('qty');

			$sale_rt = $this->input->post('sale_rt');

			$taxable_amt = $this->input->post('taxable_amt');

			$cgst = $this->input->post('cgst');

			$sgst = $this->input->post('sgst');

			$tot_amt = $this->input->post('tot_amt');

			$br_cd      = $this->session->userdata['loggedin']['branch_name'];
			// echo ($prod_id);
			//    die();
			for ($i = 0; $i < count($prod_id); $i++) {

				$data     = array(
					'trans_do' =>  'SRO/' . $dist_sort_code . '/' . $fin_year_sort_code . '/' . $trans_no->trans_no,

					'trans_no'  =>  $trans_no->trans_no,

					'do_dt'        => $this->input->post('ro_dt'),

					'sale_due_dt'  => $this->input->post('sale_due_dt'),

					'trans_type'   => $this->input->post('trans_type'),

					'soc_id'       => $this->input->post('soc_id'),

					'comp_id'      => $this->input->post('comp_id'),

					'sale_ro'      => $_POST['ro'][$i],

					'prod_id'      => $_POST['prod_id'][$i],

					'qty'          => $_POST['qty'][$i],

					'sale_rt'      => $_POST['sale_rt'][$i],

					'taxable_amt'  => $_POST['taxable_amt'][$i],

					'cgst'         => $_POST['cgst'][$i],

					'sgst'        => $_POST['sgst'][$i],

					'dis'        => $_POST['dis'][$i],

					'tot_amt'     => $_POST['tot_amt'][$i],

					"created_by"    =>  $this->session->userdata['loggedin']['user_name'],

					"created_dt"    =>  date('Y-m-d h:i:s'),

					"br_cd"     => $this->session->userdata['loggedin']['branch_id'],

					"fin_yr"    => $fin_id
				);



				$this->FertilizerModel->f_insert('td_sale', $data);
			}

			$this->session->set_flashdata('msg', 'Successfully Added');

			redirect('fertilizer/sale');
		} else {
			$select3          = array("comp_id", "comp_name");
			$product['compdtls']   = $this->FertilizerModel->f_select('mm_company_dtls', $select3, NULL, 0);

			// $where  =   array(

			// 	'comp_id'     => $this->input->post('comp_id'));
			$select2         = array("ro_no", "qty");
			$where  =   array(

				'br'     => $br_cd
			);

			$product['rodtls']   = $this->FertilizerModel->f_select('td_purchase', $select2, $where, 0);
			// echo $this->db->last_query();
			// die();
			$select1          = array("soc_id", "soc_name", "soc_add", "gstin");
			$where1  =   array(

				'district'     => $br_cd
			);
			$product['socdtls']   = $this->FertilizerModel->f_select('mm_ferti_soc', $select1, $where1, 0);

			$select          = array("prod_id", "prod_desc", "gst_rt");
			$product['proddtls']   = $this->FertilizerModel->f_select('mm_product', $select, NULL, 0);

			$this->load->view('post_login/fertilizer_main');

			$this->load->view("sale/add", $product);

			$this->load->view('post_login/footer');
		}
	}




	//     addsale code written by Lokesh kumar jha 03/04/2020"
	public function saleedit()
	{


		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$prod_id = $this->input->post('prod_id');


			for ($i = 0; $i < count($prod_id); $i++) {

				$data     = array(
					'do_dt'        => $this->input->post('ro_dt'),

					'sale_due_dt'  => $this->input->post('sale_due_dt'),
					'comp_id'  => $this->input->post('comp_id'),
					'sale_ro'      => $_POST['ro'][$i],

					'prod_id'      => $_POST['prod_id'][$i],

					'qty'          => $_POST['qty'][$i],

					'sale_rt'      => $_POST['sale_rt'][$i],

					'taxable_amt'  => $_POST['taxable_amt'][$i],

					'gst_rt'        => $_POST['gst_rt'][$i],

					'cgst'         => $_POST['cgst'][$i],

					'sgst'        => $_POST['sgst'][$i],

					'tot_amt'     => $_POST['tot_amt'][$i],

					"modified_by"  =>  $this->session->userdata['loggedin']['user_name'],

					"modified_dt"    =>  date('Y-m-d h:i:s'),

				);

				$where  =   array(

					'trans_do'     => $this->input->post('trans_do'),

					'sale_ro'      => $_POST['ro'][$i]

				);

				$this->FertilizerModel->f_edit('td_sale', $data, $where);
			}

			$this->session->set_flashdata('msg', 'Successfully Updated');

			redirect('fertilizer/sale');
		} else {
			// $comp_id	= $this->input->post('comp_id');
			// echo $comp_id;
			// die();
			$select3        = array("comp_id", "comp_name");
			$product['compdtls']   = $this->FertilizerModel->f_select('mm_company_dtls', $select3, NULL, 0);

			$where  =   array(

				'comp_id'     => $this->input->get('comp_id')
			);

			$select2         = array("ro_no", "qty");

			$product['rodtls']   = $this->FertilizerModel->f_select('td_purchase', $select2, NULL, 0);
			// echo $this->db->last_query();
			// die();
			$select1          = array("soc_id", "soc_name", "soc_add", "gstin");
			$product['socdtls']   = $this->FertilizerModel->f_select('mm_ferti_soc', $select1, NULL, 0);

			$select          = array("prod_id", "prod_desc", "gst_rt");
			$product['proddtls']   = $this->FertilizerModel->f_select('mm_product', $select, NULL, 0);
			$product['prod_dtls']  = $this->FertilizerModel->f_get_particulars("td_sale", NULL, array("trans_do" => $this->input->get('trans_do')), 0);
			//    echo $this->db->last_query();
			//    die();
			$this->load->view('post_login/fertilizer_main');

			$this->load->view("sale/edits", $product);

			$this->load->view('post_login/footer');
		}
	}

	public function deletesale()
	{

		$where = array(
			"trans_do"    =>  $this->input->get('trans_do')


		);
		$this->FertilizerModel->f_delete('td_sale', $where);

		$this->session->set_flashdata('msg', 'Successfully Deleted!');

		redirect("fertilizer/fertilizer/sale");
	}
	public function editshortage(){

		if($_SERVER['REQUEST_METHOD'] == "POST") {
	
			$data_array = array(
				    "trans_cd"     => $this->input->post('trans_cd'),

					"trans_dt"     => $this->input->post('trans_dt'),
	
					"remarks" 		=> $this->input->post('remarks'),
	
					"modified_ip"   =>  $_SERVER['REMOTE_ADDR'],
					
					"modifed_by"  	=>  $this->session->userdata['loggedin']['user_name'],
				   
					"modifed_dt"  	=>  date('Y-m-d h:i:s')	
				);
	
			$where = array("trans_cd" =>  $this->input->post('trans_cd'));
			 	
			$this->PurchaseModel->f_edit('td_pur_shortage', $data_array, $where);
	
			$this->session->set_flashdata('msg', 'Successfully Updated');
	
			redirect('stock/shortage_entry');
	
		}else{
				$select = array("trans_cd",

							"trans_dt",
	
							"ro_no",
	
							"ro_dt",
						
							"comp_id",

							"prod_id",
	
							"trans_flag",
							
							"taxable_amt",

							"cgst",

							"sgst",
							
							"rate" ,

							"qty",
							
							"remarks"                    
					);
	
				$where = array(
	
					"receipt_no" => $this->input->get('rcpt')
					
					);
				// $select2          		= array("sl_no","bank_name");
				$where2 = array(
					"dist_cd"  =>  $this->session->userdata['loggedin']['branch_id']
				);    
								
				$data['shortageDtls']        = $this->PurchaseModel->f_get_shortage_dtls($this->input->get('trans_cd'));
				// print_r($data['advDtls']);
				// exit();
	
				$selectcompany      = array("comp_id","comp_name");
				$data['compdtls']   = $this->PurchaseModel->f_select('mm_company_dtls',$selectcompany,NULL,0);
				$this->load->view('post_login/fertilizer_main');
	
				$this->load->view("shortage/edit",$data);
	
				$this->load->view("post_login/footer");
		}
	}
	

	public function deleteshortage()
	{

		$where = array(
			"trans_cd"    =>  $this->input->get('trans_cd')
			

		);
		
		$this->PurchaseModel->f_delete('td_pur_shortage', $where);
			

		redirect("stock/shortage_entry");
	}


	//***************************/
	public function f_get_ro()
	{

		$ro_no = $this->input->get('ro_no');

		$data = $this->PurchaseModel->f_get_ro_dtls($ro_no);
		// echo $this->db->last_query();
		// die();
		echo json_encode($data);
	}

	public function deleteinvoice()
	{

		$where = array(
			"ro"    =>  $this->input->get('ro_no')


		);
		$this->FertilizerModel->f_delete('td_invoice_entry', $where);

		$this->session->set_flashdata('msg', 'Successfully Deleted!');

		redirect("fertilizer/fertilizer/invoice_entry");
	}

	//****************************view invoice entry *//

	public function viewinvoice()
	{

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$data_array = array(
				"comp_id" => $comp_id,

				//  "comp_add">$comp_add,

				"gstin" => $gstin,

				//  "cin" =>$cin,

				"prod_id" => $prod_id,

				"ro"   => $ro_no,

				// "ro_dt"    => $ro_dt,

				"due_dt"    => $due_dt,

				"invoice_no" => $invoice_no,

				"invoice_dt" =>  $invoice_dt,

				"qty" =>  $qty,

				"base_price"  => $no_of_bags,

				"cgst" => $cgst,

				"sgst" => $sgst,

				"tot_amt" => $rnd_of_less,

				"retlr_margin" => $retlr_margin,

				"spl_rebt" => $spl_rebt,

				"net_amt" => $net_amt,

				"stock_qty" =>  $qty,

				"rbt_add" => $rbt_add,

				"rbt_less" => $rbt_less,

				"rnd_of_add" => $rnd_of_add,

				"rnd_of_less"    => $rnd_of_less,

				"created_by"    =>  $this->session->userdata['loggedin']['user_name'],

				"created_dt"    =>  date('Y-m-d h:i:s')
			);

			$where = array(
				"ro" => $this->input->post('ro')
			);


			$this->FertilizerModel->f_edit('td_invoice_entry', $data_array, $where);

			$this->session->set_flashdata('msg', 'Successfully Updated');

			redirect('fertilizer/stock_entry');
		} else {
			$select = array(
				"comp_id",
				// "comp_add",
				"gstin",
				// "cin" ,
				"prod_id",
				"ro",
				// "ro_dt",
				"due_dt",
				"invoice_no",
				"invoice_dt",
				"qty",
				"cgst",
				"sgst",
				"tot_amt",
				"net_amt",
				"stock_qty",
				"base_price",
				"retlr_margin",
				"spl_rebt",
				"rbt_add",
				"rbt_les",
				"rnd_of_add",
				"rnd_of_les"
			);

			$where = array(
				"ro" => $this->input->get('ro')
			);

			$where1 = array(
				"a.comp_id = b.comp_id"    => NULL
			);

			$where2 = array(
				"a.prod_id = b.prod_id"    => NULL
			);

			$select        = array("a.comp_id", "a.comp_name", "a.comp_add", "a.gst_no", "a.cin");
			$product['compdtls']   = $this->FertilizerModel->f_select('mm_company_dtls a,td_invoice_entry b', $select, $where1, 1);
			// echo $this->db->last_query();
			// die();
			$select1          = array("a.prod_id", "a.prod_desc", "hsn_code", "gst_rt");
			$product['proddtls']   = $this->FertilizerModel->f_select('mm_product a,td_invoice_entry b', $select1, $where2, 1);

			$select2 =  array("qty", "ro", "invoice_no", "invoice_dt", "due_dt", "base_price", "tot_amt", "net_amt", "stock_qty", "cgst", "sgst", "retlr_margin", "spl_rebt", "rbt_add", "rbt_less", "rnd_of_add", "rnd_of_less");
			$product['schdtls'] = $this->FertilizerModel->f_select("td_invoice_entry", $select2, $where, 1);


			$this->load->view('post_login/fertilizer_main');

			$this->load->view("invoice_entry/edit", $product);

			$this->load->view("post_login/footer");
		}
	}

	///*********************************************** */

	public function invoice_entry()
	{

		$select          = array("ro", "invoice_no", "invoice_dt", "base_price");

		$invoice['data']    = $this->FertilizerModel->f_select(' td_invoice_entry', $select, NULL, 0);

		// echo $this->db->last_query();
		// exit();
		$this->load->view("post_login/fertilizer_main");

		$this->load->view("invoice_entry/dashboard", $invoice);

		$this->load->view('search/search');

		$this->load->view('post_login/footer');
	}


	public function invoiceAdd()
	{

		if ($_SERVER['REQUEST_METHOD'] == "POST") {


			$comp_id = $this->input->post('comp_id');

			$prod_id = $this->input->post('prod_id');

			$ro_no = $this->input->post('ro_no');

			$due_dt    = $this->input->post('due_dt');

			$invoice_no = $this->input->post('invoice_no');

			$invoice_dt = $this->input->post('invoice_dt');

			$qty = $this->input->post('qty');

			$rate = $this->input->post('rate');

			$base_price = $this->input->post('base_price');

			$cgst = $this->input->post('cgst');

			$sgst = $this->input->post('sgst');

			$retlr_margin = $this->input->post('retlr_margin');

			$spl_rebt = $this->input->post('spl_rebt');

			$add_adj_amt = $this->input->post('adj_amt');

			$less_adj_amt = $this->input->post('less_amt');

			$net_amt = $this->input->post('net_amt');

			$rbt_add = $this->input->post('rbt_add');

			$rbt_less = $this->input->post('rbt_less');

			$rnd_of_add = $this->input->post('rnd_of_add');

			$rnd_of_less = $this->input->post('rnd_of_less');

			$tot_amt = $this->input->post('tot_amt');

			$br_cd      = $this->input->post('br');

			// print_r($br_cd );
			// die();
			$data_array = array(

				"comp_id" => $comp_id,

				"prod_id" => $prod_id,

				"ro"   => $ro_no,

				"due_dt"    => $due_dt,

				"invoice_no" => $invoice_no,

				"invoice_dt" =>  $invoice_dt,

				"qty" =>  $qty,

				"stock_qty" =>  $qty,

				"rate" =>  $rate,

				"base_price" => $base_price,

				"cgst"        => $cgst,

				"sgst"        => $sgst,

				"retlr_margin"   => $retlr_margin,

				"spl_rebt"       => $spl_rebt,

				"add_adj_amt" => $add_adj_amt,

				"less_adj_amt" => $less_adj_amt,

				"net_amt"        => $net_amt,

				"rbt_add"        => $rbt_add,

				"rbt_less"       => $rbt_less,

				"rnd_of_add"     => $rnd_of_add,

				"rnd_of_less"   => $rnd_of_less,

				"tot_amt"        => $tot_amt,

				// "trans_dt" => date('Y-m-d h:i:s'),

				// "challan_flag"    => 'Y',

				"created_by"    =>  $this->session->userdata['loggedin']['user_name'],

				"created_dt"    =>  date('Y-m-d h:i:s'),

				"br_cd"     => $br_cd
			);

			$this->FertilizerModel->f_insert('td_invoice_entry', $data_array);

			// echo $this->db->last_query();
			// die();
			$this->session->set_flashdata('msg', 'Successfully Added');

			// redirect('fertilizer/invoice_entry');
			redirect('virtualpnt/virtual_stk_pointAdd');
		} else {



			$select1          = array("comp_id", "comp_name");
			$product['compdtls']   = $this->FertilizerModel->f_select('mm_company_dtls', $select1, NULL, 0);

			$select          = array("prod_id", "prod_desc", "gst_rt");
			$product['proddtls']   = $this->FertilizerModel->f_select('mm_product', $select, NULL, 0);

			$this->load->view('post_login/fertilizer_main');

			$this->load->view("invoice_entry/add", $product);

			$this->load->view('post_login/footer');
		}
	}


	public function f_get_company()
	{

		$select          = array("gst_no", "comp_add", "cin");

		$where = array(
			"comp_id" => $this->input->get("comp_id")
		);

		$comp    = $this->PurchaseModel->f_select('mm_company_dtls', $select, $where, 0);
		echo json_encode($comp);
	}
	public function f_get_company_achead()
	{
		$select          = array('acc_cd');
		$where = array("comp_id" => $this->input->get("comp_id"));
		$comp    = $this->PurchaseModel->f_select('mm_company_dtls', $select, $where, 1);
        $ac_code = $comp->acc_cd;
		$ac_name = $this->PurchaseModel->f_get_achead_bysl_no($ac_code);
		$data =array('ac_code'=>$ac_code,'ac_name'=>$ac_name);
		echo json_encode($data);
	}
	public function f_get_soc()
	{

		$select          = array("soc_id", "soc_add", "gstin");

		$where = array(
			"soc_id" => $this->input->get("soc_id")
		);


		$soc    = $this->FertilizerModel->f_select('mm_ferti_soc', $select, $where, 0);
		// echo $this->db->last_query();
		// die();
		echo json_encode($soc);
	}
	public function f_get_hsn()
	{

		$select          = array("a.hsn_code", "a.gst_rt", "b.id", "b.unit_name", "a.qty_per_bag", "a.storage");

		$where = array(
			"a.prod_id" => $this->input->get("prod_id"),
			"a.unit=b.id" => NULL
		);


		$prod    = $this->PurchaseModel->f_select(' mm_product a, mm_unit b', $select, $where, 0);
		// echo $this->db->last_query();
		// die();
		echo json_encode($prod);
	}

	public function f_get_qty_per_bag()
	{

		$select          = array("qty_per_bag");

		$where = array(
			"prod_id" => $this->input->get("prod_id")
		);


		$prod    = $this->PurchaseModel->f_select(' mm_product', $select, $where, 0);
		// echo $this->db->last_query();
		// die();
		echo json_encode($prod);
	}
	//View Stock RO

	public function f_get_product()
	{

		$select          = array("prod_id", "prod_desc");

		$where = array(
			"company" => $this->input->get("comp_id")
		);

		$product    = $this->PurchaseModel->f_select(' mm_product', $select, $where, 0);

		echo json_encode($product);
	}

	public function f_get_sale_ro()
	{
		
		$select = array("a.ro_no ");

		$where      =   array(

			"a.comp_id = b.comp_id"  => NULL,
			"a.comp_id"    =>  $this->input->get('comp_id')
		);

		$ro   = $this->FertilizerModel->f_select('td_purchase a,mm_company_dtls b', $select, $where, 0);

		echo json_encode($ro);
	}

	public function shortage_entry()
	{
		if ($this->input->post()) {
			$from_date = $this->input->post('from_date');
			$to_date   = $this->input->post('to_date');
			$br_cd     = $this->session->userdata['loggedin']['branch_id'];
			$fin_id    = $this->session->userdata['loggedin']['fin_id'];
			$bank['data']  = $this->PurchaseModel->f_get_shortage_view($br_cd, $fin_id, $from_date, $to_date);

			$this->load->view("post_login/fertilizer_main");

			$this->load->view("shortage/dashboard", $bank);
			
			$this->load->view('search/search');

			$this->load->view('post_login/footer');
		} else {
			$todayday      = date('Y-m-d');
			$br_cd         = $this->session->userdata['loggedin']['branch_id'];
			$fin_id        = $this->session->userdata['loggedin']['fin_id'];
			$bank['data']  = $this->PurchaseModel->f_get_shortage_view($br_cd, $fin_id, $todayday, $todayday);

			$this->load->view("post_login/fertilizer_main");

			$this->load->view("shortage/dashboard", $bank);
			
			$this->load->view('search/search');

			$this->load->view('post_login/footer');
		}
	}

	public function stock_entry()
	{
		if ($this->input->post()) {
			$from_date = $this->input->post('from_date');
			$to_date = $this->input->post('to_date');
			$br_cd         = $this->session->userdata['loggedin']['branch_id'];
			$fin_id        = $this->session->userdata['loggedin']['fin_id'];
			$bank['data']  = $this->PurchaseModel->f_get_stock_view($br_cd, $fin_id, $from_date, $to_date);


			$this->load->view("post_login/fertilizer_main");

			$this->load->view("stock_entry/dashboard", $bank);
			// echo $this->db->last_query();
			// exit();

			$this->load->view('search/search');

			$this->load->view('post_login/footer');
		} else {
			$todayday = date('Y-m-d');
			$br_cd         = $this->session->userdata['loggedin']['branch_id'];
			$fin_id        = $this->session->userdata['loggedin']['fin_id'];
			$bank['data']  = $this->PurchaseModel->f_get_stock_view($br_cd, $fin_id, $todayday, $todayday);


			$this->load->view("post_login/fertilizer_main");

			$this->load->view("stock_entry/dashboard", $bank);
			// echo $this->db->last_query();
			// exit();

			$this->load->view('search/search');

			$this->load->view('post_login/footer');
		}
	}
	public function js_get_pur_qty()
		{

			$ro = $this->input->get('ro_no');
			$result = $this->PurchaseModel->js_get_pur_qty($ro);			
			
 			echo json_encode($result);

		}
	public function f_get_pur_ro(){

		$br_cd    = $this->session->userdata['loggedin']['branch_id'];
		$ro_no    = $this->PurchaseModel->get_pur_ro($this->input->get("comp_id"),$br_cd);
	// echo $this->db->last_query();
	// die();
		echo json_encode($ro_no);
	
	}
	public function shortageAdd() {
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			// Fetch session data
			$dist_sort_code    = $this->session->userdata['loggedin']['dist_sort_code'];
			$fin_year_sort_code= substr($this->session->userdata['loggedin']['fin_yr'],2);
			$fin_id            = $this->session->userdata['loggedin']['fin_id'];
		
			$month             =date('m');
			$session = $this->session->userdata('loggedin');
			$fin_year  = $session['fin_yr'];
			$fin_id    = $session['fin_id'];
			$br_cd     = $session['branch_id'];
			$created_by = (string) $session['user_name'];
	
			// Retrieve transaction number object
			$trans_obj = $this->PurchaseModel->get_stockrtn_no($fin_id, $br_cd);
			// Extract scalar transaction code
			// if (is_object($trans_obj)) {
			// 	$trans_cd = isset($trans_obj->trans_no)
			// 		? (string)$trans_obj->trans_no
			// 		: (string)reset(get_object_vars($trans_obj));
			// } elseif (is_scalar($trans_obj)) {
			// 	$trans_cd = (string)$trans_obj;
			// } else {
			// 	show_error('Invalid transaction code received.');
			// }
	
			// Get inputs
			$inputs = [
				'trans_dt','ro_no','ro_dt','comp_id','prod_id',
				'unit','qty','rate','taxable_amt','cgst','sgst',
				'trans_flag','remarks'
			];
			foreach ($inputs as $f) {
				$$f = $this->input->post($f);
			}
	
			// Retrieve related metadata
			$prod = $this->PurchaseModel->f_select('mm_product', ['prod_desc'], ['prod_id' => $prod_id], 1);
			$comp = $this->PurchaseModel->f_select('mm_company_dtls', ['comp_name'], ['comp_id' => $comp_id], 1);
			$br   = $this->PurchaseModel->f_select('md_district', ['dist_sort_code'], ['district_code' => $br_cd], 1);
	
			// $prod_desc = isset($prod->prod_desc) ? (string)$prod->prod_desc : '';
			// $comp_name = isset($comp->comp_name) ? (string)$comp->comp_name : '';
			// $br_nm      = isset($br->dist_sort_code) ? (string)$br->dist_sort_code : '';
	
			// Build data array
			$trans_cd=$trans_obj->trans_no;
			$trans_code='STG/'.$dist_sort_code.'/'.$fin_year_sort_code.'/'.$trans_cd;
			$data = [
				'trans_cd'     => $trans_code,
				'trans_dt'     => date('Y-m-d'),
				'ro_no'        => $this->input->post('ro_no'),
				'ro_dt'        => $this->input->post('ro_dt'),
				'comp_id'      => $this->input->post('comp_id'),
				'prod_id'      => $this->input->post('prod_id'),
				'unit'         =>$this->input->post('unit'),
				'qty'          => $this->input->post('qty'),
				'rate'         => $this->input->post('rate'),
				'taxable_amt'  => $this->input->post('txt_amt'),
				'cgst'         => $this->input->post('cgst'),
				'sgst'         => $this->input->post('sgst'),
				'trans_flag'   => $this->input->post('trnas_type'),
				'remarks'      => $this->input->post('remarks'),
				'br_cd'        => $br_cd,
				'fin_yr'       => $fin_id,
				'created_by'   => $created_by,
				'created_dt'   => date('Y-m-d H:i:s'),
				'created_ip'   => $this->input->ip_address(),
			];
	
			// Validate no objects present
			foreach ($data as $k => $v) {
				if (is_object($v)) {
					show_error("Field '$k' is object! Cannot save.");
				}
			}
	
			// Insert and redirect
			$this->PurchaseModel->f_insert('td_pur_shortage', $data);
			$this->session->set_flashdata('msg', 'Successfully Added');
			redirect('stock/shortage_entry');
	
		} else {
			// Page-load logic
			$br_cd = $this->session->userdata('loggedin')['branch_id'];
			$product = [
				'socdtls'  => $this->PurchaseModel->f_select(
					'mm_ferti_soc', ['soc_id','soc_name'],
					['stock_point_flag'=>'Y','district'=>$br_cd], 0
				),
				'compdtls' => $this->PurchaseModel->f_select(
					'mm_company_dtls', ['comp_id','comp_name'], null, 0
				),
				'unitdtls' => $this->PurchaseModel->f_select(
					'mm_unit', ['id','unit_name'], null, 0
				),
				'mntend'   => $this->PurchaseModel->f_get_mnthend($br_cd),
				'date'     => $this->PurchaseModel->get_monthendDate()
			];
			$this->load->view('post_login/fertilizer_main');
			$this->load->view('shortage/add', $product);
			$this->load->view('post_login/footer');
		}
	}
	
	public function stockAdd()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			
			if($this->input->post('comp_acc_cd') > 0){
			if($this->input->post('adv_status')=='Y'){
				$where = array('fwd_flag' => 'Y',
									'comp_pay_flag' => 'Y',
									'fwd_receipt_no' => $this->input->post('receipt_no')
									);
				$result   = $this->PurchaseModel->f_select('tdf_adv_fwd', array('count(*) cnt'),$where, 1);
				$advance_Forward_No=$result->cnt;
			}else{
				$advance_Forward_No=1;
			}

			if($advance_Forward_No!=0){

			$fin_year =  $this->session->userdata['loggedin']['fin_yr'];

			$fin_id = $this->session->userdata['loggedin']['fin_id'];

			$comp_id       = $this->input->post('comp_id');

			$prod_id       = $this->input->post('prod_id');

			$ro_no         = $this->input->post('ro_no');

			$ro_dt         = $this->input->post('ro_dt');

			$trans_dt      = $this->input->post('trans_dt');

			$no_of_days    = $this->input->post('no_of_days');

			$due_dt        = $this->input->post('due_dt');

			$invoice_no    = $this->input->post('invoice_no');

			$invoice_dt    = $this->input->post('invoice_dt');

			$qty           = $this->input->post('qty');
			$receipt_no    = $this->input->post('receipt_no');

			$unit           = $this->input->post('unit');

			$rate           = $this->input->post('rate');

			$base_price     = $this->input->post('base_price');

			$cgst           = $this->input->post('cgst');

			$sgst           = $this->input->post('sgst');

			$retlr_margin   = $this->input->post('retlr_margin');

			$spl_rebt       = $this->input->post('spl_rebt');

			$add_adj_amt    = $this->input->post('adj_amt');

			$less_adj_amt   = $this->input->post('less_amt');

			$net_amt        = $this->input->post('net_amt');

			$rbt_add        = $this->input->post('rbt_add');

			$rbt_less       = $this->input->post('rbt_less');

			// $rnd_of_add     = $this->input->post('rnd_of_add');

			// $rnd_of_less    = $this->input->post('rnd_of_less');

			$less_trad_margin = $this->input->post('trd_mgr');

			$less_oth_dis    = $this->input->post('les_oth_dis');

			$less_frt_subsidy = $this->input->post('frt_subsidy');

			$tot_amt          = $this->input->post('tot_amt');

			$no_of_bags       =  $this->input->post('no_of_bags');

			$reck_pt_rt       =  $this->input->post('reck_pt_rt');

			$reck_pt_n_rt     =  $this->input->post('reck_pt_n_rt');

			$govt_sale_rt     =  $this->input->post('govt_sale_rt');

			$iffco_buf_rt     =  $this->input->post('iffco_buf_rt');

			$iffco_n_buff_rt  =  $this->input->post('iffco_n_buff_rt');

			$delivery_mode    = $this->input->post('delivery_mode');

			$trans_flag     = '1';

			$stock_point    = $this->input->post('stkpnt_id');

			$add_ret_margin_flag = $this->input->post('add_ret_margin_flag');

			$less_spl_rbt_flag = $this->input->post('less_spl_rbt_flag');

			$add_adj_amt_flag = $this->input->post('add_adj_amt_flag');

			$less_adj_amt_flag = $this->input->post('less_adj_amt_flag');

			$less_trad_margin_flag = $this->input->post('less_trad_margin_flag');

			$less_oth_dis_flag = $this->input->post('less_oth_dis_flag');

			$less_frght_subsdy_flag = $this->input->post('less_frght_subsdy_flag');

			$rnd_of_add  = $this->input->post('rnd_of_add');

			$rnd_of_less = $this->input->post('rnd_of_less');

			$br_cd       = $this->session->userdata['loggedin']['branch_id'];

			$data_array = array(

				"adv_status"  => $this->input->post('adv_status'),

				"comp_id"      => $comp_id,
				"comp_acc_cd"=> $this->input->post('comp_acc_cd'),

				"prod_id"      => $prod_id,

				"ro_no"        => $ro_no,

				"ro_dt"        => $ro_dt,

				"no_of_days"   => $no_of_days,

				"due_dt"       => $due_dt,

				"invoice_no"   => $invoice_no,

				"invoice_dt"   =>  $invoice_dt,

				"qty"          =>  $qty,
				"advance_receipt_no"   => $receipt_no,
				'indent_memo_no'   => $this->input->post('indent_memo_no'),

				"unit"         => $unit,

				"rate"         =>  $rate,

				"base_price"   => $base_price,

				"cgst"         => $cgst,

				"sgst"         => $sgst,

				"tcs"         => $this->input->post('tcs'),

				"retlr_margin" => $retlr_margin,

				"spl_rebt"     => $spl_rebt,

				"add_adj_amt"  => $add_adj_amt,

				"less_adj_amt" => $less_adj_amt,

				"trn_handling_charge" => $this->input->post('trn_handling_charge'),

				"trn_handling_charge_flag" => $this->input->post('trn_handling_charge_flag'),

				"net_amt"      => $net_amt,

				"rbt_add"      => $rbt_add,

				"rbt_less"     => $rbt_less,

				"trad_margin"  => $less_trad_margin,

				"oth_dis"      => $less_oth_dis,

				"frt_subsidy"   => $less_frt_subsidy,

				"tot_amt"       => $tot_amt,

				"stock_qty"     =>  $qty,

				"no_of_bags"    => $no_of_bags,

				"delivery_mode"  => $delivery_mode,

				"reck_pt_rt"     => $reck_pt_rt,

				"reck_pt_n_rt"   => $reck_pt_n_rt,

				"govt_sale_rt"   => 0,

				"iffco_buf_rt"   => $iffco_buf_rt,

				"iffco_n_buff_rt" => $iffco_n_buff_rt,

				"trans_dt"       => $trans_dt,

				"trans_flag"    => $trans_flag,

				"challan_flag"   => 'N',

				"add_ret_margin_flag" => $add_ret_margin_flag,

				"less_spl_rbt_flag" => $less_spl_rbt_flag,

				"add_adj_amt_flag" => $add_adj_amt_flag,

				"less_adj_amt_flag" => $less_adj_amt_flag,

				"less_trad_margin_flag" => $less_trad_margin_flag,

				"less_oth_dis_flag" => $less_oth_dis_flag,

				"less_frght_subsdy_flag" => $less_frght_subsdy_flag,

				"rnd_of_add"   =>  $this->input->post('rnd_of_add'),

				"rnd_of_less"  => $this->input->post('rnd_of_less'),

				"created_by"     =>  $this->session->userdata['loggedin']['user_name'],

				"created_dt"     =>  date('Y-m-d h:i:s'),

				"created_ip"     =>  $_SERVER['REMOTE_ADDR'],

				"br"             => $this->session->userdata['loggedin']['branch_id'],

				"fin_yr"         => $fin_id,

				"stock_point"    => $stock_point
			);


			$data_array1 = array(
				"trans_dt"    => $trans_dt,

				"ro_inv_no"  => $ro_no,

				"branch_id"  => $this->session->userdata['loggedin']['branch_id'],

				"fin_yr"	 => $fin_id,

				"point_id"	 => $stock_point,

				"trans_type" => "I",

				"unit"       => $unit,

				"quantity"   => $qty,

				"created_by" => $this->session->userdata['loggedin']['user_name'],

				"created_dt" => date('Y-m-d h:i:s')
			);

		
			$select_prod          = array("prod_desc");
			$where_prod   = array("prod_id" => $prod_id);
			$prod_name = $this->PurchaseModel->f_select('mm_product', $select_prod, $where_prod, 1);

			$select_comp          = array("comp_name");
			$where_comp     = array("comp_id" => $comp_id);
			$comp_name = $this->PurchaseModel->f_select('mm_company_dtls', $select_comp, $where_comp, 1);

			$select_br    = array("dist_sort_code");
			$where_br     = array("district_code" => $br_cd);
			$br_nm = $this->PurchaseModel->f_select('md_district', $select_br, $where_br, 1);

			$data_array_pur = $data_array;
			$data_array_pur['rem'] = $prod_name->prod_desc . " purchased vide ro no. " . $ro_no . " from " . $comp_name->comp_name;
			$data_array_pur['fin_fulyr'] = $fin_year;
			$data_array_pur['br_nm'] = $br_nm->dist_sort_code;


			// print_r($data_array_pur);
			// exit();
			// print_r($this->ApiVoucher->f_purchasejnl($data_array_pur));
			// exit();
			if($this->ApiVoucher->f_purchasejnl($data_array_pur)==1){


				$this->PurchaseModel->f_insert('tdf_stock_point_trans', $data_array1);

				$this->PurchaseModel->f_insert('td_purchase', $data_array);


				$this->session->set_flashdata('msg', 'Successfully Added');

				redirect('stock/stock_entry');
			}else{
				echo "<script>alert('Error in accounts voucher!');</script>";
			}
			//redirect('virtualpnt/virtual_stk_pointAdd');
		}else{
			echo "<script>alert('Advance to Company has not yet been done.');</script>";
		}

	    }else{

			$this->session->set_flashdata('msg', 'Accout ledger not found');
			redirect('stock/stock_entry');
		}


		} else {
			$br_cd      = $this->session->userdata['loggedin']['branch_id'];

			$select2    =  array("soc_id", "soc_name");
			$where2     = array(
				"stock_point_flag"    =>  'Y',
				"district" => $br_cd
			);

			$product['socdtls']   = $this->PurchaseModel->f_select('mm_ferti_soc', $select2, $where2, 0);
			$select1          = array("comp_id", "comp_name");

			$product['compdtls']   = $this->PurchaseModel->f_select('mm_company_dtls', $select1, NULL, 0);

			$select  = array("id", "unit_name");
			$product['unitdtls']   = $this->PurchaseModel->f_select('mm_unit', $select, NULL, 0);
			// $data_array=$product;
			$product['mntend'] = $this->PurchaseModel->f_get_mnthend($br_cd);

			// print_r($product);
			// die();
			
// 18-07-2022
			$product['achead']=$this->PurchaseModel->f_get_achead($br_cd);

// end 18-07-2022
			$product['date']   = $this->PurchaseModel->get_monthendDate();

			$this->load->view('post_login/fertilizer_main');

			$this->load->view("stock_entry/add", $product);

			$this->load->view('post_login/footer');
		}
	}

	public function deletero()
	{

		$where = array(
			"ro_no"    =>  $this->input->get('ro_no'),
			"challan_flag" =>  'N'

		);
		$where1 = array(
			"ro_inv_no"    =>  $this->input->get('ro_no')
		);

		$where_fin = $this->input->get('ro_no');

		$data2=$this->PurchaseModel->f_select('td_purchase',null,$where,0);
		foreach ($data2 as $keydata2) {
			$keydata2->delete_by = $this->session->userdata['loggedin']['user_name'];
			$keydata2->delete_dt = date('Y-m-d H:m:s');
			$keydata2->delete_ip = $_SERVER['REMOTE_ADDR'];
			// print_r($keydata);
			$this->PurchaseModel->f_insert('td_purchase_delete',$keydata2);

		}

		$ret=$this->PurchaseModel->f_delete('td_purchase', $where);
		if($ret){

			$data=$this->PurchaseModel->f_select('tdf_stock_point_trans',null,$where1,0);
				foreach ($data as $keydata) {
					$keydata->delete_by = $this->session->userdata['loggedin']['user_name'];
					$keydata->delete_dt = date('Y-m-d H:m:s');
					// print_r($keydata);
					$this->PurchaseModel->f_insert('tdf_stock_point_trans_delete',$keydata);

				}
				
		$this->PurchaseModel->f_delete('tdf_stock_point_trans', $where1);
		$this->PurchaseModel->f_delete_voucher($where_fin);
		
		
		$select1          = array("challan_flag");
		$where = array(
			"ro_no"    =>  $this->input->get('ro_no')
		);

		$challan_flag = $this->PurchaseModel->f_select('td_purchase', $select1, $where, 0);

		$this->session->set_flashdata('msg', 'Successfully Deleted!');
	}

		redirect("stock/stock_entry");
	}

	public function f_get_challan_flag()
	{
		$select          = array("challan_flag");

		$where = array(
			"ro" => $this->input->get("ro")
		);

		$pur    = $this->FertilizerModel->f_select(' td_purchase', $select, $where, 0);

		echo json_encode($pur);
	}

	public function viewstock()
	{

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$data_array = array(

				"stock_point"     	=> $this->input->post('stkpnt_id'),

				"ro_dt"    			=> $this->input->post('ro_dt'),

				"due_dt"    		=> $this->input->post('due_dt'),

				"delivery_mode" 	=> $this->input->post('delivery_mode'),

				"invoice_no" 		=> $this->input->post('invoice_no'),

				"invoice_dt" 		=> $this->input->post('invoice_dt'),

				"qty" 				=> $this->input->post('qty'),
				"advance_receipt_no" => $this->input->post('receipt_no'),

				"unit" 				=> $this->input->post('unit_id'),

				"no_of_bags"  		=> $this->input->post('no_of_bags'),

				"reck_pt_rt"		=> $this->input->post('reck_pt_rt'),

				"reck_pt_n_rt"		=> $this->input->post('reck_pt_n_rt'),

				"trans_dt" 			=> $this->input->post('trans_dt'),

				"iffco_buf_rt"		=> $this->input->post('iffco_buf_rt'),

				"iffco_n_buff_rt"	=> $this->input->post('iffco_n_buff_rt'),

				"rate"				=> $this->input->post('rate'),

				"base_price"		=> $this->input->post('base_price'),

				"net_amt"			=> $this->input->post('net_amt'),

				"retlr_margin" 		=> $this->input->post('retlr_margin'),

				"spl_rebt" 			=> $this->input->post('spl_rebt'),

				"add_adj_amt" 		=>  $this->input->post('adj_amt'),

				"less_adj_amt" 		=> $this->input->post('less_adj_amt'),

				"cgst"  			=> $this->input->post('cgst'),

				"sgst"  			=> $this->input->post('sgst'),

				"rbt_add" 			=> $this->input->post('rbt_add'),

				"rbt_less" 			=> $this->input->post('rbt_less'),

				"rnd_of_add" 		=> $this->input->post('rnd_of_add'),

				"rnd_of_less" 		=> $this->input->post('rnd_of_less'),

				"trad_margin"       => $this->input->post('trd_mgr'),

				"oth_dis"           => $this->input->post('les_oth_dis'),

				"frt_subsidy"      => $this->input->post('frt_subsidy'),

				"tot_amt"			=> $this->input->post('tot_amt'),

				"add_ret_margin_flag" => $this->input->post('add_ret_margin_flag'),

				"less_spl_rbt_flag" => $this->input->post('less_spl_rbt_flag'),

				"add_adj_amt_flag" =>  $this->input->post('add_adj_amt_flag'),

				"less_adj_amt_flag" => $this->input->post('less_adj_amt_flag'),

				"less_trad_margin_flag" => $this->input->post('less_trad_margin_flag'),

				"less_oth_dis_flag" => $this->input->post('less_oth_dis_flag'),

				"less_frght_subsdy_flag" => $this->input->post('less_frght_subsdy_flag'),

				"modified_ip"     =>  $_SERVER['REMOTE_ADDR'],

				"modified_by"    	=>  $this->session->userdata['loggedin']['user_name'],

				"modified_dt"    	=>  date('Y-m-d h:i:s')
			);

			$br     			= $this->session->userdata['loggedin']['branch_name'];

			$where = array(
				"ro_no" 		=> $this->input->post('ro_no'),

				"comp_id"		=> $this->input->post('comp_id'),

				"br" => $this->session->userdata['loggedin']['branch_id']
			);

			$product['company'] = $this->PurchaseModel->f_select("mm_company_dtls", NULL, NULL, 0);

			$this->PurchaseModel->f_edit('td_purchase', $data_array, $where);

			$this->session->set_flashdata('msg', 'Successfully Updated');

			redirect('stock/stock_entry');
		} else {


			$branch_id  = $this->session->userdata['loggedin']['branch_id'];

			$select = array(
				"a.*", "b.*", "c.*", "d.*"
			);

			$where	=	array(
				"a.comp_id = b.COMP_ID" => Null,
				"a.prod_id = c.PROD_ID" => Null,
				"ro_no" => $this->input->get('ro_no'),
				"a.unit = d.id" => NULL
			);

			$product['stock'] = $this->PurchaseModel->f_select("td_purchase a,mm_company_dtls b,mm_product c,mm_unit d", Null, $where, 1);
			//echo $this->db->last_query();
			//die();
			$stk_pt = array("soc_id", "soc_name");

			$where_stk = array(
				"stock_point_flag"	=> 'Y',

				"district"   		=> $branch_id
			);

			$product['stockpoint'] = $this->PurchaseModel->f_select("mm_ferti_soc", $stk_pt, $where_stk, 0);

			$product['company'] = $this->PurchaseModel->f_select("mm_company_dtls", NULL, NULL, 0);
			$product['product'] = $this->PurchaseModel->f_select("mm_product", NULL, NULL, 0);
			//  echo $this->db->last_query();
			// 	die();	
			$product['unit'] = $this->PurchaseModel->f_select("mm_unit", Null, Null, 0);
			$select_sale = array(
				"count(sale_ro)as sale_cnt"
			);
			$where_sale = array(
				"sale_ro"	=> $this->input->get('ro_no'),
				"br_cd"   		=> $branch_id
			);
			$product['sale'] = $this->PurchaseModel->f_select("td_sale", $select_sale, $where_sale, 0);
			//  echo $this->db->last_query();
			// die();									
			$this->load->view('post_login/fertilizer_main');

			$this->load->view("stock_entry/edit", $product);

			$this->load->view("post_login/footer");
		}
	}


	//******************************************* */

	//View Soceity
	public function soceity()
	{
		$select          = array("soc_id", "soc_name");
		$where        = array(
			"branch_id" => $this->session->userdata['loggedin']['branch_id']
		);

		$bank['data']    = $this->FertilizerModel->f_select('mm_ferti_soc', $select, NULL, 0);

		$this->load->view("post_login/fertilizer_main");

		$this->load->view("soceity/dashboard", $bank);

		$this->load->view('search/search');

		$this->load->view('post_login/footer');
	}

	///*********************************************** */

	// Add Soceity
	public function soceityAdd()
	{

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$soc_id    = $this->FertilizerModel->get_soceity_code();

			$soc_name = $this->input->post('soc_name');

			$soc_add  = $this->input->post('soc_add');

			$gstin     = $this->input->post('gstin');

			$mfms      = $this->input->post('mfms');

			$district = $this->input->post('district');

			$ph_no    = $this->input->post('ph_no');

			$email    = $this->input->post('email');

			$stock_point_flag = $this->input->post('stock_point_flag');

			$buffer_flag = $this->input->post('buffer_flag');

			$status = $this->input->post('status');

			$data_array = array(

				"soc_id" => $soc_id,

				"soc_name" => $soc_name,

				"soc_add"   => $soc_add,

				"gstin" => $gstin,

				"mfms" => $mfms,

				"district"  => $district,

				"ph_no"    => $ph_no,

				"email" =>  $email,

				"stock_point_flag" =>  $stock_point_flag,

				"buffer_flag"    => $buffer_flag,

				"status"          => $status,

				"created_by"    =>  $this->session->userdata['loggedin']['user_name'],

				"created_dt"    =>  date('Y-m-d h:i:s')
			);

			$this->FertilizerModel->f_insert('mm_ferti_soc', $data_array);

			$this->session->set_flashdata('msg', 'Successfully Added');

			redirect('fertilizer/soceity');
		} else {

			$select          = array("district_code", "district_name");

			$district['distdtls']   = $this->FertilizerModel->f_select('md_district', $select, NULL, 0);

			$this->load->view('post_login/fertilizer_main');

			$this->load->view("soceity/add", $district);

			$this->load->view('post_login/footer');
		}
	}

	//Edit Soceity
	public function editsoceity()
	{

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$data_array = array(

				"soc_id"     		 =>  $this->input->post('soc_id'),

				"soc_name"   		 =>  $this->input->post('soc_name'),

				"soc_add"    		 =>  $this->input->post('soc_add'),

				"gstin"      		  => $this->input->post('gstin'),

				"mfms"       		  => $this->input->post('mfms'),

				"district"   		  =>  $this->input->post('district'),

				"email"               =>  $this->input->post('email'),

				"ph_no"                =>  $this->input->post('ph_no'),

				"stock_point_flag"     =>  $this->input->post('stock_point_flag'),

				"buffer_flag"      	   =>  $this->input->post('buffer_flag'),

				"status"   				=>  $this->input->post('status'),

				"modified_by"  			=>  $this->session->userdata['loggedin']['user_name'],

				"modified_dt"           =>  date('Y-m-d h:i:s')
			);

			$where = array(
				"soc_id" => $this->input->post('soc_id')
			);

			$this->FertilizerModel->f_edit('mm_ferti_soc', $data_array, $where);

			$this->session->set_flashdata('msg', 'Successfully Updated');

			redirect('fertilizer/soceity');
		} else {
			$select = array(
				"soc_id",
				"soc_name",
				"soc_add",
				"gstin",
				"mfms",
				"district",
				"email",
				"ph_no",
				"stock_point_flag",
				"buffer_flag",
				"status"
			);

			$where = array(
				"soc_id" => $this->input->get('soc_id')
			);

			$sch['schdtls'] = $this->FertilizerModel->f_select("mm_ferti_soc", $select, $where, 1);

			$this->load->view('post_login/fertilizer_main');

			$this->load->view("soceity/edit", $sch);

			$this->load->view("post_login/footer");
		}
	}



	public function deletesociety()
	{

		$where = array(
			"soc_id"    =>  $this->input->get('soc_id')

		);

		$this->FertilizerModel->f_delete('mm_ferti_soc', $where);


		$this->session->set_flashdata('msg', 'Successfully Deleted!');

		redirect("fertilizer/fertilizer/soceity");
	}

	///************************************************/
	//View Unit
	public function unit()
	{
		$select         = array("id", "unit_name");

		$bank['data']   = $this->FertilizerModel->f_select('mm_unit', $select, NULL, 0);

		$this->load->view("post_login/fertilizer_main");

		$this->load->view("unit/dashboard", $bank);

		$this->load->view('search/search');

		$this->load->view('post_login/footer');
	}

	//Add Unit
	public function unitAdd()
	{

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			//    $comp_id = $this->FertilizerModel->get_company_code();

			$unit_name = $this->input->post('unit_name');

			$data_array = array(

				// "comp_id" => $comp_id,

				"unit_name" => $unit_name,

				"created_by"    =>  $this->session->userdata['loggedin']['user_name'],

				"created_dt"    =>  date('Y-m-d h:i:s')
			);

			$this->FertilizerModel->f_insert('mm_unit', $data_array);
			// echo $this->db->last_query();
			// die();
			$this->session->set_flashdata('msg', 'Successfully Added');

			redirect('fertilizer/unit');
		} else {

			$this->load->view('post_login/fertilizer_main');

			$this->load->view("unit/add");

			$this->load->view('post_login/footer');
		}
	}


	public function editunit()
	{

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$data_array = array(

				"id"     =>  $this->input->post('id'),

				"unit_name"   =>  $this->input->post('unit_name'),

				"modified_by"  =>  $this->session->userdata['loggedin']['user_name'],

				"modified_dt"  =>  date('Y-m-d h:i:s')
			);

			$where = array(
				"id" => $this->input->post('id')
			);


			$this->FertilizerModel->f_edit('mm_unit', $data_array, $where);

			$this->session->set_flashdata('msg', 'Successfully Updated');

			redirect('fertilizer/unit');
		} else {
			$select = array(
				"id",
				"unit_name"
			);

			$where = array(
				"id" => $this->input->get('id')
			);

			$sch['schdtls'] = $this->FertilizerModel->f_select("mm_unit", $select, $where, 1);

			$this->load->view('post_login/fertilizer_main');

			$this->load->view("unit/edit", $sch);

			$this->load->view("post_login/footer");
		}
	}



	/*******************************************************************
	 *						Company Master							   *
	 *******************************************************************/
	//View Added Company
	public function company()
	{
		$select         = array("comp_id", "comp_name", "comp_add", "gst_no");

		$bank['data']   = $this->FertilizerModel->f_select('mm_company_dtls', $select, NULL, 0);
		//   echo $this->db->last_query();
		// / die();
		$this->load->view("post_login/fertilizer_main");

		$this->load->view("company/dashboard", $bank);

		$this->load->view('search/search');

		$this->load->view('post_login/footer');
	}

	//Add New Company
	public function companyAdd()
	{

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$comp_id = $this->FertilizerModel->get_company_code();

			$comp_desc = $this->input->post('comp_name');

			$comp_add = $this->input->post('comp_add');

			$gst_no    = $this->input->post('gst_no');

			$pan_no    = $this->input->post('pan_no');

			$comp_email_id = $this->input->post('comp_email_id');

			$comp_pn_no = $this->input->post('comp_pn_no');

			$cin = $this->input->post('cin');

			$mfms = $this->input->post('mfms');

			$short_name = $this->input->post('short_name');

			$data_array = array(

				"comp_id" => $comp_id,

				"comp_name" => $comp_desc,

				"short_name" => $short_name,

				"comp_add"   => $comp_add,

				"comp_email_id" => $comp_email_id,

				"comp_pn_no"    => $comp_pn_no,

				"pan_no"    => $pan_no,

				"gst_no" =>  $gst_no,

				"mfms" =>  $mfms,

				"cin" => $cin,

				"created_by"    =>  $this->session->userdata['loggedin']['user_name'],

				"created_dt"    =>  date('Y-m-d h:i:s')
			);

			$this->FertilizerModel->f_insert('mm_company_dtls', $data_array);
			// echo $this->db->last_query();
			// die();
			$this->session->set_flashdata('msg', 'Successfully Added');

			redirect('fertilizer/company');
		} else {

			$this->load->view('post_login/fertilizer_main');

			$this->load->view("company/add");

			$this->load->view('post_login/footer');
		}
	}


	public function editcompany()
	{

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$data_array = array(

				"comp_id"     =>  $this->input->post('comp_id'),

				"comp_name"   =>  $this->input->post('comp_name'),

				"short_name" => $this->input->post('short_name'),

				"comp_add"    =>  $this->input->post('comp_add'),

				"comp_email_id" =>  $this->input->post('comp_email_id'),

				"comp_pn_no"   =>  $this->input->post('comp_pn_no'),

				"gst_no"      =>  $this->input->post('gst_no'),

				"mfms" =>  $this->input->post('mfms'),

				"pan_no"    =>  $this->input->post('pan_no'),

				"cin" =>  $this->input->post('cin'),

				"modified_by"  =>  $this->session->userdata['loggedin']['user_name'],

				"modified_dt"  =>  date('Y-m-d h:i:s')
			);

			$where = array(
				"comp_id" => $this->input->post('comp_id')
			);


			$this->FertilizerModel->f_edit('mm_company_dtls', $data_array, $where);

			$this->session->set_flashdata('msg', 'Successfully Updated');

			redirect('fertilizer/company');
		} else {
			$select = array(
				"comp_id",
				"comp_name",
				"short_name",
				"comp_add",
				"comp_email_id",
				"comp_pn_no",
				"gst_no",
				"mfms",
				"pan_no",
				"cin"
			);

			$where = array(
				"comp_id" => $this->input->get('comp_id')
			);

			$sch['schdtls'] = $this->FertilizerModel->f_select("mm_company_dtls", $select, $where, 1);

			$this->load->view('post_login/fertilizer_main');

			$this->load->view("company/edit", $sch);

			$this->load->view("post_login/footer");
		}
	}


	public function deletecompany()
	{

		$where = array(
			"comp_id"    =>  $this->input->get('comp_id')

		);

		$this->FertilizerModel->f_delete('mm_company_dtls', $where);


		$this->session->set_flashdata('msg', 'Successfully Deleted!');

		redirect("fertilizer/fertilizer/company");
	}

	public function f_get_salerate()
	{


		$prod_id  = $this->input->get('prod_id');
		$comp_id  = $this->input->get('comp_id');
		$ro_dt    = $this->input->get('ro_dt');

		$sql = $this->db->query("SELECT ifnull(sp_mt,0) from mm_sale_rate where comp_id='$comp_id' and prod_id='$prod_id' and '$ro_dt' >=frm_dt and '$ro_dt'<=to_dt");
		$result = $sql->row();
		// echo $this->db->last_query();
		// die();
		echo json_encode($result);

		//  and'$ro_dt' >=frm_dt and $ro_dt<to_dt");
		//  $this->db->query($sql);	
		// die();

		// $comp    = $this->FertilizerModel->f_select('mm_sale_rate',$select,$where,0);
		// echo $this->db->last_query();
		// die();
		// echo json_encode($comp);

		// 	select rate,frm_dt ,to_dt from mm_sale_rate
		// where district=332
		// and comp_id=1
		// and prod_id=18
		// and  '2020/07/20'>=frm_dt
		// and '2020/07/20'<= to_dt

	}

	public function sale_rate()
	{
		$select = array("a.district", "d.district_name", "a.frm_dt", "a.to_dt", "a.rate", "b.comp_name", "a.comp_id", "c.prod_desc", "a.prod_id");

		$where      =   array(

			"a.comp_id = b.comp_id"  => NULL,
			"a.prod_id= c.prod_id" => NULL,
			"a.district=d.district_code" => NULL
		);

		// $ro   = $this->FertilizerModel->f_select('td_purchase a,mm_company_dtls b',$select,$where,0);
		$bank['data']   = $this->FertilizerModel->f_select('mm_sale_rate a,mm_company_dtls b,mm_product c,md_district d', $select, $where, 0);
		//   echo $this->db->last_query();
		// / die();
		$this->load->view("post_login/fertilizer_main");

		$this->load->view("sale_rate/dashboard", $bank);

		$this->load->view('search/search');

		$this->load->view('post_login/footer');
	}
	public function salerateAdd()
	{

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

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
			$data_array = array(

				"prod_id" => $prod_id,

				"comp_id" => $comp_id,

				"district" => $district,

				"rate" =>  $rate,

				"frm_dt" =>  $frm_dt,

				"to_dt" =>  $to_dt,

				"created_by"    =>  $this->session->userdata['loggedin']['user_name'],

				"created_dt"    =>  date('Y-m-d h:i:s')
			);

			$this->FertilizerModel->f_insert('mm_sale_rate', $data_array);
			// echo $this->db->last_query();
			// die();
			$this->session->set_flashdata('msg', 'Successfully Added');

			redirect('fertilizer/sale_rate');
		} else {
			$select1          = array("comp_id", "comp_name");
			$product['compdtls']   = $this->FertilizerModel->f_select('mm_company_dtls', $select1, NULL, 0);

			$select2          = array("prod_id", "prod_desc");
			$product['proddtls']   = $this->FertilizerModel->f_select('mm_product', $select2, NULL, 0);
			// echo $this->db->last_query();
			// die();
			$select3         = array("district_code", "district_name");
			$product['distdtls']   = $this->FertilizerModel->f_select('md_district', $select3, NULL, 0);
			$this->load->view('post_login/fertilizer_main');

			$this->load->view("sale_rate/add", $product);

			$this->load->view('post_login/footer');
		}
	}

	public function editsalerate()
	{

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$data_array = array(

				"prod_id"     =>  $this->input->post('prod_id'),

				"comp_id"   =>  $this->input->post('comp_id'),

				"district"   => $this->input->post('district'),

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
		} else {
			$select = array(
				"a.prod_id",
				"a.comp_id",
				"a.district",
				"a.frm_dt",
				"a.to_dt",
				"a.rate",
				"b.prod_desc",
				"c.comp_name",
				"d.district_name"
			);

			$where = array(
				"a.prod_id" => $this->input->get('prod_id'),
				"a.comp_id" =>  $this->input->get('comp_id'),
				"a.frm_dt" =>  $this->input->get('frm_dt'),
				"a.to_dt" =>  $this->input->get('to_dt'),
				"a.district" =>  $this->input->get('district'),
				"a.prod_id=b.prod_id" => NULL,
				"a.comp_id=c.comp_id" => NULL,
				"a.district=d.district_code" => NULL
			);

			// $select1 = array("a.id","a.unit_name");
			// $where1 = array(
			// 	"a.id = b.unit"    => NULL,
			// 	"b.prod_id" => $this->input->get('prod_id'));

			// $sch['compdtls']   = $this->FertilizerModel->f_select('mm_company_dtls',$select1,NULL,0);	
			$sch['schdtls'] = $this->FertilizerModel->f_select("mm_sale_rate a,mm_product b,mm_company_dtls c,md_district d", $select, $where, 1);
			// echo $this->db->last_query();
			// die();
			// $sch['unitdtls'] = $this->FertilizerModel->f_select("mm_unit a,mm_product b",$select1,$where1,1);		
			// echo $this->db->last_query();
			// die();

			$this->load->view('post_login/fertilizer_main');

			$this->load->view("sale_rate/edit", $sch);

			$this->load->view("post_login/footer");
		}
	}
	/*******************************************************************
	 *						Product Master							   *
	 *******************************************************************/

	//View Added Product
	public function product()
	{
		$select = array("prod_id", "prod_desc", "prod_type", "gst_rt", "hsn_code");

		$bank['data']   = $this->FertilizerModel->f_select('mm_product', $select, NULL, 0);
		//   echo $this->db->last_query();
		// / die();
		$this->load->view("post_login/fertilizer_main");

		$this->load->view("product/dashboard", $bank);

		$this->load->view('search/search');

		$this->load->view('post_login/footer');
	}

	//Add New Product		
	public function productAdd()
	{

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$prod_id   = $this->FertilizerModel->get_product_code();
			$prod_desc = $this->input->post('prod_desc');
			$prod_type = $this->input->post('prod_type');
			$comp_id   = $this->input->post('comp_id');
			$gst_rt    = $this->input->post('gst_rt');
			$hsn_code  = $this->input->post('hsn_code');
			$unit      = $this->input->post('bag');
			$data_array = array(

				"prod_id"    => $prod_id,

				"prod_desc"   => $prod_desc,

				"prod_type"   => $prod_type,

				'company'     => $comp_id,

				"gst_rt"       =>  $gst_rt,

				"hsn_code"     =>  $hsn_code,

				"qty_per_bag"  =>  $unit,

				"created_by"    =>  $this->session->userdata['loggedin']['user_name'],

				"created_dt"    =>  date('Y-m-d h:i:s')
			);

			$this->FertilizerModel->f_insert('mm_product', $data_array);
			// echo $this->db->last_query();
			// die();
			$this->session->set_flashdata('msg', 'Successfully Added');

			redirect('fertilizer/product');
		} else {
			$select1          = array("comp_id", "comp_name");
			$product['compdtls']   = $this->FertilizerModel->f_select('mm_company_dtls', $select1, NULL, 0);

			// $select2          = array("id","unit_name");
			// $product['unitdtls']   = $this->FertilizerModel->f_select('mm_unit',$select2,NULL,0);
			$this->load->view('post_login/fertilizer_main');

			$this->load->view("product/add", $product);

			$this->load->view('post_login/footer');
		}
	}

	//Edit Product
	public function editproduct()
	{

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$data_array = array(

				"prod_id"     =>  $this->input->post('prod_id'),

				"prod_desc"   =>  $this->input->post('prod_desc'),

				"prod_type"   => $this->input->post('prod_type'),

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

			redirect('fertilizer/product');
		} else {
			$select = array(
				"a.prod_id",
				"a.prod_desc",
				"a.prod_type",
				"a.gst_rt",
				"a.hsn_code",
				"a.qty_per_bag",
				"b.comp_name"
			);

			$where = array(
				"a.prod_id" => $this->input->get('prod_id'),
				"a.company=b.comp_id" => NULL
			);

			// $select1 = array("a.id","a.unit_name");
			// $where1 = array(
			// 	"a.id = b.unit"    => NULL,
			// 	"b.prod_id" => $this->input->get('prod_id'));

			//  $sch['compdtls']   = $this->FertilizerModel->f_select('mm_company_dtls',$select1,NULL,0);

			$sch['schdtls'] = $this->FertilizerModel->f_select("mm_product a,mm_company_dtls b", $select, $where, 1);

			// echo $this->db->last_query();
			// die();

			// $sch['unitdtls'] = $this->FertilizerModel->f_select("mm_unit a,mm_product b",$select1,$where1,1);	

			// echo $this->db->last_query();
			// die();

			$this->load->view('post_login/fertilizer_main');

			$this->load->view("product/edit", $sch);

			$this->load->view("post_login/footer");
		}
	}

	//Delete Product
	public function deleteprod()
	{

		$where = array(
			"prod_id"    =>  $this->input->get('prod_id')

		);

		$this->FertilizerModel->f_delete('mm_product', $where);


		$this->session->set_flashdata('msg', 'Successfully Deleted!');

		redirect("fertilizer/fertilizer/product");
	}


	/*******************************************************************
	 *					Sub	Schedule Master							   *
	 *******************************************************************/

	//View Added Sub Schedules
	public function subscheduleDash()
	{

		$select        = array("schedule_code", "subschedule_code", "schedule_type");

		$bank['data']  = $this->FinanceModel->f_select('md_subschedule_heads', NULL, NULL, 0);

		$this->load->view("post_login/finance_main");

		$this->load->view("subschedule/dashboard", $bank);

		$this->load->view('search/search');

		$this->load->view('post_login/footer');
	}

	//Add New Sub Schedule
	public function subscheduleAdd()
	{

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$subschedule_code = $this->FertilizerModel->get_subsch_code($this->input->post('schedule_cd'), $this->input->post('acc_type'));

			$data = array(

				"acc_type"      =>  $this->input->post('acc_type'),

				"schedule_code"   =>  $this->input->post('schedule_cd'),

				"subschedule_code" =>  $subschedule_code,

				"subschedule_type" =>  $this->input->post('subschedule_type'),

				"created_by"    =>  $this->session->userdata['loggedin']['user_name'],

				"created_dt"    =>  date('Y-m-d h:i:s')
			);

			$this->FinanceModel->f_insert('md_subschedule_heads', $data);

			$this->session->set_flashdata('msg', 'Successfully Added');

			redirect('finance/subscheduleDash');
		} else {

			$list['row'] = $this->FinanceModel->f_select("md_schedule_heads", NULL, NULL, 0);

			$this->load->view('post_login/finance_main');

			$this->load->view("subschedule/add", $list);

			$this->load->view('post_login/footer');
		}
	}

	//Edit Sub Schedule
	public function editsubSchedule()
	{

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$data_array = array(

				"subschedule_type" => $this->input->post('subschedule_type'),

				"modified_by"   => $this->session->userdata['loggedin']['user_name'],

				"modified_dt"   => date('Y-m-d h:i:s')
			);


			$where = array(
				"subschedule_code"       => $this->input->post('subschedule_code')
			);

			$this->FinanceModel->f_edit('md_subschedule_heads', $data_array, $where);

			$this->session->set_flashdata('msg', 'Successfully Updated');

			redirect('finance/subscheduleDash');
		} else {
			$select = array(
				"a.*",
				"b.*"
			);

			$where  = array(
				"a.schedule_code = b.schedule_code"    => NULL,
				"b.subschedule_code" => $this->input->get('subschedule_code')
			);

			$sch['schdtls']   = $this->FinanceModel->f_select("md_schedule_heads a,md_subschedule_heads b", NULL, $where, 1);

			$this->load->view('post_login/finance_main');

			$this->load->view("subschedule/edit", $sch);

			$this->load->view("post_login/footer");
		}
	}

	//Delete Sub Schedule
	// public function deleteSubSch() {

	// 	$where = array(

	// 		"subschedule_code"    =>  $this->input->get('subSchCd')

	// 	);

	// 	$this->FinanceModel->f_delete('md_subschedule_heads', $where);


	// 	$this->session->set_flashdata('msg', 'Successfully Deleted!');

	// 	redirect("fertilizer/fertilizer/subscheduleDash");

	// }
	//Sending the schedule list for each acc type
	// public function product(){  

	// 	$where = array("prod_id" => $this->input->post('prod_id'));

	// 	$data  = $this->FinanceModel->f_select('mm_product',NULL,$where,0);  

	// 	echo json_encode($data);

	// }

	//Sending the subschedule list for each acc type
	// public function subschedule(){  

	// 	$where = array("schedule_code" => $this->input->post('sch_cd'));

	// 	$data  = $this->FinanceModel->f_select('md_subschedule_heads',NULL,$where,0);  

	// 	echo json_encode($data);

	// }

	/*******************************************************************
	 *					Account Master							   	   *
	 *******************************************************************/

	//View Account Head
	public function accountDash()
	{
		$select         = array("acc_type", "sch_code", "sub_sch_code", "acc_code", "acc_head");

		$bank['data']   = $this->FinanceModel->f_select('md_account_heads', $select, NULL, 0);

		$this->load->view("post_login/finance_main");

		$this->load->view("account/dashboard", $bank);

		$this->load->view('search/search');

		$this->load->view('post_login/footer');
	}

	public function accountAdd()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$sch	 = $this->input->post('schedule_cd');

			$subSch  = $this->input->post('subschedule_cd');

			$actype	 = $this->input->post('acc_type');

			$ac_name = $this->input->post('ac_name');

			if ($actype == 1 || $actype == 2) {

				$acflag = 'B';
			} elseif ($actype == 3 || $actype == 4) {

				$acflag = 'S';
			} elseif ($actype == 5 || $actype == 6) {

				$acflag = 'P';
			}

			$max_no = $this->FinanceModel->f_max_no($subSch);

			$max_no->acc_code += 1;

			$max_no = $max_no->acc_code;

			if ($max_no == 1) {
				$max_no = str_pad($max_no, 4, 0, STR_PAD_LEFT);

				$max_no = $subSch . $max_no;
			} else {
				$max_no = $max_no;
			}

			$data_array = array(
				"acc_type"				=>	$actype,

				"sch_code"     	    	=>  $sch,

				"sub_sch_code"			=>	$subSch,

				"acc_code"	    		=>  $max_no,

				"acc_head"	    		=>  $ac_name,

				"acc_flag"	    		=>  $acflag,

				"created_by"            =>  $this->session->userdata['loggedin']['user_name'],

				"created_dt"        =>  date('Y-m-d h:i:s')
			);

			$this->FinanceModel->f_insert('md_account_heads', $data_array);

			$this->session->set_flashdata('msg', 'Successfully Added');

			redirect('finance/accountDash');
		} else {
			$list['row']       =   $this->FinanceModel->f_select("md_schedule_heads", NULL, NULL, 0);

			$list['row1']       =   $this->FinanceModel->f_select("md_subschedule_heads", NULL, NULL, 0);

			$this->load->view('post_login/finance_main');

			$this->load->view("account/add", $list);

			$this->load->view('post_login/footer');
		}
	}

	public function editAccount()
	{

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$data_array = array(

				"sch_code"     	    =>  $this->input->post('sch_name'),

				"acc_head"          =>  $this->input->post('acc_name'),

				"modified_by"        =>  $this->session->userdata('loggedin')->user_name,

				"modified_dt"        =>  date('Y-m-d h:i:s')
			);

			$where = array(
				"acc_code" => $this->input->post('acc_code')
			);

			$this->FinanceModel->f_edit('md_account_heads', $data_array, $where);

			$this->session->set_flashdata('msg', 'Successfully Updated');

			redirect('finance/accountDash');
		} else {
			$select = array(
				"sch_code",
				"acc_code",
				"acc_head"
			);

			$where = array(
				"acc_code" => $this->input->get('acc_code')
			);

			$acc['accdtls'] = $this->FinanceModel->f_select("md_account_heads", $select, $where, 1);

			$acc['schdtls'] = $this->FinanceModel->f_select("md_schedule_heads", NULL, NULL, 0);

			$acc['subschdtls'] = $this->FinanceModel->f_select("md_subschedule_heads", NULL, NULL, 0);

			$this->load->view('post_login/finance_main');

			$this->load->view("account/edit", $acc);

			$this->load->view("post_login/footer");
		}
	}


	//Delete Sub Schedule
	public function deleteAccCd()
	{

		$where = array(

			"acc_code"    =>  $this->input->get('accCd')

		);

		$this->FinanceModel->f_delete('md_account_heads', $where);


		$this->session->set_flashdata('msg', 'Successfully Deleted!');

		redirect("finance/finance/accountDash");
	}

	//Cash Voucher
	public function cashDashboard()
	{

		$cashcd = $this->FinanceModel->f_select_parameter(13);

		$cashcd = $cashcd->param_value;

		$select	    = array(
			"voucher_date",
			"voucher_id",
			"voucher_type",
			"voucher_mode",
			"amount"
		);

		$where      = array(
			"acc_code" 	  => $cashcd,

			"approval_status" => 'U'
		);

		$voucher['row']	= $this->FinanceModel->f_select("td_vouchers", $select, $where, 0);

		$this->load->view('post_login/finance_main');

		$this->load->view('cash_voucher/dashboard', $voucher);

		$this->load->view('post_login/footer');
	}

	public function addCashVoucher()
	{

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$v_id    = $this->FinanceModel->f_get_voucher_id($_SESSION['sys_date']);

			$v_id->voucher_id += 1;

			$v_id    = $v_id->voucher_id;

			$v_code  = $this->input->post('acc_code');

			$v_dc    =  $this->input->post('dc_flg');

			$v_amt   =  $this->input->post('amount');


			for ($i = 0; $i < count($v_code); $i++) {

				$data_array = array(

					"voucher_date"  	=>  $this->input->post('voucher_dt'),

					"voucher_id"    	=>  $v_id,

					"trans_no"		=>  0,

					"voucher_type"  	=>  $this->input->post('voucher_type'),

					"voucher_mode"		=>  'C',

					"voucher_through"	=>  'M',

					"acc_code"		=>  $v_code[$i],

					"dr_cr_flag"		=>  $v_dc[$i],

					"remarks"		=>  $this->input->post('remarks'),

					"amount"		=>  $v_amt[$i],

					"approval_status"	=>  'U',

					"user_flag"		=>  'S',

					"ins_no"		=>  NULL,

					"ins_dt"		=>  NULL,

					"created_by"		=>  $this->session->userdata('loggedin')->user_name,

					"created_dt"		=>  date('Y-m-d h:i:s')
				);

				$this->FinanceModel->f_insert('td_vouchers', $data_array);
			}

			$row_array = array(

				"voucher_date"          =>  $this->input->post('voucher_dt'),

				"voucher_id"            =>  $v_id,

				"trans_no"              =>  0,

				"voucher_type"          =>  $this->input->post('voucher_type'),

				"voucher_mode"          =>  'C',

				"voucher_through"       =>  'M',

				"acc_code"              =>  $this->input->post('acc_cd'),

				"dr_cr_flag"            =>  $this->input->post('dr_cr_flag'),

				"remarks"               =>  $this->input->post('remarks'),

				"amount"                =>  $this->input->post('tot_amt'),

				"approval_status"       =>  'U',

				"user_flag"		=>  'M',

				"ins_no"                =>  NULL,

				"ins_dt"                =>  NULL,

				"created_by"            =>  $this->session->userdata('loggedin')->user_name,

				"created_dt"            =>  date('Y-m-d h:i:s')
			);

			$this->FinanceModel->f_insert('td_vouchers', $row_array);


			$this->session->set_flashdata('msg', 'Successfully Added');

			redirect('finance/cashDashboard');
		} else {
			$data['row']   =   $this->FinanceModel->f_select("md_account_heads", NULL, NULL, 0);

			$this->load->view('post_login/finance_main');

			$this->load->view("cash_voucher/add", $data);

			$this->load->view('post_login/footer');
		}
	}

	public function delCashVoucher()
	{

		$where = array(

			"voucher_date"    =>  $this->input->get('voucher_date'),

			"voucher_id"      =>  $this->input->get('voucher_id')
		);

		$this->session->set_flashdata('msg', 'Successfully Deleted!');

		$this->FinanceModel->f_delete('td_vouchers', $where);

		redirect("finance/cashDashboard");
	}

	//Bank Voucher

	public function bankDashboard()
	{

		$select	    = array(
			"voucher_date",
			"voucher_id",
			"voucher_type",
			"voucher_mode",
			"amount"
		);

		$where      = array(
			"user_flag" 	  => 'M',

			"voucher_mode"	  => 'B',

			"approval_status" => 'U'
		);

		$voucher['row']	= $this->FinanceModel->f_select("td_vouchers", $select, $where, 0);
		// print_r($voucher);
		$this->load->view('post_login/finance_main');

		$this->load->view('bank_voucher/dashboard', $voucher);

		$this->load->view('post_login/footer');
	}

	public function addBankVoucher()
	{

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$v_id    = $this->FinanceModel->f_get_voucher_id($_SESSION['sys_date']);

			$v_id->voucher_id += 1;

			$v_id    = $v_id->voucher_id;

			$v_code  = $this->input->post('acc_code');

			$v_dc    =  $this->input->post('dc_flg');

			$v_amt   =  $this->input->post('amount');

			for ($i = 0; $i < count($v_code); $i++) {

				$data_array = array(

					"voucher_date"  	=>  $this->input->post('voucher_dt'),

					"voucher_id"    	=>  $v_id,

					"trans_no"		=>  0,

					"voucher_type"  	=>  $this->input->post('voucher_type'),

					"voucher_mode"		=>  'B',

					"voucher_through"	=>  'M',

					"acc_code"		=>  $v_code[$i],

					"dr_cr_flag"		=>  $v_dc[$i],

					"remarks"		=>  $this->input->post('remarks'),

					"amount"		=>  $v_amt[$i],

					"approval_status"	=>  'U',

					"user_flag"             =>  'S',

					"ins_no"		=>  NULL,

					"ins_dt"		=>  NULL,

					"created_by"		=>  $this->session->userdata('loggedin')->user_name,

					"created_dt"		=>  date('Y-m-d h:i:s')
				);

				$this->FinanceModel->f_insert('td_vouchers', $data_array);
			}

			$row_array = array(

				"voucher_date"          =>  $this->input->post('voucher_dt'),

				"voucher_id"            =>  $v_id,

				"trans_no"              =>  0,

				"voucher_type"          =>  $this->input->post('voucher_type'),

				"voucher_mode"          =>  'B',

				"voucher_through"       =>  'M',

				"acc_code"              =>  $this->input->post('acc_cd'),

				"dr_cr_flag"            =>  $this->input->post('dr_cr_flag'),

				"remarks"               =>  $this->input->post('remarks'),

				"amount"                =>  $this->input->post('tot_amt'),

				"approval_status"       =>  'U',

				"user_flag"             =>  'M',

				"ins_no"                =>  NULL,

				"ins_dt"                =>  NULL,

				"created_by"            =>  $this->session->userdata('loggedin')->user_name,

				"created_dt"            =>  date('Y-m-d h:i:s')
			);

			$this->FinanceModel->f_insert('td_vouchers', $row_array);


			$this->session->set_flashdata('msg', 'Successfully Added');

			redirect('finance/bankDashboard');
		} else {
			$data['row']   =   $this->FinanceModel->f_select("md_account_heads", NULL, NULL, 0);

			$data['bank']  =   $this->FinanceModel->f_select("md_bank", NULL, NULL, 0);

			$this->load->view('post_login/finance_main');

			$this->load->view("bank_voucher/add", $data);

			$this->load->view('post_login/footer');
		}
	}

	public function delBankVoucher()
	{

		$where = array(

			"voucher_date"    =>  $this->input->get('voucher_date'),

			"voucher_id"      =>  $this->input->get('voucher_id')
		);

		$this->session->set_flashdata('msg', 'Successfully Deleted!');

		$this->FinanceModel->f_delete('td_vouchers', $where);

		redirect("finance/bankDashboard");
	}

	//Journal Voucher

	public function trfDashboard()
	{

		$select	    = array(
			"voucher_date",
			"voucher_id",
			"voucher_type",
			"voucher_mode",
			"amount"
		);

		$where      = array(
			"user_flag" 	  => 'M',

			"voucher_mode"	  => 'T',

			"approval_status" => 'U'
		);

		$voucher['row']	= $this->FinanceModel->f_select("td_vouchers", $select, $where, 0);

		$this->load->view('post_login/finance_main');

		$this->load->view('journal_voucher/dashboard', $voucher);

		$this->load->view('post_login/footer');
	}

	public function addTrfVoucher()
	{

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$v_id    = $this->FinanceModel->f_get_voucher_id($_SESSION['sys_date']);

			$v_id->voucher_id += 1;

			$v_id    = $v_id->voucher_id;

			$v_code  = $this->input->post('acc_code');

			$v_dc    =  $this->input->post('dc_flg');

			$v_amt   =  $this->input->post('amount');

			for ($i = 0; $i < count($v_code); $i++) {

				$data_array = array(

					"voucher_date"  	=>  $this->input->post('voucher_dt'),

					"voucher_id"    	=>  $v_id,

					"trans_no"		=>  0,

					"voucher_type"  	=>  $this->input->post('voucher_type'),

					"voucher_mode"		=>  'T',

					"voucher_through"	=>  'M',

					"acc_code"		=>  $v_code[$i],

					"dr_cr_flag"		=>  $v_dc[$i],

					"remarks"		=>  $this->input->post('remarks'),

					"amount"		=>  $v_amt[$i],

					"approval_status"	=>  'U',

					"user_flag"             =>  'S',

					"ins_no"		=>  NULL,

					"ins_dt"		=>  NULL,

					"created_by"		=>  $this->session->userdata('loggedin')->user_name,

					"created_dt"		=>  date('Y-m-d h:i:s')
				);

				$this->FinanceModel->f_insert('td_vouchers', $data_array);
			}

			$row_array = array(

				"voucher_date"          =>  $this->input->post('voucher_dt'),

				"voucher_id"            =>  $v_id,

				"trans_no"              =>  0,

				"voucher_type"          =>  $this->input->post('voucher_type'),

				"voucher_mode"          =>  'T',

				"voucher_through"       =>  'M',

				"acc_code"              =>  $this->input->post('acc_cd'),

				"dr_cr_flag"            =>  $this->input->post('dr_cr_flag'),

				"remarks"               =>  $this->input->post('remarks'),

				"amount"                =>  $this->input->post('tot_amt'),

				"approval_status"       =>  'U',

				"user_flag"             =>  'M',

				"ins_no"                =>  NULL,

				"ins_dt"                =>  NULL,

				"created_by"            =>  $this->session->userdata('loggedin')->user_name,

				"created_dt"            =>  date('Y-m-d h:i:s')
			);

			$this->FinanceModel->f_insert('td_vouchers', $row_array);


			$this->session->set_flashdata('msg', 'Successfully Added');

			redirect('finance/trfDashboard');
		} else {
			$data['row']   =   $this->FinanceModel->f_select("md_account_heads", NULL, NULL, 0);

			//$data['bank']  =   $this->FinanceModel->f_select("md_bank",NULL,NULL,0);	

			$this->load->view('post_login/finance_main');

			$this->load->view("journal_voucher/add", $data);

			$this->load->view('post_login/footer');
		}
	}

	public function delTrfVoucher()
	{

		$where = array(

			"voucher_date"    =>  $this->input->get('voucher_date'),

			"voucher_id"      =>  $this->input->get('voucher_id')
		);

		$this->session->set_flashdata('msg', 'Successfully Deleted!');

		$this->FinanceModel->f_delete('td_vouchers', $where);

		redirect("finance/trfDashboard");
	}

	//Approve Vouchers

	public function aprvVouDashboard()
	{

		$select     = array(
			"voucher_date",
			"voucher_id",
			"voucher_type",
			"voucher_mode",
			"amount"
		);

		$where      = array(
			"user_flag"       => 'M',

			"approval_status" => 'U'
		);

		$voucher['row'] = $this->FinanceModel->f_select("td_vouchers", $select, $where, 0);

		$this->load->view('post_login/finance_main');

		$this->load->view('approve_voucher/dashboard', $voucher);

		$this->load->view('post_login/footer');
	}

	public function aproveVoucher()
	{

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$data_array = array(
				"approval_status" => 'A',

				"approved_by"     =>  $this->session->userdata('loggedin')->user_name,

				"approved_dt"     =>  date('Y-m-d h:i:s')
			);

			$where = array(
				"voucher_date"	=> $this->input->post("voucher_dt"),

				"voucher_id"	=> $this->input->post("voucher_id")
			);

			$this->FinanceModel->f_edit('td_vouchers', $data_array, $where);

			$this->session->set_flashdata('msg', 'Approve Successful');

			redirect("finance/aprvVouDashboard");
		} else {
			$select = array(
				"voucher_date",
				"voucher_id",
				"voucher_type",
				"voucher_mode",
				"acc_code",
				"dr_cr_flag",
				"amount",
				"ins_no",
				"ins_dt",
				"remarks",
				"approval_status"
			);

			$where = array(
				"voucher_date"	=>  $this->input->get("date"),

				"voucher_id"	=>  $this->input->get("id"),

				"user_flag"	=>  'M'
			);

			$whereRow = array(
				"voucher_date"	=>  $this->input->get("date"),

				"voucher_id"	=>  $this->input->get("id"),

				"user_flag"	=>  'S'
			);


			$voucher['data'] =  $this->FinanceModel->f_select("td_vouchers", $select, $where, 1);

			$voucher['row']  =  $this->FinanceModel->f_select("td_vouchers", $select, $whereRow, 0);

			//echo "<pre>"; var_dump($voucher['row']);die;

			$voucher['acc']  =  $this->FinanceModel->f_select("md_account_heads", NULL, NULL, 0);

			$this->load->view('post_login/finance_main');

			$this->load->view('approve_voucher/aproveVou', $voucher);

			$this->load->view('post_login/footer');
		}
	}

	public function main($page)
	{
		if ($page == "product") {
			if ($this->session->userdata('value')) {
				echo '<script>alert("Save Successful");</script>';
				$this->load->view('post_login/main');
				$this->session->unset_userdata('value');
				$this->load->view('post_login/footer');
			} else {
				$this->load->view('post_login/main');
				$this->load->view('product_master');
				$this->load->view('post_login/footer');
			}
		} elseif ($page == "newacc") {
			if ($this->session->userdata('value')) {
				echo '<script>alert("Save Successful");</script>';
				$this->load->view('post_login/main');
				$this->session->unset_userdata('value');
				$this->load->view('post_login/footer');
			} else {
				$this->load->view('post_login/finance_main');
				$data['row'] = $this->FinanceModel->f_get_schedule();
				$this->load->view('acc_head', $data);
				$this->load->view('post_login/footer');
			}
		} elseif ($page == "cash") {
			if ($this->session->userdata('value')) {
				echo '<script>alert("Save Successful, Voucher No: ' . $this->session->userdata('value') . '");</script>';
				$this->load->view('post_login/finance_main');
				$data['row'] = $this->FinanceModel->f_get_acc();
				$this->load->view('cash_voucher', $data);
				$this->session->unset_userdata('value');
				$this->load->view('post_login/footer');
			} else {
				$this->load->view('post_login/finance_main');
				$data['row'] = $this->FinanceModel->f_get_acc();
				$this->load->view('cash_voucher', $data);
				$this->load->view('post_login/footer');
			}
		} elseif ($page == "bank") {
			if ($this->session->userdata('value')) {
				echo '<script>alert("Save Successful, Voucher No: ' . $this->session->userdata('value') . '");</script>';
				$this->load->view('post_login/finance_main');
				$data['row'] = $this->FinanceModel->f_get_acc();
				$data['bank'] = $this->FinanceModel->f_get_bank();
				$this->load->view('bank_voucher', $data);
				$this->session->unset_userdata('value');
				$this->load->view('post_login/footer');
			} else {

				$this->load->view('post_login/finance_main');
				$data['row'] = $this->FinanceModel->f_get_acc();
				$data['bank'] = $this->FinanceModel->f_get_bank();
				$this->load->view('bank_voucher', $data);
				$this->load->view('post_login/footer');
			}
		} elseif ($page == "journal") {
			if ($this->session->userdata('value')) {
				echo '<script>alert("Save Successful, Voucher No: ' . $this->session->userdata('value') . '");</script>';
				$this->load->view('post_login/finance_main');
				$data['row'] = $this->FinanceModel->f_get_acc();
				$this->load->view('journal_voucher', $data);
				$this->session->unset_userdata('value');
			} else {

				$this->load->view('post_login/finance_main');
				$data['row'] = $this->FinanceModel->f_get_acc();
				$this->load->view('journal_voucher', $data);
				$this->load->view('post_login/footer');
			}
		}
	}


	public function f_voucher_report()
	{

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$from_dt 	= $_POST['start_dt'];

			$to_dt   	= $_POST['end_dt'];

			$this->load->view('post_login/finance_main');

			$voucher_no = $this->FinanceModel->f_get_voucher_id_all($from_dt, $to_dt);


			for ($i = 0; $i < count($voucher_no); $i++) {

				$data['row'] = $this->FinanceModel->f_get_vouchers($from_dt, $to_dt, $voucher_no[$i]->voucher_id);

				$this->load->view('daily_rep/voucher_dtls', $data);
			}

			$this->load->view('post_login/footer');
		} else {
			$this->load->view('post_login/finance_main');

			$this->load->view('rep_params/date_params');

			$this->load->view('post_login/footer');
		}
	}

	public function f_ledger_report()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$from_dt   = $_POST['start_dt'];
			$to_dt	   = $_POST['end_dt'];
			$acc_cd	   = $_POST['acc_code'];

			$this->load->view('post_login/finance_main');

			$row['data'] = $this->FinanceModel->f_gl_report($from_dt, $to_dt, $acc_cd);
			$row['data1'] = $this->FinanceModel->f_opening_bal($from_dt, $acc_cd);
			$row['data2'] = $this->FinanceModel->f_closing_bal($to_dt, $acc_cd);
			$row['data3'] = array($from_dt, $to_dt, $acc_cd);
			$this->load->view('ledger_report', $row);
			$this->load->view('post_login/footer');
		} else {
			$this->load->view('post_login/finance_main');
			$data['row'] = $this->FinanceModel->f_get_acc();
			$this->load->view('date_acc', $data);
			$this->load->view('post_login/footer');
		}
	}

	// code for stock Developed by lokesh 01/04/2020 ////	
	public function stock_report()
	{

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$to_date	= $_POST['to_date'];
			$row['stocks'] = $this->FertilizerModel->stockreport($to_date);

			$this->load->view('post_login/fertilizer_main');
			$this->load->view('report/stock', $row);
			$this->load->view('post_login/footer');
		} else {
			$this->load->view('post_login/fertilizer_main');
			$this->load->view('report/stock');
			$this->load->view('post_login/footer');
		}
	}
	// code for stock Developed by lokesh 01/04/2020 ////	
	public function stock_reportcompanywise()
	{

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$to_date	= $_POST['to_date'];
			$row['companies'] = $this->FertilizerModel->f_select('mm_company_dtls', NULL, NULL, 0);
			$row['stocks'] = $this->FertilizerModel->stockreport($to_date);

			$this->load->view('post_login/fertilizer_main');
			$this->load->view('report/stock_comwise', $row);
			$this->load->view('post_login/footer');
		} else {
			$this->load->view('post_login/fertilizer_main');
			$this->load->view('report/stock_comwise');
			$this->load->view('post_login/footer');
		}
	}
	// code for Society Report Developed by lokesh 01/04/2020 ////	
	public function society_report()
	{

		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$where = array(
				"dist" => $this->input->post('branch_id')
			);

			$row['societies'] = $this->FertilizerModel->f_select('md_society', NULL, $where, 0);

			$this->load->view('post_login/fertilizer_main');
			$this->load->view('report/society', $row);
			$this->load->view('post_login/footer');
		} else {
			$row['districts'] = $this->FertilizerModel->f_select('md_district', NULL, NULL, 0);
			$this->load->view('post_login/fertilizer_main');
			$this->load->view('report/society', $row);
			$this->load->view('post_login/footer');
		}
	}

	// code for Sale Report Developed by lokesh 02/04/2020 ////	
	public function sale_report()
	{

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			//Retriving CMR delivery Details
			$select     =   array(

				"a.do_dt", "a.qty", "a.tot_amt",

				"c.COMP_NAME", "b.PROD_DESC"

			);

			$where      =   array(

				"a.prod_id = b.PROD_ID"  => NULL,

				"b.COMPANY = c.COMP_ID"  => NULL,

			);
			$row['sales'] = $this->FertilizerModel->f_select('td_sale a,mm_product b,mm_company_dtls c', $select, $where, 0);

			$this->load->view('post_login/fertilizer_main');
			$this->load->view('report/sale_re', $row);
			$this->load->view('post_login/footer');
		} else {

			$this->load->view('post_login/fertilizer_main');
			$this->load->view('report/sale_re');
			$this->load->view('post_login/footer');
		}
	}

	// code for Sale Districtwise Report Developed by lokesh 02/04/2020 ////	

	public function sale_reportdis()
	{

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$where = array();

			//Retriving CMR delivery Details
			$select     =   array(

				"a.do_dt", "a.qty", "a.tot_amt",

				"c.COMP_NAME", "b.PROD_DESC"

			);

			$where      =   array(

				"a.prod_id = b.PROD_ID"  => NULL,

				"b.COMPANY = c.COMP_ID"  => NULL,

				"a.br_cd" => $this->input->post('branch_id')

			);
			$row['sales'] = $this->FertilizerModel->f_select('td_sale a,mm_product b,mm_company_dtls c', $select, $where, 0);

			$this->load->view('post_login/fertilizer_main');
			$this->load->view('report/sale_redis', $row);
			$this->load->view('post_login/footer');
		} else {
			$row['districts'] = $this->FertilizerModel->f_select('md_district', NULL, NULL, 0);
			$this->load->view('post_login/fertilizer_main');
			$this->load->view('report/sale_redis', $row);
			$this->load->view('post_login/footer');
		}
	}

	// code for Credit Note Districtwise Report Developed by lokesh 13/04/2020 ////	

	public function cr_reportdis()
	{

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$row['sales'] = $this->FertilizerModel->get_crnote_dist_report($this->input->post('branch_id'));

			$this->load->view('post_login/fertilizer_main');
			$this->load->view('report/cr_redis', $row);
			$this->load->view('post_login/footer');
		} else {
			$row['districts'] = $this->FertilizerModel->f_select('md_district', NULL, NULL, 0);
			$this->load->view('post_login/fertilizer_main');
			$this->load->view('report/cr_redis', $row);
			$this->load->view('post_login/footer');
		}
	}
	public function cr_reportcomp()
	{

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$row['crnotes'] = $this->FertilizerModel->get_crnote_comp_report($this->input->post('comp_id'));

			$this->load->view('post_login/fertilizer_main');
			$this->load->view('report/cr_recomp', $row);
			$this->load->view('post_login/footer');
		} else {
			$row['company'] = $this->FertilizerModel->f_select('mm_company_dtls', NULL, NULL, 0);
			$this->load->view('post_login/fertilizer_main');
			$this->load->view('report/cr_recomp', $row);
			$this->load->view('post_login/footer');
		}
	}

	public function cr_reporremain()
	{

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$row['crnotes'] = $this->FertilizerModel->get_crnote_comp_report($this->input->post('comp_id'));

			$row['reamts'] = $this->FertilizerModel->get_crnote_remain_report($this->input->post('comp_id'));



			$this->load->view('post_login/fertilizer_main');
			$this->load->view('report/cr_reremain_amt', $row);
			$this->load->view('post_login/footer');
		} else {
			$row['company'] = $this->FertilizerModel->f_select('mm_company_dtls', NULL, NULL, 0);
			$this->load->view('post_login/fertilizer_main');
			$this->load->view('report/cr_reremain_amt', $row);
			$this->load->view('post_login/footer');
		}
	}
	public function f_trial()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$report_date = $_POST['ip_date'];
			$this->load->view('post_login/finance_main');
			$row['data'] = $this->FinanceModel->f_trial_balance($report_date);
			$row['date'] = array($report_date);
			$this->load->view('trail', $row);
			$this->load->view('post_login/footer');
		} else {
			$this->load->view('post_login/finance_main');
			$this->load->view('ip_date');
			$this->load->view('post_login/footer');
		}
	}

	public function f_cash_bk()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$from_date = $_POST['start_dt'];
			$to_date   = $_POST['end_dt'];
			$this->load->view('post_login/finance_main');
			$row['data'] = $this->FinanceModel->f_cash_book($from_date, $to_date);
			$row['op_bal'] = $this->FinanceModel->f_opening_bal($from_date, $_SESSION['cash_code']);
			$row['cl_bal'] = $this->FinanceModel->f_closing_bal($to_date, $_SESSION['cash_code']);
			$row['date'] = array($from_date, $to_date);
			$this->load->view('cash_book', $row);
			$this->load->view('post_login/footer');
		} else {
			$this->load->view('post_login/finance_main');
			$this->load->view('cash_book_date');
			$this->load->view('post_login/footer');
		}
	}

	// Code for Debit Note Districtwise Report Developed by lokesh 16/04/2020 ////	

	public function dr_reportdis()
	{

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$row['sales'] = $this->FertilizerModel->get_drdist_report($this->input->post('branch_id'));

			$this->load->view('post_login/fertilizer_main');
			$this->load->view('report/dr_redis', $row);
			$this->load->view('post_login/footer');
		} else {
			$row['districts'] = $this->FertilizerModel->f_select('md_district', NULL, NULL, 0);
			$this->load->view('post_login/fertilizer_main');
			$this->load->view('report/dr_redis', $row);
			$this->load->view('post_login/footer');
		}
	}

	public function f_advfwdstatus(){
		$advfwdid = trim($this->input->get('advfwdid'));
		

		
		$where = array(	
						'fwd_flag' => 'Y',
					   	'comp_pay_flag' => 'Y',
					  	'fwd_receipt_no' => $advfwdid);
		$result   = $this->PurchaseModel->f_select('tdf_adv_fwd', array('count(*) cnt'),$where, 1);
		
		
		// $this->session->set_userdata(array("advance_Forward_No" =>$result->cnt ));
		echo $result->cnt;

	}

	public function f_advfwdprodcomp(){
		$advfwdid = trim($this->input->get('advfwdid'));
		$company_id = trim($this->input->get('company_id'));
		$product_id = trim($this->input->get('product_id'));
		$result=$this->PurchaseModel->f_adv_fwd_product($advfwdid,$company_id,$product_id);
		// print_r($result);
		// exit();
		if(!empty($result)){
			if($result->no_of_fwd > 0){
				echo 1;
			}else{
				echo 0;
			}
		}else{
			echo 0;
		}


	}


	public function f_adv_use_checked(){
		$advfwdid = trim($this->input->get('advfwdid'));
		$result=$this->PurchaseModel->f_adv_use_checked($advfwdid);
		if(!empty($result)){
			echo $result->cnt;
		}else{
			echo 0;
		}
	}

	public function purackw()
	{
		if ($this->input->post()) {
			$from_date = $this->input->post('from_date');
			$to_date = $this->input->post('to_date');
			$br_cd         = $this->session->userdata['loggedin']['branch_id'];
			$fin_id        = $this->session->userdata['loggedin']['fin_id'];
			$select = array('a.*','b.COMP_NAME','c.PROD_DESC');
			$where = array('a.comp_id = b.COMP_ID'=> NULL,'a.prod_id = c.PROD_ID'=> NULL,'a.branch_id' =>$br_cd,'a.fin_id'=>$fin_id );
			$bank['data']  = $this->PurchaseModel->f_select('td_purchase_ackw a,mm_company_dtls b,mm_product c',$select,$where,0);
			$this->load->view("post_login/fertilizer_main");
			$this->load->view("purchase_ackw/dashboard", $bank);
			$this->load->view('search/search');
			$this->load->view('post_login/footer');
		} else {
			$todayday = date('Y-m-d');
			$br_cd         = $this->session->userdata['loggedin']['branch_id'];
			$fin_id        = $this->session->userdata['loggedin']['fin_id'];
			$select = array('a.*','b.COMP_NAME','c.PROD_DESC');
			$where = array('a.comp_id = b.COMP_ID'=> NULL,'a.prod_id = c.PROD_ID'=> NULL,'a.branch_id' =>$br_cd,'a.fin_id'=>$fin_id );
			$bank['data']  = $this->PurchaseModel->f_select('td_purchase_ackw a,mm_company_dtls b,mm_product c',$select,$where,0);

			$this->load->view("post_login/fertilizer_main");
			$this->load->view("purchase_ackw/dashboard", $bank);
			$this->load->view('search/search');
			$this->load->view('post_login/footer');
		}
	}

	public function pur_ackwadd()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			
			
			$fin_year =  $this->session->userdata['loggedin']['fin_yr'];
			$fin_id = $this->session->userdata['loggedin']['fin_id'];
			$qty           = $this->input->post('qty');
			$br_cd       = $this->session->userdata['loggedin']['branch_id'];
			$data_array = array(

				'trans_dt'     => date('Y-m-d'),
				'memo_no'      => $this->input->post('memo_no'),
				"comp_id"      => $this->input->post('comp_id'),
				"prod_id"      => $this->input->post('prod_id'),
				"no_of_days"   => $this->input->post('no_of_days'),
				"qty"          =>  $this->input->post('qty'),
				'del_qty'      =>  $this->input->post('del_qty'),
				'del_dt'       => $this->input->post('del_date'),
				"branch_id"    => $this->session->userdata['loggedin']['branch_id'],
				"fin_id"       => $fin_id,
				"created_by"   =>  $this->session->userdata['loggedin']['user_name'],
				"created_dt"   =>  date('Y-m-d h:i:s'),
				"created_ip"   =>  $_SERVER['REMOTE_ADDR']
				
			);
				$this->PurchaseModel->f_insert('td_purchase_ackw', $data_array);

				$this->session->set_flashdata('msg', 'Successfully Added');
				redirect('stock/purackw');


		} else {

			$br_cd      = $this->session->userdata['loggedin']['branch_id'];
			$select1          = array("comp_id", "comp_name");
			$data['compdtls']   = $this->PurchaseModel->f_select('mm_company_dtls', $select1, NULL, 0);
			$data['days']   = $this->PurchaseModel->f_select('md_days', NULL, NULL, 0);
			$this->load->view('post_login/fertilizer_main');
			$this->load->view("purchase_ackw/add", $data);
			$this->load->view('post_login/footer');
		}
	}
/////////////////////////////////
public function pur_ackwedit(){

	$prod_id = $this->input->get('prod_id');

	if($_SERVER['REQUEST_METHOD'] == "POST") {

		$data_array = array(

				"remarks" 				=> $this->input->post('remarks'),

				"modified_ip"    	=>  $_SERVER['REMOTE_ADDR'],
				
				"modifed_by"  			=>  $this->session->userdata['loggedin']['user_name'],
               
				"modifed_dt"  			=>  date('Y-m-d h:i:s')	
			);

		$where = array(
            "receipt_no"     		    =>  $this->input->post('receipt_no')
		);
		 

		$this->PurchaseModel->f_edit('td_purchase_ackw', $data_array, $where);

		$this->session->set_flashdata('msg', 'Successfully Updated');

		// redirect('adv/advancefilter');

	}else{
			$select = array(
						"trans_dt",

						"receipt_no",

						"soc_id",
					
						"trans_type",

					    "cshbnk_flag",
						
						"adv_amt",

						"bank",
						
						"remarks" ,
						"referenceNo"                         
				);

			$where = array(

				"memo_no" => $this->input->get('memo_no')
				
                );
			$select2          		= array("sl_no","bank_name");
			$where2                 = array(
                "dist_cd"  =>  $this->session->userdata['loggedin']['branch_id']
            );    
            $select1          		= array("soc_id","soc_name");
            
            $where1                 = array(
                "district"  =>  $this->session->userdata['loggedin']['branch_id']
            );       

			
			$data['mempDtls']        = $this->PurchaseModel->f_get_memo_dtls($this->input->get('memo_no'),$prod_id);
			

			$data['societyDtls']    = $this->PurchaseModel->f_select("mm_ferti_soc",$select1,$where1,0);
			$selectprod         = array("prod_id","prod_desc");
			$data['proddtls']    = $this->PurchaseModel->f_select("mm_product",$selectprod,NULL,0);  
			$selectcompany         = array("comp_id","comp_name");
			$data['compdtls']   = $this->PurchaseModel->f_select('mm_company_dtls',$selectcompany,NULL,0);
            $this->load->view('post_login/fertilizer_main');

            $this->load->view("purchase_ackw/edit",$data);
 
            $this->load->view("post_login/footer");
	}
}


//////////////////////////

// public function purackdtladd(){
// 	$prod_id = $this->input->get('prod_id');
// 	if($_SERVER['REQUEST_METHOD'] == "POST") {

// 		$transNo = $this->PurchaseModel->get_trans_no($this->session->userdata['loggedin']['fin_id']);
				
// 		$data  = array (
// 				'soc_id'      => 0,

// 				'trans_dt'    =>  $this->input->post('trans_dt'),

// 				"trans_no"	  =>  $transNo->trans_no,

// 				"catg"	  =>  $this->input->post('catg'),

// 				'tot_amt'     => $this->input->post('tot_amt'),

// 				"comp_id"	  => $this->input->post('comp_id'),		

// 				'branch_id'   => $this->session->userdata['loggedin']['branch_id'],

// 				"remarks"     => $this->input->post('remarks'),

// 				"note_type"	  => 'C',

// 				"fin_yr"      => $this->session->userdata['loggedin']['fin_id'],
				
// 				'created_by'  => $this->session->userdata['loggedin']['user_name'],

// 				'created_dt'  =>  date('Y-m-d h:i:s')

// 			);
						
// 				$this->PurchaseModel->f_insert('tdf_dr_cr_note', $data);
						
// 				$this->session->set_flashdata('msg', 'Successfully Added');

// 				redirect('drcrnote/cr_note');
				
// 	}else {

// 			$wheres = array(

// 			"district" => $this->session->userdata['loggedin']['branch_id']
				
// 			);
// 			$data['mempDtls']        = $this->PurchaseModel->f_get_memo_dtls($this->input->get('memo_no'),$prod_id);
// 			$select1   				= array("soc_id","soc_name","soc_add","gstin");

// 			$product['socdtls']   	= $this->PurchaseModel->f_select('mm_ferti_soc',$select1,$wheres,0);

// 			$select 				= array("COMP_ID comp_id","COMP_NAME comp_name");

// 			//  $data['proddtls']    = $this->PurchaseModel->f_select("mm_product",$selectprod,NULL,0);  
// 			$selectcompany         = array("comp_id","comp_name");
// 			$data['compdtls']   = $this->PurchaseModel->f_select('mm_company_dtls',$selectcompany,NULL,0);
// 			$this->load->view('post_login/fertilizer_main');
		
// 			 $this->load->view("purchase_ackw/purdtladd",$product);
// 			//$this->load->view("purchase_ackw/purdtladd");
		
// 			$this->load->view('post_login/footer');
// 	}

// }

public function purackdtladd(){

	if($_SERVER['REQUEST_METHOD'] == "POST") {
		$tot_amt   = $this->input->post('tot_amt');
		// $transNo = $this->DrcrnoteModel->get_trans_no($this->session->userdata['loggedin']['fin_id']);
		for($i = 0; $i < count($tot_amt); $i++){		
		$data  = array (
				'memo_no'      =>  $this->input->post('memo_no'),
				
				'qty'     => $_POST['tot_amt'][$i],

				"prod_id"	  => $this->input->post('prod_id'),

				"soc_id"	  =>$_POST['soc_id'][$i],		
				
				'created_by'  => $this->session->userdata['loggedin']['user_name'],

				'created_dt'  =>  date('Y-m-d h:i:s')

			);
						
				$this->PurchaseModel->f_insert('td_purchase_ackw_dtls', $data);
						
				$this->session->set_flashdata('msg', 'Successfully Added');
		}
				redirect('stock/purackw');
				
	}else {

			$wheres = array(

			"district" => $this->session->userdata['loggedin']['branch_id']
				
			);
			
			$prod_id = $this->input->get('prod_id');
			$wherep = array('prod_id' =>$prod_id );
			$product['mempDtls']        = $this->PurchaseModel->f_get_memo_dtls($this->input->get('memo_no'),$prod_id);
            
			$select2   				= array("PROD_ID","PROD_DESC");

			$product['prodtls']   	= $this->PurchaseModel->f_select('mm_product',$select2,$wherep,1);
			$select1   				= array("soc_id","soc_name","soc_add","gstin");

			$product['socdtls']   	= $this->PurchaseModel->f_select('mm_ferti_soc',$select1,$wheres,0);

			$select 				= array("COMP_ID comp_id","COMP_NAME comp_name");

			$product['compdtls']    = $this->PurchaseModel->f_select('mm_company_dtls',$select,NULL,0);
			$product['catdtls']   = $this->PurchaseModel->f_select('mm_cr_note_category',NULL,NULL,0);
			$this->load->view('post_login/fertilizer_main');
		
			$this->load->view("purchase_ackw/purdtladd",$product);
		
			$this->load->view('post_login/footer');
	}

}
/////////////////////////////

public function purackdtledit(){

	if($_SERVER['REQUEST_METHOD'] == "POST") {
		$tot_amt   = $this->input->post('tot_amt');
		// $transNo = $this->DrcrnoteModel->get_trans_no($this->session->userdata['loggedin']['fin_id']);
		for($i = 0; $i < count($tot_amt); $i++){		
		$data  = array (
				'memo_no'      =>  $this->input->post('memo_no'),
				
				'qty'     => $this->input->post('qty'),

				"prod_id"	  => $this->input->post('prod_id'),		
		
				'created_by'  => $this->session->userdata['loggedin']['user_name'],

				'created_dt'  =>  date('Y-m-d h:i:s')

			);
						
				$this->PurchaseModel->f_insert('td_purchase_ackw_dtls', $data);
						
				$this->session->set_flashdata('msg', 'Successfully Added');
		}
				redirect('stock/purackw');
				
	}else {

			$wheres = array(

			"district" => $this->session->userdata['loggedin']['branch_id']
				
			);
			$memo_no=$this->input->get('memo_no');
			$prod_id = $this->input->get('prod_id');
			$wherep = array('prod_id' =>$prod_id );
			$product['mempDtls']    = $this->PurchaseModel->f_get_memo_dtls($this->input->get('memo_no'),$prod_id);
			$product['mempDts']    = $this->PurchaseModel->f_get_memo_dtls_nw($this->input->get('memo_no'),$prod_id);
			$wheredtl = array('a.prod_id' =>$prod_id,'a.memo_no'=>$memo_no,'a.soc_id=b.soc_id'=> NULL );
			$select3   				= array("a.memo_no","a.prod_id","b.soc_name","a.soc_id","a.qty");
			$select2   				= array("PROD_ID","PROD_DESC");

			$product['prodtls']   	= $this->PurchaseModel->f_select('mm_product',$select2,$wherep,1);
			$select1   				= array("soc_id","soc_name","soc_add","gstin");

			$product['socdtls']   	= $this->PurchaseModel->f_select('mm_ferti_soc',$select1,$wheres,0);

			$select 				= array("COMP_ID comp_id","COMP_NAME comp_name");

			$product['compdtls']    = $this->PurchaseModel->f_select('mm_company_dtls',$select,NULL,0);
			$product['catdtls']     = $this->PurchaseModel->f_select('mm_cr_note_category',NULL,NULL,0);

			$product['purdtls']    = $this->PurchaseModel->f_select('td_purchase_ackw_dtls a ,mm_ferti_soc b',$select3 ,$wheredtl,0);
		
			$this->load->view('post_login/fertilizer_main');
		
			$this->load->view("purchase_ackw/purdtlsedit",$product);
		
			$this->load->view('post_login/footer');
	}

}

////////////////upload test/////////////
// 🔹 Upload Page
public function upload()
    {
        $this->load->view('purchase/upload_invoice');
    }

    // Upload + OCR + Insert
	public function upload_invoice()
    {
        $config['upload_path']   = './application/uploads/invoices/';
        $config['allowed_types'] = 'pdf';
        $config['max_size']      = 5120;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('invoice')) {
            echo $this->upload->display_errors();
            return;
        }

        $file     = $this->upload->data();
        $pdf_path = $file['full_path'];

        // ---- Windows paths ----
        $poppler   = '"C:\poppler\Library\bin\pdftoppm.exe"';
        $tesseract = '"C:\Program Files\Tesseract-OCR\tesseract.exe"';

        $output = FCPATH . 'application/uploads/invoices/invoice_' . time();

        // PDF → PNG
        shell_exec($poppler . ' -r 300 -png "' . $pdf_path . '" "' . $output . '"');

        // OCR
        $text = '';
        foreach (glob($output . '-*.png') as $img) {
            $text .= shell_exec($tesseract . ' "' . $img . '" stdout');
        }

        if (trim($text) === '') {
            echo "❌ OCR failed";
            return;
        }

        /* =========================================================
           AUTO COMPANY DETECTION
        ========================================================= */
        if (stripos($text, 'INDIAN POTASH LIMITED') !== false) {

            $invoice = $this->parse_ipl_invoice($text);
            $invoice['comp_id']     = 3;      // IPL
            $invoice['comp_acc_cd']= 4938;
            // $invoice['prod_id']    = 1019;

        } elseif (stripos($text, 'IFFCO') !== false) {

            $invoice = $this->parse_iffco_invoice($text);
            $invoice['comp_id']     = 1;      // IFFCO
            $invoice['comp_acc_cd']= 4937;
            // $invoice['prod_id']    = 1019;

        } else {
            echo "❌ Unknown invoice format";
            echo "<pre>".htmlspecialchars($text)."</pre>";
            return;
        }

        if (empty($invoice['invoice_no'])) {
            echo "❌ Invoice number not detected";
            return;
        }

        // Insert DB
        $result = $this->PurchaseModel->insert_purchase($invoice);

        if (!$result['status']) {
            echo "❌ " . $result['msg'];
            return;
        }

        echo "✅ Invoice uploaded successfully";
    }

    // 🔒 PRIVATE PARSER
	private function parse_iffco_invoice($text)
{
    // -------------------------------
    // Normalize OCR text
    // -------------------------------
    $clean = strtoupper($text);
    $clean = str_replace(',', '', $clean);
    $clean = preg_replace('/\s+/', ' ', $clean);

    // -------------------------------
    // Invoice Details
    // -------------------------------
    preg_match('/INVOICE\s*NO\s*([A-Z0-9\/\-]+)/', $clean, $inv);
    preg_match('/INVOICE\s*DATE\s*(\d{2}-[A-Z]{3}-\d{2,4})/', $clean, $dt);
    preg_match('/RO\s*NO\s*([A-Z0-9\/\-]+)/', $clean, $ro);

    // -------------------------------
    // PRODUCT NAME (EXCLUDE MFMS)
    // -------------------------------
    $product_name = '';

    // Case 1: MFMS exists → cut BEFORE MFMS
    if (preg_match(
        '/DESCRIPTION OF GOODS\s+(.+?)(?=\s+M\s*F\s*M\s*S|\s+MFMS)/i',
        $clean,
        $pm
    )) {
        $product_name = $pm[1];

    // Case 2: MFMS missing → cut before next section
    } elseif (preg_match(
        '/DESCRIPTION OF GOODS\s+(.+?)(?=\s+NO\.?\s*OF\s*BAGS|\s+QUANTITY|\s+NET)/i',
        $clean,
        $pm
    )) {
        $product_name = $pm[1];
    }

    // Cleanup product name
    if ($product_name !== '') {
        $product_name = trim($product_name);
        $product_name = preg_replace('/\s+/', ' ', $product_name);
        $product_name = preg_replace('/[^A-Z0-9:\- ]/', '', $product_name);
    }

    // -------------------------------
    // 🔥 ALERT & EXIT (DEBUG MODE)
    // -------------------------------
    // if ($product_name === '') {
    //     echo "<script>alert('PRODUCT NAME NOT FOUND');</script>";
    //     exit;
    // }

    // echo "<script>alert('PRODUCT NAME: " . addslashes($product_name) . "');</script>";
    // exit;

    // ------------------------------   -------------------
    // BELOW CODE WILL NOT EXECUTE (INSERT DISABLED)
    // -------------------------------------------------

    // Quantity & Bags
    preg_match('/NO\.?\s*OF\s*BAGS.*?(\d+)/', $clean, $bags);
    preg_match('/QUANTITY.*?([\d]+(?:\.\d+)?)/', $clean, $qty);

    // Amounts
    preg_match('/NET\s*TAXABLE\s*PRICE.*?([\d\.]+)/', $clean, $base);
    preg_match('/CGST.*?([\d\.]+)/', $clean, $cgst);
    preg_match('/SGST.*?([\d\.]+)/', $clean, $sgst);
    preg_match('/NET\s*AMOUNT.*?([\d\.]+)/', $clean, $net);

    // Product ID fetch
    $prod_id   = 0;
    $alert_msg = '';

    if ($product_name !== '') {

        if (preg_match('/(NPK|DAP)\s*(\d+)[^0-9]+(\d+)[^0-9]+(\d+)/', $product_name, $m)) {
            $regex = $m[1] . '.*' . $m[2] . '.*' . $m[3] . '.*' . $m[4];
        } elseif (preg_match('/UREA\s*(\d+)/', $product_name, $m)) {
            $regex = 'UREA.*' . $m[1];
        } else {
            $regex = str_replace(' ', '.*', $product_name);
        }

        $q = $this->db->query("
            SELECT prod_id
            FROM mm_product
            WHERE UPPER(prod_desc) REGEXP ?
            LIMIT 1
        ", [$regex]);

        // if ($q->num_rows() > 0) {
        //     $prod_id = (int)$q->row()->prod_id;
        // } else {
        //     $alert_msg = 'Product not found in master: ' . $product_name;
        // }
    }

    // Final return (unreachable now)
    return [
        'invoice_no'   => $inv[1] ?? '',
        'invoice_dt'   => isset($dt[1]) ? date('Y-m-d', strtotime($dt[1])) : null,
        'ro_no'        => $ro[1] ?? '',
        'product_name' => $product_name,
        'prod_id'      => $prod_id,
		'qty'          => 0,
        'no_of_bags'   => (int)$bags,
		'base_price'   => isset($base[1]) ? (float)$base[1] : 0,
		'cgst'         => isset($cgst[1]) ? (float)$cgst[1] : 0,
        'sgst'         => isset($sgst[1]) ? (float)$sgst[1] : 0,
		'net_amt'      => isset($net[1]) ? (float)$net[1] : 0,
        'alert'        => $alert_msg
    ];
}

	
	
	
	private function parse_ipl_invoice($text)
{
    // -------------------------------
    // Normalize OCR text
    // -------------------------------
    $clean = strtoupper($text);
    $clean = str_replace(',', '', $clean);
    $clean = preg_replace('/\s+/', ' ', $clean);

    // -------------------------------
    // Invoice No / Date / DC No
    // -------------------------------
    preg_match('/INVOICE\s*[:\-]?\s*(\d{6,})/i', $clean, $inv);
    preg_match('/INVOICE\s*DATE\s*[:\-]?\s*(\d{2}\.\d{2}\.\d{4})/i', $clean, $dt);
    preg_match('/DC\s*NO\s*[:\-]?\s*(\d+)/i', $clean, $dc);

    // -------------------------------
    // 🔹 PRODUCT NAME (OCR SAFE)
    // Example: MOP 31042000 30.000 MT
    // -------------------------------
    $product_name = '';

    if (preg_match('/\b(MOP|DAP|UREA|SOP|NPK)\b/i', $clean, $pm)) {
        $product_name = strtoupper($pm[1]);
    }

    // -------------------------------
    // 🔹 Quantity (MT)
    // -------------------------------
    $qty_mt = 0;
    if (preg_match('/(\d+(?:\.\d+)?)\s*MT\b/', $clean, $qm)) {
        $qty_mt = (float)$qm[1];
    }

    // Bags (50 KG per bag)
    $bags = ($qty_mt > 0) ? ($qty_mt * 1000) / 50 : 0;

    // -------------------------------
    // Amounts
    // -------------------------------
    preg_match('/TAXABLE\s*AMT.*?([\d\.]+)/i', $clean, $base);
    preg_match('/CGST.*?RS\s*([\d\.]+)/i', $clean, $cgst);
    preg_match('/SGST.*?RS\s*([\d\.]+)/i', $clean, $sgst);
    preg_match('/TOTAL\s*AMOUNT.*?RS\s*([\d\.]+)/i', $clean, $net);

    // -------------------------------
    // 🔹 PRODUCT ID (DYNAMIC & SAFE)
    // -------------------------------
    $prod_id = 0;

    if ($product_name !== '') {
        $q = $this->db->query("
            SELECT MIN(prod_id) AS prod_id
            FROM mm_product
            WHERE COMPANY = 3
              AND PROD_DESC LIKE ?
        ", ['%' . $product_name . '%']);

        $r = $q->row();
        $prod_id = $r ? (int)$r->prod_id : 0;
    }

    // -------------------------------
    // FINAL RETURN
    // -------------------------------
    return [
        'invoice_no'   => $inv[1] ?? '',
        'invoice_dt'   => isset($dt[1]) ? date('Y-m-d', strtotime($dt[1])) : null,
        'ro_no'        => $dc[1] ?? '',
        'product_name'=> $product_name,
        'prod_id'      => $prod_id,   // ✅ WILL BE 20
        'qty'          => $qty_mt,
        'no_of_bags'   => (int)$bags,
        'base_price'   => isset($base[1]) ? (float)$base[1] : 0,
        'cgst'         => isset($cgst[1]) ? (float)$cgst[1] : 0,
        'sgst'         => isset($sgst[1]) ? (float)$sgst[1] : 0,
        'net_amt'      => isset($net[1]) ? (float)$net[1] : 0
    ];
}

	
/////////
	public function pur_ackwrep()
	{
		if ($this->input->post()) {
			$from_date = $this->input->post('from_date');
			$dist_id = $this->input->post('dist_id');
			$br_cd         = $this->session->userdata['loggedin']['branch_id'];
			$fin_id        = $this->session->userdata['loggedin']['fin_id'];
			$select = array('a.*','b.COMP_NAME','c.PROD_DESC');
			$where = array('a.comp_id = b.COMP_ID'=> NULL,'a.prod_id = c.PROD_ID'=> NULL,'a.branch_id' =>$dist_id,'a.fin_id'=>$fin_id );
			$bank['data']  = $this->PurchaseModel->f_select('td_purchase_ackw a,mm_company_dtls b,mm_product c',$select,$where,0);
			$bank['district']  = $this->PurchaseModel->f_select('md_branch',NULL,NULL,0);
			$this->load->view("post_login/fertilizer_main");
			$this->load->view("purchase_ackw/dashboard_rep", $bank);
			$this->load->view('search/search');
			$this->load->view('post_login/footer');
		} else {
			$todayday = date('Y-m-d');
			$br_cd         = $this->session->userdata['loggedin']['branch_id'];
			$fin_id        = $this->session->userdata['loggedin']['fin_id'];
			$select = array('a.*','b.COMP_NAME','c.PROD_DESC');
			$where = array('a.comp_id = b.COMP_ID'=> NULL,'a.prod_id = c.PROD_ID'=> NULL,'a.branch_id' =>$br_cd,'a.fin_id'=>$fin_id );
			$bank['data']  = $this->PurchaseModel->f_select('td_purchase_ackw a,mm_company_dtls b,mm_product c',$select,$where,0);
			$bank['district']  = $this->PurchaseModel->f_select('md_branch',NULL,NULL,0);
			$this->load->view("post_login/fertilizer_main");
			$this->load->view("purchase_ackw/dashboard_rep", $bank);
			$this->load->view('search/search');
			$this->load->view('post_login/footer');
		}
	}

	public function ajaxackwrep()
	{
		$dist_id = $this->input->post('br_id');
		$br_cd         = $this->session->userdata['loggedin']['branch_id'];
		$fin_id        = $this->session->userdata['loggedin']['fin_id'];
		$select = array('a.memo_no','a.qty','b.COMP_NAME','c.PROD_DESC','d.invoice_dt as trans_dt','d.no_of_days','(select count(*) from tdf_company_payment e where d.ro_no=e.pur_ro ) as cnt');
		$where = array('a.comp_id = b.COMP_ID'=> NULL,'b.comp_id = d.COMP_ID'=> NULL,'a.prod_id = c.PROD_ID'=> NULL,'c.prod_id = d.PROD_ID'=> NULL,'a.memo_no = d.indent_memo_no'=> NULL,
		'a.branch_id' =>$dist_id,'a.fin_id'=>$fin_id);

		 $bank['data']  = $this->PurchaseModel->f_select('td_purchase_ackw a,mm_company_dtls b,mm_product c,td_purchase d',$select,$where,0);
		//$bank['data']  = $this->PurchaseModel->f_get_ack($dist_id,$fin_id);
		
		$page_data = $this->load->view("purchase_ackw/ackwdtls", $bank, true);
	
		$array = array('status' => '1', 'error' => '', 'page' => $page_data);
		echo json_encode($array);
	}
	// public function ajaxackwrep()
	// {
	// 	$dist_id = $this->input->post('br_id');
	// 	$fin_id  = $this->session->userdata['loggedin']['fin_id'];
	
	// 	$sql = "
	// 		SELECT 
	// 			a.memo_no,
	// 			a.qty,
	// 			b.COMP_NAME,
	// 			c.PROD_DESC,
	// 			d.invoice_dt AS trans_dt,
	// 			d.no_of_days,
	// 			COUNT(e.pur_ro) AS cnt
	// 		FROM td_purchase_ackw a
	// 		JOIN mm_company_dtls b 
	// 			ON a.comp_id = b.COMP_ID
	// 		JOIN mm_product c 
	// 			ON a.prod_id = c.PROD_ID
	// 		JOIN td_purchase d 
	// 			ON a.memo_no = d.indent_memo_no
	// 			AND b.comp_id = d.COMP_ID
	// 			AND c.prod_id = d.PROD_ID
	// 		LEFT JOIN tdf_company_payment e 
	// 			ON d.ro_no = e.pur_ro
	// 		WHERE a.branch_id = ?
	// 		AND a.fin_id = ?
	// 		GROUP BY 
	// 			a.memo_no,
	// 			a.qty,
	// 			b.COMP_NAME,
	// 			c.PROD_DESC,
	// 			d.invoice_dt,
	// 			d.no_of_days
	// 	";
	
	// 	$query = $this->db->query($sql, [$dist_id, $fin_id]);
	// 	$bank['data'] = $query->result();
	
	// 	$page_data = $this->load->view("purchase_ackw/ackwdtls", $bank, true);
	
	// 	echo json_encode([
	// 		'status' => '1',
	// 		'error'  => '',
	// 		'page'   => $page_data
	// 	]);
	// }
	

}