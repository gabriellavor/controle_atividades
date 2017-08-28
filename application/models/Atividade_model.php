<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atividade_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->name = 'atividade';
    }

    function incluir($dados){
        $this->db->insert($this->name,$dados);
        return $this->db->insert_id();
    }

    function alterar($id,$dados){
        if(!empty($id)){            
            foreach($dados as $key => $dado){
                $this->db->set($key,$dado);
            }
            $this->db->where('id',$id);
            $this->db->update($this->name,$dados);
            return $this->db->affected_rows();
        }
        return false;
    }

    function retorna_atividades($condicao){
        $this->db->select('atividade.id AS id,atividade.nome AS nome,atividade.descricao AS descricao,atividade.situacao AS situacao,atividade.data_inicio AS data_inicio,atividade.data_fim AS data_fim,status.nome AS status');
        $this->db->from($this->name);
        $this->db->join('status', 'status.id = atividade.codigo_status');
        $this->db->where($condicao); 
        $query = $this->db->get();
        return $query->result();
    }

    function retorna_atividade($id){
        $this->db->select('*');
        $this->db->from($this->name);
        $this->db->where('atividade.id', $id); 
        $dado = array();
        $query = $this->db->get();
        foreach ($query->result() as $row){
            $dado['id'] = $row->id;
            $dado['nome'] = $row->nome;
            $dado['descricao'] = $row->descricao;
            $dado['codigo_status'] = $row->codigo_status;
            $dado['data_inicio'] = $row->data_inicio;
            $dado['data_fim'] = $row->data_fim;
            
        }
        return $dado;
    }
}