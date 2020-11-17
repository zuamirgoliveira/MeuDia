<?php 
session_start(); 
include 'conexao.php';

$idTarefa = $_GET['id'];

$insert = "INSERT INTO tarefa ( usuario,titulo,descricao,subtitulo,h_inicio,h_fim,tipo_tarefa,prioridade,data_tarefa) SELECT usuario, titulo, descricao, subtitulo, h_inicio, h_fim, tipo_tarefa, prioridade, CURRENT_DATE() from tarefa tar where tar.id =".$idTarefa;





$stmt = $conexao->query($insert);

header("Location: ../web/tarefas.php");



 ?>