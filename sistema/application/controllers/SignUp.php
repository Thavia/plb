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
class SignUp extends MY_Controller
{


    public function __construct()
    {
        parent::__construct();

        $this->load->model('users_model');
        $this->load->model('cursos_model');
        $this->load->model('faturas_model');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->gnApi =    new GerenciaNetApi();
    }

    public function matricula($cursoId=1, $duracao=12)

    {

        $dados['user'] = $this->getUser();
        $dados['duracao'] = $duracao;
        $dados['cursoSelecionado'] = $this->cursos_model->findOneBy(array('id'=>$cursoId));
        $dados['cursos'] =  $this->cursos_model->getCursos();

        $data['content'] = $this->load->view('matricula',$dados,TRUE);
        $this->load->view('template/publico',$data);

    }







    public function createAjax() {

        $data = $this->input->get_post('data');

        $check = $this->users_model->checarEmail($data['email']);
        $response = [];
        if ($check >0)
        {

            $response['erro'] = 'Ja existe um usuario cadastrado com o email'. $data['email'];


        }

        else

        {
            $this->load->library('encrypt');
            $user = ['username' => $data['email'],
                'password' => $this->encrypt->hash($data['senha']),
                'email' => $data['email'],
                'fk_grupo' => 5,
                'status' => 'Aguardando Pagamento'
            ];
            $usuarioCadastrado =  $this->users_model->addUser($user);

            $perfil = [ 'fk_user' => $usuarioCadastrado,
                'nome' => $data['nome'],
                'telefone1' => $data['tel'],
                'cpf'       => $data['cpf']


            ];

            $perfil = $this->users_model->addPerfil($perfil);

            if($perfil > 0)
            {
                $response['sucesso'] = 'Usuario cadastrado com sucesso id:'.$usuarioCadastrado;

            }


        }



        $this->output->set_content_type('application/json');
        $json = $this->output->set_output(json_encode($response));

        return $json;


    }

    public function create() {


        $data = json_decode(file_get_contents('php://input'));
        $check = $this->users_model->checarEmail($data->email);
        $response = [];
        if ($check >0)
        {

            $response['erro'] = 'Ja existe um usuario cadastrado com o email'. $data->email;


        }

        else

        {
            $this->load->library('encrypt');
            $user = ['username' => $data->email,
                'password' => $this->encrypt->hash($data->senha),
                'email' => $data->email,
                'fk_grupo' => 5,
                'status' => 'Aguardando Pagamento'
            ];
            $usuarioCadastrado =  $this->users_model->addUser($user);


            $complemento = null;

            if(isset($data->complemento))
                $complemento=$data->complemento;

            $perfil = [ 'fk_user' => $usuarioCadastrado,
                'nome' => $data->nome,
                'data_nascimento' => formatarDataFromFormat('dmY','Y-m-d',$data->nascimento),
                'telefone1' => $data->telefone,
                'cpf'       => $data->cpf,
                'endereco'  => $data->endereco.','.$data->numero.','.$complemento,
                'cep'       => $data->cep,
                'cidade'    => $data->cidade,
                'bairro'    => $data->bairro,
                'estado'    => $data->estado,
                'pessoa_tipo' => 'fisica'



            ];

            $perfil = $this->users_model->addPerfil($perfil);

            if($perfil > 0)
            {
                $response['sucesso'] = 'Usuario cadastrado com sucesso id:'.$usuarioCadastrado;
                $response['usuario'] = $this->users_model->getPerfil($usuarioCadastrado);

            }


        }



        $this->output->set_content_type('application/json');
        $json = $this->output->set_output(json_encode($response));

        return $json;


    }

    public function checarEmail ()

    {
        $data = json_decode(file_get_contents('php://input'));


        $check = $this->users_model->checarEmail($data->email);

        $resposta = [];
        if($check > 0)
        {
            $resposta['status'] = 'falha';
            $resposta['msg']= '<div class="alert alert-danger">Ja existe um usuario cadstrado com este e-mail</div>';


        }

        else {
            $resposta['status'] = 'sucesso';
            $resposta['msg']= 'E-mail ainda nao cadastrado';


        }
        $this->output->set_content_type('application/json');
        $json = $this->output->set_output(json_encode($resposta));

        return $json;

    }

    public function cursos () {


        $cursos = $this->cursos_model->getCursos();

        $this->output->set_content_type('application/json');
        $json = $this->output->set_output(json_encode($cursos->result()));

        return $json;
    }

    public function addUserToCourse()
    {


        $data = json_decode(file_get_contents('php://input'));

        $matricula['fk_user'] = $data->usuario;
        $matricula['fk_curso'] = $data->curso;
        $matricula['duracao'] = $data->duracao;

        $matricula['id'] = $this->cursos_model->addUserToCurso($matricula);

        $this->output->set_content_type('application/json');
        $json = $this->output->set_output(json_encode($matricula));

        return $json;

    }

    public function gnToken()

    {


   ENVIRONMENT == 'development' ? $token = get_option('cc_dev')->values : $token = get_option('cc_prod')->values;


        $this->output->set_content_type('application/json');
        $json = $this->output->set_output(json_encode($token));
        return $json;

    }

   public function salvarCCToken () {

        $data = json_decode(file_get_contents('php://input'));

        $dados['fk_user'] = $data->user;
        $dados['fk_matricula'] = $data->matricula;
        $dados['token'] = $data->token;
        $dados['card_mask'] = $data->cardmask;

        $this->faturas_model->addPaymentToken($dados);

       $pagamento = $this->gerarPagamento($dados['token'],$dados['fk_matricula']);

       $this->output->set_content_type('application/json');
       $json = $this->output->set_output(json_encode($pagamento));

       return $json;

   }


    /**
     * @param $token
     * @param $matriculaId
     * @return mixed
     */
    public function gerarPagamento($token, $matriculaId){



        $filtros = array ('id' => $matriculaId);

        $dadosMatricula = $this->cursos_model->findMatriculaBy($filtros);
        $usuario = $this->users_model->getPerfil($dadosMatricula->fk_user);
        $curso = $this->cursos_model->findOneBy(array('id' => $dadosMatricula->fk_curso));

        $subscription = $this->criaSubscription($curso->plano_id,
            [$curso]);

        $this->gnApi->updateSubscriptionMetadata($subscription,$matriculaId );

       return $this->geraPagamentoPorCC($subscription,$usuario, $token);

    }



    public function geraPagamentoPorCC($subscription, $usuario, $cctoken)

    {

        return  $this->gnApi->geraPagamentoPorCC($subscription['data']['charges'][0]['charge_id'],
            $usuario, $cctoken);

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

    public function  getSubscription ($subscriptionId) {


        $subscription = $this->gnApi->getSubscription($subscriptionId);


        $this->output->set_content_type('application/json');
        $json = $this->output->set_output(json_encode($subscription));

        return $json;

    }







}
