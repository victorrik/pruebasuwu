<div id="contenidocambiante" data-id="5"> 

	<div class="editarflotante">

		<button type="button" class="botoneditaredicion" onclick="recargapagina()">

			<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/RESTAURAR.svg"> 

		</button> 

		

		<button type="button" class="botoneditaredicion" onclick="edicion()">

			<div class="spinner-border text-light" id="spiner" role="status" style="display: none;">

				<span class="sr-only">Loading...</span>

			</div>

			<img id="imagenguardar" src="<?=assetmiperfil()?>/img/ICONOS/SVG/GUARDAR.svg">

		</button>  



	</div> 

	<div class="row mt-2" style="  margin-top: 20px;">

		<div class="col">

			<div class="box" >

				<div class="box-header ">

					<div class="row">

						<div class="col-3 letratituloedicion">

							<span>Formación Académica</span>

						</div>

						<div class="col-9 lineainferiorosita" style="text-align: right;">

							

						</div>

					</div> 

					<div class="row pt-3">

						<div class="col letratituloedicion">



						</div> 

						<div class="col-5" style="text-align: right;"> 

							<span class="linkAccion"  onclick="agregarformacion()">AGREGAR FORMACIÓN</span>

						</div>  

					</div>

				</div>

				<form id="formformacion" action="<?=base_url('configuracion/formacionacademica/edicion')?>">

					<div id="cajasuperior">

						<?php if (!empty($datos['formacion'])) { $cont = 0 ; $contradorformacion = count($datos['formacion']);



						foreach ($datos['formacion'] as $key) { $cual = 0; $cont++; ?>



							<div class="box-body mb-4" id="caja<?=$cont?>" style="border-bottom: 2px solid #e3e3e3e3;">

								<div class="row" >



									<div class="col-3"> 

										<label class="nombreCampo" for="nivelacademico<?=$cont?>">Nivel Académico</label>

										<select   class="form-control estiloCampo" name="nivelacademico<?=$cont?>" id="nivelacademico<?=$cont?>" > 

											<option value="1" <?php if($key["NIVEL_ACADEMICO"] == "TECNICO SUPERIOR"){echo "selected";}  ?> >Técnico Superior</option>

											<option value="2" <?php if($key["NIVEL_ACADEMICO"] == "LICENCIATURA"){echo "selected";}  ?> >Licenciatura</option>

											<option value="3" <?php if($key["NIVEL_ACADEMICO"] == "MAESTRIA"){echo "selected";}  ?> >Maestría</option>

											<option value="4" <?php if($key["NIVEL_ACADEMICO"] == "DOCTORADO"){echo "selected";}  ?> >Doctorado</option>

										</select>

									</div>

									<div class="col"> 

										<label class="nombreCampo" for="nombrecarrera<?=$cont?>">Nombre de la Carrera</label>

										<input  type="text" class="form-control estiloCampo" name="nombrecarrera<?=$cont?>" id="nombrecarrera<?=$cont?>" value="<?=$key["NOMBRE_CARRERA"]?>"> 

									</div>

									<div class="col"> 

										<label class="nombreCampo" for="nombreinstitucion<?=$cont?>">Nombre de la Institución</label>

										<input  type="text" class="form-control estiloCampo" name="nombreinstitucion<?=$cont?>" id="nombreinstitucion<?=$cont?>"  value="<?=$key["NOMBRE_INSTITUCION"]?>"> 

									</div>

									<div class="col-2"> 

										<label class="nombreCampo" for="estatuscademico<?=$cont?>">Estatus Académico</label>

										<select   class="form-control estiloCampo"  id="estatuscademicoregistrado<?=$cont?>"     disabled ="">  

											<option value="1" <?php if($key["ESTATUS_ACADEMICO"] == "EGRESADO"){echo "selected"; $cual=1;} ?>  >Egresado</option>

											<option value="2" <?php if($key["ESTATUS_ACADEMICO"] == "TRUNCA"){echo "selected"; $cual=2;} ?>  >Abandonado / Trunco</option>

											<option value="3" <?php if($key["ESTATUS_ACADEMICO"] == "ACTUALMENTE CURSANDO"){echo "selected"; $cual=3;} ?>  >Estudiante Activo</option>

										</select> 

										<input  type="text" class="form-control estiloCampo" name="estatuscademico<?=$cont?>" id="estatuscademico<?=$cont?>" hidden=""  value="<?=$cual?>"> 

									</div>

								</div>



								<div class="row">



									<div class="col-2"> 

										<label class="nombreCampo" for="duracionanos<?=$cont?>">Duración en Años</label>

										<input  type="text" class="form-control estiloCampo numero" name="duracionanos<?=$cont?>" id="duracionanos<?=$cont?>" value="<?=$key["DURACION"]?>" onchange="calculosem($(this).val(),<?=$cont?>,$('#dividida<?=$cont?>').val());calculogeneracion($('#generacioninicio<?=$cont?>').val(),<?=$cont?>)"> 

									</div>

									<div class="col-2">								

										<label class="nombreCampo" for="dividida<?=$cont?>">Dividida en:</label>

										<select   class="form-control estiloCampo" name="dividida<?=$cont?>" id="dividida<?=$cont?>" onchange="divisionsemestres($(this).val(),<?=$cont?>,$('#duracionanos<?=$cont?>').val())" style="padding-left: 5px">  

											<option value="1" <?php if($key["DIVIDIDA"] == "BIMESTRE"){echo "selected"; $segmento = "Bimestre"; $dividida = 6;} ?> >Bimestres</option>

											<option value="2" <?php if($key["DIVIDIDA"] == "TRIMESTRE"){echo "selected"; $segmento = "Trimestre"; $dividida = 4;} ?> >Trimestres</option>

											<option value="3" <?php if($key["DIVIDIDA"] == "CUATRIMESTRE"){echo "selected"; $segmento = "Cuatrimestre"; $dividida = 3;} ?> >Cuatrimestres</option>

											<option value="4" <?php if($key["DIVIDIDA"] == "SEMESTRE"){echo "selected"; $segmento = "Semestre"; $dividida = 2;} ?> >Semestres</option>

											<option value="5" <?php if($key["DIVIDIDA"] == "AÑO"){echo "selected"; $segmento = "Año"; $dividida = 1;} ?> >Años</option>

										</select> 

									</div>

									<div class="col-2">								

										<label class="nombreCampo" for="numsemestres<?=$cont?>">N° de  <span id="division<?=$cont?>"><?=$segmento?></span></label> 

										<select   class="form-control estiloCampo " name="numsemestres<?=$cont?>" id="numsemestres<?=$cont?>" onchange="desem($(this).val(),<?=$cont?>)">

											<?php  for ($i=1; $i <= ($key["DURACION"]*$dividida); $i++) { ?>

												<option value="<?=$i?>" <?php if($key["NUMERO"] == $i){echo "selected"; } ?> ><?=$i?></option>

											<?php } ?>

										</select> 

									</div>

									<div class="col"> 

										<label class="nombreCampo" for="pais<?=$cont?>">País</label> 

										<input  type="text" class="form-control estiloCampo" name="pais<?=$cont?>" id="pais<?=$cont?>" value="<?=$key["PAIS"]?>">   

									</div>

									<div class="col"> 

										<label class="nombreCampo" for="estado<?=$cont?>">Estado</label> 

										<input  type="text" class="form-control estiloCampo" name="estado<?=$cont?>" id="estado<?=$cont?>"value="<?=$key["ESTADO"]?>" >   

									</div>

									<div class="col"> 

										<label class="nombreCampo" for="ciudad<?=$cont?>">Ciudad</label> 

										<input  type="text" class="form-control estiloCampo" name="ciudad<?=$cont?>" id="ciudad<?=$cont?>" value="<?=$key["CIUDAD"]?>">

										<input type="text" name='idformacion<?=$cont?>'  id="idformacion<?=$cont?>" hidden="" value="<?=$key["ID"]?>"/>  

									</div>



								</div>

								<div class="row" id="zona<?=$cont?>" style="margin-top: 20px;"  > </div>

								<div class="row">

									<div class="col">

										<span class="linkAccione" onclick="eliminar(<?=$cont?>,<?=$key["ID"]?>)">ELIMINAR</span>

									</div>

								</div>

							</div>



							<?php

						}	}

						else{ $contradorformacion =1; ?>

							<div class="box-body mb-4" id="caja1" style="border-bottom: 2px solid #e3e3e3e3;">



								<div class="row" ><!--zona base -->



									<div class="col-3"> 

										<label class="nombreCampo" for="nivelacademico1">Nivel Académico</label>

										<select   class="form-control estiloCampo" name="nivelacademico1" id="nivelacademico1" >

											<option disabled="" selected="" hidden=""></option>

											<option value="1">Técnico Superior</option>

											<option value="2" >Licenciatura</option>

											<option value="3" >Maestría</option>

											<option value="4" >Doctorado</option>

										</select>

									</div>

									<div class="col"> 

										<label class="nombreCampo" for="nombrecarrera1">Nombre de la Carrera</label>

										<input  type="text" class="form-control estiloCampo" name="nombrecarrera1" id="nombrecarrera1" > 

									</div>

									<div class="col"> 

										<label class="nombreCampo" for="nombreinstitucion1">Nombre de la Institución</label>

										<input  type="text" class="form-control estiloCampo" name="nombreinstitucion1" id="nombreinstitucion1" > 

									</div>

									<div class="col-2"> 

										<label class="nombreCampo" for="estatuscademico1">Estatus Académico</label>

										<select   class="form-control estiloCampo" name="estatuscademico1" id="estatuscademico1" onchange="estatuscadaemico($(this).val(),1)" > 

											<option disabled="" selected="" hidden=""></option>

											<option value="1" >Egresado</option>

											<option value="2" >Abandonado / Trunco</option>

											<option value="3" >Estudiante Activo</option>

										</select> 

									</div>

								</div>



								<div class="row">



									<div class="col-2"> 

										<label class="nombreCampo" for="duracionanos1">Duración en Años</label>

										<input  type="text" class="form-control estiloCampo numero" name="duracionanos1" id="duracionanos1" onchange="calculosem($(this).val(),1,$('#dividida1').val());calculogeneracion($('#generacioninicio1').val(),1)"> 

									</div>

									<div class="col-2">								

										<label class="nombreCampo" for="dividida1">Dividida en:</label>

										<select   class="form-control estiloCampo" name="dividida1" id="dividida1" onchange="divisionsemestres($(this).val(),1,$('#duracionanos1').val())" style="padding-left: 5px">

											<option disabled="" selected="" hidden=""></option> 

											<option value="1" >Bimestres</option>

											<option value="2" >Trimestres</option>

											<option value="3" >Cuatrimestres</option>

											<option value="4" >Semestres</option>

											<option value="5" >Años</option>

										</select> 

									</div>

									<div class="col-2">								

										<label class="nombreCampo" for="numsemestres1">N° de <span id="division1"></span></label> 

										<select   class="form-control estiloCampo " name="numsemestres1" id="numsemestres1" onchange="desem($(this).val(),1)"> 

										</select> 

									</div>

									<div class="col"> 

										<label class="nombreCampo" for="pais1">País</label> 

										<input  type="text" class="form-control estiloCampo" name="pais1" id="pais1" >   

									</div>

									<div class="col"> 

										<label class="nombreCampo" for="estado1">Estado</label> 

										<input  type="text" class="form-control estiloCampo" name="estado1" id="estado1" >   

									</div>

									<div class="col"> 

										<label class="nombreCampo" for="ciudad1">Ciudad</label> 

										<input  type="text" class="form-control estiloCampo" name="ciudad1" id="ciudad1" >

										<input type="text" name='idformacion1'  id="idformacion1" hidden="" value="0"/>  

									</div>



								</div><!--fin zona base -->

								<div class="row" id="zona1" style="margin-top: 20px;"><!--zona de tablas -->







								</div>

								<div class="row">

									<div class="col">

										<span class="linkAccione" onclick="eliminar(1,0)">ELIMINAR</span>

									</div>

								</div>



							</div>

						<?php	}?>

					</div>

					<input type="text" name="contadorformacion"  id="contadorformacion" hidden="" value="<?=$contradorformacion?>">

				</form>

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



	$(document).ready(function(){



		$('.numero').mask('0000');

		$('.cedula').mask('00000000000000000000');

	});



	$(window).on("mouseover", function(){



		$('.numero').mask('0000');

		$('.cedula').mask('00000000000000000000');

	});



	$(window).on("load", function(){



		var cont = $("#contadorformacion").val();



		setTimeout(function(){ 
					for (var i = 1; i <= cont; i++) { 
						var semestres = $("#numsemestres"+i).val();
						var actual = $("#dividida"+i).val();
						var iden = $('#idformacion'+i).val();
						var valor = $('#estatuscademicoregistrado'+i).val();
						var anos = $('#duracionanos'+i).val();
						if (iden != 0  ) { 
							$.ajax({ 
								type: 'ajax',
								method: 'post',
								datatype: 'text',
								async: false,
								url: '<?=base_url('configuracion/formacionacademica/consultaporestatus')?>',  
								data: {valor: valor,
									id: iden,
									semestres: semestres,
									actual: actual,
									posicion: i,
									anos: anos},
								})
							.done(function(response){
								$("#zona"+i).html(response);
							}) ;
						}
					}
				},50) ;
			});
			function edicion() {
				$(".estiloinput").removeClass('estiloinputred');
				$(".estiloCampo").removeClass('estiloinputred');
				var valor = 0;
				for (var i = 1; i <= $("#contadorformacion").val(); i++) { 
					if ($("#nivelacademico"+i).val() == "") {
						valor = 1
						$("#nivelacademico"+i).addClass('estiloinputred')
					}
					if ($("#nombrecarrera"+i).val() == "") {
						valor = 1
						$("#nombrecarrera"+i).addClass('estiloinputred')
					}
					if ($("#duracionanos"+i).val() == "") {
						valor = 1
						$("#duracionanos"+i).addClass('estiloinputred')
					}
					if ($("#dividida"+i).val() == "") {
						valor = 1
						$("#dividida"+i).addClass('estiloinputred')
					}
					if ($("#numsemestres"+i).val() == "") {
						valor = 1
						$("#numsemestres"+i).addClass('estiloinputred')
					}
					if ($("#nombreinstitucion"+i).val() == "") {
						valor = 1
						$("#nombreinstitucion"+i).addClass('estiloinputred')
					}
					if ($("#ciudad"+i).val() == "") {
						valor = 1
						$("#ciudad"+i).addClass('estiloinputred')
					}
					if ($("#estado"+i).val() == "") {
						valor = 1
						$("#estado"+i).addClass('estiloinputred')
					}
					if ($("#pais"+i).val() == "") {
						valor = 1
						$("#pais"+i).addClass('estiloinputred')
					}
					if ($("#estatuscademico"+i).val() == "") {
						valor = 1
						$("#estatuscademico"+i).addClass('estiloinputred')


			}



		}



		if (valor != 0) {

			$('#alert').modal('show');

			$("#mensajealerta").html("Favor de Llenar los Campos Marcados");

			return;

		}



		var data  = $("#formformacion").serialize();

		var url = $("#formformacion").attr('action');

		$("#spiner").css("display","block");

		$("#imagenguardar").css("display","none");

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

				$("#mensajealerta").html("Se Guardó Correctamente, se actualizará la página para visualizar los cambios");

				$("#alert").attr("onclick","recargapagina()");

				$("#spiner").css("display","none");

				$("#imagenguardar").css("display","block");  return;

			}

			if(response == 2){

				$('#alert').modal('show');

				$("#mensajealerta").html("Se Guardo Correctamente, se actualizará la página para visualizar los cambios");

				$("#alert").attr("onclick","recargapagina()");  

				$("#spiner").css("display","none");

				$("#imagenguardar").css("display","block");return;

			}

			else{

				$('#alert').modal('show');

				$("#mensajealerta").html(response); 

				$("#spiner").css("display","none");

				$("#imagenguardar").css("display","block"); 



			} 

		}) ;

	}

	function eliminar(location,id) {

		if (location !=1) {

			if (id !=0) { 

				$.ajax({ 

					type: 'ajax',

					method: 'post',

					url: '<?=base_url('configuracion/formacionacademica/eliminar')?>',

					async: true, 

					dataType: 'text',

					data: {id:id}})

				.done(function(response){  

					if (response == 1) {

						alert("done");

					}



				}) ;

			}

			$("#caja"+location).remove();

		}

		if (location ==1 && id !=0) {

			$.ajax({ 

				type: 'ajax',

				method: 'post',

				url: '<?=base_url('configuracion/formacionacademica/eliminar')?>',

				async: true, 

				dataType: 'text',

				data: {id:id}})

			.done(function(response){  

				if (response == 1) {

					recargapagina();

				}



			}) ;

		}



	}

	function divisionsemestres(valor,id,duracionanos) {

		if (valor == 1) {

			$('#division'+id).html('Bimestres'); 

			$('#actual'+id).html('Bimestre'); 

		}

		if (valor == 2) {

			$('#division'+id).html('Trimestres'); 

			$('#actual'+id).html('Trimestre'); 

		}

		if (valor == 3) {

			$('#division'+id).html('Cuatrimestres');

			$('#actual'+id).html('Cuatrimestre');

		}

		if (valor == 4) {

			$('#division'+id).html('Semestres'); 

			$('#actual'+id).html('Semestre'); 

		}

		if (valor == 5) {

			$('#division'+id).html('Años'); 

			$('#actual'+id).html('Año'); 

		}



		calculosem(duracionanos,id,valor);

	}

	function calculosem(anos,id,divida) {

		$("#numsemestres"+id).empty();



		if (divida == 1) {

			anos = anos * 6;

		}

		if (divida == 2) {

			anos = anos * 4;

		}

		if (divida == 3) {

			anos = anos * 3;

		}

		if (divida == 4) {

			anos = anos * 2;

		}

		if (divida == 5) {

			anos = anos * 1;

		}



		var x = '';

		for (var i = 1; i <= anos; i++) {

			x+=	'<option value="'+i+'"   >'+i+'</option> '

		}





		$("#numsemestres"+id).html(x);

		$("#cantidadsem"+id).html(anos);

		

	}

	function desem(semestres,id) {

		$("#semestreactual"+id).empty();

		var x = '';

		for (var i = 1; i <= semestres; i++) {

			x+=	'<option value="'+i+'"   >'+i+'</option> '

		}

		

		$("#semestreactual"+id).html(x);

		$("#cantidadsem"+id).html(semestres);

	}



	function calculogeneracion(ano,id) {

		$("#generaciontermino"+id).empty();

		var duracion  = Number($("#duracionanos"+id).val());



		var x = "";

		for (var i = ano; i <= (Number(ano)+Number(duracion)); i++) {

			x+=	'<option value="'+i+'"   >'+i+'</option> '

		}



		$("#generaciontermino"+id).html(x);

		

	}

	function calculoabandono(ano,id) {

		$("#anoabandono"+id).empty();

		var duracion  = Number($("#duracionanos"+id).val());



		var x = "";

		for (var i = ano; i <= (Number(ano)+Number(duracion)); i++) {

			x+=	'<option value="'+i+'"   >'+i+'</option> '

		}



		$("#anoabandono"+id).html(x);

		

	}



	function previewtitulo(id) 

	{  

		var fileInput = document.getElementById('inputfiletitulo'+id);  

		var files = Array.from(fileInput.files);

		files = files.map(file => file.name);

		console.log(files);

		$("#nombreimagentitulo"+id).html(files);



		nombre = $("#nombreimagentitulo"+id).html().split('.').pop(); 

		$("#estensiontitulo"+id).val(nombre); 



		var reader = new FileReader();

		reader.onload = function()

		{

			var output = document.getElementById('imagentitulo'+id);

			output.src = reader.result;

			$("#inputtitulo"+id).val(reader.result); 

		}

		reader.readAsDataURL(event.target.files[0]); 



		setTimeout(function(){

			if (nombre == "pdf") {

				$("#imagentitulo"+id).attr("src","<?=assetgeneral()?>/img/pdf.png");

				return;

			} },50) ;

	}





	function previewcedula(id) 

	{  

		var fileInput = document.getElementById('inputfilecedula'+id);  

		var files = Array.from(fileInput.files);

		files = files.map(file => file.name);

		console.log(files);

		$("#nombreimagencedula"+id).html(files);



		nombre = $("#nombreimagencedula"+id).html().split('.').pop(); 

		$("#estensioncedula"+id).val(nombre); 



		var reader = new FileReader();

		reader.onload = function()

		{

			var output = document.getElementById('imagencedula'+id);

			output.src = reader.result;

			$("#inputcedula"+id).val(reader.result); 

		}

		reader.readAsDataURL(event.target.files[0]); 

		setTimeout(function(){

			if (nombre == "pdf") {

				$("#imagencedula"+id).attr("src","<?=assetgeneral()?>/img/pdf.png");

				return;

			} },50) ;



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





  function tenetitulo(valor,id) {

  	if (valor == 1) {

  		$("#contenedortitulo"+id).css("display","block");

  	}

  	if (valor == 2) {

  		$("#contenedortitulo"+id).css("display","none");

  	}

  }

  function tenecedula(valor,id) {

  	if (valor == 1) {

  		$("#contenedorcedula"+id).css("display","block");

  		$(".niumcedula"+id).css("display","block");

  	}

  	if (valor == 2) {

  		$("#contenedorcedula"+id).css("display","none");

  		$(".niumcedula"+id).css("display","none");

  	}

  }

  function agregarformacion()

  {



  	var c = "'";

		// recibimos el elemento que inicie el id con ^= "elementoclonable"

		var div = $('div[id^="caja"]:last');  



	  // leemos el numero del id pd: es necesario tener numero en tu elemento si quieres clonardiferens ids e incremento

	  // And increment that number by 1

	  var num  = parseInt( div.prop("id").match(/\d+/g), 10 ) +1; 



	  //clonamos el elemento y le asignamos las propiedades

	  var clondiv = div.clone().prop('id','caja'+num  ); 
	  	  var  x=						'<div class="row" > ';
	  	  x+=							'<div class="col-3"> ';
	  	  x+=								'<label class="nombreCampo" for="nivelacademico'+num+'">Nivel Académico</label>';
	  	  x+=								'<select   class="form-control estiloCampo" name="nivelacademico'+num+'" id="nivelacademico'+num+'" >';
	  	  x+=									'<option disabled="" selected="" hidden=""></option>';
	  	  x+=									'<option value="1">Técnico Superior</option>';
	  	  x+=									'<option value="2" >Licenciatura</option>';
	  	  x+=									'<option value="3" >Maestría</option>';
	  	  x+=									'<option value="4" >Doctorado</option>';
	  	  x+=								'</select>';
	  	  x+=							'</div>';
	  	  x+=							'<div class="col"> ';
	  	  x+=								'<label class="nombreCampo" for="nombrecarrera'+num+'">Nombre de la Carrera</label>';
	  	  x+=								'<input  type="text" class="form-control estiloCampo" name="nombrecarrera'+num+'" id="nombrecarrera'+num+'" > ';
	  	  x+=							'</div>';
	  	  x+=							'<div class="col"> ';
	  	  x+=								'<label class="nombreCampo" for="nombreinstitucion'+num+'">Nombre de la Institución</label>';
	  	  x+=								'<input  type="text" class="form-control estiloCampo" name="nombreinstitucion'+num+'" id="nombreinstitucion'+num+'" > ';
	  	  x+=							'</div>';
	  	  x+=							'<div class="col-2"> ';
	  	  x+=								'<label class="nombreCampo" for="estatuscademico'+num+'">Estatus Académico</label>';
	  	  x+=								'<select   class="form-control estiloCampo" name="estatuscademico'+num+'" id="estatuscademico'+num+'" onchange="estatuscadaemico($(this).val(),'+num+')" > ';
	  	  x+=									'<option disabled="" selected="" hidden=""></option>';
	  	  x+=									'<option value="1" >Egresado</option>';
	  	  x+=									'<option value="2" >Abandonado / Trunco</option>';
	  	  x+=									'<option value="3" >Estudiante Activo</option>';
	  	  x+=								'</select> ';
	  	  x+=							'</div>';
	  	  x+=						'</div>';
	  	  x+=						'<div class="row">';
	  	  x+=							'<div class="col-2"> ';
	  	  x+=									'<label class="nombreCampo" for="duracionanos'+num+'">Duración en Años</label>';
	  	  x+=									'<input  type="text" class="form-control estiloCampo numero" name="duracionanos'+num+'" id="duracionanos'+num+'" onchange="calculosem($(this).val(),'+num+',$('+c+'#dividida'+num+c+').val())" > ';
	  	  x+=							'</div>';
	  	  x+=							'<div class="col-2">								';
	  	  x+=									'<label class="nombreCampo" for="dividida'+num+'">Dividida en:</label>';   
	  	  x+=									'<select   class="form-control estiloCampo" name="dividida'+num+'" id="dividida'+num+'" onchange="divisionsemestres($(this).val(),'+num+',$('+c+'#duracionanos'+num+c+').val())" style="padding-left: 5px"> ';
	  	  x+=									'<option disabled="" selected="" hidden=""></option>';
	  	  x+=									'<option value="1" >Bimestres</option>';
	  	  x+=									'<option value="2" >Trimestres</option>';
	  	  x+=									'<option value="3" >Cuatrimestres</option>';
	  	  x+=									'<option value="4" >Semestres</option>';
	  	  x+=									'<option value="5" >Años</option>';
	  	  x+=								'</select> ';
	  	  x+=							'</div>';
	  	  x+=							'<div class="col-2">								';
	  	  x+=									'<label class="nombreCampo" for="numsemestres'+num+'">N° de <span id="division'+num+'"></span></label>';
	  	  x+=	'	  <select   class="form-control estiloCampo " name="numsemestres'+num+'" id="numsemestres'+num+'" onchange="desem($(this).val(),'+num+')">'; 
	  	  x+=	                  '</select>';
	  	  x+=							'</div>';
	  	  x+=							'<div class="col"> ';
	  	  x+=								'<label class="nombreCampo" for="pais'+num+'">País</label> ';
	  	  x+=									'<input  type="text" class="form-control estiloCampo" name="pais'+num+'" id="pais'+num+'" >   ';
	  	  x+=							'</div>';
	  	  x+=							'<div class="col"> ';
	  	  x+=								'<label class="nombreCampo" for="estado'+num+'">Estado</label> ';
	  	  x+=									'<input  type="text" class="form-control estiloCampo" name="estado'+num+'" id="estado'+num+'" >   ';
	  	  x+=							'</div>';
	  	  x+=							'<div class="col"> ';
	  	  x+=								'<label class="nombreCampo" for="ciudad'+num+'">Ciudad</label> ';
	  	  x+=									'<input  type="text" class="form-control estiloCampo" name="ciudad'+num+'" id="ciudad'+num+'" >   ';
	  	  x+= 										'<input type="text" name="idformacion'+num+'"  id="idformacion'+num+'" hidden="" value="0"/>  ';
	  	  x+=							'</div>';
	  	  x+=						'</div> ';
	  	  x+=						'<div class="row" id="zona'+num+'" style="margin-top: 20px;"> '; 
	  	  x+=						'</div>';
	  	  x+=  						'<div class="row">';
	  	  x+=							'<div class="col">';
	  	  x+=									'<span class="linkAccione" onclick="eliminar('+num+',0)">ELIMINAR</span>';

	  x+=								'</div>';

	  x+=						'</div>';











		  // Finally insert $klon wherever you want

		  clondiv.appendTo("#cajasuperior") ;

		 //lo vacias el div con los elementos dentro

		 $( "#caja"+num).empty();

			 //insertas el string en el html

			 $( "#caja"+num).html(x);

			 $( "#contadorformacion").val(num);



			}



			function estatuscadaemico(valor,id) {



				if (valor == 1) {

					var x=		'<div class="col" id="">';

					x+=								'<div class="row">';

					x+=									'<div class="col-3"> ';

					x+=										'<label class="nombreCampo" >Generación</label>';

					x+=										'<div style="display: flex;">';

					x+=											'<select class="form-control estiloCampo form-control-sm" name="generacioninicio'+id+'" id="generacioninicio'+id+'" onchange="calculogeneracion($(this).val(),'+id+')">';

					x+=												'<?php $cont = date('Y'); while ($cont >= 1950) {?>';

					x+=													'<option value="<?php echo $cont; ?>"> <?php echo $cont; ?> </option>';

					x+=													'<?php $cont = ($cont-1); } ?>';

					x+=											 '</select>';

					x+=											 '<select class="form-control estiloCampo form-control-sm" name="generaciontermino'+id+'" id="generaciontermino'+id+'">';

					x+=													'<?php $cont = date('Y'); while ($cont >= 1950) {?>';

					x+=														'<option value="<?php echo $cont; ?>"> <?php echo $cont; ?></option>';

					x+=														'<?php $cont = ($cont-1); } ?>';

					x+=											 '</select>';

					x+=										 '</div> ';

					x+=									 '</div>';

					x+=											'<div class="col"> ';

					x+=												'<label class="nombreCampo" for="tienetitulo'+id+'">¿Tiene Título?</label>';

					x+=												'<select  type="text" class="form-control estiloCampo" onchange="tenetitulo($(this).val(),'+id+')" name="tienetitulo'+id+'" id="tienetitulo'+id+'" >';

					x+=													'<option value="2">No</option>';

					x+=													'<option value="1">Sí</option>';

					x+=												'</select>';

					x+=												'<div class="row" id="contenedortitulo'+id+'" style="display: none">';

					x+= '<div class="col mostrarpanelformacion">';

					x+=													'<div class="col">';

					x+=														'<div class="row">';

					x+=															'<div class="col contenedorimagenformacion"> ';

					x+=																'<img id="imagentitulo'+id+'" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> ';

					x+=															'</div>';

					x+=														'</div>';

					x+= '<div class="esteformacion">';

					x+=														'<div class="row panelimagenformacion">';

					x+=															'<div class="col-2"'+ ' onclick="mostrarImagen(' + "''," + "'imagentitulo"+id+"'," + "'inputfiletitulo"+id+"'" + ",'nombreimagentitulo"+ id + "'" +');"' +' > ';

					x+=																'<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > ';

					x+=															'</div> ';

					x+=															'<div class="col">'; 

					x+=															'</div>'; 

					x+=															'<div class="col-1">'; 

					x+=																'<label  for="inputfiletitulo'+id+'">';

					x+=																	'<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >';

					x+=																'</label>';

					x+=															'</div> ';

					x+=															'<div class="col-1">';



					x+=															'</div> ';

					x+=														'</div> ';

					x+=														'<div class="row panelimagenformacion">';

					x+=															'<div class="col">';

					x+=																'<span id="nombreimagentitulo'+id+'">'; 

					x+=																'</span>';

					x+=															'</div>';

					x+=														'</div>';

					x+= '</div>';

					x+= '</div>';

					x+=														'<input type="file" id="inputfiletitulo'+id+'" hidden=""  name="archivo" onchange="previewtitulo('+id+');"  />';

					x+=														'<input type="text" name="inputtitulo'+id+'"  id="inputtitulo'+id+'" hidden="" value=""/>  ';

					x+=														'<input type="text" name="estensiontitulo'+id+'"  id="estensiontitulo'+id+'" hidden="" value="0"/> ';

					x+=														'<input type="text" name="idegresado'+id+'"  id="idegresado'+id+'" hidden="" value="0"/> ';

					x+=													'</div>';

					x+=												'</div>';

					x+=											'</div> ';

					x+=											'<div class="col"> ';

					x+=												'<label class="nombreCampo" for="tienecedula'+id+'">¿Tiene Cédula?</label>';

					x+=												'<select  type="text" class="form-control estiloCampo" onchange="tenecedula($(this).val(),'+id+')" name="tienecedula'+id+'" id="tienecedula'+id+'" >';

					x+=													'<option value="2">No</option>';

					x+=													'<option value="1">Sí</option>';

					x+=												'</select>';

					x+=												'<div class="row" id="contenedorcedula'+id+'" style="display: none;">';

					x+= '<div class="col mostrarpanelformacion">';

					x+=													'<div class="col">';

					x+=														'<div class="row">';

					x+=															'<div class="col contenedorimagenformacion"> ';

					x+=																'<img id="imagencedula'+id+'" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> ';

					x+=															'</div>';

					x+=														'</div>';

					

					x+= 													'<div class="esteformacion">';

					x+=														'<div class="row panelimagenformacion">';

					x+=															'<div class="col-2" '+ ' onclick="mostrarImagen(' + "''," + "'imagencedula"+id+"'," + "'inputfilecedula"+id+"'" + ",'nombreimagencedula"+ id + "'"  +');"' +'> ';

					x+=																'<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > ';

					x+=															'</div> ';

					x+=															'<div class="col">';



					x+=															'</div>';



					x+=															'<div class="col-1">';



					x+=																'<label  for="inputfilecedula'+id+'">';

					x+=																	'<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >';

					x+=																'</label>';

					x+=															'</div> ';

					x+=															'<div class="col-1">';



					x+=															'</div> ';

					x+=														'</div>';

					x+=														'<div class="row panelimagenformacion">';

					x+=															'<div class="col">';

					x+=																'<span id="nombreimagencedula'+id+'">';



					x+=																'</span>';

					x+=															'</div>';

					x+=														'</div>';

					x+= 													'</div>';

					x+= 													'</div>';

					x+=														'<input type="file" id="inputfilecedula'+id+'" hidden=""  name="archivo" onchange="previewcedula('+id+');"  />';

					x+=														'<input type="text" name="inputcedula'+id+'"  id="inputcedula'+id+'" hidden="" value=""/>  ';

					x+=														'<input type="text" name="estensioncedula'+id+'"  id="estensioncedula'+id+'" hidden="" value="0"/> ';

					x+=													'</div>';

					x+=												'</div>';

					x+=											'</div>';

					x+=											'<div class="col-3"> ';

					x+=												'<label class="nombreCampo niumcedula'+id+'" for="numcedula'+id+'" style="display: none;">¿Número de Cédula?</label>';

					x+=												'<input  type="text" maxlength="20" class="form-control estiloCampo cedula niumcedula'+id+'" name="numcedula'+id+'" id="numcedula'+id+'" style="display: none;"/> ';



					x+=											'</div>';



					x+=										'</div>';

					x+=									'</div>';







         //-----------------------------

         $( "#zona"+id).empty();

         //insertas el string en el html

         $( "#zona"+id).html(x);



     }

     if (valor == 2) {



     	var x='<div class="col-3"> ';

     	x+='<label class="nombreCampo" >Generación</label>';

     	x+='<div style="display: flex;">';

     	x+='<select class="form-control estiloCampo form-control-sm" name="generacioninicio'+id+'" id="generacioninicio'+id+'" onchange="calculogeneracion($(this).val(),'+id+');calculoabandono($(this).val(),'+id+')">';

     	x+='<?php $cont = date('Y'); while ($cont >= 1950) {?>';

     	x+='<option value="<?php echo $cont; ?>"> <?php echo $cont; ?> </option>';

     	x+='<?php $cont = ($cont-1); } ?>';

     	x+='</select>';

     	x+='<select class="form-control estiloCampo form-control-sm" name="generaciontermino'+id+'" id="generaciontermino'+id+'">';

     	x+='<?php $cont = date('Y'); while ($cont >= 1950) {?>';

     	x+='<option value="<?php echo $cont; ?>"> <?php echo $cont; ?></option>';

     	x+='<?php $cont = ($cont-1); } ?>';

     	x+='</select>';

     	x+='</div> ';

     	x+='</div>';

     	x+='<div class="col-3"> ';

     	x+='<label class="nombreCampo" for="anoabandono'+id+'">Año en que Abandonó</label>';

     	x+='<div style="display: flex;">';

     	x+='<select class="form-control estiloCampo form-control-sm" name="anoabandono'+id+'" id="anoabandono'+id+'">';

     	x+='<?php $cont = date('Y'); while ($cont >= 1950) {?>';

     	x+='<option value="<?php echo $cont; ?>"> <?php echo $cont; ?> </option>';

     	x+='<?php $cont = ($cont-1); } ?>';

     	x+='</select>';

     	x+='</div> ';

     	x+='</div>';

     	x+='<div class="col-6"> ';

     	x+='<label class="nombreCampo" for="motivo'+id+'">Motivo</label>';

     	x+='<input  type="text" class="form-control estiloCampo" name="motivo'+id+'" id="motivo'+id+'" placeholder="Escribe un motivo"> ';

     	x+='<input  type="text" class="form-control estiloCampo" name="idabandono'+id+'" id="idabandono'+id+'" hidden="" value="0"> ';

     	x+='</div> ';



 //-----------------------------

 $( "#zona"+id).empty();

         //insertas el string en el html

         $( "#zona"+id).html(x);

     }

     if (valor == 3) {



     	var semestres = $("#numsemestres"+id).val();

     	var actual = $("#dividida"+id).val();

     	if (actual == 1) {

     		actual = 'Bimestre'; 

     	}

     	if (actual == 2) {

     		actual = 'Trimestre'; 

     	}

     	if (actual == 3) {

     		actual = 'Cuatrimestre';

     	}

     	if (actual == 4) {

     		actual = 'Semestre'; 

     	}

     	if (actual == 5) {

     		actual = 'Año'; 

     	}

     	else{

     		actual = "";

     	}



     	$( "#zona"+id).empty();



     	var x = '<div class="col-3">';

     	x+=          '<div class="form-group">';

     	x+=             '<label class="nombreCampo" for="nummatricula'+id+'">Número de Matrícula</label>';

     	x+=             '<input  type="text" class="form-control estiloCampo" name="nummatricula'+id+'" id="nummatricula'+id+'" >';

     	x+=          '</div>';

     	x+=       '</div>';

     	x+=       '<div class="col-3">';

     	x+=          '<div class="form-group">';

     	x+=             '<label class="nombreCampo" for="semestreactual'+id+'"><span id="actual'+id+'">'+actual+'</span> Actual</label>';

     	x+=             '<div class="row">';

     	x+=               '<div class="col">';

     	x+=               '<select   class="form-control estiloCampo" name="semestreactual'+id+'" id="semestreactual'+id+'" >';

     	for (var i = 1 ; i <= semestres; i++) {

     		x+=	'<option value="'+i+'">'+i+'</option>';

     	}



     	x+=               '</select>';

     	x+=               '</div>';



     	x+=               '</div>';

     	x+=          '</div>';

     	x+=       '</div>';

     	x+=       '<div class="col-1 boonspan" >';

     	x+=              '<span  >De</span><span id="cantidadsem'+id+'">'+semestres+'</span>';

     	x+=             '</div>';

     	x+=      '<div class="col-3"> ';

     	x+=                '<label class="nombreCampo" >Generación</label>';

     	x+=                '<div style="display: flex;">';

     	x+=                   '<select class="form-control estiloCampo form-control-sm" name="generacioninicio'+id+'" id="generacioninicio'+id+'" onchange="calculogeneracion($(this).val(),'+id+')" > ';

     	x+=                      '<?php $cont = date('Y'); while ($cont >= 1950) {?>';

     	x+=                      '<option value="<?php echo $cont; ?>"> <?php echo $cont; ?> </option>';

     	x+=                      '<?php $cont = ($cont-1); } ?>';

     	x+=                    '</select>';

     	x+=                    '<select class="form-control estiloCampo form-control-sm" name="generaciontermino'+id+'" id="generaciontermino'+id+'">';

     	x+=                       '<?php $cont = date('Y'); while ($cont >= 1950) {?>';

     	x+=                       '<option value="<?php echo $cont; ?>"> <?php echo $cont; ?></option>';

     	x+=                       '<?php $cont = ($cont-1); } ?>';

     	x+=                    '</select>';

     	x+=                 '</div> ';

     	x+='<input  type="text" class="form-control estiloCampo" name="idestudiando'+id+'" id="idestudiando'+id+'" hidden="" value="0"> ';

     	x+=           '</div> ';

         //insertas el string en el html

         $( "#zona"+id).html(x);

     }



        // -------------------------- 

        

        



    }





    function recargapagina() {

    	location.href = "<?=base_url('/configuracion/formacionacademica')?>";

    }

</script>























































































































