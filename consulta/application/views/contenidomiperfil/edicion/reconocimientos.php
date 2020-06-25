   <div id="contenidocambiante" data-id="4">
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
      </div> 
      <!-- --------------------------ASOSIACIONES--------------------------- -->
      <div class="row ">
         <div class="col">
            <div class="box ">
               <form id="formasociasiones" action="<?=base_url('configuracion/reconocimientos/asociasiones')?>">
                  <div class="box-header ">
                     <div class="row"> 
                        <div class="col">
                           <div class="row">
                              <div class="col-4 letratituloedicion">
                                 <span>Asociaciones Gastronómicas</span>
                              </div> 
                              <div class="col lineainferiorosita"> 
                              </div>  
                           </div>
                           <div class="row pt-3">
                              <div class="col-5">
                                 <label  class="col-form-label" for="estatus">Pertenece a Alguna Asociación o Club?</label>
                              </div>
                              <div class="col-3"  >  


                                 <select class="form-control form-control-sm estiloinput estiloinput" onchange="perteneceasociasionclub($(this).val())" name="asociacionclubselect" id="asociacionclubselect">
                                    <option value="2"  <?php if (empty($datos["asociasiones"])){  echo "selected"; $display = 'style="display: none;"';} ?> >No</option>
                                    <option value="1" <?php if (!empty($datos["asociasiones"])){  echo "selected"; $display = 'style="display: block;"';} ?> >Sí</option> 
                                 </select> 
                              </div> 
                              <div class="col-4" style="text-align: right;"> 
                                 <span class="linkAccion" id="agregarasociasion" onclick="agregarasociasion()" <?=$display?> >AGREGAR MÁS</span>
                              </div>  
                           </div> 
                        </div>
                     </div>
                  </div>
                  <div class="box-body" id="contenedorasociasiones" <?=$display?> >
                     <?php if (!empty($datos["asociasiones"])){ $cont = 0; foreach ($datos["asociasiones"] as $key) { $cont++;?>
                        <div class="row mb-3" id="asociacion<?=$cont?>">
                           <div class="col">
                              <div class="row">
                                 <div class="col-2 mostrarpanelrecon">
                                    <div class="row">
                                       <div class="col "   >
                                          <div class="contAjustar tamañosReconocimientosImgs">
                                             <div class="boxi">
                                                <img id="imagenasociacion<?=$cont?>" src="<?php if(substr($key["DIRECCION_IMAGEN_RECONOCIMIENTO"], -3) == "pdf"){echo assetgeneral().'/img/pdf.png';}if ($key["DIRECCION_IMAGEN_RECONOCIMIENTO"] != "" && substr($key["DIRECCION_IMAGEN_RECONOCIMIENTO"], -3) != "pdf"){  echo $key["DIRECCION_IMAGEN_RECONOCIMIENTO"]; } if($key["DIRECCION_IMAGEN_RECONOCIMIENTO"] == ""){ echo assetgeneral().'/img/masgris.png';} ?> " style="width: 100%;"> 
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row panelimagenrecon">
                                       <div class="col-1">
                                          <a onclick='mostrarImagen("<?php echo $key["DIRECCION_IMAGEN_RECONOCIMIENTO"]; ?>","imagenasociacion<?=$cont?>","inputfileasociasionimg<?=$cont?>","nombreimagenasociasion<?=$cont?>")' >
                                             <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" id="asociacionVer<?=$cont?>" >
                                          </a> 
                                       </div>
                                       <div class="col">
                                       </div>
                                       <div class="col-1">

                                       </div>
                                       <div class="col-1" >
                                          <label class="labelsform"  for="inputfileasociasionimg<?=$cont?>"  >
                                             <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                                          </label>
                                       </div>
                                       <div class="col-1">
                                          <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg" onclick='quitarImagen("imagenasociacion<?=$cont?>","inputfileasociasionimg<?=$cont?>","inputasociasionimg<?=$cont?>")' >
                                       </div>
                                    </div>
                                    <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                                       <div class="col" style=" word-wrap: break-word;" >
                                          <span id="nombreimagenasociasion<?=$cont?>"></span>
                                       </div>
                                    </div>
                                    <input type="file" id="inputfileasociasionimg<?=$cont?>" accept=".jpg,.pdf,.png,.jpeg" hidden=""  name="archivo<?=$cont?>" onchange="previewimasociasion(<?=$cont?>);"  />
                                    <input type="text" name="inputasociasionimg<?=$cont?>"  id="inputasociasionimg<?=$cont?>" hidden="" value=""/>
                                    <input type="text" name="estensionasociasion<?=$cont?>"  id="estensionasociasion<?=$cont?>" hidden="" value=""/>
                                 </div>
                                 <div class="col"> 
                                    <label class="labelsform"  for="nombreasociasion<?=$cont?>">Nombre de la Asociación</label>
                                    <input type="text" class="form-control form-control-sm estiloinput estiloinput" name="nombreasociasion<?=$cont?>" id="nombreasociasion<?=$cont?>" value="<?=$key["NOMBRE_ASOCIACION"]?>" > 
                                 </div>
                                 <div class="col-2"> 
                                    <label class="labelsform"  for="anoingresoasociasion<?=$cont?>">Año de Ingreso</label>
                                    <input type="text" class="form-control form-control-sm estiloinput anio estiloinput" name="anoingresoasociasion<?=$cont?>" id="anoingresoasociasion<?=$cont?>" value="<?=$key["ANIO_INGRESO"]?>" > 
                                 </div>
                                 <div class="col-2"> 
                                    <label class="labelsform"  for="estatusasociasion<?=$cont?>">Estatus</label>
                                    <select class="form-control form-control-sm estiloinput estiloinput" name="estatusasociasion<?=$cont?>" id="estatusasociasion<?=$cont?>"  >
                                       <option value="2" <?php if ($key["ESTATUS"] == 2){  echo "selected"; } ?> >Inactivo</option>
                                       <option value="1" <?php if ($key["ESTATUS"] == 1){  echo "selected"; } ?> >Activo</option> 
                                    </select>   
                                    <input type="text" name="idasociacion<?=$cont?>"  id="idasociacion<?=$cont?>" hidden="" value="<?=$key["ID"]?>"/> 
                                 </div> 

                              </div>
                              <div class="row" >
                                 <div class="col-4"  >  
                                    <span class="linkAccione" onclick="eliminarasociasion(<?=$cont?>,<?=$key["ID"]?>)"  >ELIMINAR</span> 
                                 </div>
                              </div>
                           </div>
                        </div>
                     <?php }  } ?>
                     <?php if (empty($datos["asociasiones"])){ $cont = 1;   ?>
                        <div class="row mb-3" id="asociacion1">
                           <div class="col">
                              <div class="row">
                                 <div class="col-2 mostrarpanelrecon">
                                    <div class="row">
                                       <div class="col "   >
                                          <div class="contAjustar tamañosReconocimientosImgs">
                                             <div class="boxi">
                                                <img id="imagenasociacion1" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row panelimagenrecon">
                                       <div class="col-1" onclick='mostrarImagen("","imagenasociacion1","inputfileasociasionimg1","nombreimagenasociasion1")' >
                                          <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > 
                                       </div>
                                       <div class="col">
                                       </div>
                                       <div class="col-1">

                                       </div>
                                       <div class="col-1">
                                          <label class="labelsform"  for="inputfileasociasionimg1"  >
                                             <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                                          </label>
                                       </div>
                                       <div class="col-1">
                                          <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >
                                       </div>
                                    </div>
                                    <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                                       <div class="col" style=" word-wrap: break-word;">
                                          <span id="nombreimagenasociasion1"></span>
                                       </div>
                                    </div>
                                    <input type="file" id="inputfileasociasionimg1" hidden=""  name="archivo1" onchange="previewimasociasion(1);"  accept=".jpg,.pdf,.png,.jpeg"/>
                                    <input type="text" name="inputasociasionimg1"  id="inputasociasionimg1" hidden="" value=""/>
                                    <input type="text" name="estensionasociasion1"  id="estensionasociasion1" hidden="" value=""/>
                                 </div>
                                 <div class="col"> 
                                    <label class="labelsform"  for="nombreasociasion1">Nombre de la Asociación</label>
                                    <input type="text" class="form-control form-control-sm estiloinput estiloinput" name="nombreasociasion1" id="nombreasociasion1" > 
                                 </div>
                                 <div class="col-2"> 
                                    <label class="labelsform"  for="anoingresoasociasion1">Año de Ingreso</label>
                                    <input type="text" class="form-control form-control-sm estiloinput anio estiloinput" name="anoingresoasociasion1" id="anoingresoasociasion1" > 
                                 </div>
                                 <div class="col-2"> 
                                    <label class="labelsform"  for="estatusasociasion1">Estatus</label>
                                    <select class="form-control form-control-sm estiloinput estiloinput" name="estatusasociasion1" id="estatusasociasion1">
                                       <option value="2">Inactivo</option>
                                       <option value="1">Activo</option> 
                                    </select>   
                                    <input type="text" name="idasociacion1"  id="idasociacion1" hidden="" value="0"/> 
                                 </div> 

                              </div>
                              <div class="row" >
                                 <div class="col-4"  >  
                                    <span class="linkAccione" onclick="eliminarasociasion(1)"  >ELIMINAR</span> 
                                 </div>
                              </div>
                           </div>
                        </div>
                     <?php  } ?>
                  </div>
                  <input type="text" name="contadorasociaciones" id="contadorasociaciones" value="<?=$cont?>" hidden="">
               </form>
            </div>
         </div>
      </div>
      <!-- -------------------------CONCURSOS--------------------------------------- -->
      <div class="row ">
         <div class="col">
            <div class="box ">
               <form id="formconcursos" action="<?=base_url('configuracion/reconocimientos/concursos')?>">
                  <div class="box-header ">
                     <div class="row"> 
                        <div class="col">
                           <div class="row">
                              <div class="col-3 letratituloedicion">
                                 <span>Concursos de Cocina</span>
                              </div> 
                              <div class="col lineainferiorosita"> 
                              </div>  
                           </div>
                           <div class="row pt-3">
                              <div class="col-5">
                                 <label  class="col-form-label" for="estatus">¿Ha Ganado Concursos?</label>
                              </div>
                              <div class="col-3"  >  
                                 <select class="form-control form-control-sm estiloinput estiloinput" onchange="ganoconcursos($(this).val())" name="ganarconcursosselect" id="ganarconcursosselect">
                                    <option value="2" <?php if (empty($datos["concursos"])){  echo "selected"; $display = 'style="display: none;"';} ?> >No</option>
                                    <option value="1" <?php if (!empty($datos["concursos"])){  echo "selected"; $display = 'style="display: block;"';} ?>>Sí</option> 
                                 </select> 
                              </div> 
                              <div class="col-4 " style="text-align: right;"> 
                                 <span class="linkAccion" id="agregaconcurso" onclick="agregarconcurso()" <?=$display?> >AGREGAR MÁS</span>
                              </div>  
                           </div> 
                        </div>
                     </div>
                  </div>
                  <div class="box-body" id="concursosdecocina" <?=$display?> >
                     <?php if (!empty($datos["concursos"])){ $cont = 0; foreach ($datos["concursos"] as $key ) {  $cont++; ?>
                        <div class="row mb-3" id="concurso<?=$cont?>" >
                           <div class="col" >
                              <div class="row">
                                 <div class="col-4"> 
                                    <label class="labelsform"  for="nombreconscurso<?=$cont?>">Nombre del Concurso</label>
                                    <input type="text" class="form-control form-control-sm estiloinput estiloinput" name="idconcurso<?=$cont?>" id="idconcurso<?=$cont?>" hidden="" value="<?=$key["ID"]?>"> 
                                    <input type="text" class="form-control form-control-sm estiloinput estiloinput" name="nombreconscurso<?=$cont?>" id="nombreconscurso<?=$cont?>" value="<?=$key["NOMBRE_CONCURSO"]?>"> 
                                 </div>
                                 <div class="col-4"> 
                                    <label class="labelsform"  for="nombrepatrocinador<?=$cont?>">Patrocinador</label>
                                    <input type="text" class="form-control form-control-sm estiloinput estiloinput" name="nombrepatrocinador<?=$cont?>" id="nombrepatrocinador<?=$cont?>"  value="<?=$key["PATROCINADOR"]?>"> 
                                 </div>
                                 <div class="col-4"> 
                                    <label class="labelsform"  for="pocisionobtenida<?=$cont?>">Posición Obtenida</label>
                                    <select class="form-control form-control-sm estiloinput estiloinput"  name="pocisionobtenida<?=$cont?>" id="pocisionobtenida<?=$cont?>"  >
                                       <option value="1" <?php if ($key["POSICION_OBTENIDA"] == 1){echo "selected";} ?> >Primer Lugar</option>
                                       <option value="2" <?php if ($key["POSICION_OBTENIDA"] == 2){echo "selected";} ?> >Segundo Lugar</option>
                                       <option value="3" <?php if ($key["POSICION_OBTENIDA"] == 3){echo "selected";} ?> >Tercer Lugar</option> 
                                    </select> 
                                 </div>
                              </div> 
                              <div class="row">
                                 <div class="col-2"> 
                                    <label class="labelsform"  for="paisconcurso<?=$cont?>">País</label> 
                                    <input type="text" class="form-control form-control-sm estiloinput estiloinput" name="paisconcurso<?=$cont?>" id="paisconcurso<?=$cont?>"  value="<?=$key["PAIS"]?>" > 
                                 </div>
                                 <div class="col-2"> 
                                    <label class="labelsform"  for="estadoconcurso<?=$cont?>">Estado</label> 
                                    <input type="text" class="form-control form-control-sm estiloinput estiloinput" name="estadoconcurso<?=$cont?>" id="estadoconcurso<?=$cont?>"  value="<?=$key["ESTADO"]?>" > 
                                 </div>
                                 <div class="col-2"> 
                                    <label class="labelsform"  for="ciudadconcurso<?=$cont?>">Ciudad</label> 
                                    <input type="text" class="form-control form-control-sm estiloinput estiloinput" name="ciudadconcurso<?=$cont?>" id="ciudadconcurso<?=$cont?>"  value="<?=$key["CIUDAD"]?>" > 
                                 </div>
                                 <div class="col-2"> 
                                    <label class="labelsform"  for="fechaconcurso<?=$cont?>">Fecha</label>
                                    <input type="text" class="form-control form-control-sm estiloinput estiloinput datetimepicker" name="fechaconcurso<?=$cont?>" id="fechaconcurso<?=$cont?>"  value="<?=datesqltodate($key["FECHA_CONCURSO"])?>" >
                                 </div> 
                                 <div class="col-4"> 
                                    <label class="labelsform"  for="premio<?=$cont?>">¿Cual Fue el Premio?</label>
                                    <input type="text" class="form-control form-control-sm estiloinput estiloinput" name="premio<?=$cont?>" id="premio<?=$cont?>"  value="<?=$key["PREMIO"]?>" > 
                                 </div>
                              </div>
                              <!-- ---------IMAGENES----------------------------------------------------------------------------------------------------------------------- -->
                              <div class="row mt-3">
                                 <div class="col-3 mr-4">
                                    <span >Certificado del Concurso</span>
                                 </div>

                                 <div class="col-">
                                    <span >Imágenes del Concurso</span>
                                 </div> 
                              </div>
                              <div class="row mt-3">
                                 <div class="col-3 mr-4 mostrarpanelrecon">
                                    <div class="row">
                                       <div class="col "   >
                                          <div class="contAjustar tamañosReconocimientosImgsXL">
                                             <div class="boxi">
                                               <img id="imagenconcursio1a<?=$cont?>" src="<?php if(substr($key["DIRECCION_IMAGEN_RECONOCIMIENTO"], -3) == "pdf"){echo assetgeneral().'/img/pdf.png';}if ($key["DIRECCION_IMAGEN_RECONOCIMIENTO"] != "" && substr($key["DIRECCION_IMAGEN_RECONOCIMIENTO"], -3) != "pdf"){  echo $key["DIRECCION_IMAGEN_RECONOCIMIENTO"]; } if($key["DIRECCION_IMAGEN_RECONOCIMIENTO"] == ""){ echo assetgeneral().'/img/masgris.png';} ?>" style="width: 100%;"> 
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                   <div class="row panelimagenrecon">
                                    <div class="col-1">
                                       <a onclick='mostrarImagen("<?php echo $key["DIRECCION_IMAGEN_RECONOCIMIENTO"]; ?>","imagenconcursio1a<?=$cont?>","inputfileconcurso1a<?=$cont?>","nombreconcurso1a<?=$cont?>")' >
                                          <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" >
                                       </a>
                                    </div>
                                    <div class="col">
                                    </div>
                                    <div class="col-1">

                                    </div>
                                    <div class="col-1">
                                       <label class="labelsform"  for="inputfileconcurso1a<?=$cont?>"  >
                                          <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                                       </label>
                                    </div>
                                    <div class="col-1">
                                      <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg" onclick='quitarImagen("imagenconcursio1a<?=$cont?>","inputfileconcurso1a<?=$cont?>","inputconcurso1a<?=$cont?>")' >
                                   </div>
                                </div>
                                <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                                 <div class="col" style=" word-wrap: break-word;" >
                                    <span id="nombreconcurso1a<?=$cont?>"></span>
                                 </div>
                              </div> 
                              <input type="file" id="inputfileconcurso1a<?=$cont?>" accept=".jpg,.pdf,.png,.jpeg"  hidden=""  name="archivo1" onchange="previewconcurso(1,<?=$cont?>);"  />
                              <input type="text" name='inputconcurso1a<?=$cont?>'  id="inputconcurso1a<?=$cont?>" hidden="" value=""/>
                              <input type="text" name='estensionconcurso1a<?=$cont?>'  id="estensionconcurso1a<?=$cont?>" hidden="" value=""/>
                           </div>

                           <div class="col-2 mr-4 mostrarpanelrecon">
                              <div class="row">
                                 <div class="col  "   >
                                    <div class="contAjustar tamañosReconocimientosImgs">
                                       <div class="boxi">
                                          <img id="imagenconcursio2a<?=$cont?>" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row panelimagenrecon">
                                 <div class="col-1">
                                    <a id="mostrarimgcon2a<?=$cont?>" onclick='mostrarImagen("","imagenconcursio2a<?=$cont?>","inputfileconcurso2a<?=$cont?>","nombreconcurso2a<?=$cont?>")' >
                                       <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" >
                                    </a>
                                 </div>
                                 <div class="col">
                                 </div>
                                 <div class="col-1">

                                 </div>
                                 <div class="col-1">
                                    <label class="labelsform"  for="inputfileconcurso2a<?=$cont?>"  >
                                       <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                                    </label>
                                 </div>
                                 <div class="col-1">
                                    <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg" onclick='quitarImagen("imagenconcursio2a<?=$cont?>","inputfileconcurso2a<?=$cont?>","")' >
                                </div>
                             </div>
                             <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                              <div class="col" style=" word-wrap: break-word;" >
                                 <span id="nombreconcurso2a<?=$cont?>"></span>
                              </div>
                           </div> 
                           <input type="file" id="inputfileconcurso2a<?=$cont?>" accept=".jpg,.png,.jpeg" hidden=""  name="archivo<?=$cont?>" onchange="previewconcurso(2,<?=$cont?>);"  />
                           <input type="text" name='inputconcurso2a<?=$cont?>'  id="inputconcurso2a<?=$cont?>" hidden="" value=""/>
                           <input type="text" name='estensionconcurso2a<?=$cont?>'  id="estensionconcurso2a<?=$cont?>" hidden="" value=""/>
                           <input type="text" name='idimgconcurso2a<?=$cont?>'  id="idimgconcurso2a<?=$cont?>" hidden="" value=""/>
                        </div>

                        <div class="col-2 mr-4 mostrarpanelrecon">
                           <div class="row">
                              <div class="col "   >
                                 <div class="contAjustar tamañosReconocimientosImgs">
                                    <div class="boxi">
                                       <img id="imagenconcursio3a<?=$cont?>" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row panelimagenrecon">
                              <div class="col-1">
                                 <a  id="mostrarimgcon3a<?=$cont?>" onclick='mostrarImagen("","imagenconcursio3a<?=$cont?>","inputfileconcurso3a<?=$cont?>","nombreconcurso3a<?=$cont?>")' >
                                    <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" >
                                 </a>
                              </div>
                              <div class="col">
                              </div>
                              <div class="col-1">

                              </div>
                              <div class="col-1">
                                 <label class="labelsform"  for="inputfileconcurso3a<?=$cont?>"  >
                                    <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                                 </label>
                              </div>
                              <div class="col-1">
                               <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >
                            </div>
                         </div>

                         <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                           <div class="col" style=" word-wrap: break-word;" >
                              <span id="nombreconcurso3a<?=$cont?>"></span>
                           </div>
                        </div> 
                        <input type="file" id="inputfileconcurso3a<?=$cont?>" accept=".jpg,.png,.jpeg" hidden=""  name="archivo<?=$cont?>" onchange="previewconcurso(3,<?=$cont?>);"  />
                        <input type="text" name='inputconcurso3a<?=$cont?>'  id="inputconcurso3a<?=$cont?>" hidden="" value=""/>
                        <input type="text" name='estensionconcurso3a<?=$cont?>'  id="estensionconcurso3a<?=$cont?>" hidden="" value=""/>
                        <input type="text" name='idimgconcurso3a<?=$cont?>'  id="idimgconcurso3a<?=$cont?>" hidden="" value=""/>
                     </div>

                     <div class="col-2 mostrarpanelrecon">
                        <div class="row">
                           <div class="col "   >
                              <div class="contAjustar tamañosReconocimientosImgs">
                                 <div class="boxi">
                                    <img id="imagenconcursio4a<?=$cont?>" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row panelimagenrecon">
                           <div class="col-1">
                            <a id="mostrarimgcon4a<?=$cont?>" onclick='mostrarImagen("","imagenconcursio4a<?=$cont?>","inputfileconcurso4a<?=$cont?>","nombreconcurso4a<?=$cont?>")' >
                              <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" >
                           </a>
                        </div>
                        <div class="col">
                        </div>
                        <div class="col-1">

                        </div>
                        <div class="col-1">
                           <label class="labelsform"  for="inputfileconcurso4a<?=$cont?>"  >
                              <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                           </label>
                        </div>
                        <div class="col-1">
                           <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >
                        </div>
                     </div>
                     <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                        <div class="col" style=" word-wrap: break-word;" >
                           <span id="nombreconcurso4a<?=$cont?>"></span>
                        </div>
                     </div> 
                     <input type="file" id="inputfileconcurso4a<?=$cont?>" accept=".jpg,.png,.jpeg" hidden=""  name="archivo<?=$cont?>" onchange="previewconcurso(4,<?=$cont?>);"  />
                     <input type="text" name='inputconcurso4a<?=$cont?>'  id="inputconcurso4a<?=$cont?>" hidden="" value=""/>
                     <input type="text" name='estensionconcurso4a<?=$cont?>'  id="estensionconcurso4a<?=$cont?>" hidden="" value=""/>
                     <input type="text" name='idimgconcurso4a<?=$cont?>'  id="idimgconcurso4a<?=$cont?>" hidden="" value=""/>
                  </div>
               </div>
               <div class="row" >
                  <div class="col-4"  >  
                     <span class="linkAccione" onclick="eliminarconcurso(<?=$cont?>,<?=$key["ID"]?>)"  >ELIMINAR</span> 
                  </div>
               </div>
            </div> 
         </div>


      <?php }} ?>
      <?php if (empty($datos["concursos"])){ $cont = 1;?>
         <div class="row mb-3" id="concurso1" >
            <div class="col" >
               <div class="row">
                  <div class="col-4"> 
                     <label class="labelsform"  for="nombreconscurso1">Nombre del Concurso</label>
                     <input type="text" class="form-control form-control-sm estiloinput estiloinput" name="idconcurso1" id="idconcurso1" hidden=""value="0"> 
                     <input type="text" class="form-control form-control-sm estiloinput estiloinput" name="nombreconscurso1" id="nombreconscurso1" > 
                  </div>
                  <div class="col-4"> 
                     <label class="labelsform"  for="nombrepatrocinador1">Patrocinador</label>
                     <input type="text" class="form-control form-control-sm estiloinput estiloinput" name="nombrepatrocinador1" id="nombrepatrocinador1" > 
                  </div>
                  <div class="col-4"> 
                     <label class="labelsform"  for="pocisionobtenida1">Posición Obtenida</label>
                     <select class="form-control form-control-sm estiloinput estiloinput"  name="pocisionobtenida1" id="pocisionobtenida1">
                        <option value="1">Primer Lugar</option>
                        <option value="2">Segundo Lugar</option>
                        <option value="3">Tercer Lugar</option> 
                     </select> 
                  </div>
               </div> 
               <div class="row">
                  <div class="col-2"> 
                     <label class="labelsform"  for="paisconcurso1">País</label> 
                     <input type="text" class="form-control form-control-sm estiloinput estiloinput" name="paisconcurso1" id="paisconcurso1" > 
                  </div>
                  <div class="col-2"> 
                     <label class="labelsform"  for="estadoconcurso1">Estado</label> 
                     <input type="text" class="form-control form-control-sm estiloinput estiloinput" name="estadoconcurso1" id="estadoconcurso1" > 
                  </div>
                  <div class="col-2"> 
                     <label class="labelsform"  for="ciudadconcurso1">Ciudad</label> 
                     <input type="text" class="form-control form-control-sm estiloinput estiloinput" name="ciudadconcurso1" id="ciudadconcurso1" > 
                  </div>
                  <div class="col-2"> 
                     <label class="labelsform"  for="fechaconcurso1">Fecha</label>
                     <input type="text" class="form-control form-control-sm estiloinput estiloinput datetimepicker" name="fechaconcurso1" id="fechaconcurso1" > 
                  </div> 
                  <div class="col-4"> 
                     <label class="labelsform"  for="premio1">¿Cuál Fue el Premio?</label>
                     <input type="text" class="form-control form-control-sm estiloinput estiloinput" name="premio1" id="premio1" > 
                  </div>
               </div>
               <!-- ---------IMAGENES--------------- -->
               <div class="row mt-3">
                  <div class="col-3 mr-4">
                     <span >Certificado del Concurso</span>
                  </div>

                  <div class="col-">
                     <span >Imágenes del Concurso</span>
                  </div> 
               </div>
               <div class="row mt-3">
                  <div class="col-3 mr-4 mostrarpanelrecon">
                     <div class="row">
                        <div class="col"   >
                           <div class="contAjustar tamañosReconocimientosImgsXL">
                              <div class="boxi">
                                 <img id="imagenconcursio1a1" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row panelimagenrecon">
                        <div class="col-1" onclick='mostrarImagen("","imagenconcursio1a1","inputfileconcurso1a1","nombreconcurso1a1")' >
                           <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > 
                        </div>
                        <div class="col">
                        </div>
                        <div class="col-1">

                        </div>
                        <div class="col-1">
                           <label class="labelsform"  for="inputfileconcurso1a1"  >
                              <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                           </label>
                        </div>
                        <div class="col-1">
                           <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >
                        </div>
                     </div>
                     <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                        <div class="col" style=" word-wrap: break-word;" >
                           <span id="nombreconcurso1a1"></span>
                        </div>
                     </div> 
                     <input type="file" id="inputfileconcurso1a1" accept=".jpg,.png,.jpeg,.pdf"  hidden=""  name="archivo1" onchange="previewconcurso(1,1);"  />
                     <input type="text" name='inputconcurso1a1'  id="inputconcurso1a1" hidden="" value=""/>
                     <input type="text" name='estensionconcurso1a1'  id="estensionconcurso1a1" hidden="" value=""/>
                  </div>

                  <div class="col-2 mr-4 mostrarpanelrecon">
                     <div class="row">
                        <div class="col "   >
                           <div class="contAjustar tamañosReconocimientosImgs">
                              <div class="boxi">
                                 <img id="imagenconcursio2a1" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row panelimagenrecon">
                        <div class="col-1" onclick='mostrarImagen("","imagenconcursio2a1","inputfileconcurso2a1","nombreconcurso2a1")' >
                           <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > 
                        </div>
                        <div class="col">
                        </div>
                        <div class="col-1">

                        </div>
                        <div class="col-1">
                           <label class="labelsform"  for="inputfileconcurso2a1"  >
                              <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                           </label>
                        </div>
                        <div class="col-1">
                           <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >
                        </div>
                     </div>
                     <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                        <div class="col" style=" word-wrap: break-word;" >
                           <span id="nombreconcurso2a1"></span>
                        </div>
                     </div> 
                     <input type="file" id="inputfileconcurso2a1" accept=".jpg,.png,.jpeg" hidden=""  name="archivo1" onchange="previewconcurso(2,1);"  />
                     <input type="text" name='inputconcurso2a1'  id="inputconcurso2a1" hidden="" value=""/>
                     <input type="text" name='estensionconcurso2a1'  id="estensionconcurso2a1" hidden="" value=""/>
                     <input type="text" name='idimgconcurso2a1'  id="idimgconcurso2a1" hidden="" value="0"/>
                  </div>

                  <div class="col-2 mr-4 mostrarpanelrecon">
                     <div class="row">
                        <div class="col  "   >
                           <div class="contAjustar tamañosReconocimientosImgs">
                              <div class="boxi">
                                 <img id="imagenconcursio3a1" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row panelimagenrecon">
                        <div class="col-1" onclick='mostrarImagen("","imagenconcursio3a1","inputfileconcurso3a1","nombreconcurso3a1")' >
                           <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > 
                        </div>
                        <div class="col">
                        </div>
                        <div class="col-1">

                        </div>
                        <div class="col-1">
                           <label class="labelsform"  for="inputfileconcurso3a1"  >
                              <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                           </label>
                        </div>
                        <div class="col-1">
                           <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >
                        </div>
                     </div>

                     <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                        <div class="col" style=" word-wrap: break-word;" >
                           <span id="nombreconcurso3a1"></span>
                        </div>
                     </div>  
                     <input type="file" id="inputfileconcurso3a1" accept=".jpg,.png,.jpeg" hidden=""  name="archivo1" onchange="previewconcurso(3,1);"  />
                     <input type="text" name='inputconcurso3a1'  id="inputconcurso3a1" hidden="" value=""/>
                     <input type="text" name='estensionconcurso3a1'  id="estensionconcurso3a1" hidden="" value=""/>
                     <input type="text" name='idimgconcurso3a1'  id="idimgconcurso3a1" hidden="" value="0"/>
                  </div>

                  <div class="col-2 mr-4 mostrarpanelrecon">
                     <div class="row">
                        <div class="col "   >
                           <div class="contAjustar tamañosReconocimientosImgs">
                              <div class="boxi">
                                 <img id="imagenconcursio4a1" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row panelimagenrecon">
                        <div class="col-1" onclick='mostrarImagen("","imagenconcursio4a1","inputfileconcurso4a1","nombreconcurso4a1")' >
                           <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > 
                        </div>
                        <div class="col">
                        </div>
                        <div class="col-1">

                        </div>
                        <div class="col-1">
                           <label class="labelsform"  for="inputfileconcurso4a1"  >
                              <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                           </label>
                        </div>
                        <div class="col-1">
                           <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >
                        </div>
                     </div>
                     <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                        <div class="col" style=" word-wrap: break-word;" >
                           <span id="nombreconcurso4a1"></span>
                        </div>
                     </div> 
                     <input type="file" id="inputfileconcurso4a1" accept=".jpg,.png,.jpeg" hidden=""  name="archivo1" onchange="previewconcurso(4,1);"  />
                     <input type="text" name='inputconcurso4a1'  id="inputconcurso4a1" hidden="" value=""/>
                     <input type="text" name='estensionconcurso4a1'  id="estensionconcurso4a1" hidden="" value=""/>
                     <input type="text" name='idimgconcurso4a1'  id="idimgconcurso4a1" hidden="" value="0"/>
                  </div>
               </div>
               <div class="row" >
                  <div class="col-4"  >  
                     <span class="linkAccione" onclick="eliminarconcurso(1,0)"  >ELIMINAR</span> 
                  </div>
               </div>
            </div> 
         </div>

      <?php } ?>
   </div>
   <input type="text" name="contadorconcursos" id="contadorconcursos" value="<?=$cont?>" hidden="">
