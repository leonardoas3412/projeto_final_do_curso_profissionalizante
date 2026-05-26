<?php
   
   include('banco.php');
    
   //criando uma variável para
   //receber o valor do email   
   $email = $_POST['email'];
   $senha = $_POST['senha'];
      
     
   //criando consulta para verificar a existencia 	  
   //do usuário
   $sql = "select * from tb_adm where email = '$email'
		   and senha = '$senha'";
   
   //executando a consulta no banco
   $consulta = $conexao->query($sql);
   
   //verificar se a consulta deu certo
   if($consulta == true){
	   if($consulta->num_rows > 0){
		   $linha = $consulta->fetch_array(MYSQLI_ASSOC);
		   session_start();
		   $_SESSION['login'] = 'ok';
		   $_SESSION['nome'] = $nome;
		    
		   $_SESSION['tipousu'] = $linha['tipousu'];
		   echo $_SESSION['tipousu'];
		   header('Location: ../adm/dist/principal.php?mess=ok');
	   }else{
		   header('Location: ../index.php?mess=erro');
	   }
   }
   

?>