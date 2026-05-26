<?php
if(isset($_POST['imprimir'])){

	include('../../php/banco.php');
	include('../../php/Mpdf.php');
													
	$imprimir= $_POST['imprimir'];

	$page = '<h3>SIMULADO</h3>	
		$sql= "select * from vsimulados where cod_simulado = ".$imprimir;
			
			$consulta= $conexao->query($sql);
			
			if($consulta == true){
				if($consulta->num_rows>0){
					$i = 1;
					while($linha=$consulta->fetch_array(MYSQLI_ASSOC)){
						
						echo '<form  method="POST" action="#">
						<div class="card">
						
								  <h5 class="card-header">Questão - '.$i.'</h5>
								  <div class="card-body">
									<h5 class="card-title">'.$linha['descricao'].'</h5>';
						if ($linha['imagem'] != '0'){
							echo '<img src="../../cadastro/img_upload/'.$linha['imagem'].'"><br>';
						}
						
						echo '<input type="hidden" name="cod_item_simula" value="'.$linha['cod_item_simula'].'">';							
						echo '<input type="hidden"name="id_simulado" value="'.$imprimir.'">';							

						

						echo '<p class="card-text" >';
						echo '<input type="radio" id="'.$linha['item_A'].'" name="opcao" value="a" > a - '.$linha['item_A'].'<br>';							
						echo '<input type="radio" id="'.$linha['item_B'].'" name="opcao" value="b"> b - '.$linha['item_B'].'<br>';
						if($linha['item_C']!=''){
							echo '<input type="radio" id="'.$linha['item_C'].'" name="opcao" value="c"> c - '.$linha['item_C'].'<br>';
						}
						if($linha['item_D']!=''){
							echo '<input type="radio" id="'.$linha['item_D'].'" name="opcao" value="d"> d - '.$linha['item_D'].'<br>';
						}		
						if($linha['item_E']!=''){
							echo '<input type="radio" id="'.$linha['item_E'].'" name="opcao" value="e"> e - '.$linha['item_E'].'<br>';
						}
						
									
						echo		'</p>
									
								
								  </div>
							  </div>
							  </form>';
							  
						/*echo '<pre><p>'.$linha['descricao'].'</p></pre>';
						if ($linha['imagem'] != '0'){
							echo '<img src="../../cadastro/img_upload/'.$linha['imagem'].'"><br>';
						}
						echo 'a - '.$linha['item_A'].'<br>';
						echo 'b - '.$linha['item_B'].'<br>';
						echo 'c - '.$linha['item_C'].'<br>';
						echo 'd - '.$linha['item_D'].'<br>';
						echo 'e - '.$linha['item_E'].'<br>';*/
						echo '<br><br>';
						$cod_simulado=$linha['cod_simulado'];

						$i++;
						
					}
				}else{
					echo '<tr><td colspan="100%">Nenhum Simulado Encontrado</td></tr>';
				}
			}; ';
			
			$mpdf = new mPDF();
			$mpdf->WriteHtml($page);
			$mpdf->Output($arquivo, 'D');
}
																
?>