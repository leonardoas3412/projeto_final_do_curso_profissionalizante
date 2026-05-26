<!DOCTYPE html>
<html lang="pt-br">
<meta charset="UTF-8">

<title>SASV</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="icones.css"/>
<link rel="stylesheet" type="text/css" href="form.css"/>
<link rel="stylesheet" type="text/css" href="alertas.css"/>
<body>

<!-- Header -->
<header class="w3-container w3-theme w3-padding" id="myHeader">
  <div class="w3-center">
  <h3>SISTEMA AVALIATIVO DE SIMULADOS E VESTIBULARES</h3>
  <h1 class="w3-xxxlarge w3-animate-bottom">SASV</h1>
    <div class="w3-padding-32">
		<div id="icons">
			<a href="https://www.instagram.com/projetosasv/" class="fa fa-instagram" title="Instagram do Projeto"></a>
			<a href="https://www.facebook.com/domwalfridoeeep" class="fa fa-facebook" title="Facebook da Escola"></a>
			<a href="https://www.instagram.com/domwalfridooficial/" class="fa fa-instagram" title="Instagram da Escola"></a>
			<!-- <button class="w3-btn w3-xlarge w3-dark-grey w3-hover-light-grey" onclick="document.getElementById('id01').style.display='block'" style="font-weight:900;">LEARN W3.CSS</button> -->
		</div>
    </div>
  </div>
</header>

<div class="w3-row-padding w3-center w3-margin-top">


<?php
	if(isset($_GET['mess'])){
		if($_GET['mess'] == 'erro'){
			echo '<div id="alerta" class="alerta error"><b>Atenção!</b> Erro de login, confira seu e-mail e senha.</div>';
		}
		if($_GET['mess'] == 'session'){
			echo '<div id="alerta" class="alerta atencao"><b>Atenção!</b> Erro na sessão, tente fazer o Login.</div>';
		}
		if($_GET['mess'] == 'logout'){
			echo '<div id="alerta" class="alerta sucesso"><b>Volte sempre!</b> LogOut realizado com sucesso.</div>';
		}
	}
?>


<div class="w3-third">
  <div class="w3-card w3-container" style="min-height:460px">
  <h1>Aluno(a)</h1><br>
	<a href="#"><img style="width:55%; height:55%;" src="Imagens/estudante2.png"></a> <BR>
	<div class="w3-padding-32">
      <button class="w3-btn w3-xlarge w3-teal w3-hover-light-grey" onclick="document.getElementById('id01').style.display='block'" style="font-weight:900;">Logar</button>
    </div>
	<!-- Modal -->
		<div id="id01" class="w3-modal">
			<div class="w3-modal-content w3-card-4 w3-animate-top">
			  <header class="w3-container w3-theme-l1"> 
				<span onclick="document.getElementById('id01').style.display='none'"
				class="w3-button w3-display-topright">X</span>
				<h4>Login para Alunos!</h4>
				<!-- <h5>Because we can <i class="fa fa-smile-o"></i></h5> -->
			  </header>
			  <div class="w3-padding">
				   <div class="container">
						<form name="form1" id="form1" method="POST" action="php/loginAluno.php">
							<label for="uname"><b>E-Mail ou Matrícula</b></label><br>
							<input type="text" placeholder="Insira seu e-mail ou sua matrícula" name="email" required> <br>
								<br>
							<label for="psw"><b>Senha</b></label><br>
							<input type="password" placeholder="Insira sua senha" name="senha" required> <br>
								<br>
							<button type="submit">Entrar</button> <br>
							<a href="cadastro/aluno.php"><h4>Criar nova conta</h4></a>
						</form>
					  </div>
			  </div>
			  <footer class="w3-container w3-theme-l1">
				<p>SISTEMA AVALIATIVO DE SIMULADOS E VESTIBULARES - SASV</p>
			  </footer>
			</div>
		</div>
  </div>
</div>

