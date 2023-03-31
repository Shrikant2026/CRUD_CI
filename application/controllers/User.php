<?php

class user extends CI_Controller {

	public $user;

   /**
    * Get All Data from this method.
    *
    * @return Response
   */
   public function __construct() {
   	parent::__construct(); 


   	$this->load->library('form_validation');
   	$this->load->library('session');
   	$this->load->model('User_model');

      // $this->user = new user_model;
   }

   /**
    * Display Data this method.
    *
    * @return Response
   */

   // function index($userId = null) {

 	// 	print_r($userId);die();
	// 	$users = $this->User_model->getUser($userId);
	// 	print_r($users);die();
	// 	$data = array();
	// 	$data['users'] = $users;
	// 	$this->load->view('list',$data);
	// 	// $db = $this->load->database();
	// 	if ($this->db->conn_id) {
	// 		    echo "Database connection successful.";
	// 		} else {
	// 		    echo "Database connection failed.";
	// 		}
	// 	// if ($this->load->database() == TRUE) {
	// 	// 	echo "yes";
	// 	// } else {
	// 	// 	echo "no";
	// 	// }
   
   // }
   function index($userId = null) {

   	$users = $this->User_model->getUser($userId);
    // print($users);die();
   	$data['users'] = $users;
   	$this->load->view('list',$data);
   }

   function create() {

   	$this->form_validation->set_rules('name', 'name', 'required');
   	$this->form_validation->set_rules('email', 'email', 'required|valid_email');
   	$this->form_validation->set_rules('password', 'password', 'required');

   	if ($this->form_validation->run() == false ) {
   		$this->load->view('create');

   	} else {
   		$formArray = array();
   		$formArray['name'] = $this->input->post('name');
   		$formArray['email'] = $this->input->post('email');
   		$formArray['password'] = $this->input->post('password');
   		$formArray['created_at'] = date('Y-m-d');
   		$this->User_model->create($formArray);
   		$this->session->set_flashdata('success','Record added successfully!');
   		redirect(base_url().'index.php/user/index');

   	}

   }

   function edit($userId = null)	{

   	$user = $this->User_model->getUser($userId);
		// print_r($user);die();
   	$data = array();
   	$data['user'] = $user;

   	$this->form_validation->set_rules('name', 'name', 'required');
   	$this->form_validation->set_rules('email', 'email', 'required|valid_email');
   	$this->form_validation->set_rules('password', 'password', 'required');

   	if ($this->form_validation->run() == false ) {
   		$this->load->view('edit',$data);
   	} else  {
   		$formArray = array();
   		$formArray['name'] = $this->input->post('name');
   		$formArray['email'] = $this->input->post('email');
   		$formArray['password'] = $this->input->post('password');
   		$this->User_model->updateUser($userId,$formArray);
   		$this->session->set_flashdata('success','Record Updated successfully!');
   		redirect(base_url().'index.php/user/index');

   	}

   }

   function delete($userId)  {

   	$user = $this->User_model->getUser($userId);

   	if (empty($user)) {
   		$this->session->set_flashdata('failure','Record not found in databse');
   		redirect(base_url().'index.php/user/index');
   	}
   	
   	$this->User_model->deleteUser($userId);
   	$this->session->set_flashdata('Success','Record deleted successfully');
   	redirect(base_url().'index.php/user/index');
   }

}

?>