</form>
</div> 
</div>
</div>

<!-- -------------------------JUEZ DE COCINA------------------------------- -->
<div class="row ">
   <div class="col">
      <div class="box ">
         <form id="formjuez" action="<?=base_url('configuracion/reconocimientos/juezconcurso')?>">
            <div class="box-header ">
               <div class="row"> 
                  <div class="col">
                     <div class="row">
                        <div class="col-4 letratituloedicion">
                           <span>Juez de Concursos de Cocina</span>
                        </div> 
                        <div class="col lineainferiorosita"> 
                        </div>  
                     </div>
                     <div class="row pt-3">
                        <div class="col-5">
                           <label class="col-form-label" for="estatus">¿Ha Participado Como Juez?</label>
                        </div>
                        <div class="col-3"  >  
                           <select class="form-control form-control-sm estiloinput" onchange="participocomojuez($(this).val())" name="participarjuezselect" id="participarjuezselect">
                              <option value="2"  <?php if (empty($datos["juez"])){  echo "selected"; $display = 'style="display: none;"';} ?>  >No</option>
                              <option value="1"  <?php if (!empty($datos["juez"])){  echo "selected"; $display = 'style="display: block;"';} ?>>Sí</option> 
                           </select> 
                        </div> 
                        <div class="col-4" style="text-align: right;"> 
                           <span class="linkAccion" id="agregarjuez" onclick="agregarjuez()" <?=$display?> >AGREGAR MÁS</span>
                        </div>  
                     </div> 
                  </div>
               </div>
            </div> 
            <!-- ------------------------ -->
            <div class="box-body" id="contenedorjuez" <?=$display?> >
              <?php if (!empty($datos["juez"])){ $cont =0; foreach ($datos["juez"] as $key) { $cont++; ?>
                 <div class="col mb-3" id="juez<?=$cont?>"> 
                  <div class="row" >
                     <div class="col-2 mostrarpanelrecon">
                        <div class="row">
                           <div class="col  "   >
                              <div class="contAjustar tamañosReconocimientosImgs">
                                 <div class="boxi">
                                    <img id="imagenjuez<?=$cont?>" src="<?php if(substr($key["DIRECCION_IMAGEN_RECONOCIMIENTO"], -3) == "pdf"){echo assetgeneral().'/img/pdf.png';}if ($key["DIRECCION_IMAGEN_RECONOCIMIENTO"] != "" && substr($key["DIRECCION_IMAGEN_RECONOCIMIENTO"], -3) != "pdf"){  echo $key["DIRECCION_IMAGEN_RECONOCIMIENTO"]; } if($key["DIRECCION_IMAGEN_RECONOCIMIENTO"] == ""){ echo assetgeneral().'/img/masgris.png';} ?> " style="width: 100%;"> 
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row panelimagenrecon">
                           <div class="col-1">
                              <a onclick='mostrarImagen("<?php echo $key["DIRECCION_IMAGEN_RECONOCIMIENTO"]; ?>","imagenjuez<?=$cont?>","inputfilejuez<?=$cont?>","nombreimagenjuez<?=$cont?>")' >
                                 <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" id="juezVer<?=$cont?>" >
                              </a>
                           </div>
                           <div class="col">
                           </div>
                           <div class="col-1">

                           </div>
                           <div class="col-1">
                              <label class="labelsform"  for="inputfilejuez<?=$cont?>"  >
                                 <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                              </label>
                           </div>
                           <div class="col-1">
                              <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg" onclick='quitarImagen("imagenjuez<?=$cont?>","inputfilejuez<?=$cont?>","inputjuez<?=$cont?>")' >
                           </div>
                        </div>
                        <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                           <div class="col" style=" word-wrap: break-word;" >
                              <span id="nombreimagenjuez<?=$cont?>"></span>
                           </div>
                        </div>
                        <input type="file" id="inputfilejuez<?=$cont?>" accept=".jpg,.pdf,.png,.jpeg" hidden=""  name="archivo<?=$cont?>" onchange="previewjuez(<?=$cont?>);"  />
                        <input type="text" name="inputjuez<?=$cont?>"  id="inputjuez<?=$cont?>" hidden="" value=""/>
                        <input type="text" name="estensionjuez<?=$cont?>"  id="estensionjuez<?=$cont?>" hidden="" value=""/>
                     </div>
                     <div class="col">
                        <div class="row">
                           <div class="col"> 
                              <label class="labelsform" for="nombreconcursojuez<?=$cont?>">Nombre del Concurso</label>
                              <input type="text" class="form-control form-control-sm estiloinput" name="idjuez<?=$cont?>" id="idjuez<?=$cont?>" value="<?=$key["ID"]?>" hidden="">
                              <input type="text" class="form-control form-control-sm estiloinput" name="nombreconcursojuez<?=$cont?>" id="nombreconcursojuez<?=$cont?>" value="<?=$key["NOMBRE_CONCURSO"]?>" > 
                           </div>
                           <div class="col-3" id="contediciones<?=$cont?>"> 
                              <label class="labelsform" for="edicionconcurso<?=$cont?>">Edición</label>
                              <select class="form-control form-control-sm estiloinput" name="edicionconcurso<?=$cont?>" id="edicionconcurso<?=$cont?>" onchange="masediciones(<?=$cont?>,$(this).val())">
                                 <option value="1" <?php if($key["EDICION"] == 1){echo "selected";} ?> >1ra. Edición</option>
                                 <option value="2" <?php if($key["EDICION"] == 2){echo "selected";} ?> >2da. Edición</option>
                                 <option value="3" <?php if($key["EDICION"] == 3){echo "selected";} ?> >3ra. Edición</option>
                                 <option value="4" <?php if($key["EDICION"] == 4){echo "selected";} ?> >4ta. Edición</option>
                                 <option value="5" <?php if($key["EDICION"] == 5){echo "selected";} ?> >5ta. Edición</option>
                                 <option value="6" <?php if($key["EDICION"] == 6){echo "selected";} ?> >6ta. Edición</option>
                                 <option value="7" <?php if($key["EDICION"] == 7){echo "selected";} ?> >7ma. Edición</option>
                                  <?php if(!is_numeric($key["EDICION"])){  ?> <option value="<?=$key["EDICION"]?>" selected=""><?=$key["EDICION"]?></option> <?php } ?>
                                 <option value="8" <?php if($key["EDICION"] == 8){echo "selected";} ?> >Otra Especifique</option> 

                              </select> 

                           </div>
                           <div class="col-3"> 
                              <label class="labelsform" for="anoingreso<?=$cont?>">Año</label>
                              <input type="text" class="form-control form-control-sm estiloinput anio" name="anoingreso<?=$cont?>" id="anoingreso<?=$cont?>"  value="<?=$key["ANIO_INGRESO"]?>">
                           </div>
                        </div>
                        <div class="row">

                           <div class="col"> 
                              <label class="labelsform" for="pais<?=$cont?>">País</label>
                              <input type="text" class="form-control form-control-sm estiloinput" name="pais<?=$cont?>" id="pais<?=$cont?>"  value="<?=$key["PAIS"]?>">
                           </div>
                           <div class="col"> 
                              <label class="labelsform" for="estado<?=$cont?>">Estado</label>
                              <input type="text" class="form-control form-control-sm estiloinput" name="estado<?=$cont?>" id="estado<?=$cont?>"  value="<?=$key["ESTADO"]?>">
                           </div>
                           <div class="col"> 
                              <label class="labelsform" for="ciudad<?=$cont?>">Ciudad</label>
                              <input type="text" class="form-control form-control-sm estiloinput" name="ciudad<?=$cont?>" id="ciudad<?=$cont?>"  value="<?=$key["CIUDAD"]?>">
                           </div> 
                        </div>
                     </div>

                  </div>
                  <div class="row" >
                     <div class="col-4"  >
                        <span class="linkAccione" onclick="eliminarjuez(<?=$cont?>,<?=$key["ID"]?>)"  >ELIMINAR</span>
                     </div>
                  </div>
               </div>  

            <?php } } ?>
            <?php if (empty($datos["juez"])){ $cont = 1; ?>
             <div class="col mb-3" id="juez1"> 
               <div class="row" >
                  <div class="col-2 mostrarpanelrecon">
                     <div class="row">
                        <div class="col "   >
                           <div class="contAjustar tamañosReconocimientosImgs">
                              <div class="boxi">
                                 <img id="imagenjuez1" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row panelimagenrecon">
                        <div class="col-1" onclick='mostrarImagen("","imagenjuez1","inputfilejuez1","nombreimagenjuez1")' >
                           <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > 
                        </div>
                        <div class="col">
                        </div>
                        <div class="col-1">

                        </div>
                        <div class="col-1">
                           <label class="labelsform"  for="inputfilejuez1"  >
                              <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                           </label>
                        </div>
                        <div class="col-1">
                           <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >
                        </div>
                     </div>
                     <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                        <div class="col" style=" word-wrap: break-word;" >
                           <span id="nombreimagenjuez1"></span>
                        </div>
                     </div>
                     <input type="file" id="inputfilejuez1" hidden=""  name="archivo1" onchange="previewjuez(1);"  />
                     <input type="text" name="inputjuez1"  id="inputjuez1" hidden="" value=""/>
                     <input type="text" name="estensionjuez1"  id="estensionjuez1" hidden="" value=""/>
                  </div>
                  <div class="col">
                     <div class="row">
                        <div class="col"> 
                           <label class="labelsform" for="nombreconcursojuez1">Nombre del Concurso</label>
                           <input type="text" class="form-control form-control-sm estiloinput" name="idjuez1" id="idjuez1" value="0" hidden="">
                           <input type="text" class="form-control form-control-sm estiloinput" name="nombreconcursojuez1" id="nombreconcursojuez1" > 
                        </div>
                        <div class="col-3" id="contediciones1"> > 
                           <label class="labelsform" for="edicionconcurso1">Edición</label>
                           <select class="form-control form-control-sm estiloinput" name="edicionconcurso1" id="edicionconcurso1" onchange="masediciones(1,$(this).val())">
                              <option value="1">1ra. Edición</option>
                              <option value="2">2da. Edición</option>
                              <option value="3">3ra. Edición</option>
                              <option value="4">4ta. Edición</option>
                              <option value="5">5ta. Edición</option>
                              <option value="6">6ta. Edición</option>
                              <option value="7">7ma. Edición</option>
                              <option value="8">Otra Especifique</option> 

                           </select> 
                        </div>
                        <div class="col-3"> 
                           <label class="labelsform" for="anoingreso1">Año</label>
                           <input type="text" class="form-control form-control-sm estiloinput anio" name="anoingreso1" id="anoingreso1" >
                        </div>
                     </div>
                     <div class="row">

                        <div class="col"> 
                           <label class="labelsform" for="pais1">País</label>
                           <input type="text" class="form-control form-control-sm estiloinput" name="pais1" id="pais1" >
                        </div>
                        <div class="col"> 
                           <label class="labelsform" for="estado1">Estado</label>
                           <input type="text" class="form-control form-control-sm estiloinput" name="estado1" id="estado1" >
                        </div>
                        <div class="col"> 
                           <label class="labelsform" for="ciudad1">Ciudad</label>
                           <input type="text" class="form-control form-control-sm estiloinput" name="ciudad1" id="ciudad1" >
                        </div> 
                     </div>
                  </div>

               </div>
               <div class="row" >
                  <div class="col-4"  >
                     <span class="linkAccione" onclick="eliminarjuez(1,0)"  >ELIMINAR</span>
                  </div>
               </div>
            </div>  
         <?php } ?>


      </div>
      <input type="text" name="contadorjuez" id="contadorjuez" value="<?=$cont?>" hidden="">
   </form>
</div>
</div>
</div>
<!-- ----------------------------FESTIVALES  --------------------------------------- -->

