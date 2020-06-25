<div id="contenidocambiante" data-id="3">
   <div class="editarflotante">
      <button type="button" class="botoneditaredicion" onclick="recargapagina()">
      <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/RESTAURAR.svg"> 
      </button> 
      <button type="button" class="botoneditaredicion" onclick="agregarTodo()">
         <div id="spiner" style="display: none;">
            <div class="spinner-border text-light"  role="status" >
               <span class="sr-only">Loading...</span>
            </div>
         </div>
         <img id="imagenguardar" src="<?=assetmiperfil()?>/img/ICONOS/SVG/GUARDAR.svg" >
      </button>
   </div>
</div>

<?php if(!empty($datos["datosusuario"][0]["ID"])) {

?>

<form id="FormularioFichaMedica" action="<?=base_url('configuracion/fichamedica/edicion')?>">
   <div class="row">
      <div class="col-3 letratituloedicion">
         <span> Datos de Seguros </span>
      </div>
      <div class="col-9 lineainferiorosita">
      </div>
   </div>
   <!-- /. tools -->
   <div class="box-body"  >
      <!-- row1 -->
      <div class="row justify-content-between" style="border-bottom: 1px solid #e8e8e8;">
         <div class="col-6">
            <div class="form-group">
               <div class="row">
                  <div class="col-6">
                     <label for="SeguroSocial">Seguro Social</label>
                     <select class="form-control form-control-sm estiloCampo" name="SeguroSocial" id="SeguroSocial">
                        <option value="1"<?php if ($datos['datosusuario'][0]["SEGURO_SOCIAL"]== 1) {  echo "selected"; }?> >Sí</option>
                        <option value="2"<?php if ($datos['datosusuario'][0]["SEGURO_SOCIAL"]== 2) {  echo "selected"; }?> >No</option>
                     </select>
                  </div>
               </div>
               <div class="row" id="zonaSeguroSocial" style="display: none;">
                  <div class="col">
                     <label for="NumSeguroSocial">Número Seguro Social (NSS)</label>
                     <input type="text" onKeyPress="return inputDnumeros(event)" maxlength="20" class="form-control form-control-sm estiloCampo" name="NumSeguroSocial" id="NumSeguroSocial" value='<?php echo $datos["datosusuario"][0]["NUM_SEGURO_SOCIAL"]; ?>'>
                  </div>
                  <div class="col">
                     <label for="TipoSeguroSocial">Tipo de Seguro</label>
                     <select class="form-control form-control-sm estiloCampo" name="TipoSeguroSocial" id="TipoSeguroSocial">
                        <option value="1"<?php if ($datos['datosusuario'][0]["TIPO_SEGURO_SOCIAL"]== 1) {  echo "selected"; }?> >Estudiante</option>
                        <option value="2"<?php if ($datos['datosusuario'][0]["TIPO_SEGURO_SOCIAL"]== 2) {  echo "selected"; }?> >Beneficiario</option>
                        <option value="3"<?php if ($datos['datosusuario'][0]["TIPO_SEGURO_SOCIAL"]== 3) {  echo "selected"; }?> >Trabajador</option>
                     </select>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xs-2" id="zonaImgSeguroSocial" style="display: none;">
            <div class="form-group">
               <input type="file" name="file" id="fileSeguroSocial" class="inputfileM" data-multiple-caption="{count} files selected" multiple />
               <input type="text" name="imgSeguroSocial" style="display: none;" id="imgSeguroSocialOculto">
               <input type="text" name="tituloSS" style="display: none;" id="tituloSS">
               <label >

                  <!--<div class="tarjetaEspecial tarjetaSubirIma" id="imgSeguroSocial" for="file" style="background: url() no-repeat center;"></div>-->
               <label style="display: none;"><?php echo "usuario:".$_SESSION["elid"]; echo " fichaMeica".$datos["datosusuario"][0]["ID"]; ?></label>
               <?php  
                  
               $datosporta = count($datos["datosPortafolio"]);
               $aparicion = 0;
               
               for ($i=0; $i < $datosporta ; $i++) { 
                  $datosportadentro = $datos["datosPortafolio"][$i];
                  foreach ($datosportadentro as $key => $value) {
                     if($value == "15") {
                        $aparicion = $i;
                        break;
                     }
                  }
               }
               //echo $datos["datosPortafolio"][$aparicion]["DIRECCION_DOCUMENTO"];

                  if(!empty($datos["datosPortafolio"][$aparicion]["DIRECCION_DOCUMENTO"])) {
                     ?>

               <div class="contAjustar">
                  <div class="boxi">
                     <img class="imagenTarjetaFM" src="<?=$datos["datosPortafolio"][$aparicion]["DIRECCION_DOCUMENTO"]?>" id="imgSeguroSocial" style="width: 10em; height: 10em; margin-right: 30px; background-color: #cccccc;" name="">
                  </div>
                  <div class="middle">

                     <a onclick="verImagenSS()" style="cursor: pointer;"><img class="tarjetaSubirIma" src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" id="imgSeguroSocialB" style=""></a>
                     <label for="fileSeguroSocial" style="cursor: pointer;"><img class="tarjetaSubirIma" src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg" id="imgSeguroSocial" ></label>
                     <label onclick="quitarImagen()"><img class="tarjetaSubirIma" src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELIMINAR.svg" id="imgSeguroSocial" style=""></label>
                  </div>
               </div>

               <div style=""> </div>
               <?php
                  } else { 


                  
                     ?>
                  <div class="contAjustar">
                  <div class="boxi">
                     <img class="tarjetaSubirIma" src="<?=assetgeneral()?>/img/masgris.png" id="imgSeguroSocial" style="width: 10em; height: 10em; margin-right: 30px; background-color: #cccccc;" name="">
                  </div>
                  <div class="middle">

                     <a onclick="verImagenSS()" style="cursor: pointer;"><img class="tarjetaSubirIma" src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" id="imgSeguroSocialB" style=""></a>
                     <label for="fileSeguroSocial" style="cursor: pointer;"><img class="tarjetaSubirIma" src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg" id="imgSeguroSocial" ></label>
                     <label onclick="quitarImagen()"><img class="tarjetaSubirIma" src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELIMINAR.svg" id="imgSeguroSocial" style=""></label>

                  </div>
               </div>
               
               
               <?php }
                  ?>

               </label>
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

               $(document).ready(function () {
                  var nombre = $("#imgSeguroSocial").attr("src");
                  var name = nombre.split('.').pop();
                  //alert(name);
                  if(name == "pdf" || name == "PDF") {
                     $("#imgSeguroSocial").attr("src","<?=assetgeneral()?>/img/pdf.png");
                  }
                  //var im = document.getElementById("imgSeguroSocialB");
                  //   im.style.display = 'none';
               });


               function quitarImagen () {
                  $("#imgSeguroSocial").attr("src","<?=assetgeneral()?>/img/masgris.png");
                  document.getElementById("imgSeguroSocialOculto").value = 'x';

                  var $el = $('#fileSeguroSocial'); $el.wrap('<form>').closest('form').get(0).reset(); $el.unwrap(); 
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

                        // Show the canvas and hide the page loader
                        $("#spinnerModal").hide();
                        $("#canvas").show();
                     });
                  });
               }
               
               function verImagenSS (img) {
                  var nombre = $("#imgSeguroSocial").attr("src");
                  var name = nombre.split('img/').pop();

                  var url = "<?=$datos["datosPortafolio"][$aparicion]["DIRECCION_DOCUMENTO"]?>";
                  var saberPDF = url.split('.').pop();

                  //alert(name);
                  if(name != "masgris.png"){

                     var campoCambios = document.getElementById("imgSeguroSocialOculto").value;
                     console.log("---"+campoCambios);

                     if ( campoCambios == "" && (name == "pdf.png" || name == "pdf.PNG") && url != "" ) {
                        console.log('1');
                        $("#imgModal").hide();
                        $("#canvas").hide();
                        $("#spinnerModal").show();
                        $("#modalSSIMG").modal('show');
                        showPDF("<?=$datos["datosPortafolio"][$aparicion]["DIRECCION_DOCUMENTO"]?>");

                     } else if((name == "pdf.png" || name == "pdf.PNG")) {
                        console.log('2');
                        $("#imgModal").hide();
                        $("#canvas").hide();
                        $("#spinnerModal").show();
                        $("#modalSSIMG").modal('show');
                        showPDF(URL.createObjectURL($("#fileSeguroSocial").get(0).files[0]));

                     }else {
                        console.log('3');
                        var nombre = $("#imgSeguroSocial").attr("src");
                        $("#imgModal").attr("src",nombre);
                        $("#spinnerModal").hide();
                        $("#canvas").hide();
                        $("#imgModal").show();
                        $("#modalSSIMG").modal('show');
                     }
                  }
               }

               function readFile() {
                       if (this.files && this.files[0]) {
                         var FR= new FileReader();
                         //(this.files[0].name);
                         var name = $('#fileSeguroSocial').val().split('\\').pop();
                         //alert(name);
                         name=name.split('.').pop();
                         $("#tituloSS").val(name);
                         //alert(name);
               
                         FR.addEventListener("load", function(e) {
                           document.getElementById("imgSeguroSocialOculto").value = e.target.result;
                           if(name=="pdf"){
                              $("#imgSeguroSocial").attr("src","<?=assetgeneral()?>/img/pdf.png");

                           }else {
                              document.getElementById("imgSeguroSocial").src  =  e.target.result;
                           }
                           
                         }); 
                         
                         FR.readAsDataURL( this.files[0] );
                       }  
                     var im = document.getElementById("imgSeguroSocialB");
                     im.style.display = '';
               }
                  document.getElementById("fileSeguroSocial").addEventListener("change", readFile);
                  function guardarImagen () {
                  }
            </script>
         </div>
      </div>
      <div class="row justify-content-between" style="border-bottom: 1px solid #e8e8e8;">
         <div class="col-7">
            <div class="form-group">
               <div class="row">
                  <div class="col-5">
                     <label for="SeguroUniversitario">Seguro Universitario</label>
                     <select class="form-control form-control-sm estiloCampo" name="SeguroUniversitario" id="SeguroUniversitario">
                        <option value="1"<?php if ($datos['datosusuario'][0]["SEGURO_UNIVERSITARIO"]== 1) {  echo "selected"; }?> >Sí</option>
                        <option value="2"<?php if ($datos['datosusuario'][0]["SEGURO_UNIVERSITARIO"]== 2) {  echo "selected"; }?> >No</option>
                     </select>
                  </div>
               </div>

               <?php 

               $datosporta = count($datos["datosPortafolioSU"]);
               $aparicion = 0;
               
               for ($i=0; $i < $datosporta ; $i++) { 
                  $datosportadentro = $datos["datosPortafolioSU"][$i];
                  foreach ($datosportadentro as $key => $value) {
                     if($value == "23") {
                        $aparicion = $i;
                        break;
                     }
                  }
               }

                ?>

               <div class="row" id="zonaSeguroUniversitario" style="display: none;">
                  <div class="col-4">
                     <label for="CompaniaSeguroUniversitario">Compañía</label>
                     <input type="text" maxlength="30" class="form-control form-control-sm estiloCampo" name="CompaniaSeguroUniversitario" id="seguroUniversitarioCompañia" value='<?php echo $datos["datosusuario"][0]["COMPANIA_SEGURO_UNIVERSITARIO"]; ?>'>
                  </div>
                  <div class="col-4">
                     <label for="PolizaSeguroUniversitrio">Número de póliza</label>
                     <input type="text" maxlength="20" onKeyPress="return inputDnumeros(event)" class="form-control form-control-sm estiloCampo" name="PolizaSeguroUniversitrio" id="seguroUniversitarioNumeroPoliza" value='<?php echo $datos["datosusuario"][0]["POLIZA_SEGURO_UNIVERSITARIO"]; ?>'>
                  </div>
                  <div class="col-4">
                     <label for="NumCertificadoSeguroUniversitario">Número de certificado</label>
                     <input type="text" maxlength="20" onKeyPress="return inputDnumeros(event)" class="form-control form-control-sm estiloCampo" name="NumCertificadoSeguroUniversitario" id="seguroUniversitarioNumeroCertificado" value='<?php echo $datos["datosusuario"][0]["NUM_CERTIFICADO_SEURO_UNIVERSITARIO"]; ?>'>
                  </div>
                  <div class="col">
                     <label for="fechaInicioSU">Fecha de emisión</label>
                     <input type="date" maxlength="30" class="form-control form-control-sm estiloCampo" name="fechaInicioSU" id="fechaInicioSU" value="<?php echo $datos["datosPortafolioSU"][$aparicion]["VIGENCIA_FECHA_INICIO"] ?>" >
                  </div>
                  <div class="col">
                     <label for="fechaTerminoSU">Fecha de expiración</label>
                     <input type="date" maxlength="20" onKeyPress="return inputDnumeros(event)" class="form-control form-control-sm estiloCampo" name="fechaTerminoSU" id="fechaTerminoSU" value="<?php echo $datos["datosPortafolioSU"][$aparicion]["VIGENCIA_FECHA_FIN"] ?>" >
                  </div>
               </div>

            </div>
         </div>
         <div class="col-xs-2" id="zonaImgSeguroUniv" style="display: none;">
            <div class="form-group">
               <input type="file" name="file" id="fileSegurouni" class="inputfileM" data-multiple-caption="{count} files selected" multiple />
               <input type="text" name="imgSeguroUni" style="display: none;" id="imgSeguroUniOculto">
                <input type="text" name="tituloSU" style="display: none;" id="tituloSU">
               <label>
              
               <label style="display: none;"><?php echo $_SESSION["elid"]; echo $datos["datosusuario"][0]["ID"]; ?></label>
               <?php  

               

                  if(!empty($datos["datosPortafolioSU"][$aparicion]["DIRECCION_DOCUMENTO"])){
                  
                     ?>

               <div class="contAjustar">
                  <div class="boxi">
                     <img class="imagenTarjetaFM" src="<?=$datos["datosPortafolioSU"][$aparicion]["DIRECCION_DOCUMENTO"]?>" id="imgSeguroUni" style="width: 10em; height: 10em; margin-right: 30px; background-color: #cccccc;" name="">
                  </div>
                  <div class="middle">
                     <a onclick="verImagenSU()" style="cursor: pointer;"><img class="tarjetaSubirIma" src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" id="imgSeguroUniB" style="" ></a>
                     <label for="fileSegurouni" style="cursor: pointer;"><img class="tarjetaSubirIma" src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg" id="imgSeguroUni" ></label>
                     <label onclick="quitarImagenSU()"><img class="tarjetaSubirIma" src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELIMINAR.svg" id="imgSeguroUni" style=""></label>
                  </div>
               </div>

               <?php
                  }else { ?>
                  <div class="contAjustar">
                  <div class="boxi">
                     <img class="imagenTarjetaFM" src="<?=assetgeneral()?>/img/masgris.png"  id="imgSeguroUni" style="width: 10em; height: 10em; margin-right: 30px; background-color: #cccccc;" name="">
                  </div>
                  <div class="middle">
                      <a onclick="verImagenSU()" style="cursor: pointer;"><img class="tarjetaSubirIma" src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" id="imgSeguroUniB" style="" ></a>
                     <label for="fileSegurouni" style="cursor: pointer;"><img class="tarjetaSubirIma" src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg" id="imgSeguroUni" ></label>
                     <label onclick="quitarImagenSU()"><img class="tarjetaSubirIma" src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELIMINAR.svg" id="imgSeguroUni" style=""></label>
                  </div>
               </div>
               
               <?php }
                  ?>
               </label>
            </div>
            <script type="text/javascript">

               $(document).ready(function () {
                  var nombre = $("#imgSeguroUni").attr("src");
                  var name = nombre.split('.').pop();
                  //alert(name);
                  if(name == "pdf" || name == "PDF") {
                     $("#imgSeguroUni").attr("src","<?=assetgeneral()?>/img/pdf.png");
                  }
                  /*
                  var om = document.getElementById("imgSeguroUniB");
                  om.style.display = 'none';
   */
                
               });

               function quitarImagenSU () {
                  $("#imgSeguroUni").attr("src","<?=assetgeneral()?>/img/masgris.png");
                  document.getElementById("imgSeguroUniOculto").value = 'x';
                  var $el = $('#fileSegurouni'); $el.wrap('<form>').closest('form').get(0).reset(); $el.unwrap(); 
               }

               function verImagenSU (img) {
                  var nombre = $("#imgSeguroUni").attr("src");
                  var name = nombre.split('img/').pop();

                  var url = "<?=$datos["datosPortafolioSU"][$aparicion]["DIRECCION_DOCUMENTO"]?>";
                  var saberPDF = url.split('.').pop();


                  //alert(name);
                  if(name != "masgris.png"){

                     var campoCambios = document.getElementById("imgSeguroUniOculto").value;
                     console.log("---"+campoCambios);

                     if ( campoCambios == "" && (name == "pdf.png" || name == "pdf.PNG") && url != "" ) {
                        console.log('1');
                        $("#imgModal").hide();
                        $("#canvas").hide();
                        $("#spinnerModal").show();
                        $("#modalSSIMG").modal('show');
                        showPDF("<?=$datos["datosPortafolioSU"][$aparicion]["DIRECCION_DOCUMENTO"]?>");

                     } else if(name == "pdf.png" || name == "pdf.PNG") {
                        $("#imgModal").hide();
                        $("#canvas").hide();
                        $("#spinnerModal").show();
                        $("#modalSSIMG").modal('show');
                        showPDF(URL.createObjectURL($("#fileSegurouni").get(0).files[0]));
                     }else {
                        console.log('3');
                        var nombre = $("#imgSeguroUni").attr("src");
                        $("#imgModal").attr("src",nombre);
                        $("#spinnerModal").hide();
                        $("#canvas").hide();
                        $("#imgModal").show();
                        $("#modalSSIMG").modal('show');
                     }
                  }
               }

               function readFile() {
               
                       if (this.files && this.files[0]) {
                         
                         var FR= new FileReader();
                        
                        var name = $('#fileSegurouni').val().split('\\').pop();
                         name=name.split('.').pop();
                         console.log(name);
                         $("#tituloSU").val(name);
                        
                         FR.addEventListener("load", function(e) {
                           
                           document.getElementById("imgSeguroUniOculto").value=e.target.result;
                           if(name=="pdf"){ 
                               $("#imgSeguroUni").attr("src","<?=assetgeneral()?>/img/pdf.png");
                            }else {
                              document.getElementById("imgSeguroUni").src  =  e.target.result;
                            }

                         }); 
                        var om = document.getElementById("imgSeguroUniB");
                        om.style.display = '';

                         FR.readAsDataURL( this.files[0] );
                       }
                       
               }
                     
               
                     document.getElementById("fileSegurouni").addEventListener("change", readFile);
               
               
                  function guardarImagen () {
               
                  }
            </script>
         </div>
      </div>
      <div class="row justify-content-between">
         <div class="col-7">
            <div class="form-group">
               <div class="row">
                  <div class="col-5">
                     <label for="SeguroGastosMayores">Seguro de Gastos Médicos Mayores</label>
                     <select class="form-control form-control-sm estiloCampo" name="SeguroGastosMayores" id="SeguroGastosMayores">
                        <option value="1"<?php if ($datos['datosusuario'][0]["SEGURO_GASTOS_MAYORES"]== 1) {  echo "selected"; }?> >Sí</option>
                        <option value="2"<?php if ($datos['datosusuario'][0]["SEGURO_GASTOS_MAYORES"]== 2) {  echo "selected"; }?> >No</option>
                     </select>
                  </div>
               </div>


               <?php 


               $datosporta = count($datos["datosPortafolioGG"]);
               $aparicion = 0;
               
               for ($i=0; $i < $datosporta ; $i++) { 
                  $datosportadentro = $datos["datosPortafolioGG"][$i];
                  foreach ($datosportadentro as $key => $value) {
                     if($value == "42") {
                        $aparicion = $i;
                        break;
                     }
                  }
               }

                ?>

               <div class="row" id="zonaSeguroGastosMedicosMayores" style="display: none;">
                  <div class="col-4">
                     <label for="CompaniaGastosMayores">Compañía</label>
                     <input type="text" maxlength="30" class="form-control form-control-sm estiloCampo" name="CompaniaGastosMayores" id="segGastosMedMayoCompañia"  value='<?php echo $datos["datosusuario"][0]["COMPANIA_GASTOS_MAYORES"]; ?>'>
                  </div>
                  <div class="col-4">
                     <label for="PolizaGastosMayores">Número de póliza</label>
                     <input type="text" maxlength="20" onKeyPress="return inputDnumeros(event)" class="form-control form-control-sm estiloCampo" name="PolizaGastosMayores" id="segGastosMedMayoNumPoliza" value='<?php echo $datos["datosusuario"][0]["POIZA_GASTOS_MAYORES"]; ?>' >
                  </div>
                  <div class="col-4">
                     <label for="PlanGastosMayores">Plan</label>
                     <input type="text" maxlength="20" class="form-control form-control-sm estiloCampo" name="PlanGastosMayores" id="segGastosMedMayoNuCertificado"  value='<?php echo $datos["datosusuario"][0]["PLAN_GASTOS_MAYORES"]; ?>' >
                  </div>
                  <div class="col">
                     <label for="fechaIniciogg">Fecha de emisión</label>
                     <input type="date" maxlength="30" class="form-control form-control-sm estiloCampo" name="fechaIniciogg" id="fechaIniciogg" value="<?php echo $datos["datosPortafolioGG"][$aparicion]["VIGENCIA_FECHA_INICIO"] ?>"  >
                  </div>
                  <div class="col">
                     <label for="fechaTerminogg">Fecha de expiración</label>
                     <input type="date" maxlength="30" onKeyPress="return inputDnumeros(event)" class="form-control form-control-sm estiloCampo" name="fechaTerminogg" id="fechaTerminogg" value="<?php echo $datos["datosPortafolioGG"][$aparicion]["VIGENCIA_FECHA_FIN"] ?>" >
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xs-2" id="zonaImgSeguroGM" style="display: none;">
            <div class="form-group">
               <input type="file" name="file" id="fileSeguroGM" class="inputfileM" data-multiple-caption="{count} files selected" multiple />
               <input type="text" name="imgSeguroGM" style="display: none;" id="imgSeguroGMOculto">
               <input type="text" name="tituloGG" style="display: none;" id="tituloGG">

               <label >
                  <!--<div class="tarjetaEspecial tarjetaSubirIma" id="imgSeguroGM" for="file" style="background: url() no-repeat center;"></div>-->
               <label style="display: none;"><?php echo $_SESSION["elid"]; echo $datos["datosusuario"][0]["ID"]; ?></label>
               <?php  



                  if(!empty($datos["datosPortafolioGG"][$aparicion]["DIRECCION_DOCUMENTO"])){
                  
                     ?>

               <div class="contAjustar">
                  <div class="boxi">
                     <img class="imagenTarjetaFM" src="<?=$datos["datosPortafolioGG"][$aparicion]["DIRECCION_DOCUMENTO"]?>" id="imgSeguroGM" style="width: 10em; height: 10em; margin-right: 30px; background-color: #cccccc;" name="">
                  </div>
                  <div class="middle">
                     <a onclick="verImagenGG()" style="cursor: pointer;"><img class="tarjetaSubirIma" src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" id="imgSeguroGMB" ></a>
                     <label for="fileSeguroGM" style="cursor: pointer;"><img class="tarjetaSubirIma" src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg" id="imgSeguroGM" ></label>
                     <label onclick="quitarImagenGG()"><img class="tarjetaSubirIma" src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELIMINAR.svg" id="imgSeguroGM" style=""></label>
                  </div>
               </div>
               <?php
                  }else { ?>
                  <div class="contAjustar">
                  <div class="boxi">
                     <img class="imagenTarjetaFM" src="<?=assetgeneral()?>/img/masgris.png" id="imgSeguroGM" style="width: 10em; height: 10em; margin-right: 30px; background-color: #cccccc;" name="">
                  </div>
                  <div class="middle">
                     <a onclick="verImagenGG()" style="cursor: pointer;"><img class="tarjetaSubirIma" src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" id="imgSeguroGMB" ></a>
                     <label for="fileSeguroGM" style="cursor: pointer;"><img class="tarjetaSubirIma" src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg" id="imgSeguroGM" ></label>
                     <label onclick="quitarImagenGG()"><img class="tarjetaSubirIma" src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELIMINAR.svg" id="imgSeguroGM" style=""></label>
                  </div>
               </div>
               
               <?php }
                  ?>
               <input type="text" name="imgSeguroGMOcultoAnterior" style="display: none;" id="imgSeguroGMOcultoAnterior" value="<?=assetmiperfil()?>/img/chefsita.jpg" id="imgSeguroGM">
               </label>
            </div>
            <script type="text/javascript">

               $(document).ready(function () {
                  var nombre = $("#imgSeguroGM").attr("src");
                  var name = nombre.split('.').pop();
                  //alert(name);
                  if(name == "pdf" || name == "PDF") {
                     $("#imgSeguroGM").attr("src","<?=assetgeneral()?>/img/pdf.png");
                  }
                  /*
                  var im = document.getElementById("imgSeguroGMB");
                  im.style.display = 'none';*/
               });

               function verImagenGG (img) {
                  var nombre = $("#imgSeguroGM").attr("src");
                  var name = nombre.split('img/').pop();

                  var url = "<?=$datos["datosPortafolioGG"][$aparicion]["DIRECCION_DOCUMENTO"]?>";
                  var saberPDF = url.split('.').pop(); 

                  //alert(name);
                  if(name != "masgris.png"){

                     var campoCambios = document.getElementById("imgSeguroGMOculto").value;
                     console.log("---"+campoCambios);

                     if ( campoCambios == "" && (name == "pdf.png" || name == "pdf.PNG") && url != "" ) {
                        console.log('1');
                        $("#imgModal").hide();
                        $("#canvas").hide();
                        $("#spinnerModal").show();
                        $("#modalSSIMG").modal('show');
                        showPDF("<?=$datos["datosPortafolioGG"][$aparicion]["DIRECCION_DOCUMENTO"]?>");

                     } else if(name == "pdf.png" || name == "pdf.PNG") {
                        console.log('2');
                        $("#imgModal").hide();
                        $("#canvas").hide();
                        $("#spinnerModal").show();
                        $("#modalSSIMG").modal('show');
                        showPDF(URL.createObjectURL($("#fileSeguroGM").get(0).files[0]));
                     }else {
                        var nombre = $("#imgSeguroGM").attr("src");
                        $("#imgModal").attr("src",nombre);
                        $("#spinnerModal").hide();
                        $("#canvas").hide();
                        $("#imgModal").show();
                        $("#modalSSIMG").modal('show');
                     }
                  }
               }

               function quitarImagenGG () {
                  $("#imgSeguroGM").attr("src","<?=assetgeneral()?>/img/masgris.png");
                  document.getElementById("imgSeguroGMOculto").value = 'x';
                  var $el = $('#fileSeguroGM'); $el.wrap('<form>').closest('form').get(0).reset(); $el.unwrap(); 
               }

               function readFile() {
               
                       if (this.files && this.files[0]) {
                         
                         var FR= new FileReader();

                         var name = $('#fileSeguroGM').val().split('\\').pop();
                         name=name.split('.').pop();
                         console.log(name);
                         $("#tituloGG").val(name);
               
                         //(this.files[0].name);
                         FR.addEventListener("load", function(e) {
               
                           document.getElementById("imgSeguroGMOculto").value=e.target.result;
                           if(name=="pdf"){
                              $("#imgSeguroGM").attr("src","<?=assetgeneral()?>/img/pdf.png");
                           }else {
                              document.getElementById("imgSeguroGM").src  =  e.target.result; 
                           }
                           
                         }); 
                         var im = document.getElementById("imgSeguroGMB");
                  im.style.display = '';
                         FR.readAsDataURL( this.files[0] );
                       }
               }
                  
                     document.getElementById("fileSeguroGM").addEventListener("change", readFile);
               
                  function guardarImagen () {
               
                  }
            </script>
         </div>
      </div>
      <div class="row">
         <div class="col">
            <!-- row --> 
            <div class="row mb-2">
               <div class="col-3 letratituloedicion">
                  <span> Antecedentes Familiares </span>
               </div>
               <div class="col-9 lineainferiorosita">
               </div>
            </div>
            <div class="row">
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class=" containerM" for="Diabetes">
                     <input class="" type="checkbox" id="Diabetes" name="Diabetes" value="1" <?php if ($datos['datosusuario'][0]["DIABETES"]== 1) {  echo "checked"; }?> > 
                     <span class="checkmark"></span>
                     Diabetes
                     </label>
                  </div>
               </div>
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="Cancer">
                     <input class="" type="checkbox" id="Cancer" name="Cancer" value="1" value="1" <?php if ($datos['datosusuario'][0]["CANCER"]== 1) {  echo "checked"; }?>>
                     <span class="checkmark"></span>
                     Cáncer
                     </label>
                  </div>
               </div>
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="Tuberculosis">
                     <input class="" type="checkbox" id="Tuberculosis" name="Tuberculosis" value="1" <?php if ($datos['datosusuario'][0]["TUBERCULOSIS"]== 1) {  echo "checked"; }?>>
                     <span class="checkmark"></span>
                     Tuberculosis</label>
                  </div>
               </div>
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="FiebreReumatica">
                     <input class="" type="checkbox" id="FiebreReumatica" name="FiebreReumatica" value="1" <?php if ($datos['datosusuario'][0]["FIEBRE_REUMATICA"]== 1) {  echo "checked"; }?> >
                     <span class="checkmark"></span>
                     Fiebre Reumática</label>
                  </div>
               </div>
            </div>
            <!-- row -->
            <!-- row -->
            <div class="row">
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="Epilepsia">
                     <input class="" type="checkbox" id="Epilepsia" name="Epilepsia" value="1" <?php if ($datos['datosusuario'][0]["EPILEPSIA"]== 1) {  echo "checked"; }?>>
                     <span class="checkmark"></span>
                     Epilepsia</label>
                  </div>
               </div>
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="AsmaFamiliares">
                     <input class="" type="checkbox" id="AsmaFamiliares" name="AsmaFamiliares" value="1" <?php if ($datos['datosusuario'][0]["ASMA_FAMILIARES"]== 1) {  echo "checked"; }?>>
                     <span class="checkmark"></span>
                     Asma</label>
                  </div>
               </div>
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="CardiopatiasFamiliares">
                     <input class="" type="checkbox" id="CardiopatiasFamiliares" name="CardiopatiasFamiliares" value="1" <?php if ($datos['datosusuario'][0]["CARDIOPATIAS_FAMILIARES"]== 1) {  echo "checked"; }?>>
                     <span class="checkmark"></span>
                     Cardiopatías</label>
                  </div>
               </div>
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="ObesidadFamiliares">
                     <input class="" type="checkbox" id="ObesidadFamiliares" name="ObesidadFamiliares" value="1" <?php if ($datos['datosusuario'][0]["OBESIDAD_FAMILIARES"]== 1) {  echo "checked"; }?>>
                     <span class="checkmark"></span>
                     Obesidad</label>
                  </div>
               </div>
            </div>
            <!-- row -->
            <!-- row -->
            <div class="row">
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="VihFamiliares">
                     <input class="" type="checkbox" id="VihFamiliares" name="VihFamiliares" value="1" <?php if ($datos['datosusuario'][0]["VIH_FAMILIARES"]== 1) {  echo "checked"; }?>>
                     <span class="checkmark"></span>
                     VIH</label>
                  </div>
               </div>
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="HipertensionArterialFamiliares">
                     <input class="" type="checkbox" id="HipertensionArterialFamiliares" name="HipertensionArterialFamiliares" value="1" <?php if ($datos['datosusuario'][0]["HIPERTENSION_ATERIAL_FAMILIARES"]== 1) {  echo "checked"; }?>>
                     <span class="checkmark"></span>
                     Hipertensión arterial</label>
                  </div>
               </div>
            </div>
            <!-- row -->
         </div>
      </div>
      <!-- row1 -->
      <div class="row mb-3 mt-3">
         <div class="col">
            <div class="row mb-2">
               <div class="col-3 letratituloedicion">
                  <span> Hospital de preferencia</span>
               </div>
               <div class="col-9 lineainferiorosita">
               </div>
            </div>
            <div class="row">
               <div class="col-4">
                  <div class="form-group">
                     <label for="HospitalPreferencia">Nombre </label>
                     <input type="text" maxlength="30" class="form-control estiloCampo form-control-sm" name="HospitalPreferencia" id="HospitalPreferencia" value='<?php echo $datos["datosusuario"][0]["HOSPITAL_PREFERENCIA"]; ?>' >
                  </div>
               </div>
               <div class="col-2">
                  <div class="form-group">
                     <label for="PaisHospitalPreferencia">País</label>
                     <input type="text" maxlength="30" class="form-control form-control-sm estiloCampo" name="PaisHospitalPreferencia" id="PaisHospitalPreferencia" value='<?php echo $datos["datosusuario"][0]["PAIS_HOSPITAL_PREFERENCIA"]; ?>'>
                  </div>
               </div>
               <div class="col-3">
                  <div class="form-group">
                     <label for="EstadoHospitalPreferencia">Estado</label>
                     <input type="text" maxlength="30" class="form-control form-control-sm estiloCampo" name="EstadoHospitalPreferencia" id="EstadoHospitalPreferencia" value='<?php echo $datos["datosusuario"][0]["ESTADO_HOSPITAL_PREFERENCIA"]; ?>'>
                  </div>
               </div>
               <div class="col-3">
                  <div class="form-group">
                     <label for="CiudadHospitalPreferencia">Ciudad</label>
                     <input type="text" maxlength="30" class="form-control form-control-sm estiloCampo" name="CiudadHospitalPreferencia" id="CiudadHospitalPreferencia" value='<?php echo $datos["datosusuario"][0]["CIUDAD_HOSPITAL_PREFERENCIA"]; ?>'>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row mb-3 mt-3">
         <div class="col">
            <div class="row mb-2">
               <div class="col-3 letratituloedicion">
                  <span>Antecedentes personales</span>
               </div>
               <div class="col-9 lineainferiorosita">
               </div>
            </div>
            <!-- row -->
            <div class="row">
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="Paludismo">
                     <input class="form-check-input" type="checkbox" id="Paludismo" name="Paludismo" value="1" <?php if ($datos['datosusuario'][0]["PALUDISMO"]== 1) {  echo "checked"; }?>>
                     <span class="checkmark"></span>
                     Paludismo
                     </label>
                  </div>
               </div>
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="Tosferia">
                     <input class="form-check-input" type="checkbox" id="Tosferia" name="Tosferia" value="1" <?php if ($datos['datosusuario'][0]["TOSFERA"]== 1) {  echo "checked"; }?>>
                     <span class="checkmark"></span>
                     Tosferia
                     </label>
                  </div>
               </div>
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="Varicela">
                     <input class="form-check-input" type="checkbox" id="Varicela" name="Varicela" value="1" <?php if ($datos['datosusuario'][0]["VARICELA"]== 1) {  echo "checked"; }?>>
                     <span class="checkmark"></span>
                     Varicela
                     </label>
                  </div>
               </div>
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="Hepatitis">
                     <input class="form-check-input" type="checkbox" id="Hepatitis" name="Hepatitis" value="1" <?php if ($datos['datosusuario'][0]["HEPATITIS"]== 1) {  echo "checked"; }?>>
                     <span class="checkmark"></span>
                     Hepatitis
                     </label>
                  </div>
               </div>
            </div>
            <!-- row -->
            <div class="row">
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="Paperas">
                     <input class="form-check-input" type="checkbox" id="Paperas" name="Paperas"  value="1" <?php if ($datos['datosusuario'][0]["PAPERAS"]== 1) {  echo "checked"; }?> >
                     <span class="checkmark"></span>
                     Paperas
                     </label>
                  </div>
               </div>
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="Otitis">
                     <input class="form-check-input" type="checkbox" id="Otitis" name="Otitis"  value="1" <?php if ($datos['datosusuario'][0]["OTITIS"]== 1) {  echo "checked"; }?> >
                     <span class="checkmark"></span>
                     Otitis
                     </label>
                  </div>
               </div>
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="AsmaPersonales">
                     <input class="form-check-input" type="checkbox" id="AsmaPersonales" name="AsmaPersonales" value="1" <?php if ($datos['datosusuario'][0]["ASMAS_PERSONALES"]== 1) {  echo "checked"; }?> >
                     <span class="checkmark"></span>
                     Asma
                     </label>
                  </div>
               </div>
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="Reflujo">
                     <input class="form-check-input" type="checkbox" id="Reflujo" name="Reflujo" value="1" <?php if ($datos['datosusuario'][0]["REFLUJO"]== 1) {  echo "checked"; }?> >
                     <span class="checkmark"></span>
                     Reflujo
                     </label>
                  </div>
               </div>
            </div>
            <!-- row -->
            <div class="row">
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="Depresion">
                     <input class="form-check-input" type="checkbox" id="Depresion" name="Depresion" value="1" <?php if ($datos['datosusuario'][0]["DEPRESION"]== 1) {  echo "checked"; }?>>
                     <span class="checkmark"></span>
                     Depresión
                     </label>
                  </div>
               </div>
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="Tiroides">
                     <input class="form-check-input" type="checkbox" id="Tiroides" name="Tiroides" value="1" <?php if ($datos['datosusuario'][0]["TIROIDES"]== 1) {  echo "checked"; }?>>
                     <span class="checkmark"></span>
                     Tiroides
                     </label>
                  </div>
               </div>
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="Bulimia">
                     <input class="form-check-input" type="checkbox" id="Bulimia" name="Bulimia" value="1" <?php if ($datos['datosusuario'][0]["BULIMIA"]== 1) {  echo "checked"; }?>>
                     <span class="checkmark"></span>
                     Bulimia
                     </label>
                  </div>
               </div>
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="Anorexia">
                     <input class="form-check-input" type="checkbox" id="Anorexia" name="Anorexia" value="1" <?php if ($datos['datosusuario'][0]["ANOREXIA"]== 1) {  echo "checked"; }?>>
                     <span class="checkmark"></span>
                     Anorexia
                     </label>
                  </div>
               </div>
            </div>
            <!-- row -->
            <!-- row -->
            <div class="row">
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="Cefaleas">
                     <input class="form-check-input" type="checkbox" id="Cefaleas" name="Cefaleas" value="1" <?php if ($datos['datosusuario'][0]["CEFALEAS"]== 1) {  echo "checked"; }?>>
                     <span class="checkmark"></span>
                     Cefaleas
                     </label>
                  </div>
               </div>
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="Caries">
                     <input class="form-check-input" type="checkbox" id="Caries" name="Caries" value="1" <?php if ($datos['datosusuario'][0]["CARIES"]== 1) {  echo "checked"; }?>>
                     <span class="checkmark"></span>
                     Caries
                     </label>
                  </div>
               </div>
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="Artritis">
                     <input class="form-check-input" type="checkbox" id="Artritis" name="Artritis" value="1" <?php if ($datos['datosusuario'][0]["ARTRITIS"]== 1) {  echo "checked"; }?>>
                     <span class="checkmark"></span>
                     Artritis
                     </label>
                  </div>
               </div>
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="Neumonia">
                     <input class="form-check-input" type="checkbox" id="Neumonia" name="Neumonia" value="1" <?php if ($datos['datosusuario'][0]["NEUMONIA"]== 1) {  echo "checked"; }?>>
                     <span class="checkmark"></span>
                     Neumonía
                     </label>
                  </div>
               </div>
            </div>
            <!-- row -->
            <div class="row">
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="Sarampion">
                     <input class="form-check-input" type="checkbox" id="Sarampion" name="Sarampion" value="1" <?php if ($datos['datosusuario'][0]["SARAMPION"]== 1) {  echo "checked"; }?>>
                     <span class="checkmark"></span>
                     Sarampión
                     </label>
                  </div>
               </div>
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="CrisisConvulsivas">
                     <input class="form-check-input" type="checkbox" id="CrisisConvulsivas" name="CrisisConvulsivas" value="1" <?php if ($datos['datosusuario'][0]["CRISIS_CONVULSIVAS"]== 1) {  echo "checked"; }?>>
                     <span class="checkmark"></span>
                     Crisis Convulsivas
                     </label>
                  </div>
               </div>
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="Paliametitis">
                     <input class="form-check-input" type="checkbox" id="Paliametitis" name="Paliametitis" value="1" <?php if ($datos['datosusuario'][0]["PALIAMETITIS"]== 1) {  echo "checked"; }?>>
                     <span class="checkmark"></span>
                     Paliametitis
                     </label>
                  </div>
               </div>
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="Parasitosis">
                     <input class="form-check-input" type="checkbox" id="Parasitosis" name="Parasitosis" value="1" <?php if ($datos['datosusuario'][0]["PARASITOSIS"]== 1) {  echo "checked"; }?>>
                     <span class="checkmark"></span>
                     Parasitosis
                     </label>
                  </div>
               </div>
            </div>
            <!-- row -->
            <div class="row">
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="CardiopatiasPersonales">
                     <input class="form-check-input" type="checkbox" id="CardiopatiasPersonales" name="CardiopatiasPersonales" value="1" <?php if ($datos['datosusuario'][0]["CARDIOPATIAS_PERSONALES"]== 1) {  echo "checked"; }?>>
                     <span class="checkmark"></span>
                     Cardiopatías
                     </label>
                  </div>
               </div>
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="VihPersonales" >
                     <input class="form-check-input" type="checkbox" id="VihPersonales" name="VihPersonales" value="1" <?php if ($datos['datosusuario'][0]["VIH_PERSONALES"]== 1) {  echo "checked"; }?>>
                     <span class="checkmark"></span>
                     VIH
                     </label>
                  </div>
               </div>
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="ObesidadPersonales">
                     <input class="form-check-input" type="checkbox" id="ObesidadPersonales" name="ObesidadPersonales" value="1" <?php if ($datos['datosusuario'][0]["OBESIDAD_PERSONALES"]== 1) {  echo "checked"; }?>>
                     <span class="checkmark"></span>
                     Obesidad
                     </label>
                  </div>
               </div>
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="HipertencionArterialPersonales">
                     <input class="form-check-input" type="checkbox" id="HipertencionArterialPersonales" name="HipertencionArterialPersonales" value="1" <?php if ($datos['datosusuario'][0]["HIPERTENSION_ATERIAL_PERSONALES"]== 1) {  echo "checked"; }?>>
                     <span class="checkmark"></span>
                     Hipertensión Arterial
                     </label>
                  </div>
               </div>
            </div>
            <!-- row -->
            <div class="row">
               <!--
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="Discapacidad">
                     <input class="form-check-input" type="checkbox" id="Discapacidad" name="Discapacidad" value="1" <?php if ($datos['datosusuario'][0]["DISCAPACIDAD"]== 1) {  echo "checked"; }?> >
                     <span class="checkmark"></span>
                     Discapacidad
                     </label>
                  </div>
               </div>
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="MalFormaciones">
                     <input class="form-check-input" type="checkbox" id="MalFormaciones" name="MalFormaciones" value="1" <?php if ($datos['datosusuario'][0]["HIPERTENSION_ATERIAL_PERSONALES"]== 1) {  echo "checked"; }?> >
                     <span class="checkmark"></span>
                     MalFormaciones
                     </label>
                  </div>
               </div>
            -->
               <div class="col-3">
                  <div class="form-check form-check-inline">
                     <label class="containerM" for="Tumores">
                     <input class="form-check-input" type="checkbox" id="Tumores" name="Tumores" value="1" <?php if ($datos['datosusuario'][0]["TUMORES"]== 1) {  echo "checked"; }?> >
                     <span class="checkmark"></span>
                     Tumores
                     </label>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- ---------------------- -->
   <div class="row" >
      <div class="col-6">
         <div class="row" >
            <div class="col-2 letratituloedicion">
               <span>Alergias</span>
            </div>
            <div class="col-10 lineainferiorosita">
            </div>
         </div>
         <div class="row  justify-content-between" style="margin-top: 10px;" >
            <div class="col-4">
               <div class="form-check form-check-inline"> 
                  <label class="labelsform" >Medicamentos</label>
               </div>
            </div>
            <div class="col-5">
               <div class="form-check form-check-inline">
                  <label class="containerM" for="alergiasmedicamentos1">
                  <input class="form-check-input" type="radio" name="AlergiaMedicamentos" id="alergiasmedicamentos1" value="1" <?php if ($datos['datosusuario'][0]["ALERGIA_MEDICAMENTO"]== 1) {  echo "checked"; }?> >
                  <span class="checkmarkSI"></span>
                  Sí</label>
               </div>
               <div class="form-check form-check-inline">
                  <label class="containerM" for="alergiasmedicamentos2">
                  <input class="form-check-input" type="radio" name="AlergiaMedicamentos" id="alergiasmedicamentos2" value="2" <?php if ($datos['datosusuario'][0]["ALERGIA_MEDICAMENTO"]== 2) {  echo "checked"; }?>>
                  <span class="checkmark"></span>
                  No</label>
               </div>
            </div>
         </div>
         <div class="row" id="zonaTrataMedic" style="display: none; margin-top: -5;">
            <div class="col-12">
               <label class="labelsform">Especifique a que Medicamentos</label>
            </div>
            <div class="col-12">
               <textarea type="text" maxlength="99" class="form-control form-control-sm estiloCampo" name="DetalleAlergiaMedicamentos" id="DetalleAlergiaMedicamentos"><?php echo $datos["datosusuario"][0]["DETALLE_ALERGIA_MEDICAMENTOS"]; ?></textarea>
            </div>
         </div>
         <script type="text/javascript">
            $(document).ready(function(){
                  var zona = document.getElementById("zonaTrataMedic");
                  var op = $("input:radio[id=alergiasmedicamentos1]:checked").val();
                  if(op==1){
                    zona.style.display = '';
                 }
             });
            
            
            $("#alergiasmedicamentos1").change(function(){
                  var zona = document.getElementById("zonaTrataMedic");
                  var op = $("input:checkbox[id=alergiasmedicamentos1]:checked").val();
                    zona.style.display = '';
             });
            
            $("#alergiasmedicamentos2").change(function(){
                  var zona = document.getElementById("zonaTrataMedic");
                  var op = $("input:checkbox[id=alergiasmedicamentos2]:checked").val();
                    zona.style.display = 'none';
             });
         </script>
         <div class="row  justify-content-between" style="margin-top: 10px;">
            <div class="col-4">
               <div class="form-check form-check-inline"> 
                  <label class="labelsform"  >Alimentos</label>
               </div>
            </div>
            <div class="col-5">
               <div class="form-check form-check-inline">
                  <label class="containerM" for="alergiaalimentos1">
                  <input class="form-check-input" type="radio" name="AlergiaAlimentos" id="alergiaalimentos1" value="1"  <?php if ($datos['datosusuario'][0]["ALERGIA_ALIMENTOS"]== 1) {  echo "checked"; }?>>
                  <span class="checkmarkSI"></span>
                  Sí</label>
               </div>
               <div class="form-check form-check-inline">
                  <label class="containerM" for="alergiaalimentos2">
                  <input class="form-check-input" type="radio" name="AlergiaAlimentos" id="alergiaalimentos2" value="2"  <?php if ($datos['datosusuario'][0]["ALERGIA_ALIMENTOS"]== 2) {  echo "checked"; }?>>
                  <span class="checkmark"></span>
                  No</label>
               </div>
            </div>
         </div>
         <div class="row" id="zonaAlergiaAlimentos" style="display: none; margin-top: -5;">
            <div class="col-12">
               <label class="labelsform">Especifique a que Alimentos</label>
            </div>
            <div class="col-12">
               <textarea type="text" maxlength="99" class="form-control form-control-sm estiloCampo" name="DetalleAlergiaAlimentos" id="DetalleAlergiaAlimentos"  ><?php echo $datos["datosusuario"][0]["DETALLE_ALERGIA_ALIMENTOS"]; ?></textarea>
            </div>
         </div>
         <script type="text/javascript">
            $(document).ready(function(){
                  var zona = document.getElementById("zonaAlergiaAlimentos");
                  var op = $("input:radio[id=alergiaalimentos1]:checked").val();
                  if(op==1){
                    zona.style.display = '';
                 }
             });
            
            
            $("#alergiaalimentos1").change(function(){
                  var zona = document.getElementById("zonaAlergiaAlimentos");
                  var op = $("input:checkbox[id=alergiaalimentos1]:checked").val();
                    zona.style.display = '';
             });
            
            $("#alergiaalimentos2").change(function(){
                  var zona = document.getElementById("zonaAlergiaAlimentos");
                  var op = $("input:checkbox[id=alergiaalimentos2]:checked").val();
                    zona.style.display = 'none';
             });
         </script>
         <div class="row  justify-content-between" style="margin-top: 10px;">
            <div class="col-4">
               <div class="form-check form-check-inline"> 
                  <label class="labelsform"  >Plantas</label>
               </div>
            </div>
            <div class="col-5">
               <div class="form-check form-check-inline">
                  <label class="containerM" for="alergiaplantas1">
                  <input class="form-check-input" type="radio" name="AlergiaPlatas" id="alergiaplantas1" value="1" <?php if ($datos['datosusuario'][0]["ALERGIA_PLANTAS"]== 1) {  echo "checked"; }?>>
                  <span class="checkmarkSI"></span>
                  Sí</label>
               </div>
               <div class="form-check form-check-inline">
                  <label class="containerM" for="alergiaplantas2">
                  <input class="form-check-input" type="radio" name="AlergiaPlatas" id="alergiaplantas2" value="2" <?php if ($datos['datosusuario'][0]["ALERGIA_PLANTAS"]== 2) {  echo "checked"; }?>>
                  <span class="checkmark"></span>
                  No</label>
               </div>
            </div>
         </div>
         <div class="row" id="zonaAlergiaPlantas" style="display: none; margin-top: -5;">
            <div class="col-12">
               <label class="labelsform">Especifique a que Plantas</label>
            </div>
            <div class="col-12">
               <textarea type="text" maxlength="99" class="form-control form-control-sm estiloCampo" name="DetalleAlergiaPlantas" id="DetalleAlergiaPlantas"><?php echo $datos["datosusuario"][0]["DETALLE_ALERGIA_PLANTES"]; ?></textarea>
            </div>
         </div>
         <script type="text/javascript">
            $(document).ready(function(){
                  var zona = document.getElementById("zonaAlergiaPlantas");
                  var op = $("input:radio[id=alergiaplantas1]:checked").val();
                  if(op==1){
                    zona.style.display = '';
                 }
             });
            
            
            $("#alergiaplantas1").change(function(){
                  var zona = document.getElementById("zonaAlergiaPlantas");
                  var op = $("input:checkbox[id=alergiaplantas1]:checked").val();
                    zona.style.display = '';
             });
            
            $("#alergiaplantas2").change(function(){
                  var zona = document.getElementById("zonaAlergiaPlantas");
                  var op = $("input:checkbox[id=alergiaplantas2]:checked").val();
                    zona.style.display = 'none';
             });
         </script>
         <!-- row -->
         <!-- row -->
         <div class="row justify-content-between" style="margin-top: 10px;">
            <div class="col-6">
               <div class="form-check form-check-inline"> 
                  <label class="labelsform">Zonas Ambientales</label>
               </div>
            </div>
            <div class="col-5">
               <div class="form-check form-check-inline">
                  <label class="containerM" for="alergiaambiente1">
                  <input class="form-check-input" type="radio" name="AlergiaAmbiente" id="alergiaambiente1" value="1" <?php if ($datos['datosusuario'][0]["ALERGIA_AMBIENTE"]== 1) {  echo "checked"; }?>> 
                  <span class="checkmarkSI"></span>
                  Sí</label>
               </div>
               <div class="form-check form-check-inline">
                  <label class="containerM" for="alergiaambientea2">
                  <input class="form-check-input" type="radio" name="AlergiaAmbiente" id="alergiaambientea2" value="2" <?php if ($datos['datosusuario'][0]["ALERGIA_AMBIENTE"]== 2) {  echo "checked"; }?>>
                  <span class="checkmark"></span>
                  No</label>
               </div>
            </div>
         </div>
         <div class="row" id="zonaAlergiaAmbientales" style="display: none; margin-top: -5;">
            <div class="col-12">
               <label class="labelsform">Especifique a que Zonas Ambientes</label>
            </div>
            <div class="col-12">
               <textarea type="text" maxlength="99" class="form-control form-control-sm estiloCampo" name="DetalleAlergiaAmbiente" id="DetalleAlergiaAmbiente" ><?php echo $datos["datosusuario"][0]["DETALLE_ALERGIA_AMBIETE"]; ?></textarea>
            </div>
         </div>
         <script type="text/javascript">
            $(document).ready(function(){
                  var zona = document.getElementById("zonaAlergiaAmbientales");
                  var op = $("input:radio[id=alergiaambiente1]:checked").val();
                  if(op==1){
                    zona.style.display = '';
                 }
             });
            
            
            $("#alergiaambiente1").change(function(){
                  var zona = document.getElementById("zonaAlergiaAmbientales");
                  var op = $("input:checkbox[id=alergiaambiente1]:checked").val();
                    zona.style.display = '';
             });
            
            $("#alergiaambientea2").change(function(){
                  var zona = document.getElementById("zonaAlergiaAmbientales");
                  var op = $("input:checkbox[id=alergiaambientea2]:checked").val();
                    zona.style.display = 'none';
             });
         </script>
         <!-- row -->
         <div class="row" id="zonaOtrasAlergias" style="margin-top: 10px;">
            <div class="col-12">
               <div class="form-check form-check-inline">
                  <label class="labelsform" for="">Especifique Alguna otra Alergia</label>
               </div>
            </div>
            <div class="col-12">
               <div class="">
                  <textarea type="text" maxlength="99" class="form-control form-control-sm estiloinput" id="OtrasAlergia" name="OtrasAlergia" style="width: 100%;" ><?php echo $datos["datosusuario"][0]["OTRAS_ALERGIAS"]; ?></textarea>
               </div>
            </div>
         </div>
      </div>
      <div class="col-6">
         <div class="row">
            <div class="col-6 letratituloedicion">
               <span>Condición médica actual</span>
            </div>
            <div class="col-6 lineainferiorosita">
            </div>
         </div>
         <div class="row" style="margin-top: 10px;">
            <div class="col-6">
               <div class="form-check form-check-inline"> 
                  <label class="labelsform"  >Discapacidad(es)</label>
               </div>
            </div>
            <div class="col-6">
               <div class="form-check form-check-inline">
                  <label class="containerM" for="condiciondiscapacidades1">
                  <input class="form-check-input" type="radio" name="Discapacidad" id="condiciondiscapacidades1" value="1" <?php if ($datos['datosusuario'][0]["DISCAPACIDAD"]== 1) {  echo "checked"; }?> >
                  <span class="checkmarkSI"></span>
                  Sí</label>
               </div>
               <div class="form-check form-check-inline">
                  <label class="containerM" for="condiciondiscapacidades2">
                  <input class="form-check-input" maxlength="100" type="radio" name="Discapacidad" id="condiciondiscapacidades2" value="2" <?php if ($datos['datosusuario'][0]["DISCAPACIDAD"]== 2) {  echo "checked"; }?> >
                  <span class="checkmark"></span>
                  No</label>
               </div>
            </div>
         </div>
         <div class="row" id="zonaDiscapacidad" style="display: none; ">
            <div class="col-12">
               <label class="labelsform">¿Que Discapacidad(es)?</label>
            </div>
            <div class="col-12">
               <textarea type="text" maxlength="100" class="form-control form-control-sm estiloCampo" name="DetalleIncapacidad" id="DetalleIncapacidad"><?php echo $datos["datosusuario"][0]["DETALLE_INCAPACIDAD"]; ?></textarea>
            </div>
         </div>
         <script type="text/javascript">
            $(document).ready(function(){
                  var zona = document.getElementById("zonaDiscapacidad");
                  var op = $("input:radio[id=condiciondiscapacidades1]:checked").val();
                  if(op==1){
                    zona.style.display = '';
                 }
             });
            
            
            $("#condiciondiscapacidades1").change(function(){
                  var zona = document.getElementById("zonaDiscapacidad");
                  var op = $("input:checkbox[id=condiciondiscapacidades1]:checked").val();
                    zona.style.display = '';
             });
            
            $("#condiciondiscapacidades2").change(function(){
                  var zona = document.getElementById("zonaDiscapacidad");
                  var op = $("input:checkbox[id=condiciondiscapacidades2]:checked").val();
                    zona.style.display = 'none';
             });
         </script>
         <!-- row -->
         <!-- row -->
         <div class="row">
            <div class="col-6">
               <div class="form-check form-check-inline"> 
                  <label class="labelsform" >Malformaciones</label>
               </div>
            </div>
            <div class="col-6">
               <div class="form-check form-check-inline">
                  <label class="containerM" for="condicionmalformaciones1">
                  <input class="form-check-input" type="radio" name="MalFormaciones" id="condicionmalformaciones1" value="1" <?php if ($datos['datosusuario'][0]["MALFORMACIONES"]== 1) {  echo "checked"; }?>>
                  <span class="checkmarkSI"></span>
                  Sí</label>
               </div>
               <div class="form-check form-check-inline">
                  <label class="containerM" for="condicionmalformaciones2">
                  <input class="form-check-input" type="radio" name="MalFormaciones" id="condicionmalformaciones2" value="2" <?php if ($datos['datosusuario'][0]["MALFORMACIONES"]== 2) {  echo "checked"; }?>>
                  <span class="checkmark"></span>
                  No</label>
               </div>
            </div>
         </div>
         <div class="row" id="zonaMalormaciones" style="display: none;">
            <div class="col-12">
               <label class="labelsform">¿Que Malformaciones?</label>
            </div>
            <div class="col-12">
               <textarea type="text" maxlength="100" class="form-control form-control-sm estiloCampo" name="DetalleMalFormaciones" id="DetalleMalFormaciones" ><?php echo $datos["datosusuario"][0]["DETALLE_MALFORMACIONES"]; ?></textarea>
            </div>
         </div>
         <script type="text/javascript">
            $(document).ready(function(){
                  var zona = document.getElementById("zonaMalormaciones");
                  var op = $("input:radio[id=condicionmalformaciones1]:checked").val();
                  if(op==1){
                    zona.style.display = '';
                 }
             });
            
            
            $("#condicionmalformaciones1").change(function(){
                  var zona = document.getElementById("zonaMalormaciones");
                  var op = $("input:checkbox[id=condicionmalformaciones1]:checked").val();
                    zona.style.display = '';
             });
            
            $("#condicionmalformaciones2").change(function(){
                  var zona = document.getElementById("zonaMalormaciones");
                  var op = $("input:checkbox[id=condicionmalformaciones2]:checked").val();
                    zona.style.display = 'none';
             });
         </script>
         <!-- row -->
         <!-- row -->
         <div class="row">
            <div class="col-6">
               <div class="form-check form-check-inline"> 
                  <label class="labelsform" >Tratamiento médico</label>
               </div>
            </div>
            <div class="col-6">
               <div class="form-check form-check-inline">
                  <label class="containerM" for="condiciontratamiento1">
                  <input class="form-check-input" type="radio" name="TratamientoMedico" id="condiciontratamiento1" value="1"  <?php if ($datos['datosusuario'][0]["TRATAMIENTO_MEDICO"]== 1) {  echo "checked"; }?>>
                  <span class="checkmarkSI"></span>
                  Sí</label>
               </div>
               <div class="form-check form-check-inline">
                  <label class="containerM" for="condiciontratamiento2">
                  <input class="form-check-input" type="radio" name="TratamientoMedico" id="condiciontratamiento2" value="2" <?php if ($datos['datosusuario'][0]["TRATAMIENTO_MEDICO"]== 2) {  echo "checked"; }?>>
                  <span class="checkmark"></span>
                  No</label>
               </div>
            </div>
         </div>
         <div class="row" id="zonaTratamientoMedico" style="display: none;">
            <div class="col-12">
               <label class="labelsform">¿Cual es tu tratamiento?</label>
            </div>
            <div class="col-12">
               <textarea type="text" maxlength="100" class="form-control form-control-sm estiloCampo" name="DetalleTratamientoMedico" id="DetalleTratamientoMedico"><?php echo $datos["datosusuario"][0]["DETALLE_TRATAMIENTO_MEDICO"]; ?></textarea>
            </div>
         </div>
         <script type="text/javascript">
            $(document).ready(function(){
                  var zona = document.getElementById("zonaTratamientoMedico");
                  var op = $("input:radio[id=condicionmalformaciones1]:checked").val();
                  if(op==1){
                    zona.style.display = '';
                 }
             });
            
            
            $("#condiciontratamiento1").change(function(){
                  var zona = document.getElementById("zonaTratamientoMedico");
                  var op = $("input:checkbox[id=condiciontratamiento1]:checked").val();
                    zona.style.display = '';
             });
            
            $("#condiciontratamiento2").change(function(){
                  var zona = document.getElementById("zonaTratamientoMedico");
                  var op = $("input:checkbox[id=condiciontratamiento2]:checked").val();
                    zona.style.display = 'none';
             });
         </script>
      </div>
   </div>
   <div class="row ">
      <div class="col">
         <div class="row ">
            <div class="col-2 letratituloedicion">
               <span>Datos generales</span>
            </div>
            <div class="col-10 lineainferiorosita">
            </div>
         </div>
         <div class="row">
            <div class="col-4">
               <div class="form-group">
                  <label for="PesoAT">Peso</label>
                  <div style="display: flex;">
                     <input type="number" min="1"  class="form-control form-control-sm estiloinput soloNumeros" name="PesoAT" id="PesoAT" placeholder="Kilogramos" value='<?php echo $datos["datosusuario"][0]["PESO"]; ?>' placeholder="0" >
                     <label for="PesoAT" style="margin-left: 5px;">Kg.</label>
                  </div>
               </div>
            </div>
            <div class="col-4">
               <div class="form-group">
                  <label  for="EstaturaAT">Estatura</label>
                  <div style="display: flex;">
                     <input type="number"  min="1"   class="form-control form-control-sm estiloinput soloNumeros" name="EstaturaAT" id="EstaturaAT" placeholder="cm." value='<?php echo $datos["datosusuario"][0]["ESTATURA"]; ?>' placeholder="0" >
                     <label for="PesoAT" style="margin-left: 5px;">Cm.</label>
                  </div>
               </div>
            </div>
            <div class="col-4">
               <div class="form-group">
                  <label  for="TipoSangre">Tipo de sangre</label>
                  <select class="form-control form-control-sm estiloCampo" name="TipoSangre" id="TipoSangre" >
                     <option value="O-" <?php if ($datos['datosusuario'][0]["TIPO_SABGRE"]== "O-") {  echo "selected"; }?> >O-</option>
                     <option value="O+" <?php if ($datos['datosusuario'][0]["TIPO_SABGRE"]== "O+") {  echo "selected"; }?> >O+</option>
                     <option value="A-" <?php if ($datos['datosusuario'][0]["TIPO_SABGRE"]== "A-") {  echo "selected"; }?> >A-</option>
                     <option value="A+" <?php if ($datos['datosusuario'][0]["TIPO_SABGRE"]== "A+") {  echo "selected"; }?> >A+</option>
                     <option value="B-" <?php if ($datos['datosusuario'][0]["TIPO_SABGRE"]== "B-") {  echo "selected"; }?> >B-</option>
                     <option value="B+" <?php if ($datos['datosusuario'][0]["TIPO_SABGRE"]== "B+") {  echo "selected"; }?> >B+</option>
                     <option value="AB-" <?php if ($datos['datosusuario'][0]["TIPO_SABGRE"]== "AB-") {  echo "selected"; }?> >AB-</option>
                     <option value="AB+" <?php if ($datos['datosusuario'][0]["TIPO_SABGRE"]== "AB+") {  echo "selected"; }?> >AB+</option>
                  </select>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-6">
               <div class="row">
                  <div class="col-6">
                     <div class=" form-check-inline"> 
                        <label class="labelsform" >Uso de medicamentos permanentes</label>
                     </div>
                  </div>
                  <div class="col-6">
                     <div class=" form-check-inline">
                        <label class="containerM" for="usomedicamentospermanetes1">
                        <input class="form-check-input" type="radio" name="MedicamentosPermanentes" id="usomedicamentospermanetes1" value="1" <?php if ($datos['datosusuario'][0]["MEDICAMENTOS_PERMANENTES"]== 1) {  echo "checked"; }?>>
                        <span class="checkmarkSI"></span>
                        Sí</label>
                     </div>
                     <div class="form-check form-check-inline">
                        <label class="containerM" for="usomedicamentospermanetes2">
                        <input class="form-check-input" type="radio" name="MedicamentosPermanentes" id="usomedicamentospermanetes2" value="2" <?php if ($datos['datosusuario'][0]["MEDICAMENTOS_PERMANENTES"]== 2) {  echo "checked"; }?>>
                        <span class="checkmark"></span>
                        No</label>
                     </div>
                  </div>
               </div>
               <div class="row" id="razonMedPer" style="display: none;" >
                  <!--item-->
                  <div class="col-12">
                     <div class=" form-check-inline"> 
                        <label class="labelsform" style="margin-top: 12px;">¿Cuales?</label>
                     </div>
                  </div>
                  <div class="col-12">
                     <textarea type="text" maxlength="100" class="form-control form-control-sm estiloCampo" name="QueMedicamentosPermanentes" id="QueMedicamentosPermanentes" ><?php echo $datos["datosusuario"][0]["QUE_MEDICAMENTOS_PERMANENTES"]; ?></textarea>
                  </div>
               </div>
               <div class="row" id="razonMedPer2"  style="display: none;">
                  <!--item-->
                  <div class="col-12">
                     <div class=" form-check-inline"> 
                        <label class="labelsform" style="margin-top: 6px;">¿Por que Razon?</label>
                     </div>
                  </div>
                  <div class="col-12">
                     <textarea type="text" maxlength="100" class="form-control form-control-sm estiloCampo" name="RazonMedicamentosPermanentes" id="RazonMedicamentosPermanentes"><?php echo $datos["datosusuario"][0]["RAZON_MEDICAMENTOS_PERMANENTES"]; ?></textarea>
                  </div>
               </div>
            </div>
            <script type="text/javascript">
               $(document).ready(function(){
                     var zona = document.getElementById("razonMedPer");
                     var zona2 = document.getElementById("razonMedPer2");
                     var op = $("input:radio[id=usomedicamentospermanetes1]:checked").val();
                     if(op==1){
                       zona.style.display = '';
                       zona2.style.display = '';
                    }
                });
               
               
               $("#usomedicamentospermanetes1").change(function(){
                     var zona = document.getElementById("razonMedPer");
                     var zona2 = document.getElementById("razonMedPer2");
                     var op = $("input:checkbox[id=usomedicamentospermanetes1]:checked").val();
                       zona.style.display = '';
                       zona2.style.display = '';
                });
               
               $("#usomedicamentospermanetes2").change(function(){
                     var zona = document.getElementById("razonMedPer");
                     var zona2 = document.getElementById("razonMedPer2");
                     var op = $("input:checkbox[id=usomedicamentospermanetes2]:checked").val();
                       zona.style.display = 'none';
                       zona2.style.display = 'none';
                });
            </script>
            <div class="col-6">
               <div class="row">
                  <div class="col-6">
                     <div class="form-check form-check-inline"> 
                        <label class="labelsform" style="" >Uso de medicamentos temporales</label>
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="form-check form-check-inline">
                        <label class="containerM" for="usomedicamentostemporales1">
                        <input class="form-check-input" type="radio" name="MedicamentosTemporales" id="usomedicamentostemporales1" value="1" <?php if ($datos['datosusuario'][0]["MEDICAMENTOS_TEMPORALES"]== 1) {  echo "checked"; }?>>
                        <span class="checkmarkSI"></span>
                        Sí</label>
                     </div>
                     <div class="form-check form-check-inline">
                        <label class="containerM" for="usomedicamentostemporales2">
                        <input class="form-check-input" type="radio" name="MedicamentosTemporales" id="usomedicamentostemporales2" value="2" <?php if ($datos['datosusuario'][0]["MEDICAMENTOS_TEMPORALES"]== 2) {  echo "checked"; }?>>
                        <span class="checkmark"></span>
                        No</label>
                     </div>
                  </div>
               </div>
               <div class="row" id="razonMedTemp" style="display: none; ">
                  <!--item-->
                  <div class="col-12">
                     <div class=" form-check-inline"> 
                        <label class="labelsform" style="margin-top: 12px;">¿Cuales?</label>
                     </div>
                  </div>
                  <div class="col-12">
                     <textarea type="text" maxlength="100" class="form-control form-control-sm estiloCampo" name="QueMedicamentosTemporales" id="QueMedicamentosTemporales"><?php echo $datos["datosusuario"][0]["QUE_MEDICAMENTOS_TEMPORALES"]; ?></textarea>
                  </div>
               </div>
               <div class="row" id="razonMedTemp2" style="display: none;">
                  <!--item-->
                  <div class="col-12">
                     <div class=" form-check-inline"> 
                        <label class="labelsform" style="margin-top: 6px;" >¿Por que Razon?</label>
                     </div>
                  </div>
                  <div class="col-12">
                     <textarea type="text" maxlength="100" class="form-control form-control-sm estiloCampo" name="RazonMedicamentosTemporales" id="RazonMedicamentosTemporales" ><?php echo $datos["datosusuario"][0]["RAZON_MEDICAMETOS_EMPORALES"]; ?></textarea>
                  </div>
               </div>
            </div>
         </div>
         <script type="text/javascript">
            $(document).ready(function(){
                  var zona = document.getElementById("razonMedTemp");
                  var zona2 = document.getElementById("razonMedTemp2");
                  var op = $("input:radio[id=usomedicamentostemporales1]:checked").val();
                  if(op==1){
                    zona.style.display = '';
                    zona2.style.display = '';
                 }
             });
            
            $("#usomedicamentostemporales1").change(function(){
            
                  var zona = document.getElementById("razonMedTemp");
                  var zona2 = document.getElementById("razonMedTemp2");
               
                  var op = $("input:radio[id=usomedicamentostemporales1]:checked").val();
            
            
                    zona.style.display = '';
                    zona2.style.display = '';
                  
             });
            
            $("#usomedicamentostemporales2").change(function(){
            
                  var zona = document.getElementById("razonMedTemp");
                  var zona2 = document.getElementById("razonMedTemp2");
               
                  var op = $("input:checkbox[id=usomedicamentostemporales2]:checked").val();
            
            
                    zona.style.display = 'none';
                    zona2.style.display = 'none';
                  
             });
         </script>
         <!-- ------------ -->
         <div class="row">
            <div class="col-6">
               <div class="row" style="margin-top: 20px;">
                  <div class="col-6">
                     <div class="form-check form-check-inline"> 
                        <label class="labelsform" >Accidentes</label>
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="form-check form-check-inline">
                        <label class="containerM" for="datosaccidentes1">
                        <input class="form-check-input" type="radio" name="Accidentes" id="datosaccidentes1" value="1" <?php if ($datos['datosusuario'][0]["ACCIDENTES"]== 1) {  echo "checked"; }?>>
                        <span class="checkmarkSI"></span>
                        Sí</label>
                     </div>
                     <div class="form-check form-check-inline">
                        <label class="containerM" for="datosaccidentes2">
                        <input class="form-check-input" type="radio" name="Accidentes" id="datosaccidentes2" value="2" <?php if ($datos['datosusuario'][0]["ACCIDENTES"]== 2) {  echo "checked"; }?>>
                        <span class="checkmark"></span>
                        No</label>
                     </div>
                  </div>
               </div>
               <div class="row" id="razonAcci" style="display: none;">
                  <!--item-->
                  <div class="col-12">
                     <div class=" form-check-inline"> 
                        <label class="labelsform" style="margin-top: 6px;">¿Cuales?</label>
                     </div>
                  </div>
                  <div class="col-12">
                     <textarea type="text" maxlength="100" class="form-control form-control-sm estiloCampo" name="DetalleAccidente" id="DetalleAccidente"><?php echo $datos["datosusuario"][0]["DETALE_ACCIDENTE"]; ?></textarea>
                  </div>
               </div>
            </div>
            <script type="text/javascript">
               $(document).ready(function(){
                     var zona = document.getElementById("razonAcci");
                     var op = $("input:radio[id=datosaccidentes1]:checked").val();
                     if(op==1){
                       zona.style.display = '';
                    }
                });
               
               $("#datosaccidentes1").change(function(){
               
                     var zona = document.getElementById("razonAcci");
                  
                     var op = $("input:checkbox[id=datosaccidentes1]:checked").val();
               
               
                       zona.style.display = '';
                     
                });
               
               $("#datosaccidentes2").change(function(){
               
                     var zona = document.getElementById("razonAcci");
                  
                     var op = $("input:checkbox[id=datosaccidentes2]:checked").val();
               
               
                       zona.style.display = 'none';
                     
                });
               
            </script>
            <div class="col-6">
               <div class="row" style="margin-top: 20px;">
                  <div class="col-6">
                     <div class="form-check form-check-inline"> 
                        <label class="labelsform" >Traumatismos</label>
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="form-check form-check-inline">
                        <label class="containerM" for="datostraumatismos1">
                        <input class="form-check-input" type="radio" name="Traumatismos" id="datostraumatismos1" value="1" <?php if ($datos['datosusuario'][0]["TRAUMATISMOS"]== 1) {  echo "checked"; }?>>
                        <span class="checkmarkSI"></span>
                        Sí</label>
                     </div>
                     <div class="form-check form-check-inline">
                        <label class="containerM" for="datostraumatismos2">
                        <input class="form-check-input" type="radio" name="Traumatismos" id="datostraumatismos2" value="2" <?php if ($datos['datosusuario'][0]["TRAUMATISMOS"]== 2) {  echo "checked"; }?>>
                        <span class="checkmark"></span>
                        No</label>
                     </div>
                  </div>
               </div>
               <div class="row" id="razonTrauma" style="display: none;">
                  <!--item-->
                  <div class="col-12">
                     <div class=" form-check-inline"> 
                        <label class="labelsform" style="margin-top: 6px;">¿Cuales?</label>
                     </div>
                  </div>
                  <div class="col-12">
                     <textarea type="text" maxlength="100" class="form-control form-control-sm estiloCampo" name="DetalleTraumatismos" id="DetalleTraumatismos"><?php echo $datos["datosusuario"][0]["DETALE_ACCIDENTE"]; ?></textarea>
                  </div>
               </div>
            </div>
            <script type="text/javascript">
               $(document).ready(function(){
                     var zona = document.getElementById("razonTrauma");
                     var op = $("input:radio[id=datosaccidentes1]:checked").val();
                     if(op==1){
                       zona.style.display = '';
                    }
                });
               
               $("#datostraumatismos1").change(function(){
               
                     var zona = document.getElementById("razonTrauma");
                  
                     var op = $("input:checkbox[id=datostraumatismos1]:checked").val();
               
               
                       zona.style.display = '';
                     
                });
               
               $("#datostraumatismos2").change(function(){
               
                     var zona = document.getElementById("razonTrauma");
                  
                     var op = $("input:checkbox[id=datostraumatismos2]:checked").val();
               
               
                       zona.style.display = 'none';
                     
                });
               
            </script>
         </div>
         <div class="row">
            <div class="col-6">
               <div class="row" style="margin-top: 20px;">
                  <div class="col-6">
                     <div class="form-check form-check-inline"> 
                        <label class="labelsform" >Operaciones</label>
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="form-check form-check-inline">
                        <label class="containerM" for="operaciones1">
                        <input class="form-check-input" type="radio" name="Operaciones" id="operaciones1" value="1" <?php if ($datos['datosusuario'][0]["OPERACIONES"]== 1) {  echo "checked"; }?>>
                        <span class="checkmarkSI"></span>
                        Sí</label>
                     </div>
                     <div class="form-check form-check-inline">
                        <label class="containerM" for="operaciones2">
                        <input class="form-check-input" type="radio" name="Operaciones" id="operaciones2" value="2" <?php if ($datos['datosusuario'][0]["OPERACIONES"]== 2) {  echo "checked"; }?>>
                        <span class="checkmark"></span>
                        No</label>
                     </div>
                  </div>
               </div>
               <div class="row" id="razonOpera" style="display: none;">
                  <!--item-->
                  <div class="col-12">
                     <div class=" form-check-inline"> 
                        <label class="labelsform" style="margin-top: 12px;">¿Cuales?</label>
                     </div>
                  </div>
                  <div class="col-12">
                     <textarea type="text" maxlength="100" class="form-control form-control-sm estiloCampo" name="DetalleOperaciones" id="DetalleOperaciones"><?php echo $datos["datosusuario"][0]["DETALLE_OPERACIONES"]; ?></textarea>
                     <input type="text" class="form-control form-control-sm estiloCampo" name="IDD" id="DetalleOperaciones" value='<?php echo $datos["datosusuario"][0]["ID"]; ?>' style="display: none;">
                  </div>
               </div>
            </div>
            <script type="text/javascript">
               $(document).ready(function(){
                     var zona = document.getElementById("razonOpera");
                     var op = $("input:radio[id=operaciones1]:checked").val();
                     if(op==1){
                       zona.style.display = '';
                    }
                });
               
               $("#operaciones1").change(function(){
               
                     var zona = document.getElementById("razonOpera");
                  
                     var op = $("input:checkbox[id=operaciones1]:checked").val();
               
               
                       zona.style.display = '';
                     
                });
               
               $("#operaciones2").change(function(){
               
                     var zona = document.getElementById("razonOpera");
                  
                     var op = $("input:checkbox[id=operaciones2]:checked").val();
               
               
                       zona.style.display = 'none';
                     
                });
            </script>
            <div class="col-6">
               <div class="row" style="margin-top: 20px;">
                  <div class="col-6">
                     <div class="form-check form-check-inline"> 
                        <label class="labelsform" >Operaciones pendientes</label>
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="form-check form-check-inline">
                        <label class="containerM" for="operacionespendientes1">
                        <input class="form-check-input" type="radio" name="OperacionesPendientes" id="operacionespendientes1" value="1" <?php if ($datos['datosusuario'][0]["OPERACIONES_PENDIENTES"]== 1) {  echo "checked"; }?>>
                        <span class="checkmarkSI"></span>
                        Sí</label>
                     </div>
                     <div class="form-check form-check-inline">
                        <label class="containerM" for="operacionespendientes2">
                        <input class="form-check-input" type="radio" name="OperacionesPendientes" id="operacionespendientes2" value="2" <?php if ($datos['datosusuario'][0]["OPERACIONES_PENDIENTES"]== 2) {  echo "checked"; }?>>
                        <span class="checkmark"></span>
                        No</label>
                     </div>
                  </div>
               </div>
               <div class="row" id="razonOpePend" style="display: none;">
                  <!--item-->
                  <div class="col-12">
                     <div class=" form-check-inline"> 
                        <label class="labelsform" style="margin-top: 6px;">¿Que Operaciones Pendientes?</label>
                     </div>
                  </div>
                  <div class="col-12">
                     <textarea type="text" maxlength="100" class="form-control form-control-sm estiloCampo" name="DetalleOperacionesPendientes" id="DetalleOperacionesPendientes" ><?php echo $datos["datosusuario"][0]["DETALLE_OPERACIONES_PENDIENTE"]; ?></textarea>
                  </div>
               </div>
            </div>
            <script type="text/javascript">
               $(document).ready(function(){
                     var zona = document.getElementById("razonOpePend");
                     var op = $("input:radio[id=operacionespendientes1]:checked").val();
                     if(op==1){
                       zona.style.display = '';
                    }
                });
               
               
               $("#operacionespendientes1").change(function(){
               
                     var zona = document.getElementById("razonOpePend");
                  
                     var op = $("input:checkbox[id=operacionespendientes1]:checked").val();
               
               
                       zona.style.display = '';
                     
                });
               
               $("#operacionespendientes2").change(function(){
               
                     var zona = document.getElementById("razonOpePend");
                  
                     var op = $("input:checkbox[id=operacionespendientes2]:checked").val();
               
               
                       zona.style.display = 'none';
                     
                });
            </script>
         </div>
         <!-- ----------- -->
         <?php if ($datos['datosPersonales'][0]["SEXO"]== 1) { ?>
         <div class="row">
            <div class="col-6">
               
               <div class="row" style="margin-top: 20px;">
                  <div class="col-6">
                     <div class="form-check form-check-inline"> 
                        <label class="labelsform" >Embarazo</label>
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="form-check form-check-inline">
                        <label class="containerM" for="embarazos1">
                        <input class="form-check-input" type="radio" name="Embarazo" id="embarazos1" value="1" <?php if ($datos['datosusuario'][0]["EMBARAZO"]== 1) {  echo "checked"; }?>>
                        <span class="checkmarkSI"></span>
                        Sí</label>
                     </div>
                     <div class="form-check form-check-inline">
                        <label class="containerM" for="embarazos2">
                        <input class="form-check-input" type="radio" name="Embarazo" id="embarazos2" value="2" <?php if ($datos['datosusuario'][0]["EMBARAZO"]== 2) {  echo "checked"; }?>>
                        <span class="checkmark"></span>
                        No</label>
                     </div>
                  </div>
               </div>
               <div class="row" style="margin-top: 20px;">
                  <div class="col-12">
                     <label class="labelsform" >¿Inicio de su período de gestación?</label>
                  </div>
               </div>
               <div class="row" id="razonEmbMes" style="display: none;">
                  <!--item-->
                  
                  <div class="col-6" style="display: block;">
                     <div class=" form-check-inline"> 
                        <label class="labelsform" >Mes</label>
                     </div>
                     <select class="form-control form-control-sm estiloCampo" name="MesEmbarazo" id="MesEmbarazo">
                        <option value="1" <?php if ($datos['datosusuario'][0]["MES_EMBARAZO"]=="ENERO") {  echo "selected"; }?> > ENERO</option>
                        <option value="2" <?php if ($datos['datosusuario'][0]["MES_EMBARAZO"]=="FEBRERO") {  echo "selected"; }?> > FEBRERO</option>
                        <option value="3" <?php if ($datos['datosusuario'][0]["MES_EMBARAZO"]=="MARZO") {  echo "selected"; }?> > MARZO</option>
                        <option value="4" <?php if ($datos['datosusuario'][0]["MES_EMBARAZO"]=="ABRIL") {  echo "selected"; }?> > ABRIL</option>
                        <option value="5" <?php if ($datos['datosusuario'][0]["MES_EMBARAZO"]=="MAYO") {  echo "selected"; }?> > MAYO</option>
                        <option value="6" <?php if ($datos['datosusuario'][0]["MES_EMBARAZO"]=="JUNIO") {  echo "selected"; }?> > JUNIO</option>
                        <option value="7" <?php if ($datos['datosusuario'][0]["MES_EMBARAZO"]=="JULIO") {  echo "selected"; }?> > JULIO</option>
                        <option value="8" <?php if ($datos['datosusuario'][0]["MES_EMBARAZO"]=="AGOSTO") {  echo "selected"; }?> > AGOSTO</option>
                        <option value="9" <?php if ($datos['datosusuario'][0]["MES_EMBARAZO"]=="SEPTIEMBRE") {  echo "selected"; }?> > SEPTIEMBRE</option>
                        <option value="10" <?php if ($datos['datosusuario'][0]["MES_EMBARAZO"]=="10") {  echo "selected"; }?> > OCTUBRE</option>
                        <option value="11" <?php if ($datos['datosusuario'][0]["MES_EMBARAZO"]=="NOVIEMBRE") {  echo "selected"; }?> > NOVIEMBRE</option>
                        <option value="12" <?php if ($datos['datosusuario'][0]["MES_EMBARAZO"]=="DICIEMBRE") {  echo "selected"; }?> > DICIEMBRE</option>
                     </select>
                  </div>
               
                  <!--item-->
                  
                  <div class="col-6" style="display: block;">
                      <div class=" form-check-inline"> 
                        <label class="labelsform" >Año</label>
                     </div>
                     <?php
                        $cont = date('Y');
                        ?>
                     <select class="form-control form-control-sm estiloCampo" name="AnioEmbarazo" id="AnioEmbarazo">
                        <?php while ($cont >= 1950) { ?>
                        <option value="<?php echo($cont); ?>" <?php if ($datos['datosusuario'][0]["ANIO_EMBARAZO"]== $cont) {  echo "selected"; }?> ><?php echo($cont); ?></option>
                        <?php $cont = ($cont-1); } ?>
                     </select>
                  </div>
               </div>
                <div class="row" style="margin-top: 20px;">
                  <div class="col-12">
                     <label class="labelsform" >¿Fecha prevista de parto?</label>
                  </div>
               </div>
               <div class="row" id="razonPartMes" style="display: none;">
                  <!--item-->
                  <div class="col-6">
                     <div class=" form-check-inline"> 
                        <label class="labelsform" >Mes</label>
                     </div>
                     <select class="form-control form-control-sm estiloCampo" name="MesParto" id="MesParto">
                        <option value="1" <?php if ($datos['datosusuario'][0]["MES_PARTO"]=="ENERO") {  echo "selected"; }?> > ENERO</option>
                        <option value="2" <?php if ($datos['datosusuario'][0]["MES_PARTO"]=="FEBRERO") {  echo "selected"; }?> > FEBRERO</option>
                        <option value="3" <?php if ($datos['datosusuario'][0]["MES_PARTO"]=="MARZO") {  echo "selected"; }?> > MARZO</option>
                        <option value="4" <?php if ($datos['datosusuario'][0]["MES_PARTO"]=="ABRIL") {  echo "selected"; }?> > ABRIL</option>
                        <option value="5" <?php if ($datos['datosusuario'][0]["MES_PARTO"]=="MAYO") {  echo "selected"; }?> > MAYO</option>
                        <option value="6" <?php if ($datos['datosusuario'][0]["MES_PARTO"]=="JUNIO") {  echo "selected"; }?> > JUNIO</option>
                        <option value="7" <?php if ($datos['datosusuario'][0]["MES_PARTO"]=="JULIO") {  echo "selected"; }?> > JULIO</option>
                        <option value="8" <?php if ($datos['datosusuario'][0]["MES_PARTO"]=="AGOSTO") {  echo "selected"; }?> > AGOSTO</option>
                        <option value="9" <?php if ($datos['datosusuario'][0]["MES_PARTO"]=="SEPTIEMBRE") {  echo "selected"; }?> > SEPTIEMBRE</option>
                        <option value="10" <?php if ($datos['datosusuario'][0]["MES_PARTO"]=="OCTUBRE") {  echo "selected"; }?> > OCTUBRE</option>
                        <option value="11" <?php if ($datos['datosusuario'][0]["MES_PARTO"]=="NOVIEMBRE") {  echo "selected"; }?> > NOVIEMBRE</option>
                        <option value="12" <?php if ($datos['datosusuario'][0]["MES_PARTO"]=="DICIEMBRE") {  echo "selected"; }?> > DICIEMBRE</option>
                     </select>
                  </div>
               
                  <!--item-->
                  <div class="col-6">
                     <div class=" form-check-inline"> 
                        <label class="labelsform" >Año</label>
                     </div>
                     <?php
                        $cont = date('Y');
                        ?>
                     <select class="form-control form-control-sm estiloCampo" name="AnioParto" id="AnioParto" value='<?php echo $datos["datosusuario"][0]["ANIO_PARTO"]; ?>'>
                        <?php while ($cont >= 1950) { ?>
                        <option value="<?php echo($cont); ?>" <?php if ($datos['datosusuario'][0]["ANIO_PARTO"]== $cont) {  echo "selected"; }?> ><?php echo($cont); ?></option>
                        <?php $cont = ($cont-1); } ?>
                     </select>
                  </div>
               </div>
            </div>
            <script type="text/javascript">
               $(document).ready(function(){
                     var zona1 = document.getElementById("razonEmbMes");
                     var zona3 = document.getElementById("razonPartMes");
                     
               
                     var op = $("input:radio[id=embarazos1]:checked").val();
                     if(op==1){
                       zona1.style.display = '';
                       
                       zona3.style.display = '';
                       
                    }
                });
               
               $("#embarazos1").change(function(){
               
                     var zona1 = document.getElementById("razonEmbMes");
                     var zona3 = document.getElementById("razonPartMes");
                     
                  
                     var op = $("input:checkbox[id=embarazos1]:checked").val();
               
               
                       zona1.style.display = '';
                       
                       zona3.style.display = '';
                       
                     
                });
               
               $("#embarazos2").change(function(){
               
                     var zona1 = document.getElementById("razonEmbMes");
                     
                     var zona3 = document.getElementById("razonPartMes");
                     
                  
                     var op = $("input:checkbox[id=embarazos2]:checked").val();
               
               
                       zona1.style.display = 'none';
                       
                       zona3.style.display = 'none';
                       
                     
                });
            </script>
         </div>
         <?php } ?>
         <!-- ------------ -->
      </div>
   </div>
   </div>
