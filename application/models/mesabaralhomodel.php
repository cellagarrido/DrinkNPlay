<?php

class mesaBaralhoModel extends abstractModel
{

    protected $_table = 'mesa_baralho';

    public function __construct()
    {

        parent::__construct();
        $this->load->model('mesaJogadorModel');
        $this->load->model('baralhoModel');
        $this->load->model('jogoModel');
    }

    public function gerarCartas($idMesa) {
        $qntJogadores = count($this->mesaJogadorModel->recupera(Array('id_mesa' => $idMesa)));
        $numeroBaralhos = ceil($qntJogadores / 4);
        $baralho = $this->baralhoModel->recupera();
        for ($i = 0; $i < $numeroBaralhos; $i++) {
            foreach ($baralho as $cartas) {
                $carta = Array(
                    'id_mesa' => $idMesa,
                    'id_carta' => $cartas->id
                );
                $this->inserir($carta);
            }
        }
        return true;
    }

    public function distribuirCartas($idMesa) {
        $jogadores = $this->mesaJogadorModel->recupera(Array('id_mesa' => $idMesa));
        $qntJogadores = count($jogadores);
        $qntCartasParaDistribuir = ($qntJogadores * 4) + 8;
        $cartas = $this->recupera();
        $distribuicao = array_rand($cartas, $qntCartasParaDistribuir);
        foreach ($distribuicao as $indice) {
            $cartasEmJogo[] = $cartas[$indice];
            unset($cartas[$indice]);
        }
        foreach ($cartas as $carta) {
            //print $carta->id . '<br>';
            $cartaJogo = Array(
                'id_mesa' => NULL,
                'id_usuario' => NULL,
                'id_mesa_baralho' => $carta->id,
                'monte' => NULL,
                'primeiro' => NULL
            );
            $this->jogoModel->inserir($cartaJogo);
        }
        foreach ($jogadores as $jogador) {
            $cartaJogador = array_rand($cartasEmJogo, 4);
            foreach ($cartaJogador as $carta) {
                $cartaJogo = Array(
                    'id_mesa' => NULL,
                    'id_usuario' => $jogador->id_jogador,
                    'id_mesa_baralho' => $cartasEmJogo[$carta]->id,
                    'monte' => NULL,
                    'primeiro' => NULL
                );
                $this->jogoModel->inserir($cartaJogo);
                unset($cartasEmJogo[$carta]);
            }
        }
        foreach ($cartasEmJogo as $carta) {
            $cartaJogo = Array(
                'id_mesa' => $idMesa,
                'id_usuario' => NULL,
                'id_mesa_baralho' => $carta->id,
                'monte' => NULL,
                'primeiro' => NULL
            );
            $this->jogoModel->inserir($cartaJogo);
        }
        return true;
    }
}