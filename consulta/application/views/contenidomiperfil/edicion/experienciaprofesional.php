<div id="contenidocambiante" data-id="1">
	<div class="editarflotante"> 
		<button type="button" class="botoneditaredicion" onclick="recargapagina()">
			<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/RESTAURAR.svg"> 
		</button> 
		<button type="button" class="botoneditaredicion"   onclick="editar()">
			<div id="spiner" style="display: none;">
				<div class="spinner-border text-light"  role="status" >
					<span class="sr-only">Loading...</span>
				</div>
			</div>
			<img id="imagenguardar" src="<?=assetmiperfil()?>/img/ICONOS/SVG/GUARDAR.svg" >
		</button>  
	<!--	<button type="button" class="botoneditaredicion" onclick="eliminarexperiencia()">
			<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELIMINAR.svg"> !-->
		</button>
	</div> 
	<div class="row ">
		<div class="col">
			<div class="box "   >
				<div class="box-header ">
					<div class="row">
						<div class="col-sm-4 col-xl-2 letratituloedicion">
							<span> Datos Generales </span>
						</div> 
						<div class="col-sm-8 col-xl-10 lineainferiorosita">

						</div> 
					</div>
				</div>

				<div class="box-body"  >
					<form id="formexpeciencia" action="<?=base_url('configuracion/experienciaprofesional/edicion')?>">	
						<div class="row">
							<div class="col-4" hidden="">
								<div class="form-group">
									<label class="labelsform" for="totalexperienciaslaborales">Total de Experiencias Laborales</label>
									<input type="number" id="contador" value="<?=$datos['contador'][1]?>"  >
									<input type="number" class="clascheckcambio form-control form-control-sm text-center estiloinput " onchange="limitador($(this).val(),$('#contador').val())" name="totalexperienciaslaborales" id="totalexperienciaslaborales" value="<?=$datos['contador'][1]?>"   min="1" max="20"  >
								</div>
							</div>  
							<div class="col-6" style="">
								<div class="form-group">

									<label class="labelsform" for="estatuslaboralactual">Estatus Laboral Actual</label>
									<select class="clascheckcambio form-control form-control-sm estiloinput text-center" name="estatuslaboralactual" id="estatuslaboralactual">
										<option value="1"<?php if ($datos['datosinformacion'][0]["ESTATUS_LABORAL"]== 1) {	echo "selected"; }?> >Sin trabajo</option>
										<option value="2"<?php if ($datos['datosinformacion'][0]["ESTATUS_LABORAL"]== 2) {	echo "selected"; }?> >Primer empleo</option> 
										<option value="3"<?php if ($datos['datosinformacion'][0]["ESTATUS_LABORAL"]== 3) {	echo "selected"; }?> >Trabajando</option> 
									</select>
								</div>
							</div> 
							<div class="col-6">
								<div class="form-group">
									<label class="labelsform" for="disponibilidadviaje">Disponibilidad para Viajar por Trabajo</label>
									<select class="clascheckcambio form-control form-control-sm estiloinput text-center" name="disponibilidadviaje" id="disponibilidadviaje">
										<option value="1" <?php if ($datos['datosinformacion'][0]["DISPONIBILIDAD_VIAJE"]== 1) {	echo "selected"; }?>>Sí</option>
										<option value="2" <?php if ($datos['datosinformacion'][0]["DISPONIBILIDAD_VIAJE"]== 2) {	echo "selected"; }?>>No</option> 
									</select>
								</div>
							</div>   
						</div>
						<!-- row1 -->
						<div class="row">
							<div class="col-sm-4 col-xl-3 letratituloedicion">
								<span> Datos de Uniforme </span>
							</div> 
							<div class="col-sm-8 col-xl-9 lineainferiorosita">

							</div> 
						</div>
						<!-- row2 -->
						<div class="row">

							<div class="col-4">
								<div class="form-group">
									<label class="labelsform" for="tallafilipina">Talla de Filipina</label>
									<input type="text" class="clascheckcambio form-control form-control-sm text-center estiloinput" name="tallafilipina" id="tallafilipina" maxlength="10" value="<?=$datos['datosinformacion'][0]["TALLA_FILIPINA"]?>" >
								</div>
							</div>  
							<div class="col-4">
								<div class="form-group">
									<label class="labelsform" for="tallapatalon">Talla de Pantalón</label>
									<input type="text" class="clascheckcambio form-control form-control-sm text-center estiloinput" name="tallapatalon" id="tallapatalon"maxlength="10"  value="<?=$datos['datosinformacion'][0]["TALLA_PANGTALON"]?>" >
								</div>
							</div> 
							<div class="col-4">
								<div class="form-group">
									<label class="labelsform" for="tallazapatos">Talla de Zapatos</label>
									<input type="text" class="clascheckcambio form-control form-control-sm text-center estiloinput" name="tallazapatos" id="tallazapatos" maxlength="10" value="<?=$datos['datosinformacion'][0]["TALLA_ZAPATOS"]?>" >
								</div>
							</div>  

						</div>
					</form>

				</div>
				<form id="formespecialidades" action="<?=base_url('configuracion/experienciaprofesional/agregarespecialidades')?>">	
					<div class="row">
						<div class="col-sm-6 col-xl-4 letratituloedicion">
							<span> Especialidades Gastronómicas </span>
						</div> 
						<div class="col-sm-6 col-xl-8 lineainferiorosita">

						</div> 
					</div>
					<div class="box-body"  >
						<div class="row  especialidadgastronimcarow	">
							<div class="col-10  ">
								<span>Total de Especialidades </span><span><?=$datos['contador'][2]?></span>
							</div>  
							<div class="col-2 " >
								<input type="text" class="form-control form-control-sm estiloinput" id="otraespecialidad"   placeholder="Agregar otra especialidad" hidden=""> <span onclick="agregaelementoespecialidad()" style="color: green; border-bottom: 1px solid green; font-weight: 700">AGREGAR</span>
							</div> 
						</div>
						<div class="row" id="especialidades">
							<?php if (empty($datos['especialidades'])){ ?>
								<div class="col-4 mb-3 alineandoespecialidad"  id="iddivespecialidades1"> 
									<input type="text" class="form-control form-control-sm estiloinput" name="otraespecialidad1" id="otraespecialidad1"   placeholder="Otra Especialidad" style="display: none;">
									<select class="form-control form-control-sm estiloinput  selectespci" onchange="cambioselect($(this).val(),$('#ideliminarespecialidad1').data('id'))" name="especialidad1" id="idespecialidad1">
										<option value='17'> Almacén de A&B</option>
										<option value='12'> Arte en azúcar</option> 
										<option value='13'> Barismo </option>
										<option value='15'> Bartender</option>
										<option value='5'> Chocolatería </option>
										<option value='1'> Cocina Caliente</option>
										<option value='2'> Cocina Fría</option>
										<option value='10'> Confitería</option>
										<option value='16'> Control de Costos</option>
										<option value='11'> Decoración cake en fondant</option>
										<option value='9'> Galletería</option>
										<option value='18'> Gerencia</option>
										<option value='8'> Heladería</option>
										<option value='4'> Panadería </option>
										<option value='6'> Pastelería fría</option>
										<option value='7'> Pastelería salada</option>
										<option value='3'> Repostería </option>
										<option value='14'> Servicio</option>
										<option value='19'> Otra especifique</option>
									</select> 

									<input type="number" name="inputid1" value="0" id="inputid1" hidden="">
									<span class="menosspan" onclick="eliminarespecialidad($(this).data('id'))" id="ideliminarespecialidad1" data-id="1" style="margin: 5px 0px 0px 10px; background: transparent;"><img src="<?=assetgeneral()?>/img/delete.png" style="max-height: 26px;"></span>
								</div>  
							<?php } else { echo $datos['especialidades']; } ?>
						</div>
						<!-- row1 -->

					</div>
					<input type="text"  id="contadorespecialidadesconfirm" hidden="" value="<?php if (!empty($datos['contador'][0])){echo $datos['contador'][0]; }else {echo 1; }?>"   >
					<input type="text" name="contadorespecialidades" id="contadorespecialidades" hidden="" value="<?php if (!empty($datos['contador'][0])){echo $datos['contador'][0]; }else {echo 1; }?>"   >
				</form>
			</div>
		</div>
	</div>
	<div class="row ">
		<div class="col">
			<div class="box ">
				<div class="box-header  ">
					<div class="row">
						<div class="col-sm-3 col-xl-4 letratituloedicion"  >
							<span>Experiencias Profesionales</span>
						</div> 
						<div class="col-sm-9 col-xl-8 lineainferiorosita">

						</div> 
					</div>

				</div>

				<div class="box-body"  >

					<div class="row" id="contenttabsexperiencias">

						<div class="col-12">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item"> 
									<a class="nav-link " id=" " data-toggle="tab" href=" " role="tab" aria-controls=" " onclick="menosexp()" aria-selected="true">-</a>
								</li>
								<?php
								if ($datos['contador'][1] == 0) {
									$esto =1;
								}
								else{$esto = $datos['contador'][1];}  for ($tabs=1; $tabs <= $esto ; $tabs++) {   
									?>  
									<li class="nav-item" id="li<?=$tabs?>"> 
										<a class="nav-link <?php if ($tabs == 1){ echo "  active"; }?>" id="experiencia<?=$tabs?>-tab" data-toggle="tab" href="#experiencia<?=$tabs?>" role="tab" aria-controls="experiencia<?=$tabs?>" onclick="checacambio(<?=$tabs?>)" aria-selected="true"><?=$tabs?></a>
									</li>
									<?php
								}   ?>  
								<li class="nav-item"> 
									<a class="nav-link " id="masexp" data-toggle="tab" href=" " role="tab" aria-controls=" " onclick="masexp()" aria-selected="true">+</a>
								</li>
							</ul>
							<div class="tab-content" id="myTabContent">
								<?php for ($tabs=1; $tabs <=20 ; $tabs++) { ?>
									<div class="tab-pane fade <?php if ($tabs == 1){ echo "show active"; }?>" id="experiencia<?=$tabs?>" role="tabpanel" aria-labelledby="experiencia<?=$tabs?>-tab">
										<div class="row">

											<div class="col">
												<div class="row">
													<div class="col-11">
														<h4 class="titulosenexperencia">Datos de la Empresa</h4>
													</div> 
												</div>
												<form id="formexpeciencias<?=$tabs?>" data-id="<?=$tabs?>" action="<?=base_url('configuracion/experienciaprofesional/edicionexperiencia')?>"> 
													<div class="row">
														<div class="col-6">
															<div class="form-group">

																<input type="text" name="idexperiencia" id="idexperiencias<?=$tabs?>" hidden="" value="<?php if(!empty($datos['datosexperiencias'][($tabs-1)]["ID"])){ echo $datos['datosexperiencias'][($tabs-1)]["ID"];}else{echo 0 ;} ?>">

																<label class="labelsform" for="compañia<?=$tabs?>">Empresa</label>

																<select class="form-control estiloCampo form-control-sm"class="form-control estiloCampo form-control-sm" onchange="consultaempresas($(this).val(),<?=$tabs?>)" name="compania" id="compania<?=$tabs?>">
																	<option>Seleccione Empresa</option>
																	<?php foreach ($datos['datosempresas'] as $key) {
																		?>  
																		<option value="<?=$key["ID"]?>" <?php if (!empty($datos['datosexperiencias'][($tabs-1)]["COMPANIA"])) {if($key["NOMBRE"] === $datos['datosexperiencias'][($tabs-1)]["COMPANIA"]){echo "selected";}}?> ><?=$key["NOMBRE"]?></option>
																		<?php
																	}?>


																</select>
															</div>
														</div>
														<div class="col-4">
															<div class="form-group">
																<label class="labelsform" for="telefonoempresa<?=$tabs?>">Teléfono de la Empresa</label>
																<input type="text" class="form-control estiloCampo form-control-sm phone_with_ddd" name="" id="telefonoempresa<?=$tabs?>" value="<?php if(!empty($datos['datosexperiencias'][($tabs-1)]["TELEFONO_EMPRESA"])){ echo $datos['datosexperiencias'][($tabs-1)]["TELEFONO_EMPRESA"];}?>" readonly="" >
															</div>
														</div>
														<div class="col-2">
															<div class="form-group">
																<label class="labelsform" for="extension<?=$tabs?>">Extensión</label>
																<input type="text" class="form-control estiloCampo form-control-sm" name="" id="extension<?=$tabs?>"  value="<?php if(!empty($datos['datosexperiencias'][($tabs-1)]["EXTENCION_EMPRESA"])){ echo $datos['datosexperiencias'][($tabs-1)]["EXTENCION_EMPRESA"];}?>" readonly="">
															</div>
														</div>
													</div >
													<div class="row">
														<div class="col-sm-4 col-xl-2">
															<div class="form-group">
																<label class="labelsform" for="paiesmpresa<?=$tabs?>">País</label>
																<input type="text" class="form-control estiloCampo form-control-sm" name="" id="paiesmpresa<?=$tabs?>" value="<?php if(!empty($datos['datosexperiencias'][($tabs-1)]["PAIS"])){ echo $datos['datosexperiencias'][($tabs-1)]["PAIS"];}?>" readonly="" >
															</div>
														</div>
														<div class="col-sm-4 col-xl-2">
															<div class="form-group">
																<label class="labelsform" for="estadoempresa<?=$tabs?>">Estado</label>
																<input type="text" class="form-control estiloCampo form-control-sm" name="" id="estadoempresa<?=$tabs?>" value="<?php if(!empty($datos['datosexperiencias'][($tabs-1)]["ESTADO"])){ echo $datos['datosexperiencias'][($tabs-1)]["ESTADO"];}?>" readonly="" >
															</div>
														</div>
														<div class="col-sm-4 col-xl-2">
															<div class="form-group">
																<label class="labelsform" for="ciudadempresa<?=$tabs?>">Ciudad</label>
																<input type="text" class="form-control estiloCampo form-control-sm" name="" id="ciudadempresa<?=$tabs?>" value="<?php if(!empty($datos['datosexperiencias'][($tabs-1)]["CIUDAD"])){ echo $datos['datosexperiencias'][($tabs-1)]["CIUDAD"];}?>" readonly="" >
															</div>
														</div>
														<div class="col-sm-12 col-xl-6">
															<div class="form-group">
																<label class="labelsform" for="cargo">Cargo Desempeñado</label>
																<input type="text" class="form-control estiloCampo form-control-sm" name="cargo" id="cargo<?=$tabs?>" value="<?php if(!empty($datos['datosexperiencias'][($tabs-1)]["CARGO"])){ echo $datos['datosexperiencias'][($tabs-1)]["CARGO"];}?>"  maxlength="30">
															</div>
														</div>
													</div> 
													<div class="row pb-3"  >
														<div class="col-9">	<label class="nombresubtituloGris" for="compañia1">Imágenes del Lugar</label>
															<div class="table-responsive">

																<ul class="list-group list-group-horizontal" id="zona2a<?=$tabs?>">
																	<div class="d-flex align-items-center">
																		
																		<div class="spinner-border text-danger" style="width: 5rem; height: 5rem; font-size: 30px" role="status"></div>
																	</div>
																</ul>
															</div>
														</div>
														<div class="col-3">
															<label class="nombresubtituloGris" for="compañia1">Certificado Laboral</label> 

															<input type="file" id="upload_file<?=$tabs?>" hidden="" name="archivo" onchange="preview_image(<?=$tabs?>);" accept=".jpg,.pdf,.png,.jpeg"/>
															<input type="text" name='imagen' hidden="" id="img<?=$tabs?>" value=""/> 
															<input type="text"   hidden="" id="imgc<?=$tabs?>" value="<?php if(!empty($datos['datosexperiencias'][($tabs-1)]["DIR_IMAGEN"])){ echo $datos['datosexperiencias'][($tabs-1)]["DIR_IMAGEN"];}?>"/>

															<input type="text" name='estension' hidden="" id="imgextension<?=$tabs?>" value=""/> 
															<span hidden=""  id="nombreimagen<?=$tabs?>"></span>
															
															<script type="text/javascript">
																function preview_image(id) 
																{  
																	var fileInput = document.getElementById('upload_file'+id);  

																	var files = Array.from(fileInput.files);
																	files = files.map(file => file.name);
																	console.log(files);
																	$("#nombreimagen"+id).html(files);
																	/*if (fileInput.files[0].size >= 150000) {
																		$('#alert').modal('show');
																		$("#mensajealerta").html("Favor de subir una imagen menor a 2mb(2 megabytes)");
																		return;
																	}*/

																	nombre = $("#nombreimagen"+id).html().split('.').pop(); 
																	$("#imgextension"+id).val(nombre);

																	var reader = new FileReader();
																	reader.onload = function()
																	{
																		var output = document.getElementById('image_preview'+id);
																		if(nombre != "pdf" && nombre != "pdf ") {  
																			output.src = reader.result;
																		} else {
																			output.src = "<?=assetgeneral()?>/img/pdf.png";
																		}
																		
																		$("#img"+id).val(reader.result);
																		$('#imgc'+id).val(reader.result)

																	}
																	reader.readAsDataURL(event.target.files[0]);
																}
															</script>
															<div>
																<label >


																	<?php  if (!empty($datos['datosexperiencias'][($tabs-1)]["DIR_IMAGEN"])){
																		?>
																		<div class="contAjustar">
																			<div id="contenedorimage<?=$tabs?>" class="boxi"  style="">
																				<img id="image_preview<?=$tabs?>"  src="<?=$datos['datosexperiencias'][($tabs-1)]["DIR_IMAGEN"]?>" style=""  >
																			</div>
																			<div class="middle">
																				<a style="cursor: pointer;" onclick="mostrarImagen('<?=$datos['datosexperiencias'][($tabs-1)]["DIR_IMAGEN"]?>','image_preview<?=$tabs?>','upload_file<?=$tabs?>','nombreimagen<?=$tabs?>')" ><img class="tarjetaSubirIma" src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" id="imgSeguroSocialB" style=""></a>
																				<label for="upload_file<?=$tabs?>" style="cursor: pointer;"><img class="tarjetaSubirIma" src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg" id="imgSeguroSocial" ></label>
																				<label onclick="quitarImagen('image_preview<?=$tabs?>','upload_file<?=$tabs?>','img<?=$tabs?>')"><img class="tarjetaSubirIma" src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELIMINAR.svg" id="imgSeguroSocial" style=""></label>
																			</div>
																		</div>
																		<?php
																	}
																	else {
																		?>
																		<div class="contAjustar">
																			<div id="contenedorimage<?=$tabs?>" class="boxi"  style="">
																				<img id="image_preview<?=$tabs?>" src="<?=assetgeneral()?>/img/MAS.svg"  >
																			</div>
																			<div class="middle">
																				<a style="cursor: pointer;" onclick="mostrarImagen('','image_preview<?=$tabs?>','upload_file<?=$tabs?>','nombreimagen<?=$tabs?>')" ><img class="tarjetaSubirIma" src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" id="imgSeguroSocialB" style="" ></a>
																				<label for="upload_file<?=$tabs?>" style="cursor: pointer;"><img class="tarjetaSubirIma" src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg" id="imgSeguroSocial" ></label>
																				<label onclick="quitarImagen('image_preview<?=$tabs?>','upload_file<?=$tabs?>','img<?=$tabs?>')"><img class="tarjetaSubirIma" src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELIMINAR.svg" id="imgSeguroSocial" style=""></label>
																			</div>
																		</div>
																		<?php
																	}?>



																</label>
															</div>

														</div>
													</div>
													<div class="row">
														<div class="col">
															<div class="row">
																<div class="col especialidadgastronimcarowc">
																	<h4 class="titulosenexperencia">Datos Específicos de la Experiencia</h4>
																</div>
															</div>
															<div class="row">
																<div class="col">
																	<div class="row">
																		<div class="col-sm-6 col-xl-3"> 
																			<label class="labelsform" for="tipodecontrato<?=$tabs?>">Tipo de Contrato</label>
																			<select class="form-control form-control-sm estiloinput" name="tipodecontrato<?=$tabs?>" id="tipodecontrato<?=$tabs?>">
																				<option value="1" <?php if (isset($datos['datosexperiencias'][($tabs-1)]["TIPO_CONTRATO"])) { if($datos['datosexperiencias'][($tabs-1)]["TIPO_CONTRATO"] == "TEMPORAL" ){echo "selected"; } }   ?> >Temporal</option>

																				<option value="2" <?php if (isset($datos['datosexperiencias'][($tabs-1)]["TIPO_CONTRATO"])) {if($datos['datosexperiencias'][($tabs-1)]["TIPO_CONTRATO"] == "EVENTUAL"){echo "selected"; }   }?> >Eventual</option>

																				<option value="3" <?php if (isset($datos['datosexperiencias'][($tabs-1)]["TIPO_CONTRATO"])) { if($datos['datosexperiencias'][($tabs-1)]["TIPO_CONTRATO"] == "PRESTACION SERVICIOS"){echo "selected"; } }  ?> >Prestación servicios</option>

																				<option value="4" <?php if (isset($datos['datosexperiencias'][($tabs-1)]["TIPO_CONTRATO"])) { if($datos['datosexperiencias'][($tabs-1)]["TIPO_CONTRATO"] == "CONTRATO FIJO"){echo "selected"; }  } ?> >Contrato fijo</option> 

																				<option value="5" <?php if (isset($datos['datosexperiencias'][($tabs-1)]["TIPO_CONTRATO"])) { if($datos['datosexperiencias'][($tabs-1)]["TIPO_CONTRATO"] == "PLANTA"){echo "selected"; }  }?> >Planta</option>

																				<option value="6" <?php if (isset($datos['datosexperiencias'][($tabs-1)]["TIPO_CONTRATO"])) { if($datos['datosexperiencias'][($tabs-1)]["TIPO_CONTRATO"] == "PERSONAL DE CONFIANZA"){echo "selected"; } }   ?> >Personal de confianza</option>
																			</select> 
																		</div>
																		<div class="col-sm-6 col-xl-3"> 
																			<div class="row">
																				<div class="col">
																					<label class="labelsform" for="fechainiciolaboral<?=$tabs?>">Inicio Laboral</label>
																					<input type="text" class="form-control form-control-sm estiloinput clascambioexp datetimepicker" name="fechainiciolaboral<?=$tabs?>" placeholder="dd/mm/aaaa" id="fechainiciolaboral<?=$tabs?>" onchange="antiguedad(<?=$tabs?>)"  value="<?php if(!empty($datos['datosexperiencias'][($tabs-1)]["FECHA_INICIO"])){ echo datesqltodate($datos['datosexperiencias'][($tabs-1)]["FECHA_INICIO"]);}?>">
																				</div>
																			</div> 
																			<div class="row">
																				<div class="col">

																					<label class="labelsform" for="fechaterminolaboral<?=$tabs?>" >Cierre Laboral</label>
	 <input type="checkbox" name="actual<?=$tabs?>" id="actual<?=$tabs?>" style="margin-left: 10px;" onchange="actual(<?=$tabs?>)" value="1" <?php if(!empty($datos['datosexperiencias'][($tabs-1)]["ACTUALMENTE"])){ if($datos['datosexperiencias'][($tabs-1)]["ACTUALMENTE"] == "SI"){ echo "checked";}}?> /><label for="actual<?=$tabs?>" style="font-size: 13px;margin-left: 5px;">Actualmente</label> 
																					<input type="text" class="form-control form-control-sm estiloinput clascambioexp datetimepicker" name="fechaterminolaboral<?=$tabs?>"placeholder="dd/mm/aaaa"  id="fechaterminolaboral<?=$tabs?>" onchange="antiguedad(<?=$tabs?>)" value="<?php if(!empty($datos['datosexperiencias'][($tabs-1)]["FECHA_TERMINO"])){ echo datesqltodate($datos['datosexperiencias'][($tabs-1)]["FECHA_TERMINO"]);}?>" > 
																				</div>
																			</div>
																		</div> 
																		<div class="col-sm-6 col-xl-3"> 
																			<label class="labelsform" for="antiguedad<?=$tabs?>">Antigüedad</label>
																			<input type="text" class="form-control form-control-sm estiloinput clascambioexp" name="antiguedad<?=$tabs?>" id="antiguedad<?=$tabs?>" readonly="" value=" "> 

																		</div>
																		<div class="col-sm-6 col-xl-3"> 
																			<div class="row">
																				<div class="col">
																					<label class="labelsform" for="sueldopercibido><?=$tabs?>">Sueldo Percibido Mensual</label>
																					<input type="text" onkeyup="elsueldod(<?=$tabs?>) " class="form-control form-control-sm estiloinput clascambioexp someID_options" name="sueldopercibido<?=$tabs?>" id="sueldopercibido<?=$tabs?>"  value="<?php if(!empty($datos['datosexperiencias'][($tabs-1)]["SUELDO_MENSUAL"])){ echo $datos['datosexperiencias'][($tabs-1)]["SUELDO_MENSUAL"];}?>" style="text-align: right;"> 
																				</div>
																			</div>
																			<div class="row">
																				<div class="col">
																					<label class="labelsform" for="sueldopercibidod><?=$tabs?>">Sueldo Percibido Diario</label>
																					<input type="text" onkeyup=" elsueldom(<?=$tabs?>)" class="form-control form-control-sm estiloinput clascambioexp someID_options" name="sueldopercibidod<?=$tabs?>" id="sueldopercibidod<?=$tabs?>"  value="<?php if(!empty($datos['datosexperiencias'][($tabs-1)]["SUELDO_MENSUAL"])){ echo $datos['datosexperiencias'][($tabs-1)]["SUELDO_MENSUAL"]/30;}?>" style="text-align: right;"> 
																				</div>
																			</div>

																		</div>
																	</div>
																	<div class="row">
																		<div class="col-6">
																			<div class="form-group">
																				<label class="labelsform" for="funcionesdesempenadas<?=$tabs?>">Funciones Desempeñadas</label>
																				<textarea class="form-control estiloinput clascambioexp" name="funcionesdesempenadas<?=$tabs?>" id="funcionesdesempenadas<?=$tabs?>"  ><?php if(!empty($datos['datosexperiencias'][($tabs-1)]["FUNCIONES"])){ echo str_replace("-", "\r\n", $datos['datosexperiencias'][($tabs-1)]["FUNCIONES"]);}?></textarea>
																			</div>
																		</div>
																		<div class="col-6">
																			<div class="form-group">
																				<label class="labelsform" for="motivoseparacion<?=$tabs?>">Motivo de la Separación Laboral</label>
																				<textarea class="form-control estiloinput clascambioexp" name="motivoseparacion<?=$tabs?>" id="motivoseparacion<?=$tabs?>"  ><?php if(!empty($datos['datosexperiencias'][($tabs-1)]["MOTIVO_SEPARACION"])){ echo str_replace("-", "\r\n", $datos['datosexperiencias'][($tabs-1)]["MOTIVO_SEPARACION"]);}?></textarea>
																			</div>
																		</div>
																	</div>
																</div>


															</div>
															<div class="row">

																<div class="col-12">
																	<div class="row especialidadgastronimcarowc">
																		<div class="col-5  ">
																			<h4 class="titulosenexperencia">Datos de Contacto </h4>
																		</div> 
																		<div class="col-7 " ><!--  <span onclick="agregarcontacto(<?=$tabs?>)">AGREGAR</span> -->
																		</div> 
																	</div>
																	<div class="row">
																		<div class="col" id="contactosclonados<?=$tabs?>">
																			<div class="row" id="contactoclonado<?=$tabs?>">
																				<div class="col-4">
																					<div class="form-group">
																						<label class="labelsform" for="nombrejefeinmediatoz<?=$tabs?>">Nombre del Jefe Inmediato</label>
																						<input type="text" class="form-control form-control-sm estiloinput" name="nombrejefeinmediatoz<?=$tabs?>" id="nombrejefeinmediatoz<?=$tabs?>" value="<?php if(!empty($datos['datosexperiencias'][($tabs-1)]["NOMRE_JEFE"])){ echo $datos['datosexperiencias'][($tabs-1)]["NOMRE_JEFE"];}?>">
																					</div>
																				</div>
																				<div class="col-4">
																					<div class="form-group">
																						<label class="labelsform" for="cargojefeinmediatoz<?=$tabs?>">Cargo del Jefe Inmediato</label>
																						<input type="text" class="form-control form-control-sm estiloinput" name="cargojefeinmediatoz<?=$tabs?>" id="cargojefeinmediatoz<?=$tabs?>" value="<?php if(!empty($datos['datosexperiencias'][($tabs-1)]["CARGO_JEFE"])){ echo $datos['datosexperiencias'][($tabs-1)]["CARGO_JEFE"];}?>">
																					</div>
																				</div>
																				<div class="col-4">
																					<div class="form-group">
																						<label class="labelsform" for="telefonodelaempresaz<?=$tabs?>">Teléfono del Jefe Inmediato</label>
																						<input type="text" class="form-control form-control-sm estiloinput phone_with_ddd" name="telefonodelaempresaz<?=$tabs?>" id="telefonodelaempresaz<?=$tabs?>" value="<?php if(!empty($datos['datosexperiencias'][($tabs-1)]["TELEFONO_OFICINA"])){ echo $datos['datosexperiencias'][($tabs-1)]["TELEFONO_OFICINA"];}?>">
																					</div>
																				</div> 
																			</div>
																		</div> 
																	</div>

											<?php if (!empty($datos['datosexperiencias'][($tabs-1)]["DIR_IMAGEN"])): ?>
												
												<div class="row">
												<div class="col">
													<span class="linkAccione" onclick="eliminarexperiencia()">ELIMINAR</span>
												</div>
											</div>
											<?php endif ?>

																	<input type="number" name="iden" id="iden<?=$tabs?>" value="<?=$tabs?>"  hidden="" >
																	<input type="number" id="cambio<?=$tabs?>" value="1"  hidden="" >
																	<input type="number" name="contadorcontactos<?=$tabs?>" id="contadorcontactos<?=$tabs?>" value="1" hidden="" >
																</div>  
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								<?php }   ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> 
	</div>
	<input type="number" id="primeracarga" value="0"  hidden="">
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

