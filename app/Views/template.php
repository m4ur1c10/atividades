<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/twbs/bootstrap/dist/css/bootstrap.min.css') ?>">
        <title>Sistema de Cadastro em MVC - ULTIAMTE PHP</title>
    </head>
 
    <body>
        <div class="container"> 
            <?php 
            if (isset($viewName)) { 
            	$path = viewsPath() . $viewName . '.php'; 
            	if (file_exists($path)) { 
            		require_once $path; 
        		} 
    		}
            ?>
        </div>
        <script type="text/javascript" src="<?php echo base_url('vendor/components/jquery/jquery.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('vendor/twbs/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
        <script type="text/javascript">
            $('#insertAtividade').submit(function(e){
                e.preventDefault();
                var form = $(this);
                $.post(form.attr('action'), form.serialize(), function(ret){
                    form.find('.form-group').removeClass('has-error');
                    form.find('.form-group .help-block').html('');
                    if (ret.status) {
                        alert('Atividade Inserida com sucesso!');
                        window.location.reload();
                    } else {
                        if (typeof ret.msgm != 'undefined') {
                            alert(ret.msgm);
                        }
                        if (typeof ret.fields != 'undefined') {
                            $.each(ret.fields, function(i, val){
                                form.find('#'+i).closest('.form-group').addClass('has-error');                                
                                form.find('#'+i).next().html(val);
                            })
                        }
                    }
                }, 'json');
            })
        </script>
    </body>
</html>