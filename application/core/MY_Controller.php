<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once ('User.php');
require_once ('GerenciaNetApi.php');


/**
 * @property  CI_Form_validation form_validation
 */
class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('users_model');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
	}



	protected  function getUser()

	{
		$user = new User($this->session);

		return $user ;


	}










}
