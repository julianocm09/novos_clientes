

<?php
$files_arr = array();
   if(isset($_FILES['file']))
   {
      date_default_timezone_set("Brazil/East"); //Definindo timezone padrão

      $ext = strtolower(substr($_FILES['file']['name'],-4)); //Pegando extensão do arquivo
      $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
      $dir = 'uploads/'; //Diretório para uploads

      move_uploaded_file($_FILES['file']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
	  //echo $dir.$new_name;
	  $type = pathinfo($dir.$new_name, PATHINFO_EXTENSION);
$data = file_get_contents($dir.$new_name);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
echo update_foto_db($base64,$dir.$new_name);

   }
   
   
   
   function update_foto_db($foto,$sir){
	   
include"api/config.php";
session_start();
$mid=$_SESSION["dados_cliente"]['id'];
$sql = "UPDATE client_user SET foto='$foto' WHERE id='$mid'";

if ($conn->query($sql) === TRUE) {
 echo $foto;
 usleep(3000000);
unlink($sir);
} else {
  echo "erro";
}

$conn->close();
   }
?>