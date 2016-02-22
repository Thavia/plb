<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * @property  Users_model $users_model
 * @property  Cursos_model $cursos_model
 * @property  CI_Form_validation form_validation
 * @property  CI_Input input
 * @property  CI_Session session
 * @property  CI_Output output
 * @property  Faturas_model faturas_model
 * @property  CI_Encrypt encrypt
 */
class Usuarios extends MY_Controller {



    public function __construct()
    {
        parent::__construct();

        $this->getUser()->getRole() == 'admin' ? :
            redirect(site_url().'/login/determinaDashboard');

        $this->load->model('users_model');
        $this->per_page = 30;
        $this->load->model('cursos_model');
        $this->per_page = 20;
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

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
    public function novo ()


    {
        $user = $this->getUser();

        if($user->getRole() != 'admin') {

            redirect(site_url($user->getRole()));
        }



        $data['title'] = 'Novo Usuario';

        $data['content'] = $this->load->view('usuario/novoUsuario',$data,TRUE);
        $this->load->view('template/template_view',$data);




    }
    public function create()

    {

        $this->load->helper('security');
        $this->form_validation->set_rules('nome',	'Nome', 'required');
        $this->form_validation->set_rules('email',	'Descrição', 'required');
        $this->form_validation->set_rules('role',	'Grupo de Acesso', 'required');
        $this->form_validation->set_rules('sexo',	'Sexo', 'required');
        $this->form_validation->set_rules('cpf',	'CPF', 'required');

        if ($this->form_validation->run() == FALSE)

        {

            $this->novo();

        }
        else

        {

            /** User Info */
            $this->load->library('encrypt');
            $user['username'] = $this->input->post('email');
            $user['password'] = $this->encrypt->hash('123456');
            $user['email'] = $this->input->post('email');
            $user['status'] =  $this->input->post('status');
            $user['fk_grupo'] =  $this->input->post('role');

            $perfil['fk_user'] = $this->users_model->addUser($user);

            /** Perfil */

            $perfil['nome'] =  $this->input->post('nome');
            $perfil['rg'] =  $this->input->post('rg');
            $perfil['cpf'] =  $this->input->post('cpf');
            $perfil['cep'] =  $this->input->post('cep');
            $perfil['endereco'] =  $this->input->post('endereco');
            $perfil['cidade'] = $this->input->post('cidade');
            $perfil['bairro'] = $this->input->post('bairro');
            $perfil['data_nascimento'] =  $this->input->post('data_nascimento');
            $perfil['endereco'] = $this->input->post('endereco').', '.$this->input->post('numero');
            $perfil['avatar'] =  $this->input->post('avatar');
            $perfil['gender'] =  $this->input->post('sexo');
            $perfil['facebook'] =  $this->input->post('facebook');
            $perfil['telefone1'] =  $this->input->post('tel');
            $perfil['telefone2'] =  $this->input->post('cel');


            $this->users_model->addPerfil($perfil);


            $this->session->set_flashdata('msg', '<div class="alert alert-success">Usuário Cadastrado  com sucesso </div>');


            if ($this->input->post('matricular'))

            {

               redirect(site_url('cursos/matricula/'.$perfil['fk_user']));

            }


            redirect(site_url('usuarios'));




        }

    }
    public function checarEmail ()

    {

        $email = $this->input->get('email', TRUE);

        $check = $this->users_model->checarEmail($email);

        $resposta = [];
        if($check > 0)
        {
            $resposta['status'] = 0;
            $resposta['msg']= '<div class="alert alert-danger">Ja existe um usuario cadstrado com este e-mail</div>';


        }

        else {
            $resposta['status'] = 1;


        }
        $this->output->set_content_type('application/json');
        $json = $this->output->set_output(json_encode($resposta));

        return $json;

    }













}