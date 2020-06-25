<div id="contenidocambiante  " data-id="9" style="margin-top: 20px"> 
 
	<div class="editarflotante"> 
		<button type="button" class="botoneditaredicion" onclick="recargapagina()">
			<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/RESTAURAR.svg"> 
		</button> 
		<button type="button" class="botoneditaredicion" onclick="editars()">
			<div class="spinner-border text-light" id="spiner" role="status" style="display: none;">
				<span class="sr-only">Loading...</span>
			</div>
			<img id="imagenguardar" alt="Guardar" src="<?=assetmiperfil()?>/img/ICONOS/SVG/GUARDAR.svg">
		</button>  
	</div> 
	<div class="row contents  ">
		<div class="col"  >
			<div class="row align-items-end text-center" >
				<div class="col-4 letratituloedicion" style="border-left: 3px solid #e6e6e6">
					<span>Foto Oficial de Perfil</span>
				</div>
				<div class="col-8 letratituloedicion" style="border-left: 3px solid #e6e6e6">
					Álbumes						
				</div>
			</div>
			<div class="row">
				<div class="col-4 "  style="border-left: 3px solid #e6e6e6; ">
					<div class="mt-2 mb-2 mostrarpanelalbum">
						<div class="row rowmod contenedorimage"  >
							<img id="imgoficial"  src="<?=checkimagen($datos["fotos"][0]["DIRECCION_DOCUMENTO"])?>" class="img-fluid" alt="" style="height: 19em;" >
						</div>
						<div class="estealbum">
							<div class="row rowmod panelimagenalbum">
								<div class="col-1">
									<a href="#" onclick="mostrarfoto('<?=checkimagen($datos["fotos"][0]["DIRECCION_DOCUMENTO"])?>')">
										<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" >
									</a> 
								</div>
								<div class="col">
								</div>
								<div class="col-1">

								</div>
								<div class="col-1">
									
								</div>
								<div class="col-1">
									<label class="labelsform"  for="inputfilefoficial"  >
										<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
									</label>
									<!-- <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  > -->
								</div>
							</div>
							<div class="row rowmod panelimagenalbum">
								<div class="col" style=" word-wrap: break-word;" >
									<span id="nombreoficial"></span>
								</div>
							</div>
						</div>
						<form id="formfotooficial" action="<?=base_url('configuracion/albumprofesional/agregarfotooficial')?>" hidden="">
							<input type="file" id="inputfilefoficial" hidden=""  name="archivo" onchange="previewfotos('inputfilefoficial','inputoficial','estensionoficial','imgoficial','nombreoficial');" accept=".jpg,.png,.jpeg"  />
							<input type="text" name="inputoficial"  id="inputoficial" hidden="" value=""/>
							<input type="text" name="estensionoficial"  id="estensionoficial" hidden="" value=""/> 
							<input type="text" name="idoficial"  id="idoficial" hidden="" value="<?=$datos["fotos"][0]["ID"]?>"/>

						</form>
					</div>
				</div>
				<div class="col-8" style="border-left: 3px solid #e6e6e6; ">
					<div class="row mt-2 mb-2">
						<div class="col">
							<div class="card-deck">
								<div class="card carta" >
									<div class="card-header bg-transparent cartacabezacomplto mostrarpanelalbumpeque"  >
										<img src="<?=checkimagen($datos["fotos"][1]["DIRECCION_DOCUMENTO"])?>" class=" cartaimgscompleto " id="imguniform">
										<div class="estealbumpeque">
											<div class="row rowmod panelimagenalbumpeque">
												<div class="col-1">
													<a href="#" onclick="mostrarfoto('<?=checkimagen($datos["fotos"][1]["DIRECCION_DOCUMENTO"])?>')">
														<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" >
													</a> 
												</div>
												<div class="col">
												</div>
												<div class="col-1">

												</div>
												<div class="col-1">
													
												</div>
												<div class="col-1">
													<label class="labelsform"  for="inputfileuniform"  >
														<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
													</label>
													<!-- <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  > -->
												</div>
											</div>
											<div class="row rowmod panelimagenalbumpeque">
												<div class="col" style=" word-wrap: break-word;" >
													<span id="nombreuniform"></span>
												</div>
											</div>
										</div>
										<form id="formuniform" action="<?=base_url('configuracion/albumprofesional/agregaruniform')?>" hidden="">
											<input type="file" id="inputfileuniform" hidden=""  name="archivo" onchange="previewfotos('inputfileuniform','inputuniform','estensionuniform','imguniform','nombreuniform');" accept=".jpg,.png,.jpeg"  />
											<input type="text" name="inputuniform"  id="inputuniform" hidden="" value=""/>
											<input type="text" name="estensionuniform"  id="estensionuniform" hidden="" value=""/>
											<input type="text" name="iduniform"  id="iduniform" hidden="" value="<?=$datos["fotos"][1]["ID"]?>"/>
										</form>
									</div>
									<div class="card-body cartacuerpo">
										<h5 class="cartatitulo">Foto uniformado de cuerpo completo</h5>
										<!-- <small class="text-muted">1/1</small> -->

										<p class="card-text"></p>
									</div>
								</div>
								<div class="card carta">
									<div class="card-header bg-transparent cartacabezacomplto mostrarpanelalbumpeque"  >
										<img src="<?=checkimagen($datos["fotos"][2]["DIRECCION_DOCUMENTO"])?>" class=" cartaimgscompleto" id="imginfantil">
										<div class="estealbumpeque">
											<div class="row rowmod panelimagenalbumpeque">
												<div class="col-1">
													<a href="#" onclick="mostrarfoto('<?=checkimagen($datos["fotos"][2]["DIRECCION_DOCUMENTO"])?>')">
														<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" >
													</a> 
												</div>
												<div class="col">
												</div>
												<div class="col-1">

												</div>
												<div class="col-1">
													
												</div>
												<div class="col-1">
													<label class="labelsform"  for="inputfileinfantil"  >
														<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
													</label>
													<!-- <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  > -->
												</div>
											</div>
											<div class="row rowmod panelimagenalbumpeque">
												<div class="col" style=" word-wrap: break-word;" >
													<span id="nombreinfantil"></span>
												</div>
											</div>
										</div>
										<form id="forminfantil" action="<?=base_url('configuracion/albumprofesional/agregarinfantil')?>" hidden="">
											<input type="file" id="inputfileinfantil" hidden=""  name="archivo" onchange="previewfotos('inputfileinfantil','inpuinfantil','estensioninfantil','imginfantil','nombreinfantil');" accept=".jpg,.png,.jpeg"  />
											<input type="text" name="inpuinfantil"  id="inpuinfantil" hidden="" value=""/>
											<input type="text" name="estensioninfantil"  id="estensioninfantil" hidden="" value=""/>
											<input type="text" name="idinfantil"  id="idinfantil" hidden="" value="<?=$datos["fotos"][2]["ID"]?>"/>
										</form>
									</div>
									<div class="card-body cartacuerpo">
										<h5 class="cartatitulo">Foto tamaño infantil</h5>
										<!-- <small class="text-muted">1/1</small> -->

										<p class="card-text"></p>
									</div>
								</div>

								<div class="card carta">
									
									<div class="card-header bg-transparent cartacabeza" >

										<div class="row" id="contenedorplatillosclasicos" style="margin:auto;" >
											<?php $cont = 0; $display = 'style="display: none;"'; if (!empty($datos["imgclasicos"])) { $display = 'style="display: block;"';

											foreach ($datos["imgclasicos"] as $key){ ?>
												<div class="col-4 colmod">
													<label for="ideliminarclasico<?=$cont?>">
														<img src="<?=$key["DIRECCION_IMAGEN"]?>" class=" cartaimgs" id="imggclasico<?=$cont?>">
														<span id="" hidden=""></span> 
														<input class="checkeleiminar" type="checkbox" name="ideliminarclasico<?=$cont?>" id="ideliminarclasico<?=$cont?>" value="<?=$key["ID"]?>">
													</label>
												</div>
												<?php $cont++; } } ?>
												<div class="col-4 colmod" id="contenedorplatilloclasico">
													<label class="labelsform"  for="inputfileplatilloclasico"  >
														<img src="<?=assetgeneral()?>/img/masgris.png" class=" cartaimgs" alt="...">
													</label> 
												</div>
											</div>
											<input type="file" id="inputfileplatilloclasico" hidden=""  name="archivo" onchange="preview_image('inputfileplatilloclasico','nombreplatilloclasico','inputplatillosclasicos','estensionplatillosclasicos','idplatilloclasico','formplatillosclasicos','contenedorplatillosclasicos',0,'contenedorplatilloclasico','contadorplatillosclasico');" accept=".jpg,.png,.jpeg" multiple  />
										</div>
										<form id="formplatillosclasicos" action="<?=base_url('configuracion/albumprofesional/agregarplatilloclasico')?>" hidden="">
											<input type="text" name="contadorplatillosclasico"  id="contadorplatillosclasico" hidden="" value="0"/>
										</form>
										<div class="card-body cartacuerpo">
											<h5 class="cartatitulo">Platillos Clásicos</h5>
											<small class="veryeliminar" <?=$display?> >
												<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg"  onclick="mostrar('contenedorplatillosclasicos','Platillos Clasicos','imggclasico',<?=$cont?>)">
												<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg" onclick="eliminarPlatillos('contenedorplatillosclasicos','ideliminarclasico',<?=$cont?>)" >
											</small> 

										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row mt-2 mb-2">
							<div class="col">
								<div class="card-deck">
									<div class="card carta">
										<div class="card-header bg-transparent cartacabeza" >

											<div class="row" id="contenedorplatillosautorias" style="margin:auto;" >
												<?php $cont = 0; $display = 'style="display: none;"'; if (!empty($datos["imgautoria"])) { $display = 'style="display: block;"';

												foreach ($datos["imgautoria"] as $key){ ?>
													<div class="col-4 colmod">
														<label for="ideliminarautoria<?=$cont?>">
															<img src="<?=$key["DIRECCION_IMAGEN"]?>" class=" cartaimgs" id="imggautoria<?=$cont?>">
															<span id="" hidden=""></span> 
															<input class="checkeleiminar" type="checkbox" name="ideliminarautoria<?=$cont?>" id="ideliminarautoria<?=$cont?>" value="<?=$key["ID"]?>">
														</label>
													</div>
													<?php $cont++; } } ?>
													<div class="col-4 colmod" id="contenedorplatilloautoria">
														<label class="labelsform"  for="inputfileplatilloautoria"  >
															<img src="<?=assetgeneral()?>/img/masgris.png" class=" cartaimgs" alt="...">
														</label> 
													</div>
												</div>
												<input type="file" id="inputfileplatilloautoria" hidden=""  name="archivo" onchange="preview_image('inputfileplatilloautoria','nombreplatilloautoria','inputplatillosautorias','estensionplatillosautorias','idplatilloautoria','formplatillosautorias','contenedorplatillosautorias',0,'contenedorplatilloautoria','contadorplatillosautoria');" accept=".jpg,.png,.jpeg" multiple  />
											</div>
											<form id="formplatillosautorias" action="<?=base_url('configuracion/albumprofesional/agregarplatilloautoria')?>" hidden="">
												<input type="text" name="contadorplatillosautoria"  id="contadorplatillosautoria" hidden="" value="0"/>
											</form>
											<div class="card-body cartacuerpo">
												<h5 class="cartatitulo">Platillos de Autoría</h5>
												<small class="veryeliminar" <?=$display?> >
													<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg"  onclick="mostrar('contenedorplatillosautorias','Platillos de Autoria','imggautoria',<?=$cont?>)">
													<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg" onclick="eliminarPlatillos('contenedorplatillosautorias','ideliminarautoria',<?=$cont?>)"  >
												</small> 
											</div>
										</div>
										<div class="card carta">
											<div class="card-header bg-transparent cartacabeza" >

												<div class="row" id="contenedorpersonajes" style="margin:auto;" >
													<?php $cont = 0; $display = 'style="display: none;"'; if (!empty($datos["imgpersonajes"])) { $display = 'style="display: block;"';

												foreach ($datos["imgpersonajes"] as $key){ ?>
													<div class="col-4 colmod">
														<label for="ideeliminarpersonaje<?=$cont?>">
															<img src="<?=$key["DIRECCION_IMAGEN"]?>" class=" cartaimgs" id="imggpersonaje<?=$cont?>">
															<span id="" hidden=""></span> 
															<input class="checkeleiminar" type="checkbox" name="ideeliminarpersonaje<?=$cont?>" id="ideeliminarpersonaje<?=$cont?>" value="<?=$key["ID"]?>">
														</label>
													</div>
													<?php $cont++; } } ?>
													<div class="col-4 colmod" id="contenedorpersonaje">
														<label class="labelsform"  for="inputfilepersonaje"  >
															<img src="<?=assetgeneral()?>/img/masgris.png" class=" cartaimgs" alt="...">
														</label> 
													</div>
												</div>
												<input type="file" id="inputfilepersonaje" hidden=""  name="archivo" onchange="preview_image('inputfilepersonaje','nombrepersonaje','inputpersonajes','estensionpersonajes','idpersonaje','formpersonajes','contenedorpersonajes',0,'contenedorpersonaje','contadorpersonaje');" accept=".jpg,.png,.jpeg" multiple  />
											</div>

											<form id="formpersonajes" action="<?=base_url('configuracion/albumprofesional/agregarpersonaje')?>" hidden="">
												<input type="text" name="contadorpersonaje"  id="contadorpersonaje" hidden="" value="0"/>
											</form>
											<div class="card-body cartacuerpo">
												<h5 class="cartatitulo">Personalidades Gastronómicas</h5>
												<small class="veryeliminar" <?=$display?> >
													<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg"  onclick="mostrar('contenedorpersonajes','Personajes Gastronomicos','imggpersonaje',<?=$cont?>)">
													<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg" onclick="eliminarPersonajes('contenedorpersonajes','ideeliminarpersonaje',<?=$cont?>)"  >
												</small> 
												<p class="card-text"></p>
											</div>
										</div>

										<div class="card carta">
											<div class="card-header bg-transparent cartacabeza"  >
												<div class="row" style="margin: auto;">
													<?php
													$display = 'style="display: none;"';
													if (!empty($datos["imgconcursos"])) {

														$cont = 0; $display = 'style="display: block;"';

														foreach ($datos["imgconcursos"] as $key){
															if($key["dirimagen"] != ""){  ?>
																<div class="col-4 colmod">
																	<img src="<?= $key["dirimagen"] ?>" class=" cartaimgs" id="imgmconcursos<?=$cont?>">
																</div>
																<?php $cont++; } } } ?>	
												</div>
											</div>
											<div class="card-body cartacuerpo">
												<h5 class="cartatitulo">Concursos de Cocina</h5>
												 <small class="veryeliminar" <?=$display?> >
													<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg"  onclick="mostrar('','Concursos de Cocina','imgmconcursos',<?=$cont?>)">
													 
												</small> 

												<p class="card-text"></p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row mt-2 mb-2">
								<div class="col">
									<div class="card-deck">
										<div class="card carta">
											<div class="card-header bg-transparent cartacabeza"  >
												<div class="row" style="margin: auto;">

													<?php 
													$display = 'style="display: none;"';
													if (!empty($datos["imgfestivales"])) {

														$cont = 0; $display = 'style="display: block;"';

														foreach ($datos["imgfestivales"] as $key){
															if($key["dirimagen"] != ""){  ?>
														<div class="col-4 colmod">
															<img src="<?=  $key["dirimagen"] ?>" class=" cartaimgs" id="imgmfestivales<?=$cont?>">
														</div>
												<?php $cont++; } } } ?>	
												</div>
											</div>
											<div class="card-body cartacuerpo">
												<h5 class="cartatitulo">Festivales Gastronómicos</h5>
												 <small class="veryeliminar" <?=$display?> >
													<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg"  onclick="mostrar('','Festivales Gastronomicos','imgmfestivales',<?=$cont?>)">
													 
												</small> 
											</div>
										</div>
										<div class="card carta">
											<div class="card-header bg-transparent cartacabeza"  >
												<div class="row" style="margin: auto;">

													<?php 
													$display = 'style="display: none;"';
													if (!empty($datos["imgponencias"])) {

														$cont = 0; $display = 'style="display: block;"';

														foreach ($datos["imgponencias"] as $key){
															if($key["dirimagen"] != ""){  ?>
														<div class="col-4 colmod">
															<img src="<?= $key["dirimagen"] ?>" class=" cartaimgs" id="imgmponencias<?=$cont?>">
														</div>
														<?php $cont++; } } } ?>	
												</div>
											</div>
											<div class="card-body cartacuerpo">
												<h5 class="cartatitulo">Ponencias</h5>
												 <small class="veryeliminar" <?=$display?> >
													<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg"  onclick="mostrar('','Ponencias','imgmponencias',<?=$cont?>)">
													 </small> 
												<p class="card-text"></p>
											</div>
										</div>
										<div class="card carta">
											<div class="card-header bg-transparent cartacabeza"  >
												<div class="row" style="margin: auto;">

													<?php 
													$display = 'style="display: none;"';
													if (!empty($datos["imgrecspeciales"])) {

														$cont = 0; $display = 'style="display: block;"';

														foreach ($datos["imgrecspeciales"] as $key){
															if($key["dirimagen"] != ""){  ?>
														<div class="col-4 colmod">
															<img src="<?= $key["dirimagen"]  ?>" class=" cartaimgs" id="imgmespeciales<?=$cont?>">
														</div>
													<?php $cont++; } } } ?>	
												</div>
											</div>
											<div class="card-body cartacuerpo">
												<h5 class="cartatitulo">Reconocimientos Especiales</h5>
												 <small class="veryeliminar" <?=$display?> >
													<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg"  onclick="mostrar('','Reconocimientos Especiales','imgmespeciales',<?=$cont?>)">
													 
												</small> 
												<p class="card-text"></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>


				</div> 
			</div> 
		</div>
		<div class="modal fade" id="fotos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"   aria-hidden="true"  >
			<div class="modal-dialog modal-dialog-centered " role="document">
				<div class="modal-content"> 
					<div class="modal-header">
						<h5 class="modal-title" id="titulo"></h5> 
					</div>
					<div class="modal-body" style="text-align: center;"> 
						<img src="" id="modalfoto">

					</div>
					<div class="modal-footer">
						<button type="button" class="btn  " id="botonconfirm" data-dismiss="modal"  style="color: white; background-color: #239dff">Aceptar</button> 

					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="imagenes" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"   aria-hidden="true"  >
			<div class="modal-dialog modal-dialog-centered " role="document">
				<div class="modal-content"> 
					<div class="modal-header">
						<h5 class="modal-title" id="titulo">Mensaje del sistema</h5> 
					</div>
					<div class="modal-body" >
						<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner" id="mostrarimagenes">
								<div class="carousel-item active">
									 
								</div> 
							</div>
							<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn  " id="botonconfirm" data-dismiss="modal"  style="color: white; background-color: #239dff">Aceptar</button> 

					</div>
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

		<script type="text/javascript">
			 modalfoto
			 function mostrarfoto(src) 
			{  
				$("#modalfoto").attr('src',src);
		$('#fotos').modal('show');
				 
			}

			function previewfotos(tipofile,tipoinput,tipoestension,tipoimg,tiponombre) 
			{  
				var fileInput = document.getElementById(tipofile);  
				var files = Array.from(fileInput.files);
				files = files.map(file => file.name);
				console.log(files);
				$("#"+tiponombre).html(files);

				nombre = $("#"+tiponombre).html().split('.').pop(); 
				$("#"+tipoestension).val(nombre); 

				var reader = new FileReader();
				reader.onload = function()
				{
					var output = document.getElementById(tipoimg);
					output.src = reader.result;
					$("#"+tipoinput).val(reader.result); 
				}
				reader.readAsDataURL(event.target.files[0]);

				setTimeout(function(){
					if (nombre == "pdf") {
						$("#"+tipoimg).attr("src","<?=assetgeneral()?>/img/pdf.png");
						return;
					} },50) ; 
			}

			function preview_image(inputfile,nombre,input,estension,identi,form,contenedor,contador,iniciador,contadorelemtos) 
			{
		//Obtemenos la cantidad de elementos que vamos a cargar
		var total_file =document.getElementById(inputfile).files.length;
		//Con esto, podemos saber los nombres de los archivs, esto para obtner su extension
		var nombre_file =document.getElementById(inputfile);

		//este nos da un array de los nombres
		var files = Array.from(nombre_file.files);
		//el mapeo
		files = files.map(file => file.name);
		 
		 
		console.log(files);
		//eliminamos el mas
		$("#"+iniciador).remove();
		//Primero creamos los elemenos que vamos a mostrarta en un contenedor y los input en otro que sera el form


		for(var i=0;i<total_file;i++)
		{
			var x ='<div class="col-4 colmod">';
			x+=	'<img src="'+URL.createObjectURL(event.target.files[i])+'" class=" cartaimgs"  ">';
			x+='<span id="'+nombre+(i+contador)+'" hidden=""></span>';
			x+='</div>';

			$('#'+contenedor).append(x);
			$("#"+nombre+(i+contador)).html(files[i]);


			var b ='';
			b += ' <input type="text" name="'+input+(i+contador)+'"  id="'+input+(i+contador)+'"   value=""/>';
			b+= ' <input type="text" name="'+estension+(i+contador)+'"  id="'+estension+(i+contador)+'"   value=""/>';
			b+= ' <input type="text" name="'+identi+(i+contador)+'"  id="'+identi+(i+contador)+'"   value="0"/>';
			$('#'+form).append(b);
		}
		//volvemos agregarlo al final para simular que podemos seguir agregando
		var x ='<div class="col-4 colmod" id="'+iniciador+'">';
		x+=		'<label class="labelsform"  for="'+inputfile+'"  >';
		x+=			'<img src="<?=assetgeneral()?>/img/masgris.png" class=" cartaimgs" alt="...">';
		x+=		'</label> ';
		x+=	'</div>';
		$('#'+contenedor).append(x);

		//este sera ocupado para contener nuestros base 64 de cada uno
		var arraycontbase64 = [];
		for(i=0; i < total_file ; i++) {

			//optenemos el nombre y de ahi spliteamos el ultimo para obtener la extenesion
			var ext = $("#"+nombre+(i+contador)).html().split('.').pop(); 
			//console.log(ext);
			// la metemos en el val de estenesion
			$("#"+estension+(i+contador)).val(ext); 

			//esto es para obtener el base64 de cada imagen, solo puede ser otenido mientras la carga
			const reader = new FileReader();
			reader.onload = function()
			{ 
				//metemos cada base 64 en un array
				arraycontbase64.push(reader.result);
				// console.log(reader.result); 
				
			}
			
			reader.readAsDataURL(event.target.files[i]);
		} 
		
		//Es necesario darle un ligero delay para que los elementos puedan ser leidos y asi insertar el array
		setTimeout(function(){
			//contamos la cantidad de un arraya
			var contadorarray = arraycontbase64.length;
			for (i = 0; i < contadorarray; i++) {
				$("#"+input+(i+contador)).val(arraycontbase64[i]); 
			} },1000) ; 
		$("#"+inputfile).attr("onchange","preview_image('"+inputfile+"','"+nombre+"','"+input+"','"+estension+"','"+identi+"','"+form+"','"+contenedor+"',"+(total_file+Number(contador))+",'"+iniciador+"','"+contadorelemtos+"')");
		$("#"+contadorelemtos).val((total_file+Number(contador)));

	}

	function eliminarPlatillos (contenido,checkEliminar,contador) {

		for (var i = 0; i < contador; i++) {
			var id = $("input:checkbox[id="+checkEliminar+i+"]:checked").val();
			if(id!=null) {
				$.ajax({ 
			         type: 'ajax',
			         method: 'post',
			         url: '<?=base_url('configuracion/Albumprofesional/eliminarplatilloclasico')?>',
			         async: false, 
			         data: {id: id},
			         success: function(response){ 
			            recargapagina();
			         },
			         error: function () {
			            
			         }
			      });
			}else {
				//alert("nohay"+i);
				
			}
		}
	}

	function eliminarPersonajes (contenido,checkEliminar,contador) {

		for (var i = 0; i < contador; i++) {
			var id = $("input:checkbox[id="+checkEliminar+i+"]:checked").val();
			if(id!=null) {
				$.ajax({ 
			         type: 'ajax',
			         method: 'post',
			         url: '<?=base_url('configuracion/Albumprofesional/EliminarPersonaje')?>',
			         async: false, 
			         data: {id: id},
			         success: function(response){ 
			            recargapagina();
			         },
			         error: function () {
			            
			         }
			      });
			}else {
				//alert("nohay"+i);
				
			}
		}
	}

	function mostrar(contenido,titulo,imagenes,contador) {


		var contenido = "";
		
		for (var i = 0; i < contador; i++) {
			var activo = "";
			if (i == 0) {
				activo = "active";
			}
			contenido +=	'<div class="carousel-item '+activo+'">';
			contenido +=						'<img src="'+$("#"+imagenes+i).attr("src")+'" class="d-block w-100" alt="...">';
			contenido +=					'</div> ';

		}
		$("#titulo").html(titulo);
		$("#mostrarimagenes").html(contenido);
		$('#imagenes').modal('show');
	}

	$('.carousel').carousel({
		interval: false
	})

	function editars() {

		var data  = $("#formfotooficial").serialize();
		var url = $("#formfotooficial").attr('action');
		$("#imagenguardar").css("display", "none");
		$("#spiner").css("display", "block");
		$.ajax({ 
			type: 'ajax',
			method: 'post',
			url: url,
			async: true, 
			data: data,
			success: function(response){ 
				if (response == 1) {

					agregarfotouniforme()
					return ;
				}
				if (response == 2) {

					agregarfotouniforme()
					return ;
				}if (response == "") {
					$('#alert').modal('show');
					$("#mensajealerta").html("Ocurrio un problema al agregar/editar Foto oficial");
					$("#alert").attr("onclick","recargapagina()"); 
					return ;
				}
				else{
					$('#alert').modal('show');
					$("#mensajealerta").html(response); 
				}
			},
			error: function () {
				alert('Hubo un error, intente mas tarde');
				$("#imagenguardar").css("display", "block");
				$("#spiner").css("display", "none");
			}
		}) ;  
		
	}
	function agregarfotouniforme() {

		var data  = $("#formuniform").serialize();
		var url = $("#formuniform").attr('action');
		$("#imagenguardar").css("display", "none");
		$("#spiner").css("display", "block");
		$.ajax({ 
			type: 'ajax',
			method: 'post',
			url: url,
			async: true, 
			data: data,
			success: function(response){ 
				if (response == 1) {

					agregarfotoinfantil()
					return ;
				}
				if (response == 2) {

					agregarfotoinfantil()
					return ;
				}if (response == "") {
					$('#alert').modal('show');
					$("#mensajealerta").html("Ocurrio un problema al agregar/editar Foto Uniformado");
					$("#alert").attr("onclick","recargapagina()"); 
					return ;
				}
				else{
					$('#alert').modal('show');
					$("#mensajealerta").html(response); 
				}
			},
			error: function () {
				alert('Hubo un error, intente mas tarde');
				$("#imagenguardar").css("display", "block");
				$("#spiner").css("display", "none");
			}
		}) ;  
		
	}
	function agregarfotoinfantil() {

		var data  = $("#forminfantil").serialize();
		var url = $("#forminfantil").attr('action');
		$("#imagenguardar").css("display", "none");
		$("#spiner").css("display", "block");
		$.ajax({ 
			type: 'ajax',
			method: 'post',
			url: url,
			async: true, 
			data: data,
			success: function(response){ 
				if (response == 1) {

					agregarplatilloclasico()
					return ;
				}
				if (response == 2) {

					agregarplatilloclasico()
					return ;
				}if (response == "") {
					$('#alert').modal('show');
					$("#mensajealerta").html("Ocurrio un problema al agregar/editar Foto infantil");
					$("#alert").attr("onclick","recargapagina()"); 
					return ;
				}
				else{
					$('#alert').modal('show');
					$("#mensajealerta").html(response); 
				}
			},
			error: function () {
				alert('Hubo un error, intente mas tarde');
				$("#imagenguardar").css("display", "block");
				$("#spiner").css("display", "none");
			}
		}) ;  

	}
	function agregarplatilloclasico() {

		var data  = $("#formplatillosclasicos").serialize();
		var url = $("#formplatillosclasicos").attr('action');
		$("#imagenguardar").css("display", "none");
		$("#spiner").css("display", "block");
		$.ajax({ 
			type: 'ajax',
			method: 'post',
			url: url,
			async: true, 
			data: data,
			success: function(response){ 
				if (response == 1) {

					agregarplatilloautoria()
					return ;
				}
				if (response == 2) {
					agregarplatilloautoria()

					return ;
				}if (response == "") {
					$('#alert').modal('show');
					$("#mensajealerta").html("Ocurrio un problema al agregar/editar los Concursos");
					$("#alert").attr("onclick","recargapagina()"); 
					return ;
				}
				else{
					$('#alert').modal('show');
					$("#mensajealerta").html(response); 
				}
			},
			error: function () {
				alert('Hubo un error, intente mas tarde');
				$("#imagenguardar").css("display", "block");
				$("#spiner").css("display", "none");
			}
		}) ;  

	}
	function agregarplatilloautoria() {

		var data  = $("#formplatillosautorias").serialize();
		var url = $("#formplatillosautorias").attr('action');
		$("#imagenguardar").css("display", "none");
		$("#spiner").css("display", "block");
		$.ajax({ 
			type: 'ajax',
			method: 'post',
			url: url,
			async: true, 
			data: data,
			success: function(response){ 
				if (response == 1) {

					agregarpersonaje()
					return ;
				}
				if (response == 2) {

					agregarpersonaje()
					return ;
				}if (response == "") {
					$('#alert').modal('show');
					$("#mensajealerta").html("Ocurrio un problema al agregar/editar los Concursos");
					$("#alert").attr("onclick","recargapagina()"); 
					return ;
				}
				else{
					$('#alert').modal('show');
					$("#mensajealerta").html(response); 
				}
			},
			error: function () {
				alert('Hubo un error, intente mas tarde');
				$("#imagenguardar").css("display", "block");
				$("#spiner").css("display", "none");
			}
		}) ;  
	} 

	function agregarpersonaje() {

		var data  = $("#formpersonajes").serialize();
		var url = $("#formpersonajes").attr('action');
		$("#imagenguardar").css("display", "none");
		$("#spiner").css("display", "block");
		$.ajax({ 
			type: 'ajax',
			method: 'post',
			url: url,
			async: true, 
			data: data,
			success: function(response){ 
				if (response == 1) {
					$('#alert').modal('show');
					$("#mensajealerta").html("Se Agregaron Correctamente las Imágenes");
					$("#alert").attr("onclick","recargapagina()");

					return ;
				}
				if (response == 2) {
					$('#alert').modal('show');
					$("#mensajealerta").html("Se Editaron Correctamente las Imágenes");
					$("#alert").attr("onclick","recargapagina()");


					return ;
				}if (response == "") {
					$('#alert').modal('show');
					$("#mensajealerta").html("Ocurrio un problema al agregar/editar los Concursos");
					$("#alert").attr("onclick","recargapagina()"); 
					return ;
				}
				else{
					$('#alert').modal('show');
					$("#mensajealerta").html(response); 
				}
			},
			error: function () {
				alert('Hubo un error, intente mas tarde');
				$("#imagenguardar").css("display", "block");
				$("#spiner").css("display", "none");
			}
		}) ;  

	}

	function recargapagina() {
		location.href = "<?=base_url('/configuracion/albumprofesional')?>";
	}
