<?php 
	session_start();
	if(isset($_SESSION['usuario'])){
		
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Rentas</title>
	<style>
footer {
position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  text-align: center;
  padding: 3px;
  background-color: DarkSalmon;
  color: white;
}
</style>
	<?php require_once "menu.php"; ?>
</head>
<body>

	<div class="container">
		<center>
		 <h1>Renta de Equipos de Oficina</h1>
		 <hr>
		 <div class="row">
		 	<div class="col-sm-12">
		 		<span class="btn btn-default" id="ventaProductosBtn">Renta</span>
		 		<span class="btn btn-default" id="ventasHechasBtn">Rentas Realizadas</span>
		 	</div>
		 </div>
		 <div class="row">
		 	<div class="col-sm-12">
		 		<div id="ventaProductos"></div>
		 		<div id="ventasHechas"></div>
		 	</div>
		 </div>
		 </center>
	</div>

	<footer>
  <table width="90%" border="0">
 
 
  
  <tr> 
    <td colspan="7" bgcolor="#FFCC00">&nbsp;</td>
  </tr>
  <tr> 
    <td height="17" colspan="7"> <div align="center"><strong><font size="1" face="VERDANA">OFFICEEXPRESS 
         &reg;</font></strong></div></td>
	
  </tr>
  <tr> 
		<td height="17" colspan="7"> <div align="center"><strong><font size="1" face="VERDANA"> Calle Principal San Marcos Km 4 1/2, Col. El Milagro No. 272 
        San Marcos, El Salvador. Central Am&eacute;rica</font></strong></div></td>
  </tr>
  <tr> 
    <td colspan="7"><div align="center"><strong><font color="#0033FF" size="5" face="VERDANA">PBX:</font><font color="#FF0000" size="5" face="VERDANA"> 
        <font color="#000000">(503)2250-5099</font> -<font color="#0033FF"> 
        Email:</font></font><font size="5" face="VERDANA"><font color="#000000"> 
        info@officeexpress.com.sv</font></font></strong></div></td>
  </tr>
</table>
</footer>

</body>
</html>

<?php 
	}else{
		header("location:../index.php");
	}
 ?>