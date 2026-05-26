<!DOCTYPE html>
<?php
	include('../php/banco.php');
	if(isset($_GET['cod'])){
		include('../php/banco.php');
		
		$cod= $_GET['cod'];
		
		$sql= "select * from tb_prof where cod_prof = $cod";
		
		$consulta = $conexao->query($sql);
		
		if($consulta){
			$linha= $consulta->fetch_array(MYSQLI_ASSOC);
		}
	}
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
					<a class="btn btn-info" href="busProfessor.php"><i class="fa fa-angle-left"></i> Voltar</a>
                        <h1 class="mt-4"> Alterar cadastro de Professor</h1>
							<?php
								if(isset($_GET['mess'])){
									if($_GET['mess']=='erro'){			 
										echo '<div id="alerta" class="alert alert-danger alert-dismissible fade show" role="alert"><center><b>Atenção!</b> Erro ao cadastrar, tente novamente.<center/></div> <br>';
									}
									if($_GET['mess']=='ok'){			 
										echo '<div id="alerta" class="alert alert-success alert-dismissible fade show" role="alert"><center><b>Tudo certo!</b> cadastro realizado com sucesso!</center></div> <br>';
									}
								}
							?>
                        
							<form name="form1" id="form1" method="POST" action="altProfessor.php" onsubmit="return validar()">
							<input name="cod" type="hidden" value="<?php echo $linha['cod_prof'];?>">
								<div class="form-group">
									<label>Nome</label>  
									<input value=" <?php echo $linha['nome']; ?>" class="form-control" type="text" name="nome" placeholder="Insira seu nome" required>
								</div>
								<div class="form-group">
									<label>E-mail</label>  
									<input value=" <?php echo $linha['email']; ?>" class="form-control" type="email" name="email" placeholder="Insira seu e-mail" required aria-required="true" required>
								</div>
							
								<div class="form-group">
									<label>Escola</label>  <br>
									<!-- <input class="w3-input" type="text" name="escola" placeholder="Insira sua escola" required> -->
										<select class="form-control" name="escola" id="escola" style="width:99%" >
										  <option value="0" disabled selected>Informe sua escola...</option>
											<?php
												$result = "select * from tb_escola";
												$escolas = mysqli_query($conexao, $result);

												while($row_escolas = mysqli_fetch_assoc($escolas)) { ?> 
													<option value="<?php echo $row_escolas['cod_escola'];  ?>"> <?php echo $row_escolas['descricao']; ?>
													</option> <?php
												}
											?>
										</select>
								</div>
								
								<div class="form-group" >
									<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Cadastrar</button>
									<button type="reset" class="btn btn-danger"><i class="fa fa-eraser"></i> Limpar</button>
								</div>
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
			function validar(){
				if(confirm('Deseja realmente alterar o registro?')){
					return true;
				}else{
					return false;
				}
			}
		</script>
	</body>
</html>