</script>
<script type="text/javascript">

/* checar luego
    function previewimasociasion() 
   {    

   	 var file = $('#inputfilefoficial')[0].files[0];
    if(file) {
      orientation(file, function(base64img, value) {
        $('#imagen').attr('src', base64img);
        console.log(rotation[value]);
        var rotated = $('#imagen2').attr('src', base64img);
         var rotated = $('#inputfoficial').val(base64img);
         
         
        if(value) {
          rotated.css('transform', rotation[value]);
        }
      });
    }


    
    
   }


   var rotation = {
  1: 'rotate(0deg)',
  3: 'rotate(180deg)',
  6: 'rotate(90deg)',
  8: 'rotate(270deg)'
};
function _arrayBufferToBase64( buffer ) {
  var binary = ''
  var bytes = new Uint8Array( buffer )
  var len = bytes.byteLength;
  for (var i = 0; i < len; i++) {
    binary += String.fromCharCode( bytes[ i ] )
  }
  return window.btoa( binary );
} 



var orientation = function (file, callback) {
    var fileReader = new FileReader();
    fileReader.onloadend = function () {
        var base64img = "data:" + file.type + ";base64," + _arrayBufferToBase64(fileReader.result);
        var scanner = new DataView(fileReader.result);
        var idx = 0;
        var value = 1; // Non-rotated is the default
        if (fileReader.result.length < 2 || scanner.getUint16(idx) != 0xFFD8) {
            // Not a JPEG
            if (callback) {
                callback(base64img, value);
            }
            return;
        }
        idx += 2;
        var maxBytes = scanner.byteLength;
        var littleEndian = false;
        while (idx < maxBytes - 2) {
            var uint16 = scanner.getUint16(idx, littleEndian);
            idx += 2;
            switch (uint16) {
                case 0xFFE1: // Start of EXIF
                    var endianNess = scanner.getUint16(idx + 8);
                    // II (0x4949) Indicates Intel format - Little Endian
                    // MM (0x4D4D) Indicates Motorola format - Big Endian
                    if (endianNess === 0x4949) {
                        littleEndian = true;
                    }
                    var exifLength = scanner.getUint16(idx, littleEndian);
                    maxBytes = exifLength - idx;
                    idx += 2;
                    break;
                case 0x0112: // Orientation tag
                    // Read the value, its 6 bytes further out
                    // See page 102 at the following URL
                    // http://www.kodak.com/global/plugins/acrobat/en/service/digCam/exifStandard2.pdf
                    value = scanner.getUint16(idx + 6, littleEndian);
                    maxBytes = 0; // Stop scanning
                    break;
            }
        }
        if (callback) {
            callback(base64img, value);
        }
    }
    fileReader.readAsArrayBuffer(file);
};*/
</script>