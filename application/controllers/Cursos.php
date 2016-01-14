<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * @property  Users_model $users_model
 * @property  Cursos_model $cursos_model
 */
class Cursos extends MY_Controller


{
    public function __construct()
    {
        parent::__construct();
        $this->getUser()->getRole() != null ? :
            redirect(site_url().'/login/determinaDashboard');
        $this->load->model('cursos_model');
        $this->per_page = 20;


    }

    public function index($start=0)
    {




        $user = $this->getUser();

        $filtro['role'] = $user->getRole();

        $dados['role'] = $filtro['role'];
        $dados['cursos'] = $this->cursos_model->getCursos($filtro, $start,$this->per_page );

        $total 				= $this->cursos_model->countCursos($filtro);

        $dados['pages']		= configPagination('cursos',$total,2,$this->per_page);

        $data['title'] = 'Cursos';

        $data['content'] = $this->load->view('cursos/listaCursos',$dados,TRUE);
        $this->load->view('template/template_view',$data);

    }










}
