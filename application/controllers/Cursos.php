<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * @property  Users_model $users_model
 * @property  Cursos_model $cursos_model
 * @property  CI_Form_validation form_validation
 * @property  CI_Input input
 * @property  CI_Session session
 * @property  Faturas_model faturas_model
 * @property  CI_Upload upload
 */
class Cursos extends MY_Controller


{
    public function __construct()
    {
        parent::__construct();
        $this->getUser()->getRole() != null ? :
            redirect(site_url().'/login/determinaDashboard');
        $this->load->model('cursos_model');
        $this->load->model('faturas_model');
        $this->per_page = 20;
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->gnApi =    new GerenciaNetApi();
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

    public function novo ()


    {
        $user = $this->getUser();

        if($user->getRole() != 'admin') {

            redirect(site_url($user->getRole()));
        }

        $data['title'] = 'Novo Curso';

        $data['content'] = $this->load->view('cursos/novoCurso','',TRUE);
        $this->load->view('template/template_view',$data);




    }
    public function editar ($cursoId) {

        $user = $this->getUser();

        if($user->getRole() != 'admin') {

            redirect(site_url($user->getRole()));
        }

        $dados['curso'] = $this->cursos_model->findOneBy(array('id' => $cursoId));
        $data['title'] = 'Novo Curso';
        $data['content'] = $this->load->view('cursos/novoCurso',$dados,TRUE);
        $this->load->view('template/template_view',$data);



    }
    public function create()

    {
        $this->load->helper('security');
        $this->form_validation->set_rules('nome',	'Nome', 'required');
        $this->form_validation->set_rules('descricao',	'Descrição', 'required');
        $this->form_validation->set_rules('duracao',	'Duração', 'required');
        $this->form_validation->set_rules('valor',	'Valor', 'required');

        if ($this->form_validation->run() == FALSE)

        {

            $this->novo();

        }

        else
        {

            $data['nome'] = $this->input->post('nome');
            $data['descricao'] = $this->input->post('descricao');
            $data['valor'] = str_replace(',','.',$this->input->post('valor'));
            $data['duracao'] =  $this->input->post('duracao');

            $this->cursos_model->addCurso($data);

            $this->session->set_flashdata('msg',
                '<div class="alert alert-success">Curso Cadastrado  com sucesso </div>');

            redirect(site_url('cursos'));


        }





    }
    public function update(){


        $this->form_validation->set_rules('nome',	'Nome', 'required');
        $this->form_validation->set_rules('descricao',	'Descrição', 'required');
        $this->form_validation->set_rules('duracao',	'Duração', 'required|numeric');
        $this->form_validation->set_rules('valor',	'Valor', 'required');

        $id = $this->input->post('id');

        if ($this->form_validation->run() == FALSE)

        {

            $this->editar($id);

        }
        else {

            $data['nome'] = $this->input->post('nome');
            $data['descricao'] = $this->input->post('descricao');
            $data['duracao'] = $this->input->post('duracao');
            $data['valor'] = $this->input->post('valor');



            try{

                $this->cursos_model->update($data, $id);
            }
            catch(Exception $e){


                $this->session->set_flashdata('msg',
                    '<div class="alert alert-success">'.$e->getMessage().'</div>');
            }


            $this->session->set_flashdata('msg',
                '<div class="alert alert-success">Curso Atualizado  com sucesso </div>');

            redirect(site_url('cursos'));

        }
    }
    public function delete($id){

        try {

            $this->cursos_model->delete($id);
        }
        catch(Exception $e){

            $this->session->set_flashdata('msg',
                '<div class="alert alert-danger">'.$e->getMessage().'</div>');
        }

    }
    public function apagarSelecionados()


    {

        $ids = $this->input->post('data');

        $response = array();
        foreach ($ids as $id) {

            if ($this->cursos_model->findMatriculaBy(['fk_curso' => $id], FALSE)
                    ->num_rows() == 0
            )
            {
                $this->delete($id);
                $response['apagados'][] = "O curso id $id foi excluído com sucesso";
            }


            else
               $response['naoApagados'][] = "O curso id $id não pode ser excluído";

        }

        $this->output->set_content_type('application/json');
        $json = $this->output->set_output(json_encode($response));

            return $json;

    }

    ## Material de Apoio ##

    public function novoMaterial($cursoId){

        $user = $this->getUser();

        if($user->getRole() != 'admin' && 'professor') {

            redirect(site_url($user->getRole()));
        }

        $data['curso'] = $this->cursos_model->findOneBy(['id' => $cursoId]);
        $data['title'] = 'Novo Material para o curso'. $data['curso']->nome;

        $data['content'] = $this->load->view('cursos/novoMaterial',$data,TRUE);
        $this->load->view('template/template_view',$data);


    }

    public function addProfessor($cursoId){

        $user = $this->getUser();

        if($user->getRole() != 'admin') {

            redirect(site_url($user->getRole()));
        }

        $data['curso'] = $this->cursos_model->findOneBy(['id' => $cursoId]);
        $professores = $this->users_model->getUsers(['role' => 'professor'],null, null, true);

        $profs =[];
        foreach ($professores as $row)       {

            $profs[] =  [

                'id' => $row->fk_user,
                'text' => $row->nome,
                'email' => $row->email

            ];

        }
        $data['profs'] = json_encode($profs);
        $data['title'] = 'Novo Professor para o curso '. $data['curso']->nome;

        $data['content'] = $this->load->view('cursos/novoProfessor',$data,TRUE);
        $this->load->view('template/template_view',$data);


    }
    public function salvarProfessor(){

        $data['fk_curso'] = $this->input->post('fk_curso');
        $data['fk_user'] = $this->input->post('professor');

        $this->cursos_model->addUserToCurso($data);


        $this->session->set_flashdata('msg',
            '<div class="alert alert-success">Professor Adicionado com sucesso </div>');

        redirect(site_url('cursos'));


    }
    public function salvarMaterial()

    {

        $materialTipo = $this->input->post('tipo');
        $id = $this->input->post('id');

        $dados['tipo'] = $materialTipo;
        $dados['fk_curso'] = $id;


        $data['curso']   = $this->cursos_model->findOneBy(['id' =>$id]);

        if($materialTipo == 'file')
        {



            $config['upload_path'] = 'uploads/material';
            $config['allowed_types'] = 'pdf|jpg|png';
            $config['max_size']    = '1000000';
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('file'))
            {
                $data['content'] = $this->upload->display_errors();

            }
            else
            {

                $dados['filename'] =  $this->upload->data('orig_name');

                if($this->input->post('file_name'))
                {
                    $dados['filename'] = $this->input->post('file_name').''.$this->upload->data('file_ext');
                }

                $dados['filepath'] = $this->upload->data('file_path');
                $dados['filename_encrypted'] =  $this->upload->data('file_name');


            }



        }

        else
        {
            if($this->input->post('file_name'))
            {
                $dados['filename'] = $this->input->post('file_name');
            }

            $dados['link'] = $this->input->post('link');


        }


        $this->cursos_model->addMaterialToCurso($dados);


        $this->session->set_flashdata('msg',
            '<div class="alert alert-success">Material Adicionado com sucesso </div>');

        redirect(site_url('cursos'));

    }

