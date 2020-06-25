
<div id="contenidocambiante" data-id="0"> 
	<!-- <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.2.1/mapbox-gl.js'></script>
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.2.1/mapbox-gl.css' rel='stylesheet' />
	<style type="text/css">
		.marker {
			background-image: url('<?=assetmiperfil()?>/img/ICONOS/SVG/UBICACION.svg');
			background-size: cover;
			width: 50px;
			height: 50px;
			border-radius: 50%;
			cursor: pointer;
		} 
		#map {   width:100%; 
			height: 300px;}
	</style> -->
	<!-- Este es el script que hace toda la funcionalidad-->
 <script type="text/javascript">
 	 $(document).ready(function(){
 $('.codepost').mask('00000');  
});



 </script>

<div class="editarflotante"> 
		<button type="button" class="botoneditaredicion" onclick="recargarpagina()">
			<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/RESTAURAR.svg"> 
	</button> 

	<button type="button" class="botoneditaredicion" onclick="editar()">
		<div id="spiner" style="display: none;">
			<div class="spinner-border text-light"  role="status" >
  <span class="sr-only">Loading...</span>
</div>
		</div>
		<img id="imagenguardar" src="<?=assetmiperfil()?>/img/ICONOS/SVG/GUARDAR.svg" >
</button>  
</div>
<form id="formeditarinfo" action="<?=base_url('configuracion/informacionpersonal/edicion')?>">
	<div class="row ">
		<div class="col">
			<div class="box ">
				<div class="box-header ">
					<!-- tools box -->
					<div class="row">
						<div class="col-sm-4 col-xl-2 letratituloedicion">
							<span>Datos Generales</span>
						</div>
						<div class="col-sm-8 col-xl-10 lineainferiorosita">

						</div>
					</div> 

					<!-- /. tools -->
				</div>
				<div class="box-body">
					<!--row1-->
					<div class="row">
						<div class="col-4">
							<div class="form-group">
								<label class="labelsform" for="nombre">Nombre(s)</label>
								<input type="text" class="form-control estiloinput form-control-sm  clascheckcambio " onkeyup="" name="nombre" id="nombre" value="<?=$datos['datosinformacion'][0]["NOMBRE"]?>" maxlength="30">
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label class="labelsform" for="apellidopaterno">Apellido Paterno</label>
								<input type="text" class="form-control estiloinput  form-control-sm clascheckcambio " onkeyup="" name="apellidopaterno" id="apellidopaterno" value="<?=$datos['datosinformacion'][0]["AP_PATERNO"]?>" maxlength="30">
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label class="labelsform" for="apellidomaterno">Apellido Materno</label>
								<input type="text" class="form-control estiloinput  form-control-sm clascheckcambio " onkeyup="" name="apellidomaterno" id="apellidomaterno" value="<?=$datos['datosinformacion'][0]["AP_MATERNO"]?>" maxlength="30">
							</div> 
						</div>
						
					</div>
					<!--row1-->
					<!--row2-->
					<div class="row">
						<div class="col-sm-4 col-xl-3">
							<div class="form-group">
								<label class="labelsform" for="sexo">Sexo</label>
								<select class="form-control estiloinput  form-control-sm clascheckcambio " onchange="" name="sexo" id="sexo"  >
									<option value="2" <?php if ($datos['datosinformacion'][0]["SEXO"] == 2) {echo "selected"; } ?>>Hombre</option>
									<option value="1"<?php if ($datos['datosinformacion'][0]["SEXO"] == 1) {echo "selected"; } ?>>Mujer</option> 
								</select>
							</div>
						</div>
						<div class="col-sm-4 col-xl-2">
							<div class="form-group">
								<label  class="labelsform" for="fechanacimiento" >Fecha Nacimiento</label>
								<input type="text" class="form-control estiloinput  form-control-sm clascheckcambio datetimepicker" onchange="" name="fechanacimiento" id="fechanacimiento" value="<?=datesqltodate($datos['datosinformacion'][0]["FECHA_NACIMIENTO"])?>"  >
							</div>
						</div>
						<div class="col-sm-4 col-xl-1">
							<div class="form-group">
								<label class="labelsform" for="edad">Edad</label>
								<input type="number" class="form-control estiloinput  form-control-sm clascheckcambio " name="edad" id="edad" readonly="">
							</div>
						</div>
						
						<div class="col-sm-4 col-xl-2">
							<div class="form-group">
								<label class="labelsform" for="estadocivil">Estado Civil</label>
								<select class="form-control estiloinput  form-control-sm clascheckcambio" name="estadocivil" id="estadocivil" >
									 <?php $letra = "o"; if ($datos['datosinformacion'][0]["SEXO"] == 1){ $letra = "a";  } ?>
									<option value="1"<?php if ($datos['datosinformacion'][0]["ESTADO_CIVIL"] == 1) {
										echo "selected";
									}?>>Solter<?=$letra?></option> 
									<option value="2"<?php if ($datos['datosinformacion'][0]["ESTADO_CIVIL"] == 2) {
										echo "selected";
									}?>>Noviazgo</option>
									<option value="3"<?php if ($datos['datosinformacion'][0]["ESTADO_CIVIL"] == 3) {
										echo "selected";
									}?>>Casad<?=$letra?></option>
									<option value="4"<?php if ($datos['datosinformacion'][0]["ESTADO_CIVIL"] == 4) {
										echo "selected";
									}?>>Unión libre</option> 
								</select>
							</div>
						</div>
						<div class="col-sm-4 col-xl-1">
							<div class="form-group">
								<label class="labelsform" for="hijos">Hijos</label>
								<input type="number" class="form-control estiloinput  form-control-sm clascheckcambio" name="hijos" id="hijos"min="0" max="20" value="<?=$datos['datosinformacion'][0]["HIJOS"]?>"> 
							</div>
						</div> 
						<div class="col-sm-4 col-xl-3"><label class="labelsform" for="vivecon">Vive con</label>
							<div class="form-group"  id="viveotro" >
								
								<select class="form-control estiloinput  form-control-sm clascheckcambio" name="vivecon" id="vivecon" onchange="otro($(this).val())" >
									<option value="1"<?php if ($datos['datosinformacion'][0]["VIVE_CON"] == 1) {
										echo "selected";
									}?>>Padres</option>
									<option value="2"<?php if ($datos['datosinformacion'][0]["VIVE_CON"] == 2) {
										echo "selected";
									}?>>Solo</option>
									<option value="3"<?php if ($datos['datosinformacion'][0]["VIVE_CON"] == 3) {
										echo "selected";
									}?>>Parientes</option>
									<option value="4"<?php if ($datos['datosinformacion'][0]["VIVE_CON"] == 4) {
										echo "selected";
									}?>>Familia propia</option>
									<option value="5" <?php if ($datos['datosinformacion'][0]["VIVE_CON"] == 5) {
										echo "selected";
									}?> >Otro</option>
								</select>
								<input type="text" class="form-control estiloinput  form-control-sm" name="viveconotro" id="viveconotro" value="<?=$datos['datosinformacion'][0]["OTRO_VIVE_CON"]?>" style="display: none">
							</div>
						</div> 
					</div>
					<!--row2-->
					<input type="text" id="long" name="long" value=""  hidden=""> <input type="text" id="lat" name="lat"value=""  hidden="">
					<!--row3-->
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label class="labelsform" for="nacionalidad">Nacionalidad</label>
								<input type="text" class="form-control estiloinput  form-control-sm clascheckcambio" name="nacionalidad" id="nacionalidad" value="<?=$datos['datosinformacion'][0]["NACIONALIDAD"]?>" maxlength="20">
							</div>
						</div>
						<div class="col-3">
							<div class="form-group">
								<label class="labelsform" for="lugarnacimientopais">País</label>
								<input type="text" class="form-control estiloinput  form-control-sm clascheckcambio" name="lugarnacimientopais" id="lugarnacimientopais" value="<?=$datos['datosinformacion'][0]["PAIS_NACIMIENTO"]?>" maxlength="30">
							</div>
						</div>
						<div class="col-3">
							<div class="form-group"><label class="labelsform" for="lugarnacimientoestado">Estado</label> 
								<input type="text" class="form-control estiloinput  form-control-sm clascheckcambio" onchange="" name="lugarnacimientoestado" id="lugarnacimientoestado" value="<?=$datos['datosinformacion'][0]["ESTADO_NACIMIENTO"]?>" maxlength="30">
							</div>
						</div>
						<div class="col-3">
							<div class="form-group"> <label class="labelsform" for="lugarnacimientociudad">Ciudad</label>
								<input type="text" class="form-control estiloinput  form-control-sm clascheckcambio" name="lugarnacimientociudad" id="lugarnacimientociudad" value="<?=$datos['datosinformacion'][0]["CIUDAD_NACIMIENTO"]?>" maxlength="30">
							</div>
						</div>
						
						
					</div>
					<!--row3-->
					<!--row4-->
					<div class="row">
						<div class="col-3">
							<div class="form-group">
								<label class="labelsform" for="clavelector">Clave de Elector</label>
								<input type="text" class="form-control estiloinput  form-control-sm clascheckcambio" name="clavelector" id="clavelector" value="<?=$datos['datosinformacion'][0]["CLAVE_ELECTOR"]?>" maxlength="18">
							</div>
						</div>
						<div class="col-3">
							<div class="form-group">
								<label class="labelsform" for="rfc">R.F.C</label>
								<input type="text" class="form-control estiloinput  form-control-sm clascheckcambio" name="rfc" id="rfc" value="<?=$datos['datosinformacion'][0]["RFC"]?>" maxlength="20" >
							</div>
						</div> 
						<div class="col-3">
							<div class="form-group">
								<label class="labelsform" for="curp">C.U.R.P</label>
								<input type="text" class="form-control estiloinput  form-control-sm clascheckcambio" name="curp" id="curp" value="<?=$datos['datosinformacion'][0]["CURP"]?>" maxlength="18">
							</div>
						</div> 
						<div class="col-3">
							<div class="form-group">
								<label class="labelsform" for="nss">N.S.S</label>
								<input type="text" class="form-control estiloinput  form-control-sm clascheckcambio" readonly="" placeholder="Llenar en ficha médica"  id="nss" value="<?=$datos["numseguro"]?>">
							</div>
						</div>
					</div>
					<!--row4--> 
				</div>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col">
			<div class="box ">
				<div class="box-header  ">
					<!-- tools box -->
					<div class="row">
						<div class="col-sm-4 col-xl-3 letratituloedicion">
							<span>Datos de Contacto</span>
						</div> 
						<div class="col-sm-8 col-xl-9 lineainferiorosita">

						</div> 

					</div>
					<!-- /. tools -->
				</div>
				<div class="box-body">

					<div class="row">

						<div class="col">
							<div class="form-group">
								<label  class="labelsform" for="telefonocasa">Teléfono Casa</label>
								<input type="text" class="form-control estiloinput  form-control-sm phone_with_ddd clascheckcambio" name="telefonocasa" id="telefonocasa" value="<?=$datos['datosinformacion'][0]["TELEFONO_CASA"]?>">
							</div>
						</div>  



						<div class="col">
							<div class="form-group">
								<label class="labelsform" for="telefonocelular">Teléfono Celular</label>
								<input type="text" class="form-control estiloinput  form-control-sm phone_with_ddd clascheckcambio" name="telefonocelular" id="telefonocelular" value="<?=$datos['datosinformacion'][0]["TELEFONO_CELULAR"]?>" >
							</div>
						</div>  



						<div class="col">
							<div class="form-group">
								<label class="labelsform" for="correo">Correo Electrónico</label>
								<input type="text" class="form-control estiloinput  form-control-sm clascheckcambio" name="correo" id="correo" value="<?=$datos['datosinformacion'][0]["CORREO"]?>" readonly="">
							</div>
						</div>  

					</div>

					<div class="row">

						<div class="col">
							<div class="form-group">
								<label class="labelsform" for="facebook">Facebook</label>
								<input type="text" class="form-control estiloinput  form-control-sm clascheckcambio" name="facebook" id="facebook" value="<?=$datos['datosinformacion'][0]["FCEBOOK"]?>" maxlength="50">
							</div>
						</div>  


						<div class="col">
							<div class="form-group">
								<label class="labelsform" for="twitter">Twitter</label>
								<input type="text" class="form-control estiloinput  form-control-sm clascheckcambio" name="twitter" id="twitter" value="<?=$datos['datosinformacion'][0]["TWITTER"]?>" maxlength="50">
							</div>
						</div>  


						<div class="col">
							<div class="form-group">
								<label class="labelsform" for="linkedid">Linked In</label>
								<input type="text" class="form-control estiloinput  form-control-sm clascheckcambio" name="linkedid" id="linkedid" value="<?=$datos['datosinformacion'][0]["LINKEDIN"]?>" maxlength="50">
							</div>
						</div>  

					</div>
				</div>
			</div>
		</div>

	</div>

	<div class="row ">
		<div class="col">
			<div class="box ">
				<div class="box-header boxheaderctpnl">
					<!-- tools box -->
					<div class="row">
						<div class="col-2 letratituloedicion">
							<span>Domicilio</span>
						</div>
						<div class="col-10 lineainferiorosita">
						</div>
					</div>
					<!-- /. tools -->
				</div>
				<div class="box-body">
					<!--row1-->
					<div class="row">
						<div class="col-sm-2">
							<div class="form-group">
								<label class="labelsform"  for="residenciapais">País</label>
								<input type="text" class="form-control estiloinput  form-control-sm clascheckcambio" name="residenciapais" id="residenciapais"  value="<?=$datos['datosinformacion'][0]["PAIS"]?>">
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<label class="labelsform" for="residenciaestado"  >Estado</label>
								<input type="text" class="form-control estiloinput  form-control-sm clascheckcambio" name="residenciaestado" id="residenciaestado" value="<?=$datos['datosinformacion'][0]["ESTADO"]?>" >
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label class="labelsform" for="residenciaciudad">Ciudad</label>
								<input type="text" class="form-control estiloinput  form-control-sm clascheckcambio" name="residenciaciudad" id="residenciaciudad" value="<?=$datos['datosinformacion'][0]["DELEGACION"]?>" >
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label class="labelsform" for="municipio">Municipio</label>
								<input type="text" class="form-control estiloinput  form-control-sm clascheckcambio" name="municipio" id="municipio" value="<?=$datos['datosinformacion'][0]["MUNICIPIO"]?>" >
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<label class="labelsform" for="codpostal">Código Postal</label>
								<input type="text" class="form-control estiloinput  form-control-sm clascheckcambio codepost"   name="codpostal" id="codpostal"  value="<?=$datos['datosinformacion'][0]["COD_POSTAL"]?>" >
							</div>
						</div> 
						<div class="col-sm-4">
							<div class="form-group">
								<label class="labelsform" for="coloniaactual">Colonia</label>
								<input type="text" class="form-control estiloinput  form-control-sm clascheckcambio" name="coloniaactual" id="coloniaactual"  value="<?=$datos['datosinformacion'][0]["COLONIA"]?>">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="labelsform" for="calleactual">Calle</label>
								<input type="text" class="form-control estiloinput  form-control-sm clascheckcambio" name="calleactual" id="calleactual" value="<?=$datos['datosinformacion'][0]["CALLE"]?>" >
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<label class="labelsform" for="noexterior">No. Exterior</label>
								<input type="text" class="form-control estiloinput  form-control-sm clascheckcambio" name="noexterior" id="noexterior" maxlength="10" value="<?=$datos['datosinformacion'][0]["NO_EXTERIOR"]?>" >
							</div>
						</div> 
						<div class="col-sm-2">
							<div class="form-group">
								<label class="labelsform" for="nointerior">No. Interior</label>
								<input type="text" class="form-control estiloinput  form-control-sm clascheckcambio" name="nointerior" id="nointerior" maxlength="10" value="<?=$datos['datosinformacion'][0]["NO_INTERIOR"]?>" >
							</div>
						</div>
					</div>
					<!--row2-->

					<!--row3-->
					<div class="row justify-content-between">
						<div class="col-8">
							<div class="form-group">
								<label class="labelsform" for="entrecalles">Entre Calles</label>
								<input type="text" class="form-control estiloinput  form-control-sm clascheckcambio" name="entrecalles" id="entrecalles" value="<?=$datos['datosinformacion'][0]["REFERENCIA"]?>" >
							</div>
						</div> 
						<div class="col-2 " >
							<div class="form-group">
								<div class="centrarlementosDIV" id="togle" style="display: grid;
    justify-content: left;
    justify-items: flex-start;">
									<img src="https://image.flaticon.com/icons/svg/854/854878.svg" style="width: 50px;">
									<label class="subtitulo"  for="googlemaps" style="    color: blue;">Ubicar Google Maps</label>
								</div>
							</div>
						</div>
						<div class="col-2  " >
							<div class="form-group"> <label for="upload_file" >
								<div class="centrarlementosDIV">

 
									<img src="https://image.flaticon.com/icons/svg/149/149061.svg" style="width: 50px;">
									
 
 
									<label class="  subtitulo" for="upload_file" style="    color: blue;">Croquis hecho a mano</label>
									<?php  if (!empty(str_replace("DocumentosYesChef/Portafolio/Vivienda/CroquisCasa/", "", $datos['datosinformacion'][0]["CROQUIS_URL"]))) { ?>

									 <label class="  subtitulo" id="nombreimagen" style="color: #000000"></label>
									 <img id="imagendiplomado1" hidden="" src=".<?php echo $datos['datosinformacion'][0]["CROQUIS_URL"]; ?>" style="width: 100%;">
									 <label class="  subtitulo" id="abririmagen" onclick='mostrarImagen(".<?php echo $datos['datosinformacion'][0]["CROQUIS_URL"]; ?>","imagendiplomado1","upload_file","nombreimagen")' >Ver imagen</label>

								<?php 	} else{ ?>
									<img id="imagendiplomado1" hidden="" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;">
 									<label class="  subtitulo" id="nombreimagen" style="color: #000000"></label>
 									<label class="  subtitulo" id="abririmagen" onclick='mostrarImagen("","imagendiplomado1","upload_file","nombreimagen")' style="display: none; ">Ver nuevo archivo</label>

 								<?php } ?>
									 <input type="file" id="upload_file" hidden="" class="clascheckcambio"   name="archivo" onchange="preview_image()" accept=".jpeg,.jpeg,.pdf,.png" />
									   <input type="text" name='imagen' class="clascheckcambio"  hidden="" id="img" value=""/>
									   <input type="text" name='extension' class="clascheckcambio"  hidden="" id="imgextension" value="0"/>
									    
 <script type="text/javascript">

 	$( document ).ready(function() {

	var div = $('img[id^="imagendiplomado1"]');


    		var nombre = $("#imagendiplomado1").attr("src");
		      //alert(nombre);
		      var name = nombre.split('.').pop();
		      //alert(name);
		      if(name == "pdf" || name == "PDF") {
		         $("#imagendiplomado1").attr("src","<?=assetgeneral()?>/img/pdf.png");
		      }
		
    
});
  
