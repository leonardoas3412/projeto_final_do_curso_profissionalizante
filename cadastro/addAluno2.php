<?php
  //conexão com o banco
  include('../php/banco.php');  
  
  //receber os dados por POST
  $nome = $_POST['nome']; 
  $email = $_POST['email'];
  $matricula = $_POST['matricula']; 
  $escola = $_POST['escola'];
  $senha = $_POST['senha'];
  
  //insert para a tabela usuário
  $sql = "insert into tb_aluno (cod_aluno,cod_escola,nome,email,matricula,senha)
					  values (null,'$escola','$nome','$email','$matricula','$senha');";
					  
  //executando o insert
  $consulta = $conexao->query($sql);
  
  if($consulta == true){
	  header('Location: aluno2.php?mess=ok');
  }else{
	  header('Location: aluno2.php?mess=erro');
  }
?>