    ### PROCEDIMENTOS DE MATRICULA ###
    public function matricula($alunoId)


    {
        $user = $this->getUser();

        if($user->getRole() != 'admin' && $user->getRole() != 'secretaria') {

            redirect(site_url($user->getRole()));


        }


        $cursos = $this->cursos_model->getCursos(array(), null,null,true);



        $curso = [];



        foreach ($cursos as $row)       {

            $curso[] =  [

                'id' => $row->id,
                'text' => $row->nome
            ];

        }
        $data['cursos'] = json_encode($curso);

        $data['aluno'] = $this->users_model->getPerfil($alunoId);


        $data['title'] = 'Nova Matrícula';

        $data['content'] = $this->load->view('cursos/matricula',$data,TRUE);
        $this->load->view('template/template_view',$data);


    }
    public function processarPagamento()

    {
        /** Gerar Fatura da Matricula */


        $matricula = json_decode($this->input->post('data', TRUE), true);

        $data = [];
        foreach ($matricula as $m){

            if ($m["name"] == "userId") {
                $data['userId'] = $m["value"];
            }

            if ($m["name"] == "curso") {
                $data['curso'] = $m["value"];
            }

            if ($m["name"] == "duracao") {
                $data['duracao'] = $m["value"];
            }
            if ($m["name"] == "forma_pagamento") {
                $data['forma_pagamento'] = $m["value"];
            }
            if ($m["name"] == "data_vencimento") {
                $data['data_vencimento'] = $m["value"];
            }
        }

        $filtros = array ('id' => $data['curso']);

        $dadosMatricula['curso'] = $this->cursos_model->findOneBy($filtros);



        $subscription = $this->criaSubscription($dadosMatricula['curso']->plano_id,
            [$dadosMatricula['curso']]);


        if($subscription['code'] == 200) {

            $cursoUsuario = [
                'fk_curso' => $data['curso'],
                'fk_user' => $data['userId'],
                'forma_pagamento' => $data['forma_pagamento'],
                'duracao' => $data['forma_pagamento'],
                'subs_id' => $subscription['data']['subscription_id']

            ];

            $matriculaId = $this->cursos_model->addUserToCurso($cursoUsuario);


            if ($data['data_vencimento'] != null) {

                $start =  DateTime::createFromFormat('d/m/Y', $data['data_vencimento']);
                $vencimento = $start->format('Y-m-d');

            } else{$vencimento = date('Y-m-d');}

            $data['data_vencimento']= $vencimento;




            $dadosFatura = [

                'fk_user' => $data['userId'],
                'valor'   => $dadosMatricula['curso']->valor,
                'forma_pagamento' =>  $data['forma_pagamento'],
                'data_vencimento' => $vencimento,
                'status' => 'Aguardando Pagamento',
                'fk_matricula' => $matriculaId,
                'charge_id'    => $subscription['data']['charges'][0]['charge_id']
            ];

            $faturaId = $this->faturas_model->addFatura($dadosFatura);

            $usuario = $this->users_model->getPerfil($data['userId']);

            if($data['forma_pagamento'] == 'boleto')

            {

                $retorno = $this->geraPagamentoPorBoleto($subscription, $usuario, $data);

                $boleto = file_get_contents($retorno['data']['link']);
                $retorno['boleto'] = $boleto;
                $this->faturas_model->salvarBoleto(
                    array('boleto' => $boleto,
                        'fk_fatura' => $faturaId));



            }


            if($data['forma_pagamento'] == 'cc')

            {

                $cartao = $this->input->post('cc', false);

                if($cartao['code'] == 200)
                {


                    $paymentToken =
                        [
                            'token' => $cartao['data']['payment_token'],
                            'card_mask' => $cartao['data']['card_mask'],
                            'fk_user' => $data['userId']
                        ];

                    $this->faturas_model->addPaymentToken($paymentToken);


                    $retorno = $this->geraPagamentoPorCC($subscription, $usuario, $cartao);

                }

                else

                {  $this->output->set_content_type('application/json');
                    return $this->output->set_output(json_encode('Cartão de Crédito Inválido'));

                }


            }



        }

        $this->gnApi->updateCharge($subscription['data']['charges'][0]['charge_id'], $faturaId);

        $this->output->set_content_type('application/json');
        $json = $this->output->set_output(json_encode($retorno));

        return $json;


    }
    public function criaSubscription($planoId, Array $cursos)

    {

        $itens =   [];
        foreach ($cursos as $curso)

        {

            $itens =   [
                [ 'name' => $curso->nome, 'amount' => 1, 'value' => $curso->valor ]
            ];
        }

        $subscription = $this->gnApi->criaSubscription($planoId, $itens);

        return $subscription;

    }
    public function geraPagamentoPorBoleto($subscription, $usuario, $dadosMatricula)

    {

        return  $this->gnApi->geraPagamentoPorBoleto($subscription['data']['charges'][0]['charge_id'],
            $usuario, $dadosMatricula);

    }
    public function geraPagamentoPorCC($subscription, $usuario, $cc)

    {

        return  $this->gnApi->geraPagamentoPorCC($subscription['data']['charges'][0]['charge_id'],
            $usuario, $cc['data']['payment_token']);

    }












}
