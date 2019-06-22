<?php
//arquivo onde definiremos as rotas

// inclui o autoloader do Composer
require 'vendor/autoload.php';
// inclui o arquivo de inicialização
require 'init.php';
// instancia o Slim, habilitando os erros (útil para debug, em desenvolvimento)
//$app = new \Slim\Slim();
$app = new \Slim\App([ 'settings' => [
        'displayErrorDetails' => true
    ]
]);

// página inicial
// listagem de usuários
$app->get('/', function ()
{
  //include("app\Views\login.create.php");
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->public();
});
$app->get('/adm-login', function ()
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
$app->post('/login-public', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->sign_public();
});
$app->get('/logout', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->logout();
});
$app->get('/logout-adm', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->logout_adm();
});
$app->get('/login-novo', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->login_cad();
});
$app->post('/save_cad_login', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->save_cad_login();
});
$app->get('/index-adm', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->index();
});
$app->get('/index-public', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->index_public();
});
$app->get('/index-users', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->index_users();
});
// adição de usuário
// exibe o formulário de cadastro
$app->get('/instituicao', function ()
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
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->cad_curso();
});
$app->get('/inscricao', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->cad_inscricao();
});
$app->get('/inscricao_users', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->cad_inscricao_users();
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
$app->get('/participante_users', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->cad_participante_users();
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
$app->get('/emitir_cert_users', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->emitir_cert_users();
});
$app->get('/verificar_cert', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->verificar_cert();
});
$app->get('/verificar_cert_public', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->verificar_cert_public();
});
$app->get('/verificar_cert_users', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->verificar_cert_users();
});
$app->post('/verificar_cert', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->verificar_cert();
});
$app->post('/verificar_cert_public', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->verificar_cert_public();
});
$app->post('/verificar_cert_users', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->verificar_cert_users();
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
$app->post('/emitir_users', function ()
{
    // pega os valores da URL
    //$cpf = $request->getAttribute('cpf')->getArgument('cpf');
    //$curso = $request->getAttribute('curso')->getArgument('curso');
    //$id = $request->getAttribute('id');
    //$id_curso = $request->getAttribute('id_curso')->getArgument('id_curso');

    //printf( "Exibindo artigo %d", $id);
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->emitir_users();
});
$app->post('/emitir_certificado', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->emitir_cert_gerar();
});
$app->post('/emitir_certificado_users', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->emitir_cert_gerar_users();
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
$app->post('/participante_busca_users', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->busca_users();
});

$app->post('/finalizar_inscricao', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->buscaCursos();
});
$app->post('/finalizar_inscricao_users', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->buscaCursos_users();
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
$app->post('/save_inscricao_users', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->inscricao_users();
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
$app->post('/save_participante_users', function ()
{
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->participante_users();
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
