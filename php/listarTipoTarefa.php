<?php
include 'conexao.php';

echo "<table class='table table-striped'>
       <thead>
            <tr class='bg-dark text-white'>
                <th><center>Descrição</center></th>
                <th><center>Ações</center></th>
               <center> <a class='btn btn-primary' style='margin-left:95%' href='registrarTipoTarefa.php'><i class='fa fa-plus'></i></a></center>
                </tr>
        </thead>
        <tbody>";

$idUsuario = $_SESSION['idusuario'];

$stmt = $conexao->query("select id,descricao from tipo_tarefa where usuario='$idUsuario'");
$contagem = $stmt->rowCount();

if($contagem >= 1){

$resultado = $stmt->fetchAll();



foreach($resultado as $linha){
        
        echo "<tr>
                <td><center>".$linha['descricao']."</center></td>
                
                ";
                                
                echo"
                <td><center><button class='btn btn-primary'><a class='fa fa-search'></a></button>   <button class='btn btn-danger'><a class='fa fa-trash' href='../php/excluirTipoTarefa.php?id=".$linha['id']."'></a></button></center></td>
              </tr>"; 

      }

      echo"</tbody>
         </table>";
}



?>    	
     