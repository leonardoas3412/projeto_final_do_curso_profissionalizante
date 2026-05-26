<!DOCTYPE html>
<?php
 include('../php/banco.php');
?>
<html lang="pt-BR">
<title>SASV - Cadastro</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<link rel="stylesheet" type="text/css" href="../icones.css"/> 
<link rel="stylesheet" type="text/css" href="../botao.css"/>
<link rel="stylesheet" type="text/css" href="../alertas.css"/>
<body>

<!-- Header -->
<header class="w3-container w3-theme w3-padding" id="myHeader">
	<a href="../index.php" class="botao">Voltar</a <br>
	<!-- <button class="w3-btn w3-dark-grey" href="#")>Voltar</button> -->
  <!-- <button class="fa fa-angle-left w3-btn w3-xlarge w3-dark-teal w3-hover-teal"></button> -->
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

<br>
<div class="w3-row-padding">

<?php
	if(isset($_GET['mess'])){
		if($_GET['mess']=='erro'){			 
			echo '<div id="alerta" class="alerta error"><center><b>Atenção!</b> Erro ao cadastrar, tente novamente.<center/></div> <br>';
		}
		if($_GET['mess']=='ok'){			 
			echo '<div id="alerta" class="alerta sucesso"><center><b>Tudo certo!</b> cadastro realizado com sucesso!</center></div> <br>';
		}
	}
?>

<div style="display: flex;flex-direction: row;justify-content: center;align-items: center">
<div class="w3-half" >
<form class="w3-container w3-card-4" name="form1" id="form1" method="POST" action="addProf.php">
  <h2>CRIAR NOVA CONTA - Professor(a)</h2>
  <div class="w3-section">
    <label>Nome</label>
    <input class="w3-input" type="text" name="nome" placeholder="Insira seu nome" required>
  </div>
  <div class="w3-section">
    <label>E-mail</label>  
    <input class="w3-input" type="email" name="email" placeholder="Insira seu e-mail" required aria-required="true" required>
  </div>
  <div class="w3-section">
	<label>Escola</label>  <br>
    <!-- <input class="w3-input" type="text" name="escola" placeholder="Insira sua escola" required> -->
		<select class="w3-select" name="escola" id="escola" style="width:99%" >
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
   <div class="w3-section">
    <label>Senha</label>   
    <input class="w3-input" type="password" name="senha" placeholder="Insira sua senha" required>
  </div>
	<button type="submit" class="botao">Cadastrar</button> <br>
	<br>
</form>
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

<script>
    $(document).ready(function() {
        $('#escola').select2();
	});
</script>

<!-- Script for Sidebar, Tabs, Accordions, Progress bars and slideshows -->
<script>
// Side navigation

// Tabs
function openCity(evt, cityName) {
  var i;
  var x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  var activebtn = document.getElementsByClassName("testbtn");
  for (i = 0; i < x.length; i++) {
    activebtn[i].className = activebtn[i].className.replace(" w3-dark-grey", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-dark-grey";
}

var mybtn = document.getElementsByClassName("testbtn")[0];
mybtn.click();

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

</script>

</body>
</html>
