<?php
if(isset($_GET['id'])){
	
	include('../../php/banco.php');
									
    
	$id= $_GET['id'];
	
	
	$sql = "delete from tb_simulado where cod_simulado = $id";
	
	$consulta = $conexao->query($sql);
	
	
	if($consulta == true){
		  header('Location: versimulados.php?delete=ok');
	}else{
		  header('Location: versimulados.php?delete=erro');
	}

}
?>