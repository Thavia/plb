<?php

use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;

defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * @property  Cursos_model cursos_model
 * @property Gerencianet api
 */
class GerenciaNetApi {

    protected  $api;




    function __construct()

    {
        $apiKey = get_settings('site_settings', 'gerencianet_apikey');
        $apiSecret = get_settings('site_settings', 'gerencianet_apisecret');

        $options = [
            'client_id' => $apiKey,
            'client_secret' => $apiSecret,
            'sandbox' => ENVIRONMENT == 'development' ? true : false
        ];

        $this->api = new Gerencianet($options);
    }


    public function criaPlanoAssinatura($planoNome, $intervalo, $duracao)

    {

        $body = [
            'name' => $planoNome,
            'interval' => intval($intervalo),
            'repeats' => intval($duracao)
        ];

        $plan = $this->api->createPlan([], $body);


        return $plan;

    }

    /**
     * @param $planoId
     * @param array $produtos  ['nome'=>'Produto 1', 'qnt' => 1, 'valor' => 39900],
     *                         ['nome'=>'Produto 2', 'qnt' => 1, 'valor' => 29900]
     * @return mixed
     */
    public function criaSubscription ($planoId, Array $produtos)

    {



        $params = ['id' => intval($planoId)];

        $items = array();
        foreach ($produtos as $produto){

        $items[] =
            [ 'name' => $produto['name'], 'amount' => $produto['amount'], 'value' => intval( preg_replace('/\D/', '',$produto['value'])) ];

        }

        $body = [ 'items' => $items ];


        $subscription = $this->api->createSubscription($params, $body);

        return $subscription;

    }

    public function geraPagamentoPorBoleto($charge_id, $usuario, $dadosMatricula) {



        $params = [
            'id' => $charge_id
        ];

        $customer = $this->geraCustomerInfo($usuario);

        $bankingBillet = [
            'expire_at' => $dadosMatricula['data_vencimento'],
            'customer' => $customer
        ];

        $payment = [
            'banking_billet' => $bankingBillet
        ];

        $body = [
            'payment' => $payment
        ];

        try {
            $charge = $this->api->payCharge($params, $body);

             } catch (GerencianetException $e) {
            print_r($e->error);
            print_r($e->errorDescription);
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
        return $charge;


    }


    public function geraPagamentoPorCC($charge_id, $usuario, $paymentToken){



        $params = [
            'id' => $charge_id
        ];

        $customer = $this->geraCustomerInfo($usuario);

        $creditCard = [
            'installments' => 1,
            'billing_address' => $customer['address'],
            'payment_token' => $paymentToken,
            'customer' => $customer
        ];

        $payment = [
            'credit_card' => $creditCard
        ];

        $body = [
            'payment' => $payment
        ];



        try {
            $charge = $this->api->payCharge($params, $body);

        } catch (GerencianetException $e) {
            print_r($e->error);
            print_r($e->errorDescription);
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
        return $charge;

    }

    public function geraCustomerInfo($usuario){


        $addres = explode(',', $usuario->endereco);
        $billingAddress = [
            'street' => $addres[0],
            'number' => intval($addres[1]),
            'neighborhood' => $usuario->bairro,
            'zipcode' => preg_replace('/\D/', '',$usuario->cep),
            'city' => $usuario->cidade,
            'state' => $usuario->estado,
        ];

        $customer = [
            'name' => $usuario->nome,
            'cpf' => preg_replace('/\D/', '', $usuario->cpf),
            'phone_number' => preg_replace('/\D/', '', $usuario->telefone1),
            'email' => $usuario->email,
            'birth' => $usuario->data_nascimento,
            'address' => $billingAddress
        ];

        if($usuario->pessoa_tipo == 'juridica'){

            $juridical_data = [
                'corporate_name' => $usuario->razao_social,
                'cnpj' => preg_replace('/\D/', '',$usuario->cnpj)
            ];

            $customer = [
                'juridical_person' => $juridical_data
            ];

        }

        return $customer;



    }

    public function getNotification($token) {




        $params = [
            'token' => $token
        ];

        try {
            $notification = $this->api->getNotification($params, []);

            print_r($notification);
        } catch (GerencianetException $e) {
            print_r($e->error);
            print_r($e->errorDescription);
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }

    public function updateCharge($chargeId, $faturaId) {



        $body = [
            'custom_id' => "$faturaId",
            'notification_url' => site_url('api/notificacao')
        ];

        $params = [
            'id' => $chargeId
        ];


            $charge = $this->api->updateChargeMetadata($params, $body);



        return $charge;

    }






}









