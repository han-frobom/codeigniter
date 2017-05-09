<?php
class signup extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library(array('session', 'form_validation'));
		$this->load->database();
		$this->load->model('users_model');
	}

	function index()
	{
		$this->load->model('users_model');
		$this->load->view('signup_view');
	}

/*function signup_user()
{
// set form validation rules
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha|min_length[3]|max_length[30]|xss_clean');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|alpha|min_length[3]|max_length[30]|xss_clean');
		$this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email|is_unique[user.email]');
		// $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[cpassword]|md5');
		$this->form_validation->set_rules('password', 'Confirm Password', 'trim|required');
*/
		// submit
		/*if ($this->form_validation->run() == FALSE)
        {
			// fails
			$this->load->view('signup_view');
        }
		else
		{
			//insert user details into db
		$udata['fname'] = $this->input->post('fname');
		$udata['lname'] = $this->input->post('lname');
		$udata['email'] = $this->input->post('email');

		$udata['address'] = $this->input->post('address');

		$udata['mobile'] = $this->input->post('mobile');

		$res = $this->users_model->insert_users_to_db($udata);
			if ($res)
			{
				/*$this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered! Please login to access your Profile!</div>');
				redirect('signup/index');
				/*echo "success";
			}
			else
			{
				// error
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
				redirect('signup/index');
			}
		}
	}*/
 function signup_user() {

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
}
