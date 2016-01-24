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

    public function getCursos($filtros = array(), $start=0, $perpage=null, $execute = false) {



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




        $query = $this->db->query("SELECT sys_cursos.*, u.email, ug.role, up.nome as nomeInscrito,
              (SELECT SUM(CASE WHEN ug.role ='estudante' THEN 1 ELSE 0 END)) as totalAluno,
              (SELECT SUM(CASE WHEN ug.role ='professor' THEN 1 ELSE 0 END)) as totalProfessor
            FROM sys_cursos
            LEFT JOIN sys_cursos_usuarios as cu ON cu.fk_curso = sys_cursos.id
            LEFT JOIN sys_users AS u ON u.id = cu.fk_user
            LEFT JOIN sys_users_grupo AS ug ON ug.id = u.fk_grupo
            LEFT JOIN sys_users_perfil AS up ON up.fk_user = u.id GROUP BY sys_cursos.id;");




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

    public function addCurso($data)

    {
        try{
            $this->db->insert('cursos', $data);
        }
        catch(Exception $e) {

           return $e->getMessage();
        }




    }


    public function findOneBy($data = array(), $execute = true)

    {
        try{
            $query = $this->db->get_where('cursos', $data);



        }
        catch(Exception $e) {

            return $e->getMessage();
        }


        return $execute == true ? $query->row() : $query;

    }

    public function addUserToCurso($data) {

        try{
            $this->db->insert('cursos_usuarios', $data);
            $query = $this->db->insert_id();
        }
        catch(Exception $e) {

            return $e->getMessage();
        }

        return $query;


    }

    public function update ($data, $id){

        $this->db->update('cursos', $data, array('id' => $id));
    }

    public function delete($id){

        $this->db->delete('cursos', array('id' => $id));
    }

    public function addMaterialToCurso($data =array())

    {


        $this->db->insert('curso_material', $data);



    }

    public function findMatriculaBy(Array $where, $execute = true){

        try{
            $query = $this->db->get_where('cursos_usuarios', $where);



        }
        catch(Exception $e) {

            return $e->getMessage();
        }


        return $execute == true ? $query->row() : $query;

    }




}