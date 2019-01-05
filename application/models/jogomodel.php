<?php

class jogoModel extends abstractModel
{

    protected $_table = 'jogo';

    public function __construct()
    {

        parent::__construct();
        $this->load->model('mesaJogadorModel');
        $this->load->model('usuarioModel');
        $this->load->model('tempMatchModel');
    }

    public function recuperaJogadoresMesa($idMesa) {
        $jogadores = $this->mesaJogadorModel->recupera(Array('id_mesa' => $idMesa), Array('ordem' => 'asc'));
        //Jogador do topo da tela
        $posicao['top'] = $jogadores[0];
        $posicao['top']->apelido = $this->usuarioModel->recupera(Array('id' => $posicao['top']->id_jogador))[0]->apelido;
        $posicao['top']->cartas = Array(
            'quantidade' => count($this->recuperaInfoCartasPorCartasJogo($posicao['top']->id_jogador, NULL, 1)),
            'primeira' => $this->recuperaInfoCartasPorCartasJogo($posicao['top']->id_jogador, NULL, 1, 1)[0]
        );

        //Jogador da base da tela
        $posicao['bot'] = $jogadores[1];
        $posicao['bot']->apelido = $this->usuarioModel->recupera(Array('id' => $posicao['bot']->id_jogador))[0]->apelido;
        $posicao['bot']->cartas = Array(
            'quantidade' => count($this->recuperaInfoCartasPorCartasJogo($posicao['bot']->id_jogador, NULL, 1)),
            'primeira' => $this->recuperaInfoCartasPorCartasJogo($posicao['bot']->id_jogador, NULL, 1, 1)[0]
        );

        //Jogadores da direita e da esquerda
        if(count($jogadores) > 2) {
            for ($i = 2; $i < count($jogadores); $i++) {
                $jogadores[$i]->apelido = $this->usuarioModel->recupera(Array('id' => $jogadores[$i]->id_jogador))[0]->apelido;
                $jogadores[$i]->cartas =Array(
                    'quantidade' => count($this->recuperaInfoCartasPorCartasJogo($jogadores[$i]->id_jogador, NULL, 1)),
                    'primeira' => $this->recuperaInfoCartasPorCartasJogo($jogadores[$i]->id_jogador, NULL, 1, 1)[0]
                );
                if($i % 2 == 0) {
                    $posicao['esquerda'][] = $jogadores[$i];
                } else {
                    $posicao['direita'][] = $jogadores[$i];
                }
            }
        }
        return $posicao;
    }

    public function recuperaInfoCartasPorCartasJogo($idUsuario = NULL, $idMesa = NULL, $monte = NULL, $primeiro = NULL) {
        $this->load->model('mesaBaralhoModel');
        $this->load->model('baralhoModel');
        if($idUsuario == NULL AND $idMesa == NULL) {
            return Array();
        }
        if ($idUsuario != NULL) {
            if($primeiro == NULL) {
                $cartasJogo = $this->recupera(Array('id_usuario' => $idUsuario, 'monte' => $monte));
            } else {
                $cartasJogo = $this->recupera(Array('id_usuario' => $idUsuario, 'monte' => $monte, 'primeiro' => $primeiro));
            }
        }
        if ($idMesa != NULL) {
            $cartasJogo = $this->recupera(Array('id_mesa' => $idMesa));
        }
        foreach ($cartasJogo as $cartaJogo) {
            $idCartaMesa = $this->mesaBaralhoModel->recupera(Array('id' => $cartaJogo->id_mesa_baralho))[0]->id_carta;
            $carta = $this->baralhoModel->recupera(Array('id' => $idCartaMesa))[0];
            $carta->id = $cartaJogo->id;
            $cartas[] = $carta;
        }
        return $cartas;
    }

