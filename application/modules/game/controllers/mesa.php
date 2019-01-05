<?php

class Mesa extends MY_Controller
{

    public function __construct()
    {
        
        parent::__construct();
        $this->load->model('mesaModel');
        $this->load->model('mesaJogadorModel');
        $this->load->model('mesaBaralhoModel');
        $this->load->model('jogoModel');
        $this->load->model('tempMatchModel');
        $this->load->model('usuarioModel');
    }

    public function index()
    {
        //Dados
        $this->data['qntJogadores'] = count($this->mesaJogadorModel->recupera(Array('id_mesa' => $this->session->userdata('mesa')->id)));

        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;

        //Redirecionamento
        $this->load->view('mesa/index', $this->data);
    }

    public function mesagame()
    {
        //Dados
        $this->data['jogadores'] = $this->jogoModel->recuperaJogadoresMesa($this->session->userdata('mesa')->id);
        $this->data['quantidadeCartasCompra'] = count($this->jogoModel->recupera(Array('id_mesa' => NULL, 'id_usuario' => NULL)));
        $this->data['colunasCartasMesa'] = $this->jogoModel->gerarCartasMesa($this->session->userdata('mesa')->id);
        $this->session->set_userdata('vezJogador', $this->mesaJogadorModel->recupera(Array('id_mesa' => $this->session->userdata('mesa')->id, 'vez' => 1))[0]->id_jogador);

        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;

        //Redirecionamento
        $this->load->view('mesa/mesa', $this->data);
    }

    public function fim()
    {
        //Dados
        $this->data['vencedor'] = $this->jogoModel->verificarVencedor();
        $this->mesaModel->deletar($this->session->userdata('mesa')->id);
        $usuarios = $this->usuarioModel->recupera();
        foreach ($usuarios as $usuario) {
            $this->usuarioModel->deletar($usuario->id);
        }

        //Avisos
        $this->data['sucesso'] = ($this->session->flashdata('sucesso')) ? $this->session->flashdata('sucesso') : FALSE;
        $this->data['noticia'] = ($this->session->flashdata('noticia')) ? $this->session->flashdata('noticia') : FALSE;
        $this->data['validacao'] = (validation_errors()) ? validation_errors() : FALSE;
        $this->data['erro'] = ($this->session->flashdata('erro')) ? $this->session->flashdata('erro') : FALSE;

        //Redirecionamento
        $this->load->view('mesa/fim', $this->data);
    }

    public function criarMesa() {
        $mesa['chave'] = $this->mesaModel->gerarChave();
        $mesa['iniciado'] = 0;
        $idMesa = $this->mesaModel->inserir($mesa);
        if($idMesa) {
            $this->session->set_userdata('mesa', (Object) Array('id' => $idMesa, 'chave' => $mesa['chave']));
            $this->session->set_flashdata('sucesso', 'Mesa criada com sucesso!');
            redirect('game/mesa/index');
        } else {
            $this->session->set_flashdata('erro', 'Ocorreu um erro na criação da mesa, tente de novo!');
            redirect('game/inicio/iniciogame');
        }
    }

    public function verificarJogadoresMesa() {
        $idMesa = $this->_request['id'];
        $jogadores = $this->mesaJogadorModel->recupera(Array('id_mesa' => $idMesa));
        $retorno = Array(
            'qntJogadores' => count($jogadores)
        );
        return print json_encode($retorno);
    }

    public function prepararJogo() {
        if($this->mesaJogadorModel->validarMesa($this->session->userdata('mesa')->id)) {
            $this->mesaBaralhoModel->gerarCartas($this->session->userdata('mesa')->id);
            $this->mesaBaralhoModel->distribuirCartas($this->session->userdata('mesa')->id);
            $this->mesaJogadorModel->ordenarJogadores($this->session->userdata('mesa')->id);
            $mesa = Array(
                'id' => $this->session->userdata('mesa')->id,
                'chave' => $this->session->userdata('mesa')->chave,
                'iniciado' => 1
            );
            $this->mesaModel->alterar($mesa);
            redirect('game/mesa/mesagame');
        } else {
            $this->session->set_flashdata('erro', 'Deve ter mais de um jogador na mesa para se iniciar o jogo');
            redirect('game/mesa/index');
        }
    }

    public function verificarInicioMesa() {
        $idMesa = $this->_request['id'];
        $mesaIniciado = count($this->mesaModel->recupera(Array('id' => $idMesa, 'iniciado' => 1)));
        return print json_encode($mesaIniciado);
    }

    public function addCartaTemporariaMesa() {
        $ids = $this->_request;
        $this->tempMatchModel->inserir($ids);
        $cartasTemp = $this->tempMatchModel->recupera(Array('id_mesa' => $ids['id_mesa']));
        if(count($cartasTemp) == 2){
            if($this->jogoModel->verificarMatch($ids['id_mesa'])) {
                print json_encode($this->jogoModel->redistribuirCartas($ids['id_mesa']));
            } else {
                print json_encode('as cartas não batem');
            }
        } else {
            $this->tempMatchModel->deletar(NULL, $ids);
            print json_encode('remover');
        }
    }

    public function removerCartaTemporariaMesa() {
        $ids = $this->_request;
        if(!$this->tempMatchModel->deletar(NULL, $ids)) {
            print json_encode('erro');
        }
        print json_encode('removida');
    }

    public function verificaRodada() {
        $idJogador = $this->_request['id'];
        $jogador = $this->mesaJogadorModel->recupera(Array('id_jogador' => $idJogador))[0];
        if($jogador->vez != 1) {
            print json_encode(true);
        } else {
            print json_encode(false);
        }
    }
}