var fileInput = document.getElementById('upload_file');  

fileInput.onchange = function () {

var fileInput = document.getElementById('upload_file');  
		var files = Array.from(fileInput.files);
		files = files.map(file => file.name);
		console.log(files);
		$("#nombreimagen").html(files);

		nombre = $("#nombreimagen").html().split('.').pop(); 
		$("#imgextension").val(nombre); 

		var reader = new FileReader();
		reader.onload = function()
		{
			
			if(nombre == "pdf" || nombre == "pdf ") {
				var output = document.getElementById('imagendiplomado1');
				output.src = "<?=assetgeneral()?>/img/pdf.png";
				$("#img").val(reader.result);
			}else {
				var output = document.getElementById('imagendiplomado1');
				output.src = reader.result;
				$("#img").val(reader.result);
			}
			


		}
		reader.readAsDataURL(event.target.files[0]);
$("#abririmagen").css("display","block")

}


 </script>
								</div>
								 </label>
								 									 

							</div>
<input type="number" id="primeracarga" value="0"  hidden="">
						</div>
				<script type="text/javascript">
					 $(window).on("load", function(){
					 	  if ($("#primeracarga").val() == 0) {
setTimeout(function(){
					   $( "#contenedormapa" ).toggle();
					   	$("#primeracarga").val(1);},500)
					}
					});
					function togglecorreo(este,cuando){

   $( "#contenedormapa" ).toggle( "slow" );
}
				</script>	 
						

						<!-- Modal -->
						
					</div>
					<div class="row" >
						<div class="col" id="contenedormapa" >
							
						<div id="map"   >

										</div>
										 
						</div>
					</div>
					<!--row3--> 
				</div>
			</div>
		</div>
	</div>
