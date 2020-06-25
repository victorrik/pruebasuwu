<div id="contenidocambiante" data-id="7">  
	<div class="editarflotante"> 
		<button type="button" class="botoneditaredicion" onclick="recargapagina()">
			<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/RESTAURAR.svg"> 
		</button> 
		<button type="button" class="botoneditaredicion" onclick="editar()">
			<div class="spinner-border text-light" id="spiner" role="status" style="display: none;">
				<span class="sr-only">Loading...</span>
			</div>
			<img id="imagenguardar" src="<?=assetmiperfil()?>/img/ICONOS/SVG/GUARDAR.svg">
		</button>  
	</div> 
	<div class="row contents lineaInferiorROW">
		<div class="col" id="zona1">
			<div class="row align-items-end" >
				<div class="col-2 letratituloedicion">
					<span>Diplomados</span>
				</div>
				<div class="col-10 lineainferiorosita">									
				</div>
			</div>
			<form id="formdiplomado" action="<?=base_url('configuracion/educacioncontinua/editardiplomado')?>">	
				<div class="row mt-3 mb-3">
					<div class="col-5">
						<label  class="col-form-label" for="estatus">¿Tiene Algún Diplomado?</label>
					</div>
					<div class="col-3"  >  


						<select class="form-control form-control-sm estiloinput estiloinput" onchange="tiene($(this).val(),'contenedor1','agregardiplomas')" name="diplomadoselect" id="diplomadoselect">
							<option value="2"  <?php if (empty($datos["diplomado"])){  echo "selected"; $display = 'style="display: none;"';} ?> >No</option>
							<option value="1" <?php if (!empty($datos["diplomado"])){  echo "selected"; $display = 'style="display: block;"';} ?> >Sí</option> 
						</select> 
					</div> 
					<div class="col-4 text-right">
						<span class="linkAccion" id="agregardiplomas"  onclick="agregarDiploma()" <?=$display?> >AGREGAR DIPLOMADO</span>
					</div>

				</div> 


				<div id="contenedor1" <?=$display?>>
					<?php
					if (!empty($datos['diplomado'])) {
						$contadordiploma = count($datos['diplomado']);

						$cont = 1 ;
						foreach ($datos['diplomado'] as $key) {

							?>
							<div class="contentx row" id="diploma<?=$cont?>" name="diploma" >
								<div class="col-3 mostrarpaneleducacion">
									<div class="row">
										<div class="col"> 
											<div class="contAjustar" style="width: 16em; height: 12em; margin: 8px 30px 0px -18px;">
												<div class="boxi" style="width: 16em; height: 12em;">
													<img id="imagendiplomado<?=$cont?>" src="<?=checkimagen($key["DIRECCION_IMAGEN"])?>" style="width: 100%;"> 
												</div>
											</div>
										</div>
									</div>
									<div class="esteeducacion">
										<div class="row paneleducacion">
											<div class="col-2"> 
												<a onclick="mostrarImagen('<?=$key["DIRECCION_IMAGEN"]?>','imagendiplomado<?=$cont?>','inputfilediplomado<?=$cont?>','nombreimgdiplo<?=$cont?>');">  
													<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > 
												</a> 
											</div>
											<div class="col">

											</div>

											<div class="col-1" style="cursor: pointer;">

												<label  for="inputfilediplomado<?=$cont?>">
													<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
												</label>
											</div> 
											<div class="col-1" onclick="quitarImagen('imagendiplomado<?=$cont?>','inputfilediplomado<?=$cont?>','inpudiplomado<?=$cont?>','<?=$key["DIRECCION_IMAGEN"]?>','<?=$key["ID"]?>')">
												<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >
											</div> 
										</div> 
										<div class="row paneleducacion"> 
											<div class="col">
												<span id="nombreimgdiplo<?=$cont?>"></span>
											</div>

										</div> 
									</div>
									<input type="file" class="checkclasdiplo" id="inputfilediplomado<?=$cont?>" hidden=""  name="archivo<?=$cont?>" onchange="previewdiplomado(<?=$cont?>);"  />
									<input type="text" name='inpudiplomado<?=$cont?>'  id="inpudiplomado<?=$cont?>" hidden="" value=""/>  
									<input type="text" name='iddiplomado<?=$cont?>'  id="iddiplomado<?=$cont?>" hidden="" value="<?=$key["ID"]?>"/> 
									<input type="text" name='imgextensiondiplo<?=$cont?>'  id="imgextensiondiplo<?=$cont?>" hidden="" value="0"/>
								</div>
								<div class="col-9">
									<div class="row">
										<div class="col-9">
											<div class="form-group">
												<label class="nombreCampo" for="nombreDiplomado<?=$cont?>">Nombre del Diplomado</label>
												<input type="text" class="form-control estiloCampo form-control-sm checkclasdiplo" name="nombreDiplomado<?=$cont?>" id="nombreDiplomado<?=$cont?>" value="<?=$key["NOMBRE"]?>" >
											</div>
										</div>
								<!-- <div class="col-3">
									<div class="form-group">
										<label class="nombreCampo" for="generacioninicio<?=$cont?>">Generación Inicio</label>
										<input type="text" class="form-control estiloCampo form-control-sm checkclasdiplo ano" name="generacioninicio<?=$cont?>" id="generacioninicio<?=$cont?>" value="<?=$key["GENERACION_INICIO"]?>" >
									</div>
								</div> -->
								<div class="col-3">
									<div class="form-group">
										<label class="nombreCampo" for="generaciontermino<?=$cont?>">Generación</label>
										<input type="text" class="form-control estiloCampo form-control-sm checkclasdiplo ano" name="generaciontermino<?=$cont?>" id="generaciontermino<?=$cont?>" value="<?=$key["GENERACION_TERMINO"]?>" >
									</div>
								</div>
							</div>
							<div class="row mb-2">
								<div class="col-9">
									<div class="form-group">
										<label class="nombreCampo" for="institucion<?=$cont?>">Institución</label>
										<input type="text" class="form-control estiloCampo form-control-sm checkclasdiplo" name="institucion<?=$cont?>" id="institucion<?=$cont?>"  value="<?=$key["INSTITUCION"]?>">
									</div>
								</div>
								<div class="col-3">
									<div class="form-group">
										<label class="nombreCampo" for="duracion<?=$cont?>">Duración</label>
										<input type="text" class="form-control estiloCampo form-control-sm checkclasdiplo " maxlength="30" name="duracion<?=$cont?>" id="duracion<?=$cont?>" value="<?=$key["DURACION"]?>"  >
									</div>
								</div>
							</div>
							<div class="row">

								<div class="col-4">
									<label class="nombreCampo" for="pais<?=$cont?>">País</label>
									<input type="text" class="form-control estiloCampo form-control-sm checkclasdiplo " name="pais<?=$cont?>" id="pais<?=$cont?>" value="<?=$key["PAIS"]?>" >
								</div> 
								<div class="col-4">
									<label class="nombreCampo" for="estado<?=$cont?>">Estado</label>
									<input type="text" class="form-control estiloCampo form-control-sm checkclasdiplo " name="estado<?=$cont?>" id="estado<?=$cont?>" value="<?=$key["ESTADO"]?>" >
								</div> 
								<div class="col-4">
									<label class="nombreCampo" for="ciudad<?=$cont?>">Ciudad</label>
									<input type="text" class="form-control estiloCampo form-control-sm checkclasdiplo " name="ciudad<?=$cont?>" id="ciudad<?=$cont?>" value="<?=$key["CIUDAD"]?>" >
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col bajito">
								<span class="linkAccione" onclick="eliminar('diploma',<?=$cont?>,<?=$key["ID"]?>)">ELIMINAR DIPLOMADO</span>
							</div>
						</div>
					</div>
					<?php $cont++; } }else{

						$contadordiploma = 1;

						?>

						<div class="contentx row" id="diploma1" name="diploma" >
							<div class="col-3 mostrarpaneleducacion"  >
								<div class="row">
									<div class="col"> 
										<div class="contAjustar" style="width: 16em; height: 12em; margin: 8px 30px 0px -18px;">
											<div class="boxi" style="width: 16em; height: 12em;">
												<img id="imagendiplomado1" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
											</div>
										</div>
									</div>
								</div>
								<div class="esteeducacion">
									<div class="row paneleducacion">
										<div class="col-2" onclick="mostrarImagen('','imagendiplomado1','inputfilediplomado1','nombreimgdiplo1');" > 
											<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > 
										</div>
										<div class="col">

										</div>

										<div class="col-1" >

											<label  for="inputfilediplomado1">
												<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
											</label>
										</div> 
										<div class="col-1">
											<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >
										</div> 
									</div> 
									<div class="row paneleducacion"> 
										<div class="col">
											<span id="nombreimgdiplo1"></span>
										</div>

									</div>
								</div>
								<input type="file" class="checkclasdiplo" id="inputfilediplomado1" hidden=""  name="archivo1" onchange="previewdiplomado(1);"  />
								<input type="text" name='inpudiplomado1'  id="inpudiplomado1" hidden="" value=""/>  
								<input type="text" name='iddiplomado1'  id="iddiplomado1" hidden="" value="0"/> 
								<input type="text" name='imgextensiondiplo1'  id="imgextensiondiplo1" hidden="" value="0"/>
							</div>
							<div class="col-9">
								<div class="row">
									<div class="col-9">
										<div class="form-group">
											<label class="nombreCampo" for="nombreDiplomado1">Nombre del Diplomado</label>
											<input type="text" class="form-control estiloCampo form-control-sm checkclasdiplo" name="nombreDiplomado1" id="nombreDiplomado1"  >
										</div>
									</div>
								<!-- <div class="col-3">
									<div class="form-group">
										<label class="nombreCampo" for="generacioninicio1">Generación Inicio</label>
										<input type="text" class="form-control estiloCampo form-control-sm checkclasdiplo ano" name="generacioninicio1" id="generacioninicio1"  >
									</div>
								</div> -->
								<div class="col-3">
									<div class="form-group">
										<label class="nombreCampo" for="generaciontermino1">Generación</label>
										<input type="text" class="form-control estiloCampo form-control-sm checkclasdiplo ano" name="generaciontermino1" id="generaciontermino1"  >
									</div>
								</div>
							</div>
							<div class="row mb-2">
								<div class="col-9">
									<div class="form-group">
										<label class="nombreCampo" for="institucion1">Institución</label>
										<input type="text" class="form-control estiloCampo form-control-sm checkclasdiplo" name="institucion1" id="institucion1"  >
									</div>
								</div>
								<div class="col-3">
									<div class="form-group">
										<label class="nombreCampo" for="duracion1">Duración</label>
										<input type="text" class="form-control estiloCampo form-control-sm checkclasdiplo " maxlength="30" name="duracion1" id="duracion1"  >
									</div>
								</div>
							</div>
							<div class="row">

								<div class="col-4">
									<label class="nombreCampo" for="pais1">País</label>
									<input type="text" class="form-control estiloCampo form-control-sm checkclasdiplo " name="pais1" id="pais1" value="" >
								</div> 
								<div class="col-4">
									<label class="nombreCampo" for="estado1">Estado</label>
									<input type="text" class="form-control estiloCampo form-control-sm checkclasdiplo " name="estado1" id="estado1" value="" >
								</div> 
								<div class="col-4">
									<label class="nombreCampo" for="ciudad1">Ciudad</label>
									<input type="text" class="form-control estiloCampo form-control-sm checkclasdiplo " name="ciudad1" id="ciudad1" value="" >
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col bajito">
								<span class="linkAccione" onclick="eliminarDiploma(1)">ELIMINAR DIPLOMADO</span>
							</div>
						</div>
					</div>

					<?php
				} ?>
			</div>

			<input type="text" id="contadordiplomas" name="contadordiplomas" hidden="" value="<?=$contadordiploma?>">
		</form>

		<!------------------------------------------------- -->

	</div>

