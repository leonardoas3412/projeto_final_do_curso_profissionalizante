<?php
	include('../php/banco.php');
	
	$cod= $_GET['cod'];
	
	$sql= "delete from tb_questao where cod_questao= $cod";
	
	$consulta=$conexao->query($sql);
	
	if($consulta){
		header('Location:questoes.php?delete=ok');
	}else{
		header('Location:questoes.php?delete=erro');
	}
?>