<?php

/**
 * Created by PhpStorm.
 * User: tavia
 * Date: 1/11/16
 * Time: 2:53 PM
 * @property Users_model $users_model
 *@property  CI_Session $session
 */


class Login extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('users_model');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
    }

    function index($data='')
    {
        $data['logo'] = get_site_logo();
        $this->load->view('template/login_view', $data);
    }

    /**
     *
     */
    function logar ()
    {

        $user_name = $this->input->post('username');
        $password  = $this->input->post('password');
        $query = $this->users_model->check_login($user_name,$password);



        if($query->num_rows()>0)

        {
            $perfil = $this->users_model->getPerfil($query->row()->id);
            $encoded = json_encode($perfil);
            $this->users_model->set_login_cookie($perfil->email);
            $this->session->set_userdata('user',$encoded);


        }

        else
        {

            $data = array('error'=>'<div class="alert alert-danger" style="margin-top:10px;">Login Incorreto</div>');
            return $this->index($data);
        }

        return $this->determinaDashboard();


    }


    function logout()
    {
        delete_cookie('key','localhost','/','mycookie_');
        delete_cookie('user','localhost','/','mycookie_');
        $this->session->sess_destroy();
        redirect(site_url());
    }



    function  determinaDashboard ()

    {



        if($this->session->userdata('user')) {

            $user = $this->getUser();
            switch ($user->getRole()) {

                case 'admin':
                    redirect(site_url() . '/admin');
                    break;
                case 'financeiro':
                    redirect(site_url() . '/financeiro');
                    break;
                case 'professor':
                    redirect(site_url() . '/professor');
                    break;
                case 'estudante':
                    redirect(site_url() . '/estudante');
                    break;
                default:
                    redirect(site_url() . '/login');

            }
        }
        else
        {

            redirect(site_url() . '/login');
        }

    }






}