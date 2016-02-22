<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * @property  Users_model $users_model
 * @property  Agenda_model $agenda_model
 * @property  FAturas_model $faturas_model
 */
class DashboardAdmin extends MY_Controller


{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->model('agenda_model');
        $this->load->model('faturas_model');
        $this->getUser()->getRole() == 'admin' ? :
            redirect(site_url().'/login/determinaDashboard');


    }

    public function index()
    {


        $this->home();


    }

    public function home()

    {

        $dados['agenda'] = $this->agenda_model->getEventos();

        $dados['faturamentoMes'] = $this->faturas_model->getFaturamentoMes("status = 'Pagamento Confirmado' ");

        $filtro['role'] = 'estudante';
        $dados['totalAlunos'] = $this->users_model->getUsers($filtro)->num_rows();
        $filtro['role'] = 'professor';
        $dados['totalProfessores'] = $this->users_model->getUsers($filtro)->num_rows();

        $data['title'] = 'Dashboard';
        $data['content'] = $this->load->view('template/dashboard',$dados,TRUE);
        $this->load->view('template/template_view',$data);

    }










}
