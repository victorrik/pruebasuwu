<div id="contenidocambiante" data-id="6"> 
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
	<div class="row">

		<div class="col">
			<div class="box">
				<div class="box-header ">
					<div class="row">  
						<div class="col">
							<div class="row">
								<div class="col-3 letratituloedicion">
									<span>Idiomas Maternos </span>
								</div> 
								<div class="col lineainferiorosita"> 
								</div>  
							</div>
							<div class="row pt-3">
								<div class="col letratituloedicion">
									
								</div> 
								<div class="col-5" style="text-align: right;"> 
									<span class="linkAccion"  onclick="agregaridiomamaterno()">AGREGAR IDIOMA</span>
								</div>  
							</div>
							<form id="formmaternos" action="<?=base_url('configuracion/idiomas/edicion')?>">
								<div class="row pt-2" id="contenedoridiomas">  
									
									<?php  $cont = 0;
									if (!empty($datos["idiomasmaternos"])) {
										

										foreach ($datos["idiomasmaternos"] as $key ) {

											$cont++;
											?>
											<div class="col-3 alineandoespecialidad mb-3"  id="colidiomas<?=$cont?>">
												<input type="text" name="ididiomamaterno<?=$cont?>" id="ididiomamaterno<?=$cont?>"  value="<?=$key["ID"]?>" hidden=""> 
												<select class="form-control form-control-sm estiloCampo"name="idiomamaterno<?=$cont?>" id="idiomamaterno<?=$cont?>">
													<?php  
													foreach ($datos["lista"] as $keyi ) {
														?>
														<option value="<?=$keyi["ID"]?>" data-nombre="<?=$keyi["NOMBRE_IDIOMA"]?>"  <?php if( $keyi["ID"]== $key["ID_IDIOMA"]  ){echo "selected";}  ?> ><?=$keyi["NOMBRE_IDIOMA"]?></option>
														<?php

													} ?>
													

												</select> 


												<span class="menosspan" onclick="eliminaridioma(<?=$cont?>,<?=$key["ID"]?>)" id="eliminaridioma<?=$cont?>" style="margin: 5px 0px 0px 10px; background: transparent;"><img src="<?=assetgeneral()?>/img/delete.png" style="max-height: 26px;"></span>
											</div>

										<?php	 	} }
										else{
											$cont = 1; ?>
											<div class="col-3 alineandoespecialidad mb-3"  id="colidiomas1">
												<input type="text" name="ididiomamaterno1" id="ididiomamaterno1" value="0" hidden="">
												<select class="form-control form-control-sm estiloCampo"name="idiomamaterno1" id="idiomamaterno1">
													<?php $cuenta= 0;
													foreach ($datos["lista"] as $key ) {
														$cuenta++;?>
														<option value="<?=$key["ID"]?>" data-nombre="<?=$key["NOMBRE_IDIOMA"]?>"  <?php if($key["ID"] == 14  ){echo "selected";}  ?> ><?=$key["NOMBRE_IDIOMA"]?></option>
														<?php

													} ?>
													

												</select> 
												<span class="menosspan" onclick="eliminaridioma(1)" id="eliminaridioma1" style="margin: 5px 0px 0px 10px; background: transparent;"><img src="<?=assetgeneral()?>/img/delete.png" style="max-height: 26px;"></span>
											<?php  } ?> 
										</div>

									</div>
									<input type="text" name="contadoridiomas" id="contadoridiomas" hidden="" value="<?=$cont?>">
								</form>
							</div>
						</div>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-3 letratituloedicion">
								<span> Idiomas Aprendidos </span>
							</div> 
							<div class="col lineainferiorosita">  
							</div> 
						</div>
						<form id="formaprendidos" action="<?=base_url('configuracion/idiomas/edicionaprendidos')?>">
							<div class="row pt-3">
								<div class="col letratituloedicion">

								</div> 
								<div class="col-3" style="text-align: right;"> 
									<span  class="linkAccion" onclick="agregaraprendido()">AGREGAR IDIOMA</span>
								</div>  
							</div>
							<div class="row" id="contenedoaprendidos">
								<?php 
								if (!empty($datos["idiomasaprendidos"])) {

									$cont = 0;

									foreach ($datos["idiomasaprendidos"] as $key ) {

										$cont++;
										?>

										<div class="col-12" id="colaprendidos<?=$cont?>"> 
											<div class="row mb-4">
												<div class="col"> 
													<div class="row">
														<div class="col-2">  
															<label for="idioma<?=$cont?>">Idioma</label> 
															<select class="form-control form-control-sm estiloCampo" name="idioma<?=$cont?>" id="idioma<?=$cont?>">
																<?php  
																foreach ($datos["lista"] as $keyi ) {
																	?>
																	<option value="<?=$keyi["ID"]?>"  <?php if( $keyi["ID"]== $key["ID_IDIOMA"]  ){echo "selected";}  ?> ><?=$keyi["NOMBRE_IDIOMA"]?></option>
																	<?php

																} ?>


															</select> 
														</div>
														<div class="col-2"> 
															<label for="hablado<?=$cont?>">Hablado</label>
															<select class="form-control form-control-sm estiloCampo" onchange="calculoporcentaje($(this).val(),<?=$cont?>)" name="hablado<?=$cont?>" id="hablado<?=$cont?>">
																<option value="0"  <?php if($key["NIVEL_HABLADO"] == 0  ){echo "selected";}  ?> >Nulo</option>
																<option value="25" <?php if($key["NIVEL_HABLADO"] == 25 ){echo "selected";}  ?> >Bajo</option>
																<option value="50" <?php if($key["NIVEL_HABLADO"] == 50 ){echo "selected";}  ?> >Medio</option>
																<option value="75" <?php if($key["NIVEL_HABLADO"] == 75 ){echo "selected";}  ?> >Alto</option>
																<option value="100"<?php if($key["NIVEL_HABLADO"] == 100 ){echo "selected";}  ?> >Perfecto</option>
															</select> 
														</div>
														<div class="col-2"> 
															<label for="escrito<?=$cont?>">Escrito</label>
															<select class="form-control form-control-sm estiloCampo" onchange="calculoporcentaje($(this).val(),<?=$cont?>)" name="escrito<?=$cont?>" id="escrito<?=$cont?>">
																<option value="0"   <?php if($key["NIVEL_ESCRITO"] == 0  ){echo "selected";}  ?>>Nulo</option>
																<option value="25"  <?php if($key["NIVEL_ESCRITO"] == 25 ){echo "selected";}  ?>>Bajo</option>
																<option value="50"  <?php if($key["NIVEL_ESCRITO"] == 50 ){echo "selected";}  ?>>Medio</option>
																<option value="75"  <?php if($key["NIVEL_ESCRITO"] == 75 ){echo "selected";}  ?>>Alto</option>
																<option value="100" <?php if($key["NIVEL_ESCRITO"] == 100 ){echo "selected";}  ?>>Perfecto</option>
															</select> 
														</div>
														<div class="col-2"> 
															<label for="escuchado<?=$cont?>">Ecuchado</label>
															<select class="form-control form-control-sm estiloCampo" onchange="calculoporcentaje($(this).val(),<?=$cont?>)" name="escuchado<?=$cont?>" id="escuchado<?=$cont?>">
																<option value="0"   <?php if($key["NIVEL_ESCUCHADO"] == 0  ){echo "selected";}  ?>>Nulo</option>
																<option value="25"  <?php if($key["NIVEL_ESCUCHADO"] == 25 ){echo "selected";}  ?>>Bajo</option>
																<option value="50"  <?php if($key["NIVEL_ESCUCHADO"] == 50 ){echo "selected";}  ?>>Medio</option>
																<option value="75"  <?php if($key["NIVEL_ESCUCHADO"] == 75 ){echo "selected";}  ?>>Alto</option>
																<option value="100" <?php if($key["NIVEL_ESCUCHADO"] == 100 ){echo "selected";}  ?>>Perfecto</option>
															</select> 
														</div>
														<div class="col-2"> 
															<label for="compredido<?=$cont?>" style="font-size: 15px;">Comprendido</label>
															<select class="form-control form-control-sm estiloCampo" onchange="calculoporcentaje($(this).val(),<?=$cont?>)" name="compredido<?=$cont?>" id="compredido<?=$cont?>">
																<option value="0"   <?php if($key["NIVEL_COMPRENDIDO"] == 0  ){echo "selected";}  ?>>Nulo</option>
																<option value="25"  <?php if($key["NIVEL_COMPRENDIDO"] == 25 ){echo "selected";}  ?>>Bajo</option>
																<option value="50"  <?php if($key["NIVEL_COMPRENDIDO"] == 50 ){echo "selected";}  ?>>Medio</option>
																<option value="75"  <?php if($key["NIVEL_COMPRENDIDO"] == 75 ){echo "selected";}  ?>>Alto</option>
																<option value="100" <?php if($key["NIVEL_COMPRENDIDO"] == 100 ){echo "selected";}  ?>>Perfecto</option>
																se suma, se divie y se redondea
															</select> 
														</div>
														<div class="col-2"> 
															<label for="porcentaje<?=$cont?>">Porcentaje</label>
															<input type="text" class="form-control form-control-sm estiloCampo" name="porcentaje<?=$cont?>" id="porcentaje<?=$cont?>" placeholder="%" value="<?=$key["PORCENTAJE"]?>%"  readonly="" style="text-align: right;">  
														</div>
													</div> 
												</div>
											</div>
											<div class="row">  
												<div class="col-3"> 
													<label class="" for="cuentacon<?=$cont?>">¿Cuenta Con Certificado?</label>
													<select class="form-control form-control-sm estiloCampo" onchange="tienecertificado($(this).val(),<?=$cont?>)" name="cuentacon<?=$cont?>" id="cuentacon<?=$cont?>">
														<option value="2"  <?php if($key["CERTIFICADOR_INTERNACIONAL"] == 2  ){echo "selected"; $display = "display: none ;";}  ?>>No</option> 
														<option value="1"  <?php if($key["CERTIFICADOR_INTERNACIONAL"] == 1  ){echo "selected"; $display = "display: block ;";}else { $display = "display: none ;";} ?>>Sí</option>
													</select> 
												</div> 
												<div class="col" id="contenedorpregunta<?=$cont?>" style="<?=$display?>">
													<div class="row">
														<div class="col-7">
															<label class=" " for="nombrecertificado<?=$cont?>">¿Cómo se llama su certificado?</label>
															<input type="text" class="form-control form-control-sm estiloCampo" name="nombrecertificado<?=$cont?>" id="nombrecertificado<?=$cont?>" value="<?php if(!empty($key["NOMBRE_CERTIFICADO"])){echo $key["NOMBRE_CERTIFICADO"];}  ?>" > 
														</div>   
														<div class="col mostrarpanelidiomas">
															<div class="row ">
																<div class="col contenedorimagen"> 
																	<img id="imagencertificado<?=$cont?>" src="<?=checkimagen($key["DIRECCION_IMAGEN_CERTIFICADO"])?>" style="width: 100%;"> 
																</div>
															</div>
															<div class="row panelimagenidiomas" style="opacity: 1;">
																<div class="col-2"> 
																	<a onclick="mostrarImagen('<?=$key["DIRECCION_IMAGEN_CERTIFICADO"]?>','imagencertificado<?=$cont?>','inputfilecertificado<?=$cont?>','nombreimagen<?=$cont?>')">
																		<img style="opacity: 1;" src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" >
																	</a> 
																</div> 
																<div class="col">

																</div>

																<div class="col-1">

																	<label  for="inputfilecertificado<?=$cont?>">
																		<img style="opacity: 1;" src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
																	</label>
																</div> 
																<div class="col-1">
																	<img style="opacity: 1;" src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >
																</div> 
															</div> 

															<div class="row panelimagenidiomas" style=" margin-top: 0px; display: none;">  
																<div class="col">
																	<span id="nombreimagen<?=$cont?>"></span>
																</div>

															</div> 
															<input type="file" id="inputfilecertificado<?=$cont?>" hidden=""  name="archivo<?=$cont?>" onchange="previewcertificado(<?=$cont?>);"  />
															<input type="text" name='inputcertificado<?=$cont?>'  id="inputcertificado<?=$cont?>" hidden="" value=""/>  
															<input type="text" name='ididioma<?=$cont?>'  id="ididioma<?=$cont?>" hidden="" value="<?=$key["ID"]?>"/> 
															<input type="text" name='estension<?=$cont?>'  id="estension<?=$cont?>" hidden="" value="0"/> 
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col">
													<span class="linkAccion" onclick="eliminaridiomaaprendido(<?=$cont?>,<?=$key["ID"]?>)">ELIMINAR</span>
												</div>
											</div>
										</div>  
									<?php	  	} }
									if (empty($datos["idiomasaprendidos"])) { $cont= 1; ?>
										<div class="col-12" id="colaprendidos1"> 
											<div class="row mb-4">
												<div class="col">  
													<div class="row">

														<div class="col">  
															<label for="idioma1">Idioma</label> 
															<select class="form-control form-control-sm estiloCampo" name="idioma1" id="idioma1">
																<?php  
																foreach ($datos["lista"] as $keyi ) {
																	?>
																	<option value="<?=$keyi["ID"]?>"  <?php if( $keyi["ID"]== 14  ){echo "selected";}  ?> ><?=$keyi["NOMBRE_IDIOMA"]?></option>
																	<?php

																} ?>


															</select> 
														</div>
														<div class="col"> 
															<label for="hablado1">Hablado</label>
															<select class="form-control form-control-sm estiloCampo"onchange="calculoporcentaje($(this).val(),<?=$cont?>)" name="hablado1" id="hablado1">
																<option value="0">Nulo</option>
																<option value="25">Bajo</option>
																<option value="50">Medio</option>
																<option value="75">Alto</option>
																<option value="100">Perfecto</option>
															</select> 
														</div>
														<div class="col"> 
															<label for="escrito1">Escrito</label>
															<select class="form-control form-control-sm estiloCampo"onchange="calculoporcentaje($(this).val(),<?=$cont?>)" name="escrito1" id="escrito1">
																<option value="0">Nulo</option>
																<option value="25">Bajo</option>
																<option value="50">Medio</option>
																<option value="75">Alto</option>
																<option value="100">Perfecto</option>
															</select> 
														</div>
														<div class="col"> 
															<label for="escuchado1">Ecuchado</label>
															<select class="form-control form-control-sm estiloCampo"onchange="calculoporcentaje($(this).val(),<?=$cont?>)" name="escuchado1" id="escuchado1">
																<option value="0">Nulo</option>
																<option value="25">Bajo</option>
																<option value="50">Medio</option>
																<option value="75">Alto</option>
																<option value="100">Perfecto</option>
															</select> 
														</div>
														<div class="col"> 
															<label for="compredido1" style="font-size: 15px;">Comprendido</label>
															<select class="form-control form-control-sm estiloCampo"onchange="calculoporcentaje($(this).val(),<?=$cont?>)" name="compredido1" id="compredido1">
																<option value="0">Nulo</option>
																<option value="25">Bajo</option>
																<option value="50">Medio</option>
																<option value="75">Alto</option>
																<option value="100">Perfecto</option>
																se suma, se divie y se redondea
															</select> 
														</div>
														<div class="col-3"> 
															<label for="porcentaje1">Porcentaje</label>
															<input type="text" class="form-control form-control-sm estiloCampo" name="porcentaje1" id="porcentaje1" placeholder="%"  readonly="" style="text-align: right;">  
														</div>
													</div> 
												</div>
											</div>
											<div class="row">  
												<div class="col-3"> 
													<label class="" for="cuentacon1">¿Cuenta con Certificado?</label>
													<select class="form-control form-control-sm estiloCampo" onchange="tienecertificado($(this).val(),1)" name="cuentacon1" id="cuentacon1">
														<option value="2">No</option> 
														<option value="1">Sí</option>
													</select> 
												</div> 
												<div class="col" id="contenedorpregunta1" style="display: none ;">
													<div class="row">
														<div class="col-7">
															<label class=" " for="nombrecertificado1">¿Cómo se llama su certificado?</label>
															<input type="text" class="form-control form-control-sm estiloCampo" name="nombrecertificado1" id="nombrecertificado1" > 
														</div>   
														<div class="col">
															<div class="row">
																<div class="col contenedorimagen"> 
																	<img id="imagencertificado1" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
																</div>
															</div>
															<div class="row panelimagenidiomas" style="opacity: 1;">
																<div class="col-2" > 
																	<a onclick="mostrarImagen('','imagencertificado1','inputfilecertificado1','nombreimagen1')">
																		<img style="opacity: 1;"  src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > 
																	</a>
																</div> 
																<div class="col">

																</div>

																<div class="col-1">

																	<label  for="inputfilecertificado1">
																		<img style="opacity: 1;" src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
																	</label>
																</div> 
																<div class="col-1">
																	<img style="opacity: 1;" src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >
																</div> 
															</div> 
															<div class="row panelimagenidiomas" style=" margin-top: 0px; display: none;"> 
																<div class="col">
																	<span id="nombreimagen1"></span>
																</div>

															</div> 
															<input type="file" id="inputfilecertificado1" hidden=""  name="archivo1" onchange="previewcertificado(1);"  />
															<input type="text" name='inputcertificado1'  id="inputcertificado1" hidden="" value=""/>  
															<input type="text" name='ididioma1'  id="ididioma1" hidden="" value="0"/> 
															<input type="text" name='estension1'  id="estension1" hidden="" value="0"/> 
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col">
													<span class="linkAccione" onclick="eliminaridiomaaprendido(1,0)">ELIMINAR</span>
												</div>
											</div>
										</div>  


									<?php  } if($cont == 0){
										$cont= 1;

										?>
										<div class="col-12" id="colaprendidos1"> 
											<div class="row mb-4">
												<div class="col">  
													<div class="row">

														<div class="col">  
															<label for="idioma1">Idioma</label> 
															<select class="form-control form-control-sm estiloCampo" name="idioma1" id="idioma1">
																<?php  
																foreach ($datos["lista"] as $keyi ) {
																	?>
																	<option value="<?=$keyi["ID"]?>"  <?php if( $keyi["ID"]== 2  ){echo "selected";}  ?> ><?=$keyi["NOMBRE_IDIOMA"]?></option>
																	<?php

																} ?>


															</select> 
														</div>
														<div class="col"> 
															<label for="hablado1">Nivel Hablado</label>
															<select class="form-control form-control-sm estiloCampo" onchange="calculoporcentaje($(this).val(),1)" name="hablado1" id="hablado1">
																<option value="0">Nulo</option>
																<option value="25">Bajo</option>
																<option value="50">Medio</option>
																<option value="75">Alto</option>
																<option value="100">Perfecto</option>
															</select> 
														</div>
														<div class="col"> 
															<label for="escrito1">Nivel Escrito</label>
															<select class="form-control form-control-sm estiloCampo" onchange="calculoporcentaje($(this).val(),1)" name="escrito1" id="escrito1">
																<option value="0">Nulo</option>
																<option value="25">Bajo</option>
																<option value="50">Medio</option>
																<option value="75">Alto</option>
																<option value="100">Perfecto</option>
															</select> 
														</div>
														<div class="col"> 
															<label for="escuchado1">Nivel Ecuchado</label>
															<select class="form-control form-control-sm estiloCampo" onchange="calculoporcentaje($(this).val(),1)" name="escuchado1" id="escuchado1">
																<option value="0">Nulo</option>
																<option value="25">Bajo</option>
																<option value="50">Medio</option>
																<option value="75">Alto</option>
																<option value="100">Perfecto</option>
															</select> 
														</div>
														<div class="col"> 
															<label for="compredido1" style="font-size: 15px;">Nivel Comprendido</label>
															<select class="form-control form-control-sm estiloCampo" onchange="calculoporcentaje($(this).val(),1)" name="compredido1" id="compredido1">
																<option value="0">Nulo</option>
																<option value="25">Bajo</option>
																<option value="50">Medio</option>
																<option value="75">Alto</option>
																<option value="100">Perfecto</option>
																se suma, se divie y se redondea
															</select> 
														</div>
														<div class="col-3"> 
															<label for="porcentaje1">Porcentaje</label>
															<input type="text" class="form-control form-control-sm estiloCampo" name="porcentaje1" id="porcentaje1" placeholder="%"  readonly="" style="text-align: right;">  
														</div>
													</div> 
												</div>
											</div>
											<div class="row">  
												<div class="col-3"> 
													<label class="" for="cuentacon1">¿Cuenta usted con un certificado internacional?</label>
													<select class="form-control form-control-sm estiloCampo" onchange="tienecertificado($(this).val(),1)" name="cuentacon1" id="cuentacon1">
														<option value="2">No</option> 
														<option value="1">Si</option>
													</select> 
												</div> 
												<div class="col" id="contenedorpregunta1" style="display: none ;">
													<div class="row">
														<div class="col-7">
															<label class=" " for="nombrecertificado1">¿Cómo se llama su certificado?</label>
															<input type="text" class="form-control form-control-sm estiloCampo" name="nombrecertificado1" id="nombrecertificado1" > 
														</div>   
														<div class="col mostrarpanelidiomas">
															<div class="row">
																<div class="col contenedorimagen"> 
																	<img id="imagencertificado1" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
																</div>
															</div>
															<div class="row panelimagenidiomas" style="opacity: 1;" onclick="mostrarImagen('','imagencertificado1','inputfilecertificado1','nombreimagen1')" >
																<div class="col-2"> 
																	<img style="opacity: 1;" src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > 
																</div> 
																<div class="col">

																</div>

																<div class="col-1">

																	<label  for="inputfilecertificado1">
																		<img style="opacity: 1;" src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
																	</label>
																</div> 
																<div class="col-1">
																	<img style="opacity: 1;" src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >
																</div> 
															</div> 
															<div class="row panelimagenidiomas"  style=" margin-top: 0px; display: none;"> 
																<div class="col">
																	<span id="nombreimagen1"></span>
																</div> 
															</div>
															<input type="file" id="inputfilecertificado1" hidden=""  name="archivo1" onchange="previewcertificado(1);"  />
															<input type="text" name='inputcertificado1'  id="inputcertificado1" hidden="" value=""/>  
															<input type="text" name='ididioma1'  id="ididioma1" hidden="" value="0"/> 
															<input type="text" name='estension1'  id="estension1" hidden="" value="0"/> 
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col">
													<span class="linkAccione" onclick="eliminaridiomaaprendido(1,0)">ELIMINAR</span>
												</div>
											</div>
										</div>  




										<?php


									}
									?> 


								</div>
								<input type="text" name="contador" id="contadoraprendidos" hidden="" value="<?=$cont?>">
							</form>
						</div>
					</div> 
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
				<input type="text" id="cambiomat" hidden="" value="1">
				<input type="text" id="cambioapr" hidden="" value="1">
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
			function calculoporcentaje(valor,lugar) {
				$("#porcentaje"+lugar).val(Math.round(((Number($("#hablado"+lugar).val())+Number($("#escrito"+lugar).val())+Number($("#escuchado"+lugar).val())+Number($("#compredido"+lugar).val()))/4))+"%")
			}

			$('.checkclasdiplo').on("change", function(){

				$("#cambiomat").val(2);

			});
			function previewcertificado(id) 
			{  
				var fileInput = document.getElementById('inputfilecertificado'+id);  
				var files = Array.from(fileInput.files);
				files = files.map(file => file.name);
				console.log(files);
				$("#nombreimagen"+id).html(files);

				nombre = $("#nombreimagen"+id).html().split('.').pop(); 
				$("#estension"+id).val(nombre); 

				var reader = new FileReader();
				reader.onload = function()
				{
					var output = document.getElementById('imagencertificado'+id);

					if(nombre != "pdf" && nombre != "pdf ") {  
						output.src = reader.result;
					} else {
						output.src = "<?=assetgeneral()?>/img/pdf.png";
					}

					$("#inputcertificado"+id).val(reader.result); 
				}
				reader.readAsDataURL(event.target.files[0]); 
			}


		
	function editar() {
		$(".estiloinput").removeClass('estiloinputred');
  	$(".estiloCampo").removeClass('estiloinputred');
				$("#spiner").css('display', 'block');
				$("#imagenguardar").css('display', 'none');
				for (var i =1; i <= $("#contadoridiomas").val(); i++) {
					for (var d =1; d <= $("#contadoridiomas").val(); d++) {
						if ($("#ididiomamaterno"+i).val() != $("#ididiomamaterno"+d).val()) {
							if ($("#idiomamaterno"+i).val() == $("#idiomamaterno"+d).val()) {
								$('#alert').modal('show');
								$("#mensajealerta").html("Se repite "+ $("#idiomamaterno"+i+" option:selected").data('nombre'));
								$("#spiner").css("display","none");
						$("#imagenguardar").css("display","block");
								return ;
							}
						}
						if ($("#ididiomamaterno"+i).val() == 0 && $("#ididiomamaterno"+d).val() == 0) {
							if (i!= d) {
								if ($("#idiomamaterno"+i).val() == $("#idiomamaterno"+d).val()) { 

									$('#alert').modal('show');
									$("#mensajealerta").html("Se repite "+ $("#idiomamaterno"+i+" option:selected").data('nombre'));
									$("#spiner").css("display","none");
						$("#imagenguardar").css("display","block");
									return ;
								}
							}
						}

					} 
				} 
				for (var i =1; i <= $("#contadoraprendidos").val(); i++) {
					if ($("#cuentacon"+i).val() == 1) {
						if ($("#nombrecertificado"+i).val() == "") { 
							$("#nombrecertificado"+i).addClass('estiloinputred')
									$('#alert').modal('show');
									$("#mensajealerta").html("Favor de Poner el Nombre del Certificado");
									$("#spiner").css("display","none");
						$("#imagenguardar").css("display","block");
									return ;
								}
								if ($("#inputcertificado"+i).val() == "" && $("#ididioma"+i).val()  == 0) { 

									$('#alert').modal('show');
									$("#mensajealerta").html("Favor de Subir su Certificado");
									$("#spiner").css("display","none");
						$("#imagenguardar").css("display","block");
									return ;
								}
					}
				}
				var data  = $("#formmaternos").serialize();
				var url = $("#formmaternos").attr('action');
				$.ajax({ 
					type: 'ajax',
					method: 'post',
					url: url,
					async: true, 
					dataType: 'text',
					data: data})
				.done(function(response){  
					if (response == 1) {
						editaraprendidos() 
						return; 
					}
					if(response == 2){
						editaraprendidos()  
						$("#espiner").css("display","none");
						$("#botoncrear").css("display","block");
						return;
					}
					else{
						$('#alert').modal('show');
						$("#mensajealerta").html(response);

					}
				}) ;

				
			}
			function editaraprendidos() { 
				var data  = $("#formaprendidos").serialize();
				var url = $("#formaprendidos").attr('action');
				$.ajax({ 
					type: 'ajax',
					method: 'post',
					url: url,
					async: true, 
					dataType: 'text',
					data: data})
				.done(function(response){  
					if (response == 1) {
						$('#alert').modal('show');
						$("#mensajealerta").html("Se Guardó Correctamente, se Actualizará la Página para Visualizar los Cambios");
						$("#alert").attr("onclick","recargapagina()"); 
						return; 
					}
					if(response == 2){
						$('#alert').modal('show');
						$("#mensajealerta").html("Se Guardó Correctamente, se Actualizará la Página para Visualizar los Cambios");
						$("#alert").attr("onclick","recargapagina()");  
						$("#espiner").css("display","none");
						$("#botoncrear").css("display","block");
						return;
					}
					else{
						$('#alert').modal('show');
						$("#mensajealerta").html(response);

					}
				}) ;
			}



			function eliminaridioma(location,id) {
				if (location !=1) {
					if (id !=0) {
						$.ajax({ 
							type: 'ajax',
							method: 'post',
							url: '<?=base_url('configuracion/idiomas/eliminarmaternos')?>',
							async: true, 
							dataType: 'text',
							data: {id:id}})
						.done(function(response){  
							if (response == 1) {
								$("#mensajealerta").html("Se Elimino Correctamente, se actualizara la pagina para visualizar los cambios");
								$("#alert").attr("onclick","recargapagina()"); 
							}

						}) ;
					}
					$("#colidiomas"+location).remove();
				}
				if (location ==1 && id != 0) {
					$.ajax({ 
						type: 'ajax',
						method: 'post',
						url: '<?=base_url('configuracion/idiomas/eliminarmaternos')?>',
						async: true, 
						dataType: 'text',
						data: {id:id}})
					.done(function(response){  
						recargapagina()

					}) ;
				}
			}

			function eliminaridiomaaprendido(location,id) {
				if (location !=1) {
					if (id !=0) {
						$.ajax({ 
							type: 'ajax',
							method: 'post',
							url: '<?=base_url('configuracion/idiomas/eliminaraprendidos')?>',
							async: true, 
							dataType: 'text',
							data: {id:id}})
						.done(function(response){  
							if (response == 1) {
								$('#alert').modal('show');
								$("#mensajealerta").html("Se Eliminó Correctamente, se Recomineda Actualizar la Página para Visualizar los Cambios");
								$("#alert").attr("onclick","recargapagina()");  
							}

						}) ;
					}
					$("#colaprendidos"+location).remove();
				}
				if (location ==1 && id != 0) {
					$.ajax({ 
						type: 'ajax',
						method: 'post',
						url: '<?=base_url('configuracion/idiomas/eliminaraprendidos')?>',
						async: true, 
						dataType: 'text',
						data: {id:id}})
					.done(function(response){  
						recargapagina()

					}) ;
				}

			}

			function tienecertificado(valor,id) {
				if (valor == 1) {
					$("#contenedorpregunta"+id).css("display","block");
				}
				if (valor == 2) {
					$("#contenedorpregunta"+id).css("display","none");
				}
			}

			function agregaridiomamaterno() {
				var zona = document.getElementById("contenedoridiomas");
				var div = $('div[id^="colidiomas"]:last');

				var num  = parseInt( div.prop("id").match(/(\d+)/g), 10 ) +1;  
				var clondiv  = div.clone().prop('id', 'colidiomas'+num );



				var  x=		 '<input type="text" name="ididiomamaterno'+num+'" id="ididiomamaterno'+num+'" value="0" hidden="">';
				x+='<select class="form-control form-control-sm estiloCampo"name="idiomamaterno'+num+'" id="idiomamaterno'+num+'">';
				x+=									'	<?php $cuenta= 0; foreach ($datos["lista"] as $key ) { $cuenta++;?>';
				x+=		'<option value="<?=$key["ID"]?>" data-nombre="<?=$key["NOMBRE_IDIOMA"]?>" <?php if($key["ID"] == 2  ){echo "selected";}  ?> ><?=$key["NOMBRE_IDIOMA"]?></option>';
				'<?php 	} ?>'


				x+=										'</select> ';
				x+='<span class="menosspan" onclick="eliminaridioma('+num+')" id="eliminaridioma1" style="margin: 5px 0px 0px 10px; background: transparent;"><img src="<?=assetgeneral()?>/img/delete.png" style="max-height: 26px;"></span>'; 
			//aqui es donde le dices donde vas a poner el clon
			clondiv.appendTo(zona) ;
			 //lo vacias el div con los elementos dentro
			 $( "#colidiomas"+num).empty();
			 //insertas el string en el html
			 $( "#colidiomas"+num).html(x); 
			 $("#contadoridiomas").val(num);
			 $("#idiomasquedomina").val(Number($("#idiomasquedomina").val())+Number(1));
			 $("#cambiomat").val(2);
			}

			function agregaraprendido() {
				var zona = document.getElementById("contenedoaprendidos");
				var div = $('div[id^="colaprendidos"]:last');

				var num  = parseInt( div.prop("id").match(/(\d+)/g), 10 ) +1;  
				var clondiv  = div.clone().prop('id', 'colaprendidos'+num );

				var x ='<div class="row mb-4">';
				x+='								<div class="col">'; 
				x+='									<div class="row">';
				x+='										<div class="col">  ';
				x+='											<label for="idioma'+num+'">Idioma</label>';
				x+=										'	<select class="form-control form-control-sm estiloCampo" name="idioma'+num+'" id="idioma'+num+'">';
				x+=								'<?php   	foreach ($datos["lista"] as $keyi ) {  ?> ';
				x+=								'<option value="<?=$keyi["ID"]?>" ';
				x+=					'<?php if( $keyi["ID"]== 2  ){echo "selected";}  ?> >';
				x+=					'<?=$keyi["NOMBRE_IDIOMA"]?></option> <?php } ?>';
				x+=								' </select> ';
				x+='										</div>';
				x+='										<div class="col"> ';
				x+='											<label for="hablado'+num+'">Hablado</label>';
				x+='											<select class="form-control form-control-sm estiloCampo" onchange="calculoporcentaje($(this).val(),'+num+')"  name="hablado'+num+'" id="hablado'+num+'">';
				x+='												<option value="0">Nulo</option>';
				x+='												<option value="25">Bajo</option>';
				x+='												<option value="50">Medio</option>';
				x+='												<option value="75">Alto</option>';
				x+='												<option value="100">Perfecto</option>';
				x+='											</select> ';
				x+='										</div>';
				x+='										<div class="col"> ';
				x+='											<label for="escrito'+num+'">Escrito</label>';
				x+='											<select class="form-control form-control-sm estiloCampo" onchange="calculoporcentaje($(this).val(),'+num+')"  name="escrito'+num+'" id="escrito'+num+'">';
				x+='												<option value="0">Nulo</option>';
				x+='												<option value="25">Bajo</option>';
				x+='												<option value="50">Medio</option>';
				x+='												<option value="75">Alto</option>';
				x+='												<option value="100">Perfecto</option>';
				x+='											</select> ';
				x+='										</div>';
				x+='										<div class="col"> ';
				x+='											<label for="escuchado'+num+'">Ecuchado</label>';
				x+='											<select class="form-control form-control-sm estiloCampo" onchange="calculoporcentaje($(this).val(),'+num+')"  name="escuchado'+num+'" id="escuchado'+num+'">';
				x+='												<option value="0">Nulo</option>';
				x+='												<option value="25">Bajo</option>';
				x+='												<option value="50">Medio</option>';
				x+='												<option value="75">Alto</option>';
				x+='												<option value="100">Perfecto</option>';
				x+='											</select> ';
				x+='										</div>';
				x+='										<div class="col"> ';
				x+='											<label for="compredido'+num+'" style="font-size: 15px;">Comprendido</label>';
				x+='											<select class="form-control form-control-sm estiloCampo" onchange="calculoporcentaje($(this).val(),'+num+')"  name="compredido'+num+'" id="compredido'+num+'">';
				x+='												<option value="0">Nulo</option>';
				x+='												<option value="25">Bajo</option>';
				x+='												<option value="50">Medio</option>';
				x+='												<option value="75">Alto</option>';
				x+='												<option value="100">Perfecto</option>'; 
				x+='											</select> ';
				x+='										</div>';
				x+='										<div class="col"> ';
				x+='											<label for="porcentaje'+num+'">Porcentaje</label>';
				x+='									 <input type="text" class="form-control form-control-sm estiloCampo" name="porcentaje'+num+'" id="porcentaje'+num+'" placeholder="%"  readonly="" style="text-align: right;">  ';
				x+='										</div>';
				x+='									</div> ';
				x+='								</div>';
				x+='							</div>';
				x+='							<div class="row">  ';
				x+='								<div class="col-3"> ';
				x+='									<label class="" for="cuentacon'+num+'">¿Cuenta con Certificado?</label>';
				x+='									<select class="form-control form-control-sm estiloCampo" onchange="tienecertificado($(this).val(),'+num+')" name="cuentacon'+num+'" id="cuentacon'+num+'">';
				x+='										<option value="2">No</option> ';
				x+='										<option value="1">Si</option>';
				x+='									</select> ';
				x+='								</div> ';
				x+='								<div class="col" id="contenedorpregunta'+num+'" style="display: none;">';
				x+='									<div class="row">';
				x+='										<div class="col-7">';
				x+='											<label class=" " for="nombrecertificado'+num+'">¿Cómo se llama su certificado?</label>';
				x+='											<input type="text" class="form-control form-control-sm" name="nombrecertificado'+num+'" id="nombrecertificado'+num+'" > ';
				x+='										</div>   ';
				x+='										<div class="col mostrarpanelidiomas">';
				x+='											<div class="row">';
				x+='												<div class="col contenedorimagen"> ';
				x+='													<img id="imagencertificado'+num+'" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> ';
				x+='												</div>';
				x+='											</div>';
				x+='											<div class="row panelimagenidiomas" style="opacity: 1;" >';
				x+='												<div class="col-2"  onclick="mostrarImagen(' + "''," + "'imagencertificado"+num+"'," + "'inputfilecertificado"+num+"'" +  ",'nombreimagen"+ num + "'"  +');"' +' > ';
				x+='													<img style="opacity: 1;" src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > ';
				x+='												</div> '; 
				x+=												'<div class="col">'; 
				x+=												'</div>';
				x+='												<div class="col-1">'; 
				x+='													<label  for="inputfilecertificado'+num+'">';
				x+='														<img style="opacity: 1;" src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >';
				x+='													</label>';
				x+='												</div> ';
				x+='												<div class="col-1">';
				x+='													<img style="opacity: 1;" src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >';
				x+='												</div> ';
				x+='											</div> ';

				x+='											<div class="row panelimagenidiomas" style=" margin-top: 0px; display: none;">'; 
				x+=												'<div class="col">';
				x+=													'<span id="nombreimagen'+num+'"></span>';

				
				x+=												'</div>'; 
				x+='											</div> ';
				x+='											<input type="file" id="inputfilecertificado'+num+'" hidden=""  name="archivo'+num+'" onchange="previewcertificado('+num+');"  />';
				x+='											<input type="text" name="inputcertificado'+num+'"  id="inputcertificado'+num+'" hidden="" value=""/>  ';
				x+='											<input type="text" name="ididioma'+num+'"  id="ididioma'+num+'" hidden="" value="0"/> ';
				x+='<input type="text" name="estension'+num+'"  id="estension'+num+'" hidden="" value=""/> '
				x+='										</div>';
				x+='									</div>';
				x+='								</div>';
				x+='							</div>';
				x+='								<div class="row">';
				x+=								'<div class="col">';
				x+=									'<span class="linkAccione" onclick="eliminaridiomaaprendido('+num+',0)">ELIMINAR</span>';
				x+=								'</div>';
				x+=							'</div>';


		//aqui es donde le dices donde vas a poner el clon
		clondiv.appendTo(zona) ;
			 //lo vacias el div con los elementos dentro
			 $( "#colaprendidos"+num).empty();
			 //insertas el string en el html
			 $( "#colaprendidos"+num).html(x);

			 $("#contadoraprendidos").val(num);
			 $("#idiomasquedomina").val(Number($("#idiomasquedomina").val())+Number(1));

			}
			function recargapagina() {
				location.href = "<?=base_url('/configuracion/idiomas')?>";
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

</script>