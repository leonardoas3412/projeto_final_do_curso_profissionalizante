<?php

include('../../php/banco.php');

   $opcao=$_POST['opcao'];
   $id=$_POST['cod_item_simula'];
   $idsimu=$_POST['id_simulado'];
   
echo $id;
echo $opcao;


	
	$sql = "UPDATE tb_item_simula SET resposta = '$opcao' WHERE cod_item_simula = $id;";
	
	$consulta = $conexao->query($sql);

var_dump($sql);



	
	if($consulta == true){
		  header('Location: responder.php?id='.$idsimu.'&mess='.$id.'ok&#id'.$id.'');
	}else{
	  header('Location: responder.php?delete=erro');
	}



?>