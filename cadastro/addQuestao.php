<?php
  //conexão com o banco
  include('../php/banco.php');   
  
  //receber os dados por POST
  $disciplina = $_POST['disciplina'];
  $assunto = $_POST['assunto'];
  $descricao = $_POST['descricao']; 
  $imagem = $_POST['imagemnome2'];
  $item_a = $_POST['item_a'];
  $item_b = $_POST['item_b'];
  $item_c = $_POST['item_c'];
  $item_d = $_POST['item_d'];
  $item_e = $_POST['item_e'];
  $resp_correta = $_POST['resp_correta'];
  
  if($imagem==''){//caso a questão não possua imagem ele preenche o valor do campo como zero
	 $imagem = '0'; 
  }
  
  //insert para a tabela usuário
  $sql = "insert into tb_questao (cod_questao,cod_disc,cod_assunto,descricao,imagem,item_a,item_b,item_c,item_d,item_e,resp_correta)
						values (null,'$disciplina','$assunto','$descricao','$imagem','$item_a','$item_b','$item_c','$item_d','$item_e','$resp_correta');";
					  
  //executando o insert
  $consulta = $conexao->query($sql);
  
  if($consulta == true){
	  //echo 'true<br>';
	  $ultid = $conexao->insert_id;
	  //echo 'Location: questoes.php?mess=ok&q='.$ultid;
	  header('Location: questoes.php?mess=ok&q='.$ultid);
  }else{
	  //echo 'false';
	  header('Location: questoes.php?mess=erro');
  }
?>