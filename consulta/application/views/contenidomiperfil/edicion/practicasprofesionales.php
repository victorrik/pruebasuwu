<div id="contenidocambiante" data-id="2">
   <div class="editarflotante"> 
      <button type="button" class="botoneditaredicion" onclick="recargapagina()">
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
     <!-- <button type="button" class="botoneditaredicion" onclick="eliminarpractica()">
      <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELIMINAR.svg"> -->
   </button>
</div>  
<div class="row mt-2">
   <div class="col">
      <div class="box">
         <div class="box-header ">
            <!-- tools box -->
            <div class="row">
               <div class="col-2 letratituloedicion">
                  <span> Datos Generales </span>
               </div> 
               <div class="col-10 lineainferiorosita">

               </div> 
            </div>
         </div>
         <div class="box-body">
            <div class="row bajarObjetos">
               <div class="col" >
                  <div class="form-group" >

                     <label class="nombreCampo" for="totalpracticas">Total de Prácticas</label>

                     <input type="number" id="contadortabs" value="<?php if(!empty($datos['datospracticas'])){ echo count($datos['datospracticas']);}else{echo 1;}?>" hidden="" >
                     <input type="number" class="form-control estiloinput"min="1" max="20" onchange="limitador($(this).val(),$('#contadortabs').val());cambioeltotal();" id="totalpracticas" value="<?php if(!empty($datos['datospracticas'])){ echo count($datos['datospracticas']);}else{echo 1;}?>" style="text-align: center;" disabled="" style="text-align: center;" >
                  </div>
               </div>
               <div class="col">
                  <div class="form-group">
                     <label class="nombreCampo" for="totalhoras">Total de Horas de Prácticas</label>
                     <input type="number" class="form-control estiloCampo" id="totalhoras" value="<?=$datos['tiempo']?>" readonly="" style="text-align: center;">  
                  </div>
               </div>
               <div class="col">
                  <div class="form-group">
                     <label class="nombreCampo" for="totalhoras" >Experiencia Total de Prácticas</label>
                     <input type="text" class="form-control estiloCampo" id="totalhoras" value="<?=formatostotaldesconhoras($datos['tiempo'])?>" readonly="" style="text-align: center;">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-12"> 
      <div class="row">
         <div class="col">
            <div class="box">
               <div class="box-header  ">
                  <div class="row">
                     <div class="col-3 letratituloedicion"  >
                        <span>Prácticas Profesionales</span>
                     </div> 
                     <div class="col-9 lineainferiorosita">
                     </div> 
                  </div>
               </div>
               <div class="box-body">
                  <div class="row">
                     <div class="col-12">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                           <li class="nav-item"> 
                              <a class="nav-link " id=" " data-toggle="tab" href=" " role="tab" aria-controls=" " onclick="menosexp()" aria-selected="true">-</a>
                           </li>
                           <?php
                           if (count($datos["datospracticas"]) == 0) {
                              $esto =1;
                           }
                           else{$esto = count($datos["datospracticas"]);}  for ($tabs=1; $tabs <= $esto ; $tabs++) {  ?>
                              <li class="nav-item" id="li<?=$tabs?>">
                                 <a class="nav-link <?php if ($tabs == 1){ echo "  active"; }?>" id="practicas<?=$tabs?>-tab" data-toggle="tab" href="#practicas<?=$tabs?>" role="tab" aria-controls="practicas<?=$tabs?>" onclick="checacambio(<?=$tabs?>)" aria-selected="true"><?=$tabs?></a>
                              </li>
                           <?php }   ?>
                           <li class="nav-item"> 
                              <a class="nav-link " id=" " data-toggle="tab" href=" " role="tab" aria-controls=" " onclick="masexp()" aria-selected="true">+</a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="tab-content" id="myTabContent"> 
                     <?php for ($tabs=1; $tabs <=20 ; $tabs++) {  ?>

                        <div class="tab-pane fade <?php if ($tabs == 1){ echo "show active"; }?>" id="practicas<?=$tabs?>" role="tabpanel" aria-labelledby="practicas<?=$tabs?>-tab">
                           <div class="row ">
                              <div class="col-11">
                                 <h4 class="titulosenexperencia">Datos de la Empresa</h4>
                              </div> 
                           </div>
                           <form id="formpracticas<?=$tabs?>" data-id="<?=$tabs?>" action="<?=base_url('configuracion/practicasprofesionales/edicionpracticas')?>"> 
                              <div class="row">
                                 <div class="col-6">
                                    <div class="form-group">
                                       <label class="nombreCampo" for="compania<?=$tabs?>">Empresa</label>

                                       <select class="form-control estiloCampo form-control-sm"class="form-control estiloCampo form-control-sm" onchange="consultaempresas($(this).val(),<?=$tabs?>)" name="compania" id="compania<?=$tabs?>">
                                          <option>Seleccione una empresa</option>
                                          <?php foreach ($datos['datosempresas'] as $key) {
                                             ?>  
                                             <option value="<?=$key["ID"]?>" <?php if (!empty($datos['datospracticas'][($tabs-1)]["COMPANIA"])) {if($key["NOMBRE"] === $datos['datospracticas'][($tabs-1)]["COMPANIA"]){echo "selected";}}?> ><?=$key["NOMBRE"]?></option>
                                             <?php
                                          }?>


                                       </select> 
                                    </div>
                                 </div>
                                 <div class="col-4">
                                    <div class="form-group">
                                       <label class="nombreCampo" for="telefonoempresa<?=$tabs?>">Teléfono</label>
                                       <input type="text" class="form-control estiloCampo form-control-sm phone_with_ddd" name="" id="telefonoempresa<?=$tabs?>" value="<?php if(!empty($datos['datospracticas'][($tabs-1)]["TELEFONO_OFICINA"])){ echo $datos['datospracticas'][($tabs-1)]["TELEFONO_OFICINA"];}?>" readonly="" >
                                    </div>
                                 </div>
                                 <div class="col-2">
                                    <div class="form-group">
                                       <label class="nombreCampo" for="extension<?=$tabs?>">Extensión</label>
                                       <input type="text" class="form-control estiloCampo form-control-sm" name="" id="extension<?=$tabs?>"  value="<?php if(!empty($datos['datospracticas'][($tabs-1)]["EXTENCION"])){ echo $datos['datospracticas'][($tabs-1)]["EXTENCION"];}?>" readonly="">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-2">
                                    <div class="form-group">
                                       <label class="nombreCampo" for="paiesmpresa<?=$tabs?>">País</label>
                                       <input type="text" class="form-control estiloCampo form-control-sm" name="" id="paiesmpresa<?=$tabs?>" value="<?php if(!empty($datos['datospracticas'][($tabs-1)]["PAIS"])){ echo $datos['datospracticas'][($tabs-1)]["PAIS"];}?>" readonly="" >
                                    </div>
                                 </div>
                                 <div class="col-2">
                                    <div class="form-group">
                                       <label class="nombreCampo" for="estadoempresa<?=$tabs?>">Estado</label>
                                       <input type="text" class="form-control estiloCampo form-control-sm" name="" id="estadoempresa<?=$tabs?>" value="<?php if(!empty($datos['datospracticas'][($tabs-1)]["ESTADO"])){ echo $datos['datospracticas'][($tabs-1)]["ESTADO"];}?>" readonly="" >
                                    </div>
                                 </div>
                                 <div class="col-2">
                                    <div class="form-group">
                                       <label class="nombreCampo" for="ciudadempresa<?=$tabs?>">Ciudad</label>
                                       <input type="text" class="form-control estiloCampo form-control-sm" name="" id="ciudadempresa<?=$tabs?>" value="<?php if(!empty($datos['datospracticas'][($tabs-1)]["CIUDAD"])){ echo $datos['datospracticas'][($tabs-1)]["CIUDAD"];}?>" readonly="" >
                                    </div>
                                 </div>
                              </div>

                              <div class="row pb-3" style="border-bottom: 2px solid #e3e3e3e3;">
                                 <div class="col-9">
                                    <div class="table-responsive">
                                       <label class="nombresubtituloGris" for="compañia1">Imágenes del lugar</label>
                                       <ul class="list-group list-group-horizontal" id="zona2a<?=$tabs?>">


                                       </ul>
                                    </div>
                                 </div>
                                 <div class="col-3">
                                    <label class="nombresubtituloGris" for="compañia1">Certificado de Práctica</label> 

                                    <input type="file" id="upload_file<?=$tabs?>" hidden="" name="archivo" onchange="preview_image(<?=$tabs?>);" accept=".jpg,.pdf,.png,.jpeg"/>
                                    <input type="text" name='imagen' hidden="" id="img<?=$tabs?>" value=""/> 
                                    <input type="text"   hidden="" id="imgc<?=$tabs?>" value="<?php if(!empty($datos['datospracticas'][($tabs-1)]["DIRECCION_CERTIFICADO"])){ echo $datos['datospracticas'][($tabs-1)]["DIRECCION_CERTIFICADO"];}?>"/>

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


                                                   <?php  if (!empty($datos['datospracticas'][($tabs-1)]["DIRECCION_CERTIFICADO"])){
                                                      ?>
                                                      <div class="contAjustar">
                                                         <div id="contenedorimage<?=$tabs?>" class="boxi"  style="">
                                                            <img id="image_preview<?=$tabs?>"  src="<?=checkimagen($datos['datospracticas'][($tabs-1)]["DIRECCION_CERTIFICADO"])?>" style=""  >
                                                         </div>
                                                         <div class="middle">
                                                            <a style="cursor: pointer;" onclick="mostrarImagen('<?=$datos['datospracticas'][($tabs-1)]["DIRECCION_CERTIFICADO"]?>','image_preview<?=$tabs?>','upload_file<?=$tabs?>','nombreimagen<?=$tabs?>')" ><img class="tarjetaSubirIma" src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" id="imgSeguroSocialB" style=""></a>

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
                                       <div class="row" >
                                          <div class="col-12">
                                             <label class="nombresubtituloGris">Datos Específicos de la Práctica</label>
                                          </div>
                                       </div>
                                       <div class="row" >
                                          <div class="col">
                                             <div class="row">
                                                <div class="col">
                                                   <div class="row" style="border-bottom: 2px solid #e3e3e3e3;">
                                                      <div class="col-3">
                                                         <div class="form-group">
                                                            <label class="nombreCampo" for="areapractica">Área de Práctica</label>
                                                            <input class="form-control estiloCampo form-control-sm" name="areapractica" id="areapractica<?=$tabs?>" value="<?php if(!empty($datos['datospracticas'][($tabs-1)]["AREA_PRACTICA"])){ echo $datos['datospracticas'][($tabs-1)]["AREA_PRACTICA"];}?>"/>
                                                         </div>
                                                      </div>
                                                      <div class="col forma">
                                                         <div class="row">
                                                            <div class="col ">
                                                               <div class="form-group">
                                                                  <label class="nombreCampo" for="iniciolabolal" >Inicio Laboral</label>
                                                                  <input type="text" class="form-control estiloCampo form-control-sm datetimepicker" name="iniciolabolal" id="iniciolabolal<?=$tabs?>" onchange="calculo(<?=$tabs?>)" id="iniciolabolal<?=$tabs?>" placeholder="dd/mm/aaaa" value="<?php if(!empty($datos['datospracticas'][($tabs-1)]["FECHA_INICIO"])){ echo datesqltodate($datos['datospracticas'][($tabs-1)]["FECHA_INICIO"]);}?>" >
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="row">
                                                            <div class="col ">
                                                               <div class="form-group">

                                                                  <label class="nombreCampo" for="cierrelaboral">Cierre Laboral</label>
                                                                  <input type="checkbox" name="actual<?=$tabs?>" id="actual<?=$tabs?>" style="margin-left: 10px;" onchange="actual(<?=$tabs?>)" value="1" <?php if(!empty($datos['datospracticas'][($tabs-1)]["ACTUALMENTE"])){ if($datos['datospracticas'][($tabs-1)]["ACTUALMENTE"] == 1){ echo "checked";}}?> /><label for="actual<?=$tabs?>" style="font-size: 13px;margin-left: 5px;">Actualmente</label> 
                                                                  <input type="text" class="form-control estiloCampo form-control-sm datetimepicker" name="cierrelaboral" id="cierrelaboral<?=$tabs?>" onchange="calculo(<?=$tabs?>)" id="cierrelaboral<?=$tabs?>" placeholder="dd/mm/aaaa" value="<?php if(!empty($datos['datospracticas'][($tabs-1)]["FECHA_TERMINO"])){ echo datesqltodate($datos['datospracticas'][($tabs-1)]["FECHA_TERMINO"]);}?>" >
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="col">
                                                         <div class="form-group">
                                                            <label class="nombreCampo" for="diasrealizados">Días Realizados</label>
                                                            <input type="text" class="form-control estiloCampo form-control-sm" name="diasrealizados" id="diasrealizados<?=$tabs?>" readonly="" value="<?php if(!empty($datos['datospracticas'][($tabs-1)]["HORAS_REALIZADAS"])){ echo intval($datos['datospracticas'][($tabs-1)]["HORAS_REALIZADAS"]/9);}?>"  style="text-align: center;">
                                                         </div>
                                                      </div>
                                                      <div class="col">
                                                         <div class="form-group">
                                                            <label class="nombreCampo" for="horasrealizadas">Horas Realizadas</label>
                                                            <input type="text" class="form-control estiloCampo form-control-sm" name="horasrealizadas"  id="horasrealizadas<?=$tabs?>"     value="<?php if(!empty($datos['datospracticas'][($tabs-1)]["HORAS_REALIZADAS"])){ echo $datos['datospracticas'][($tabs-1)]["HORAS_REALIZADAS"];}?>" style="text-align: center;">
                                                            <input type="number" name="idpractica" id="idpractica<?=$tabs?>" value="<?php if(!empty($datos['datospracticas'][($tabs-1)]["ID"])){ echo $datos['datospracticas'][($tabs-1)]["ID"];}else{echo 0 ;} ?>" hidden>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row ">
                                          <div class="col">

                                             <div class="row">
                                                <div class="col-12">

                                                   <div class="row marcarBorde" style="">
                                                      <div class="col-6" style="margin-top: 10px; ">
                                                         <div class="row">
                                                            <div class="col-12">
                                                               <label class="nombresubtituloGris">Datos del Evaluador</label>
                                                            </div>
                                                         </div>
                                                         <div class="row">
                                                            <div class="col-12">
                                                               <div class="form-group">
                                                                  <label class="nombreCampo" for="nombrejefe" >Nombre del Jefe Inmediato</label>
                                                                  <input type="text" class="form-control estiloCampo form-control-sm" name="nombrejefe" id="nombrejefe<?=$tabs?>"  value="<?php if(!empty($datos['datospracticas'][($tabs-1)]["NOMBRE_JEFE"])){ echo $datos['datospracticas'][($tabs-1)]["NOMBRE_JEFE"];}?>" >
                                                               </div>
                                                            </div>
                                                            <div class="col-12">
                                                               <div class="form-group">
                                                                  <label class="nombreCampo" for="cargojefe">Cargo del Jefe Inmediato</label>
                                                                  <input class="form-control estiloCampo form-control-sm noResize" name="cargojefe" id="cargojefe<?=$tabs?>" value="<?php if(!empty($datos['datospracticas'][($tabs-1)]["CARGO_JEFE"])){ echo $datos['datospracticas'][($tabs-1)]["CARGO_JEFE"];}?>">
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="row" style="border-top: 2px solid #e3e3e3e3;">
                                               <!--          <div class="col-12">
                                                         <label class="nombresubtituloGris">Resumen de Desempeño</label>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-12">
                                                         <div class="form-group">
                                                            <label class="nombreCampo" for="calificacion<?=$tabs?>" >Calificación Final</label>
                                                            <input type="number" min="0" max="10" onchange="nimasnimenos(<?=$tabs?>)" class="form-control estiloCampo form-control-sm money" name="calificacion" id="calificacion<?=$tabs?>" style="text-align: center;"  value="<?php if(!empty($datos['datospracticas'][($tabs-1)]["CALIFICACION_FINAL"])){ echo $datos['datospracticas'][($tabs-1)]["CALIFICACION_FINAL"];}?>">
                                                         </div>
                                                      </div>
                                                   <div class="col-12">
                                                         <div class="form-group">
                                                            <label class="nombreCampo" for="observaciones">Observaciones</label>
                                                            <textarea class="form-control estiloCampo form-control-sm " name="observaciones" id="observaciones" style="height: 80px;" ><?php if(!empty($datos['datospracticas'][($tabs-1)]["OBSERVACIONES"])){ echo $datos['datospracticas'][($tabs-1)]["OBSERVACIONES"];}?></textarea>

                                                         </div>
                                                      </div> -->
                                                   </div>
                                                </div>

                                                <div class="col-6" style="margin-top: 10px; border-left: 2px solid #e3e3e3e3;">
                                                   <div class="row">
                                                      <div class="col-9">

                                                         <label class="nombresubtituloGris">¿Recibió Algún Apoyo Económico?</label>
                                                      </div>
                                                      <div class="col-3">
                                                         <select class="form-control estiloCampo form-control-sm noResize" onchange="muestrapoyo(<?=$tabs?>,$(this).val())" name="apoyoeconomico" id="apoyoeconomico<?=$tabs?>" >
                                                            <option value="1"<?php $display = 'style="display: none;"'; if(!empty($datos['datospracticas'][($tabs-1)]["APOYO_ECONOMICO"])){ if ($datos['datospracticas'][($tabs-1)]["APOYO_ECONOMICO"] == 1) { echo "selected"; $display = 'style="display: block;"';

                                                         }}?>>Sí</option>
                                                         <option value="2"<?php echo "selected"; if(!empty($datos['datospracticas'][($tabs-1)]["APOYO_ECONOMICO"])){ if ($datos['datospracticas'][($tabs-1)]["APOYO_ECONOMICO"] == 2) { echo "selected"; $display = 'style="display: none;"';

                                                      }}?>>No</option>
                                                   </select>
                                                </div>
                                             </div>
                                             <div class="row bajarObjetos">
                                                <div class="col-12 text-right " id="spanapoyo<?=$tabs?>" <?=$display?>>
                                                   <span class=" "  onclick="agregarApoyoEconomico(<?=$tabs?>)"  style="color: green; border-bottom: 1px solid green; font-weight: 700; cursor: pointer;"> AGREGAR </span>
                                                </div>
                                             </div>
                                             <div class="row animacion">
                                                <div class="col-12" id="zona4<?=$tabs?>" <?=$display?> >
                                                   <div class="row" id="apoyoEco<?=$tabs?>a1"><!-- item -->
                                                      <div class="col">
                                                         <label class="nombreCampo" for="otrorubro<?=$tabs?>">Rubro</label>
                                                         <select class="form-control estiloCampo form-control-sm" name="otrorubro<?=$tabs?>a1" id="otrorubro<?=$tabs?>">
                                                            <option value="1">Transporte</option>
                                                            <option value="2">Comidas</option>
                                                            <option value="3">Propinas</option>
                                                            <option value="4">Gratificaciones</option>
                                                            <option value="5">Otro </option>
                                                         </select>
                                                      </div>
                                                      <div class="col">
                                                         <label class="nombreCampo" for="frecuenciarubro<?=$tabs?>">Frecuencia</label>
                                                         <select class="form-control estiloCampo form-control-sm" name="frecuenciarubro<?=$tabs?>a1" id="frecuenciarubro<?=$tabs?>">
                                                            <option value="1">Diario</option>
                                                            <option value="2">Semanal</option>
                                                            <option value="3">Decenal</option>
                                                            <option value="4">Quincenal</option>
                                                            <option value="5">Mensual</option>
                                                         </select>
                                                      </div>
                                                      <div class="col">
                                                         <label class="nombreCampo" for="cantidadrubro<?=$tabs?>">Total</label>
                                                         <input type="text" class="form-control estiloCampo form-control-sm someID_options" name="cantidadrubro<?=$tabs?>a1" id="cantidadrubro<?=$tabs?>"  >
                                                         <input type="number" name="idapoyo<?=$tabs?>a1" value="0" hidden="" style="text-align: right;">
                                                      </div>
                                                      <div class="col-1 tocable">

                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                          <?php if (!empty($datos['datospracticas'][($tabs-1)]["AREA_PRACTICA"])): ?>

                                          <div class="row">
                                             <div class="col">
                                                <span class="linkAccione" onclick="eliminarpractica()">ELIMINAR</span>
                                             </div>
                                          </div>
                                       <?php endif ?>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <input type="number" name="iden" id="iden<?=$tabs?>" value="<?=$tabs?>"  hidden>
                           <input type="number" id="cambio<?=$tabs?>" value="1"  hidden>
                           <input type="number" name="contadorapoyo<?=$tabs?>" id="contadorapoyo<?=$tabs?>" value="" hidden>
                        </form>
                     </div>
                  <?php }?>
               </div>
            </div>
         </div>

      </div>
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

<input type="number" id="vuelta" value="1" hidden="">

<script type="text/javascript">
   function muestrapoyo(lugar,valor) {
      if (valor == 2) {
         $("#spanapoyo"+lugar).css("display", "none");
         $("#zona4"+lugar).css("display", "none");
      }
      if (valor == 1) {
         $("#spanapoyo"+lugar).css("display", "block");
         $("#zona4"+lugar).css("display", "block");
      }
   }
   function actual(lugar) {
     if ($("#actual"+lugar).prop("checked")) {
      $("#cierrelaboral"+lugar).attr("readonly","")
      $("#cierrelaboral"+lugar).removeClass("datetimepicker")
      var date = new Date();

      $("#cierrelaboral"+lugar).val(date.toLocaleDateString("en-GB"))
      calculo(lugar)
   }else{
      $("#cierrelaboral"+lugar).removeAttr("readonly","") 
      $("#cierrelaboral"+lugar).addClass("datetimepicker") 
   }
   calculo(lugar)
}

function nimasnimenos(id) {
   if ($("#calificacion"+id).val() >10) {
      $("#calificacion"+id).val(10);
   }
   if ($("#calificacion"+id).val() < 0) {
      $("#calificacion"+id).val(0);
   }
}

jQuery(function($) {
   $('.someID_options').autoNumeric('init', {aSign:' $'  }); 
});

$(window).on("mouseover", function(){
   $('.someID_options').autoNumeric('init', {aSign:' $'  }); 
   $('.phone_with_ddd').mask('(000) 0000 0000'); 

   $('.datetimepicker').mask('00/00/0000'); 

});
$('.datetimepicker').datepicker({
   format: "dd/mm/yyyy",
   autoclose: true,
   todayHighlight: true,
   todayBtn: "linked",
   assumeNearbyYear: true,
   toggleActive: true,
}).on('changeDate', function(selected){
 updateDate($(this).closest('.forma').find('input:text'), selected);
});
function updateDate(inputs, selected){
   var minDate = new Date(selected.date.valueOf());
   $(inputs[1]).datepicker('setStartDate', minDate);
   $(inputs[0]).datepicker('setEndDate', minDate);
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

   function checacambio(id) {
      $("#cambio1").val(id);
   }
   function cambioeltotal() {
      $("#cambio1").val(2);
   }

   function consultaempresas(valor,indicador) {

      $.ajax({ 
         type: 'ajax',
         method: 'post',
         url: '<?=base_url('configuracion/practicasprofesionales/somedatosempresas')?>',
         async: false, 
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
         async: false, 
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



   $(window).on("load", function(){
      setTimeout(function(){
         for (var i = 1; i <= 20; i++) {
            var valor = $('#idpractica'+i).val();
            var iden = $('#iden'+i).val();
            if (valor != 0) {
               $.ajax({ 
                  type: 'ajax',
                  method: 'post',
                  datatype: 'json',
                  url: '<?=base_url('configuracion/practicasprofesionales/mostrarapoyo')?>',
                  async: false, 
                  data: {valor: valor,
                     iden: iden},
                     success: function(response){  

                       response =  response.split("/@/"); 
                       $("#zona4"+iden).html(response[0]) ;
                       $("#contadorapoyo"+i).val(response[1]) ;

                    },
                    error: function () {
                       alert('Hubo un error, intente mas tarde');
                    }
                 }) ; 
            }

            var iden = $('#idpractica'+i).val();
            var valor = $('#compania'+i).val();

            if (iden != 0  ) {
               $.ajax({ 
                  type: 'ajax',
                  method: 'post',
                  datatype: 'json',
                  url: '<?=base_url('configuracion/practicasprofesionales/imagenesempresa')?>',
                  async: false, 
                  data: {valor: valor},
                  success: function(response){   
                     response = response.split(",");
                     var x = "";
                     for (var a = 1; a <= response[0] ; a++) {
                        x +=' <li class="list-group-item">';
                        x +='                   <div >';
                        x +='                      <img class="subirimagen"src="'+response[a]+'"  alt="...">';
                        x +='                   </div>';
                        x +='                </li>';
                     }
                     $("#zona2a"+i).html(x);

                  },
                  error: function () {
                     alert('Hubo un error, intente mas tarde');
                  }
               }) ;
            }


         }
      },500) ;
   });

   function editar() {


      $(".estiloinput").removeClass('estiloinputred');
      $(".estiloCampo").removeClass('estiloinputred');
      var id =  $("#totalpracticas").val();
      for (var i = 1; i <= id; i++) {
         if ($('#imgc'+i).val() == "") {
            $('#alert').modal('show');
            $("#mensajealerta").html("Favor de agregar 'Certificado de Práctica' en la Práctica Número "+i); 
            $("#imagenguardar").css("display", "block");
            $("#spiner").css("display", "none"); 
            return;
         }
         if ($("#areapractica"+i).val() == "") {
            $('#alert').modal('show');
            $("#mensajealerta").html("Favor de Llenar el Campo 'Área de Práctica' en la Práctica Número "+i);
            $("#spiner").css("display", "none");
            $("#imagenguardar").css("display", "block");
            $("#areapractica"+i).addClass('estiloinputred')
            return;
         }
         if ($("#iniciolabolal"+i).val() == "") {
            $('#alert').modal('show');
            $("#mensajealerta").html("Favor de Llenar el Campo 'Inicio Laboral' en la Práctica Número "+i);
            $("#spiner").css("display", "none");
            $("#imagenguardar").css("display", "block");
            $("#iniciolabolal"+i).addClass('estiloinputred')
            return;
         }
         if ($("#cierrelaboral"+i).val() == "") {
            $('#alert').modal('show');
            $("#mensajealerta").html("Favor de Llenar el Campo 'Cierre Laboral' en la Práctica Número "+i);
            $("#spiner").css("display", "none");
            $("#imagenguardar").css("display", "block");
            $("#cierrelaboral"+i).addClass('estiloinputred')
            return;
         }
         if ($("#nombrejefe"+i).val() == "") {
            $('#alert').modal('show');
            $("#mensajealerta").html("Favor de Llenar el Campo 'Nombre del Jefe Inmediato' en la Práctica Número "+i);
            $("#spiner").css("display", "none");
            $("#imagenguardar").css("display", "block");
            $("#nombrejefe"+i).addClass('estiloinputred')
            return;
         }
         if ($("#cargojefe"+i).val() == "") {
            $('#alert').modal('show');
            $("#mensajealerta").html("Favor de Llenar el Campo 'Cargo del Jefe Inmediato' en la Práctica Número "+i);
            $("#spiner").css("display", "none");
            $("#imagenguardar").css("display", "block");
            $("#cargojefe"+i).addClass('estiloinputred')
            return;
         }
   /* if ($("#calificacion"+i).val() == "") {
      $('#alert').modal('show');
         $("#mensajealerta").html("Favor de Llenar el Campo en la Practica "+i);
       $("#spiner").css("display", "none");

    }*/


 } 

 $("#imagenguardar").css("display", "none");
 $("#spiner").css("display", "block");
 for (var i = 1; i <= id; i++) {


   var data  = $("#formpracticas"+i).serialize();
   var url = $("#formpracticas"+i).attr('action');
   var comprobante = 0; 
   $.ajax({ 
    type: 'ajax',
    method: 'post',
    url: url,
    async: true, 
    data: data,
    success: function(response){ 

      if (Number(response) == 1) {
        return;
     }

     if (response == 2) {


      return;
   }
   if (response == 5) {


      return;
   }
   else{

      setTimeout(function(){ 
         $('#alert').modal('show');
         $("#alert").attr("onclick","");   
         $("#mensajealerta").html(response);


      }, 100);
      $("#imagenguardar").css("display", "block");
      $("#spiner").css("display", "none");
      return;
   }
},
error: function () {
   alert('Hubo un error, intente mas tarde');
   $("#imagenguardar").css("display", "block");
   $("#spiner").css("display", "none");
   return;
}
}) ;

} 
$('#alert').modal('show');
$("#mensajealerta").html("Se Guardaron Correctamente los Datos");
$("#spiner").css("display", "none");
$("#imagenguardar").css("display", "block");
$("#alert").attr("onclick","recargapagina()");  

}

   //se calculan los dias u ls horas realizadas
   function calculo(id) {
      // JavaScript program to illustrate
      // calculation of no. of days between two date 
      var date1 =  $("#iniciolabolal"+id).val();
      var date2 =  $("#cierrelaboral"+id).val();
      // To set two dates to two variables
      date1 = new Date(date1.split("/").reverse().join("-"));
      date2 = new Date(date2.split("/").reverse().join("-"));
      // To calculate the time difference of two dates
      var Difference_In_Time = date2.getTime() - date1.getTime();
      // To calculate the no. of days between two dates
      var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
      //To display the final no. of days (result)
      if (!Number.isNaN(Difference_In_Time)  && !Number.isNaN(Difference_In_Days) ) {
         $("#diasrealizados"+id).val(Difference_In_Days);
         $("#horasrealizadas"+id).val(Difference_In_Days*9);
      }
   }

   function aliminarapoyo(id,zona,idrial) {
      if (idrial != 0) {
         $.ajax({ 
            type: 'ajax',
            method: 'post',
            url: '<?=base_url('configuracion/practicasprofesionales/eliminarapoyo')?>',
            async: false, 
            data: {idrial: idrial},
            success: function(response){ 
               if (response == '1') {
                  $('#alert').modal('show');
                  $("#mensajealerta").html("Se Eliminó Correctamente el Apoyo Económico, se Recomienda Recargar la Página para hacer Efectivos los Cambios");
                  $("#apoyoEco"+id+"a"+zona).remove();
               }
               else{
                  $('#alert').modal('show');
                  $("#mensajealerta").html("Hubo un problema al eliminar el apoyo económico"); 

               }
            },
            error: function () {
               alert('Hubo un error, intente mas tarde');
            }
         }) ; 
      }
      else{
         $("#apoyoEco"+id+"a"+zona).remove();
      }
   }


   function agregarApoyoEconomico(id) {
      if ($("#apoyoeconomico"+id).val() == 2) {
         return;
      }
      var zona = document.getElementById("zona4"+id);

      var div = $('div[id^="apoyoEco'+id+'a"]:first');


      var num  = parseInt( div.prop("id").match(/\d+(?!\a)/g), 10 ) +1; 

      var clondiv  = div.clone().prop('id', 'apoyoEco'+id+'a'+num );


      var x='                            <div class="col">';
      x+='                               <label class="nombreCampo" for="otrorubro'+id+'a'+num+'">Rubro</label>';
      x+='                               <select class="form-control estiloCampo form-control-sm" name="otrorubro'+id+'a'+num+'" id="otrorubro'+id+'a'+num+'">'; 
      x+=                  '<option value="1">Transporte</option>'
      x+=                                              '<option value="2">Comidas</option>'
      x+=                                            '<option value="3">Propinas</option>'
      x+=                                          '<option value="4">Gratificaciones</option>'
      x+=                                        '<option value="5">Otro </option>'
      x+='                                </select>';
      x+='                            </div>';
      x+='                            <div class="col">';
      x+='                                <label class="nombreCampo" for="frecuenciarubro'+id+'a'+num+'">Frecuencia</label>';
      x+='                               <select class="form-control estiloCampo form-control-sm" name="frecuenciarubro'+id+'a'+num+'" id="frecuenciarubro'+id+'a'+num+'">';
      x+=                                      '<option value="1">Diario</option>'
      x+=                                                  '<option value="2">Semanal</option>'
      x+=                                                 ' <option value="3">Decenal</option>'
      x+=                                                '  <option value="4">Quincenal</option>'
      x+=                                               '   <option value="5">Mensual</option>'
      x+='                                </select>';
      x+='                            </div>';
      x+='                            <div class="col">';
      x+='                               <label class="nombreCampo" for="cantidadrubro'+id+'a'+num+'">Total</label>';
      x+='                               <input type="text" class="form-control estiloCampo form-control-sm someID_options" name="cantidadrubro'+id+'a'+num+'" id="cantidadrubro'+id+'a'+num+'"  style="text-align: right;">';
      x+='                            </div><input type="number" name="idapoyo'+id+'a'+num+'" value="0" hidden="" style="text-align: right;">';
      x+='                            <div class="col-1 tocable">';
      x+='                               <span class="menosspanpracticas" onclick="aliminarapoyo('+id+','+num+',0)"  style="margin: -9px 0px 0px 10px; background: transparent;"><img src="<?=assetgeneral()?>/img/delete.png" style="max-height: 26px;"></span>';
      x+='                            </div>';

      //aqui es donde le dices donde vas a poner el clon
      //prepen es para ponerlo antes de, como primer hijo
      clondiv.prependTo(zona) ;
      //lo vacias el div con los elementos dentro
      $( "#apoyoEco"+id+"a"+num).empty();
      //insertas el string en el html
      $( "#apoyoEco"+id+"a"+num).html(x);
      $("#contadorapoyo"+id).val(num);

   }  


   function limitador(total,limite) {
      total = Number(total);

      var div  = '';
      var active = "";
      if (total <= 0  ) {
         $('#totalpracticas').val(limite);
      }
      if (total >= 20  ) {
         $('#totalpracticas').val(20);
         total = 20;
      }
      if (total > limite) {
         div += '<li class="nav-item"> ';
         div +=      '                 <a class="nav-link " id=" " data-toggle="tab" href=" " role="tab" aria-controls=" " onclick="menosexp()" aria-selected="true">-</a>';
         div +=      '              </li>';
         for (var i = 1; total > limite; i++) {
            limite = i;

            active = "";
            if (i == 1) {
               active = "active";
            }
            div +='<li class="nav-item" id="li'+i+'" >' ;

            div += '<a class="nav-link '+active+'" id="practicas'+i+'-tab" onclick="checacambio('+i+')" data-toggle="tab" href="#practicas'+i+'" role="tab" aria-controls="practicas'+i+'" aria-selected="true">'+i+'</a>';
            div +=    '</li>';
         }
         div += '<li class="nav-item"> ';
         div +=   '                    <a class="nav-link " id="masexp" data-toggle="tab" href=" " role="tab" aria-controls=" " onclick="masexp()" aria-selected="true">+</a>';
         div +=   '                 </li>';
         $('#myTab').html(div);
         $('#contadortabs').val(limite);
         $('#practicas'+limite+'-tab').trigger('click');
      }
      var div  = '';
      if (total < limite) {
         if (total <= 0  ) {
            $('#totalpracticas').val(limite);
         }else {
            for (var i = limite ; total < limite; i--) {
               limite = i; 
               if (limite != total) {
                  $("#li"+i).remove();
                  if ($("#idpractica"+i).val() !=0 ) {
                     $('#confirm').modal('show');
                     $("#mensajeconfirmacion").html("Se va a Eliminar una Práctica Registrada <br>¿Está Seguro de Querer Eliminar esa Práctica?");
                     $("#botonconfirm").attr("onclick","eliminarpracticapormenos("+i+")");   
                     $("#botoncancelar").attr("onclick","cancelo("+limite+")");  
                  }
               }
            } 
            $('#contadortabs').val(limite);
            setTimeout(function() {
               $('#practicas'+limite+'-tab').trigger('click');
            }, 10 ) 

         }

      }
   }


   function eliminarpracticapormenos(i) {
      var data  = $("#formpracticas"+i).serialize();
      var url = '<?=base_url('configuracion/practicasprofesionales/eliminarpractica')?>';

      $.ajax({ 
         type: 'ajax',
         method: 'post',
         url: url,
         async: false, 
         data: data,
         success: function(response){ 
            if (response == '1') {
            }
            else{
               $('#alert').modal('show');
               $("#mensajealerta").html("Hubo un problema al eliminar las practicas, se recergara la pagina");
               $("#alert").attr("onclick","recargapagina()"); 
            }
         },
         error: function () {
            alert('Hubo un error, intente mas tarde');
         }
      }) ; 

      $('#alert').modal('show');
      $("#mensajealerta").html("Se Eliminó la Practica, se Recargará la Página para Visualizar los Cambios");
      $("#alert").attr("onclick","recargapagina()");
   }

   function eliminarpractica() {
      var id  =  $("#cambio1").val(); 

      $('#confirm').modal('show');
      $("#mensajeconfirmacion").html("¿Está Seguro de Eliminar esta Práctica?");
      $("#botonconfirm").attr("onclick","confirmoeliminar("+id+")");
   }


   function confirmoeliminar(id) {
      var data  = $("#formpracticas"+id).serialize();
      var url = '<?=base_url('configuracion/practicasprofesionales/eliminarpractica')?>';
      $.ajax({ 
         type: 'ajax',
         method: 'post',
         url: url,
         async: false, 
         data: data,
         success: function(response){ 
            if (response == '1') {
               $('#alert').modal('show');
               $("#mensajealerta").html("Se Eliminó Correctamente la Práctica Profesional");
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

   function cancelo(limite) {
      $('#contadortabs').val(limite);
      $('#totalpracticas').val(limite);
      limitador(limite,(limite-1))
   }

   function masexp() {
      var valor = Number($('#totalpracticas').val()) + Number(1);
      var limite = Number($('#contadortabs').val());
      $('#totalpracticas').val(valor); 
      limitador(valor,limite) 
   }
   function menosexp() {
      var valor = Number($('#totalpracticas').val()) - Number(1);
      var limite = Number($('#contadortabs').val());
      $('#totalpracticas').val(valor); 
      limitador(valor,limite)
      setTimeout(function() {
         $("#masexp").attr("onclick","masexp()");
      },250
      )
   }


   function aviso() {
      $('#alert').modal('show');
      $("#mensajealerta").html("Solo se puede guardar una Practica a la Vez");
      $("#alert").attr("onclick",""); 
   }
   function recargapagina() {
      location.href = "<?=base_url('/configuracion/practicasprofesionales')?>";
   }
</script> 