    public function gerarCartasMesa($idMesa) {
        $cartas = $this->recuperaInfoCartasPorCartasJogo(NULL, $idMesa);
        $coluna = 0;
        $qntCarta = 0;
        foreach ($cartas as $carta) {
            if ($qntCarta == 7) {
                $coluna++;
                $qntCarta = 0;
            }
            $colunas[$coluna][] = $carta;
            $qntCarta++;
        }
        return $colunas;
    }

    public function verificarMatch($idMesa) {
        $cartasSelecionadas = $this->tempMatchModel->recupera(Array('id_mesa' => $idMesa));
        $carta1 = $this->recuperaInfoCartaJogo($cartasSelecionadas[0]->id_carta);
        $carta2 = $this->recuperaInfoCartaJogo($cartasSelecionadas[1]->id_carta);
        if($carta1->numero == $carta2->numero) {
            return true;
        } else {
            return false;
        }

    }

    public function recuperaInfoCartaJogo($idCartaJogo) {
        $this->load->model('mesaBaralhoModel');
        $this->load->model('baralhoModel');
        $MesaJogo = $this->recupera(Array('id' => $idCartaJogo))[0];
        $MesaBaralho = $this->mesaBaralhoModel->recupera(Array('id' => $MesaJogo->id_mesa_baralho))[0];
        $carta = $this->baralhoModel->recupera(Array('id' => $MesaBaralho->id_carta))[0];
        return $carta;
    }

    public function redistribuirCartas($idMesa) {
        $cartasSelecionadasTempMatch = $this->tempMatchModel->recupera(Array('id_mesa' => $idMesa));
        //Divide qual carta é da mão do usuário e qual é da mesa ou do monte de outro usuário
        foreach ($cartasSelecionadasTempMatch as $cartaSelecionadaTempMatch) {
            if ($cartaSelecionadaTempMatch->id_usuario == NULL) {
                $cartaSelecionadaTerceiro = $this->recupera(Array('id' => $cartaSelecionadaTempMatch->id_carta))[0];
            } else {
                $cartaSelecionadaUsuario = $this->recupera(Array('id' => $cartaSelecionadaTempMatch->id_carta))[0];
            }
        }
        //zerar atributo primeiro nas cartas do seu monte
        $cartasMonte = $this->recupera(Array('id_usuario' => $cartaSelecionadaUsuario->id_usuario, 'monte' => 1));
        if(count($cartasMonte) > 1) {
            foreach ($cartasMonte as $cartaMonte) {
                $cartaMonte->primeiro = 0;
                $this->alterar($cartaMonte);
            }
        }
        if($cartaSelecionadaTerceiro->id_mesa != NULL) {
            //adição da carta selecionada na mesa
            $cartaSelecionadaTerceiro->id_mesa = NULL;
            $cartaSelecionadaTerceiro->id_usuario = $cartaSelecionadaUsuario->id_usuario;
            $cartaSelecionadaTerceiro->monte = 1;
            $cartaSelecionadaTerceiro->primeiro = 0;
            $this->alterar($cartaSelecionadaTerceiro);
        } else {
            $cartasMonteOutroUsuario = $this->recupera(Array('id_usuario' => $cartaSelecionadaTerceiro->id_usuario, 'monte' => 1));
            foreach ($cartasMonteOutroUsuario as $cartaMonteOutroUsuario) {
                $cartaMonteOutroUsuario->id_usuario = $cartaSelecionadaUsuario->id_usuario;
                $cartaMonteOutroUsuario->primeiro = 0;
                $this->alterar($cartaMonteOutroUsuario);
            }
        }
        //adição da carta selecionada na mão do ususário
        $cartaSelecionadaUsuario->monte = 1;
        $cartaSelecionadaUsuario->primeiro = 1;
        $this->alterar($cartaSelecionadaUsuario);
        //Exclusão das cartas temporárias
        $this->tempMatchModel->deletar($cartasSelecionadasTempMatch[0]->id);
        $this->tempMatchModel->deletar($cartasSelecionadasTempMatch[1]->id);
        $this->comprarCartas($cartaSelecionadaTempMatch->id_usuario);
        $this->mesaJogadorModel->trocarVez($cartaSelecionadaUsuario->id_usuario, $idMesa);
        return true;
    }

