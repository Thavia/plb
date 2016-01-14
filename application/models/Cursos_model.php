<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * @property  CI_DB_query_builder db
 */
class Cursos_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getCursos($filtros = array(), $start, $perpage, $execute = false) {



        if
        (array_key_exists('role',$filtros) &&
            ($filtros['role'] == 'professor' || $filtros['role'] =='estudante'))


        {

            $this->db->where(array('users.id' => $filtros['userId']));

        }

        if(array_key_exists('userId',$filtros))
        {

            $this->db->where(array('users.id' => $filtros['userId']));

        }


        $this->db->limit($start, $perpage);


        $query = $this->db->query("SELECT sys_cursos.*, u.email, ug.role, up.nome as nomeInscrito,
              (SELECT SUM(CASE WHEN ug.role ='estudante' THEN 1 ELSE 0 END)) as totalAluno,
              (SELECT SUM(CASE WHEN ug.role ='professor' THEN 1 ELSE 0 END)) as totalProfessor
            FROM sys_cursos
            INNER JOIN sys_cursos_usuarios as cu ON cu.fk_curso = sys_cursos.id
            INNER JOIN sys_users AS u ON u.id = cu.fk_user
            INNER JOIN sys_users_grupo AS ug ON ug.id = u.fk_grupo
            INNER JOIN sys_users_perfil AS up ON up.fk_user = u.id");




        return $execute == true ? $query->result(): $query;


    }

    public function countCursos($filtros = array(), $execute = true) {



        if (array_key_exists('role',$filtros) &&
            ($filtros['role'] == 'professor' || $filtros['role'] =='estudante'))


        {

            $this->db->where(array('users.id' => $filtros['userId']));

        }

        if(array_key_exists('userId',$filtros))
        {

            $this->db->where(array('users.id' => $filtros['userId']));

        }



        $query = $this->db->query("SELECT sys_cursos.*, u.email, ug.role, up.nome as nomeInscrito,
              (SELECT SUM(CASE WHEN ug.role ='estudante' THEN 1 ELSE 0 END)) as totalAluno,
              (SELECT SUM(CASE WHEN ug.role ='professor' THEN 1 ELSE 0 END)) as totalProfessor
            FROM sys_cursos
            INNER JOIN sys_cursos_usuarios as cu ON cu.fk_curso = sys_cursos.id
            INNER JOIN sys_users AS u ON u.id = cu.fk_user
            INNER JOIN sys_users_grupo AS ug ON ug.id = u.fk_grupo
            INNER JOIN sys_users_perfil AS up ON up.fk_user = u.id");




        return $execute == true ? $query->num_rows(): $query;


    }


}