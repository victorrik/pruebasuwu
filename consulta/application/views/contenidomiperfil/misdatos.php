 
<?php
error_reporting(0);
// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
date_default_timezone_set("America/Mexico_City");


// Imprime algo como: Monday 8th of August 2005 03:12:46 PM
setlocale(LC_TIME, "spanish");
$mes = date('n',strtotime($datos["inforpersonal"][0]["FECHA_MOD_US"]));
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
function funmes($mes)
{
        switch ($mes) {
    case 1:
    return 'Enero';
    break;
    case 2:
    return 'Febrero';
    break;
    case 3:
    return 'Marzo';
    break;
    case 4:
    return 'Abril';
    break;
    case 5:
    return 'Mayo';
    break;
    case 6:
    return 'Junio';
    break;
    case 7:
    return 'Julio';
    break;
    case 8:
    return 'Agosto';
    break;
    case 9:
    return 'Septiembre';
    break;
    case 10:
    return 'Octubre';
    break;
    case 11:
    return 'Noviembre';
    break;
    case 12:
    return 'Dicciembre';
    break; 

    default:"problema en el registro";

    break;
}
}



?>
<section class="content-header mt-2">

    <div class="row mt-2 mb-1">
        <div class="col-7"   > 
            <h2 class="letramiperfil">
                Mi perfil
                <span class="letrasubperfil" > 
                    Resumen gráfico (moderno e infográfico) de la CV
                </span> 
            </h2> 
            <div class="row">
                <div class="col">
                    <span class="lasupdate">Última Actualización </span>
                    <span class="datelastupdate"><?php if (!empty($datos["inforpersonal"][0]["FECHA_MOD_US"])){echo date('d/',strtotime($datos["inforpersonal"][0]["FECHA_MOD_US"])).$mes.date('/Y H:i:s',strtotime($datos["inforpersonal"][0]["FECHA_MOD_US"])); }?></span>
                </div>
            </div>

        </div>

        <div class="col-5 alinearderecha" > 

            <h2 class="  "> Avance General 30%</h2>

        </div>
    </div>
