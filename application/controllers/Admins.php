<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends CI_Controller {

    protected $sysdate;

    public function __construct(){

        //$this->sysdate  = $_SESSION['sys_date'];

        parent::__construct();

        //For Individual Functions
        $this->load->model('Admin');

        //For User's Authentication
        if(!isset($this->session->userdata['loggedin']['user_id'])){
            
            redirect('User_Login/login');

        }
        
    }

    /*********************For User Screen********************/
    
    public function index() {
        
        //Retriving User Details
        if($this->session->userdata['loggedin']['ho_flag']=="N")  {   
			$where = array("branch_id"=>$this->session->userdata['loggedin']['branch_id'],"user_status"=>'A');
            $user['user_dtls']    =   $this->Admin->f_get_particulars("md_users", NULL,$where, 0);
			$this->load->view('post_login/fertilizer_main');
			$this->load->view("user/dashboard", $user);
			$this->load->view('post_login/footer');	

        }
        // else{
		// 	$user['user_dtls']    =   $this->Admin->f_get_particulars("md_users", NULL,NULL, 0);
		// 	$this->load->view('post_login/fertilizer_main');
		// 	$this->load->view("user/dashboardho", $user);
		// 	$this->load->view('post_login/footer');
         
        // }
		
        
    }
	
	public function get_userlist(){
        if($this->session->userdata['loggedin']['ho_flag']=="N")  { 
		$select = array('a.*','b.branch_name');
		$where  = array("a.branch_id = b.id" => NULL,
						"a.user_status ="=>$this->input->get('user_status'),
						"a.branch_id ="=>$this->session->userdata['loggedin']['branch_id'],
                    );
        $user   = $this->Admin->f_get_particulars("md_users a,md_branch b", NULL,$where, 0);
		echo json_encode($user);
        }else{
            // echo json_encode($this->input->get('branch'));
            // exit();
            if($this->input->get('branch')!= 0 || $this->input->get('branch')!="0"){
                $select = array('a.*','b.branch_name');
                $where  = array("a.branch_id = b.id" => NULL,
                                "a.branch_id"=> $this->input->get('branch'),
                                "a.user_status ="=>$this->input->get('user_status'));
            }else{
                $select = array('a.*','b.branch_name');
                $where  = array("a.branch_id = b.id" => NULL,
                                "a.user_status ="=>$this->input->get('user_status'));
            }
           
        $user   = $this->Admin->f_get_particulars("md_users a,md_branch b", NULL,$where, 0);
        // echo $this->db->last_query();
		echo json_encode($user);
        }
	}

    //User Add
    public function user_add() {

        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $new_image_name = time() . str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['pic']['name']);

                $config['upload_path']          ='./assets/uploads/';
                $config['allowed_types']        = 'jpeg|jpg|png';
                $config['max_size']             = 2000;
                $config['file_name'] = $new_image_name;
                $this->load->library('upload', $config);
                if($this->upload->do_upload('pic')){
                    $imageDetailArray = $this->upload->data();
                    $data_array = array(
                        "user_id"       =>  trim($this->input->post('user_id')),
                        "emp_code"      =>  $this->input->post('employ_code'),
                        "password"      =>  password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                        "user_name"     =>  $this->input->post('user_name'),
                        "phone_no"     =>   $this->input->post('mobile_no'),
                        "email"         =>  $this->input->post('email'),
                        "branch_id"     =>  $this->session->userdata['loggedin']['branch_id'],
                        "user_status"     =>  'U',
                        "profile_pic"   =>  $imageDetailArray['file_name'],
                        "st"            =>  0,
                        "created_by"    =>  $this->session->userdata['loggedin']['user_name'],
                        "created_dt"    =>  date('Y-m-d h:i:s')
                    );
                    $this->Admin->f_insert('md_users', $data_array);
                    $this->session->set_flashdata('msg', 'Successfully added!');

                    if($this->session->userdata['loggedin']['user_type']=="A"){
                        redirect('userlist_admin');
                    }else{
                        redirect('user');
                    }
                   
                }else{
                   echo  $this->upload->display_errors();
                } 

        }else {
            $this->load->view('post_login/fertilizer_main');
            $this->load->view("user/add");
            $this->load->view('post_login/footer');
        }
        
    }

    //User edit
    public function user_edit() {

        if($_SERVER['REQUEST_METHOD'] == "POST") {
			
			$where  =   array(

                    "user_id"     =>  $this->input->post('user_id')
            );
			if($this->session->userdata['loggedin']['ho_flag']!="Y") {

                $new_image_name = time() . str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['pic']['name']);

                $config['upload_path']          ='./assets/uploads/';
                $config['allowed_types']        = 'jpeg|jpg|png';
                $config['max_size']             = 2000;
                $config['file_name'] = $new_image_name;
                $this->load->library('upload', $config);
                if($this->upload->do_upload('pic')){
                    $imageDetailArray = $this->upload->data();
                    unlink("./assets/uploads/".$this->input->post('imgh'));
                        $data_array = array(
                            
                                "emp_code"      =>  $this->input->post('employ_code'),
                                // "password"      =>  password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                                "user_name"     =>  $this->input->post('user_name'),
                                "phone_no"     =>   $this->input->post('mobile_no'),
                                "email"         =>  $this->input->post('email'),
                                "profile_pic"   =>  $imageDetailArray['file_name'],
                                "st"            =>  0,
                                "modified_by"    =>  $this->session->userdata['loggedin']['user_name'],
                                "modified_dt"    =>  date('Y-m-d h:i:s')
                        );
                        
                    }else{
                        $data_array = array(
                            
                            "emp_code"      =>  $this->input->post('employ_code'),
                            "password"      =>  password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                            "user_name"     =>  $this->input->post('user_name'),
                            "phone_no"     =>   $this->input->post('mobile_no'),
                            "email"         =>  $this->input->post('email'),
                            // "branch_id"     =>  $this->session->userdata['loggedin']['branch_id'],
                            // "profile_pic"   =>  $imageDetailArray['file_name'],
                            "st"            =>  0,
                            "modified_by"    =>  $this->session->userdata['loggedin']['user_name'],
                            "modified_dt"    =>  date('Y-m-d h:i:s')



                            // "user_name "    =>  $this->input->post('name'),
                            // "user_status"    =>  $this->input->post('user_status'),
                            // "user_type"      =>  $this->input->post('user_type'),
                            // "modified_by"    =>  $this->session->userdata['loggedin']['user_name'],
                            // "modified_dt"    =>  date('Y-m-d h:i:s')
                    );
                    }
                $this->Admin->f_edit('md_users', $data_array, $where);
			}else{
            //unset($data_array);

			$data_array = array(

				"user_name "    =>  $this->input->post('name'),
				
				"emp_code"      =>  $this->input->post('emp_code'),
				
				// "designation"   =>  $this->input->post('designation'),

				"modified_by"   =>  $this->session->userdata['loggedin']['user_name'],

				"modified_dt"   =>  date('Y-m-d h:i:s')

			);

            $where  =   array(

                "user_id"     =>  $this->input->post('user_id')
            );

            $this->Admin->f_edit('md_users', $data_array, $where);
			}

            $this->session->set_flashdata('msg', 'Successfully edited!');

            redirect('user');


        }
        else {
            $user['user_dtls']    =   $this->Admin->f_get_particulars("md_users", NULL, array( "user_id" => $this->input->get('user_id')), 1);

            $this->load->view('post_login/fertilizer_main');

            $this->load->view("user/edit", $user);

            $this->load->view('post_login/footer');

        }
        
    }

    //User delete
    public function f_user_delete() {

        $where = array(
            
            "user_id"    =>  $this->input->get('user_id')
            
        );

        //Retriving the data row for backup
        $select = array (

            "user_id", "password", "user_name", "user_type", "user_status"

        );

        $data   =   (array) $this->Admin->f_get_particulars("md_users", $select, $where, 1);


        $audit  =   array(
            
            'deleted_by'    => $this->session->userdata['loggedin']['user_name'],
            
            'deleted_dt'    => date('Y-m-d h:i:s')

        );

        //Inserting Data
        $this->Admin->f_insert('md_users_deleted', array_merge($data, $audit));

        $this->session->set_flashdata('msg', 'Successfully deleted!');

        $this->Admin->f_delete('md_users', $where);

        redirect("admin/user");

    }

    public function userlist_admin(){
        $where  = array("a.branch_id = b.id" => NULL,
						"a.user_status ="=>"A"

                    );
        $select="*";
        $user['user_dtls']    =   $this->Admin->f_get_particulars("md_users a,md_branch b", $select,$where, 0);
        // echo $this->db->last_query();
        // exit();
        $user['branch']    =   $this->Admin->f_get_particulars("md_branch b", NULL,NULL, 0);
			$this->load->view('post_login/fertilizer_main');
			$this->load->view("user/dashboardho", $user);
			$this->load->view('post_login/footer');
    }


    public function user_edit_admin(){
        if($_SERVER['REQUEST_METHOD'] == "POST") {
           
			
			$where  =   array("user_id"     =>  $this->input->post('user_id'));
                        $data_array = array(
                            "approve_by"     =>$this->session->userdata['loggedin']['user_name'],
                            "approve_dt"        => date('Y-m-d h:i:s'),
                            "user_type"     =>$this->input->post('userType'),
                            "user_status"     =>$this->input->post('userStatus'),
                    );
                $this->Admin->f_edit('md_users', $data_array, $where);

                $where2 = array("user_id"=>$this->input->post('user_id'));
                $userData=$this->Admin->f_get_particulars("md_users", null, $where2, 1);
        

// print_r($userData);
// exit();
// phone_no
// email
// profile_pic
// approve_by
// approve_dt
                $data=array(
                    "password"=>$userData->password,
                    "user_type"=>$this->input->post('userType'),
                    "user_name"=>$userData->user_name,
                    "emp_code"=>$userData->emp_code, 
                    "designation"=>"",
                    "user_status"=>$this->input->post('userStatus'),
                    "branch_id"=>$userData->branch_id,
                    "st"=>$userData->st,

                    "phone_no"=>$userData->phone_no,
                    "email"=>$userData->email,
                    "profile_pic"=>$userData->profile_pic,
                    "approve_by"=>$userData->approve_by,
                    "approve_dt"=>$userData->approve_dt,
                    "created_by"=>$userData->created_by,
                    "created_dt"=>$userData->created_dt, 
                    "modified_by"=>$userData->modified_by, 
                    "modified_dt"=>$userData->modified_dt
                );
                if($this->input->post('userType')=='M'||$this->input->post('userType')=='A'){
                    if($this->Admin->find_fin_user($userData->user_id) != 0){
                        // print_r($data);
                        $this->Admin->update_fin_user($data,$userData->user_id);
                    }else{
                        $data['user_id']=$userData->user_id;
                        $this->Admin->insert_fin_user($data);
                    }
                }
                
			

            $this->session->set_flashdata('msg', 'Successfully edited!');

            redirect('userlist_admin');


        }else {
            $user['user_dtls']    =   $this->Admin->f_get_particulars("md_users", NULL, array( "user_id" => $this->input->get('user_id')), 1);

            $this->load->view('post_login/fertilizer_main');

            $this->load->view("user/edit_admin", $user);

            $this->load->view('post_login/footer');

        } 
    }

    public function checked_userid(){
       $data= $this->Admin->checked_userid(trim($this->input->post('user_id')));
        if($data>0){
            echo json_encode(true);
        }else{
            echo json_encode(false);
        }
        
    }

}    