<script>
	function elsueldom(id){
		var sueldo = $("#sueldopercibidod"+id).val();
		sueldo = sueldo.replace("$","");
		sueldo = sueldo.replace(",",""); 
		sueldo = Number(sueldo)*30; 
		$("#sueldopercibido"+id).val("$"+sueldo.toFixed(2));
		$('.someID_options').autoNumeric('init', {aSign:' $'  });
	}
	function elsueldod(id){
		var sueldo = $("#sueldopercibido"+id).val();
		sueldo = sueldo.replace("$","");
		sueldo = sueldo.replace(",","");
		sueldo = Number(sueldo)/30;
		$("#sueldopercibidod"+id).val("$"+sueldo.toFixed(2));
		$('.someID_options').autoNumeric('init', {aSign:' $'  });
	}
	//esto nos da el formato para los numeros de dinero
	jQuery(function($) {
		$('.someID_options').autoNumeric('init', {aSign:' $'  });
	});

	//agrega la maskara a los numeros
	$(window).on("mouseover", function(){
		$('.phone_with_ddd').mask('(000) 000 0000');

      $('.datetimepicker').mask('00/00/0000'); 
       $('.datetimepicker').datepicker({
      format: "dd/mm/yyyy",
      autoclose: true,
      todayHighlight: true,
      assumeNearbyYear: true,
      todayButton: true,
   });
	});
	//esta es para optener las imagenes de las empresas en cada experiencia
	$(window).on("load", function(){
		setTimeout(function(){
			for (var i = 1; i <= 20; i++) {
				var iden = $('#idexperiencias'+i).val();
				var valor = $('#compania'+i).val(); 
				if (iden != 0  ) {
					
					$.ajax({ 
						type: 'ajax',
						method: 'post',
						datatype: 'text',
						async: false,
						url: '<?=base_url('configuracion/practicasprofesionales/imagenesempresa')?>',  
						data: {valor: valor},
					})
					.done(function(response){
						response = response.split(",");
						var x = "";
						for (var a = 1; a <= response[0] ; a++) {
							x +=' <li class="list-group-item">';
							x +='                   <div >';
							x +='                      <img class="subirimagen"src="'+response[a]+'"   ';
							x +='                   </div>';
							x +='                </li>';
						} 
						$("#zona2a"+i).html(x);


					}) ;
					antiguedad(i);
				} 
				else{
					$("#zona2a"+i).html("");
				}
			}
		},1000) ;

	});
