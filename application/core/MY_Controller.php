<?php

class MY_Controller extends MX_Controller
{

    protected $_request;
    public $data = array();

    public function __construct()
    {
        
        parent::__construct();
        $this->_request = $this->input->post() ? $this->input->post() : $this->input->get();
        $this->data['nomeProjeto'] = "DrinknPlay";
        $this->data['alliasNomeProjeto'] = "DrinknPlay - Jogo rouba monte";
        $this->data['url_base'] = '/';
    }

}

class GameController extends MY_Controller
{

    public function __construct()
    {
        
        parent::__construct();

    }

}

/*class AdminController extends MY_Controller
{

    public function __construct()
    {

        parent::__construct();
        if (!$this->authModel->verificaLogin())
        {
            $this->session->set_flashdata('erro', 'Para acessar esta página primeiramente você deve realizar seu login!!!');
            redirect('admin/serviceauth/index');
        }
        if (!$this->viewGrupoAcaoModel->verificaPermissao())
        {
            $this->session->set_flashdata('erro', 'Desculpe, mas você não tem permissão para acessar esta página!!!');
            redirect('admin/home/index');
        }
        $this->data['nomeUsuarioLogado'] = explode(' ', $this->session->userdata('usuario')->nome);
        $this->data['topo'] = $this->load->view('layout/topo', $this->data, TRUE);
        $this->data['menulateral'] = $this->load->view('layout/menulateral', $this->data, TRUE);
        $this->data['rodape'] = $this->load->view('layout/rodape', NULL, TRUE);
    }

}*/