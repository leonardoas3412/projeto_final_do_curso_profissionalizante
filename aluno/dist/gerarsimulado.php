<?php
if(isset($_POST['qtd'])){
	//incluindo arquivo de conexão
	include('../../php/banco.php');
									
    //recebendo as variáveis										
	$qtd= $_POST['qtd'];
	$assunto= $_POST['assunto'];
	$disciplina= $_POST['disciplina'];
	//iniciando sessão para pegar a variável com o código do aluno
	session_start();
	$codaluno = $_SESSION['codaluno'];
	//modificando o timezone para America Fortaleza
	date_default_timezone_set('America/Fortaleza');
	$data = date('Y-m-d');
	$hora = date('H:i:s');
	
	//insert na na tabela simulado																						
	$sql = "insert into tb_simulado (cod_simulado,cod_aluno,cod_assunto,cod_disc,data, hora,qtd_questao,qtd_acerto)
						     values (null,'$codaluno','$assunto','$disciplina','$data','$hora','$qtd',0)";
	//echo $sql;				  
	//executando o insert
	$consulta = $conexao->query($sql);
	
	//verificando se o insert deu certo
	if($consulta == true){
	  //echo 'executou';
	  //recebendo o id o ultimo insert 
	  $ultid = $conexao->insert_id;
	  //echo $ultid;
	  
	  //sql para buscar todas as questões da disciplina e assunto selecionados, apenas o campo cod_questão (chave primária)	
	  $sql2="select cod_questao from tb_questao where cod_assunto = '$assunto' and cod_disc = '$disciplina'";
	//  echo $sql2;													
	  
	  //executando consulta das questões'
	  $consulta2 = $conexao->query($sql2);  
	  
	  //criar array(vetor) vazio para receber todos os códigos das questões selecionadas
	  $codigos = array();
	  
	  //estrutura de repetição para preencher o array com os códigos da questões
	  while($linha=$consulta2->fetch_array(MYSQLI_ASSOC)){
		  array_push($codigos,$linha['cod_questao']);
		  //echo $linha['cod_questao'].'<br>';
	  }
	 // echo '<pre>';
	 // var_dump($codigos);
	 // echo '</pre>';
	  
	  //echo '<br><br>';
	  //a função array_rand seleciona aleatoriamente indices dentro de um array
	  //ela possui dois parametros, o array, e quantos indices deseja selecionar dentro dele
	  //ao final o array $rand_keys possui indices aleatórios do primeiro vetor
	  $rand_keys = array_rand($codigos, $qtd);
	 // echo '<pre>';
	 // var_dump($rand_keys);
	 // echo '</pre>';
	  
	  //montando o insert dos itens do simulado, primeira parte  
	  $sqlquestoes = 'INSERT INTO tb_item_simula(cod_item_simula,cod_simulado,cod_questao,resposta,acerto) values ';
	  //for para fazer um insert único com todas as questões do simulado
	  for($x=0;$x<$qtd;$x++){
		  if($x == $qtd-1){
			$sqlquestoes .= "(null,".$ultid.",".$codigos[$rand_keys[$x]].",'','')";
		  }else{
			$sqlquestoes .= "(null,".$ultid.",".$codigos[$rand_keys[$x]].",'',''),";
		  }		  
	  }
	      //ao final teremos a seguinte sintaxe:
		  /*
		  INSERT INTO tb_item_simula(cod_item_simula,cod_simulado,cod_questao,resposta,acerto) 
		  values (null,31,396,'',''),(null,31,398,'',''),(null,31,404,'',''),
		  (null,31,406,'',''),(null,31,408,'',''),(null,31,410,'','')
		  
		  exemplo de uso da função $array_rand()
		  $input = array("Neo", "Morpheus", "Trinity", "Cypher", "Tank");
		  $rand_keys = array_rand($input, 2);
		  echo $input[$rand_keys[0]] . "\n";
		  echo $input[$rand_keys[1]] . "\n";
		  */
	  //echo '<br><br>';
	 // echo $sqlquestoes;
	  
	  $consulta3= $conexao->query($sqlquestoes);
	  if (($consulta) && ($consulta2) && ($consulta3)){
		  header('Location: add.php?mess=ok&s='.$ultid);
	  }else{
		  header('Location: add.php?mess=erro');
	  }
	 
  }else{
	  //echo 'false';
	  header('Location: add.php?mess=erro');
  }
}
?>