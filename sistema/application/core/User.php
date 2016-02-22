<?php

class User

{

    public function __construct(CI_Session $session)
    {

        $this->session  = $session;

    }


    public function getUser()

    {

        $user = json_decode($this->session->userdata('user'));

        return $user;
    }

    public function getId()

    {

        return $this->getUser()->id;

    }

    public function getUsername()

    {
        return $this->getUser()->username;

    }

    public function  getPassword()
    {
        return $this->getUser()->password;

    }

    public function  getRole()
    {
        return $this->getUser()->role;

    }

    public function  getEmail()
    {
        return $this->getUser()->email;

    }

    public function  getStatus()
    {
        return $this->getUser()->status;

    }
    public function getDateCreated ()
    {

        return $this->getUser()->date_created;

    }

    public function getNome ()
    {

        return $this->getUser()->nome;

    }

    public function getRg ()
    {

        return $this->getUser()->rg;

    }

    public function getCpf ()
    {

        return $this->getUser()->cpf;

    }
    public function getEndereco ()
    {

        return $this->getUser()->endereco;

    }
    public function getCep ()
    {

        return $this->getUser()->cep;

    }

    public function getDataNascimento ()

    {
        return $this->getUser()->data_nascimento;

    }

    public function getDateUpdate ()

    {
        return $this->getUser()->date_update;

    }

    public function getGender ()

    {
        return $this->getUser()->gender;

    }

    public function getFacebook ()

    {
        return $this->getUser()->facebook;

    }







}