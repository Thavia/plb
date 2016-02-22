<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * @property  Users_model $users_model
 * @property  Cursos_model $cursos_model
 * @property  CI_Form_validation form_validation
 * @property  CI_Input input
 * @property  CI_Session session
 * @property  Faturas_model faturas_model
 */
class Faturas extends MY_Controller


{
    public function __construct()
    {
        parent::__construct();

        $user = $this->getUser();

        if ($user->getRole() != 'admin' && $user->getRole() != 'secretaria') {

            redirect(site_url($user->getRole()));


        }
        $this->load->model('cursos_model');
        $this->load->model('faturas_model');
        $this->per_page = 10;
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->gnApi = new GerenciaNetApi();
    }

    public function index($start = 0)
    {


        $dados['role'] = $this->getUser()->getRole();

        $dados['faturas'] = $this->faturas_model->getFaturas(null, $start, $this->per_page);

        $total = $this->faturas_model->countFaturas(null);

        $dados['pages'] = configPagination('faturas/index', $total, 2, $this->per_page);

        $data['title'] = 'Faturas';

        $data['content'] = $this->load->view('faturas/listaFaturas', $dados, TRUE);
        $this->load->view('template/template_view', $data);

    }
}