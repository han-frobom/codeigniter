<?php
class Uploadfile extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model('users_model');
	}
	function index(){
		$this->load->view('upload_file_view');
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
}