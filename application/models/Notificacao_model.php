<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * @property  CI_DB db
 */
class Notificacao_model extends CI_Model {


    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function addToken($token){


        $dados['token'] = $token;

        $this->db->insert('notificacao_token', $dados);


    }


}