<?php

class mesaJogadorModel extends abstractModel
{

    protected $_table = 'mesa_jogador';

    public function __construct()
    {

        parent::__construct();
    }

    public function gerarChave() {
        do {
            $chave = substr(md5(rand()), 0, 5);
            $mesa = $this->recupera(Array('chave' => $chave));
        } while(!empty($mesa));
        return $chave;
    }

    public function validarMesa($idMesa) {
        if(count($this->recupera(Array('id_mesa' => $idMesa))) > 1) {
            return true;
        } else {
            return false;
        }

    }

    public function ordenarJogadores($idMesa) {
        $jogadores = $this->recupera(Array('id_mesa' => $idMesa));
        shuffle($jogadores);
        foreach ($jogadores as $indice => $jogador) {
            ($indice == 0) ? $jogador->vez = 1 : $jogador->vez = 0;
            $jogador->ordem = $indice;
            $this->alterar($jogador);
        }
        return true;
    }

    public function trocarVez($idJogador, $idMesa) {
        $qntJogadores = count($this->recupera(Array('id_mesa' => $idMesa)));
        $jogadorAtual = $this->recupera(Array('id_jogador' => $idJogador))[0];
        $jogadorAtual->vez = 0;
        $proximo = $jogadorAtual->ordem + 1;
        if($proximo != $qntJogadores) {
            $novoJogador = $this->recupera(Array('id_mesa' => $idMesa, 'ordem' => $proximo))[0];
        } else {
            $novoJogador = $this->recupera(Array('id_mesa' => $idMesa, 'ordem' => 0))[0];
        }
        $novoJogador->vez = 1;
        $this->alterar($novoJogador);
        $this->alterar($jogadorAtual);
        return true;
    }

}