<div class="row ">
   <div class="col">
      <div class="box ">
         <form id="formfestival" action="<?=base_url('configuracion/reconocimientos/festival')?>">
            <div class="box-header ">
               <div class="row"> 
                  <div class="col">
                     <div class="row">
                        <div class="col-4 letratituloedicion">
                           <span>Festivales Gastronónomicos</span>
                        </div> 
                        <div class="col lineainferiorosita"> 
                        </div>  
                     </div>
                     <div class="row pt-3">
                        <div class="col-5">
                           <label   class="col-form-label" for="estatus">¿Ha Asistido a Algún Festival Gastronómico?</label>
                        </div>
                        <div class="col-3"  >  
                           <select class="form-control form-control-sm estiloinput" onchange="asistiofestival($(this).val())" name="asistiofestivalselect" id="asistiofestivalselect">
                              <option value="2"  <?php if (empty($datos["festival"])){  echo "selected"; $display = 'style="display: none;"';} ?> >No</option>
                              <option value="1"  <?php if (!empty($datos["festival"])){  echo "selected"; $display = 'style="display: block;"';} ?> >Sí</option> 
                           </select> 
                        </div> 
                        <div class="col-4" style="text-align: right;"> 
                           <span class="linkAccion" id="agregarfestival" onclick="agregarfestival()" <?=$display?>>AGREGAR MÁS</span>
                        </div>  
                     </div> 
                  </div>
               </div>
            </div>
            <div class="box-body" id="contenedorfestival" <?=$display?>>

              <?php if (!empty($datos["festival"])){ $cont =0; foreach ($datos["festival"] as $key) { $cont++; ?>
               <div class="row mb-3" id="festival<?=$cont?>">
                  <div class="col">
                     <div class="row">
                        <div class="col-2"> 
                           <label class="labelsform" for="tipoevento<?=$cont?>">Tipo de Evento</label>
                           <input type="text" class="form-control form-control-sm estiloinput" hidden="" name="idfestival<?=$cont?>" id="idfestival<?=$cont?>" value="<?=$key["ID"]?>"> 
                           <select class="form-control form-control-sm estiloinput" name="tipoevento<?=$cont?>" id="tipoevento<?=$cont?>" onchange="otroevento($(this).val(),<?=$cont?>)">
                              <option value="1" <?php if ($key["TIPO_EVENTO"] == 1) { echo "selected" ; } ?> >Muestra</option>
                              <option value="2" <?php if ($key["TIPO_EVENTO"] == 2) { echo "selected" ; } ?> >Festival</option>
                              <option value="3" <?php if ($key["TIPO_EVENTO"] == 3) { echo "selected" ; } ?> >Feria</option>
                            <?php if ($key["TIPO_EVENTO"] == 4) {   ?>   <option value="<?=$key["OTRO_TIPO_EVENTO"]?>" <?='selected'?> ><?=$key["OTRO_TIPO_EVENTO"]?></option> <?php } ?>
                              <option value="4"   >Otro</option>
                           </select> 
                            <input type="text" class="form-control form-control-sm estiloinput"   name="otrotipoevento<?=$cont?>" id="otrotipoevento<?=$cont?>" value="" style="display: none;"> 

                        </div>
                        <div class="col-4"> 
                           <label class="labelsform" for="tema<?=$cont?>">Tema</label>
                           <input type="text" class="form-control form-control-sm estiloinput" name="tema<?=$cont?>" id="tema<?=$cont?>" value="<?=$key["TEMA"]?>"> 
                        </div>
                        <div class="col-4"> 
                           <label class="labelsform" for="locacion<?=$cont?>">Lugar del Evento</label>
                           <input type="text" class="form-control form-control-sm estiloinput" name="locacion<?=$cont?>" id="locacion<?=$cont?>" value="<?=$key["LOCACION"]?>"> 
                        </div>
                        <div class="col-2"> 
                           <label class="labelsform" for="fecha<?=$cont?>">Fecha</label>
                           <input type="text" class="form-control form-control-sm estiloinput datetimepicker" name="fecha<?=$cont?>" id="fecha<?=$cont?>" value="<?=datesqltodate($key["FECHA"])?>">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col"> 
                           <label class="labelsform" for="duracion<?=$cont?>">Duración</label>
                           <input type="text" class="form-control form-control-sm estiloinput" name="duracion<?=$cont?>" id="duracion<?=$cont?>" value="<?=$key["DURACION"]?>">
                        </div>
                        <div class="col"> 
                           <label class="labelsform" for="pais<?=$cont?>">País</label>
                           <input type="text" class="form-control form-control-sm estiloinput" name="pais<?=$cont?>" id="pais<?=$cont?>" value="<?=$key["PAIS"]?>">
                        </div>
                        <div class="col"> 
                           <label class="labelsform" for="estado<?=$cont?>">Estado</label>
                           <input type="text" class="form-control form-control-sm estiloinput" name="estado<?=$cont?>" id="estado<?=$cont?>" value="<?=$key["ESTADO"]?>">
                        </div>
                        <div class="col"> 
                           <label class="labelsform" for="ciudad<?=$cont?>">Ciudad</label>
                           <input type="text" class="form-control form-control-sm estiloinput" name="ciudad<?=$cont?>" id="ciudad<?=$cont?>" value="<?=$key["CIUDAD"]?>">
                        </div> 
                     </div>
                     <div class="row mt-3">
                        <div class="col-2 mostrarpanelrecon">
                           <div class="row">
                              <div class="col "   >
                                 <div class="contAjustar tamañosReconocimientosImgs">
                                    <div class="boxi">
                                       <img id="imagenfestival1a<?=$cont?>" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row panelimagenrecon">
                              <div class="col-1">
                                 <a id="mostrarimgfest1a<?=$cont?>" onclick='mostrarImagen("","imagenfestival1a<?=$cont?>","inputfilefestival1a<?=$cont?>","nombrefestival1a<?=$cont?>")' >
                                    <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" >
                                 </a>
                              </div>
                              <div class="col">
                              </div>
                              <div class="col-1">
                                 <label class="labelsform"  for="inputfilefestival1a<?=$cont?>"  >
                                    <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                                 </label>
                              </div>
                              <div class="col-1">
                                 <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg" onclick='quitarImagen("imagenfestival1a<?=$cont?>","inputfilefestival1a<?=$cont?>","")' >
                              </div>
                           </div>
                           <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                              <div class="col" style=" word-wrap: break-word;" >
                                 <span id="nombrefestival1a<?=$cont?>"></span>
                              </div>
                           </div>
                           <input type="file" id="inputfilefestival1a<?=$cont?>" accept=".jpg,.png,.jpeg" hidden=""  name="archivo1" onchange="previewfestival(1,<?=$cont?>);"  />
                           <input type="text" name='inputfestival1a<?=$cont?>'  id="inputfestival1a<?=$cont?>" hidden="" value=""/>
                           <input type="text" name='estensionfestival1a<?=$cont?>'  id="estensionfestival1a<?=$cont?>" hidden="" value=""/>
                           <input type="text" name='idimgfestival1a<?=$cont?>'  id="idimgfestival1a<?=$cont?>" hidden="" value=""/>
                        </div>
                        <div class="col-1">

                        </div>
                        <div class="col-2 mostrarpanelrecon">
                           <div class="row">
                              <div class="col "   >
                                 <div class="contAjustar tamañosReconocimientosImgs">
                                    <div class="boxi">
                                       <img id="imagenfestival2a<?=$cont?>" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row panelimagenrecon">
                              <div class="col-1">
                                 <a  id="mostrarimgfest2a<?=$cont?>" onclick='mostrarImagen("","imagenfestival2a<?=$cont?>","inputfilefestival2a<?=$cont?>","nombrefestival2a<?=$cont?>")' >
                                    <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" >
                                 </a>
                              </div>
                              <div class="col">
                              </div>
                              <div class="col-1">
                                 <label class="labelsform"  for="inputfilefestival2a<?=$cont?>"  >
                                    <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                                 </label>
                              </div>
                              <div class="col-1">
                                 <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg" onclick='quitarImagen("imagenfestival2a<?=$cont?>","inputfilefestival2a<?=$cont?>","")' >
                              </div>
                           </div>
                           <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                              <div class="col" style=" word-wrap: break-word;" >
                                 <span id="nombrefestival2a<?=$cont?>"></span>
                              </div>
                           </div>
                           <input type="file" id="inputfilefestival2a<?=$cont?>" accept=".jpg,.png,.jpeg" hidden=""  name="archivo<?=$cont?>" onchange="previewfestival(2,<?=$cont?>);"  />
                           <input type="text" name='inputfestival2a<?=$cont?>'  id="inputfestival2a<?=$cont?>" hidden="" value=""/>
                           <input type="text" name='estensionfestival2a<?=$cont?>'  id="estensionfestival2a<?=$cont?>" hidden="" value=""/>
                           <input type="text" name='idimgfestival2a<?=$cont?>'  id="idimgfestival2a<?=$cont?>" hidden="" value=""/>
                        </div>
                        <div class="col-1">

                        </div>
                        <div class="col-2 mostrarpanelrecon">
                           <div class="row">
                              <div class="col"   >
                                 <div class="contAjustar tamañosReconocimientosImgs">
                                    <div class="boxi">
                                       <img id="imagenfestival3a<?=$cont?>" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row panelimagenrecon">
                              <div class="col-1">
                                 <a id="mostrarimgfest3a<?=$cont?>" onclick='mostrarImagen("","imagenfestival3a<?=$cont?>","inputfilefestival3a<?=$cont?>","nombrefestival3a<?=$cont?>")'>
                                    <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" >
                                 </a>
                              </div>
                              <div class="col">
                              </div>
                              <div class="col-1">
                                 <label class="labelsform"  for="inputfilefestival3a<?=$cont?>"  >
                                    <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                                 </label>
                              </div>
                              <div class="col-1">
                                 <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg" onclick='quitarImagen("imagenfestival3a<?=$cont?>","inputfilefestival3a<?=$cont?>","")' >
                              </div>
                           </div>
                           <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                              <div class="col" style=" word-wrap: break-word;" >
                                 <span id="nombrefestival3a<?=$cont?>"></span>
                              </div>
                           </div>
                           <input type="file" id="inputfilefestival3a<?=$cont?>" accept=".jpg,.png,.jpeg" hidden=""  name="archivo<?=$cont?>" onchange="previewfestival(3,<?=$cont?>);"  />
                           <input type="text" name='inputfestival3a<?=$cont?>'  id="inputfestival3a<?=$cont?>" hidden="" value=""/>
                           <input type="text" name='estensionfestival3a<?=$cont?>'  id="estensionfestival3a<?=$cont?>" hidden="" value=""/>
                           <input type="text" name='idimgfestival3a<?=$cont?>'  id="idimgfestival3a<?=$cont?>" hidden="" value=""/>
                        </div>
                     </div>
                     <div class="row" > 
                        <div class="col-4"  >
                           <span class="linkAccione" onclick="eliminarfestival(<?=$cont?>,<?=$key["ID"]?>)"  >ELIMINAR</span>
                        </div>
                     </div>
                  </div>
               </div>
            <?php } } ?>

            <?php if (empty($datos["festival"])){ $cont = 1; ?>
              <div class="row mb-3" id="festival1">
               <div class="col">
                  <div class="row">
                     <div class="col-2"> 
                        <label class="labelsform" for="tipoevento1">Tipo de Evento</label>
                        <input type="text" class="form-control form-control-sm estiloinput" hidden="" name="idfestival1" id="idfestival1" value="0"> 
                        <select class="form-control form-control-sm estiloinput" name="tipoevento1" id="tipoevento1" onchange="otroevento($(this).val(),1)">
                           <option value="1">Muestra</option>
                           <option value="2">Festival</option>
                           <option value="3">Feria</option>
                           <option value="4">Otro</option>
                        </select> 
                         <input type="text" class="form-control form-control-sm estiloinput"   name="otrotipoevento1" id="otrotipoevento1" value="" style="display: none;"> 
                     </div>
                     <div class="col-4"> 
                        <label class="labelsform" for="tema1">Tema</label>
                        <input type="text" class="form-control form-control-sm estiloinput" name="tema1" id="tema1" > 
                     </div>
                     <div class="col-4"> 
                        <label class="labelsform" for="locacion1">Lugar del Evento</label>
                        <input type="text" class="form-control form-control-sm estiloinput" name="locacion1" id="locacion1" > 
                     </div>
                     <div class="col-2"> 
                        <label class="labelsform" for="fecha1">Fecha</label>
                        <input type="text" class="form-control form-control-sm estiloinput datetimepicker" name="fecha1" id="fecha1" >
                     </div>
                  </div>
                  <div class="row">
                     <div class="col"> 
                        <label class="labelsform" for="duracion1">Duración</label>
                        <input type="text" class="form-control form-control-sm estiloinput" name="duracion1" id="duracion1" >
                     </div>
                     <div class="col"> 
                        <label class="labelsform" for="pais1">País</label>
                        <input type="text" class="form-control form-control-sm estiloinput" name="pais1" id="pais1" >
                     </div>
                     <div class="col"> 
                        <label class="labelsform" for="estado1">Estado</label>
                        <input type="text" class="form-control form-control-sm estiloinput" name="estado1" id="estado1" >
                     </div>
                     <div class="col"> 
                        <label class="labelsform" for="ciudad1">Ciudad</label>
                        <input type="text" class="form-control form-control-sm estiloinput" name="ciudad1" id="ciudad1" >
                     </div> 
                  </div>
                  <div class="row mt-3">
                     <div class="col-2 mostrarpanelrecon">
                        <div class="row">
                           <div class="col "   >
                              <div class="contAjustar tamañosReconocimientosImgs">
                                 <div class="boxi">
                                    <img id="imagenfestival1a1" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row panelimagenrecon">
                           <div class="col-1" onclick='mostrarImagen("","imagenfestival1a1","inputfilefestival1a1","nombrefestival1a1")' >
                              <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > 
                           </div>
                           <div class="col">
                           </div>
                           <div class="col-1">
                              <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/DESCARGAR.svg" >
                           </div>
                           <div class="col-1">
                              <label class="labelsform"  for="inputfilefestival1a1"  >
                                 <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                              </label>
                           </div>
                           <div class="col-1">
                              <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >
                           </div>
                        </div>
                        <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                           <div class="col" style=" word-wrap: break-word;" >
                              <span id="nombrefestival1a1"></span>
                           </div>
                        </div>
                        <input type="file" id="inputfilefestival1a1" hidden=""  name="archivo1" onchange="previewfestival(1,1);"  />
                        <input type="text" name='inputfestival1a1'  id="inputfestival1a1" hidden="" value=""/>
                        <input type="text" name='estensionfestival1a1'  id="estensionfestival1a1" hidden="" value=""/>
                     </div>
                     <div class="col-1">

                     </div>
                     <div class="col-2 mostrarpanelrecon">
                        <div class="row">
                           <div class="col "   >
                              <div class="contAjustar tamañosReconocimientosImgs">
                                 <div class="boxi">
                                    <img id="imagenfestival2a1" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row panelimagenrecon">
                           <div class="col-1" onclick='mostrarImagen("","imagenfestival2a1","inputfilefestival2a1","nombrefestival2a1")' >
                              <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > 
                           </div>
                           <div class="col">
                           </div>
                           <div class="col-1">
                              <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/DESCARGAR.svg" >
                           </div>
                           <div class="col-1">
                              <label class="labelsform"  for="inputfilefestival2a1"  >
                                 <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                              </label>
                           </div>
                           <div class="col-1">
                              <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >
                           </div>
                        </div>
                        <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                           <div class="col" style=" word-wrap: break-word;" >
                              <span id="nombrefestival2a1"></span>
                           </div>
                        </div>
                        <input type="file" id="inputfilefestival2a1" hidden=""  name="archivo1" onchange="previewfestival(2,1);"  />
                        <input type="text" name='inputfestival2a1'  id="inputfestival2a1" hidden="" value=""/>
                        <input type="text" name='estensionfestival2a1'  id="estensionfestival2a1" hidden="" value=""/>
                     </div>
                     <div class="col-1">

                     </div>
                     <div class="col-2 mostrarpanelrecon">
                        <div class="row">
                           <div class="col"   >
                              <div class="contAjustar tamañosReconocimientosImgs">
                                 <div class="boxi">
                                    <img id="imagenfestival3a1" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row panelimagenrecon">
                           <div class="col-1"onclick='mostrarImagen("","imagenfestival3a1","inputfilefestival3a1","nombrefestival3a1")' >
                              <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > 
                           </div>
                           <div class="col">
                           </div>
                           <div class="col-1">
                              <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/DESCARGAR.svg" >
                           </div>
                           <div class="col-1">
                              <label class="labelsform"  for="inputfilefestival3a1"  >
                                 <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                              </label>
                           </div>
                           <div class="col-1">
                              <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >
                           </div>
                        </div>
                        <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                           <div class="col" style=" word-wrap: break-word;" >
                              <span id="nombrefestival3a1"></span>
                           </div>
                        </div>
                        <input type="file" id="inputfilefestival3a1" hidden=""  name="archivo1" onchange="previewfestival(3,1);"  />
                        <input type="text" name='inputfestival3a1'  id="inputfestival3a1" hidden="" value=""/>
                        <input type="text" name='estensionfestival3a1'  id="estensionfestival3a1" hidden="" value=""/>
                     </div>
                  </div>
                  <div class="row" > 
                     <div class="col-4"  >
                        <span class="linkAccione" onclick="eliminarfestival(1,0)"  >ELIMINAR</span>
                     </div>
                  </div>
               </div>
            </div>
         <?php } ?>
      </div>
      <input type="text" name="contadorfestival" id="contadorfestival" value="<?=$cont?>" hidden="">
   </form>
