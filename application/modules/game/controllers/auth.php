<?php

class Auth extends MY_Controller
{

    public function __construct()
    {
        
        parent::__construct();
        $this->load->model('usuarioModel');
        $this->load->model('mesaJogadorModel');
    }

    public function index()
    {
        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;

        //Redirecionamento
        $this->load->view('auth/index', $this->data);
    }

    public function code()
    {

        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;

        //Redirecionamento
        $this->load->view('auth/code', $this->data);
    }

    public function registrarjogador() {
        $jogador['apelido'] = NULL;
        $jogador['apelido'] = $this->_request['nick'];
        if($this->session->userdata('jogador')) {
            $newJogador = $this->usuarioModel->recupera(Array('id' => $this->session->userdata('jogador')->id))[0];
            $newJogador->apelido = $jogador['apelido'];
            if($this->usuarioModel->alterar($newJogador)) {
                $this->session->set_userdata('jogador', $newJogador);
                $this->session->set_flashdata('sucesso', 'Jogador alterado com sucesso!');
                redirect('game/auth/code');
            } else {
                $this->session->set_flashdata('erro', 'Ocorreu um erro na alteração do jogador, tente de novo!');
                redirect('game/auth/index');
            }
        } else {
            $jogador['id'] = $this->usuarioModel->inserir($jogador);
            if($jogador['id']) {
                $this->session->set_userdata('jogador', (Object) $jogador);
                $this->session->set_flashdata('sucesso', 'Jogador adicionado com sucesso!');
                redirect('game/auth/code');
            } else {
                $this->session->set_flashdata('erro', 'Ocorreu um erro na criação do jogador, tente de novo!');
                redirect('game/auth/index');
            }
        }
    }

    public function verificarVez() {
        $idUsuario = $this->_request['id'];
        $jogador = $this->mesaJogadorModel->recupera(Array('id_jogador' => $idUsuario))[0];
        print json_encode(Array('vez' => $jogador->vez));
    }
}