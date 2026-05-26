<?php
  //conexão com o banco
  include('../php/banco.php');  
  
  //receber os dados por POST
  $nome = $_POST['nome']; 
  $email = $_POST['email'];
  $escola = $_POST['escola'];
  $senha = $_POST['senha'];
  
  //insert para a tabela usuário
  $sql = "insert into tb_prof (cod_prof,cod_escola,nome,email,senha)
					  values (null,'$escola','$nome','$email','$senha');";
					  
  //executando o insert
  $consulta = $conexao->query($sql);
  
  if($consulta == true){
	  header('Location: professor.php?mess=ok');
  }else{
	  header('Location: professor.php?mess=erro');
  }
?>