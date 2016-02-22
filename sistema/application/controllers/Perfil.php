<?php
defined('BASEPATH') OR exit('No direct script access allowed');




class Perfil extends MY_Controller

    {


    public function __construct()
    {
        parent::__construct();

        $this->getUser()->getRole() != '' ? :
            redirect(site_url().'/login/determinaDashboard');

        $this->load->model('users_model');

    }



    public function index()

    {

        $usuario['perfil'] = $this->getUser();

        $data['title'] = 'Editar Perfil';
        $data['content'] = $this->load->view('usuario/perfil_view',$usuario,TRUE);
        $this->load->view('template/template_view',$data);

    }


    public function update()

    {





    }












    public function photo_uploader()

    {

        $this->load->view('usuario/profile_photo_uploader_view');

    }

    public function upload_profile_photo()

    {

        $date_dir = 'profile_photos/';

        $config['upload_path'] = 'uploads/profile_photos/';

        $config['allowed_types'] = 'gif|jpg|JPG|png';

        $config['max_size'] = '5120';



        $this->load->library('upload', $config);

        $this->upload->display_errors('', '');



        if($this->upload->do_upload('photoimg'))

        {

            $data = $this->upload->data();

            $this->load->helper('date');

            $format = 'DATE_RFC822';

            $time = time();



            $media['media_name'] 		= $data['file_name'];

            $media['media_url']  		= base_url().'uploads/profile_photos/'.$data['file_name'];

            $media['create_time'] 		= standard_date($format, $time);

            $media['status']			= 1;



            create_square_thumb('./uploads/profile_photos/'.$data['file_name'],'./uploads/profile_photos/thumb/');



            $status['error'] 	= 0;

            $status['name']	= $data['file_name'];

        }

        else

        {

            $errors = $this->upload->display_errors();

            $errors = str_replace('<p>','',$errors);

            $errors = str_replace('</p>','',$errors);

            $status = array('error'=>$errors,'name'=>'');

        }

        echo json_encode($status);

        die;

    }






    }