</div>
<!--diplomados-->
<!--cursos,talleeres,cap-->
<div class="row contents lineaInferiorROW">
	<div class="col" id="zona2">
		<div class="row align-items-end" >
			<div class="col-4 letratituloedicion">
				<span>Cursos |Talleres | Capacitaciones</span>
			</div>
			<div class="col-8 lineainferiorosita">									
			</div>
		</div>
		<form id="formcutaca" action="<?=base_url('configuracion/educacioncontinua/editarcutaca')?>">	
			<div class="row mt-3 mb-3">
				<div class="col-5">
					<label  class="col-form-label" for="estatus">¿Asistió a Algún Curso, Taller o Capacitación?</label>
				</div>
				<div class="col-3"  >  


					<select class="form-control form-control-sm estiloinput estiloinput" onchange="tiene($(this).val(),'contenedor2','agregarcutaca')" name="cutacaselect" id="cutacaselect">
						<option value="2"  <?php if (empty($datos["cutaca"])){  echo "selected"; $display = 'style="display: none;"';} ?> >No</option>
						<option value="1" <?php if (!empty($datos["cutaca"])){  echo "selected"; $display = 'style="display: block;"';} ?> >Sí</option> 
					</select> 
				</div>
				<div class="col-4 text-right">
					<span class="linkAccion" id="agregarcutaca" onclick="agregarCTCS()" <?=$display?>>AGREGAR REGISTRO</span>
				</div> 
			</div>
			<!------------------------------------ -->

			<!-- ---------------------------------- -->


			<div id="contenedor2" <?=$display?> >
				<?php

				if (!empty($datos['cutaca'])) {
					$contadorcutada = count($datos['cutaca']);
					$cont = 1 ;
					foreach ($datos['cutaca'] as $key ) {

						?>

						<div class="contentx row" id="cucataca<?=$cont?>" name="cucataca" >
							<div class="col-3 mostrarpaneleducacion">
								<div class="row">
									<div class="col "> 
										<div class="contAjustar" style="width: 16em; height: 12em; margin: 8px 30px 0px -18px;">
											<div class="boxi" style="width: 16em; height: 12em;">
												<img id="imagencutaca<?=$cont?>" src="<?=checkimagen($key["dirimagen"])?>" style="width: 100%;"> 
											</div>
										</div>
									</div>
								</div>
								<div class="esteeducacion">
									<div class="row paneleducacion">
										<div class="col-2"> 
											<a onclick="mostrarImagen('<?=$key["dirimagen"]?>','imagencutaca<?=$cont?>','inputfilecutaca<?=$cont?>','nombrecutaca<?=$cont?>');">  
												<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > 
											</a>
										</div>
										<div class="col">

										</div>

										<div class="col-1">

											<label  for="inputfilecutaca<?=$cont?>">
												<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
											</label>
										</div> 
										<div class="col-1">
											<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >
										</div> 
									</div>
									<div class="row paneleducacion" > 
										<div class="col">
											<span id="nombrecutaca<?=$cont?>"></span>
										</div>

									</div> 
								</div>
								<input type="file" id="inputfilecutaca<?=$cont?>" hidden=""  name="archivocucata<?=$cont?>" onchange="previewcutaca(<?=$cont?>);"  />
								<input type="text" name='inputcucata<?=$cont?>'  id="inputcucata<?=$cont?>" hidden="" value=""/>  
								<input type="text" name='idcucata<?=$cont?>'  id="idcucata<?=$cont?>" hidden="" value="<?=$key["Id"]?>"/> 
								<input type="text" name='estensioncutaca<?=$cont?>'  id="estensioncutaca<?=$cont?>" hidden="" value="0"/>  
							</div>
							<div class="col-9">
								<div class="row">
									<div class="col-5">
										<div class="form-group">
											<label class="nombreCampo" for="nombreDiplomado<?=$cont?>">Nombre del Diplomado</label>
											<input type="text" class="form-control estiloCampo form-control-sm checkclascucata" name="nombreDiplomado<?=$cont?>" id="nombrecutacainput<?=$cont?>" value="<?=$key["Nombre"]?>" >
										</div>
									</div>
									<div class="col-4">
										<div class="form-group">
											<label class="nombreCampo" for="tipo<?=$cont?>">Tipo del Diplomado</label>
											<select class="form-control form-control-sm estiloCampo" name="tipo<?=$cont?>" id="tipo<?=$cont?>">
												<option value="2"<?php if($key["Tipo"] === "CURSO"){echo "selected";} ?> >Curso</option>
												<option value="3"<?php if($key["Tipo"] === "TALLER"){echo "selected";} ?> >Taller</option>
												<option value="4"<?php if($key["Tipo"] === "CAPACITACION"){echo "selected";} ?> >Capacitación</option>
											</select>
										</div>
									</div>
									<div class="col-3">
										<div class="form-group">
											<label class="nombreCampo" for="duracionenhoras<?=$cont?>">Duración en Horas</label>
											<input type="text" class="form-control estiloCampo form-control-sm checkclascucata numero" name="duracionenhoras<?=$cont?>" id="duracionenhoras<?=$cont?>"  value="<?=$key["Duracionhoras"]?>">
										</div>
									</div>
								</div>
								<div class="row mb-2">
									<div class="col-8">
										<div class="form-group">
											<label class="nombreCampo" for="institucion<?=$cont?>">Institución</label>
											<input type="text" class="form-control estiloCampo form-control-sm checkclascucata" name="institucion<?=$cont?>" id="institucioncutaca<?=$cont?>" value="<?=$key["Institucion"]?>"  >
										</div>
									</div>
									<div class="col-2">
										<div class="form-group">
											<label class="nombreCampo" for="mes<?=$cont?>">Mes</label>
											<select class="form-control form-control-sm estiloCampo" name="mes<?=$cont?>" id="mes<?=$cont?>">
                        <option value="1" <?php if ($key["Mes"]== 1) {  echo "selected"; }?> > Enero</option>
                        <option value="2" <?php if ($key["Mes"]== 2) {  echo "selected"; }?> > Febrero</option>
                        <option value="3" <?php if ($key["Mes"]== 3) {  echo "selected"; }?> > Marzo</option>
                        <option value="4" <?php if ($key["Mes"]== 4) {  echo "selected"; }?> > Abril</option>
                        <option value="5" <?php if ($key["Mes"]== 5) {  echo "selected"; }?> > Mayo</option>
                        <option value="6" <?php if ($key["Mes"]== 6) {  echo "selected"; }?> > Junio</option>
                        <option value="7" <?php if ($key["Mes"]== 7) {  echo "selected"; }?> > Julio</option>
                        <option value="8" <?php if ($key["Mes"]== 8) {  echo "selected"; }?> > Agosto</option>
                        <option value="9" <?php if ($key["Mes"]== 9) {  echo "selected"; }?> > SEptiembre</option>
                        <option value="10" <?php if ($key["Mes"]== 10) {  echo "selected"; }?> > Octubre</option>
                        <option value="11" <?php if ($key["Mes"]== 11) {  echo "selected"; }?> > Noviembre</option>
                        <option value="12" <?php if ($key["Mes"]== 12) {  echo "selected"; }?> > Diciembre</option>
                     </select> 
										</div>
									</div>
									<div class="col-2">
										<div class="form-group">
											<label class="nombreCampo" for="ano<?=$cont?>">Año</label>
											<input type="text" class="form-control estiloCampo form-control-sm checkclascucata ano" name="ano<?=$cont?>" id="ano<?=$cont?>" value="<?=$key["Ano"]?>" >
										</div>
									</div>
								</div>
								<div class="row">

									<div class="col-4">
										<label class="nombreCampo" for="pais<?=$cont?>">País</label>
										<input type="text" class="form-control estiloCampo form-control-sm checkclascucata " name="pais<?=$cont?>" id="pais<?=$cont?>" value="<?=$key["Pais"]?>" >
									</div> 
									<div class="col-4">
										<label class="nombreCampo" for="estado<?=$cont?>">Estado</label>
										<input type="text" class="form-control estiloCampo form-control-sm checkclascucata " name="estado<?=$cont?>" id="estado<?=$cont?>" value="<?=$key["Estado"]?>" >
									</div> 
									<div class="col-4">
										<label class="nombreCampo" for="ciudad<?=$cont?>">Ciudad</label>
										<input type="text" class="form-control estiloCampo form-control-sm checkclascucata " name="ciudad<?=$cont?>" id="ciudad<?=$cont?>" value="<?=$key["Ciudad"]?>" >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col bajito">
									<span class="linkAccione" onclick="eliminar('cucataca',<?=$cont?>,<?=$key["Id"]?>)">ELIMINAR REGISTRO</span>
								</div>
							</div>
						</div>

						<?php $cont++; } }else{

							$contadordiploma = 1;
							$contadorcutada = 1;
							?>
							<div class="contentx row" id="cucataca1" name="cucataca" >
								<div class="col-3 mostrarpaneleducacion">
									<div class="row">
										<div class="col "> 
											<div class="contAjustar" style="width: 16em; height: 12em; margin: 8px 30px 0px -18px;">
												<div class="boxi" style="width: 16em; height: 12em;">
													<img id="imagencutaca1" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
												</div>
											</div>
										</div>
									</div>
									<div class="esteeducacion">
										<div class="row paneleducacion">
											<div class="col-2" onclick="mostrarImagen('','imagencutaca1','inputfilecutaca1','nombrecutaca1');"> 
												<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > 
											</div>
											<div class="col">

											</div>

											<div class="col-1">

												<label  for="inputfilecutaca1">
													<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
												</label>
											</div> 
											<div class="col-1">
												<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >
											</div> 
										</div> 
										<div class="row paneleducacion"> 
											<div class="col">
												<span id="nombrecutaca1"></span>
											</div>

										</div> 
									</div>
									<input type="file" id="inputfilecutaca1" hidden=""  name="archivocucata1" onchange="previewcutaca(1);"  />
									<input type="text" name='inputcucata1'  id="inputcucata1" hidden="" value=""/>  
									<input type="text" name='idcucata1'  id="idcucata1" hidden="" value="0"/> 
									<input type="text" name='estensioncutaca1'  id="estensioncutaca1" hidden="" value="0"/>  
								</div>
								<div class="col-9">
									<div class="row">
										<div class="col-5">
											<div class="form-group">
												<label class="nombreCampo" for="nombreDiplomado1">Nombre</label>
												<input type="text" class="form-control estiloCampo form-control-sm checkclascucata" name="nombreDiplomado1" id="nombrecutacainput1"  >
											</div>
										</div>
										<div class="col-4">
											<div class="form-group">
												<label class="nombreCampo" for="tipo1">Tipo</label>
												<select class="form-control form-control-sm estiloCampo" name="tipo1" id="tipo1">
													<option value="2" >Curso</option>
													<option value="3" >Taller</option>
													<option value="4" >Capacitación</option>
												</select>
											</div>
										</div>
										<div class="col-3">
											<div class="form-group">
												<label class="nombreCampo" for="duracionenhoras1">Duración en Horas</label>
												<input type="text" class="form-control estiloCampo form-control-sm checkclascucata numero" name="duracionenhoras1" id="duracionenhoras1"  >
											</div>
										</div>
									</div>
									<div class="row mb-2">
										<div class="col-8">
											<div class="form-group">
												<label class="nombreCampo" for="institucion1">Institución</label>
												<input type="text" class="form-control estiloCampo form-control-sm checkclascucata" name="institucion1" id="institucioncutaca1"  >
											</div>
										</div>
										<div class="col-2">
											<div class="form-group">
												<label class="nombreCampo" for="mes1">Mes</label>
												<select class="form-control form-control-sm estiloCampo" name="mes1" id="mes1">
                        <option value="1"  > Enero</option>
                        <option value="2"  > Febrero</option>
                        <option value="3"  > Marzo</option>
                        <option value="4"  > Abril</option>
                        <option value="5"  > Mayo</option>
                        <option value="6"  > Junio</option>
                        <option value="7"  > Julio</option>
                        <option value="8"  > Agosto</option>
                        <option value="9"  > SEptiembre</option>
                        <option value="10" > Octubre</option>
                        <option value="11" > Noviembre</option>
                        <option value="12" > Diciembre</option>
                     </select> 
											</div>
										</div>
										<div class="col-2">
											<div class="form-group">
												<label class="nombreCampo" for="ano1">Año</label>
												<input type="text" class="form-control estiloCampo form-control-sm checkclascucata ano" name="ano1" id="ano1"  >
											</div>
										</div>
									</div>
									<div class="row">

										<div class="col-4">
											<label class="nombreCampo" for="pais1">País</label>
											<input type="text" class="form-control estiloCampo form-control-sm checkclascucata " name="pais1" id="pais1" value="" >
										</div> 
										<div class="col-4">
											<label class="nombreCampo" for="estado1">Estado</label>
											<input type="text" class="form-control estiloCampo form-control-sm checkclascucata " name="estado1" id="estado1" value="" >
										</div> 
										<div class="col-4">
											<label class="nombreCampo" for="ciudad1">Ciudad</label>
											<input type="text" class="form-control estiloCampo form-control-sm checkclascucata " name="ciudad1" id="ciudad1" value="" >
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col bajito">
										<span class="linkAccione" onclick="eliminarcucata(1)">ELIMINAR REGISTRO</span>
									</div>
								</div>
							</div>

							<?php
						} ?>
					</div>

					<input type="text" id="contadorcutaca" name="contadorcutaca" hidden="" value="<?=$contadorcutada?>">
				</form>
				<!------------------------------------------------- -->

			</div>
		</div>
		<!--cursos,talleeres,cap-->
		<!--congresos-->
		<div class="row contents lineaInferiorROW">
			<div class="col" id="zona3">
				<div class="row align-items-end" >
					<div class="col-2 letratituloedicion">
						<span>Congresos</span>
					</div>
					<div class="col-10 lineainferiorosita">									
					</div>
				</div>
				<form id="formcongreso" action="<?=base_url('configuracion/educacioncontinua/editarcongreso')?>">	
					<div class="row mt-3 mb-3">
						<div class="col-5">
							<label  class="col-form-label" for="estatus">¿Asistió Algún Congreso?</label>
						</div>
						<div class="col-3"  >  


							<select class="form-control form-control-sm estiloinput estiloinput" onchange="tiene($(this).val(),'contenedor3','agregarcongreso')" name="congresoselect" id="congresoselect">
								<option value="2"  <?php if (empty($datos["congreso"])){  echo "selected"; $display = 'style="display: none;"';} ?> >No</option>
								<option value="1" <?php if (!empty($datos["congreso"])){  echo "selected"; $display = 'style="display: block;"';} ?> >Sí</option> 
							</select> 
						</div>
						<div class="col-4 text-right">
							<span class="linkAccion" id="agregarcongreso"  onclick="agregarCongreso()" <?=$display?>>AGREGAR CONGRESO</span>
						</div> 
					</div>
					<!------------------------------------ -->

					<!-- ---------------------------------- -->



					<div id="contenedor3" <?=$display?> >
						<?php 
						if (!empty($datos["congreso"])) {
							$cont= 1; 
							$contadorcongresos = count($datos["congreso"]);
							foreach ($datos["congreso"] as $key	) {
								?> 
								<div class="contentx row" id="congreso<?=$cont?>" name="congreso" >
									<div class="col-3 mostrarpaneleducacion">
										<div class="row">
											<div class="col "> 
												<div class="contAjustar" style="width: 16em; height: 12em; margin: 8px 30px 0px -18px;">
													<div class="boxi" style="width: 16em; height: 12em;">
														<img id="imagencongreso<?=$cont?>" src="<?=checkimagen($key["DIRECCION_IMAGEN"])?>" style="width: 100%;"> 
													</div>
												</div>
											</div>
										</div>
										<div class="esteeducacion">

											<div class="row paneleducacion">
												<div class="col-2"> 
													<a onclick="mostrarImagen('<?=$key["DIRECCION_IMAGEN"]?>','imagencongreso<?=$cont?>','inputfilecongreso<?=$cont?>','nombreimgcongreso<?=$cont?>');" >  
														<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > 
													</a> 
												</div>
												<div class="col">

												</div>

												<div class="col-1">

													<label  for="inputfilecongreso<?=$cont?>">
														<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
													</label>
												</div> 
												<div class="col-1">
													<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >
												</div> 
											</div>

											<div class="row paneleducacion">
												<div class="col-2"> 
													<div class="col">
														<span id="nombreimgcongreso<?=$cont?>"></span>
													</div>

												</div>
											</div>
										</div>
										<input type="file" class="checkclascongre" id="inputfilecongreso<?=$cont?>" hidden=""  name="archivocucata<?=$cont?>" onchange="previewcongreso(<?=$cont?>);"  />
										<input type="text" name='inputcongreso<?=$cont?>'  id="inputcongreso<?=$cont?>" hidden="" value=""/>  
										<input type="text" name='idcongreso<?=$cont?>'  id="idcongreso<?=$cont?>" hidden="" value="<?=$key["ID"]?>"/> 
										<input type="text" name='estensioncongreso<?=$cont?>'  id="estensioncongreso<?=$cont?>" hidden="" value="0"/> 
									</div>
									<div class="col-9">
										<div class="row">
											<div class="col-12">
												<div class="form-group">
													<label class="nombreCampo" for="nombrecongreso<?=$cont?>">Nombre del Congreso</label>
													<input type="text" class="form-control estiloCampo form-control-sm checkclascongre" name="nombrecongreso<?=$cont?>" id="nombrecongreso<?=$cont?>" value="<?=$key["NOMBRE"]?>" >
												</div>
											</div> 
										</div> 
										<div class="row">

											<div class="col-3">
												<label class="nombreCampo" for="pais<?=$cont?>">País</label>
												<input type="text" class="form-control estiloCampo form-control-sm checkclascongre " name="pais<?=$cont?>" id="pais<?=$cont?>" value="<?=$key["PAIS"]?>" >
											</div> 
											<div class="col-3">
												<label class="nombreCampo" for="estado<?=$cont?>">Estado</label>
												<input type="text" class="form-control estiloCampo form-control-sm checkclascongre " name="estado<?=$cont?>" id="estado<?=$cont?>" value="<?=$key["ESTADO"]?>" >
											</div> 
											<div class="col-3">
												<label class="nombreCampo" for="ciudad<?=$cont?>">Ciudad</label>
												<input type="text" class="form-control estiloCampo form-control-sm checkclascongre " name="ciudad<?=$cont?>" id="ciudad<?=$cont?>" value="<?=$key["CIUDAD"]?>" >
											</div>
											<div class="col-3">
												<label class="nombreCampo" for="fecha<?=$cont?>">Fecha</label>
												<input type="text" class="form-control estiloCampo form-control-sm checkclascongre datetimepicker" name="fecha<?=$cont?>" id="fecha<?=$cont?>" value="<?=datesqltodate($key["DURACION"])?>" >
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col bajito">
											<span class="linkAccione" onclick="eliminar('congreso',<?=$cont?>,<?=$key["ID"]?>)">ELIMINAR REGISTRO</span>
										</div>
									</div>
								</div>
								<?php $cont++; } }else{

									$contadorcongresos = 1;

									?>
									<div class="contentx row" id="congreso1" name="congreso" >
										<div class="col-3 mostrarpaneleducacion">
											<div class="row">
												<div class="col "> 
													<div class="contAjustar" style="width: 16em; height: 12em; margin: 8px 30px 0px -18px;">
														<div class="boxi" style="width: 16em; height: 12em;">
															<img id="imagencongreso1" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
														</div>
													</div>
												</div>
											</div>
											<div class="esteeducacion">

												<div class="row paneleducacion">
													<div class="col-2" onclick="mostrarImagen('','imagencongreso1','inputfilecongreso1','nombreimgcongreso1');" >
														<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > 
													</div>
													<div class="col">

													</div>

													<div class="col-1">

														<label  for="inputfilecongreso1">
															<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
														</label>
													</div> 
													<div class="col-1">
														<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >
													</div> 
												</div> 

												<div class="row paneleducacion"> 
													<div class="col">
														<span id="nombreimgcongreso1"></span>
													</div>

												</div> 
											</div>
											<input type="file" id="inputfilecongreso1" hidden=""  name="archivocucata1" onchange="previewcongreso(1);"  />
											<input type="text" name='inputcongreso1'  id="inputcongreso1" hidden="" value=""/>  
											<input type="text" name='idcongreso1'  id="idcongreso1" hidden="" value="0"/> 
											<input type="text" name='estensioncongreso1'  id="estensioncongreso1" hidden="" value="0"/> 
										</div>
										<div class="col-9">
											<div class="row">
												<div class="col-12">
													<div class="form-group">
														<label class="nombreCampo" for="nombrecongreso1">Nombre del Congreso</label>
														<input type="text" class="form-control estiloCampo form-control-sm checkclascongre" name="nombrecongreso1" id="nombrecongreso1"  >
													</div>
												</div> 
											</div> 
											<div class="row">

												<div class="col-3">
													<label class="nombreCampo" for="pais1">País</label>
													<input type="text" class="form-control estiloCampo form-control-sm checkclascongre " name="pais1" id="pais1" value="" >
												</div> 
												<div class="col-3">
													<label class="nombreCampo" for="estado1">Estado</label>
													<input type="text" class="form-control estiloCampo form-control-sm checkclascongre " name="estado1" id="estado1" value="" >
												</div> 
												<div class="col-3">
													<label class="nombreCampo" for="ciudad1">Ciudad</label>
													<input type="text" class="form-control estiloCampo form-control-sm checkclascongre " name="ciudad1" id="ciudad1" value="" >
												</div>
												<div class="col-3">
													<label class="nombreCampo" for="fecha1">Fecha</label>
													<input type="text" class="form-control estiloCampo form-control-sm checkclascongre datetimepicker" name="fecha1" id="fecha1" value="" >
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col bajito">
												<span class="linkAccione" onclick="eliminarcucata(1)">ELIMINAR REGISTRO</span>
											</div>
										</div>
									</div>

									<?php
								} ?>


							</div>

							<input type="text" id="contadorcongreso" name="contadorcongreso" hidden="" value="<?=$contadorcongresos?>">
						</form>
						<!------------------------------------------------- -->

					</div>
				</div>
				<!--congresos-->
				<input type="text" id="cambiodiplo"  hidden=""value="1">
				<input type="text" id="cambiocutaca" hidden="" value="1">
				<input type="text" id="cambiocongre"  hidden=""value="1">

			</div>

			<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"   aria-hidden="true"  >
				<div class="modal-dialog modal-dialog-centered " role="document">
					<div class="modal-content"> 
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalCenterTitle">Mensaje del sistema</h5> 
						</div>
						<div class="modal-body" id="mensajeconfirmacion">

						</div>
						<div class="modal-footer">
							<button type="button" class="btn  " id="botonconfirm" data-dismiss="modal"  style="color: white; background-color: #239dff">Aceptar</button> 
							<button type="button" class="btn  " id="botoncancelar" data-dismiss="modal" style="color: white; background-color: #239dff">Cancelar</button> 
						</div>
					</div>
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
							<button type="button" class="btn  "   data-dismiss="modal" style="color: white; background-color: #239dff">Aceptar</button> 
						</div>
					</div>
				</div>
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
				function tiene(valor,cual,boton) {
					if (valor == 1) {
						$("#"+cual).css("display","block")
						$("#"+boton).css("display","block")
					}if (valor == 2) {
						$("#"+cual).css("display","none")
						$("#"+boton).css("display","none")
					}
				}


				$('.checkclasdiplo').on("change", function(){

					$("#cambiodiplo").val(2);

				});
				$('.checkclascucata').on("change", function(){

					$("#cambiocutaca").val(2);

				});
				$('.checkclascongre ').on("change", function(){

					$("#cambiocongre").val(2);

				});
				$(window).on("change", function(){
					 var d = new Date();
  var n = d.getFullYear();
					for (var i = 1; i <= $("#contadorcutaca").val(); i++) {  
						if ($("#mes"+i).val() > 12) { 
							$("#mes"+i).val("")

						} 
						if ($("#ano"+i).val() > n) { 
							$("#ano"+i).val('')
							
						}

					}
					for (var i = 1; i <= $("#contadordiplomas").val(); i++) {  
						if ($("#generaciontermino"+i).val() > n) { 
							$("#generaciontermino"+i).val("")

						}  

					} 

				});   
				$(document).ready(function(){
					$('.numero').mask('000000'); 
					$('.mes').mask('00' ); 
					$('.ano').mask('0000'); 


				});
				$(window).on("mouseover", function(){
					$('.numero').mask('000000'); 
					$('.mes').mask('00' ); 
					$('.ano').mask('0000'); 
					$('.datetimepicker').mask('00/00/0000'); 
					$('.datetimepicker').datepicker({
						format: "dd/mm/yyyy",
						autoclose: true,
						todayHighlight: true,
						assumeNearbyYear: true
					});

				});

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

   $( document ).ready(function() {


   	var div = $('img[id^="imagendiplomado"]:last');
   	var divId = (div.prop("id").match(/\d+/g));
   	var num = parseInt(divId,10)+1;

   	for (var i = 1; i < num; i++) {

   		var nombre = $("#imagendiplomado"+i).attr("src");
		      //alert(nombre);
		      var name = nombre.split('.').pop();
		      //alert(name);
		      if(name == "pdf" || name == "PDF") {
		      	$("#imagendiplomado"+i).attr("src","<?=assetgeneral()?>/img/pdf.png");
		      }	

		  }
		});

   $( document ).ready(function() {

   	var div = $('img[id^="imagencutaca"]:last');
   	var divId = (div.prop("id").match(/\d+/g));
   	var num = parseInt(divId,10)+1;

   	for (var i = 1; i < num; i++) {

   		var nombre = $("#imagencutaca"+i).attr("src");
		      //alert(nombre);
		      var name = nombre.split('.').pop();
		      //alert(name);
		      if(name == "pdf" || name == "PDF") {
		      	$("#imagencutaca"+i).attr("src","<?=assetgeneral()?>/img/pdf.png");
		      }	

		  }
		});


   $( document ).ready(function() {

   	var div = $('img[id^="imagencongreso"]:last');
   	var divId = (div.prop("id").match(/\d+/g));
   	var num = parseInt(divId,10)+1;

   	for (var i = 1; i < num; i++) {

   		var nombre = $("#imagencongreso"+i).attr("src");
		      //alert(nombre);
		      var name = nombre.split('.').pop();
		      //alert(name);
		      if(name == "pdf" || name == "PDF") {
		      	$("#imagencongreso"+i).attr("src","<?=assetgeneral()?>/img/pdf.png");
		      }	

		  }
		});

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


  function eliminar(donde,cual,id) {
  	if (id != 0) {
  		$.ajax({ 
  			type: 'ajax',
  			method: 'post',
  			url: '<?=base_url('configuracion/educacioncontinua/eliminar')?>',
  			async: true, 
  			data: {id:id},
  			success: function(response){ 
  				if (response == 1) {
  					$('#alert').modal('show');
  					$("#mensajealerta").html("Se Eliminó Correctame, se actualizará la página para visualizar los cambios");
  					$("#alert").attr("onclick","recargapagina()");  
  				} 
  			},
  			error: function () {
  				alert('Hubo un error, intente mas tarde');
  			}
  		}) ;

  	}
  	else{

  		$("#"+donde+cual).remove();
  	}
  }
  function previewdiplomado(id) 
  {  
  	var fileInput = document.getElementById('inputfilediplomado'+id);  
  	var files = Array.from(fileInput.files);
  	files = files.map(file => file.name);
  	console.log(files);
  	$("#nombreimgdiplo"+id).html(files);

  	nombre = $("#nombreimgdiplo"+id).html().split('.').pop(); 
  	$("#imgextensiondiplo"+id).val(nombre); 

  	var reader = new FileReader();
  	reader.onload = function()
  	{

  		if(nombre == "pdf" || nombre == "pdf ") {
  			var output = document.getElementById('imagendiplomado'+id);
  			output.src = "<?=assetgeneral()?>/img/pdf.png";
  			$("#inpudiplomado"+id).val(reader.result);
  		}else {
  			var output = document.getElementById('imagendiplomado'+id);
  			output.src = reader.result;
  			$("#inpudiplomado"+id).val(reader.result);
  		}



  	}
  	reader.readAsDataURL(event.target.files[0]);

  }

  function previewcutaca(id) 
  {  
  	var fileInput = document.getElementById('inputfilecutaca'+id);  
  	var files = Array.from(fileInput.files);
  	files = files.map(file => file.name);
  	console.log(files);	
  	$("#nombrecutaca"+id).html(files);

  	nombre = $("#nombrecutaca"+id).html().split('.').pop(); 
  	$("#estensioncutaca"+id).val(nombre); 

  	var reader = new FileReader();
  	reader.onload = function()
  	{

  		if(nombre == "pdf" || nombre == "pdf ") {
  			var output = document.getElementById('imagencutaca'+id);
  			output.src = "<?=assetgeneral()?>/img/pdf.png";
  			$("#inputcucata"+id).val(reader.result);
  		}else {
  			var output = document.getElementById('imagencutaca'+id);
  			output.src = reader.result;
  			$("#inputcucata"+id).val(reader.result);
  		}

  	}
  	reader.readAsDataURL(event.target.files[0]);

  }

  function previewcongreso(id) 
  {  
  	var fileInput = document.getElementById('inputfilecongreso'+id);  
  	var files = Array.from(fileInput.files);
  	files = files.map(file => file.name);
  	console.log(files);	
  	$("#nombreimgcongreso"+id).html(files);

  	nombre = $("#nombreimgcongreso"+id).html().split('.').pop(); 
  	$("#estensioncongreso"+id).val(nombre); 

  	var reader = new FileReader();
  	reader.onload = function()
  	{

  		if(nombre == "pdf" || nombre == "pdf ") {
  			var output = document.getElementById('imagencongreso'+id);
  			output.src = "<?=assetgeneral()?>/img/pdf.png";
  			$("#inputcongreso"+id).val(reader.result);
  		}else {
  			var output = document.getElementById('imagencongreso'+id);
  			output.src = reader.result;
  			$("#inputcongreso"+id).val(reader.result);
  		}

  	}
  	reader.readAsDataURL(event.target.files[0]);

  }


  $(window).on("load", function(){

  	if ($("#diplomadoselect").val() == 1) {
  		$("#diplomadoselect option[value=2]").attr("disabled", "");
  	}
  	if ($("#cutacaselect").val() == 1) {
  		$("#cutacaselect option[value=2]").attr("disabled", "");
  	}
  	if ($("#congresoselect").val() == 1) {
  		$("#cutacaselect option[value=2]").attr("disabled", "");
  	} 
  });
  function editar() {

  	$(".estiloinput").removeClass('estiloinputred');
  	$(".estiloCampo").removeClass('estiloinputred');

  	var diploma = 0;
  	var cutaca =0;
  	var congre = 0;

  	if ($("#diplomadoselect").val() == 1) {
  		for (var i = 1; i <= $("#contadordiplomas").val(); i++) {
  			if ($("#nombreDiplomado"+i).val() == "") {
  				diploma = 1;
  				$("#nombreDiplomado"+i).addClass('estiloinputred')


  			}
  			if ($("#generaciontermino"+i).val() == "") {
  				diploma = 1;
  				$("#generaciontermino"+i).addClass('estiloinputred')

  			}
  			if ($("#institucion"+i).val() == "") {
  				diploma = 1;
  				$("#institucion"+i).addClass('estiloinputred')

  			}
  			if ($("#duracion"+i).val() == "") {
  				diploma = 1;
  				$("#duracion"+i).addClass('estiloinputred')

  			}
  			if ($("#inpudiplomado"+i).val() == "" && $("#iddiplomado"+i).val() == 0) { 
  				diploma = 1;
  				$('#alert').modal('show');
  				$("#mensajealerta").html("Favor de Subir Su Diploma");
  				return;
  			}


  		} 
  	}
  	if (diploma != 0) {

 		 //document.getElementById("contenedor1").scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
 		 document.getElementById("contenedor1").scrollIntoView({block: "end",  inline: "nearest"});
 		 setTimeout(function(){
 		 	$('#alert').modal('show');
 		 	$("#mensajealerta").html("Favor de Llenar los Campos de Diplomado Marcados");
 		 }, 500);

 		 return;

 		}
 		if ($("#cutacaselect").val() == 1) {
 			for (var i = 1; i <= $("#contadorcutaca").val(); i++) { 

 				if ($("#nombrecutacainput"+i).val() == "") { 
 					cutaca = 1;
 					$("#nombrecutacainput"+i).addClass('estiloinputred')


 				}
 				if ($("#duracionenhoras"+i).val() == "") {
 					cutaca = 1;
 					$("#duracionenhoras"+i).addClass('estiloinputred')

 				}
 				if ($("#institucioncutaca"+i).val() == "") {
 					cutaca = 1;
 					$("#institucioncutaca"+i).addClass('estiloinputred')

 				}
 				if ($("#mes"+i).val() == "") {
 					cutaca = 1;
 					$("#mes"+i).addClass('estiloinputred')

 				}
 				if ($("#ano"+i).val() == "") {
 					cutaca = 1;
 					$("#ano"+i).addClass('estiloinputred')

 				}

 				if ($("#inputcucata"+i).val() == "" && $("#idcucata"+i).val() == 0) {
 					cutaca = 1;
 					$('#alert').modal('show');
 					$("#mensajealerta").html("Favor de Subir el Certificado de su Curso, Taller o Capacitación");
 					return;
 				}

 			}
 		}
 		if (cutaca != 0) {

 			document.getElementById("contenedor2").scrollIntoView({block: "end",  inline: "nearest"}); 
 			setTimeout(function(){
 				$('#alert').modal('show');
 				$("#mensajealerta").html("Favor de Llenar los Campos de Cursos |Talleres | Capacitaciones Marcados");
 			}, 500);

 			return;

 		}
 		if ($("#congresoselect").val() == 1) {
 			for (var i = 1; i <= $("#contadorcongreso").val(); i++) {
 				if ($("#nombrecongreso"+i).val() == "") { 
 					congre = 1;
 					$("#nombrecongreso"+i).addClass('estiloinputred')


 				}
 				if ($("#fecha"+i).val() == "") {
 					congre = 1;
 					$("#fecha"+i).addClass('estiloinputred')

 				} 
 				if ($("#inputcongreso"+i).val() == "" && $("#idcongreso"+i).val() == 0) {

 					congre = 1;
 					$('#alert').modal('show');
 					$("#mensajealerta").html("Favor de Subir el Certificado del Congreso al que Asistió");
 					return;
 				}

 			}
 		}
 		if (congre != 0) {

 			document.getElementById("contenedor2").scrollIntoView({block: "end",  inline: "nearest"}); 
 			setTimeout(function(){
 				$('#alert').modal('show');
 				$("#mensajealerta").html("Favor de Llenar los Campos de Congresos Marcados");
 			}, 500);

 			return;

 		}
 		if (diploma == 0 && cutaca == 0 && congre == 0) {
 			editardiplomado()
 		}

 	}

 	function editardiplomado() {


 		var data  = $("#formdiplomado").serialize();
 		var url = $("#formdiplomado").attr('action');
 		$("#spiner").css("display","block");
 		$("#imagenguardar").css("display","none");

 		$.ajax({ 
 			type: 'ajax',
 			method: 'post',
 			url: url,
 			async: true, 
 			data: data,
 			success: function(response){ 
 				if (response == 1) {
 					editarcutaca(response);
 					return;
 				}
 				if (response == 2) {
 					editarcutaca(response);
 					return;
 				}
 				if (response == 9) {
 					editarcutaca(response);
 					return;
 				}
 				else{
 					alert('Algo esta pasando D:');
 				}
 			},
 			error: function () {
 				alert('Hubo un error, intente mas tarde');
 			}
 		}) ;


 	}
 	function editarcutaca(diplo) {


 		var data  = $("#formcutaca").serialize();
 		var url = $("#formcutaca").attr('action');

 		$.ajax({ 
 			type: 'ajax',
 			method: 'post',
 			url: url,
 			async: true, 
 			data: data,
 			success: function(response){ 
 				if (response == 1) {
 					editarcongreso(diplo,response); return;

 				}
 				if (response == 2) {
 					editarcongreso(diplo,response); return;
 				}
 				if (response == 9) {
 					editarcongreso(diplo,response); return;
 				}
 				else{
 					alert('Algo esta pasando D:');
 				}
 			},
 			error: function () {
 				alert('Hubo un error, intente mas tarde');
 			}
 		}) ;


 	}

 	function quitarImagen (idImagen,objetofile,input,direccionimagen) {
 		$("#"+idImagen).attr("src","<?=assetgeneral()?>/img/MAS.svg");

 		var $el = $('#'+objetofile); 
 		$el.wrap('<form>').closest('form').get(0).reset(); 
 		$el.unwrap();
 		$("#"+input).val("");

 		$.ajax({ 
 			type: 'ajax',
 			method: 'post',
 			url: url,
 			async: true, 
 			data: data,
 			success: function(response){ 
 				if (response == 1) {
 					$('#alert').modal('show');
 					$("#mensajealerta").html("Se Guardó Correctamente, se Actualizará la Página para Visualizar los Cambios");
 					$("#alert").attr("onclick","recargapagina()");  return;
 				}
 				if (response == 2) {
 					$('#alert').modal('show');
 					$("#mensajealerta").html("Se Guardó Correctamente, se Actualizará la Página para Visualizar los Cambios");
 					$("#alert").attr("onclick","recargapagina()");  return;
 				}
 				else{
 					alert('Algo esta pasando D:');
 				}
 			},
 			error: function () {
 				alert('Hubo un error, intente mas tarde');
 			}
 		}) ;

 	}


 	function editarcongreso(diplo,cuca) {


 		var data  = $("#formcongreso").serialize();
 		var url = $("#formcongreso").attr('action');

 		$.ajax({ 
 			type: 'ajax',
 			method: 'post',
 			url: url,
 			async: true, 
 			data: data,
 			success: function(response){ 
 				if (response == 1) {
 					resultado(diplo,cuca,response)
 					return;
 				}
 				if (response == 2) {
 					resultado(diplo,cuca,response)
 					return;
 				}

 				if (response == 9) {
 					resultado(diplo,cuca,response)
 					return;
 				}
 				else{
 					alert('Algo esta pasando D:');
 				}
 			},
 			error: function () {
 				alert('Hubo un error, intente mas tarde');
 			}
 		}) ;


 	}
 	function resultado(diplo,cuca,congre) {


 		if (diplo == 1 || diplo == 2 || cuca == 1 || cuca == 2 || congre == 1 || congre == 2 ) {
 			$('#alert').modal('show');
 			$("#mensajealerta").html("Se Guardó Correctamente, se actualizará la página para visualizar los cambios  ");
 			$("#alert").attr("onclick","recargapagina()");return;
 		} else{

 			$('#alert').modal('show');
 			$("#mensajealerta").html("Es Necesario Llenar Todos los Campos Para Registrar"); 
 			$("#spiner").css("display","none");
 			$("#imagenguardar").css("display","block");
 			return;
 		}




 	}
