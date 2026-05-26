<?php
if(isset($_POST['assunt'])){

	include('../../php/banco.php');
													
	$assunt= $_POST['assunt'];
													
	$sql="select * from tb_questao where cod_assunto = '$assunt'";
													
	$consulta= $conexao->query($sql);
												
	if($consulta == true){
		if($consulta->num_rows>0){
			$x=$consulta->num_rows;			
			echo $x;
		}else{
			echo '0';
		}
	}else{
		
		echo false;
	}
}
?>