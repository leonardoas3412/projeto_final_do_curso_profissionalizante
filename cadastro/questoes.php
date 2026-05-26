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
		CKEDITOR.replace('descricao');
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
					<a class="btn btn-info" href="../adm/dist/cadastro.php"><i class="fa fa-angle-left"></i> Voltar</a>
                        <h1 class="mt-4"> Cadastro de Questões</h1>
						<input type="hidden" id="imgenviada">
						
							<?php
								if(isset($_GET['mess'])){
									if($_GET['mess']=='erro'){			 
										echo '<div id="alerta" class="alert alert-danger alert-dismissible fade show" role="alert"><center><b>Atenção!</b> Erro ao cadastrar, tente novamente.<center/></div> <br>';
									}
									if($_GET['mess']=='ok'){			 
										echo '<div id="alerta" class="alert alert-success alert-dismissible fade show" role="alert"><center><b>Tudo certo!</b> Cadastro realizado com sucesso! <b><a href="verquestao.php?q='.$_GET['q'].'">Ver Questão</a></b></center></div> <br>';
									}
								}
								if(isset($_GET['delete'])){
									if($_GET['delete']=='erro'){			 
										echo '<div id="alerta" class="alert alert-danger alert-dismissible fade show" role="alert"><center><b>Atenção!</b> Erro ao apagar questão<center/></div> <br>';
									}
									if($_GET['delete']=='ok'){			 
										echo '<div id="alerta" class="alert alert-success alert-dismissible fade show" role="alert"><center><b>Tudo certo!</b> Questão apagada com sucesso!</center></div> <br>';
									}
								}
							?>
                        
							<form name="form1" id="form1" method="POST" action="addQuestao.php" onsubmit="return validar()">
								
								<div class="form-group">
									<label>Disciplina</label>
									<select class="form-control" name="disciplina" id="disciplina" >
										<option value="0">Informe a disciplina...</option>
										<?php
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
									
									<select class="form-control" name="assunto" id="assunto" >
										
										  <option value="0">Selecione primeiro a disciplina...</option>
										
										
										
									</select>
								</div>
								<div class="form-group">
								
									<label>Caso a Questão possua imagem, selecione abaixo e clique no botão enviar imagem</label>  
									<input class="fileToUpload form-control" type="file" id="imagem" name="imagem" />

									 <input type="hidden" placeholder="Informe aqui o nome da imagem e depois pressione o botão Enviar Imagem" id="imagemnome" name="imagemnome" class="form-control"/><br>
									 <input type="hidden" placeholder="Informe aqui o nome da imagem e depois pressione o botão Enviar Imagem" id="imagemnome2" name="imagemnome2" class="form-control"/><br>
									  <button type="button" class="btn btn-success" onclick="uploadfile()">Enviar Imagem</button>
								</div>
								<div class="form-group">
								
									<label>Descriçao</label><br>
									
									<textarea class="ckeditor" cols="80" id="descricao" name="descricao" rows="10">Digite aqui a descrição da questão</textarea>
									<!--<input  type="text" name="descricao" id="descricao" class="form-control w-150" placeholder="Insira o conteúdo da questão" required>-->
								</div>
								
								<div class="form-group">
									<label>Item A</label>  
									<input   type="text" name="item_a" id="item_a" class="form-control" placeholder="Insira o conteúdo do item" required  >
								</div>
								<div class="form-group">
									<label>Item B</label>  
									<input   type="text" name="item_b" id="item_b" class="form-control" placeholder="Insira o conteúdo do item" required  >
								</div>
								<div class="form-group">
									<label>Item C</label>  
									<input  type="text" name="item_c" id="item_c" class="form-control" placeholder="Insira o conteúdo do item"  >
								</div>
								<div class="form-group">
									<label>Item D</label>  
									<input  type="text" name="item_d" id="item_d" class="form-control" placeholder="Insira o conteúdo do item" >
								</div>
								<div class="form-group">
									<label>Item E</label>  
									<input  type="text" name="item_e" id="item_e" class="form-control" placeholder="Insira o conteúdo do item" >
								</div>
								<div class="form-group">
									<label>Resposta correta</label>  
									<!--<input   type="text" name="resp_correta" id="resp_correta" class="form-control" placeholder="Insira a alternativa correta" required >-->
									<select name="resp_correta" id="resp_correta" class="form-control">
										<option value="0" disabled selected>Informe a alternativa correta</option>
										<option value="a">A</option>
										<option value="b">B</option>
										<option value="c">C</option>
										<option value="d">D</option>
										<option value="e">E</option>
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
		<script src="js/ckeditor/ckeditor.js"></script>
		<script src="js/jquery.js"></script>
		<script src="js/jquery.form.js"></script>
		
		<script>
		
		 /*window.onload = function(){
              
         }*/
		
			function validar(){				
				if(confirm('Deseja salvar o registro?')){
					return true;
				}else{
					return false;
				}
			}
			
		
		function uploadfile(){
			      //pegando nome do arquivo com extensão
				  var fullPath = document.getElementById('imagem').value;
				  if (fullPath) {
					var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
					var filenam = fullPath.substring(startIndex);
					if (filenam.indexOf('\\') === 0 || filenam.indexOf('/') === 0) {
						filenam = filenam.substring(1);
					}
					//adicionando o nome ao input oculto
					
					nomeimg = filenam.split(".");
					//valor para imagem na pasta
					document.getElementById('imagemnome').value = nomeimg[0];
					document.getElementById('imagemnome2').value = filenam;
					alert(nomeimg[0]);
				  }
				  
				  var filename = $('#imagemnome').val();                    //arquvio para ser salvo
				  var file_data = $('.fileToUpload').prop('files')[0];    //conteudo arquivo
				  var form_data = new FormData();
				  form_data.append("file",file_data);    //adicionando dados do arquivo ao formulario
				  form_data.append("filename",filename); //adicionando nome do arquivo ao formulario
				  
				  //Ajax para enviar o arquivo de forma dinâmica
				  $.ajax({
					  url: "upload.php",                      //arquivo que receberá e irá salvar o arquivo da imagem
							 type: "POST",
							 dataType: 'script',
							 cache: false,
							 contentType: false,
							 processData: false,
							 data: form_data,
						     success:function(dat2){
							//caso a imagem seja salva   
							if(dat2==1) 
							  alert("Imagem Enviada com Sucesso!");
						      
							else 
							  alert("Sem permissão para envio");
						  }
					});
		 }
		 
		 
		 $(document).ready(function(){ 
		     
		 
		    //método para preencher o select com o conteúdo do assunto 
			$("#disciplina").change(function() {
			//alert('entrei');
			 var dis = $("#disciplina").children(":selected").attr("id"); 
			 
				$.post('preenchecomboassunto.php', {dis: dis}, function(resposta) {
					
								 if (resposta != false) {									 
									 $("#assunto").html(resposta);
								 }
				});
				
			
			});	
		});	
		</script>
	</body>
</html>
