<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atividades extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }
    
	public function index(){
        $this->load->helper('form');
        $this->load->model('status_model');
        $dados['status'] = $this->status_model->retorna_status();
        array_unshift($dados['status'],'Selecione o status');
        $this->load->view('atividades/atividades',$dados);
    }
    
    public function incluir(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('atividade_model');
        $this->load->model('status_model');
        //Validações
        $this->validacoes();
        $dados = array('sucesso' => FALSE,'erros' => FALSE);
        $dados['status'] = $this->status_model->retorna_status();
        if($this->form_validation->run() == FALSE){
            if(validation_errors()){
                $dados['erros'] = validation_errors();
                $dados['sucesso'] = FALSE;
            }
        }else{
            $dados_post = $this->input->post();
            if($this->atividade_model->incluir($dados_post)){
                $dados['erros'] = FALSE;
                $dados['sucesso'] = 'Incluido com sucesso';
            }
        }
        $this->load->view('atividades/incluir',$dados);
    }

    public function editar($id){
        if(!empty($id)){
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->model('atividade_model');
            $this->load->model('status_model');
            //seta dados
            $dados = array('sucesso' => FALSE,'erros' => FALSE);
            $dados['status'] = $this->status_model->retorna_status();
            $dados['id'] = $id;
            $dados['disabled'] = FALSE;
            //Validações
            $this->validacoes();
            if($this->form_validation->run() == FALSE){
                if(validation_errors()){
                    $dados['erros'] = validation_errors();
                    $dados['sucesso'] = FALSE;
                }else{
                    $_POST = $this->atividade_model->retorna_atividade($id);
                    $dados['disabled'] = ($_POST['codigo_status'] == 4) ? TRUE : FALSE; 
                    $_POST['data_inicio'] = date('dmY', strtotime($_POST['data_inicio']));
                    $_POST['data_fim'] = date('dmY', strtotime($_POST['data_fim']));
                }
            }else{
                $dados_post = $this->input->post();
                $data_inicio = str_replace("/", "-", $dados_post["data_inicio"]);
                $dados_post['data_inicio'] = date('Y-m-d', strtotime($data_inicio));
                $data_fim = str_replace("/", "-", $dados_post["data_fim"]);
                $dados_post['data_fim'] =  date('Y-m-d', strtotime($data_fim));
                if($this->atividade_model->alterar($id,$dados_post)){
                    $dados['erros'] = FALSE;
                    $dados['sucesso'] = 'Alterado com sucesso';
                    $dados['disabled'] = ($dados_post['codigo_status'] == 4) ? TRUE : FALSE; 
                }else{
                    $dados['erros'] = '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span>';
                    $dados['erros'] .= 'Registro não foi alterado';
                    $dados['erros'] .= '</div>';
                }
            }
            $this->load->view('atividades/editar',$dados);
        }
    }

    function data_valida($data){
        list($dd,$mm,$yyyy) = explode('/',$data);
        if(empty($dd) || empty($mm) || empty($yyyy)){
            return false;
        }
        if (!checkdate($mm,$dd,$yyyy)) {
            return false;
        }
        return true;
    }
    
    function data_inicio($data){
        if(empty($data)){
            $this->form_validation->set_message('data_inicio','Data inicio deve ser informada'); 
            return false;
        }    
        if(!$this->data_valida($data)){
            $this->form_validation->set_message('data_inicio','Data Inicio Inválida (dd/mm/aaaa)'); 
            return false;
        }
        return true;
    }

    function data_fim($data){
        $codigo_status = $this->input->post('codigo_status');
        if($codigo_status == 4){
            if(empty($data)){
                $this->form_validation->set_message('data_inicio','Data fim deve ser informada'); 
                return false;
            }    
        }
        if(!empty($data)){
            if(!$this->data_valida($data)){
                $this->form_validation->set_message('data_fim','Data fim Inválida (dd/mm/aaaa)'); 
                return false;
            }
        }
        return true;
    }

    function listagem(){
        $this->load->model('atividade_model');
        $condicao = array();
        if(!empty($_POST['codigo_status'])){
            $condicao['codigo_status'] = $_POST['codigo_status'];
        }
        $dados['resultado'] = $this->atividade_model->retorna_atividades($condicao);
        $this->load->view('atividades/listagem',$dados);        
    }

    function validacoes(){
        $this->form_validation->set_rules('nome','Nome','trim|required');
        $this->form_validation->set_rules('descricao','Descrição','trim|required');
        $this->form_validation->set_rules('data_inicio','Data Inicio','trim|callback_data_inicio');
        $this->form_validation->set_rules('data_fim','Data Fim','trim|callback_data_fim');
    }
}
