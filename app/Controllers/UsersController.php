<?php

namespace App\Controllers;

use \App\Models\User;

class UsersController {
/*
* Classe com um método para cada rota definida no index.php
*/
/** * Listagem de usuários */
  public function index() {
    \App\View::make('users.index');
  }

    /**
     * Exibe o formulário de criação
     */
    public function cad_instituicao()
    {
        \App\View::make('instituicao.create');
    }
    public function cad_evento()
    {
        $users = User::selectAll();
        \App\View::make('evento.create', ['users' => $users,]);
    }
    public function cad_curso()
    {
        $users = User::selectAllEventos();
        \App\View::make('curso.create', ['users' => $users,]);
    }
    public function cad_inscricao()
    {
        $users = User::selectAllEventos();
        $cpf = null;
        \App\View::make('inscricao.create', ['users' => $users, 'cpf' => $cpf,]);
    }
    public function cad_certificado()
    {
        $users = User::selectAllEventos();
        \App\View::make('certificado.create', ['users' => $users,]);
    }
    public function cad_participante()
    {
        \App\View::make('participante.create');
    }

    public function relatorio()
    {
        \App\View::make('participante.rel');
    }
    public function emitir_cert()
    {
        \App\View::make('certificado.gerar');
    }
    public function verificar_cert()
    {
        $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : null;
        $users = User::verificar_certificado($codigo);
        \App\View::make('certificado.verificar', ['users' => $users,]);
    }

    public function emitir()
    {

        $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
        $curso = isset($_POST['curso']) ? $_POST['curso'] : null;
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $id_curso = isset($_POST['id_curso']) ? $_POST['id_curso'] : null;

        $objetos = array($cpf, $curso, $id, $id_curso);
        //$users = User::verificaCampos($cpf, $curso, $id, $id_curso);
        //$valores = [$cpf, $curso, $id, $id_curso];
        \App\View::make('certificado.emitir', ['objetos' => $objetos,]);
    }

    public function emitir_cert_gerar()
    {
        $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
        $users = User::selectAprovados($cpf);
        \App\View::make('certificado.gerar_2', ['users' => $users,]);
    }

    public function busca()
    {
        $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
        $users = User::selectAllEventos();
        $cpf = User::busca($cpf);
        \App\View::make('inscricao.create', ['users' => $users, 'cpf' => $cpf,]);
    }

    public function buscaCursos()
    {
        $participante_id = isset($_POST['participante_id']) ? $_POST['participante_id'] : null;
        $participante_nome = isset($_POST['participante_nome']) ? $_POST['participante_nome'] : null;
        $evento_id = isset($_POST['id_evento']) ? $_POST['id_evento'] : null;
        $evento_nome = isset($_POST['evento_nome']) ? $_POST['evento_nome'] : null;
        $valores = [$participante_id, $participante_nome, $evento_id, $evento_nome];
        //$valores = array('id_part' => $participante_id, 'nome_part' => $participante_nome, 'evento_id' => $evento_id, );
        $cursos = User::selectAllCursos($evento_id);
        \App\View::make('inscricao.create_2', ['cursos' => $cursos, 'valores' => $valores, ]);
    }

    /**
     * Processa o formulário via POST
     */
     public function instituicao()
     {
         // pega os dados do formuário
         $nome = isset($_POST['nome']) ? $_POST['nome'] : null;

         if (User::save_instituicao($nome))
         {
             header('Location: /instituicao');
             exit;
         }
     }

     public function evento()
     {
         // pega os dados do formuário
         $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
         $instituicao_id = isset($_POST['id']) ? $_POST['id'] : null;

         if (User::save_evento($nome, $instituicao_id))
         {
             header('Location: /evento');
             exit;
         }
     }

