<!DOCTYPE html>
<?php
 include('../php/banco.php');
?>
<html lang="pt-br">

    <head>
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Área do ADM</title>
        <link href="../adm/dist/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
		<script>
		//CKEDITOR.replace('descricao');
		</script>
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
                   
                    <div class="sb-sidenav-footer">
                        <div class="small">Registrado como:</div>
                        ADM
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
					<a class="btn btn-info" href="questoes.php"><i class="fa fa-angle-left"></i> Voltar</a>
                        <h1 class="mt-4"> Questão Cadastrada</h1>
						<?php
											if(isset($_GET['q'])){
												    $id=$_GET['q'];
													$result = "select * from tb_questao where cod_questao = $id"; 
													$questao = mysqli_query($conexao, $result);
													$row = mysqli_fetch_assoc($questao);
													echo '<b>Texto da Questão:</b> <br>';
													echo $row['descricao'];
													
													echo '<b>Imagem da questão:</b><br>';
													if ($row['imagem'] == '0'){
														echo 'Questão sem imagem';
													}else{
														echo '<img src="img_upload/'.$row['imagem'].'" width="50%">';
													}
													//echo '<img src="img_upload/'.$row['imagem'].'.png" width="50%">';
													
													echo '<br>';
													echo '<b>itens da questão:</b><br>';
													echo 'a) '.$row['item_A'].'<br>';
													echo 'b) '.$row['item_B'].'<br>';
													echo 'c) '.$row['item_C'].'<br>';
													echo 'd) '.$row['item_D'].'<br>';
													echo 'e) '.$row['item_E'].'<br>';
													echo '<b>Resposta Correta:</b><br>';
													echo $row['resp_correta'].'<br>';
													

														
											}
											
											echo '<a onclick="apagar('.$id.')" class="btn btn-danger" href="#"><i class="fa fa-trash"></i> Apagar</a><br>';
											
											
							?>
                        
							
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
		<script src="js/ckeditor/ckeditor.js"></script>
		<script src="js/jquery.js"></script>
		<script src="js/jquery.form.js"></script>
			<script>
			  function apagar(x){				
				if(confirm('Deseja excluir a questão?')){
					location.href = "exQuestao.php?cod="+x;
				}else{
					return false;
				}
			}
			</script>
		
	</body>
</html>
