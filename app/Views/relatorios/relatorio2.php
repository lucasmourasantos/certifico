<?php

require('fpdf.php');
require('../dtSis/dbaSis.php');
require('../dtSis/outSis.php');

function troca_caracteres($texto) {

    $entrada = array('&aacute;', '&eacute;', '&iacute;', '&oacute;', '&uacute;', '&atilde;', '&otilde;', '&acirc;', '&ecirc;', '&icirc;', '&ocirc;', '&ucirc;', '&ccedil;', '&Aacute;', '&Eacute;', '&Iacute;', '&Oacute;', '&Uacute;', '&Atilde;', '&Otilde;', '&Acirc;', '&Ecirc;', '&Icirc;', '&Ocirc;', '&Ucirc;', '&Ccedil;', '&agrave;', '&Agrave;');

    $saida = array('á', 'é', 'í', 'ó', 'ú', 'ã', 'õ', 'â', 'ê', 'î', 'ô', 'û', 'ç', 'Á', 'É', 'Í', 'Ó', 'Ú', 'Ã', 'Õ', 'Â', 'Ê', 'Î', 'Ô', 'Û', 'Ç', 'à', 'À');

    $result = str_replace($entrada, $saida, $texto);

    return utf8_decode($result);
}

function getQuantHora($hora_i, $hora_f) {
    $hora_min = explode(':', $hora_i);
    $hora_max = explode(':', $hora_f);
    $hora_min = mktime($hora_min[0], $hora_min[1], $hora_min[2]);
    $hora_max = mktime($hora_max[0], $hora_max[1], $hora_max[2]);
    $media = ($hora_max - $hora_min) / (60 ^ 2);
    return $media = abs($media / 60);
}

function getMinMax($data, $id) {
    $ponto = array();
    $readPonto = exeSQL("select * from tbponto where idAluno='$id' and data='$data'");
    foreach ($readPonto as $value) {
        $ponto[] = $value['hora'];
    }
    $min = min($ponto);
    $max = max($ponto);

    return $min . '#' . $max . '#' . $data;
}

function MinMax($MinMax) {
    $array = array();
    $array['min'] = min($MinMax);
    $array['max'] = max($MinMax);
    return $array;
}

class PDF extends FPDF {

// Page header
    function Header() {
        // Logo
        //$this->Image('logo.png',20,10,30);
        // Arial bold 15
        $this->SetFont('courier', '', 11);
        // Move to the right
        $this->Line(10, 10, 285, 10);
        $this->Cell(0.5);
        // Title
        $this->Cell(185, 5, troca_caracteres('Uso Exclusivo de: Cópia de Demonstração'), 0, 1, 'L');
        $this->Cell(185, 5, troca_caracteres('UNIVERSIDADE RAIMUNDO SÁ'), 0, 1, 'L');
        $this->Cell(185, 5, troca_caracteres('RELAÇÃO DE TRABALHOS'), 0, 1, 'L');

        $this->Line(10, 26, 285, 26);
        // Line break
        $this->Ln(5);
    }

// Page footer
    function Footer() {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, troca_caracteres('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('h');

$pdf->SetFont('courier', '', 10);
$pdf->Cell(22, 5, 'Matricula', 0, 0, 'C');
$pdf->Cell(90, 5, 'Nome', 0, 0, 'C');
$pdf->Cell(162, 5, 'Trabalho', 0, 1, 'C');
$pdf->Cell(22, 5, '---------', 0, 0, 'C');
$pdf->Cell(90, 5, '-----------------------------------------', 0, 0, 'C');
$pdf->Cell(162, 5, '---------------------------------------------------------------------------', 0, 1, 'C');

$read = exeSQL("SELECT * FROM tbtrabalho_aluno AS ta inner join tbaluno as a on ta.idALuno = a.id inner join tbtrabalhos_publicados as tp on ta.idTrabalho=tp.id");
$i=0;
if ($read) {
    foreach ($read as $key) {
        $i++;        
        $pdf->Cell(22, 5, $key['matricula'], 0, 0, 'C');
        $pdf->Cell(90, 5, $key['nome'], 0, 0, 'L');
        $pdf->Cell(162, 5, lmWord($key['titulo'], 75), 0, 1, 'L');
    }
}
$pdf->Cell(22, 5, '---------', 0, 0, 'C');
$pdf->Cell(90, 5, '-----------------------------------------', 0, 0, 'C');
$pdf->Cell(162, 5, '---------------------------------------------------------------------------', 0, 1, 'C');
$pdf->Ln(5);
        
$pdf->SetFont('courier', 'B', 10);
$pdf->Cell(22, 5, 'Total de Registros: '.$i, 0, 1, 'L');

$pdf->Output();
?>