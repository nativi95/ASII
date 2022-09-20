<?php 
session_start();
if(isset($_SESSION['usuario'])){

	?>


	<!DOCTYPE html>
	<html>
	<head>
		<title>clientes</title>
		<?php require_once "menu.php"; ?>
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
	</head>
	<body>
		<div class="container">
			<h1>Clientes</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmClientes">
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombre" name="nombre">
						<label>Apellido</label>
						<input type="text" class="form-control input-sm" id="apellidos" name="apellidos">
						<label>Direccion</label>
						<input type="text" class="form-control input-sm" id="direccion" name="direccion">
						<label>Email</label>
						<input type="text" class="form-control input-sm" id="email" name="email">
						<label>Telefono</label>
						<input type="text" class="form-control input-sm" id="telefono" name="telefono">
						<label>DUI</label>
						<input type="text" class="form-control input-sm" id="dui" name="dui">
						<p></p>
						<span class="btn btn-primary" id="btnAgregarCliente">Agregar</span>
					</form>
				</div>
				<div class="col-sm-8">
					<div id="tablaClientesLoad"></div>
				</div>
			</div>
		</div>

		<!-- Button trigger modal -->


		<!-- Modal -->
		<div class="modal fade" id="abremodalClientesUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualizar cliente</h4>
					</div>
					<div class="modal-body">
						<form id="frmClientesU">
							<input type="text" hidden="" id="idclienteU" name="idclienteU">
							<label>Nombre</label>
							<input type="text" class="form-control input-sm" id="nombreU" name="nombreU">
							<label>Apellido</label>
							<input type="text" class="form-control input-sm" id="apellidosU" name="apellidosU">
							<label>Direccion</label>
							<input type="text" class="form-control input-sm" id="direccionU" name="direccionU">
							<label>Email</label>
							<input type="text" class="form-control input-sm" id="emailU" name="emailU">
							<label>Telefono</label>
							<input type="text" class="form-control input-sm" id="telefonoU" name="telefonoU">
							<label>DUI</label>
							<input type="text" class="form-control input-sm" id="duiU" name="duiU">
						</form>
					</div>
					<div class="modal-footer">
						<button id="btnAgregarClienteU" type="button" class="btn btn-primary" data-dismiss="modal">Actualizar</button>

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

	<script type="text/javascript">
		function agregaDatosCliente(idcliente){

			$.ajax({
				type:"POST",
				data:"idcliente=" + idcliente,
				url:"../procesos/clientes/obtenDatosCliente.php",
				success:function(r){
					dato=jQuery.parseJSON(r);
					$('#idclienteU').val(dato['id_cliente']);
					$('#nombreU').val(dato['nombre']);
					$('#apellidosU').val(dato['apellido']);
					$('#direccionU').val(dato['direccion']);
					$('#emailU').val(dato['email']);
					$('#telefonoU').val(dato['telefono']);
					$('#rfcU').val(dato['rfc']);

				}
			});
		}

		function eliminarCliente(idcliente){
			alertify.confirm('¿Desea eliminar este cliente?', function(){ 
				$.ajax({
					type:"POST",
					data:"idcliente=" + idcliente,
					url:"../procesos/clientes/eliminarCliente.php",
					success:function(r){
						if(r==1){
							$('#tablaClientesLoad').load("clientes/tablaClientes.php");
							alertify.success("Eliminado con exito!!");
						}else{
							alertify.error("No se pudo eliminar :(");
						}
					}
				});
			}, function(){ 
				alertify.error('Cancelo !')
			});
		}
	</script>

	<script type="text/javascript">
		$(document).ready(function(){

			$('#tablaClientesLoad').load("clientes/tablaClientes.php");

			$('#btnAgregarCliente').click(function(){

				vacios=validarFormVacio('frmClientes');

				if(vacios > 0){
					alertify.alert("Debes llenar todos los campos!!");
					return false;
				}

				datos=$('#frmClientes').serialize();

				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/clientes/agregaCliente.php",
					success:function(r){

						if(r==1){
							$('#frmClientes')[0].reset();
							$('#tablaClientesLoad').load("clientes/tablaClientes.php");
							alertify.success("Cliente agregado con exito :D");
						}else{
							alertify.error("No se pudo agregar cliente");
						}
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnAgregarClienteU').click(function(){
				datos=$('#frmClientesU').serialize();

				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/clientes/actualizaCliente.php",
					success:function(r){

						if(r==1){
							$('#frmClientes')[0].reset();
							$('#tablaClientesLoad').load("clientes/tablaClientes.php");
							alertify.success("Cliente actualizado con exito :D");
						}else{
							alertify.error("No se pudo actualizar cliente");
						}
					}
				});
			})
		})
	</script>


	<?php 
}else{
	header("location:../index.php");
}
?>