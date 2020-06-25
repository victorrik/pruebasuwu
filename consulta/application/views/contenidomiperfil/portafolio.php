<?php 
// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
date_default_timezone_set("America/Mexico_City");


// Imprime algo como: Monday 8th of August 2005 03:12:46 PM
setlocale(LC_TIME, "spanish");
$mes = date('n',strtotime($datos["ultimaactualizacion"]));
switch ($mes) {
    case 1:
    $mes = 'Ene';
    break;
    case 2:
    $mes = 'Feb';
    break;
    case 3:
    $mes = 'Mar';
    break;
    case 4:
    $mes = 'Abr';
    break;
    case 5:
    $mes = 'May';
    break;
    case 6:
    $mes = 'Jun';
    break;
    case 7:
    $mes = 'Jul';
    break;
    case 8:
    $mes = 'Ago';
    break;
    case 9: 
    $mes = 'Sep';
    break;
    case 10:
    $mes = 'Oct';
    break;
    case 11:
    $mes = 'Nov';
    break;
    case 12:
    $mes = 'Dic';
    break; 

    default:"problema en el registro";

    break;
}
?>
<section class="content-header mt-2">
	<div class="row mt-2 mb-3">
		<div class="col-7"   style="display: inline-flex;"> 
			<h2 class="letramiperfil">
				Mi Portafolio
				<span class="letrasubperfil" id="subtituloperfil"> 

				</span> 
			</h2> 

		</div>

		<div class="col-5 alinearderecha" > 


		</div>
	</div>
</section>
<!-- Main content --> 

