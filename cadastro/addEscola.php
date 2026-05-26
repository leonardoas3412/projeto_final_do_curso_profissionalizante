<?php
  //conexão com o banco
  include('../php/banco.php');  
  
  //receber os dados por POST
  $descricao= $_POST['descricao']; 
  $cidade= $_POST['cidade'];
 
  
  //insert para a tabela usuário
  $sql = "insert into tb_escola (cod_escola,descricao,cidade)
					  values (null,'$descricao','$cidade');";
					  
  //executando o insert
  $consulta = $conexao->query($sql);
  
  if($consulta == true){
	  header('Location: escola.php?mess=ok');
  }else{
	  header('Location: escola.php?mess=erro');
  }
?>