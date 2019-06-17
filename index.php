<?php
//arquivo onde definiremos as rotas

// inclui o autoloader do Composer
require 'vendor/autoload.php';
// inclui o arquivo de inicialização
require 'init.php';
// instancia o Slim, habilitando os erros (útil para debug, em desenvolvimento)
$app = new \Slim\Slim();
/*$app = new \Slim\App([ 'settings' => [
        'displayErrorDetails' => true
    ]
]);*/

// página inicial
// listagem de usuários
$app->get('/', function ()
{
  //include("app\Views\login.create.php");
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->login();
});
$app->post('/login', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->sign();
});
$app->get('/logout', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->logout();
});
$app->get('/login-novo', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->login_cad();
});
$app->get('/index-adm', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->index();
});
// adição de usuário
// exibe o formulário de cadastro
$app->get('/instituicao.create.php', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->cad_instituicao();
});
$app->get('/evento', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->cad_evento();
});
$app->get('/curso', function ()
{
  include("app\Views\curso.create.php");
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->cad_curso();
});
$app->get('/inscricao', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->cad_inscricao();
});
$app->get('/certificado', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->cad_certificado();
});
$app->get('/participante', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->cad_participante();
});

$app->get('/rel', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->relatorio();
});
$app->get('/emitir_cert', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->emitir_cert();
});
$app->get('/verificar_cert', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->verificar_cert();
});
$app->post('/verificar_cert', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->verificar_cert();
});
$app->post('/emitir', function ()
{
    // pega os valores da URL
    //$cpf = $request->getAttribute('cpf')->getArgument('cpf');
    //$curso = $request->getAttribute('curso')->getArgument('curso');
    //$id = $request->getAttribute('id');
    //$id_curso = $request->getAttribute('id_curso')->getArgument('id_curso');

    //printf( "Exibindo artigo %d", $id);
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->emitir();
});
$app->post('/emitir_certificado', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->emitir_cert_gerar();
});
// processa formulários via POST
$app->post('/busca', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->busca();
});

$app->post('/participante_busca', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->busca();
});

$app->post('/finalizar_inscricao', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->buscaCursos();
});

$app->post('/save_instituicao', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->instituicao();
});
$app->post('/save_evento', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->evento();
});
$app->post('/save_curso', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->curso();
});
$app->post('/save_inscricao', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->inscricao();
});
$app->post('/save_certificado', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->certificado();
});
$app->post('/save_participante', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->participante();
});








// edição de usuário
// exibe o formulário de edição
$app->get('/edit/{id}', function ($request)
{
    // pega o ID da URL
    $id = $request->getAttribute('id');

    $UsersController = new \App\Controllers\UsersController;
    $UsersController->edit($id);
});

// processa o formulário de edição
$app->post('/edit', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->update();
});

// remove um usuário
$app->get('/remove/{id}', function ($request)
{
    // pega o ID da URL
    $id = $request->getAttribute('id');

    $UsersController = new \App\Controllers\UsersController;
    $UsersController->remove($id);
});

$app->run();