     public function curso()
     {
         // pega os dados do formuário
         $evento_id = isset($_POST['id_evento']) ? $_POST['id_evento'] : null;
         $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
         $ministrante = isset($_POST['ministrante']) ? $_POST['ministrante'] : null;
         $ch = isset($_POST['ch']) ? $_POST['ch'] : null;
         $ch_min = isset($_POST['ch_min']) ? $_POST['ch_min'] : null;
         $inicio = isset($_POST['inicio']) ? $_POST['inicio'] : null;
         $fim = isset($_POST['fim']) ? $_POST['fim'] : null;
         $turno = isset($_POST['turno']) ? $_POST['turno'] : null;

         if (User::save_curso($evento_id, $nome, $ministrante, $ch, $ch_min, $inicio, $fim, $turno))
         {
             header('Location: /curso');
             exit;
         }
     }

     public function inscricao()
     {
         // pega os dados do formuário
         $participante_id = isset($_POST['participante_id']) ? $_POST['participante_id'] : null;
         $curso_id = isset($_POST['id_curso']) ? $_POST['id_curso'] : null;
         $evento_id = isset($_POST['evento_id']) ? $_POST['evento_id'] : null;

         if (User::save_inscricao($participante_id, $curso_id, $evento_id))
         {
             header('Location: /inscricao');
             exit;
         }
     }

     public function certificado()
     {
         // pega os dados do formuário
         $evento_id = isset($_POST['id_evento']) ? $_POST['id_evento'] : null;

         $extensao1 = strtolower(substr($_FILES['layout']['name'], -4)); // -4 pra pegar os últimos caracteries, ou seja, o formato da imagem
         $layout = md5(time()) . $extensao1; //Define um novo nome para o arquivo
         $diretorio = "app\Views\img\layout_ass\\";

         move_uploaded_file($_FILES['layout']['tmp_name'], $diretorio . $layout); //Efetua o upload

         $extensao2 = strtolower(substr($_FILES['ass']['name'], -4)); // -4 pra pegar os últimos caracteries, ou seja, o formato da imagem
         $ass = md5(time() + 1) . $extensao2; //Define um novo nome para o arquivo

         move_uploaded_file($_FILES['ass']['tmp_name'], $diretorio . $ass); //Efetua o upload

         if (User::save_certificado($evento_id, $layout, $ass))
         {
             header('Location: /certificado');
             exit;
         }
     }

     public function participante()
     {
         // pega os dados do formuário
         $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
         $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : null;
         $rg = isset($_POST['rg']) ? $_POST['rg'] : null;
         $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
         $data_nasc = isset($_POST['data_nasc']) ? $_POST['data_nasc'] : null;
         $cep = isset($_POST['cep']) ? $_POST['cep'] : null;
         $rua = isset($_POST['rua']) ? $_POST['rua'] : null;
         $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : null;
         $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : null;
         $estado = isset($_POST['uf']) ? $_POST['uf'] : null;
         $fone = isset($_POST['fone']) ? $_POST['fone'] : null;

         if (User::save_participante($nome, $sexo, $rg, $cpf, $data_nasc, $cep, $rua, $bairro, $cidade, $estado, $fone))
         {
             header('Location: /participante');
             exit;
         }
     }








    public function store()
    {
        // pega os dados do formuário
        $name = isset($_POST['name']) ? $_POST['name'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
        $birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : null;

        if (User::save($name, $email, $gender, $birthdate))
        {
            header('Location: /');
            exit;
        }
    }

    /**
     * Exibe o formulário de edição de usuário
     */
    public function edit($id)
    {
        $user = User::selectAll($id)[0];

        \App\View::make('users.edit',['user' => $user,]);
    }

    /**
     * Processa o formulário de edição de usuário
     */
    public function update()
    {
        // pega os dados do formuário
        $id = $_POST['id'];
        $name = isset($_POST['name']) ? $_POST['name'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
        $birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : null;

        if (User::update($id, $name, $email, $gender, $birthdate))
        {
            header('Location: /');
            exit;
        }
    }

    /**
     * Remove um usuário
     */
    public function remove($id)
    {
        if (User::remove($id))
        {
            header('Location: /');
            exit;
        }
    }
}
