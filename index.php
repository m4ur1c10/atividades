<?php 

// inclui o autoloader do Composer 
require 'vendor/autoload.php'; 

// inclui o arquivo de inicialização 
require 'init.php'; 

// instancia o Slim, habilitando os erros (útil para debug, em desenvolvimento) 
$app = new \Slim\App([ 'settings' => [
        'displayErrorDetails' => true
    ]
]);
  
$app->get('/', function() {

    $AtividadesController = new \App\Controllers\AtividadesController;
    $AtividadesController->index();
});
  
// processa o formulário de cadastro
$app->post('/add', function ()
{
    $AtividadesController = new \App\Controllers\AtividadesController;
    $AtividadesController->store();
});

$app->get('/troca_status/{id}', function ($request)
{
    // pega o ID da URL
    $id = $request->getAttribute('id');
 
    $AtividadesController = new \App\Controllers\AtividadesController;
    $AtividadesController->troca_status($id);
}); 

$app->get('/remove/{id}', function ($request)
{
    // pega o ID da URL
    $id = $request->getAttribute('id');
 
    $AtividadesController = new \App\Controllers\AtividadesController;
    $AtividadesController->remove($id);
});
 
$app->run();