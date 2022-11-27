<?php 
session_start();
if(isset($_SESSION['usuario'])){

	?>


	<!DOCTYPE html>
	<html>
	<head>
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
		<title>categorias</title>
		<?php require_once "menu.php"; ?>
	</head>
	<body>

		<div class="container">
			<h1>Categorias</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmCategorias">
						<label>Categoria</label>
						<input type="text" class="form-control input-sm" name="categoria" id="categoria">
						<p></p>
						<span class="btn btn-primary" id="btnAgregaCategoria">Agregar</span>
					</form>
				</div>
				<div class="col-sm-6">
					<div id="tablaCategoriaLoad"></div>
				</div>
			</div>
		</div>

		<!-- Button trigger modal -->

		<!-- Modal -->
		<div class="modal fade" id="actualizaCategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualiza categorias</h4>
					</div>
					<div class="modal-body">
						<form id="frmCategoriaU">
							<input type="text" hidden="" id="idcategoria" name="idcategoria">
							<label>Categoria</label>
							<input type="text" id="categoriaU" name="categoriaU" class="form-control input-sm">
						</form>


					</div>
					<div class="modal-footer">
						<button type="button" id="btnActualizaCategoria" class="btn btn-warning" data-dismiss="modal">Guardar</button>

					</div>
				</div>
			</div>
		</div>
		<footer>
  <table width="90%" border="0">
 
 
  
  <tr> 
    <td colspan="7" bgcolor="#FFCC00">&nbsp;</td>
  </tr>
  <tr> 
    <td height="17" colspan="7"> <div align="center"><strong><font size="1" face="VERDANA"> OFFICEEXPRESS
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