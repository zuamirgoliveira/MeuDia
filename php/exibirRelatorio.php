<?php
define('FPDF_FONTPATH', 'font/');
require('../fpdf/fpdf.php');

session_start();
include 'conexao.php';

$idUsuario = $_SESSION['idusuario'];
$relatorio =$_POST['relatorio'];
							
$pdf = new FPDF('L');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(135,12,utf8_decode("Relatório de Atividades - $relatorio"),0,0,"C");
$pdf->Image('../css/img/logo-meudia-login.png',10,5,18,21,'PNG');
$pdf->ln(20); //espaçamento entra linhas de 15 mm

$pdf->SetFont('Arial','B',12);
$pdf->Cell(60, 7,utf8_decode('Tipo Tarefa'),1,0,"C");
$pdf->Cell(30, 7,utf8_decode('Tarefa'),1,0,"C");
$pdf->Cell(30, 7,utf8_decode('Subtítulo'),1,0,"C");
$pdf->Cell(70, 7,utf8_decode('Descrição'),1,0,"C");
$pdf->Cell(30, 7,utf8_decode('Hora inicio'),1,0,"C");
$pdf->Cell(30, 7,utf8_decode('Hora fim'),1,0,"C");
$pdf->Cell(32, 7,utf8_decode('Data da Tarefa'),1,0,"C");
$pdf->ln(); //nenhum espaçamentos entre linhas

if ($relatorio && "Semanal") {
	
	$stmt = $conexao->query("SELECT tar.id,
								tar.titulo,
								tar.subtitulo,
								tar.descricao,
								tar.h_inicio,
								tar.h_fim,
								tar.tipo_tarefa AS id_tipo_tarefa,
								tar.data_tarefa,
								tip.descricao AS tipo_tarefa,
								pri.id AS id_prioridade,
								pri.descricao AS prioridade,
								pri.nemotecnico 
						    FROM tarefa tar,
								prioridade pri,
								tipo_tarefa tip
						    WHERE pri.id = tar.prioridade
								AND tar.tipo_tarefa = tip.id
								AND tar.usuario = '$idUsuario'
								AND tar.data_tarefa BETWEEN CURRENT_DATE()-7 AND CURRENT_DATE()");
				
	$resultado = $stmt->fetchAll();
		
	foreach($resultado as $linha){

		$pdf->Cell(60, 7, utf8_decode($linha['tipo_tarefa']),1,0,"C");
		$pdf->Cell(30, 7, utf8_decode($linha['titulo']),1,0,"C");
		$pdf->Cell(30, 7, utf8_decode($linha['subtitulo']),1,0,"C");
		$pdf->Cell(70, 7, utf8_decode($linha['descricao']),1,0,"C");
		$pdf->Cell(30, 7, utf8_decode($linha['h_inicio']),1,0,"C");
		$pdf->Cell(30, 7, utf8_decode($linha['h_fim']),1,0,"C");
		$pdf->Cell(32, 7, utf8_decode($linha['data_tarefa']),1,0,"C");

		$pdf->Ln();	
		
	}
	
	$pdf->Output();
	
} else {
	header("Location: ../web/tarefas.php");
}

if ($relatorio && "Quinzenal") {
	
	$stmt = $conexao->query("SELECT tar.id,
								tar.titulo,
								tar.subtitulo,
								tar.descricao,
								tar.h_inicio,
								tar.h_fim,
								tar.tipo_tarefa AS id_tipo_tarefa,
								tar.data_tarefa,
								tip.descricao AS tipo_tarefa,
								pri.id AS id_prioridade,
								pri.descricao AS prioridade,
								pri.nemotecnico 
						    FROM tarefa tar,
								prioridade pri,
								tipo_tarefa tip
						    WHERE pri.id = tar.prioridade
								AND tar.tipo_tarefa = tip.id
								AND tar.usuario = '$idUsuario'
								AND tar.data_tarefa BETWEEN CURRENT_DATE()-15 AND CURRENT_DATE()");
				
	$resultado = $stmt->fetchAll();
		
	foreach($resultado as $linha){

		$pdf->Cell(60, 7, utf8_decode($linha['tipo_tarefa']),1,0,"C");
		$pdf->Cell(30, 7, utf8_decode($linha['titulo']),1,0,"C");
		$pdf->Cell(30, 7, utf8_decode($linha['subtitulo']),1,0,"C");
		$pdf->Cell(70, 7, utf8_decode($linha['descricao']),1,0,"C");
		$pdf->Cell(30, 7, utf8_decode($linha['h_inicio']),1,0,"C");
		$pdf->Cell(30, 7, utf8_decode($linha['h_fim']),1,0,"C");
		$pdf->Cell(32, 7, utf8_decode($linha['data_tarefa']),1,0,"C");

		$pdf->Ln();	
		
	}
	
	$pdf->Output();
	
} else {
	header("Location: ../web/tarefas.php");
}

if ($relatorio && "Mensal") {
	
	$stmt = $conexao->query("SELECT tar.id,
								tar.titulo,
								tar.subtitulo,
								tar.descricao,
								tar.h_inicio,
								tar.h_fim,
								tar.tipo_tarefa AS id_tipo_tarefa,
								tar.data_tarefa,
								tip.descricao AS tipo_tarefa,
								pri.id AS id_prioridade,
								pri.descricao AS prioridade,
								pri.nemotecnico 
						    FROM tarefa tar,
								prioridade pri,
								tipo_tarefa tip
						    WHERE pri.id = tar.prioridade
								AND tar.tipo_tarefa = tip.id
								AND tar.usuario = '$idUsuario'
								AND tar.data_tarefa BETWEEN CURRENT_DATE()-30 AND CURRENT_DATE()");
				
	$resultado = $stmt->fetchAll();
		
	foreach($resultado as $linha){

		$pdf->Cell(60, 7, utf8_decode($linha['tipo_tarefa']),1,0,"C");
		$pdf->Cell(30, 7, utf8_decode($linha['titulo']),1,0,"C");
		$pdf->Cell(30, 7, utf8_decode($linha['subtitulo']),1,0,"C");
		$pdf->Cell(70, 7, utf8_decode($linha['descricao']),1,0,"C");
		$pdf->Cell(30, 7, utf8_decode($linha['h_inicio']),1,0,"C");
		$pdf->Cell(30, 7, utf8_decode($linha['h_fim']),1,0,"C");
		$pdf->Cell(32, 7, utf8_decode($linha['data_tarefa']),1,0,"C");

		$pdf->Ln();	
		
	}
	
	$pdf->Output();
	
} else {
	header("Location: ../web/tarefas.php");
}
?>