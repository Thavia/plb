<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * @property  Users_model $users_model
 * @property  Cursos_model $cursos_model
 * @property  CI_Form_validation form_validation
 * @property  CI_Input input
 * @property  CI_Session session
 * @property  Faturas_model faturas_model
 * @property  Notificacao_model notificacaoModel
 */
class Api extends MY_Controller



{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('notificacao_model');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        $this->gnApi =    new GerenciaNetApi();
    }


    public function notificacao()

    {

        $token =  $this->input->post('notification');

        $this->notificacaoModel->addToken($token);

        return $token;


    }

    public function getNotificacao($token)


    {

        $dados = $this->gnApi->getNotification($token);

        var_dump($dados);

    }

    public function update()
    {
        $this->gnApi->updateCharge(4411, '22');

    }









}