<div class="w3-third">
  <div class="w3-card w3-container" style="min-height:460px">
  <h1>Professor(a)</h1><br>
	<a href="#"><img style="width:55%; height:55%;" src="Imagens/professor2.png"></a>
		<div class="w3-padding-32">
			<button class="w3-btn w3-xlarge w3-teal w3-hover-light-grey" onclick="document.getElementById('id02').style.display='block'" style="font-weight:900;">Logar</button>
		</div>
	<!-- Modal -->
		<div id="id02" class="w3-modal">
			<div class="w3-modal-content w3-card-4 w3-animate-top">
			  <header class="w3-container w3-theme-l1"> 
				<span onclick="document.getElementById('id02').style.display='none'"
				class="w3-button w3-display-topright">X</span>
				<h4>Login para Professores!</h4>
				<!-- <h5>Because we can <i class="fa fa-smile-o"></i></h5> -->
			  </header>
			  <div class="w3-padding">
				   <div class="container">
					<form name="form2" id="form2" method="POST" action="php/loginProfessor.php">
						<label for="uname"><b>E-Mail</b></label><br>
						<input type="text" placeholder="Insira seu e-mail" name="email" required> <br>
							<br>
						<label for="psw"><b>Senha</b></label><br>
						<input type="password" placeholder="Insira sua senha" name="senha" required> <br>
							<br>
						<button type="submit">Entrar</button> <br>
						<a href="cadastro/professor.php"><h4>Criar nova conta</h4></a>
					</form>	
					</div>
			  </div>
			  <footer class="w3-container w3-theme-l1">
				<p>SISTEMA AVALIATIVO DE SIMULADOS E VESTIBULARES - SASV</p>
			  </footer>
			</div>
		</div>
  </div>
</div>

<div class="w3-third">
  <div class="w3-card w3-container" style="min-height:460px">
  <h1>Administrativo</h1><br>
  <a href="#"><img style="width:55%; height:55%;" src="Imagens/adm.png"></a>
		<div class="w3-padding-32">
			<button class="w3-btn w3-xlarge w3-teal w3-hover-light-grey" onclick="document.getElementById('id03').style.display='block'" style="font-weight:900;">Logar</button>
		</div>
	<!-- Modal -->
		<div id="id03" class="w3-modal">
			<div class="w3-modal-content w3-card-4 w3-animate-top">
			  <header class="w3-container w3-theme-l1"> 
				<span onclick="document.getElementById('id03').style.display='none'"
				class="w3-button w3-display-topright">X</span>
				<h4>Login para Administradores!</h4>
				<!-- <h5>Because we can <i class="fa fa-smile-o"></i></h5> -->
			  </header>
			  <div class="w3-padding">
				   <div class="container">
				   <form name="form3" id="form3" method="POST" action="php/loginAdm.php">
						<label for="uname"><b>E-Mail</b></label><br>
						<input type="text" placeholder="Insira seu e-mail" name="email" required> <br>
							<br>
						<label for="psw"><b>Senha</b></label><br>
						<input type="password" placeholder="Insira sua senha" name="senha" required> <br>
							<br>
						<button type="submit">Entrar</button> <br>
					</form>
					 </div>
			  </div>
			  <footer class="w3-container w3-theme-l1">
				<p>SISTEMA AVALIATIVO DE SIMULADOS E VESTIBULARES - SASV</p>
			  </footer>
			</div>
		</div>
  </div>
</div>
</div>

<br>

<!-- Footer -->
<footer class="w3-container w3-theme-dark w3-padding-16">
  <h3>SASV</h3>
  <p>Feito por <a href="https://www.instagram.com/turma3info/" target="_blank">3º Informática 2018-2020</a></p>
  <div style="position:relative;bottom:55px;" class="w3-tooltip w3-right">
    <span class="w3-text w3-theme-light w3-padding">Voltar ao início</span>    
    <a class="w3-text-white" href="#myHeader"><span class="w3-xlarge">
    <i class="fa fa-chevron-circle-up"></i></span></a>
  </div>
  <p>Projeto Social de Estágio - 2021</p>
  <p>Instagram do Projeto Social: <a href="https://www.instagram.com/projetosasv/" >@projetosasv</a> </p>
</footer>

<script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function(){ 
            setTimeout(function() {
                $("#alerta").fadeOut().empty();
            }, 4000);
        }, false);
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<!-- Script for Sidebar, Tabs, Accordions, Progress bars and slideshows -->
<script>
// Side navigation
function w3_open() {
  var x = document.getElementById("mySidebar");
  x.style.width = "100%";
  x.style.fontSize = "40px";
  x.style.paddingTop = "10%";
  x.style.display = "block";
}
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}

// Slideshows
var slideIndex = 1;

function plusDivs(n) {
  slideIndex = slideIndex + n;
  showDivs(slideIndex);
}

function showDivs(n) {
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}

showDivs(1);

// Progress Bars
function move() {
  var elem = document.getElementById("myBar");   
  var width = 5;
  var id = setInterval(frame, 10);
  function frame() {
    if (width == 100) {
      clearInterval(id);
    } else {
      width++; 
      elem.style.width = width + '%'; 
      elem.innerHTML = width * 1  + '%';
    }
  }
}

</script>

</body>
</html>
