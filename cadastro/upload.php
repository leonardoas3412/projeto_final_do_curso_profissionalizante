<?php

  $filename = $_POST['filename'];

  $target_directory = "img_upload/";
  $target_file = $target_directory.basename($_FILES["file"]["name"]);   //name é para pegar o nome do arquivo que foi recebido no servidor
  $filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));  //idendificando o tipo de arquivo  
  $newfilename = $target_directory.$filename.".".$filetype;  //montando o nome do arquivo com a extensão

  if(move_uploaded_file($_FILES["file"]["tmp_name"],$newfilename)) { //verificando se o arquivo foi enviado	 
	 echo 1;
  }else{ 
     echo 0;
  }


 ?>