</div> 
</div>
</div>
<!-- ----------------------------PONENCIAS  --------------------------------------- -->
<div class="row ">
   <div class="col">
      <div class="box ">
         <form id="formponencias" action="<?=base_url('configuracion/reconocimientos/ponencias')?>">
            <div class="box-header ">
               <div class="row"> 
                  <div class="col">
                     <div class="row">
                        <div class="col-8 letratituloedicion">
                           <span>Ponente en Conferencias, Talleres, Foros, Congresos o Moderador</span>
                        </div> 
                        <div class="col lineainferiorosita"> 
                        </div>  
                     </div>
                     <div class="row pt-3">
                        <div class="col-5">
                           <label   class="col-form-label" for="estatus">¿Ha participado en alguno?</label>
                        </div>
                        <div class="col-3"  >  
                           <select class="form-control form-control-sm estiloinput" onchange="fueponencia($(this).val())" name="selectecponencia" id="selectecponencia">
                              <option value="2"  <?php if (empty($datos["ponencias"])){  echo "selected"; $display = 'style="display: none;"';} ?>  >No</option>
                              <option value="1" <?php if (!empty($datos["ponencias"])){  echo "selected"; $display = 'style="display: block;"';} ?> >Sí</option> 
                           </select> 
                        </div> 
                        <div class="col-4 " style="text-align: right;"> 
                           <span class="linkAccion" id="agregarponencia" onclick="agregarponencia()" <?=$display?> >AGREGAR MÁS</span>
                        </div>  
                     </div> 
                  </div>
               </div>
            </div>
            <div class="box-body" id="contenedorponencias" <?=$display?> >
             <?php if (!empty($datos["ponencias"])){ $cont =0; foreach ($datos["ponencias"] as $key) { $cont++; ?>
               <div class="row mb-3" id="ponencias<?=$cont?>">
                  <div class="col"> 
                     <div class="row">
                        <div class="col-2"> 
                           <input type="text" class="form-control form-control-sm estiloinput" name="idponencia<?=$cont?>" id="idponencia<?=$cont?>" value="<?=$key["ID"]?>" hidden=""> 
                           <label class="labelsform" for="tipoevento<?=$cont?>">Tipo de Evento</label>
                           <select class="form-control form-control-sm estiloinput" name="tipoevento<?=$cont?>" id="tipoevento<?=$cont?>">
                              <option value="1" <?php if($key["TIPO_EVENTO"] == 1){echo "selected";}  ?> >Conferencias</option>
                              <option value="2" <?php if($key["TIPO_EVENTO"] == 2){echo "selected";}  ?> >Talleres</option>
                              <option value="3" <?php if($key["TIPO_EVENTO"] == 3){echo "selected";}  ?> >Foros</option>
                              <option value="4" <?php if($key["TIPO_EVENTO"] == 4){echo "selected";}  ?> >Congresos</option>
                           </select> 
                        </div>
                        <div class="col"> 
                           <label class="labelsform" for="nombreevento<?=$cont?>">Nombre del Evento</label>
                           <input type="text" class="form-control form-control-sm estiloinput" name="nombreevento<?=$cont?>" id="nombreevento<?=$cont?>"  value="<?=$key["NOMBRE_EVENTO"]?>"> 
                        </div>
                        <div class="col"> 
                           <label class="labelsform" for="nombreponencia<?=$cont?>">Nombre de la ponencia</label>
                           <input type="text" class="form-control form-control-sm estiloinput" name="nombreponencia<?=$cont?>" id="nombreponencia<?=$cont?>"  value="<?=$key["NOMBRE_PONENCIA"]?>"> 
                        </div> 
                        <div class="col"> 
                           <label class="labelsform" for="locacion<?=$cont?>">Lugar del Evento</label>
                           <input type="text" class="form-control form-control-sm estiloinput" name="locacion<?=$cont?>" id="locacionponencia<?=$cont?>"  value="<?=$key["LOCACION"]?>"> 
                        </div>
                     </div>
                     <div class="row">
                        <div class="col"> 
                           <label class="labelsform" for="fecha<?=$cont?>">Fecha</label>
                           <input type="text" class="form-control form-control-sm estiloinput datetimepicker" name="fecha<?=$cont?>" id="fechaponencia<?=$cont?>"  value="<?=datesqltodate($key["FECHA"])?>">
                        </div>
                        <div class="col"> 
                           <label class="labelsform" for="pais<?=$cont?>">País</label>
                           <input type="text" class="form-control form-control-sm estiloinput" name="pais<?=$cont?>" id="pais<?=$cont?>" value="<?=$key["PAIS"]?>" >
                        </div>
                        <div class="col"> 
                           <label class="labelsform" for="estado<?=$cont?>">Estado</label>
                           <input type="text" class="form-control form-control-sm estiloinput" name="estado<?=$cont?>" id="estado<?=$cont?>"  value="<?=$key["ESTADO"]?>">
                        </div>
                        <div class="col"> 
                           <label class="labelsform" for="ciudad<?=$cont?>">Ciudad</label>
                           <input type="text" class="form-control form-control-sm estiloinput" name="ciudad<?=$cont?>" id="ciudad<?=$cont?>"  value="<?=$key["CIUDAD"]?>">
                        </div> 

                     </div>
                     <!-- ---------IMAGENES--------------- -->
                     <div class="row mt-3">
                        <div class="col-3 mr-4">
                           <span >Certificado</span>
                        </div>

                        <div class="col-">
                           <span >Imágenes del Evento</span>
                        </div> 
                     </div>
                     <div class="row mt-3">
                        <div class="col-3 mr-4 mostrarpanelrecon">
                           <div class="row">
                              <div class="col "   >
                                 <div class="contAjustar tamañosReconocimientosImgsXL">
                                    <div class="boxi">
                                       <img id="imagenponencia1a<?=$cont?>" src="<?php if(substr($key["DIRECCION_IMAGEN_RECONOCIMIENTO"], -3) == "pdf"){echo assetgeneral().'/img/pdf.png';}if ($key["DIRECCION_IMAGEN_RECONOCIMIENTO"] != "" && substr($key["DIRECCION_IMAGEN_RECONOCIMIENTO"], -3) != "pdf"){  echo $key["DIRECCION_IMAGEN_RECONOCIMIENTO"]; } if($key["DIRECCION_IMAGEN_RECONOCIMIENTO"] == ""){ echo assetgeneral().'/img/masgris.png';} ?>" style="width: 100%;"> 
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row panelimagenrecon">
                              <div class="col-1">
                                <a onclick='mostrarImagen("<?php echo $key["DIRECCION_IMAGEN_RECONOCIMIENTO"]; ?>","imagenponencia1a<?=$cont?>","inputfileponencia1a<?=$cont?>","nombreponencia1a<?=$cont?>")' >
                                 <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" id="expositorVer<?=$cont?>" >
                              </a>
                           </div>
                           <div class="col">
                           </div>
                           <div class="col-1">

                           </div>
                           <div class="col-1">
                              <label class="labelsform"  for="inputfileponencia1a<?=$cont?>"  >
                                 <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                              </label>
                           </div>
                           <div class="col-1">
                              <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg" onclick='quitarImagen("imagenponencia1a<?=$cont?>","inputfileponencia1a<?=$cont?>","inputponencia1a<?=$cont?>")'  >
                           </div>
                        </div>
                        <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                           <div class="col" style=" word-wrap: break-word;" >
                              <span id="nombreponencia1a<?=$cont?>"></span>
                           </div>
                        </div> 
                        <input type="file" id="inputfileponencia1a<?=$cont?>" accept=".jpg,.pdf,.png,.jpeg" hidden=""  name="archivo1" onchange="previewponencia(1,<?=$cont?>);"  />
                        <input type="text" name='inputponencia1a<?=$cont?>'  id="inputponencia1a<?=$cont?>" hidden="" value=""/>
                        <input type="text" name='estensionponencia1a<?=$cont?>'  id="estensionponencia1a<?=$cont?>" hidden="" value=""/>
                     </div>

                     <div class="col-2 mr-4 mostrarpanelrecon">
                        <div class="row">
                           <div class="col"   >
                              <div class="contAjustar tamañosReconocimientosImgs">
                                 <div class="boxi">
                                    <img id="imagenponencia2a<?=$cont?>" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row panelimagenrecon">
                           <div class="col-1">
                              <a  id="mostrarimgponencia2a<?=$cont?>" onclick='mostrarImagen("","imagenponencia2a<?=$cont?>","inputfileponencia2a<?=$cont?>","nombreponencia2a<?=$cont?>")' >
                                 <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" >
                              </a>
                           </div>
                           <div class="col">
                           </div>
                           <div class="col-1">

                           </div>
                           <div class="col-1">
                              <label class="labelsform"  for="inputfileponencia2a<?=$cont?>"  >
                                 <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                              </label>
                           </div>
                           <div class="col-1">
                              <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg" onclick='quitarImagen("imagenponencia2a<?=$cont?>","inputfileponencia2a<?=$cont?>","")' >
                           </div>
                        </div>
                        <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                           <div class="col" style=" word-wrap: break-word;" >
                              <span id="nombreponencia2a<?=$cont?>"></span>
                           </div>
                        </div> 
                        <input type="file" id="inputfileponencia2a<?=$cont?>" accept=".jpg,.png,.jpeg" hidden=""  name="archivo<?=$cont?>" onchange="previewponencia(2,<?=$cont?>);"  />
                        <input type="text" name='inputponencia2a<?=$cont?>'  id="inputponencia2a<?=$cont?>" hidden="" value=""/>
                        <input type="text" name='estensionponencia2a<?=$cont?>'  id="estensionponencia2a<?=$cont?>" hidden="" value=""/>
                        <input type="text" name='idimgponencial2a<?=$cont?>'  id="idimgponencial2a<?=$cont?>" hidden="" value=""/>
                     </div>

                     <div class="col-2 mr-4 mostrarpanelrecon">
                        <div class="row">
                           <div class="col"   >
                              <div class="contAjustar tamañosReconocimientosImgs">
                                 <div class="boxi">
                                    <img id="imagenponencia3a<?=$cont?>" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row panelimagenrecon">
                           <div class="col-1">
                              <a  id="mostrarimgponencia3a<?=$cont?>" onclick='mostrarImagen("","imagenponencia3a<?=$cont?>","inputfileponencia3a<?=$cont?>","nombreponencia3a<?=$cont?>")' >
                                 <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" >
                              </a>
                           </div>
                           <div class="col">
                           </div>
                           <div class="col-1">

                           </div>
                           <div class="col-1">
                              <label class="labelsform"  for="inputfileponencia3a<?=$cont?>"  >
                                 <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                              </label>
                           </div>
                           <div class="col-1">
                              <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg" onclick='quitarImagen("imagenponencia3a<?=$cont?>","inputfileponencia3a<?=$cont?>","")' >
                           </div>
                        </div>

                        <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                           <div class="col" style=" word-wrap: break-word;" >
                              <span id="nombreponencia3a<?=$cont?>"></span>
                           </div>
                        </div> 
                        <input type="file" id="inputfileponencia3a<?=$cont?>" accept=".jpg,.png,.jpeg" hidden=""  name="archivo<?=$cont?>" onchange="previewponencia(3,<?=$cont?>);"  />
                        <input type="text" name='inputponencia3a<?=$cont?>'  id="inputponencia3a<?=$cont?>" hidden="" value=""/>
                        <input type="text" name='estensionponencia3a<?=$cont?>'  id="estensionponencia3a<?=$cont?>" hidden="" value=""/>
                        <input type="text" name='idimgponencial3a<?=$cont?>'  id="idimgponencial3a<?=$cont?>" hidden="" value=""/>
                     </div>

                     <div class="col-2 mostrarpanelrecon">
                        <div class="row">
                           <div class="col"   >
                              <div class="contAjustar tamañosReconocimientosImgs">
                                 <div class="boxi">
                                    <img id="imagenponencia4a<?=$cont?>" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row panelimagenrecon">
                           <div class="col-1">
                              <a id="mostrarimgponencia4a<?=$cont?>" onclick='mostrarImagen("","imagenponencia4a<?=$cont?>","inputfileponencia4a<?=$cont?>","nombreponencia4a<?=$cont?>")' >
                                 <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" >
                              </a>
                           </div>
                           <div class="col">
                           </div>
                           <div class="col-1">

                           </div>
                           <div class="col-1">
                              <label class="labelsform"  for="inputfileponencia4a<?=$cont?>"  >
                                 <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                              </label>
                           </div>
                           <div class="col-1">
                              <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg" onclick='quitarImagen("imagenponencia4a<?=$cont?>","inputfileponencia4a<?=$cont?>","")' >
                           </div>
                        </div>
                        <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                           <div class="col" style=" word-wrap: break-word;" >
                              <span id="nombreponencia4a<?=$cont?>"></span>
                           </div>
                        </div> 
                        <input type="file" id="inputfileponencia4a<?=$cont?>" accept=".jpg,.png,.jpeg" hidden=""  name="archivo<?=$cont?>" onchange="previewponencia(4,<?=$cont?>);"  />
                        <input type="text" name='inputponencia4a<?=$cont?>'  id="inputponencia4a<?=$cont?>" hidden="" value=""/>
                        <input type="text" name='estensionponencia4a<?=$cont?>'  id="estensionponencia4a<?=$cont?>" hidden="" value=""/>
                        <input type="text" name='idimgponencial4a<?=$cont?>'  id="idimgponencial4a<?=$cont?>" hidden="" value=""/>
                     </div>
                  </div>
                  <div class="row" >
                     <div class="col-4"  >  
                        <span class="linkAccione" onclick="eliminarponencia(<?=$cont?>,<?=$key["ID"]?>)"  >ELIMINAR</span> 
                     </div>
                  </div>
               </div>
            </div>
         <?php } } ?>
         <?php if (empty($datos["ponencias"])){ $cont = 1;   ?>
            <div class="row mb-3" id="ponencias1">
               <div class="col"> 
                  <div class="row">
                     <div class="col-2"> 
                        <input type="text" class="form-control form-control-sm estiloinput" name="idponencia1" id="idponencia1" value="0" hidden=""> 
                        <label class="labelsform" for="tipoevento1">Tipo de Evento</label>
                        <select class="form-control form-control-sm estiloinput" name="tipoevento1" id="tipoevento1">
                           <option value="1">Conferencias</option>
                           <option value="2">Talleres</option>
                           <option value="3">Foros</option>
                           <option value="4">Congresos</option>
                        </select> 
                     </div>
                     <div class="col"> 
                        <label class="labelsform" for="nombreevento1">Nombre del Evento</label>
                        <input type="text" class="form-control form-control-sm estiloinput" name="nombreevento1" id="nombreevento1" > 
                     </div>
                     <div class="col"> 
                        <label class="labelsform" for="nombreponencia1">Nombre de la ponencia</label>
                        <input type="text" class="form-control form-control-sm estiloinput" name="nombreponencia1" id="nombreponencia1" > 
                     </div> 
                     <div class="col"> 
                        <label class="labelsform" for="locacion1">Lugar del Evento</label>
                        <input type="text" class="form-control form-control-sm estiloinput" name="locacion1" id="locacionponencia1" > 
                     </div>
                  </div>
                  <div class="row">
                     <div class="col"> 
                        <label class="labelsform" for="fecha1">Fecha</label>
                        <input type="text" class="form-control form-control-sm estiloinput datetimepicker" name="fecha1" id="fechaponencia1" >
                     </div>
                     <div class="col"> 
                        <label class="labelsform" for="pais1">País</label>
                        <input type="text" class="form-control form-control-sm estiloinput" name="pais1" id="pais1" >
                     </div>
                     <div class="col"> 
                        <label class="labelsform" for="estado1">Estado</label>
                        <input type="text" class="form-control form-control-sm estiloinput" name="estado1" id="estado1" >
                     </div>
                     <div class="col"> 
                        <label class="labelsform" for="ciudad1">Ciudad</label>
                        <input type="text" class="form-control form-control-sm estiloinput" name="ciudad1" id="ciudad1" >
                     </div> 

                  </div>
                  <!-- ---------IMAGENES--------------- -->
                  <div class="row mt-3">
                     <div class="col-3 mr-4">
                        <span >Certificado</span>
                     </div>

                     <div class="col-">
                        <span >Imágenes del Evento</span>
                     </div> 
                  </div>
                  <div class="row mt-3">
                     <div class="col-3 mr-4 mostrarpanelrecon">
                        <div class="row">
                           <div class="col  "   >
                              <div class="contAjustar tamañosReconocimientosImgs">
                                 <div class="boxi">
                                    <img id="imagenponencia1a1" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row panelimagenrecon">
                           <div class="col-1" onclick='mostrarImagen("","imagenponencia1a1","inputfileponencia1a1","nombreponencia1a1")' >
                              <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > 
                           </div>
                           <div class="col">
                           </div>
                           <div class="col-1">

                           </div>
                           <div class="col-1">
                              <label class="labelsform"  for="inputfileponencia1a1"  >
                                 <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                              </label>
                           </div>
                           <div class="col-1">
                              <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >
                           </div>
                        </div>
                        <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                           <div class="col" style=" word-wrap: break-word;" >
                              <span id="nombreponencia1a1"></span>
                           </div>
                        </div> 
                        <input type="file" id="inputfileponencia1a1" hidden=""  name="archivo1" onchange="previewponencia(1,1);"  />
                        <input type="text" name='inputponencia1a1'  id="inputponencia1a1" hidden="" value=""/>
                        <input type="text" name='estensionponencia1a1'  id="estensionponencia1a1" hidden="" value=""/>
                     </div>

                     <div class="col-2 mr-4 mostrarpanelrecon">
                        <div class="row">
                           <div class="col "   >
                              <div class="contAjustar tamañosReconocimientosImgs">
                                 <div class="boxi">
                                    <img id="imagenponencia2a1" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row panelimagenrecon">
                           <div class="col-1" onclick='mostrarImagen("","imagenponencia2a1","inputfileponencia2a1","nombreponencia2a1")' >
                              <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > 
                           </div>
                           <div class="col">
                           </div>
                           <div class="col-1">

                           </div>
                           <div class="col-1">
                              <label class="labelsform"  for="inputfileponencia2a1"  >
                                 <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                              </label>
                           </div>
                           <div class="col-1">
                              <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >
                           </div>
                        </div>
                        <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                           <div class="col" style=" word-wrap: break-word;" >
                              <span id="nombreponencia2a1"></span>
                           </div>
                        </div> 
                        <input type="file" id="inputfileponencia2a1" hidden=""  name="archivo1" onchange="previewponencia(2,1);"  />
                        <input type="text" name='inputponencia2a1'  id="inputponencia2a1" hidden="" value=""/>
                        <input type="text" name='estensionponencia2a1'  id="estensionponencia2a1" hidden="" value=""/>
                     </div>

                     <div class="col-2 mr-4 mostrarpanelrecon">
                        <div class="row">
                           <div class="col"   >
                              <div class="contAjustar tamañosReconocimientosImgs">
                                 <div class="boxi">
                                    <img id="imagenponencia3a1" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row panelimagenrecon">
                           <div class="col-1" onclick='mostrarImagen("","imagenponencia3a1","inputfileponencia3a1","nombreponencia3a1")' >
                              <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > 
                           </div>
                           <div class="col">
                           </div>
                           <div class="col-1">

                           </div>
                           <div class="col-1">
                              <label class="labelsform"  for="inputfileponencia3a1"  >
                                 <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                              </label>
                           </div>
                           <div class="col-1">
                              <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >
                           </div>
                        </div>

                        <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                           <div class="col" style=" word-wrap: break-word;" >
                              <span id="nombreponencia3a1"></span>
                           </div>
                        </div> 
                        <input type="file" id="inputfileponencia3a1" hidden=""  name="archivo1" onchange="previewponencia(3,1);"  />
                        <input type="text" name='inputponencia3a1'  id="inputponencia3a1" hidden="" value=""/>
                        <input type="text" name='estensionponencia3a1'  id="estensionponencia3a1" hidden="" value=""/>
                     </div>

                     <div class="col-2 mostrarpanelrecon">
                        <div class="row">
                           <div class="col "   >
                              <div class="contAjustar tamañosReconocimientosImgs">
                                 <div class="boxi">
                                    <img id="imagenponencia4a1" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row panelimagenrecon">
                           <div class="col-1" onclick='mostrarImagen("","imagenponencia4a1","inputfileponencia4a1","nombreponencia4a1")' >
                              <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > 
                           </div>
                           <div class="col">
                           </div>
                           <div class="col-1">

                           </div>
                           <div class="col-1">
                              <label class="labelsform"  for="inputfileponencia4a1"  >
                                 <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                              </label>
                           </div>
                           <div class="col-1">
                              <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >
                           </div>
                        </div>
                        <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                           <div class="col" style=" word-wrap: break-word;" >
                              <span id="nombreponencia4a1"></span>
                           </div>
                        </div> 
                        <input type="file" id="inputfileponencia4a1" hidden=""  name="archivo1" onchange="previewponencia(4,1);"  />
                        <input type="text" name='inputponencia4a1'  id="inputponencia4a1" hidden="" value=""/>
                        <input type="text" name='estensionponencia4a1'  id="estensionponencia4a1" hidden="" value=""/>
                     </div>
                  </div>
                  <div class="row" >
                     <div class="col-4"  >  
                        <span class="linkAccione" onclick="eliminarponencia(1,0)"  >ELIMINAR</span> 
                     </div>
                  </div>
               </div>
            </div>
         <?php }  ?>
      </div>
      <input type="text" name="contadorponencias" id="contadorponencias" value="<?=$cont?>" hidden="">
   </form>
</div> 
</div>
</div>
<!-- ----------------------------RECONOCIMIENTOS ESPECIALES  --------------------------------------- -->
<div class="row ">
   <div class="col">
      <div class="box ">
         <form id="formreconocimientos" action="<?=base_url('configuracion/reconocimientos/reconocimientosespeciales')?>">
            <div class="box-header ">
               <div class="row"> 
                  <div class="col">
                     <div class="row">
                        <div class="col-4 letratituloedicion">
                           <span>Reconocimientos Especiales</span>
                        </div> 
                        <div class="col lineainferiorosita"> 
                        </div>  
                     </div>
                     <div class="row pt-3">
                        <div class="col-5">
                           <label   class="col-form-label" for="estatus">¿Ha Recibido Alguno?</label>
                        </div>
                        <div class="col-3"  >  
                           <select class="form-control form-control-sm estiloinput" onchange="tienereconocimiento($(this).val())" name="reconocimientoespecialselect" id="reconocimientoespecialselect">
                              <option value="2"  <?php if (empty($datos["reconocimientos"])){  echo "selected"; $display = 'style="display: none;"';} ?> >No</option>
                              <option value="1" <?php if (!empty($datos["reconocimientos"])){  echo "selected"; $display = 'style="display: block;"';} ?> >Sí</option> 
                           </select> 
                        </div> 
                        <div class="col-4 " style="text-align: right;"> 
                           <span class="linkAccion" id="agregarrecon" onclick="agregarreconocimiento()" <?=$display?> >AGREGAR MÁS</span>
                        </div>  
                     </div> 
                  </div>
               </div>
            </div>
            <div class="box-body" id="contenedorreconocimiento" <?=$display?> >
               <?php if (!empty($datos["reconocimientos"])){ $cont =0; foreach ($datos["reconocimientos"] as $key) { $cont++; ?>
                  <div class="row" id="reconocimiento<?=$cont?>">
                     <div class="col"> 
                        <div class="row">
                           <div class="col"> 
                              <label class="labelsform" for="tiporeconocimiento<?=$cont?>">Tipo de Reconocimiento</label>
                              <input type="text" class="form-control form-control-sm estiloinput" name="idreconocimiento<?=$cont?>" id="idreconocimiento<?=$cont?>" value="<?=$key["ID"]?>" hidden="">
                              <input type="text" class="form-control form-control-sm estiloinput" name="tiporeconocimiento<?=$cont?>" id="tiporeconocimiento<?=$cont?>" value="<?=$key["TIPO_RECONOCIMIENTO"]?>"> 
                           </div>
                           <div class="col"> 
                              <label class="labelsform" for="quienotorga<?=$cont?>">¿Quién lo otorga?</label>
                              <input type="text" class="form-control form-control-sm estiloinput" name="quienotorga<?=$cont?>" id="quienotorga<?=$cont?>"  value="<?=$key["QUIEN_OTORGA"]?>"> 
                           </div> 
                           <div class="col-2"> 
                              <label class="labelsform" for="fecha<?=$cont?>">Fecha</label>
                              <input type="text" class="form-control form-control-sm estiloinput datetimepicker" name="fecha<?=$cont?>" id="fechareconocimiento<?=$cont?>"  value="<?=datesqltodate($key["FECHA"])?>">
                           </div>
                        </div>
                        <div class="row">

                           <div class="col"> 
                              <label class="labelsform" for="pais<?=$cont?>">País</label>
                              <input type="text" class="form-control form-control-sm estiloinput" name="pais<?=$cont?>" id="pais<?=$cont?>" value="<?=$key["PAIS"]?>" >
                           </div>
                           <div class="col"> 
                              <label class="labelsform" for="estado<?=$cont?>">Estado</label>
                              <input type="text" class="form-control form-control-sm estiloinput" name="estado<?=$cont?>" id="estado<?=$cont?>" value="<?=$key["ESTADO"]?>" >
                           </div>
                           <div class="col"> 
                              <label class="labelsform" for="ciudad<?=$cont?>">Ciudad</label>
                              <input type="text" class="form-control form-control-sm estiloinput" name="ciudad<?=$cont?>" id="ciudad<?=$cont?>" value="<?=$key["CIUDAD"]?>" >
                           </div>  
                        </div>
                        <!-- ---------IMAGENES--------------- -->
                        <div class="row mt-3">
                           <div class="col-3 mr-4">
                              <span >Reconocimiento</span>
                           </div>

                           <div class="col-">
                              <span >Imágenes del Evento</span>
                           </div> 
                        </div>
                        <div class="row mt-3">
                           <div class="col-3 mr-4 mostrarpanelrecon">
                              <div class="row">
                                 <div class="col"   >
                                    <div class="contAjustar tamañosReconocimientosImgsXL">
                                       <div class="boxi">
                                          <img id="imagenreconocimiento1a<?=$cont?>" src="<?php if(substr($key["DIRECCION_IMAGEN_RECONOCIMIENTO"], -3) == "pdf"){echo assetgeneral().'/img/pdf.png';}if ($key["DIRECCION_IMAGEN_RECONOCIMIENTO"] != "" && substr($key["DIRECCION_IMAGEN_RECONOCIMIENTO"], -3) != "pdf"){  echo $key["DIRECCION_IMAGEN_RECONOCIMIENTO"]; } if($key["DIRECCION_IMAGEN_RECONOCIMIENTO"] == ""){ echo assetgeneral().'/img/masgris.png';} ?>" style="width: 100%;"> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row panelimagenrecon">
                                 <div class="col-1">
                                    <a onclick='mostrarImagen("<?php echo $key["DIRECCION_IMAGEN_RECONOCIMIENTO"]; ?>","imagenreconocimiento1a<?=$cont?>","inputfilreconocimiento1a<?=$cont?>","nombrereconocimiento1a<?=$cont?>")' >
                                       <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" id="recoVer<?=$cont?>" >
                                    </a>
                                 </div>
                                 <div class="col">
                                 </div>
                                 <div class="col-1">

                                 </div>
                                 <div class="col-1">
                                    <label class="labelsform"  for="inputfilreconocimiento1a<?=$cont?>"  >
                                       <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                                    </label>
                                 </div>
                                 <div class="col-1">
                                    <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg" onclick='quitarImagen("imagenreconocimiento1a<?=$cont?>","inputfilreconocimiento1a<?=$cont?>","inputreconocimiento1a<?=$cont?>")' >
                                 </div>
                              </div>
                              <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                                 <div class="col" style=" word-wrap: break-word;" >
                                    <span id="nombrereconocimiento1a<?=$cont?>"></span>
                                 </div>
                              </div> 
                              <input type="file" id="inputfilreconocimiento1a<?=$cont?>" accept=".jpg,.pdf,.png,.jpeg,.pdf"  hidden=""  name="archivo1" onchange="previewreconocimiento(1,<?=$cont?>);"  />
                              <input type="text" name='inputreconocimiento1a<?=$cont?>'  id="inputreconocimiento1a<?=$cont?>" hidden="" value=""/>
                              <input type="text" name='estensionreconocimiento1a<?=$cont?>'  id="estensionreconocimiento1a<?=$cont?>" hidden="" value=""/>
                           </div>

                           <div class="col-2 mr-4 mostrarpanelrecon">
                              <div class="row">
                                 <div class="col "   >
                                    <div class="contAjustar tamañosReconocimientosImgs">
                                       <div class="boxi">
                                          <img id="imagenreconocimiento2a<?=$cont?>" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row panelimagenrecon">
                                 <div class="col-1">
                                  <a id="mostrarimgrecon2a<?=$cont?>" onclick='mostrarImagen("","imagenreconocimiento2a<?=$cont?>","inputfilreconocimiento2a<?=$cont?>","nombrereconocimiento2a<?=$cont?>")' >
                                    <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" >
                                 </a>
                              </div>
                              <div class="col">
                              </div>
                              <div class="col-1">

                              </div>
                              <div class="col-1">
                                 <label class="labelsform"  for="inputfilreconocimiento2a<?=$cont?>"  >
                                    <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                                 </label>
                              </div>
                              <div class="col-1">
                                 <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg" onclick='quitarImagen("imagenreconocimiento2a<?=$cont?>","inputfilreconocimiento2a<?=$cont?>","nombrereconocimiento2a<?=$cont?>")' >
                              </div>
                           </div>
                           <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                              <div class="col" style=" word-wrap: break-word;" >
                                 <span id="nombrereconocimiento2a<?=$cont?>"></span>
                              </div>
                           </div> 
                           <input type="file" id="inputfilreconocimiento2a<?=$cont?>" hidden=""  accept=".jpg,.png,.jpeg" name="archivo<?=$cont?>" onchange="previewreconocimiento(2,<?=$cont?>);"  />
                           <input type="text" name='inputreconocimiento2a<?=$cont?>'   id="inputreconocimiento2a<?=$cont?>" hidden="" value=""/>
                           <input type="text" name='estensionreconocimiento2a<?=$cont?>'  id="estensionreconocimiento2a<?=$cont?>" hidden="" value=""/>
                           <input type="text" name='idimgrecon2a<?=$cont?>'  id="idimgrecon2a<?=$cont?>" hidden="" value=""/>
                        </div>

                        <div class="col-2 mr-4 mostrarpanelrecon">
                           <div class="row">
                              <div class="col"   >
                                 <div class="contAjustar tamañosReconocimientosImgs">
                                    <div class="boxi">
                                       <img id="imagenreconocimiento3a<?=$cont?>" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row panelimagenrecon">
                              <div class="col-1">
                                 <a id="mostrarimgrecon3a<?=$cont?>" onclick='mostrarImagen("","imagenreconocimiento3a<?=$cont?>","inputfilreconocimiento3a<?=$cont?>","nombrereconocimiento3a<?=$cont?>")' >
                                    <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" >
                                 </a>
                              </div>
                              <div class="col">
                              </div>
                              <div class="col-1">

                              </div>
                              <div class="col-1">
                                 <label class="labelsform"  for="inputfilreconocimiento3a<?=$cont?>"  >
                                    <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                                 </label>
                              </div>
                              <div class="col-1">
                                 <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg" onclick='quitarImagen("imagenreconocimiento3a<?=$cont?>","inputfilreconocimiento3a<?=$cont?>","")' >
                              </div>
                           </div>

                           <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                              <div class="col" style=" word-wrap: break-word;" >
                                 <span id="nombrereconocimiento3a<?=$cont?>"></span>
                              </div>
                           </div> 
                           <input type="file" id="inputfilreconocimiento3a<?=$cont?>" hidden="" accept=".jpg,.png,.jpeg" name="archivo<?=$cont?>" onchange="previewreconocimiento(3,<?=$cont?>);"  />
                           <input type="text" name='inputreconocimiento3a<?=$cont?>'   id="inputreconocimiento3a<?=$cont?>" hidden="" value=""/>
                           <input type="text" name='estensionreconocimiento3a<?=$cont?>'  id="estensionreconocimiento3a<?=$cont?>" hidden="" value=""/>
                           <input type="text" name='idimgrecon3a<?=$cont?>'  id="idimgrecon3a<?=$cont?>" hidden="" value=""/>
                        </div>

                        <div class="col-2 mostrarpanelrecon">
                           <div class="row">
                              <div class="col "   >
                                 <div class="contAjustar tamañosReconocimientosImgs">
                                    <div class="boxi">
                                       <img id="imagenreconocimiento4a<?=$cont?>" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row panelimagenrecon">
                              <div class="col-1">
                                 <a id="mostrarimgrecon4a<?=$cont?>" onclick='mostrarImagen("","imagenreconocimiento4a<?=$cont?>","inputfilreconocimiento4a<?=$cont?>","nombrereconocimiento4a<?=$cont?>")' >
                                    <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" >
                                 </a>
                              </div>
                              <div class="col">
                              </div>
                              <div class="col-1">

                              </div>
                              <div class="col-1">
                                 <label class="labelsform"  for="inputfilreconocimiento4a<?=$cont?>"  >
                                    <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                                 </label>
                              </div>
                              <div class="col-1">
                                 <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg" onclick='quitarImagen("imagenreconocimiento4a<?=$cont?>","inputfilreconocimiento4a<?=$cont?>","")' >
                              </div>
                           </div>
                           <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                              <div class="col" style=" word-wrap: break-word;" >
                                 <span id="nombrereconocimiento4a<?=$cont?>"></span>
                              </div>
                           </div> 
                           <input type="file" id="inputfilreconocimiento4a<?=$cont?>" accept=".jpg,.png,.jpeg" hidden=""  name="archivo<?=$cont?>" onchange="previewreconocimiento(4,<?=$cont?>);"  />
                           <input type="text" name='inputreconocimiento4a<?=$cont?>'  id="inputreconocimiento4a<?=$cont?>" hidden="" value=""/>
                           <input type="text" name='estensionreconocimiento4a<?=$cont?>'  id="estensionreconocimiento4a<?=$cont?>" hidden="" value=""/>
                           <input type="text" name='idimgrecon4a<?=$cont?>'  id="idimgrecon4a<?=$cont?>" hidden="" value=""/>
                        </div>
                     </div>
                     <div class="row" >
                        <div class="col-4"  >  
                           <span class="linkAccione" onclick="eliminarreconocimiento(<?=$cont?>,<?=$key["ID"]?>)"  >ELIMINAR</span> 
                        </div>
                     </div>
                  </div>
               </div>

            <?php } } ?>
            <?php if (empty($datos["reconocimientos"])){ $cont = 1;   ?>
               <div class="row" id="reconocimiento1">
                  <div class="col"> 
                     <div class="row">
                        <div class="col"> 
                           <label class="labelsform" for="tiporeconocimiento1">Tipo de Reconocimiento</label>
                           <input type="text" class="form-control form-control-sm estiloinput" name="idreconocimiento1" id="idreconocimiento1" value="0" hidden="">
                           <input type="text" class="form-control form-control-sm estiloinput" name="tiporeconocimiento1" id="tiporeconocimiento1" > 
                        </div>
                        <div class="col"> 
                           <label class="labelsform" for="quienotorga1">¿Quién lo otorga?</label>
                           <input type="text" class="form-control form-control-sm estiloinput" name="quienotorga1" id="quienotorga1" > 
                        </div> 
                        <div class="col-2"> 
                           <label class="labelsform" for="fecha1">Fecha</label>
                           <input type="text" class="form-control form-control-sm estiloinput datetimepicker" name="fecha1" id="fechareconocimiento1" >
                        </div>
                     </div>
                     <div class="row">

                        <div class="col"> 
                           <label class="labelsform" for="pais1">País</label>
                           <input type="text" class="form-control form-control-sm estiloinput" name="pais1" id="pais1" >
                        </div>
                        <div class="col"> 
                           <label class="labelsform" for="estado1">Estado</label>
                           <input type="text" class="form-control form-control-sm estiloinput" name="estado1" id="estado1" >
                        </div>
                        <div class="col"> 
                           <label class="labelsform" for="ciudad1">Ciudad</label>
                           <input type="text" class="form-control form-control-sm estiloinput" name="ciudad1" id="ciudad1" >
                        </div>  
                     </div>
                     <!-- ---------IMAGENES--------------- -->
                     <div class="row mt-3">
                        <div class="col-3 mr-4">
                           <span >Reconocimiento</span>
                        </div>

                        <div class="col-">
                           <span >Imágenes del Evento</span>
                        </div> 
                     </div>
                     <div class="row mt-3">
                        <div class="col-3 mr-4 mostrarpanelrecon">
                           <div class="row">
                              <div class="col "   >
                                 <div class="contAjustar tamañosReconocimientosImgs">
                                    <div class="boxi">
                                       <img id="imagenreconocimiento1a1" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row panelimagenrecon">
                              <div class="col-1" onclick='mostrarImagen("","imagenreconocimiento1a1","inputfilreconocimiento1a1","nombrereconocimiento1a1")' >
                                 <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > 
                              </div>
                              <div class="col">
                              </div>
                              <div class="col-1">

                              </div>
                              <div class="col-1">
                                 <label class="labelsform"  for="inputfilreconocimiento1a1"  >
                                    <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                                 </label>
                              </div>
                              <div class="col-1">
                                 <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >
                              </div>
                           </div>
                           <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                              <div class="col" style=" word-wrap: break-word;" >
                                 <span id="nombrereconocimiento1a1"></span>
                              </div>
                           </div> 
                           <input type="file" id="inputfilreconocimiento1a1" accept=".jpg,.png,.jpeg,.pdf" hidden=""  name="archivo1" onchange="previewreconocimiento(1,1);"  />
                           <input type="text" name='inputreconocimiento1a1'  id="inputreconocimiento1a1" hidden="" value=""/>
                           <input type="text" name='estensionreconocimiento1a1'  id="estensionreconocimiento1a1" hidden="" value=""/>
                        </div>

                        <div class="col-2 mr-4 mostrarpanelrecon">
                           <div class="row">
                              <div class="col "   >
                                 <div class="contAjustar tamañosReconocimientosImgs">
                                    <div class="boxi">
                                       <img id="imagenreconocimiento2a1" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row panelimagenrecon">
                              <div class="col-1" onclick='mostrarImagen("","imagenreconocimiento2a1","inputfilreconocimiento2a1","nombrereconocimiento2a1")' >
                                 <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > 
                              </div>
                              <div class="col">
                              </div>
                              <div class="col-1">

                              </div>
                              <div class="col-1">
                                 <label class="labelsform"  for="inputfilreconocimiento2a1"  >
                                    <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                                 </label>
                              </div>
                              <div class="col-1">
                                 <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >
                              </div>
                           </div>
                           <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                              <div class="col" style=" word-wrap: break-word;" >
                                 <span id="nombrereconocimiento2a1"></span>
                              </div>
                           </div> 
                           <input type="file" id="inputfilreconocimiento2a1" accept=".jpg,.png,.jpeg" hidden=""  name="archivo1" onchange="previewreconocimiento(2,1);"  />
                           <input type="text" name='inputreconocimiento2a1'  id="inputreconocimiento2a1" hidden="" value=""/>
                           <input type="text" name='estensionreconocimiento2a1'  id="estensionreconocimiento2a1" hidden="" value=""/>
                        </div>

                        <div class="col-2 mr-4 mostrarpanelrecon">
                           <div class="row">
                              <div class="col "   >
                                 <div class="contAjustar tamañosReconocimientosImgs">
                                    <div class="boxi">
                                       <img id="imagenreconocimiento3a1" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row panelimagenrecon">
                              <div class="col-1" onclick='mostrarImagen("","imagenreconocimiento3a1","inputfilreconocimiento3a1","nombrereconocimiento3a1")' >
                                 <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > 
                              </div>
                              <div class="col">
                              </div>
                              <div class="col-1">

                              </div>
                              <div class="col-1">
                                 <label class="labelsform"  for="inputfilreconocimiento3a1"  >
                                    <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                                 </label>
                              </div>
                              <div class="col-1">
                                 <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >
                              </div>
                           </div>

                           <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                              <div class="col" style=" word-wrap: break-word;" >
                                 <span id="nombrereconocimiento3a1"></span>
                              </div>
                           </div> 
                           <input type="file" id="inputfilreconocimiento3a1" accept=".jpg,.png,.jpeg" hidden=""  name="archivo1" onchange="previewreconocimiento(3,1);"  />
                           <input type="text" name='inputreconocimiento3a1'  id="inputreconocimiento3a1" hidden="" value=""/>
                           <input type="text" name='estensionreconocimiento3a1'  id="estensionreconocimiento3a1" hidden="" value=""/>
                        </div>

                        <div class="col-2 mostrarpanelrecon">
                           <div class="row">
                              <div class="col "   >
                                 <div class="contAjustar tamañosReconocimientosImgs">
                                    <div class="boxi">
                                       <img id="imagenreconocimiento4a1" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> 
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row panelimagenrecon">
                              <div class="col-1" onclick='mostrarImagen("","imagenreconocimiento4a1","inputfilreconocimiento4a1","nombrereconocimiento4a1")' >
                                 <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > 
                              </div>
                              <div class="col">
                              </div>
                              <div class="col-1">

                              </div>
                              <div class="col-1">
                                 <label class="labelsform"  for="inputfilreconocimiento4a1"  >
                                    <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                                 </label>
                              </div>
                              <div class="col-1">
                                 <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >
                              </div>
                           </div>
                           <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">
                              <div class="col" style=" word-wrap: break-word;" >
                                 <span id="nombrereconocimiento4a1"></span>
                              </div>
                           </div> 
                           <input type="file" id="inputfilreconocimiento4a1" accept=".jpg,.png,.jpeg" hidden=""  name="archivo1" onchange="previewreconocimiento(4,1);"  />
                           <input type="text" name='inputreconocimiento4a1'  id="inputreconocimiento4a1" hidden="" value=""/>
                           <input type="text" name='estensionreconocimiento4a1'  id="estensionreconocimiento4a1" hidden="" value=""/>
                        </div>
                     </div>
                     <div class="row" >
                        <div class="col-4"  >  
                           <span class="linkAccione" onclick="eliminarreconocimiento(1,0)"  >ELIMINAR</span> 
                        </div>
                     </div>
                  </div>
               </div>
            <?php }  ?>


         </div>
         <input type="text" name="contadorreconocimientos" id="contadorreconocimientos" value="<?=$cont?>" hidden="">
      </form>
   </div> 
