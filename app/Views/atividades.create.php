<div class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="<?php echo base_url('add') ?>" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">Cadastro de Nova Atividade</h4>
      </div>
      <div class="modal-body">

        <div class="form-group">
            <label for="nome">Nome: </label>         
            <input type="text" class="form-control" name="nome" id="nome">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição: </label>         
            <textarea name="descricao" id="descricao"></textarea>
        </div>
        <div class="form-group">
            <label for="dataInicio">Data Inicial: </label>     
            <input type="text" name="data_inicio" id="dataInicio" placeholder="dd/mm/YYYY">
        </div>
        <div class="form-group">
            <label for="dataFim">Data Final: </label>     
            <input type="text" name="data_fim" id="dataFim" placeholder="dd/mm/YYYY">
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