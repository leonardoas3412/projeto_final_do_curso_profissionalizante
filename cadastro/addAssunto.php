<?php
  //conexão com o banco
  include('../php/banco.php');  
  
  //receber os dados por POST
  $disciplina = $_POST['disciplina']; 
  $assunto = $_POST['assunto'];
  
  
  //insert para a tabela usuário
  $sql = "insert into tb_assunto (cod_assunto,cod_disc,descricao)
							values (null,'$disciplina','$assunto');";
					  
  //executando o insert
  $consulta = $conexao->query($sql);
  
  if($consulta == true){
	  header('Location: assuntos.php?mess=ok');
  }else{
	  header('Location: assuntos.php?mess=erro');
  }
?>