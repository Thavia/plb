<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * @property  CI_DB_active_record db
 */
class Users_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function check_login($usuarioOuEmail, $password)
    {
        $this->load->library('encrypt');
        $password = $this->encrypt->hash($password);

        $this->db->where('username', $usuarioOuEmail);
        $this->db->or_where('email', $usuarioOuEmail);
        $query = $this->db->get_where('users', array('password' => $password));

        return $query;
    }

    function getPerfil($userId){


        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('users_perfil', 'users.id = users_perfil.fk_user','left');
        $this->db->join('users_grupo', 'users.fk_grupo = users_grupo.id','inner');
        $this->db->where(array('users.id' => $userId));
        $query = $this->db->get();

        return $query->row();
    }


    function set_login_cookie($user_email)
    {
        $val = rand(1000, 9000);
        $cookie = array(
            'name' => 'key',
            'value' => $val,
            'expire' => '86500',
            'domain' => '.localhost',
            'path' => '/',
            'prefix' => 'mycookie_',
        );

        set_cookie($cookie);

        $cookie = array(
            'name' => 'user',
            'value' => $user_email,
            'expire' => '86500',
            'domain' => '.localhost',
            'path' => '/',
            'prefix' => 'mycookie_',
        );

        set_cookie($cookie);
    }

    function getUsers($filtros = array(), $execute = false){

        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('users_perfil', 'users.id = users_perfil.fk_user','left');
        $this->db->join('users_grupo', 'users.fk_grupo = users_grupo.id','inner');


        if(array_key_exists('role',$filtros))
        {

            $this->db->where(array('users_grupo.role' => $filtros['role']));

        }


        $query = $this->db->get();

        return $execute == true ? $query->result(): $query;



    }

}

