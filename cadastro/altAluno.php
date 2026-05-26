<?php
	include('../php/banco.php');
	
	$cod=$_POST['cod'];
	$escola= $_POST['escola'];
	$nome= $_POST['nome'];
	$email= $_POST['email'];
	$matricula= $_POST['matricula'];
	

	
	$sql="update tb_aluno set nome = '$nome', email = '$email', matricula = '$matricula' where cod_aluno = $cod";
	
	$update= $conexao-> query($sql);
	
	if($update){
		header('Location:busAluno.php?update=ok');
	}else{
		header('Location:busAluno.php?update=erro');
	}
?>