function actual(lugar) {
	 if ($("#actual"+lugar).prop("checked")) {
	 	$("#fechaterminolaboral"+lugar).attr("readonly","")
	 	$("#fechaterminolaboral"+lugar).removeClass("datetimepicker")
	 	var date = new Date();
 			
	 	$("#fechaterminolaboral"+lugar).val(date.toLocaleDateString("en-GB"))
	 	antiguedad(lugar)
	 }else{
	 	$("#fechaterminolaboral"+lugar).removeAttr("readonly","") 
	 	$("#fechaterminolaboral"+lugar).addClass("datetimepicker") 
	 }

}

	$('.clascambioexp').on("change", function(){
		$("#cambio4").val(2);
	});

	$('.clascheckcambio').on("change", function(){
		$("#cambio2").val(2);
	});


	$(".imgInp").change(function() {
		var id = $(this).data("id");

		readURL(this,id);
	});
	function cambioselect(valor,id) {
		$("#cambio3").val(2);
		if (valor == 19) {
			$("#idespecialidad"+id).css('display','none');
			$("#otraespecialidad"+id).css('display','block');
		}
	}
	//calcula los dias y con eso, los años
	function antiguedad(id) {

		// JavaScript program to illustrate
		// calculation of no. of days between two date
		var i = $("#fechainiciolaboral"+id).val();
		var t = $("#fechaterminolaboral"+id).val();
		// To set two dates to two variables
		date1 = new Date(i.split("/").reverse().join("-")); 
		date2 = new Date(t.split("/").reverse().join("-"));

		// To calculate the time difference of two dates 
		var Difference_In_Time = date2.getTime() - date1.getTime(); 
		console.log(Difference_In_Time/(1000 * 3600));
		// To calculate the no. of days between two dates 
		var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24); 
		Difference_In_Days = (Difference_In_Days * Number(24));
		//To display the final no. of days (result)
		$.ajax({ 
			type: 'ajax',
			method: 'post',
			url: '<?=base_url('consultas/diasenmya')?>',
			async: true, 
			data: {dias: Difference_In_Days}})

		.done(function(response){  
			$("#antiguedad"+id).val(response);
		}) ;
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
	
	$( document ).ready(function() {
		for (var i = 1; i <= 20; i++) {

			var nombre = $("#image_preview"+i).attr("src");
			//alert(nombre);
			var name = nombre.split('.').pop();
			//alert(name);
			if(name == "pdf" || name == "PDF") {
				$("#image_preview"+i).attr("src","<?=assetgeneral()?>/img/pdf.png");
			}	

		}
	});

	function quitarImagen (idImagen,objetofile,valor) {
		$("#"+idImagen).attr("src","<?=assetgeneral()?>/img/MAS.svg");
		document.getElementById(valor).value = 'x';
		var $el = $('#'+objetofile); 
		$el.wrap('<form>').closest('form').get(0).reset(); 
		$el.unwrap();
	}


	function mostrarImagen (direccion,idImagen,objetofile,nombreImg) {

		//alert("entre");
		var nombre = $('#'+idImagen).attr("src");

		var name = nombre.split('/').pop();

		var name2 = direccion.split('.').pop();
		var mensaje= document.getElementById(nombreImg).innerHTML;

		if(name != "masgris.png " && name != "masgris.png" && name != "MAS.svg" && name != "MAS.svg " ){

			if( ( name2 == "pdf" || name2 == "PDF" || name2 == "pdf ") && mensaje == "" ) {
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

	//Esta funcion nos ayuda a saber en cual estamos
	function checacambio(id) {
		$("#cambio1").val(id);
	}

	function eliminarespecialidad(idi){
		if (idi != 1) {
			var id = $("#inputid"+idi).val();
			if (id != 0) {
				eliminandoespecialidad(id,idi) 
			}
			else{
				$("#iddivespecialidades"+idi).remove();
				 
			}
		}
		if (idi == 1) {
			var id = $("#inputid"+idi).val();
			if (id != 0) {
				eliminandoespecialidad(id,idi) 
			} 
		}

	}

	function eliminandoespecialidad (id,idi){
		$.ajax({ 
			type: 'ajax',
			method: 'post',
			url: '<?=base_url('configuracion/experienciaprofesional/eliminarespecialidad')?>',
			async: true, 
			data: {id:id},
			success: function(response){ 
				if (response == '1') {
					recargapagina()
				}
				else{

				}
			},
			error: function () {
				alert('Hubo un error, intente mas tarde');
			}
		}) ;
	}


	function consultaempresas(valor,indicador) {

		$.ajax({ 
			type: 'ajax',
			method: 'post',
			url: '<?=base_url('configuracion/practicasprofesionales/somedatosempresas')?>', 
			data: {valor: valor},
			success: function(response){ 
				response = response.split(",");
				$("#telefonoempresa"+indicador).val(response[0]);
				$("#extension"+indicador).val(response[1]);
				$("#paiesmpresa"+indicador).val(response[2]);
				$("#estadoempresa"+indicador).val(response[3]);
				$("#ciudadempresa"+indicador).val(response[4]); 
			},
			error: function () {
				alert('Hubo un error, intente mas tarde');
			}
		}) ; 
		$.ajax({ 
			type: 'ajax',
			method: 'post',
			datatype: 'json',
			url: '<?=base_url('configuracion/practicasprofesionales/imagenesempresa')?>', 
			data: {valor: valor},
			success: function(response){  
				response = response.split(",");
				var x = "";
				for (var i = 1; i <= response[0] ; i++) {
					x +=' <li class="list-group-item">';
					x +='                   <div >';
					x +='                      <img class="subirimagen"src="'+response[i]+'"  alt="...">';
					x +='                   </div>';
					x +='                </li>';
				}
				$("#zona2a"+indicador).html(x);

			},
			error: function () {
				alert('Hubo un error, intente mas tarde');
			}
		}) ; 
	}




	function agregaelementoespecialidad(){
		var elemento =  $("#otraespecialidad").val();


		// recibimos el elemento que inicie el id con ^= "elementoclonable"
		var div = $('div[id^="iddivespecialidades"]:last'); 
		var select = $('select[name^="especialidad"]:last'); 
		var span = $('span[id^="ideliminarespecialidad"]:last');
		var input = $('input[id^="inputid"]:last'); 
		var inputotra = $('input[id^="otraespecialidad"]:last');
		// leemos el numero del id pd: es necesario tener numero en tu elemento si quieres clonardiferens ids e incremento
		// And increment that number by 1
		var num  = parseInt( div.prop("id").match(/\d+/g), 10 ) +1;

		//clonamos el elemento y le asignamos las propiedades
		var clondiv = div.clone().prop('id','iddivespecialidades'+num  );
		var clonname = select.clone().prop({'name':'especialidad'+num,'id':'idespecialidad'+num} ).attr("onchange","cambioselect($(this).val(),$('#ideliminarespecialidad"+num+"').data('id'))").css('display','block');
		var clonspan = span.clone().prop( 'id','ideliminarespecialidad'+num ).attr('data-id',num);
		var cloninput = input.clone().prop( {'name':'inputid'+num,'id':'inputid'+num} ).attr('value',0);
		var cloninputotra = inputotra.clone().prop( {'name':'otraespecialidad'+num,'id':'otraespecialidad'+num} ).css('display','none');
		// Finally insert $klon wherever you want
		clondiv.appendTo("#especialidades") ;
		$( "#iddivespecialidades"+num).empty();
		cloninputotra.appendTo("#iddivespecialidades"+num);
		clonname.appendTo("#iddivespecialidades"+num);
		cloninput.appendTo("#iddivespecialidades"+num);
		clonspan.appendTo("#iddivespecialidades"+num);


		if (  elemento.trim() !== "") {
			// get reference to select element
			var sel = document.getElementById('idespecialidad');
			// create new option element
			var opt = document.createElement('option');
			// create text node to add to option element (opt)
			opt.appendChild( document.createTextNode(elemento) );
			// set value property of opt
			opt.value = elemento; 
			opt.selected = elemento; 
			// remove 2nd option in select box (sel)
			//sel.removeChild( sel.options[1] ); 
			// add opt to end of select box (sel)
			$(".selectespci").append(opt );
			$("#otraespecialidad").val(""); 

		}

		$("#contadorespecialidades").val(num);
		if (!$.isNumeric($("#idespecialidad"+num+" option:selected").val())) {
			$("#idespecialidad"+num+" option:selected").remove()
		}
		
	}



	function editar() {

		
		var cambios =	$("#cambio2").val();
		var iden =	$("#cambio1").val(); 
		$("#imagenguardar").css("display", "none");
		$("#spiner").css("display", "block");
		if (cambios != 1) { 
			var data  = $("#formexpeciencia").serialize();
			var url = $("#formexpeciencia").attr('action');
			$.ajax({ 
				type: 'ajax',
				method: 'post',
				url: url, 
				data: data,
				success: function(response){ 
					if (response == '2') {
						agregandoespecialidades()
					}
					else{
						alert('Algo esta pasando D:');
						$("#imagenguardar").css("display", "block");
						$("#spiner").css("display", "none");
					}
				},
				error: function () {
					alert('Hubo un error, intente mas tarde');
				}
			}) ;
		}
		else{
			agregandoespecialidades()
		} 
	}

	function agregandoespecialidades() {

		//agregamos especialidades
		var cont  =  $("#contadorespecialidadesconfirm").val();
		var data  = $("#formespecialidades").serialize();
		var url = $("#formespecialidades").attr('action');
		if (cont != $("#contadorespecialidades").val() || $("#cambio3").val() == 2) {
			$.ajax({ 
				type: 'ajax',
				method: 'post',
				url: url, 
				data: data,
				async: true,
				success: function(response){ 
					if (response == 1) {
						mostrandoesp() 
						agregarexperiencia()
						return ;

					}
					if (response == 2) {
						mostrandoesp() 
						agregarexperiencia()
						return ;
					}
					else{
						setTimeout(function(){ $('#alert').modal('show');
							$("#mensajealerta").html(response); 
						}, 500);$("#imagenguardar").css("display", "block");
						$("#spiner").css("display", "none");
					}
				},
				error: function () {
					alert('Hubo un error, intente mas tarde');
				}
			}) ;
		}
		else{
			agregarexperiencia();
		}
	}
	function mostrandoesp() {
 
			$.ajax({ 
				type: 'ajax',
				method: 'post',
				url: "<?=base_url('configuracion/experienciaprofesional/mostrarespecialidad')?>",  
				async: true,
				success: function(response){ 
 
					$("#especialidades").html(response);
				},
				error: function () {
					alert('Hubo un error, intente mas tarde');
				}
			}) ;
		}  

	function agregarexperiencia() {
		//agregamos experiencia
  $(".estiloinput").removeClass('estiloinputred');
   $(".estiloCampo").removeClass('estiloinputred');
		 if ($("#cambio4").val() == 1) {
		 	$('#alert').modal('show');
				$("#mensajealerta").html("Se Guardó Correctamente, se Actualizará la Página para Visualizar los Cambios");
				$("#alert").attr("onclick","recargapagina()");   
				return;
		 }

		var id  =  $("#totalexperienciaslaborales").val();
		for (var i = 1; i <= id; i++) {
			if ($('#imgc'+i).val() == "") {
				$('#alert').modal('show');
				$("#mensajealerta").html("Favor de Agregar Certificado Laboral en la Experiencia Número "+i); 
				$("#imagenguardar").css("display", "block");
				$("#spiner").css("display", "none");
				return;
			}
			if ($('#cargo'+i).val() == "" || $('#cargo'+i).val() == null) {
				$('#alert').modal('show');
				$("#mensajealerta").html("Favor de llenar el Campo de 'Cargo' en la Experiencia Número "+i); 
				$("#imagenguardar").css("display", "block");
				$("#spiner").css("display", "none");
				
$("#cargo"+i).addClass('estiloinputred')
				return; 
			}

			if ($('#fechainiciolaboral'+i).val() == "" || $('#fechainiciolaboral'+i).val() == null) {
				$('#alert').modal('show');
				$("#mensajealerta").html("Favor de Llenar el Campo de 'Inicio Laboral' en la Experiencia Número "+i); 
				$("#imagenguardar").css("display", "block");
				$("#spiner").css("display", "none");
				
$("#fechainiciolaboral"+i).addClass('estiloinputred')
				return; 
			}
			if ($('#fechaterminolaboral'+i).val() == "") {
				$('#alert').modal('show');
				$("#mensajealerta").html("Favor de llenar el Campo de 'Cierre Laboral' en la Experiencia Número "+i); 
				$("#imagenguardar").css("display", "block");
				$("#spiner").css("display", "none");
				
$("#fechaterminolaboral"+i).addClass('estiloinputred')
				return; 
			}
			if ($('#sueldopercibido'+i).val() == "") {
				$('#alert').modal('show');
				$("#mensajealerta").html("Favor de Llenar el Campo 'Sueldo' en la Experiencia Número "+i); 
				$("#imagenguardar").css("display", "block");
				$("#spiner").css("display", "none"); 
				
$("#sueldopercibido"+i).addClass('estiloinputred')
				return; 
			}
			if ($('#funcionesdesempenadas'+i).val() == "") {
				$('#alert').modal('show');
				$("#mensajealerta").html("Favor de Llenar el Campo de 'Funciones Desempeñadas' en la Experiencia Número "+i); 
				$("#imagenguardar").css("display", "block");
				$("#spiner").css("display", "none");
				
$("#funcionesdesempenadas"+i).addClass('estiloinputred')
				return; 
			} 
			if ($('#nombrejefeinmediatoz'+i).val() == "") {
				$('#alert').modal('show');
				$("#mensajealerta").html("Favor de Llenar el Campo del 'Nombre del Jefe' en la Experiencia Número "+i); 
				$("#imagenguardar").css("display", "block");
				$("#spiner").css("display", "none");
				
$("#nombrejefeinmediatoz"+i).addClass('estiloinputred')
				return; 
			}
			if ($('#cargojefeinmediatoz'+i).val() == "") {
				$('#alert').modal('show');
				$("#mensajealerta").html("Favor de Llenar el Campo del 'Cargo del Jefe' en la Experiencia Número "+i); 
				$("#imagenguardar").css("display", "block");
				$("#spiner").css("display", "none");
				
$("#cargojefeinmediatoz"+i).addClass('estiloinputred')
				return; 
			}
			
		}
		for (var i = 1; i <= id; i++) {
			 for (var d = 1; d <= id; d++) {
			 if (d != i) {
			 	if ($("#actual"+i).prop("checked") && $("#actual"+d).prop("checked")) {
			 	$('#alert').modal('show');
				$("#mensajealerta").html("Solo puede haber un actual, checar la experiencia número "+i+" y la experiencia número "+d); 
				$("#imagenguardar").css("display", "block");
				$("#spiner").css("display", "none");
				return; 
			 }
			 }
			
		}
			
		}
		for (var i = 1; i <= id; i++) {
			var data  = $("#formexpeciencias"+i).serialize();
			var url = $("#formexpeciencias"+i).attr('action');
			var comprobante = 0;
			$.ajax({ 
				type: 'ajax',
				method: 'post',
				url: url,
				async: true, 
				data: data, 
				success: function(response){

					if (Number(response) == 1) {

						comprobante = response;
						return;
					}

					if (Number(response) == 2) {

						comprobante = response;
						return;
					}
					else{

						setTimeout(function(){ 
							$('#alert').modal('show');
							$("#alert").attr("onclick","");   
							$("#mensajealerta").html(response);


						}, 500);
						$("#imagenguardar").css("display", "block");
						$("#spiner").css("display", "none");
					}
				},
				error: function () {
					alert('Hubo un error, intente mas tarde');
					return;
				}
			}) ; 
		}
 
			setTimeout(function(){ 
				$('#alert').modal('show');
				$("#mensajealerta").html("Se Guardó Correctamente, se Actualizará la Página para Visualizar los Cambios");
				$("#alert").attr("onclick","recargapagina()");   
			}, 1000);$("#imagenguardar").css("display", "block");
			$("#spiner").css("display", "none");
		 
	}

	function eliminarexperiencia() {
		var id  =  $("#cambio1").val(); 

		$('#confirm').modal('show');
		$("#mensajeconfirmacion").html("¿Está Seguro de Eliminar Esta Experiencia?");
		$("#botonconfirm").attr("onclick","confirmoeliminar("+id+")");   


	}
	function confirmoeliminar(id) { 
		var data  = $("#formexpeciencias"+id).serialize();
		var url = '<?=base_url('configuracion/experienciaprofesional/eliminarexperiencia')?>';
		$.ajax({ 
			type: 'ajax',
			method: 'post',
			url: url,
			async: true, 
			data: data,
			success: function(response){ 
				if (response == '1') {
					$('#alert').modal('show');
					$("#mensajealerta").html("Se elimino correctamente la experiencia");
					$("#alert").attr("onclick","recargapagina()");  
				}

				else{
					alert('Hubo un problema al eliminar');
				}
			},
			error: function () {
				alert('Hubo un error, intente mas tarde');
			}
		}) ; 
	}



	function limitador(total,limite) { 
		total = Number(total);

		var div  = '';
		var active = "";
		if (total <= 0  ) {
			$('#totalexperienciaslaborales').val(limite);
		}
		if (total >= 20  ) {
			$('#totalexperienciaslaborales').val(20);
			total = 20;
		}
		if (total > limite) {
			div += '<li class="nav-item"> ';
			div +=		'						<a class="nav-link " id=" " data-toggle="tab" href=" " role="tab" aria-controls=" " onclick="menosexp()" aria-selected="true">-</a>';
			div +=		'					</li>';
			for (var i = 1; total > limite; i++) {
				limite = i; 
				active = "";
				if (i == 1) {
					active = "active";
				}
				div +='<li class="nav-item" id="li'+i+'">' ;

				div += '<a class="nav-link '+active+'" id="experiencia'+i+'-tab" onclick="checacambio('+i+')" data-toggle="tab" href="#experiencia'+i+'" role="tab" aria-controls="experiencia'+i+'" aria-selected="true">'+i+'</a>';
				div +=    '</li>';
			}
			div += 			'<li class="nav-item"> ';
			div +=					'<a class="nav-link " id="masexp" data-toggle="tab" href=" " role="tab" aria-controls=" " onclick="masexp()" aria-selected="true">+</a>';
			div +=			'</li>';
			$('#myTab').html(div);
			$('#contador').val(limite);
			
			console.log(limite);
			$('#experiencia'+limite+'-tab').trigger('click');


		}
		var div  = '';
		if (total < limite) {
			if (total <= 0  ) {
				$('#totalexperienciaslaborales').val(limite);
			}else {

				for (var i = limite ; total < limite; i--) {
					limite = i; 
					if (limite != total) {
						$("#li"+i).remove();
						if ($("#idexperiencias"+i).val() !=0 ) {
							$('#confirm').modal('show');
							$("#mensajeconfirmacion").html("Se va eliminar una experiencia registrada <br>¿Esta seguro de eliminarla?");
							$("#botonconfirm").attr("onclick","eliminarexperienciapormenos("+i+")");   
							$("#botoncancelar").attr("onclick","cancelo("+limite+")");

						}
					}
				}  
				$('#contador').val(limite);
				setTimeout(function() {
					$('#experiencia'+limite+'-tab').trigger('click');
				}, 10 ) 

			}
		}

	} 



	function eliminarexperienciapormenos(i) {


		var data  = $("#formexpeciencias"+i).serialize();
		var url = '<?=base_url('configuracion/experienciaprofesional/eliminarexperiencia')?>';

		$.ajax({ 
			type: 'ajax',
			method: 'post',
			url: url,
			async: true, 
			data: data,
			success: function(response){ 
				if (response == '1') {


				}

				else{
					$('#alert').modal('show');
					$("#mensajealerta").html("Hubo un problema al eliminar la experiencia, se recergara la pagina");
					$("#alert").attr("onclick","recargapagina()"); 
				}
			},
			error: function () {
				alert('Hubo un error, intente mas tarde');
			}
		}) ; 

		$('#alert').modal('show');
		$("#mensajealerta").html("Se elimino correctamente la experiencia, se recargara la pagina para visualizar los cambios");
		$("#alert").attr("onclick","recargapagina()"); 


	}
	function cancelo(limite) {
		$('#contador').val(limite);
		$('#totalexperienciaslaborales').val(limite);
		limitador(limite,(limite-1))
	}
	function masexp() {
		var valor = Number($('#totalexperienciaslaborales').val()) + Number(1);
		var limite = Number($('#contador').val());

		$('#totalexperienciaslaborales').val(valor);
		limitador(valor,limite) 

	}
	function menosexp() {
		var valor = Number($('#totalexperienciaslaborales').val()) - Number(1);
		var limite = Number($('#contador').val());
		$('#totalexperienciaslaborales').val(valor); 
		limitador(valor,limite);
		setTimeout(function() {
			$("#masexp").attr("onclick","masexp()");
		},250 )
	}
	function aviso() {
		$('#alert').modal('show');
		$("#mensajealerta").html("Solo se puede guardar una Experiencia a la Vez");
		$("#alert").attr("onclick",""); 
	}
	function recargapagina() {
		location.href = "<?=base_url('/configuracion/experienciaprofesional')?>";
	}
</script>
<script type="text/javascript">


	/*  var data  = $("#formeditarfmailiares").serialize();
    var url = $("#formeditarfmailiares").attr('action');
     $.ajax({ 
      type: 'ajax',
      method: 'post',
      url: url,
      async: false, 
      data: data,
      success: function(response){   
      },
      error: function () {
        alert('Hubo un error, al insertar a los familiares :´c');
      }
    }) ;




// get the last DIV which ID starts with ^= "klon"
var div = $('div[id^="contactoclonado"]:last');

  // Read the Number from that DIV's ID (i.e: 3 from "klon3")
  // And increment that number by 1
  var num = parseInt( div.prop("id").match(/\d+/g), 10 ) +1;

  // Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
  var klon = div.clone().prop('id', 'contactoclonado'+num );

  // Finally insert klon wherever you want
  klon.appendTo("#contactosclonados"+id ) ;



function agregarcontacto(id)
	{
		var zona = document.getElementById("contactosclonados"+id);
// get the last DIV which ID starts with ^= "klon"
var div = $('div[id^="contactoclonado'+id+'a"]:last');



  // Read the Number from that DIV's ID (i.e: 3 from "klon3")
  // And increment that number by 1
  var num = parseInt( div.prop("id").match(/\d+(?!\a)/g), 10 ) +1;

  // Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
  var clondiv = div.clone().prop('id', 'contactoclonado'+id+'a'+num );

  

  var x =	' <div class="col-4">';
  x +=	' <div class="form-group">';
  x +=	' <label class="labelsform" for="nombrejefeinmediato'+id+'a'+num+'">Nombre del jefe inmediato</label>';
  x +=	' <input type="text" class="form-control form-control-sm estiloinput" name="nombrejefeinmediato'+id+'a'+num+'" id="nombrejefeinmediato'+id+'a'+num+'" >';
  x +=	' </div>';
  x +=	' </div>';
  x +=	' <div class="col-4">';
  x +=	' <div class="form-group">';
  x +=	' <label class="labelsform" for="cargojefeinmediato'+id+'a'+num+'">Cargo del jefe inmediato</label>';
  x +=	' <input type="text" class="form-control form-control-sm estiloinput" name="cargojefeinmediato'+id+'a'+num+'" id="cargojefeinmediato'+id+'a'+num+'" >';
  x +=	' </div>';
  x +=	' </div>';
  x +=	' <div class="col-4">';
  x +=	' <div class="form-group">';
  x +=	' <label class="labelsform" for="telefonodelaempresa'+id+'a'+num+'">Telefono de la empresa</label>';
  x +=	' <input type="text" class="form-control form-control-sm estiloinput" name="telefonodelaempresa'+id+'a'+num+'" id="telefonodelaempresa'+id+'a'+num+'" >';
  x +=	' </div>';
  x +=	' </div> '; 

  // Finally insert clondiv wherever you want
  console.log("num; "+ num);
  console.log("id "+ id);
  clondiv.appendTo(zona) ;
  $( "#contactoclonado"+id+"a"+num).empty();
  $( "#contactoclonado"+id+"a"+num).html(x);
  $("#contadorcontactos"+id).val(num);

}







*/

</script>
