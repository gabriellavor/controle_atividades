<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atividades extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }
    
	public function index(){
		$this->load->view('atividades/atividades');
    }
    
    public function incluir(){
        $this->load->view('atividades/incluir');
    }

    public function editar(){
        $this->load->view('atividades/editar');
    }
}
