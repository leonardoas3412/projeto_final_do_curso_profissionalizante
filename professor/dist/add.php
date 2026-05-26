<?php
  include('../../php/testasessao.php');
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Área do Professor</title>
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
						<h3>Preencha as informações para gerar o simulado</h3>
						<?php
								if(isset($_GET['mess'])){
									if($_GET['mess']=='ok'){
										echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
												  <strong>Atenção!</strong> Simulado criado com sucesso. Ver simulado <a href="versimulados.php">Clique aqui</a> 
												  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												  </button>
												</div>';
									}
									if($_GET['mess']=='erro'){
										echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
												  <strong>Atenção!</strong> Erro ao gerar simulado. 
												  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												  </button>
												</div>';
									}
								}
						?>
                        
						<form name="form1" id="form1" method="POST" action="gerarsimulado.php" onsubmit="return validar()">
								
								<div class="form-group">
									<label>Disciplina</label>
									<select class="form-control" name="disciplina" id="disciplina" >
										<option value="0">Informe a disciplina...</option>
										<?php
										    include('../../php/banco.php');
											$result = "select * from tb_disc order by descricao"; 
											$escolas = mysqli_query($conexao, $result);

											while($roww = mysqli_fetch_assoc($escolas)) { 
											     echo '<option id="'.$roww['cod_disc'].'" value="'.$roww['cod_disc'].'">'.$roww['descricao'].'</option>';
											}	
										?>
									</select>
								</div>
								
								<div class="form-group">
								<label>Assunto</label>
								
									
									
									<select class="form-control" name="assunto" id="assunto" >
										
										  <option value="0">Selecione primeiro a disciplina...</option>
										
									</select>
								
									 
								</div>
								<div id="totquestoes">
								
								</div>
								
								
								
								<div class="form-group">
									<label>Quantidade de Questões</label>  
									<input   type="text" name="qtd" id="qtd" class="form-control" placeholder="Insira a quantidade de questões do simulado" required  >
									
								</div>
								
								<div class="form-group" >
									<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Gerar Simulado</button>
									<button type="reset" class="btn btn-danger"><i class="fa fa-eraser"></i> Limpar</button>
								</div>
							</form>
                        
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
		});
		   
		
		
		</script>
    </body>
</html>