</div>
</div>
<!-- ------------------------------------------------------------------------------------------------------------- -->
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
      $(window).on("change", function(){
                var d = new Date();
  var n = d.getFullYear();
               for (var i = 1; i <= $("#contadorasociaciones").val(); i++) {  
                  if ($("#anoingresoasociasion"+i).val() > n) { 
                     $("#anoingresoasociasion"+i).val('')
                     
                  }

               }
               for (var i = 1; i <= $("#contadorjuez").val(); i++) {  
                  if ($("#anoingreso"+i).val() > n) { 
                     $("#anoingreso"+i).val("")

                  }  

               } 

            }); 
   $(window).on("mouseover", function(){
      $('.anio').mask('0000');
      $('.datetimepicker').datepicker({
         format: "dd/mm/yyyy",
         autoclose: true,
         todayHighlight: true,
         assumeNearbyYear: true
      });
   }); 

   $(window).on("load", function(){
      setTimeout(function(){
         var cont = $("#contadorconcursos").val();  
         for (var i = 1; i <= cont; i++) { 
            var valor = $('#idconcurso'+i).val(); 

            if (valor != 0) {
               $.ajax({ 
                  type: 'ajax',
                  method: 'post',
                  dataType: 'text',
                  async: false,
                  url: '<?=base_url('configuracion/reconocimientos/imgconcursos/')?>'+valor ,
               })
               .done(function(response){
                  response = response.split("@");
                  for (var d = 0; d <=2; d++) {
                     var str = response[d].split("#");

                     if (str[1] != "") {
                        $("#imagenconcursio"+(d+Number(2))+"a"+i).attr("src",str[1]);
                     }
                     $("#idimgconcurso"+(d+Number(2))+"a"+i).val(str[0]);
                  }
               }) ;
            }
         }
         var cont = $("#contadorfestival").val();  
         for (var i = 1; i <= cont; i++) { 

            var valor = $('#idfestival'+i).val(); 
            console.log(valor)
            if (valor != 0) {
               $.ajax({ 
                  type: 'ajax',
                  method: 'post',
                  dataType: 'text',
                  async: false,
                  url: '<?=base_url('configuracion/reconocimientos/imgfestivales/')?>'+valor ,
               })
               .done(function(response){
                  response = response.split("@");
                  for (var d = 0; d <=2; d++) {
                     var str = response[d].split("#");

                     if (str[1] != "") {
                        $("#imagenfestival"+(d+Number(1))+"a"+i).attr("src",str[1]);
                     }
                     $("#idimgfestival"+(d+Number(1))+"a"+i).val(str[0]);

                  }


               }) ;
            }
         }
         var cont = $("#contadorponencias").val();  
         for (var i = 1; i <= cont; i++) { 

            var valor = $('#idponencia'+i).val(); 
            console.log(valor)
            if (valor != 0) {
               $.ajax({ 
                  type: 'ajax',
                  method: 'post',
                  dataType: 'text',
                  async: false,
                  url: '<?=base_url('configuracion/reconocimientos/imgponencias/')?>'+valor ,
               })
               .done(function(response){
                  response = response.split("@");
                  for (var d = 0; d <=2; d++) {
                     var str = response[d].split("#");

                     if (str[1] != "") {
                        $("#imagenponencia"+(d+Number(2))+"a"+i).attr("src",str[1]);
                     }
                     $("#idimgponencial"+(d+Number(2))+"a"+i).val(str[0]);

                  }
               }) ;
            }

         }
         var cont = $("#contadorreconocimientos").val();  
         for (var i = 1; i <= cont; i++) { 

            var valor = $('#idreconocimiento'+i).val(); 
            console.log(valor)
            if (valor != 0) {
               $.ajax({ 
                  type: 'ajax',
                  method: 'post',
                  dataType: 'text',
                  async: false,
                  url: '<?=base_url('configuracion/reconocimientos/imgrecon/')?>'+valor ,
               })
               .done(function(response){
                  response = response.split("@");
                  for (var d = 0; d <=2; d++) {
                     var str = response[d].split("#");

                     if (str[1] != "") {
                        $("#imagenreconocimiento"+(d+Number(2))+"a"+i).attr("src",str[1]);
                     }
                     $("#idimgrecon"+(d+Number(2))+"a"+i).val(str[0]);
                  }
               }) ;
            }
         }
      },250) ;
      if ($("#asociacionclubselect").val() == 1) {
         $("#asociacionclubselect option[value=2]").attr("disabled", "");
      }
      if ($("#ganarconcursosselect").val() == 1) {
         $("#ganarconcursosselect option[value=2]").attr("disabled", "");
      }
      if ($("#participarjuezselect").val() == 1) {
         $("#participarjuezselect option[value=2]").attr("disabled", "");
      }
      if ($("#asistiofestivalselect").val() == 1) {
         $("#asistiofestivalselect option[value=2]").attr("disabled", "");
      }
      if ($("#selectecponencia").val() == 1) {
         $("#selectecponencia option[value=2]").attr("disabled", "");
      }
      if ($("#reconocimientoespecialselect").val() == 1) {
         $("#reconocimientoespecialselect option[value=2]").attr("disabled", "");
      }
   });

