<?php
	include('../php/banco.php');
	
	$cod=$_POST['cod'];
	$escola= $_POST['escola'];
	$nome= $_POST['nome'];
	$email= $_POST['email'];

	 
	
	
	$sql="update tb_prof set nome = '$nome', email = '$email' where cod_prof = $cod";
	
	$update= $conexao-> query($sql);
	
	if($update){
		header('Location:busProfessor.php?update=ok');
	}else{
		header('Location:busProfessor.php?update=erro');
	}
?>