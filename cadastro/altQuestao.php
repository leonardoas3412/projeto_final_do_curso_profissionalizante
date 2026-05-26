<?php
  //conexão com o banco
  include('../php/banco.php');   
  
  //receber os dados por POST
  $cod=$_POST['cod'];
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
  $sql = "update tb_questao set descricao='$descricao', imagem='$imagem', item_a='$item_a', item_b='$item_b', item_c='$item_c', item_d='$item_d', item_e='$item_e',resp_correta='$resp_correta' where cod_questao = $cod";
						
					  
  //executando o insert
  $consulta = $conexao->query($sql);
  
  if($consulta == true){
	  //echo 'true<br>';
	  $ultid = $conexao->insert_id;
	  //echo 'Location: questoes.php?mess=ok&q='.$ultid;
	  header('Location:busQuestao.php?update=ok&q='.$ultid);
  }else{
	  //echo 'false';
	  header('Location:busQuestao.php?update=erro');
  }
?>