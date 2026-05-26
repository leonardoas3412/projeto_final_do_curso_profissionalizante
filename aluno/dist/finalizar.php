<?php

include('../../php/banco.php');

  
   $id=$_GET['cod'];
   $gabarito=$_GET['gabarito'];
   $cod_item_simula=$_GET['cod_item_simula'];// recebe os codigos de cada questãos
   $idsimu=$_GET['id_simulado'];

   //Separa cada cod_item_simula de cada questão em um array
   $cis=explode(",",$cod_item_simula);


	//Separa cada item de cada questão em um array
   $questoes=explode(",",$gabarito);
	//Recebe o tamanho do array
 	$qtd_questoes= count($questoes);


	//cria o array para receber os updates
   $update= array();

   //recebe todos os arrays
   for($i = 0; $i < $qtd_questoes;$i++){

	//if ($questoes[$i]=='n'){$questoes[$i]='';}

	$update[$i] = "UPDATE tb_item_simula SET resposta = '$questoes[$i]' WHERE cod_item_simula = $cis[$i];";
	}

	//Coloca todos os updates em um string
	$u = implode("", $update);


	$sql = "UPDATE tb_simulado SET finalizado = 's' WHERE cod_simulado = $id;$u";
	
	var_dump($sql);
	$consulta = $conexao->query($sql);

	if($consulta == true){
		  header('Location: versimulados.php?id='.$idsimu.'');
	}else{
	 // header('Location: responder.php?delete=erro');
	}



?>