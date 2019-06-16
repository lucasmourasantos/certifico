<?php
/*
 * :::::::EMITIR CERTIFICADOS DE PARTICIPANTES:::::::
 */
setlocale(LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

//require('app\Views\fpdf\fpdf.php');
require('app\Views\relatorios\fpdf.php');
use App\DB;
$DB = new DB;

function troca_caracteres($texto) {

    $entrada = array('&aacute;', '&eacute;', '&iacute;', '&oacute;', '&uacute;', '&atilde;', '&otilde;', '&acirc;', '&ecirc;', '&icirc;', '&ocirc;', '&ucirc;', '&ccedil;', '&Aacute;', '&Eacute;', '&Iacute;', '&Oacute;', '&Uacute;', '&Atilde;', '&Otilde;', '&Acirc;', '&Ecirc;', '&Icirc;', '&Ocirc;', '&Ucirc;', '&Ccedil;', '&agrave;', '&Agrave;');
    $saida = array('á', 'é', 'í', 'ó', 'ú', 'ã', 'õ', 'â', 'ê', 'î', 'ô', 'û', 'ç', 'Á', 'É', 'Í', 'Ó', 'Ú', 'Ã', 'Õ', 'Â', 'Ê', 'Î', 'Ô', 'Û', 'Ç', 'à', 'À');
    $result = str_replace($entrada, $saida, $texto);

    return utf8_decode($result);
}

function codigo_verf() {
    $upper = implode('', range('A', 'Z')); // ABCDEFGHIJKLMNOPQRSTUVWXYZ
    $lower = implode('', range('a', 'z')); // abcdefghijklmnopqrstuvwxyzy
    $nums = implode('', range(0, 9)); // 0123456789

    $alphaNumeric = $upper . $lower . $nums; // ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789
    $string = '';
    $len = 7; // numero de chars
    for ($i = 0; $i < $len; $i++) {
        $string .= $alphaNumeric[rand(0, strlen($alphaNumeric) - 1)];
    }
    return $string; // ex: q02TAq3
}

function validacao($cpf, $nome, $curso, $codigo, $DB){
    $sql = "INSERT INTO validacao (cpf, nome, curso, codigo)
             VALUES(:cpf, :nome, :curso, :codigo)";
    $stmt = $DB->prepare($sql);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':curso', $curso);
    $stmt->bindParam(':codigo', $codigo);

    $result = $stmt->execute();

    if (!$result) {
        var_dump($stmt->errorInfo());
        exit();
    }
}

class myPDF extends FPDF {
//    function header() {
//        $this->Image("layout_ass/'".$layout."'.png", 0, 0, 299);
//    }

