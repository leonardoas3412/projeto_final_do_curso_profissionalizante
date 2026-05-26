<?php
session_start();
include('banco.php');
    
   //criando uma variável para
   //receber o valor do email   
   $email = $_POST['email'];
   $senha = $_POST['senha'];
   
     
   //criando consulta para verificar a existencia 	  
   //do usuário
   $sql = "select * from tb_aluno INNER JOIN tb_escola ON  tb_escola.cod_escola = tb_aluno.cod_escola where (email = '$email' or matricula = '$email')
		   and senha = '$senha'";

   //echo $sql;
   //executando a consulta no banco
   $consulta = $conexao->query($sql);
   
   //verificar se a consulta deu certo
   if($consulta == true){
	   if($consulta->num_rows > 0){
		   //echo 'iei';
		   $linha = $consulta->fetch_array(MYSQLI_ASSOC);
		   
		   $_SESSION['login'] = 'ok';		   
		   $_SESSION['nome'] = $linha['nome'];
		   $_SESSION['email'] = $linha['email'];
		   $_SESSION['senha'] = $linha['senha'];		   
		   $_SESSION['codaluno'] = $linha['cod_aluno'];
		   $_SESSION['escola'] = $linha['descricao'];
		   
		   //echo $_SESSION['codaluno'];
		   
		   
		    
		   //$_SESSION['tipousu'] = $linha['tipousu'];
		   //echo $_SESSION['tipousu'];
		   header('Location: ../aluno/dist/principal.php?mess=ok');
	   }else{
		   header('Location: ../index.php?mess=erro');
	   }
   }
   

?>