</form>
<div class="row ">
	<div class="col">
		<div class="box ">
			<input type="text" id="checkcambios" value="1" hidden="">
			<div class="box-header boxheaderctpnl">
				<!-- tools box -->
				<div class="row">
					<div class="col-sm-4 col-xl-2 letratituloedicion">
						<span>Datos familiares</span>
					</div>
					<div class="col-sm-8 col-xl-10 lineainferiorosita">

					</div>
				</div>
				<!-- /. tools -->
			</div>
			<form id="formeditarfmailiares" action="<?=base_url('configuracion/informacionpersonal/agregarfamiliar')?>">
				<div class="box-body" >
					<!-- row1 -->

					<div class="row text-right"> 
						<div class="col-12 " >
							<span class="linkAccion" onclick="agregarfamiliar()">AGREGAR FAMILIAR</span>
						</div> 
					</div>

					<div class="row">
						<div class="col" id="divcontenedor">
							<?php
							if (!empty($datos['datosfam'])) {
							$cont = 0;
							foreach ($datos['datosfam'] as $key ) {
								$cont++;
								?>
								<div id="divaclonar<?=$cont?>">
									<input type="number" name="id<?=$cont?>" value="<?=$key["ID"]?>" hidden >
									<div class="row" id="rowarriba<?=$cont?>">
										<div class="col-4" id="colparentesco<?=$cont?>"> 
											<label class="labelsform" for="parentesco" id="labelparentesco<?=$cont?>" >Parentesco</label>
											<select class="form-control estiloinput form-control-sm clascheckcambiofam" name="parentesco<?=$cont?>" id="parentesco1">
												<option value="1" <?php if ($key["PARENTESCO"] === "MADRE") { echo "selected";} ?> >Madre</option>
												<option value="2" <?php if ($key["PARENTESCO"] === "PADRE") { echo "selected";} ?> >Padre</option>
												<option value="3" <?php if ($key["PARENTESCO"] === "HERMANA") { echo "selected";} ?> >Hermana</option>
												<option value="4" <?php if ($key["PARENTESCO"] === "HERMANO") { echo "selected";} ?> >Hermano</option>
												<option value="5" <?php if ($key["PARENTESCO"] === "TIA") { echo "selected";} ?> >Tía</option>
												<option value="6" <?php if ($key["PARENTESCO"] === "TIO") { echo "selected";} ?> >Tío</option>
												<option value="7" <?php if ($key["PARENTESCO"] === "ABUELA") { echo "selected";} ?> >Abuela</option>
												<option value="8" <?php if ($key["PARENTESCO"] === "ABUELO") { echo "selected";} ?> >Abuelo</option>
												<option value="9" <?php if ($key["PARENTESCO"] === "TUTOR") { echo "selected";} ?> >Tutor</option>
												<option value="10" <?php if ($key["PARENTESCO"] === "ESPOSO") { echo "selected";} ?> >Esposo</option>
												<option value="11" <?php if ($key["PARENTESCO"] === "ESPOSA") { echo "selected";} ?> >Esposa</option>
												<option value="12" <?php if ($key["PARENTESCO"] === "CONCUBINO") { echo "selected";} ?> >Concubino</option>
												<option value="13" <?php if ($key["PARENTESCO"] === "CONCUBINA") { echo "selected";} ?> >Concubina</option>
											</select> 
										</div>  
										<div class="col-4" id="colnombre"> 
											<label class="labelsform" for="nombrecompleto" id="labelnombre<?=$cont?>">Nombre Completo</label>
											<input type="text" class="form-control estiloinput form-control-sm clascheckcambiofam" name="nombrecompleto<?=$cont?>" id="nombrecompleto<?=$cont?>" value="<?=$key["NOMBRE_COMPLETO"]?>" > 
										</div> 
										<div class="col-4" id="colocupacion"> 
											<label class="labelsform" for="ocupacion" id="labelocupacion<?=$cont?>">Ocupación</label>
											<input type="text" class="form-control estiloinput form-control-sm clascheckcambiofam" name="ocupacion<?=$cont?>" id="ocupacion<?=$cont?>" value="<?=$key["OCUPACION"]?>" > 
										</div> 
									</div>
									<!-- row -->
									<!-- row2 -->
									<div class="row" id="rowabajo<?=$cont?>" > 
										<div class="col-4" id="coltelefonocasa<?=$cont?>"> 
											<label class="labelsform" for="telefonocasafamiliar" id="labeltelefonocasa<?=$cont?>">Teléfono Casa</label>
											<input type="text" class="form-control estiloinput form-control-sm clascheckcambiofam phone_with_ddd" name="telefonocasafamiliar<?=$cont?>" id="telefonocasafamiliar<?=$cont?>" value="<?=$key["TELEFONO_CASA"]?>" > 
										</div> 
										<div class="col-4" id="colcelularfamiliar<?=$cont?>"> 
											<label class="labelsform" for="celularfamiliar" id="labelcelular<?=$cont?>">Teléfono Celular</label>
											<input type="text" class="form-control estiloinput form-control-sm clascheckcambiofam phone_with_ddd" maxlength="20" name="celularfamiliar<?=$cont?>" id="celularfamiliar<?=$cont?>"value="<?=$key["TELEFONO_CELULAR"]?>"  > 
										</div>  
									</div>
									<div class="row" id="rowspan1">
										<div class="col-4" id="colspan1">  
											<span class="linkAccione" onclick="eliminar(<?=$key["ID"]?>)" id="span1"  >ELIMINAR</span> 
										</div>
									</div>
								</div>



								<?php

							}
						}
							else{
								?>

								<div id="divaclonar1">
									<input type="number" name="id1" value=" " hidden >
									<div class="row" id="rowarriba1">
										<div class="col-4" id="colparentesco1"> 
											<label class="labelsform" for="parentesco" id="labelparentesco1" >Parentesco</label>
											<select class="form-control estiloinput form-control-sm clascheckcambiofam" name="parentesco1" id="parentesco1">
												<option value="1"  >Madre</option>
												<option value="2"  >Padre</option>
												<option value="3"  >Hermana</option>
												<option value="4"  >Hermano</option>
												<option value="5"  >Tía</option>
												<option value="6"  >Tío</option>
												<option value="7"  >Abuela</option>
												<option value="8"  >Abuelo</option>
												<option value="9"  >Tutor</option>
												<option value="14"  >Tutora</option>
												<option value="10"  >Esposo</option>
												<option value="11" >Esposa</option>
												<option value="12"  >Concubino</option>
												<option value="13"   >Concubina</option>
											</select> 
										</div>  
										<div class="col-4" id="colnombre"> 
											<label class="labelsform" for="nombrecompleto" id="labelnombre1">Nombre Completo</label>
											<input type="text" class="form-control estiloinput form-control-sm clascheckcambiofam" name="nombrecompleto1" id="nombrecompleto1" value=" " > 
										</div> 
										<div class="col-4" id="colocupacion"> 
											<label class="labelsform" for="ocupacion" id="labelocupacion1">Ocupación</label>
											<input type="text" class="form-control estiloinput form-control-sm clascheckcambiofam" name="ocupacion1" id="ocupacion1" value=" " > 
										</div> 
									</div>
									<!-- row -->
									<!-- row2 -->
									<div class="row" id="rowabajo1" > 
										<div class="col-4" id="coltelefonocasa1"> 
											<label class="labelsform" for="telefonocasafamiliar" id="labeltelefonocasa1">Teléfono Casa</label>
											<input type="text" class="form-control estiloinput form-control-sm clascheckcambiofam phone_with_ddd" maxlength="20" name="telefonocasafamiliar1" id="telefonocasafamiliar1" value="" > 
										</div> 
										<div class="col-4" id="colcelularfamiliar1"> 
											<label class="labelsform" for="celularfamiliar" id="labelcelular1">Teléfono Celular</label>
											<input type="text" class="form-control estiloinput form-control-sm clascheckcambiofam phone_with_ddd " maxlength="20" name="celularfamiliar1" id="celularfamiliar1"value=""  > 
										</div>  
									</div>
									<div class="row" id="rowspan1">
										<div class="col-4" id="colspan1">  
											<span class="linkAccione" onclick="eliminarno(1)" id="span1"  >ELIMINAR</span> 
										</div>
									</div>
								</div>





								<?php
							}
							?>
						</div>
					</div><input type="text" name="cantidad" id="cantidaddefam" hidden="" value="<?php if (!empty($cont)){echo $cont;}else { echo 1;}?>" >
				</div>
			</form>											
		</div>
	</div>
	<div class="modal fade" id="alert" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"   aria-hidden="true"  >
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content"> 
    	  <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Mensaje del sistema</h5> 
      </div>
      <div class="modal-body" id="mensajealerta">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn  " id="botonconfirm" data-dismiss="modal" style="color: white; background-color: #239dff">Aceptar</button> 
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="alertf" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"  aria-hidden="true"  >
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content"> 
    	  <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Mensaje del sistema</h5> 
      </div>
      <div class="modal-body" id="mensajealertaf">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn  " id="botonconfirmf" data-dismiss="modal" style="color: white; background-color: #239dff">Aceptar</button> 
      </div>
    </div>

  </div> 