    public function verificarNoMatch($idMesa) {
        $match = 0;
        $cartaSelecionadaTempMatch = $this->tempMatchModel->recupera(Array('id_mesa' => $idMesa))[0];
        $cartaSelecionada = $this->recupera(Array('id' => $cartaSelecionadaTempMatch->id_carta))[0];
        $cartasMesa = $this->recupera(Array('id_mesa' => $idMesa));
        $cartasMonte = $this->recupera(Array('monte' => 1, 'primeiro' => 1));
        foreach ($cartasMesa as $cartaMesa) {
            if($this->recuperaInfoCartaJogo($cartaMesa->id)->numero == $this->recuperaInfoCartaJogo($cartaSelecionada->id)->numero) {
                $match++;
            }
        }
        foreach ($cartasMonte as $cartaMonte) {
            if($cartaMonte->id_usuario != $this->session->userdata('jogador')->id) {
                if($this->recuperaInfoCartaJogo($cartaMonte->id)->numero == $this->recuperaInfoCartaJogo($cartaSelecionada->id)->numero) {
                    $match++;
                }
            }
        }
        if($match == 0) {
            $cartaSelecionada->id_usuario = NULL;
            $cartaSelecionada->id_mesa = $idMesa;
            $this->tempMatchModel->deletar($cartaSelecionadaTempMatch->id);
            $this->alterar($cartaSelecionada);
            $this->comprarCartas($cartaSelecionadaTempMatch->id_usuario);
            $this->mesaJogadorModel->trocarVez($cartaSelecionadaTempMatch->id_usuario, $idMesa);
            return true;
        }
        return false;
    }

    public function comprarCartas($idUsuario) {
        $qntCartasMao = count($this->recuperaInfoCartasPorCartasJogo($idUsuario));
        if($qntCartasMao == 0) {
            $cartasCompra = $this->recupera(Array('id_mesa' => NULL, 'id_usuario' => NULL));
            if(count($cartasCompra) >= 4) {
                $novasCartas = array_rand($cartasCompra, 4);
                foreach ($novasCartas as $novaCarta) {
                    $cartasCompra[$novaCarta]->id_usuario = $idUsuario;
                    $this->alterar($cartasCompra[$novaCarta]);
                }
                return true;
            }
            return true;
        } else {
            return true;
        }
    }

    public function verificaFimJogo() {
        $jogadoresSemCarta = 0;
        $cartasCompra = $this->recupera(Array('id_mesa' => NULL, 'id_usuario' => NULL));
        $qntCartasCompra = count($cartasCompra);
        $jogadores = $this->usuarioModel->recupera();
        foreach ($jogadores as $jogador) {
            if(count($this->recupera(Array('id_mesa' => NULL, 'id_usuario' => $jogador->id, 'monte' => NULL, 'primeiro' => NULL))) == 0) {
                $jogadoresSemCarta++;
            }
        }
        if($jogadoresSemCarta > 0 AND $qntCartasCompra <= 3) {
            return true;
        } else {
            return false;
        }
    }

    public function verificarVencedor() {
        $vencedor = '';
        $qntVencedor = 0;
        $jogadores = $this->usuarioModel->recupera();
        foreach ($jogadores as $jogador) {
            $qntCartasJogador = count($this->recupera(Array('id_mesa' => NULL, 'id_usuario' => $jogador->id, 'monte' => 1, 'primeiro' => 0))) + 1;
            if($qntCartasJogador > $qntVencedor) {
                $qntVencedor = $qntCartasJogador;
                $vencedor = $jogador->apelido;
            }
        }
        return $vencedor;
    }

}