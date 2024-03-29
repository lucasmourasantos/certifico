<?php
namespace App\Models;
session_start();

use App\DB;

class User {
/*
* classe para manipular as tabelas do BD
*/
/** * Busca usuários * * Se o ID não for passado, busca todos. Caso contrário, filtra pelo ID especificado. */
public static function sign($usuario, $senha) {
$DB = new DB;
  if (empty($usuario) || empty($senha)) {
          $message = '<label>All fields are required</label>';
      } else {
          $query = "SELECT * FROM heroku_78a881d13ca0c35.users WHERE usuario = :usuario AND senha = :senha";
          $statement = $DB->prepare($query);
          $statement->execute(
                  array(
                      'usuario' => $usuario,
                      'senha' => md5($senha) //Criptografar senha antes de salvá-la
                  )
          );
          $count = $statement->rowCount();
          if ($count > 0) {
              $_SESSION["usuario"] = $_POST["usuario"];
              return true;
          } else {
              return false;
          }
      }
}

public static function save_cad_login($nome, $email, $password_1, $password_2) {
$DB = new DB;
  if (empty($nome) || empty($email) || empty($password_1) || empty($password_2)) {
          $message = '<label>All fields are required</label>';
      } else {
        // insere no banco
        $sql = "INSERT INTO heroku_78a881d13ca0c35.users (usuario, email, senha)
                VALUES(:nome, :email, :password_1)";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password_1', md5($password_1));

        if ($stmt->execute())
        {
          $_SESSION['success'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso!</div>";
            return true;
        }
        else
        {
            $_SESSION['error'] = "<div class='alert alert-danger' role='alert'>Erro ao cadastrar!</div>";
            //echo "Erro ao cadastrar";
            print_r($stmt->errorInfo());
            return false;
        }
      }
}

public static function signOut() {
  //logout.php
  session_destroy();
              return true;
}

public static function selectAll() {

  $sql = sprintf("SELECT * FROM heroku_78a881d13ca0c35.instituicao order by nome ASC");
  $DB = new DB;
  $stmt = $DB->prepare($sql);

  $stmt->execute();

  $users = $stmt->fetchAll(\PDO::FETCH_ASSOC);

  return $users;
}

public static function selectAllEventos() {

  $sql = sprintf("SELECT * FROM heroku_78a881d13ca0c35.evento order by nome ASC");
  $DB = new DB;
  $stmt = $DB->prepare($sql);

  $stmt->execute();

  $users = $stmt->fetchAll(\PDO::FETCH_ASSOC);

  return $users;
}

public static function selectAllCursos($evento_id) {

  $sql = "SELECT * FROM heroku_78a881d13ca0c35.curso where evento_id = :evento_id order by nome ASC";
  $DB = new DB;
  $stmt = $DB->prepare($sql);
  $stmt->bindParam(':evento_id', $evento_id, \PDO::PARAM_INT);

  $stmt->execute();

  $cursos = $stmt->fetchAll(\PDO::FETCH_ASSOC);

  return $cursos;
}

public static function busca($cpf) {

  $sql = "SELECT id, nome, cpf FROM heroku_78a881d13ca0c35.participante where cpf = :cpf";
  $DB = new DB;
  $stmt = $DB->prepare($sql);
  $stmt->bindParam(':cpf', $cpf, \PDO::PARAM_STR);

  $stmt->execute();

  $cpf = $stmt->fetchAll(\PDO::FETCH_ASSOC);
  return $cpf;
}

public static function verificar_certificado($codigo) {

  $sql = "SELECT * FROM heroku_78a881d13ca0c35.validacao where codigo like :codigo";
  $DB = new DB;
  $stmt = $DB->prepare($sql);
  $stmt->bindParam(':codigo', $codigo, \PDO::PARAM_STR);

  $stmt->execute();

  $codigo = $stmt->fetchAll(\PDO::FETCH_ASSOC);
  return $codigo;
}


public static function selectAprovados($cpf) {

  $sql = "select p.id, p.cpf, c.id as id_curso, c.nome as curso, e.nome as evento, (select i.nome from heroku_78a881d13ca0c35.instituicao i where i.id=e.instituicao_id) as local from heroku_78a881d13ca0c35.participante p
          join heroku_78a881d13ca0c35.participante_tem_curso ptc on p.id=ptc.participante_id
          join heroku_78a881d13ca0c35.curso c on c.id=ptc.curso_id
          join heroku_78a881d13ca0c35.evento e on e.id=ptc.evento_id where p.cpf like :cpf order by p.nome";
  $DB = new DB;
  $stmt = $DB->prepare($sql);
  $stmt->bindParam(':cpf', $cpf, \PDO::PARAM_STR);

  $stmt->execute();

  $users = $stmt->fetchAll(\PDO::FETCH_ASSOC);
  return $users;
}

    /**
     * Salva no banco de dados um novo usuário
     */
    public static function save_instituicao($nome) {
        // validação (bem simples, só pra evitar dados vazios)
        if (empty($nome))
        {
            $_SESSION['msg'] = "";
            //echo "Volte e preencha todos os campos";
            return false;
        }

        // insere no banco
        $DB = new DB;
        $sql = "INSERT INTO heroku_78a881d13ca0c35.instituicao (nome) VALUES(:nome)";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':nome', $nome);

        if ($stmt->execute())
        {
          $_SESSION['success'] = "";
            return true;
        }
        else
        {
          $_SESSION['error'] = "";
            //echo "Erro ao cadastrar";
            print_r($stmt->errorInfo());
            return false;
        }
    }