//onclick="mostrarImagen('','imagendiplomado1','inputfilediplomado1','nombreimgdiplo1');"

function agregarDiploma(){
	var zona = document.getElementById("contenedor1");
	var div = $('div[id^="diploma"]:last');

	var num  = parseInt( div.prop("id").match(/(\d+)/g), 10 ) +1;  
	var clondiv  = div.clone().prop('id', 'diploma'+num );
	var c= "'";

	var x = ' ';
	x+='		<div class="col-3 mostrarpaneleducacion">';
	x+='			<div class="row">';
	x+='				<div class="col "> ';
	x+='						<div class="contAjustar" style="width: 16em; height: 12em; margin: 8px 30px 0px -18px;">';
	x+='								<div class="boxi" style="width: 16em; height: 12em;">';
	x+='									<img id="imagendiplomado'+num+'" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> ';
	x+='								</div>';
	x+='						</div>';					
	x+='				</div>';
	x+='			</div>';
	x+='<div class="esteeducacion">';

	x+='			<div class="row paneleducacion">';
	x+='				<div class="col-2"'+ 'onclick="mostrarImagen('+ "''," + "'imagendiplomado"+num+"'," + "'inputfilediplomado"+num+"'," + "'nombreimgdiplo"+num+"'" + ');"' +'>';
	x+='					<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > ';
	x+='				</div>';
	x+='				<div class="col">';

	x+='				</div>'; 
	x+='				<div class="col-1">'; 
	x+='					<label  for="inputfilediplomado'+num+'">';
	x+='						<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >';
	x+='					</label>';
	x+='				</div> ';
	x+='				<div class="col-1">';
	x+='					<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >';
	x+='				</div> ';
	x+='			</div> ';

	x+='			<div class="row paneleducacion">'; 
	x+='				<div class="col">';
	x+=					'<span id="nombreimgdiplo'+num+'"></span>'; 
	x+='				</div>';  
	x+='			</div> ';
	x+='</div>';
	x+='			<input type="file" class="checkclasdiplo" id="inputfilediplomado'+num+'" hidden=""  name="archivo'+num+'" onchange="previewdiplomado('+num+');"  />';
	x+='			<input type="text" name="inpudiplomado'+num+'"  id="inpudiplomado'+num+'" hidden="" value=""/>  ';
	x+='			<input type="text" name="iddiplomado'+num+'"  id="iddiplomado'+num+'" hidden="" value="0"/>'; 
	x+=				'<input type="text" name="imgextensiondiplo'+num+'"  id="imgextensiondiplo'+num+'" hidden="" value=""/>'
	x+='		</div>';
	x+='		<div class="col-9">';
	x+='			<div class="row">';
	x+='				<div class="col-9">';
	x+='					<div class="form-group">';
	x+='						<label class="nombreCampo" for="nombreDiplomado'+num+'">Nombre del diplomado</label>';
	x+='						<input type="text" class="form-control estiloCampo form-control-sm" name="nombreDiplomado'+num+'" id="nombreDiplomado'+num+'"  >';
	x+='					</div>';
	x+='				</div>';
	/*  x+='				<div class="col-3">';
		x+='					<div class="form-group">';
		x+='						<label class="nombreCampo" for="generacioninicio'+num+'">Generacion Inicio</label>';
		x+='						<input type="text" class="form-control estiloCampo form-control-sm numero" name="generacioninicio'+num+'" id="generacioninicio'+num+'"  >';
		x+='					</div>';
		x+='				</div>'; */
		x+='				<div class="col-3">';
		x+='					<div class="form-group">';
		x+='						<label class="nombreCampo" for="generaciontermino'+num+'">Generación</label>';
		x+='						<input type="text" class="form-control estiloCampo form-control-sm numero" name="generaciontermino'+num+'" id="generaciontermino'+num+'"  >';
		x+='					</div>';
		x+='				</div>';
		x+='			</div>';
		x+='			<div class="row mb-2">';
		x+='				<div class="col-9">';
		x+='					<div class="form-group">';
		x+='						<label class="nombreCampo" for="institucion'+num+'">Institucion</label>';
		x+='						<input type="text" class="form-control estiloCampo form-control-sm" name="institucion'+num+'" id="institucion'+num+'"  >';
		x+='					</div>';
		x+='				</div>';
		x+='				<div class="col-3">';
		x+='					<div class="form-group">';
		x+='						<label class="nombreCampo" for="duracion'+num+'">Duración</label>';
		x+='						<input type="text" class="form-control estiloCampo form-control-sm " maxlength="30" name="duracion'+num+'" id="duracion'+num+'"  >';
		x+='					</div>';
		x+='				</div>';
		x+='			</div>';
		x+='			<div class="row">'; 
		x+='				<div class="col-4">';
		x+='					<label class="nombreCampo" for="pais'+num+'">Pais</label>';
		x+='					<input type="text" class="form-control estiloCampo form-control-sm " name="pais'+num+'" id="pais'+num+'" value="" >';
		x+='				</div>'; 
		x+='				<div class="col-4">';
		x+='					<label class="nombreCampo" for="estado'+num+'">Estado</label>';
		x+='					<input type="text" class="form-control estiloCampo form-control-sm " name="estado'+num+'" id="estado'+num+'" value="" >';
		x+='				</div>'; 
		x+='				<div class="col-4">';
		x+='					<label class="nombreCampo" for="ciudad'+num+'">Ciudad</label>';
		x+='					<input type="text" class="form-control estiloCampo form-control-sm " name="ciudad'+num+'" id="ciudad'+num+'" value="" >';
		x+='				</div>';
		x+='			</div>';
		x+='		</div>';
		x+='		<div class="row">';
		x+='			<div class="col bajito">';
		x+='				<span class="linkAccione" onclick="eliminar('+c+'diploma'+c+','+num+',0)">ELIMINAR DIPLOMADO</span>';
		x+='			</div>';
		x+='		</div>';
		x+='	 ';

			//aqui es donde le dices donde vas a poner el clon
			clondiv.appendTo(zona) ;
			 //lo vacias el div con los elementos dentro
			 $( "#diploma"+num).empty();
			 //insertas el string en el html
			 $( "#diploma"+num).html(x);
			 console.log(num);
			 $("#contadordiplomas").val(num);
			}


