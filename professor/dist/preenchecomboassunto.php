<?php
if(isset($_POST['dis'])){

	include('../../php/banco.php');
													
	$dis= $_POST['dis'];
													
	$sql="select * from tb_assunto where cod_disc = '$dis' order by descricao";
													
	$consulta= $conexao->query($sql);
												
	if($consulta == true){
		if($consulta->num_rows>0){
			$x='';
			$x.= '<option value="0" id="0">Selecione o assunto...</option>';
			while($linha=$consulta->fetch_array(MYSQLI_ASSOC)){
				$x.= '<option value="'.$linha['cod_assunto'].'" id="'.$linha['cod_assunto'].'">'.$linha['descricao'].'</option>';
			}
			echo $x;
		}
	}else{
		
		echo false;
	}
}
?>