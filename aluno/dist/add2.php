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
        <title>Área do Aluno</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="principal.php">SASV</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>

			<h3 class="navbar-brand"> EEEP Dom Walfrido </h3>
					
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Configurações</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.html">Sair</a>
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
                        <div class="row">
						<form name="form1" id="form1" method="POST" action="salvaradd.php" onsubmit="return validar()">
								
								<div class="form-group">
									<label>Disciplina</label>
									<select class="form-control" name="disciplina" id="disciplina" >
										<option value="0">Informe a disciplina...</option>
										<?php
										    include('../../php/banco.php');
											$result = "select * from tb_disc"; 
											$escolas = mysqli_query($conexao, $result);

											while($roww = mysqli_fetch_assoc($escolas)) { 
											     echo '<option id="'.$roww['cod_disc'].'" value="'.$roww['cod_disc'].'">'.$roww['descricao'].'</option>';
											}	
										?>
									</select>
								</div>
								
								<div class="form-group">
								<label>Assunto</label>
								<div class="input-group">
									
									
									<select class="form-control" name="assunto" id="assunto" >
										
										  <option value="0">Selecione primeiro a disciplina...</option>
										
									</select>
								
									 <div class="input-group-append">
									   <button type="button" id="adicionaassunto">Adicionar</button> 
									</div>
									</div>
								</div>
								<div id="assuntosescolhidos">
								
								</div>
								
								
								
								<div class="form-group">
									<label>Quantidade de Questões</label>  
									<input   type="text" name="qtd" id="qtd" class="form-control" placeholder="Insira a quantidade de questões do simulado" required  >
									<input   type="text" name="codassunto" id="codassunto" class="form-control" >
								</div>
								
								<div class="form-group" >
									<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Gerar Simulado</button>
									<button type="reset" class="btn btn-danger"><i class="fa fa-eraser"></i> Limpar</button>
								</div>
							</form>
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
				if(confirm('Deseja realmente salvar o simulado?')){
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