<section class="content margencontenido"  >

    <div class="row lineaseparado mt-3">
        <div class="col">
            <div class="row mb-2">
                <div class="col">

                    <span>Última actualización: </span>
                    <span><?php if (!empty($datos["ultimaactualizacion"])){echo date('d/',strtotime($datos["ultimaactualizacion"])).$mes.date('/Y H:i:s',strtotime($datos["ultimaactualizacion"])); }?></span>
                    <br>
                    <span>Categorías</span>
                </div>
                <div class="col-3"> 
                    <span>Avance general:</span>
                    <span><?=$datos["avance"]?>%</span>
                </div>
            </div> 
            <div class="row">
                <div class="bd-example d-block w-100" id="contenidoedicion"  >
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
                    <form id="formportaforlio" action="<?=base_url('portafolio/agregardocs')?>"  >
                        <?php foreach ($datos["docxcat"] as $key){ ?>
                            <div id="<?=convert_accented_characters(quitarsimbolos($key["NOMBRE"].$key["ID"]))?>">
                                <div class="row " id="">
                                    <div class="col" id="">
                                        <div class="row  mb-4" >
                                            <div class="col-2 letratituloedicion">
                                                <span><?=$key["NOMBRE"]?></span>
                                            </div>
                                            <div class="col-7 lineainferiorosita">
                                            </div>
                                            <div class="col-3">Total de documentos
                                                <?php $cont = 0;
                                                if (!empty($datos["registro"])) {
                                                    foreach ($datos["registro"] as $subsubkey){
                                                        foreach ($key["DOCS"] as $subkey){
                                                            if ($subkey["ID"] == $subsubkey["ID_DOCUMENTO"] && $subkey["ID_CATEGORIA"] == $key["ID"]){
                                                                if ($subsubkey["DIRECCION_DOCUMENTO"] != "" ) {
                                                                    $cont++;
                                                                }
                                                            }
                                                        }
                                                    }
                                                } echo  $cont;
                                                $cont = 0;
                                                foreach ($key["DOCS"] as $subkey){
                                                    if ($subkey["ID_CATEGORIA"] == $key["ID"]){
                                                        $cont++;
                                                    }
                                                }
                                                echo "/".$cont; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <?php /* Esta primera opcion, es cuando hay algo, por defecto, llenes algunos, se van todos y se insertan, asi que basicamente, siempre estara lleno  */
                                    if  (!empty($datos["registro"])){
                                        /* Hacemos un recorrido al array que hicimos en el modelo, donde consultamos todos los documentos  */ 
                                        foreach ($key["DOCS"] as $subkey){
                                            /* Este recorrido es el de los datos ya guardados, insertamos donde ya hay    */ 
                                            foreach ($datos["registro"] as $subsubkey){ 
                                                if ($subsubkey["ID_DOCUMENTO"] == $subkey["ID"]) { ?>
                                                    <div class="col-3  col-lg-2 col-xl-auto  padincol mostrarpanelportafolio">
                                                        <div class="row">
                                                            <div class="col contenedorimagenportfolio"> 
                                                                <img id="imagen<?=uneysintildes($subkey["NOMBRE"])?>" src="<?=checkimagen($subsubkey["DIRECCION_DOCUMENTO"])?>" style="width: 100%;"> 
                                                            </div>
                                                        </div>
                                                        <div class="row panelimagenportafolio">
                                                            <div class="col-1">
                                                                <img src="<?=assetgeneral()?>/img/infoicon.png"  >
                                                            </div>
                                                            <div class="col-1" onclick='mostrarImagen("<?=$subsubkey["DIRECCION_DOCUMENTO"]?>","imagen<?=uneysintildes($subkey["NOMBRE"])?>","inputfile<?=uneysintildes($subkey["NOMBRE"])?>","input<?=uneysintildes($subkey["NOMBRE"])?>")' >
                                                                <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > 
                                                            </div>
                                                            <div class="col" >
                                                                <span id="nombre<?=uneysintildes($subkey["NOMBRE"])?>" style="display: none"></span>
                                                            </div> 
                                                            <?php if ($subkey["VIGENCIA"] == 1  ){ ?>
                                                                <div class="col-1" >
                                                                    <img src="<?=assetgeneral()?>/img/calendar.png" onclick="capturavigencia('fechainicio<?=uneysintildes($subkey["NOMBRE"])?>','fechatermino<?=uneysintildes($subkey["NOMBRE"])?>',<?=$subkey["ID"]?>,'idvigencia<?=uneysintildes($subkey["NOMBRE"])?>')"> 
                                                                </div> 
                                                            <?php    }
                                                            if ($subsubkey["DIRECCION_DOCUMENTO"] != "" ){ ?>
                                                                <div class="col-1">
                                                                    <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/DESCARGAR.svg"  onclick=" window.open('<?=base_url('portafolio/download/'.$subsubkey["ID"].'/1')?>')"> 
                                                                </div> 
                                                            <?php    } ?>
                                                            

                                                            <div class="col-1">

                                                                <label  for="inputfile<?=uneysintildes($subkey["NOMBRE"])?>">
                                                                    <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                                                                </label>
                                                            </div> 
                                                            <div class="col-1">
                                                                <img  src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  onclick="eliminar('<?=$subsubkey["ID"]?>')">
                                                            </div> 
                                                        </div> 
                                                        <div class="row">
                                                            <span class="titulodocportafolio"><?=$subkey["NOMBRE"]?></span>
                                                        </div>
                                                        <?php if ($subkey["VIGENCIA"] == 1  ){
                                                            $boton = "boton".uneysintildes($subkey["NOMBRE"]);
                                                            ?>
                                                            <button type="button" onclick="capturavigencia('fechainicio<?=uneysintildes($subkey["NOMBRE"])?>','fechatermino<?=uneysintildes($subkey["NOMBRE"])?>',<?=$subkey["ID"]?>,'idvigencia<?=uneysintildes($subkey["NOMBRE"])?>')" id="boton<?=uneysintildes($subkey["NOMBRE"])?>" hidden="">miau</button>
                                                            <input type="date" class="form-control" id="fechainicio<?=uneysintildes($subkey["NOMBRE"])?>" name="fechainicio<?=uneysintildes($subkey["NOMBRE"])?>"  value="<?=$subsubkey["VIGENCIA_FECHA_INICIO"]?>" hidden=""/>
                                                            <input type="date" class="form-control" id="fechatermino<?=uneysintildes($subkey["NOMBRE"])?>" name="fechatermino<?=uneysintildes($subkey["NOMBRE"])?>"  value="<?=$subsubkey["VIGENCIA_FECHA_FIN"]?>" hidden=""/> <?php
                                                        } else{$boton = "";} ?>
                                                        <input type="file" id="inputfile<?=uneysintildes($subkey["NOMBRE"])?>" hidden=""  onchange="previewimagen('imagen<?=uneysintildes($subkey["NOMBRE"])?>','input<?=uneysintildes($subkey["NOMBRE"])?>','estension<?=uneysintildes($subkey["NOMBRE"])?>','nombre<?=uneysintildes($subkey["NOMBRE"])?>','inputfile<?=uneysintildes($subkey["NOMBRE"])?>','<?=$boton?>');" accept=".jpg,.png,.jpeg,.pdf" />
                                                        <input type="text" name='input<?=uneysintildes($subkey["NOMBRE"])?>'  id="input<?=uneysintildes($subkey["NOMBRE"])?>" hidden="" value=""/>  
                                                        <input type="text" name='id<?=uneysintildes($subkey["NOMBRE"])?>'  id="id<?=uneysintildes($subkey["NOMBRE"])?>" hidden="" value="<?=$subsubkey["ID"]?>"/>
                                                        <input type="text" name='estension<?=uneysintildes($subkey["NOMBRE"])?>'  id="estension<?=uneysintildes($subkey["NOMBRE"])?>" hidden="" value="0"/>
                                                        <input type="text" name='iddoc<?=uneysintildes($subkey["NOMBRE"])?>'  id="iddoc<?=uneysintildes($subkey["NOMBRE"])?>" hidden="" value="<?=$subkey["ID"]?>"/>
                                                        <input type="text" name='idvigencia<?=uneysintildes($subkey["NOMBRE"])?>'  id="idvigencia<?=uneysintildes($subkey["NOMBRE"])?>" hidden="" value="<?=$subsubkey["ID_VIGENCIA"]?>"/>
                                                        <input type="text" name='dirarchivo<?=uneysintildes($subkey["NOMBRE"])?>'  id="dirarchivo<?=uneysintildes($subkey["NOMBRE"])?>" hidden="" value="<?=$subsubkey["DIRECCION_DOCUMENTO"]?>"/>
                                                    </div> 
                                                    <?php
                                                }
                                                if ($subkey["NIVEL"] == 2){
                                                    $subcontenedor =  uneysintildes($subkey["NOMBRE"]).$subkey["ID"]; $nombrecontenedor = $subkey["NOMBRE"]; $comproante = true; ?>
                                                    <div class="col-3  col-lg-2 col-xl-auto  padincol mostrarpanelportafoliono">
                                                        <div class="row">
                                                            <div class="col  contenedorimagenportfolio">
                                                                <div class="row"   style="margin:auto;" >
                                                                    <div class="col  contenedorimagenportfolio">
                                                                        <img id="" src="<?=assetgeneral()?>/img/folder.png" style="width: 100%;" ondblclick="$('#<?=convert_accented_characters(quitarsimbolos($key["NOMBRE"].$key["ID"]))?>').css('display','none');$('#<?=$subcontenedor?>').css('display','block')">
                                                                    </div> 
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                        <div class="row">
                                                            <span class="titulodocportafolio"><?=$subkey["NOMBRE"]?></span>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    break;
                                                }

                                                if ($subkey["NIVEL"] == 3){
                                                    $subcontenedor =  uneysintildes($subkey["NOMBRE"]).$subkey["ID"]; $nombrecontenedor = $subkey["NOMBRE"]; $comproante = true; ?>
                                                    <div class="col-3  col-lg-2 col-xl-auto  padincol mostrarpanelportafoliono">
                                                        <div class="row">
                                                            <div class="col  contenedorimagenportfolio">
                                                                <div class="row"   style="margin:auto;" >
                                                                    <div class="col  contenedorimagenportfolio">
                                                                        <img id="" src="<?=assetgeneral()?>/img/folder.png" style="width: 100%;" ondblclick="$('#<?=convert_accented_characters(quitarsimbolos($key["NOMBRE"].$key["ID"]))?>').css('display','none');$('#<?=$subcontenedor?>').css('display','block')">
                                                                    </div> 
                                                                </div>
                                                            </div> 
                                                        </div> 
                                                        <div class="row">
                                                            <span class="titulodocportafolio"><?=$subkey["NOMBRE"]?></span>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    break;
                                                }

                                            }
                                        }
                                    } ?>
                                </div>
                            </div>
                            <?php
                            foreach ($key["DOCS"] as $subkey){
                                if ($subkey["NIVEL"] == 2){ ?>
                                    <div id="<?=uneysintildes($subkey["NOMBRE"]).$subkey["ID"]?>" style="display: none;">
                                        <div class="row " id="">
                                            <div class="col" id="">
                                                <div class="row  mb-4" >
                                                    <div class="col  letratituloedicion">
                                                        <span><?=$key["NOMBRE"]." / ".$subkey["NOMBRE"]?></span>
                                                    </div>
                                                    <div class="col-3  lineainferiorosita">
                                                    </div>
                                                    <div class="col-3">Total de documentos
                                                        <?php $cont = 0;
                                                        foreach ($subkey["SUBDOCS"] as $subsubkey){
                                                            foreach ($datos["registro"] as $datosregistro){

                                                                if ($subsubkey["ID"] == $datosregistro["ID_DOCUMENTO"]  ){
                                                                    if ($datosregistro["DIRECCION_DOCUMENTO"] != "" ) {
                                                                        $cont++;
                                                                    } 
                                                                }
                                                            }
                                                        } echo  $cont;
                                                        $cont = 0;
                                                        foreach ($subkey["SUBDOCS"] as $subsubkey){
                                                            if ($subsubkey["ID_CATEGORIA"] == $key["ID"]){
                                                                $cont++;
                                                            }
                                                        }
                                                        echo "/".$cont; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="row" id="<?=uneysintildes($subkey["NOMBRE"]).$subkey["ID"]?>row">
                                             <div class="col-3  col-lg-2 col-xl-auto  contenedorimagenportfolio " ondblclick="$('#<?=convert_accented_characters(quitarsimbolos($key["NOMBRE"].$key["ID"]))?>').css('display','block');$('#<?=uneysintildes($subkey["NOMBRE"]).$subkey["ID"]?>').css('display','none')">
                                                <div class="row"   style="margin:auto;" >
                                                    <div class="col  contenedorimagenportfolio">
                                                        <img id="" src="<?=assetgeneral()?>/img/foldeout.png" style="width: 100%;"  /> 
                                                    </div> 
                                                </div>
                                            </div> 
                                            <?php
                                            if (!empty($subkey["SUBDOCS"])) {
                                                foreach ($subkey["SUBDOCS"] as $subsubkey){
                                                    $cont = 0 ;
                                                    foreach ($datos["registro"] as $datosregistro){

                                                        if ($datosregistro["ID_DOCUMENTO"] == $subsubkey["ID"]){ 
                                                            if ($subsubkey["ID_DOCUMENTO"] == 5) {
                                                                ?>
                                                                <div class="col-3  col-lg-2 col-xl-auto  padincol mostrarpanelportafolio">
                                                                    <div class="row">
                                                                        <div class="col contenedorimagenportfolio"> 
                                                                            <img id="imagen<?=uneysintildes($subsubkey["NOMBRE"])?>" src="<?=checkimagen($datosregistro["DIRECCION_DOCUMENTO"])?>" style="width: 100%;"> 
                                                                        </div>
                                                                    </div>
                                                                    <div class="row panelimagenportafolio">
                                                                        <div class="col-1">
                                                                            <img src="<?=assetgeneral()?>/img/infoicon.png"  >
                                                                        </div>
                                                                        <div class="col-1" onclick='mostrarImagen("<?=$datosregistro["DIRECCION_DOCUMENTO"]?>","imagen<?=uneysintildes($subsubkey["NOMBRE"])?>","inputfile<?=uneysintildes($subsubkey["NOMBRE"])?>","input<?=uneysintildes($subsubkey["NOMBRE"])?>")' >
                                                                            <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > 
                                                                        </div>
                                                                        <div class="col" >
                                                                            <span id="nombre<?=uneysintildes($subsubkey["NOMBRE"])?>" style="display: none"></span>
                                                                        </div>
                                                                        <?php if ($subsubkey["VIGENCIA"] == 1  ){ ?>
                                                                            <div class="col-1" >
                                                                                <img src="<?=assetgeneral()?>/img/calendar.png" onclick="capturavigencia('fechainicio<?=uneysintildes($subsubkey["NOMBRE"])?>','fechatermino<?=uneysintildes($subsubkey["NOMBRE"])?>',<?=$subsubkey["ID"]?>,'idvigencia<?=uneysintildes($subsubkey["NOMBRE"])?>')"> 
                                                                            </div> 
                                                                        <?php    }
                                                                        if ($datosregistro["DIRECCION_DOCUMENTO"] != "" ){ ?>

                                                                            <div class="col-1"> 
                                                                                <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/DESCARGAR.svg" onclick=" window.open('<?=base_url('portafolio/download/'.$subsubkey["ID"])?>')" > 
                                                                            </div> 
                                                                        <?php    } ?>

                                                                        <div class="col-1">

                                                                            <label  for="inputfile<?=uneysintildes($subsubkey["NOMBRE"])?>">
                                                                                <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                                                                            </label>
                                                                        </div> 
                                                                        <div class="col-1">
                                                                            <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  onclick="eliminar('<?=$datosregistro["ID"]?>')">
                                                                        </div> 
                                                                    </div> 
                                                                    <div class="row">
                                                                        <span class="titulodocportafolio"><?=$subsubkey["NOMBRE"]?></span>
                                                                    </div>
                                                                    <?php if ($subsubkey["VIGENCIA"] == 1  ){
                                                                        $boton = "boton".uneysintildes($subsubkey["NOMBRE"]);
                                                                        ?>
                                                                        <button type="button" onclick="capturavigencia('fechainicio<?=uneysintildes($subsubkey["NOMBRE"])?>','fechatermino<?=uneysintildes($subsubkey["NOMBRE"])?>')" id="boton<?=uneysintildes($subsubkey["NOMBRE"])?>" hidden="">miau</button>
                                                                        <input type="date" class="form-control" id="fechainicio<?=uneysintildes($subsubkey["NOMBRE"])?>" name="fechainicio<?=uneysintildes($subsubkey["NOMBRE"])?>"  value="<?=$datosregistro["VIGENCIA_FECHA_INICIO"]?>" hidden=""/>
                                                                        <input type="date" class="form-control" id="fechatermino<?=uneysintildes($subsubkey["NOMBRE"])?>" name="fechatermino<?=uneysintildes($subsubkey["NOMBRE"])?>"  value="<?=$datosregistro["VIGENCIA_FECHA_FIN"]?>" hidden=""/> <?php
                                                                    } else{$boton = "";} ?>
                                                                    <input type="file" id="inputfile<?=uneysintildes($subsubkey["NOMBRE"])?>" hidden=""  onchange="previewimagen('imagen<?=uneysintildes($subsubkey["NOMBRE"])?>','input<?=uneysintildes($subsubkey["NOMBRE"])?>','estension<?=uneysintildes($subsubkey["NOMBRE"])?>','nombre<?=uneysintildes($subsubkey["NOMBRE"])?>','inputfile<?=uneysintildes($subsubkey["NOMBRE"])?>','<?=$boton?>');" accept=".jpg,.png,.jpeg,.pdf" />
                                                                    <input type="text" name='input<?=uneysintildes($subsubkey["NOMBRE"])?>'  id="input<?=uneysintildes($subsubkey["NOMBRE"])?>" hidden="" value=""/>  
                                                                    <input type="text" name='id<?=uneysintildes($subsubkey["NOMBRE"])?>'  id="id<?=uneysintildes($subsubkey["NOMBRE"])?>" hidden="" value="<?=$datosregistro["ID"]?>"/>
                                                                    <input type="text" name='estension<?=uneysintildes($subsubkey["NOMBRE"])?>'  id="estension<?=uneysintildes($subsubkey["NOMBRE"])?>" hidden="" value="0"/>
                                                                    <input type="text" name='iddoc<?=uneysintildes($subsubkey["NOMBRE"])?>'  id="iddoc<?=uneysintildes($subsubkey["NOMBRE"])?>" hidden="" value="<?=$subsubkey["ID"]?>"/>
                                                                    <input type="text" name='idvigencia<?=uneysintildes($subsubkey["NOMBRE"])?>'  id="idvigencia<?=uneysintildes($subsubkey["NOMBRE"])?>" hidden="" value="<?=$datosregistro["ID_VIGENCIA"]?>"/>
                                                                    <input type="text" name='dirarchivo<?=uneysintildes($subsubkey["NOMBRE"])?>'  id="dirarchivo<?=uneysintildes($subsubkey["NOMBRE"])?>" hidden="" value="<?=$datosregistro["DIRECCION_DOCUMENTO"]?>"/>
                                                                </div> 
                                                            <?php } 
                                                            else { ?>
                                                                <div class="col-3  col-lg-2 col-xl-auto  padincol mostrarpanelportafolio">
                                                                    <div class="row">
                                                                        <div class="col contenedorimagenportfolio"> 
                                                                            <img id="imagen<?=uneysintildes($subsubkey["NOMBRE"]).$cont?>" src="<?=checkimagen($datosregistro["DIRECCION_DOCUMENTO"])?>" style="width: 100%;"> 
                                                                        </div>
                                                                    </div>
                                                                    <div class="row panelimagenportafolio">
                                                                        <div class="col-1">
                                                                            <img src="<?=assetgeneral()?>/img/infoicon.png"  >
                                                                        </div>
                                                                        <div class="col-1" onclick='mostrarImagen("<?=$datosregistro["DIRECCION_DOCUMENTO"]?>","imagen<?=uneysintildes($subsubkey["NOMBRE"]).$cont?>","inputfile<?=uneysintildes($subsubkey["NOMBRE"]).$cont?>","input<?=uneysintildes($subsubkey["NOMBRE"]).$cont?>")' >
                                                                            <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > 
                                                                        </div>
                                                                        <div class="col" >
                                                                            <span id="nombre<?=uneysintildes($subsubkey["NOMBRE"]).$cont?>" style="display: none"></span>
                                                                        </div>
                                                                        <div class="col-1"> 
                                                                            <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/DESCARGAR.svg"  onclick=" window.open('<?=base_url('portafolio/download/'.$subsubkey["ID"])?>')"> 
                                                                        </div> 

                                                                        <div class="col-1">

                                                                            <label  for="inputfile<?=uneysintildes($subsubkey["NOMBRE"]).$cont?>">
                                                                                <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >
                                                                            </label>
                                                                        </div> 
                                                                        <div class="col-1">
                                                                            <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  onclick="eliminarsub('<?=$datosregistro["ID"]?>','<?=uneysintildes($subsubkey["NOMBRE"])?>',<?=$cont?>)">
                                                                        </div> 
                                                                    </div> 
                                                                    <div class="row">
                                                                        <span class="titulodocportafolio"><?=$subsubkey["NOMBRE"]?></span>
                                                                    </div>
                                                                    <?php if ($subsubkey["VIGENCIA"] == 1  ){
                                                                        $boton = "boton".uneysintildes($subsubkey["NOMBRE"]);
                                                                        ?>
                                                                        <button type="button" onclick="capturavigencia('fechainicio<?=uneysintildes($subsubkey["NOMBRE"])?>','fechatermino<?=uneysintildes($subsubkey["NOMBRE"])?>')" id="boton<?=uneysintildes($subsubkey["NOMBRE"])?>" hidden="">miau</button>
                                                                        <input type="date" class="form-control" id="fechainicio<?=uneysintildes($subsubkey["NOMBRE"])?>" name="fechainicio<?=uneysintildes($subsubkey["NOMBRE"])?>"  value="<?=$datosregistro["VIGENCIA_FECHA_INICIO"]?>" hidden=""/>
                                                                        <input type="date" class="form-control" id="fechatermino<?=uneysintildes($subsubkey["NOMBRE"])?>" name="fechatermino<?=uneysintildes($subsubkey["NOMBRE"])?>"  value="<?=$datosregistro["VIGENCIA_FECHA_FIN"]?>" hidden=""/> <?php
                                                                    } else{$boton = "";} ?>
                                                                    <input type="file" id="inputfile<?=uneysintildes($subsubkey["NOMBRE"]).$cont?>"  hidden=""  onchange="previewimagencont('imagen<?=uneysintildes($subsubkey["NOMBRE"])?>','input<?=uneysintildes($subsubkey["NOMBRE"])?>','estension<?=uneysintildes($subsubkey["NOMBRE"])?>','nombre<?=uneysintildes($subsubkey["NOMBRE"])?>','inputfile<?=uneysintildes($subsubkey["NOMBRE"])?>','<?=$boton?>','<?=uneysintildes($subkey["NOMBRE"]).$subkey["ID"]?>',<?=$cont?>,'<?=$subsubkey["ID"]?>','iddoc<?=uneysintildes($subsubkey["NOMBRE"])?>');  " accept=".jpg,.png,.jpeg,.pdf" />
                                                                    <input type="text" name='input<?=uneysintildes($subsubkey["NOMBRE"]).$cont?>'  id="input<?=uneysintildes($subsubkey["NOMBRE"]).$cont?>" hidden="" value=""/>  
                                                                    <input type="text" name='id<?=uneysintildes($subsubkey["NOMBRE"]).$cont?>'  id="id<?=uneysintildes($subsubkey["NOMBRE"]).$cont?>" hidden="" value="<?=$datosregistro["ID"]?>"/>
                                                                    <input type="text" name='estension<?=uneysintildes($subsubkey["NOMBRE"]).$cont?>'  id="estension<?=uneysintildes($subsubkey["NOMBRE"]).$cont?>" hidden="" value="0"/>
                                                                    <input type="text" name='iddoc<?=uneysintildes($subsubkey["NOMBRE"]).$cont?>'  id="iddoc<?=uneysintildes($subsubkey["NOMBRE"]).$cont?>" hidden="" value="<?=$subsubkey["ID"]?>"/>
                                                                    <input type="text" name='idvigencia<?=uneysintildes($subsubkey["NOMBRE"]).$cont?>'  id="idvigencia<?=uneysintildes($subsubkey["NOMBRE"]).$cont?>" hidden="" value="<?=$datosregistro["ID_VIGENCIA"]?>"/>
                                                                    <input type="text" name='dirarchivo<?=uneysintildes($subsubkey["NOMBRE"]).$cont?>'  id="dirarchivo<?=uneysintildes($subsubkey["NOMBRE"]).$cont?>" hidden="" value="<?=$datosregistro["DIRECCION_DOCUMENTO"]?>"/>
                                                                </div> 
                                                            <?php } $cont++;
                                                        }
                                                    }
                                                }
                                            } ?>


                                            <?php if ($subsubkey["ID_DOCUMENTO"] != 5){ ?>
                                                <input type="text" name="contador<?=uneysintildes($subkey["NOMBRE"]).$subkey["ID"]?>" id="contador<?=uneysintildes($subkey["NOMBRE"]).$subkey["ID"]?>" value="<?=$cont?>" hidden="">    
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }  if ($subkey["NIVEL"] == 3){ ?>
                                <div id="<?=uneysintildes($subkey["NOMBRE"]).$subkey["ID"]?>" style="display: none;">
                                    <div class="row " id="">
                                        <div class="col" id="">
                                            <div class="row  mb-4" >
                                                <div class="col  letratituloedicion">
                                                    <span><?=$key["NOMBRE"]." / ".$subkey["NOMBRE"]?></span>
                                                </div>
                                                <div class="col-3  lineainferiorosita">
                                                </div>
                                                <div class="col-3">Total de documentos
                                                    <?php $cont = 0;
                                                    foreach ($datos["subniveltres"] as $datosniveltres){
                                                        if ($datosniveltres["ID"] == $subkey["ID"]){
                                                            $cont++;
                                                        }
                                                    }  
                                                    echo  $cont; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="row" id="<?=uneysintildes($subkey["NOMBRE"]).$subkey["ID"]?>row">
                                            <div class="col-3  col-lg-2 col-xl-auto  contenedorimagenportfolio " ondblclick="$('#<?=convert_accented_characters(quitarsimbolos($key["NOMBRE"].$key["ID"]))?>').css('display','block');$('#<?=uneysintildes($subkey["NOMBRE"]).$subkey["ID"]?>').css('display','none')">
                                                <div class="row"   style="margin:auto;" >
                                                    <div class="col  contenedorimagenportfolio">
                                                        <img id="" src="<?=assetgeneral()?>/img/foldeout.png" style="width: 100%;"  /> 
                                                    </div> 
                                                </div>
                                            </div> 
                                            <?php

                                            foreach ($datos["subniveltres"] as $datosniveltres){ 
                                                if ($subkey["ID"] == $datosniveltres["ID"]){ 
                                                    ?>
                                                    <div class="col-3  col-lg-2 col-xl-auto  padincol mostrarpanelportafolio">
                                                        <div class="row">
                                                            <div class="col contenedorimagenportfolio"> 
                                                                <img id="imagen<?=uneysintildes($subkey["NOMBRE"])?>" src="<?=checkimagen($datosniveltres["DIRECCION_IMAGEN_RECONOCIMIENTO"])?>" style="width: 100%;"> 
                                                            </div>
                                                        </div>
                                                        <div class="row panelimagenportafolio">
                                                            <div class="col-1">
                                                                <img src="<?=assetgeneral()?>/img/infoicon.png"  />
                                                            </div>
                                                            <div class="col-1" onclick='mostrarImagen("<?=$datosniveltres["DIRECCION_IMAGEN_RECONOCIMIENTO"]?>","imagen<?=uneysintildes($subkey["NOMBRE"])?>","","")'>
                                                                <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" /> 
                                                            </div>
                                                            <div class="col" >
                                                                <span id="nombre<?=uneysintildes($subkey["NOMBRE"])?>" style="display: none"></span>
                                                            </div>
                                                            <div class="col-1"> 
                                                                <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/DESCARGAR.svg" onclick=" window.open('<?=base_url('portafolio/download/'.$datosniveltres["IDEXTERNO"].'/3/'.$datosniveltres["ID"])?>')" /> 
                                                            </div> 

                                                            <div class="col-1">

                                                               <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg" onclick="redireccion('<?=$datosniveltres["URL"]?>',1)" >
                                                           </div>  
                                                       </div>  

                                                   </div>

                                               <?php   } } ?>

                                           </div>
                                       </div>
                                   </div>
                                   <?php
                               }
                           }
                       } ?>
                   </form>
               </div>
           </div>
       </div>

       <div class="modal fade" id="vigencias" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"   aria-hidden="true"  >
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content"> 
                <div class="modal-header">
                    <h5 class="modal-title" id="titulo">Capturar Vigencia</h5> 
                </div>
                <div class="modal-body" >  
                    <div class="row" id="anosocultas" style="display:  none;">
                        <div class="col">
                            <label for=" ">Año Emisión</label>
                            <select class="form-control" onchange="cambiosanos()" id="anoinicio"> 
                            </select>
                        </div>
                        <div class="col"> 
                            <label for=" ">Duracion en Años</label>
                            <select class="form-control" id="duracionanosvigencia" onchange="cambiosanos()">
                                <option></option>
                            </select> 
                        </div>
                        <div class="col">
                            <label for="fechatermino">Año Expiración</label>
                            <select class="form-control" id="anofin" >

                            </select>
                        </div>
                    </div>  
                    <div class="row" id="spinmodal" style="display: none;">
                        <div class="col">
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="row" id="fechasocultas" style="display:  none;">
                        <div class="col">
                            <label for="fechainicio">Fecha Emisión</label>
                            <input type="date" class="form-control" id="fechainicio" >
                        </div>
                        <div class="col">
                            <label for="fechatermino">Fecha Expiración</label>
                            <input type="date" class="form-control" id="fechatermino" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <small id="avisovigencia" style="color: red; display: none;">Favor de llenar los campos</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn  " id="confirmofecha"    style="color: white; background-color: #239dff">Aceptar</button> 

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


</section>


<script type="text/javascript">
    function redireccion(url,confirm) {
        if (confirm == 1) {
           $('#confirm').modal('show');
           $("#mensajeconfirmacion").html("Para Agregar un Nuevo Documento en Esta Carpeta, es Necesario Hacerlo Desde el Modulo <br> ¿Desea Salir del Portafolio?");
           $("#botonconfirm").attr("onclick","redireccion('"+url+"',2)");
       }  
       if (confirm == 2) {
        location.href = url;
    }

}
function eliminar(id) {
    $.ajax({
        type: 'ajax',
        method: 'post',
        url: '<?=base_url('portafolio/eliminar')?>',
        async: true, 
        data: {id: id},
        success: function(response){
            if (response == 1) {
                $('#alert').modal('show');
                $("#mensajealerta").html("Se Elimino Correctamente el Documento");
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
function eliminarsub(id,nombre,cont) {

    if (id != 0) {
        $.ajax({ 
            type: 'ajax',
            method: 'post',
            url: '<?=base_url('portafolio/eliminarsubregistro')?>',
            async: true, 
            data: {id: id,
                cont: cont},
                success: function(response){
                    if (response == 1) {
                        $('#alert').modal('show');
                        $("#mensajealerta").html("Se Elimino Correctamente el Documento");
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
    else{

    }
}
function previewimagen(img,input,estension,nombre,inputfile,boton) 
{
    var fileInput = document.getElementById(inputfile);  
    var files = Array.from(fileInput.files);
    files = files.map(file => file.name);
    console.log(files);
    $("#"+nombre).html(files);

    nombre = $("#"+nombre).html().split('.').pop(); 
    $("#"+estension).val(nombre); 

    var reader = new FileReader();
    reader.onload = function()
    {
        var output = document.getElementById(img);
        output.src = reader.result;
        $("#"+input).val(reader.result); 
    }
    reader.readAsDataURL(event.target.files[0]); 
    setTimeout(function(){
       if (nombre == "pdf") {
        $("#"+img).attr("src","<?=assetgeneral()?>/img/pdf.png");
        return;
    } },50) ;

    if (boton != "") {
        $("#"+boton).trigger("click");
    }
}

function previewimagencont(img,input,estension,nombre,inputfile,boton,lugar,numero,id,iddoc) 
{
    var nomre = nombre; 
    var fileInput = document.getElementById(inputfile+numero);  
    var files = Array.from(fileInput.files);
    files = files.map(file => file.name);
    console.log(files);
    $("#"+nombre+numero).html(files);

    nombre = $("#"+nombre+numero).html().split('.').pop(); 
    $("#"+estension+numero).val(nombre); 

    var reader = new FileReader();
    reader.onload = function()
    {
        var output = document.getElementById(img+numero);
        output.src = reader.result;
        $("#"+input+numero).val(reader.result); 
    }
    reader.readAsDataURL(event.target.files[0]); 
    setTimeout(function(){
       if (nombre == "pdf") {
        $("#"+img).attr("src","<?=assetgeneral()?>/img/pdf.png");
        return;
    } },50) ;

    if (boton != "") {
        $("#"+boton).trigger("click");
    }
    if (numero == ($("#contador"+lugar).val()-1)) {
        clona(img,input,estension,nomre,inputfile,boton,lugar,numero,id,iddoc);
    }
}

function clona(img,input,estension,nombre,inputfile,boton,lugar,numero,id,iddoc) {
    numero = Number(numero) + Number(1);
    numero = $("#contador"+lugar).val();
    agregado = iddoc.replace("iddoc", "");
    c = "'"; 
    var x ='  <div class="col-3  col-lg-2 col-xl-auto  padincol mostrarpanelportafolio">';
    x+=' <div class="row">';
    x+=' <div class="col contenedorimagenportfolio"> ';
    x+=' <img id="'+img+numero+'" src="../assets/img/masgris.png" style="width: 100%;"> ';
    x+='  </div>';
    x+='  </div>';
    x+=' <div class="row panelimagenportafolio">';
    x+='   <div class="col-1">';
    x+='  <img src="<?=assetgeneral()?>/img/infoicon.png"  >';
    x+='  </div>';
    x+=' <div class="col-1">';
    x+='  <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/VER.svg" > ';
    x+=' </div>';
    x+='  <div class="col" >';
    x+='  <span id="'+nombre+numero+'" style="display: none"></span>';
    x+=' </div>';
    x+=' <div class="col-1"> ';
    x+=' <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/DESCARGAR.svg"  > ';
    x+=' </div> '; 
    x+=' <div class="col-1">'; 
    x+=' <label  for="'+inputfile+numero+'">';
    x+='  <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/SUBIR.svg"  >';
    x+=' </label>';
    x+=' </div> ';
    x+=' <div class="col-1">';
    x+=' <img src="<?=assetmiperfil()?>/img/ICONOS/SVG/ELEIMINAR.svg"  onclick="eliminarsub(0,'+c+agregado+c+','+c+numero+c+')">';
    x+=' </div> ';
    x+='   </div>  ';
    x+=' <input type="file" id="'+inputfile+numero+'" hidden=""  onchange="previewimagencont('+c+img+c+','+c+input+c+','+c+estension+c+','+c+nombre+c+','+c+inputfile+c+','+c+boton+c+','+c+lugar+c+','+c+numero+c+','+c+id+c+','+c+iddoc+c+');" accept=".jpg,.png,.jpeg,.pdf" />';
    x+='   <input type="text" name="'+input+numero+'"  id="'+input+numero+'" hidden="" value=""/>  ';
    x+=' <input type="text" name="id'+agregado+numero+'"  id="id'+agregado+numero+'" hidden="" value="0"/>';
    x+=' <input type="text" name="'+estension+numero+'"  id="'+estension+numero+'" hidden="" value="0"/>';
    x+=' <input type="text" name="'+iddoc+numero+'"  id="'+iddoc+numero+'" hidden="" value="'+id+'"/>';
    x+=' <input type="text" name="dirarchivo'+agregado+numero+'"  id="dirarchivo'+agregado+numero+'" hidden="" value=""/>';
    x+= '<input type="text" name="idvigencia'+agregado+numero+'"  id="idvigencia'+agregado+numero+'" hidden="" value="0"/>';
    x+=' </div>';
    $('#'+lugar+"row").append(x);
    $("#contador"+lugar).val(Number($("#contador"+lugar).val())+Number(1))
}
function consultasubcarpeta(idpadre,niveldoc) 
{
    var fileInput = document.getElementById(inputfile);  
    var files = Array.from(fileInput.files);
    files = files.map(file => file.name);
    console.log(files);
    $("#"+nombre).html(files);

    nombre = $("#"+nombre).html().split('.').pop(); 
    $("#"+estension).val(nombre); 

    var reader = new FileReader();
    reader.onload = function()
    {
        var output = document.getElementById(img);
        output.src = reader.result;
        $("#"+input).val(reader.result); 
    }
    reader.readAsDataURL(event.target.files[0]); 
    setTimeout(function(){
        if (nombre == "pdf") {
            $("#"+img).attr("src","<?=assetgeneral()?>/img/pdf.png");
            return;
        } },50) ;

}
function capturavigencia(fechainiciosoli,fechaterminosoli,id,inputid) 
{  
 $("#spinmodal").css("display","block");
 $.ajax({ 
    type: 'post', 
    url: '<?=base_url('portafolio/consultavigencia')?>', 
    dataType : 'json',
    data: {id: id, },
    success: function(response){



        $("#spinmodal").css("display","none"); 
        if (response.length === 1) { 
            console.log(response[0].ID);
            console.log(response[0].DURACION+" duracion");
            console.log(response[0].TIPO_FECHA+" tipofecha");
            console.log(response[0].TIPO_VIGENCIA+" TIPO_VIGENCIA"); 
            if (response[0].TIPO_VIGENCIA === "MES") {
                $("#fechasocultas").css("display","block");
                $("#fechainicio").attr("onchange","vigenciames("+response[0].DURACION+")" ) 
                $("#"+inputid).val(response[0].ID)
            }
            if (response[0].TIPO_VIGENCIA === "ANIO") {
             $("#anosocultas").css("display","block"); 
             var x = "";
             x+= '<option  > </option>' 
             for (var i = response.length - 1; i >= 0; i--) {
            if ($("#"+inputid).val() == response[i].ID ) {
               x+= '<option data-id="'+response[i].ID+'" selected >'+response[i].DURACION+'</option>' 
            }
            else{
                x+= '<option data-id="'+response[i].ID+'" >'+response[i].DURACION+'</option>' 
            }
          
        }
           var c = "'";
        $("#anoinicio").attr("onchange",'cambiosanos('+c+inputid+c+')')
        $("#duracionanosvigencia").attr("onchange",'cambiosanos('+c+inputid+c+')')
        $("#duracionanosvigencia").html(x);
        $("#fechainicio").attr("onchange","vigenciaano("+response[0].DURACION+")" )
         if ($("#"+fechainiciosoli).val() != "" ) {
            var date = new Date($("#"+fechainiciosoli).val());   
            var x = ""; 
            console.log($("#"+fechainiciosoli).val())
            console.log(date)
            for (var i = 2019; i >= 1900; i--) {
                if ( (date.getFullYear()+Number(1)) == i ) {
                    x+= '<option selected>'+i+'</option>' 
                }
                else{
                 x+= '<option  >'+i+'</option>' 
             }

         }
         $("#anoinicio").html(x);
         var anoant = date.getFullYear();
         var x = ""; 
         var date = new Date($("#"+fechaterminosoli).val());  
         for (var i = date.getFullYear()+Number(1); i >= anoant; i--) {
            if ( (date.getFullYear()+Number(1)) == i ) {
                x+= '<option selected>'+i+'</option>' 
            }
            else{
             x+= '<option  >'+i+'</option>' 
         }

     }
     $("#anofin").html(x);
 }

        }
    }
    if (response.length > 1) {


        if (response[0].TIPO_VIGENCIA === "MES") {
            $("#fechasocultas").css("display","block");
            $("#fechainicio").attr("onchange","vigenciames("+response[0].DURACION+")" )
        }
        if (response[0].TIPO_VIGENCIA === "ANIO") {
         $("#anosocultas").css("display","block"); 

         var x = "";
         x+= '<option  > </option>' 
         for (var i = response.length - 1; i >= 0; i--) {
            if ($("#"+inputid).val() == response[i].ID ) {
               x+= '<option data-id="'+response[i].ID+'" selected >'+response[i].DURACION+'</option>' 
            }
            else{
                x+= '<option data-id="'+response[i].ID+'" >'+response[i].DURACION+'</option>' 
            }
          
        }
        var c = "'";
        $("#anoinicio").attr("onchange",'cambiosanos('+c+inputid+c+')')
        $("#duracionanosvigencia").attr("onchange",'cambiosanos('+c+inputid+c+')')
        $("#duracionanosvigencia").html(x);
        $("#fechainicio").attr("onchange","vigenciaano("+response[0].DURACION+")" ) 

        if ($("#"+fechainiciosoli).val() != "" ) {
            var date = new Date($("#"+fechainiciosoli).val());   
            var x = ""; 
            console.log($("#"+fechainiciosoli).val())
            console.log(date)
            for (var i = 2019; i >= 1900; i--) {
                if ( (date.getFullYear()+Number(1)) == i ) {
                    x+= '<option selected>'+i+'</option>' 
                }
                else{
                 x+= '<option  >'+i+'</option>' 
             }

         }
         $("#anoinicio").html(x);
         var anoant = date.getFullYear();
         var x = ""; 
         var date = new Date($("#"+fechaterminosoli).val());  
         for (var i = date.getFullYear()+Number(1); i >= anoant; i--) {
            if ( (date.getFullYear()+Number(1)) == i ) {
                x+= '<option selected>'+i+'</option>' 
            }
            else{
             x+= '<option  >'+i+'</option>' 
         }

     }
     $("#anofin").html(x);
 }
}
}
},
error: function () {
   alert('Hubo un error, intente mas tarde'); 
}
}) ; 

 $("#fechainicio").val($("#"+fechainiciosoli).val())
 $("#fechatermino").val($("#"+fechaterminosoli).val())
 $('#vigencias').modal( {
    backdrop: "static",
    show: true
});
 $("#confirmofecha").attr("onclick","confirmandofecha('"+fechainiciosoli+"','"+fechaterminosoli+"')")

}
function vigenciames(cant) {


    var date = new Date($("#fechainicio").val());  
    date = new Date(date.setMonth(date.getMonth() + cant));  
    mnth = ("0" + (date.getMonth() + 1)).slice(-2),
    day = ("0" + date.getDate()).slice(-2); 
    $("#fechatermino").val([date.getFullYear(), mnth, day].join("-"));
}
function vigenciaano(cant) {
    var fechainiciom = $("#fechainicio").val();
    var fechafinm = $("#fechatermino").val();
}
function cambiosanos(input) {

    var x = "";
    for (var i = (Number($("#anoinicio").val())+Number($("#duracionanosvigencia").val())); $("#anoinicio").val()<= i; i--) {
        x+= '<option  >'+i+'</option>' 
    }
    $("#anofin").html(x); 
    $("#"+input).val($("#duracionanosvigencia option:selected").data("id"));
    var fecha = "01-01-"+$("#anoinicio").val()
    var date = new Date(fecha);


    mnth = ("0" + (date.getMonth() + 1)).slice(-2),
    day = ("0" + date.getDate()).slice(-2);
    console.log([date.getFullYear(), mnth, day].join("-"))

    $("#fechainicio").val([date.getFullYear(), mnth, day].join("-"));



    var anosmas = Number($("#duracionanosvigencia").val())*12
    date = new Date(date.setMonth(date.getMonth() + anosmas)); 
    console.log(date);
    mnth = ("0" + (date.getMonth() + 1)).slice(-2),
    day = ("0" + date.getDate()).slice(-2);
    console.log([date.getFullYear(), mnth, day].join("-"))
    $("#fechatermino").val([date.getFullYear(), mnth, day].join("-"));
}
function confirmandofecha(fechainiciosoli,fechaterminosoli) 
{  
    var fechainiciom = $("#fechainicio").val();
    var fechafinm = $("#fechatermino").val();

    if ((fechafinm == "" && fechainiciom == "") || (fechafinm != "" && fechainiciom == "") || (fechafinm == "" && fechainiciom != "")) {
        $("#avisovigencia").css("display","block")
    }
    else{
        $("#"+fechainiciosoli).val($("#fechainicio").val())
        $("#"+fechaterminosoli).val($("#fechatermino").val())
        $("#avisovigencia").css("display","none")
        $('#vigencias').modal('hide');
        $("#fechasocultas").css("display","none");
        $("#anosocultas").css("display","none"); 
    }



}
function editar() {

    var data  = $("#formportaforlio").serialize();
    var url = $("#formportaforlio").attr('action');
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
                editarsub() 

                return ;
            }
            if (response == 2) {
                editarsub() 

                return ;
            }
            if (response == "") {
                $('#alert').modal('show');
                $("#mensajealerta").html("Ocurrio un problema al agregar/editar los Documentos");
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
function editarsub() {

    var data  = $("#formportaforlio").serialize();
    var url = '<?=base_url('portafolio/agregarsubdocs')?>';
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
                $("#mensajealerta").html("Se Agregaron Correctamente los Documentos");
                $("#alert").attr("onclick","recargapagina()"); 

                return ;
            }
            if (response == 2) {
                $('#alert').modal('show');
                $("#mensajealerta").html("Se Editaron Correctamente los Documentos");
                $("#alert").attr("onclick","recargapagina()"); 

                return ;
            }if (response == "") {
                $('#alert').modal('show');
                $("#mensajealerta").html("Ocurrio un problema al agregar/editar los Documentos");
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
    location.href = "<?=base_url('portafolio')?>";
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

function quitarImagen (idImagen,objetofile) {
   $("#"+idImagen).attr("src","<?=assetgeneral()?>/img/masgris.png ");
   var $el = $('#'+objetofile); 
   $el.wrap('<form>').closest('form').get(0).reset(); 
   $el.unwrap();
}

</script>