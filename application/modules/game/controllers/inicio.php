<?php

class Inicio extends MY_Controller
{

    public function __construct()
    {
        
        parent::__construct();
    }

    public function index()
    {
        if($this->session->userdata('mesa')) {
            $this->session->unset_userdata('mesa');
        }
        if($this->session->userdata('vezJogador')) {
            $this->session->unset_userdata('vezJogador');
        }
        if($this->session->userdata('jogador')) {
            $this->session->unset_userdata('jogador');
        }

        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;

        //Redirecionamento
        $this->load->view('inicio/index', $this->data);
    }

    public function iniciogame()
    {
        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;

        //Redirecionamento
        $this->load->view('inicio/inicio', $this->data);
    }
}