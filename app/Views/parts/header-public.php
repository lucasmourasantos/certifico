<!doctype html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">

    <link rel="stylesheet" href="app\Views\css\bootstrap.min.css">
    <script src="app\Views\js\jquery.min.js"></script>
    <script src="app\Views\js\jquery-3.2.1.min.js"></script>
    <script src="app\Views\js\bootstrap.min.js"></script>
    <script type="text/javascript" src="app\Views\js\jquery-1.2.6.pack.js"></script>
    <script type="text/javascript" src="app\Views\js\jquery.maskedinput-1.1.4.pack.js"></script>

    <link rel="icon" href="app\Views\img\icone_certifico_site.png">

    <title>CERTIFICO | Certificao Online</title>

    <link rel="canonical" href="https://certifico-app.herokuapp.com/">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        .divider{
            height:0;
            margin:.3rem 0;
            overflow:hidden;
            border-top:1px solid #e9ecef;
        }
    </style>

    <!-- Custom styles for this template -->
    <link href="app\Views\css\starter-template.css" rel="stylesheet">
    <link href="app\Views\css\form-validation.css" rel="stylesheet">
    <link href="app\Views\css\navbar-top-fixed.css" rel="stylesheet">

    <!--
<link href="app\Views\css\signin.css" rel="stylesheet">
  -->
    <!-- Adicionando Javascript Busca Endereço pelo CEP-->
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="/">CERTIFICO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Certificados</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown01">
                      <a class="dropdown-item" href="/verificar_cert_public">Validar Certificado</a>
                  </div>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="/login-novo-users">Cadastre-se<span class="sr-only">(current)</span></a>
              </li>
            </ul>
            <form class="navbar-form pull-right" action="/login-public" method="post">
              <input name="usuario" id="usuario" class="span2" type="text" placeholder="Nome de usuário" style="padding: 0px 8px 4px;font-weight: normal;-webkit-border-radius: 2px;-moz-border-radius: 2px;border-radius: 2px;">
              <input name="senha" id="senha" class="span2" type="password" placeholder="Senha" style="padding: 0px 8px 4px;font-weight: normal;-webkit-border-radius: 2px;-moz-border-radius: 2px;border-radius: 2px;">
              <button class="span2 btn btn-primary" type="submit" style="padding: 0px 8px 5px;font-weight: normal;-webkit-border-radius: 2px;-moz-border-radius: 2px;border-radius: 2px;">Login</button>
            </form>
        </div>
    </nav>
<main role="main" class="container">