</form>

<form id="formularioMedicos" action="<?=base_url('configuracion/fichamedica/agregarFormulario')?>" style="width: 100%;" >
   <div class="row">
      <div class="col-12" id="zonaDatosMedico">

         <div class="row">
            <div class="col-3 letratituloedicion">
               <span>Datos Médico Particular</span>
            </div>
            <div class="col-9 lineainferiorosita">
            </div>
         </div>
         <div class="row text-right">
            <div class="col-12 " >
               <span class="linkAccion" onclick="agregarMedicoParticular();">NUEVO MÉDICO</span>
            </div>
         </div>

         <?php 
            $i=0;
            $tam = count($datos['datosMedicos']); if($tam>0){ for ($i=0; $i < $tam; $i++) { ?>
         <div class="row" id="medicos<?php echo($i); ?>" style="border-bottom: 1px solid #e8e8e8;">
            <input type="text" name='IdFichaMedicaM<?php echo($i);?>' style="display: none;" value='<?php echo $datos["datosusuario"][0]["ID"]; ?>'>
            <input type="text" id="medicos<?php echo $datos['datosMedicos'][$i]['ID']; ?>" name='IdM<?php echo($i);?>' style="display: none;" value='<?php echo $datos['datosMedicos'][$i]['ID']; ?>'>
            <div class="col-12">
               <div class="form-group">
                  <label for="estatuslaboralactual">Nombre</label>
                  <input type="text" maxlength="50" class="form-control form-control-sm estiloCampo" id="totalexperienciaslaborales" value="<?php echo $datos['datosMedicos'][$i]['NOMBRE_COMPLETO'];?>" name="NomreCompleto<?php echo($i); ?>" >
               </div>
            </div>
            <div class="col-6">
               <div class="form-group">
                  <label for="estatuslaboralactual">Teléfono de Oficina</label>
                  <input  maxlength="10" onKeyPress="return inputDnumeros(event)" class="form-control form-control-sm estiloCampo phone_with_ddd" id="totalexperienciaslaborales" value="<?php echo $datos['datosMedicos'][$i]['TELEFONO_OFICINA'];?>" name="TelefonoOficina<?php echo($i); ?>" >
               </div>
            </div>
            <div class="col-6">
               <div class="form-group">
                  <label for="estatuslaboralactual">Teléfono Celular:</label>
                  <input  maxlength="10" onKeyPress="return inputDnumeros(event)" class="form-control form-control-sm estiloCampo phone_with_ddd" id="totalexperienciaslaborales" value="<?php echo $datos['datosMedicos'][$i]['TELEFONO_CELULAR'];?>" name="TelefonoCelular<?php echo($i); ?>" >
               </div>
            </div>
            <div class="col-12">
               <div class="form-group">
                  <label for="estatuslaboralactual">Correo</label>
                  <input type="text" maxlength="30" class="form-control form-control-sm estiloCampo" id="totalexperienciaslaborales" value="<?php echo $datos['datosMedicos'][$i]['CORREO_ELECTRONICO'];?>" name="CorreoElectronico<?php echo($i); ?>" >
               </div>
            </div>
            <div class="col-12">
               <div class="form-group">
                  <div class="col-12 " >
                     <span class="linkAccion" onclick="eliminarMedico(<?php echo $datos['datosMedicos'][$i]['ID']; ?>)">ELIMINAR MÉDICO</span> 
                  </div>
               </div>
            </div>
         </div>
         <?php  } } ?>
         <input id="tamanio" type="text" name="tamanio" style="display: none;" value="<?php echo($tam); ?>">
      </div>
   </div>
