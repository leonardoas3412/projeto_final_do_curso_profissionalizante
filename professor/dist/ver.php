<?php
  include('../../php/testasessao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
	<meta charset="UTF-8">
        <!--<meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />-->
        <title>Área do Aluno</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="principal.php">SASV</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>

			<h3 class="navbar-brand"> <?php echo strtoupper($_SESSION['escola']);?> </h3>
					
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Configurações</a>
                        <div class="dropdown-divider"></div>
						<a class="dropdown-item" class="nav-link" href="#sairmodal" data-toggle="modal" data-target="#">Sair</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="principal.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Página Inicial
                            </a>

                            <a class="nav-link" href="simulados.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Simulados
                            </a>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Registrado como:</div>
                        Aluno
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid col-md-12">
                        
						<h1 > <?php echo strtoupper($_SESSION['nome']);?></h1>
						
						
						<h3>SIMULADO</h3>
						
                        
								
										<?php
										    include('../../php/banco.php');
											
											$idsimu=$_GET['id'];
											$sql="select * from vsimulados
														     where cod_simulado =".$idsimu."";
											//echo $sql;
												$consulta= $conexao->query($sql);
												
												if($consulta != true){
													//echo "entrou";
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
															echo '<input type="hidden"name="id_simulado" value="'.$idsimu.'">';							

															

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
												}	
										?>
										
									
                        					<a href="versimulados.php" class="btn btn-success"><i class="fa fa-undo-alt"></i> Voltar</a>
											<button id="<?php echo $_GET['id'];?>" name="imprimir" class="btn btn-danger" type="button" ><i class="fa fa-print"></i> Gerar PDF</button>
											
                    </div>
					
                       <!-- Logout Modal-->
                              <div class="modal fade" id="sairmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
								  <div class="modal-content">
									<div class="modal-header">
									  <h5 class="modal-title" id="exampleModalLabel">SASV</h5>
									  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									  </button>
									</div>
									<div class="modal-body">Deseja sair do sistema?</div>
									<div class="modal-footer">
									  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
									  <a class="btn btn-primary" href="../../php/sair.php">Confirmar</a>
									</div>
								  </div>
								</div>
							  </div>

                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Projeto Social 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
		<script src="js/jquery.js"></script>
		<script>
		var vetdisciplinas = [];
		function validar(){				
				if(confirm('Deseja realmente gerar o simulado?')){
					return true;
				}else{
					return false;
				}
			}
		$(document).ready(function(){ 
		     
		 
		    //método para preencher o select com o conteúdo do assunto 
			$("#disciplina").change(function() {
			//alert('entrei');
			 var dis = $("#disciplina").children(":selected").attr("id"); 
		 
				$.post('preenchecomboassunto.php', {dis: dis}, function(resposta) {
								 if (resposta != false) {
								 
									 $("#assunto").html(resposta);
								 }else{
									 alert('deu falso');
								 }
				});
				
			
			});	
			//método para contar as questões do assunto 
			$("#assunto").change(function() {
			 //alert('entrei');
			 var assunt = $("#assunto").children(":selected").attr("id"); 
		 //alert('entrei');
				$.post('contaquestoes.php', {assunt: assunt}, function(resposta) {
								 if (resposta != false) {
									$("#totquestoes").html('<button type="button" class="btn btn-success"> <span class="badge badge-light">'+resposta+'</span> Questões disponíveis<span class="sr-only">unread messages</span></button>');
								 }
				});
				
			
			});	
			//método para imprimir
			$("#imprimir").click(function() {
			 //alert('entrei');
			 var imprimir = $("#imprimir").attr("id"); 
		 //alert('entrei');
				$.post('gerarpdf.php', {imprimir: imprimir}, function(resposta) {
								 if (resposta != false) {
									$("#totquestoes").html('<button type="button" class="btn btn-success"> <span class="badge badge-light">'+resposta+'</span> Questões disponíveis<span class="sr-only">unread messages</span></button>');
								 }
				});
				
			
			});
		});
		   
		
		$("#adicionaassunto").click(function(){
			
			var assunto = $("#assunto").children(":selected").attr("id");
			if(assunto != '0'){
			var nomeassunto = $("#assunto").children(":selected").attr("value");
			vetdisciplinas.push(assunto);
			document.getElementById('assuntosescolhidos').innerHTML += "<div class='alert alert-success' role='alert'>  "+nomeassunto+" </div>";
			
			//document.getElementById('codassunto').value = vetdisciplinas;
			document.getElementById('codassunto').value = '';
			vetdisciplinas.forEach(function (item, indice, array) {
				document.getElementById('codassunto').value += item+',';
				//console.log(item, indice);
			});
			var str= document.getElementById('codassunto').value;
			str = str.replace(/,\s*$/, "");
			document.getElementById('codassunto').value = str;
			}else{
				alert('informe um assunto');
			}
		});
		</script>
    </body>
</html>
