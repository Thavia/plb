<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * @property  CI_DB db
 */
class Faturas_model extends CI_Model

{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function addFatura($dados){

        unset($dados['duracao']);

        $this->db->insert('faturas', $dados);
        $query = $this->db->insert_id();
        return $query;
    }

    public function addPaymentToken ($dados) {

        $this->db->insert('user_payment_token', $dados);


    }

    public function salvarBoleto($dados){

        $this->db->insert('boleto_fatura', $dados);

    }

    public function getFaturas($filtros = array(), $start, $limit){

        $this->db->select('users_perfil.nome, users_perfil.cpf, users_perfil.id as uid,  faturas.*');
        $this->db->join('users_perfil', 'users_perfil.fk_user = faturas.fk_user','left');

        if ($filtros)
            $query =  $this->db->get_where('faturas', $filtros, $limit, $start);
        else
          $query =  $this->db->get('faturas', $limit, $start);

        return $query;


    }

    public function countFaturas($filtros = array()){

        if ($filtros)
            $query =  $this->db->get_where('faturas', $filtros);

        else
            $query =  $this->db->get('faturas');


        return $query->num_rows();


    }
    public function getFaturamentoMes($where = null, $operador ='AND')

    {
        if($where) {
            if($operador == 'AND')
            $andwhere = "AND $where";
            if($operador == 'OR')
            $andwhere = "OR $where";
        }



       $sql = "SELECT SUM(valor) as valor, status FROM sys_faturas
                WHERE month(data_vencimento) = month(current_date)
                $andwhere
                GROUP BY status";


        return $this->db->query($sql);


    }







}