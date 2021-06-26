  <?php
  session_start();
  date_default_timezone_set("America/Sao_Paulo");
  require_once("api/config.php");

require_once("sys/fns.php"); 
echo server_imfos();
?>
<!DOCTYPE html>
<html lang="en">
  

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Clinica de psicologia">
    <meta name="author" content="juliano Cristiano Mangold">
    <meta name="keyword" content="Iliminamente xxx">
    <link rel="shortcut icon" href="img/favicon.html">

    <title><?php echo $_SESSION['systema_info']['nome_sys']; ?></title>

   <link href="assets/all_css.css" rel="stylesheet">
 
	    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/respond.min.js" ></script>
	  <script src="js/simpleUpload.min.js"></script>
	    <script src="assets/toastr-master/toastr.js"></script>
  <script type="text/javascript" src="assets/fuelux/js/spinner.min.js"></script>
  <script type="text/javascript" src="assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
  <script type="text/javascript" src="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
  <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="assets/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="assets/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="assets/colorpicker/js/bootstrap-colorpicker.min.js"></script>
  <script type="text/javascript" src="assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script type="text/javascript" src="assets/jquery-multi-select/js/jquery.multi-select.js"></script>
  <script type="text/javascript" src="assets/jquery-multi-select/js/jquery.quicksearch.js"></script>
  <script type="text/javascript" src="assets/select2/js/select2.min.js"></script>
  <script type="text/javascript"  src="assets/summernote/summernote-bs4.min.js"></script>
  <script type="text/javascript" src="js/slidebars.min.js"></script>


  <script type="text/javascript" src="js/advanced-form-components.js"></script>
  <link href='assets/fullcalendar-5.7.2/main.css' rel='stylesheet' />
<script src='assets/fullcalendar-5.7.2/main.js'></script>


  <script type="text/javascript" src="js/common-scripts.js"></script>	 

  </head>

  <body class="light-sidebar-nav">
 <?php

if(!isset($_SESSION['dados_cliente'])){
	
	
	
	
	if(!isset($_GET['p'])){
	include("pages/login.php");
	
	}else{
			if ($_GET['p'] == "regiter"){
        if (file_exists("pages/regiter.php"))
        {
                include ("pages/regiter.php"); 
        }
        else
        {
          
				echo'<script>window.location.replace("error.php");</script>';
				
        }
} else if ($_GET['p'] == "pol"){
        if (file_exists("pages/pol.php"))
        {
                include ("pages/pol.php"); 
        }
        else
        {
          
				echo'<script>window.location.replace("error.php");</script>';
				
        }
} else {
    include("pages/login.php");
}
		// - - - - - - - - 
	
    

		// - - - - - - - - 
		
	}
	
	





	}else{
		include("pages/main.php");
		}
?>

<script>
  

 $("#pre_up").click(function(){
 $("#per_foto_imp").click();
}); 
	$( "#per_foto_imp" ).change(function() {
		
	

    $(this).simpleUpload("ajaxfile.php", {

	start: function(file){
		//upload started
		console.log(file);
	},
	progress: function(progress){
		//received progress
		//console.log(progress);
	},
	success: function(data){
		//upload successful
		console.log(data);
		$("#foto_cliente").attr("src",data);
	},
	error: function(error){
		//upload failed
		//console.log(error);
	}

});
	
	
	
	});;

</script>              <!-- page end-->
          

<script>
 $(document).ready(function(){
  $(".stat_urg_atend").click(function(){
	  if($(".botao_urgencia_atendimentos").hasClass("switch-off")){
		  $(".botao_urgencia_atendimentos").removeClass("switch-off");
		  $(".botao_urgencia_atendimentos").addClass("switch-on");
		  $( "botao_urgencia_atendimentos_check" ).attr( "checked", true );
		  document.getElementById("botao_urgencia_atendimentos_check").checked = true;
		  }else{
			 $(".botao_urgencia_atendimentos").removeClass("switch-on");
		  $(".botao_urgencia_atendimentos").addClass("switch-off");
		  $( "botao_urgencia_atendimentos_check" ).attr( "checked", false );		  
		  document.getElementById("botao_urgencia_atendimentos_check").checked = false;
			  }
   
  });
});
</script>

	 
  </body>
</html>