    function viewTable($DB, $cpf, $curso, $id, $id_curso) {

      // --------- Variáveis do Formulário ----- //
          /*if (isset($_POST['emitir'])) {
              $cpf = $_POST['cpf'];
              $curso = $_POST['curso'];
              $id_participante = $_POST['id'];
              $id_curso = $_POST['id_curso'];
          }*/
          if (!empty($objetos)):
              $cpf = $objetos[0];
              $curso = $objetos[1];
              $id_participante = $objetos[2];
              $id_curso = $objetos[3];
          endif;

        $stmt1 = $DB->query("SELECT COUNT(hora) as result FROM ponto WHERE curso_id = '" . $id_curso . "' and participante_id = '" . $id_participante . "'");
        $result = null;

        if (count($stmt1)) {
            foreach ($stmt1 as $res) {
                $result = $res['result'];
            }
        }
        if ($result <= 1) {

            // --------- Variáveis que podem vir de um banco de dados por exemplo ----- //
            $stmt = $DB->query("select p.cpf, p.nome, c.nome as curso, c.ch, c.inicio, c.fim, e.nome as evento,
            (select i.nome from instituicao i where i.id=e.instituicao_id) as local,
            (select ce.layout from certificado ce where e.id=ce.evento_id) as layout,
            (select ce.ass from certificado ce where e.id=ce.evento_id) as ass from participante p
            join participante_tem_curso ptc on p.id=ptc.participante_id
            join curso c on c.id=ptc.curso_id
            join evento e on e.id=ptc.evento_id where p.cpf like '" . $cpf . "' and c.nome like '" . $curso . "'");
            while ($data = $stmt->fetch(PDO::FETCH_OBJ)) {
                $cpf = $data->cpf;
                $nome = troca_caracteres($data->nome);
                $curso = troca_caracteres($data->curso);
                $carga_h = $data->ch;
                $data_ini = $data->inicio;
                $data_fim = $data->fim;
                $evento = $data->evento;
                $empresa = $data->local;
                $layout = $data->layout;
                $ass = $data->ass;
            }
            $tipo = "Participante";
//        $curso = "Workshop Segurança da Informação";
            $codigo_msg = "Para confirmar a autenticidade deste Certificado, acesse a página: www.certifico.com.br/confirma e digite o código: ";
            $codigo = codigo_verf();

            validacao($cpf, $nome, $curso, $codigo, $DB);

            $this->Image("app\Views\img\layout_ass\\" . $layout, 0, 0, 299);
            $image1 = "app\Views\img\layout_ass\\" . $ass;

            $this->Ln(40);
            $this->SetFont('Arial', '', 20);
            $this->Cell(63, 7, '', 0, 0, 'C');
            $this->Cell(211, 7, 'CERTIFICAMOS QUE', 0, 0, 'C');
            $this->Ln(20);
            $this->Cell(63, 7, '', 0, 0, 'C');
            $this->Cell(211, 7, $nome, 0, 0, 'C');
            $this->Ln(20);
            $this->SetFont('Arial', '', 15);
            $this->Cell(63, 7, '', 0, 0, 'C');
            $this->MultiCell(211, 7, "Participou do(a) " . $curso . ", na categoria " . $tipo . ", do(a) "
                    . troca_caracteres($evento) . " na data de " . $data_ini . " a " . $data_fim . ".\nLocal: "
                    . troca_caracteres($empresa) . ".\n" . troca_caracteres("Carga horária total: ") . $carga_h . "h.", 0, 'J');
            $this->Ln(5);
            $this->Cell(63, 7, '', 0, 0, 'C');
            $this->Cell(211, 7, utf8_decode("Picos-PI, " . utf8_encode(strftime('%d de %B de %Y', strtotime(date('Y-m-d'))))), 0, 0, 'R');
            $this->Ln(7);
            $this->Cell(140, 7, '', 0, 0, 'C');
            $this->Cell(50, 40, $this->Image($image1, $this->GetX(), $this->GetY(), 45), 0, 0, 'B', false);
            $this->Ln(18);
            $this->SetFont('Arial', '', 10);
            $this->Cell(143, 7, '', 0, 0, 'C');
            $this->Cell(100, 7, troca_caracteres("Organização do Evento"), 0, 0, 'B');
            $this->Ln(20);
            $this->SetFont('Arial', '', 11);
            $this->Cell(63, 7, '', 0, 0, 'C');
            $this->MultiCell(98, 4, troca_caracteres($codigo_msg) . $codigo, 0, 'J');
            $this->Ln(7);
        } else {
            $texto_msg = "Participante ausente ou com presença insuficiente!";
            echo '<script language="javascript">';
            echo 'alert("' . troca_caracteres($texto_msg) . '")';
            echo '</script>';

            echo '<script language="javascript">';
            echo 'location.href="/emitir_cert";';
            echo '</script>';
        }
    }

}

$pdf = new myPDF();
$pdf->Open();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4', 0); //'P' = Portrait (Retrato) e 'L' = Landscape (Paisagem)
ob_clean(); // Limpa o buffer de saída
$pdf->viewTable($DB, $cpf, $curso, $id, $id_curso);
$pdf->Output();
exit;
?>
