<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * @property  CI_DB_active_record db
 */
class Agenda_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getEventos($filtros = array(), $execute = false) {


        $this->db->select('*');
        $this->db->from('agenda');
        $this->db->join('agenda_participantes', 'agenda_participantes.fk_evento = agenda.id','left');
        $this->db->join('users', 'users.id = agenda_participantes.fk_user','inner');
        $this->db->join('users_grupo', 'users.fk_grupo = users_grupo.id','inner');
        $this->db->join('users_perfil', 'users.id = users_perfil.fk_user','inner');

        if(array_key_exists('role',$filtros))
        {

            $this->db->where(array('users_grupo.role' => $filtros['role']));

        }

        if(array_key_exists('userId',$filtros))
        {

            $this->db->where(array('users.id' => $filtros['userId']));

        }


        $query = $this->db->get();

        return $execute == true ? $query->result(): $query;


    }


}