function masediciones(id,valor) {
   if (valor == 8) {
         $("#edicionconcurso"+id).remove();
          var  x= ' <label class="labelsform" for="edicionconcurso1">Edición</label>';

          x+= '<input type="text" class="form-control form-control-sm estiloinput" name="edicionconcurso'+id+'"  id="edicionconcurso'+id+'"  value=""/>';
         $("#contediciones"+id).html(x);
   }
}
function otroevento(valor,lugar) {
   if (valor == 4) {
       $("#tipoevento"+lugar).css("display","none");
      $("#otrotipoevento"+lugar).css("display","block");

   }
}
   function eliminarasociasion(local,id) {
      if (local != 1  ) {
         if (id != 0) {
            $.ajax({ 
               type: 'ajax',
               method: 'post',
               url: '<?=base_url('configuracion/reconocimientos/eliminarasociasion')?>',
               async: true, 
               data: {id: id},
               success: function(response){ 
                  if (response == 1) {
                    $('#alert').modal('show');
                    $("#mensajealerta").html("Se eliminó correctamente la asociación");
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
         $("#asociacion"+local).remove();
      }
      if (local == 1 && id != 0 ) {

         $.ajax({ 
            type: 'ajax',
            method: 'post',
            url: '<?=base_url('configuracion/reconocimientos/eliminarasociasion')?>',
            async: true, 
            data: {id: id},
            success: function(response){ 
               if (response == 1) {
                 $('#alert').modal('show');
                 $("#mensajealerta").html("Se eliminó correctamente la asociación");
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
   }
   function eliminarconcurso(local,id) {
      if (local != 1  ) {
         if (id != 0) {
            $.ajax({ 
               type: 'ajax',
               method: 'post',
               url: '<?=base_url('configuracion/reconocimientos/eliminarconcurso')?>',
               async: true, 
               data: {id: id},
               success: function(response){ 
                  if (response == 1) {
                    $('#alert').modal('show');
                    $("#mensajealerta").html("Se Eliminó Correctamente el Concurso");
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
         $("#concurso"+local).remove();
      }
      if (local == 1 && id != 0 ) {

         $.ajax({ 
            type: 'ajax',
            method: 'post',
            url: '<?=base_url('configuracion/reconocimientos/eliminarconcurso')?>',
            async: true, 
            data: {id: id},
            success: function(response){ 
               if (response == 1) {
                 $('#alert').modal('show');
                 $("#mensajealerta").html("Se Eliminó Correctamente el Concurso");
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
   }
   function eliminarjuez(local,id) {
      if (local != 1  ) {
         if (id != 0) {
            $.ajax({ 
               type: 'ajax',
               method: 'post',
               url: '<?=base_url('configuracion/reconocimientos/eliminarjuez')?>',
               async: true, 
               data: {id: id},
               success: function(response){ 
                  if (response == 1) {
                    $('#alert').modal('show');
                    $("#mensajealerta").html("Se Eliminó Correctamente la Participación como Juez");
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
         $("#juez"+local).remove();
      }
      if (local == 1 && id != 0 ) {

         $.ajax({ 
            type: 'ajax',
            method: 'post',
            url: '<?=base_url('configuracion/reconocimientos/eliminarjuez')?>',
            async: true, 
            data: {id: id},
            success: function(response){ 
               if (response == 1) {
                 $('#alert').modal('show');
                 $("#mensajealerta").html("Se Eliminó Correctamente la Participación como Juez");
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
   }
   function eliminarfestival(local,id) {
      if (local != 1  ) {
         if (id != 0) {
            $.ajax({ 
               type: 'ajax',
               method: 'post',
               url: '<?=base_url('configuracion/reconocimientos/eliminarfestival')?>',
               async: true, 
               data: {id: id},
               success: function(response){ 
                  if (response == 1) {
                    $('#alert').modal('show');
                    $("#mensajealerta").html("Se Eliminó Correctamente el Festival Gastronómico");
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
         $("#juez"+local).remove();
      }
      if (local == 1 && id != 0 ) {

         $.ajax({ 
            type: 'ajax',
            method: 'post',
            url: '<?=base_url('configuracion/reconocimientos/eliminarfestival')?>',
            async: true, 
            data: {id: id},
            success: function(response){ 
               if (response == 1) {
                 $('#alert').modal('show');
                 $("#mensajealerta").html("Se Eliminó Correctamente el Festival Gastronómico");
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
   }

   function eliminarponencia(local,id) {
      if (local != 1  ) {
         if (id != 0) {
            $.ajax({ 
               type: 'ajax',
               method: 'post',
               url: '<?=base_url('configuracion/reconocimientos/eliminarponencia')?>',
               async: true, 
               data: {id: id},
               success: function(response){ 
                  if (response == 1) {
                    $('#alert').modal('show');
                    $("#mensajealerta").html("Se Eliminó Correctamente la Ponencia");
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
         $("#ponencias"+local).remove();
      }
      if (local == 1 && id != 0 ) {

         $.ajax({ 
            type: 'ajax',
            method: 'post',
            url: '<?=base_url('configuracion/reconocimientos/eliminarponencia')?>',
            async: true, 
            data: {id: id},
            success: function(response){ 
               if (response == 1) {
                 $('#alert').modal('show');
                 $("#mensajealerta").html("Se Eliminó Correctamente la Ponencia");
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
   }
   function eliminarreconocimiento(local,id) {
      if (local != 1  ) {
         if (id != 0) {
            $.ajax({ 
               type: 'ajax',
               method: 'post',
               url: '<?=base_url('configuracion/reconocimientos/eliminarreconocimiento')?>',
               async: true, 
               data: {id: id},
               success: function(response){ 
                  if (response == 1) {
                    $('#alert').modal('show');
                    $("#mensajealerta").html("Se Eliminó Correctamente el Reconocimiento Especial");
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
         $("#reconocimiento"+local).remove();
      }
      if (local == 1 && id != 0 ) {

         $.ajax({ 
            type: 'ajax',
            method: 'post',
            url: '<?=base_url('configuracion/reconocimientos/eliminarreconocimiento')?>',
            async: true, 
            data: {id: id},
            success: function(response){ 
               if (response == 1) {
                 $('#alert').modal('show');
                 $("#mensajealerta").html("Se Eliminó Correctamente el Reconocimiento Especial");
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
   }

   function perteneceasociasionclub(valor) {
      if (valor == 1) {
         $("#contenedorasociasiones").css("display", "block");
          $("#agregarasociasion").css("display", "block");
      }
      if (valor == 2) {
         $("#contenedorasociasiones").css("display", "none");
         $("#agregarasociasion").css("display", "none");
      }
   }
   function ganoconcursos(valor) {
      if (valor == 1) {
         $("#concursosdecocina").css("display", "block");
         $("#agregaconcurso").css("display", "block");
      }
      if (valor == 2) {
         $("#concursosdecocina").css("display", "none");
          $("#agregaconcurso").css("display", "none");
      }
   }
   function participocomojuez(valor) {
      if (valor == 1) {
         $("#contenedorjuez").css("display", "block");
         $("#agregarjuez").css("display", "block");
      }
      if (valor == 2) {
         $("#contenedorjuez").css("display", "none");
          $("#agregarjuez").css("display", "none");
      }
   }
   function fueponencia(valor) {
      if (valor == 1) {
         $("#contenedorponencias").css("display", "block");
         $("#agregarponencia").css("display", "block");
      }
      if (valor == 2) {
         $("#contenedorponencias").css("display", "none");
         $("#agregarponencia").css("display", "none");
      }
   }
   function tienereconocimiento(valor) {
      if (valor == 1) {
         $("#contenedorreconocimiento").css("display", "block");
         $("#agregarrecon").css("display", "block");
      }
      if (valor == 2) {
         $("#contenedorreconocimiento").css("display", "none");
         $("#agregarrecon").css("display", "none");
      }
   }
   function asistiofestival(valor) {
      if (valor == 1) {
         $("#contenedorfestival").css("display", "block");
         $("#agregarfestival").css("display", "block");
      }
      if (valor == 2) {
         $("#contenedorfestival").css("display", "none");
         $("#agregarfestival").css("display", "none");
      }
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

   function quitarImagen (idImagen,objetofile,input) {
     $("#"+idImagen).attr("src","<?=assetgeneral()?>/img/masgris.png ");
     var $el = $('#'+objetofile); 
     $el.wrap('<form>').closest('form').get(0).reset(); 
     $el.unwrap();
     if (input != "") {
      $("#"+input).val("X");
     }
  }

  function previewimasociasion(id) 
  {  
   var fileInput = document.getElementById('inputfileasociasionimg'+id);  
   var files = Array.from(fileInput.files);
   files = files.map(file => file.name);
   console.log(files);
   $("#nombreimagenasociasion"+id).html(files);

   nombre = $("#nombreimagenasociasion"+id).html().split('.').pop(); 
   $("#estensionasociasion"+id).val(nombre); 


   var reader = new FileReader();
   reader.onload = function()
   {
      var output = document.getElementById('imagenasociacion'+id);
      output.src = reader.result;
      $("#inputasociasionimg"+id).val(reader.result); 
   }

   reader.readAsDataURL(event.target.files[0]);
   setTimeout(function(){
     if (nombre == "pdf") {
      $("#imagenasociacion"+id).attr("src","<?=assetgeneral()?>/img/pdf.png");
      return;
   } },50) ;
}
function previewconcurso(cual,id) 
{  
   var fileInput = document.getElementById('inputfileconcurso'+cual+'a'+id);  
   var files = Array.from(fileInput.files);
   files = files.map(file => file.name);
   console.log(files);
   $("#nombreconcurso"+cual+"a"+id).html(files);

   nombre = $("#nombreconcurso"+cual+"a"+id).html().split('.').pop(); 
   $("#estensionconcurso"+cual+"a"+id).val(nombre); 

   var reader = new FileReader();
   reader.onload = function()
   {
      var output = document.getElementById('imagenconcursio'+cual+'a'+id);
      output.src = reader.result;
      $("#inputconcurso"+cual+"a"+id).val(reader.result); 
   }
   reader.readAsDataURL(event.target.files[0]); 
   setTimeout(function(){
     if (nombre == "pdf") {
      $("#imagenconcursio"+cual+"a"+id).attr("src","<?=assetgeneral()?>/img/pdf.png");
      return;
   } },50) ;

}
function previewjuez(id) 
{  
   var fileInput = document.getElementById('inputfilejuez'+id);  
   var files = Array.from(fileInput.files);
   files = files.map(file => file.name);
   console.log(files);
   $("#nombreimagenjuez"+id).html(files);

   nombre = $("#nombreimagenjuez"+id).html().split('.').pop(); 
   $("#estensionjuez"+id).val(nombre); 

   var reader = new FileReader();
   reader.onload = function()
   {
      var output = document.getElementById('imagenjuez'+id);
      output.src = reader.result;
      $("#inputjuez"+id).val(reader.result); 
   }
   reader.readAsDataURL(event.target.files[0]);
   setTimeout(function(){
     if (nombre == "pdf") {
      $("#imagenjuez"+id).attr("src","<?=assetgeneral()?>/img/pdf.png");
      return;
   } },50) ;
}
function previewponencia(cual,id) 
{  
   var fileInput = document.getElementById('inputfileponencia'+cual+'a'+id);  
   var files = Array.from(fileInput.files);
   files = files.map(file => file.name);
   console.log(files);
   $("#nombreponencia"+cual+"a"+id).html(files);

   nombre = $("#nombreponencia"+cual+"a"+id).html().split('.').pop(); 
   $("#estensionponencia"+cual+"a"+id).val(nombre); 

   var reader = new FileReader();
   reader.onload = function()
   {
      var output = document.getElementById('imagenponencia'+cual+'a'+id);
      output.src = reader.result;
      $("#inputponencia"+cual+"a"+id).val(reader.result); 
   }
   reader.readAsDataURL(event.target.files[0]); 
   setTimeout(function(){
     if (nombre == "pdf") {
      $("#imagenponencia"+cual+"a"+id).attr("src","<?=assetgeneral()?>/img/pdf.png");
      return;
   } },50) ;
}
function previewreconocimiento(cual,id) 
{  
   var fileInput = document.getElementById('inputfilreconocimiento'+cual+'a'+id);  
   var files = Array.from(fileInput.files);
   files = files.map(file => file.name);
   console.log(files);
   $("#nombrereconocimiento"+cual+"a"+id).html(files);

   nombre = $("#nombrereconocimiento"+cual+"a"+id).html().split('.').pop(); 
   $("#estensionreconocimiento"+cual+"a"+id).val(nombre); 

   var reader = new FileReader();
   reader.onload = function()
   {
      var output = document.getElementById('imagenreconocimiento'+cual+'a'+id);
      output.src = reader.result;
      $("#inputreconocimiento"+cual+"a"+id).val(reader.result); 
   }
   reader.readAsDataURL(event.target.files[0]); 
   setTimeout(function(){
     if (nombre == "pdf") {
      $("#imagenreconocimiento"+cual+"a"+id).attr("src","<?=assetgeneral()?>/img/pdf.png");
      return;
   } },50) ;
}
function previewfestival(cual,id) 
{  
   var fileInput = document.getElementById('inputfilefestival'+cual+'a'+id);  
   var files = Array.from(fileInput.files);
   files = files.map(file => file.name);
   console.log(files);
   $("#nombrefestival"+cual+"a"+id).html(files);

   nombre = $("#nombrefestival"+cual+"a"+id).html().split('.').pop(); 
   $("#estensionfestival"+cual+"a"+id).val(nombre); 

   var reader = new FileReader();
   reader.onload = function()
   {
      var output = document.getElementById('imagenfestival'+cual+'a'+id);
      output.src = reader.result;
      $("#inputfestival"+cual+"a"+id).val(reader.result); 
   }
   reader.readAsDataURL(event.target.files[0]); 
   setTimeout(function(){
     if (nombre == "pdf") {
      $("#imagenfestival"+cual+"a"+id).attr("src","<?=assetgeneral()?>/img/pdf.png");
      return;
   } },50) ;
}



function agregarasociasion() {

   if ($("#asociacionclubselect").val() == 1) { 
      var zona = document.getElementById("contenedorasociasiones");
   var div = $('div[id^="asociacion"]:last');

   var num  = parseInt( div.prop("id").match(/(\d+)/g), 10 ) +1;  
   var clondiv  = div.clone().prop('id', 'asociacion'+num );

   var x =                     '<div class="col">';
   x+=                        '<div class="row">';
   x+=                           '<div class="col-2 mostrarpanelrecon">';
   x+=                              '<div class="row">';
   x+=                                 '<div class="col ">';
   x+='                                          <div class="contAjustar tamañosReconocimientosImgs">';
   x+='                                 <div class="boxi">';
   x+=                                    '<img id="imagenasociacion'+num+'" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"></div></div>';
   x+=                                 '</div>';
   x+=                              '</div>';
   x+=                              '<div class="row panelimagenrecon">';
   x+=                                 '<div class="col-1"' + ' onclick="mostrarImagen(' + "''," + "'imagenasociacion"+num+"'," + "'inputfileasociasionimg"+num+"'" + ",'nombreimagenasociasion"+ num + "'" + ');"' + '>';
   x+=                                    '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg"  > ';
   x+=                                 '</div>';
   x+=                                 '<div class="col">';
   x+=                                 '</div>';
   x+=                                 '<div class="col-1">';

   x+=                                 '</div>';
   x+=                                 '<div class="col-1">';
   x+=                                    '<label class="labelsform" for="inputfileasociasionimg'+num+'"  >';
   x+=                                       '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >';
   x+=                                    '</label>';
   x+=                                 '</div>';
   x+=                                 '<div class="col-1">';
   x+=                                    '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >';
   x+=                                 '</div>';
   x+=                              '</div>';
   x+=           ' <div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">';
   x+=                                ' <div class="col" style=" word-wrap: break-word;" >';
   x+=                                   ' <span id="nombreimagenasociasion'+num+'"></span>';
   x+=                                ' </div>';
   x+=                             ' </div>';
   x+='<input type="file" id="inputfileasociasionimg'+num+'" accept=".jpg,.pdf,.png,.jpeg" hidden=""  name="archivo'+num+'" onchange="previewimasociasion('+num+');"  />';
   x+=                              '<input type="text" name="inputasociasionimg'+num+'"  id="inputasociasionimg'+num+'" hidden="" value=""/>';
   x+=                              '<input type="text" name="estensionasociasion'+num+'"  id="estensionasociasion'+num+'" hidden="" value=""/>';
   x+=                           '</div>';
   x+=                           '<div class="col"> ';
   x+=                              '<label class="labelsform"  for="nombreasociasion'+num+'">Nombre de la Asociación</label>';
   x+=                              '<input type="text" class="form-control form-control-sm estiloinput estiloinput" name="nombreasociasion'+num+'" id="nombreasociasion'+num+'" > ';
   x+=                           '</div>';
   x+=                           '<div class="col-2"> ';
   x+=                              '<label class="labelsform"  for="anoingresoasociasion'+num+'">Año de Ingreso</label>';
   x+=                              '<input type="text" class="form-control form-control-sm estiloinput estiloinput anio" name="anoingresoasociasion'+num+'" id="anoingresoasociasion'+num+'" > ';
   x+=                           '</div>';
   x+=                           '<div class="col-2"> ';
   x+=                              '<label class="labelsform"  for="estatusasociasion'+num+'">Estatus</label>';
   x+=                              '<select class="form-control form-control-sm estiloinput estiloinput" name="estatusasociasion'+num+'" id="estatusasociasion'+num+'">';
   x+=                                 '<option value="2">Inactivo</option>';
   x+=                                 '<option value="1">Activo</option> ';
   x+=                              '</select>   ';
   x+=                              '<input type="text" name="idasociacion'+num+'"  id="idasociacion'+num+'" hidden="" value="0"/> ';
   x+=                           '</div> ';

   x+=                        '</div>';
   x+=                        '<div class="row" >';
   x+=                           '<div class="col-4"  >  ';
   x+=                              '<span class="linkAccione" onclick="eliminarasociasion('+num+',0)"  >ELIMINAR</span> ';
   x+=                           '</div>';
   x+=                        '</div>';
   x+=                     '</div>';
      //aqui es donde le dices donde vas a poner el clon
      clondiv.appendTo(zona) ;
      //lo vacias el div con los elementos dentro
      $( "#asociacion"+num).empty();
      //insertas el string en el html
      $( "#asociacion"+num).html(x);
      $("#contadorasociaciones").val(num);
   }
   
   }

   function agregarconcurso() {

      if ( $("#ganarconcursosselect").val() == 1) { 
      var zona = document.getElementById("concursosdecocina");
      var div = $('div[id^="concurso"]:last');

      var num  = parseInt( div.prop("id").match(/(\d+)/g), 10 ) +1;  
      var clondiv  = div.clone().prop('id', 'concurso'+num );

      var x =                  '<div class="col" >';
      x+=                  '<div class="row">';
      x+=                     '<div class="col-4"> ';
      x+=                        '<label class="labelsform"  for="nombreconscurso'+num+'">Nombre del Concurso</label>';
      x+=         ' <input type="text" class="form-control form-control-sm estiloinput estiloinput" name="idconcurso'+num+'" id="idconcurso'+num+'" value="0" hidden=""> '
      x+=                        '<input type="text" class="form-control form-control-sm estiloinput estiloinput" name="nombreconscurso'+num+'" id="nombreconscurso'+num+'" > ';
      x+=                     '</div>';
      x+=                     '<div class="col-4"> ';
      x+=                        '<label class="labelsform"  for="nombrepatrocinador'+num+'">Patrocinador</label>';
      x+=                        '<input type="text" class="form-control form-control-sm estiloinput estiloinput" name="nombrepatrocinador'+num+'" id="nombrepatrocinador'+num+'" > ';
      x+=                     '</div>';
      x+=                     '<div class="col-4"> ';
      x+=                        '<label class="labelsform"  for="pocisionobtenida'+num+'">Posición Obtenida</label>';
      x+=                        '<select class="form-control form-control-sm estiloinput estiloinput"  name="pocisionobtenida'+num+'" id="pocisionobtenida'+num+'">';
      x+=                           '<option value="1">Primer Lugar</option>';
      x+=                           '<option value="2">Segundo Lugar</option>';
      x+=                           '<option value="3">Tercer Lugar</option> ';
      x+=                        '</select> ';
      x+=                     '</div>';
      x+=                  '</div> ';
      x+=                  '<div class="row">';
      x+=                     '<div class="col-2"> ';
      x+=                        '<label class="labelsform"  for="paisconcurso'+num+'">País</label> ';
      x+=                        '<input type="text" class="form-control form-control-sm estiloinput estiloinput" name="paisconcurso'+num+'" id="paisconcurso'+num+'" > ';
      x+=                     '</div>';
      x+=                     '<div class="col-2"> ';
      x+=                        '<label class="labelsform"  for="estadoconcurso'+num+'">Estado</label> ';
      x+=                        '<input type="text" class="form-control form-control-sm estiloinput estiloinput" name="estadoconcurso'+num+'" id="estadoconcurso'+num+'" > ';
      x+=                     '</div>';
      x+=                     '<div class="col-2"> ';
      x+=                        '<label class="labelsform"  for="ciudadconcurso'+num+'">Ciudad</label> ';
      x+=                        '<input type="text" class="form-control form-control-sm estiloinput estiloinput" name="ciudadconcurso'+num+'" id="ciudadconcurso'+num+'" > ';
      x+=                     '</div>';
      x+=                     '<div class="col-2"> ';
      x+=                        '<label class="labelsform"  for="fechaconcurso'+num+'">Fecha</label>';
      x+=                        '<input type="text" class="form-control form-control-sm estiloinput estiloinput datetimepicker" name="fechaconcurso'+num+'" id="fechaconcurso'+num+'" > ';
      x+=                     '</div> ';
      x+=                     '<div class="col-4"> ';
      x+=                        '<label class="labelsform"  for="premio'+num+'">¿Cuál Fue el Premio?</label>';
      x+=                        '<input type="text" class="form-control form-control-sm estiloinput estiloinput" name="premio'+num+'" id="premio'+num+'" > ';
      x+=                     '</div>';
      x+=                  '</div> ';
      x+=                  '<div class="row mt-3">';
      x+=                     '<div class="col-3 mr-4">';
      x+=                        '<span >Certificado del Concurso</span>';
      x+=                     '</div>';

      x+=                     '<div class="col-">';
      x+=                        '<span >Imágenes del Concurso</span>';
      x+=                     '</div> ';
      x+=                  '</div>';
      x+=                  '<div class="row mt-3">';
      x+=                     '<div class="col-3 mr-4 mostrarpanelrecon">';
      x+=                        '<div class="row">';
      x+=                           '<div class="col "   >';
      x+='                                 <div class="contAjustar tamañosReconocimientosImgsXL">';
      x+='                              <div class="boxi">';
      x+=                              '<img id="imagenconcursio1a'+num+'" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"></div></div> ';
      x+=                           '</div>';
      x+=                        '</div>';
      x+=                        '<div class="row panelimagenrecon">';
      x+=                           '<div class="col-1"'+ ' onclick="mostrarImagen(' + "''," + "'imagenconcursio1a"+num+"'," + "'inputfileconcurso1a"+num+"'" + ",'nombreconcurso1a"+ num + "'"  +');"' +'>';
      x+=                              '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > ';
      x+=                           '</div>';
      x+=                           '<div class="col">';
      x+=                           '</div>';
      x+=                           '<div class="col-1">';

      x+=                           '</div>';
      x+=                           '<div class="col-1">';
      x+=                              '<label class="labelsform"  for="inputfileconcurso1a'+num+'"  >';
      x+=                                 '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >';
      x+=                              '</label>';
      x+=                           '</div>';
      x+=                           '<div class="col-1">';
      x+=                              '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >';
      x+=                           '</div>';
      x+=                        '</div>';
      x+=                        '<div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">';
      x+=                           '<div class="col" style=" word-wrap: break-word;" >';
      x+=                              '<span id="nombreconcurso1a'+num+'"></span>';
      x+=                           '</div>';
      x+=                        '</div> ';
      x+=                        '<input type="file" id="inputfileconcurso1a'+num+'" accept=".jpg,.pdf,.png,.jpeg" hidden=""  name="archivo1" onchange="previewconcurso(1,'+num+');"  />';
      x+=                        '<input type="text" name="inputconcurso1a'+num+'"  id="inputconcurso1a'+num+'" hidden="" value=""/>';
      x+=                        '<input type="text" name="estensionconcurso1a'+num+'"  id="estensionconcurso1a'+num+'" hidden="" value=""/>';
      x+=                     '</div>';

      x+=                     '<div class="col-2 mr-4 mostrarpanelrecon">';
      x+=                        '<div class="row">';
      x+=                           '<div class="col "   >';
      x+='                                 <div class="contAjustar tamañosReconocimientosImgs">';
      x+='                              <div class="boxi">';
      x+=                              '<img id="imagenconcursio2a'+num+'" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> </div></div> ';
      x+=                           '</div>';
      x+=                        '</div>';
      x+=                        '<div class="row panelimagenrecon">';
      x+=                           '<div class="col-1"'+ ' onclick="mostrarImagen(' + "''," + "'imagenconcursio2a"+num+"'," + "'inputfileconcurso2a"+num+"'" +  ",'nombreconcurso2a"+ num + "'"  +');"' +'>';
      x+=                              '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > ';
      x+=                           '</div>';
      x+=                           '<div class="col">';
      x+=                           '</div>';
      x+=                           '<div class="col-1">';

      x+=                           '</div>';
      x+=                           '<div class="col-1">';
      x+=                              '<label class="labelsform"  for="inputfileconcurso2a'+num+'"  >';
      x+=                                 '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >';
      x+=                              '</label>';
      x+=                           '</div>';
      x+=                           '<div class="col-1">';
      x+=                              '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >';
      x+=                           '</div>';
      x+=                        '</div>';
      x+=                        '<div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">';
      x+=                           '<div class="col" style=" word-wrap: break-word;" >';
      x+=                              '<span id="nombreconcurso2a'+num+'"></span>';
      x+=                           '</div>';
      x+=                        '</div> ';
      x+=                        '<input type="file" accept="image/*" id="inputfileconcurso2a'+num+'" hidden=""  name="archivo1" onchange="previewconcurso(2,'+num+');"  />';
      x+=                        '<input type="text" name="inputconcurso2a'+num+'"  id="inputconcurso2a'+num+'" hidden="" value=""/>';
      x+=                        '<input type="text" name="estensionconcurso2a'+num+'"  id="estensionconcurso2a'+num+'" hidden="" value=""/>';
      x+=                     '</div>';

      x+=                     '<div class="col-2 mr-4 mostrarpanelrecon">';
      x+=                        '<div class="row">';
      x+=                           '<div class="col "   >';
      x+='                                 <div class="contAjustar tamañosReconocimientosImgs">';
      x+='                              <div class="boxi">';
      x+=                              '<img id="imagenconcursio3a'+num+'" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> </div></div> ';
      x+=                           '</div>';
      x+=                        '</div>';
      x+=                        '<div class="row panelimagenrecon">';
      x+=                           '<div class="col-1"'+ ' onclick="mostrarImagen(' + "''," + "'imagenconcursio3a"+num+"'," + "'inputfileconcurso3a"+num+"'" +  ",'nombreconcurso3a"+ num + "'"  +');"' +'>';
      x+=                              '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > ';
      x+=                           '</div>';
      x+=                           '<div class="col">';
      x+=                           '</div>';
      x+=                           '<div class="col-1">';

      x+=                           '</div>';
      x+=                           '<div class="col-1">';
      x+=                              '<label class="labelsform"  for="inputfileconcurso3a'+num+'"  >';
      x+=                                 '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >';
      x+=                              '</label>';
      x+=                           '</div>';
      x+=                           '<div class="col-1">';
      x+=                              '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >';
      x+=                           '</div>';
      x+=                        '</div>';
      x+=                        '<div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">';
      x+=                           '<div class="col" style=" word-wrap: break-word;" >';
      x+=                              '<span id="nombreconcurso3a'+num+'"></span>';
      x+=                           '</div>';
      x+=                        '</div> ';
      x+=                        '<input type="file" accept="image/*" id="inputfileconcurso3a'+num+'" hidden=""  name="archivo1" onchange="previewconcurso(3,'+num+');"  />';
      x+=                        '<input type="text" name="inputconcurso3a'+num+'"  id="inputconcurso3a'+num+'" hidden="" value=""/>';
      x+=                        '<input type="text" name="estensionconcurso3a'+num+'"  id="estensionconcurso3a'+num+'" hidden="" value=""/>';
      x+=                     '</div>';

      x+=                     '<div class="col-2 mostrarpanelrecon">';
      x+=                        '<div class="row">';
      x+=                           '<div class="col  "   >';
      x+='                                 <div class="contAjustar tamañosReconocimientosImgs">';
      x+='                              <div class="boxi">';
      x+=                              '<img id="imagenconcursio4a'+num+'" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> </div></div> ';
      x+=                           '</div>';
      x+=                        '</div>';
      x+=                        '<div class="row panelimagenrecon">';
      x+=                           '<div class="col-1"'+ ' onclick="mostrarImagen(' + "''," + "'imagenconcursio4a"+num+"'," + "'inputfileconcurso4a"+num+"'" +  ",'nombreconcurso4a"+ num + "'"  +');"' +'>';
      x+=                              '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > ';
      x+=                           '</div>';
      x+=                           '<div class="col">';
      x+=                           '</div>';
      x+=                           '<div class="col-1">';

      x+=                           '</div>';
      x+=                           '<div class="col-1">';
      x+=                              '<label class="labelsform"  for="inputfileconcurso4a'+num+'"  >';
      x+=                                 '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >';
      x+=                              '</label>';
      x+=                           '</div>';
      x+=                           '<div class="col-1">';
      x+=                              '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >';
      x+=                           '</div>';
      x+=                        '</div>';
      x+=                        '<div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">';
      x+=                           '<div class="col" style=" word-wrap: break-word;" >';
      x+=                              '<span id="nombreconcurso4a'+num+'"></span>';
      x+=                           '</div>';
      x+=                        '</div> ';
      x+=                        '<input type="file" accept="image/*" id="inputfileconcurso4a'+num+'" hidden=""  name="archivo1" onchange="previewconcurso(4,'+num+');"  />';
      x+=                        '<input type="text" name="inputconcurso4a'+num+'"  id="inputconcurso4a'+num+'" hidden="" value=""/>';
      x+=                        '<input type="text" name="estensionconcurso4a'+num+'"  id="estensionconcurso4a'+num+'" hidden="" value=""/>';
      x+=                     '</div>';
      x+=                  '</div>';
      x+=                  '<div class="row" >';
      x+=                     '<div class="col-4"  >  ';
      x+=                        '<span class="linkAccione" onclick="eliminarconcurso('+num+',0)"  >ELIMINAR</span> ';
      x+=                     '</div>';
      x+=                  '</div>';
      x+=               '</div> ';
      //aqui es donde le dices donde vas a poner el clon
      clondiv.appendTo(zona) ;
      //lo vacias el div con los elementos dentro
      $( "#concurso"+num).empty();
      //insertas el string en el html
      $( "#concurso"+num).html(x);
      $("#contadorconcursos").val(num);
   }
   }
   function agregarjuez() {

      if ($("#participarjuezselect").val() == 1) {
         var zona = document.getElementById("contenedorjuez");
      var div = $('div[id^="juez"]:last');

      var num  = parseInt( div.prop("id").match(/(\d+)/g), 10 ) +1;  
      var clondiv  = div.clone().prop('id', 'juez'+num );


      var x =           '<div class="row" >';
      x+=                         '<div class="col-2 mostrarpanelrecon">';
      x+=                            '<div class="row">';
      x+=                               '<div class="col "   >';
      x+='                                       <div class="contAjustar tamañosReconocimientosImgs">';
      x+='                              <div class="boxi">';
      x+= '                                 <img id="imagenjuez'+num+'" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> </div></div> ';
      x+=                               '</div>';
      x+=                            '</div>';
      x+=                            '<div class="row panelimagenrecon">';
      x+=                               '<div class="col-1" onclick="mostrarImagen(' + "''," + "'imagenjuez"+num+"'," + "'inputfilejuez"+num+"'" +  ",'nombreimagenjuez"+ num + "'"  +');"' +'>';
      x+= '                                 <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > ';
      x+=                               '</div>';
      x+=                               '<div class="col">';
      x+=                               '</div>';
      x+=                               '<div class="col-1">';

      x+=                               '</div>';
      x+=                               '<div class="col-1">';
      x+=                                  '<label class="labelsform"  for="inputfilejuez'+num+'"  >';
      x+= '                                    <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >';
      x+=                                  '</label>';
      x+=                               '</div>';
      x+=                               '<div class="col-1">';
      x+= '                                 <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >';
      x+=                               '</div>';
      x+=                            '</div>';
      x+=                            '<div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">';
      x+=                               '<div class="col" style=" word-wrap: break-word;" >';
      x+= '                                 <span id="nombreimagenjuez'+num+'"></span>';
      x+=                               '</div>';
      x+=                            '</div>';
      x+=                            '<input type="file" id="inputfilejuez'+num+'" accept=".jpg,.pdf,.png,.jpeg" accept=".jpg,.pdf,.png,.jpeg" hidden=""  name="archivo'+num+'" onchange="previewjuez('+num+');"  />';
      x+=                            '<input type="text" name="inputjuez'+num+'"  id="inputjuez'+num+'" hidden="" value=""/>';
      x+=                            '<input type="text" name="estensionjuez'+num+'"  id="estensionjuez'+num+'" hidden="" value=""/>';
      x+=                         '</div>';
      x+=                         '<div class="col">';
      x+=                            '<div class="row">';
      x+=                               '<div class="col"> ';
      x+= '                                 <label class="labelsform" for="nombreconcursojuez'+num+'">Nombre del Concurso</label>';
      x+= '<input type="text" class="form-control form-control-sm estiloinput" name="idjuez'+num+'" id="idjuez'+num+'" value="0" hidden="">';
      x+=                                  '<input type="text" class="form-control form-control-sm estiloinput" name="nombreconcursojuez'+num+'" id="nombreconcursojuez'+num+'" > ';
      x+=                               '</div>';
      x+=                               '<div class="col-3" id="contediciones'+num+'">  ';
      x+= '                                 <label class="labelsform" for="edicionconcurso'+num+'">Edición</label>';
      x+=                                  '<select class="form-control form-control-sm estiloinput" name="edicionconcurso'+num+'" id="edicionconcurso'+num+'" onchange="masediciones('+num+',$(this).val())">';
      x+=                               '<option value="1">1ra. Edición</option>';
      x+=                               '<option value="2">2da. Edición</option>';
      x+=                               '<option value="3">3ra. Edición</option>';
      x+=                               '<option value="4">4ta. Edición</option>';
      x+=                               '<option value="5">5ta. Edición</option>';
      x+=                               '<option value="6">6ta. Edición</option>';
      x+=                               '<option value="7">7ma. Edición</option>';
      x+=                               '<option value="8">Otra Especifique</option>'; 
      x+=                                  '</select> ';
      x+=                               '</div>';
      x+=                               '<div class="col-3"> ';
      x+= '                                 <label class="labelsform" for="anoingreso'+num+'">Año</label>';
      x+=                                  '<input type="text" class="form-control form-control-sm estiloinput anio" name="anoingreso'+num+'" id="anoingreso'+num+'" >';
      x+=                               '</div>';
      x+=                            '</div>';
      x+=                            '<div class="row">';

      x+=                               '<div class="col"> ';
      x+= '                                 <label class="labelsform" for="pais'+num+'">País</label>';
      x+=                                  '<input type="text" class="form-control form-control-sm estiloinput" name="pais'+num+'" id="pais'+num+'" >';
      x+=                               '</div>';
      x+=                               '<div class="col"> ';
      x+= '                                 <label class="labelsform" for="estado'+num+'">Estado</label>';
      x+=                                  '<input type="text" class="form-control form-control-sm estiloinput" name="estado'+num+'" id="estado'+num+'" >';
      x+=                               '</div>';
      x+=                               '<div class="col"> ';
      x+= '                                 <label class="labelsform" for="ciudad'+num+'">Ciudad</label>';
      x+=                                  '<input type="text" class="form-control form-control-sm estiloinput" name="ciudad'+num+'" id="ciudad'+num+'" >';
      x+=                               '</div> ';
      x+=                            '</div>';
      x+=                         '</div>';

      x+=                      '</div>';
      x+=                      '<div class="row" >';
      x+=                         '<div class="col-4"  >';
      x+= '                           <span class="linkAccione" onclick="eliminarjuez('+num+',0)"  >ELIMINAR</span>';
      x+=                         '</div>';
      x+=                      '</div>';

      //aqui es donde le dices donde vas a poner el clon
      clondiv.appendTo(zona) ;
      //lo vacias el div con los elementos dentro
      $( "#juez"+num).empty();
      //insertas el string en el html
      $( "#juez"+num).html(x);
      $("#contadorjuez").val(num);
      }
   }
   function agregarfestival() {

     if ($("#asistiofestivalselect").val() == 1) {
       var zona = document.getElementById("contenedorfestival");
      var div = $('div[id^="festival"]:last');

      var num  = parseInt( div.prop("id").match(/(\d+)/g), 10 ) +1;  
      var clondiv  = div.clone().prop('id', 'festival'+num );



      var x =                  '<div class="col">';
      x+=                     '<div class="row">';
      x+=                        '<div class="col-2"> ';
      x+=                           '<label class="labelsform" for="tipoevento'+num+'">Tipo de Evento</label>';
      x+='<input type="text" class="form-control form-control-sm estiloinput" hidden="" name="idfestival'+num+'" id="idfestival'+num+'" value="0">';
      x+=                           '<select class="form-control form-control-sm estiloinput" name="tipoevento'+num+'" id="tipoevento'+num+'" onchange="otroevento($(this).val(),'+num+')">';
      x+=                              '<option value="1">Muestra</option>';
      x+=                              '<option value="2">Festival</option>';
      x+=                              '<option value="3">Feria</option>';
      x+=                              '<option value="4">Otro</option>';
      x+=                           '</select> ';
      x+= ' <input type="text" class="form-control form-control-sm estiloinput"  name="otrotipoevento'+num+'" id="otrotipoevento'+num+'" value="" style="display: none;"> ';
      x+=                        '</div>';
      x+=                        '<div class="col-4"> ';
      x+=                           '<label class="labelsform" for="tema'+num+'">Tema</label>';
      x+=                           '<input type="text" class="form-control form-control-sm estiloinput" name="tema'+num+'" id="tema'+num+'" > ';
      x+=                        '</div>';
      x+=                        '<div class="col-4"> ';
      x+=                           '<label class="labelsform" for="locacion'+num+'">Lugar del Evento</label>';
      x+=                           '<input type="text" class="form-control form-control-sm estiloinput" name="locacion'+num+'" id="locacion'+num+'" > ';
      x+=                        '</div>';
      x+=                        '<div class="col-2"> ';
      x+=                           '<label class="labelsform" for="fecha'+num+'">Fecha</label>';
      x+=                           '<input type="text" class="form-control form-control-sm estiloinput datetimepicker" name="fecha'+num+'" id="fecha'+num+'" >';
      x+=                        '</div>';
      x+=                     '</div>';
      x+=                     '<div class="row">';
      x+=                        '<div class="col"> ';
      x+=                           '<label class="labelsform" for="duracion'+num+'">Duración</label>';
      x+=                           '<input type="text" class="form-control form-control-sm estiloinput" name="duracion'+num+'" id="duracion'+num+'" >';
      x+=                        '</div>';
      x+=                        '<div class="col"> ';
      x+=                           '<label class="labelsform" for="pais'+num+'">País</label>';
      x+=                           '<input type="text" class="form-control form-control-sm estiloinput" name="pais'+num+'" id="pais'+num+'" >';
      x+=                        '</div>';
      x+=                        '<div class="col"> ';
      x+=                           '<label class="labelsform" for="estado'+num+'">Estado</label>';
      x+=                           '<input type="text" class="form-control form-control-sm estiloinput" name="estado'+num+'" id="estado'+num+'" >';
      x+=                        '</div>';
      x+=                        '<div class="col"> ';
      x+=                           '<label class="labelsform" for="ciudad'+num+'">Ciudad</label>';
      x+=                           '<input type="text" class="form-control form-control-sm estiloinput" name="ciudad'+num+'" id="ciudad'+num+'" >';
      x+=                        '</div> ';
      x+=                     '</div>';
      x+=                     '<div class="row mt-3">';
      x+=                        '<div class="col-2 mostrarpanelrecon">';
      x+=                           '<div class="row">';
      x+=                              '<div class="col "   >';
      x+='                                    <div class="contAjustar tamañosReconocimientosImgs">';
      x+='                        <div class="boxi">';
      x+=                                 '<img id="imagenfestival1a'+num+'" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> </div> </div> ';
      x+=                              '</div>';
      x+=                           '</div>';
      x+=                           '<div class="row panelimagenrecon">';
      x+=                              '<div class="col-1"  onclick="mostrarImagen(' + "''," + "'imagenfestival1a"+num+"'," + "'inputfilefestival1a"+num+"'" +  ",'nombrefestival1a"+ num + "'"  +');"' +'>';
      x+=                                 '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > ';
      x+=                              '</div>';
      x+=                              '<div class="col">';
      x+=                              '</div>';
      x+=                              '<div class="col-1">';
      x+=                                 '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/DESCARGAR.svg" >';
      x+=                              '</div>';
      x+=                              '<div class="col-1">';
      x+=                                 '<label class="labelsform"  for="inputfilefestival1a'+num+'"  >';
      x+=                                    '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >';
      x+=                                 '</label>';
      x+=                              '</div>';
      x+=                              '<div class="col-1">';
      x+=                                 '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >';
      x+=                              '</div>';
      x+=                           '</div>';
      x+=                           '<div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">';
      x+=                              '<div class="col" style=" word-wrap: break-word;" >';
      x+=                                 '<span id="nombrefestival1a'+num+'"></span>';
      x+=                              '</div>';
      x+=                           '</div>';
      x+=                           '<input type="file" accept="image/*" id="inputfilefestival1a'+num+'" hidden=""  name="archivo1" onchange="previewfestival(1,'+num+');"  />';
      x+=                           '<input type="text" name="inputfestival1a'+num+'"  id="inputfestival1a'+num+'" hidden="" value=""/>';
      x+=                           '<input type="text" name="estensionfestival1a'+num+'"  id="estensionfestival1a'+num+'" hidden="" value=""/>';
      x+=                        '</div>';
      x+=                        '<div class="col-1">';

      x+=                        '</div>';
      x+=                        '<div class="col-2 mostrarpanelrecon">';
      x+=                           '<div class="row">';
      x+=                              '<div class="col "   >';
      x+='                                    <div class="contAjustar tamañosReconocimientosImgs">';
      x+='                        <div class="boxi">';
      x+=                                 '<img id="imagenfestival2a'+num+'" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> </div></div> ';
      x+=                              '</div>';
      x+=                           '</div>';
      x+=                           '<div class="row panelimagenrecon">';
      x+=                              '<div class="col-1" onclick="mostrarImagen(' + "''," + "'imagenfestival2a"+num+"'," + "'inputfilefestival2a"+num+"'" +  ",'nombrefestival2a"+ num + "'"  +');"' +'>';
      x+=                                 '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > ';
      x+=                              '</div>';
      x+=                              '<div class="col">';
      x+=                              '</div>';
      x+=                              '<div class="col-1">';
      x+=                                 '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/DESCARGAR.svg" >';
      x+=                              '</div>';
      x+=                              '<div class="col-1">';
      x+=                                 '<label class="labelsform"  for="inputfilefestival2a'+num+'"  >';
      x+=                                    '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >';
      x+=                                 '</label>';
      x+=                              '</div>';
      x+=                              '<div class="col-1">';
      x+=                                 '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >';
      x+=                              '</div>';
      x+=                           '</div>';
      x+=                           '<div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">';
      x+=                              '<div class="col" style=" word-wrap: break-word;" >';
      x+=                                 '<span id="nombrefestival2a'+num+'"></span>';
      x+=                              '</div>';
      x+=                           '</div>';
      x+=                           '<input type="file" accept="image/*" id="inputfilefestival2a'+num+'" hidden=""  name="archivo1" onchange="previewfestival(2,'+num+');"  />';
      x+=                           '<input type="text" name="inputfestival2a'+num+'"  id="inputfestival2a'+num+'" hidden="" value=""/>';
      x+=                           '<input type="text" name="estensionfestival2a'+num+'"  id="estensionfestival2a'+num+'" hidden="" value=""/>';
      x+=                        '</div>';
      x+=                        '<div class="col-1">';

      x+=                        '</div>';
      x+=                        '<div class="col-2 mostrarpanelrecon">';
      x+=                           '<div class="row">';
      x+=                              '<div class="col "   >';
      x+='                                    <div class="contAjustar tamañosReconocimientosImgs">';
      x+='                        <div class="boxi">';
      x+=                                 '<img id="imagenfestival3a'+num+'" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> </div> </div> ';
      x+=                              '</div>';
      x+=                           '</div>';
      x+=                           '<div class="row panelimagenrecon">';
      x+=                              '<div class="col-1" onclick="mostrarImagen(' + "''," + "'imagenfestival3a"+num+"'," + "'inputfilefestival3a"+num+"'" +  ",'nombrefestival3a"+ num + "'"  +');"' +'>';
      x+=                                 '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > ';
      x+=                              '</div>';
      x+=                              '<div class="col">';
      x+=                              '</div>';
      x+=                              '<div class="col-1">';
      x+=                                 '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/DESCARGAR.svg" >';
      x+=                              '</div>';
      x+=                              '<div class="col-1">';
      x+=                                 '<label class="labelsform"  for="inputfilefestival3a'+num+'"  >';
      x+=                                    '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >';
      x+=                                 '</label>';
      x+=                              '</div>';
      x+=                              '<div class="col-1">';
      x+=                                 '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >';
      x+=                              '</div>';
      x+=                           '</div>';
      x+=                           '<div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">';
      x+=                              '<div class="col" style=" word-wrap: break-word;" >';
      x+=                                 '<span id="nombrefestival3a'+num+'"></span>';
      x+=                              '</div>';
      x+=                           '</div>';
      x+=                           '<input type="file" accept="image/*" id="inputfilefestival3a'+num+'" hidden=""  name="archivo1" onchange="previewfestival(3,'+num+');"  />';
      x+=                           '<input type="text" name="inputfestival3a'+num+'"  id="inputfestival3a'+num+'" hidden="" value=""/>';
      x+=                           '<input type="text" name="estensionfestival3a'+num+'"  id="estensionfestival3a'+num+'" hidden="" value=""/>';
      x+=                        '</div>';
      x+=                     '</div>';
      x+=               '<div class="row" > ';
      x+=                              '<div class="col-4"  >';
      x+=                                 '<span class="linkAccione" onclick="eliminarfestival('+num+',0)"  >ELIMINAR</span>';
      x+=                              '</div>';
      x+=                           '</div>';
      x+=                  '</div>'; 
    //aqui es donde le dices donde vas a poner el clon
    clondiv.appendTo(zona) ;
      //lo vacias el div con los elementos dentro
      $( "#festival"+num).empty();
      //insertas el string en el html
      $( "#festival"+num).html(x);

      $("#contadorfestival").val(num);
     }

   }
   function agregarponencia() {

      if ($("#selectecponencia").val() == 1) {
         var zona = document.getElementById("contenedorponencias");
      var div = $('div[id^="ponencias"]:last');

      var num  = parseInt( div.prop("id").match(/(\d+)/g), 10 ) +1;  
      var clondiv  = div.clone().prop('id', 'ponencias'+num );



      var  x =                 '<div class="col"> ';
      x+=                     '<div class="row">';
      x+=                        '<div class="col-2"> ';
      x+= '<input type="text" class="form-control form-control-sm estiloinput" name="idponencia'+num+'" id="idponencia'+num+'" value="0" hidden="">'
      x+=                           '<label class="labelsform" for="tipoevento'+num+'">Tipo de Evento</label>';
      x+=                           '<select class="form-control form-control-sm estiloinput" name="tipoevento'+num+'" id="tipoevento'+num+'">';
      x+=                              '<option value="1">Conferencias</option>';
      x+=                              '<option value="2">Talleres</option>';
      x+=                              '<option value="3">Foros</option>';
      x+=                              '<option value="4">Congresos</option>';
      x+=                           '</select> ';
      x+=                        '</div>';
      x+=                        '<div class="col"> ';
      x+=                           '<label class="labelsform" for="nombreevento'+num+'">Nombre del Evento</label>';
      x+=                           '<input type="text" class="form-control form-control-sm estiloinput" name="nombreevento'+num+'" id="nombreevento'+num+'" > ';
      x+=                        '</div>';
      x+=                        '<div class="col"> ';
      x+=                           '<label class="labelsform" for="nombreponencia'+num+'">Nombre de la ponencia</label>';
      x+=                           '<input type="text" class="form-control form-control-sm estiloinput" name="nombreponencia'+num+'" id="nombreponencia'+num+'" > ';
      x+=                        '</div> ';
      x+=                        '<div class="col"> ';
      x+=                           '<label class="labelsform" for="locacion'+num+'">Lugar del Evento</label>';
      x+=                           '<input type="text" class="form-control form-control-sm estiloinput" name="locacion'+num+'" id="locacionponencia'+num+'" > ';
      x+=                        '</div>';
      x+=                     '</div>';
      x+=                     '<div class="row">';
      x+=                        '<div class="col"> ';
      x+=                           '<label class="labelsform" for="fecha'+num+'">Fecha</label>';
      x+=                           '<input type="text" class="form-control form-control-sm estiloinput datetimepicker" name="fecha'+num+'" id="fechaponencia'+num+'" >';
      x+=                        '</div>';
      x+=                        '<div class="col"> ';
      x+=                           '<label class="labelsform" for="pais'+num+'">País</label>';
      x+=                           '<input type="text" class="form-control form-control-sm estiloinput" name="pais'+num+'" id="pais'+num+'" >';
      x+=                        '</div>';
      x+=                        '<div class="col"> ';
      x+=                           '<label class="labelsform" for="estado'+num+'">Estado</label>';
      x+=                           '<input type="text" class="form-control form-control-sm estiloinput" name="estado'+num+'" id="estado'+num+'" >';
      x+=                        '</div>';
      x+=                        '<div class="col"> ';
      x+=                           '<label class="labelsform" for="ciudad'+num+'">Ciudad</label>';
      x+=                           '<input type="text" class="form-control form-control-sm estiloinput" name="ciudad'+num+'" id="ciudad'+num+'" >';
      x+=                        '</div> ';

      x+=                     '</div>' ;
      x+=                     '<div class="row mt-3">';
      x+=                        '<div class="col-3 mr-4">';
      x+=                           '<span >Certificado</span>';
      x+=                        '</div>';

      x+=                        '<div class="col-">';
      x+=                           '<span >Imágenes del Evento</span>';
      x+=                        '</div> ';
      x+=                     '</div>';
      x+=                     '<div class="row mt-3">';
      x+=                        '<div class="col-3 mr-4 mostrarpanelrecon">';
      x+=                           '<div class="row">';
      x+=                              '<div class="col "   >';
      x+='                                    <div class="contAjustar tamañosReconocimientosImgsXL">';
      x+='                              <div class="boxi">';
      x+=                                 '<img id="imagenponencia1a'+num+'" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> </div></div> ';
      x+=                              '</div>';
      x+=                           '</div>';
      x+=                           '<div class="row panelimagenrecon">';
      x+=                              '<div class="col-1" onclick="mostrarImagen(' + "''," + "'imagenponencia1a"+num+"'," + "'inputfileponencia1a"+num+"'" +  ",'nombreponencia1a"+ num + "'"  +');"' +'>';
      x+=                                 '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > ';
      x+=                              '</div>';
      x+=                              '<div class="col">';
      x+=                              '</div>';
      x+=                              '<div class="col-1">';

      x+=                              '</div>';
      x+=                              '<div class="col-1">';
      x+=                                 '<label class="labelsform"  for="inputfileponencia1a'+num+'"  >';
      x+=                                    '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >';
      x+=                                 '</label>';
      x+=                              '</div>';
      x+=                              '<div class="col-1">';
      x+=                                 '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >';
      x+=                              '</div>';
      x+=                           '</div>';
      x+=                           '<div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">';
      x+=                              '<div class="col" style=" word-wrap: break-word;" >';
      x+=                                 '<span id="nombreponencia1a'+num+'"></span>';
      x+=                              '</div>';
      x+=                           '</div> ';
      x+=                           '<input type="file" id="inputfileponencia1a'+num+'" accept=".jpg,.pdf,.png,.jpeg" hidden=""  name="archivo1" onchange="previewponencia(1,'+num+');"  />';
      x+=                           '<input type="text" name="inputponencia1a'+num+'"  id="inputponencia1a'+num+'" hidden="" value=""/>';
      x+=                           '<input type="text" name="estensionponencia1a'+num+'"  id="estensionponencia1a'+num+'" hidden="" value=""/>';
      x+=                        '</div>';

      x+=                        '<div class="col-2 mr-4 mostrarpanelrecon">';
      x+=                           '<div class="row">';
      x+=                              '<div class="col "   >';
      x+='                                    <div class="contAjustar tamañosReconocimientosImgs">';
      x+='                              <div class="boxi">';
      x+=                                 '<img id="imagenponencia2a'+num+'" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> </div> </div> ';
      x+=                              '</div>';
      x+=                           '</div>';
      x+=                           '<div class="row panelimagenrecon">';
      x+=                              '<div class="col-1" onclick="mostrarImagen(' + "''," + "'imagenponencia2a"+num+"'," + "'inputfileponencia2a"+num+"'" +  ",'nombreponencia2a"+ num + "'"  +');"' +'>';
      x+=                                 '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > ';
      x+=                              '</div>';
      x+=                              '<div class="col">';
      x+=                              '</div>';
      x+=                              '<div class="col-1">';

      x+=                              '</div>';
      x+=                              '<div class="col-1">';
      x+=                                 '<label class="labelsform"  for="inputfileponencia2a'+num+'"  >';
      x+=                                    '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >';
      x+=                                 '</label>';
      x+=                              '</div>';
      x+=                              '<div class="col-1">';
      x+=                                 '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >';
      x+=                              '</div>';
      x+=                           '</div>';
      x+=                           '<div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">';
      x+=                              '<div class="col" style=" word-wrap: break-word;" >';
      x+=                                 '<span id="nombreponencia2a'+num+'"></span>';
      x+=                              '</div>';
      x+=                           '</div> ';
      x+=                           '<input type="file" accept="image/*" id="inputfileponencia2a'+num+'" hidden=""  name="archivo'+num+'" onchange="previewponencia(2,'+num+');"  />';
      x+=                           '<input type="text" name="inputponencia2a'+num+'"  id="inputponencia2a'+num+'" hidden="" value=""/>';
      x+=                           '<input type="text" name="estensionponencia2a'+num+'"  id="estensionponencia2a'+num+'" hidden="" value=""/>';
      x+=                        '</div>';

      x+=                        '<div class="col-2 mr-4 mostrarpanelrecon">';
      x+=                           '<div class="row">';
      x+=                              '<div class="col "   >';
      x+='                                    <div class="contAjustar tamañosReconocimientosImgs">';
      x+='                              <div class="boxi">';
      x+=                                 '<img id="imagenponencia3a'+num+'" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> </div></div> ';
      x+=                              '</div>';
      x+=                           '</div>';
      x+=                           '<div class="row panelimagenrecon">';
      x+=                              '<div class="col-1" onclick="mostrarImagen(' + "''," + "'imagenponencia3a"+num+"'," + "'inputfileponencia3a"+num+"'" +  ",'nombreponencia3a"+ num + "'"  +');"' +'>';
      x+=                                 '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > ';
      x+=                              '</div>';
      x+=                              '<div class="col">';
      x+=                              '</div>';
      x+=                              '<div class="col-1">';

      x+=                              '</div>';
      x+=                              '<div class="col-1">';
      x+=                                 '<label class="labelsform"  for="inputfileponencia3a'+num+'"  >';
      x+=                                    '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >';
      x+=                                 '</label>';
      x+=                              '</div>';
      x+=                              '<div class="col-1">';
      x+=                                 '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >';
      x+=                              '</div>';
      x+=                           '</div>';

      x+=                           '<div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">';
      x+=                              '<div class="col" style=" word-wrap: break-word;" >';
      x+=                                 '<span id="nombreponencia3a'+num+'"></span>';
      x+=                              '</div>';
      x+=                           '</div> ';
      x+=                           '<input type="file" accept="image/*" id="inputfileponencia3a'+num+'" hidden=""  name="archivo'+num+'" onchange="previewponencia(3,'+num+');"  />';
      x+=                           '<input type="text" name="inputponencia3a'+num+'"  id="inputponencia3a'+num+'" hidden="" value=""/>';
      x+=                           '<input type="text" name="estensionponencia3a'+num+'"  id="estensionponencia3a'+num+'" hidden="" value=""/>';
      x+=                        '</div>';

      x+=                        '<div class="col-2 mostrarpanelrecon">';
      x+=                           '<div class="row">';
      x+=                              '<div class="col "   >';
      x+='                                    <div class="contAjustar tamañosReconocimientosImgs">';
      x+='                              <div class="boxi">';
      x+=                                 '<img id="imagenponencia4a'+num+'" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> </div></div> ';
      x+=                              '</div>';
      x+=                           '</div>';
      x+=                           '<div class="row panelimagenrecon">';
      x+=                              '<div class="col-1" onclick="mostrarImagen(' + "''," + "'imagenponencia4a"+num+"'," + "'inputfileponencia4a"+num+"'" +  ",'nombreponencia4a"+ num + "'"  +');"' +'>';
      x+=                                 '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > ';
      x+=                              '</div>';
      x+=                              '<div class="col">';
      x+=                              '</div>';
      x+=                              '<div class="col-1">';

      x+=                              '</div>';
      x+=                              '<div class="col-1">';
      x+=                                 '<label class="labelsform"  for="inputfileponencia4a'+num+'"  >';
      x+=                                    '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >';
      x+=                                 '</label>';
      x+=                              '</div>';
      x+=                              '<div class="col-1">';
      x+=                                 '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >';
      x+=                              '</div>';
      x+=                           '</div>';
      x+=                           '<div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">';
      x+=                              '<div class="col" style=" word-wrap: break-word;" >';
      x+=                                 '<span id="nombreponencia4a'+num+'"></span>';
      x+=                              '</div>';
      x+=                           '</div> ';
      x+=                           '<input type="file" accept="image/*" id="inputfileponencia4a'+num+'" hidden=""  name="archivo'+num+'" onchange="previewponencia(4,'+num+');"  />';
      x+=                           '<input type="text" name="inputponencia4a'+num+'"  id="inputponencia4a'+num+'" hidden="" value=""/>';
      x+=                           '<input type="text" name="estensionponencia4a'+num+'"  id="estensionponencia4a'+num+'" hidden="" value=""/>';
      x+=                        '</div>';
      x+=                     '</div>';
      x+=                     '<div class="row" >';
      x+=                        '<div class="col-4"  >  ';
      x+=                           '<span class="linkAccione" onclick="eliminarponencia('+num+',0)"  >ELIMINAR</span> ';
      x+=                        '</div>';
      x+=                     '</div>';
      x+=                  '</div>';


      //aqui es donde le dices donde vas a poner el clon
      clondiv.appendTo(zona) ;
      //lo vacias el div con los elementos dentro
      $( "#ponencias"+num).empty();
      //insertas el string en el html
      $( "#ponencias"+num).html(x);

      $("#contadorponencias").val(num);
      }
   }
   function agregarreconocimiento() {

      if ($("#reconocimientoespecialselect").val() == 1) {
         var zona = document.getElementById("contenedorreconocimiento");
      var div = $('div[id^="reconocimiento"]:last');

      var num  = parseInt( div.prop("id").match(/(\d+)/g), 10 ) +1;  
      var clondiv  = div.clone().prop('id', 'reconocimiento'+num );




      var x =                  '<div class="col"> ';
      x+=                     '<div class="row">';
      x+=                        '<div class="col"> ';
      x+=                           '<label class="labelsform" for="tiporeconocimiento'+num+'">Tipo de Reconocimiento</label>';
      x+='<input type="text" class="form-control form-control-sm estiloinput" name="idreconocimiento'+num+'" id="idreconocimiento'+num+'" value="0" hidden="" >'
      x+=                           '<input type="text" class="form-control form-control-sm estiloinput" name="tiporeconocimiento'+num+'" id="tiporeconocimiento'+num+'" > ';
      x+=                        '</div>';
      x+=                        '<div class="col"> ';
      x+=                           '<label class="labelsform" for="quienotorga'+num+'">¿Quién lo otorga?</label>';
      x+=                           '<input type="text" class="form-control form-control-sm estiloinput" name="quienotorga'+num+'" id="quienotorga'+num+'" > ';
      x+=                        '</div> ';
      x+=                        '<div class="col-2"> ';
      x+=                           '<label class="labelsform" for="fecha'+num+'">Fecha</label>';
      x+=                           '<input type="text" class="form-control form-control-sm estiloinput datetimepicker" name="fecha'+num+'" id="fechareconocimiento'+num+'" >';
      x+=                        '</div>';
      x+=                     '</div>';
      x+=                     '<div class="row">';

      x+=                        '<div class="col"> ';
      x+=                           '<label class="labelsform" for="pais'+num+'">País</label>';
      x+=                           '<input type="text" class="form-control form-control-sm estiloinput" name="pais'+num+'" id="pais'+num+'" >';
      x+=                        '</div>';
      x+=                        '<div class="col"> ';
      x+=                           '<label class="labelsform" for="estado'+num+'">Estado</label>';
      x+=                           '<input type="text" class="form-control form-control-sm estiloinput" name="estado'+num+'" id="estado'+num+'" >';
      x+=                        '</div>';
      x+=                        '<div class="col"> ';
      x+=                           '<label class="labelsform" for="ciudad'+num+'">Ciudad</label>';
      x+=                           '<input type="text" class="form-control form-control-sm estiloinput" name="ciudad'+num+'" id="ciudad'+num+'" >';
      x+=                        '</div>  ';
      x+=                     '</div>';

      x+=                     '<div class="row mt-3">';
      x+=                        '<div class="col-3 mr-4">';
      x+=                           '<span >Reconocimiento</span>';
      x+=                        '</div>';

      x+=                        '<div class="col-">';
      x+=                           '<span >Imágenes del Evento</span>';
      x+=                        '</div> ';
      x+=                     '</div>';
      x+=                     '<div class="row mt-3">';
      x+=                        '<div class="col-3 mr-4 mostrarpanelrecon">';
      x+=                           '<div class="row">';
      x+=                              '<div class="col "   >';
      x+='                                    <div class="contAjustar tamañosReconocimientosImgsXL">';
      x+='                              <div class="boxi">';
      x+=                                 '<img id="imagenreconocimiento1a'+num+'" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> </div></div> ';
      x+=                              '</div>';
      x+=                           '</div>';
      x+=                           '<div class="row panelimagenrecon">';
      x+=                              '<div class="col-1" onclick="mostrarImagen(' + "''," + "'imagenreconocimiento1a"+num+"'," + "'inputfilreconocimiento1a"+num+"'" +  ",'nombrereconocimiento1a"+ num + "'"  +');"' +'>';
      x+=                                 '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > ';
      x+=                              '</div>';
      x+=                              '<div class="col">';
      x+=                              '</div>';
      x+=                              '<div class="col-1">';

      x+=                              '</div>';
      x+=                              '<div class="col-1">';
      x+=                                 '<label class="labelsform"  for="inputfilreconocimiento1a'+num+'"  >';
      x+=                                    '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >';
      x+=                                 '</label>';
      x+=                              '</div>';
      x+=                              '<div class="col-1">';
      x+=                                 '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >';
      x+=                              '</div>';
      x+=                           '</div>';
      x+=                           '<div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">';
      x+=                              '<div class="col" style=" word-wrap: break-word;" >';
      x+=                                 '<span id="nombrereconocimiento1a'+num+'"></span>';
      x+=                              '</div>';
      x+=                           '</div> ';
      x+=                           '<input type="file" id="inputfilreconocimiento1a'+num+'" accept=".jpg,.pdf,.png,.jpeg" hidden=""  name="archivo1" onchange="previewreconocimiento(1,'+num+');"  />';
      x+=                           '<input type="text" name="inputreconocimiento1a'+num+'"  id="inputreconocimiento1a'+num+'" hidden="" value=""/>';
      x+=                           '<input type="text" name="estensionreconocimiento1a'+num+'"  id="estensionreconocimiento1a'+num+'" hidden="" value=""/>';
      x+=                        '</div>';

      x+=                        '<div class="col-2 mr-4 mostrarpanelrecon">';
      x+=                           '<div class="row">';
      x+=                              '<div class="col "   >';
      x+='                                    <div class="contAjustar tamañosReconocimientosImgs">';
      x+='                              <div class="boxi">';
      x+=                                 '<img id="imagenreconocimiento2a'+num+'" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> </div></div> ';
      x+=                              '</div>';
      x+=                           '</div>';
      x+=                           '<div class="row panelimagenrecon">';
      x+=                              '<div class="col-1" onclick="mostrarImagen(' + "''," + "'imagenreconocimiento2a"+num+"'," + "'inputfilreconocimiento2a"+num+"'" +  ",'nombrereconocimiento2a"+ num + "'"  +');"' +'>';
      x+=                                 '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > ';
      x+=                              '</div>';
      x+=                              '<div class="col">';
      x+=                              '</div>';
      x+=                              '<div class="col-1">';

      x+=                              '</div>';
      x+=                              '<div class="col-1">';
      x+=                                 '<label class="labelsform"  for="inputfilreconocimiento2a'+num+'"  >';
      x+=                                    '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >';
      x+=                                 '</label>';
      x+=                              '</div>';
      x+=                              '<div class="col-1">';
      x+=                                 '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >';
      x+=                              '</div>';
      x+=                           '</div>';
      x+=                           '<div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">';
      x+=                              '<div class="col" style=" word-wrap: break-word;" >';
      x+=                                 '<span id="nombrereconocimiento2a'+num+'"></span>';
      x+=                              '</div>';
      x+=                           '</div> ';
      x+=                           '<input type="file" accept="image/*" id="inputfilreconocimiento2a'+num+'" hidden=""  name="archivo'+num+'" onchange="previewreconocimiento(2,'+num+');"  />';
      x+=                           '<input type="text" name="inputreconocimiento2a'+num+'"  id="inputreconocimiento2a'+num+'" hidden="" value=""/>';
      x+=                           '<input type="text" name="estensionreconocimiento2a'+num+'"  id="estensionreconocimiento2a'+num+'" hidden="" value=""/>';
      x+=                        '</div>';

      x+=                        '<div class="col-2 mr-4 mostrarpanelrecon">';
      x+=                           '<div class="row">';
      x+=                              '<div class="col "   >';
      x+='                                    <div class="contAjustar tamañosReconocimientosImgs">';
      x+='                              <div class="boxi">';
      x+=                                 '<img id="imagenreconocimiento3a'+num+'" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> </div></div> ';
      x+=                              '</div>';
      x+=                           '</div>';
      x+=                           '<div class="row panelimagenrecon">';
      x+=                              '<div class="col-1" onclick="mostrarImagen(' + "''," + "'imagenreconocimiento3a"+num+"'," + "'inputfilreconocimiento3a"+num+"'" +  ",'nombrereconocimiento3a"+ num + "'"  +');"' +'>';
      x+=                                 '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > ';
      x+=                              '</div>';
      x+=                              '<div class="col">';
      x+=                              '</div>';
      x+=                              '<div class="col-1">';

      x+=                              '</div>';
      x+=                              '<div class="col-1">';
      x+=                                 '<label class="labelsform"  for="inputfilreconocimiento3a'+num+'"  >';
      x+=                                    '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >';
      x+=                                 '</label>';
      x+=                              '</div>';
      x+=                              '<div class="col-1">';
      x+=                                 '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >';
      x+=                              '</div>';
      x+=                           '</div>';

      x+=                           '<div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">';
      x+=                              '<div class="col" style=" word-wrap: break-word;" >';
      x+=                                 '<span id="nombrereconocimiento3a'+num+'"></span>';
      x+=                              '</div>';
      x+=                           '</div> ';
      x+=                           '<input type="file" accept="image/*" id="inputfilreconocimiento3a'+num+'" hidden=""  name="archivo'+num+'" onchange="previewreconocimiento(3,'+num+');"  />';
      x+=                           '<input type="text" name="inputreconocimiento3a'+num+'"  id="inputreconocimiento3a'+num+'" hidden="" value=""/>';
      x+=                           '<input type="text" name="estensionreconocimiento3a'+num+'"  id="estensionreconocimiento3a'+num+'" hidden="" value=""/>';
      x+=                        '</div>';

      x+=                        '<div class="col-2 mostrarpanelrecon">';
      x+=                           '<div class="row">';
      x+=                              '<div class="col "   >';
      x+='                                    <div class="contAjustar tamañosReconocimientosImgs">';
      x+='                              <div class="boxi">';
      x+=                                 '<img id="imagenreconocimiento4a'+num+'" src="<?=assetgeneral()?>/img/masgris.png" style="width: 100%;"> </div></div> ';
      x+=                              '</div>';
      x+=                           '</div>';
      x+=                           '<div class="row panelimagenrecon">';
      x+=                              '<div class="col-1" onclick="mostrarImagen(' + "''," + "'imagenreconocimiento4a"+num+"'," + "'inputfilreconocimiento4a"+num+"'" +  ",'nombrereconocimiento4a"+ num + "'"  +');"' +'>';
      x+=                                 '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > ';
      x+=                              '</div>';
      x+=                              '<div class="col">';
      x+=                              '</div>';
      x+=                              '<div class="col-1">';

      x+=                              '</div>';
      x+=                              '<div class="col-1">';
      x+=                                 '<label class="labelsform"  for="inputfilreconocimiento4a'+num+'"  >';
      x+=                                    '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >';
      x+=                                 '</label>';
      x+=                              '</div>';
      x+=                              '<div class="col-1">';
      x+=                                 '<img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  >';
      x+=                              '</div>';
      x+=                           '</div>';
      x+=                           '<div class="row panelimagenrecon" style="margin-top: 0px; margin-bottom:15px;">';
      x+=                              '<div class="col" style=" word-wrap: break-word;" >';
      x+=                                 '<span id="nombrereconocimiento4a'+num+'"></span>';
      x+=                              '</div>';
      x+=                           '</div> ';
      x+=                           '<input type="file" accept="image/*" id="inputfilreconocimiento4a'+num+'" hidden=""  name="archivo'+num+'" onchange="previewreconocimiento(4,'+num+');"  />';
      x+=                           '<input type="text" name="inputreconocimiento4a'+num+'"  id="inputreconocimiento4a'+num+'" hidden="" value=""/>';
      x+=                           '<input type="text" name="estensionreconocimiento4a'+num+'"  id="estensionreconocimiento4a'+num+'" hidden="" value=""/>';
      x+=                        '</div>';
      x+=                     '</div>';
      x+=                     '<div class="row" >';
      x+=                        '<div class="col-4"  >  ';
      x+=                           '<span class="linkAccione" onclick="eliminarreconocimiento('+num+',0)"  >ELIMINAR</span> ';
      x+=                        '</div>';
      x+=                     '</div>';
      x+=                  '</div>'; 


   //aqui es donde le dices donde vas a poner el clon
   clondiv.appendTo(zona) ;
   //lo vacias el div con los elementos dentro
   $( "#reconocimiento"+num).empty();
   //insertas el string en el html
   $( "#reconocimiento"+num).html(x);

   $("#contadorreconocimientos").val(num);
      }
}

function editar() { 
$(".estiloinput").removeClass('estiloinputred');
   $(".estiloCampo").removeClass('estiloinputred');

var valor = 0;

   if ($("#asociacionclubselect").val() == 1) {
      for (var i = 1; i <= $("#contadorasociaciones").val(); i++) { 
         if ($("#nombreasociasion"+i).val() == "") {
           valor = 1;
            $("#nombreasociasion"+i).addClass('estiloinputred')
         }
         if ($("#anoingresoasociasion"+i).val() == "") {
          valor = 1;
            $("#anoingresoasociasion"+i).addClass('estiloinputred')
         }
         if ($("#inputasociasionimg"+i).val() =="" && $("#idasociacion"+i).val() == 0) {
            valor = 2;
         }
         if ($("#inputasociasionimg"+i).val() == "X" && $("#idasociacion"+i).val() != 0) {
            valor = 2; 
         }

      } 
   }
   if ($("#ganarconcursosselect").val() == 1) {
      for (var i = 1; i <= $("#contadorconcursos").val(); i++) {
         if ($("#nombreconscurso"+i).val() == "") {
            valor = 1;
            $("#nombreconscurso"+i).addClass('estiloinputred')
         }
         if ($("#nombrepatrocinador"+i).val() == "") {
            valor = 1;
            $("#nombrepatrocinador"+i).addClass('estiloinputred')
         }
         if ($("#premio"+i).val() == "") {
           valor = 1;
            $("#premio"+i).addClass('estiloinputred')
         }
         if ($("#fechaconcurso"+i).val() == "") {
           valor = 1;
            $("#fechaconcurso"+i).addClass('estiloinputred')
         }
         if ($("#inputconcurso1a"+i).val() == "" && $("#idconcurso"+i).val() == 0) {
            valor = 2;
         } 
          if ($("#inputconcurso1a"+i).val() == "X" && $("#idconcurso"+i).val() != 0) {
            valor = 2;
         }

      } 
   }
   if ($("#participarjuezselect").val() == 1) {
      for (var i = 1; i <= $("#contadorjuez").val(); i++) {
         if ($("#nombreconcursojuez"+i).val() == "") {
            valor = 1;
            $("#nombreconcursojuez"+i).addClass('estiloinputred')
         }
         if ($("#anoingreso"+i).val() == "") {
             valor = 1;
            $("#anoingreso"+i).addClass('estiloinputred')
         }
         if ($("#edicionconcurso"+i).val() == "") {
             valor = 1;
            $("#edicionconcurso"+i).addClass('estiloinputred')
         }
          if ($("#inputjuez"+i).val() =="" && $("#idjuez"+i).val() == 0) {
            valor = 2;
         }
         if ($("#inputjuez"+i).val() == "X" && $("#idjuez"+i).val() != 0) {
            valor = 2;
         }

      } 
   }
   if ($("#asistiofestivalselect").val() == 1) {
      for (var i = 1; i <= $("#contadorfestival").val(); i++) {
         if ($("#tema"+i).val() == "") {
             valor = 1;
            $("#tema"+i).addClass('estiloinputred')
         }
         if ($("#locacion"+i).val() == "") {
           valor = 1;
            $("#locacion"+i).addClass('estiloinputred')
         }
         if ($("#fecha"+i).val() == "") {
            valor = 1;
            $("#fecha"+i).addClass('estiloinputred')
         }
         if ($("#duracion"+i).val() == "") {
            valor = 1;
            $("#duracion"+i).addClass('estiloinputred')
         }


      } 
   }
   if ($("#selectecponencia").val() == 1) {
      for (var i = 1; i <= $("#contadorponencias").val(); i++) { 
         if ($("#nombreevento"+i).val() == "") {
            valor = 1;
            $("#nombreevento"+i).addClass('estiloinputred');
         }
         if ($("#nombreponencia"+i).val() == "") {
            valor = 1;
            $("#nombreponencia"+i).addClass('estiloinputred');
         }

         if ($("#locacionponencia"+i).val() == "") {
            valor = 1;
            $("#locacionponencia"+i).addClass('estiloinputred');
         }
          if ($("#fechaponencia"+i).val() == "") {
           valor = 1;
            $("#fechaponencia"+i).addClass('estiloinputred');
         }
         if ($("#inputponencia1a"+i).val() =="" && $("#idponencia"+i).val() == 0) {
            valor = 2;
         }
         if ($("#inputponencia1a"+i).val() == "X" && $("#idponencia"+i).val() != 0) {
            valor = 2;
         }

      } 
   }
   if ($("#reconocimientoespecialselect").val() == 1) {
      for (var i = 1; i <= $("#contadorreconocimientos").val(); i++) {
         if ($("#tiporeconocimiento"+i).val() == "") {
            valor = 1;
            $("#tiporeconocimiento"+i).addClass('estiloinputred');
         }
         if ($("#quienotorga"+i).val() == "") {
            valor = 1;
            $("#quienotorga"+i).addClass('estiloinputred');
         }
         if ($("#fechareconocimiento"+i).val() == "") {
            valor = 1;
            $("#fechareconocimiento"+i).addClass('estiloinputred');
         }
         if ($("#inputreconocimiento1a"+i).val() =="" && $("#idreconocimiento"+i).val() == 0) {
            valor = 2;
         }
         if ($("#inputreconocimiento1a"+i).val() == "X" && $("#idreconocimiento"+i).val() != 0) {
            valor = 2;
         }

      } 
   }
   if (valor ==1) {
 $('#alert').modal('show');
            $("#mensajealerta").html("Favor de Llenar los Campos Marcados");
            return;
   }
    if (valor == 2) {
 $('#alert').modal('show');
            $("#mensajealerta").html("Favor de Subir su Reconocimiento");
            return;
   }
   else{
      editarasociasiones()
   }
   
}
function editarasociasiones() {
   var data  = $("#formasociasiones").serialize();
   var url = $("#formasociasiones").attr('action');
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
            editarconcuros()
            return ;
         }
         if (response == 2) {
            editarconcuros()  
            return ;
         }
         if (response == "") {
            $('#alert').modal('show');
            $("#mensajealerta").html("Ocurrió un problema al agregar/editar las asociasiones");
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
function editarconcuros() {
   var data  = $("#formconcursos").serialize();
   var url = $("#formconcursos").attr('action');
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
            editarjuez()
            return ;
         }
         if (response == 2) {
            editarjuez()
            return ;
         }
         if (response == "") {
            $('#alert').modal('show');
            $("#mensajealerta").html("Ocurrió un problema al agregar/editar los Concursos");
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
function editarjuez() {
   var data  = $("#formjuez").serialize();
   var url = $("#formjuez").attr('action');
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

            editarfestival()
            return ;
         }
         if (response == 2) {
            editarfestival()
            return ;
         }
         if (response == "") {
            $('#alert').modal('show');
            $("#mensajealerta").html("Ocurrió un problema al agregar/editar la Participacion como Juez");
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
function editarfestival() {
   var data  = $("#formfestival").serialize();
   var url = $("#formfestival").attr('action');
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
            editarponencias()  
            return ;
         }
         if (response == 2) {
            editarponencias()  
            return ;
         }
         if (response == "") {
            $('#alert').modal('show');
            $("#mensajealerta").html("Ocurrió un problema al agregar/editar los Fest Gastronómicos");
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
function editarponencias() {
   var data  = $("#formponencias").serialize();
   var url = $("#formponencias").attr('action');
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
            editarreconocimientos()
            return ;
         }
         if (response == 2) {
            editarreconocimientos()
            return ;
         }
         if (response == "") {
            $('#alert').modal('show');
            $("#mensajealerta").html("Ocurrió un problema al agregar/editar las Ponencias");
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
function editarreconocimientos() {
   var data  = $("#formreconocimientos").serialize();
   var url = $("#formreconocimientos").attr('action');
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
            $("#mensajealerta").html("Se Guardaron Correctamente los Datos");
            $("#alert").attr("onclick","recargapagina()");  
            return ;
         }
         if (response == 2) {
            $('#alert').modal('show');
            $("#mensajealerta").html("Se Guardaron Correctamente los Datos");
            $("#alert").attr("onclick","recargapagina()");  
            return ;
         }
         if (response == "") {
            $('#alert').modal('show');
            $("#mensajealerta").html("Ocurrió un problema al agregar/editar los Reconocimientos");
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
   location.href = "<?=base_url('/configuracion/reconocimientos')?>";
}
</script>