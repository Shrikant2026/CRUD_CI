<?php

class user extends CI_Controller {

		   public $user;

   /**
    * Get All Data from this method.
    *
    * @return Response
   */
   public function __construct() {
      parent::__construct	(); 	


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

  
   function index($userId = null) {

    $data['users'] = $this->User_model->getUser($userId);
    $this->load->view('list',$data);
   }

	function create() {

      $this->form_validation->set_rules('name', 'name', 'required');
      $this->form_validation->set_rules('email', 'email', 'required|valid_email');
      $this->form_validation->set_rules('password', 'password', 'required');

      if ($this->form_validation->run() == false ) {
         // $this->session->set_flashdata('success','Enter Valid Record !');
      	$this->load->view('create');

      } else {
         $formArray = array();
         // $hash_method = 'PASSWORD_BCRYPT';
         // print_r(password_hash($hash_method,$this->input->post('password')));die;
         $formArray['name'] = $this->input->post('name');
         $formArray['email'] = $this->input->post('email');
         $formArray['password'] = md5($this->input->post('password'));

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
         $this->session->set_flashdata('success','Record updated successfully!');
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