</section>
<!-- Main content -->
<section class="content margencontenido"  >
  <!--   <div style="width: 25px; height: 20px;position: relative;top: -10px;left: -40px; background-color: white"></div> -->
                    <!--    <div style="width:  5px; height: 500px;position: relative;top: 0px;left: 0px; background-color: rgb(230,230,230);z-index: 999"></div>
                       Small boxes (Stat box) -->
                       <div class="row lineaseparado mt-3">
                        <div class="col">
                            <div class="row">
                                <div class="col-4 ltinfop">
                                    <i class="fa  fa-caret-down"></i>
                                    Información personal 
                                </div>
                                <div class="col-8"> 
                                    <div class="alinearderecha">

                                        <span><a href="<?=base_url('/configuracion/informacionpersonal')?>" class="botoneditar"> </a></span>
                                    </div>   
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row  ">
                                <div class="col-xl-5 col-lg-12  ">
                                    <div class="row">
                                        <div class="col-4 infoletnegras">Nombre
                                        </div>
                                        <div class="col infoletred"><?=$datos["inforpersonal"][0]["NOMBRE"]?> <?=$datos["inforpersonal"][0]["AP_PATERNO"]?> <?=$datos["inforpersonal"][0]["AP_MATERNO"]?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 infoletnegras">Edad
                                        </div>
                                        <div class="col infoletred"><?=edad($datos["inforpersonal"][0]["FECHA_NACIMIENTO"])?> Años
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 infoletnegras">Estado civil </div>
                                        <div class="col infoletred">
                                            <?php $sexo = "a"; if($datos["inforpersonal"][0]["SEXO"]== 2){ $sexo= "o";}   switch ($datos["inforpersonal"][0]["ESTADO_CIVIL"]) {
                                                case    1:
                                                echo "Solter".$sexo;
                                                break;
                                                case    2:
                                                echo "Noviazgo";
                                                break;
                                                case    3:
                                                echo "Casad".$sexo;
                                                break;
                                                case    4:
                                                echo "Union Libre";
                                                break;

                                                default:
                                                echo "Si ve esto, hay un error, favor de reportar";
                                                break;
                                            } ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 infoletnegras" style="padding-right: 0px;">Residencia actual </div>
                                        <div class="col infoletred"><?=$datos["inforpersonal"][0]["DELEGACION"]?>, <?=$datos["inforpersonal"][0]["ESTADO"]?>, <?=$datos["inforpersonal"][0]["PAIS"]?> </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <!-- /.col -->
                                <div class="col-xl-7 col-lg-12 ">
                                    <div class="row ">
                                        <div class="col-xl-3  col-md-12 infoletnegras" style="padding-right: 0px;">Dirección actual </div>
                                        <div class="col-xl-9  col-md-12 infoletred"><?=  $datos["inforpersonal"][0]["CALLE"]?>. <?=$datos["inforpersonal"][0]["NO_INTERIOR"]?>, <?=$datos["inforpersonal"][0]["NO_EXTERIOR"]?>,<?=$datos["inforpersonal"][0]["COLONIA"]?>, C.P. <?=$datos["inforpersonal"][0]["COD_POSTAL"]?> </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-7 col-md-12 infoletgrays">
                                            <div class="icoinfo">
                                                <svg version="1.1" id="idtelinfoico" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64 64" style="enable-background:new 0 0 64 64;" xml:space="preserve">
                                                    <path class="icoinfo" d="M55.5,55.44c-0.13,0.92-0.61,1.62-1.44,2.09l-9.79,5.53c-0.45,0.29-1,0.5-1.63,0.61
                                                    c-0.63,0.12-1.23,0.14-1.79,0.07c-0.04-0.01-0.16-0.03-0.36-0.07c-0.2-0.03-0.45-0.09-0.76-0.18c-0.73-0.2-1.89-0.65-3.46-1.35
                                                    s-3.41-1.87-5.51-3.5c-2.1-1.63-4.39-3.85-6.86-6.64c-2.47-2.79-4.94-6.37-7.39-10.74c-1.97-3.4-3.51-6.56-4.62-9.48
                                                    c-1.11-2.92-1.92-5.56-2.44-7.92c-0.52-2.36-0.81-4.46-0.89-6.28c-0.08-1.83-0.05-3.37,0.09-4.64s0.32-2.25,0.55-2.93
                                                    s0.35-1.06,0.37-1.14c0.23-0.52,0.55-1.02,0.97-1.51c0.42-0.49,0.88-0.85,1.36-1.09l9.81-5.59c0.69-0.39,1.38-0.49,2.07-0.3
                                                    c0.5,0.14,0.91,0.4,1.21,0.8c0.31,0.4,0.54,0.84,0.69,1.34l2.98,13.45c0.18,0.71,0.09,1.41-0.27,2.11
                                                    c-0.36,0.69-0.85,1.22-1.49,1.58l-3.61,2.06c-0.1,0.06-0.2,0.16-0.31,0.32c-0.11,0.16-0.17,0.29-0.21,0.41
                                                    c-0.07,0.85,0.03,1.87,0.28,3.06c0.21,1.05,0.61,2.38,1.21,3.97s1.55,3.51,2.85,5.73c1.25,2.25,2.42,4.05,3.5,5.41
                                                    c1.08,1.35,2.01,2.39,2.79,3.1c0.78,0.71,1.4,1.18,1.85,1.41l0.68,0.34c0.08,0.02,0.21,0.03,0.4,0.02
                                                    c0.19-0.01,0.33-0.04,0.43-0.1L41,42.94c0.86-0.43,1.76-0.51,2.69-0.26c0.66,0.18,1.15,0.44,1.47,0.78l0.06,0.02l9.37,9.66
                                                    C55.25,53.86,55.56,54.63,55.5,55.44z"/> 
                                                </svg>
                                            </div>
                                            <span class="phone_with_ddd"> <?=" ".$datos["inforpersonal"][0]["TELEFONO_CASA"]?> </span>

                                        </div>
                                        <div class="col-lg-5 col-md-12 infoletgrays">
                                            <div class="icoinfo ">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 418.135 418.135" style="enable-background:new 0 0 418.135 418.135;" xml:space="preserve"> 
                                                    <path style="fill:#7AD06D;" d="M198.929,0.242C88.5,5.5,1.356,97.466,1.691,208.02c0.102,33.672,8.231,65.454,22.571,93.536   L2.245,408.429c-1.191,5.781,4.023,10.843,9.766,9.483l104.723-24.811c26.905,13.402,57.125,21.143,89.108,21.631   c112.869,1.724,206.982-87.897,210.5-200.724C420.113,93.065,320.295-5.538,198.929,0.242z M323.886,322.197   c-30.669,30.669-71.446,47.559-114.818,47.559c-25.396,0-49.71-5.698-72.269-16.935l-14.584-7.265l-64.206,15.212l13.515-65.607   l-7.185-14.07c-11.711-22.935-17.649-47.736-17.649-73.713c0-43.373,16.89-84.149,47.559-114.819   c30.395-30.395,71.837-47.56,114.822-47.56C252.443,45,293.218,61.89,323.887,92.558c30.669,30.669,47.559,71.445,47.56,114.817   C371.446,250.361,354.281,291.803,323.886,322.197z"/>
                                                    <path style="fill:#7AD06D;" d="M309.712,252.351l-40.169-11.534c-5.281-1.516-10.968-0.018-14.816,3.903l-9.823,10.008   c-4.142,4.22-10.427,5.576-15.909,3.358c-19.002-7.69-58.974-43.23-69.182-61.007c-2.945-5.128-2.458-11.539,1.158-16.218   l8.576-11.095c3.36-4.347,4.069-10.185,1.847-15.21l-16.9-38.223c-4.048-9.155-15.747-11.82-23.39-5.356   c-11.211,9.482-24.513,23.891-26.13,39.854c-2.851,28.144,9.219,63.622,54.862,106.222c52.73,49.215,94.956,55.717,122.449,49.057   c15.594-3.777,28.056-18.919,35.921-31.317C323.568,266.34,319.334,255.114,309.712,252.351z"/> 
                                                </svg>
                                            </div> 
                                            <span class="phone_with_ddd"> <?=" ".$datos["inforpersonal"][0]["TELEFONO_CELULAR"]?> </span>


                                        </div> 
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-7 col-md-12 infoletgrays">
                                        <div class="icoinfo">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 408.788 408.788" style="enable-background:new 0 0 408.788 408.788;" xml:space="preserve">
                                                <path style="fill:#475993;" d="M353.701,0H55.087C24.665,0,0.002,24.662,0.002,55.085v298.616c0,30.423,24.662,55.085,55.085,55.085  h147.275l0.251-146.078h-37.951c-4.932,0-8.935-3.988-8.954-8.92l-0.182-47.087c-0.019-4.959,3.996-8.989,8.955-8.989h37.882  v-45.498c0-52.8,32.247-81.55,79.348-81.55h38.65c4.945,0,8.955,4.009,8.955,8.955v39.704c0,4.944-4.007,8.952-8.95,8.955  l-23.719,0.011c-25.615,0-30.575,12.172-30.575,30.035v39.389h56.285c5.363,0,9.524,4.683,8.892,10.009l-5.581,47.087  c-0.534,4.506-4.355,7.901-8.892,7.901h-50.453l-0.251,146.078h87.631c30.422,0,55.084-24.662,55.084-55.084V55.085  C408.786,24.662,384.124,0,353.701,0z"/> 
                                            </svg>
                                        </div>
                                        <?=$datos["inforpersonal"][0]["FCEBOOK"]?>


                                    </div>
                                    <div class="col-lg-5 col-md-12 infoletgrays">
                                        <div class="icoinfo">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 382 382" style="enable-background:new 0 0 382 382;" xml:space="preserve">
                                                <path style="fill:#0077B7;" d="M347.445,0H34.555C15.471,0,0,15.471,0,34.555v312.889C0,366.529,15.471,382,34.555,382h312.889  C366.529,382,382,366.529,382,347.444V34.555C382,15.471,366.529,0,347.445,0z M118.207,329.844c0,5.554-4.502,10.056-10.056,10.056  H65.345c-5.554,0-10.056-4.502-10.056-10.056V150.403c0-5.554,4.502-10.056,10.056-10.056h42.806  c5.554,0,10.056,4.502,10.056,10.056V329.844z M86.748,123.432c-22.459,0-40.666-18.207-40.666-40.666S64.289,42.1,86.748,42.1  s40.666,18.207,40.666,40.666S109.208,123.432,86.748,123.432z M341.91,330.654c0,5.106-4.14,9.246-9.246,9.246H286.73  c-5.106,0-9.246-4.14-9.246-9.246v-84.168c0-12.556,3.683-55.021-32.813-55.021c-28.309,0-34.051,29.066-35.204,42.11v97.079  c0,5.106-4.139,9.246-9.246,9.246h-44.426c-5.106,0-9.246-4.14-9.246-9.246V149.593c0-5.106,4.14-9.246,9.246-9.246h44.426  c5.106,0,9.246,4.14,9.246,9.246v15.655c10.497-15.753,26.097-27.912,59.312-27.912c73.552,0,73.131,68.716,73.131,106.472  L341.91,330.654L341.91,330.654z"/> 
                                            </svg>
                                        </div>
                                        <?=$datos["inforpersonal"][0]["LINKEDIN"]?>


                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7 col-md-12 infoletgrays">
                                        <div class="icoinfo">
                                            <svg version="1.1" id="idmailico" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64 64" style="enable-background:new 0 0 64 64;" xml:space="preserve">
                                                <path class="icoinfo" d="M32,41.15l-7.92-6.93L1.43,53.63c0.82,0.76,1.93,1.24,3.16,1.24h54.81c1.22,0,2.33-0.48,3.15-1.24
                                                L39.92,34.21L32,41.15z"/>
                                                <path class="icoinfo" d="M62.57,10.37c-0.82-0.77-1.93-1.24-3.16-1.24H4.59c-1.22,0-2.33,0.48-3.15,1.25L32,36.57L62.57,10.37z"/>
                                                <polygon class="icoinfo" points="-0.01,13.15 -0.01,51.14 22.09,32.36 			"/>
                                                <polygon class="icoinfo" points="41.91,32.36 64.01,51.14 64.01,13.14 			"/> 
                                            </svg>
                                        </div>
                                        <?=$datos["inforpersonal"][0]["CORREO"]?>

                                    </div>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <!-- Table row -->
                    </div>
                    <!-- ./col -->
                    <!-- ./col -->
                </div>
                <div class="row lineaseparado">
                    <div class="col">
                        <div class="row">
                            <div class="col-4 ltinfop">
                                <i class="fa  fa-caret-down"></i>
                                Perfil laboral
                            </div>
                            <div class="col-8">
                                <div class="alinearderecha">
                                    <span class="lasupdate">Total experiencias laborales </span>
                                    <span class="datelastupdate">4</span>
                                    <span><a href="<?=base_url('/configuracion/experienciaprofesional')?>" class="botoneditar"> </a></span>
                                </div>  
                            </div> 
                        </div>
                        <div class="row infoletnegras">
                            <div class="col ">Especialidad gastronómica
                            </div>
                            <div class="col  ">Estatus laboral
                            </div>
                            <div class="col  ">Experiencia laboral 
                            </div>
                        </div>
                        <?php 
                        switch ($datos["inforpersonal"][0]["ESTATUS_LABORAL"]) {
                           case 1:
                           $estatus = "Sin Trabajo";
                           break;
                           case 2:
                           $estatus = "Primer Empleo";
                           break;
                           case 3:
                           $estatus = "Trabajando";
                           break;

                           default:
                           $estatus = "Pendiente de llenar";
                           break; 
                       } ?>

                       <div class="row mb-3 infoletred">
                        <div class="col ">
                            <?php foreach ($datos["infoespecialidades"] as $key ): ?>
                                <?php if($key["ESPECIALIDAD"] == "Otra especifique"){ echo $key["OTRA_ESPECIALIDAD"]."/";}
                                else{
                                    echo $key["ESPECIALIDAD"]."/"; }?>
                                <?php endforeach ?>
                            </div>
                            <div class="col  "><?=$estatus?> </div>
                            <div class="col  "><?=$datos["tiempoexperiencias"]?> </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive" style="display: inline-flex;">
                                <?php foreach ($datos["infoexperiencia"] as $key): ?>
                                    <div class="letrastablagray">
                                        <div>
                                            <?=$key["FECHA_INICIO"]?>
                                        </div>
                                        <div>
                                            <?=$key["COMPANIA"]?>
                                        </div>
                                        <div>
                                            <?=ucfirst(strtolower($key["TIPO_CONTRATO"]))?>
                                        </div>
                                        <div class="ltinfop">
                                            <?=$key["CARGO"]?>
                                        </div>
                                        <div>
                                            <?=formatostotaldesconhoras(((strtotime($key["FECHA_TERMINO"])- strtotime($key["FECHA_INICIO"]))/60/60))?>
                                        </div>
                                    </div>
                                <?php endforeach ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row  lineaseparado">
                    <div class="col">
                        <div class="row">
                            <div class="col-4 ltinfop">
                                <i class="fa  fa-caret-down"></i>
                                Prácticas profesionales
                            </div>
                            <div class="col-8 alinearbotonderecha">
                                <a href="<?=base_url('/configuracion/practicasprofesionales')?>" class="botoneditar"> </a>
                            </div>
                        </div>
                        <div class="row infoletnegras" style="text-align: center;">
                            <div class="col ">Total de prácticas
                            </div>
                            <div class="col  ">Total de horas practicadas
                            </div>
                            <div class="col  ">Experiencia laboral 
                            </div>
                        </div>
                        <div class="row mb-3 infoletred" style="text-align: center;">
                            <div class="col "  ><?=count($datos["infopracticas"])?> </div>
                            <div class="col  "  ><?=$datos["tiempopracticas"]?> </div>
                            <div class="col  "  ><?=formatostotaldesconhoras($datos["tiempopracticas"])?> </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive" style="display: inline-flex;">
                                <?php foreach ($datos["infopracticas"] as $key): ?>
                                    <div class="letrastablagray">
                                        <div>
                                            <?=datesqltodate($key["FECHA_INICIO"])?>
                                        </div>
                                        <div>
                                            <?=$key["COMPANIA"]?>
                                        </div> 
                                        <div class="ltinfop">
                                            Calificación <?=$key["CALIFICACION_FINAL"]?>
                                        </div> 
                                    </div>
                                <?php endforeach ?> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row lineaseparado">
                    <div class="col">
                        <div class="row">
                            <div class="col-4 ltinfop">
                                <i class="fa  fa-caret-down"></i>
                                Ficha médica 
                            </div>
                            <div class="col-8 alinearbotonderecha">
                                <a href="<?=base_url('/configuracion/fichamedica')?>" class="botoneditar"> </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col  datosfmedica">
                                <div>Númera de seguro social 
                                </div>
                                <div><?=$datos["infoficha"][0]["NUM_SEGURO_SOCIAL"]?>
                                </div>
                            </div>
                            <div class="col  datosfmedica ">
                                <div>Tipo de sangre
                                </div>
                                <div><?=$datos["infoficha"][0]["TIPO_SABGRE"]?>
                                </div>
                            </div>
                            <div class="col  datosfmedica ">
                                <div>Embarazo
                                </div>
                                <div><?php if ($datos["infoficha"][0]["EMBARAZO"] == 1){ echo "Sí";}else{ echo "No";} ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col  datosfmedica">
                                <div>Tipo de seguro
                                </div>
                                <div><?php if ($datos["infoficha"][0]["TIPO_SEGURO_SOCIAL"] == 1) { echo "Estudiante";
                                } elseif ($datos["infoficha"][0]["TIPO_SEGURO_SOCIAL"] == 2) {
                                    echo "Beneficiario";
                                }elseif ($datos["infoficha"][0]["TIPO_SEGURO_SOCIAL"] == 3) {
                                    echo "Trabajador";
                                } ?>
                                </div>
                            </div>
                            <div class="col  datosfmedica ">
                                <div>Peso
                                </div>
                                <div><?=$datos["infoficha"][0]["PESO"]?> Kg.
                                </div>
                            </div>
                            <div class="col  datosfmedica ">
                                <div>Accidentes
                                </div>
                                <div><?php if ($datos["infoficha"][0]["ACCIDENTES"] == 1) { echo "Si";
                                } elseif ($datos["infoficha"][0]["ACCIDENTES"] == 2) {
                                    echo "No";
                                } ?>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <div class="row">
                            <div class="col  datosfmedica">
                                <div>Seguro universitario
                                </div>
                                <div><?php if ($datos["infoficha"][0]["SEGURO_UNIVERSITARIO"] == 1){ echo "Sí";}else{ echo "No";} ?>
                                </div>
                            </div>
                            <div class="col  datosfmedica ">
                                <div>Estatura
                                </div>
                                <div><?=$datos["infoficha"][0]["ESTATURA"]?> cm
                                </div>
                            </div>
                            <div class="col  datosfmedica ">
                                <div>Operaciones realizadas
                                </div>
                                <div><?php if ($datos["infoficha"][0]["OPERACIONES"] == 1) { echo "Si";
                                } elseif ($datos["infoficha"][0]["OPERACIONES"] == 2) {
                                    echo "No";
                                } ?>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <div class="row">
                            <div class="col  datosfmedica">
                                <div>Numero de poliza
                                </div>
                                <div><?=$datos["infoficha"][0]["POLIZA_SEGURO_UNIVERSITARIO"]?>
                                </div>
                            </div>
                            <div class="col  datosfmedica ">
                                <div>Alergias alimentos
                                </div>
                                <div><?php if ($datos["infoficha"][0]["ALERGIA_ALIMENTOS"] == 1) { echo "Si";
                                } elseif ($datos["infoficha"][0]["ALERGIA_ALIMENTOS"] == 2) {
                                    echo "No";
                                } ?>
                                </div>
                            </div>
                            <div class="col  datosfmedica ">
                                <div>Operaciones pendientes
                                </div>
                                <div><?php if ($datos["infoficha"][0]["OPERACIONES_PENDIENTES"] == 1) { echo "Si";
                                } elseif ($datos["infoficha"][0]["OPERACIONES_PENDIENTES"] == 2) {
                                    echo "No";
                                } ?>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <div class="row">
                            <div class="col  datosfmedica">
                                <div>Certificado 
                                </div>
                                <div><?=$datos["infoficha"][0]["POLIZA_SEGURO_UNIVERSITARIO"]?>
                                </div>
                            </div>
                            <div class="col  datosfmedica ">
                                <div>Alergias medicamentos
                                </div>
                                <div><?php if ($datos["infoficha"][0]["ALERGIA_MEDICAMENTO"] == 1) { echo "Si";
                                } elseif ($datos["infoficha"][0]["ALERGIA_MEDICAMENTO"] == 2) {
                                    echo "No";
                                } ?>
                                </div>
                            </div>
                            <div class="col  datosfmedica ">
                                <div></div>
                                <div></div>
                            </div>
                            <!-- /.col -->
                        </div>
                    </div> 
                </div>

                <div class="row lineaseparado cuadroreconypremios">
                    <div class=" col-lg-6 col-md-12 cuadro" >
                        <div class="row">
                            <div class="col-4 ltinfop no-padding">
                                <i class="fa  fa-caret-down"></i>
                                Reconocimientos
                            </div>
                            <div class="col-8 no-padding">
                                <div class="alinearderecha">
                                    <span class="letrasrecoyprem">Total de reconocimientos obtenidos </span>
                                    <span class="datelastupdate"><?=(count($datos["infojuez"])+count($datos["infoponencias"])+count($datos["inforreconocimientos"]))?></span>
                                    <span><a href="<?=base_url('/configuracion/reconocimientos')?>" class="botoneditar"> </a></span>
                                </div>  
                            </div> 
                        </div>
                        <div class="row" style="height: 90%;">
                            <div class="table-responsive tablaconrecon"   >
                                <?php foreach ($datos["infojuez"] as $key ): ?>
                                    <div>
                                        <img src="<?=$key["DIRECCION_IMAGEN_RECONOCIMIENTO"]?>" >
                                        <div>
                                            <?=$key["NOMBRE_CONCURSO"]?>
                                        </div>
                                    </div>

                                <?php endforeach ?>
                                <?php foreach ($datos["infoponencias"] as $key ): ?>
                                    <div>
                                        <img src="<?=checkimagen($key["DIRECCION_IMAGEN_RECONOCIMIENTO"])?>" >
                                        <div>
                                            <?=$key["NOMBRE_EVENTO"]?>
                                        </div>
                                    </div>

                                <?php endforeach ?>
                                <?php foreach ($datos["inforreconocimientos"] as $key ): ?>
                                    <div>
                                        <img src="<?=checkimagen($key["DIRECCION_IMAGEN_RECONOCIMIENTO"])?>" >
                                        <div>
                                            <?=$key["TIPO_RECONOCIMIENTO"]?>
                                        </div>
                                    </div>

                                <?php endforeach ?>

                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-6 col-md-12  cuadro">
                        <div class="row" >
                            <div class="col-4 ltinfop no-padding">
                                <i class="fa  fa-caret-down"></i> Concursos
                            </div>
                            <div class="col-8 no-padding">
                                <div class="alinearderecha">
                                    <span class="letrasrecoyprem">Total de concursos </span>
                                    <span class="datelastupdate"><?=count($datos["infoconcursos"])?></span>
                                    <span><a href="<?=base_url('/configuracion/formacionacademica')?>" class="botoneditar"> </a></span>
                                </div>  
                            </div>  
                        </div>

                        <div class="row"style="height: 90%;">
                            <div class="table-responsive tablaconconcursos" style="text-align: center;">
                                <?php foreach ($datos["infoconcursos"] as $key ):
                                    switch ($key["POSICION_OBTENIDA"])
                                    {
                                        case 1:

                                        $posicion= "1er Lugar";

                                        break;
                                        case 2:

                                        $posicion= "2do Lugar";

                                        break;
                                        case 3:

                                        $posicion= "3er Lugar";

                                        break;

                                        default:
                                        $posicion ="NaN";
                                        break;
                                    } ?>
                                    <div>
                                        <img src="<?=checkimagen($key["DIRECCION_IMAGEN_RECONOCIMIENTO"])?>" >
                                        <div>
                                            <?=$key["NOMBRE_CONCURSO"]?>
                                        </div>
                                        <div>
                                            <?=$posicion?>
                                        </div>
                                        <div>
                                            <?=$key["PAIS"]?>,<?=$key["ESTADO"]?>,<?=$key["CIUDAD"]?>
                                        </div>
                                    </div>

                                <?php endforeach ?>

                            </div>
                        </div>
                    </div>
                </div> 
                <div class="row lineaseparado cuadroreconypremios">
                    <div class=" col-lg-6 col-md-12 cuadro" >
                        <div class="row">
                            <div class="col-10 ltinfop no-padding">
                                <i class="fa  fa-caret-down"></i>
                                Resumen Reconocimientos
                            </div>
                            <div class="col-2 no-padding">
                                <div class="alinearderecha">
                                    <span><a href="<?=base_url('/configuracion/reconocimientos')?>" class="botoneditar"> </a></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <table class="fixed_headerextras">
                                    <tbody>
                                        <?php if (!empty($datos["infojuez"])): ?>
                                            <tr>
                                                <td>
                                                    <?php if(count($datos["infojuez"]) == 1) { $cantidad = "Vez"; }else{ $cantidad = "Veces";} echo count($datos["infojuez"]); ?>
                                                </td>
                                                <td>
                                                    <?=$cantidad?> juez en concursos de cocina
                                                </td>
                                            </tr>
                                        <?php endif ?>

                                        <?php if ($datos["infofestivales"]): ?>
                                            <tr>
                                                <td>
                                                    <?=count($datos["infofestivales"])?>
                                                </td>
                                                <td>
                                                    Festivales fastronómicos
                                                </td> 
                                            </tr>
                                        <?php endif ?>  
                                        <?php if ($datos["infoponencias"]): ?>
                                            <tr>
                                                <td>
                                                    <?php if(count($datos["infoponencias"]) == 1) { $cantidad = "Vez"; }else{ $cantidad = "Veces";} echo count($datos["infoponencias"]); ?>
                                                </td>
                                                <td>
                                                    <?= $cantidad ?> ponente
                                                </td>
                                            </tr>
                                        <?php endif ?>
                                        <?php if ($datos["inforreconocimientos"]): ?>
                                            <tr>
                                                <td>
                                                    <?= count($datos["inforreconocimientos"])?>
                                                </td>
                                                <td>
                                                    Reconocimientos especiales
                                                </td>
                                            </tr>  
                                        <?php endif ?>
                                    </tbody> 
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-6 col-md-12  cuadro">
                        <div class="row" >
                            <div class="col-4 ltinfop no-padding">
                                <i class="fa  fa-caret-down"></i>
                                Idiomas
                            </div>
                            <div class="col-8 no-padding">
                                <div class="alinearderecha">
                                    <span><a href="<?=base_url('/configuracion/idiomas')?>" class="botoneditar"> </a></span>
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-6"> 
                                <table class="fixed_headermaterno">
                                    <thead  >
                                        <tr>
                                            <th>
                                                Maternos  
                                            </th>
                                            
                                            <th>
                                                <?=count($datos["infoidiomasmaternos"])?>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody   >
                                        <?php foreach ($datos["infoidiomasmaternos"]  as $key ): ?>
                                            
                                                <tr>
                                                    <td>
                                                        <?= $key["IDIOMA"]?> 
                                                    </td>
                                                </tr>
                                           
                                        <?php endforeach ?> 
                                    </tbody>
                                </table> 
                            </div>
                            <div class="col-6">
                                <table class="fixed_headeraprendidos">
                                    <thead  >
                                        <tr>
                                            <th>
                                                Aprendidos  
                                            </th>
                                            <th>
                                              <?=count($datos["infoidiomasaprendidos"])?>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody   >
                                        <?php foreach ($datos["infoidiomasaprendidos"]  as $key ): ?>
                                            

                                                <tr>
                                                    <td>
                                                        <?= $key["PORCENTAJE"]."%"?> 
                                                    </td>
                                                    <td>
                                                        <?= $key["NOMBRE_IDIOMA"]?> 
                                                    </td>
                                                    <td>
                                                        <?= $key["NOMBRE_CERTIFICADO"]?> 
                                                    </td>
                                                </tr>
                                             
                                        <?php endforeach ?> 
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="row lineaseparado">
                    <div class="col">
                        <div class="row">
                            <div class="col-5 ltinfop no-padding">
                                <i class="fa  fa-caret-down"></i>
                                Formación Académica
                            </div>
                            <div class="col-7 no-padding">
                                <div class="alinearderecha">
                                    <span class="letrasrecoyprem">Títulos academicos acumulados</span>
                                    <span class="datelastupdate"><?=count($datos["infoformacion"])?></span>
                                    <span><a href="<?=base_url('/configuracion/formacionacademica')?>" class="botoneditar"> </a></span>
                                </div>  
                            </div> 
                        </div>
                        <div class="row"  >
                            <div class="table-responsive tablaacademica" >
                                <?php

                                $cont = 0;
                                foreach ($datos["infoformacion"] as $key)
                                {
                                    if($key["ESTATUS_ACADEMICO"] == "EGRESADO"){

                                        $status = 1;
                                    }
                                    if($key["ESTATUS_ACADEMICO"] == "TRUNCA"){

                                        $status = 2;
                                    } 
                                    if($key["ESTATUS_ACADEMICO"] == "ACTUALMENTE CURSANDO"){

                                        $status = 3;
                                    }
                                    ?>
                                    <div>
                                        <div>
                                            <?=ucfirst(strtolower($key["NIVEL_ACADEMICO"]))?>
                                        </div>
                                        <div>
                                            <?=$key["NOMBRE_CARRERA"]?>
                                        </div>
                                        <div>
                                            Generación <span id="formacion<?=$cont?>" data-estatus="<?=$status?>" data-idformacion="<?=$key["ID"]?>"> </span>
                                        </div>
                                        <div>
                                            <?= $key["NOMBRE_INSTITUCION"]?>
                                        </div>
                                        <div>
                                            <?=$key["PAIS"]?>, <?=$key["ESTADO"]?>, <?=$key["CIUDAD"]?>
                                        </div>
                                    </div>
                                    <?php $cont++; } ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row  ">
                        <div class="col">
                            <div class="row">
                                <div class="col-4 ltinfop">
                                    <i class="fa  fa-caret-down"></i>
                                    Educación continua 
                                </div>
                                <div class="col-8 no-padding">
                                 <div class="alinearderecha"> 
                                    <span><a href="<?=base_url('/configuracion/educacioncontinua')?>" class="botoneditar"> </a></span>
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-lg-6 col-md-12  cuadro">
                                <div class="row">
                                <div class="col-4 ">
                                    
                                    Diplomados: <?=count($datos["infodiplomados"])?>
                                </div> 
                            </div>
                               <div class="row" style="height: 90%;">
                                <div class="table-responsive tablaconrecon" style="text-align: center;"   >
                                    <?php foreach ($datos["infodiplomados"] as $key ): ?>
                                        <div>
                                            <img src="<?=checkimagen($key["DIRECCION_IMAGEN"]) ?>" >
                                            <div>
                                                <?=$key["NOMBRE"]?>
                                            </div>
                                            <div>
                                                <?=$key["PAIS"]?>, <?=$key["ESTADO"]?>, <?=$key["CIUDAD"]?>
                                            </div>
                                        </div>

                                    <?php endforeach ?>  
                                </div>
                            </div>
                        </div>
                        <div class=" col-lg-6 col-md-12  cuadro">
                            <div class="row">
                                <div class="col-4 ">
                                    
                                    Congresos: <?=count($datos["infocongresos"])?>
                                </div> 
                            </div>
                            <div class="row" style="height: 90%;">
                                <div class="table-responsive tablaconrecon" style="text-align: center;"   >
                            <?php foreach ($datos["infocongresos"] as $key ): ?>
                                        <div>
                                            <img src="<?=checkimagen($key["DIRECCION_IMAGEN"]) ?>" >
                                            <div>
                                                <?=$key["NOMBRE"]?>
                                            </div> 
                                             <div>
                                                <?=datesqltodate($key["DURACION"])?>
                                            </div> 
                                            <div>
                                                <?=$key["PAIS"]?>, <?=$key["ESTADO"]?>, <?=$key["CIUDAD"]?>
                                            </div>
                                        </div>

                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col cuadro">
                            <div class="row">
                                <div class="col-4 ">
                                    
                                    Cursos | Talleres | Capacitaciones: <?= count($datos["infocursos"]) + count($datos["infotalleres"]) + count($datos["infocapacitaciones"])?>
                                </div> 
                            </div>
                             <div class="row" style="height: 90%;">
                                <div class="table-responsive tablaconrecon" style="text-align: center;"   >
                             <?php foreach ($datos["infocursos"] as $key ): ?>
                                        <div>
                                            <img src="<?=checkimagen($key["DIRECCION_IMAGEN"]) ?>" >
                                            <div>
                                                <?=$key["NOMBRE"]?>
                                            </div> 
                                            <div>
                                                <?=$key["INSTITUCION"]?> - <?=$key["DURACION_HORAS"] ?> | <?=funmes($key["MES"])?> <?=$key["ANIO"]?>
                                            </div>
                                            <div>
                                                <?=$key["PAIS"]?>, <?=$key["ESTADO"]?>, <?=$key["CIUDAD"]?>
                                            </div>
                                        </div>

                                    <?php endforeach ?>
                                    <?php foreach ($datos["infotalleres"] as $key ): ?>
                                        <div>
                                            <img src="<?=checkimagen($key["DIRECCION_IMAGEN"]) ?>" >
                                            <div>
                                                <?=$key["NOMBRE"]?>
                                            </div> 
                                            <div>
                                                <?=$key["INSTITUCION"]?> - <?=$key["DURACION_HORAS"] ?> | <?=funmes($key["MES"])?> <?=$key["ANIO"]?>
                                            </div>
                                            <div>
                                                <?=$key["PAIS"]?>, <?=$key["ESTADO"]?>, <?=$key["CIUDAD"]?>
                                            </div>
                                        </div>

                                    <?php endforeach ?>
                                    <?php foreach ($datos["infocapacitaciones"] as $key ): ?>
                                        <div>
                                            <img src="<?=checkimagen($key["DIRECCION_IMAGEN"])?>" >
                                            <div>
                                                <?=$key["NOMBRE"]?>
                                            </div> 
                                            <div>
                                                <?=$key["INSTITUCION"]?> - <?=$key["DURACION_HORAS"] ?> | <?=funmes($key["MES"])?> <?=$key["ANIO"]?>
                                            </div>
                                            <div>
                                                <?=$key["PAIS"]?>, <?=$key["ESTADO"]?>, <?=$key["CIUDAD"]?>
                                            </div>
                                        </div>

                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div> 
                    </div>

                </div>
            </div>
        </section>
        <input type="text" id="contadorformacion" value="<?=count($datos["infoformacion"])?>" hidden="">
        <script type="text/javascript">
            $(document).ready(function(){

              $('.phone_with_ddd').mask('(000) 000 0000'); 
          });

            $(window).on("load", function(){
                var cont = $("#contadorformacion").val();

                setTimeout(function(){ 
                    for (var i = 0; i < cont; i++) { 
                        var valor = $("#formacion"+i).data("estatus"); 
                        var id = $("#formacion"+i).data("idformacion"); 

                        $.ajax({ 
                            type: 'ajax',
                            method: 'post',
                            datatype: 'text',
                            async: false,
                            url: '<?=base_url('miperfil/consultaformacion')?>',  
                            data: {valor: valor,
                                id: id },
                            })
                        .done(function(response){

                            $("#formacion"+i).html(response);


                        }) ;

                    }
                },10) ;

            });
        </script>