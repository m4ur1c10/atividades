<?php 

namespace App\Models; 

use App\DB; 

class Atividade {

    public static function selectAll($atividade = null) { 
        $where = ''; 
        if (!empty($atividade)) { 
            $where = 'WHERE id = :id'; 
        } 
        $sql = sprintf("SELECT * FROM atividades %s", $where); 
        $DB = new DB; 
        $stmt = $DB->prepare($sql);
 
        if (!empty($where))
        {
            $id = $atividade->getId();
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        }
 
        $stmt->execute();
 
        $atividades = $stmt->fetchAll(\PDO::FETCH_ASSOC);
 
        return $atividades;
    }
 
    public static function save($atividade)
    {        
        $nome = $atividade->getNome();
        $descricao = $atividade->getDescricao();
        $dataInicio = $atividade->getDataInicio();
        $dataFim = $atividade->getDataFim();

        $DB = new DB;
        $sql = "INSERT INTO atividades(nome, descricao, data_inicio, data_fim) VALUES(:nome, :descricao, :data_inicio, :data_fim)";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':data_inicio', $dataInicio);
        $stmt->bindParam(':data_fim', $dataFim);
 
        if ($stmt->execute())
        {
            return true;
        }
        else
        {
            print_r($stmt->errorInfo());
            return false;
        }
    }
 
    public static function atualizaDataFinal($atividade)
    {        
        $id = $atividade->getId();
        $dataFim = $atividade->getDataFim();
        $DB = new DB;
        $sql = "UPDATE atividades SET data_fim = :data_fim WHERE id = :id";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':data_fim', $dataFim);
        $stmt->bindParam(':id', $id);
 
        if ($stmt->execute())
        {
            return true;
        }
        else
        {
            print_r($stmt->errorInfo());
            return false;
        }
    }
 
    public static function remove($id)
    {
        // valida o ID
        if (empty($id))
        {
            echo "ID não informado";
            exit;
        }
          
        // remove do banco
        $DB = new DB;
        $sql = "UPDATE atividades SET situacao = 0 WHERE id = :id";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
          
        if ($stmt->execute())
        {
            return true;
        }
        else
        {
            echo "Erro ao remover";
            print_r($stmt->errorInfo());
            return false;
        }
    }
 
    public static function troca_status($atividade)
    {
        // valida o ID
        if (empty($atividade->getId()))
        {
            echo "ID não informado";
            exit;
        }
          
        // remove do banco
        $DB = new DB;
        $sql = "UPDATE atividades SET status = (status + 1) WHERE id = :id";
        $stmt = $DB->prepare($sql);
        $id = $atividade->getId();
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
          
        if ($stmt->execute())
        {
            return true;
        }
        else
        {
            echo "Erro ao trocar o status";
            print_r($stmt->errorInfo());
            return false;
        }
    }
}