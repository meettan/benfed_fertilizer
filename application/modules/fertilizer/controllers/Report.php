<?php
    class Report extends MX_Controller{

        public function __construct(){

            parent::__construct();

            $this->load->model('ReportModel');

            $this->load->helper('paddyrate');

            $this->session->userdata('fin_yr');
        }

        public function rateslab(){

            if($_SERVER['REQUEST_METHOD'] == "POST") {

               $company     = $_POST['company'];

               $product     = $_POST['product'];

               $select      = array(

                'a.frm_dt',"a.to_dt","a.catg_id","a.sp_mt","a.sp_bag","a.sp_govt","b.cate_desc"

               );

               $where       = array(

                "a.catg_id  =  b.sl_no" => NULL,

                "a.comp_id"     =>  $company,

                "a.prod_id"     =>  $product,

                "a.district"    =>  $this->session->userdata['loggedin']['branch_id'],

                "a.fin_id"      =>  $this->session->userdata['loggedin']['fin_id']

               );

               $data['rate']        =   $this->ReportModel->f_select("mm_sale_rate a,mm_category b", $select, $where, 0);

               $data['company']     =   $this->ReportModel->f_select("mm_company_dtls", NULL, $this->input->POST['company'], 1);

               $data['product']     =   $this->ReportModel->f_select("mm_product", NULL, $this->input->POST['product'], 1);

               $where1              =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);

               $data['branch']      =   $this->ReportModel->f_select("md_district", NULL, $where1, 1);
              
               $this->load->view('post_login/fertilizer_main');
               $this->load->view('report/rate_slab/rate_slab.php',$data);
               $this->load->view('post_login/footer');

            }else{

                $data['company']    =   $this->ReportModel->f_select("mm_company_dtls", NULL, NULL, 0);

              
                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/rate_slab/rate_slab_ip.php',$data);
                $this->load->view('post_login/footer');
            }

        }

        public function popProd(){

            $where  = array('company' => $this->input->get('company'));

            $data     = $this->ReportModel->f_select("mm_product", NULL, $where, 0);

            echo json_encode($data);
        }

        public function stkStmt(){

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                $from_dt    =   $_POST['from_date'];

                $to_dt      =   $_POST['to_date'];

                $_SESSION['date']   =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));

                $data['product']     =   $this->ReportModel->f_get_product_list();

                $where1              =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);

                $data['branch']      =   $this->ReportModel->f_select("md_district", NULL, $where1,1);

                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/stk_stmt/stk_stmt',$data);
                $this->load->view('post_login/footer');

            }else{

                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/stk_stmt/stk_stmt_ip');
                $this->load->view('post_login/footer');
            }

        }
        
    }
?>