//								<div class="col-2" onclick="mostrarImagen('','imagencutaca1','inputfilecutaca1','nombrecutaca1');"> 

function agregarCTCS () {
	var zona = document.getElementById("contenedor2");
	var div = $('div[id^="cucataca"]:last');
	var divId = (div.prop("id").match(/\d+/g));
	var num = parseInt(divId,10)+1;
	var clondiv  = div.clone().prop('id', 'cucataca'+num );
	var c= "'";

	var x=						'<div class="col-3 mostrarpaneleducacion">';
	x+=							'<div class="row">';
	x+=								'<div class="col "> ';
	x+='									<div class="contAjustar" style="width: 16em; height: 12em; margin: 8px 30px 0px -18px;">';
	x+='						<div class="boxi" style="width: 16em; height: 12em;">';
	x+=									'<img id="imagencutaca'+num+'" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> </div> </div>';
	x+=								'</div>';
	x+=							'</div>';
	x+='<div class="esteeducacion">';

	x+=							'<div class="row paneleducacion">';
	x+=								'<div class="col-2"'+ 'onclick="mostrarImagen('+ "''," + "'imagencutaca"+num+"'," + "'inputfilecutaca"+num+"'," + "'nombrecutaca"+num+"'" + ');"' +'> ';
	x+=									'<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > ';
	x+=								'</div>';
	x+=								'<div class="col">'; 
	x+=								'</div>'; 
	x+=								'<div class="col-1">'; 
	x+=									'<label  for="inputfilecutaca'+num+'">';
	x+=										'<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >';
	x+=									'</label>';
	x+=								'</div> ';
	x+=								'<div class="col-1">';
	x+=									'<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >';
	x+=								'</div> ';
	x+=							'</div> ';

	x+=							'<div class="row paneleducacion">'; 
	x+=								'<div class="col">';
	x+= 						'<span id="nombrecutaca'+num+'"></span>';
	x+=								'</div>';  
	x+=							'</div> ';
	x+='</div>';
	x+=				'<input type="file" id="inputfilecutaca'+num+'" hidden=""  name="archivocucata'+num+'" onchange="previewcutaca('+num+');"  />';
	x+=							'<input type="text" name="inputcucata'+num+'"  id="inputcucata'+num+'" hidden="" value=""/>  ';
	x+=							'<input type="text" name="idcucata'+num+'"  id="idcucata'+num+'" hidden="" value="0"/> ';
	x+=							'<input type="text" name="estensioncutaca'+num+'"  id="estensioncutaca'+num+'" hidden="" value="0"/>  ';
	x+=						'</div>';
	x+=						'<div class="col-9">';
	x+=							'<div class="row">';
	x+=								'<div class="col-5">';
	x+=									'<div class="form-group">';
	x+=										'<label class="nombreCampo" for="nombreDiplomado'+num+'">Nombre del diplomado</label>';
	x+='<input type="text" class="form-control estiloCampo form-control-sm checkclascucata" name="nombreDiplomado'+num+'" id="nombrecutaca'+num+'"  >';
	x+=									'</div>';
	x+=								'</div>';
	x+=									'<div class="col-4">';
	x+=									'<div class="form-group">';
	x+=									'<label class="nombreCampo" for="tipo'+num+'">Tipo del diplomado</label>';
	x+=									'<select class="form-control form-control-sm estiloCampo" name="tipo'+num+'" id="tipo'+num+'">';
	x+=									'<option value="2" >Curso</option>';
	x+=									'<option value="3" >Taller</option>';
	x+=									'<option value="4" >Capacitacion</option>';
	x+=									'</select>';
	x+=									'</div>';
	x+=									'</div>';
	x+=								'<div class="col-3">';
	x+=									'<div class="form-group">';
	x+=										'<label class="nombreCampo" for="duracionenhoras'+num+'">Duración en horas</label>';
	x+='<input type="text" class="form-control estiloCampo form-control-sm checkclascucata numero" name="duracionenhoras'+num+'" id="duracionenhoras'+num+'"  >';
	x+=									'</div>';
	x+=								'</div>';
	x+=							'</div>';
	x+=							'<div class="row mb-2">';
	x+=								'<div class="col-8">';
	x+=									'<div class="form-group">';
	x+=										'<label class="nombreCampo" for="institucion'+num+'">Institucion</label>';
	x+='<input type="text" class="form-control estiloCampo form-control-sm checkclascucata" name="institucion'+num+'" id="institucioncutaca'+num+'"  >';
	x+=									'</div>';
	x+=								'</div>';
	x+=								'<div class="col-2">';
	x+=									'<div class="form-group">';
	x+=										'<label class="nombreCampo" for="mes'+num+'">Mes</label>'; 
    x+=				'<select class="form-control form-control-sm estiloCampo" name="mes'+num+'" id="mes'+num+'" >';
    x+=                        '<option value="1"  > Enero</option>';
    x+=                        '<option value="2"  > Febrero</option>';
    x+=                        '<option value="3"  > Marzo</option>';
    x+=                        '<option value="4"  > Abril</option>';
    x+=                        '<option value="5"  > Mayo</option>';
    x+=                        '<option value="6"  > Junio</option>';
    x+=                        '<option value="7"  > Julio</option>';
    x+=                        '<option value="8"  > Agosto</option>';
    x+=                        '<option value="9"  > SEptiembre</option>';
    x+=                        '<option value="10" > Octubre</option>';
    x+=                        '<option value="11" > Noviembre</option>';
    x+=                        '<option value="12" > Diciembre</option>';
    x+=                     '</select> ';
	x+=									'</div>';
	x+=								'</div>';
	x+=								'<div class="col-2">';
	x+=									'<div class="form-group">';
	x+=										'<label class="nombreCampo" for="ano'+num+'">Año</label>';
	x+=										'<input type="text" class="form-control estiloCampo form-control-sm checkclascucata ano" name="ano'+num+'" id="ano'+num+'"  >';
	x+=									'</div>';
	x+=								'</div>';
	x+=							'</div>';
	x+=							'<div class="row">'; 
	x+=								'<div class="col-4">';
	x+=									'<label class="nombreCampo" for="pais'+num+'">Pais</label>';
	x+=	 '<input type="text" class="form-control estiloCampo form-control-sm checkclascucata " name="pais'+num+'" id="pais'+num+'" value="" >';
	x+=								'</div> ';
	x+=								'<div class="col-4">';
	x+=									'<label class="nombreCampo" for="estado'+num+'">Estado</label>';
	x+='<input type="text" class="form-control estiloCampo form-control-sm checkclascucata " name="estado'+num+'" id="estado'+num+'" value="" >';
	x+=								'</div> ';
	x+=								'<div class="col-4">';
	x+=									'<label class="nombreCampo" for="ciudad'+num+'">Ciudad</label>';
	x+='<input type="text" class="form-control estiloCampo form-control-sm checkclascucata " name="ciudad'+num+'" id="ciudad'+num+'" value="" >';
	x+=								'</div>';
	x+=							'</div>';
	x+=						'</div>';
	x+=						'<div class="row">';
	x+=							'<div class="col bajito">';
	x+=								'<span class="linkAccione" onclick="eliminar('+c+'cucataca'+c+','+num+',0)">ELIMINAR REGISTRO</span>';
	x+=							'</div>';
	x+=						'</div>';


				//aqui es donde le dices donde vas a poner el clon
				clondiv.appendTo(zona) ;
				 //lo vacias el div con los elementos dentro
				 $( "#cucataca"+num).empty();
				 //insertas el string en el html
				 $( "#cucataca"+num).html(x);
				 $( "#contadorcutaca").val(num);

				}
