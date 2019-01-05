<?php

class Mao extends MY_Controller
{

    public function __construct()
    {
        
        parent::__construct();
        $this->load->model('usuarioModel');
        $this->load->model('mesaModel');
        $this->load->model('mesaJogadorModel');
        $this->load->model('jogoModel');
        $this->load->model('tempMatchModel');
    }

    public function index()
    {
        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;

        //Redirecionamento
        $this->load->view('mao/index', $this->data);
    }

    public function jogadormao()
    {
        $this->jogoModel->comprarCartas($this->session->userdata('jogador')->id);
        $this->data['cartas'] = $this->jogoModel->recuperaInfoCartasPorCartasJogo($this->session->userdata('jogador')->id);
        $this->session->set_userdata('vezJogador', $this->mesaJogadorModel->recupera(Array('id_mesa' => $this->session->userdata('mesa')->id, 'vez' => 1))[0]->id_jogador);

        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;

        //Redirecionamento
        $this->load->view('mao/mao', $this->data);
    }

    public function registarJogadorMesa() {
        $chave = $this->_request['chave'];
        $mesa = $this->mesaModel->recupera(Array('chave' => $chave))[0];
        if($mesa) {
            $jogador = $this->usuarioModel->recupera(Array('id' => $this->session->userdata('jogador')->id))[0];
            if ($jogador) {
                if($this->mesaJogadorModel->recupera(Array('id_jogador' => $jogador->id, 'id_mesa' => $mesa->id))[0]) {
                    $this->session->set_userdata('mesa', $mesa);
                    $this->session->set_flashdata('sucesso', 'Link criado com sucesso, aguarde os outros jogadores para iniciar o jogo');
                    redirect('game/mao/index');
                } else {
                    if($this->mesaJogadorModel->inserir(Array('id_jogador' => $jogador->id, 'id_mesa' => $mesa->id))) {
                        $this->session->set_userdata('mesa', $mesa);
                        $this->session->set_flashdata('sucesso', 'Link criado com sucesso, aguarde os outros jogadores para iniciar o jogo');
                        redirect('game/mao/index');
                    } else {
                        $this->session->set_flashdata('erro', 'Ocorreu um erro na ligação do seu usuário a mesa desejada.');
                        redirect('game/auth/code');
                    }
                }
            } else {
                $this->session->set_flashdata('erro', 'Você deve ter criado um ususário antes de tentar entrar em uma mesa.');
                redirect('game/auth/index');
            }
        } else {
            $this->session->set_flashdata('erro', 'Você deve inserir um código de mesa válido');
            redirect('game/auth/code');
        }
    }

    public function addCartaTemporariaUsuario() {
        $ids = $this->_request;
        $this->tempMatchModel->inserir($ids);
        $cartasTemp = $this->tempMatchModel->recupera(Array('id_mesa' => $ids['id_mesa']));
        if(count($cartasTemp) == 2){
            if($this->jogoModel->verificarMatch($ids['id_mesa'])) {
                print json_encode($this->jogoModel->redistribuirCartas($ids['id_mesa']));
            } else {
                print json_encode('as cartas não batem');
            }
        }
        if(count($cartasTemp) == 1){
            if($this->jogoModel->verificarNoMatch($ids['id_mesa'])) {
                print true;
            } else {
                print false;
            }
        }
    }

    public function removerCartaTemporariaUsuario() {
        $ids = $this->_request;
        if(!$this->tempMatchModel->deletar(NULL, $ids)) {
            print json_encode('erro');
        }
        print json_encode('removida');
    }

    public function verificaFimJogo() {
        $fim = $this->jogoModel->verificaFimJogo();
        print json_encode($fim);
    }
}