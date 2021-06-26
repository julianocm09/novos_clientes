
<style>
.accordion {
  background-color: #fff;
  color: #007bff;
  cursor: pointer;
  padding: 0px;
  width: 100%;
  display: inline-block;
  text-align: center;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
  border: 1px solid #007bff;
   border-radius: 4px;
   font-weight: 400;
   padding: .375rem .75rem;
}

.active, .accordion:hover {
 border: none; 
 background-color: #007bff7d;
   color: #fff;
}

.panel {
  display: none;
  background-color: white;
  overflow: hidden;
}
</style>

<div class="row ui-sortable" id="draggable_portlets">
              
<?php
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$meu_id_lista=$_SESSION['dados_cliente']['id'];
$sql = "SELECT * FROM profissional_lista_atendimento WHERE id=''";
$sql2 = "SELECT * FROM especialidades";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  
	echo'  <div class="col-md-2 column sortable">
                     
                      <!-- BEGIN Portlet PORTLET-->
                      <div class="card ui-sortable-handle">
                          <div class="card-header bg-primary text-light">' . $row["id"]. '</div>
                          <div class="card-body">
                             <p>' . $row["id"]. '</p>
							 <p>' . $row["id"]. '</p>
                          </div>
                      </div>
                      <!-- END Portlet PORTLET-->
                      
                      </div>';
  }
} else {
	echo'  <div class="col-md-12 column sortable">
                     
                     
                      <!-- BEGIN Portlet PORTLET-->
                      <div class="card ui-sortable-handle">
                          <div class="card-header bg-primary text-light">Cadastrar novo agendamento 
						  <button type="button" class="btn btn-success btn-sm mb-2" data-toggle="tooltip" title="este botao salva seu atendimento" id="cod_data_atm" style="float: right;">Salvar</button>
						  </div>
                          <div class="card-body">';
						
						echo'<button class="accordion" id="principalctn" ybt="selecione um profissional">selecione um profissional</button>
<div class="panel"><div class="task-content"><ul class="task-list">';
$result2 = $conn->query($sql2);
if ($result2->num_rows > 0) {
  // output data of each row
  while($row2 = $result2->fetch_assoc()) {
	 $esp_id= $row2["id"];
	  
	  
$sql3 = "SELECT * FROM profissional_user WHERE idfuncaoprof='$esp_id'";


echo'<button class="accordion">'. $row2["nome"].'</button>
<div class="panel">';
 $result3 = $conn->query($sql3);
if ($result3->num_rows > 0) {
  // output data of each row
  while($row3 = $result3->fetch_assoc()) {

echo' <li>';
echo' <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th></th>
        <th>Nome</th>
        <th>select</th>
      </tr>
    </thead>
    <tbody id="myTable">
      <tr>
        <td>DR</td>
        <td>'. $row3["nome"].'</td>
        <td>
		 <input type="checkbox"  value="'. $row3["id"].'" class="list-child" id="prn'. $row3["id"].'" onchange="chkselectorju(';
echo"'prn". $row3["id"]."','DR:". $row3["nome"]."'";
echo')">';
		echo'</td>
      </tr>
    
    </tbody>
  </table>';
                                      echo'</li>';
 
  }
} else {
  echo "0 results";
}


echo'</ul></div></div>';







  }
} else {
  echo "0 results";
}
						
echo'</div>';						
						






                             echo'<button type="button" class="btn btn-outline-primary mb-2 popovers" style="width: 100%;" data-original-title="Salvar?" data-content="este botão salva seu pedido de atendimento">Primary</button>
                          </div>
                      </div>
                      <!-- END Portlet PORTLET-->
                      
                      </div>'; 
}
$conn->close();
?> 

</div>







<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";

    } else {
      panel.style.display = "block";
    }
  });
}






function chkselectorju(name, valorchev) {
	var chkboks = document.getElementById(name);
	var chkboks2 = chkboks.checked;
	
	if (chkboks2 == true){
		document.getElementById("principalctn").textContent=valorchev;
		var x = document.getElementById(name).value;
		document.getElementById("principalctn").setAttribute("id_profissional", x);
		document.getElementsByClassName("panel").style.display = "none";
   
		
	}else{
		
		document.getElementById("principalctn").textContent=document.getElementById("principalctn").getAttribute("ybt");
		document.getElementById("principalctn").setAttribute("id_profissional", "");
		
	}

}
</script>



<script>

jQuery(document).ready(function(){
  jQuery("#cod_data_atm").click(function(){
	   var prfid= document.getElementById("principalctn").getAttribute("id_profissional");
  var meuid="&meuid=<?php echo $_SESSION['dados_cliente']['id'];?>";
    jQuery.get("sys/teste.php", function(data, status){
      alert("Data: " + data + "\nStatus: " + status);
    });
  });
});
</script>