//								<div class="col-2" onclick="mostrarImagen('','imagencongreso1','inputfilecongreso1','nombreimgcongreso1');" >

function agregarCongreso () {
	var zona = document.getElementById("contenedor3");
	var div = $('div[id^="congreso"]:last');
	var divId = (div.prop("id").match(/\d+/g));
	var num = parseInt(divId,10)+1;
	var clondiv  = div.clone().prop('id', 'congreso'+num );
	var c= "'";


	var x= '						<div class="col-3 mostrarpaneleducacion">';
	x+= '							<div class="row">';
	x+= '								<div class="col "> ';
	x+='										<div class="contAjustar" style="width: 16em; height: 12em; margin: 8px 30px 0px -18px;">';
	x+='					<div class="boxi" style="width: 16em; height: 12em;">';
	x+= '									<img id="imagencongreso'+num+'" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"></div></div> ';
	x+= '								</div>';
	x+= '							</div>';
	x+='<div class="esteeducacion">';

	x+= '							<div class="row paneleducacion">';
	x+= '								<div class="col-2"'+ 'onclick="mostrarImagen('+ "''," + "'imagencongreso"+num+"'," + "'inputfilecongreso"+num+"'," + "'nombreimgcongreso"+num+"'" + ');"' +'> ';
	x+= '									<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > ';
	x+= '								</div>';
	x+= '								<div class="col">'; 
	x+= '								</div>' ;
	x+= '								<div class="col-1">' ;
	x+= '									<label  for="inputfilecongreso'+num+'">';
	x+= '										<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >';
	x+= '									</label>';
	x+= '								</div> ';
	x+= '								<div class="col-1">';
	x+= '									<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >';
	x+= '								</div> ';
	x+= '							</div> ';
	x+= '							<div class="row paneleducacion">'; 
	x+= '								<div class="col">';
	x+=								'<span id="nombreimgcongreso'+num+'"></span>';
	x+= '								</div>' ; 
	x+= '							</div> ';
	x+='</div>';
	x+= '		 <input type="file" id="inputfilecongreso'+num+'" hidden=""  name="archivocongreso'+num+'" onchange="previewcongreso('+num+');"  />';
	x+= '							<input type="text" name="inputcongreso'+num+'"  id="inputcongreso'+num+'" hidden="" value=""/>  ';
	x+= '							<input type="text" name="idcongreso'+num+'"  id="idcongreso'+num+'" hidden="" value="0"/> ';
	x+= '	<input type="text" name="estensioncongreso'+num+'"  id="estensioncongreso'+num+'" hidden="" value="0"/>  ';
	x+= '						</div>';
	x+= '						<div class="col-9">';
	x+= '							<div class="row">';
	x+= '								<div class="col-12">';
	x+= '									<div class="form-group">';
	x+= '										<label class="nombreCampo" for="nombrecongreso'+num+'">Nombre del Congreso</label>';
	x+= '					 <input type="text" class="form-control estiloCampo form-control-sm checkclascongre" name="nombrecongreso'+num+'" id="nombrecongreso'+num+'"  >';
	x+= '									</div>';
	x+= '								</div> ';
	x+= '							</div> ';
	x+= '							<div class="row">';

	x+= '								<div class="col-3">';
	x+= '									<label class="nombreCampo" for="pais'+num+'">Pais</label>';
	x+= '									<input type="text" class="form-control estiloCampo form-control-sm checkclascongre " name="pais'+num+'" id="pais'+num+'" value="" >';
	x+= '								</div> ';
	x+= '								<div class="col-3">';
	x+= '									<label class="nombreCampo" for="estado'+num+'">Estado</label>';
	x+= '								<input type="text" class="form-control estiloCampo form-control-sm checkclascongre " name="estado'+num+'" id="estado'+num+'" value="" >';
	x+= '								</div> ';
	x+= '								<div class="col-3">';
	x+= '									<label class="nombreCampo" for="ciudad'+num+'">Ciudad</label>';
	x+= '								<input type="text" class="form-control estiloCampo form-control-sm checkclascongre " name="ciudad'+num+'" id="ciudad'+num+'" value="" >';
	x+= '								</div>';
	x+= '								<div class="col-3">';
	x+= '									<label class="nombreCampo" for="fecha'+num+'">Fecha</label>';
	x+= '									<input type="text" class="form-control estiloCampo form-control-sm checkclascongre datetimepicker" name="fecha'+num+'" id="fecha'+num+'" value="" >';
	x+= '								</div>';
	x+= '							</div>';
	x+= '						</div>';
	x+= '						<div class="row">';
	x+= '							<div class="col bajito">';
	x+= '								<span class="linkAccione" onclick="eliminar('+c+'congreso'+c+','+num+',0)">ELIMINAR REGISTRO</span>';
	x+= '							</div>';
	x+= '						</div>';


				//aqui es donde le dices donde vas a poner el clon
				clondiv.appendTo(zona) ;
				 //lo vacias el div con los elementos dentro
				 $( "#congreso"+num).empty();
				 //insertas el string en el html
				 $( "#congreso"+num).html(x);
				 $( "#contadorcongreso").val(num);
				}



				function eliminarDiploma(id) {
					if (id != 1) {
						$("#diploma"+id).remove();
					}
				}
				function eliminarcucata(id) {
					if (id != 1) {
						$("#cucataca"+id).remove();
					}
				}
				function eliminarcongreso(id) {
					if (id != 1) {
						$("#congreso"+id).remove();
					}
				}
				function recargapagina() {
					location.href = "<?=base_url('/configuracion/educacioncontinua')?>";
				}

			</script>


			<script type="text/javascript">
/*	$(document).ready(function() {
		var tamañoPagina=2;
		var objNumero = $(".contentx").length;
		var currentPage = 1;
		
		var nav = '';
		var totalPaginas = Math.ceil(objNumero/tamañoPagina);
		for(var i =0; i<totalPaginas;i++){
			nav += '<li class="numeros page-item"><a class="page-link">'+(i+1)+'</a></li>';
		}
		$(".pag_prev").after(nav);
		$(".numeros").first().addClass("active");
		//----------------------------------------------------------
		showPage = function() {
			$(".contentx").each(function(n){
				if ( n <= (tamañoPagina*currentPage) && n > (tamañoPagina*(currentPage-1)) ) {
					$(this).show();
				}else {
					$(this).hide();
				}
			});
		}
		showPage();

		$(".pagination li.numeros").click(function() {
			$(".pagination li").removeClass("active");
			$(this).addClass("active");
			currentPage = parseInt($(this).text());
			showPage();
		});
	});


	*/
</script>