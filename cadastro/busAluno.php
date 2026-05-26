<!DOCTYPE html>
<?php
 include('../php/banco.php');
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Área do ADM</title>
        <link href="../adm/dist/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="principal.php">SASV</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>

			<h3 class="navbar-brand">ADM</h3>
					
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Configurações</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../index.php">Sair</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="../adm/dist/principal.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Página Inicial
                            </a>
                            <a class="nav-link" href="../adm/dist/cadastro.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>
                                Cadastro
                            </a>
							<a class="nav-link" href="../adm/dist/simulados.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Simulados
                            </a>
							<a class="nav-link" href="../adm/dist/relatorio.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-bar"></i></div>
                                Relatório
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Registrado como:</div>
                        ADM
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4"> Busca de Alunos</h1>
							<?php
								if(isset($_GET['delete'])){
									if($_GET['delete']=='ok'){
										echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
												  <strong>Atenção!</strong> Registro apagado com sucesso. 
												  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												  </button>
												</div>';
									}
									if($_GET['delete']=='erro'){
										echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
												  <strong>Atenção!</strong> Erro ao excluir. 
												  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												  </button>
												</div>';
									}
								}
								if(isset($_GET['update'])){
									if($_GET['update']=='ok'){
										echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
												  <strong>Atenção!</strong> Registro alterado com sucesso. 
												  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												  </button>
												</div>';
									}
									if($_GET['update']=='erro'){
										echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
												  <strong>Atenção!</strong> Erro ao alterar o registro. 
												  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												  </button>
												</div>';
									}
								}
							?>
                        
							<form name="form1" method="POST" action="busAluno.php"> 
								<div class="input-group text-left">
									<input name="texto" type="text" class="form-control">
									<button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i> Buscar</button>
								</div><br>
								
								<table class="table table-hover table-striped" width="100%" cellspacing="0">
									<thead class="thead-light">
									  <tr >
										<th>Código</th>
										<th>Nome</th>
										<th>E-mail</th>
										<th>Matrícula</th>
										<th>Escola</th>
										<th>Opções</th>
										
									  </tr>
									</thead>
									
									<tbody>
										<?php
											if(isset($_POST['texto'])){
												//conexão com o banco
												include('../php/banco.php');
												
												$texto= $_POST['texto'];
												
												$sql="select * from tb_aluno where nome like '%$texto%'";
												
												$consulta= $conexao->query($sql);
												
												if($consulta == true){
													if($consulta->num_rows>0){
														while($linha=$consulta->fetch_array(MYSQLI_ASSOC)){
															echo '<tr>
																	<td>'.$linha['cod_aluno'].'</td>
																	<td>'.$linha['nome'].'</td>
																	<td>'.$linha['email'].'</td>
																	<td>'.$linha['matricula'].'</td>
																	<td>'.$linha['cod_escola'].'</td>
																	
																	
																	<td>
																		<a title="Alterar" onclick="validaraltera('.$linha['cod_aluno'].')"href="#" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
																		<a title="Excluir" onclick="validardelete('.$linha['cod_aluno'].')" href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
																	</td>
																	
																  </tr>';
														}
													}
												}
											}
										?>
									  
									  
									</tbody>
								</table>
							</form>
						<div class="row">
							
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
		<script>
			function validardelete(cod){
				if(confirm('Deseja excluir este registro?')){
					location.href= "exAluno.php?cod="+cod;
				}
			}
			function validaraltera(cod){
				if(confirm('Deseja alterar este registro?')){
					location.href= "cadalteraAluno.php?cod="+cod;
				}
			}
	    </script>
	</body>
</html>
