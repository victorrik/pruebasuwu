<div id="contenidocambiante" data-id="8"> 
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
	<form method="post" id="formsabderdemi">
		<div class="box">
			

			<div class="box-header ">
				<!-- tools box -->
				<div class="row">
					<div class="col-sm-4 col-xl-2 letratituloedicion">
						<span>Cuestionario</span>
					</div>
					<div class="col-sm-8 col-xl-10 lineainferiorosita">

					</div>
				</div>
				<!-- /. tools -->
			</div>

			<div class="box-body">

				<div class="row">
					<div class="col" id="pag1" style="display: block;">
						<?php 

						$cont= 1;
						$cada = 1;
						$pag = 1;
						$resp = 0;
						$limite = count($datos["preguntas"]);

						foreach ($datos["preguntas"] as $key){ 
							$limite = $limite - 1;
							$respuesta = "";

							if (!empty($datos["respuestas"][$resp]["RESPUESTA"])) {
							 $respuesta = $datos["respuestas"][$resp]["RESPUESTA"];
							 }

							 $idrespuesta = 0; 
							 if (!empty($datos["respuestas"][$resp]["ID"])) {
							 $idrespuesta = $datos["respuestas"][$resp]["ID"];
							 }

							?>


							<div class="row">
								<div class="col">
									<div class="form-group">
										<label for="pregunta<?=$cont?>"><?=$key["INDICE"]?>.- <?=$key["PREGUNTA"]?></label>
										<textarea name="pregunta<?=$cont?>" class="form-control form-control-sm" id="pregunta<?=$cont?>" style="min-height: 35px;" ><?=$respuesta?></textarea>
										 
										<input type="text" name="idpregunta<?=$cont?>" class="form-control form-control-sm" id="idpregunta<?=$cont?>" hidden="" value="<?=$key["ID"]?>" >
										<input type="text" name="idrespuestas<?=$cont?>" class="form-control form-control-sm" id="idrespuestas<?=$cont?>" hidden="" value="<?=$idrespuesta?>" >
									</div>
								</div>
							</div>
							<?php if ($cada == 5 && $limite !=0 ){ $pag++; $cada = 0; ?>
							</div>
							<div class="col" id="pag<?=$pag?>" style="display: none;">
							<?php }  ?>



							<?php $cada++; $cont++; $resp++;} ?>



						</div>
					</div>

					<div class="row paginascuestionario">
						<div> 
							<div class="col-1" onclick="pagina(-1)">
								<i class="fa  fa-caret-left"></i>
							</div>
							<div class="col-1" id="cambiante">
								1
							</div>
							<div class="col-1">
								de
							</div>
							<div class="col-1" >
								<?=$pag?>
								<input type="numbre" id="paginas" value="<?=$pag?>" hidden="">
								<input type="contador" name="contador" value="<?=count($datos["preguntas"])?>" hidden="">
							</div>
							<div class="col-1" onclick="pagina(1)">
								<i class="fa  fa-caret-right"></i>
							</div>
						</div>
					</div>
				</div>


			</form>
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
			function pagina(pag) {
				var paginaactual = $("#cambiante").html(); 
				var paginasiguiente = Number(paginaactual) + Number(pag);
				var limite =  Number($("#paginas").val());

				if (paginasiguiente  < 1) {
					paginasiguiente = 1;
				}
				if (paginasiguiente > Number(limite)) {
					paginasiguiente = Number(limite);
				}

				$("#pag"+Number(paginaactual)).css("display", "none");
				$("#pag"+paginasiguiente).css("display", "block");
				$("#cambiante").html(paginasiguiente);
			}
			function editar(){
					$("#spiner").css('display', 'block');
		$("#imagenguardar").css('display', 'none');
				var info = $("#formsabderdemi").serialize();
				$.ajax({ 
					type: 'ajax',
					method: 'post',
					url: "<?=base_url('configuracion/masdemi/responder')?>",
					async: true, 
					dataType: 'text',
					data: info
				})
				.done(function(response){  
					if (response == 1 || response == 2) {
						$('#alert').modal('show');
				 $("#mensajealerta").html("Se Guardó Correctamente, se actualizará la página para visualizar los cambios");
            $("#alert").attr("onclick","recargapagina()");
					} 
				}) ;
			}

			function recargapagina() {
				location.href = "<?=base_url('/configuracion/masdemi')?>";
			}
		</script>