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

    <style type="text/css">
            .carregando{
                color:#ff0000;
                display:none;
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
        <script type="text/javascript" >

            function limpa_formulário_cep() {
                //Limpa valores do formulário de cep.
                document.getElementById('rua').value=("");
                document.getElementById('bairro').value=("");
                document.getElementById('cidade').value=("");
                document.getElementById('uf').value=("");
                //document.getElementById('ibge').value=("");
            }

            function meu_callback(conteudo) {
                if (!("erro" in conteudo)) {
                    //Atualiza os campos com os valores.
                    document.getElementById('rua').value=(conteudo.logradouro);
                    document.getElementById('bairro').value=(conteudo.bairro);
                    document.getElementById('cidade').value=(conteudo.localidade);
                    document.getElementById('uf').value=(conteudo.uf);
                    //document.getElementById('ibge').value=(conteudo.ibge);
                } //end if.
                else {
                    //CEP não Encontrado.
                    limpa_formulário_cep();
                    alert("CEP não encontrado.");
                }
            }

            function pesquisacep(valor) {

                //Nova variável "cep" somente com dígitos.
                var cep = valor.replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        document.getElementById('rua').value="...";
                        document.getElementById('bairro').value="...";
                        document.getElementById('cidade').value="...";
                        document.getElementById('uf').value="...";
                        //document.getElementById('ibge').value="...";

                        //Cria um elemento javascript.
                        var script = document.createElement('script');

                        //Sincroniza com o callback.
                        script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                        //Insere script no documento e carrega o conteúdo.
                        document.body.appendChild(script);

                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            };

        </script>

        <script type="text/javascript">
            $(document).ready(function(){
                $("#cpf").mask("999.999.999-99");
            });
        </script>

  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="/index-adm">CERTIFICO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cadastros</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown01">
                      <a class="dropdown-item" href="instituicao">Instituição</a>
                      <hr class="divider">
                      <a class="dropdown-item" href="evento">Evento</a>
                      <hr class="divider">
                      <a class="dropdown-item" href="curso">Cursos</a>
                      <a class="dropdown-item" href="inscricao">Inscrição</a>
                      <hr class="divider">
                      <a class="dropdown-item" href="certificado">Certificado</a>
                      <hr class="divider">
                      <a class="dropdown-item" href="participante">Participantes</a>
                  </div>
              </li>

              <li class="nav-item active dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Relatórios</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown01">
                      <a class="dropdown-item" href="rel" target="_blank">Participantes Inscritos</a>
                  </div>
              </li>

              <li class="nav-item active dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Certificados</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown01">
                      <a class="dropdown-item" href="emitir_cert">Emitir Certificados</a>
                      <a class="dropdown-item" href="verificar_cert">Validar Certificado</a>
                  </div>
              </li>

              <li class="nav-item active">
                  <a class="nav-link" href="logout-adm">Sair</a>
              </li>
            </ul>
        </div>
    </nav>
<main role="main" class="container">

<!--
</main>  //container
<script src="app\Views\js\jquery-3.3.1.slim.min.js"></script>
<script> window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="app\Views\js\bootstrap.bundle.min.js" ></script>
-->
