<div class="col-md-8 col-md-offset-2 col-xs-12">

	<h1 class="text-center">Listagem de Atividades</h1>

	<p class="text-right"><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Adicionar Atividade</button></p>
	 
	<?php if (count($atividades) > 0): ?>
	 
	<table class="table">
	 
		<thead>
	 
			<tr>
	 
				<th>Nome</th>
				 
				 
				<th>Descrição</th>
				 
				 
				<th>Data de Início</th>
				 
				 
				<th>Data Final</th>
				 
				 
				<th>Situação</th>
				 
				 
				<th>Ações</th>
	 
	        </tr>
	 
	    </thead>
	 
	 
		<tbody>
	        <?php foreach ($atividades as $atividade): ?>
	 
			<tr class="<?php echo ($atividade->getSituacao() == 1 ? '' : 'danger'); ?>">
	 
				<td><?php echo $atividade->getNome(); ?></td>
				 
				 
				<td><?php echo $atividade->getDescricao(); ?></td>
				 
				 
				<td><?php echo dateConvert($atividade->getDataInicio()); ?></td>
				 
				 
				<td><?php echo $atividade->getDataFim() == '0000-00-00' ? 'Indefinido' : dateConvert($atividade->getDataFim()); ?></td>
				 
				 
				<td>
				<?php if ($atividade->getStatus() == 4) {
					echo $atividade->getStatusTexto();
				} else { ?>
				<a href="<?php echo base_url('troca_status/'.$atividade->getId()); ?>" onclick="return confirm('Tem certeza de que deseja marcar a atividade para a próxima etapa?');"><?php echo $atividade->getStatusTexto(); ?></a></td>
				 <?php } ?>
				 
				<td>
					<?php if ($atividade->getSituacao() == 1) { ?>
	                <a href="<?php echo base_url('remove/'.$atividade->getId()); ?>" onclick="return confirm('Tem certeza de que deseja remover?');">Inativar</a>
	                <?php } else { ?>
	                	Desativado
                	<?php } ?>
	            </td>
	 
	        </tr>
	 
	        <?php endforeach; ?>
	    </tbody>
	 
	</table>
	 
	 
	<?php else: ?>
	 
	<p>Nenhuma atividade cadastrada</p>
	 
	 
	<?php endif; ?>

</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="<?php echo base_url('add') ?>" method="post" id="insertAtividade">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">Cadastro de Nova Atividade</h4>
      </div>
      <div class="modal-body">

        <div class="form-group">
            <label for="nome">Nome: </label>         
            <input type="text" class="form-control" name="nome" id="nome">
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição: </label>         
            <textarea name="descricao" class="form-control" id="descricao"></textarea>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label for="dataInicio">Data Inicial: </label>     
            <input type="text" class="form-control" name="data_inicio" id="dataInicio" placeholder="dd/mm/YYYY">
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label for="dataFim">Data Final: </label>     
            <input type="text" class="form-control" name="data_fim" id="dataFim" placeholder="dd/mm/YYYY">
            <span class="help-block"></span>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->