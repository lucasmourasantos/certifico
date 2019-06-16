<?php

/*
 * :::::::RELATÓRIO DE PARTICIPANTES:::::::
 */

require('app\Views\relatorios\fpdf.php');
use App\DB;
$DB = new DB;

function troca_caracteres($texto) {

    $entrada = array('&aacute;', '&eacute;', '&iacute;', '&oacute;', '&uacute;', '&atilde;', '&otilde;', '&acirc;', '&ecirc;', '&icirc;', '&ocirc;', '&ucirc;', '&ccedil;', '&Aacute;', '&Eacute;', '&Iacute;', '&Oacute;', '&Uacute;', '&Atilde;', '&Otilde;', '&Acirc;', '&Ecirc;', '&Icirc;', '&Ocirc;', '&Ucirc;', '&Ccedil;', '&agrave;', '&Agrave;');
    $saida = array('á', 'é', 'í', 'ó', 'ú', 'ã', 'õ', 'â', 'ê', 'î', 'ô', 'û', 'ç', 'Á', 'É', 'Í', 'Ó', 'Ú', 'Ã', 'Õ', 'Â', 'Ê', 'Î', 'Ô', 'Û', 'Ç', 'à', 'À');
    $result = str_replace($entrada, $saida, $texto);

    return utf8_decode($result);
}

class myPDF extends FPDF {

    function header() {
        //$this->Image("../gerar_certificado/layout/cert_1.png");
        //$this->Image($file);
        $this->SetFont('courier', "", 10);
        $this->Cell(0, 0, '', 1, 1, 'L');//Linha horizontal
        $this->Cell(186, 5, troca_caracteres('Uso Exclusivo de: Sistema CERTIFICO'), 0, 0, 'L');
        $this->Ln();
        $this->Cell(186, 5, troca_caracteres('Cópia de demonstração'), 0, 0, 'L');
        $this->Ln();
        $this->Cell(186, 5, troca_caracteres('Relatório de Participantes'), 0, 0, 'L');
        $this->Ln();
        $this->Cell(0, 0, '', 1, 1, 'L');//Linha horizontal
        $this->Ln(5);
    }

    function footer() {
        $this->SetY(-15);
        $this->SetFont('courier', '', 10);
        $this->Cell(0, 10, 'Page' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    function headerTable() {
        $this->SetFont('courier', '', 10);
        $this->Cell(40, 5, 'CPF', 0, 0, 'C');
        $this->Cell(80, 5, 'Nome', 0, 0, 'C');
        $this->Cell(71, 5, 'Curso/Palestra', 0, 0, 'C');
        $this->Ln();
        $this->Cell(40, 3, '----------------', 0, 0, 'C');
        $this->Cell(80, 3, '------------------------------------', 0, 0, 'L');
        $this->Cell(75, 3, '---------------------------------', 0, 0, 'L');
        $this->Ln();
    }

    function viewTable($DB) {
        $this->SetFont('courier', '', 10);
        $sql = "select p.cpf, p.nome, c.nome as curso from participante p join participante_tem_curso ptc on p.id=ptc.participante_id join curso c on c.id=ptc.curso_id order by p.nome";
        $stmt = $DB->prepare($sql);
        $stmt->execute();
        //$stmt = $DB->query('select p.cpf, p.nome, c.nome as curso from participante p join participante_tem_curso ptc on p.id=ptc.participante_id join curso c on c.id=ptc.curso_id order by p.nome');
        while ($data = $stmt->fetch(PDO::FETCH_OBJ)) {
            $this->Cell(40, 7, $data->cpf, 0, 0, 'C');
            $this->Cell(80, 7, troca_caracteres($data->nome), 0, 0, 'L');
            $this->Cell(71, 7, troca_caracteres($data->curso), 0, 0, 'L');
            $this->Ln();
        }
    }
}

//$pdf = new myPDF();

//$pdf->AddPage();
//$pdf->viewTable($DB);
//$pdf->Output();


//configurações iniciais
$pdf = new myPDF();
$pdf->Open();
$pdf->AliasNbPages();
$pdf->AddPage('P', 'A4', 0); //'P' = Portrait (Retrato) e 'L' = Landscape (Paisagem)
ob_clean(); // Limpa o buffer de saída
$pdf->headerTable();
$pdf->viewTable($DB);
$pdf->Output();
exit;
?>
