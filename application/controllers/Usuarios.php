<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * @property Users_model $users_model
 */
class Usuarios extends MY_Controller {



    public function __construct()
    {
        parent::__construct();

        $this->getUser()->getRole() == 'admin' ? :
            redirect(site_url().'/login/determinaDashboard');

        $this->load->model('users_model');
        $this->per_page = 30;
    }

    public function index()
    {


        $this->home();


    }


    public function home($start=0){

        $filtros = array();
        $dados['role'] = $this->getUser()->getRole();

        $dados['usuarios'] = $this->users_model->getUsers($filtros, $start, $this->per_page);

        $total 				= $this->users_model->countUsers($filtros);

        $dados['pages']		= configPagination('usuarios',$total,2,$this->per_page);

        $data['title'] = 'Usuários Cadastrados';
        $data['content'] = $this->load->view('usuario/lista',$dados,TRUE);


        $this->load->view('template/template_view',$data);

    }






}