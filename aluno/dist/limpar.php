<?php

include('../../php/banco.php');

  
   $id=$_GET['id'];
   $idsimu=$_GET['idsimulado'];


   ECHO $id;
   ECHO $idsimu;

	$sql = "UPDATE tb_item_simula SET resposta = '' WHERE cod_item_simula = $id;";
	
	$consulta = $conexao->query($sql);




	
	if($consulta == true){
        header('Location: responder.php?id='.$idsimu.'&mess='.$id.'apaga&#id'.$id.'');
  }else{
  //  header('Location: responder.php?delete=erro');
  }



?>