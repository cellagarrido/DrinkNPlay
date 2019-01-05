<?php

class mesaModel extends abstractModel
{

    protected $_table = 'mesa';

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

}