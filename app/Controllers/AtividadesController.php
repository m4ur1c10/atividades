<?php 

namespace App\Controllers; 

use \App\Models\Atividade as AtividadeDB; 
use \Entity\Atividade; 

include BASE_PATH.'/src/Atividade.php';

class AtividadesController { 

    public function index() { 
        $atividades = AtividadeDB::selectAll(); 
        //$atividades = new Atividade(array('id' => 1, 'nome' => 'teste', 'data_inicio' => '2017-06-24'));
        //var_dump($atividades->toString()); exit;
        $atividades_obj = array();
        foreach ($atividades as $atividade) {
        	$atividades_obj[] = new Atividade($atividade);
        }
        
        \App\View::make('atividades.index', 
            [ 
                'atividades' => $atividades_obj,
            ]);
    }
 
    public function store()
    {
        
        $atividade = new Atividade($_POST);

        $error = array();
        if (empty($atividade->getNome())) {
            $error['fields']['nome'] = 'Este campo é obrigatório.';
        }

        if (empty($atividade->getDescricao())) {
            $error['fields']['descricao'] = 'Este campo é obrigatório.';
        }

        if (empty($atividade->getDataInicio())) {
            $error['fields']['dataInicio'] = 'Este campo é obrigatório.';
        }

        if (count($error)) {
        	echo json_encode(array_merge($error, array('status' => 0)));
            exit();
        }

        if (AtividadeDB::save($atividade))
        {
            echo json_encode(array('status' => 1));
            exit;
        } else {
        	echo json_encode(array('status' => 0, 'msgm' => 'Houve um erro ao inserir os dados.'));
        }
    }

    public function remove($id)
    {
        if (AtividadeDB::remove($id))
        {
            redirect();
            exit;
        }
    }

    public function troca_status($id)
    {
        if (AtividadeDB::troca_status($id))
        {
            redirect();
            exit;
        }
    }
}