</div>
<input type="text" id="checkcambiosfam" value="1" hidden="">
</div>


    <div class="modal fade" id="modalSSIMG" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered " role="document">
      <div class="modal-content">
         <div class="modal-header d-flex justify-content-center">
            <!--<h5 class="modal-title text-center" id="exampleModalCenterTitle">Archivo Seguro Social</h5>-->
         </div>
         <div class="modal-body text-center" id="">

            <div class="spinner-border text-primary" role="status" id="spinnerModal">
             <span class="sr-only">Loading...</span>
          </div>

          <img class="imagenTarjetaFM" src="" style="width: 28em; height: auto; background-color: #cccccc;" name="" id="imgModal" >
          <canvas id="canvas" width="400"></canvas>
       </div>
       <div class="modal-footer">
       </div>
    </div>
 </div>
</div>


<script type="text/javascript">
 
	function  hacercurp(){
		var nombre = $("#nombre").val();
		var apaterno = $("#apellidopaterno").val();
		var amaterno = $("#apellidomaterno").val();
		var fecha = $("#fechanacimiento").val();
		var estado = $("#lugarnacimientoestado").val(); 

		$.ajax({ 
			type: 'ajax',
			method: 'post',
			url: '<?=base_url("consultas/generacurp")?>',
			async: true, 
			data: {
				nombre: nombre,
				apaterno: apaterno,
				amaterno: amaterno,
				fecha: fecha,
				estado: estado
			},
			success: function(response){  
				 $("#curp").val(response);
				 
			},
			error: function () {
				alert('Hubo un error, al insertar a los familiares :´c');
			}
		}) ;

	}
	otro($("#vivecon").val())
	function otro(valor) {
		if (valor == 5) {
			$("#viveconotro").css("display","block")
			$("#viveconotro").trigger("click")
			$("#viveotro").css("display","inline-flex")
			$("#vivecon").css("width", "100px")
		}else{
			$("#viveconotro").val("")
			$("#viveconotro").css("display","none")
			$("#viveotro").css("display","")
			$("#vivecon").css("width", "")
		}
	}
	 $(document).ready(function(){
 $('.codepost').mask('00000'); 
 
});
	 $(window).on("mouseover", function(){
 
	 $('.datetimepicker').mask('00/00/0000'); 
       $('.datetimepicker').datepicker({
      format: "dd/mm/yyyy",
      autoclose: true,
      todayHighlight: true,
      assumeNearbyYear: true
   });

});

	$('.clascheckcambio').on("change", function(){

	$("#checkcambios").val(2);

});
	$('.clascheckcambiofam').on("change", function(){

	$("#checkcambiosfam").val(2);

});
 
	function editar() {
		var x = "";
		var data  = $("#formeditarinfo").serialize();
		var url = $("#formeditarinfo").attr('action'); 
		$("#imagenguardar").css("display", "none");
		$("#spiner").css("display", "block");
		
		if ($("#checkcambios").val() == 2) {
			$.ajax({ 
			type: 'ajax',
			method: 'post',
			url: url, 
			data: data })
			.done(function(response){
				if (response == 2) {
					agregarfamiliarmas();
					return;
				 
				}
				else{
					$('#alert').modal('show');
					$("#mensajealerta").html("Hubo un problema en la edicion");
					$("#spiner").css('display', 'none');
		$("#imagenguardar").css('display', 'block');
  
				}
			}) ;
		}

		else{
			agregarfamiliarmas();
		}
		
	}

	function agregarfamiliarmas(){
		var data  = $("#formeditarfmailiares").serialize();
		var url = $("#formeditarfmailiares").attr('action');
	 		if ($("#checkcambiosfam").val() == 2) {
	 			$.ajax({ 
			type: 'ajax',
			method: 'post',
			url: url,
			async: false, 
			data: data,
			success: function(response){  
				if (response == 1) {
					
	 
			 	$('#alertf').modal('show');
			 	$("#mensajealertaf").html("Se Guardó Correctamente, se Actualizará la Página para Visualizar los Cambios");

			 	$("#botonconfirmf").attr("onclick","recargarpagina()");
			 	$("#alertf").attr("onclick","recargarpagina()");
			 	$("#spiner").css('display', 'none');
		$("#imagenguardar").css('display', 'block');
		return;
					
				}
				if (response == 2) {
					
	 
			 	$('#alertf').modal('show');
			 	$("#mensajealertaf").html("Se Guardó Correctamente, se Actualizará la Página para Visualizar los Cambios");

			 	$("#botonconfirmf").attr("onclick","recargarpagina()");
			 	$("#alertf").attr("onclick","recargarpagina()");
	 $("#spiner").css('display', 'none');
		$("#imagenguardar").css('display', 'block');
		return;
					
				}
				else
				{
				setTimeout(function(){
			 		$('#alertf').modal('show');
			$("#mensajealertaf").html(response); 
			 }, 1000);
				}

				 
			},
			error: function () {
				alert('Hubo un error, al insertar a los familiares :´c');
			}
		}) ;
	 		}
	 		else{
	 				$('#alertf').modal('show');
			 	$("#mensajealertaf").html("Los cambios se han hecho satisfactoriamente");

			 	$("#botonconfirmf").attr("onclick","recargarpagina()");
			 	$("#alertf").attr("onclick","recargarpagina()");
	 $("#spiner").css('display', 'none');
		$("#imagenguardar").css('display', 'block');
	 		}

	}

	function eliminar(id) {
		var idfam = $("#idfamiliar"+id).val();
		if (id != 1) {
			if (idfam !=0) {
				$.ajax({ 
			type: 'ajax',
			method: 'post',
			url: '<?=base_url('configuracion/informacionpersonal/eliminarfamiliar')?>',
			async: false, 
			data: {id:id},
			success: function(response){  
				if (response == 1) {
					$('#alertf').modal('show');
			 	$("#mensajealertaf").html("Se Eliminó Correctamente al Familiar se Volverá a Cargar la Página para Visualizar los Cambios");
			 	$("#botonconfirmf").attr("onclick","recargarpagina()");
			 	$("#alertf").attr("onclick","recargarpagina()");
				}
				 
				
			},
			error: function () {
				alert('Hubo un error, al insertar a los familiares :´c');
			}
		}) ;
			}
			else{
				$("#divaclonar"+id).remove();
			}
		 
		}

	}
	
	function recargarpagina() {
	location.href = "<?=base_url('/configuracion/informacionpersonal')?>";
	}


	 var __PDF_DOC,
   __CURRENT_PAGE,
   __TOTAL_PAGES,
   __PAGE_RENDERING_IN_PROGRESS = 0,
   __CANVAS = $('#canvas').get(0),
   __CANVAS_CTX = __CANVAS.getContext('2d');

   function showPDF(pdf_url) {

     PDFJS.getDocument({ url: pdf_url }).then(function(pdf_doc) {
        __PDF_DOC = pdf_doc;
        __TOTAL_PAGES = __PDF_DOC.numPages;
        showPage(1);
     }).catch(function(error) {
        alert(error.message);
     });;
  }

  function showPage(page_no) {
     __PAGE_RENDERING_IN_PROGRESS = 1;
     __CURRENT_PAGE = page_no;

          // Fetch the page
          __PDF_DOC.getPage(page_no).then(function(page) {
             // As the canvas is of a fixed width we need to set the scale of the viewport accordingly
             var scale_required = __CANVAS.width / page.getViewport(1).width;

             // Get viewport of the page at required scale
             var viewport = page.getViewport(scale_required);

             // Set canvas height
             __CANVAS.height = viewport.height;

             var renderContext = {
              canvasContext: __CANVAS_CTX,
              viewport: viewport
           };

             // Render the page contents in the canvas
             page.render(renderContext).then(function() {
              __PAGE_RENDERING_IN_PROGRESS = 0;

                // Show the canvas and hide the page loader spinnerModal
                $("#spinnerModal").hide();
                $("#canvas").show();
             });
          });
       }



       function mostrarImagen (direccion,idImagen,objetofile,nombreImg) {

         //alert("entre");
         var nombre = $('#'+idImagen).attr("src");

         var name = nombre.split('/').pop();

         var name2 = direccion.split('.').pop();
         var mensaje= document.getElementById(nombreImg).innerHTML;

         if(name != "masgris.png " && name != "masgris.png" && name != "MAS.svg" && name != "MAS.svg " ){

            if( direccion != "" && ( name2 == "pdf" || name2 == "PDF" || name2 == "pdf ") && mensaje == "" ) {
            	
             $("#imgModal").hide();
             $("#canvas").hide();
             $("#spinnerModal").show();
             $("#modalSSIMG").modal('show');
             console.log(name);
             showPDF(direccion);

          }else if(name == "pdf.png" || name == "PDF.PNG" || name == "pdf.png ") {
          	
            $("#imgModal").hide();
            $("#canvas").hide();
            $("#spinnerModal").show();
            $("#modalSSIMG").modal('show');
            showPDF(URL.createObjectURL($("#"+objetofile).get(0).files[0]));
            
         } else {
            $("#imgModal").attr("src",nombre);
            $("#spinnerModal").hide();
            $("#canvas").hide();
            $("#imgModal").show();
            $("#modalSSIMG").modal('show');
         }
      }
   }

	 
   function getAge(fecha) {
    var today = new Date();
    var birthDate = new Date(fecha.split("/").reverse().join("-"));
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age = age - 1;
    } 
    	 
    /*if (age < 16) {
    	$("#fechanacimiento").val("")
    	$('#alertf').modal('show');
    	$("#mensajealertaf").html("Coloque una fecha correspondiente mayor a 15 años");
    	return 0 ;

    }*/
    return age;
}
 $("#edad").val(getAge($("#fechanacimiento").val()));  

  function cambio() {
    $("#edad").val(getAge($("#fechanacimiento").val()));
}
////////////////////////SECCION CLONACION///////////////////////////////////
function agregarfamiliar() {

    //buscas el ultimo div a clonar
    var div = $('div[id^="divaclonar"]:last'); 

//haces regex ara obtener el numero y hacerle un +1
var num  = parseInt( div.prop("id").match(/\d+/g), 10 ) +1; 

//aqui clonar y le cambias la propiedad para que tena el incrementado
var clondiv  = div.clone().prop('id', 'divaclonar'+num );


//escribe todo el html en un string RECUERDAD CONCATENAR EL NUMERO

var x =   '<div class="row" id="rowarriba1">';
x +=                '<div class="col-4"  > ';
x+=                   '<input type="number" name="id'+num+'" id="idfamiliar'+num+'" value="0" hidden >';
x +=                  '<label class="labelsform" for="parentesco'+num+'"   >Parentesco</label>';
x +=                  '<select class="form-control estiloinput form-control-sm clascheckcambiofam" name="parentesco'+num+'" id="parentesco'+num+'">';
x +=                    '<option value="1">Madre</option>';
x +=                    '<option value="2">Padre</option>';
x +=                    '<option value="3">Hermana</option>';
x +=                    '<option value="4">Hermano</option>';
x +=                    '<option value="5">Tia</option>';
x +=                    '<option value="6">Tio</option>';
x +=                    '<option value="7">Abuela</option>';
x +=                    '<option value="8">Abuelo</option>';
x +=                    '<option value="9">Tutor</option>';
x +=                    '<option value="14">Tutora</option>'; 
x+=												'<option value="10"  >Esposo</option>';
x+=												'<option value="11" >Esposa</option>';
x+=												'<option value="12"  >Concubino</option>';
x+=												'<option value="13"   >Concubina</option>';
x +=                  '</select> ';
x +=                '</div>  ';
x +=                '<div class="col-4"  > ';
x +=                  '<label class="labelsform" for="nombrecompleto'+num+'" >Nombre Completo</label>';
x +=                  '<input type="text" class="form-control estiloinput form-control-sm clascheckcambiofam" name="nombrecompleto'+num+'" id="nombrecompleto'+num+'"  > ';
x +=                '</div> '
x +=                '<div class="col-4"  > ';
x +=                  '<label class="labelsform" for="ocupacion'+num+'"  >Ocupación</label>';
x +=                  '<input type="text" class="form-control estiloinput form-control-sm clascheckcambiofam" name="ocupacion'+num+'" id="ocupacion'+num+'"  > ';
x +=                '</div> ';
x +=              '</div>' ;
x +=              '<div class="row"  >' ; 
x +=                  '<div class="col-4" > ';
x +=                    '<label class="labelsform" for="telefonocasafamiliar'+num+'" >Telefono Casa</label>';
x +=                    '<input type="text" class="form-control estiloinput form-control-sm clascheckcambiofam phone_with_ddd" maxlength="20" name="telefonocasafamiliar'+num+'" id="telefonocasafamiliar'+num+'"  > ';
x +=                  '</div> ';
x +=                  '<div class="col-4"  > ';
x +=                    '<label class="labelsform" for="celularfamiliar'+num+'" >Celular</label>';
x +=                  ' <input type="text" class="form-control estiloinput form-control-sm clascheckcambiofam phone_with_ddd" maxlength="20" name="celularfamiliar'+num+'" id="celularfamiliar'+num+'"  > ';
x +=                  '</div>  ';
x +=                '</div>';
x +=                '<div class="row" id="rowspan1">';
x +=                  '<div class="col-4"  >  ';
x +=                  ' <span class="agregarfamiliar" onclick="eliminar('+num+')"   >ELIMINAR</span> ';
x +=                  '</div>';
x +=                '</div>'; 

//aqui es donde le dices donde vas a poner el clon
clondiv.appendTo("#divcontenedor") ;
 //lo vacias el div con los elementos dentro
 $( "#divaclonar"+num).empty();
 //insertas el string en el html
 $( "#divaclonar"+num).html(x);
 $("#cantidaddefam").val(num);
$("#checkcambiosfam").val(2);
// recibimos el elemento que inicie el id con ^= "elementoclonable"
/*var div = $('div[id^="divaclonar"]:last'); 

var divrowar = $('div[id^="rowarriba"]:last');

var divcolpar = $('div[id^="colparentesco"]:last'); 
var labelparen = $('div[id^="colparentesco"]:last');  
var select = $('select[name^="parentesco"]:last');

var divcolnom = $('div[id^="divaclonar"]:last');  
var labelnombre = $('div[id^="colparentesco"]:last');  
var inputnombre = $('input[name^="nombrecompleto"]:last');

var divcolocu = $('div[id^="divaclonar"]:last'); 
var labelocu = $('div[id^="colparentesco"]:last');  
var inputocupacion = $('input[name^="ocupacion"]:last');


var div = $('div[id^="divaclonar"]:last'); 

var input = $('input[name^="especialidad"]:last');
var span = $('span[id^="ideliminarespecialidad"]:last');

  // leemos el numero del id pd: es necesario tener numero en tu elemento si quieres clonardiferens ids e incremento
  // And increment that number by 1
  var num  = parseInt( div.prop("id").match(/\d+/g), 10 ) +1; 

  //clonamos el elemento y le asignamos las propiedades
  var clondiv = div.clone().prop('id', 'iddivespecialidades'+num );
  var clonname = select.clone().prop({'name':'especialidad'+num,'id':'idespecialidad'+num} );
  var clonspan = span.clone().prop( 'id','ideliminarespecialidad'+num ).attr('data-id',num);

  // Finally insert $klon wherever you want
  clondiv.appendTo("#divcontenedor") ;
  $( "#iddivespecialidades"+num).empty();
  clonname.appendTo("#iddivespecialidades"+num);
  clonspan.appendTo("#iddivespecialidades"+num);*/

}
</script>

