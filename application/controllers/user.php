<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



/**
 * Created by PhpStorm.
 * User: tavia
 * Date: 1/11/16
 * Time: 2:53 PM

 * @property Users_model $users_model
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 */

class User extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('users_model');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
	}




	public function login()
	{
		$this->form_validation->set_rules('email', 'email', 'required|valid_email|max_length[256]');
		$this->form_validation->set_rules('password', 'password', 'required|min_length[8]|max_length[256]');
		return Validation::validate($this, '', '', function($token, $output)
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$id = $this->users_model->check_login($email, $password);
			if ($id != false) {
				$token = array();
				$token['id'] = $id;
				$output['status'] = true;
				$output['email'] = $email;
				$output['token'] = JWT::encode($token, $this->config->item('jwt_key'));
			}
			else
			{
				$output['errors'] = '{"type": "invalid"}';
			}
			return $output;
		});
	}

	public function register()
	{
		$this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[users.email]|max_length[256]');
		$this->form_validation->set_rules('password', 'password', 'required|min_length[8]|max_length[256]');
		return Validation::validate($this, '', '', function($token, $output)
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$this->Users->register($email, $password);
			$output['status'] = true;
			return $output;
		});
	}

	public function permissions()
	{
		$this->form_validation->set_rules('resource', 'resource', 'required');
		return Validation::validate($this, 'user', 'read', function($token, $output)
		{
			$resource = $this->input->post('resource');
			$acl = new ACL();
			$permissions = $acl->userPermissions($token->id, $resource);
			$output['status'] = true;
			$output['resource'] = $resource;
			$output['permissions'] = $permissions;
			return $output;
		});
	}

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */