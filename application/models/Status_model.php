<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->name = 'status';
    }

    function retorna_status(){
        $query = $this->db->get($this->name, null);
        $dados = array();
        foreach ($query->result() as $row){
            $dados[$row->id] = $row->nome;
        }
        return $dados;
    }
}