</form>
<script type="text/javascript">
   $(document).ready(function(){
      $('.codepost').mask('00000'); 
      $('.phone_with_ddd').mask('(000) 000 0000'); 
   });
</script>
<form id="FormularioFichaContacto" action="<?=base_url('configuracion/fichamedica/agregarFormulario2')?>" style="width: 100%;" >
   <div class="row" style="border-top: 1px solid #e8e8e8;">
      <div class="col" id="zonaContactos">
         <div class="row">
            <div class="col letratituloedicion">
               <span>Datos Contactos Emergencias</span>
            </div>
            <div class="col lineainferiorosita">
            </div>
         </div>
         <div class="row text-right">
            <div class="col-12 " >
               <span class="linkAccion" onclick="agregarContactoEmergencia()">NUEVO CONTACTO</span>
            </div>
         </div>
         <?php 
            $tam = count($datos['datosEmergen']);
            $i=0;
            for ($i=0; $i < $tam; $i++) { 
            
            ?> 
         <div class="row" id="Contacto<?php echo($i) ?>" style="border-bottom: 1px solid #e8e8e8; margin-top: 10px;">
            <div class="col-12">
               <div class="row">
                  <div class="col-6">
                     <input type="text" style="display: none"  name="IdC<?php echo($i);?>" value="<?php echo $datos["datosEmergen"][$i]["ID"]; ?>">
                     <input type="text" style="display: none"  name="IdFichaMedicaC<?php echo($i); ?>" value="<?php echo $datos["datosusuario"][0]["ID"]; ?>">
                     <label>Nombre Completo</label>
                     <input type="text" name="NombreCompleto<?php echo($i) ?>" maxlength="30" class="form-control form-control-sm estiloCampo" id="nombreCompleto" value="<?php echo($datos['datosEmergen'][$i]['NOMBRE_COMPLETO']) ?>">
                  </div>
                  <div class="col-6">
                     <label>Parentesco</label>
                     <select class="form-control form-control-sm estiloCampo" id="Parentesco" name="Parentesco<?php echo($i) ?>" maxlength="10">
                        <option value="1" <?php if ($datos['datosEmergen'][$i]["PARENTESCO"]=="MADRE") {  echo "selected"; }?> > MADRE</option>
                        <option value="2" <?php if ($datos['datosEmergen'][$i]["PARENTESCO"]=="PADRE") {  echo "selected"; }?> > PADRE</option>
                        <option value="3" <?php if ($datos['datosEmergen'][$i]["PARENTESCO"]=="HERMANO") {  echo "selected"; }?> > HERMANO</option>
                        <option value="4" <?php if ($datos['datosEmergen'][$i]["PARENTESCO"]=="HERMANA") {  echo "selected"; }?> > HERMANA</option>
                        <option value="5" <?php if ($datos['datosEmergen'][$i]["PARENTESCO"]=="TIA") {  echo "selected"; }?> > TIA</option>
                        <option value="6" <?php if ($datos['datosEmergen'][$i]["PARENTESCO"]=="TIO") {  echo "selected"; }?> > TIO</option>
                        <option value="7" <?php if ($datos['datosEmergen'][$i]["PARENTESCO"]=="ABUELA") {  echo "selected"; }?> > ABUELA</option>
                        <option value="8" <?php if ($datos['datosEmergen'][$i]["PARENTESCO"]=="ABUELO") {  echo "selected"; }?> > ABUELO</option>
                        <option value="9" <?php if ($datos['datosEmergen'][$i]["PARENTESCO"]=="TUTOR") {  echo "selected"; }?> > TUTOR</option>
                        <option value="10" <?php if ($datos['datosEmergen'][$i]["PARENTESCO"]=="CONCUBINO") {  echo "selected"; }?> > CONCUBINO</option>
                        <option value="11" <?php if ($datos['datosEmergen'][$i]["PARENTESCO"]=="CONCUBINA") {  echo "selected"; }?> > CONCUBINA</option>
                        <option value="12" <?php if ($datos['datosEmergen'][$i]["PARENTESCO"]=="ESPOSO") {  echo "selected"; }?> > ESPOSO</option>
                        <option value="13" <?php if ($datos['datosEmergen'][$i]["PARENTESCO"]=="ESPOSA") {  echo "selected"; }?> > ESPOSA</option>
                     </select>
                  </div>
               </div>
               <div class="row">
                  <div class="col-6">
                     <label>Correo</label>
                     <input type="text" name="CorreoElectronico<?php echo($i) ?>" maxlength="30" class="form-control form-control-sm estiloCampo" id="CorreoElectronico" value="<?php echo($datos['datosEmergen'][$i]['CORREO_ELECTRONICO']) ?>">
                  </div>
                  <div class="col-3">
                     <label>Teléfono de Casa</label>
                     <input type="text" name="TelefonoCasa<?php echo($i) ?>" maxlength="10" onKeyPress="return inputDnumeros(event)" class="form-control phone_with_ddd form-control-sm estiloCampo " id="TelefonoCasa" value="<?php echo($datos['datosEmergen'][$i]['TELEFONO_CASA']) ?>">
                  </div>
                  <div class="col-3">
                     <label>Teléfono Celular</label>
                     <input type="text" name="TelefonoCelular<?php echo($i) ?>" maxlength="10" onKeyPress="return inputDnumeros(event)" class="form-control phone_with_ddd form-control-sm estiloCampo " id="TelefonoCelular" value="<?php echo($datos['datosEmergen'][$i]['TELEFONO_CELULAR']) ?>">
                  </div>
               </div>
               <div class="row" style="margin: 15px 0;">
                  <div class="col-12">
                     <span class="linkAccion" onclick="eliminarContacto(<?php echo $datos['datosEmergen'][$i]['ID']; ?>)">ELIMINAR CONTACTO</span> 
                  </div>
               </div>
            </div>
         </div>
         <?php          
            } ?>
         <input id="tamanio2" type="text" name="tamanio2" style="display: none;" value="<?php echo($tam); ?>">
      </div>
   </div>
