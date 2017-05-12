<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct() {

		parent::__construct();

		$this->load->helper('url');
    $this->load->library('session');

		$this->load->model('users_model');

	}

	public function index() {

		$data['user_list'] = $this->users_model->get_all_users();
			$this->load->view('layout/header');
		$this->load->view('show_users', $data);
		$this->load->view('layout/footer');

	}
	public function add_form() {
			$this->load->view('layout/header');
		$this->load->view('insert');
		$this->load->view('layout/footer');


	}

	public function insert_new_user() {

		$udata['fname'] = $this->input->post('fname');
		$udata['lname'] = $this->input->post('lname');
		$udata['email'] = $this->input->post('email');

		$udata['address'] = $this->input->post('address');

		$udata['mobile'] = $this->input->post('mobile');
		$udata['password'] = $this->input->post('password');


		$res = $this->users_model->insert_users_to_db($udata);

		if($res){

			header('location:'."http://192.168.33.105/index.php/users/".$this->index());

		}
  }
  function upload(){
		$uploadPath='./upload/';
		$config['upload_path']=$uploadPath;
		$config['allowed_types']='txt|pdf|jpg|png|gif';
		$config['max_size']='1000';
		//load upload lib
		$this->load->library('upload',$config);
		if (!$this->upload->do_upload('filename'))
        {
            // case - failure
            $upload_error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_file_view', $upload_error);
        }
        else
        {
            // case - success
            $upload_data = $this->upload->data();

            $data['success_msg'] = '<div class="alert alert-success text-center">Your file <strong>' . $upload_data['file_name'] . '</strong> was successfully uploaded!</div>';
            $this->load->view('upload_file_view', $data);
        }
    }
	public function edit() {
		$id = $this->uri->segment(3);
		$data['user'] = $this->users_model->getById($id);
		$this->load->view('edit', $data);
	}
	public function update() {

		$mdata['fname']=$_POST['fname'];
		$mdata['lname']=$_POST['lname'];


		$mdata['email']=$_POST['email'];

		$mdata['address']=$_POST['address'];

		$mdata['mobile']=$_POST['mobile'];

		$res=$this->users_model->update_info($mdata, $_POST['id']);

		if($res){

			header('location:'.base_url()."index.php/users/".$this->index());

		}

	}
	public function delete($id) {

		$this->users_model->delete_a_user($id);

		$this->index();

	}

}

