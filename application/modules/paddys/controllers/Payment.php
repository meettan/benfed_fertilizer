<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends MX_Controller {

    public function __construct(){

        parent::__construct();

        $this->load->model('Paddyrep');
        $this->load->model('Paddy');
        $this->load->helper('paddyrate');
        
        //For User's Authentication
        if(!isset($this->session->userdata['loggedin']['user_id'])){
            
            redirect('User_Login/login');

        }
        
    }

    public function f_commission(){

          $select  = array("c.*","s.soc_name");

          $where      =   array(

                "c.soc_id = s.society_code"  => NULL,

                "c.kms_id" => $this->session->userdata['loggedin']['kms_id'],
                "c.branch_id"  => $this->session->userdata['loggedin']['branch_id']
            
            );


        $commission['commission_dtls']    =   $this->Paddy->f_get_particulars("td_society_commision c,md_society s", NULL, $where, 0);

        $this->load->view('post_login/main');

        $this->load->view("commission/dashboard",$commission);
    
        $this->load->view('search/search');

        $this->load->view('post_login/footer');
        
    }
    public function f_commission_add() {

        if($_SERVER['REQUEST_METHOD'] == "POST") {

            $trans_cd = 0;

            $max_trans_no = $this->Paddy->f_get_particulars("td_society_commision", array("MAX(trans_cd) trans_cd"), array('kms_id' => $this->session->userdata['loggedin']['kms_id'],'branch_id' => $this->session->userdata['loggedin']['branch_id']), 1);

            if($max_trans_no){

                $trans_cd = $max_trans_no->trans_cd + 1;

            }
            else {

                $trans_cd = 1;

            }

                $data_array = array(

                    "trans_dt"            =>  $this->input->post('trans_dt'),

                    "trans_cd"            =>  $trans_cd,
    
                    "kms_id"              =>  $this->session->userdata['loggedin']['kms_id'],
    
                    "branch_id"           =>  $this->session->userdata['loggedin']['branch_id'],

                    "block_id"            =>  $this->input->post('block'),

                    "soc_id"              =>  $this->input->post('soc_name'),

                    "mill_id"             =>  $this->input->post('mill_id'),

                    "aggrement_no"        =>  $this->input->post('aggrement_no'),
    
                    "work_order_no"       =>  $this->input->post('work_order_no'),

                    "soc_bill_no"         =>  $this->input->post('soc_bill_no'),
    
                    "soc_bill_date"       =>  $this->input->post('soc_bill_date'),

                    "pool_type"           =>  $this->input->post('pool_type'),

                    "rice_type"           =>  $this->input->post('rice_type'),

                    "rate"                =>  $this->input->post('rate'),
    
                    "qty"                 =>  $this->input->post('qty'),

                    "amount_claimed"      =>  $this->input->post('amount_claimed'),
    
                    "tot_amt"             =>  $this->input->post('tot_amt'),

                    "tds_amt"             =>  $this->input->post('tds_amt'),

                    "paid_amt"            =>  $this->input->post('paid_amt'),

                    "pay_mode"            =>  $this->input->post('pay_mode'),
                      
                    "ref_no"              =>  $this->input->post('ref_no'),

                    "remarks"             =>  $this->input->post('remarks'),
    
                    "created_by"          =>  $this->session->userdata['loggedin']['user_name'],
    
                    "created_dt"          =>  date('Y-m-d')
    
                );

            $this->Paddy->f_insert('td_society_commision', $data_array);

            //For notification storing message
            $this->session->set_flashdata('msg', 'Successfully added!');

            redirect('payment/commission');

        }
        else {

            $where      =   array(

                "branch_id" => $this->session->userdata['loggedin']['branch_id']
            );

            $commission['blocks']    =   $this->Paddy->f_get_particulars("md_block", NULL,$where, 0);
            //Bill Master Details
            $commission['bill_master']  =   $this->Paddy->f_get_particulars("md_comm_params", array('sl_no', 'param_name'), NULL, 0);

            $this->load->view('post_login/main');

            $this->load->view("commission/add", $commission);

            $this->load->view('post_login/footer');

        }
        
    }

    public function f_get_aggrementno(){

          $mill_id = $_GET["mill_id"];
          $soc_id = $_GET["soc_id"];

          $select   =  array("reg_no");
          $selects  =  array("IFNULL(SUM(paddy_qty), 0) paddy_qty");
          $elects   =  array("IFNULL(SUM(qty), 0) qty");

          $where      =   array(

                "kms_id" => $this->session->userdata['loggedin']['kms_id'],
                "mill_id"  => $mill_id,
                "soc_id"   => $soc_id
            );
           $wheres    =   array(

                "kms_year" => $this->session->userdata['loggedin']['kms_id'],
                "mill_id"  => $mill_id,
                "soc_id"   => $soc_id
            );

        $aggrem["reg_no"]  = $this->Paddy->f_get_particulars("md_soc_mill",$select,$where,1);

        $aggrem["paddy_qty"]  = $this->Paddy->f_get_particulars("td_received",$selects,$wheres,1);

        $aggrem["qty"]  = $this->Paddy->f_get_particulars("td_society_commision",$elects,$where,1);
        
        echo json_encode($aggrem);

    }

    public function f_commision_rate(){


        $rice_type = $_GET["rice_type"];

         $select     =   array("rate");

          $where      =   array(

                "kms_id" => $this->session->userdata['loggedin']['kms_id'],
                "rice_type"   => $rice_type
            );

        $rate  = $this->Paddy->f_get_particulars("md_soc_commision_rate",$select,$where,1);
        
        echo json_encode($rate);


    }

    public function f_commission_edit(){

        if($_SERVER['REQUEST_METHOD'] == "POST") {

              //Bill Details
            $data = (explode("/",$this->input->post('trans_cd')));

            $where  =   array(

                "trans_cd"   => $data["0"],
                "branch_id"  => $data["1"],
                "kms_id"     => $data["2"]
            );

                $data_array = array(


                    "trans_dt"            =>  $this->input->post('trans_dt'),

                    "block_id"            =>  $this->input->post('block'),

                    "soc_id"              =>  $this->input->post('soc_name'),

                    "mill_id"             =>  $this->input->post('mill_id'),

                    "aggrement_no"        =>  $this->input->post('aggrement_no'),
    
                    "work_order_no"       =>  $this->input->post('work_order_no'),

                    "soc_bill_no"         =>  $this->input->post('soc_bill_no'),
    
                    "soc_bill_date"       =>  $this->input->post('soc_bill_date'),

                    "pool_type"           =>  $this->input->post('pool_type'),

                    "rice_type"           =>  $this->input->post('rice_type'),

                    "rate"                =>  $this->input->post('rate'),
    
                    "qty"                 =>  $this->input->post('qty'),

                    "amount_claimed"      =>  $this->input->post('amount_claimed'),
    
                    "tot_amt"             =>  $this->input->post('tot_amt'),

                    "tds_amt"             =>  $this->input->post('tds_amt'),

                    "paid_amt"            =>  $this->input->post('paid_amt'),

                    "pay_mode"            =>  $this->input->post('pay_mode'),
                      
                    "ref_no"              =>  $this->input->post('ref_no'),

                    "remarks"             =>  $this->input->post('remarks'),
    
                    "modified_by"         =>  $this->session->userdata['loggedin']['user_name'],
    
                    "modified_dt"         =>  date('Y-m-d')
    
                );
                
         
            $this->Paddy->f_edit('td_society_commision',$data_array,$where);

            $this->session->set_flashdata('msg', 'Successfully edited!');

            redirect('payment/commission');
        }
        else {

            //Bill Details
            $data = (explode("/",$this->input->get('trans_cd')));

            $where  =   array(

                "trans_cd"   => $data["0"],
                "branch_id"  => $data["1"],
                "kms_id"     => $data["2"]
            );

            $commission['bill_dtl']    =   $this->Paddy->f_get_particulars("td_society_commision",NULL,$where, 1);
            $wheres      =   array(

                "branch_id" => $this->session->userdata['loggedin']['branch_id']
            );
            $commission['blocks']    =   $this->Paddy->f_get_particulars("md_block", NULL,$wheres, 0);
          
            $this->load->view('post_login/main');

            $this->load->view("commission/edit", $commission);

            $this->load->view('post_login/footer');

        }

    }
    public function f_connected_mill(){

        $soc_id = $this->input->get("soc_name");

        $mill_lists= $this->Paddy->f_get_connected_mills($soc_id);
       
        echo json_encode($mill_lists);

    }

    //Commission delete
    public function f_commission_delete() {

        $where = array(
            
            "trans_cd"    => explode("/",$this->input->get('sl_no'))["0"],
            "branch_id"   => explode("/",$this->input->get('sl_no'))["1"],
            "kms_id"      => explode("/",$this->input->get('sl_no'))["2"]
        );

        $this->Paddy->f_delete('td_society_commision',$where);

        $this->session->set_flashdata('msg', 'Successfully Deleted!');

        redirect("payment/commission");

    }

    /*********************For Millers Bill Payment Screen********************/
    #BENFED Paid Mills based on the bill no

    //New Payment Entry

    // public function f_payment() {

    //     //Retriving Bill Payment Details
    //     $payment['payment_dtls']    =   $this->Paddy->f_get_payments();

    //     echo $this->db->last_query();
    //     die();

    //     $this->load->view('post_login/main');

    //     $this->load->view("payment/dashboard", $payment);

    //     $this->load->view('search/search');

    //     $this->load->view('post_login/footer');
        
    // }

    public function f_payment(){

        $payment['payment_dtls']    =   $this->Paddy->f_get_payments();

        $this->load->view('post_login/main');

        $this->load->view("payment/dashboard", $payment);

        $this->load->view('search/search');

        $this->load->view('post_login/footer'); 
        
    }

    //New Bill Payment Add
    public function f_payment_add() {

        if($_SERVER['REQUEST_METHOD'] == "POST") {

            $pmt_bill_no = 0;

            $max_trans_no = $this->Paddy->f_get_particulars("td_payment_bill", array("MAX(pmt_bill_no) pmt_bill_no"), array('kms_year' => $this->session->userdata['loggedin']['kms_id']), 1);

            if($max_trans_no){

                $pmt_bill_no = $max_trans_no->pmt_bill_no + 1;

            }
            else {

                $pmt_bill_no = 1;

            }

            for($i = 0; $i < count($this->input->post('benfed_bill_no')); $i++){

                $data_array = array(

                    "pmt_bill_no"           =>  $pmt_bill_no,
    
                    "trans_dt"              =>  $this->input->post('trans_dt'),
    
                    "kms_year"              =>  $this->session->userdata['loggedin']['kms_id'],
    
                    "soc_id"                =>  $this->input->post('soc_name'),

                    "mill_id"               =>  $this->input->post('mill_name'),
    
                    "dist"                  =>  $this->session->userdata['loggedin']['branch_id'],

                    "tot_paddy"             =>  $this->input->post('totPaddy'),
                    
                    "tot_cmr"               =>  $this->input->post('totCmr'),
    
                    "ben_bill_no"           =>  $this->input->post('benfed_bill_no')[$i],

                    "con_bill_dt"           =>  $this->input->post('confed_bill_date')[$i],
    
                    "mill_bill_no"          =>  $this->input->post('mill_bill_no')[$i],
    
                    "mill_bill_dt"          =>  $this->input->post('mill_bill_date')[$i],
    
                    "paddy_qty"             =>  $this->input->post('qty_paddy')[$i],
    
                    "paddy_cmr"             =>  $this->input->post('qty_cmr')[$i],
    
                    "paddy_butta"           =>  $this->input->post('qty_butta')[$i],

                    "rice_type"             =>  $this->input->post('rice_type'),
                    
                    "pool_type"             =>  $this->input->post('pool_type')[$i],
    
                    "created_by"            =>  $this->session->userdata['loggedin']['user_name'],
    
                    "created_dt"            =>  date('Y-m-d h:i:s')
    
                );
                
                
                $this->Paddy->f_insert('td_payment_bill', $data_array);
    

            }

            for($i = 0; $i < count($this->input->post('particulars')); $i++){

                $data_array = array(

                    "pmt_bill_no"           =>  $pmt_bill_no,
    
                    "trans_dt"              =>  $this->input->post('trans_dt'),
    
                    "account_type"          =>  $this->input->post('particulars')[$i],
    
                    "per_unit"              =>  $this->input->post('rate_per_qtls')[$i],

                    "total_amt"             =>  $this->input->post('amounts')[$i],
    
                    "tds_amt"               =>  $this->input->post('tds_amount')[$i],
    
                    "cgst_amt"              =>  $this->input->post('cgst')[$i],

                    "sgst_amt"              =>  $this->input->post('sgst')[$i],

                    "claim_amt"             =>  $this->input->post('claim_amt')[$i],
    
                    "payble_amt"            =>  $this->input->post('paybel')[$i],
    
                    "created_by"            =>  $this->session->userdata['loggedin']['user_name'],
    
                    "created_dt"            =>  date('Y-m-d h:i:s')
    
                );
                
                
                $this->Paddy->f_insert('td_payment_bill_dtls', $data_array);

            }

            //For notification storing message
            $this->session->set_flashdata('msg', 'Successfully added!');

            redirect('paddy/payment');

        }
        else {

          $where      =   array(
                "branch_id"  => $this->session->userdata['loggedin']['branch_id']
            );


            //District List
           //$payment['dist']      =   $this->Paddy->f_get_particulars("md_district", NULL, NULL, 0);
            $payment['blocks']    =   $this->Paddy->f_get_particulars("md_block", NULL,$where, 0);
            //Bill Master Details
            $payment['bill_master']   =   $this->Paddy->f_get_particulars("md_comm_params", array('sl_no', 'param_name'), NULL, 0);

            $this->load->view('post_login/main');

            $this->load->view("payment/add", $payment);

            $this->load->view('post_login/footer');

        }
        
    }

    //Total No  of Farmer Yet to be paid
    public function f_farmer() {

        //Farmer from Transaction
        $farmer_trans   =   $this->Paddy->f_get_particulars("td_transaction", array("IFNULL(SUM(farmer_no), 0) farmer_no"), array("soc_id" => $this->input->get('society')), 1);

        //Farmer from Bill Payment
        $farmer_pey     =   $this->Paddy->f_get_particulars("td_payment", array("IFNULL(SUM(far_no), 0) farmer_no"), array("soc_id" => $this->input->get('society')), 1);
        
        echo $farmer_trans->farmer_no-$farmer_pey->farmer_no;

    }

    //Total No  of Paddy Yet to be paid
    public function f_paddy() {

        //Paddy from Transaction
        $paddy_trans   =   $this->Paddy->f_get_particulars("td_transaction", array("IFNULL(SUM(progressive), 0) progressive"), array("soc_id" => $this->input->get('society')), 1);

        //Paddy from Bill Payment
        $paddy_pey     =   $this->Paddy->f_get_particulars("td_payment", array("IFNULL(SUM(paddy_qty), 0) progressive"), array("soc_id" => $this->input->get('society')), 1);
        
        echo $paddy_trans->progressive-$paddy_pey->progressive;

    }
    public function wqsc_list() {

        $where = array(

            "soc_name" => $this->input->post("soc_id"),
            "mill_id"  => $this->input->post("mill_id"),
            "kms_id"   => $this->session->userdata['loggedin']['kms_id']
 
             );

          $socmill  =   $this->Paddy->f_get_particulars("td_wqsc",NULL,$where, 0);

         echo json_encode($socmill);

    }
    public function wqsc_qty() {

        $where = array(

            "soc_name" => $this->input->post("soc_id"),
            "mill_id"  => $this->input->post("mill_id"),
            "wqsc_no"  => $this->input->post("wqsc"),
            "kms_id"   => $this->session->userdata['loggedin']['kms_id']
 
             );

          $socmill  =   $this->Paddy->f_get_particulars("td_wqsc",NULL,$where, 1);

         echo json_encode($socmill);

    }

    //Bill Payment edit
    public function f_payment_edit() {

        if($_SERVER['REQUEST_METHOD'] == "POST") {

            $where = array('pmt_bill_no' => $this->input->post('pmt_bill_no'));

            $this->Paddy->f_delete('td_payment_bill', $where);
            $this->Paddy->f_delete('td_payment_bill_dtls', $where);

            for($i = 0; $i < count($this->input->post('benfed_bill_no')); $i++){

                $data_array = array(

                    "pmt_bill_no"           =>  $this->input->post('pmt_bill_no'),
    
                    "trans_dt"              =>  $this->input->post('trans_dt'),
    
                    "kms_year"              =>  $this->kms_year,
    
                    "soc_id"                =>  $this->input->post('soc_name'),

                    "mill_id"               =>  $this->input->post('mill_name'),
    
                    "dist"                  =>  $this->input->post('dist'),

                    "tot_paddy"             =>  $this->input->post('totPaddy'),
                    
                    "tot_cmr"               =>  $this->input->post('totCmr'),
    
                    "ben_bill_no"           =>  $this->input->post('benfed_bill_no')[$i],

                    "con_bill_dt"           =>  $this->input->post('confed_bill_date')[$i],
    
                    "mill_bill_no"          =>  $this->input->post('mill_bill_no')[$i],
    
                    "mill_bill_dt"          =>  $this->input->post('mill_bill_date')[$i],
    
                    "paddy_qty"             =>  $this->input->post('qty_paddy')[$i],
    
                    "paddy_cmr"             =>  $this->input->post('qty_cmr')[$i],
    
                    "paddy_butta"           =>  $this->input->post('qty_butta')[$i],

                    "rice_type"             =>  $this->input->post('rice_type'),

                    "pool_type"             =>  $this->input->post('pool_type')[$i],
    
                    "created_by"            =>  $this->session->userdata('loggedin')->user_name,
    
                    "created_dt"            =>  date('Y-m-d h:i:s')
    
                );
                
                $this->Paddy->f_insert('td_payment_bill', $data_array);

            }

            for($i = 0; $i < count($this->input->post('particulars')); $i++){

                $data_array = array(

                    "pmt_bill_no"           =>  $this->input->post('pmt_bill_no'),
    
                    "trans_dt"              =>  $this->input->post('trans_dt'),
    
                    "account_type"          =>  $this->input->post('particulars')[$i],
    
                    "per_unit"              =>  $this->input->post('rate_per_qtls')[$i],

                    "total_amt"             =>  $this->input->post('amounts')[$i],
    
                    "tds_amt"               =>  $this->input->post('tds_amount')[$i],
    
                    "cgst_amt"              =>  $this->input->post('cgst')[$i],

                    "sgst_amt"              =>  $this->input->post('sgst')[$i],
    
                    "payble_amt"            =>  $this->input->post('paybel')[$i],
    
                    "created_by"            =>  $this->session->userdata('loggedin')->user_name,
    
                    "created_dt"            =>  date('Y-m-d h:i:s')
    
                );
                
                $this->Paddy->f_insert('td_payment_bill_dtls', $data_array);
    
            }    

            //For notification storing message
            $this->session->set_flashdata('msg', 'Successfully edited!');

            redirect('paddy/payment');

        }
        else {

            //District List
            $payment['dist']            =   $this->Paddy->f_get_particulars("md_district", NULL, NULL, 0);
            
            //Bill Master Details
            $payment['bill_master']     =   $this->Paddy->f_get_particulars("md_comm_params", array('sl_no', 'param_name'), NULL, 0);

            //Retriving Bill Payment Details
            $payment['payment_dtls']    =   $this->Paddy->f_get_payment($this->input->get('pmt_bill_no'));

            //Bill Details
            $select =  array(

                "ben_bill_no", "con_bill_dt", "mill_bill_no",
                "mill_bill_dt", "paddy_qty", "paddy_cmr",
                "paddy_butta"

            );

            $where  =   array(

                "pmt_bill_no"   => $this->input->get('pmt_bill_no')
            );

            $payment['bill_dtls']    =   $this->Paddy->f_get_particulars("td_payment_bill", $select, $where, 0);
            
            //Charges for Bill Payment
            unset($select);
            $select =  array(

                "account_type", "per_unit", "total_amt",
                "tds_amt", "cgst_amt", "sgst_amt",
                "payble_amt"

            );
            
            $payment['charges']    =   $this->Paddy->f_get_particulars("td_payment_bill_dtls", $select, $where, 0);

            $this->load->view('post_login/main');

            $this->load->view("payment/edit", $payment);

            $this->load->view('post_login/footer');

        }
        
    }

    //Bill Payment delete
    public function f_payment_delete() {

        $where = array(
            
            "pmt_bill_no"    =>  $this->input->get('sl_no')
            
        );

        $this->Paddy->f_delete('td_payment_bill', $where);
        $this->Paddy->f_delete('td_payment_bill_dtls', $where);

        $this->session->set_flashdata('msg', 'Successfully Deleted!');

        redirect("paddy/payment");

    }

}

?>