</form>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered " role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Mensaje del sistema</h5>
         </div>
         <div class="modal-body" id="txtMensaje">
         </div>
         <div class="modal-footer">
            <button type="button" class="btn" id="botonconfirm" data-dismiss="modal" onclick="recargapagina()"  style="color: white; background-color: #239dff">Actualizar</button>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="exampleModalA" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered " role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Mensaje del sistema</h5>
         </div>
         <div class="modal-body" id="txtMensajeA">
         </div>
         <div class="modal-footer">
            <button type="button" class="btn" id="botonconfirm" data-dismiss="modal" onclick=""  style="color: white; background-color: #239dff">Regresar</button>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">
   $('.estiloCampo').on("mouseover", function(){
   
    $('.phone_with_ddd').mask('(000) 000 0000'); 
   
   });

   //$(".soloNumeros").mask('000.000');


      $( "#PesoAT" ).click(function() {
    if($("#PesoAT").val()==0) {
      $("#PesoAT").val("");
    }
  });

   $( "#EstaturaAT" ).click(function() {
    if($("#EstaturaAT").val()==0) {
      $("#EstaturaAT").val("");
    }
  });

      $("#EstaturaAT").blur( function() {
         var maspuntos = /^[0-9]+\.?[0-9]\-?[e]*$/;
         var result = $("#EstaturaAT").val().match(maspuntos);

         if($("#EstaturaAT").val() < 0 || result == null) {
            $("#EstaturaAT").val("");
         }
      });

      $("#PesoAT").blur( function() {
         var maspuntos = /^[0-9]+\.?[0-9]\-?[e]*$/;
         var result = $("#PesoAT").val().match(maspuntos);

         if($("#PesoAT").val() < 0 || result == null) {
            $("#PesoAT").val("");
         }
      });


   function inputDnumeros(e){
     var key = window.event ? e.which : e.keyCode;
     if (key < 48 || key > 57) {
       e.preventDefault();
     }
   }
   
   function agregarMedicoParticular () {
      var zona = document.getElementById("zonaDatosMedico");
      var div = $('div[id^="medicos"]:last');
      var num;
      if(div.length<=0){
         num=1;
      }else {
         var divId = (div.prop("id").match(/\d+/g));
         num = parseInt(divId,10)+1;
      }
   
         var x = '    ';
   
                  x+='         <div class="row" id="medicos'+num+'" style="border-bottom: 1px solid #e8e8e8;">';
                              
   
                  x+='            <input type="text" name="IdFichaMedicaM'+num+'" style="display: none;" value="'+"<?php echo $datos['datosusuario'][0]['ID']; ?>"+'">';
                  x+='            <input type="text" id="medicos'+num+'" name="IdM'+num+'" style="display: none;" value="0">';
   
   
                     x+='            <div class="col-12">';
                     x+='               <div class="form-group">';
                     x+='                  <label for="estatuslaboralactual">Nombre</label>';
                     x+='                  <input type="text" class="inputsNuevos form-control form-control-sm estiloCampo" name="NomreCompleto'+num+'" id="totalexperienciaslaborales" value="" >';
                     x+='               </div>';
                     x+='            </div>';
   
                     x+='            <div class="col-6">';
                     x+='               <div class="form-group">';
                     x+='                  <label for="estatuslaboralactual">Teléfono de Oficina</label>';
                     x+='                  <input type="text" maxlength="10" onKeyPress="return inputDnumeros(event)" class="inputsNuevo phone_with_ddd form-control form-control-sm estiloCampo phone_with_ddd" name="TelefonoOficina'+num+'" id="totalexperienciaslaborales" value="" >';
                     x+='               </div>';
                     x+='            </div>';
                     x+='            <div class="col-6">';
                     x+='               <div class="form-group">';
                     x+='                  <label for="estatuslaboralactual">Teléfono Celular:</label>';
                     x+='                  <input type="text" maxlength="10" onKeyPress="return inputDnumeros(event)" class="inputsNuevo phone_with_ddd form-control form-control-sm estiloCampo phone_with_ddd" name="TelefonoCelular'+num+'" id="totalexperienciaslaborales" value="" >';
                     x+='               </div>';
                     x+='            </div>';
                     x+='            <div class="col-12">';
                     x+='               <div class="form-group">';
                     x+='                  <label for="estatuslaboralactual">Correo</label>';
                     x+='                  <input type="text" class="inputsNuevos form-control form-control-sm estiloCampo" name="CorreoElectronico'+num+'" id="totalexperienciaslaborales" value="" >';
                     x+='               </div>';
                     x+='            </div>';
                     x+='            <div class="col-12">';
                     x+='                        <div class="form-group">';
                     x+='                           <div class="col-12 " >';
                     x+='                 <span class="linkAccion" onclick="sacarDeListaC('+num+')">Quitar de la lista</span> ';
                     
                     x+='                           </div>';
                     x+='                        </div>';
                     x+='                     </div>';
   
                     x+='            ';
                     x+='         </div>';
   
                     if ( $("#tamanio").length != 0 ) { 
                        $("#tamanio").remove();
                        
                     }
   
                     x += '<input id="tamanio" type="text" name="tamanio" style="display: none;" value="'+(num+1)+'" >'; 
   
                     $(zona).append(x);
   
                     /*$heightDown = ($(window).height() - $('#zonaDatosMedico').height()) - $('#zonaContactos').height() + ($('#FormularioFichaMedica'+num).height())*2;
                     $('html, body').animate({
                          scrollTop: $heightDown
                      }, 1200); */
   
   }
   
   
   function agregarContactoEmergencia () {
   
      var zona = document.getElementById("zonaContactos");
      var div = $('div[id^="Contacto"]:last');
      var num;
      if(div.length<=0){
         num=1;
      }else {
         var divId = (div.prop("id").match(/\d+/g));
         num = parseInt(divId,10)+1;
      }
   
      var x ='  <div class="row" id="Contacto'+num+'" style="border-bottom: 1px solid #e8e8e8;">';
      x+='         <div class="col-12">';
      x+='            <div class="row">';
      x+='               <div class="col-6">';
      x+='                  <input type="text" style="display: none" name="IdC'+num+'" value="0">';
      x+='                  <input type="text" style="display: none" name="IdFichaMedicaC'+num+'" value="'+ '<?php echo $datos["datosusuario"][0]["ID"]; ?>' +'">';
      x+='                  <label>Nombre Completo</label>';
      x+='                  <input type="text" name="NombreCompleto'+num+'" maxlength="30" class="form-control form-control-sm inputsNuevos estiloCampo" id="nombreCompleto" value="">';
      x+='               </div>';
      x+='               <div class="col-6">';
      x+='                  <label>Parentesco</label>';
      x+='                  <select class="form-control form-control-sm estiloCampo" id="Parentesco" name="Parentesco'+num+'">';
      x+='                        <option value="1"  > MADRE</option>';
      x+='                        <option value="2"  > PADRE</option>';
      x+='                        <option value="3"  > HERMANO</option>';
      x+='                        <option value="4"  > HERMANA</option>';
      x+='                        <option value="5"  > TIA</option>';
      x+='                        <option value="6"  > TIO</option>';
      x+='                        <option value="7"  > ABUELA</option>';
      x+='                        <option value="8"  > ABUELO</option>';
      x+='                        <option value="9"  > TUTOR</option>';
      x+='                        <option value="10"  > CONCUBINO</option>';
      x+='                        <option value="11"  > CONCUBINA</option>';
      x+='                        <option value="12"  > ESPOSO</option>';
      x+='                        <option value="13"  > ESPOSA</option>';
      x+='                  </select>';
      x+='               </div>';
      x+='            </div>';
      x+='            <div class="row">';
      x+='               <div class="col-6">';
      x+='                  <label>Correo</label>';
      x+='                  <input type="text" name="CorreoElectronico'+num+'" maxlength="30" class="form-control form-control-sm inputsNuevos estiloCampo" id="CorreoElectronico" value="">';
      x+='               </div>';
      x+='               <div class="col-3">';
      x+='                  <label>Teléfono de Casa</label>';
      x+='                  <input type="text" name="TelefonoCasa'+num+'" maxlength="10" onKeyPress="return inputDnumeros(event)" class="inputsNuevo phone_with_ddd form-control form-control-sm estiloCampo phone_with_ddd"id="TelefonoCasa" value="">';
      x+='               </div>';
      x+='               <div class="col-3">';
      x+='                  <label>Teléfono Celular</label>';
      x+='                  <input type="text" name="TelefonoCelular'+num+'" maxlength="10" onKeyPress="return inputDnumeros(event)" class="inputsNuevo phone_with_ddd form-control form-control-sm estiloCampo phone_with_ddd" id="TelefonoCelular" value="">';
      x+='               </div>';
      x+='            </div>';
      x+='            <div class="row">';
      x+='                <div class="col-12">';
      x+='                 <span class="linkAccion" onclick="sacarDeListaM('+num+')">Quitar de la lista</span> ';
      x+='                </div>';
      x+='            </div>';
      x+='         </div>';
      x+='      </div>';
   
      if ( $("#tamanio2").length != 0 ) { 
            $("#tamanio2").remove();
         }
         x += '<input id="tamanio2" type="text" name="tamanio2" style="display: none;" value="'+(num+1)+'" >'; 
         $(zona).append(x);
   }
   
   function mostrarModal (texto) {
      $("#txtMensaje").empty();
      $("#txtMensaje").text(texto);
      $('#exampleModal').modal('show');
   }

   function mostrarModalAlertas (texto) {
      $("#txtMensajeA").empty();
      $("#txtMensajeA").text(texto);
      $('#exampleModalA').modal('show');
   }

    $('#exampleModal').on('hidden.bs.modal', function () { 
      recargapagina();
    }) 
   
   
   
   function agregarTodo() {
      if(ceroCorrecciones()) {
         editar();
         guardarMedico();
         guardarContacto();
      }
   }

   function ceroCorrecciones () {
      var op = $("#SeguroSocial option:selected").val();
      if(op=="1") {
         if($("#NumSeguroSocial").val() == "") {
            mostrarModalAlertas("El campo del número del Seguro Social se encuentra vacío");
            return false;
         }
         if($("#imgSeguroSocial").attr('src') == "<?=assetgeneral()?>/img/masgris.png") {
            mostrarModalAlertas("Debes subir un comprobante de tu seguro social");
            return false;
         }
      }

      var op = $("#SeguroUniversitario option:selected").val();
      if(op=="1") {
         if($("#seguroUniversitarioCompañia").val() == "") {
            mostrarModalAlertas("El campo de compañía en seguro universitario se encuentra vacío");
            return false;
         }
         if($("#seguroUniversitarioNumeroPoliza").val() == "") {
            mostrarModalAlertas("El campo número de póliza en seguro universitario se encuentra vacío");
            return false;
         }
         if($("#seguroUniversitarioNumeroCertificado").val() == "") {
            mostrarModalAlertas("El campo número de certificado en seguro universitario se encuentra vacío");
            return false;
         }
         if($("#fechaInicioSU").val() == "") {
            mostrarModalAlertas("El campo fecha de inicio del seguro universitario se encuentra vacío");
            return false;
         }
         if($("#fechaTerminoSU").val() == "") {
            mostrarModalAlertas("El campo fecha final del seguro universitario se encuentra vacío");
            return false;
         }
         if($("#imgSeguroUni").attr('src') == "<?=assetgeneral()?>/img/masgris.png") {
            mostrarModalAlertas("Debes subir un comprobante de tu seguro universitario");
            return false;
         }
      }

      var op = $("#SeguroGastosMayores option:selected").val();
      if(op=="1") {
         if($("#segGastosMedMayoCompañia").val() == "") {
            mostrarModalAlertas("El campo de compañía en seguro de gastos médicos mayores se encuentra vacío");
            return false;
         }
         if($("#segGastosMedMayoNumPoliza").val() == "") {
            mostrarModalAlertas("El campo número de póliza en seguro de gastos médicos mayores se encuentra vacío");
            return false;
         }
         if($("#segGastos médicosMedMayoNuCertificado").val() == "") {
            mostrarModalAlertas("El campo plan de certificado en seguro de gastos médicos mayores se encuentra vacío");
            return false;
         }
         if($("#fechaIniciogg").val() == "") {
            mostrarModalAlertas("El campo fecha de inicio del seguro de gastos médicos mayores se encuentra vacío");
            return false;
         }
         if($("#fechaTerminogg").val() == "") {
            mostrarModalAlertas("El campo fecha final del seguro de gastos médicos mayores se encuentra vacío");
            return false;
         }
         if($("#imgSeguroGM").attr('src') == "<?=assetgeneral()?>/img/masgris.png") {
            mostrarModalAlertas("Debes subir un comprobante de tu seguro de gastos médicos mayores");
            return false;
         }
      }

      var op = $("input:radio[id=alergiasmedicamentos1]:checked").val();
      if(op=="1") {
         if($("#DetalleAlergiaMedicamentos").val() == "") {
            mostrarModalAlertas("Especifique los detalles de su alergia a los medicamento");
            return false;
         }
      }
      var op = $("input:radio[id=alergiaalimentos1]:checked").val();
      if(op=="1") {
         if($("#DetalleAlergiaAlimentos").val() == "") {
            mostrarModalAlertas("Especifique los detalles de su alergia a los alimentos");
            return false;
         }
      }
      var op = $("input:radio[id=alergiaplantas1]:checked").val();
      if(op=="1") {
         if($("#DetalleAlergiaPlantas").val() == "") {
            mostrarModalAlertas("Especifique los detalles de su alergia a las plantas");
            return false;
         }
      }

      var op = $("input:radio[id=alergiaambiente1]:checked").val();
      if(op=="1") {
         if($("#DetalleAlergiaAmbiente").val() == "") {
            mostrarModalAlertas("Especifique los detalles de su alergia al ambiente");
            return false;
         }
      }

      var op = $("input:radio[id=condiciondiscapacidades1]:checked").val();
      if(op=="1") {
         if($("#DetalleIncapacidad").val() == "") {
            mostrarModalAlertas("Especifique los detalles de su incapacidad");
            return false;
         }
      }

      var op = $("input:radio[id=condicionmalformaciones1]:checked").val();
      if(op=="1") {
         if($("#DetalleMalFormaciones").val() == "") {
            mostrarModalAlertas("Especifique los detalles de su malformación");
            return false;
         }
      }

      var op = $("input:radio[id=condiciontratamiento1]:checked").val();
      if(op=="1") {
         if($("#DetalleTratamientoMedico").val() == "") {
            mostrarModalAlertas("Especifique los detalles de su tratamiento medico");
            return false;
         }
      }

      var op = $("input:radio[id=datosaccidentes1]:checked").val();
      if(op=="1") {
         if($("#DetalleAccidente").val() == "") {
            mostrarModalAlertas("Especifique que accidentes ha tenido");
            return false;
         }
      }

      var op = $("input:radio[id=operaciones1]:checked").val();
      if(op=="1") {
         if($("#DetalleOperaciones").val() == "") {
            mostrarModalAlertas("Especifique que operaciones ha tenido");
            return false;
         }
      }

      var op = $("input:radio[id=usomedicamentospermanetes1]:checked").val();
      if(op=="1") {
         if($("#QueMedicamentosPermanentes").val() == "") {
            mostrarModalAlertas("Especifique que medicamentos temporales");
            return false;
         }
         if($("#RazonMedicamentosPermanentes").val() == "") {
            mostrarModalAlertas("Especifique las razones de su medicamento temporal");
            return false;
         }
      }

      var op = $("input:radio[id=usomedicamentostemporales1]:checked").val();
      if(op=="1") {
         if($("#QueMedicamentosTemporales").val() == "") {
            mostrarModalAlertas("Especifique que medicamentos temporales");
            return false;
         }
         if($("#RazonMedicamentosTemporales").val() == "") {
            mostrarModalAlertas("Especifique las razones de su medicamento temporal");
            return false;
         }
      }

      var op = $("input:radio[id=datostraumatismos1]:checked").val();
      if(op=="1") {
         if($("#DetalleTraumatismos").val() == "") {
            mostrarModalAlertas("Especifique que traumatismos");
            return false;
         }
      }

      var op = $("input:radio[id=operacionespendientes1]:checked").val();
      if(op=="1") {
         if($("#DetalleOperacionesPendientes").val() == "") {
            mostrarModalAlertas("Especifique que operaciones pendientes");
            return false;
         }
      }

      
      return true;
   }
   
   
   function guardarMedico () {
   
      var data  = $("#formularioMedicos").serialize();
      var url = $("#formularioMedicos").attr('action');
         $.ajax({ 
            type: 'ajax',
            method: 'post',
            url: url,
            async: true, 
            data: data,
            success: function(response){ 
            },
            error: function () {
               
            }
         }) ;
   }
   
   function guardarContacto () {
      var data  = $("#FormularioFichaContacto").serialize();
         var url = $("#FormularioFichaContacto").attr('action');
         $.ajax({ 
            type: 'ajax',
            method: 'post',
            url: url,
            async: true, 
            data: data,
            success: function(response){ 
               
            },
            error: function () {
               
            }
         }) ;
   }
   
   function del (id) {
      $("#contacto".id).remove();
   }

   function del (id) {
      $("#contacto".id).remove();
   }
   
   function eliminarMedico (id) {
   
      $.ajax({ 
         type: 'ajax',
         method: 'post',
         url: '<?=base_url('configuracion/Fichamedica/eliminarMedico')?>',
         async: false, 
         data: {id: id},
         success: function(response){ 
            mostrarModal("Se ha eliminado el médico");
         },
         error: function () {
            
         }
      }) ;
      var zona = document.getElementById("zonaDatosMedico");
      zona.removeChild("medicos"+string(id));
   }
   
   function eliminarContacto (id) {
   
         $.ajax({ 
            type: 'ajax',
            method: 'post',
            url: '<?=base_url('configuracion/Fichamedica/eliminarContacto')?>',
            async: false, 
            data: {id: id},
   
            success: function(response){ 
               mostrarModal("Se ha eliminado tu contacto");
            },
            error: function () {
               
            }
         }) ;
   }

   function sacarDeListaM (id) {
      $("#Contacto"+id).remove();
   }
   function sacarDeListaC (id) {
      $("#medicos"+id).remove();
   }
   
   
   function mandarPrimeraVez() {
      $.ajax({ 
            type: 'ajax',
            method: 'post',
            url: '<?=base_url('configuracion/Fichamedica/asignarPrimeraVez')?>',
            async: false,
   
            success: function(response){ 
               recargapagina();
            },
   
            error: function () {
               
            }
   
         }) ;
   }
   
   function mostrar() {
         $.ajax({ 
            type: 'ajax',
            method: 'post',
            url: '<?=base_url('configuracion/Fichamedica/mostrarUsuario')?>',
            async: false,
   
            success: function(response){ 
               
            },
            error: function () {
               
            }
         }) ;
   }
   
   
      function editar() {
   
         var data  = $("#FormularioFichaMedica").serialize();
         var url = $("#FormularioFichaMedica").attr('action');
         $("#imagenguardar").css("display", "none");
         $("#spiner").css("display", "block");
         $.ajax({ 
            type: 'ajax',
            method: 'post',
            url: url,
            async: true, 
            data: data,
            success: function(response){ 
               mostrarModal("Se ha actualizado tu ficha médica");
            },
            error: function () {
               
            }
         }) ;
      }
      
      function recargapagina() {
         location.href = "<?=base_url('/configuracion/fichamedica')?>";
      }
   
   
   
      $("#otrosAntecedentesPersonales").change(function(){
   
         var zona = document.getElementById("especifiqueotrospersonales");
   
            var op = $("input:checkbox[id=otrosAntecedentesPersonales]:checked").val();
   
            if(op) {
              zona.style.display = '';
            }
            else {
              zona.style.display = 'none';
            }
       });
   
       $("#otrosAlergiass").change(function(){
   
            var zona = document.getElementById("OtrasAlergiasText");
      
               var op = $("input:checkbox[id=otrosAlergiass]:checked").val();
      
               if(op) {
                 zona.style.display = '';
               }
               else {
                 zona.style.display = 'none';
               }
       });
   
        $(document).ready(function () {
            var zona = document.getElementById("zonaSeguroSocial");
            var zona2 = document.getElementById("zonaImgSeguroSocial");
      
               var op = $("#SeguroSocial option:selected").val();
             if(op=="1") {
      
              zona.style.display = '';
              zona2.style.display = '';
              $("#NumSeguroSocial").attr("required",true);
            }
            else if(op=="2") {
              zona.style.display = 'none';
              zona2.style.display = 'none'; 
              $("#NumSeguroSocial").attr("required",false);
            }
         });
   
   
      $("#SeguroSocial").change(function(){
   
         var zona = document.getElementById("zonaSeguroSocial");
         var zona2 = document.getElementById("zonaImgSeguroSocial");
   
            var op = $("#SeguroSocial option:selected").val();
          if(op=="1") {
   
           zona.style.display = '';
           zona2.style.display = '';
           //$("#NumSeguroSocial").attr("required",true);
         }
         else if(op=="2") {

           zona.style.display = 'none';
           zona2.style.display = 'none'; 
           //$("#NumSeguroSocial").attr("required",false);
         }
       });
   
       $(document).ready(function () {
            var zona = document.getElementById("zonaSeguroUniversitario");
            var zona2 = document.getElementById("zonaImgSeguroUniv");
      
               var op = $("#SeguroUniversitario option:selected").val();
      
             if(op=="1") {
              zona.style.display = '';
              zona2.style.display = ''; 
            }
            else if(op=="2") {
               zona.style.display = 'none';
                zona2.style.display = 'none'; 
            }
      });
   
   
      $("#SeguroUniversitario").change(function(){
   
         var zona = document.getElementById("zonaSeguroUniversitario");
         var zona2 = document.getElementById("zonaImgSeguroUniv");
   
            var op = $("#SeguroUniversitario option:selected").val();
   
          if(op=="1") {
           zona.style.display = '';
           zona2.style.display = ''; 
            }
            else if(op=="2") {
               zona.style.display = 'none';
                zona2.style.display = 'none'; 
            }
       });
   
      $(document).ready(function () {
         var zona = document.getElementById("zonaSeguroGastosMedicosMayores");
         var zona2 = document.getElementById("zonaImgSeguroGM");
            var op = $("#SeguroGastosMayores option:selected").val();
   
          if(op=="1") {
           zona.style.display = '';
           zona2.style.display = ''; 
         }
         else if(op=="2") {
            zona.style.display = 'none';
           zona2.style.display = 'none'; 
         }
      });
   
       $("#SeguroGastosMayores").change(function(){
            var zona = document.getElementById("zonaSeguroGastosMedicosMayores");
            var zona2 = document.getElementById("zonaImgSeguroGM");
               var op = $("#SeguroGastosMayores option:selected").val();
      
             if(op=="1") {
              zona.style.display = '';
              zona2.style.display = ''; 
            }
            else if(op=="2") {
               zona.style.display = 'none';
              zona2.style.display = 'none'; 
            }
       });

      

</script>

<?php
} else { 

   ?>
   
   <script type="text/javascript">
   location.href = "<?=base_url('/configuracion/fichamedica')?>";
   </script>
   <?php
} ?>