    public static function save_evento($nome, $instituicao_id) {
        // insere no banco
        $DB = new DB;
        $sql = "INSERT INTO heroku_78a881d13ca0c35.evento (instituicao_id, nome) VALUES(:instituicao_id, :nome)";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':instituicao_id', $instituicao_id);
        $stmt->bindParam(':nome', utf8_encode($nome));

        if ($stmt->execute())
        {
          $_SESSION['success'] = "";
            return true;
        }
        else
        {
            $_SESSION['error'] = "";
            print_r($stmt->errorInfo());
            return false;
        }
    }

    public static function save_curso($evento_id, $nome, $ministrante, $ch, $ch_min, $inicio, $fim, $turno) {
        // insere no banco
        $DB = new DB;
        $sql = "INSERT INTO heroku_78a881d13ca0c35.curso (evento_id, nome, ministrante, ch, ch_min, inicio, fim, turno)
                VALUES(:evento_id, :nome, :ministrante, :ch, :ch_min, :inicio, :fim, :turno)";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':evento_id', $evento_id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':ministrante', $ministrante);
        $stmt->bindParam(':ch', $ch);
        $stmt->bindParam(':ch_min', $ch_min);
        $stmt->bindParam(':inicio', $inicio);
        $stmt->bindParam(':fim', $fim);
        $stmt->bindParam(':turno', $turno);

        if ($stmt->execute())
        {
          $_SESSION['success'] = "";
            return true;
        }
        else
        {
            $_SESSION['error'] = "";
            print_r($stmt->errorInfo());
            return false;
        }
    }

    public static function save_inscricao($participante_id, $curso_id, $evento_id) {
        // insere no banco
        $DB = new DB;
        $sql = "INSERT INTO heroku_78a881d13ca0c35.participante_tem_curso (participante_id, curso_id, evento_id) VALUES(:participante_id, :curso_id, :evento_id)";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':participante_id', $participante_id);
        $stmt->bindParam(':curso_id', $curso_id);
        $stmt->bindParam(':evento_id', $evento_id);

        if ($stmt->execute())
        {
          $_SESSION['success'] = "";
            return true;
        }
        else
        {
            $_SESSION['error'] = "";
            print_r($stmt->errorInfo());
            return false;
        }
    }

    public static function save_participante($nome, $sexo, $rg, $cpf, $data_nasc, $cep, $rua, $bairro, $cidade, $estado, $fone) {
        // insere no banco
        $DB = new DB;
        $sql = "INSERT INTO heroku_78a881d13ca0c35.participante (nome, sexo, rg, cpf, data_nasc, cep, rua, bairro, cidade, estado, fone)
                VALUES(:nome, :sexo, :rg, :cpf, :data_nasc, :cep, :rua, :bairro, :cidade, :estado, :fone)";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':sexo', $sexo);
        $stmt->bindParam(':rg', $rg);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':data_nasc', $data_nasc);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':rua', $rua);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':fone', $fone);

        if ($stmt->execute())
        {
          $_SESSION['success'] = "";
            return true;
        }
        else
        {
          $_SESSION['error'] = "";
            echo "Erro ao cadastrar";
            print_r($stmt->errorInfo());
            return false;
        }
    }

    public static function save_certificado($evento_id, $layout, $ass) {
        // insere no banco
        $DB = new DB;
        $sql = "INSERT INTO heroku_78a881d13ca0c35.certificado (evento_id, layout, ass) VALUES(:evento_id, :layout, :ass)";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':evento_id', $evento_id);
        $stmt->bindParam(':layout', $layout);
        $stmt->bindParam(':ass', $ass);

        if ($stmt->execute())
        {
          $_SESSION['success'] = "";
            return true;
        }
        else
        {
            $_SESSION['error'] = "";
            print_r($stmt->errorInfo());
            return false;
        }
    }













    /**
     * Altera no banco de dados um usuário
     */
    public static function update($id, $name, $email, $gender, $birthdate)
    {
        // validação (bem simples, só pra evitar dados vazios)
        if (empty($name) || empty($email) || empty($gender) || empty($birthdate))
        {
            echo "Volte e preencha todos os campos";
            return false;
        }

        // a data vem no formato dd/mm/YYYY
        // então precisamos converter para YYYY-mm-dd
        $isoDate = dateConvert($birthdate);

        // insere no banco
        $DB = new DB;
        $sql = "UPDATE users SET name = :name, email = :email, gender = :gender, birthdate = :birthdate WHERE id = :id";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':birthdate', $isoDate);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);

        if ($stmt->execute())
        {
            return true;
        }
        else
        {
            echo "Erro ao cadastrar";
            print_r($stmt->errorInfo());
            return false;
        }
    }


    public static function remove($id)
    {
        // valida o ID
        if (empty($id))
        {
            echo "ID não informado";
            exit;
        }

        // remove do banco
        $DB = new DB;
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);

        if ($stmt->execute())
        {
            return true;
        }
        else
        {
            echo "Erro ao remover";
            print_r($stmt->errorInfo());
            return false;
        }
    }
}
