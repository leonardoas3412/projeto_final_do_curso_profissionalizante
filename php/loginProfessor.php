<?php
   session_start();
   include('banco.php');
    
   //criando uma variável para
   //receber o valor do email   
   $email = $_POST['email'];
   $senha = $_POST['senha'];
      
     
   //criando consulta para verificar a existencia 	  
   //do usuário
   $sql = "select * from tb_prof INNER JOIN tb_escola ON tb_escola.cod_escola = tb_prof.cod_escola where email = '$email'
		   and senha = '$senha'";
   
   //executando a consulta no banco
   $consulta = $conexao->query($sql);
   
   //verificar se a consulta deu certo
   if($consulta == true){
	   if($consulta->num_rows > 0){
		   $linha = $consulta->fetch_array(MYSQLI_ASSOC);
		   
		   $_SESSION['login'] = 'ok';
		   $_SESSION['nome'] = $linha['nome'];
         $_SESSION['email'] = $linha['email'];
         $_SESSION['escola'] = $linha['descricao'];
         $_SESSION['codprof'] = $linha['cod_prof'];
		    
		   header('Location: ../professor/dist/principal.php?mess=ok');
	   }else{
		   header('Location: ../index.php?mess=erro');
	   }
   }
   

?>