</div>
</div>
<script type="text/javascript">

	// //Este es el token que debes pedir en https://www.mapbox.com/ ya que tiene limite de consultas
 //   mapboxgl.accessToken = 'pk.eyJ1IjoidmljdG9ycmlrIiwiYSI6ImNqdDRudjhxcjAwY2I0YXFzNzNjbGJyc2MifQ.AZ2JQCRsKtM2iRSgYx4LDQ'; 


	// 		//esta funcion es con la que optenemos la ubicacion actual
	// 		function success(pos) {


	// 			var crd = pos.coords; 
	// 		//aqui es donde empezamos a usar la libreria de mapbox donde llamamos al mapa enel html con la clase map, debes antes definirle alto y ancho,
	// 		var map = new mapboxgl.Map({
	// 			container: 'map',
	// 		    //ocupamos el estilo del mapa
	// 		    style: 'mapbox://styles/victorrik/cjxxnnpwk02kd1crnny7lqyot',
	// 		      //pocisionamos el mapa con respecto a la pocision actual
	// 		      center: [crd.longitude, crd.latitude],
	// 		      //zoom del mapa, entre mas, mas cerca
	// 		      zoom: 14
	// 		  });



	// 		      // create a HTML element for each feature
	// 		      var el = document.createElement('div');
	// 		      el.className = 'marker';



	// 		 //esto es para el marcador de, donde pondremos nuestro direccionador
	// 		 var marker = new mapboxgl.Marker(el,{
	// 		 	draggable: true
	// 		 })

	// 		 .setLngLat([crd.longitude, crd.latitude])
	// 		 .addTo(map);

	// 		 function onDragEnd() {
	// 		 	var lngLat = marker.getLngLat();
	// 		 	$('#long').val(lngLat.lng);
	// 		 	$('#lat').val(lngLat.lat); 
	// 		 }

	// 		 marker.on('dragend', onDragEnd); 
	// 		}
	// 		function getdireccion(){

	// 			if (($("#long").val() !="") && ($("#lat").val() !="")) {
	// 				var long = $("#long").val();
	// 				var lat =  $("#lat").val();

	// 				$.ajax({ 
	// 					url: "<?=base_url('configuracion/informacionpersonal/agregardireccion')?>",
	// 					type: 'ajax', 
	// 					method: 'post',
	// 					async: false,  
	// 					data: {long: long,
	// 						lat: lat
	// 					},
	// 					success: function(response){  
	// 						var miau = response.split("-")
	// 						$('#calleactual').val(miau[0]);
	// 						$('#noexterior').val(miau[1]);
	// 						$('#coloniaactual').val(miau[2]);
	// 						$('#codpostal').val(miau[3]);
	// 						$('#residenciaestado').val(miau[4]);
	// 						$('#residenciaciudad').val(miau[5]);
	// 						$('#municipio').val(miau[6]);
	// 						$('#residenciapais').val(miau[7]);
	// 					},
	// 					error: function () {
	// 						alert('ño');
	// 					}
	// 				}); 

	// 			}
	// 			else{
	// 				navigator.geolocation.getCurrentPosition(showPosition);
	// 			}
	// 		}
	// 		function showPosition(position) {


	// 			var long = position.coords.longitude;
	// 			var lat = position.coords.latitude;

	// 			$.ajax({ 
	// 				url: "<?=base_url('configuracion/informacionpersonal/agregardireccion')?>",
	// 				type: 'ajax', 
	// 				method: 'post',
	// 				async: false,  
	// 				data: {long: long,
	// 					lat: lat
	// 				},
	// 				success: function(response){  
	// 					var miau = response.split("-")
	// 					$('#calleactual').val(miau[0]);
	// 					$('#noexterior').val(miau[1]);
	// 					$('#coloniaactual').val(miau[2]);
	// 					$('#codpostal').val(miau[3]);
	// 					$('#residenciaestado').val(miau[4]);
	// 					$('#residenciaciudad').val(miau[5]);
	// 					$('#municipio').val(miau[6]);
	// 					$('#residenciapais').val(miau[7]);
	// 				},
	// 				error: function () {
	// 					alert('ño');
	// 				}
	// 			});  
	// 		}

	// 		function error(err) {
	// 			console.warn(`ERROR(${err.code}): ${err.message}`);
	// 		}

	// 		navigator.geolocation.getCurrentPosition(success, error, options);



	// 		var options = {
	// 			enableHighAccuracy: true,
	// 			timeout: 5000,
	// 			maximumAge: 0
	// 		};

</script>