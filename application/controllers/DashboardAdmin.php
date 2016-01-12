<?php
defined('BASEPATH') OR exit('No direct script access allowed');




class DashboardAdmin extends MY_Controller


{
    public function __construct()
    {
        parent::__construct();

        $this->getUser()->getRole() == 'admin' ? :
            redirect(site_url().'/login/determinaDashboard');


    }

    public function index()
    {


        $this->home();


    }

    public function home($start=0,$sort_by='add_time')

    {


        $data['title'] = 'Dashboard';
        $data['content'] = $this->load->view('template/dashboard','',TRUE);
        $this->load->view('template/template_view',$data);

    }










}
