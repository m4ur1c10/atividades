<?php 

namespace Entity;

class Atividade { 
    
    private $id;
    private $nome;
    private $descricao;
    private $dataInicio;
    private $dataFim;
    private $situacao;
    private $status;

    public function __construct($atividade) {
        $atividade = is_object($atividade) ? (Array)$atividade : $atividade;

        foreach($atividade as $field => $value) {
            if (preg_match('/_/', $field)) {
                $field_arr = explode('_', $field);
                $field_arr_cap = array();
                foreach ($field_arr as $i => $f) {
                    $field_arr_cap[] = ($i == 0 ? $f : ucfirst($f));
                }
                $field = implode('', $field_arr_cap);
            }            
            if (preg_match('/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/', $value)) {
                $value = implode('-',array_reverse(explode('/', $value)));
            }
            $this->$field = $value;
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        return $this->nome = $nome;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        return $this->descricao = $descricao;
    }

    public function getDataInicio() {
        return $this->dataInicio;
    }

    public function setDataInicio($data_inicio) {
        if (preg_match('/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/', $data_inicio)) {
            return $this->dataInicio = implode('-',array_reverse(explode('/', $data_inicio)));
        } else {
            return $this->dataInicio = $data_inicio;
        }
    }

    public function getDataFim() {
        return $this->dataFim;
    }

    public function setDataFim($data_fim) {
        if (preg_match('/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/', $data_fim)) {
            return $this->dataFim = implode('-',array_reverse(explode('/', $data_fim)));
        } else {
            return $this->dataFim = $data_fim;
        }
    }

    public function getSituacao() {
        return $this->situacao;
    }

    public function setSituacao($situacao) {
        return $this->situacao = $situacao;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getStatusTexto() {
        $status_arr = array(
                1 => 'Pendente',
                2 => 'Em Desenvolvimento',
                3 => 'Em Teste',
                4 => 'Concluído'
            );
        return isset($status_arr[$this->status]) ? $status_arr[$this->status] : 'Status Indisponível';
    }

    public function setStatus($status) {
        return $this->status = $status;
    }

    public function toString() {
        $vars = get_object_vars($this);
        $return = array();
        foreach ($vars as $f => $v) {
            $return[] = $f.'='.$v;
        }
        return implode(',', $return);
    }
}